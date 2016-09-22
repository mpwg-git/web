<?

class xredaktor_gui
{


	public static function handleAjax($function)
	{
		switch ($function)
		{

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

			case 'container-files-delete':
				self::handleFileDeletion();
				break;

			case 'container-files-upload':
				self::handleContainerFileUploads();
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

	public static function handleContainerFileUploads()
	{
		$as_id  = intval($_REQUEST['f_id']);
		$wz_id 	= intval($_REQUEST['r_id']);
		$m_id 	= $_REQUEST['m_id'];
		$file 	= $_FILES['files'];

		$as 	= xredaktor_atoms_settings::getById($as_id);
		$s_f_id = intval($as['as_config']);

		$success 	= false;
		$id 		= 0;

		if ($s_f_id != 0)
		{
			$file_tmp 	= $file['tmp_name'];
			$file_name 	= $file['name'];

			if (!self::validFileType($as,$file_name))
			{
				frontcontrollerx::json_success(array('ok'=>false,'error'=>$file_name.' hat einen falschen File-Typ.'));
			}

			if (file_exists($file_tmp)) {

				$table = xredaktor_wizards::handle_CONTAINER_FILES_table($as);
				if ($table !== false) {

					$success 	= true;
					$s_name 	= "Datensatz_".$wz_id;

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

					frontcontrollerx::json_success(array('ok'=>true,'id'=>$id,'f_id'=>$as_id,'wz_id'=>$wz_id,'m_id'=>$m_id));

				} else {
					frontcontrollerx::json_success(array('ok'=>false,'error'=>'Feld hat keine gültige DIR-ID 0'));
				}

			} else {
				frontcontrollerx::json_success(array('ok'=>false,'error'=>'Tempfile nicht gefunden'));
			}
		}
		frontcontrollerx::json_success(array('ok'=>false,'error'=>'Feld hat keine gültige DIR-ID 1'));
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

	public static function renderFormViaId($a_id, $wz_id=false)
	{
		$a_id 		= intval($a_id);
		$wz_id		= intval($wz_id);

		$wz_table 	= xredaktor_wizards::genWizardTableNameBy_a_id($a_id);
		$as_all 	= dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del = 'N' and as_gui  in ('NORMAL','READONLY') order by as_sort");
		$multilang	= dbx::query("select * from atoms_settings where as_a_id = $a_id and as_del = 'N' and as_gui  in ('NORMAL','READONLY') and as_type_multilang='Y'");

		$raw = false;
		if ($wz_id != 0)
		{
			$raw = dbx::query("select * from $wz_table where wz_id = $wz_id");
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

		$ret = array(
		'a_id'				=> $a_id,
		'fe_langs'			=> $fe_langs,
		'multilang' 		=> ($multilang === false) ? false : true,
		'gui' 				=> $gui,
		'db'				=> $as_all,
		'finalFieldsFlat' 	=> $finalFieldsFlat
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
		return strtolower("xr_field_".$as['as_type']);
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
		'margin'		=> '5 10 0 0'
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
				$_fieldsOK 	= array('TEXT','INT','DATE','TIME','FLOAT');
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


				$ret['paramsBack']		= array('as_id'=>$_as_config,'wzListScopeID'=>intval($raw['wz_id']));

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

					case 2:


						$vxxx = "";

						if (isset($raw['wz_id']))
						{

							$wz_id 			= intval($as['as_config']); // 209
							$foreignAttr	= self::getGenericDataSetsLoaderSqlReverse(intval($as['as_id']),$main_record_id);


							$foreignId 		= intval(dbx::queryAttribute($foreignAttr,"wz_id_low"));

							if ($foreignId != 0)
							{
								$vxxx 	= xredaktor_wizards::getWizardRecordDataTitleByConfig($wz_id,$foreignId)." [$foreignId] ";
							}

						} else {

						}

						$ret = array(
						'uId'			=> $main_record_id.'_'.$as['as_id'],
						'wz_id'			=> $main_record_id,
						'as' 			=> $as,
						'as_config' 	=> $as['as_config'],
						'xtype' 		=> 'xr_field_simple_w2w_2',
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


					case 1: // REMOTE COMBO RETURNS ONLY ONE VALUE

					$vxxx = "";

					if (isset($raw['wz_id']))
					{

						$wz_id 			= intval($as['as_config']); // 209
						$foreignAttr	= self::getGenericDataSetsLoaderSqlReverse(intval($as['as_id']),$main_record_id);


						$foreignId 		= intval(dbx::queryAttribute($foreignAttr,"wz_id_low"));

						if ($foreignId != 0)
						{
							$vxxx 	= xredaktor_wizards::getWizardRecordDataTitleByConfig($wz_id,$foreignId)." [$foreignId] ";
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

						$foreignData = self::getGenericDataSets2($wz_id,$main_record_id,$wz_id,$as['as_a_id']);
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
				columns 	=> 1,
				xtype 		=> 'radiogroup',
				fieldLabel 	=> self::getLabel($as),
				items 		=> $radios
				);

				break;

			case 'YN':
				$ret['xtype'] 	= self::getXtypeName($as);
				$ret['checked'] = ($raw['wz_'.$as_name] == 'Y');
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

					case 'STAMPER':
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


						$template 	= json_decode($a['as_config'],true);
						$template   = $template['HTML'];
						$html 		= templatex::renderOnTheFly($template,$raw);


						$fieldset = array(
						'columnWidth' 	=> .5,
						'xtype' 		=> 'fieldset',
						'title' 		=> $as_label,
						'collapsible' 	=> false,
						'margin'		=> '0 10 2 0',
						'padding'		=> 10,
						'defaults' 		=> array(
						'anchor' => '96%',
						'labelAlign' => 'right',
						),
						//'items' 		=> $fieldSetItems
						'html'			=> $html
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
					'margin'		=>  5,
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
			'bodyPadding' => 5,
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
			$sql = "select $myField from $table_name where $myField = $f_id";
		} else
		{
			$sql = "select $myField from $table_name where $otherField = $f_id";
		}
		return $sql;
	}

	public static function setGenericDataSets2($as_id,$f_id,$values)
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


		dbx::query("delete from $table_name where $myField = $f_id");

		if (is_array($values))
		{
			foreach ($values as $id)
			{
				if (!is_numeric($id)) continue;
				dbx::insert($table_name,array($myField=>$f_id,$otherField=>$id));
			}
		}

		return true;
	}

	public static function getGenericDataSets2($return_wz,$return_wz_id,$wz_a,$wz_b,$checkdOnly=false)
	{
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

		if (!$checkdOnly)
		{
			$sql = "select $table_name.wz_id as del_id,!ISNULL($table_name.wz_id) as wz_n2n_check,$tableReturn.*
		from $tableReturn
		left join $table_name  ON $tableReturn.wz_id = $table_name.$otherField and $table_name.$myField = $return_wz_id where $tableReturn.wz_del='N' and $tableReturn.wz_online='Y'";
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

		$data = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti($otherWizard,$data);
		return $data;
	}

}