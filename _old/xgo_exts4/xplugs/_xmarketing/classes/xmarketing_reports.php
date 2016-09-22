<?
class xmarketing_reports {

	public static function handleAjax($function)
	{
		switch ($function)
		{
			case 'getUserFlow':
				self::getUserFlowData();
				die('x');
				break;
			case 'getPieChartInfosTotal':
				$xme_id = xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
				self::getPieChartInfosTotal($xme_id);
				break;
			case 'getPieChartInfos':
				$xme_id = xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
				self::getPieChartInfos($xme_id);
				break;
			case 'downloadDailyInfos':
				$xme_id = xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
				self::downloadDataInCsvStyle($xme_id);
				break;
			case 'openingClicksAsCSVstyle':
				$xme_id = xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
				self::echoDataInCsvStyle($xme_id);
			case 'openingClicks':
				$xme_id = xmarketing_security::safe_emissions_id($_REQUEST['xme_id']);
				self::getOpeningClicksStore($xme_id);
				break;
			default: die('RTZ');
		}
	}

	private static function aasort ($array, $key) {
		$sorter=array();
		$ret=array();
		reset($array);
		foreach ($array as $ii => $va) {
			$sorter[$ii]=$va[$key];
		}
		asort($sorter);
		foreach ($sorter as $ii => $va) {
			$ret[$ii]=$array[$ii];
		}
		$array=$ret;
	}


	public static function getUserFlowData()
	{
		$xme_id = intval($_REQUEST['xme_id']);
		$xme_id = xmarketing_security::safe_emissions_id($xme_id);

		if ($xme_id == 0) die("ERROR IN CALL");

		$user_action 	= dbx::query("SELECT COUNT(  `xmtc_id` ) AS cntx, xmtc_r_id
FROM xm_tracking_clicks
WHERE xmtc_e_id = $xme_id
GROUP BY xmtc_r_id
ORDER BY  `cntx` DESC 
");

		$finalData = array();


		$sql = "select xmr_id from xm_recipients,xm_emissions_lists,xm_recipients2lists where 1=1
		and xm_recipients.xmr_del = 'N' and xm_recipients.xmr_canceled != 'Y'
		and xm_recipients.xmr_id = xm_recipients2lists.xmr2l_r_id and xm_recipients2lists.xmr2l_del = 'N'
		and xm_recipients2lists.xmr2l_l_id = xm_emissions_lists.xmel_l_id
		and xm_emissions_lists.xmel_e_id = $xme_id
		and xm_recipients.xmr_id NOT IN (select xmtc_r_id from xm_tracking_clicks where xmtc_e_id = $xme_id)
		";
		$user_noAction 	= dbx::queryAll($sql);
		$finalData['NO_ACTION'] = count($user_noAction);

		$sql = "select xmr_id from xm_recipients,xm_emissions_lists,xm_recipients2lists where 1=1
		and xm_recipients.xmr_del = 'N' and xm_recipients.xmr_canceled != 'Y'
		and xm_recipients.xmr_id = xm_recipients2lists.xmr2l_r_id and xm_recipients2lists.xmr2l_del = 'N'
		and xm_recipients2lists.xmr2l_l_id = xm_emissions_lists.xmel_l_id
		and xm_emissions_lists.xmel_e_id = $xme_id
		and xm_recipients.xmr_id IN (select xmtc_r_id from xm_tracking_clicks where xmtc_e_id = $xme_id)
		";
		$user_action 	= dbx::queryAll($sql);
		$finalData['ACTION'] = count($user_action);

		
		echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
<title>Report - $xme_id</title>
</head>

<body style='font-family: Arial, Helvetica, sans-serif;padding-left:20px;'>"; 

		echo "<h1 style='font-weight:bold;background-color:black;color:white;'>Users Clicked</h1>";

		echo "<table>";
		echo "<tr style='font-weight:bold;background-color:black;color:white;padding-left:20px;'><td>#</td><td>ID</td><td>Aktionen</td><td>First</td><td>Last</td><td>E-Mail</td><td>Links</td></tr>";


		$sorted = array();


		foreach ($user_action as $i => $u)
		{
			$u_id 	= $u['xmr_id'];
			$u 		= xmarketing_recipients::getById($u_id);

			$xmr_name_first	= $u['xmr_name_first'];
			$xmr_name_last	= $u['xmr_name_last'];
			$xmr_email		= $u['xmr_email'];

			$actions		=  dbx::query("SELECT COUNT(  `xmtc_id` ) AS cntx, xmtc_r_id
FROM xm_tracking_clicks
WHERE xmtc_e_id = $xme_id and xmtc_r_id = $u_id
GROUP BY xmtc_r_id
ORDER BY  `cntx` DESC 
");
			$u['cntx'] = $actions['cntx'];
			$sorted[] = $u;
		}

		
		self::aasort($sorted,'cntx');
		$sorted = array_reverse($sorted);

		$linkRanking = array();
		
		foreach ($sorted as $i => $u)
		{
			$u_id 			= $u['xmr_id'];
			$xmr_name_first	= $u['xmr_name_first'];
			$xmr_name_last	= $u['xmr_name_last'];
			$xmr_email		= $u['xmr_email'];
			$cntx 			= $u['cntx'];
			
			
			$links = dbx::queryAll("SELECT xmtc_created,xm_tracking_links.* from xm_tracking_clicks,xm_tracking_links where xmtc_e_id = $xme_id and xmtc_link_id = xmtl_id and xmtl_e_id = $xme_id and xmtc_r_id = $u_id order by xmtc_id ASC");
			
			$info = "";
			
			foreach ($links as $l)
			{
				$link = $l['xmtl_tl_url'];
				$xmtc_created = $l['xmtc_created'];
				list($xmtl_tl_url,$crap) = explode("?utm_source",$link,2);
				$info .= "($xmtc_created) $xmtl_tl_url <br>";
				
				
				if (!isset($linkRanking[$xmtl_tl_url])) $linkRanking[$xmtl_tl_url] = 1;
				else $linkRanking[$xmtl_tl_url]++;
			}
			
			
			
			$i++;
			echo "<tr valign=top><td>#$i</td><td>$u_id</td><td style='color:red;'>$cntx</td><td>$xmr_name_first</td><td>$xmr_name_last</td><td>$xmr_email</td><td>$info</td></tr>";
		}

		echo "</table>";

		natsort($linkRanking);
		$linkRanking = array_reverse($linkRanking);
		
		echo "<h1 style='font-weight:bold;background-color:black;color:white;padding-left:20px;'>URL-CLICKS</h1>";
		
		echo "<table>"; 
		echo "<tr><td>Position</td><td>URL</td><td>CLICK-ANZAHL</td><td>CLICK-Prozent</td></tr>"; 
		
		$pos = 1;
		$prozTotal = 0;
		
		foreach ($linkRanking as $url=>$anz)
		{
			$prozTotal+=$anz;
		}
		foreach ($linkRanking as $url=>$anz)
		{
			$prozzz = round($anz/$prozTotal*100,0);
			echo "<tr><td>$pos</td><td>$url</td><td>$anz</td><td>$prozzz %</td></tr>"; 
			$pos++;
		}
		echo "</table>"; 
		
		
		$openRatingUnique = dbx::queryAttribute("SELECT COUNT( DISTINCT (`xmor_r_id`)) as cntx FROM  `xm_tracking_opening_rates` WHERE  `xmor_e_id` = $xme_id","cntx");

		$total 			= $finalData['ACTION']+$finalData['NO_ACTION'];
		$totalPercent 	= round($openRatingUnique/$total*100,0);

		echo "<br><b>Openening Rate: $openRatingUnique / $total ($totalPercent%)</b><br>";


		$clickedAndNotTracked 	= dbx::queryAttribute("SELECT count(distinct(xmtc_r_id)) as cnt FROM `xm_tracking_clicks` WHERE `xmtc_e_id` = $xme_id and `xmtc_r_id` NOT IN (SELECT xmor_r_id FROM `xm_tracking_opening_rates` WHERE `xmor_e_id` = $xme_id)","cnt");
		$clickedAndTracked 		= dbx::queryAttribute("SELECT count(distinct(xmtc_r_id)) as cnt FROM `xm_tracking_clicks` WHERE `xmtc_e_id` = $xme_id and `xmtc_r_id` IN (SELECT xmor_r_id FROM `xm_tracking_opening_rates` WHERE `xmor_e_id` = $xme_id)","cnt");


		$OpenAndNoClick = dbx::queryAttribute("SELECT count(distinct(xmor_r_id)) as cnt FROM `xm_tracking_opening_rates` WHERE `xmor_e_id` = $xme_id and xmor_r_id NOT IN (SELECT distinct(xmtc_r_id) as cnt FROM `xm_tracking_clicks` WHERE `xmtc_e_id` = $xme_id)","cnt");

		$OpenAndNoClickUsers = dbx::queryAll("SELECT distinct(xmor_r_id) as xmor_r_id FROM `xm_tracking_opening_rates` WHERE `xmor_e_id` = $xme_id and xmor_r_id NOT IN (SELECT distinct(xmtc_r_id) as cnt FROM `xm_tracking_clicks` WHERE `xmtc_e_id` = $xme_id)");


		echo "<h1 style='font-weight:bold;background-color:black;color:white;padding-left:20px;'>Opened And Not Clicked</h1>";

		echo "<table>";
		echo "<tr style='font-weight:bold;background-color:black;color:white;padding-left:20px;'><td>#</td><td>ID</td><td>First</td><td>Last</td><td>E-Mail</td></tr>";

		foreach ($OpenAndNoClickUsers as $i => $u)
		{
			$u_id = $u['xmor_r_id'];
			$u = xmarketing_recipients::getById($u_id);

			$xmr_name_first	= $u['xmr_name_first'];
			$xmr_name_last	= $u['xmr_name_last'];
			$xmr_email		= $u['xmr_email'];

			$i++;
			echo "<tr><td>#$i</td><td>$u_id</td><td>$xmr_name_first</td><td>$xmr_name_last</td><td>$xmr_email</td></tr>";
		}
		echo "</table>";



		$finalData['Clicked und nicht in den Openrates'] 				= $clickedAndNotTracked;
		$finalData['Clicked und in den Openrates'] 						= $clickedAndTracked;
		$finalData['In den Opening Rates und nicht cklicked'] 			= $OpenAndNoClick;

		$tt = $finalData['Clicked und nicht in den Openrates'] + $finalData['Clicked und in den Openrates'] + $finalData['In den Opening Rates und nicht cklicked'];
		$finalData['Unique Impressions'] = $tt;
		$finalData['Opening Rate'] = $openRatingUnique;

		echo "<pre>";
		print_r($finalData);
		echo "<pre>";


		echo "</body>
</html>";
	}



	public static function getPieChartInfosTotal($xme_id)
	{
		$xme_id = xmarketing_security::safe_emissions_id($xme_id);

		// TOTAL
		$total = xmarketing_emissions::getCntOfRecieptsByEmissionIdViaSendQ($xme_id);
		// U OPENERS
		$sql = "SELECT count(distinct(xmor_r_id)) as totalX
		FROM  	xm_tracking_opening_rates
		WHERE 	xmor_e_id = $xme_id";
		$uOpened = intval(dbx::queryAttribute($sql,'totalX'));
		// UNSUBSCRIPTION
		$unSubScriptions = dbx::queryAttribute("SELECT count(distinct(`xmtu_r_id`)) as cntx
		FROM  	xm_tracking_unsubscription
		WHERE 	xmtu_e_id = $xme_id",'cntx');
		// Days Run
		$days_run 		= dbx::queryAttribute("select DATEDIFF(max(xmor_created),min(xmor_created)) as xxx from xm_tracking_opening_rates where xmor_e_id = $xme_id","xxx");

		// Total OPENERS
		$sql = "SELECT count(xmor_r_id) as totalX
		FROM  	xm_tracking_opening_rates
		WHERE 	xmor_e_id = $xme_id";
		$tOpened = intval(dbx::queryAttribute($sql,'totalX'));

		// CLICKS
		$clicksTotal 	= intval(dbx::queryAttribute("SELECT COUNT(`xmtc_id`) AS cntx
		FROM  	xm_tracking_clicks
		WHERE 	xmtc_e_id = $xme_id",'cntx'));
		$clicksUnique 	= intval(dbx::queryAttribute("SELECT count(distinct(`xmtc_r_id`)) as cntx
		FROM  	xm_tracking_clicks
		WHERE 	xmtc_e_id = $xme_id",'cntx')); 

		// Bounces
		$bounces = intval(dbx::queryAttribute("select count(distinct(xmscb_r_id)) as cntx from xm_send_connectors_bounces where xmscb_e_id = $xme_id and xmscb_r_id != 0","cntx"));

		$data = array(
		'uSubs' 	=> $unSubScriptions,
		'tC'		=> $clicksTotal,
		'cU'		=> $clicksUnique,
		'runTime'	=> $days_run,
		'total' 	=> $total,
		'uO' 		=> $uOpened,
		'tO' 		=> $tOpened,
		'nO'		=> intval($total-$uOpened),
		'bounces'	=> $bounces
		);

		frontcontrollerx::json_success($data);

	}

	public static function getPieChartInfos($xme_id)
	{
		$xme_id = xmarketing_security::safe_emissions_id($xme_id);

		// TOTAL
		$total = xmarketing_emissions::getCntOfRecieptsByEmissionIdViaSendQ($xme_id);
		// U OPENERS
		$sql = "SELECT count(distinct(xmor_r_id)) as totalX
		FROM  	xm_tracking_opening_rates
		WHERE 	xmor_e_id = $xme_id";
		$uOpened = intval(dbx::queryAttribute($sql,'totalX'));
		// UNSUBSCRIPTION
		$unSubScriptions = dbx::queryAttribute("SELECT count(distinct(`xmtu_r_id`)) as cntx
		FROM  	xm_tracking_unsubscription
		WHERE 	xmtu_e_id = $xme_id",'cntx');

		$data = array();
		$data[] = array('tag'=>'uO'	,'name'=>'Geöffnet',			'data' => $uOpened);
		$data[] = array('tag'=>'nO'	,'name'=>'Nicht Geöffnet',		'data' => intval($total-$uOpened));
		$data[] = array('tag'=>'B'	,'name'=>'Bounces',				'data'	=> $unSubScriptions);

		frontcontrollerx::json_store($data);
	}

	public static function getOpeningClicksStoreData($xme_id)
	{
		$xme_id = xmarketing_security::safe_emissions_id($xme_id);

		$openingsUnique = array();
		$openingsTotal	= array();
		$clicksTotal	= array();
		$clicksUnique	= array();

		/*
		$day_start 		= dbx::queryAttribute("select DATE(min(xmor_created)) as datexxx from xm_tracking_opening_rates where xmor_e_id = $xme_id","datexxx");
		$day_end 		= dbx::queryAttribute("select DATE(max(xmor_created)) as datexxx from xm_tracking_opening_rates where xmor_e_id = $xme_id","datexxx");
		$days_run 		= dbx::queryAttribute("select DATEDIFF(max(xmor_created),min(xmor_created)) as xxx from xm_tracking_opening_rates where xmor_e_id = $xme_id","xxx");
		$days2process 	= dbx::queryAll("SELECT date(xmor_created) as actionDay FROM `xm_tracking_opening_rates` group by actionDay order by actionDay ");
		foreach ($openingsData as $oD) {
		}
		*/

		$openingsTotal = dbx::queryAll("SELECT DATE( xmor_created ) AS dx, COUNT(`xmor_id`) AS cntx
		FROM  	xm_tracking_opening_rates
		WHERE 	xmor_e_id = $xme_id
		GROUP BY dx
		ORDER BY dx ASC");

		if ($openingsTotal === false) $openingsTotal = array();

		$openingsUnique = dbx::queryAll("SELECT count(distinct(`xmor_r_id`)) as cntx, date(xmor_created) as dx
		FROM  	xm_tracking_opening_rates
		WHERE 	xmor_e_id = $xme_id
		GROUP BY dx
		ORDER BY dx ASC");

		if ($openingsUnique === false) $openingsUnique = array();

		$clicksTotal = dbx::queryAll("SELECT DATE( xmtc_created ) AS dx, COUNT(`xmtc_id`) AS cntx
		FROM  	xm_tracking_clicks
		WHERE 	xmtc_e_id = $xme_id
		GROUP BY dx
		ORDER BY dx ASC");

		if ($clicksTotal === false) $clicksTotal = array();

		$clicksUnique = dbx::queryAll("SELECT count(distinct(`xmtc_r_id`)) as cntx, date(xmtc_created) as dx
		FROM  	xm_tracking_clicks
		WHERE 	xmtc_e_id = $xme_id
		GROUP BY dx
		ORDER BY dx ASC");

		if ($clicksUnique === false) $clicksUnique = array();

		$unSubScriptions = dbx::queryAll("SELECT count(distinct(`xmtu_r_id`)) as cntx, date(xmtu_ts_unsub) as dx
		FROM  	xm_tracking_unsubscription
		WHERE 	xmtu_e_id = $xme_id
		GROUP BY dx
		ORDER BY dx ASC");

		if ($unSubScriptions === false) $unSubScriptions = array();

		$da = array();
		foreach ($openingsTotal as $r)
		{
			$dx 		= $r['dx'];
			$cntx 		= $r['cntx'];
			if (!is_array($da[$dx])) $da[$dx] = array();
			$da[$dx]['oT'] = $cntx;
		}

		foreach ($openingsUnique as $r)
		{
			$dx 		= $r['dx'];
			$cntx 		= $r['cntx'];
			if (!is_array($da[$dx])) $da[$dx] = array();
			$da[$dx]['oU'] = $cntx;
		}

		foreach ($clicksTotal as $r)
		{
			$dx 		= $r['dx'];
			$cntx 		= $r['cntx'];
			if (!is_array($da[$dx])) $da[$dx] = array();
			$da[$dx]['cT'] = $cntx;
		}

		foreach ($clicksUnique as $r)
		{
			$dx 		= $r['dx'];
			$cntx 		= $r['cntx'];
			if (!is_array($da[$dx])) $da[$dx] = array();
			$da[$dx]['cU'] = $cntx;
		}

		foreach ($unSubScriptions as $r)
		{
			$dx 		= $r['dx'];
			$cntx 		= $r['cntx'];
			if (!is_array($da[$dx])) $da[$dx] = array();
			$da[$dx]['uS'] = $cntx;
		}


		ksort($da);

		$fields2export = array('oU','oT','cU','cT','uS');

		foreach ($da as $d => $x)
		{
			$tmp = array();
			$tmp['d'] = $d;
			foreach ($fields2export as $f)
			{
				$tmp[$f] = 0;
				if (isset($x[$f])) {
					$tmp[$f] = $x[$f];
				}
			}
			$data[] = $tmp;
		}

		return $data;
	}

	public static function getDataInCsvStyle($xme_id)
	{
		$return			= "";
		$data 			= self::getOpeningClicksStoreData($xme_id);
		$headline		= array('d'=>'Date','oU'=>'unique Öffnung','oT'=>'total Öffnen','cU'=>'unique Klicks','cT'=>'total Klicks','uS'=>'Abmeldungen');
		$fields2export 	= array('d','oT','cT','uS','oU','cU');

		$sep = ";";

		$headline2 = array();
		foreach ($fields2export as $k)
		{
			$headline2[] = $headline[$k];
		}
		$return .= implode($sep,$headline2)."\n";

		if (count($data) == 0)
		{

			$headline2 = array();
			foreach ($fields2export as $k)
			{
				$headline2[] = 0;
			}
			$return .= implode($sep,$headline2)."\n";


			$data = array();
		}

		foreach ($data as $d)
		{
			$line = array();
			foreach ($fields2export as $f)
			{
				$v = $d[$f];
				if ($f == 'd')
				{
					$v = str_replace("-","/",$v);
				}
				$line[] = $v;
			}
			$return .= implode($sep,$line)."\n";
		}

		return $return;
	}

	public static function echoDataInCsvStyle($xme_id)
	{
		echo self::getDataInCsvStyle($xme_id);
		die();
	}

	public static function downloadDataInCsvStyle($xme_id)
	{
		$filename = "download_report.csv";
		header( "Content-Type: text/csv" );
		header( "Content-Disposition: attachment; filename=$filename");
		header( "Content-Description: csv File" );
		header( "Pragma: no-cache" );
		header( "Expires: 0" );
		echo utf8_decode(self::getDataInCsvStyle($xme_id));
		die();
	}

	public static function getOpeningClicksStore($xme_id)
	{
		$data = self::getOpeningClicksStoreData($xme_id);
		frontcontrollerx::json_store($data);
	}

	public static function getData_overallReportLists($xml_id)
	{
		$xml_id 	= xmarketing_security::safe_list_id($xml_id);

		$data 			= array();
		$data['s']		= dbx::queryAll("SELECT DATE( xmr_created ) 	AS dx,count(xmr_id) as cntx 	FROM `xm_recipients2lists`,xm_recipients WHERE `xmr2l_l_id` = $xml_id and `xmr2l_r_id` = xmr_id and xmr2l_del='N' group by dx");
		$data['us'] 	= dbx::queryAll("SELECT DATE( xmtu_ts_unsub) 	AS dx,count(xmtu_r_id) as cntx 	FROM `xm_recipients2lists`,xm_tracking_unsubscription WHERE `xmr2l_l_id` = $xml_id and `xmr2l_r_id` = xmtu_r_id and xmr2l_del='N' group by dx");

		$data_final 	= array();
		$keys2handle 	= array();

		foreach ($data as $k => $datax)
		{
			$keys2handle[] = $k;
		}

		foreach ($data as $k => $datax)
		{
			if ($datax === false) $datax = array();
			foreach ($datax as $r)
			{
				$dx 	= $r['dx'];
				$cntx 	= $r['cntx'];

				if (!isset($data_final[$dx])) {
					$data_final[$dx] = array();
					foreach ($keys2handle as $k2h)
					{
						$data_final[$dx][$k2h] = 0;
					}
				}

				$data_final[$dx][$k] 	= $cntx;
				$data_final[$dx]['d'] 	= $dx;
			}
		}

		ksort($data_final);

		return $data_final;
	}

	private static function default2csv($data,$fields2export,$headline)
	{
		$return 	= "";
		$sep 		= ";";

		$headline2 = array();
		foreach ($fields2export as $k)
		{
			$headline2[] = $headline[$k];
		}
		$return .= implode($sep,$headline2)."\n";

		if (count($data) == 0)
		{

			$headline2 = array();
			foreach ($fields2export as $k)
			{
				$headline2[] = 0;
			}
			$return .= implode($sep,$headline2)."\n";


			$data = array();
		}

		foreach ($data as $d)
		{
			$line = array();
			foreach ($fields2export as $f)
			{
				$v = $d[$f];
				if ($f == 'd')
				{
					$v = str_replace("-","/",$v);
				}
				$line[] = $v;
			}
			$return .= implode($sep,$line)."\n";
		}

		return $return;
	}

	public static function getData_overallReportListsInCsvStyle($xml_id)
	{
		$xml_id 		= xmarketing_security::safe_list_id($xml_id);
		$data 			= self::getData_overallReportLists($xml_id);
		$headline		= array('d'=>'Datum','s'=>'Eintragungen','us'=>'Abbestellungen');
		$fields2export 	= array('d','s','us');
		$return			= self::default2csv($data,$fields2export,$headline);
		return $return;
	}

	public static function downloadCsv_overallReportLists($xml_id)
	{
		$xml_id = xmarketing_security::safe_list_id($xml_id);
		header( "Content-Type: text/csv; charset=UTF-8" );
		header( "Content-Disposition: attachment; filename='download_report.csv'");
		header( "Content-Description: csv File" );
		header( "Pragma: no-cache" );
		header( "Expires: 0" );
		echo self::getData_overallReportListsInCsvStyle($xml_id);
		die();
	}

	public static function showCsv_overallReportLists($xml_id)
	{
		$xml_id = xmarketing_security::safe_list_id($xml_id);
		echo self::getData_overallReportListsInCsvStyle($xml_id);
		die();
	}

	public static function handleReportsForLists($function)
	{
		switch ($function)
		{
			case 'overallReportShow':
				$xml_id = xmarketing_security::safe_list_id($_REQUEST['xml_id']);
				self::showCsv_overallReportLists($xml_id);
				break;
			case 'overallReportDownload':
				$xml_id = xmarketing_security::safe_list_id($_REQUEST['xml_id']);
				self::downloadCsv_overallReportLists($xml_id);
				break;
			default: die('XXX');
		}
	}

}