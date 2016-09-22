<?

class xcrm_gui
{



	public static function getFragment($a_id)
	{
		$atom 		= dbx::query("select * from atoms where a_id = $a_id");
		$a_content 	= $atom['a_content'];

		$d['tpl'] = $a_content;

		frontcontrollerx::json_success($d);
	}

	public static function getId()
	{
		global $idx;
		$idx = intval($idx);
		$idx++;
		return $idx;
	}


	public static function getSimpleTagsByCfg($as,$wz_id)
	{
		$cfg = xredaktor_wizards::getTable_SIMPLE_OR_UNIQUE($as);
		if ($cfg === false) return array();

		$wz_id_low		= $cfg['wz_id_low'];
		$wz_id_high		= $cfg['wz_id_high'];
		$table_name		= $cfg['table_name'];

		if (intval($as['as_a_id']) < intval($as['as_config']))
		{
			$wz_id_low 	= intval($as['as_a_id']);
			$wz_id_high = intval($as['as_config']);

			$other_a_id = $wz_id_high;
			$otherTable = xredaktor_wizards::genWizardTableNameBy_a_id($wz_id_high);
			$otherField = 'wz_id_high';

			$meField	= 'wz_id_low';

		} else
		{
			$wz_id_low 	= intval($as['as_config']);
			$wz_id_high = intval($as['as_a_id']);

			$other_a_id = $wz_id_low;
			$otherTable = xredaktor_wizards::genWizardTableNameBy_a_id($wz_id_low);
			$otherField = 'wz_id_low';

			$meField	= 'wz_id_high';
		}

		$sql = "select $table_name.wz_id as checkId, $otherTable.* from $table_name,$otherTable where $meField = $wz_id and $otherField = $otherTable.wz_id order by $table_name.wz_id asc";
		$tags = dbx::queryAll($sql);
		if ($tags === false) $tags = array();


		$tags 		= xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti($other_a_id,$tags);
		$headers 	= dbx::queryAll("select * from atoms_settings where as_a_id = $other_a_id and as_useAsHeader = 'Y' and as_del='N'");
		if ($headers === false) $headers = array();

		$return = array();
		foreach ($tags as $tag)
		{
			$title = "";
			foreach ($headers as $h)
			{
				$title .= " ".$tag['wz_'.$h['as_name']];
			}
			$title 	= str_replace("  "," ",trim($title));
			$data 	= array('id'=>$tag['wz_id'],'title'=>$title,'del_id'=>$tag['checkId']);
			$return[] = $data;
		}

		return $return;
	}


	public static function getTitleOfRecord($as,$r_id) {

		$a_id 		= intval($as['as_a_id']);
		$as_id 		= intval($as['as_id']);
		$as_config 	= intval($as['as_config']);

		$me			= xredaktor_wizards::getRecordByIds($a_id,$r_id);

		$recordId   = $me['wz_'.$as['as_name']];
		$record		= xredaktor_wizards::getRecordByIds($as_config,$recordId);


		$headers 	= dbx::queryAll("select * from atoms_settings where as_a_id = $as_config and as_useAsHeader = 'Y' and as_del='N'");
		if ($headers === false) $headers = array();

		$title = "";
		foreach ($headers as $h)
		{
			$title .= " ".$record['wz_'.$h['as_name']];
		}
		$title 	= str_replace("  "," ",trim($title));

		return $title;
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

				if ($s === false) continue;
				if ($s['s_del'] == 'Y') continue;

				$title 	= $s['s_name'];
				$src	= $s['scaleSrc'].'/156/121';

				$items[] = array('id'=>$s_id,'title'=>$title,'src'=>$src,'del_id'=>$del_id,'as_id'=>$as_id);
			}

		}
		return $items;
	}


	public static function genFormItemBySettings($as,$wz_id=0)
	{
		if ($as['as_name'] == "B_ID") return false;

		$w = intval($as['as_gui_width']);
		if (($w <= 0) || ($w > 100)) $w = 100;

		$h = intval($as['as_gui_height']);
		if ($h <= 0) $h = 0;

		$as_name = trim($as['as_label']);
		if ($as_name == "") $as_name = "Feld #".$as['as_id'];

		$data 	= xredaktor_wizards::getRecordByIds($as['as_a_id'],$wz_id);
		$value 	= "";

		$recordKey = 'wz_'.$as['as_name'];

		if ($as['as_name'] != "")
		{
			$value = $data['wz_'.$as['as_name']];
		}

		$uId 	= $wz_id.'_'.$as['as_id'];
		$ret 	= false;
		$as_id 	= intval($as['as_id']);

		switch ($as['as_type']) {

			case 'YN':
				$ret = array('xtype' => 'bool', 'w'=> $w, 'title' => $as_name, 'checked' => ($value == 'Y'));
				break;

			case 'FILE':

				$value = intval($value);
				$item = false;
				if ($value != 0)
				{
					$s = xredaktor_storage::getById($value,true);
					if ($s['s_del'] != 'Y') {
						$title 	= $s['s_name'];
						$src	= $s['scaleSrc'].'/300/225';
						$item = array('id'=>$s_id,'title'=>$title,'src'=>$src);
					}
				}

				$ret = array('xtype' => 'image', 'w' => $w, 'h' => $h, 'title' => $as_name,
				'as_id' 	=> $as_id,
				'wz_id' 	=> $wz_id,
				'as_type' 	=> $as['as_type'],
				'lazy'		=> true,
				'item'		=> $item);


				break;

			case 'CONTAINER-FILES':
			case 'CONTAINER-IMAGES':

				$ret = array('xtype' => 'images', 'w' => 100, 'h' => 200, 'title' => $as_name,
				'as_id' 	=> $as_id,
				'wz_id' 	=> $wz_id,
				'as_type' 	=> $as['as_type'],
				'lazy'		=> true,
				'items'		=> self::getImageItems($as,$wz_id));

				break;


			case 'SIMPLE_W2W':
				//case 'UNIQUE_W2W':
				$ret = array('xtype'	=> 'tags',		'w'=> $w, 'title' => $as_name,
				'title_new' => 'NEUE '.$as_name.'',
				'as_id' 	=> $as_id,
				'wz_id' 	=> $wz_id,
				'tags' 		=> self::getSimpleTagsByCfg($as,$wz_id)
				);
				break;
			case 'TEXTAREA':
				if ($h == 0) $h = 100;
				$ret = array('xtype' => 'textarea',	'w'=> $w, 'title' => $as_name,	'h' => $h, 'value' => $value);
				break;
			case 'TEXT':
				$ret = array('xtype' => 'text',			'w'=> $w, 'title' => $as_name, 'value' => $value);
				break;
			case 'COMBO':
				$alternates	= array();
				$as_config 	= json_decode($as['as_config'],true);
				foreach ($as_config['l'] as $l)
				{
					$alternates[] = array('id'=>$l['v'],'title'=>$l['g']);
				}
				$ret = array('xtype' => 'combo', 'w'=> $w, 'title' => $as_name, 'title2'=>'', 'value' => $value, 'id'=>$as['as_id'], 'alternates'=>$alternates);
				break;

			case 'CHECKBOX':

				$alternates	= array();
				$as_config 	= json_decode($as['as_config'],true);

				foreach ($as_config['l'] as $l)
				{
					$checked = false;
					if ($data[$recordKey.'_'.$l['v']] == 'on') $checked = true;

					$alternates[] = array('id'=>$l['v'],'title'=>$l['g'],'checked'=>$checked );
				}

				$ret = array('xtype' => 'checkboxes', 'w'=> $w, 'title' => $as_name, 'title2'=>'Uhrzeit', 'value' => $value, 'id'=>$as['as_id'], 'items'=>$alternates);

				break;

			case 'TIMESTAMP':
				if ($value == '0000-00-00 00:00:00') $value = "";
				else {
					list($_date,$_time) = explode(" ",$value);
					list($_y,$_m,$_d) 	= explode("-",$_date);
					list($_H,$_M,$_S) 	= explode(":",$_time);
					$value = "$_d.$_m.$_y $_H:$_M";
				}

				$ret = array('xtype' => 'text','w'=> $w, 'title' => $as_name, 'value' => $value, 'css_class'=>'xcrm_inject_timestamp');
				break;
			case 'DATE':
				if ($value == '0000-00-00') $value = "";
				else {
					list($_y,$_m,$_d) 	= explode("-",$value);
					$value = "$_d.$_m.$_y";
				}

				$ret = array('xtype' => 'text','w'=> $w, 'title' => $as_name, 'value' => $value, 'css_class'=>'xcrm_inject_date');
				break;
			case 'TIME':
				if ($value == '00:00:00') 	$value = "";
				else {
					list($_H,$_M,$_S) 	= explode(":",$value);

					$_H = intval($_H);
					$_M = intval($_M);

					if ($_H < 10) $_H = '0'.$_H;
					if ($_M < 10) $_M = '0'.$_M;

					$value = "$_H:$_M";
				}

				$ret = array('xtype' => 'text','w'=> $w, 'title' => $as_name, 'value' => $value, 'css_class'=>'xcrm_inject_time');
				break;

				$alternates = array();

				for ($i=0;$i<24;$i++)
				{
					$_h = $i;
					if ($_h < 10) $_h = "0".$_h;


					$_v_0 = "$_h:00";
					$_v_1 = "$_h:15";
					$_v_2 = "$_h:30";
					$_v_3 = "$_h:45";

					$alternates[] = array('id'=>$_v_0,'title'=>$_v_0);
					$alternates[] = array('id'=>$_v_1,'title'=>$_v_1);
					$alternates[] = array('id'=>$_v_2,'title'=>$_v_2);
					$alternates[] = array('id'=>$_v_3,'title'=>$_v_3);
				}

				list($_h,$_m,$_s) = explode(":",$value);
				$value = "$_h:$_m";

				$ret = array('xtype' => 'combo', 'w'=> $w, 'title' => $as_name, 'title2'=>'Uhrzeit', 'value' => $value, 'id'=>$as['as_id'], 'alternates'=>$alternates);
				break;

			case 'WIZARD':
				$ret = array('xtype' => 'wz_record', 'w'=> $w, 'title'=>$as_name, 'title_record' => self::getTitleOfRecord($as,$wz_id), 'value'=> $value, 'id'=>$as['as_id']);
				break;

			case 'GEO-POINT':
				$geoPoint = json_decode($value,true);
				if ($h == 0) $h = 100;
				$ret = array('xtype' => 'geo_point', 'w'=> $w, 'h'=>$h, 'title'=>$as_name, 'value'=>$value,'long' => $geoPoint['long'], 'lat' => $geoPoint['lat']);
				break;

			default: return false;
		}

		$ret['uId'] 	= $uId;
		$ret['as_id'] 	= $as['as_id'];

		return $ret;
	}


	public static function genFormById($a_id,$wz_id=0)
	{
		$wz_table = xredaktor_wizards::genWizardTableNameBy_a_id($a_id);
		$as_all = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del = 'N' and as_gui  in ('NORMAL','READONLY') order by as_sort");

		$ret = array();

		foreach ($as_all as $as)
		{
			$cfg = self::genFormItemBySettings($as,$wz_id);
			if ($cfg === false) continue;

			$ret[] = $cfg;
		}



		return $ret;
	}

	public static function buildTitleById()
	{

	}

	public static function getTagsByIdHtml($as_id,$atom_id)
	{
		$as_id 		= intval($as_id);
		$as 		= dbx::query("select * from atoms_settings where as_id = $as_id and as_del = 'N'");
		$as_config 	= intval($as['as_config']);

		if ($as_config == 0) return "";

		$options_table 	= xredaktor_wizards::genWizardTableNameBy_a_id($as_config);
		$data 			= dbx::queryAll("select * from $options_table where wz_online = 'Y' and wz_del='N' order by wz_sort asc");

		foreach ($data as $i => $d)
		{
			$wz_id = $d['wz_id'];
			$title = xredaktor_wizards::getWizardRecordDataTitleByConfig($as_config,$wz_id);
			$data[$i]['title'] = $title;
		}

		$html = xredaktor_render::renderSoloAtom($atom_id,array('options'=>$data));
		return $html;
	}

	public static function addTag($as_id,$wz_id)
	{
		$as_id = intval($as_id);
		$wz_id = intval($wz_id);

		if ($as_id == 0) return false;
		if ($wz_id == 0) return false;

		$as = xredaktor_atoms_settings::getById($as_id);
		if ($as === false) return false;


		$cfg = xredaktor_wizards::getTable_SIMPLE_OR_UNIQUE($as);
		if ($cfg === false) return false;


		$wz_id_low		= $cfg['wz_id_low'];
		$wz_id_high		= $cfg['wz_id_high'];
		$table_name		= $cfg['table_name'];

		if (intval($as['as_a_id']) < intval($as['as_config']))
		{
			$wz_id_low 	= intval($as['as_a_id']);
			$wz_id_high = intval($as['as_config']);

			$other_a_id = $wz_id_high;
			$otherField = 'wz_id_high';
			$meField	= 'wz_id_low';

			$otherTable = xredaktor_wizards::genWizardTableNameBy_a_id($wz_id_high);

		} else
		{
			$wz_id_low 	= intval($as['as_config']);
			$wz_id_high = intval($as['as_a_id']);

			$other_a_id = $wz_id_low;
			$otherField = 'wz_id_low';

			$meField	= 'wz_id_high';

			$otherTable = xredaktor_wizards::genWizardTableNameBy_a_id($wz_id_low);
		}


		$sql_not_in = "select $otherTable.wz_id from $table_name,$otherTable where $meField = $wz_id and $otherField = $otherTable.wz_id and $otherTable.wz_online = 'Y' and $otherTable.wz_del='N'";
		$sql 		= "select wz_id from $otherTable where $otherTable.wz_online = 'Y' and $otherTable.wz_del='N' and $otherTable.wz_id NOT IN ($sql_not_in)";

		$tag = dbx::query($sql);
		if ($tag === false) return false;

		dbx::insert($table_name,array(
		$meField 	=> $wz_id,
		$otherField => $tag['wz_id']
		));
		$idx = dbx::getLastInsertId();

		$mini_cfg = array(
		'as_id' 	=> $as_id,
		'wz_id' 	=> $wz_id,
		'tags' 		=> self::getSimpleTagsByCfg($as,$wz_id)
		);

		$html = xredaktor_render::renderSoloAtom(265,array('cfg'=>$mini_cfg));
		return $html;
	}

	public static function delTag($as_id,$del_id)
	{
		$as_id 	= intval($as_id);
		$del_id = intval($del_id);

		if ($as_id 	== 0) return false;
		if ($del_id	== 0) return false;

		$as = xredaktor_atoms_settings::getById($as_id);
		if ($as === false) return false;

		$table = xredaktor_wizards::getTable_SIMPLE_OR_UNIQUE($as);
		if ($table === false) return false;

		$table_name = $table['table_name'];

		$present = dbx::query("select * from $table_name where wz_id = $del_id");
		if ($present === false) {
			return false;
		}

		dbx::delete($table_name,array('wz_id'=>$del_id));
		return true;
	}


	public static function savePack($savePack)
	{
		$savePack = json_decode($savePack,true);

		$form_cfg_id 	= intval($savePack['form_cfg_id']);
		$form_wz_id 	= intval($savePack['form_wz_id']);
		$data 			= $savePack['data'];

		if ($form_cfg_id == 0) return false;
		if ($form_wz_id == 0) return false;

		$db = array();

		foreach ($data as $as_id => $value) {

			$as = xredaktor_atoms_settings::getById($as_id);

			if ($as === false) 					continue;
			if ($as['as_a_id'] != $form_cfg_id) continue;


			$as_type_multilang 	= $as['as_type_multilang'];
			$as_name 			= $as['as_name'];
			$as_type 			= $as['as_type'];
			$lang 				= "DE";

			$as_name_final		= 'wz_'.$as_name;
			if ($as_type_multilang == 'Y') {
				$as_name_final		= "_".$lang.'_'.$as_name_final;
			}

			switch ($as_type)
			{
				case 'YN':
					$db[$as_name_final] = (strtolower($value) == 'on') ? 'Y' : 'N';
					break;

				case 'CONTAINER-FILES':
				case 'CONTAINER-IMAGES':

					$table_name = xredaktor_wizards::handle_CONTAINER_FILES_table($as);
					if ($table_name === false) continue;

					foreach ($value as $wz_sort => $id)
					{
						$wz_sort 	= intval($wz_sort);
						$id 		= intval($id);

						if ($id == 0) continue;

						dbx::update($table_name,array('wz_sort'=>$wz_sort),array('wz_id'=>$id));
					}

					break;

				case 'SIMPLE_W2W':
				case 'UNIQUE_W2W':

					$cfg = xredaktor_wizards::getTable_SIMPLE_OR_UNIQUE($as);
					if ($cfg === false) return false;

					$wz_id_low		= $cfg['wz_id_low'];
					$wz_id_high		= $cfg['wz_id_high'];
					$table_name		= $cfg['table_name'];

					if (intval($as['as_a_id']) < intval($as['as_config']))
					{
						$wz_id_low 	= intval($as['as_a_id']);
						$wz_id_high = intval($as['as_config']);

						$other_a_id = $wz_id_high;
						$otherField = 'wz_id_high';
						$meField	= 'wz_id_low';

						$otherTable = xredaktor_wizards::genWizardTableNameBy_a_id($wz_id_high);

					} else
					{
						$wz_id_low 	= intval($as['as_config']);
						$wz_id_high = intval($as['as_a_id']);

						$other_a_id = $wz_id_low;
						$otherField = 'wz_id_low';

						$meField	= 'wz_id_high';

						$otherTable = xredaktor_wizards::genWizardTableNameBy_a_id($wz_id_low);
					}

					foreach ($value as $v)
					{
						$del_id = intval($v['del_id']);
						$wz_id 	= intval($v['id']);

						if ($del_id == 0) 	continue;
						if ($wz_id == 0) 	continue;

						$tag_present = dbx::query("select $otherTable.wz_id from $otherTable where $otherTable.wz_id = $wz_id and $otherTable.wz_online = 'Y' and $otherTable.wz_del='N'");
						if ($tag_present === false) continue;

						dbx::query("update $table_name set $otherField = $wz_id where $meField = $form_wz_id and wz_id = $del_id");
					}

					break;
				case 'TEXTAREA':
					$db[$as_name_final] = $value;
					break;
				case 'TEXT':
					$db[$as_name_final] = $value;
					break;
				case 'COMBO':
					$alternates	= array();
					$as_config 	= json_decode($as['as_config'],true);
					foreach ($as_config['l'] as $l)
					{
						$alternates[] = $l['v'];
					}
					if (in_array($v,$alternates))
					{
						$db[$as_name_final] = $value;
					} else
					{
						continue;
					}
					break;
				case 'FILE':
					break;
				case 'CHECKBOX':

					$alternates	= array();
					$as_config 	= json_decode($as['as_config'],true);

					foreach ($as_config['l'] as $l)
					{
						$alternates[] = $l['v'];
					}

					foreach ($value as $v => $checked)
					{
						if (!in_array($v,$alternates)) continue;
						$db[$as_name_final.'_'.$v] = ($checked == 'on') ? 'on' : 'off';
					}

					break;


				case 'TIMESTAMP':
					if ($value == '') $value = "0000-00-00 00:00:00";

					list($_date,$_time) = explode(" ",$value);
					list($_d,$_m,$_y) 	= explode(".",$_date);
					list($_H,$_M) 		= explode(":",$_time);
					$correct = "$_y-$_m-$_d $_H:$_M:00";

					$db[$as_name_final] = $correct;
					break;

				case 'DATE':
					if ($value == '') $value = "0000-00-00";

					list($_d,$_m,$_y) 	= explode(".",$value);
					$_y = intval($_y);
					$_m = intval($_m);
					$_d = intval($_d);
					$correct = "$_y-$_m-$_d";

					$db[$as_name_final] = $correct;
					break;

				case 'TIME':
					if ($value == '') $value = "00:00:00";

					list($_h,$_m) = explode(":",$value);
					if ($_h < 10) $_h = '0'.intval($_h);
					if ($_m < 10) $_m = '0'.intval($_m);
					$correct = "$_h:$_m:00";

					$db[$as_name_final] = $correct;
					break;

				case 'WIZARD':

					$as_config = intval($as['as_config']);
					if ($as_config == 0) continue;

					$table_name = xredaktor_wizards::genWizardTableNameBy_a_id($as_config);
					if (!dbx::tablePresent($table_name)) continue;

					$wz_id = intval($value);
					if ($wz_id == 0) continue;

					$present = dbx::query("select * from $table_name where wz_id = $wz_id and wz_del='N' and wz_online='Y'");
					if ($present === false) continue;

					$db[$as_name_final] = $wz_id;

					break;
				case 'GEO-POINT':
					$db[$as_name_final] = $value;
					break;
				default:
					echo "ASTYPE NOT FOUND :: $as_type";
					continue;
			}
		}

		$masterTable = xredaktor_wizards::genWizardTableNameBy_a_id($form_cfg_id);
		if (!dbx::tablePresent($masterTable)) return false;

		$cleanFields = array();
		foreach ($db as $k => $v)
		{
			if (!dbx::attributePresent($masterTable,$k)) continue;
			$cleanFields[$k] = $v;
		}

		if (count($cleanFields) != count($db)) {
			frontcontrollerx::json_failure('Interner Fehler');
		}

		if (count($cleanFields) == 0) return false;

		$present = dbx::query("select wz_id from $masterTable where wz_id = $form_wz_id");
		if ($present == false) return false;


		self::hook_save_pre($form_cfg_id,$form_wz_id);
		dbx::update($masterTable,$cleanFields,array('wz_id'=>$form_wz_id));
		self::hook_save_post($form_cfg_id,$form_wz_id,$db);


		return xredaktor_wizards::getWizardRecordDataTitleByConfig($form_cfg_id,$form_wz_id);
		return true;
	}



	public static function hook_save_pre($wz_id,$r_id)
	{
		switch ($wz_id)
		{
			case 214:
				break;
			default: break;
		}
	}

	public static function hook_save_post($wz_id,$r_id,$db)
	{
		switch ($wz_id)
		{
			case 214:
				self::bd_keywords_update($r_id,$db);
				break;
			default: break;
		}
	}

	public static function bd_keywords_clean($r_id)
	{
		$r_id = intval($r_id);
		$table = xredaktor_wizards::genWizardTableNameBy_a_id(290);
		dbx::delete($table,array('wz_IMAGE_DATA_BASE'=>$r_id));
	}


	//$sg_id,$newDataRecord,$oldDataRecord

	public static function bd_keywords_update($r_id,$db)
	{

		$r_id = intval($r_id);
		self::bd_keywords_clean($r_id);

		$table_image 	= xredaktor_wizards::genWizardTableNameBy_a_id(214);
		$table_n2n		= xredaktor_wizards::genWizardTableNameBy_a_id(290);
		$table_keys		= xredaktor_wizards::genWizardTableNameBy_a_id(289);

		$KEYWORDS = explode(',',$db['wz_KEYWORDS']);

		foreach ($KEYWORDS as $kw)
		{
			if (trim($kw) == "") continue;
			$kw = strtolower(trim($kw));

			$present = dbx::query("select * from $table_keys where wz_KEYWORD = '$kw'");
			if ($present === false) {
				$key_id = xredaktor_fe::wInsert(289,array('wz_KEYWORD'=>$kw));
			} else
			{
				$key_id = $present['wz_id'];
			}
			xredaktor_fe::wInsert(290,array('wz_IMAGE_DATA_BASE'=>$r_id,'wz_IMAGE_DATA_KEYWORD'=>$key_id));
		}
	}


	public static function getHauptkategorien()
	{
		return xredaktor_wizards::getRecordsById(216);
	}

	public static function getGenericDataSets($return_wz,$return_wz_id,$wz_a,$wz_b)
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
		$sql = "select $table_name.wz_id as del_id,$tableReturn.* from $tableReturn,$table_name where $tableReturn.wz_id = $table_name.$otherField and $table_name.$myField = $return_wz_id";
		$data = dbx::queryAll($sql);
		if ($data === false) return false;

		$data = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti($otherWizard,$data);
		return $data;
	}

	public static function defaultMapping($wz_id,$title,$f_wz_id,$betrieb_id)
	{
		$ret = array();
		$mapped = self::getGenericDataSets($wz_id,$betrieb_id, $wz_id, $f_wz_id);
		if ($mapped !== false){
			foreach ($mapped as $m)
			{
				$del_id = $m['del_id'];
				$_idx 	= $m['wz_id'];
				$title 	= xredaktor_wizards::getWizardRecordDataTitleByConfig($wz_id,$_idx);
				$ret[] 	= array('title'=>"<span>$title</span>",	'fields'=>self::genFormById($wz_id,$_idx), 'formCfgId'=>$wz_id, 'formWzId'=>$_idx, 'del_id' => $del_id);
			}
		}
		return $ret;
	}

	public static function injectEmptyNewRecord($papsch,$wz_id)
	{
		$table = xredaktor_wizards::genWizardTableNameBy_a_id($wz_id);
		$idx = xredaktor_fe::wInsert($wz_id,array(
		'wz_online' => 'Y'
		));


		$low 	= min(209,$wz_id);
		$high 	= max(209,$wz_id);

		$table_name = "wizard_auto_SIMPLE_W2W_".$low."_".$high;
		if (!dbx::tablePresent($table_name)) return false;

		if (209 == $low) {
			$otherWizard 	= $high;
			$otherField 	= "wz_id_high";
			$myField		= "wz_id_low";
		} else
		{
			$otherWizard 	= $low;
			$otherField 	= "wz_id_low";
			$myField		= "wz_id_high";
		}

		dbx::insert($table_name,array(
		$myField 		=> $papsch,
		$otherField 	=> $idx
		));

		return $idx;
	}


	public static function getTitleOfRecords($a_id){
		$a_id = intval($a_id);
		return  dbx::queryAttribute("select * from atoms where a_id = $a_id","a_name");
	}


	public static function deleteMulti($wz_id,$del_id) {
		$low 	= min(209,$wz_id);
		$high 	= max(209,$wz_id);

		$table_name = "wizard_auto_SIMPLE_W2W_".$low."_".$high;
		if (!dbx::tablePresent($table_name)) return false;

		dbx::delete($table_name,array(
		'wz_id'=>$del_id
		));
	}


	public static function mixInSerachFields($settings)
	{
		$html = "";
		foreach ($settings['searchfields'] as $id)
		{
			if (is_numeric($id)) {

				$as = xredaktor_atoms_settings::getById($id);
				if ($as === false) continue;
				$as_type = $as['as_type'];

				switch ($as_type)
				{
					case 'DATE':
					case 'TIME':
					case 'TIMESTAMP':
					case 'TEXT':
					case 'TEXTAREA':
						$html .= xredaktor_render::renderSoloAtom(279,$as);
						break;
					case 'CHECKBOX':
						$checkboxes = array('items'=>array(),'as'=>$as);
						$cfg 		= json_decode($as['as_config'],true);

						foreach ($cfg['l'] as $c)
						{
							$value	= $c['v'];
							$title	= $c['g'];
							$checkboxes['items'][] = array('title'=>$title,'checked'=>false);
						}

						$html .= xredaktor_render::renderSoloAtom(280,$checkboxes);
						break;

					case 'SIMPLE_W2W':
						$as_config = intval($as['as_config']);
						if ($as_config == 0) continue;

						$table 		= xredaktor_wizards::genWizardTableNameBy_a_id($as_config);
						$records 	= dbx::queryAll("select wz_id from $table where wz_online = 'Y' and wz_del='N' order by wz_sort asc");

						$items 	= array();
						$list 	= array();

						foreach ($records as $r)
						{
							$r_id = $r['wz_id'];
							$title = xredaktor_wizards::getWizardRecordDataTitleByConfig($as_config,$r_id);
							$items[] =  array('title'=>$title,'checked'=>false,'id'=>$r_id);
						}

						$checkboxes = array('items'=>$items,'as_id'=>$as['as_id'],'title'=>$as['as_label']);
						$html .= xredaktor_render::renderSoloAtom(280,$checkboxes);
						break;
					default:

						$html .= "<center>CONFIG[$as_type] $id - missing</center>";
						break;
				}

			} else {

				$stype 	= $id['stype'];
				$w_id 	= $id['w_id'];
				$f_w_id = $id['f_w_id'];

				switch ($stype) {
					case 'n2n':

						$as_config = intval($f_w_id);

						$table 		= xredaktor_wizards::genWizardTableNameBy_a_id($as_config);
						$records 	= dbx::queryAll("select wz_id from $table where wz_online = 'Y' and wz_del='N' order by wz_sort asc");

						$items 	= array();
						$list 	= array();

						foreach ($records as $r)
						{
							$r_id = $r['wz_id'];
							$title = xredaktor_wizards::getWizardRecordDataTitleByConfig($as_config,$r_id);
							$items[] =  array('title'=>$title,'checked'=>false,'id'=>$r_id);
						}

						$checkboxes = array('items'=>$items,'as_id'=>$w_id,'title'=>$id['title']);
						$html .= xredaktor_render::renderSoloAtom(280,$checkboxes);
						break;
					default: break;
				}
			}
		}
		return $html;
	}

	public static function mixInSearchHtml($cfg)
	{
		foreach ($cfg['panels'] as $i => $settings) {
			$html = self::mixInSerachFields($settings);
			$cfg['panels'][$i]['searchHtml'] = $html;
		}
		return $cfg;
	}


	public static function html_left()
	{

		$cfg = array(
		'panels' => array(

		array(
		newx			=> true,
		type			=> 'b',
		title 			=> 'BETRIEBSDATEN',
		searchfields 	=> array(958,959,960,961,1167,array('stype'=>'n2n','w_id'=>209,'f_w_id'=>216,'title'=>'KATEGORIE'))
		),

		array(
		newx			=> false,
		type			=> 'a',
		title 			=> 'ANGEBOTE',
		searchfields 	=> array(1009,1011,1012,1007)
		),

		array(
		newx			=> false,
		type			=> 'e',
		title 			=> 'EVENTS',
		searchfields 	=> array(1017,1019,1020,1018)
		),

		array(
		newx			=> false,
		type			=> 'bilddatenbank',
		title 			=> 'BILDDATENBANK',
		jumpOnly		=> true,
		searchfields 	=> array(),
		cls 			=> 'bilddatenbank'
		),



		)
		);


		$cfg 	= self::mixInSearchHtml($cfg);
		$html 	= xredaktor_render::renderSoloAtom(278,$cfg);
		die($html);
	}



	public static function imageSearcherViaStorageView()
	{
		$extraParams = json_decode($_REQUEST['extraParams'],true);

		$filter = $extraParams['search'];
		$tags	= explode(",",$extraParams['s']);

		if ((trim($extraParams['s'])=="") && (count($filter)==0)) return array();

		$ret 	= self::imageSearcher($tags,$filter,0,100);

		$files 	= $ret['files'];
		$keys 	= array();

		foreach ($files as $f)
		{
			$keys [] = intval($f['wz_IMAGE']);
		}

		if (count($files)==0) $keys[] = -11111;

		return $keys;
	}

	public static function imageSearcher($tags,$filter,$pos=0,$amountOfRecords = 40)
	{
		$limit_1 = intval($pos)*$amountOfRecords;
		$limit_2 = $amountOfRecords;

		$table_keys 	= xredaktor_wizards::genWizardTableNameBy_a_id(289);
		$table_n2n		= xredaktor_wizards::genWizardTableNameBy_a_id(290);
		$table_image	= xredaktor_wizards::genWizardTableNameBy_a_id(214);

		$s_final = array();
		$s_clean = array();

		foreach ($tags as $_s)
		{
			$s = dbx::escape(trim($_s));
			if ($s == "") continue;
			$s_clean[] = $s;
			$s_final[] = " $table_keys.wz_KEYWORD LIKE '%$s%' ";
		}

		$sql = "select $table_image.* from $table_image where $table_image.wz_del='N' AND ";

		if (count($s_final)>0)
		{
			$sql = "select $table_image.* from $table_image,$table_n2n,$table_keys where $table_image.wz_del='N' AND
				
							$table_image.wz_id = $table_n2n.wz_IMAGE_DATA_BASE AND
							$table_n2n.wz_IMAGE_DATA_KEYWORD = $table_keys.wz_id 
							"; 
			$sql .= " AND (".implode(" OR ",$s_final).")";
		}

		$filters = self::extend2genericSearch(214,$filter,true);

		if (count($filters)>0)
		{
			if (count($s_final)>0) {
				$sql .= " AND ";
			}
			$sql .= " ".implode(" AND ",$filters);
		}

		$sql .= " group by $table_image.wz_id ";

		if ((count($s_final)==0) && (count($filters)==0))
		{
			$sql = "select * from $table_image where $table_image.wz_del='N' ";
		}

		list($part_1,$part_2) = explode("from",$sql,2);
		$sql_cnt = "select count($table_image.wz_id) as cntx from ".$part_2;

		$total 	= intval(dbx::queryAttribute($sql_cnt,'cntx'));
		$files 	= dbx::queryAll($sql."  LIMIT $limit_1, $limit_2 ");

		if ($files === false) $files = array();

		$key = json_encode(array('pos'=>$pos,'s'=>$s_clean,'filter'=>$filter));

		return array(
		'pos'		=> $pos,
		'total' 	=> $total,
		'files'		=> $files,
		'key'		=> $key,
		'left'		=> $total - ($limit_1 + $amountOfRecords)
		);
	}

	public static function makeImageHtml($files,$key)
	{
		$html = "";
		if ($files !== false) {
			foreach ($files as $i => $f)
			{
				$del_id	= $f['wz_id'];
				$s_id 	= intval($f['wz_IMAGE']);

				if ($s_id == 0) continue;

				$s = xredaktor_storage::getById($s_id,true);

				if ($s['s_del'] == 'Y') continue;

				$title 	= $s['s_name'];
				$src	= $s['scaleSrc'].'/156/121';

				$f['img'] = array('id'=>$s_id,'title'=>$title,'src'=>$src);
				$final[] = $f;
			}
			$html = xredaktor_render::renderSoloAtom(286,array('images'=>$final,'key'=>$key));
		}
		return $html;
	}


	public static function injectGenericData($wz_a,$wz_b,$wz_a_id,$wz_b_id)
	{

		$wz_a 			= intval($wz_a);
		$wz_b 			= intval($wz_b);

		$low 	= min($wz_a,$wz_b);
		$high 	= max($wz_a,$wz_b);

		$table_name = "wizard_auto_SIMPLE_W2W_".$low."_".$high;
		if (!dbx::tablePresent($table_name)) return false;


		if ($wz_a < $wz_b)
		{
			$myField	= "wz_id_low";
			$otherField = "wz_id_high";
			$val_my		= $wz_a_id;
			$val_other 	= $wz_b_id;

		} else
		{
			$myField	= "wz_id_high";
			$otherField = "wz_id_low";
			$val_my		= $wz_b_id;
			$val_other 	= $wz_a_id;
		}

		dbx::insert($table_name,array($myField=>$val_my,$otherField=>$val_other));

		return true;
	}

	public static function delGenericData($wz_a,$wz_b,$wz_a_id,$wz_b_id)
	{

		$wz_a 			= intval($wz_a);
		$wz_b 			= intval($wz_b);

		$low 	= min($wz_a,$wz_b);
		$high 	= max($wz_a,$wz_b);

		$table_name = "wizard_auto_SIMPLE_W2W_".$low."_".$high;
		if (!dbx::tablePresent($table_name)) return false;


		if ($wz_a < $wz_b)
		{
			$myField	= "wz_id_low";
			$otherField = "wz_id_high";
			$val_my		= $wz_a_id;
			$val_other 	= $wz_b_id;

		} else
		{
			$myField	= "wz_id_high";
			$otherField = "wz_id_low";
			$val_my		= $wz_b_id;
			$val_other 	= $wz_a_id;
		}

		dbx::delete($table_name,array($myField=>$val_my,$otherField=>$val_other));

		return true;
	}


	public static function getGenericData($wz_a,$wz_b,$wz_b_id)
	{

		$wz_a 			= intval($wz_a);
		$wz_b 			= intval($wz_b);

		$low 	= min($wz_a,$wz_b);
		$high 	= max($wz_a,$wz_b);

		$table_name = "wizard_auto_SIMPLE_W2W_".$low."_".$high;
		if (!dbx::tablePresent($table_name)) return false;


		if ($wz_a < $wz_b)
		{
			$s 		= "wz_id_low";
			$field 	= "wz_id_high";
			$value 	= $wz_b_id;
		} else
		{
			$s		= "wz_id_high";
			$field	= "wz_id_low";
			$value	= $wz_b_id;
		}

		$sql = "select $s as r_id from $table_name where $field = $value";
		return dbx::queryAll($sql);
	}

	public static function handleAjaxFunction($function)
	{
		switch ($function)
		{
			case 'getGridCfg':

				$a_id = intval($_REQUEST['wzId']);
				if ($a_id == 0) frontcontrollerx::json_failure("INVALID_WZ_ID");


				$header = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del='N' and as_useAsHeader = 'Y'  and (as_gui = 'NORMAL' || as_gui = 'READONLY') order by as_useAsHeaderSort asc");
				$export = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del='N' and as_use4Export = 'Y' order by as_use4ExportSort asc");

				$data = array(

				'header' => $header,
				'export' => $export

				);


				frontcontrollerx::json_success($data);

				break;

			case 'importOld':

				die('x');
				
				$dir = realpath(dirname(__FILE__).'/../../../../xstorage/Datenbank/Betriebe/Bilder');
				$cmd = "rm -R $dir/*";
				
				die();
				//exec($cmd);
				//xredaktor_storage::syncFromDisc(1,363);
				//die('X');

				$ids 		= array('209','210');
				$tablesX	= array();

				foreach ($ids as $id)
				{
					$tables = dbx::queryAll("SHOW TABLES LIKE '%SIMPLE%$id%'");
					foreach ($tables as $table)
					{
						foreach ($table as $k => $tableName)
						{
							$tablesX[] = $tableName;
						}
					}
				}

				
				
				
				
				
				dbx::query("truncate table wizard_auto_209");
				dbx::query("truncate table wizard_auto_210");

				foreach ($tablesX as $table)
				{
					$sql = "truncate table $table";
					dbx::query($sql);
				}

				$imp = array(

				'wz_NAME' 			=> 'tbi_name',
				'wz_PLZ' 			=> 'tbi_plz',
				'wz_ORT' 			=> 'tbi_ort',
				'wz_STRASSE' 		=> 'tbi_strasse',
				'wz_STRASSE_NR' 	=> 'tbi_strasse_nr',
				'wz_TELEFON' 		=> 'tbi_tel',
				'wz_FAX' 			=> '',
				'wz_EMAIL' 			=> '',
				'wz_WEBSEITE' 		=> 'tbi_homepage',
				'wz_FACEBOOK' 		=> 'tbi_facebooklink',
				'wz_YOUTUBE'		=> '',
				'wz_TWITTER'		=> '',
				'wz_GEODATEN'		=> '',
				'wz_DEL'			=> 'tbi_del'

				);


				$all = dbx::queryAll("select * from tx_bga_items where tbi_id >=8 ");

				foreach ($all as $d) {


					$new = array();

					foreach ($imp as $new_k => $old_k) {
						$new[$new_k] = $d[$old_k];

						if ($new_k == "wz_GEODATEN") {
							$new[$new_k] = json_encode(array('long'=>$d['tbi_map_long'],'lat'=>$d['tbi_map_lat']));
						}
					}

					$id 		= $d['tbi_id'];
					$present 	= dbx::query("select * from wizard_auto_209 where wz_id = $id");

					if ($present === false) {
						$new['wz_id'] = $id;
						dbx::insert('wizard_auto_209',$new);
					} else {
						dbx::update('wizard_auto_209',$new,array('wz_id'=>$id));
					}

					$images = dbx::queryAll("select * from tx_bga_pixs where tbp_type = 'i_images' and tbp_del='N' and tbp_i_id = $id");
					if ($images !== false) {


						$files = array();

						foreach ($images as $i)
						{
							$ii = $i['tbp_id'];
							$file = dirname(__FILE__).'/../../../../old_images/'.$ii.'.jpg';
							if (file_exists($file)) $files[] = $file;
							else {
								echo "Bild nicht gefunden <br>";
							}
						}

						//die("___".$id);
						$ret = xredaktor_storage::registerMultiFilesInStorage(1164,$id,$files);
						//print_r($ret);
						//print_r($files);
						//die();
					}

					// Kontakt


					list($vorname,$nachname) = explode(" ",$d['tbi_inhaber_name']);

					$contact = array(

					'wz_VORNAME' 	=> $vorname,
					'wz_NACHNAME' 	=> $nachname,
					'wz_TELEFON'	=> $d['tbi_tel'],
					'wz_EMAIL' 		=> trim($d['tbi_email']),

					);

					$wz_EMAIL = $contact['wz_EMAIL'];
					if ($wz_EMAIL != "")
					{
						$presentContact = dbx::query("select * from wizard_auto_210 where wz_EMAIL = '$wz_EMAIL' ");

						if ($presentContact === false) {
							dbx::insert('wizard_auto_210',$contact);
							$cid = dbx::getLastInsertId();
						} else {
							$cid = $presentContact['wz_id'];
						}

						$linkPresent = dbx::query("select * from wizard_auto_SIMPLE_W2W_209_210 where wz_id_low = $id and wz_id_high = $cid");

						if ($linkPresent === false) {
							dbx::insert('wizard_auto_SIMPLE_W2W_209_210',array('wz_id_low'=>$id,'wz_id_high'=>$cid));
						}
					}

				}


				die('FERTIG');

				break;
			case 'searchReport':

				$searchAgent = intval($_REQUEST['searchAgent']);

				$d = dbx::query("select * from wizard_auto_229 where wz_id = $searchAgent");
				$wz_SQL = $d['wz_SQL'];

				$items = dbx::queryAll($wz_SQL);

				foreach ($items as $i => $d)
				{
					$items[$i]['titleIt'] = xredaktor_wizards::getWizardRecordDataTitleByConfig(209,$d['wz_id']);
				}

				$totalCount = count($items);
				frontcontrollerx::json(array('root'=>$items,'totalCount'=>$totalCount,'success'=>true));


				break;
			case 'getBetriebByW2W':

				$wzId = intval($_REQUEST['wzId']);
				$r_id = intval($_REQUEST['r_id']);

				$records = self::getGenericData(209,$wzId,$r_id);
				if ($records === false) {
					frontcontrollerx::json_success(array('b_id'=>false));
				}

				$b_id 		= intval($records[0]['r_id']);
				$titleIt 	= xredaktor_wizards::getWizardRecordDataTitleByConfig(209,$b_id);

				frontcontrollerx::json_success(array('b_id'=>$b_id,'titleIt'=>$titleIt));

				break;

			case 'queryReport':

				$id 	= intval($_REQUEST['id']);
				$tab 	= xredaktor_wizards::genWizardTableNameBy_a_id(229);
				$r	 	= dbx::query("select * from $tab where wz_id = $id");

				$searcher 	= false;
				if ($r['wz_SQL_AUTO'] != '')
				{
					$searcher = array();
					$parts = explode("\n",$r['wz_SQL_AUTO']);
					foreach ($parts as $cmd)
					{
						list($as_id,$v) = explode("=",$cmd,2);
						if (!is_array($searcher[$as_id])) $searcher[$as_id] = array();
						$searcher[$as_id][] = $v;
					}
				} else if ($r['wz_HOOK'] != '')
				{
					//frontcontrollerx::safeCallUserFunction();
					frontcontrollerx::processExtGrid_load($extFunctionsConfig,	$r['wz_HOOK']);
				} else if ($_REQUEST['config'] != '')
				{
					$searcher = json_decode($_REQUEST['config'],true);
				}

				if ($searcher !== false)
				{
					$wzId = false;
					foreach ($searcher as $as_id => $crap)
					{
						$a = xredaktor_atoms::getARecordBy_as_id($as_id);
						$wzId = $a['a_id'];
						break;
					}

					if ($wzId === false) die('xxxxxxxxxxxxxxxxxxxxxxxxx');

					$_REQUEST['defaultNumericQueryAddons'] 	= json_encode($searcher);
					$_REQUEST['domagic'] 					= $wzId;

					xredaktor_wizards::wizard_do_magic_grid('load');
				}

				die('FAILED');

				break;

			case 'getReportGui':

				$id 	= intval($_REQUEST['id']);
				$tab 	= xredaktor_wizards::genWizardTableNameBy_a_id(229);
				$r	 	= dbx::query("select * from $tab where wz_id = $id");

				$GUI    = explode("\n",$r['wz_GUI_AUTO']);
				$gui 	= array();

				foreach ($GUI as $as_id)
				{
					$as = xredaktor_atoms_settings::getById($as_id);
					$gui[] = xredaktor_gui::getField_config($as,array(),false,true);
				}

				frontcontrollerx::json_success(array('gui'=>$gui));

				break;
			case 'handleReport':

				$id 	= intval($_REQUEST['id']);
				$tab 	= xredaktor_wizards::genWizardTableNameBy_a_id(229);
				$r	 	= dbx::query("select * from $tab where wz_id = $id");

				frontcontrollerx::json_success(array('agent'=>$r));
				break;

			case 'searchInField':

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

				xredaktor_wizards::wizard_do_magic_grid('load');

				break;

			case 'getSerachPanel':

				$fields = json_decode($_REQUEST['fields'],true);
				$cols 	= json_decode($_REQUEST['cols'],true);

				$gui 		= array();
				$columns 	= array();

				$gui[] = array(
				'anchor' 		=> "100%",
				'as' 			=> array('as_name'=>'titleIt'),
				'name' 			=> "titleIt",
				'fieldLabel' 	=> "Name",
				'margin' 		=> "5 10 0 0",
				'xtype' 		=> "xr_field_text",
				);

				foreach ($fields as $f)
				{
					if (!is_numeric($f)) continue;
					$as = xredaktor_atoms_settings::getById($f);
					if ($as === false) continue;
					$gui[] = xredaktor_gui::getField_config($as,array(),false,true);
				}

				foreach ($cols as $as_id)
				{
					$as_id = intval($as_id);
					if ($as_id == 0) continue;

					$columns[] = xredaktor_atoms_settings::getById($as_id);
				}

				frontcontrollerx::json_success(array('gui'=>$gui,'cols'=>$columns));

				break;

			case 'loadDataStorage':

				$ids = explode(",",$_REQUEST['ids']);

				$data = array();

				foreach ($ids as $id)
				{

					$idx = intval($id);
					if ($idx == 0) continue;

					$tableX = xredaktor_wizards::genWizardTableNameBy_a_id($idx);
					$d = dbx::queryAll("select * from $tableX where wz_online='Y' and wz_del='N'");
					$data[$idx] = $d;

				}

				frontcontrollerx::json_success(array('data'=>$data));


				break;
			case 'delBetrieb':
				$b_id = intval($_REQUEST['b_id']);
				xredaktor_log::add('',209,$b_id,'DELETE',"Betrieb $b_id wurde gelöscht.");
				xredaktor_fe::wDelete(209,$b_id);
				frontcontrollerx::json_success();
				break;
			case 'newBetrieb':
				$newId = xredaktor_fe::wInsert(209);
				xredaktor_log::add('',209,$newId,'INSERT',"Betrieb $newId wurde angelegt.");
				frontcontrollerx::json_success(array('wz_id'=>$newId));
				break;
			case 'newX':
				$id 	= intval($_REQUEST['a_id']);
				$newId 	= xredaktor_fe::wInsert($id);

				xredaktor_log::add('',$id,$newId,'INSERT',"Datensatz $id wurde angelegt.");
				frontcontrollerx::json_success(array('wz_id'=>$newId));

				break;
			case 'delKats':

				$b_id = intval($_REQUEST['b_id']);
				$keys = explode(",",$_REQUEST['keys']);

				foreach ($keys as $pack)
				{
					list($wzId,$wz_id) = explode("_",$pack);

					if (!is_numeric($wzId)) continue;
					if (!is_numeric($wz_id)) continue;

					self::delGenericData(209,$wzId,$b_id,$wz_id);
				}

				frontcontrollerx::json_success();

				break;
			case 'addKat':

				$b_id 	= intval($_REQUEST['b_id']);
				$idx 	= intval($_REQUEST['idx']);
				$newId 	= xredaktor_fe::wInsert($idx);

				self::injectGenericData(209,$idx,$b_id,$newId);
				frontcontrollerx::json_success(array('wzId'=>$idx,'wz_id'=>$newId));

				break;
			case 'getKats':

				$b_id 	= intval($_REQUEST['b_id']);
				$haupt 	= self::getHauptkategorien();
				$items 	= array();
				$dummyId=0;

				foreach ($haupt as $h)
				{
					$wz_WIZARD 	= $h['wz_WIZARD'];
					$wz_NAME	= $h['wz_NAME'];

					$mapped = self::getGenericDataSets($wz_WIZARD,$b_id, $wz_WIZARD, 209);
					if ($mapped === false) continue;

					foreach ($mapped as $m)
					{
						$del_id = $m['del_id'];
						$_idx 	= $m['wz_id'];
						$title 	= xredaktor_wizards::getWizardRecordDataTitleByConfig($wz_WIZARD,$_idx);
						$dummyId++;
						$items[] = array('titleIt' => $wz_NAME.' - '.$title,'wzId'=>$wz_WIZARD, 'wz_id' => $_idx,'id'=>$dummyId);
					}
				}

				$totalCount = count($items);
				frontcontrollerx::json(array('root'=>$items,'totalCount'=>$totalCount,'success'=>true));

				break;
			case 'newMultRecord':

				$isHaupt = ($_REQUEST['haupt'] == 'Y');
				$papsch = intval($_REQUEST['papsch']);
				$wz_id 	= intval($_REQUEST['new_record']);
				if (($papsch == 0) || ($wz_id == 0)) die('ABCDEF');

				$newId 	= self::injectEmptyNewRecord($papsch,$wz_id);

				if ($isHaupt)
				{
					$haupt = self::getHauptkategorien();
					$items = array();
					foreach ($haupt as $h)
					{
						$wz_WIZARD 	= $h['wz_WIZARD'];
						$wz_NAME	= $h['wz_NAME'];

						$mapped = self::getGenericDataSets($wz_WIZARD,$papsch, $wz_WIZARD, 209);
						if ($mapped === false) continue;

						foreach ($mapped as $m)
						{
							$del_id = $m['del_id'];
							$_idx 	= $m['wz_id'];
							$title 	= xredaktor_wizards::getWizardRecordDataTitleByConfig($wz_WIZARD,$_idx);
							$items[] = array('title'=>$wz_NAME.' - <span>'.$title.'</span> ',	'fields'=>self::genFormById($wz_WIZARD,$_idx), 'formCfgId'=>$wz_WIZARD, 'formWzId'=>$_idx, 'del_id' => $del_id);
						}
					}
				} else
				{
					$items	= self::defaultMapping($wz_id,	self::getTitleOfRecords($wz_id), 209, $papsch);
				}

				$html   = xredaktor_render::renderSoloAtom(274,array('t'=>array('items'=>$items),'papsch'=>$papsch));

				frontcontrollerx::json_success(array('html'=>$html));
				die();

				break;

			case 'delMultRecord':

				$papsch 	= intval($_REQUEST['papsch']);
				$wz_id 		= intval($_REQUEST['formCfgId']);
				$r_id 		= intval($_REQUEST['del_id']);
				if (($papsch == 0) || ($wz_id == 0) || ($r_id == 0)) die('ABCDEF');

				self::deleteMulti($wz_id,$r_id);

				$items	= self::defaultMapping($wz_id,	self::getTitleOfRecords($wz_id), 209, $papsch);
				$html   = xredaktor_render::renderSoloAtom(274,array('t'=>array('items'=>$items),'papsch'=>$papsch));

				frontcontrollerx::json_success(array('html'=>$html));
				die();

				break;
			case 'saveRecordData':
				$savePack = $_REQUEST['savePack'];
				$title = self::savePack($savePack);
				if ($title === false) {
					frontcontrollerx::json_success(array('saved'=>false));
				}
				frontcontrollerx::json_success(array('saved'=>true,'title'=>$title));
				break;
			case 'addTag':

				$as_id 	= intval($_REQUEST['as_id']);
				$wz_id 	= intval($_REQUEST['wz_id']);

				$html = self::addTag($as_id,$wz_id);

				if ($html === false){
					frontcontrollerx::json_success(array('added'=>false));
				}

				frontcontrollerx::json_success(array('added'=>true,'html'=>$html));

				break;

			case 'newBetrieb':
				$newId = xredaktor_fe::wInsert(209,array('wz_online'=>'Y'));
				frontcontrollerx::json_success(array('newBetrieb'=>$newId));
				break;

			case 'delTag':

				$as_id 	= intval($_REQUEST['as_id']);
				$del_id = intval($_REQUEST['del_id']);

				$success = self::delTag($as_id,$del_id);
				frontcontrollerx::json_success(array('success'=>$success));
				break;

			case 'delFile':

				$as_id 	= intval($_REQUEST['as_id']);
				$del_id = intval($_REQUEST['del_id']);

				$success = self::delFileItem($as_id,$del_id);
				frontcontrollerx::json_success(array('success'=>$success));

				break;

			case 'deleteRecord':
				$form_cfg_id 	= intval($_REQUEST['form_cfg_id']);
				$form_wz_id 	= intval($_REQUEST['form_wz_id']);
				xredaktor_fe::wUpdate($form_cfg_id,$form_wz_id,array('wz_del'=>'Y'));
				frontcontrollerx::json_success(array('success'=>true));
				break;
			case 'check_betriebs_name':

				$fieldId 	= $_REQUEST['fieldId'];
				$fieldValue = dbx::escape($_REQUEST['fieldValue']);

				list($r_id,$field_id) = explode("_",$fieldId);
				$r_id = intval($r_id);
				$field_id = intval($field_id);
				$table_betriebe = xredaktor_wizards::genWizardTableNameBy_a_id(209);

				$as = xredaktor_atoms_settings::getById(958);

				if ($as === false) 					continue;
				if ($as['as_a_id'] != 209) 			continue;


				$as_type_multilang 	= $as['as_type_multilang'];
				$as_name 			= $as['as_name'];
				$as_type 			= $as['as_type'];
				$lang 				= "DE";

				$as_name_final		= 'wz_'.$as_name;
				if ($as_type_multilang == 'Y') {
					$as_name_final		= "_".$lang.'_'.$as_name_final;
				}

				$sql = "select * from $table_betriebe where $as_name_final = '$fieldValue' and wz_del='N' and wz_id != $r_id";
				$present = dbx::query($sql);

				$ret = array("$fieldId",($present === false));
				die(json_encode($ret));


				break;

			case 'getImages':

				$as_id  = intval($_REQUEST['f_id']);
				$wz_id 	= intval($_REQUEST['r_id']);

				$as		= xredaktor_atoms_settings::getById($as_id);
				$items 	= self::getImageItems($as,$wz_id);

				$html = xredaktor_render::renderSoloAtom(264,array('cfg'=>array('items'=>$items,'lazy'=>false,'as_type' => $as['as_type'])));

				frontcontrollerx::json_success(array('html'=>$html));
				break;

			case 'upload_images':
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

					if (file_exists($file_tmp)) {

						$table = xredaktor_wizards::handle_CONTAINER_FILES_table($as);
						if ($table !== false) {

							$success 	= true;
							$s_name 	= "Datensatz_".$wz_id;

							$s_f_id_record = xredaktor_storage::createDir($s_f_id,$s_name);

							if ($s_f_id_record === false) {
								frontcontrollerx::json_success(array('success'=>false,'error'=>"Datensatzverzeichnis ($s_f_id) konnte nicht angelegt werden."));
							}

							$s_id = xredaktor_storage::registerFileInStorage($s_f_id_record,$file_tmp,$file_name,true);

							if ($s_id === false) {
								frontcontrollerx::json_success(array('success'=>false,'error'=>'Register fehlgeschlagen.'));
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

							frontcontrollerx::json_success(array('success'=>true,'id'=>$id,'f_id'=>$as_id,'wz_id'=>$wz_id,'m_id'=>$m_id));

						} else {
							frontcontrollerx::json_success(array('success'=>false,'error'=>'Feld hat keine gültige DIR-ID 0'));
						}

					} else {
						frontcontrollerx::json_success(array('success'=>false,'error'=>'Tempfile nicht gefunden'));
					}
				}

				frontcontrollerx::json_success(array('success'=>false,'error'=>'Feld hat keine gültige DIR-ID 1'));

				break;
			case 'getTags':
				$as_id 	= intval($_REQUEST['as_id']);
				$html 	= self::getTagsByIdHtml($as_id,262);
				frontcontrollerx::json_success(array('html'=>$html));
				break;
			case 'getWizardsTags':
				$as_id 	= intval($_REQUEST['as_id']);
				$html 	= self::getTagsByIdHtml($as_id,263);
				frontcontrollerx::json_success(array('html'=>$html));
				break;

			case 'image_settings':

				$html 			= "Anfrage ist fehlerhaft";
				$image_db_id 	= intval($_REQUEST['id']);

				if ($image_db_id != 0)
				{
					$merge 	= array('fields'=>self::genFormById(214,$image_db_id), 'formCfgId'=>214, 'formWzId'=>$image_db_id);
					$html = xredaktor_render::renderSoloAtom(287,$merge);
				}

				frontcontrollerx::json_success(array('success'=>true,'html'=>$html));
				break;

			case 'bd_resolveIdByS_Id':

				$s_id = intval($_REQUEST['s_id']);

				if ($s_id == 0) frontcontrollerx::json_failure("Ungültiger Resolve Aufruf");

				$table = xredaktor_wizards::genWizardTableNameBy_a_id(214);

				$present = dbx::query("select * from $table where wz_del='N' and wz_IMAGE = $s_id order BY wz_id ASC LIMIT 1");

				if ($present === false)
				{
					$data = array(
					'wz_sort' 		=> 0,
					'wz_del' 		=> 'N',
					'wz_IMAGE' 		=> $s_id,
					'wz_created' 	=> 'NOW()',
					'wz_NAME' 		=> $file_name
					);
					dbx::insert($table,$data);
					$id = dbx::getLastInsertId();

					frontcontrollerx::json_success(array('id'=>$id));

				} else
				{
					$id = $present['wz_id'];
					frontcontrollerx::json_success(array('id'=>$id));
				}

				break;

			case 'bd_search':

				$filter = json_decode($_REQUEST['search'],true);
				$tags	= explode(",",$_REQUEST['s']);
				$ret = self::imageSearcher($tags,$filter,0);
				$html = self::makeImageHtml($ret['files'],base64_encode($ret['key']));
				frontcontrollerx::json_success(array('success'=>true,'html'=>$html));

				break;
			case 'bd_search_screw':
				$key = json_decode(base64_decode($_REQUEST['key']),true);
				$ret = self::imageSearcher($key['s'],$key['filter'],$key['pos']+1);
				$html = self::makeImageHtml($ret['files'],base64_encode($ret['key']));
				die($html);
				break;
			case 'bd_fetchTags':
				$term = dbx::escape($_REQUEST['term']);
				$table = xredaktor_wizards::genWizardTableNameBy_a_id(289);
				$tags = dbx::queryAll("select * from $table where wz_KEYWORD LIKE '%$term%'");
				frontcontrollerx::json_success(array('success'=>true,'tags'=>$tags));
				break;
			case 'getImagesOfBD':

				$ids = explode(",",$_REQUEST['ids']);
				$ids_clean = array();

				foreach ($ids as $id)
				{
					if (!is_numeric($id)) continue;
					$ids_clean[] = intval($id);
				}

				$html = "";
				if (count($ids_clean)>0)
				{
					$table 	= xredaktor_wizards::genWizardTableNameBy_a_id(214);
					$files 	= dbx::queryAll("select * from $table where wz_id IN (".implode(",",$ids_clean).")");
					if ($files !== false) {

						foreach ($files as $i => $f)
						{
							$del_id	= $f['wz_id'];
							$s_id 	= $f['wz_IMAGE'];

							$s = xredaktor_storage::getById($s_id,true);

							if ($s['s_del'] == 'Y') continue;

							$title 	= $s['s_name'];
							$src	= $s['scaleSrc'].'/156/121';

							$files[$i]['img'] = array('id'=>$s_id,'title'=>$title,'src'=>$src);
						}

						$html = xredaktor_render::renderSoloAtom(286,array('images'=>$files));

					}
				}

				frontcontrollerx::json_success(array('success'=>true,'html'=>$html));
				break;

			case 'bild_datenbank_upload':


				$file 	= $_FILES['files'];

				$s_f_id = 19;

				$success 	= false;
				$id 		= 0;

				$file_tmp 	= $file['tmp_name'];
				$file_name 	= $file['name'];

				if (file_exists($file_tmp)) {

					$s_id = xredaktor_storage::registerFileInStorage($s_f_id,$file_tmp,$file_name,true);

					if ($s_id === false) {
						frontcontrollerx::json_success(array('success'=>false,'error'=>'Register fehlgeschlagen.'));
					}

					$table = xredaktor_wizards::genWizardTableNameBy_a_id(214);

					$data = array(
					'wz_sort' 		=> 0,
					'wz_del' 		=> 'N',
					'wz_IMAGE' 		=> $s_id,
					'wz_created' 	=> 'NOW()',
					'wz_NAME' 		=> $file_name
					);
					dbx::insert($table,$data);
					$id = dbx::getLastInsertId();

					frontcontrollerx::json_success(array('success'=>true,'id'=>$id));
				} else {
					frontcontrollerx::json_success(array('success'=>false,'error'=>'Tempfile nicht gefunden'));
				}

				break;
			case 'html_center':

				$type 	= $_REQUEST['type'];
				$id 	= 0;

				switch ($type)
				{
					case 'b':
						$id = 267;
						break;
					case 'a':
						$id = 268;
						break;
					case 'e':
						$id = 269;
						break;
					default: die();
				}

				$html = xredaktor_render::renderSoloAtom($id);
				die($html);
				break;

			case 'show_bilddatenbank':
				$settings = array('searchfields'=>array(1030,1027,1029));
				$searchFilters = self::mixInSerachFields($settings);
				$html = xredaktor_render::renderSoloAtom(282,array('searchFilters'=>$searchFilters));
				frontcontrollerx::json_success(array('html'=>$html));
				break;

			case 'html_left':
				self::html_left();

				$data = array(
				'panels'=>array('BETRIEBSDATEN','ANGEBOTE','EVENTS','REPORTS','BILDERDATENBANK')
				);
				$html_search = xredaktor_render::renderSoloAtom(248,$data);
				die($html);

				break;

			case 'get_betrieb':

				$idx 		= intval($_REQUEST['idx']);
				$iam 		= $_REQUEST['iam'];
				$betrieb_id = -1;

				switch ($iam)
				{
					case 'e': // 213
					$table = "wizard_auto_SIMPLE_W2W_209_213";
					$linked = dbx::query("select * from $table where wz_id_high = $idx");
					if ($linked !== false) {
						$betrieb_id = $linked['wz_id_low'];
					} else
					{
						frontcontrollerx::json_success(array('html'=>'Ungültiger Aufruf'));
					}
					break;
					case 'a': // 212
					$table = "wizard_auto_SIMPLE_W2W_209_212";
					$linked = dbx::query("select * from $table where wz_id_high = $idx");
					if ($linked !== false) {
						$betrieb_id = $linked['wz_id_low'];
					} else
					{
						frontcontrollerx::json_success(array('html'=>'Ungültiger Aufruf'));
					}
					break;
					default: break;
				}

				frontcontrollerx::json_success(array('betrieb_id'=>$betrieb_id,'title'=>xredaktor_wizards::getWizardRecordDataTitleByConfig(209,$betrieb_id)));

				break;
			case 'show_betrieb':

				$betrieb_id = intval($_REQUEST['betrieb']);
				$haupt 		= self::getHauptkategorien();

				$r = xredaktor_fe::fetchRecordById(209,$betrieb_id);

				if ($r['wz_del'] == 'Y') {
					$html = xredaktor_render::renderSoloAtom(291,$data);
					frontcontrollerx::json_success(array('html'=>$html));
					die();
				}

				$items_kategorien = array();
				foreach ($haupt as $h)
				{
					$wz_WIZARD 	= $h['wz_WIZARD'];
					$wz_NAME	= $h['wz_NAME'];

					$mapped = self::getGenericDataSets($wz_WIZARD,$betrieb_id, $wz_WIZARD, 209);
					if ($mapped === false) continue;

					foreach ($mapped as $m)
					{
						$del_id = $m['del_id'];
						$_idx 	= $m['wz_id'];
						$title 	= xredaktor_wizards::getWizardRecordDataTitleByConfig($wz_WIZARD,$_idx);
						$items_kategorien[] = array('title'=>$wz_NAME.' - <span>'.$title.'</span>',	'fields'=>self::genFormById($wz_WIZARD,$_idx), 'formCfgId'=>$wz_WIZARD, 'formWzId'=>$_idx, 'del_id' => $del_id);

					}
				}

				$items_ansprechpersonen = self::defaultMapping(210,	self::getTitleOfRecords(210),	209, $betrieb_id);
				$items_notizen 			= self::defaultMapping(215,	self::getTitleOfRecords(215),	209, $betrieb_id);
				$items_events 			= self::defaultMapping(213,	self::getTitleOfRecords(213),	209, $betrieb_id);
				$items_angebote 		= self::defaultMapping(212,	self::getTitleOfRecords(212),	209, $betrieb_id);

				$title = xredaktor_wizards::getWizardRecordDataTitleByConfig(209,$betrieb_id);

				$data = array(
				'title'		=> $title,
				'papsch' 	=> $betrieb_id,
				'tabs'		=>	array(

				array('nrx'=>209,'newx'=>'',					'multi' => 'N', title => 'BETRIEBSDATEN',		items 	=> array(array('title'=>'BETRIEBSDATEN', 'fields'=>self::genFormById(209,$betrieb_id), 'formCfgId'=>209, 'formWzId'=>$betrieb_id))),
				array('nrx'=>210,'newx'=>'Neue Ansprechperson',	'multi' => 'Y', title => 'ANSPRECHPERSONEN',	items 	=> $items_ansprechpersonen),
				array('nrx'=>'X','newx'=>'Neue Kategorie',		'multi' => 'Y', title => 'KATEGORIE',			items 	=> $items_kategorien),
				array('nrx'=>215,'newx'=>'Neue Notitz',			'multi' => 'Y', title => 'NOTIZEN',				items 	=> $items_notizen),
				array('nrx'=>213,'newx'=>'Neuer Event',			'multi' => 'Y', title => 'EVENTS',				items 	=> $items_events),
				array('nrx'=>212,'newx'=>'Neues Angebot',		'multi' => 'Y', title => 'ANGEBOTE',			items 	=> $items_angebote),

				));

				foreach ($data['tabs'] as $i => $d)
				{
					$data['tabs'][$i]['id'] = self::getId().'_b_'.$betrieb_id;
				}

				$html = xredaktor_render::renderSoloAtom(246,$data);
				frontcontrollerx::json_success(array('html'=>$html));

				break;

			case 'html_right':

				$data = array(
				'panels'=>array('DATENSATZ-1','DATENSATZ-2','DATENSATZ-3','DATENSATZ-4','DATENSATZ-5')
				);

				$html = xredaktor_render::renderSoloAtom(277,$data);
				die($html);

				break;

			case 'getFragment':
				$a_id = xcrm_security::getSafeFragmentId($_REQUEST['a_id']);
				self::getFragment($a_id);
				break;
			default: break;
		}
		die('FUNCTION_NOT_FOUND _ '.$function);
	}

	public static function renderField($cfg)
	{
		$xtype 	= $cfg['xtype'];
		$tpl	= 0;

		switch ($xtype)
		{
			case 'image':
				$tpl = 288;
				break;
			case 'images':
				$tpl = 254;
				break;
			case 'files':
				$tpl = 255;
				break;
			case 'combo':
				$tpl = 256;
				break;
			case 'checkboxes':
				$tpl = 257;
				break;
			case 'bool':
				$tpl = 253;
				break;
			case 'tags':
				$tpl = 252;
				break;
			case 'text':
				$tpl = 250;
				break;
			case 'textarea':
				$tpl = 251;
				break;
			case 'wz_record':
				$tpl = 260;
				break;
			case 'geo_point':
				$tpl = 261;
				break;
			default: break;
		}

		if ($tpl == 0) return "";
		return xredaktor_render::renderSoloAtom($tpl,array('cfg'=>$cfg));
	}

	public static function renderFields($params)
	{
		$fields = $params['fields'];
		$html 	= array();

		foreach ($fields as $f)
		{
			$html[] = self::renderField($f);
		}

		return implode("\n",$html);
	}


	public static function addContainers($a_id,$data)
	{

		if ($data === false) 	return $data;
		if (count($data) == 0) 	return $data;

		$a_id 	= intval($a_id);

		$containers = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del = 'N' and as_type in ('CONTAINER-IMAGES','CONTAINER-FILES')");
		if ($containers === false) return $data;

		$ret = array();

		if (!isset($data[0])) {
			$data[] = $data;
		}

		foreach ($data as $d)
		{
			$wz_id = intval($d['wz_id']);

			foreach ($containers as $as) {
				$as_name 		= 'wz_'.$as['as_name'];
				$table 			= xredaktor_wizards::handle_CONTAINER_FILES_table($as);
				$files 			= dbx::queryAll("select * from $table where wz_r_id = $wz_id and wz_del = 'N'");
				$d[$as_name] 	= $files;
			}

			$ret[] = $d;
		}

		return $ret;
	}


	public static function extend2genericSearch($master_wz_id,$search=false,$returnFilters=false)
	{

		if ($search === false)
		{
			$search = json_decode($_REQUEST['search'],true);
		}

		$table 		= xredaktor_wizards::genWizardTableNameBy_a_id($master_wz_id);

		if (count($search) == 0)
		{
			$data = dbx::queryAll("select * from $table where wz_online = 'Y' and wz_del = 'N'");
			if ($data === false) $data = array();
			if ($returnFilters)
			{
				return array();
			}

		} else
		{

			$sql_filters = array();

			foreach ($search as $as_id => $cfg)
			{

				if ($as_id == 209)
				{


					$ids = array();

					foreach ($cfg as $r_id => $onOff)
					{
						if ($onOff != 'on') continue;
						if (is_numeric($r_id)) $ids[] = intval($r_id);
					}

					if (count($ids)>0)
					{
						$hauptk_table = xredaktor_wizards::genWizardTableNameBy_a_id(216);
						$hauptk = dbx::queryAll("select * from $hauptk_table where wz_id IN (".implode(',',$ids).") and wz_online='Y' and wz_del='N' ");
						if ($hauptk === false) continue;

						$jointTables = array();
						foreach ($hauptk as $r)
						{
							$haupt_w_id = intval($r['wz_WIZARD']);

							if (209 < $haupt_w_id) {
								$table2check 	= "wizard_auto_SIMPLE_W2W_".'209'."_".$haupt_w_id;
								$wz_id_low 		= "209";
								$wz_id_high 	= $haupt_w_id;
								$attr_betrieb 	= "wz_id_low";
							} else
							{
								$table2check = "wizard_auto_SIMPLE_W2W_".$haupt_w_id."_".'209';
								$wz_id_low 		= $haupt_w_id;
								$wz_id_high 	= 209;
								$attr_betrieb 	= "wz_id_high";
							}

							if (!dbx::tablePresent($table2check)) continue;
							$sql_filters[] = " $table.wz_id IN (select $attr_betrieb from $table2check where 1) ";
						}
					}

					continue;
				}



				$as = xredaktor_atoms_settings::getById($as_id);
				if ($as === false) continue;

				$as_type_multilang 	= $as['as_type_multilang'];
				$as_name 			= $as['as_name'];
				$as_type 			= $as['as_type'];
				$lang 				= "DE";

				$as_name_final		= 'wz_'.$as_name;
				if ($as_type_multilang == 'Y') {
					$as_name_final		= "_".$lang.'_'.$as_name_final;
				}


				switch ($as_type)
				{
					case 'DATE':
					case 'TIME':
					case 'TIMESTAMP':

						$value 		= $cfg;
						$correct 	= "";

						switch ($as_type)
						{
							case 'TIMESTAMP':
								if ($value == '') continue;
								list($_date,$_time) = explode(" ",$value);
								list($_d,$_m,$_y) 	= explode(".",$_date);
								list($_H,$_M) 		= explode(":",$_time);
								$correct = "$_y-$_m-$_d $_H:$_M:00";
								break;

							case 'DATE':
								if ($value == '') continue;
								list($_d,$_m,$_y) 	= explode(".",$value);
								$_y = intval($_y);
								$_m = intval($_m);
								$_d = intval($_d);
								$correct = "$_y-$_m-$_d";
								break;

							case 'TIME':
								if ($value == '') continue;
								list($_h,$_m) = explode(":",$value);
								if ($_h < 10) $_h = '0'.intval($_h);
								if ($_m < 10) $_m = '0'.intval($_m);
								$correct = "$_h:$_m:00";
								break;

							default: continue;
						}

						if ($correct == "") continue;

						$as_config 		= json_decode($as['as_config'],true);
						$SEARCH_QUERY 	= $as_config['SEARCH_QUERY'];

						switch ($SEARCH_QUERY)
						{
							case 'GREATER_EQUAL':
								$sql_filters[] = " $as_name_final >= '$correct' ";
								break;
							case 'LESS_EQUAL':
								$sql_filters[] = " $as_name_final <= '$correct' ";
								break;
							case 'GREATER':
								$sql_filters[] = " $as_name_final > '$correct' ";
								break;
							case 'LESS':
								$sql_filters[] = " $as_name_final < '$correct' ";
								break;
							case 'EQUAL':
							default:
								$sql_filters[] = " $as_name_final = '$correct' ";
								break;
						}

						break;
					case 'TEXT':
					case 'TEXTAREA':
						if (trim($cfg) == '') continue;
						$sql_filters[] = " $as_name_final LIKE '%$cfg%' ";
						break;

					case 'SIMPLE_W2W':

						foreach ($cfg as $idx => $idx_cfg)
						{
							if (!is_numeric($idx)) 		continue;
							if (trim($idx_cfg) != 'on') continue;

							$idx = intval($idx);

							$haupt_w_id = intval($as['as_config']);
							if ($haupt_w_id == 0) continue;

							$jointTables = array();

							if ($master_wz_id < $haupt_w_id) {
								$table2check 	= "wizard_auto_SIMPLE_W2W_".$master_wz_id."_".$haupt_w_id;
								$wz_id_low 		= $master_wz_id;
								$wz_id_high 	= $haupt_w_id;
								$attr_betrieb 	= "wz_id_low";
								$attr_fremd		= "wz_id_high";
							} else
							{
								$table2check = "wizard_auto_SIMPLE_W2W_".$haupt_w_id."_".$master_wz_id;
								$wz_id_low 		= $haupt_w_id;
								$wz_id_high 	= $master_wz_id;
								$attr_betrieb 	= "wz_id_high";
								$attr_fremd		= "wz_id_low";
							}

							if (!dbx::tablePresent($table2check)) continue;
							$sql_filters[] = " $table.wz_id IN (select $attr_betrieb from $table2check where $attr_fremd=$idx) ";

						}
						break;
					default:
						break;
				}
			}

			if ($returnFilters)
			{
				return $sql_filters;
			}

			if (count($sql_filters)==0)
			{
				$sql = "select * from $table where wz_online = 'Y' and wz_del = 'N'";
			} else
			{
				$sql = "select * from $table where wz_online = 'Y' and wz_del = 'N' and ".implode(" and ",$sql_filters);
			}

			$data = dbx::queryAll($sql);
			if ($data === false) $data = array();

		}

		$data = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti($master_wz_id,$data);
		$data = self::addContainers($master_wz_id,$data);

		return $data;
	}


	public static function getList_betriebe()
	{
		$data = self::extend2genericSearch(209);
		return $data;
	}
	public static function getList_angebote()
	{
		$data = self::extend2genericSearch(212);
		return $data;

		$wz_id = 212;

		$table 		= xredaktor_wizards::genWizardTableNameBy_a_id($wz_id);
		$data 		= dbx::queryAll("select * from $table where wz_online = 'Y' and wz_del = 'N'");
		if ($data === false) $data = array();

		$data = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti($wz_id,$data);
		$data = self::addContainers($wz_id,$data);

		return $data;
	}
	public static function getList_events()
	{
		$data = self::extend2genericSearch(213);
		return $data;

		$wz_id = 213;

		$table 		= xredaktor_wizards::genWizardTableNameBy_a_id($wz_id);
		$data 		= dbx::queryAll("select * from $table where wz_online = 'Y' and wz_del = 'N'");
		if ($data === false) $data = array();

		$data = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti($wz_id,$data);
		$data = self::addContainers($wz_id,$data);

		return $data;
	}

}
