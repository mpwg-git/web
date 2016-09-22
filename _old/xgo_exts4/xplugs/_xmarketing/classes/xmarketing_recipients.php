<?
class xmarketing_recipients {


	public static function getById($xmr_id)
	{
		$xmr_id = intval($xmr_id);
		return dbx::query("select * from xm_recipients where xmr_id = $xmr_id");
	}

	public static function getListAssigmentsById($xmr_id)
	{
		return array();
	}

	public static function getMailingHistoryById($xmr_id)
	{
		return array();
	}

	public static function getRecordHistory($xmr_id)
	{
		return array();
	}

	public static function dataHistory($function)
	{
		switch ($function)
		{
			case 'load':
				$xmr_id = xmarketing_security::safe_recipient_id($_REQUEST['xmr_id']);
				$nodes = dbx::queryAll("select * from xm_recipients_history where xmrh_r_id = $xmr_id order by xmrh_id desc");
				if ($totalCount === false) $totalCount = count($nodes);
				frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));
				break;
			default: die('XX');
		}
	}

	public static function mailHistory($function)
	{
		switch ($function)
		{
			case 'testSend':

				/*
				$email 		= $_REQUEST['email'];
				$xmsq_id 	= xmarketing_security::safe_send_queue_id($_REQUEST['xmsq_id']);
				/*
				if ($email == "") 	die();
				if ($xmsq_id == 0) 	die();
				$q 		= dbx::query("select * from xm_send_queue where xmsq_id = $xmsq_id");
				$html 	= $q['xmsq_html'];
				// GET AUSSENDUNGS DATEN
				* /
				xmarketing_emissions::
				frontcontrollerx::json_success();*/

				xmarketing_emissions::emission_queue_recipient('testSend'); // 1:1 Function Call
				die();
				break;
			case 'show':
				if (intval($_REQUEST['xmsq_id']) == 0) die();
				$xmsq_id = xmarketing_security::safe_send_queue_id($_REQUEST['xmsq_id']);
				if ($xmsq_id == 0) die();

				$q 		= dbx::query("select *,UNCOMPRESS(xmsq_html) as xmsq_html from xm_send_queue where xmsq_id = $xmsq_id");
				$html 	= $q['xmsq_html'];
				die($html);
				break;
			case 'load':
				$xmr_id = xmarketing_security::safe_recipient_id($_REQUEST['xmr_id']);
				$nodes = dbx::queryAll("select * from xm_send_queue, xm_emissions where xmsq_r_id = $xmr_id and xme_id = xmsq_e_id");
				if ($totalCount === false) $totalCount = count($nodes);
				frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));
				break;
			default: die('XX');
		}

	}


	public static function insertHistoryList($xmr_id,$xml_id,$addOrdel)
	{
		$u = xredaktor_core::getUserSettings();

		$xmrh_beu_id 	= $u['wz_id'];
		$xmrh_beu_name 	= $u['wz_u_username'];

		$dataNow 		= self::getById($xmr_id);
		$xmr_s_id 		= $dataNow['xmr_s_id'];

		$list 			= xmarketing_lists::getById($xml_id);
		$listename		= trim($list['xml_name']).'('.intval($list['xml_id']).')';

		$xmrh_action 	= "LIST_MANUAL";
		if ($addOrdel)
		{
			$xmrh_details	= "Benutzer wurder in die Liste $listename eingetragen.";
		} else
		{
			$xmrh_details	= "Benutzer wurder aus der Liste $listename ausgetragen.";
		}

		$db = array(
		'xmrh_r_id' 		=> $xmr_id,
		'xmrh_ts'			=> 'NOW()',
		'xmrh_beu_id' 		=> $xmrh_beu_id,
		'xmrh_beu_name' 	=> $xmrh_beu_name,
		'xmrh_action' 		=> $xmrh_action,
		'xmrh_details' 		=> $xmrh_details,
		'xmrh_import_id' 	=> $xmrh_import_id,
		'xmrh_s_id' 		=> $xmr_s_id,
		);

		dbx::insert('xm_recipients_history',$db);
	}

	public static function lists2user($function)
	{

		switch ($function)
		{
			case 'updateCheck':

				$xmr_id 	= xmarketing_security::safe_recipient_id($_REQUEST['xmr_id']);
				$xml_id 	= xmarketing_security::safe_list_id($_REQUEST['xml_id']);
				$checked 	= ($_REQUEST['checked'] == 'on');

				$xmr2l_s_id	= xmarketing_config::getCurrentSiteId();

				if ($checked)
				{
					dbx::delete("xm_recipients2lists",array('xmr2l_l_id'=>$xml_id,'xmr2l_r_id'=>$xmr_id,'xmr2l_s_id'=>$xmr2l_s_id));
					dbx::insert("xm_recipients2lists",array('xmr2l_l_id'=>$xml_id,'xmr2l_r_id'=>$xmr_id,'xmr2l_s_id'=>$xmr2l_s_id));
					self::insertHistoryList($xmr_id,$xml_id,true);
				} else
				{
					dbx::delete("xm_recipients2lists",array('xmr2l_l_id'=>$xml_id,'xmr2l_r_id'=>$xmr_id,'xmr2l_s_id'=>$xmr2l_s_id));
					self::insertHistoryList($xmr_id,$xml_id,false);
				}

				frontcontrollerx::json_success();
				break;
			case 'load':

				$xml_s_id	= xmarketing_config::getCurrentSiteId();

				$wzListScopeID	= xmarketing_security::safe_recipient_id($_REQUEST['xmr_id']);
				$check_table 	= "xm_recipients2lists";
				$table 			= "xm_lists";
				$wa_fieldName	= "xmr2l_r_id";
				$wb_fieldName	= "xmr2l_l_id";
				$sql			= "select $check_table.*,$table.*,$check_table.xmr2l_id as checkId,!ISNULL($check_table.$wa_fieldName) as xml_xmr_checked from $table left join $check_table ON $check_table.$wb_fieldName=$table.xml_id and $check_table.$wa_fieldName = $wzListScopeID where $table.xml_del = 'N' and xm_lists.xml_s_id = $xml_s_id $querySql order by $table.xml_sort ASC";
				$nodes 			= dbx::queryAll($sql);
				if ($totalCount === false) $totalCount = count($nodes);
				frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));
				die();
			default: die('x');
		}
	}

	public static function getRecipientSearchFields()
	{
		$fields2search = array('xmr_name_first','xmr_name_last','xmr_email','xmr_full_salutation');
		return $fields2search;
	}

	public static function recipientsOfList($function)
	{
		$xml_id			= xmarketing_security::safe_list_id($_REQUEST['xml_id']);

		$limit 	= 100;
		$start 	= intval($_REQUEST['start']);
		$_query	= trim($_REQUEST['_query']);
		$query 	= "";

		$fields2search = self::getRecipientSearchFields();
		if ($_query != "")
		{
			$_q = explode(" ",$_query);
			$qs = array();

			foreach ($_q as $q)
			{
				$tmp = array();

				foreach ($fields2search as $f2s)
				{
					$q = dbx::escape($q);
					$tmp[] = " $f2s LIKE '%$q%' ";
				}

				$qs[] = " ( " .implode(" OR ",$tmp)." )";
			}
			$query = " and (".implode(" AND ",$qs).")";
		}

		$xmr_s_id = xmarketing_config::getCurrentSiteId();

		$sql_basic 	= " from xm_recipients, xm_recipients2lists where xm_recipients2lists.xmr2l_r_id = xm_recipients.xmr_id and xm_recipients2lists.xmr2l_l_id = $xml_id and xm_recipients.xmr_s_id = $xmr_s_id $query";
		$sql_data 	= "select xm_recipients.* $sql_basic LIMIT $start,$limit";
		$sql_count 	= "select count(xm_recipients.xmr_id) as countx $sql_basic";

		// EXTRA SECURITY s_id

		$nodes		= dbx::queryAll($sql_data);
		$totalCount = dbx::queryAttribute($sql_count,'countx');

		if ($totalCount === false) $totalCount = count($nodes);
		frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));
	}


	public static function changesDoneOrNot($xmr_id, $update, $onlyImportantFields=false)
	{
		$changesDone 	= false;
		$dataNow 		= self::getById($xmr_id);
		$changes 		= array();
		$changesDone 	= false;

		foreach ($update as $k => $v)
		{
			if (($k == 'xmr_canceled_date') && ($v == "")) {
				$v = "0000-00-00 00:00:00";
			}

			if ($onlyImportantFields)
			{
				if (in_array($k,array('xmr_canceled_date'))) continue;
			}

			if ($dataNow[$k] != $v)
			{
				$changesDone = true;
				$changes[$k] = array('old'=>$dataNow[$k],'new'=>$v);
			}
		}

		if ($changesDone) {
			return $changes;
		}

		return $changesDone;
	}


	public static function updateHistory($xmr_id,$update,$xmrh_action="UPDATE",$xmrh_import_id=-1)
	{
		$xmr_id 		= intval($xmr_id); // NO SEC CHCEK !!!!!!!
		if ($xmr_id == 0) return false;

		$dataNow 		= self::getById($xmr_id);
		$changesDone 	= self::changesDoneOrNot($xmr_id,$update);

		if ($changesDone !== false) {

			$u = xredaktor_core::getUserSettings();

			$xmrh_beu_id 	= $u['wz_id'];
			$xmrh_beu_name 	= $u['wz_u_username'];

			$xmrh_details	= "";

			foreach ($changesDone as $k => $v)
			{
				$old = $v['old'];
				$new = $v['new'];
				$xmrh_details .= "$k (alt->neu): '$old' -> '$new'<br>";
			}

			$xmr_s_id = $dataNow['xmr_s_id'];

			$db = array(
			'xmrh_r_id' 		=> $xmr_id,
			'xmrh_ts'			=> 'NOW()',
			'xmrh_beu_id' 		=> $xmrh_beu_id,
			'xmrh_beu_name' 	=> $xmrh_beu_name,
			'xmrh_action' 		=> $xmrh_action,
			'xmrh_details' 		=> $xmrh_details,
			'xmrh_import_id' 	=> $xmrh_import_id,
			'xmrh_s_id' 		=> $xmr_s_id,
			);

			dbx::insert('xm_recipients_history',$db);
		}
	}

	public static function updateHistoryInsert($xmr_id,$xmrh_import_id=-1)
	{

		$u = xredaktor_core::getUserSettings();
		$xmrh_beu_id 	= $u['wz_id'];
		$xmrh_beu_name 	= $u['wz_u_username'];
		$xmrh_details	= "INSERT";

		$db = array(
		'xmrh_r_id' 		=> $xmr_id,
		'xmrh_ts'			=> 'NOW()',
		'xmrh_beu_id' 		=> $xmrh_beu_id,
		'xmrh_beu_name' 	=> $xmrh_beu_name,
		'xmrh_action' 		=> 'INSERT',
		'xmrh_details' 		=> $xmrh_details,
		'xmrh_import_id' 	=> $xmrh_import_id,
		);

		dbx::insert('xm_recipients_history',$db);
	}


	public static function handleAjax($function)
	{

		switch ($function)
		{
			case 'updateRecord':
				$ret = array();

				$fields = array(
				'xmr_canceled',
				'xmr_canceled_date',
				'xmr_full_salutation',
				'xmr_title_pre',
				'xmr_title_post',
				'xmr_name_first',
				'xmr_name_last',
				'xmr_email',
				'xmr_lang',
				'xmr_type'
				);

				$xmr_id = xmarketing_security::safe_recipient_id($_REQUEST['xmr_id']);

				$db = array();
				foreach ($fields as $f)
				{
					$db[$f] = $_REQUEST[$f];
				}

				$xmr_s_id 		= intval(xmarketing_config::getCurrentSiteId());
				$xmr_email 		= dbx::escape(trim($db['xmr_email']));

				if (($xmr_email != "") && (!xmarketing_security::isValidEmail($xmr_email)))
				{
					frontcontrollerx::json_failure("Ungültige E-Mail Adresse eingegeben!");
				}

				if ($xmr_email != "")
				{
					$present = dbx::query("select * from xm_recipients where xmr_del='N' and xmr_s_id = $xmr_s_id and xmr_email = '$xmr_email' and xmr_id != $xmr_id");
					if ($present !== false)
					{
						frontcontrollerx::json_failure("Empfänger kann nicht gespeichert werden. E-Mail Adresse bereits vorhanden!");
					}
				}

				self::updateHistory($xmr_id,$db,'UPDATE_MANUAL');
				dbx::update('xm_recipients',$db,array('xmr_id'=>$xmr_id));

				$ret = array('r'=>$db);
				frontcontrollerx::json_success($ret);
				break;
			case 'getRecordById':

				$xmr_id = xmarketing_security::safe_recipient_id($_REQUEST['xmr_id']);

				$all = array(
				'user' 			=> self::getById($xmr_id),
				'lists' 		=> self::getListAssigmentsById($xmr_id),
				'history_mail' 	=> self::getMailingHistoryById($xmr_id),
				'history_user'	=> self::getRecordHistory($xmr_id),
				);

				frontcontrollerx::json_success($all);
				break;
			default: break;
		}


		$xmr_s_id = intval(xmarketing_config::getCurrentSiteId());

		$fields = array('xmr_id','xmr_lastmod','xmr_lastmodBy','xmr_sort','xmr_created',

		'xmr_type',
		'xmr_lang',
		'xmr_canceled',
		'xmr_canceled_date',
		'xmr_email',
		'xmr_name_first',
		'xmr_name_last',
		'xmr_title_pre',
		'xmr_title_post',
		'xmr_full_salutation',
		'xmr_canceled',
		'xmr_canceled_date',

		);

		$update = array(

		'xmr_type',
		'xmr_lang',
		'xmr_canceled',
		'xmr_canceled_date',
		'xmr_email',
		'xmr_name_first',
		'xmr_name_last',
		'xmr_title_pre',
		'xmr_title_post',
		'xmr_full_salutation',
		'xmr_canceled',
		'xmr_canceled_date',

		);

		$string = $update;
		$int 	= array();

		// insert Check SiteId

		$extFunctionsConfig = array(
		'table'		=> 'xm_recipients',
		'sort'		=> 'xmr_sort',
		'pid'		=> 'xmr_id',
		'fid'		=> 'xmr_fid',
		'name'		=> 'xmr_name',
		'del'		=> 'xmr_del',

		'extraInsertFlyInt' => array(),
		'extraLoad'			=> " xmr_s_id='$xmr_s_id' ",
		'extraInsert' 		=> array('xmr_created' => 'NOW()','xmr_s_id'=>$xmr_s_id),

		'fields'	=> $fields,
		'update'	=> $update,

		'normalize'	=> array(
		'string'	=> $string,
		'int'		=> $int
		),

		'postHooks' 		=> array(
		));

		xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

	}

}