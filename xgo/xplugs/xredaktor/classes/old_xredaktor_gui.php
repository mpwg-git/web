<?

class xredaktor_gui
{

	private static $renderReadOnly = false;

	public static function handleAjax($function,$param0,$param1,$param2)
	{
		switch ($function)
		{

			case 'unPublish':

				$wz_id 		= intval($_REQUEST['wz_id']);
				$wz_r_id 	= intval($_REQUEST['wz_r_id']);

				wzx_static::unpublish($wz_id,$wz_r_id,false);

				frontcontrollerx::json_success();
				break;

			case 'publish':

				$wz_id 		= intval($_REQUEST['wz_id']);
				$wz_r_id 	= intval($_REQUEST['wz_r_id']);

				wzx_static::publish($wz_id,$wz_r_id,false);

				frontcontrollerx::json_success();
				break;

			case 'testStatic':

				$db = wzx_static::toStatic(559,6);
				print_r($db);
				die();

				break;

			case 'resolvevId':

				$id 	= 0;
				$type 	= $_REQUEST['type'];
				$vid 	= intval($_REQUEST['vid']);

				switch ($type)
				{
					case 'FRAME':
					case 'ATOM':
					case 'WIZARD':
						$id = intval(dbx::queryAttribute("select a_id from atoms where a_vid = $vid","a_id"));
						break;
					default: break;
				}

				frontcontrollerx::json_success(array('id'=>$id));

				break;

				#######################################################   forms_fe_tree ###########################################################################
			case 'forms_fe_tree':

				$f_a_id = intval($_REQUEST['a_id']);
				if ($f_a_id == 0) frontcontrollerx::json_failure("a_id = 0");

				$a = xredaktor_atoms::getById($f_a_id);
				$f_s_id = intval($a['a_s_id']);

				if ($f_s_id == 0) frontcontrollerx::json_failure("f_s_id = 0");


				$extFunctionsConfig = array(
				'table'				=> 'forms',
				'sort'				=> 'f_sort',
				'pid'				=> 'f_id',
				'fid'				=> 'f_fid',
				'del'				=> 'f_del',
				'name'				=> 'f_name',
				'extraInsert'		=> array('f_created' => 'NOW()', 'f_type' => 'FE', 'f_a_id' => $f_a_id, 'f_s_id' => $f_s_id),
				'extraLoad'			=> " f_s_id = '$f_s_id' and  f_a_id = '$f_a_id' ",
				'fields'			=> array('f_id','f_sort','f_name'),
				'update'			=> array('f_sort','f_name'),

				/*
				'_select'			=> '*',
				'_selectTables'		=> array('storage'),
				'_selectWhere'		=> array('f_s_id = s_id'),
				*/

				'normalize'	=> array(
				'string'	=> array('f_name'),
				'int'		=> array('f_sort'),
				));

				xredaktor_defaults::handleDefaultExtTree($extFunctionsConfig,$param0);
				frontcontrollerx::error_func_notfound();
				break;

				#######################################################   forms_fe_grid_source ###########################################################################
			case 'forms_fe_tree_source':

				$as_a_id = intval($_REQUEST['a_id']);
				if ($as_a_id == 0) frontcontrollerx::json_failure("a_id = 0");

				$f_id = intval($_REQUEST['f_id']);
				$s_id = intval(dbx::queryAttribute("select a_s_id from atoms,forms where f_id = $f_id and f_a_id = a_id","a_s_id"));

				$extFunctionsConfig = array(
				'childrenCount'		=> true,
				'table'				=> 'atoms_settings',
				'sort'				=> 'as_sort',
				'pid'				=> 'as_id',
				'fid'				=> 'as_fid',
				'del'				=> 'as_del',
				'name'				=> 'as_name',
				'extraLoad'			=> "as_a_id = '$as_a_id'
				
				
				and 
				
				(
				
				(
					as_type = 'UNDEFINED'
				)
				
				OR
				
				
				(
				  as_type in (select fm_type from forms_mappings where fm_s_id = $s_id and fm_avail_fe = 'Y' and fm_del='N')  
				)
				
				)
				
				",


				/*

				and as_id NOT IN (select fas_as_id from forms_atoms_settings where fas_f_id = $f_id and fas_del='N')

				*/


				'fields'			=> array('as_id','as_sort','as_name','as_type'),
				'update'			=> array(),
				'normalize'	=> array(
				'string'	=> array('as_name'),
				'int'		=> array('as_sort'),
				));

				xredaktor_defaults::handleDefaultExtTree($extFunctionsConfig,$param0);
				frontcontrollerx::error_func_notfound();

				break;

				#######################################################   forms_fe_grid_final ###########################################################################
			case 'forms_fe_tree_final':






				$preSelect = ", (select as_type from atoms_settings where as_id = fas_as_id) as as_type, (select as_name from atoms_settings where as_id = fas_as_id) as as_name ";


				switch ($param0)
				{
					case '':
						break;

					case 'getInfosOfFasItem':

						$fas_id = intval($_REQUEST['fas_id']);
						if ($fas_id == 0) frontcontrollerx::json_failure("FAS_ID");

						$as = dbx::query("select atoms_settings.as_type from atoms_settings,forms_atoms_settings where fas_id = $fas_id and fas_as_id = as_id");
						if ($as === false) {
							$fm_config_wz_id = intval(dbx::queryAttribute("select fm_config_wz_id from forms_atoms_settings, forms_mappings, atoms_settings where fas_id = $fas_id and fm_type = CONCAT('GUI_',fas_gui_type)","fm_config_wz_id"));
							if ($fm_config_wz_id == 0)
							{
								frontcontrollerx::json_success(array('wz_id'=>false));
							}

						} else {
							$as_type 			= $as['as_type'];
							$fm_config_wz_id	= intval(dbx::queryAttribute("select fm_config_wz_id from forms_atoms_settings, forms_mappings, atoms_settings where fas_id = $fas_id and fas_as_id = as_id and fm_type = as_type","fm_config_wz_id"));
						}

						if ($fm_config_wz_id == 0)
						{
							$table 	= "xtypes_defaults";
							$vid 	= 6102;
						} else {

							$table  = xredaktor_wizards::genWizardTableNameByVID($fm_config_wz_id);

							if ($table === false)
							{
								frontcontrollerx::json_success(array('wz_id'=>false));
							}

							$vid 	= $fm_config_wz_id;
						}

						$wz_title = trim(dbx::queryAttribute("select fas_name from forms_atoms_settings where fas_id = $fas_id","fas_name"));
						if ($wz_title == "")
						{
							$wz_title = trim(dbx::queryAttribute("select as_name from atoms_settings,forms_atoms_settings where fas_id = $fas_id and as_id = fas_as_id","as_name"));
						}

						$wz_r_id 	= dbx::upsert($table,'wz_id',array('wz_id'=>$fas_id),array('wz_created'=>'NOW()'));

						frontcontrollerx::json_success(array('wz_vid'=>$vid,'wz_r_id'=>$wz_r_id,'wz_title'=>$wz_title));

						break;
					case 'render':

						$f_id = intval($_REQUEST['f_id']);
						xredaktor_forms::defaultFeRenderById($f_id);
						die();


						break;
					case 'drop':



						$fas_type 		= $_REQUEST['fas_type'];
						$fas_fid 		= intval($_REQUEST['fas_fid']);
						$fas_f_id 		= intval($_REQUEST['fas_f_id']);
						$fas_gui_type 	= $_REQUEST['fas_gui_type'];
						$fas_id 		= intval($_REQUEST['fas_id']);
						$fas_as_id 		= intval($_REQUEST['fas_as_id']);

						if (!in_array($fas_type,array('GUI','AS'))) die('1');


						if ($fas_type == "GUI")
						{
							if (!in_array($fas_gui_type,array('tabpanel','step','fieldcontainer','grid','grid_column','row','tab'))) die('2');
						}



						if ($fas_id == 0) // NEW
						{

							$fas_sort = dbx::queryAttribute("select (max(fas_sort)+1) as maxx from forms_atoms_settings where fas_f_id = $fas_f_id ","maxx");

							dbx::insert('forms_atoms_settings',array(
							'fas_type' 		=> $fas_type,
							'fas_as_id' 	=> $fas_as_id,
							'fas_fid' 		=> $fas_fid,
							'fas_f_id' 		=> $fas_f_id,
							'fas_gui_type' 	=> $fas_gui_type,
							'fas_sort'		=> $fas_sort
							));

							$fas_id = dbx::getLastInsertId();
							$ret = dbx::query("select * $preSelect from forms_atoms_settings where fas_id = $fas_id");

						} else
						{
							/*
							dbx::update('forms_atoms_settings',array(
							'fas_fid' 		=> $fas_fid,
							),array('fas_id'=>$fas_id));
							$ret = dbx::query("select * $preSelect from forms_atoms_settings where fas_id = $fas_id");
							*/
						}


						frontcontrollerx::json_success(array('db'=>$ret));
						break;
					default: break;
				}



				$f_id = intval($_REQUEST['f_id']);


				$sql = "update forms_atoms_settings,atoms_settings set fas_name = as_label where fas_f_id = $f_id and fas_name = '' and fas_del='N' and fas_as_id = as_id and fas_type='AS'";
				//$sql = "update forms_atoms_settings,atoms_settings set fas_name = as_label where fas_f_id = $f_id and fas_del='N' and fas_as_id = as_id and fas_type='AS'";
				dbx::query($sql);


				if ($f_id>0)
				{
					$present = dbx::query("select * from forms_settings where wz_id = $f_id");
					if ($present === false)
					{
						dbx::insert('forms_settings',array('wz_id'=>$f_id));
					}
				}



				$extFunctionsConfig = array(
				'table'				=> 'forms_atoms_settings',
				'sort'				=> 'fas_sort',
				'pid'				=> 'fas_id',
				'fid'				=> 'fas_fid',
				'del'				=> 'fas_del',
				'name'				=> 'fas_name',
				'extraLoad'			=> " fas_f_id = $f_id",
				'preSelect'			=> $preSelect,
				'fields'			=> array('fas_id','fas_sort','fas_name','fas_gui_type','fas_as_id','fas_type','as_type','fas_sort','fas_placeholder','fas_required','fas_validator','fas_col_xs','fas_col_sm','fas_col_md','fas_col_lg','fas_row','fas_css_class','as_name'),
				'update'			=> array('fas_placeholder','fas_required','fas_validator','fas_col_xs','fas_col_sm','fas_col_md','fas_col_lg','fas_row','fas_css_class','fas_name'),
				'normalize'	=> array(
				'string'	=> array('fas_name','fas_required','fas_validator','fas_placeholder','fas_css_class'),
				'int'		=> array('fas_sort','fas_col_xs','fas_col_sm','fas_col_md','fas_col_lg','fas_row'),
				));

				xredaktor_defaults::handleDefaultExtTree($extFunctionsConfig,$param0);
				frontcontrollerx::error_func_notfound();
				break;

				#######################################################   img_gallery ###########################################################################
			case 'img_gallery':

				switch ($param0)
				{
					case 'thumb':

						$as_id 	= intval($param1);
						$s_id 	= intval($param2);

						if  ($s_id == 0)
						{
							$s_id = 319;
						}

						$thumb_w = 0;
						$thumb_h = 0;

						if ($as_id != 0)
						{
							$as = xredaktor_atoms_settings::getById($as_id);
							if ($as !== false)
							{
								$json_as_config = json_decode($as['as_config'],true);
								if (intval($json_as_config['thumb_w']) > 0)
								{
									$thumb_w = intval($json_as_config['thumb_w']);
									$thumb_h = intval($json_as_config['thumb_h']);
								}
							}
						}

						if (intval($thumb_w) == 0) $thumb_w = 200;
						if (intval($thumb_h) == 0) $thumb_h = 200;


						$img = xredaktor_storage::xr_img2(array(
						s_id 		=> $s_id,
						w 			=> $thumb_w,
						h 			=> $thumb_h,
						q 			=> 85,
						fullpath 	=> 'Y',
						rmode		=> 'cco',
						ext			=> 'png',
						));

						$fullPath = $img['src'];
						imagesx::readfile_if_modified($fullPath,array('Content-Type: image/png'));
						die();

						break;
					default: break;
				}

				$as_id 		= intval($_REQUEST['as_id']);
				$wz_r_id 	= intval($_REQUEST['wz_id']);

				if ($as_id == 0) 	frontcontrollerx::json_failure('Invalid as_id');
				if ($wz_r_id == 0) 	frontcontrollerx::json_failure('Invalid wz_id');

				switch ($param0)
				{
					case 'upload':

						self::handleContainerFileUploads(array(

						'm_id' => -1,
						'r_id' => $wz_r_id,
						'f_id' => $as_id,

						));

						break;
					default: break;
				}

				$as = xredaktor_atoms_settings::getById($as_id);
				if ($as === false) frontcontrollerx::json_failure('as not found');

				$table 	= xredaktor_wizards::handle_CONTAINER_FILES_table($as);
				if ($table === false) frontcontrollerx::json_failure('filestable not found');

				$extFunctionsConfig = array(
				'table'				=> $table,
				'sort'				=> 'wz_sort',
				'pid'				=> 'wz_id',
				'fid'				=> '',
				'del'				=> 'wz_del',
				'name'				=> 'wz_id',
				'extraInsert'		=> array('wz_created' => 'NOW()', 'wz_r_id' => $wz_r_id),
				'extraLoad'			=> " wz_r_id = '$wz_r_id' ",
				'fields'			=> array('wz_id','wz_sort'),
				'update'			=> array('wz_sort'),


				'_select'			=> '*',
				'_selectTables'		=> array('storage'),
				'_selectWhere'		=> array('wz_s_id = s_id'),

				'normalize'	=> array(
				'string'	=> array(),
				'int'		=> array(),
				));

				xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$param0);
				frontcontrollerx::error_func_notfound();

				break;

				#######################################################   sw2w ###########################################################################
			case 'sw2w':

				$as_id  = intval($_REQUEST['as_id']);
				$as 	= dbx::query("select * from atoms_settings where as_id = $as_id and as_del='N'");
				$wz_id 	= intval($as['as_config']);


				if (is_numeric($_REQUEST['initValue']) && !(isset($_REQUEST['_query']))) {

					$iv 	= intval($_REQUEST['initValue']);
					$table 	= xredaktor_wizards::genWizardTableNameBy_a_id($wz_id);
					$r 		= dbx::query("select * from $table where wz_id = $iv and wz_del='N' ");

					$titleIt 		= xredaktor_wizards::getWizardRecordDataTitleByConfig($wz_id,$iv);
					$r['titleIt'] 	= $titleIt;

					frontcontrollerx::json_store(array($r));
					die();
				}

				$_REQUEST['titleIt'] 	= 1;
				$_REQUEST['domagic'] 	= $wz_id;
				$_REQUEST['doPaging'] 	= 1;

				$as_id			= intval($_REQUEST['as_id']);
				$as				= xredaktor_atoms_settings::getById($as_id);
				$wz_id 			= intval($as['as_config']);
				$main_record_id	= intval($_REQUEST['wzListScopeID']);
				$as_gui_mode	= $as['as_gui_mode'];
				$published		= ($_REQUEST['published'] == '1');
				$published		= false;

				switch ($param0)
				{
					case 'load':

						if (($as_id == 0) || ($wz_id == 0) || ($main_record_id == 0))
						{
							die('CONFIG');
						}

						$fromFatherId = 0;

						if ($as_gui_mode == "3" && isset($_REQUEST['node']))
						{
							$fromFatherId = intval($_REQUEST['node']);
						}

						$foreignData = self::getGenericDataSets2($wz_id,$main_record_id,$wz_id,$as['as_a_id'],false,$fromFatherId,$published);

						$nodes = array();

						foreach ($foreignData as $fdata)
						{

							$title 	= xredaktor_wizards::getWizardRecordDataTitleByConfig($wz_id,intval($fdata['wz_id']));

							switch ($as_gui_mode) {
								case '3': // tree

								$nodes[] = array(
								'checked'	=> ($fdata['wz_n2n_check'] == '1'),
								'wz_NAME'		=> $title,
								'wz_id'			=> $fdata['wz_id'],
								'wz_fid'		=> $fdata['wz_fid'],
								'wz_sort'		=> $fdata['wz_sort'],
								'_is_dir'		=> $fdata['_is_dir'],
								'del_id'		=> $fdata['del_id']
								);
								break;

								default:
									$nodes[] = array(
									'wz_n2n_check'	=> ($fdata['wz_n2n_check'] == '1'),
									'titleIt'		=> $title,
									'wz_id'			=> $fdata['wz_id']
									);
									break;
							}

						}

						// TODO proper way to do

						switch($as_gui_mode)
						{
							case '3': // tree

							$table 	= xredaktor_wizards::genWizardTableNameBy_a_id($as['as_config']);

							$fields = array('wz_id','wz_sort', 'wz_fid', 'wz_NAME', 'wz_del', '_is_dir_', 'checked', 'del_id');

							$extFunctionsConfig = array(
							'table'		=> $table,
							'pid'		=> 'wz_id',
							'fields'	=> $fields,
							);

							echo frontcontrollerx::array2jsonTree($extFunctionsConfig,$nodes);
							die();

							break;
							default:
								frontcontrollerx::json_store($nodes);
								break;
						}

						break;

					case 'updateCheck':

						$field = $_REQUEST['field'];
						if ($field != 'wz_n2n_check' && !isset($_REQUEST['nocheck'])) frontcontrollerx::json_failure('wz_n2n_check not set');

						$checked 	= ($_REQUEST['value'] == 'on');
						$wz_id 		= intval($_REQUEST['wzListScopeID']);
						$id 		= intval($_REQUEST['id']);
						$as_id		= intval($_REQUEST['as_id']);
						$value		= dbx::escape($_REQUEST['value']);
						$values 	= array($id);

						if ($value == 'off')
						{
							xredaktor_gui::setGenericDataSets2($as_id,$wz_id,$values,false,true);
						}
						else {
							xredaktor_gui::setGenericDataSets2($as_id,$wz_id,$values,false);
						}


						frontcontrollerx::json_success();
						break;

					case 'move':

						switch($as_gui_mode)
						{
							case '3': // tree

							$table 	= xredaktor_wizards::genWizardTableNameBy_a_id($as['as_config']);

							$fields = array('wz_id','wz_sort', 'wz_fid', 'wz_NAME', 'wz_del');

							$extFunctionsConfig = array(
							'table'		=> $table,
							'sort'		=> 'wz_sort',
							'pid'		=> 'wz_id',
							'fid'		=> 'wz_fid',
							'name'		=> 'wz_NAME',
							'del'		=> 'wz_del',

							//'extraInsert' => array('t_created' => 'NOW()'),
							//'extraLoad'	=> "t_del = 'N' ",
							'fields'	=> $fields,
							//'update'	=> $update,
							//'normalize'	=> array(
							//'string'	=> $string)
							);

							xredaktor_defaults::handleDefaultExtTree($extFunctionsConfig,$param0);

							break;
							default:
								break;
						}

						break;

					default: break;
				}


				//xredaktor_wizards::wizard_do_magic_grid('load');

				break;

				####################################################### / sw2w ###########################################################################

				#######################################################   uw2w ###########################################################################

			case 'uw2w':

				$as_id  = intval($_REQUEST['as_id']);
				$as 	= dbx::query("select * from atoms_settings where as_id = $as_id and as_del='N'");
				$wz_id 	= intval($as['as_config']);


				if (is_numeric($_REQUEST['initValue']) && !(isset($_REQUEST['_query']))) {

					$iv 	= intval($_REQUEST['initValue']);
					$table 	= xredaktor_wizards::genWizardTableNameBy_a_id($wz_id);
					$r 		= dbx::query("select * from $table where wz_id = $iv and wz_del='N' ");

					$titleIt 		= xredaktor_wizards::getWizardRecordDataTitleByConfig($wz_id,$iv);
					$r['titleIt'] 	= $titleIt;

					frontcontrollerx::json_store(array($r));
					die();
				}

				$_REQUEST['titleIt'] 	= 1;
				$_REQUEST['domagic'] 	= $wz_id;
				$_REQUEST['doPaging'] 	= 1;
					$published		= ($_REQUEST['published'] == '1');
					$published		= false;


				$as_id			= intval($_REQUEST['as_id']);
				$as				= xredaktor_atoms_settings::getById($as_id);
				$wz_id 			= intval($as['as_config']);
				$main_record_id	= intval($_REQUEST['wzListScopeID']);
				$as_gui_mode	= $as['as_gui_mode'];

				switch ($param0)
				{
					case 'load':

						if (($as_id == 0) || ($wz_id == 0) || ($main_record_id == 0))
						{
							die('CONFIG');
						}

						$fromFatherId = false;

						if ($as_gui_mode == "3" && isset($_REQUEST['node']))
						{
							$fromFatherId = intval($_REQUEST['node']);
						}


						$wz_id_1		= $as['as_a_id'];
						$wz_id_field_1 	= $as['as_id'];
						$wz_id_field_2 	= $as['as_config'];

						$wz_id_2		= intval($as['as_config']);

						$wz_id_field_2_name = $as2['as_name'];

						$return_wz_id	= intval($_REQUEST['wzListScopeID']);

						$foreignData = self::getUniqueDataSetsNew($wz_id_1,$wz_id_2, $wz_id_field_1, $wz_id_field_2, $wz_id_field_2_name, $return_wz_id, false,$fromFatherId,$published);

						$nodes = array();

						foreach ($foreignData as $fdata)
						{

							$title = self::getUniqueDataSetTitle($as_id);

							switch ($as_gui_mode) {
								case '3': // tree
								$nodes[] = array(
								'checked'		=> ($fdata['wz_n2n_check'] == '1'),
								'wz_NAME'		=> $fdata['wz_'.$wz_id_field_2_name],
								'wz_id'			=> $fdata['wz_id'],
								'wz_fid'		=> $fdata['wz_fid'],
								'wz_sort'		=> $fdata['wz_sort'],
								'_is_dir'		=> $fdata['_is_dir'],
								'del_id'		=> $fdata['del_id']
								);
								break;

								default:
									$nodes[] = array(
									'wz_n2n_check'	=> ($fdata['wz_n2n_check'] == '1'),
									'titleIt'		=> $fdata['wz_'.$wz_id_field_2_name],
									'wz_id'			=> $fdata['wz_id']
									);
									break;
							}

						}

						// TODO proper way to do

						switch($as_gui_mode)
						{
							case '3': // tree

							$table 	= xredaktor_wizards::genWizardTableNameBy_a_id($as['as_config']);

							$fields = array('wz_id','wz_sort', 'wz_fid', 'wz_NAME', 'wz_del', '_is_dir_', 'checked', 'del_id', 'wz_n2n_check');

							$extFunctionsConfig = array(
							'table'		=> $table,
							'pid'		=> 'wz_id',
							'fields'	=> $fields,
							);


							echo frontcontrollerx::array2jsonTree($extFunctionsConfig,$nodes);
							die();

							break;
							default:
								frontcontrollerx::json_store($nodes);
								break;
						}

						break;

					case 'updateCheck':

						$field = $_REQUEST['field'];
						if ($field != 'wz_n2n_check' && !isset($_REQUEST['nocheck'])) frontcontrollerx::json_failure('wz_n2n_check not set');

						$checked 	= ($_REQUEST['value'] == 'on');
						$wz_id 		= intval($_REQUEST['wzListScopeID']);
						$id 		= intval($_REQUEST['id']);
						$as_id		= intval($_REQUEST['as_id']);
						$value		= dbx::escape($_REQUEST['value']);
						$values 	= array($id);


						$as 	= xredaktor_atoms_settings::getById($as_id);
						if ($as === false) 	return false;

						$wz_a			= $as['as_a_id'];
						$wz_a_field 	= $as['as_id'];
						$wz_b_field 	= $as['as_config'];

						$as2			= xredaktor_atoms_settings::getById($as['as_config']);
						$wz_b			= $as2['as_a_id'];


						if ($value == 'off')
						{
							xredaktor_gui::setUniqueDataSetsNew($as_id,$wz_id,$values,false,true);
						}
						else {
							xredaktor_gui::setUniqueDataSetsNew($as_id,$wz_id,$values,false);
						}

						frontcontrollerx::json_success();
						break;

					case 'move':

						switch($as_gui_mode)
						{
							case '3': // tree

							$table 	= xredaktor_wizards::genWizardTableNameBy_a_id($as['as_config']);

							$fields = array('wz_id','wz_sort', 'wz_fid', 'wz_NAME', 'wz_del');

							$extFunctionsConfig = array(
							'table'		=> $table,
							'sort'		=> 'wz_sort',
							'pid'		=> 'wz_id',
							'fid'		=> 'wz_fid',
							'name'		=> 'wz_NAME',
							'del'		=> 'wz_del',

							//'extraInsert' => array('t_created' => 'NOW()'),
							//'extraLoad'	=> "t_del = 'N' ",
							'fields'	=> $fields,
							//'update'	=> $update,
							//'normalize'	=> array(
							//'string'	=> $string)
							);

							xredaktor_defaults::handleDefaultExtTree($extFunctionsConfig,$param0);

							break;
							default:
								break;
						}

						break;

					default: break;
				}


				//xredaktor_wizards::wizard_do_magic_grid('load');

				break;
				####################################################### / uw2w ###########################################################################

			case 'searchInField':

				$as_id  = intval($_REQUEST['as_id']);
				$as 	= dbx::query("select * from atoms_settings where as_id = $as_id and as_del='N'");

				if ($_REQUEST['useAsId'] == 1)
				{
					$wz_id = $as_id;
				}
				else
				{
					$wz_id 	= intval($as['as_config']);
				}

				if (is_numeric($_REQUEST['initValue']) && !(isset($_REQUEST['_query']))) {

					$iv 	= intval($_REQUEST['initValue']);
					$table 	= xredaktor_wizards::genWizardTableNameBy_a_id($wz_id);

					$r 		= dbx::query("select * from $table where wz_id = $iv and wz_del='N' ");

					$titleIt 		= xredaktor_wizards::getWizardRecordDataTitleByConfig($wz_id,$iv);
					$r['titleIt'] 	= $titleIt;

					frontcontrollerx::json_store(array($r));
					die();
				}

				$_REQUEST['titleIt'] 	= 1;
				$_REQUEST['domagic'] 	= $wz_id;
				$_REQUEST['doPaging'] 	= 1;

				xredaktor_wizards::wizard_do_magic_grid('load');

				break;

			case 'getInfopoolRecord':

				$wz_id 		= intval($_REQUEST['wz_id']);
				$r_id 		= intval($_REQUEST['r_id']);
				$r			= xredaktor_wizard_do_magic_grid::getRecordById($wz_id,$r_id);

				$wz_path	= implode("/",array_reverse(explode("/",xredaktor_atoms::getTreePathOfAtoms($wz_id))));
				if ($wz_path != "") $wz_path = "/".$wz_path;

				$titleIt	= $r['titleIt'];

				$d = array(
				'wz_id'		=> $wz_id,
				'r_id'		=> $r_id,
				'titleIt'	=> $titleIt,
				'wz_path'	=> $wz_path,
				'IR_TITLEIT'=> self::getInfoPoolRecordById($wz_id,$r_id)
				);

				$ret = array(
				'd' => $d
				);

				frontcontrollerx::json_success($ret);

				break;

			case 'getAtomSettings':

				$a_id 	= intval($_REQUEST['a_id']);
				$atom 	= xredaktor_atoms::getById($a_id);
				$path 	= xredaktor_atoms::getTreePathOfAtoms($a_id);

				$path 	= implode("/",array_reverse(explode("/",$path)));
				$ret 	= array(

				'atom' => $atom,
				'path' => $path,

				);
				frontcontrollerx::json_success($ret);
				break;

			case 'getTimemachineSettings':

				$tm_id 	= intval($_REQUEST['tm_id']);

				$tm 	= xredaktor_timemachine::getById($tm_id);
				$path 	= xredaktor_timemachine::getTreePath($tm_id);

				$path 	= implode("/",array_reverse(explode("/",$path)));
				$ret 	= array(
				'tm'	=> $tm,
				'path' 	=> $path,
				);

				frontcontrollerx::json_success($ret);

			case 'getDirSettings':

				$s_id 	= intval($_REQUEST['s_id']);

				$file	= xredaktor_storage::getById($s_id);
				$path 	= xredaktor_storage::getTreePathOfFile($s_id);

				$path 	= implode("/",array_reverse(explode("/",$path)));
				$ret 	= array(

				'file' => $file,
				'path' => $path,

				);
				frontcontrollerx::json_success($ret);

				break;


			case 'getPageSettings':

				$p_id 	= intval($_REQUEST['p_id']);
				$page 	= xredaktor_pages::getById($p_id);
				$path 	= xredaktor_pages::getTreePathOfPages($p_id);

				$path 	= implode("/",array_reverse(explode("/",$path)));
				$ret 	= array(

				'page' => $page,
				'path' => $path,

				);
				frontcontrollerx::json_success($ret);

				break;
			case 'loadByPSA_ID':
				self::loadByPSA_ID();
				break;

			case 'pageSettings_load':
				self::pageSettings_load();
				break;

			case 'getFormSettingsViaVID':
				$vid = frontcontrollerx::isInt($_REQUEST['vid']);
				$ret = xredaktor_gui::renderFormViaVid($vid);
				frontcontrollerx::json_success($ret);
				break;
			case 'getFormSettingsViaID':
				$r_id 	= intval($_REQUEST['r_id']);
				$id 	= frontcontrollerx::isInt($_REQUEST['id']);
				$ret 	= xredaktor_gui::renderFormViaId($id,$r_id);
				frontcontrollerx::json_success($ret);
				break;

			case 'container-files-load':
				self::getContainerFiles();
				break;

			case 'container-files-sort':
				self::handleFileSorting();
				break;

			case 'container-files-meta':
				self::handleFileMeta();
				break;

			case 'container-files-delete':
				self::handleFileDeletion();
				break;

			case 'container-files-upload':
				self::handleContainerFileUploads();
				break;

			case 'container-files-add':
				self::handleFileAdd();
				break;

			default: die('x');
		}
	}

	public static function loadByPSA_ID()
	{

		$psa_id 	= frontcontrollerx::isInt($_REQUEST['psa_id']);
		$psa 		= xredaktor_render::getPSARecordById($psa_id);

		if ($psa === false) frontcontrollerx::json_failure("PSA_ID ist ungültig !");

		$psa_a_id 	= $psa['psa_inline_a_id'];
		$psa_p_id 	= $psa['psa_p_id'];

		if (trim($psa['psa_json_cfg'])=="")
		{
			$psa['psa_json_cfg'] = array();
			$psa['psa_json_cfg'] = json_encode($psa['psa_json_cfg']);
		}

		$ret = array(
		'data'  => json_decode($psa['psa_json_cfg'],true),
		'psa_id'=> $psa_id,
		'gui' 	=> self::renderFormViaId($psa_a_id)
		);

		frontcontrollerx::json_success($ret);
	}

	public static function pageSettings_load()
	{
		$p_id 		= frontcontrollerx::isInt($_REQUEST['p_id']);
		$f			= xredaktor_render::getFrameByPageId($p_id);
		$a_id		= $f['a_id'];

		$wz_table 	= xredaktor_wizards::genWizardTableNameBy_a_id($a_id);
		$as_all 	= dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del = 'N' and as_gui  in ('NORMAL','READONLY') order by as_sort");

		$rec = dbx::query("select * from pages_settings_atoms where psa_as_id = 0 and psa_p_id = $p_id and psa_a_id = $a_id and psa_fid=0");#

		if ($rec === false)
		{
			dbx::insert('pages_settings_atoms',array('psa_as_id'=>0,'psa_p_id'=>$p_id,'psa_a_id'=>$a_id,'psa_fid'=>0));
			$psa_id = dbx::getLastInsertId();
		} else
		{
			$data 	= json_decode($rec['psa_json_cfg'],true);
			$psa_id = $rec['psa_id'];
		}

		$ret = array(
		'data'  => $data,
		'psa_id'=> $psa_id,
		'gui' 	=> self::renderFormViaId($a_id)
		);

		frontcontrollerx::json_success($ret);
	}


	public static function handleFileMeta()
	{
		$as_id 	= intval($_REQUEST['as_id']);
		$del_id = intval($_REQUEST['del_id']);

		$as 	= xredaktor_atoms_settings::getById($as_id);
		$table  = xredaktor_wizards::handle_CONTAINER_FILES_table($as);

		if (isset($_REQUEST['data']))
		{
			$meta = $_REQUEST['data'];
			dbx::update($table,array('wz_meta_data'=>$meta),array('wz_id'=>$del_id));
		}

		$cfg    = dbx::query("select * from $table where wz_id = $del_id");

		frontcontrollerx::json_success(array('cfg'=>$cfg));
	}

	public static function handleFileDeletion()
	{
		$as_id 	= intval($_REQUEST['as_id']);
		$del_id = intval($_REQUEST['del_id']);

		$success = self::delFileItem($as_id,$del_id);
		frontcontrollerx::json_success(array('success'=>$success));
	}

	public static function handleFileSorting()
	{
		$as_id	= intval($_REQUEST['as_id']);
		$wz_id 	= intval($_REQUEST['wz_id']);

		$as = dbx::query("select * from atoms_settings where as_id = $as_id and as_del='N'");

		$table_name = xredaktor_wizards::handle_CONTAINER_FILES_table($as);
		if ($table_name === false) frontcontrollerx::json_failure('AS_ERROR');

		$sort = explode(",",$_REQUEST['sort']);
		foreach ($sort as $wz_sort => $id)
		{
			$wz_sort 	= intval($wz_sort);
			$id 		= intval($id);

			if ($id == 0) continue;

			dbx::update($table_name,array('wz_sort'=>$wz_sort),array('wz_id'=>$id));
		}


		frontcontrollerx::json_success(array('success'=>$success));
	}

	public static function delFileItem($as_id,$del_id)
	{
		$del_id = intval($del_id);
		if ($del_id == 0) 	return false;

		$as_id 	= intval($as_id);
		$as 	= xredaktor_atoms_settings::getById($as_id);
		if ($as === false) 	return false;

		$table = xredaktor_wizards::handle_CONTAINER_FILES_table($as);
		if ($table === false) return false;

		$cfg = dbx::query("select * from $table where wz_id = $del_id");
		dbx::update($table,array('wz_del'=>'Y'),array('wz_id'=>$del_id));

		$s_id = intval($cfg['wz_s_id']);
		xredaktor_storage::rawFileDel($s_id);

		return true;
	}

	public static function getContainerFiles()
	{
		$as_id  = intval($_REQUEST['f_id']);
		$wz_id 	= intval($_REQUEST['r_id']);

		$as		= xredaktor_atoms_settings::getById($as_id);
		$items 	= self::getImageItems($as,$wz_id);

		$ret = array('cfg'=>array('items'=>$items,'lazy'=>false,'as_type' => $as['as_type']));

		frontcontrollerx::json_success($ret);
	}


	private static function validFileType($as,$fileName)
	{
		$ext 		= strtolower(hdx::getFileExtension($fileName));
		if ($ext == "") return false;

		$ext_block 	= array('sh','exe','bat','com');
		$ext_imgs 	= array('bmp','jpeg','jpg','gif','png');

		$as_type = $as['as_type'];

		switch ($as_type)
		{
			case 'CONTAINER-FILES':
				if (in_array($ext,$ext_block)) return false;
				break;
			case 'CONTAINER-IMAGES':
				if (!in_array($ext,$ext_imgs)) return false;
				break;
		}

		return true;
	}

	public static function handleContainerFileUploads($cfg=false)
	{

		if ($cfg === false)
		{
			$cfg = $_REQUEST;
		}

		$as_id  = intval($cfg['f_id']);
		$wz_id 	= intval($cfg['r_id']);
		$m_id 	= $cfg['m_id'];

		$file 	= $_FILES['files'];

		$as 	= xredaktor_atoms_settings::getById($as_id);
		$s_f_id = intval($as['as_config']);

		if ($s_f_id == 0)
		{
			$as_config = json_decode($as['as_config'],true);
			$s_f_id = intval($as_config['s_id']);
		}


		$success 	= false;
		$id 		= 0;

		if ($s_f_id != 0)
		{
			$file_tmp 	= $file['tmp_name'];
			$file_name 	= $file['name'];
			$file_type 	= $file['type'];
			$file_size	= intval($file['size']);

			// CHROME PASTE
			if (($file_name == 'undefined') && ($file_size > 0) && ($file_type == "image/png"))
			{
				$file_name 	= "copy_paste.png";
				$mtype 		= mime_content_type($file_tmp);

				if ($file_type != $mtype)
				{
					frontcontrollerx::json_success(array('ok'=>false,'error'=>$file_name.' hat einen falschen File-Typ für COPY&PASTE:'+$mtype));
				}

			} else {
				if (!self::validFileType($as,$file_name))
				{
					frontcontrollerx::json_success(array('ok'=>false,'error'=>$file_name.' hat einen falschen File-Typ.'));
				}
			}

			if (file_exists($file_tmp)) {

				$table = xredaktor_wizards::handle_CONTAINER_FILES_table($as);
				if ($table !== false) {

					$success 	= true;
					$s_name 	= "record_".$as_id."_".$wz_id;

					$s_f_id_record = xredaktor_storage::createDir($s_f_id,$s_name);

					if ($s_f_id_record === false) {
						frontcontrollerx::json_success(array('ok'=>false,'error'=>"Datensatzverzeichnis ($s_f_id) konnte nicht angelegt werden."));
					}

					$s_id = xredaktor_storage::registerFileInStorage($s_f_id_record,$file_tmp,$file_name,true);

					if ($s_id === false) {
						frontcontrollerx::json_success(array('ok'=>false,'error'=>'Register fehlgeschlagen.'));
					}

					$wz_sort 	= dbx::queryAttribute("select max(wz_sort) as maxx from $table where wz_r_id = $wz_id","maxx");

					$data = array(
					'wz_sort' 		=> intval($wz_sort)+1,
					'wz_del' 		=> 'N',
					'wz_s_id' 		=> $s_id,
					'wz_r_id' 		=> $wz_id,
					'wz_created' 	=> 'NOW()',
					);

					dbx::insert($table,$data);
					$id = dbx::getLastInsertId();

					$fullInfo = dbx::query("select * from $table,storage where wz_id = $id and wz_s_id = s_id");

					frontcontrollerx::json_success(array('ok'=>true,'id'=>$id,'f_id'=>$as_id,'wz_id'=>$wz_id,'m_id'=>$m_id,'fullInfo'=>$fullInfo));

				} else {
					frontcontrollerx::json_success(array('ok'=>false,'error'=>'Feld hat keine gültige DIR-ID 0'));
				}

			} else {
				frontcontrollerx::json_success(array('ok'=>false,'error'=>'Tempfile nicht gefunden'));
			}
		}
		frontcontrollerx::json_success(array('ok'=>false,'error'=>'Feld hat keine gültige DIR-ID 1'));
	}

	public static function handleFileAdd()
	{
		$as_id  = intval($_REQUEST['f_id']);
		$wz_id 	= intval($_REQUEST['r_id']);
		$s_id 	= intval($_REQUEST['s_id']);

		$as 	= xredaktor_atoms_settings::getById($as_id);
		$table 	= xredaktor_wizards::handle_CONTAINER_FILES_table($as);

		$wz_sort = dbx::queryAttribute("select max(wz_sort) as maxx from $table where wz_r_id = $wz_id","maxx");

		$data = array(
		'wz_sort' 		=> intval($wz_sort)+1,
		'wz_fa_item' 	=> 'Y',
		'wz_del' 		=> 'N',
		'wz_s_id' 		=> $s_id,
		'wz_r_id' 		=> $wz_id,
		'wz_created' 	=> 'NOW()',
		);

		dbx::insert($table,$data);
		$id = dbx::getLastInsertId();


		frontcontrollerx::json_success();
	}


	public static function renderFormViaVid($vid,$wz_id=false)
	{
		$vid = intval($vid);
		$a = xredaktor_atoms::getByVID($vid);
		if ($a === false) {
			frontcontrollerx::json_failure("Formular nicht verfügbar ($vid)");
		}
		$a_id = intval($a['a_id']);

		return self::renderFormViaId($a_id,$wz_id);
	}

	public static function renderFormViaId($a_id, $wz_id=false,$published=false)
	{
		$published=false;
		
		
		$a_id 		= intval($a_id);
		$wz_id		= intval($wz_id);

		$wz_table 	= xredaktor_wizards::genWizardTableNameBy_a_id($a_id);
		$as_all 	= dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del = 'N' and as_gui  in ('NORMAL','READONLY') order by as_sort");
		$multilang	= dbx::query("select * from atoms_settings where as_a_id = $a_id and as_del = 'N' and as_gui  in ('NORMAL','READONLY') and as_type_multilang='Y'");

		$raw = false;
		self::$renderReadOnly = false;
		if ($wz_id != 0)
		{
			if ($published)
			{
				self::$renderReadOnly = true;
				$wz_table_published = $wz_table."_published";
				$raw = dbx::query("select * from $wz_table_published where wz_id = $wz_id");
			} else
			{
				$raw = dbx::query("select * from $wz_table where wz_id = $wz_id");
			}
		}

		$a			= xredaktor_atoms::getById($a_id);
		$s_id		= $a['a_s_id'];

		if ($s_id == 0) // Admin Interface | ALL Possibles
		{

		}

		if (isset($_REQUEST['s_id'])&&is_numeric($_REQUEST['s_id']))
		{
			$s_id = intval($_REQUEST['s_id']);
		}
		$fe_langs 	= dbx::queryAll("select fe_language.* from fe_language,sites_fe_languages where sfl_s_id = $s_id and sfl_online = 'Y' and sfl_del='N' and sfl_fl_id = fel_id");

		$gui 				= self::json_form_v4($as_all,$raw,$fe_langs);
		$finalFieldsFlat 	= $gui['finalFieldsFlat'];

		unset($gui['finalFieldsFlat']);
		
		$published_form = false;
		if (!$published)
		{
			$published_form = self::renderFormViaId($a_id, $wz_id, true);
		}
		

		$ret = array(
		'raw'				=> $raw,
		'a_id'				=> $a_id,
		'fe_langs'			=> $fe_langs,
		'multilang' 		=> ($multilang === false) ? false : true,
		'gui' 				=> $gui,
		'db'				=> $as_all,
		'finalFieldsFlat' 	=> $finalFieldsFlat,
		'published'			=> $published_form,
		);

		return $ret;
	}


	public static function calcColumnWidth($as_gui_width)
	{
		switch ($as_gui_width)
		{
			case 'L':
			case 'R':
				return 0.5;
				break;
			default: return 1;
		}
	}

	public static function getXtypeName($as)
	{
		return strtolower("xr_field_".str_replace("-","_",$as['as_type']));
	}


	public static function getImageItems($as,$wz_id)
	{
		$as_id = $as['as_id'];
		$items = array();

		$table = xredaktor_wizards::handle_CONTAINER_FILES_table($as);
		if ($table !== false) {

			$files = dbx::queryAll("select * from $table where wz_r_id = $wz_id and wz_del = 'N' order by wz_sort");
			if ($files === false) $files = array();

			foreach ($files as $f)
			{
				$del_id	= $f['wz_id'];
				$s_id 	= $f['wz_s_id'];

				$s = xredaktor_storage::getById($s_id,true);

				if ($s['s_del'] == 'Y') continue;

				$title 	= $s['s_name'];
				$src	= $s['scaleSrc'].'/156/121';
				$webSrc	= $s['webSrc'];

				$items[] = array('id'=>$s_id,'title'=>$title,'src'=>$src,'del_id'=>$del_id,'as_id'=>$as_id, 'webSrc'=>$webSrc);
			}

		}
		return $items;
	}

	public static function getInfoPoolRecordById($wz_id,$r_id)
	{
		$wz_id 	= intval($wz_id);
		$r_id	= intval($r_id);

		if (($r_id == 0|| $wz_id == 0)) return "[X]";

		$r 	= xredaktor_wizard_do_magic_grid::getRecordById($wz_id,$r_id);
		$wz = xredaktor_atoms::getById($wz_id);
		return $wz['a_name'].' / '.$r['titleIt']." [$wz_id/$r_id]";
	}


	public static function configError($as,$msg)
	{

		$ret = array(
		'xtype' 	=> 'panel',
		'html'		=> 'Feld: '.$as['as_id']."(".self::getLabel($as).") - ".$msg,
		'height'	=> 40,
		'bodyStyle' => 'padding:10px',
		);

		return $ret;
	}

	public static function getField_config($as,$raw=array(),$a_type=false,$asIds=false)
	{
		$main_record_id  	= intval($raw['wz_id']);

		$as_config 		 	= json_decode($as['as_config'],true);
		$value 				= $raw['wz_'.$as['as_name']];
		$as_name			= $as['as_name'];

		if ($asIds) {
			$as_name = $as['as_id'];
		}

		$preFixName	 = "";
		switch ($a_type)
		{
			case 'WIZARD':
				//				$preFixName = "wz_";
				break;
			default: break;
		}


		$ret = array(
		'readOnly'		=> self::$renderReadOnly, 
		'as_id'			=> $as['as_id'],
		'uId'			=> $main_record_id.'_'.$as['as_id'],
		'wz_id'			=> $main_record_id,
		'as' 			=> $as,
		'as_config' 	=> $as['as_config'],
		'xtype' 		=> 'textfield',
		'fieldLabel' 	=> self::getLabel($as),
		'as_label' 		=> self::getLabel($as),
		'name' 			=> $preFixName.$as_name,
		'anchor' 		=> '100%',
		'value'			=> $raw['wz_'.$as_name],
		'margin'		=> '0 0 0 0',
		'border'		=> false
		);

		//as_group

		/*
		if ((intval($as['as_gui_height']) == 0))
		{
		$as['as_gui_height'] = 100;
		} else
		{
		$as['as_gui_height'] = intval($as['as_gui_height']);
		}

		$name = xredaktor_wizards::getWizardRecordDataTitleByConfig(intval($_REQUEST['domagic']),$id);
		*/

		switch ($as['as_type'])
		{

			case 'WIZARDLIST':

				$_as_config = intval($as['as_config']);

				if ($as_config == 0) {
					$ret['xtype'] = 'hidden';
					break;
				}

				$_as = xredaktor_atoms_settings::getById($_as_config);
				$other_a = $_as['as_a_id'];


				$dbFields	= array();
				$_fieldsOK 	= array('TEXT','INT','DATE','TIME','FLOAT','ATOM','WATTRIBUTE','PAGES');
				$_fields 	= xredaktor_atoms_settings::getAllValidByAId($other_a);


				$_fieldsGroup 	= array();
				$_fieldsDone 	= array();
				$columns 	 	= array();

				foreach ($_fields as $_f) {
					if (in_array($_f['as_type'],$_fieldsOK))
					{
						$_as_group = trim($_f['as_group']);

						if  ($_as_group != '')
						{
							if (!is_array($_fieldsGroup[$_as_group])) $_fieldsGroup[$_as_group] = array();
							$_fieldsGroup[$_as_group][] = $_f;
						} else
						{
							$_fieldsDone[] = $_f;
						}

						$dbFields[] = array(
						name => 'wz_'.$_f['as_name'],
						type => 'string'
						);

					}
				}

				$dbFields[] = array(
				name => 'wz_id',
				type => 'int'
				);

				$columns = array();

				foreach ($_fieldsDone as $_f)
				{
					if ($_f['as_useAsHeader']!='Y') continue;
					$tmp = array(
					'flex'			=> 1,
					'as_id' 		=> $_f['as_id'],
					'text' 			=> self::getLabel($_f),
					'dataIndex' 	=> 'wz_'.$_f['as_name'],
					'editor' 		=> array('xtype'=>'xr_field_'.strtolower($_f['as_type'])),
					'renderer'		=> 'field_'.strtolower($_f['as_type']),
					//'dbPatcher'		=> 'field_'.strtolower($_f['as_type']),
					);
					$columns[] = $tmp;
				}


				foreach ($_fieldsGroup as $k => $_fs)
				{
					$tmps = array();
					foreach ($_fs as $_f)
					{
						$tmp = array(
						'flex'			=> 1,
						'width'			=> 100,
						'as_id' 		=> $_f['as_id'],
						'text' 			=> self::getLabel($_f),
						'dataIndex' 	=> 'wz_'.$_f['as_name'],
						'editor' 		=> array('xtype'=>'xr_field_'.strtolower($_f['as_type'])),
						'renderer'		=> 'field_'.strtolower($_f['as_type']),
						//'dbPatcher'		=> 'field_'.strtolower($_f['as_type']),
						);
						$tmps[] = $tmp;
					}

					$group = array(
					'text' 			=> $_f['as_group'],
					'columns' 		=> $tmps
					);

					$columns[] = $group;
				}


				$ret['paramsBack']		= array('wzListScope'=>$_as_config,'as_id'=>$_as_config,'wzListScopeID'=>intval($raw['wz_id']));

				$ret['dbFields'] 		= $dbFields;
				$ret['columns'] 		= $columns;
				$ret['xtype'] 			= self::getXtypeName($as);
				$ret['backEndInfos'] 	= array($dbFields);
				$ret['raw']				= $raw;

				break;

			case 'UNDEFINED':
				$ret['xtype'] = 'hidden';
				break;

			case 'WATTRIBUTE':

				$ret['xtype'] 				= self::getXtypeName($as);
				$ret['value_preFetched'] 	= '';

				$_as_id = intval($value);
				$_as = xredaktor_atoms_settings::getById($_as_id);

				if ($_as !== false)
				{
					$ret['value_preFetched'] = $_as['as_name'] . " [$_as_id]";
				}

				break;
			case 'WIZARD':

				if (!is_array(($atomSettings=xredaktor_atoms::getById(intval($as['as_config'])))))
				{
					$ret = self::configError($as,'Wizard nicht vollständig konfiguriert.');

				} else {
					$title 	= xredaktor_wizards::getWizardRecordDataTitleByConfig(intval($as['as_config']),intval($value));
					$ret['xtype'] = self::getXtypeName($as);
					$ret['value_preFetched']  = $title." [$value]";
				}
				break;

			case 'INFOPOOL_RECORD':

				$r = '[X]';

				list($_wz_id,$_r_id) = explode(";",$value,2);
				if (($_wz_id > 0) && ($_r_id > 0)) {
					$r = self::getInfoPoolRecordById($_wz_id,$_r_id);
				}

				$ret['xtype'] 			= self::getXtypeName($as);
				$ret['IR_TITLEIT'] 		= $r;

				break;

			case 'CONTAINER-IMAGES':
				$ret['files']	= self::getImageItems($as,$main_record_id);
				$ret['xtype'] 	= self::getXtypeName($as);
				$ret['height'] 	= $as['as_gui_height'];
				break;
			case 'CONTAINER-FILES':
				$ret['files']	= self::getImageItems($as,$main_record_id);
				$ret['xtype'] 	= self::getXtypeName($as);
				$ret['height'] 	= $as['as_gui_height'];
				break;
			case 'GEO-POINT':

				if ((intval($as['as_gui_height']) == 0))
				{
					$as['as_gui_height'] = 300;
				}

				$ret['xtype'] 	= self::getXtypeName($as);
				$ret['height'] 	= $as['as_gui_height'];

				$geo = json_decode($value,true);

				$ret['geo_lat'] 	= $geo['lat'];
				$ret['geo_long'] 	= $geo['long'];
				$ret['fieldLabel'] 	= '';

				break;

			case 'SIMPLE_W2W':

				$as_gui_mode 	= intval($as['as_gui_mode']);

				if (!is_numeric($as['as_config']))
				{
					$ret = self::configError($as,'Fremd-Wizard wurde nicht angegeben.');
					break;
				}

				switch ($as_gui_mode)
				{

					case 3: // TREE

					$ret = array(
					'uId'			=> $main_record_id.'_'.$as['as_id'],
					'wz_id'			=> $main_record_id,
					'as' 			=> $as,
					'as_config' 	=> $as['as_config'],
					'xtype' 		=> 'field_simple_w2w_3',
					'fieldLabel' 	=> self::getLabel($as),
					'as_label' 		=> self::getLabel($as),
					'name' 			=> $preFixName.$as_name,
					'anchor' 		=> '100%',
					'titleIt'		=> '',
					'value'			=> '',
					'margin'		=> '5 10 0 0',
					'emptyText'		=> 'Name eingeben ...',
					);

					break;

					case 2: // GRID


					$ret = array(
					'uId'			=> $main_record_id.'_'.$as['as_id'],
					'wz_id'			=> $main_record_id,
					'as' 			=> $as,
					'as_config' 	=> $as['as_config'],
					'xtype' 		=> 'field_simple_w2w_2',
					'fieldLabel' 	=> self::getLabel($as),
					'as_label' 		=> self::getLabel($as),
					'name' 			=> $preFixName.$as_name,
					'anchor' 		=> '100%',
					'titleIt'		=> '',
					'value'			=> '',
					'margin'		=> '5 10 0 0',
					'emptyText'		=> 'Name eingeben ...',
					);


					break;


					case 1: // REMOTE COMBO RETURNS ONLY ONE VALUE

					$vxxx = "";

					if (isset($raw['wz_id']))
					{

						$wz_id 			= intval($as['as_config']);
						$foreignAttr	= self::getGenericDataSetsLoaderSqlReverse(intval($as['as_id']),$main_record_id);

						$data 			= dbx::query($foreignAttr);
						$foreignId 		= intval($data[$data['SELECT_THIS']]);

						if ($foreignId != 0)
						{
							$vxxx 	= xredaktor_wizards::getWizardRecordDataTitleByConfig($wz_id,$foreignId)." [$foreignId] ";
						} else {
							$vxxx 		= "";
							$foreignId 	= "";
						}

					}

					$ret = array(
					'uId'			=> $main_record_id.'_'.$as['as_id'],
					'wz_id'			=> $main_record_id,
					'as' 			=> $as,
					'as_config' 	=> $as['as_config'],
					'xtype' 		=> 'xr_field_simple_w2w_1',
					'fieldLabel' 	=> self::getLabel($as),
					'as_label' 		=> self::getLabel($as),
					'name' 			=> $preFixName.$as_name,
					'anchor' 		=> '100%',
					'titleIt'		=> $vxxx,
					'value'			=> $foreignId,
					'margin'		=> '5 10 0 0',
					'emptyText'		=> 'Name eingeben ...',
					);



					break;

					default:

						$wz_id 			= intval($as['as_config']);

						$foreignData = self::getGenericDataSets2($wz_id,$main_record_id,$wz_id,$as['as_a_id'],false,false,true);
						$checkboxes = array();

						foreach ($foreignData as $fdata)
						{
							$title 	= xredaktor_wizards::getWizardRecordDataTitleByConfig($wz_id,intval($fdata['wz_id']));
							$checkboxes[] = array(
							'checked'	=> ($fdata['wz_n2n_check'] == '1'),
							'boxLabel'	=> $title,
							'name'		=> $preFixName.$as_name,
							'inputValue'=> $fdata['wz_id'],
							'flex'		=> 1,
							'anchor'	=> '100%',
							);
						}

						$ret = array(
						//width		=> 800,
						//autoFlex 	=> true,
						cols 		=> intval($as['as_gui_width']),
						xtype 		=> 'xr_field_simple_w2w',
						fieldLabel 	=> self::getLabel($as),
						cfg_items 	=> $checkboxes,
						name		=> $preFixName.$as_name,
						//flex		=> 1,
						//'anchor'	=> '100%',
						);

						break;
				}

				break;


			case 'UNIQUE_W2W':

				$as_gui_mode 	= intval($as['as_gui_mode']);

				if (!is_numeric($as['as_config']))
				{
					$ret = self::configError($as,'Fremd-Wizard wurde nicht angegeben.');
					break;
				}

				switch ($as_gui_mode)
				{

					case 3: // TREE

					$ret = array(
					'uId'			=> $main_record_id.'_'.$as['as_id'],
					'wz_id'			=> $main_record_id,
					'as' 			=> $as,
					'as_config' 	=> $as['as_config'],
					'xtype' 		=> 'field_unique_w2w_3',
					'fieldLabel' 	=> self::getLabel($as),
					'as_label' 		=> self::getLabel($as),
					'name' 			=> $preFixName.$as_name,
					'anchor' 		=> '100%',
					'titleIt'		=> '',
					'value'			=> '',
					'margin'		=> '5 10 0 0',
					'emptyText'		=> 'Name eingeben ...',
					);

					break;

					case 2: // GRID


					$ret = array(
					'uId'			=> $main_record_id.'_'.$as['as_id'],
					'wz_id'			=> $main_record_id,
					'as' 			=> $as,
					'as_config' 	=> $as['as_config'],
					'xtype' 		=> 'field_unique_w2w_2',
					'fieldLabel' 	=> self::getLabel($as),
					'as_label' 		=> self::getLabel($as),
					'name' 			=> $preFixName.$as_name,
					'anchor' 		=> '100%',
					'titleIt'		=> '',
					'value'			=> '',
					'margin'		=> '5 10 0 0',
					'emptyText'		=> 'Name eingeben ...',
					);


					break;


					case 1: // REMOTE COMBO RETURNS ONLY ONE VALUE

					$vxxx = "";



					if (isset($raw['wz_id']))
					{

						$wz_id 			= intval($as['as_config']);

						$foreignAttr	= self::getUniqueDataSetsLoaderSqlReverse(intval($as['as_id']),$main_record_id);

						$data 			= dbx::query($foreignAttr);

						$foreignId 		= intval($data[$data['SELECT_THIS']]);

						if ($foreignId != 0)
						{
							//$vxxx 	= xredaktor_wizards::getWizardRecordDataTitleByConfig($wz_id,$foreignId)." [$foreignId] ";
							$vxxx 	= " [$foreignId] ";
						} else {
							$vxxx 		= "";
							$foreignId 	= "";
						}

					}

					$tmpSettings 	= xredaktor_atoms_settings::getById($as['as_config']);

					$as_a_id 		= $tmpSettings['as_a_id'];



					$ret = array(
					'uId'			=> $main_record_id.'_'.$as['as_id'],
					'wz_id'			=> $main_record_id,
					'as' 			=> $as,
					'as_config' 	=> $as['as_config'],
					'xtype' 		=> 'xr_field_unique_w2w_1',
					'fieldLabel' 	=> self::getLabel($as),
					'as_label' 		=> self::getLabel($as),
					'name' 			=> $preFixName.$as_name,
					'anchor' 		=> '100%',
					'titleIt'		=> $vxxx,
					'value'			=> $foreignId,
					'margin'		=> '5 10 0 0',
					'emptyText'		=> 'Name eingeben ...',
					'searchId'		=> $as_a_id
					);


					break;

					default:

						$wz_id 			= intval($as['as_config']);

						//$foreignData = self::getGenericDataSets2($wz_id,$main_record_id,$wz_id,$as['as_a_id']);

						//die(" ".print_r($_REQUEST))

						$wz_id_1		= $as['as_a_id'];
						$wz_id_field_1 	= $as['as_id'];
						$wz_id_field_2 	= $as['as_config'];

						$as2			= xredaktor_atoms_settings::getById($as['as_config']);
						$wz_id_2		= $as2['as_a_id'];

						$wz_id_field_2_name = $as2['as_name'];

						$return_wz_id	= intval($_REQUEST['r_id']);

						$fromFatherId	= false;

						$foreignData = self::getUniqueDataSetsNew($wz_id_1,$wz_id_2, $wz_id_field_1, $wz_id_field_2, $wz_id_field_2_name, $return_wz_id);

						$checkboxes = array();

						foreach ($foreignData as $fdata)
						{

							$checkboxes[] = array(
							'checked'	=> ($fdata['wz_n2n_check'] == '1'),
							'boxLabel'	=> $fdata['wz_'.$wz_id_field_2_name],
							'name'		=> $preFixName.$as_name,
							'inputValue'=> $fdata['wz_id'],
							'flex'		=> 1,
							'anchor'	=> '100%',
							);
						}

						$ret = array(
						//width		=> 800,
						//autoFlex 	=> true,
						'cols' 		=> intval($as['as_gui_width']),
						'xtype' 	=> 'xr_field_unique_w2w',
						'fieldLabel'=> self::getLabel($as),
						'cfg_items' => $checkboxes,
						'name'		=> $preFixName.$as_name,
						//flex		=> 1,
						//'anchor'	=> '100%',
						);

						break;
				}

				break;

			case 'HTML':
				$ret['xtype'] 	= 'htmleditor';
				$ret['xtype'] = self::getXtypeName($as);
				break;
			case 'TEXTAREA':
				$ret['xtype'] 	= 'textarea';
				$ret['xtype'] = self::getXtypeName($as);
				break;
			case 'INT':
				$ret['xtype'] = 'numberfield';
				$ret['xtype'] = self::getXtypeName($as);
				break;
			case 'COMBO':


				$data = array();

				foreach ($as_config['l'] as $linear)
				{
					$data[] = array('v'=>$linear['v'],'g'=>$linear['g']);
				}

				$store = array(
				'fields' 	=> array('v','g'),
				'data'		=> $data
				);

				$ret['xtype'] 			= 'combo';
				$ret['xtype'] = self::getXtypeName($as);

				$ret['store'] 			= $store;
				$ret['queryMode'] 		= 'local';
				$ret['displayField'] 	= 'g';
				$ret['valueField'] 		= 'v';
				$ret['value']			= $raw['wz_'.$as['as_name']];

				break;

			case 'CHECKBOX':

				$checkboxes = array();
				$linear 	= self::getLinearValues($as);

				foreach ($linear as $pack)
				{

					$name = $as_name.'_'.$pack['v'];

					$checkboxes[] = array(
					'checked'	=> ($raw['wz_'.$name] == 'on'),
					'boxLabel'	=> $pack['g'],
					'name'		=> $name
					);
				}

				$ret = array(
				columns 	=> 1,
				xtype 		=> 'checkboxgroup',
				fieldLabel 	=> self::getLabel($as),
				items 		=> $checkboxes
				);

				break;

			case 'RADIO':


				$radios = array();
				$linear = self::getLinearValues($as);

				foreach ($linear as $pack)
				{

					$radios[] = array(
					'checked'		=> ($raw['wz_'.$as_name] == $pack['v']),
					'boxLabel'		=> $pack['g'],
					'name'			=> $as_name,
					'inputValue'	=> $pack['v']
					);
				}

				$ret = array(
				name		=> $as_name,
				columns 	=> 1,
				xtype 		=> 'xr_field_radio',
				fieldLabel 	=> self::getLabel($as),
				items 		=> $radios
				);

				break;

			case 'YN':
				$ret['boxLabel'] 	= $ret['fieldLabel'];
				$ret['fieldLabel'] 	= '';


				$ret['xtype'] 		= self::getXtypeName($as);
				$ret['checked'] 	= ($raw['wz_'.$as_name] == 'Y');
				$ret['value'] 		= ($raw['wz_'.$as_name] == 'Y') ? 'on' : 'off';

				//	frontcontrollerx::json_debug($ret);

				break;


			case 'STAMPER':

				/*
				if (!is_array($fieldSets[$as_collection])) $fieldSets[$as_collection] = array();
				$fieldSetItems = array();

				foreach ($fieldSets[$as_collection] as $g)
				{
				$fieldSetItems[] = self::getField_config($g,$raw,$a_type);
				}


				foreach ($fieldSetItems as $f)
				{
				$raw['wz_'.$f['name']] = $f['value'];
				}

				*/

				$data 					= $raw;
				$data['RECORD_RAW'] 	= $raw;


				$ret['xtype'] 	= "panel";
				$ret['html'] 	= "";

				$template_a_id = intval($as_config['a_id']);
				if ($template_a_id == 0)
				{
					$ret['xtype'] 	= "panel";
					$ret['html'] 	= "Fehler in der Konfiguration: Kein Bausein hinterlegt.";
					break;
				} else
				{

					$atomx = xredaktor_atoms::getById($template_a_id);
					if ($atomx === false)
					{
						$ret['xtype'] 	= "panel";
						$ret['html'] 	= "Fehler in der Konfiguration: Kein Bausein hinterlegt.";
						break;
					}

					$ret['xtype'] 		= 'xr_field_stamper';
					$ret['html_a_id'] 	= $template_a_id;
					$ret['html'] 		= xredaktor_render::renderSoloAtom($template_a_id,$data);



					$ret['height']		= intval($as_config['height']);
					$ret['autoScroll']	= ($as_config['autoScroll'] == 'on');

				}

				//frontcontrollerx::json_debug($ret);

				break;

			case 'REMOTE_RECORD':

				// *************************************************************************

				$rr_attr_wid 			= intval($as_config['attr_wid']);
				$rr_attr_w2w_field_name	= 'wz_'.$as_config['attr_w2w_field_name'];

				if ($rr_attr_wid == 0) {
					$ret['xtype'] 	= "panel";
					$ret['html'] 	= "Fehler in der Konfiguration: Lokales Attribut-Feld wurde nicht gesetzt.";
					break;
				}

				$settings 	= xredaktor_atoms_settings::getById($rr_attr_wid);
				$key 		= 'wz_'.$settings['as_name'];

				if (!isset($raw[$key]))
				{
					$ret['xtype'] 	= "panel";
					$ret['html'] 	= "Fehler in der Konfiguration: Lokales Attribut-Feld ist nicht im Datensatz-Objekt verfügbar ($key).";
					break;
				}

				$rr_wizardId = intval($raw[$key]);

				if ($rr_wizardId == 0) // nicht konfiguriert in dem Datensatz
				{
					$ret['xtype'] 	= "panel";
					$ret['html'] 	= "Bitte wählen Sie zuerst einen "+$settings['as_label']+" ("+$settings['as_group']+") aus...";
					break;
				}


				// **********************************************
				//
				// REMOTE CHECK
				//
				// **********************************************

				$rr_table = xredaktor_wizards::genWizardTableNameBy_a_id($rr_wizardId);

				if (!dbx::tablePresent($rr_table))
				{
					$ret['xtype'] 	= "panel";
					$ret['html'] 	= "Fehler in der Konfiguration: Der Wizard $rr_wizardId ($rr_table) ist nicht in der Datenbank verfügbar.";
					break;
				}

				if (!dbx::attributePresent($rr_table,$rr_attr_w2w_field_name))
				{
					$ret['xtype'] 	= "panel";
					$ret['html'] 	= "Der Wizard $rr_wizardId unterstützt das konfigurierte Attribute <b>$rr_attr_w2w_field_name</b> nicht.";
					break;
				}

				$raw_wz_id = intval($raw['wz_id']);
				if (!dbx::attributePresent($rr_table,$rr_attr_w2w_field_name))
				{
					$ret['xtype'] 	= "panel";
					$ret['html'] 	= "Sie müssen zuerst den Datensatz speichern, danach können Sie "+$settings['as_label']+" editieren.";
					break;
				}

				$present = dbx::queryAll("select * from $rr_table where $rr_attr_w2w_field_name = $raw_wz_id and wz_del='N'");
				if ($present === false)
				{
					$rr_super_id = xredaktor_fe::wInsert($rr_wizardId,array($rr_attr_w2w_field_name=>$raw_wz_id));
				} else
				{
					if (count($present)>1)
					{
						$ret['xtype'] 	= "panel";
						$ret['html'] 	= "Es existieren bereits 2 Datensätze für "+$settings['as_label']+" - bitte kontaktieren Sie den Administrator.";
						break;
					} else
					{
						$rr_super_id = intval($present[0]['wz_id']);
					}
				}

				$ret['rr_wizardId'] 		= intval($rr_wizardId);
				$ret['rr_wizardRecordId'] 	= intval($rr_super_id);

				$ret['value'] 		= intval($rr_super_id);
				$ret['xtype'] 		= self::getXtypeName($as);

				/*

				print_r($ret);
				print_r($raw);
				print_r($settings);
				print_r($as_config);
				print_r($ret);
				die();

				*/




				break;

			case 'REMOTE_FIELD':

				$attr_lr_w2w_field 	= intval($as_config['attr_lr_w2w_field']);
				$attr_fr 			= intval($as_config['attr_fr']);

				if (($attr_fr == 0) || ($attr_lr_w2w_field == 0))
				{
					$ret['xtype'] 	= 'hidden';
					break;
				}

				$as_selector = xredaktor_atoms_settings::getById($attr_lr_w2w_field);
				$wz_id	 	= intval($as_selector['as_config']);
				$this_a_id 	= intval($as['as_a_id']);

				if ($wz_id < $this_a_id) {
					$foreignAttr	= self::getGenericDataSetsLoaderSqlReverse($attr_lr_w2w_field,$main_record_id);
					$foreignId 		= intval(dbx::queryAttribute($foreignAttr,"wz_id_low"));
				} else {
					$foreignAttr	= self::getGenericDataSetsLoaderSqlReverse($attr_lr_w2w_field,$main_record_id);
					$foreignId 		= intval(dbx::queryAttribute($foreignAttr,"wz_id_high"));
				}

				if ($foreignId != 0)
				{
					$ras	= xredaktor_atoms_settings::getById($attr_fr);
					$field 	= 'wz_'.$ras['as_name'];

					switch ($ras['as_type'])
					{
						case 'WIZARD':

							$rr 		= xredaktor_wizards::getRecordByIds($wz_id,$foreignId);
							$rr_value 	= intval($rr[$field]);

							$remoteWizardID = intval($ras['as_config']);
							$title 	= xredaktor_wizards::getWizardRecordDataTitleByConfig($remoteWizardID,$rr_value);
							$vxxx 	= $title;

							break;
						default:
							$tt		= xredaktor_wizards::genWizardTableNameBy_a_id($ras['as_a_id']);
							$vxxx 	= dbx::queryAttribute("select $field from $tt where wz_id = $foreignId and wz_del='N'",$field);
							break;
					}


				} else {
					$vxxx	= "[X]";
				}


				$ret['fieldLabel'] 	= $ret['fieldLabel'];
				$ret['value'] 		= $vxxx;
				$ret['readOnly'] 	= true;
				$ret['disabled'] 	= true;

				break;

			default:
				$ret['xtype'] = self::getXtypeName($as);
				break;
		}


		if (!isset($ret['cls'])) $ret['cls'] = "";
		$ret['cls'] .= 'xr_f';

		if (isset($_REQUEST['formId']))
		{
			@session_start();
			if (!isset($_SESSION['formIdRunner'])) $_SESSION['formIdRunner'] = 0;
			$_SESSION['formIdRunner']++;
			$ret['id'] = $_REQUEST['formId'].'_'.$_SESSION['formIdRunner'].'_'.md5(rand());
		}


		return $ret;
	}

	public static function getLinearValues($as)
	{
		$as_config = json_decode($as['as_config'],true);
		if (!is_array($as_config['l'])) return array();
		return $as_config['l'];
	}


	public static function getLabel($as)
	{
		if ($as['as_label'] != "") return $as['as_label'];
		return "[".$as['as_name']."]";
	}


	public static function json_form_v4($as_all,$raw = false,$fe_langs=false)
	{
		$finalFieldsFlat = array();

		if (($as_all === false) || (count($as_all)==0))
		{
			return array(
			'defaults' 	=> array('anchor' => '100%'),
			'layout'	=> 'anchor',
			'border'	=> false,
			'xtype' 	=> 'panel',
			'html'		=> 'Formular ist leer.',
			'autoScroll'=> true,
			);
		}

		if (!is_array($raw)) {
			$raw = array();
		}

		$main_record_id = intval($raw['wz_id']);

		$a_id 		= $as_all[0]['as_a_id'];
		$_a 		= dbx::query("select * from atoms where a_id = $a_id");
		$a_type 	= $_a['a_type'];
		$a_gui_cols = $_a['a_gui_cols'];

		$tabCnt			= 0;
		$tabs			= array();
		$fieldSets		= array();
		$defaultTab		= "Generisch";
		$fields			= array();

		foreach ($as_all as $a)
		{
			$as_id 			= $a['as_id'];
			$as_type 		= $a['as_type'];
			$as_label		= self::getLabel($a);
			$as_gui			= $a['as_gui'];
			$as_group		= trim($a['as_group']);
			$as_collection	= trim($a['as_collection']);

			if ($as_gui == 'HIDDEN') continue;
			if ($as_group == "") $as_group = $defaultTab;

			if (($as_collection != "") && (($as_type != 'COLLECTOR')&&($as_type != 'STAMPER'))) {
				if (!isset($fieldSets[$as_collection])) $fieldSets[$as_collection] = array();
				$fieldSets[$as_collection][] = $a;
			} else {
				$fields[] = $a;
			}
		}


		foreach ($fields as $a)
		{
			$as_id 			= $a['as_id'];
			$as_type 		= $a['as_type'];
			$as_label		= self::getLabel($a);
			$as_gui			= $a['as_gui'];
			$as_group		= trim($a['as_group']);
			$as_collection	= trim($a['as_collection']);

			if ($as_gui == 'HIDDEN') continue;
			if ($as_group == "") $as_group = $defaultTab;

			if (!isset($tabs[$as_group]))
			{
				$tabCnt++;
				$tabs[$as_group] = array();
			}
			$tabs[$as_group][] = $a;
		}

		$finalTabs = array();

		foreach ($tabs as $tabName => $mixedFields)
		{

			$items = array();
			$buffer_i 	= array();
			$buffer_w 	= 0;
			$max_w		= 2;

			if (count($mixedFields)==0) continue;

			foreach ($mixedFields as $a)
			{
				$as_id 				= $a['as_id'];
				$as_type 			= $a['as_type'];
				$as_label			= self::getLabel($a);
				$as_gui_pos			= $a['as_gui_pos'];
				$as_group			= trim($a['as_group']);
				$as_collection		= trim($a['as_collection']);
				$as_type_multilang	= ($a['as_type_multilang']=='Y');

				$chain = false;

				switch ($as_type)
				{
					case 'COLLECTOR':
						if (!is_array($fieldSets[$as_collection])) $fieldSets[$as_collection] = array();

						$fieldSetItems = array();

						foreach ($fieldSets[$as_collection] as $g)
						{
							if ($as_type_multilang)
							{
								$chain = array();
								foreach ($fe_langs as $i => $l)
								{
									$lang = trim($l['fel_ISO']);

									$tmp				= self::getField_config($g,$raw,$a_type);
									$tmp['emptyText'] 	= $lang.'....';
									$tmp['hidden'] 		= ($i > 0);
									$tmp['anchor'] 		= '100%';
									$tmp['style']  		= 'font-weight:bold;';
									$tmp['cls']  		= 'xr_multilang xr_multilang_'.$lang;


									$tmp['value']		= $raw['_'.$lang.'_wz_'.$tmp['as_name']];
									$tmp['name']  		= '_'.$lang.'_'.$tmp['as_name'];


									$fieldSetItems[] 	= $tmp;
									$finalFieldsFlat[] 	= $tmp;
								}

							} else
							{
								$tmp 			= self::getField_config($g,$raw,$a_type);
								$tmp['anchor'] 	= '100%';
								$tmp['style']  	= 'font-weight:bold;';
								$tmp['name']   	= $g['as_name'];




								$fieldSetItems[] 	= $tmp;
								$finalFieldsFlat[] 	= $tmp;
							}

						}



						$fieldset = array(
						'columnWidth' 	=> .5,
						'xtype' 		=> 'fieldset',
						'title' 		=> $as_label,
						'collapsible' 	=> false,
						'margin'		=> '0 10 2 0',
						'padding'		=> 10,
						'defaults' 		=> array(
						'anchor' => '96%',
						//'labelAlign' => 'right',
						),
						'items' 		=> $fieldSetItems
						);

						$chain = $fieldset;
						break;

					default:

						if ($as_type_multilang)
						{
							$chain = array();
							foreach ($fe_langs as $i => $l)
							{
								$lang = trim($l['fel_ISO']);

								$tmp				= self::getField_config($a,$raw,$a_type);
								$tmp['emptyText'] 	= $lang.'....';
								$tmp['hidden'] 		= ($i > 0);
								$tmp['anchor'] 		= '100%';
								$tmp['style']  		= 'font-weight:bold;';
								$tmp['cls']  		= 'xr_multilang xr_multilang_'.$lang;

								$tmp['value']		= $raw['_'.$lang.'_wz_'.$tmp['name']];
								$tmp['name']  		= '_'.$lang.'_'.$tmp['name'];

								$chain[] 			= $tmp;
								$finalFieldsFlat[] 	= $tmp;
							}

						} else
						{
							$chain 			 = self::getField_config($a,$raw,$a_type);
							$chain['anchor'] = '100%';
							$chain['style']  = 'font-weight:bold;';
							$chain['name']   = $chain['name'];

							$finalFieldsFlat[] 	= $chain;
						}
				}

				switch ($as_gui_pos)
				{
					case '3':
						$as_gui_pos = 3;
					case 'H':
					case 'L':
					case 'R':
						$as_gui_pos = 1;
						break;
					default:
						$as_gui_pos = 2;
						break;
				}

				$buffer_w += $as_gui_pos;
				$buffer_i[] = array(
				'defaults' 		=> array('anchor' => '100%'),
				'xtype' 		=> 'panel',
				'flex' 			=> 1,
				'layout' 		=> 'anchor',
				'border'		=> false,
				'items' 		=> $chain
				);

				//$a_gui_cols= 2;
				if ($buffer_w >= $a_gui_cols)
				{
					$panel = array(
					'cls' 			=> 'x-check-group-alt2',
					'margin'		=>  0,
					'xtype' 		=> 'panel',
					'border'		=> false,
					'layout' 		=> array(
					'type' 	=> 'hbox',
					'pack' 	=> 'start',
					'align' =>'stretch'
					),
					'items' 		=> $buffer_i
					);

					$items[] = $panel;

					$buffer_w = 0;
					$buffer_i = array();
				}

			}

			if ($buffer_w > 0)
			{
				$panel = array(
				'xtype' 		=> 'panel',
				'flex' 			=> 1,
				'border'		=> false,
				'items' 		=> $buffer_i
				);
				$items[] = $panel;
			}

			$ret = array(
			'title'		=> $tabName,
			'defaults' 	=> array('anchor' => '100%'),
			'layout'	=> 'anchor',
			'border'	=> false,
			'xtype' 	=> 'panel',
			'autoScroll'=> true,
			//'bodyPadding' => 5,
			'items'		=> $items
			);


			$finalTabs[] = $ret;
		}

		if (count($finalTabs) == 1)
		{
			$ret = $finalTabs[0];
			unset($ret['title']);

		} else {
			$ret = array(
			'defaults' 	=> array('anchor' => '100%'),
			'layout'	=> 'anchor',
			'border'	=> false,
			'xtype' 	=> 'tabpanel',
			'items'		=> $finalTabs,
			'autoScroll'=> true,
			'plain'		=> true
			);
		}

		$ret['cls'] 			= "xr_forms_root_panel";
		$ret['finalFieldsFlat'] = $finalFieldsFlat;





		return $ret;
	}



	public static function getGenericDataSetsLoaderSql($as_id,$f_id,$reverse=false)
	{
		$as_id = intval($as_id);
		$as = dbx::query("select * from atoms_settings where as_id = $as_id");


		$wz_a 			= intval($as['as_a_id']);
		$wz_b 			= intval($as['as_config']);

		$low 	= min($wz_a,$wz_b);
		$high 	= max($wz_a,$wz_b);

		$table_name = "wizard_auto_SIMPLE_W2W_".$low."_".$high;
		if (!dbx::tablePresent($table_name)) return false;


		if ($wz_a < $wz_b)
		{
			$myField	= "wz_id_low";
			$otherField = "wz_id_high";
		} else
		{
			$myField	= "wz_id_high";
			$otherField = "wz_id_low";
		}

		if ($reverse)
		{
			$sql = "select $myField from $table_name where $myField = $f_id";
		} else
		{
			$sql = "select $myField from $table_name where $otherField = $f_id";
		}
		return $sql;
	}


	public static function getGenericDataSetsLoaderSqlReverse($as_id,$f_id,$reverse=false)
	{
		$as_id = intval($as_id);
		$as = dbx::query("select * from atoms_settings where as_id = $as_id");


		$wz_a 			= intval($as['as_a_id']);
		$wz_b 			= intval($as['as_config']);

		$low 	= min($wz_a,$wz_b);
		$high 	= max($wz_a,$wz_b);

		$table_name = "wizard_auto_SIMPLE_W2W_".$low."_".$high;
		if (!dbx::tablePresent($table_name)) return false;


		if ($wz_a > $wz_b)
		{
			$myField	= "wz_id_low";
			$otherField = "wz_id_high";
		} else
		{
			$myField	= "wz_id_high";
			$otherField = "wz_id_low";
		}

		if ($reverse)
		{
			$sql = "select $myField, CONCAT('$myField') as SELECT_THIS from $table_name where $myField = $f_id";
		} else
		{
			$sql = "select $myField, CONCAT('$myField') as SELECT_THIS  from $table_name where $otherField = $f_id";
		}

		return $sql;
	}

	public static function setGenericDataSets2($as_id,$f_id,$values,$deleteOthers=true,$deleteMe=false)
	{
		$as_id = intval($as_id);
		$as = dbx::query("select * from atoms_settings where as_id = $as_id");


		$wz_a 			= intval($as['as_a_id']);
		$wz_b 			= intval($as['as_config']);

		$low 	= min($wz_a,$wz_b);
		$high 	= max($wz_a,$wz_b);

		$table_name = "wizard_auto_SIMPLE_W2W_".$low."_".$high;


		if (!dbx::tablePresent($table_name)) return false;


		if ($wz_a < $wz_b)
		{
			$myField	= "wz_id_low";
			$otherField = "wz_id_high";
		} else
		{
			$myField	= "wz_id_high";
			$otherField = "wz_id_low";
		}

		if ($deleteOthers)
		{
			dbx::query("delete from $table_name where $myField = $f_id");
		}

		if (is_array($values))
		{
			foreach ($values as $id)
			{
				if (!is_numeric($id)) continue;

				if (!$deleteOthers)
				{
					dbx::query("delete from $table_name where $myField = $f_id and $otherField = $id");
				}

				if ($deleteMe === false)
				{
					dbx::insert($table_name,array($myField=>$f_id,$otherField=>$id));
				}

			}
		}

		return true;
	}

	public static function getGenericDataSets2($return_wz,$return_wz_id,$wz_a,$wz_b,$checkdOnly=false,$fromFatherId=false,$published=false)
	{
		
		$published=false;

		if ($fromFatherId !== false)
		{
			$fromFatherId = intval($fromFatherId);
		}


		$return_wz 		= intval($return_wz);
		$return_wz_id 	= intval($return_wz_id);
		$wz_a 			= intval($wz_a);
		$wz_b 			= intval($wz_b);

		$low 	= min($wz_a,$wz_b);
		$high 	= max($wz_a,$wz_b);

		$table_name = "wizard_auto_SIMPLE_W2W_".$low."_".$high;
		if (!dbx::tablePresent($table_name)) return false;

		if ($return_wz == $wz_b) {

			$otherWizard = $wz_b;

			if ($wz_a < $wz_b)
			{
				$myField	= "wz_id_low";
				$otherField = "wz_id_high";
			} else
			{
				$myField	= "wz_id_high";
				$otherField = "wz_id_low";
			}

		} else
		{
			$otherWizard = $wz_a;

			if ($wz_a < $wz_b)
			{
				$otherField = "wz_id_low";
				$myField	= "wz_id_high";
			} else
			{
				$otherField = "wz_id_high";
				$myField	= "wz_id_low";
			}
		}

		$tableReturn = xredaktor_wizards::genWizardTableNameBy_a_id($otherWizard);
		if ($published)
		{
			$tableReturn .= "_published";
		}


		if (!$checkdOnly)
		{

			if ($fromFatherId !== false)
			{

				$sql = "select $table_name.wz_id as del_id,!ISNULL($table_name.wz_id) as wz_n2n_check,$tableReturn.*
				from $tableReturn
				left join $table_name  ON $tableReturn.wz_id = $table_name.$otherField and $table_name.$myField = $return_wz_id where $tableReturn.wz_del='N' and $tableReturn.wz_fid=$fromFatherId and $tableReturn.wz_online='Y' order by wz_sort asc";

			}
			else
			{
				$sql = "select $table_name.wz_id as del_id,!ISNULL($table_name.wz_id) as wz_n2n_check,$tableReturn.*
				from $tableReturn
				left join $table_name  ON $tableReturn.wz_id = $table_name.$otherField and $table_name.$myField = $return_wz_id where $tableReturn.wz_del='N' and $tableReturn.wz_online='Y'";

			}


		}
		else
		{
			$sql = "select $table_name.wz_id as del_id,!ISNULL($table_name.wz_id) as wz_n2n_check,$tableReturn.*
		from $tableReturn
		left join $table_name  ON $tableReturn.wz_id = $table_name.$otherField and $table_name.$myField = $return_wz_id where $tableReturn.wz_del='N' and $tableReturn.wz_online='Y'";
		}

		//$check_table 	= $table_name;
		//$table 			= $tableReturn;
		//$wa_fieldName	= 'wz_id';
		//$wb_fieldName	= 'wz_id';
		//$sql = dbx::queryAll("select $check_table.*,$table.*,$check_table.wz_id as checkId, $table_name.wz_id as del_id, !ISNULL($check_table.$wa_fieldName) as wz_n2n_check from $table left join $check_table ON $check_table.$wb_fieldName=$table.wz_id and $check_table.$wa_fieldName = $wzListScopeID where $table.wz_del = 'N' $querySql $orderBY LIMIT $start, $limit ");

		$data = dbx::queryAll($sql);
		if ($data === false) return false;


		if ($fromFatherId !== false)
		{
			foreach ($data as $i => $p)
			{
				$data[$i]['_is_dir'] = dbx::query("select * from ".$tableReturn." where wz_fid = ".$p['wz_id']." LIMIT 1") !== false;
			}
		}


		$data = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti($otherWizard,$data);
		return $data;
	}


	public static function getUniqueDataSetTitle($as_id)
	{
		$title = "TODO";
		return $title;
	}

	public static function getUniqueDataSetsLoaderSqlReverse($as_id,$f_id,$reverse=false)
	{
		$as_id = intval($as_id);

		$as 	= xredaktor_atoms_settings::getById($as_id);

		if ($as === false) 	return false;

		$wz_a			= $as['as_a_id'];
		$wz_a_field 	= $as['as_id'];
		$wz_b_field 	= $as['as_config'];

		$as2			= xredaktor_atoms_settings::getById($as['as_config']);
		$wz_b			= $as2['as_a_id'];

		$low 	= min($wz_a,$wz_b);
		$high 	= max($wz_a,$wz_b);

		$table_name = "wizard_auto_UNIQUE_W2W_".$wz_a_field."_".$wz_a."_".$wz_b_field;

		if (!dbx::tablePresent($table_name)) return false;

		if ($wz_a > $wz_b)
		{
			$myField	= "wz_id_low";
			$otherField = "wz_id_high";
		} else
		{
			$myField	= "wz_id_high";
			$otherField = "wz_id_low";
		}

		if ($reverse)
		{
			$sql = "select $myField, CONCAT('$myField') as SELECT_THIS from $table_name where $myField = $f_id";
		} else
		{
			$sql = "select $myField, CONCAT('$myField') as SELECT_THIS  from $table_name where $otherField = $f_id";
		}

		return $sql;
	}




	public static function getUniqueDataSetsNew($wz_a, $wz_b, $wz_a_field,$wz_b_field, $wz_b_field_name, $return_wz_id, $checkdOnly=false,$fromFatherId=false,$published=false)
	{
		
		$published=false;
		
		$wz_a 			= intval($wz_a);
		$wz_b 			= intval($wz_b);

		$wz_a_field 	= intval($wz_a_field);
		$wz_b_field 	= intval($wz_b_field);

		$wz_b_field_name =  "wz_".dbx::escape($wz_b_field_name);

		if ($fromFatherId != false)
		{
			$fromFatherId = intval($fromFatherId);
		}

		$low 	= min($wz_a,$wz_b);
		$high 	= max($wz_a,$wz_b);

		$table_name = "wizard_auto_UNIQUE_W2W_".$wz_a_field."_".$wz_a."_".$wz_b_field;


		if (!dbx::tablePresent($table_name)) return false;

		{
			$otherWizard = $wz_b_field;

			if ($wz_a < $wz_b)
			{
				$otherField = "wz_id_high";
				$myField	= "wz_id_low";
			} else
			{
				$otherField = "wz_id_low";
				$myField	= "wz_id_high";
			}
		}

		$tableReturn = xredaktor_wizards::genWizardTableNameBy_a_id($otherWizard);
		
		if ($published)
		{
			$tableReturn .= '_published';
		}

		//if (!$checkdOnly)
		{

			if ($fromFatherId !== false)
			{
				$sql = "select $table_name.wz_id as del_id,!ISNULL($table_name.wz_id) as wz_n2n_check,$tableReturn.*
				from $tableReturn
				left join $table_name ON $tableReturn.wz_id = $table_name.$otherField and $table_name.$myField = $return_wz_id where $tableReturn.wz_del='N' and $tableReturn.wz_fid=$fromFatherId and $tableReturn.wz_online='Y' order by wz_sort asc";

			}
			else
			{
				$sql = "select $table_name.wz_id as del_id,!ISNULL($table_name.wz_id) as wz_n2n_check,$tableReturn.*
				from $tableReturn
				left join $table_name ON $tableReturn.wz_id = $table_name.$otherField and $table_name.$myField = $return_wz_id where $tableReturn.wz_del='N' and $tableReturn.wz_online='Y' order by wz_sort asc";

			}

		}

		//die(" ".$sql);

		$data = dbx::queryAll($sql);


		if ($data === false) return false;

		if ($fromFatherId !== false)
		{
			foreach ($data as $i => $p)
			{
				$data[$i]['_is_dir'] 	= dbx::query("select * from ".$tableReturn." where wz_fid = ".$p['wz_id']." LIMIT 1") !== false;
				$data[$i]['expanded'] 	= false;

				if ($data[$i]['_is_dir'] === false)
				{
					$data[$i]['expanded'] = true;
				}
			}
		}

		$data = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti($otherWizard,$data);
		return $data;
	}

	public static function setUniqueDataSetsNew($as_id,$f_id,$values,$deleteOthers=true,$deleteMe=false)
	{
		$as_id = intval($as_id);
		$as = dbx::query("select * from atoms_settings where as_id = $as_id");

		$as 	= xredaktor_atoms_settings::getById($as_id);
		if ($as === false) 	return false;

		$wz_a			= intval($as['as_a_id']);
		$wz_a_field 	= intval($as['as_id']);
		$wz_b_field 	= intval($as['as_config']);

		$wz_b			= intval($as['as_config']);

		$low 	= min($wz_a,$wz_b);
		$high 	= max($wz_a,$wz_b);

		$table_name = "wizard_auto_UNIQUE_W2W_".$wz_a_field."_".$wz_a."_".$wz_b_field;

		if (!dbx::tablePresent($table_name)) return false;

		{
			$otherWizard = $wz_b_field;

			if ($wz_a < $wz_b)
			{
				$otherField = "wz_id_high";
				$myField	= "wz_id_low";
			} else
			{
				$otherField = "wz_id_low";
				$myField	= "wz_id_high";
			}
		}

		if ($deleteOthers)
		{
			dbx::query("delete from $table_name where $myField = $f_id");
		}

		if (is_array($values))
		{
			foreach ($values as $id)
			{
				if (!is_numeric($id)) continue;

				if (!$deleteOthers)
				{
					dbx::query("delete from $table_name where $myField = $f_id and $otherField = $id");
				}

				if ($deleteMe === false)
				{
					dbx::insert($table_name,array($myField=>$f_id,$otherField=>$id));
				}

			}
		}

		return true;
	}





}