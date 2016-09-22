<?

class xredaktor_forms extends xredaktor_sanitize
{

	public static function defaultFeRenderById($f_id)
	{
		$f_id = intval($f_id);
		$f = dbx::query("select * from forms where f_id = $f_id");
		if ($f === false) die('x_0');

		$f_a_id 	= intval($f['f_a_id']);
		$site 		= dbx::query("select sites.* from atoms,sites where a_s_id = s_id and a_id = $f_a_id");
		$s_p_forms	= intval($site['s_p_forms']);


		global $_REQUEST;
		$_REQUEST['form_id'] = $f_id;
		xredaktor_render::renderPage($s_p_forms);
		die();
	}

	public static function getSiteId()
	{
		return 1;
	}

	public static $cacheMapping = false;
	public static function getMappings()
	{

		if (self::$cacheMapping === false)
		{
			$siteId 	= self::getSiteId();
			$mappings 	= dbx::queryAll("select * from forms_mappings where fm_s_id = $siteId and fm_del='N'");

			self::$cacheMapping = array();
			foreach ($mappings as $m)
			{
				$fm_type 	= $m['fm_type'];
				$fm_a_id	= intval($m['fm_a_id']);

				self::$cacheMapping[$fm_type] = $fm_a_id;
			}
		}

		return self::$cacheMapping;
	}


	public static function getAtomIdByAsId($as_id)
	{
		$mappings	= self::getMappings();
		$as_id 		= intval($as_id);
		$as_type 	= dbx::queryAttribute("select as_type from atoms_settings where as_id = $as_id","as_type");
		return intval($mappings[$as_type]);
	}

	public static function getAtomIdByGuiType($gui_type)
	{
		$mappings	= self::getMappings();
		return intval($mappings['GUI_'.$gui_type]);
	}


	public static function getSettingsByFasId($fas_id)
	{

		$configVID = intval(dbx::queryAttribute("select fm_config_wz_id from forms_atoms_settings, forms_mappings, atoms_settings where fas_id = $fas_id and fas_as_id = as_id and fm_type = as_type","fm_config_wz_id"));

		if ($configVID == 0)
		{
			$configVID 	= 6102;
		}

		$settings = wzx::vget($configVID,$fas_id);
		//self::print_r($settings);

		return $settings;
	}

	public static function getSettingsByFasIdGui($fas_id)
	{

		$configVID = intval(dbx::queryAttribute("select fm_config_wz_id from forms_atoms_settings, forms_mappings, atoms_settings where fas_id = $fas_id and CONCAT('GUI_',fas_gui_type) = fm_type","fm_config_wz_id"));
		if ($configVID == 0) return false;
		$settings = wzx::vget($configVID,$fas_id);
		return $settings;
	}

	private static $used_as_ids = array();

	public static function renderFormById_fe($f_id,$form_uid,$raw=false,$fas_fid=0)
	{
		$html = array();

		$col_a_id 			= self::getAtomIdByGuiType('col');

		$grid_a_id 			= self::getAtomIdByGuiType('grid');
		$grid_column_a_id 	= self::getAtomIdByGuiType('grid_column');

		$tabpanel_a_id 		= self::getAtomIdByGuiType('tabpanel');
		$tabpanel_tab_a_id 	= self::getAtomIdByGuiType('tab');




		$form_wz_id		= intval($raw['_wizard_id']);
		$form_wz_r_id	= intval($raw['wz_id']);



		$records = dbx::queryAll("select * from forms_atoms_settings a where fas_f_id = $f_id and fas_fid = $fas_fid and fas_del='N' order by fas_sort");
		foreach ($records as $r)
		{
			$fas_id 	= $r['fas_id'];
			$fas_type 	= $r['fas_type'];

			switch ($fas_type)
			{
				case 'GUI':

					$fas_gui_type = $r['fas_gui_type'];
					switch ($fas_gui_type)
					{
						case 'tabpanel':

							$tabpanel_tabs = dbx::queryAll("select * from forms_atoms_settings a where fas_f_id = $f_id and fas_fid = $fas_id and fas_del='N' and fas_gui_type = 'tab' order by fas_sort");
							if ($tabpanel_tabs === false) break;


							$tabs = array();
							foreach ($tabpanel_tabs as $gc)
							{
								$gc_fas_id = intval($gc['fas_id']);
								$html_column = self::renderFormById_fe($f_id,$form_uid,$raw,$gc_fas_id);


								$tab_active = false;
								$settings 	= self::getSettingsByFasIdGui($gc_fas_id);

								if ($settings !== false)
								{
									switch ($settings['RAW']['wz_active'])
									{
										case 'NO':
											$tab_active = false;
											break;
										case 'YES':
											$tab_active = true;
											break;
										case 'CONDITION':
											$tab_active = false;

											$con_field 	= trim($settings['RAW']['wz_field']);
											$con_value	= trim($settings['RAW']['wz_value']);

											if (($con_field != "") && ($con_value != ""))
											{
												$raw_value = $raw['wz_'.$con_field];
												$tab_active = ($raw_value == $con_value);
											}

											break;
										default: break;
									}

								}

								$tabs[] = array(

								'tab_active'	=> $tab_active,

								'form_uid'		=> $form_uid,

								'form_wz_id'	=> $form_wz_id,
								'form_wz_r_id'	=> $form_wz_r_id,

								'class'			=> self::genClassTag($gc),
								'fas' 			=> $gc,
								'html' 			=> $html_column,
								);

							}

							$html[] = xredaktor_render::renderSoloAtom($tabpanel_a_id,array(
							'form_uid'		=> $form_uid,
							'class'		=> self::genClassTag($r),
							'fas' 		=> $r,
							'tabs' 		=> $tabs
							));



							break;

						case 'grid':

							$grid_columns = dbx::queryAll("select * from forms_atoms_settings a where fas_f_id = $f_id and fas_fid = $fas_id and fas_del='N' and fas_gui_type = 'grid_column' order by fas_sort");
							if ($grid_columns === false) break;

							$columns = array();
							foreach ($grid_columns as $gc)
							{
								$gc_fas_id = intval($gc['fas_id']);
								$html_column = self::renderFormById_fe($f_id,$form_uid,$raw,$gc_fas_id);

								$columns[] = xredaktor_render::renderSoloAtom($grid_column_a_id,array(
								'form_uid'		=> $form_uid,

								'form_wz_id'		=> $form_wz_id,
								'form_wz_r_id'		=> $form_wz_r_id,

								'class'	=> self::genClassTag($gc),
								'fas' 	=> $gc,
								'html' 	=> $html_column
								));

							}

							$html[] = xredaktor_render::renderSoloAtom($grid_a_id,array(
							'form_uid'		=> $form_uid,
							'form_wz_id'		=> $form_wz_id,
							'form_wz_r_id'		=> $form_wz_r_id,

							'class'		=> self::genClassTag($r),
							'fas' 		=> $r,
							'columns' 	=> $columns
							));

							break;


						case 'fieldcontainer':
						case 'row':

							$a_id = self::getAtomIdByGuiType($fas_gui_type);
							if ($a_id == 0)
							{
								$html[] = "<h3>GUI:$fas_gui_type|$a_id|MISSING</h3>";
								break;
							}

							$html_children = trim(self::renderFormById_fe($f_id,$form_uid,$raw,$fas_id));


							if ($html_children == "")
							{
								$html[] = "<h3>GUI:$fas_gui_type|$a_id|EMPTY</h3>";
								break;
							}

							$cfg = array(
							'form_uid'		=> $form_uid,
							'form_wz_id'		=> $form_wz_id,
							'form_wz_r_id'		=> $form_wz_r_id,

							'fas' 	=> $r,
							'html' 	=> $html_children

							);


							$html[] = xredaktor_render::renderSoloAtom($a_id,$cfg);

							break;

						default: break;
					}


					break;

				case 'AS':

					$as_id 	= intval($r['fas_as_id']);
					$a_id 	= self::getAtomIdByAsId($as_id);

					//echo "[GEN_FORM_AS_BEGIN:$fas_id|$as_id|$a_id]";

					if ($a_id == 0)
					{
						$html[] = "<h3>AS:$as_id|$a_id|NO ATOM ID</h3>";
						break;
					}

					$class 		= self::genClassTag($r);
					$fas_as_id 	= intval($r['fas_as_id']);
					$as_config 	= array();

					if ($fas_as_id != 0)
					{
						$fas_as 		= xredaktor_atoms_settings::getById($fas_as_id);
						$as_config		= json_decode($fas_as['as_config']);

						// checkbox, radio, dropdown
						$as_config		= xredaktor_wizards::getCheckBoxConfigById($fas_as_id);
					}

					if ($raw !== false)
					{
						$field = wzx::getMultiLangFieldName($as_id);
						$value = $raw[$field];
					}

					$settings = self::getSettingsByFasId($fas_id);
					if (trim($settings['RAW']['wz_value']) != "")
					{
						$value = $settings['RAW']['wz_value'];
					}


					$cfg = array(
					'form_uid'		=> $form_uid,
					'metaInfos'		=> self::getMetaInfosByAsID($as_id,$row),

					'form_wz_id'	=> $form_wz_id,
					'form_wz_r_id'	=> $form_wz_r_id,

					'value'			=> $value,
					'a_id'			=> $a_id,
					'as_id'			=> $as_id,
					'fas_id'		=> $fas_id,
					'settings'	 	=> $settings,
					'fas' 			=> $r,
					'raw'			=> $raw,
					'class'			=> $class,
					'field_name'	=> "form_".$f_id."_".$fas_id,
					'as_config'		=> $as_config
					);


					$atom_html = trim(xredaktor_render::renderSoloAtom($a_id,$cfg));
					if ($atom_html == "")
					{
						$html[] = "<h3>AS:$as_id|$a_id|EMPTY</h3>";
						break;
					} else
					{
						$html[] = $atom_html;
					}


					//echo "[GEN_FORM_AS_END:$fas_id|$as_id|$a_id]";

					break;
				default: break;
			}

		}

		$imp = implode("",$html);
		return $imp;
	}


	public static function getMetaInfosByAsID($as_id, $raw)
	{
		$as_id = intval($as_id);
		if ($as_id == 0) return false;

		$as			= xredaktor_atoms_settings::getById($as_id);
		$as_type 	= $as['as_type'];
		$a_id 		= $as['as_a_id'];
		$as_config	= $as['as_config'];


		switch ($as_type) {

			case 'WIZARD':

				$fa_id = intval($as_config);
				if ($fa_id == 0) return false;

				$field = wzx::getMultiLangFieldName($as_id);
				$value = intval($raw[$field]);
				$label = "";

				$title =  xredaktor_wizard_do_magic_grid::getTitleItSql($fa_id);

				if ($value > 0)
				{
					$label = wzx::query("select $title from [:$fa_id] where wz_id = $value and wz_online = 'Y' and wz_del='N' ","titleIt");
				}

				return array(
				'label' 	=> $label,
				'value' 	=> $value,
				'records' 	=> wzx::queryAll("select *,$title from [:$fa_id] where wz_online = 'Y' and wz_del='N' ORDER BY wz_sort"),
				);

				break;

			default:
				return false;
		}

	}

	public static function genClassTag($r)
	{
		$cols = array();
		$fields = array('fas_col_xs'=>'xs','fas_col_sm'=>'sm','fas_col_md'=>'md','fas_col_lg'=>'lg');

		foreach ($fields as $attr => $col)
		{
			$val = intval($r[$attr]);
			if ($val > 0) $cols[] = "col-".$col."-".$val;
		}

		$class = implode(" ",$cols);
		return $class;
	}

	public static function init()
	{
		@session_start();
		if (!isset($_SESSION['FROM_KEYS'])) $_SESSION['FROM_KEYS'] = array();
	}

	public static function getHash()
	{
		self::init();
		$hash = md5(Ixcore::formsKey.rand(0,10000).time().$_SERVER['REMOTE_ADDR']);
		$_SESSION['FROM_KEYS'][] = $hash;
		return $hash;
	}

	public static $form_depth 	= 0;
	public static $form_buffer	= array();

	public static function sc_genForm($params)
	{

		self::$form_depth++;

		$input = self::pi(array(

		'i' => array(
		'form_id' => &$f_id,
		),

		),$params);

		$raw = array();
		if (isset($params['fill_values']))
		{
			$raw = $params['fill_values'];
		}

		$form_uid = 'form_'.intval($raw['_wizard_id']).'_'.intval($raw['wz_id']).'_'.$f_id;

		$html 	= self::renderFormById_fe($f_id,$form_uid,$raw);

		$form_a_id = intval(dbx::queryAttribute("select fm_a_id from forms_mappings where fm_type = 'GUI_FORM'", "fm_a_id")); // TODO: ...
		if ($form_a_id == 0)
		{
			die('FORM - SETTINGS INVALID');
		}

		$btn = array(
		'submit_txt' => $params['submit_txt']
		);

		self::$form_depth--;




		$vars = array(

		'form_uid'		 => $form_uid,

		'form_wz_id'	=> intval($raw['_wizard_id']),
		'form_wz_r_id'	=> intval($raw['wz_id']),

		'rel_f_id'		=> intval($params['rel_f_id']),
		'rel_fas_id'	=> intval($params['rel_fas_id']),

		'form_id'		=> $f_id,

		'pre_action'	=> $params['pre_action'],
		'action'		=> $params['action'],
		'js'			=> $params['js'],
		'url'			=> $params['url'],
		'class'			=> $params['class'],
		'html' 			=> $html,
		'btn'	 		=> $btn,
		'hash'			=> xredaktor_forms::getHash(),
		'bufferd_forms' => ((count(self::$form_buffer)>0) && (self::$form_depth == 0))
		);





		$ret = xredaktor_render::renderSoloAtom($form_a_id,$vars);

		if (self::$form_depth > 0)
		{
			self::$form_buffer[] = $ret;
		}

		return $ret;
	}


	public static function data_via_ajax()
	{
		$action = "";

		self::pi(array(
		's' => array(
		'action' => &$action
		)
		));


		switch ($action)
		{
			case 'delete':

				$form_wz_id		= 0;
				$form_wz_r_id	= 0;

				self::pi(array(
				'i' => array(
				'wz_id' 	=> &$form_wz_id,
				'wz_r_id' 	=> &$form_wz_r_id,
				)
				));

				wzx::delete($form_wz_id,$form_wz_r_id);
				
				frontcontrollerx::json_success();
				break;
			default:



				$lang 			= "";
				$data 			= array();
				$hash0 			= "";
				$hash1 			= "";
				$form_id		= 0;
				$form_wz_id		= 0;
				$form_wz_r_id	= 0;


				$input = self::pi(array(

				'i' => array(
				'f_id' 			=> &$form_id,




				),

				'j' => array(
				'data' 	=> &$data,
				),

				's' => array(

				'lang' 	=> &$lang,
				'hash0' => &$hash0,
				'hash1' => &$hash1,

				)

				));

				$form_wz_id 	= intval($data['form_wz_id']);
				$form_wz_r_id 	= intval($data['form_wz_r_id']);

				$db = array();

				foreach ($data as $k => $v)
				{

					switch ($k)
					{
						case 'rel_fas_id':
						case 'rel_f_id':
							continue;
						default: break;
					}

					list($dummy,$f_id,$fas_id) = explode("_",$k,3);



					$f_id 	= intval($f_id);
					$fas_id	= intval($fas_id);

					if (($f_id == 0) or ($fas_id == 0)) continue;
					if ($f_id != $form_id) continue;


					$check = dbx::query("select fas_as_id from forms_atoms_settings where fas_id = $fas_id and fas_f_id = $f_id and fas_del = 'N'");
					if ($check === false) continue;

					$as_id = intval($check['fas_as_id']);
					if ($as_id == 0) continue;


					$field = wzx::getMultiLangFieldName($as_id);
					$db[$field] = dbx::escape($v);

				}

				/* MERGE RELATIONS */


				if ((intval($data['rel_fas_id'])>0) and (intval($data['rel_f_id'])>0))
				{

					$rel_fas_id = intval($data['rel_fas_id']);
					$rel_f_id 	= intval($data['rel_f_id']);

					$check = dbx::query("select fas_as_id from forms_atoms_settings where fas_id = $rel_fas_id and fas_del = 'N'");
					if ($check !== false) {

						$as_id = intval($check['fas_as_id']);
						$as = xredaktor_atoms_settings::getById($as_id);

						$_as_id 	= intval($as['as_config']);
						$_as 		= xredaktor_atoms_settings::getById($_as_id);
						$_as_a_id 	= intval($_as['as_a_id']);

						$form_a_id = intval(dbx::queryAttribute("select f_a_id from forms where f_id = $form_id","f_a_id"));
						if ($_as_a_id != $form_a_id) die("x2x");

						if ($_as_id > 0)
						{
							$field = wzx::getMultiLangFieldName($_as_id);
							$db[$field] = $rel_f_id;
						}
					}

				}

				$form_a_id = intval(dbx::queryAttribute("select f_a_id from forms where f_id = $form_id","f_a_id"));
				$idx = false;


				if (($form_wz_id > 0) && ($form_wz_r_id > 0))
				{
					$idx = $form_wz_r_id;

					$table = xredaktor_wizards::genWizardTableNameBy_a_id($form_wz_id);
					if (dbx::tablePresent($table))
					{
						$record = dbx::query(wzx::translate_sql("select wz_id from [:$form_wz_id] where wz_id = $form_wz_r_id"));
						if ($record === false)
						{
							xredaktor_sanitize::inputException();
						} else {

							//wzx::update($form_wz_id,$db,array('wz_id'=>$form_wz_r_id));
							wzx::update($form_wz_id,$db,$form_wz_r_id);
						}
					}

				} else
				{
					if ((count($db)>0) && ($form_a_id>0))
					{
						$idx = wzx::insert($form_a_id,$db);
					}
				}


				frontcontrollerx::json_success(array('idx'=>$idx,'i'=>$input));



		}


	}

}