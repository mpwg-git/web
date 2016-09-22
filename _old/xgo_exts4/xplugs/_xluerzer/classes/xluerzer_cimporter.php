<?

class xluerzer_cimporter
{

	public static function defaultAjaxHandler($scope,$function,$param_0)
	{

		switch ($function)
		{
			case 'updateAndImportImported':
				self::updateAndImportImported();
				break;
			case 'updateAndImportContact':
				self::updateAndImportContact();
				break;
			case 'doExport':
				self::doExport();
				break;
			case 'doImport':
				self::doImport();
				break;
			case 'loadImported':
				self::handle_loadImported();
				break;
			case 'loadSimilar':
				self::handle_loadSimilar();
				break;
			case 'grid_archive':
				self::handle_grid_archive();
				break;
			case 'grid_icontacts':
				self::handle_grid_icontacts();
				break;
			case 'grid_scontacts':
				self::handle_grid_scontacts();
				break;
			default: die('???!??');
		}

		die(" $function $param_0");
	}

	public static function updateAndImportImported()
	{
		$cic_id = intval($_REQUEST['cic_id']);
		$data = json_decode($_REQUEST['data'],true);

		$up = array();
		foreach ($data as $k => $v)
		{
			if (!dbx::attributePresent('contact_importer_contact',$k)) continue;
			$up[$k] = $v;
		}

		if ($cic_id > 0)
		{
			dbx::update('contact_importer_contact',$up,array('cic_id'=>$cic_id));
		}

		self::insertContactDataWithNewData($cic_id);

		frontcontrollerx::json_success();
	}

	public static function updateAndImportContact()
	{
		$ec_id = intval($_REQUEST['ec_id']);
		$data = json_decode($_REQUEST['data'],true);

		$up = array();
		foreach ($data as $k => $v)
		{
			if (!dbx::attributePresent('e_contacts',$k)) continue;
			$up[$k] = $v;
		}

		if ($ec_id > 0)
		{
			$old = dbx::query("select * from e_contacts where ec_id = $ec_id");
			unset($up['ec_id']);
			dbx::update('e_contacts',$up,array('ec_id'=>$ec_id));
			xluerzer_log::pushLog('UPDATE','e_contacts','ec_id',$ec_id,$old);
		}

		frontcontrollerx::json_success(array($_REQUEST));
	}

	public static function doExport()
	{
		
		header("Content-Type: application/octet-stream");
		header("Content-Transfer-Encoding: Binary");
		header("Content-disposition: attachment; filename=\"sample.csv\"");

		
		$fields = array();
		
		foreach (self::getValidFields() as $f)
		{
			$fields[] = 'ec'.substr($f,3);
		}
		
		
		$content = b"\xEF\xBB\xBF";
		$content .= implode(";",$fields);
		echo $content;
		die();	
	}

	public static function fopen_utf8 ($filename) {
		$file = @fopen($filename, "r");
		$bom = fread($file, 3);
		if ($bom != b"\xEF\xBB\xBF")
		{
			fclose($file);
			return false;
		}
		else
		{
			fclose($file);
			return true;
		}
	}

	public static function doImportNow($ci_id)
	{
		set_time_limit(0);

		$ci_id = intval($ci_id);
		if ($ci_id == 0)
		{
			frontcontrollerx::json_failure("ERROR ci_id = 0 ");
		}

		$import = dbx::query("select * from contact_importer where ci_id = $ci_id");
		if ($ci_id === false)
		{
			frontcontrollerx::json_failure("ERROR import file is missing");
		}

		$s_id = intval($import["ci_s_id"]);
		if ($s_id == 0)
		{
			frontcontrollerx::json_failure("ERROR s_id = 0 @$ci_id");
		}

		$file = xredaktor_storage::getFilePathById($s_id);
		if (!file_exists($file))
		{
			frontcontrollerx::json_failure("ERROR file is not present: $file");
		}


		#########################################################
		#########################################################
		#########################################################
		#########################################################
		#########################################################
		#########################################################
		#########################################################

		self::updateById($ci_id,array(
		'ci_state' 	=> 'IMPORTING',
		'ci_lines'	=> 0
		));

		$minFields 		= array('ec_email','ec_firstname','ec_lastname');
		$fieldsPresent	= array();
		$fieldsSave		= array();
		$fieldsIndex	= array();


		$mapped = array(
		//'ec_id' 	=> 'cic_ec_id',
		'ac_name' 	=> 'cic_country_name'
		);

		$mapped_keys = array_keys($mapped);
		$filter_key_segments = array('cic_id');


		$stripBom = self::fopen_utf8($file);
		$handle = fopen($file, "r");
		if ($stripBom)
		{
			fseek($handle,3);
		}




		$row = -1;
		if (($file) !== FALSE) {
			while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
				$row++;

				$num = count($data);
				if ($row == 0)
				{
					foreach ($data as $pos => $attr)
					{

						if (in_array($attr,$mapped_keys))
						{
							$fieldsIndex[$mapped[$attr]] = $pos;
							$fieldsPresent[] = $mapped[$attr];
						} else
						{
							$attr = 'cic'.substr($attr,2);
							if (dbx::attributePresent('contact_importer_contact',$attr))
							{
								$fieldsIndex[$attr] = $pos;
								$fieldsPresent[] = $attr;
							}
						}
					}
					continue;
				}


				$db = array();
				foreach ($fieldsIndex as $name => $pos)
				{
					if (in_array($name,$filter_key_segments)) continue;
					$db[$name] = $data[$pos];

				}

				self::importContact($db,$ci_id);


			}
			fclose($handle);
		}

		/*

		$dump = array();
		foreach ($fieldsPresent as $fp)
		{
		$dump[] = "'$fp'";
		}
		echo implode(",\n",$dump);

		*/


		self::updateById($ci_id,array(
		'ci_state' 	=> 'FINISHED',
		'ci_lines'	=> $row
		));

	}


	public static function getValidFields()
	{

		$fields = array(

		'cic_country_id',
		'cic_contactType_id',
		'cic_firstname',
		'cic_lastname',
		'cic_address',
		'cic_zip',
		'cic_city',
		'cic_state',
		'cic_email',
		'cic_email2',
		'cic_fax',
		'cic_phone_code',
		'cic_phone',
		'cic_phone2',
		'cic_url',
		'cic_company',
		'cic_facebook',
		'cic_skype',
		'cic_linkedin',
		'cic_type',
		'cic_twitter',

		);


		return $fields;
	}

	public static function updateById($ci_id,$up)
	{
		$ci_id = intval($ci_id);
		unset($up['ci_id']);
		dbx::update('contact_importer',$up,array('ci_id'=>$ci_id));
	}

	public static function importContact($db,$ci_id)
	{
		$ci_id = intval($ci_id);
		if ($ci_id == 0) return false;

		$db['cic_ci_id'] = $ci_id;


		$cic_md5 = md5(json_encode($db));
		$db['cic_md5'] = $cic_md5;


		$firstname 	= trim($db['cic_firstname']);
		$lastname 	= trim($db['cic_lastname']);
		$email 		= trim($db['cic_email']);

		$firstname 	= str_replace("'","\\'",$firstname);
		$lastname 	= str_replace("'","\\'",$lastname);
		$email 		= str_replace("'","\\'",$email);


		if ($email == "")
		{
			$db['cic_status'] = "ERROR";
		}


		##
		##
		##
		##
		##
		##

		$update = false;
		$ec_id 	= 0;

		if (($firstname != "") && ($lastname != "") && ($email != ""))
		{
			$present_contact = dbx::query("select ec_id from e_contacts where ec_email LIKE '$email' and ec_firstname LIKE '$firstname' and ec_lastname LIKE '$lastname'");
			if ($present_contact)
			{
				$db['cic_status'] = "FOUND";
				$update = true;
				$ec_id 	= $present_contact['ec_id'];
			} else
			{
				$db['cic_status'] = "MANUAL";
			}
		}

		##
		## REPORT
		##


		$present = dbx::query("select cic_id from contact_importer_contact where cic_md5='$cic_md5'");
		if ($present === false)
		{
			dbx::insert('contact_importer_contact',$db);
			$cic_id = dbx::getLastInsertId();
		} else
		{
			$cic_id = intval($present['cic_id']);
			dbx::update('contact_importer_contact',$db,array('cic_id'=>$cic_id));
		}

		if (($update) && (intval($ec_id)>0))
		{
			self::updateContactDataWithNewData($cic_id,$ec_id);
		}

	}


	public static function updateContactDataWithNewData($cic_id,$ec_id)
	{

		$cic_id = intval($cic_id);
		$ec_id 	= intval($ec_id);

		if ($cic_id == 0) 	return false;
		if ($ec_id == 0) 	return false;

		$cic = dbx::query("select * from contact_importer_contact where cic_id = $cic_id ");
		if ($cic === false) return false;
		$ec = dbx::query("select * from e_contacts where ec_id = $ec_id ");
		if ($ec === false) return false;

		$up = array();
		$fields = self::getValidFields();
		foreach ($fields as $f)
		{
			$key 	= "ec".substr($f,3);
			$up[$key] = $cic[$f];
		}

		$db2 = array();
		$db2['cic_ec_id'] = $ec_id;
		dbx::update('contact_importer_contact',$db2,array('cic_id'=>$cic_id));


		dbx::update("e_contacts",$up,array('ec_id'=>$ec_id));
		xluerzer_log::pushLog('UPDATE','e_contacts','ec_id',$ec_id,$ec,'VIA IMPORT');
	}


	public static function insertContactDataWithNewData($cic_id)
	{

		$cic_id = intval($cic_id);
		if ($cic_id == 0) 	return false;


		$cic = dbx::query("select * from contact_importer_contact where cic_id = $cic_id ");
		if ($cic === false) return false;

		$up = array();
		$fields = self::getValidFields();
		foreach ($fields as $f)
		{
			$key 	= "ec".substr($f,3);
			$up[$key] = $cic[$f];
		}

		dbx::insert("e_contacts",$up);
		$ec_id = dbx::getLastInsertId();

		$db2 = array();
		$db2['cic_ec_id'] = $ec_id;
		dbx::update('contact_importer_contact',$db2,array('cic_id'=>$cic_id));


		xluerzer_log::pushLog('INSERT','e_contacts','ec_id',$ec_id,$ec,'VIA IMPORT');
	}


	public static function doImport()
	{
		$name = trim(dbx::escape($_REQUEST['name']));
		$s_id = intval($_REQUEST['s_id']);


		$redo = intval($_REQUEST['redo']);

		if ($redo > 0)
		{
			self::doImportNow($redo);
			frontcontrollerx::json_success();
		}

		if ($s_id == 0)
		{
			frontcontrollerx::json_failure("No file is slected.");
		}

		$db = array(
		'ci_state' 		=> 'NONE',
		'ci_name' 		=> $name,
		'ci_created' 	=> 'NOW()',
		'ci_s_id' 		=> $s_id,
		);

		dbx::insert('contact_importer',$db);
		$ci_id = dbx::getLastInsertId();

		
		self::doImportNow($ci_id);
		
		frontcontrollerx::json_success(array('ci_id'=>$ci_id));
	}

	public static function handle_loadImported()
	{
		$cic_id = intval($_REQUEST['cic_id']);
		$data = dbx::query("SELECT * FROM contact_importer_contact WHERE cic_id = $cic_id ");
		frontcontrollerx::json_success(array('cic_contact'=>$data));
	}

	public static function handle_loadSimilar()
	{
		$ec_id = intval($_REQUEST['ec_id']);
		$data = dbx::query("SELECT * FROM e_contacts WHERE ec_id = $ec_id ");
		frontcontrollerx::json_success(array('cic_contact'=>$data));
	}

	public static function handle_grid_archive()
	{

		$sql_data = "SELECT * FROM contact_importer ";
		$sql_cnt  = "SELECT count(*) as sql_cnt FROM  contact_importer";

		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));

	}

	public static function handle_grid_icontacts()
	{
		$ci_id = intval($_REQUEST['ci_id']);

		$sql_data = "SELECT * FROM contact_importer_contact WHERE cic_ci_id = $ci_id ";
		$sql_cnt  = "SELECT count(*) as sql_cnt FROM  contact_importer_contact WHERE cic_ci_id = $ci_id";

		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));
	}

	public static function handle_grid_scontacts()
	{
		$cic_id = intval($_REQUEST['cic_id']);
		if ($cic_id == 0) {
			frontcontrollerx::json_success();
		}

		$find = dbx::query("select * from contact_importer_contact where cic_id = $cic_id");

		$firstname 	= "";
		$lastname 	= "";
		$email 		= "";

		if ($find === false)
		{
		} else {
			$firstname 	= $find['cic_firstname'];
			$lastname 	= $find['cic_lastname'];
			$email 		= $find['cic_email'];
		}

		$firstname 	= str_replace("'","\\'",$firstname);
		$lastname 	= str_replace("'","\\'",$lastname);
		$email 		= str_replace("'","\\'",$email);


		if ($email != "")
		{
			$where = "  ((MATCH (ec_firstname) AGAINST ('$firstname') AND MATCH (ec_lastname) AGAINST ('$lastname')) OR (ec_email LIKE '%$email%')) ";
		} else {
			$where = "  ((MATCH (ec_firstname) AGAINST ('$firstname') AND MATCH (ec_lastname) AGAINST ('$lastname')) ) ";
		}

		$sql_data = "SELECT * FROM e_contacts where $where";
		$sql_cnt  = "SELECT count(*) as sql_cnt FROM  e_contacts where $where";

		xluerzer_db::uniqueDataGridWrapper(array(
		'sql_data' 	=> $sql_data,
		'sql_cnt' 	=> $sql_cnt,
		));
	}

}