<?

class xcrm_btdb
{


	public static function handleEventSearch($nodes,$count)
	{
		return array($nodes,$count);
	}

	public static function searchEvents()
	{
		$config = json_decode($_REQUEST['config'],true);

		$id 	= intval($_REQUEST['id']);
		$tab 	= xredaktor_wizards::genWizardTableNameBy_a_id(316);
		$r	 	= dbx::query("select * from $tab where wz_id = $id");
		
		$START 	= trim($config['START']);
		$STOP 	= trim($config['STOP']);


		if (($START != "") && ($STOP != ''))
		{
			list($start_d,$start_m,$start_y) 	= explode(".",$START);
			list($stop_d,$stop_m,$stop_y) 		= explode(".",$STOP);
			$sql = "select wz_EVENT_ID from $tab where wz_D_START <= DATE_FORMAT('$start_y-$start_m-$start_d','%Y-%m-%d') AND wz_D_STOP >= DATE_FORMAT('$stop_y-$stop_m-$stop_d','%Y-%m-%d')"; 			
		} else if (($START != ""))
		{
			list($start_d,$start_m,$start_y) 	= explode(".",$START);
			$sql = "select wz_EVENT_ID from $tab where wz_D_START <= DATE_FORMAT('$start_y-$start_m-$start_d','%Y-%m-%d') AND wz_D_STOP >= NOW()"; 			
		} else if (($STOP != ''))
		{
			list($stop_d,$stop_m,$stop_y) 		= explode(".",$STOP);
			$sql = "select wz_EVENT_ID from $tab where wz_D_START <= NOW() AND wz_D_STOP >= DATE_FORMAT('$stop_y-$stop_m-$stop_d','%Y-%m-%d')"; 			
		}


		$tab 		= xredaktor_wizards::genWizardTableNameBy_a_id(213);
		$extender	= xredaktor_defaults::getTitleSqlByWzId(213);
		$sql_final 	= "select *,$extender from $tab where wz_id IN ($sql)"; 

		return dbx::queryAll($sql_final);
	}


}