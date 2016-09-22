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

			case 'TIME':

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

				case 'TIME':
					list($_h,$_m,$_s) = explode(":",$value);

					if ($_h < 10) $_h = '0'.intval($_h);
					if ($_m < 10) $_m = '0'.intval($_m);
					if ($_s < 10) $_s = '0'.intval($_s);

					$correct = "$_h:$_m:$_s";
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

		dbx::update($masterTable,$cleanFields,array('wz_id'=>$form_wz_id));

		return true;
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
				$ret[] 	= array('title'=>$title,	'fields'=>self::genFormById($wz_id,$_idx), 'formCfgId'=>$wz_id, 'formWzId'=>$_idx, 'del_id' => $del_id);
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

	public static function handleAjaxFunction($function)
	{
		switch ($function)
		{
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
							$items[] = array('title'=>$wz_NAME.' - '.$title,	'fields'=>self::genFormById($wz_WIZARD,$_idx), 'formCfgId'=>$wz_WIZARD, 'formWzId'=>$_idx, 'del_id' => $del_id);
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
				$saved = self::savePack($savePack);
				frontcontrollerx::json_success(array('saved'=>$saved));
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
								frontcontrollerx::json_success(array('success'=>false,'error'=>'Datensatzverzeichnis konnte nicht angelegt werden.'));
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

			case 'html_center':
				$html = xredaktor_render::renderSoloAtom(267);
				die($html);
				break;

			case 'html_left':

				$data = array(
				'panels'=>array('STAMMDATEN','ANGEBOTE','EVENTS','SUCHAGENTEN','BILDERDATENBANK')
				);

				$html = xredaktor_render::renderSoloAtom(248,$data);
				die($html);

				break;

			case 'show_betrieb':

				$betrieb_id = intval($_REQUEST['betrieb']);
				$haupt 		= self::getHauptkategorien();

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
						$items_kategorien[] = array('title'=>$wz_NAME.' - '.$title,	'fields'=>self::genFormById($wz_WIZARD,$_idx), 'formCfgId'=>$wz_WIZARD, 'formWzId'=>$_idx, 'del_id' => $del_id);

					}
				}

				$items_ansprechpersonen = self::defaultMapping(210,	self::getTitleOfRecords(210),	209, $betrieb_id);
				$items_notizen 			= self::defaultMapping(215,	self::getTitleOfRecords(215),	209, $betrieb_id);
				$items_events 			= self::defaultMapping(213,	self::getTitleOfRecords(213),	209, $betrieb_id);
				$items_angebote 		= self::defaultMapping(212,	self::getTitleOfRecords(212),	209, $betrieb_id);

				$data = array(
				'papsch' 	=> $betrieb_id,
				'tabs'		=>	array(

				array('nrx'=>209,'newx'=>'',					'multi' => 'N', title => 'STAMMDATEN',			items 	=> array(array('title'=>'STAMMDATEN', 'fields'=>self::genFormById(209,$betrieb_id), 'formCfgId'=>209, 'formWzId'=>$betrieb_id))),
				array('nrx'=>210,'newx'=>'Neue Ansprechperson',	'multi' => 'Y', title => 'ANSPRECHPERSONEN',	items 	=> $items_ansprechpersonen),
				array('nrx'=>'X','newx'=>'Neue Kategorie',		'multi' => 'Y', title => 'KATEGORIE',			items 	=> $items_kategorien),
				array('nrx'=>215,'newx'=>'Neue Notitz',			'multi' => 'Y', title => 'NOTIZEN',				items 	=> $items_notizen),
				array('nrx'=>213,'newx'=>'Neuer Event',			'multi' => 'Y', title => 'EVENTS',				items 	=> $items_events),
				array('nrx'=>212,'newx'=>'Neues Angebot',		'multi' => 'Y', title => 'ANGEBOTE',			items 	=> $items_angebote),

				));

				foreach ($data['tabs'] as $i => $d)
				{
					$data['tabs'][$i]['id'] = self::getId();
				}

				$html = xredaktor_render::renderSoloAtom(246,$data);
				die($html);


				break;

			case 'html_right':
				die('');
				break;

			case 'getFragment':
				$a_id = xcrm_security::getSafeFragmentId($_REQUEST['a_id']);
				self::getFragment($a_id);
				break;
			default: break;
		}
		die('FUNCTION_NOT_FOUND');
	}

	public static function renderField($cfg)
	{
		$xtype 	= $cfg['xtype'];
		$tpl	= 0;

		switch ($xtype)
		{
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
		$a_id 	= intval($a_id);

		$containers = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del = 'N' and as_type in ('CONTAINER-IMAGES','CONTAINER-FILES')");
		if ($containers === false) return $data;
		
		$ret = array();
		
		if (!isset($data[0])) {
			$data[] = $data;
		}

		foreach ($data as $d)
		{
			
		}
		
		return $ret;
	}

	public static function getList_betriebe()
	{
		$table 		= xredaktor_wizards::genWizardTableNameBy_a_id(209);
		$betriebe 	= dbx::queryAll("select * from $table where wz_online = 'Y' and wz_del = 'N'");
		if ($betriebe === false) $betriebe = array();
		
		$betriebe = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti(209,$betriebe);
		$betriebe = xredaktor_wizards::mapLanguageFieldsToNormFieldsMulti(209,$betriebe);

		return $betriebe;
	}
	public static function getList_angebote()
	{
		$table 		= xredaktor_wizards::genWizardTableNameBy_a_id(209);
		$betriebe 	= dbx::queryAll("select * from $table where wz_online = 'Y' and wz_del = 'N'");
		if ($betriebe === false) $betriebe = array();
		return $betriebe;
	}
	public static function getList_events()
	{
		$table 		= xredaktor_wizards::genWizardTableNameBy_a_id(209);
		$betriebe 	= dbx::queryAll("select * from $table where wz_online = 'Y' and wz_del = 'N'");
		if ($betriebe === false) $betriebe = array();
		return $betriebe;
	}

}
