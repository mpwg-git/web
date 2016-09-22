<?

class wzx_static
{


	public static function simpleDataCopyFromTo($table_from,$table_to,$where)
	{
		$where 		= trim(dbx::getWhereByArray($where));
		$data_from 	= dbx::queryAll("select * from $table_from $where");

		if ($where == "")
		{
			return false;
		}

		if (strpos($table_to,'_published')===false) return true;

		dbx::query("DELETE FROM $table_to $where"); 									// CLEAN MAPPINGS && RUNNING IN TRANSACTION
		dbx::query("INSERT INTO $table_to (select * from $table_from $where)"); 	// CLEAN MAPPINGS && RUNNING IN TRANSACTION

	}


	public static function unpublish($wz_id, $wz_r_id, $test=true)
	{

		// TODO
		// DATENBANK, einen 404 mit den Settings
		// ALLE nach match $wz_id,$wz_r_id

		dbx::transaction_start();


		$table_draft 		= xredaktor_wizards::genWizardTableNameBy_a_id($wz_id);
		$table_published	= $table_draft.'_published';

		//TODO
		$insert = array(

		);
		$update = array(

		);


		$data = dbx::query("select * from $table_published where wz_id = $wz_r_id");
		dbx::query("DELETE FROM $table_published where wz_id = $wz_r_id");

		$as_types = array(
		'IMG_GALLERY',
		'CONTAINER-IMAGES',
		'CONTAINER-FILES',
		'SIMPLE_W2W',
		'UNIQUE_W2W',
		'WIZARDLIST',
		);

		foreach ($as_types as &$as_type)
		{
			$as_type = "'$as_type'";
		}

		$in = implode(",",$as_types);

		$check = dbx::queryAll("select * from atoms_settings,atoms where (a_del = 'N' OR as_del='N') and a_type = 'WIZARD' and as_a_id = a_id and as_type IN ($in) and a_id = $wz_id");
		if ($check === false) $check = array();

		foreach ($check as $as)
		{

			$as_id = intval($as['as_id']);
			if ($as_id == 0) continue;
			$as_type = $as['as_type'];



			switch ($as_type)
			{
				case 'WIZARDLIST':


					$wzl_id = intval($as['as_config']);
					if ($wzl_id == 0) continue;

					$_as = xredaktor_atoms_settings::getById($wzl_id);
					$other_a = $_as['as_a_id'];

					$table = xredaktor_wizards::genWizardTableNameBy_a_id($other_a);
					$field = 'wz_'.$_as['as_name'];

					$from 	= $table;
					$to 	= $table.'_published';

					if (!dbx::attributePresent($table,$field)) continue;

					$where	= array(
					$field 		=> $wz_r_id,
					'wz_del'	=> 'N'
					);


					dbx::delete($to,$where);

					break;

				case 'IMG_GALLERY':
				case 'CONTAINER-IMAGES':
				case 'CONTAINER-FILES':

					$to 	= 'wizard_container_of_FILES_'.$as_id.'_published';

					$where	= array(
					'wz_r_id' 	=> $wz_r_id
					);

					dbx::delete($to,$where);

					break;

				case 'SIMPLE_W2W':

					$rel = xredaktor_wizards::gen_TABLE_SIMPLE_W2W($as);
					if ($rel === false) continue;

					/*

					return array(
					'wz_id_low' 	=> $w_id_low,
					'wz_id_high'	=> $w_id_high,
					'table_name' 	=> $table_name);

					*/

					$tablename = trim($rel['table_name']);
					if ($tablename == '') continue;

					$to 	= $tablename.'_published';

					if ($rel['wz_id_low'] == $wz_id)
					{
						$field2Go = 'wz_id_low';
					} else {
						$field2Go = 'wz_id_high';
					}

					$where  = array(
					$field2Go => $wz_r_id,
					);

					dbx::delete($to,$where);

					break;

				case 'UNIQUE_W2W':
					$rel = xredaktor_wizards::gen_TABLE_UNIQUE_W2W($as);
					if ($rel === false) continue;
					/*

					return array(
					'wz_id_low' 	=> $w_id_low,
					'wz_id_high'	=> $w_id_high,
					'table_name' 	=> $table_name);

					*/

					$tablename = trim($rel['table_name']);
					if ($tablename == '') continue;

					$from 	= $tablename;
					$to 	= $tablename.'_published';

					if ($rel['wz_id_low'] == $wz_id)
					{
						$field2Go = 'wz_id_low';
					} else {
						$field2Go = 'wz_id_high';
					}

					$where  = array(
					$field2Go => $wz_r_id,
					);

					dbx::delete($to,$where);

					break;

				default: continue;
			}



			if (count($tables)>0)
			{
				echo "-------- $as_type | $as_id\n";
				foreach ($tables as $t)
				{
					echo "$t\n";
					dbx::query("DROP TABLE IF EXISTS $t;");
				}
			}
		}


		$commit = dbx::transaction_commit();

		if (!$commit)
		{
			frontcontrollerx::json_failure("COMMIT FAILED");
		}

		xredaktor_log::wz_publish($wz_id,$wz_r_id);

		/*

		$hash_draft 	= md5(json_encode($toStatic_draft));
		$hash_publish 	= md5(json_encode($toStatic_publish));

		if ($hash_draft != $hash_publish)
		{

		// KICK CASH
		// CHEKC BY RELATIONS welche abhängig sind, --> REBUILD CACHE

		if ($test)
		{
		return $cnt_cache;
		}

		}

		*/

		return true;
	}


	public static function publish($wz_id, $wz_r_id, $test=true)
	{

		/* DUMMY DATA COPY */


		dbx::transaction_start();


		$table_draft 		= xredaktor_wizards::genWizardTableNameBy_a_id($wz_id);
		$table_published	= $table_draft.'_published';

		//TODO
		$insert = array(

		);
		$update = array(

		);


		$data = dbx::query("select * from $table_draft where wz_id = $wz_r_id");
		if ($data === false) return false; // DELETE IF PRESENT IN PULBISHED

		dbx::insertOnDuplicateKey($table_published,'wz_id',$data);

		$as_types = array(
		'IMG_GALLERY',
		'CONTAINER-IMAGES',
		'CONTAINER-FILES',
		'SIMPLE_W2W',
		'UNIQUE_W2W',
		'WIZARDLIST',
		);

		foreach ($as_types as &$as_type)
		{
			$as_type = "'$as_type'";
		}

		$in = implode(",",$as_types);

		$check = dbx::queryAll("select * from atoms_settings,atoms where (a_del = 'N' OR as_del='N') and a_type = 'WIZARD' and as_a_id = a_id and as_type IN ($in) and a_id = $wz_id");
		if ($check === false) $check = array();

		foreach ($check as $as)
		{

			$as_id = intval($as['as_id']);
			if ($as_id == 0) continue;
			$as_type = $as['as_type'];



			switch ($as_type)
			{

				case 'WIZARDLIST':


					$wzl_id = intval($as['as_config']);
					if ($wzl_id == 0) continue;

					$_as = xredaktor_atoms_settings::getById($wzl_id);
					$other_a = $_as['as_a_id'];

					$table = xredaktor_wizards::genWizardTableNameBy_a_id($other_a);
					$field = 'wz_'.$_as['as_name'];

					$from 	= $table;
					$to 	= $table.'_published';

					if (!dbx::attributePresent($table,$field)) continue;

					$where	= array(
					$field 		=> $wz_r_id,
					'wz_del'	=> 'N'
					);


					self::simpleDataCopyFromTo($from,$to,$where);

					break;


				case 'IMG_GALLERY':
				case 'CONTAINER-IMAGES':
				case 'CONTAINER-FILES':

					$from 	= 'wizard_container_of_FILES_'.$as_id;
					$to 	= 'wizard_container_of_FILES_'.$as_id.'_published';

					$where	= array(
					'wz_r_id' 	=> $wz_r_id,
					'wz_del'	=> 'N'
					);

					self::simpleDataCopyFromTo($from,$to,$where);

					break;

				case 'SIMPLE_W2W':

					$rel = xredaktor_wizards::gen_TABLE_SIMPLE_W2W($as);
					if ($rel === false) continue;

					/*

					return array(
					'wz_id_low' 	=> $w_id_low,
					'wz_id_high'	=> $w_id_high,
					'table_name' 	=> $table_name);

					*/

					$tablename = trim($rel['table_name']);
					if ($tablename == '') continue;

					$from 	= $tablename;
					$to 	= $tablename.'_published';

					if ($rel['wz_id_low'] == $wz_id)
					{
						$field2Go = 'wz_id_low';
					} else {
						$field2Go = 'wz_id_high';
					}

					$where  = array(
					$field2Go => $wz_r_id,
					);



					self::simpleDataCopyFromTo($from,$to,$where);

					break;

				case 'UNIQUE_W2W':
					$rel = xredaktor_wizards::gen_TABLE_UNIQUE_W2W($as);
					if ($rel === false) continue;
					/*

					return array(
					'wz_id_low' 	=> $w_id_low,
					'wz_id_high'	=> $w_id_high,
					'table_name' 	=> $table_name);

					*/

					$tablename = trim($rel['table_name']);
					if ($tablename == '') continue;

					$from 	= $tablename;
					$to 	= $tablename.'_published';

					if ($rel['wz_id_low'] == $wz_id)
					{
						$field2Go = 'wz_id_low';
					} else {
						$field2Go = 'wz_id_high';
					}

					$where  = array(
					$field2Go => $wz_r_id,
					);

					self::simpleDataCopyFromTo($from,$to,$where);

					break;

				default: continue;
			}



			if (count($tables)>0)
			{
				echo "-------- $as_type | $as_id\n";
				foreach ($tables as $t)
				{
					echo "$t\n";
					dbx::query("DROP TABLE IF EXISTS $t;");
				}
			}
		}


		$commit = dbx::transaction_commit();

		if (!$commit)
		{
			frontcontrollerx::json_failure("COMMIT FAILED");
		}

		xredaktor_log::wz_publish($wz_id,$wz_r_id);

		/*

		$hash_draft 	= md5(json_encode($toStatic_draft));
		$hash_publish 	= md5(json_encode($toStatic_publish));

		if ($hash_draft != $hash_publish)
		{

		// KICK CASH
		// CHEKC BY RELATIONS welche abhängig sind, --> REBUILD CACHE

		if ($test)
		{
		return $cnt_cache;
		}

		}

		*/

		return true;
	}

	public static function page_update()
	{

		// URL ÄNDERT SICH
		// VERSCHIEBE EINE PAGE müssen wir alles aktualisieren

		/*


		CREATE / MOVE / SORT


		*/


		/*


		--------- PAGE
		- PAGE Settings müsste OG_DRINENN
		- ÄNDERT SICH DIE SEGMENTE PRO PAGE --> KICK CACHE



		--------- ATOM
		- xr_menu mit einer ID
		- PAGE X und deren Kinder SPECIFIC // FOOTER SHIT


		/*



		PUBLISH EINER PAGE


		--> LINKS, IMAGES RAUSHOLEN --> PAGES ...



		dksjhdskjhdskjhdskjhdskjds.html

		--> typ blabla ist, muss das dort raus ..


		--> FULL CACHE MACHEN
		- min. updaten

		-->


		*/


	}

	public static function buildCache($wz_id, $wz_r_id)
	{

		// DATEN HABEN SICH NICHT GEÄNDERT
		// ABER FILE GELÖSCHT, PAGE NAME HAT SICH geändert
	}

	public static function toStatic($wz_id, $wz_r_id, $depth=3)
	{
		$depth--;
		if ($depth <= 0) return false;

		$generic 	= array();
		$nonGeneric	= array();


		$siteId = intval(dbx::queryAttribute("select a_s_id from atoms where a_id = $wz_id","a_s_id"));
		$table 	= xredaktor_wizards::genWizardTableNameBy_a_id($wz_id).'_published';
		$ass 	= dbx::queryAll("select * from atoms_settings where as_a_id = $wz_id and as_del='N' order by as_name");
		$raw 	= dbx::query("select * from $table where wz_id = $wz_r_id");
		$langs 	= xredaktor_pages::getValidLangs($siteId);


		if ($raw === false) return false; // Not published

		$patchLangs = array();
		foreach ($ass as $as)
		{
			$multi 		= ($as['as_type_multilang'] == 'Y');
			$as_name	= $as['as_name'];

			/*
			if (!$multi)
			{

			$generic[$as_name] = self::getStaticByAsType($wz_id,$wz_r_id,$as,$raw,false,$depth);

			} else
			{
			foreach ($langs as $l)
			{
			$l = strtoupper($l);
			$lang_final = $l.'_STRICT';
			if (!in_array($lang_final,$patchLangs)) $patchLangs[] = $lang_final;
			$nonGeneric[$lang_final][$as_name] = self::getStaticByAsType($wz_id,$wz_r_id,$as,$raw,$l,$depth);
			}
			}*/

			foreach ($langs as $l)
			{
				$l = strtoupper($l);
				$lang_final = $l;
				if (!in_array($lang_final,$patchLangs)) $patchLangs[] = $lang_final;
				$retx = self::getStaticByAsType($wz_id,$wz_r_id,$as,$raw,$l,$depth);
				$nonGeneric[$lang_final][$as_name] = $retx;
			}
		}

		foreach ($generic as $k => $v)
		{
			foreach ($patchLangs as $l)
			{
				$nonGeneric[$l][$k] = $v;
			}
		}

		return array(


		'META' 		=> self::getMetaOfRecord($wz_id,$wz_r_id),
		'LANGS'		=> $nonGeneric,

		);

	}


	/*


	-------------------- BAUSTEIN KANN KEINE RELATIONEN haben



	Tiefe von 2

	--------------------- 	DATEN_RECORD

	- titlIt
	- wz_id
	- wz_r_id
	- static jewils wo man eben ist




	--------------------- FILE

	- S_ID
	- ALT
	- TITLE
	- DESC
	- LIZENZ
	...



	---------------------



	*/


	public static function trackRelationsByPage()
	{

	}

	public static function trackRelationsByRecord()
	{

	}

	public static function std_info_record($wz_id,$wz_r_id,$lang,$depth=2)
	{
		$static = self::toStatic($wz_id,$wz_r_id,$depth);
		if ($static === false) return false;

		//echo "[$wz_id,$wz_r_id,$lang,$depth]";

		$ret = $static['LANGS'][$lang];
		if (!is_array($ret))
		{
			$ret = array();
		}
		
		$meta = array();
		$meta['lang'] 		= $lang;		
		$meta['wz_id'] 		= $wz_id;
		$meta['wz_r_id'] 	= $wz_r_id;

		
		$ret['META'] = $meta;
		
		return $ret;
	}

	public static function std_info_atom($data)
	{
		return $data;
	}

	public static function std_info_file($s_id,$lang)
	{
		$s_id = intval($s_id);
		if ($s_id == 0) return array(
		
		's_id' 	=> 0,
		'title'	=> '',
		'alt'	=> '',
		
		);
		
		return array(
		
		'lang'	=> $lang,
		's_id' 	=> $s_id,
		'title'	=> '',
		'alt'	=> '',
		
		);

	}

	public static function genStaticUrlByPage($cfg,$lang)
	{
		return "#genStaticUrlByPage-not-coded-yet";
	}


	public static function getInfopoolLink($cfg,$lang)
	{
		list($wz_idx,$wz_r_idx) = explode(";",$cfg['infopool_pair'],2);

		$wz_idx 	= intval($wz_idx);
		$wz_r_idx 	= intval($wz_r_idx);


		$notSet = $link	= array(
		'title' 	=> '',
		'href' 		=> '#',
		'target' 	=> '_self',
		'wz_id'		=> $wz_idx,
		'wz_r_id'	=> $wz_r_idx,
		'useable'	=> false,
		);

		if (($wz_idx == 0) || ($wz_r_idx == 0))
		{
			$link = $notSet;
		} else {


			$static = self::toStatic($wz_idx,$wz_r_idx);
			if ($static === false)
			{
				$link = $notSet;
			} else {

				$link = array(
				'href' 		=> $static['LANGS'][$lang]['META']['URL'],
				'title' 	=> $static['LANGS'][$lang]['META']['TITLE'],
				'target'	=> $value['i_target'],
				'wz_id'		=> $wz_idx,
				'wz_r_id'	=> $wz_r_idx,
				'useable'	=> true,
				);
			}

		}

		return $link;
	}


	public static function getStaticByAsType($wz_id,$wz_r_id,$as,$raw,$lang,$depth=2)
	{

		$lang 		= strtoupper($lang);
		$multi 		= ($as['as_type_multilang'] == 'Y');
		$as_id		= intval($as['as_id']);
		$as_name	= $as['as_name'];
		$as_config	= $as['as_config'];
		$as_type	= $as['as_type'];

		if ($as_id == 0) return false;

		$value		= $raw['wz_'.$as_name];
		if ($multi)
		{
			$value	= $raw['_'.$lang.'_wz_'.$as_name];
		}


		switch ($as_type)
		{

			/*

			if (in_array($as_type,array('CHECKBOX','COMBO','RADIO')))
			{
			$as_type_multilang 	= $as['as_type_multilang'];
			$as_name 			= $as['as_name'];
			$as_config 			= $as['as_config'];
			$tmp  				= json_decode($as_config,true);

			$assoz 						= $tmp['a'];
			$linearSorted				= $tmp['l'];
			$record['CFG_wz_'.$as_name] = $tmp;

			switch ($as_type)
			{
			case 'CHECKBOX':

			$reassign = array('a'=>array(),'l'=>array(),'on'=>array(),'off'=>array());

			/*echo "------------------------- START";
			echo "<pre>\nLANG :: $currentLang\n";
			print_r($linearSorted);
			echo "</pre>";
			echo "------------------------- END";

			foreach ($linearSorted as $checkSets)
			{

			$preKey = "";
			if ($as_type_multilang == 'Y')
			{
			$preKey = '_'.$currentLang.'_';
			}

			$keyNacked	= 'wz_'.$as_name.'_'.$checkSets['v'];
			$key 		= $preKey.$keyNacked;


			$checked 	= isset($record[$key]);

			if ($checked)
			{

			$label = $checkSets[$currentLang];

			if (trim($label)=="")
			{
			$found = false;
			foreach ($failOverLangs as $i=>$flang)
			{
			$flang	= strtoupper($flang);
			$label 	= $checkSets[$flang];
			if (trim($label) != "")
			{
			$found = true;
			break;
			}
			}
			if (!$found)
			{
			$label = $checkSets['g'];
			}
			}


			$state = $record[$key];

			$record['LABEL_wz_'.$as_name.'_'.$checkSets['v']] 	= $label;
			$reassign['a'][$checkSets['v']] = $label;
			$reassign['l'][] 				= array('k'=>$checkSets['v'],'v'=>$label);

			$reassign[$state]['a'][$checkSets['v']] = $label;
			$reassign[$state]['l'][] 		= array('k'=>$checkSets['v'],'v'=>$label);
			}

			}

			/*


			echo "------------------------- $reassign START";
			echo "<pre>\nLANG :: $currentLang\n";
			print_r($reassign);
			echo "</pre>";
			echo "------------------------- END";

			$record['wz_'.$as_name] = $reassign;


			break;
			default:

			if ($as_type_multilang == 'Y')
			{
			$multiKey = '_'.$lang.'_wz_'.$as_name;
			$label = $tmp['a'][$record[$multiKey]][$lang];
			if (trim($label)=="")
			{
			$found = false;
			foreach ($langFailOver as $i=>$flang)
			{
			$flang 		= strtoupper($flang);
			$multiKey	= '_'.$flang.'_wz_'.$as_name;
			$label = $tmp['a'][$record[$multiKey]][$flang];
			if ($value != "")
			{
			$found = true;
			break;
			}
			}
			if (!$found)
			{
			$label = $tmp['a'][$record[$multiKey]]['g'];
			}
			}
			} else
			{
			$label = $tmp['a'][$value][$currentLang];
			// ÜBERLAUF FEHLT HIER
			}
			$record['LABEL_wz_'.$as_name] 	= $label;
			}
			} else
			{
			$record[$atttributeName] = $value;
			}

			//			$record[$atttributeName] = $value;

			if ($as_type == "HTML") {
			$record[$atttributeName] = xredaktor_render::renderHtmlEditor($value);
			}
			*/

			case 'HTML':

				$html = xredaktor_xr_html::toStaticHtml($value);

				$images  	= array();
				$links  	= array();

				//self::trackRelationsByRecord($wz_id,$wz_r_id,'FILES',	$images);
				//self::trackRelationsByRecord($wz_id,$wz_r_id,'LINKS',	$links); // PAGE ... + EXTERNEN URLS
				return $html;
				break;

				/* LINK */
			case 'LINK':

				$json 		= base64_decode($value);
				$settings 	= json_decode($json,true);
				$sel 		= $settings['sel'];
				$value		= $settings['cfg'][$sel];

				$link		= array();


				switch ($sel)
				{
					case 'email':
						$link = $value;
						break;

					case 'external':

						$link		= array(
						'title' 	=> $value['ext_title'],
						'href' 		=> $value['ext_url'],
						'target' 	=> $value['ext_target'],
						'nofollow'	=> ($value['ext_nofollow'] == 'Y'),
						);

						break;
					case 'page':


						$href = self::genStaticUrlByPage($value,$lang);

						$link		= array(
						'title' 	=> $value['p_title'],
						'href' 		=> $href,
						'target' 	=> $value['p_target'],
						);

						break;

					case 'infopool':

						$link = self::getInfopoolLink($value,$lang);

						break;
				}

				return $link;
				// self::trackRelationsByRecord($wz_id,$wz_r_id,'LINKS',	$links); // PAGE ...
				break;

				break;

				/* JSON DECODE */
			case 'GEO-POINT':
			case 'GEO-POLY':
			case 'JSON':
				return json_decode($value,true);
				break;


				/* FILE MAPPINGS */
			case 'IMG_GALLERY':
			case 'CONTAINER-IMAGES':
			case 'CONTAINER-FILES':


				$table 	= 'wizard_container_of_FILES_'.$as_id.'_published';
				$files 	= dbx::queryAll("select * from $table where wz_r_id = $wz_r_id");
				if ($files === false) $files = array();

				$ret	= array();

				foreach ($files as $f)
				{
					$s_id = intval($f['wz_s_id']);
					$ret[] = self::std_info_file($s_id,$lang);
				}

				return $ret;

				// array von FILES
				//self::trackRelationsByRecord($wz_id,$wz_r_id,'FILES',	$files);

				break;

				/* IMAGE */
			case 'FILE':
			case 'IMAGE':

				return self::std_info_file(intval($value),$lang);

				// FILE
				//self::trackRelationsByRecord($wz_id,$wz_r_id,'FILES',	$files);

				break;

				/* n2n relations */
			case 'SIMPLE_W2W':
			case 'UNIQUE_W2W':


				switch ($as_type)
				{
					case 'SIMPLE_W2W':
						$rel = xredaktor_wizards::gen_TABLE_SIMPLE_W2W($as);
						break;
					case 'UNIQUE_W2W':
						$rel = xredaktor_wizards::gen_TABLE_UNIQUE_W2W($as);
						break;
					default: return false;
				}

				if ($rel === false) return false;

				/*

				return array(
				'wz_id_low' 	=> $w_id_low,
				'wz_id_high'	=> $w_id_high,
				'table_name' 	=> $table_name);

				*/

				$tablename = trim($rel['table_name']);
				if ($tablename == '') continue;

				$tableRel = $tablename.'_published';


				if ($rel['wz_id_low'] == $wz_id)
				{
					$field2Go 	= 'wz_id_low';
					$other		= intval($rel["wz_id_high"]);
					$otherF		= "wz_id_high";
				} else {
					$field2Go 	= 'wz_id_high';
					$other		= intval($rel["wz_id_low"]);
					$otherF		= "wz_id_low";
				}

				$otherTable = xredaktor_wizards::genWizardTableNameBy_a_id($other);
				$otherTable .= '_published';

				$sql 		= "select $otherTable.wz_id from $tableRel,$otherTable where $field2Go = $wz_r_id and $otherF = $otherTable.wz_id";
				$records 	= dbx::queryAll($sql);
				
			
				$ret = array();

				foreach ($records as $r)
				{
					$wz_r_idx = intval($r['wz_id']);
					$ret[] = self::std_info_record($other,$wz_r_idx,$lang,$depth);
				}

				return $ret;


				// ARRAY von DATEN_RECORD
				// self::trackRelationsByRecord($wz_id,$wz_r_id,'RECORDS',	$wz_idx,$wz_r_idx);

				break;


			case 'WIZARDLIST':


				$wzl_id = intval($as_config);
				if ($wzl_id == 0) return false;

				$_as = xredaktor_atoms_settings::getById($wzl_id);
				$other_a = $_as['as_a_id'];

				$table = xredaktor_wizards::genWizardTableNameBy_a_id($other_a);
				$field = 'wz_'.$_as['as_name'];

				$table.= '_published';

				if (!dbx::attributePresent($table,$field)) return false;

				$records 	= dbx::queryAll("select wz_id from $table where $field = $wz_r_id");
				$ret 		= array();

				foreach ($records as $r)
				{
					$wz_r_idx = $r['wz_id'];
					$ret[] = self::std_info_record($other_a,$wz_r_idx,$lang,$depth);
				}

				return $ret;

				// ARRAY von DATEN_RECORD
				// self::trackRelationsByRecord($wz_id,$wz_r_id,'RECORDS',	$wz_idx,$wz_r_idx);
				break;

			case 'WIZARD':

				$as_config = intval($as_config);
				return self::std_info_record($as_config,$value,$lang,$depth);

				// DATEN_RECORD
				//self::trackRelationsByRecord($wz_id,$wz_r_id,'RECORDS',	$wz_idx,$wz_r_idx);
				break;

			case 'ATOMLIST':

				// ARRAY von ATOMS
				return false;
				self::trackRelationsByRecord($wz_id,$wz_r_id,'ATOM',	$a_id);

				break;

			case 'TIMEMACHINE':

				// ARRAY von DATEN_RECORD
				return false;
				return self::getFromStatic();

				self::trackRelationsByRecord($wz_id,$wz_r_id,'TM',	$tm_id);

				break;

			case 'INFOPOOL_RECORD':

				// ARRAY von DATEN_RECORD
				return false;
				return self::getFromStatic();
				self::trackRelationsByRecord($wz_id,$wz_r_id,'RECORDS',		$wz_idx,$wz_r_idx);

				break;


				/* remote */
			case 'REMOTE_FIELD':

				return false;
				return self::getStaticByAsType();
				self::trackRelationsByRecord($wz_id,$wz_r_id,'RECORDS',		$wz_idx,$wz_r_idx);

				break;
			case 'REMOTE_RECORD':

				// ARRAY von DATEN_RECORD
				return false;
				return self::getFromStatic();
				self::trackRelationsByRecord($wz_id,$wz_r_id,'RECORDS',		$wz_idx,$wz_r_idx);

				break;

			default: // WENN NICHTS MIT DEM WERT PASSIEREN MUSS

			if (!$multi)
			{
				return $raw['wz_'.$as_name];
			} else {
				return $raw['_'.$lang.'_wz_'.$as_name];
			}

			break;
		}

	}


	public static function getMetaOfRecord($wz_id,$wz_r_id)
	{

		// CHECKEN WAS IST MANUAL overwritten


	}




	public static function getVanityURL($wz_id,$wz_r_id)
	{

		$url 	= self::genUrlByConfig(); //ggf. Manuelle überschreibung


		$present = (dbx::query(" URL "));

		// ist das dersable datensatz $wz_id,$wz_r_id
		if ($vanityClash)
		{
			// ID KOMMT DRAUF ....
		}

		if ($present) return false; // NICHTS TUN


		$pnu_id = dbx::insert();


		// check old urls in nice url pool
		dbx::update(" WHERE $wz_id,$wz_r_id SET pnu_http_status = 301, pnu_goto_pnu_id = $pnu_id"); // PERMANENT

	}

	public static function getVanityTitle()
	{

	}

	public static function getFromStatic($wz_id,$wz_r_id,$lang)
	{

		return array(


		/* DATA OF RECORD BY LANGUAGE */

		'DATA' => array(

		'NAME' => '',
		'NAME2' => '',
		// ...


		),




		/* META DATEN */

		'META' => array(

		'URL'	 	=> '',
		'URL_ID'	=> '',


		'title' 	=> '',
		'metadesc' 	=> '',
		'metadesc' 	=> '',

		'last'		=> '',
		'created'	=> '',

		'lastby'	=> '',
		'createdby'	=> '',


		), // META END


		);

	}






















}