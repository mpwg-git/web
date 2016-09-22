<?

class xredaktor_sitesearch
{

	public static function extractHtml($all,$lang,$q)
	{
		$blocks 			= array();
		$json 				= json_decode($all['psa_json_cfg'],true);
		$as_type_multilang 	= $all['as_type_multilang'];
		$as_name			= $all['as_name'];

		if ($as_type_multilang == 'Y')
		{
			$blocks[] = strip_tags($json['_'.$lang.'_'.$as_name],'<b><strong><ul><li>');
		} else
		{
			$blocks[] = strip_tags($json[$as_name],'<b><strong><ul><li>');
		}

		$html = implode(" ",$blocks);
		$html = str_ireplace ($q,"<span class='resultHighlight'>&nbsp$q&nbsp</span>",$html);

		return $html;
	}

	public static function searchInWizard($a_id_wizardBox,$w_id,$lang,$q,$p2go,$c_id,$t_id,$wizardMasterConfig)
	{
		$renderFunction	= trim($wizardMasterConfig['renderFunction']);
		if ($renderFunction != "") {
			if (!is_callable($renderFunction)) $renderFunction = "";
		}

		$ass = dbx::queryAll("select * from atoms_settings where as_a_id = $w_id and ( as_type = 'TEXT' OR as_type = 'HTML' OR as_type = 'TEXTAREA') and as_type_multilang = 'Y' and as_del='N'");
		if (!is_array($fields2search)) $fields2search = array();

		$fields = array();

		foreach ($ass as $as)
		{
			if (trim($as['as_name'])=="") continue;
			$attr = "_".$lang."_wz_".$as['as_name'];
			$fields[] = $attr;
		}

		$searcher = array();

		foreach ($fields as $f)
		{
			$qSplitted 	= explode(" ",$q);
			foreach ($qSplitted as $_q)
			{
				if (trim($_q)=="") continue;
				$searcher[] = " $f LIKE '%$_q%' ";
			}
		}

		$html = "";
		$name = dbx::queryAttribute("select as_name from atoms, atoms_settings where a_id = $w_id and as_a_id = a_id and as_id = a_wizard_as_p_name and as_del = 'N'","as_name");
		if ($name != "")
		{
			$nameOfRecord = "_".$lang."_wz_".$name;
			if (!in_array($nameOfRecord,$fields)) $fields[] = $nameOfRecord;
		}

		$sql 	= "select ".implode(",",$fields).",wz_id from ".xredaktor_wizards::genWizardTableNameBy_a_id($w_id).' where ('.implode(' OR ',$searcher).") AND wz_online = 'Y' AND wz_del = 'N'";
		$sql 	= "select ".implode(",",$fields).",wz_id from ".xredaktor_wizards::genWizardTableNameBy_a_id($w_id).' where ('.implode(' OR ',$searcher).") AND wz_online = 'Y' AND wz_del = 'N'";
		$data 	= dbx::queryAll($sql);
		if (!is_array($data)) $data = array();

		foreach ($data as $d)
		{
			$tmp = "";
			foreach ($d as $k => $v)
			{
				if ($k == 'wz_id') continue;
				$tmp .= " ".strip_tags($v,'<b><strong><ul><li>');
			}
			$tmp 	= str_ireplace ($q,"<span class='resultHighlight'>&nbsp;$q&nbsp</span>",$tmp);
			$title 	= $d[$nameOfRecord];
			if ($title == "") $title = "Unbekannter Titel - No Title";

			if ($renderFunction != "") {

				$feedback = frontcontrollerx::safeCallUserFunction($renderFunction,$d);
				
				if ($feedback === false) {
					continue;
				}

				$title 	= (isset($feedback['title']) 	? $feedback['title'] 	: $title);
				$href 	= (isset($feedback['href']) 	? $feedback['href'] 	: $href);

			} else
			{
				switch ($c_id)
				{
					case '-1':
						$href = xredaktor_niceurl::genUrl(array(
						'lang'=>$langLower,
						'p_id'=>$p2go,
						));
						break;
					default:
						switch ($p2go)
						{
							default:
								$href = xredaktor_niceurl::genWizardUrl(array(
								'lang'=>$langLower,
								'p_id'=>$p2go,
								'w_id'=>$w_id,
								'r_id'=>$d['wz_id'],
								'c_id'=>$c_id,
								't_id'=>$t_id
								));
						}
						break;
				}
			}

			$html.=xredaktor_render::renderSoloAtom($a_id_wizardBox,array(
			'title'	=>	$title,
			'txt'	=>	$tmp,
			'href'	=>	$href));
		}

		return $html;
	}

	public static function doSearch($query,$searchCfg,$wizardCfg,$lang='de',$queryLen=2)
	{

		$siteId				= intval($searchCfg['siteId']);
		$a_id_wizardBox		= $searchCfg['wizardBox'];
		$a_id_normalSite 	= $searchCfg['normalSite'];
		$a_id_noResult 		= $searchCfg['noResult'];
		$a_id_moreSpace		= $searchCfg['moreSpace'];
		$filterFunction		= trim($searchCfg['filterFunction']);

		if ($filterFunction != "")
		{
			if (!is_callable($filterFunction)) $filterFunction = "";
		}


		if (!is_numeric($a_id_wizardBox)) 	die("SS:$a_id_wizardBox");
		if (!is_numeric($a_id_normalSite)) 	die("SS:$a_id_normalSite");
		if (!is_numeric($a_id_noResult)) 	die("SS:$a_id_noResult");
		if (!is_numeric($a_id_moreSpace)) 	die("SS:$a_id_moreSpace");



		$lang 		= strtoupper($lang);
		$langLower 	= strtolower($lang);

		$q 		= dbx::escape(trim($query));
		$html 	= "";

		if (strlen($q)>$queryLen)
		{

			foreach ($wizardCfg as $cfg)
			{
				$wizardBox	= $cfg['wizardBox'];
				$w_id		= $cfg['w_id'];
				$p2go		= $cfg['p2go'];
				$c_id		= $cfg['c_id'];
				$t_id		= $cfg['t_id'];

				if (!is_numeric($w_id)) 	die("SS2:$w_id");
				if (!is_numeric($p2go)) 	die("SS2:$p2go");
				if (!is_numeric($c_id)) 	die("SS2:$c_id");
				if (!is_numeric($t_id)) 	die("SS2:$t_id");

				if (!is_numeric($wizardBox)) $wizardBox = $a_id_wizardBox;
				$html .= self::searchInWizard($wizardBox,$w_id,$lang,$q,$p2go,$c_id,$t_id,$cfg);
			}


			$blacklist = explode(',',$searchCfg['blacklist']);
			if (!is_array($blacklist)) $blacklist = array();
			$blacklistClean = array();
			foreach ($blacklist as $bp_id)
			{
				if (!is_numeric($bp_id)) continue;
				$blacklistClean[] = $bp_id;
			}

			$blacklistSQL = "";
			if (count($blacklistClean)>0)
			{
				$blacklistSQL = " AND pages.p_id NOT IN (".implode(",",$blacklistClean).") ";
			}



			$qSplitted 	= explode(" ",$q);
			$_tt 		= array();

			foreach ($qSplitted as $q)
			{
				$_tt[] = " psa_json_cfg LIKE '%$q%' ";
			}

			$qSQL = " AND ( ".implode(' OR ',$_tt)." ) ";

			$sql = "select * from pages,pages_settings_atoms,atoms_settings where p_s_id = $siteId and psa_del='N' and p_id = psa_p_id and p_del='N' and psa_inline_a_id = as_a_id and (as_type = 'TEXTAREA' or as_type = 'HTML' or as_type = 'TEXT') and p_isOnline='Y' $qSQL $blacklistSQL group by pages.p_id";
			$pages = dbx::queryAll($sql);

			foreach ($pages as $p)
			{
				$txt = self::extractHtml($p,$lang,$q);
				if (trim($txt) != "")
				{
					$renderThisCfg = array(
					'title'	=> $p['p_name'],
					'txt'	=> $txt,
					'href'	=> xredaktor_niceurl::genUrl(array(
					'lang'	=> $langLower,
					'p_id'	=> $p['p_id'],
					)));

					if ($filterFunction != "") {
						if (frontcontrollerx::safeCallUserFunction($filterFunction,$p,$renderThisCfg)) continue;
					}

					$html.=xredaktor_render::renderSoloAtom($a_id_normalSite,$renderThisCfg);
				}
			}

			if ($html == "")
			{
				$html.=xredaktor_render::renderSoloAtom($a_id_noResult);
			}

		} else
		{
			$html.=xredaktor_render::renderSoloAtom($a_id_moreSpace);
		}

		return $html;
	}

}