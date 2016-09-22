<?

class xredaktor_ajax
{

	public static function handleAjax()
	{
		libx::turnOnErrorReporting();
		libx::jsonFeedback_ON();
		list($scope,$function,$param_0,$param_1,$param_2) = explode("/",$_REQUEST['url']);




		$id 			= $_REQUEST['id'];
		$id_isnumeric 	= is_numeric($id);

		switch ($scope) {

			case 'xr_state_provider':
				xredaktor_state_xrprovider::handleAjax($function);
				break;

			case 'patcher':

				require_once(dirname(__FILE__).'/../../../xsetup/patch/patch_util.php');

				if (!xredaktor_core::isAdmin()) {
					frontcontrollerx::json_failure('NOT_ADMIN');
				}

				ignore_user_abort(true);

				switch ($function)
				{
					case 'cache_clean_xcore':
						xcore::flushTemp();
						die('DONE.');
						break;
					case 'cache_clean_atoms':
						xredaktor_core::flushTemp();
						die('DONE.');
						break;
					case 'cache_clean_images':
						patch_util::cleanImageCaches();
						die('DONE.');
						break;

					case 'rsync_db_inc_langs':
						//patch_util::syncWizards();
						patch_util::lang_fix();
						die('DONE.');
						break;

					case 'full':
						patch_util::doAll('');
						die('DONE.');
						break;
					case 'db_patch':
						patch_util::processPatchingByCompleteSqlFile();
						die('DONE.');
						break;
					case 'wz_sync':
						patch_util::syncWizards();
						die('DONE.');
						break;
					case 'storage_repair':
						patch_util::repairStorage('');
						die('DONE.');
						break;
					case 'cache_clean':
						patch_util::cleanCache();
						die('DONE.');
						break;
					case 'cache_clean_images':
						patch_util::cleanImageCaches();
						die('DONE.');
						break;
					case 'db_clean':
						patch_util::cleanDb();
						die('DONE.');
						break;
					default: break;
				}


				break;

			case 'checkSrc':


				$root 	= realpath(dirname(__FILE__).'/../../../');
				$cc 	= dirname(__FILE__).'/../../../xcore/libs/closure-compiler/compiler.jar';
				$filter = array('/xframe/libs/','/classes/checkJsTmp/');
				$dirs 	= array($root . '/xframe',$root . '/xplugs',$root . '/xsetup',$root . '/xsplash',$root . '/xupdate');
				$files 	= array();


				echo "<pre>";
				system("java -jar '$cc' --version 2>&1");
				echo "</pre>";

				foreach ($dirs as $d)
				{
					if (!is_dir($d))
					{
						echo "Ungültiges Verzeichnis $d<br>";
						continue;
					}
					$out = array();
					exec("find '$d' -name '*.js' -type f 2>&1",$out);


					foreach ($out as $f)
					{
						$good = true;
						foreach ($filter as $filt)
						{
							if (strpos($f,$filt)!==false)
							{
								$good = false;
							}
						}
						if($good) $files[] = $f;
					}
				}


				echo "<h1>checking JS FILES</h1>";
				set_time_limit(0);

				echo "<table>";
				foreach ($files as $pos => $file)
				{

					$versionCheck = 1;



					$final  = dirname(__FILE__).'/checkJsTmp/'.md5($file.$versionCheck).".js";
					$cmd 	= "java -jar '$cc' --js $file --compilation_level=WHITESPACE_ONLY --language_in ECMASCRIPT3 --js_output_file '$final' 2>&1";

					$fileHuman 	= str_replace($root,"",$file);
					$error 		= false;

					$check = true;
					if (file_exists($final))
					{
						if (hdx::fread($final) == md5_file($file)) $check = false;
					}

					//$check = true;

					if ($check)
					{
						$out = array();
						exec($cmd,$out);

						if (count($out) !== 0)
						{
							$lastLine 	= $out[count($lastLine)-1];
							if (strpos($lastLine,"0 error(s)")===false) $error = true;
						}
					}

					echo "<tr>";
					echo "<td>$fileHuman</td>";

					if ($error) {

						echo "<td style='background-color:red;'>NOK</td>";
						echo "<td>";
						echo implode("<br>",$out);
						echo "</td>";

						@unlink($final);

					} else {

						hdx::fwrite($final,md5_file($file));

						echo "<td>OK</td>";
						echo "<td></td>";
					}

					echo "</tr>";

					ob_flush();
					flush();
					ob_flush();
					flush();

				}

				echo "</table>";



				die('ENDE');

				break;

			case 'wzlist':

				$as = xredaktor_atoms_settings::getById(intval($_REQUEST['as_id']));
				$domagicId = intval($as['as_a_id']);

				$_REQUEST['wzListScope'] 	= intval($_REQUEST['as_id']);
				$_REQUEST['wzListScopeID'] 	= intval($_REQUEST['wzListScopeID']);

				$_REQUEST['domagic'] = $domagicId;
				xredaktor_wizards::wizard_do_magic_grid($function);

				break;

			case 'editor':
				switch ($function)
				{
					case 'striptags':

						$html = $_REQUEST['html'];
						$html = strip_tags($html,"<br>");

						frontcontrollerx::json_success(array('cleanAndSexy'=>$html));

						break;
				}
				break;
			case 'fly':
				switch ($function)
				{
					case 'getConfig':
						frontcontrollerx::json_success(array('config'=>xredaktor_defaults::getWorkBenchSettings()));
						break;
				}
				break;


			case 'psa_tree':
				switch ($function)
				{
					case 'update':

						$psa_id 	= intval($_REQUEST['id']);
						$psa_tm_id	= intval($_REQUEST['value']);
						dbx::update('pages_settings_atoms',array('psa_tm_id'=>$psa_tm_id),array('psa_id'=>$psa_id));
						frontcontrollerx::json_success();

						break;
					case 'load':

						$p_id 		= intval($_REQUEST['p_id']);
						$psa_fid 	= intval($_REQUEST['node']);


						if ($psa_fid == 0)
						{
							$frame = xredaktor_render::getFrameByPageId($p_id);
							$frame_a_id = $frame['a_id'];



							$psa_fid = dbx::queryAttribute("select * from pages_settings_atoms where psa_p_id = $p_id and psa_fid = 0 and psa_as_id	!= 0","psa_id");


							//echo "TOP:$frame_a_id|$psa_fid\n";

							$atoms = "select atoms.a_name,pages_settings_atoms.* from atoms, pages_settings_atoms where a_id = psa_inline_a_id and psa_p_id = $p_id and psa_fid = $psa_fid and psa_a_id = 0 and psa_del = 'N' and psa_as_id != 0 and a_del = 'N' order by psa_sort asc";



							$psaRecords = dbx::queryAll("select atoms.a_name,pages_settings_atoms.* from atoms, pages_settings_atoms where a_id = psa_a_id and psa_p_id = $p_id and psa_fid = 0 and
							psa_del = 'N' and psa_as_id IN (select as_id from atoms_settings where as_del='N' and as_type='CONTAINER' and as_a_id = $frame_a_id order by as_sort asc) and a_del = 'N' order by psa_sort asc");

							//$containers  = xredaktor_render::getContainers($frame_a_id);
							//print_r($atoms);
							//echo "---\n";
							//print_r($psaRecords);
							//die();

							//$psaRecords = dbx::queryAll("select * from pages_settings_atoms where psa_p_id = $p_id and psa_fid = $node and psa_del = 'N' and psa_as_id != 0 order by psa_sort asc");
							//print_r($psaRecords);
							/*
							$containers  = self::getContainers($a_id);
							foreach ($containers as $container)
							{
							$as_id 		= $container['as_id'];
							$as_name 	= $container['as_name'];

							$psa_id_container 	= self::checkContainer($p_id,$a_id,$as_id,$psa_fid);

							*/

						} else
						{
							$psaRecords = dbx::queryAll("select atoms.a_name,pages_settings_atoms.* from atoms, pages_settings_atoms where a_id = psa_a_id and psa_p_id = $p_id and psa_fid = $psa_fid and psa_a_id != 0 and psa_del = 'N' and psa_as_id != 0 order by psa_sort asc");

							if ($psaRecords === false)
							{
								$psaRecords = dbx::queryAll("select atoms.a_name,pages_settings_atoms.* from atoms, pages_settings_atoms where a_id = psa_inline_a_id and psa_p_id = $p_id and psa_fid = $psa_fid and psa_a_id = 0 and psa_del = 'N' and psa_as_id != 0 order by psa_sort asc");
							}

							//print_r($containers);
							//die();
						}

						$final = array();
						foreach ($psaRecords as $r)
						{

							$psa_id 			= $r['psa_id'];
							$psa_a_id 			= $r['psa_a_id'];
							$psa_inline_a_id 	= $r['psa_inline_a_id'];
							$psa_as_id 			= $r['psa_as_id'];

							$text = "";
							if ($psa_inline_a_id == 0)
							{
								$atom 	= xredaktor_atoms::getById($psa_a_id);
								$as 	= xredaktor_atoms_settings::getById($psa_as_id);
								$text 	= $as['as_label'];
								$containers = false;
							} else
							{
								$atom = xredaktor_atoms::getById($psa_inline_a_id);
								$text = $atom['a_name'];
								$containers  = xredaktor_render::getContainers($psa_inline_a_id);
							}

							//$text .= "-$psa_id";

							$node = array(
							'psa_tm_name' 	=> dbx::queryAttribute("select tm_name from timemachine where tm_id = ".intval($r['psa_tm_id']),"tm_name"),
							'psa_tm_id' 	=> intval($r['psa_tm_id']),
							"text"			=> $text,
							"id"			=> $r['psa_id'],
							"leaf"			=> (count($containers)==0),
							"cls"			=> "file");

							$final[] = $node;
						}

						echo json_encode($final);
						die();
						break;
				}
				break;


			case 'crm':


				switch ($function)
				{
					case 'getSplashData':

						$ret = array();
						frontcontrollerx::json_store($ret);
						break;
				}

				break;

			case 'gui':

				xredaktor_gui::handleAjax($function);

				break;

			case 'domains':

				if ($function == "load" || $function == "insert")
				{
					if (($s_id=frontcontrollerx::getInt('s_id')) === false) {
						frontcontrollerx::error_func_notfound();
					}
				}

				$extFunctionsConfig = array(
				'table'				=> 'domains',
				'sort'				=> 'd_sort',
				'pid'				=> 'd_id',
				'fid'				=> 'd_fid',
				'del'				=> 'd_del',
				'name'				=> 'd_name',
				'extraInsert'		=> array('d_created' => 'NOW()','d_s_id' => $s_id, 'd_name'=>md5(time())),
				'extraLoad'			=> " d_s_id = '$s_id' ",
				'fields'			=> array('d_id','d_name','d_online','d_sort'),
				'update'			=> array('d_name','d_online','d_sort'),
				'normalize'	=> array(
				'string'	=> array('d_name','d_online'),
				'int'		=> array('d_sort'),
				));

				xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

				switch ($function)
				{
					default: frontcontrollerx::error_func_notfound();
				}

				break;

			case 'sites_lang_fe':

				if ($function == "load")
				{
					if (($s_id=frontcontrollerx::getInt('s_id')) === false) {
						frontcontrollerx::error_func_notfound();
					}
				}

				$extFunctionsConfig = array(
				'table'				=> 'sites_fe_languages',
				'sort'				=> 'sfl_sort',
				'pid'				=> 'sfl_id',
				'fid'				=> 'sfl_fid',
				'del'				=> 'sfl_del',
				'name'				=> 'sfl_dirname',
				'extraInsert'		=> array('sfl_created' => 'NOW()'),
				'extraLoad'			=> " sfl_s_id = '$s_id' ",
				'fields'			=> array('sfl_id','sfl_sort','sfl_online'),
				'update'			=> array('sfl_sort','sfl_online'),
				'normalize'	=> array(
				'string'	=> array('sfl_sort','sfl_online'),
				'int'		=> array(),
				),
				'preHooks' 			=> array(
				'load'				=> 'xredaktor_core::flush_fe_sites_load_PRE',
				));

				$extFunctionsConfig = xredaktor_defaults::configAddJoins($extFunctionsConfig,'sfl_fl_id','fe_language','fel_id','fel_name');

				xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

				switch ($function)
				{
					default: frontcontrollerx::error_func_notfound();
				}
				break;


			case 'sites_lang_be':

				if ($function == "load")
				{
					if (($s_id=frontcontrollerx::getInt('s_id')) === false) {
						frontcontrollerx::error_func_notfound();
					}
				}

				$extFunctionsConfig = array(
				'table'				=> 'sites_be_languages',
				'sort'				=> 'sbl_sort',
				'pid'				=> 'sbl_id',
				'fid'				=> 'sbl_fid',
				'del'				=> 'sbl_del',
				'name'				=> 'sbl_dirname',
				'extraInsert'		=> array('sbl_created' => 'NOW()'),
				'extraLoad'			=> " sbl_s_id = '$s_id' ",
				'fields'			=> array('sbl_id','sbl_sort','sbl_online'),
				'update'			=> array('sbl_sort','sbl_online'),
				'normalize'	=> array(
				'string'	=> array('sbl_sort','sbl_online'),
				'int'		=> array(),
				),
				'preHooks' 			=> array(
				'load'				=> 'xredaktor_core::flush_be_sites_load_PRE',
				));

				$extFunctionsConfig = xredaktor_defaults::configAddJoins($extFunctionsConfig,'sbl_bl_id','be_language','bel_id','bel_name');

				xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

				switch ($function)
				{
					default: frontcontrollerx::error_func_notfound();
				}

				break;

			case 'sites_faces':

				if ($function == "load")
				{
					if (($s_id=frontcontrollerx::getInt('s_id')) === false) {
						frontcontrollerx::error_func_notfound();
					}
				}

				$extFunctionsConfig = array(
				'table'				=> 'sites_faces',
				'sort'				=> 'sf_sort',
				'pid'				=> 'sf_id',
				'fid'				=> 'sf_fid',
				'del'				=> 'sf_del',
				'name'				=> 'sf_dirname',
				'extraInsert'		=> array('sf_created' => 'NOW()'),
				'extraLoad'			=> " sf_s_id = '$s_id' ",
				'fields'			=> array('sf_id','sf_sort','sf_online'),
				'update'			=> array('sf_sort','sf_online'),
				'normalize'	=> array(
				'string'	=> array('sf_sort','sf_online'),
				'int'		=> array(),
				),
				'preHooks' 			=> array(
				'load'				=> 'xredaktor_core::flush_faces_sites_load_PRE',
				));

				$extFunctionsConfig = xredaktor_defaults::configAddJoins($extFunctionsConfig,'sf_f_id','faces','f_id','f_name');

				xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

				switch ($function)
				{
					default: frontcontrollerx::error_func_notfound();
				}

				break;

			case 'storage_group':

				$fields = array('sg_id','sg_del','sg_sort','sg_dirname','sg_name');
				$update = array('sg_id','sg_del','sg_sort','sg_dirname','sg_name');
				$string = array('sg_id','sg_del','sg_sort','sg_dirname','sg_name');

				$feLanges = xredaktor_pages::getValidLangs();

				foreach ($feLanges as $l)
				{
					$l = strtolower($l);
					$fields[] = 'sg_name_'.$l;
					$update[] = 'sg_name_'.$l;
					$string[] = 'sg_name_'.$l;
				}

				$extFunctionsConfig = array(
				'table'				=> 'storage_groups',
				'sort'				=> 'sg_sort',
				'pid'				=> 'sg_id',
				'fid'				=> 'sg_fid',
				'del'				=> 'sg_del',
				'name'				=> 'sg_dirname',
				'extraInsert'	=> array('sg_created' => 'NOW()'),
				'fields'		=> $fields,
				'update'		=> $update,
				'normalize'	=> array(
				'string'	=> $string,
				'int'		=> array('sg_id'),
				),
				'preHooks' 			=> array(
				'update'			=> 'xredaktor_storage::storage_group_update_PRE',
				),
				'postHooks' 		=> array(
				'update'			=> 'xredaktor_storage::storage_group_update_POST',
				));

				xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
				switch ($function)
				{
					default: frontcontrollerx::error_func_notfound();
				}
				break;


			case 'storage_group_deleted':

				$ss = intval($_REQUEST['ss']);

				$s_dir 		= xredaktor_storage::getDirOfStorageScope($ss);
				$diskDirLen	= strlen($s_dir);

				$extFunctionsConfig = array(
				'table'				=> 'storage',
				'sort'				=> 's_sort',
				'pid'				=> 's_id',
				'fid'				=> 's_fid',
				'del'				=> 's_del',
				'name'				=> 's_name',
				'disableDelFlag'	=> true,
				'preSelect'			=> " , SUBSTRING(s_onDisk,$diskDirLen) as s_onDiskDel ",
				'extraLoad'			=> " s_storage_scope = '$ss' and s_del='Y'  ",
				'extraInsert'		=> array('s_created' => 'NOW()'),
				'fields'			=> array('sg_del'),
				'update'			=> array('sg_del'),
				'normalize'	=> array(
				'string'	=> array('sg_id','sg_del','sg_sort','sg_dirname','s_mimeType','s_fileSizeBytesHuman','s_onDisk','s_del_soft','s_del_hard'),
				'int'		=> array('sg_id'),
				),
				'preHooks' 			=> array(
				'update'			=> 'xredaktor_storage::storage_group_update_PRE',
				),
				'postHooks' 		=> array(
				//'update'			=> 'xredaktor_core::lang_be_update_POST',
				));
				xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
				switch ($function)
				{
					default: frontcontrollerx::error_func_notfound();
				}
				break;

			case 'core_lang_be':
				$extFunctionsConfig = array(
				'table'				=> 'be_language',
				'sort'				=> 'bel_sort',
				'pid'				=> 'bel_id',
				'fid'				=> 'bel_fid',
				'del'				=> 'bel_del',
				'name'				=> 'bel_ISO',
				'extraInsert'	=> array('bel_created' => 'NOW()'),
				'fields'		=> array('bel_id','bel_ISO','bel_name','bel_del','bel_sort','bel_fid'),
				'update'		=> array('bel_id','bel_ISO','bel_name','bel_del','bel_sort','bel_fid'),
				'normalize'	=> array(
				'string'	=> array('bel_ISO','bel_name','bel_del','bel_online'),
				'int'		=> array('bel_id','bel_sort','bel_fid'),
				),
				'preHooks' 			=> array(
				'update'			=> 'xredaktor_core::lang_be_update_PRE',
				),
				'postHooks' 		=> array(
				'update'			=> 'xredaktor_core::lang_be_update_POST',
				));
				xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
				switch ($function)
				{
					default: frontcontrollerx::error_func_notfound();
				}
				break;

			case 'faces':

				$extFunctionsConfig = array(
				'table'				=> 'faces',
				'sort'				=> 'f_sort',
				'pid'				=> 'f_id',
				'fid'				=> 'f_fid',
				'del'				=> 'f_del',
				'name'				=> 'f_name',
				'extraInsert'	=> array('f_created' => 'NOW()'),
				'fields'		=> array('f_id','f_desc','f_name','f_del','f_sort','f_fid','f_origin','f_origin_vid'),
				'update'		=> array('f_id','f_desc','f_name','f_del','f_sort','f_fid','f_origin','f_origin_vid'),
				'normalize'	=> array(
				'string'	=> array('f_desc','f_name','f_del','f_online','f_origin'),
				'int'		=> array('f_id','f_sort','f_fid','f_origin_vid'),
				),

				'postHooks' 		=> array(
				'insert'			=> 'xredaktor_core::checkFaces',
				'update'			=> 'xredaktor_core::checkFaces'
				)

				);
				xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
				switch ($function)
				{
					default: frontcontrollerx::error_func_notfound();
				}
				break;


			case 'core_lang_fe':
				$extFunctionsConfig = array(
				'table'				=> 'fe_language',
				'sort'				=> 'fel_sort',
				'pid'				=> 'fel_id',
				'fid'				=> 'fel_fid',
				'del'				=> 'fel_del',
				'name'				=> 'fel_ISO',
				'extraInsert'	=> array('fel_created' => 'NOW()'),
				'fields'		=> array('fel_id','fel_ISO','fel_name','fel_del','fel_sort','fel_fid'),
				'update'		=> array('fel_id','fel_ISO','fel_name','fel_del','fel_sort','fel_fid'),
				'normalize'	=> array(
				'string'	=> array('fel_ISO','fel_name','fel_del','fel_online'),
				'int'		=> array('fel_id','fel_sort','fel_fid'),
				),
				'preHooks' 			=> array(
				'update'			=> 'xredaktor_core::lang_fe_update_PRE',
				),
				'postHooks' 		=> array(
				'update'			=> 'xredaktor_core::lang_fe_update_POST',
				));
				xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
				switch ($function)
				{
					default: frontcontrollerx::error_func_notfound();
				}
				break;

			case 'sites':

			case 'sites':


				switch ($function)
				{
					case 'loadx':
						$data = array();
						if (is_numeric($_REQUEST['s_id']))
						{
							$s_id = intval($_REQUEST['s_id']);
							$data = dbx::query("select * from sites where s_id = $s_id and s_del='N'");
						}
						frontcontrollerx::json_success(array('d'=>$data));
						break;
					case 'updateCssConfig':
						$dataArray = array(
						'css_source' 	=> $_REQUEST['css_source'],
						'css_classes' 	=> json_decode($_REQUEST['css_classes'],true),
						);
						$s_id = intval($_REQUEST['s_id']);
						dbx::update('sites',array('s_html_editor' => json_encode($dataArray)),array('s_id'=>$s_id));
						frontcontrollerx::json_success();
						break;
					default: break;
				}

				$def = "N";


				if (is_numeric($_REQUEST['s_id']) && isset($_REQUEST['s_robots_txt']))
				{
					$s_id = $_REQUEST['s_id'];
					$s_robots_txt = dbx::escape($_REQUEST['s_robots_txt']);
					dbx::query("update sites set s_robots_txt = \"$s_robots_txt\" where s_id = $s_id");
					frontcontrollerx::json_success();
					die();
				}

				if (($function == 'update' && $_REQUEST['field']=='s_defaultSite' && $_REQUEST['value'] == 'Y'))
				{
					dbx::query("update sites set s_defaultSite = 'N'");
					$def = "Y";
				}

				$extFunctionsConfig = array(
				'updateAllTrigger'	=> $def,
				'table'				=> 'sites',
				'sort'				=> 's_sort',
				'pid'				=> 's_id',
				'fid'				=> 's_fid',
				'del'				=> 's_del',
				'name'				=> 's_name',
				'extraInsert'		=> array('s_created' => 'NOW()'),
				'fields'	=> array('s_p_id_outofdate','s_p_id_mobile','s_html_editor','s_name','s_p_id','s_error_p_id','s_online','s_maintenance','s_maintenance_p_id','s_defaultSite','s_default_lang','s_s_storage_scope','s_suffix','s_redirectTLP','s_redirectTLP_domain','s_robots_txt','s_mail_from_email','s_mail_from_name','s_mail_smtp_server','s_mail_smtp_user','s_mail_smtp_pwd','s_mail_smtp_server_port','s_mail_smtp_server_auth'),
				'update'	=> array('s_html_editor','s_name','s_p_id','s_error_p_id','s_online','s_maintenance','s_maintenance_p_id','s_defaultSite','s_default_lang','s_s_storage_scope','s_suffix','s_redirectTLP','s_redirectTLP_domain','s_mail_smtp_server','s_mail_smtp_user','s_mail_smtp_pwd','s_mail_from_email','s_mail_from_name','s_p_id_outofdate','s_p_id_mobile','s_mail_smtp_server_port','s_mail_smtp_server_auth'),
				'normalize'	=> array(
				'string'	=> array('s_html_editor','s_name','s_online','s_maintenance','s_defaultSite','s_suffix','s_redirectTLP','s_redirectTLP_domain','s_default_lang','s_mail_from_email','s_mail_from_name','s_mail_smtp_server','s_mail_smtp_user','s_mail_smtp_pwd','s_p_id_outofdate','s_p_id_mobile'),
				'int'		=> array('s_p_id','s_error_p_id','s_maintenance_p_id','s_s_storage_scope','s_mail_smtp_server_port'),
				));

				switch ($function)
				{
					case 'updateMany':

						$up = array();
						foreach ($extFunctionsConfig['update'] as $k) {
							if (isset($_REQUEST[$k])) {
								$up[$k] = $_REQUEST[$k];
							}
						}

						$s_id = $_REQUEST['s_id'];
						if (is_numeric($s_id)) {
							dbx::update("sites",$up,array('s_id'=>$s_id));
						}

						frontcontrollerx::json_success();

						break;
					default: break;
				}



				xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

				switch ($function)
				{
					default: frontcontrollerx::error_func_notfound();
				}

				break;

			case 'niceurls':
				if ($function == "load" || $function == "insert")
				{
					if (($s_id=frontcontrollerx::getInt('s_id')) === false) {
						frontcontrollerx::error_func_notfound();
					}
				}

				$extFunctionsConfig = array(
				'table'				=> 'pages_niceurls',
				'sort'				=> 'pnu_sort',
				'pid'				=> 'pnu_id',
				'fid'				=> 'pnu_fid',
				'del'				=> 'pnu_del',
				'name'				=> 'pnu_name',
				'extraLoad'			=> " pnu_siteId = '$s_id' ",
				'extraInsert'		=> array('pnu_created' => 'NOW()','pnu_siteId'=>$s_id),
				'fields'	=> array('pnu_md5','pnu_nice_url','pnu_p_id','pnu_lang','pnu_settings_serialized','pnu_wz_w_id','pnu_wz_r_id','pnu_wz_c_id','pnu_wz_t_id'),
				'update'	=> array('pnu_md5','pnu_nice_url','pnu_p_id','pnu_lang','pnu_settings_serialized','pnu_wz_w_id','pnu_wz_r_id','pnu_wz_c_id','pnu_wz_t_id'),
				'normalize'	=> array(
				'string'	=> array('pnu_md5','pnu_nice_url','pnu_lang','pnu_settings_serialized'),
				'int'		=> array('pnu_wz_w_id','pnu_wz_r_id','pnu_wz_c_id','pnu_wz_t_id','pnu_p_id'),
				));

				xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
				switch ($function)
				{
					case 'flushDb':
						dbx::delete('pages_niceurls',array('pnu_siteId'=>intval($_REQUEST['s_id'])));
						frontcontrollerx::json_success();
						break;
					default: frontcontrollerx::error_func_notfound();
				}


				break;

			case 'pnm':

				if ($function == "load" || $function == "insert")
				{
					if (($s_id=frontcontrollerx::getInt('s_id')) === false) {
						frontcontrollerx::error_func_notfound();
					}
				}


				$extFunctionsConfig = array(
				'table'				=> 'pages_niceurls_match',
				'sort'				=> 'pnm_sort',
				'pid'				=> 'pnm_id',
				'fid'				=> 'pnm_fid',
				'del'				=> 'pnm_del',
				'name'				=> 'pnm_name',
				'extraLoad'			=> " pnm_siteId = '$s_id' ",
				'extraInsert'		=> array('pnm_created' => 'NOW()','pnm_siteId'=>$s_id),
				'fields'	=> array('pnm_name','pnm_http_code','pnm_url_match','pnm_url_transport'),
				'update'	=> array('pnm_name','pnm_http_code','pnm_url_match','pnm_url_transport'),
				'normalize'	=> array(
				'string'	=> array('pnm_name','pnm_url_match','pnm_url_transport'),
				'int'		=> array('pnm_http_code'),
				));

				xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

				switch ($function)
				{
					case '_import':

						die();

						echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<title>Unbenanntes Dokument</title>
</head>";



						$redirects = explode("\n",utf8_encode(hdx::fread(dirname(__FILE__).'/r.txt')));
						foreach ($redirects as $r)
						{
							list($type,$code,$old,$to) = explode(" ",$r);
							if (trim($old)=="") continue;

							$old = ($old);
							echo "$old<br>";

							$old = utf8_encode($old);

							$present = dbx::query("select * from pages_niceurls_match where pnm_url_match = '$old'");
							if ($present === false)
							{
								dbx::insert('pages_niceurls_match',array('pnm_url_match'=>$old,'pnm_url_transport'=>$to,'pnm_created'=>'NOW()'));
							} else
							{
								dbx::update('pages_niceurls_match',array('pnm_url_match'=>$old,'pnm_url_transport'=>$to),array('pnm_id'=>$r['pnm_id']));
							}
						}


						echo "<body>
</body>
</html>
";

						die();

						break;
					default: frontcontrollerx::error_func_notfound();
				}

				break;

			case 'fe_tags':


				$fet_s_id = intval($_REQUEST['fet_s_id']);

				$fields 	= array('fet_tag');
				$be_langs 	= xredaktor_core::getValidFELangsFromDB();

				foreach ($be_langs as $l)
				{
					$fields[] = 'fet_t_'.strtolower($l);
				}

				$extFunctionsConfig = array(
				'table'				=> 'fe_tags',
				'sort'				=> 'fet_sort',
				'pid'				=> 'fet_id',
				'fid'				=> 'fet_fid',
				'del'				=> 'fet_del',
				'name'				=> 'fet_tag',
				'extraLoad'			=> " fet_s_id = $fet_s_id",
				'extraInsert'		=> array('fet_created' => 'NOW()','fet_s_id'=>$fet_s_id),
				'fields'	=> $fields,
				'update'	=> $fields,
				'normalize'	=> array(
				'string'	=> $fields
				),
				'preHooksMod'		=> array(
				'insert'			=> 'xredaktor_core::tag_fe_insert_PRE',
				'update'			=> 'xredaktor_core::tag_fe_update_PRE',
				));

				xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

				switch ($function)
				{
					default: frontcontrollerx::error_func_notfound();
				}

				break;

			case 'sys_tags':

				$fields 	= array('sys_tag','sys_type','sys_exportAlways');
				$be_langs 	= xredaktor_core::getValidBELangsFromDB();

				foreach ($be_langs as $l)
				{
					$fields[] = 'sys_t_'.strtolower($l);
				}

				$extFunctionsConfig = array(
				'table'				=> 'sys_tags',
				'sort'				=> 'sys_sort',
				'pid'				=> 'sys_id',
				'fid'				=> 'sys_fid',
				'del'				=> 'sys_del',
				'name'				=> 'sys_tag',
				'extraInsert'		=> array('sys_created' => 'NOW()'),
				'fields'	=> $fields,
				'update'	=> $fields,
				'normalize'	=> array(
				'string'	=> $fields
				),
				'preHooksMod'		=> array(
				'insert'			=> 'xredaktor_core::tag_be_insert_PRE',
				'update'			=> 'xredaktor_core::tag_be_update_PRE',
				));

				xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

				switch ($function)
				{
					default: frontcontrollerx::error_func_notfound();
				}

				break;

			case 'wizards_n2n_grid':


				$n2n_cfg_as_id = frontcontrollerx::getInt('n2n_cfg_as_id');
				if ($n2n_cfg_as_id === false) frontcontrollerx::json_failure('n2n_cfg_as_id not int');

				$as 		= xredaktor_atoms_settings::getById($n2n_cfg_as_id);





				switch ($_REQUEST['mode'])
				{
					case 'simple':

						$cfg = xredaktor_wizards::gen_TABLE_SIMPLE_W2W($as);

						$wa_a_id	 = $as['as_a_id'];
						$wb_a_id	 = $as['as_config'];



						if ($wa_a_id < $wb_a_id) {

							$wa_fieldName = 'wz_id_low';
							$wb_fieldName = 'wz_id_high';


						} else
						{
							$wa_fieldName = 'wz_id_high';
							$wb_fieldName = 'wz_id_low';
						}


						$wa_wizardRecordsID = $wa_a_id;
						$wb_wizardRecordsID = $wb_a_id;


						$check_table 	= $cfg['table_name'];
						$table 			= xredaktor_wizards::genWizardTableNameBy_a_id($wb_wizardRecordsID);

						//die($check_table);
						// wb_wizardRecordsID OR as_a_id = $wa_a_id)

						break;
					default:

						$as_config 	= json_decode($as['as_config'],true);

						$wa_attr = $as_config['wa_attr'];
						$wb_attr = $as_config['wb_attr'];

						if (!is_numeric($wa_attr) || !is_numeric($wb_attr))
						{
							frontcontrollerx::json_failure('NO CONFIG');
						}

						$wa_settings = xredaktor_atoms_settings::getById($wa_attr);
						$wb_settings = xredaktor_atoms_settings::getById($wb_attr);

						$wa_fieldName = 'wz_'.$wa_settings['as_name'];
						$wb_fieldName = 'wz_'.$wb_settings['as_name'];


						$wa_a_id	 = $wa_settings['as_a_id'];
						$wb_a_id	 = $wb_settings['as_a_id'];

						if ($wa_a_id != $wb_a_id) {
							frontcontrollerx::json_failure("CONFIG FAILED! ($n2n_cfg_as_id :: $wa_a_id != $wb_a_id)");
						}

						$wa_wizardRecordsID	 = $wa_settings['as_config'];
						$wb_wizardRecordsID	 = $wb_settings['as_config'];


						$check_table 	= xredaktor_wizards::genWizardTableNameBy_a_id($wa_a_id);
						$table 			= xredaktor_wizards::genWizardTableNameBy_a_id($wb_wizardRecordsID);

						break;
				}




				switch ($function)
				{
					case 'update':


						switch ($_REQUEST['mode'])
						{
							case 'simple':
								frontcontrollerx::json_failure('Aktualisierung fehlgeschlagen.');
								break;

							default: break;
						}

						$field = $_REQUEST['field'];
						$value = $_REQUEST['value'];

						$check_table_wz_id  = intval($_REQUEST['checkId']);
						$table_wz_id 		= intval($_REQUEST['id']);


						if (dbx::attributePresent($check_table,$field))
						{
							dbx::update($check_table,array($field=>$value),array('wz_id'=>$check_table_wz_id));
						}

						if (dbx::attributePresent($table,$field)) {
							dbx::update($table,array($field=>$value),array('wz_id'=>$table_wz_id));
						}


						/*
						//if ($field != 'wz_n2n_check') frontcontrollerx::json_failure('wz_n2n_check not set'); !! UPDATE CHECK VIA AS SETINGS IF READONLY OR NOT !!!

						$value		= ($_REQUEST['value']);
						$wz_id 		= intval($_REQUEST['wzListScopeID']);
						$id 		= intval($_REQUEST['id']);
						$present 	= dbx::query("select * from $check_table where $wa_fieldName = $wz_id and $wb_fieldName = $id");
						$dataX 		= array($wa_fieldName=>$wz_id,$wb_fieldName=>$id);

						if (($present === false))
						{
						//dbx::insert($check_table,$dataX);
						}
						if (($present !== false) )
						{
						dbx::update($check_table,array($field=>$value),array($wa_fieldName=>$wz_id,$wb_fieldName=>$id));
						}

						xredaktor_wizards::checkForPostHooks(array($wa_a_id));*/
						frontcontrollerx::json_success();
						break;
					case 'updateCheck':


						$field = $_REQUEST['field'];
						if ($field != 'wz_n2n_check') frontcontrollerx::json_failure('wz_n2n_check not set');

						$checked 	= ($_REQUEST['value'] == 'on');
						$wz_id 		= intval($_REQUEST['wzListScopeID']);
						$id 		= intval($_REQUEST['id']);


						$present 	= dbx::query("select * from $check_table where $wa_fieldName = $wz_id and $wb_fieldName = $id");
						$dataX 		= array($wa_fieldName=>$wz_id,$wb_fieldName=>$id);

						if (($present === false) && $checked)
						{
							dbx::insert($check_table,$dataX);
						}
						if (($present !== false) && !$checked)
						{
							dbx::delete($check_table,$dataX);
						}

						xredaktor_wizards::checkForPostHooks(array($wa_a_id));

						frontcontrollerx::json_success();
						break;
					case 'load':

						$wzListScopeID 	= intval($_REQUEST['wzListScopeID']);
						//$data 			= dbx::queryAll("select $table.*,!ISNULL($check_table.$wa_fieldName) as wz_n2n_check from $table left join $check_table ON $check_table.$wb_fieldName=$table.wz_id and $check_table.$wa_fieldName = $wzListScopeID where $table.wz_del = 'N' order by $table.wz_sort ASC");

						$querySql 	= "";
						$query 		= dbx::escape($_REQUEST['_query']);

						if ($query != "")
						{
							$fields2filter = xredaktor_wizards::getSearchFields($wb_wizardRecordsID);

							if (count($fields2filter)>0)
							{
								$querySql = array();
								foreach ($fields2filter as $f)
								{
									$querySql[] = " `$table`.`$f` like '%$query%' ";
								}
								$querySql = " AND (".implode(" OR ",$querySql)." ) ";
							}
						}


						$totalCount = false;
						$pageingModus = ($_REQUEST['doPaging'] == 1);
						if ($pageingModus)
						{
							$limit 	= intval($_REQUEST['limit']);
							$start 	= intval($_REQUEST['start']);

							if ($limit == 0) 	$limit = 100;
							if ($limit > 500) 	frontcontrollerx::json_failure('JSON_STORE LIMIT TOO BIG!');

							$totalCount 	= dbx::queryAttribute("select count($table.wz_id) as maxx from $table left join $check_table ON $check_table.$wb_fieldName=$table.wz_id and $check_table.$wa_fieldName = $wzListScopeID where $table.wz_del = 'N' $querySql order by $table.wz_sort ASC",'maxx');


							$sort = json_decode($_REQUEST['sort'],true);
							if (!is_array($sort)) $sort = array();

							$sortByChecked = false;
							$orderBY = " order by $table.wz_sort ASC ";
							foreach ($sort as $px)
							{
								if ($px['property'] == 'wz_n2n_check')
								{
									$sortByChecked = $px['direction'];
									$orderBY = " order by checkId $sortByChecked, wz_n2n_check $sortByChecked";
								}
							}

							$nodes 			= dbx::queryAll("select $check_table.*,$table.*,$check_table.wz_id as checkId, !ISNULL($check_table.$wa_fieldName) as wz_n2n_check from $table left join $check_table ON $check_table.$wb_fieldName=$table.wz_id and $check_table.$wa_fieldName = $wzListScopeID where $table.wz_del = 'N' $querySql $orderBY LIMIT $start, $limit ");


						} else
						{
							$nodes 			= dbx::queryAll("select $check_table.*,$table.*,$check_table.wz_id as checkId,!ISNULL($check_table.$wa_fieldName) as wz_n2n_check from $table left join $check_table ON $check_table.$wb_fieldName=$table.wz_id and $check_table.$wa_fieldName = $wzListScopeID where $table.wz_del = 'N' $querySql order by $table.wz_sort ASC");
						}



						foreach ($nodes as $i => $n)
						{
							$nodes[$i]['titleIt'] = xredaktor_wizards::getWizardRecordDataTitleByConfig($wb_wizardRecordsID,$n['wz_id']);
						}

						if ($totalCount === false) $totalCount = count($nodes);
						frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));

						frontcontrollerx::json_store($data);

						break;

					case 'getN2NSettings':
						//$ass = dbx::queryAll("select * from atoms_settings where (as_a_id = $wb_wizardRecordsID OR as_a_id = $wa_a_id) and as_del = 'N'");
						$ass = dbx::queryAll("select * from atoms_settings where (as_a_id = $wb_wizardRecordsID) and as_del = 'N'");
						frontcontrollerx::json_success(array('settings'=>$ass));
						break;
					case 'getN2NSettingsSimple':
						$ass = dbx::queryAll("select * from atoms_settings where (as_a_id = $wb_wizardRecordsID OR as_a_id = $wa_a_id) and as_del = 'N'");
						frontcontrollerx::json_success(array('settings'=>$ass));
						break;
					default: frontcontrollerx::error_func_notfound();
				}

				break;

			case 'wizards_domagic_grid_2':
				switch ($function)
				{
					case 'load':
						$domagicId = intval($_REQUEST['domagic']);
						if ($domagicId == 0) frontcontrollerx::json_failure('INVALID DOMAGIC!');

						$pid 			= "wz_id";
						$masterTable 	= xredaktor_wizards::genWizardTableNameBy_a_id($domagicId);
						$where			= " wz_del='N' ";

						$limit 	= intval($_REQUEST['limit']);
						$offset = intval($_REQUEST['offset']);
						$start 	= intval($_REQUEST['start']);

						if ($limit == 0) 	$limit = 100;
						if ($limit > 500) 	frontcontrollerx::json_failure('JSON_STORE LIMIT TOO BIG!');
						$totalCount 	= dbx::queryAttribute("select count(`$masterTable`.`$pid`) as maxx from $masterTable where $where ",'maxx');


						$sql_title = xredaktor_wizard_do_magic_grid::getTitleItFieldCombi($domagicId);
						$sql_query = "";

						if (isset($_REQUEST['_query']))
						{
							$sql_query = array();
							$_query = explode(" ",$_REQUEST['_query']);
							foreach ($_query as $_s)
							{
								$_s = dbx::escape($_s);
								$sql_query[] = " $sql_title LIKE '%$_s%' ";
							}
							if (count($sql_query)==0) {
								$sql_query = "";
							} else {
								$sql_query = " and ( ".implode(" AND ",$sql_query)." ) ";
							}
						}

						$nodes = dbx::queryAll("select *,$sql_title as wzr_title from $masterTable where $where $sql_query order by wz_sort asc LIMIT $start, $limit");
						if (!is_array($nodes)) $nodes = array();

						foreach ($nodes as $i=>$n)
						{
							//	$nodes[$i]['wzr_title'] = xredaktor_wizards::getWizardRecordDataTitleByConfig($domagicId,$n['wz_id']);
						}

						if ($totalCount === false) $totalCount = count($nodes);
						frontcontrollerx::json(array('root'=>$nodes,'totalCount'=>$totalCount,'success'=>true));

						break;
				}
				frontcontrollerx::json_failure('INVALID FUNCTION');
				break;
			case 'wizards_domagic_grid':
				{

					$limit_infopool = xredaktor_core::getUserSettings_LIMIT_Infopool();

					/*
					if (isset($_REQUEST['exportToCsv2']) && ($_REQUEST['exportToCsv2'] == '1'))
					{




					$queryPack = json_decode(base64_decode($_REQUEST['queryPack']),true);

					foreach ($queryPack as $k => $v)
					{
					$_REQUEST[$k] = $v;
					}



					$_REQUEST['doPaging'] 	= 1;
					$_REQUEST['start'] 		= 0;
					$_REQUEST['limit'] 		= 100000;


					$_filters 	= $_REQUEST['filter'];
					$filters 	= array();

					foreach ($_filters as $f)
					{
					$filters[] = array(
					'type' 	=> $f['data']['type'],
					'value' => $f['data']['value'],
					'field' => $f['field']
					);
					}

					$_REQUEST['filter'] 	= json_encode($filters);


					//$function = 'exportCSV';
					}
					*/

					if (($limit_infopool !== false) && (!in_array($function,array('getDataRecordByIdName','load'))))
					{
						if (is_array($limit_infopool)) {

							$domagicId = intval($_REQUEST['domagic']);
							if (!in_array($domagicId,$limit_infopool))
							{
								frontcontrollerx::json_failure('forbidden, please contact admin :: '.$function);
							}
						}
					}

					xredaktor_wizards::wizard_do_magic_grid($function);
				}
				break;
			case 'wizards':
				{

					$fe_languages = array('DE', 'EN', 'IT', 'RU', 'FR', 'RO');
					switch ($function)
					{
						case 'getSettingsByVid':
							$wz_vid = frontcontrollerx::isInt($_REQUEST['wz_vid']);
							$atom = xredaktor_atoms::getByVID($wz_vid);
							$_REQUEST['a_id'] = $atom['a_id'];
						case 'getSettings':
							$a_id = frontcontrollerx::isInt($_REQUEST['a_id']);
							$ass = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del = 'N' order by as_sort");
							if (!is_array($ass)) $ass = array();
							frontcontrollerx::json_success(array('record'=>xredaktor_render::getAtom($a_id),'settings'=>$ass,'fe_langs'=>$fe_languages));
							break;
						default: frontcontrollerx::error_func_notfound();
						case 'getSettingsViaAS':
							$as_id 	= frontcontrollerx::isInt($_REQUEST['as_id']);
							$as 	= dbx::query("select * from atoms_settings where as_id = $as_id");
							$a_id 	= $as['as_a_id'];
							$ass 	= dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del = 'N' order by as_sort");
							if (!is_array($ass)) $ass = array();
							frontcontrollerx::json_success(array('record'=>xredaktor_render::getAtom($a_id),'settings'=>$ass,'fe_langs'=>$fe_languages));
							break;
						default: frontcontrollerx::error_func_notfound();
					}
				}
				break;



			case 'all_atoms_settings':
				$extFunctionsConfig = array(
				'table'				=> 'atoms_settings',
				'sort'				=> 'as_sort',
				'sort_cnt' 			=> 'as_a_id',
				'pid'				=> 'as_id',
				'fid'				=> 'as_fid',
				'del'				=> 'as_del',
				'name'				=> 'as_name',
				'extraLoadOld'			=> " as_type = 'WIZARD' ",
				'extraLoad'			=> " as_a_id IN (select a_id from atoms where a_type = 'WIZARD') ",
				'fields'	=> array('as_id','as_collection','as_group','as_name','as_label','as_lastmod','as_lastmodBy','as_type_multilang','as_config','as_useAsHeader','as_useAsHeaderSort','as_use4Export','as_gui_mode','as_gui_pos','as_use4Export','as_gui','as_gui_width','as_gui_height','as_gui_height','as_a_id'),
				'fields2'	=> array('as_id','as_collection','as_group','as_name','as_label','as_lastmod','as_lastmodBy','as_type_multilang','as_config','as_useAsHeader','as_useAsHeaderSort','as_use4Export','as_gui_mode','as_gui_pos','as_use4Export','as_gui','as_gui_width','as_gui_height','as_a_id'),
				'update'	=> array('as_name','as_collection','as_group','as_label','as_type','as_type_multilang','as_useAsHeader','as_use4Export','as_useAsHeaderSort','as_gui_width','as_gui_height','as_gui_mode','as_gui_pos','as_use4Export','as_gui','as_name_de','as_name_en','as_name_ru','as_name_fr','as_name_it','as_name_ro'),
				'normalize'	=> array(
				'string'	=> array('as_name','as_collection','as_group','as_label','as_type','as_type_multilang','as_useAsHeader','as_use4Export','as_useAsHeaderSort','as_gui_width','as_gui_height','as_gui_mode','as_gui_pos','as_use4Export','as_gui','as_name_de','as_name_en','as_name_ru','as_name_fr','as_name_it','as_name_ro')
				),
				'postHooks' 		=> array(
				'insert'			=> 'xredaktor_wizards::as_insert',
				'move'				=> 'xredaktor_wizards::as_move',
				'update'			=> 'xredaktor_wizards::as_update',
				'remove'			=> 'xredaktor_wizards::as_remove',
				));

				if (is_numeric($_REQUEST['wid']))
				{
					$wid = intval($_REQUEST['wid']);
					$extFunctionsConfig['extraLoad'] .= " and as_a_id = $wid";
				}

				xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);
			default: frontcontrollerx::error_func_notfound();
			break;



			case 'atoms_settings':

				$a_s_id = frontcontrollerx::senseVarInt('a_s_id');
				if ($a_s_id === false)
				{
					if ($_REQUEST['idProperty'] == 'p_id') {
						$p_id = intval($_REQUEST['id']);
						$a_s_id = xredaktor_niceurl::getSiteIdViaPageId($p_id);
					}
				}

				if (is_numeric($a_s_id))
				{
					xredaktor_niceurl::setSiteConfig($a_s_id);
				}

				$as_a_id = intval($_REQUEST['as_a_id']);
				$extFunctionsConfig = array(
				'table'				=> 'atoms_settings',
				'sort'				=> 'as_sort',
				'sort_cnt' 			=> 'as_a_id',
				'pid'				=> 'as_id',
				'fid'				=> 'as_fid',
				'del'				=> 'as_del',
				'name'				=> 'as_name',
				'extraInsert'		=> array('as_created' => 'NOW()'),
				'extraInsertFlyInt' => array('as_a_id'),
				'extraLoad'			=> " as_a_id = $as_a_id ",
				'fields'	=> array('as_id','as_collection','as_group','as_name','as_type','as_label','as_lastmod','as_lastmodBy','as_isOnline','as_type_multilang','as_config','as_use4Export','as_useAsHeader','as_useAsHeaderSort','as_gui_mode','as_gui_pos','as_use4Export','as_gui','as_gui_width','as_gui_height'),
				'update'	=> array('as_name','as_collection','as_group','as_label','as_type','as_type_multilang','as_useAsHeader','as_use4Export','as_useAsHeaderSort','as_gui_mode','as_gui_pos','as_use4Export','as_gui','as_gui_width','as_gui_height','as_name_de','as_name_en','as_name_ru','as_name_fr','as_name_it','as_name_ro'),
				'normalize'	=> array(
				'string'	=> array('as_name','as_collection','as_group','as_label','as_type','as_type_multilang','as_useAsHeader','as_use4Export','as_useAsHeaderSort','as_gui_mode','as_gui_pos','as_use4Export','as_gui','as_gui_width','as_gui_height','as_name_de','as_name_en','as_name_ru','as_name_fr','as_name_it','as_name_ro')
				),
				'postHooks' 		=> array(
				'insert'			=> 'xredaktor_wizards::as_insert',
				'move'				=> 'xredaktor_wizards::as_move',
				'update'			=> 'xredaktor_wizards::as_update',
				'remove'			=> 'xredaktor_wizards::as_remove',
				));

				if ($_REQUEST['showAsTree']=='1')
				{
					xredaktor_defaults::handleDefaultExtTree($extFunctionsConfig,$function);
					die();
				}

				xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

				$fe_languages = array('DE', 'EN', 'IT', 'RU', 'FR', 'RO');
				$keyForCopyPast = "mymymyKeyForProtection";

				switch ($function)
				{
					case 'getDataRecordFieldByIdName':
						$id 	= intval($_REQUEST['id']);
						$record = xredaktor_atoms_settings::getById($id);
						$atom	= xredaktor_atoms::getARecordBy_as_id($id);

						$p_a 	= xredaktor_atoms::getTreePathOfAtoms(intval($record['as_a_id']));
						$p_as	= xredaktor_atoms_settings::getTreePath($id);


						$p_a 	= trim(implode("/",array_reverse(explode("/",$p_a))));
						$p_as 	= trim(implode("/",array_reverse(explode("/",$p_as))));

						if ($p_a == "") 	$p_a = "/";
						if ($p_as == "") 	$p_as = "/";

						if (substr($p_a,0,1) == "/") {
							$p_a = '/0'.$p_a;
						} else
						{
							$p_a = '/0/'.$p_a;
						}

						if (substr($p_as,0,1) == "/") {
							$p_as = '/0'.$p_as;
						} else
						{
							$p_as = '/0/'.$p_as;
						}

						$p_a   	.= '/'.$record['as_a_id'];
						$p_as	.= '/'.$id;


						$p_a = str_replace("//","/",$p_a);
						$p_as = str_replace("//","/",$p_as);

						frontcontrollerx::json_success(array('as'=>$record,'atom'=>$atom,'p_as'=>$p_as,'p_a'=>$p_a));
						break;
					case 'copySelection':
						$keys 		= explode(',',$_REQUEST['keys']);
						$keyClean	= array();

						foreach ($keys as $k)
						{
							if (is_numeric($k)) $keyClean[] = $k;
						}

						if (count($keyClean)>0)
						{
							$keyClean = implode(',',$keyClean);
							$settings = dbx::queryAll("select * from atoms_settings where as_id IN ($keyClean) and as_del = 'N'");
						}

						$encoded = array(
						'settings' 	=> $settings,
						'settings_md5'	=> md5(serialize($settings).$keyForCopyPast)
						);

						$encoded = str_rot13(serialize($encoded));
						frontcontrollerx::json_success(array('encoded'=>$encoded));

						break;
					case 'pasteSelection':

						$a_id			= frontcontrollerx::isInt($_REQUEST['a_id']);
						$match_Names 	= ($_REQUEST['match_Names'] == 'Y');
						$encoded 	 	= unserialize(str_rot13(trim($_REQUEST['code'])));
						$settings_md5 	= md5(serialize($encoded['settings']).$keyForCopyPast);
						$state 			= true;
						$maxSortOfSetts	= dbx::queryAttribute("select max(as_sort)+1 as maxxx from atoms_settings where as_a_id = $a_id","maxxx");

						if ($settings_md5 == $encoded['settings_md5'])
						{
							$settings = $encoded['settings'];
							foreach ($settings as $setting)
							{
								$as_id	= false;
								$insert = true;

								if ($match_Names) {
									$as_name = dbx::escape($setting['as_name']);
									$present = dbx::query("select * from atoms_settings where as_a_id = $a_id and as_name='$as_name'");
									if ($present !== false)
									{
										$as_id 	= $present['as_id'];
										$insert = false;
									}
								}


								unset($setting['as_id']);
								$setting['as_a_id'] 	= $a_id;
								$setting['as_lastmod'] 	= "NOW()";
								$setting['as_created'] 	= "NOW()";
								$setting['as_sort'] 	+= $maxSortOfSetts;


								$setting2Check = $setting;
								$setting = array();

								foreach ($setting2Check as $k => $v)
								{
									if (dbx::attributePresent('atoms_settings',$k)) {
										$setting[$k] = $v;
									}
								}

								if ($insert)
								{
									dbx::insert('atoms_settings',$setting);
								} else
								{
									dbx::update('atoms_settings',$setting,array('as_id'=>$as_id));
								}
							}
							$atom = xredaktor_atoms::getById($a_id);
							switch ($atom['a_type'])
							{
								case "WIZARD":
									xredaktor_wizards::checkWizardFields($a_id);
									break;
								default: break;
							}
						} else
						{
							$state = false;
						}
						frontcontrollerx::json_success(array('state'=>$state));
						break;
					case 'patchMultipleSelections':

						die();
						/*$all = dbx::queryAll("SELECT * FROM  `atoms_settings` WHERE  `as_type` IN ('COMBO',  'RADIO',  'CHECKBOX')");


						foreach ($all as $a)
						{
						$as_id = $a['as_id'];
						echo "<h3>Patching $as_id::</h3>";
						$as_config = json_decode($a['as_config'],true);
						if (!is_array($as_config)) continue;

						echo "<pre>";
						print_r($as_config);
						echo "</pre>";

						$as_config_new = array('l'=>$as_config,'a'=>array());

						foreach ($as_config as $config)
						{
						$as_config_new['a'][$config['v']] = $config;
						}

						echo "<pre>";
						print_r($as_config_new);
						echo "</pre>";


						dbx::update('atoms_settings',array('as_config'=>json_encode($as_config_new)),array('as_id'=>$as_id));
						}
						*/
						/*
						$all = dbx::queryAll("SELECT * FROM  `atoms_settings` WHERE  `as_type` IN ('COMBO',  'RADIO',  'CHECKBOX')");

						$patchSettings = array('v','g','DE','EN','RU','IT');


						foreach ($all as $a)
						{
						$as_id = $a['as_id'];
						echo "<h3>Patching $as_id::</h3>";
						$as_config = json_decode($a['as_config'],true);
						if (!is_array($as_config)) continue;

						echo "<pre>";
						print_r($as_config);
						echo "</pre>";

						$as_config_new = array();

						foreach ($as_config as $config)
						{
						$tmp = array();
						$latestSetting = $config[1]; // GENERIC
						foreach ($patchSettings as $i => $ps)
						{
						$isset = false;
						$isset = isset($config[$i]);
						if (trim($config[$i])=="") $isset = false;

						if (!$isset)
						{
						$v = $latestSetting;
						} else
						{
						$v = $config[$i];
						if ($i == 2) // DE
						{
						$latestSetting = $v;
						}
						}

						$tmp[$patchSettings[$i]] = $v;
						}
						$as_config_new[] = $tmp;
						}

						dbx::update('atoms_settings',array('as_config'=>json_encode($as_config_new)),array('as_id'=>$as_id));
						}
						*/

						die('FERTIG');
						break;
					case 'patchMultiLang':
						die();
						/*
						$targetLang = "DE";
						$settings 	= dbx::queryAll("select * from pages_settings_atoms, atoms_settings where as_type_multilang = 'Y' and psa_inline_a_id = as_a_id");

						echo "<pre>";
						//print_r($settings);
						//echo "</pre>";

						foreach ($settings as $s)
						{
						$as_name 	= $s['as_name'];
						$psa_id 	= $s['psa_id'];

						$psa_json_cfg_new = $psa_json_cfg = json_decode($s['psa_json_cfg'],true);
						$psa_json_cfg_new['_'.$targetLang.'_'.$as_name] = $psa_json_cfg[$as_name];
						echo 'PSA_ID:'.$psa_id." - PATCHED\n";
						echo 'OLD:'.print_r($psa_json_cfg,true)."\n";
						echo 'NEW:'.print_r($psa_json_cfg_new,true)."\n";
						dbx::update('pages_settings_atoms',array('psa_json_cfg'=>json_encode($psa_json_cfg_new)),array('psa_id'=>$psa_id));
						}


						die();
						*/
						break;
					case 'saveFormDataByPAS':

						if (!xredaktor_core::isAdmin())
						{
							xluerzer_user::liveSecurityCheckByTag('OE');
						}


						$psa_id = frontcontrollerx::isInt($_REQUEST['psa_id']);

						$_REQUEST['psa_json_cfg'] = xredaktor_render::cleanNastyThings($_REQUEST['psa_json_cfg']);

						dbx::update('pages_settings_atoms',array('psa_json_cfg'=>$_REQUEST['psa_json_cfg']),array('psa_id'=>$psa_id));

						xredaktor_pages::handle_PSA_update($psa_a_id);

						$psa 				= xredaktor_render::getPSARecordById($psa_id);
						$psa_inline_a_id 	= $psa['psa_inline_a_id'];
						$psa_p_id 			= $psa['psa_p_id'];

						$_REQUEST['cms']=1;
						$_html = xredaktor_render::renderAtom($psa_p_id,$psa_inline_a_id,$psa_id);
						frontcontrollerx::json_success(array('html'=>$_html));
						break;

					case 'getMultiFormDataByAtomConfig':
						$a_id 		= frontcontrollerx::isInt($_REQUEST['a_id']);
						$a			= xredaktor_atoms::getById($a_id);
						$settings	= dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del = 'N' order by as_sort");
						frontcontrollerx::json_success(array('atom'=>$a,'settings'=>$settings));
						break;


					case 'getFormDataByPID':

						$p_id 		= frontcontrollerx::isInt($_REQUEST['p_id']);
						$f			= xredaktor_render::getFrameByPageId($p_id);
						$a_id		= $f['a_id'];
						$settings	= dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del = 'N' order by as_sort");

						$rec = dbx::query("select * from pages_settings_atoms where psa_as_id = 0 and psa_p_id = $p_id and psa_a_id = $a_id and psa_fid=0");#
						if ($rec === false)
						{
							dbx::insert('pages_settings_atoms',array('psa_as_id'=>0,'psa_p_id'=>$p_id,'psa_a_id'=>$a_id,'psa_fid'=>0));
							$psa_id = dbx::getLastInsertId();
							$rec = dbx::query("select * from pages_settings_atoms where psa_id = $psa_id");
						} else
						{
							$psa_id = $rec['psa_id'];
						}

						frontcontrollerx::json_success(array('value'=>$rec['psa_json_cfg'],'psa_id'=>$psa_id,'page'=>true,'settings'=>$settings,'langs'=>$fe_languages));
						break;

					case 'getFormDataByPAS':
						$psa_id 	= frontcontrollerx::isInt($_REQUEST['psa_id']);
						$psa 		= xredaktor_render::getPSARecordById($psa_id);



						$psa_a_id 	= $psa['psa_inline_a_id'];
						$psa_p_id 	= $psa['psa_p_id'];

						$settings	= dbx::queryAll("select * from atoms_settings where as_a_id = $psa_a_id and as_del = 'N' order by as_sort");

						$rec = $psa;

						if ($rec === false)
						{
							dbx::insert('pages_settings_atoms',array('psa_as_id'=>0,'psa_p_id'=>$psa_p_id,'psa_a_id'=>$psa_a_id,'psa_fid'=>0));
							$psa_id = dbx::getLastInsertId();
							$rec = dbx::query("select * from pages_settings_atoms where psa_id = $psa_id");
						} else
						{
							$psa_id = $rec['psa_id'];
						}

						if (trim($rec['psa_json_cfg'])=="")
						{

							$rec['psa_json_cfg'] = array();
							$rec['psa_json_cfg'] = json_encode($rec['psa_json_cfg']);
						}

						frontcontrollerx::json_success(array('value'=>$rec['psa_json_cfg'],'psa_id'=>$psa_id,'page'=>false,'settings'=>$settings,'langs'=>$fe_languages));
						break;

					case 'updateInit':

						$data = frontcontrollerx::parseInput(array(
						'int'		=>	array('as_id'),
						'string'	=>	array('as_init')
						),true);

						$as_id = $data['as_id'];
						unset($data['as_id']);

						xredaktor_atoms_settings::update($as_id,$data);
						xredaktor_wizards::as_check($as_id);

						frontcontrollerx::json_success();
						break;

					case 'updateDB':

						$data = frontcontrollerx::parseInput(array(
						'int'		=>	array('as_id'),
						'string'	=>	array('as_db')
						),true);

						$as_id = $data['as_id'];
						unset($data['as_id']);

						xredaktor_atoms_settings::update($as_id,$data);
						xredaktor_wizards::as_check($as_id);

						frontcontrollerx::json_success();
						break;
					case 'updateConfig':

						$data = frontcontrollerx::parseInput(array(
						'int'		=>	array('as_id'),
						'string'	=>	array('as_config')
						),true);

						$as_id = $data['as_id'];
						unset($data['as_id']);

						xredaktor_atoms_settings::update($as_id,$data);
						xredaktor_wizards::as_check($as_id);

						frontcontrollerx::json_success();
						break;
					default: frontcontrollerx::error_func_notfound();
				}
				break;

			case 'busers':
				xredaktor_users::handleAjax($function);
				frontcontrollerx::error_func_notfound();
				break;

			case 'rolesX':
				xredaktor_roles::handleAjax($function);
				frontcontrollerx::error_func_notfound();
				break;

			case 'roles':

				$r_s_id = frontcontrollerx::senseVarInt('r_s_id');

				$fields = array('r_id','r_vid','r_name','r_lastmod','r_lastmodBy','r_isOnline','r_sort');
				$update = array('r_name','r_vid','r_isOnline');
				$string = array('r_name','r_isOnline');

				$extFunctionsConfig = array(
				'table'		=> 'roles',
				'sort'		=> 'r_sort',
				'pid'		=> 'r_id',
				'fid'		=> 'r_fid',
				'name'		=> 'r_name',
				'del'		=> 'r_del',
				'extraInsertFlyInt' => array('r_s_id'),
				'extraLoad'			=> " r_s_id = $r_s_id ",
				'extraInsert' => array('r_created' => 'NOW()','r_s_id'=>$r_s_id),
				'fields'	=> $fields,
				'update'	=> $update,
				'normalize'	=> array(
				'string'	=> $string,
				'int'		=> array()
				),
				'postHooks' 		=> array(
				));

				xredaktor_defaults::handleDefaultExtTree($extFunctionsConfig,$function);

				frontcontrollerx::error_func_notfound();
				break;


			case 'logs':

				$r_s_id = frontcontrollerx::senseVarInt('r_s_id');

				$fields = array('buh_id','buh_r_id','buh_wz_id','buh_table','buh_created','buh_created','buh_type','buh_human');
				$update = array();
				$string = array();

				$extFunctionsConfig = array(
				'table'		=> 'be_users_history',
				'sort'		=> 'buh_sort',
				'pid'		=> 'buh_id',
				'fid'		=> 'buh_fid',
				'name'		=> 'buh_name',
				'del'		=> 'buh_del',
				'extraInsertFlyInt' => array(),
				'extraLoad'			=> " 1 = 1 ",
				'extraInsert' => array(),
				'fields'	=> $fields,
				'update'	=> $update,
				'normalize'	=> array(
				'string'	=> $string,
				'int'		=> array()
				),
				'postHooks' 		=> array(
				));

				xredaktor_defaults::handleDefaultExtGrid($extFunctionsConfig,$function);

				frontcontrollerx::error_func_notfound();
				break;


			case 'timemachine':

				$tm_s_id = intval(frontcontrollerx::senseVarInt('tm_s_id'));

				$fields = array('tm_id','tm_fid','tm_start','tm_end','tm_online','tm_sort','tm_name');
				$update = array('tm_start','tm_end','tm_online','tm_name');
				$string = array('tm_name','tm_online');

				$extFunctionsConfig = array(
				'table'		=> 'timemachine',
				'sort'		=> 'tm_sort',
				'pid'		=> 'tm_id',
				'fid'		=> 'tm_fid',
				'name'		=> 'tm_name',
				'del'		=> 'tm_del',
				'extraInsertFlyInt' => array(),
				'extraLoad'			=> " tm_s_id = $tm_s_id ",
				'extraInsert' => array(tm_s_id=>intval($tm_s_id)),
				'fields'	=> $fields,
				'update'	=> $update,
				'normalize'	=> array(
				'string'	=> $string,
				'int'		=> array()
				),
				'postHooks' 		=> array(
				));


				switch ($function)
				{
					case 'loadData':

						$tm_id 	= intval($_REQUEST['tm_id']);
						$ret 	= array();

						if ($tm_id > 0)
						{
							$ret = dbx::query("select * from timemachine where tm_id = $tm_id");
						}

						frontcontrollerx::json_success($ret);

						break;
					case 'updateSet':

						$tm_id 	= intval($_REQUEST['tm_id']);
						$data 	= json_decode($_REQUEST['data']);

						$clean 	= array();

						foreach ($data as $k => $v)
						{
							if (in_array($k,$update)) $clean[$k] = dbx::escape($v);
						}

						if (count($clean) == 0)
						{
							frontcontrollerx::json_failure('INVALID_DATA');
						}

						if ($tm_id > 0)
						{
							dbx::update('timemachine',$clean,array('tm_id'=>$tm_id));
						}

						frontcontrollerx::json_success($clean);

						break;
					default:break;
				}



				xredaktor_defaults::handleDefaultExtTree($extFunctionsConfig,$function);
				frontcontrollerx::error_func_notfound();
				break;



			case 'pages':

				$p_s_id = frontcontrollerx::senseVarInt('p_s_id');

				if ($p_s_id === false)
				{
					if ($_REQUEST['idProperty'] == 'p_id') {
						$p_id = intval($_REQUEST['id']);
						$p_s_id = xredaktor_niceurl::getSiteIdViaPageId($p_id);
					}
				}

				if (is_numeric($p_s_id))
				{
					xredaktor_niceurl::setSiteConfig($p_s_id);
				}

				$fields = array('p_id','p_vid','p_name','p_lastmod','p_lastmodBy','p_isOnline','p_inMenue','p_frameid','p_sort','p_tm_id','p_tm_name','p_full_cache');
				$update = array('p_name','p_vid','p_isOnline','p_frameid','p_inMenue','p_tm_id','p_full_cache');
				$string = array('p_name','p_isOnline','p_inMenue','p_tm_id','p_full_cache');

				$feLanges = xredaktor_pages::getValidLangs();

				foreach ($feLanges as $l)
				{
					$l = strtolower($l);
					$fields[] = 'p_name_'.$l;
					$update[] = 'p_name_'.$l;
					$string[] = 'p_name_'.$l;
					$fields[] = 'p_nice_'.$l;
					$update[] = 'p_nice_'.$l;
					$string[] = 'p_nice_'.$l;
				}

				$extFunctionsConfig = array(
				'table'		=> 'pages',
				'sort'		=> 'p_sort',
				'pid'		=> 'p_id',
				'fid'		=> 'p_fid',
				'name'		=> 'p_name',
				'del'		=> 'p_del',

				'preSelect'			=> " , (select tm_name from timemachine where tm_id = p_tm_id) as p_tm_name ",

				'extraInsertFlyInt' => array('p_s_id'),
				'extraLoad'			=> " p_s_id = $p_s_id ",
				'extraInsert' => array('p_created' => 'NOW()','p_s_id'=>$p_s_id),
				'fields'	=> $fields,
				'update'	=> $update,
				'normalize'	=> array(
				'string'	=> $string,
				'int'		=> array('p_frameid','p_vid')
				),
				'postHooks' 		=> array(
				'insert'			=> 'xredaktor_pages::afterPageInsert',
				'update'			=> 'xredaktor_niceurl::checkCache_PAGE_POST'
				));

				xredaktor_defaults::handleDefaultExtTree($extFunctionsConfig,$function);

				switch ($function)
				{
					case 'getPathOfPage':

						$p_id 	= frontcontrollerx::isInt($_REQUEST['p_id']);
						$path 	= xredaktor_pages::getTreePathOfPages($p_id);
						$path 	= explode("/",$path);
						$p_fid	= $path[0];
						$path 	= '/'.implode("/",array_reverse($path));
						frontcontrollerx::json_success(array('path2expand'=>$path,'p_fid'=>$p_fid));

						break;
					case 'getById':
						if (!is_numeric($_REQUEST['p_id'])) frontcontrollerx::json_success(array('record'=>array()));
						$p_id = frontcontrollerx::isInt($_REQUEST['p_id']);
						frontcontrollerx::json_success(array('record'=>xredaktor_render::getPageById($p_id)));
						break;
					case 'frames':
						//if (isset($_REQUEST['p_s_id']))
						{
							xredaktor_niceurl::setSiteConfig($p_s_id);
							$frames = xredaktor_atoms::getAllFrames($p_s_id);
						}
						/*else
						{
						$frames = xredaktor_atoms::getAllFrames();
						}*/
						$_frames = array();
						foreach ($frames as $f)
						{
							$_frames[] = array(
							'k' => $f['a_id'],
							'v' => $f['a_name']
							);
						}
						frontcontrollerx::json_store($_frames);
						break;
					case 'wizards':
						$frames = xredaktor_atoms::getAllWizards();
						$_frames = array();
						foreach ($frames as $f)
						{
							$_frames[] = array(
							'k' => $f['a_id'],
							'v' => $f['a_name']
							);
						}
						frontcontrollerx::json_store($_frames);
						break;
					default: frontcontrollerx::error_func_notfound();
				}
				break;

			case 'atoms':
				{

					$a_s_id = frontcontrollerx::senseVarInt('a_s_id');
					if ($a_s_id === false)
					{
						if ($_REQUEST['idProperty'] == 'as_id') {
							$as_id = intval($_REQUEST['as_id']);
							$a_s_id = xredaktor_atoms_settings::getSiteIdByID($as_id);
						}
						else
						{
							if (is_numeric($_REQUEST['a_id']))
							{
								$a_id = intval($_REQUEST['a_id']);
								$a_s_id = xredaktor_atoms::getSiteIdByID($a_id);
							}
						}
					}

					if (is_numeric($a_s_id))
					{
						xredaktor_niceurl::setSiteConfig($a_s_id);
					}

					$fields = array('a_id','a_name','a_lastmod','a_lastmodBy','a_vid','a_sort');
					$update = array('a_name','a_vid');
					$string = array('a_name');

					$feLanges = xredaktor_pages::getValidLangs();

					foreach ($feLanges as $l)
					{
						$l = strtolower($l);
						$fields[] = 'a_name_'.$l;
						$update[] = 'a_name_'.$l;
						$string[] = 'a_name_'.$l;
					}

					$extFunctionsConfig = array(
					'roles_tag'	=> '',
					'table'		=> 'atoms',
					'sort'		=> 'a_sort',
					'pid'		=> 'a_id',
					'fid'		=> 'a_fid',
					'name'		=> 'a_name',
					'del'		=> 'a_del',
					'extraInsert' 	=> array('a_created' => 'NOW()'),
					'fields'	=> $fields,
					'update'	=> $update,
					'normalize'	=> array(
					'string'	=> $string,
					'int'		=> array('a_vid')
					),
					'postHooks' 		=> array(
					'update'			=> 'xredaktor_atoms::afterAtomRecordUpdate_POSTHOOK',
					));

					if (isset($_REQUEST['a_type']))
					{
						$a_type = $_REQUEST['a_type'];

						switch ($a_type)
						{
							case 'ATOM':
								$extFunctionsConfig['roles_tag'] = 'atoms';
								break;
							case 'FRAME':
								$extFunctionsConfig['roles_tag'] = 'frames';
								break;
							case 'WIZARD':
								$extFunctionsConfig['roles_tag'] = 'infopool';
								break;
							default: break;
						}

						switch ($a_type)
						{
							case 'ATOM':
							case 'FRAME':
							case 'WIZARD':
								$extFunctionsConfig['extraMove'] 	= " a_type = '$a_type' and a_s_id = '$a_s_id' ";
								$extFunctionsConfig['extraLoad'] 	= " a_type = '$a_type' and a_s_id = '$a_s_id' ";
								$extFunctionsConfig['extraInsert'] 	= array('a_type' => $a_type,'a_s_id'=>$a_s_id);
								break;
							default: break;
						}
					}

					$guiMode = $_REQUEST['gui_mode'];
					if ($guiMode == 'NONE') {
						$guiMode = $_REQUEST['a_type'];
					}

					switch ($guiMode)
					{
						case 'INFOPOOL':
							$limit_wizards = xredaktor_core::getUserSettings_LIMIT_Infopool();
							if ($limit_wizards !== false) {
								if (is_array($limit_wizards))
								{
									$extFunctionsConfig['extraLoad'] 	.= " and a_id IN (".implode(" , ",$limit_wizards)." ) ";
								}
							}
							break;
						case 'ATOM':
						case 'FRAME':
						case 'WIZARD':
							break;
						default: break;
					}

					xredaktor_defaults::handleDefaultExtTree($extFunctionsConfig,$function);

					switch ($function)
					{
						case 'updateAtomFormPanelSettings':
							$a_id = frontcontrollerx::isInt($_REQUEST['a_id']);
							$a_gui_cols = intval($_REQUEST['a_gui_cols']);
							dbx::update("atoms",array('a_gui_cols'=>$a_gui_cols),array('a_id'=>$a_id));
							frontcontrollerx::json_success();
							break;
						case 'synchWizardSettings':
							$a_id = frontcontrollerx::isInt($_REQUEST['a_id']);
							xredaktor_wizards::checkWizardFields($a_id);
							frontcontrollerx::json_success();
							break;
						case 'getPathOfAtom':

							$a_id 	= frontcontrollerx::isInt($_REQUEST['a_id']);
							$path 	= xredaktor_atoms::getTreePathOfAtoms($a_id);
							$path 	= explode("/",$path);
							$a_fid	= $path[0];
							$path 	= '/'.implode("/",array_reverse($path));
							frontcontrollerx::json_success(array('path2expand'=>$path,'a_fid'=>$a_fid));

							break;
						case 'updateWizardSettings':
							$a_id = frontcontrollerx::isInt($_REQUEST['a_id']);
							$data = array();
							if (is_numeric($_REQUEST['a_wizard_as_p_name']))
							{
								$data['a_wizard_as_p_name'] = $_REQUEST['a_wizard_as_p_name'];
							}
							if (isset($_REQUEST['a_wizard_online']))
							{
								$data['a_wizard_online'] = ($_REQUEST['a_wizard_online']=='Y') ? 'Y':'N';
							}
							if (count($data)>0)
							{
								xredaktor_atoms::updateById($a_id,$data);
							}
							frontcontrollerx::json_success();
							break;
						case 'getWizards':
							$s_id = frontcontrollerx::isInt($_REQUEST['a_s_id'],'getWizards');
							$wizards = xredaktor_atoms::getAllWizardsOK($s_id);

							$scope 		= $_REQUEST['scope'];
							$scopeIds 	= array();

							switch ($scope)
							{
								case 'REPORT':
								case 'CRM':
									$scopeIds = array(65,49);
									break;
								case 'CMS':
									$scopeIds = array(36,47,41,51,43,39);
									break;
								default:break;
							}

							if (count($scopeIds)>0)
							{
								$wizards2 = array();
								foreach ($wizards as $w)
								{
									if (in_array($w['a_id'],$scopeIds)) $wizards2[] = $w;
								}
								frontcontrollerx::json_store($wizards2);
							} else
							{
								frontcontrollerx::json_store($wizards);
							}
							break;
						case 'setWizardSettings':
							$a_id 				= frontcontrollerx::isInt($_REQUEST['a_id']);
							$a_wizardSettings	= $_REQUEST['a_wizardSettings'];
							$a_wizardSettingsJ	= json_decode($a_wizardSettings,true);


							// ONLINE UND OFFLINE

							$a_wizard_online = ($a_wizardSettingsJ['es_online']=='Y') ? 'Y' : 'N';

							xredaktor_atoms::updateById($a_id,array('a_wizard_online'=>$a_wizard_online));

							// CHECK RENAMING
							$a_wizardSettingsOld = xredaktor_wizards::getWizardSettings($a_id);
							if ($a_wizardSettingsOld['es_databaseTableName'] != $a_wizardSettingsJ['es_databaseTableName']) {

								$tableOld = trim($a_wizardSettingsOld['es_databaseTableName']);
								$tableNew = trim($a_wizardSettingsJ['es_databaseTableName']);

								if (($tableNew != $tableOld) && ($tableNew != "") && ($tableOld != ""))

								if (dbx::tablePresent($tableOld))
								{
									if (dbx::tablePresent($tableNew))
									{
										frontcontrollerx::json_failure("Der Datenbankname '$tableNew' ist bereits in Verwendung!");
									} else
									{
										dbx::renameTable($tableOld,$tableNew);
									}
								}
							}
							dbx::update('atoms',array('a_wizardSettings'=>$a_wizardSettings),array('a_id'=>$a_id));
							xredaktor_wizards::checkTableAndCreateIfNotExistsViaAtom($a_id);

							xredaktor_atoms::updateById($a_id,array('a_wizard_online'=>($a_wizardSettingsJ['es_online'] == 'N') ? 'N' : 'Y'));

							frontcontrollerx::json_success();
							break;
						case 'getWizardSettings':
							$a_id = frontcontrollerx::isInt($_REQUEST['a_id']);

							$ass = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del = 'N'");
							if (!is_array($ass)) $ass = array();

							$ass[] = array(
							'as_id'		=> '-1',
							'as_name'	=> 'id',
							'as_label'	=> '[Interne Nummer]'
							);

							$ass2 = array();
							$arrayStore = array();
							foreach ($ass as $as) {
								$as_name		= $as['as_name'];
								$as_id 			= $as['as_id'];
								$as_label 		= $as['as_label'];
								$ass2[$as_id] = $as;
								$arrayStore[] = array($as_id,$as_label);
							}

							frontcontrollerx::json_success(array('record'=>xredaktor_render::getAtom($a_id),'fields'=>$arrayStore,'ass'=>$ass2));
							break;

						case 'saveCode':
							$a_id 				= frontcontrollerx::isInt($_REQUEST['a_id']);
							$a_content 			= $_REQUEST['a_content'];
							$a_content_array 	= array();

							if (is_numeric($_REQUEST['f_id'])) {

								$a_content 	= $_REQUEST['content'];
								$f_id 		= intval($_REQUEST['f_id']);

								global $XREDAKTOR_CODE_TESTING;
								$XREDAKTOR_CODE_TESTING = 1;

								$tmp = hdx::getTempFileName('test_smarty_code');

								try {
									hdx::fwrite($tmp,$a_content);
									ob_start();
									templatex::render($tmp,array('XREDAKTOR_CODE_TESTING'=>1),xredaktor_render::getSmartyAddOnsDir(),xredaktor_render::getSmartyTemplatesDir());
									ob_clean();
								} catch (Exception $e)
								{
									ob_clean();
									unlink($tmp);
									frontcontrollerx::json_failure("<b>Fehler im Smarty Template, speichern abgebrochen.</b>\n<br>\n<br>".$e->getMessage());
								}


								unlink($tmp);

								switch ($f_id)
								{
									case 0:
										xredaktor_atoms::saveContentById($a_id,$a_content);
										break;
									default:
										xredaktor_atoms::saveContentByIdAndFace($a_id,$f_id,$a_content);
										break;
								}

								frontcontrollerx::json_success();

							}

							global $XREDAKTOR_CODE_TESTING;
							$XREDAKTOR_CODE_TESTING = 1;

							$tmp = hdx::getTempFileName('test_smarty_code');
							try {
								hdx::fwrite($tmp,$a_content);
								ob_start();
								templatex::render($tmp,array('XREDAKTOR_CODE_TESTING'=>1),xredaktor_render::getSmartyAddOnsDir(),xredaktor_render::getSmartyTemplatesDir());
								ob_clean();
							} catch (Exception $e)
							{
								ob_clean();
								unlink($tmp);
								frontcontrollerx::json_failure("<b>Fehler im Smarty Template, speichern abgebrochen.</b>\n<br>\n<br>".$e->getMessage());
							}
							unlink($tmp);
							//xredaktor_atoms::saveContentById($a_id,$a_content);
							$a_content_array[0] = $a_content;


							$faces = xredaktor_core::getFaces();
							foreach ($faces as $f)
							{
								$f_id = intval($f['f_id']);
								if ($f_id == 0) continue;

								$f_name 		= $f['f_name'];
								$a_content_x 	= $_REQUEST['a_content_'.$f_id];

								global $XREDAKTOR_CODE_TESTING;
								$XREDAKTOR_CODE_TESTING = 1;
								$tmp = hdx::getTempFileName('test_smarty_code');
								try {
									hdx::fwrite($tmp,$a_content_x);
									ob_start();
									templatex::render($tmp,array('XREDAKTOR_CODE_TESTING'=>1),xredaktor_render::getSmartyAddOnsDir(),xredaktor_render::getSmartyTemplatesDir());
									ob_clean();
								} catch (Exception $e)
								{
									ob_clean();
									unlink($tmp);
									frontcontrollerx::json_failure("<b>Fehler im Smarty Template ($f_name), speichern abgebrochen.</b>\n<br>\n<br>".$e->getMessage());
								}
								unlink($tmp);
								//xredaktor_atoms::saveContentByIdAndFace($a_id,$f_id,$a_content_x);
								$a_content_array[$f_id] = $a_content_x;
							}
							xredaktor_atoms::saveMultiContent($a_id,$a_content_array);
							frontcontrollerx::json_success($faces);
							break;
						case 'loadCode':
							$a_id 	= frontcontrollerx::isInt($_REQUEST['a_id']);
							$a		= xredaktor_atoms::getById($a_id);
							frontcontrollerx::json_success(array('atom'=>$a));
							break;
						default: frontcontrollerx::error_func_notfound();
					}


				}
				break;



			case 'storage':
				{





					switch ($function)
					{
						case 'delDir':
							frontcontrollerx::json_failure("ACTION are not permitted.");
							die();
							break;
						case 'update':
						case 'move':

							$s_id = intval($_REQUEST['id']);
							$s = dbx::query("select * from storage where s_id = $s_id");

							if ($s['s_dir'] == 'Y')
							{

								frontcontrollerx::json_failure("ACTION are not permitted.");
								die();
							}


							break;
						case 'cropImageAndSaveNew':

							$s_id = intval($_REQUEST['s_id']);
							$crop = json_decode($_REQUEST['crop'],true);


							$iAmAlreadyCropped = xredaktor_storage::getById($s_id);
							if ($iAmAlreadyCropped['s_crop_original_s_id']>0)
							{
								$s_id = $iAmAlreadyCropped['s_crop_original_s_id'];
							}

							$params = array(
							's_id' 		=> $s_id,
							'w' 		=> intval($crop['w']),
							'h' 		=> intval($crop['h']),
							'ext' 		=> 'jpg',
							'fullpath' 	=> 'Y',
							'rmode'		=> 'vcut',
							'crop'		=> json_encode($crop)
							);

							$img  = xredaktor_storage::xr_img2($params);
							$src  = $img['src'];
							$file = xredaktor_storage::getFileDstById($s_id);


							$dir 	= dirname($file);
							$name 	= basename($file);

							$nameSplitted = explode(".",$name);
							$ext 		  = array_pop($nameSplitted);

							$tagCrop 	= array();
							$tagCrop[] 	= "x".intval($crop['x']);
							$tagCrop[] 	= "y".intval($crop['y']);
							$tagCrop[] 	= "w".intval($crop['w']);
							$tagCrop[] 	= "h".intval($crop['h']);
							$tagCrop	= implode("_",$tagCrop);

							$name		  = implode(".",$nameSplitted).'_auto_cropped_'.$tagCrop.'.'.$ext;
							$file = $dir . '/' . $name;

							copy($src,$file);
							$new_s_id = xredaktor_storage::registerExistingFile(xredaktor_storage::getFileStorageScopeId($s_id),$file);

							dbx::update('storage',array('s_crop_original_s_id'=>$s_id,'s_crop_data'=>json_encode($crop)),array('s_id'=>$new_s_id));

							frontcontrollerx::json_success(array('file'=>$img,'file'=>$file,'new_s_id'=>$new_s_id));
							break;

						case 'yr_img2':
							$splitted = explode("/",$_SERVER['REQUEST_URI'],8);
							list($settings,$crap) = explode(".",$splitted[7],2);
							$settings = json_decode(base64_decode($settings),true);

							echo "<pre>";
							print_r($settings);
							echo "</pre>";
							die();

							break;

						case 'xr_img2':
							$splitted = explode("/",$_SERVER['REQUEST_URI'],8);
							list($settings,$crap) = explode(".",$splitted[7],2);
							$settings = json_decode(base64_decode($settings),true);

							$rmode = "vcut";

							if (isset($settings['RMODE']))
							{
								$rmode = $settings['RMODE'];
							}


							$params = array(
							's_id' 		=> intval($settings['IMG']),
							'w' 		=> intval($settings['WIDTH']),
							'h' 		=> intval($settings['HEIGHT']),
							'ext' 		=> trim($settings['EXT']),
							'fullpath' 	=> 'Y',
							'rmode'		=> $rmode,
							'crop'		=> $settings['CROP']
							);

							$img = xredaktor_storage::xr_img2($params);

							//		$rmode 	= $params['rmode'];
							//		$ext 	= $params['ext'];

							imagesx::readfile_if_modified($img['src'], array('Content-Type: '.$img['mime']));

							die();

							break;
						case 'scaleBoxed' :
							$splitted = explode("/",$_SERVER['REQUEST_URI']);

							$param_0 = $splitted[7];
							$param_1 = $splitted[8];
							$param_2 = $splitted[9];
							libx::turnOnErrorReporting();

							if ($param_0=='')
							{
								$s_onDisk = dirname(__FILE__).'/../../../xframe/icons/mime/NoFile.png';
								imagesx::smartResizer($s_onDisk,$param_1,$param_2,3000,false,false,false,true,'png');
								die();
							}

							$param_0 = frontcontrollerx::isInt($param_0);
							$param_1 = frontcontrollerx::isInt($param_1);
							$param_2 = frontcontrollerx::isInt($param_2);


							$f 			= xredaktor_storage::getById($param_0);
							$s_onDisk 	= $f['s_onDisk'];

							$strict = false;

							if (!is_file($s_onDisk))
							{
								$s_onDisk 	= dirname(__FILE__).'/../../../xframe/icons/diff/1377281205_file_broken.png';
								$strict 	= true;
								//$cacheFile 	= false;
							} else {

								if (!hdx::isImage($s_onDisk))
								{
									$strict = true;
									$ext = strtolower(array_pop(explode(".",$s_onDisk)));
									$s_onDisk = dirname(__FILE__).'/../../../xframe/icons/mime/'.$ext.'.png';
									if (!file_exists($s_onDisk)) {
										$s_onDisk = dirname(__FILE__).'/../../../xframe/icons/mime/Default.png';
									}

								} else
								{
									if (($f['s_media_w']<$param_1) && ($f['s_media_h']<$param_2))
									{
										$strict = true;
									}
									$strict = true;
								}
							}



							$cacheDir = xredaktor_storage::getDirOfStorageScopeCache(xredaktor_storage::getByIdStorageScope($param_0));
							imagesx::smartResizer($s_onDisk,$param_1,$param_2,3000,$cacheDir,false,false,$strict,'png');

							die();
							break;
						default: break;
					}

					$fields = array('s_id','s_name','s_lastmod','s_lastmodBy','webSrc','scaleSrc','s_alts','s_dir','s_mimeType','s_media_w','s_media_h','s_fileSizeBytes','s_fileSizeBytesHuman','s_storage_scope');
					$update = array('s_name','s_alts');
					$string = array('s_name');

					$feLanges = xredaktor_pages::getValidLangs();

					foreach ($feLanges as $l)
					{
						$l = strtolower($l);
						$fields[] = 's_name_'.$l;
						$update[] = 's_name_'.$l;
						$string[] = 's_name_'.$l;
					}


					$s_storage_scope = intval($_REQUEST['s_storage_scope']);

					$extFunctionsConfig = array(
					'roles_tag'			=> 'fa',
					'table'				=> 'storage',
					'sort'				=> 's_sort',
					'pid'				=> 's_id',
					'fid'				=> 's_fid',
					'del'				=> 's_del',
					'name'				=> 's_name',
					'extraLoad'			=> "s_dir = 'Y' and s_storage_scope = '$s_storage_scope'",
					'isDirCheck'		=> 'xredaktor_storage::isDir',
					'fields'			=> $fields,
					'update'			=> $update,
					'normalize'			=> array(
					'string'			=> $string),
					's_storage_scope'	=> $s_storage_scope,
					'extraInsert'		=> array(
					's_storage_scope'	=> $s_storage_scope),
					'preHooks' 			=> array(
					'insert'			=> 'xredaktor_storage::preInsert',
					'move'				=> 'xredaktor_storage::preMove',
					'update'			=> 'xredaktor_storage::preRename'),
					'postHooks' 		=> array(
					'insert'			=> 'xredaktor_storage::dirInsert',
					'move'				=> 'xredaktor_storage::dirMove',
					'update'			=> 'xredaktor_storage::dirRename',
					));


					switch ($function)
					{
						case 'load':
							$limit_fa = xredaktor_core::getUserSettings_LIMIT_FileArchiv();
							if ($limit_fa !== false)
							{
								if (is_array($limit_fa))
								{
									$extFunctionsConfig['extraLoad'] .= " and s_id IN (".implode(" , ",$limit_fa)." ) ";
								}
							}
							break;
						default: break;
					}

					xredaktor_defaults::handleDefaultExtTree($extFunctionsConfig,$function);

					switch ($function)
					{

						case 'fileNameExists':
							$s_id 				= frontcontrollerx::isInt($_REQUEST['s_id']);
							$s_storage_scope 	= frontcontrollerx::isInt($_REQUEST['s_storage_scope']);


							$file_name	= basename($_REQUEST['f_filename']);
							$file_size	= filesize($file_tmp);

							if ($s_id != 0)
							{
								$s = xredaktor_storage::getById($s_id);
								if ($s['s_dir'] != 'Y') frontcontrollerx::json_failure('DIR_NOT_EXISTS',2);
								$s_onDisk	= $s['s_onDisk'];
							} else
							{
								$s_onDisk	= xredaktor_storage::getDirOfStorageScope($s_storage_scope);
							}

							$finalDest 	= $s_onDisk . '/' . $file_name;

							$exists  = (is_file($finalDest));

							if ($exists)
							{
								$finalDest = xredaktor_storage::findNotUsedFileName($s_onDisk,$finalDest);
							}

							$final_name = basename($finalDest);

							frontcontrollerx::json_success(array('file_exists'=>$exists,'final_name'=>$final_name,'ts'=>date("d.m.Y H:s:i")));

							break;

						case 'file-upload-single':
							xredaktor_storage::fc_singleUpload();
							break;

						case 'file-upload':
							xredaktor_storage::fc_handleUpload();
							break;


						case 'getFileInfo':

							$s_id 	= frontcontrollerx::isInt($_REQUEST['s_id']);
							$f 		= xredaktor_storage::getById($s_id,true);


							$f['file_mod'] 	= date ("Y-m-d H:i:s", filemtime($f['s_onDisk']));
							$f['file_size'] = hdx::bytes2HumanReadAble(filesize($f['s_onDisk']));

							if (!file_exists($f['s_onDisk'])) {
								$f['file_mod'] 	= "-";
								$f['file_size'] = "-";
								$f['webSrc'] 	= "-";
								$f['s_onDisk'] 	= "file missing";
							}

							$fMapper = array(
							's_id' 					=> 'id',
							's_name' 				=> 'name',
							's_mimeType' 			=> 'mimeType',
							's_media_w' 			=> 'width',
							's_media_h' 			=> 'height',
							's_media_h' 			=> 'height',
							's_fileSizeBytesHuman' 	=> 'db size',
							'file_size' 			=> 'file size',
							's_created' 			=> 'db created',
							's_lastmod' 			=> 'db lastmod',
							'file_mod'				=> 'file lastmod',
							'webSrc' 				=> 'url',
							's_onDisk' 				=> 'path',
							's_version'				=> 'updates',
							's_crop_original_s_id'	=> 'original-file',
							's_crop_data'			=> 'crop-data',
							);


							$original = false;
							if ($f['s_crop_original_s_id']>0)
							{
								$original = xredaktor_storage::getById($f['s_crop_original_s_id'],true);
							}

							$file_info = array();

							foreach ($fMapper as $k => $title) {
								$file_info[$title] = $f[$k];
							}




							frontcontrollerx::json_success(array('file_info'=>$file_info,'original_file'=>$original,'f'=>$f));


							break;

						case 'getById':
							$s_id 	= frontcontrollerx::isInt($_REQUEST['s_id']);
							$file 	= xredaktor_storage::getById($s_id,true);
							frontcontrollerx::json_success(array('file'=>$file));
							break;
						case 'loadFilesMixed':

							$files = xredaktor_storage::getFiles($extFunctionsConfig);
							if (!is_array($files)) $files = array();
							foreach ($files as $i=>$f)
							{
								$alts = json_decode($f['s_alts'],true);
								foreach ($alts as $k => $v)
								{
									$files[$i]['s_alt_'.$k]=$v;
								}
							}
							frontcontrollerx::json_store($files);
							break;
						case 'updateMixed':

							$id 	= frontcontrollerx::isInt($_REQUEST['id']);
							$file 	= xredaktor_storage::getById($id);
							if ($file === false) frontcontrollerx::json_failure('FILE_NOT_EXISTS');

							if (substr($_REQUEST['field'],0,5)=='s_alt')
							{
								$lang = substr($_REQUEST['field'],6,2);
								if (in_array(strtolower($lang),xredaktor_pages::getValidLangs()))
								{
									$lang = strtoupper($lang);
									$alts = json_decode($file['s_alts'],true);
									if (!is_array($alts)) $alts = array();
									$alts[$lang] = dbx::escape($_REQUEST['value']);
									xredaktor_storage::updateDb($id,array('s_alts'=>json_encode($alts)));
									frontcontrollerx::json_success();
								}
								frontcontrollerx::json_failure('WRONG_LANG');
							}

							if ($_REQUEST['field'] == "s_name")
							{
								$s_name = basename(frontcontrollerx::isNotEmptyString($_REQUEST['value']));
								xredaktor_storage::updateFileName($id,$s_name);
								frontcontrollerx::json_success();
							}

							frontcontrollerx::json_failure('NOTHING_TO_DO_FOR_ME');
							break;
						case 'zipFiles':
							$ids = explode(',',$_REQUEST['ids']);
							if (!is_array($ids)) $ids = array();
							$files2pack = array();
							foreach ($ids as $id)
							{
								if (!is_numeric($id)) continue;
								$files2pack[] = xredaktor_storage::getFileDstById($id);
							}
							if (count($files2pack)>0)
							{
								hdx::zipFilesAndSendAsDownload($files2pack,'downloadPackage.zip');
							}
							die('NO_FILES');
							break;
						case 'updateStorageSize':
							/*$all = dbx::queryAll("select * from storage where 1");
							foreach ($all as $f)
							{
							$s_fileSizeBytes = $f['s_fileSizeBytes'];
							$s_id = $f['s_id'];
							dbx::update('storage',array('s_fileSizeBytesHuman'=>hdx::bytes2HumanReadAble($s_fileSizeBytes)),array('s_id'=>$s_id));
							}
							die();*/
							break;
						case 'moveFiles':
							$info = xredaktor_storage::moveFiles($_REQUEST['doThis']);
							frontcontrollerx::json_success($info);
						case 'loadUsage':
							$all = array();
							frontcontrollerx::json_store($all);
							break;
						case 'getDir_s_id':

							$f_s_id 	= intval($_REQUEST['f_s_id']);
							$addOnPath	= str_replace("..",'',$_REQUEST['addPath']);

							$storageScopeId = xredaktor_storage::getFileStorageScopeId($f_s_id);
							$dir = xredaktor_storage::getFileDstById($f_s_id)."/".$addOnPath;
							exec("mkdir -p $dir");
							if (is_dir($dir))
							{
								$s_id = xredaktor_storage::registerExistingDir($storageScopeId,$dir);
								frontcontrollerx::json_success(array('s_id'=>$s_id,'dir'=>$dir));
							} else
							{
								frontcontrollerx::json_failure("CANNOT CREATE DIR");
							}
							break;

						case 'downloadFile':
							$param_0 	= frontcontrollerx::isInt($param_0);
							$f 			= xredaktor_storage::getById($param_0);
							$s_onDisk 	= $f['s_onDisk'];
							frontcontrollerx::sendFile2ClientAsDownlod($s_onDisk);
							break;
						case 'syncDir':
							$s_id 				= frontcontrollerx::isInt($_REQUEST['s_id']);
							$s_storage_scope	= frontcontrollerx::isInt($_REQUEST['s_storage_scope']);
							$state = xredaktor_storage::syncFromDisc($s_storage_scope,$s_id);
							frontcontrollerx::json_success(array('s_id'=>$s_id,'state'=>$state));
							break;
						case 'getPathOfFile':
							$s_id 	= frontcontrollerx::isInt($_REQUEST['s_id']);
							$path 	= xredaktor_storage::getTreePathOfFile($s_id);
							$path 	= explode("/",$path);
							$s_fid	= $path[0];
							$path 	= '/'.implode("/",array_reverse($path));
							frontcontrollerx::json_success(array('path2expand'=>$path,'s_fid'=>$s_fid));
							break;
						case 'getPathOfDir':
							$s_id 	= frontcontrollerx::isInt($_REQUEST['s_id']);
							$path 	= xredaktor_storage::getTreePathOfFile($s_id);
							$path 	= explode("/",$path);
							$s_fid	= $path[0];
							$path 	= '/'.implode("/",array_reverse($path));
							$path	.= '/'.$s_id;
							$path  = str_replace("//","/",$path);
							frontcontrollerx::json_success(array('path2expand'=>$path,'s_fid'=>$s_fid));
							break;
						case 'updateName':


							$s_id 			= frontcontrollerx::isInt($_REQUEST['s_id']);
							$s_name 		= frontcontrollerx::isNotEmptyString($_REQUEST['s_name']);
							$s_name_safe 	= basename(xredaktor_storage::webSafeFileName($s_name));

							$f 		= xredaktor_storage::getById($s_id);
							$f_name = $f['s_name'];

							$ext_o 	= strtolower(hdx::getFileExtension($f_name));
							$ext_n 	= strtolower(hdx::getFileExtension($s_name));

							if ($ext_o != $ext_n) {
								if ($_REQUEST['userApproved'] == 'skipCheckExtension') {
									$s_name = $s_name_safe;
								} else
								{
									frontcontrollerx::json_success(array('overrideParam'=>'skipCheckExtension','title'=>'Achtung','msg'=>'Dateiendung wurde geändert. Wollen Sie wirklich die Datei umbennen ?'));
								}
							}

							if ($s_name_safe != $s_name) {
								if ($_REQUEST['userApproved'] == 'skipWebSafeNameRename') {
									$s_name = $s_name_safe;
								} else
								{
									frontcontrollerx::json_success(array('overrideParam'=>'skipWebSafeNameRename','title'=>'Achtung','msg'=>'Der Dateiname ist nicht Websafe. Dateiname automatisch in <b>'.$s_name_safe.'</b> umbenennen ?'));
								}
							}

							xredaktor_storage::updateFileName($s_id,$s_name);
							frontcontrollerx::json_success();
							break;
						case 'delDir':
							$s_id 		= frontcontrollerx::isInt($_REQUEST['s_id']);
							$usage 		= xredaktor_storage::delDir($s_id);
							frontcontrollerx::json_success(array('files_used'=>$usage));
							break;
						case 'delFiles':
							$ids = xredaktor_storage::delFiles(frontcontrollerx::isNotEmptyString($_REQUEST['s_ids']));
							frontcontrollerx::json_success(array('ids'=>$ids));
							break;
						case 'getAlts':
							$s_id 	= frontcontrollerx::isInt($_REQUEST['s_id']);
							$s = xredaktor_storage::getById($s_id);
							frontcontrollerx::json_success(array('record'=>$s));
							break;
						case 'updateAlts':
							$s_id 	= frontcontrollerx::isInt($_REQUEST['s_id']);
							$s_alts = $_REQUEST['s_alts'];

							xredaktor_storage::updateDb($s_id,array(
							's_alts' => $s_alts
							));

							frontcontrollerx::json_success();
							break;
						case 'updateImages':

							$files = dbx::queryAll("select * from storage where s_dir = 'N'");


							foreach ($files as $f)
							{
								$s_id = $f['s_id'];
								$noDisk = $f['s_onDisk'];
								list($width, $height, $type, $attr) = getimagesize($noDisk);

								xredaktor_storage::updateDb($s_id,array(
								's_media_w' => $width,
								's_media_h' => $height
								));
							}

							frontcontrollerx::json_success();

							break;
						case 'scale' :
							libx::turnOnErrorReporting();
							$param_0 = frontcontrollerx::isInt($param_0);
							$param_1 = frontcontrollerx::isInt($param_1);
							$param_2 = frontcontrollerx::isInt($param_2);

							$cacheDir = xredaktor_storage::getDirOfStorageScopeCache(xredaktor_storage::getByIdStorageScope($param_0));
							imagesx::smartResizer(xredaktor_storage::getFileDstById($param_0),$param_1,$param_2,150,$cacheDir);
							break;

						case 'uploadFrame':
							frontcontrollerx::flashUpload_enable();
							$s_storage_scope = intval($_REQUEST['s_storage_scope']);
							echo templatex::render(dirname(__FILE__).'/../templates/uploadFrame.tpl',array(
							's_id'				=> intval($_REQUEST['s_id']),
							's_storage_scope'	=> $s_storage_scope,
							'session'			=> session_id()));
							die();
							break;
						case 'loadFiles':
							frontcontrollerx::processExtTree_load($extFunctionsConfig,	'xredaktor_storage::getFiles');
							break;
						default: frontcontrollerx::error_func_notfound();
					}


				}
				break;

			case 'render':
				{


					if (!xredaktor_core::isAdmin())
					{
						xluerzer_user::liveSecurityCheckByTag('OE');
					}


					switch ($function)
					{
						case 'atomMoveUp':
							$_REQUEST['cms']=1;
							list($psa_record,$container_html) = xredaktor_render::atomMoveUp(array(
							'psa_id' 			=> frontcontrollerx::isInt($_REQUEST['psa_id'])
							));
							frontcontrollerx::json_success(array('record'=>$psa_record,'container_html'=>$container_html));
							break;
						case 'atomMoveDown':
							$_REQUEST['cms']=1;
							list($psa_record,$container_html) = xredaktor_render::atomMoveDown(array(
							'psa_id' 			=> frontcontrollerx::isInt($_REQUEST['psa_id'])
							));
							frontcontrollerx::json_success(array('record'=>$psa_record,'container_html'=>$container_html));
							break;

						case 'atomInsertBefore':
							$_REQUEST['cms']=1;
							list($psa_record,$container_html) = xredaktor_render::atomInsertBefore(array(
							'psa_id' 			=> frontcontrollerx::isInt($_REQUEST['psa_id']),
							'psa_inline_a_id' 	=> frontcontrollerx::isInt($_REQUEST['psa_inline_a_id'])
							));
							frontcontrollerx::json_success(array('record'=>$psa_record,'container_html'=>$container_html));
							break;

						case 'atomAppend':
							$_REQUEST['cms']=1;
							list($psa_record,$container_html) = xredaktor_render::atomAppend(array(
							'psa_inline_a_id'	=> frontcontrollerx::isInt($_REQUEST['psa_inline_a_id']),
							'psa_fid' 			=> frontcontrollerx::isInt($_REQUEST['psa_id']),
							'psa_as_id' 		=> frontcontrollerx::isInt($_REQUEST['psa_as_id'])
							));

							frontcontrollerx::json_success(array('record'=>$psa_record,'container_html'=>$container_html));
							break;
						case 'atomRemove':
							$_REQUEST['cms']=1;
							list($container_html) = xredaktor_render::atomRemove(array(
							'psa_id' 			=> frontcontrollerx::isInt($_REQUEST['psa_id'])
							));
							frontcontrollerx::json_success(array('container_html'=>$container_html));

							break;
						case 'page' :

							$_REQUEST['cms']=1;
							//$_REQUEST['cms2']=1;
							$p_id = frontcontrollerx::isInt($_REQUEST['p_id']);
							$p_s_id = xredaktor_niceurl::getSiteIdViaPageId($p_id);

							xredaktor_niceurl::setSiteConfig($p_s_id);
							xredaktor_render::renderPageEvenItIsOffline();
							$html = xredaktor_render::renderPage($p_id,true);
							$html = str_replace("<base","<edit_modus_xr_base",$html);


							die($html);
						case 'vpage' :
							$_REQUEST['cms']=0;
							$p_vid = intval($_REQUEST['p_vid']);
							$page = dbx::query("select * from pages where p_vid = $p_vid");
							if ($page === false)
							{
								$html = "Virtuelle Seite $p_vid existiert nicht ...";
							} else
							{
								$html = xredaktor_render::renderPageByVID($p_vid,true);
							}
							frontcontrollerx::json_success(array('html'=>$html));
							break;
						default: frontcontrollerx::error_func_notfound();
					}
				}
				break;

			default: frontcontrollerx::error_scope_notfound();
		}
	}
}
