<?

class xkalt
{

	public static function handleAjaxRequests()
	{
		list($scope,$function,$param_0,$param_1) = explode("/",$_REQUEST['url']);

		$scope 		= basename($scope);
		$function 	= basename($function);

		$checkClassFile = dirname(__FILE__).'/'.$scope.'.php';
		if (!is_file($checkClassFile)) die('XX');

		$fn = $scope."::ajax_".$function;

		if (is_callable($fn)) {
			call_user_func($fn,$param_0,$param_1);
			die();
		} else {
			die('XXXXX');
		}

		die('EOF');
	}

	public static function updateLog($id,$info)
	{

		$be_user_id = xredaktor_core::getUserId();

		$insert = array(
		'wz_createdBy'	=> $be_user_id,
		'wz_created'	=> 'NOW()',
		'wz_room_id' 		=> $id,
		'wz_log' 		=> $info,
		'wz_be_user_id' => $be_user_id,
		);

		dbx::insert('wizard_auto_860',$insert);
	}

	public static function ajax_done()
	{
		$b_id 	= intval($_REQUEST['b_id']);
		self::updateLog($b_id,'ERLEDIGT');

		dbx::update('wizard_auto_809',array(
		'wz_BEARBEITET_TS' 	=> 'NOW()',
		'wz_BEARBEITET_VON' => xredaktor_core::getUserId(),
		'wz_BEARBEITET'		=>'Y'
		),array('wz_id'=>intval($b_id)));

		frontcontrollerx::json_success();
	}

	public static function ajax_notDone()
	{
		$b_id 	= intval($_REQUEST['b_id']);
		self::updateLog($b_id,'NICHT ERLEDIGT');

		dbx::update('wizard_auto_809',array(
		'wz_BEARBEITET_TS' 	=> '0000-00-00 00:00:00',
		'wz_BEARBEITET_VON' => 0,
		'wz_BEARBEITET'		=>'N'
		),array('wz_id'=>intval($b_id)));

		frontcontrollerx::json_success();
	}

	public static function ajax_sendMail()
	{
		
		$b_id 	= intval($_REQUEST['b_id']);
		self::updateLog($b_id,'ERLEDIGT');

		dbx::update('wizard_auto_809',array(
		'wz_BEARBEITET_TS' 	=> 'NOW()',
		'wz_BEARBEITET_VON' => xredaktor_core::getUserId(),
		'wz_BEARBEITET'		=>'Y'
		),array('wz_id'=>intval($b_id)));
		
		
		$email 	= dbx::escape($_REQUEST['email']);
		self::updateLog($b_id,"MAIL AN $email");
		$feedback = fe_room::send_kaltaquise_mail_by_roomId_and_email($b_id, $email);
		frontcontrollerx::json_success();
	}
	
	public static function ajax_show_order($id)
	{
		$id = intval($id);
		shop_payment_orders::ajax_display_order_by_id($id);
		die();
	}

	public static function ajax_overview($fn)
	{
		switch ($fn)
		{
			case 'load':

				$cfg = array(
				'pre'			=> ' (select be_users.wz_u_username from be_users where be_users.wz_id = wizard_auto_809.wz_BEARBEITET_VON) as user
				
				
				,(select wz_source from wizard_auto_858 where wizard_auto_858.wz_id = wizard_auto_809.wz_COPY_ID) as quelle
				,(select wz_url from wizard_auto_858 where wizard_auto_858.wz_id = wizard_auto_809.wz_COPY_ID) as url
				,(select wz_images_cnt from wizard_auto_858 where wizard_auto_858.wz_id = wizard_auto_809.wz_COPY_ID) as images_cnt
				,(select wz_size from wizard_auto_858 where wizard_auto_858.wz_id = wizard_auto_809.wz_COPY_ID) as size
				,(select wz_total from wizard_auto_858 where wizard_auto_858.wz_id = wizard_auto_809.wz_COPY_ID) as total
				,(select wz_note from wizard_auto_858 where wizard_auto_858.wz_id = wizard_auto_809.wz_COPY_ID) as note
				
				
				',
				'table' 		=> "wizard_auto_809",
				//'where'			=> "wz_del='N' and wz_BEARBEITET='N'",
				'where'			=> "wz_del='N' and wz_FROM_IMPORT='Y' and wz_HIDE = 'N' ",
				'search_string'	=> array('wz_RVorname','wz_RNachname','wz_RFirma'),
				'search_int'	=> array('wz_id'),
				);
				self::loadData($cfg);

				break;
				
			case 'remove':
				$ids		= explode(',',$_REQUEST['ids']);
				$cleanIds 	= array();
		
				foreach ($ids as $id)
				{
					if (is_numeric($id)) $cleanIds[] = $id;
				}
		
				if (count($cleanIds)==0)
				{
					frontcontrollerx::json_failure('NO_VALID_IDS',-300);
				}
				foreach ($cleanIds as $recordId)
				{
					dbx::update("wizard_auto_809", array('wz_HIDE' => 'Y'), array('wz_id' => $recordId));
					self::updateLog($recordId, 'AUS ANSICHT GELÖSCHT');
				}

				frontcontrollerx::json_success();
				break;
				
			default: break;
		}
	}

	public static function ajax_logs($fn)
	{

		$b_id = intval($_REQUEST['b_id']);

		switch ($fn)
		{
			case 'load':

				$cfg = array(
				'pre'			=> ' (select be_users.wz_u_username from be_users where be_users.wz_id = wizard_auto_860.wz_be_user_id) as user',
				'table' 		=> "wizard_auto_860",
				'where'			=> "wizard_auto_860.wz_del='N' and wizard_auto_860.wz_room_id=$b_id",
				'search_string'	=> array('wz_log'),
				'search_int'	=> array('wz_id'),
				);
				self::loadData($cfg);

				break;
			default: break;
		}
	}

	public static function defaultGridSort($sortRequest)
	{
		$sort 		= json_decode($sortRequest, true);
		$sortStr	= '';

		if (!empty($sort))
		{
			$sortProp		= dbx::escape($sort[0]['property']);
			$sortDir		= dbx::escape($sort[0]['direction']);

			if (trim($sortProp) != '')
			{
				if (trim($sortDir) == '') $sortDir = "ASC";

				$sortStr 		= " ORDER BY $sortProp $sortDir";
			}

		}
		return $sortStr;
	}

	public static function loadData($cfg)
	{

		$table = $cfg['table'];
		$where = trim($cfg['where']);
		$pre 	= trim($cfg['pre']);

		$search_string 	= $cfg['search_string'];
		$search_int		= $cfg['search_int'];


		if ($where != "")
		{
			$where = " $where AND ";
		} else
		{
			$where = " 1=1 AND ";
		}


		if ($pre != "")
		{
			$pre = " , $pre";
		}


		$offset 	= intval($_REQUEST['start']);
		$limit 		= 100;
		$sortStr 	= '';

		##################### sorting

		if (isset($_REQUEST['initSort']))
		{
			$sortStr	= self::defaultGridSort($_REQUEST['initSort']);
		}

		if (isset($_REQUEST['sort']))
		{
			$sortStr	= self::defaultGridSort($_REQUEST['sort']);
		}

		$extraLoad = " 1=1 ";

		if ($_REQUEST['_query'] and $_REQUEST['_query'] != '')
		{

			$_query 	= $_REQUEST['_query'];
			$q_final 	= array();

			if (is_numeric($_query))
			{
				$q = intval($_query);
				foreach ($search_int as $t)
				{
					$q_final[] = " $t = $q ";
				}

			} else
			{
				foreach ($search_string as $t)
				{
					$q_final[] = " $t LIKE '%$_query%' ";
				}

			}

			$extraLoad .= " AND ".implode(" OR ",$q_final)." ";

			//$query = dbx::escape($_REQUEST['_query']);
			//$extraLoad .= " and (e_title_DE like '%$query%' or e_text_DE like '%$query%') ";
		}


		$sql 		= "select * $pre from $table where $where $extraLoad $sortStr limit $offset,$limit";
		$sqlCount 	= dbx::query("select count(*) as cntx from $table where $where $extraLoad");
		$data		= dbx::queryAll($sql);

		frontcontrollerx::json_success(array('root' => $data, 'totalCount' => $sqlCount['cntx']));

	}

}