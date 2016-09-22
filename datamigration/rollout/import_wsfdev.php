<?
/*
 * 		HERSTELLEN PRE STEP 2
 *
 *		1.) IMPORT WSFDEV
 * 		2.) generate URLs User/room
 * 		3.) COPY xKALT, DB & CACHE HTML FILES
 */

require_once (dirname(__FILE__) . '/../_includes.php');

class import_wsfdev
{

	public static $db_pre	= "mpwg-pre";
	public static $db_live	= "wsfdev";


	public static function copy($table)
	{
		echo "COPY TABLE START: $table\n";

		$present = dbx::query("SELECT * FROM information_schema.tables WHERE table_schema = 'wsfdev' AND table_name = '$table'");
		if($present === false)
		{
			echo "COPY TABLE ABORTED - NOT PRESENT IN LIVE: $table\n";
			return false;
		}

		dbx::query("TRUNCATE $table");
		$attrs_live	= dbx::_listFields("wsfdev.$table");
		$fieldsStr	= array();
		foreach ($attrs_live as $att) {
			$field = $att['Field'];
			if (dbx::attributePresent($table,$field))
			{
				$fieldsStr[] = $field;
			}
		}

		$fieldsStr = implode(",",$fieldsStr);
		$sql = "INSERT INTO $table ($fieldsStr) SELECT $fieldsStr FROM wsfdev.$table";
		dbx::query($sql);
		echo "COPIED TABLE END: $table\n";
	}


	public static function table_copy($table,$inspect=false)
	{
		self::copy($table);

		if ($inspect !== false)
		{
			self::inspect($inspect);
		}
	}


	public static function inspect($a_id)
	{
		$a_id = intval($a_id);

		// ATOM LIST
		self::inspect_atomlist($a_id);
		// FILES
		self::inspect_checkFile($a_id);
		// CONTAINER OF FILES
		self::inspect_checkContainerOfFiles($a_id);
	}


	public static function inspect_atomlist($a_id)
	{
		$table = xredaktor_wizards::genWizardTableNameBy_a_id($a_id);

		$alists = dbx::queryAll("SELECT * FROM atoms_settings WHERE as_a_id = $a_id AND as_del='N' AND as_type='ATOMLIST'");
		if ($alists === false)
		{
			echo "NO ATOM LISTS: $a_id\n";
			return false;
		}

		$records = dbx::queryAll("SELECT * FROM $table WHERE wz_del='N'");
		foreach ($records as $r)
		{
			$wz_id = intval($r['wz_id']);
			if ($wz_id == 0) continue;

			foreach ($alists as $al)
			{
				$field 	= 'wz_'.$al['as_name'];
				if (trim($r[$field])=="") continue;

				$json = json_decode(trim($r[$field]),true);
				$linear = $json['l'];

				if (count($linear)==0) continue;

				$atom 	= intval($al['as_config']);

				$atom_files = dbx::queryAll("SELECT * FROM atoms_settings WHERE as_a_id = $atom AND as_del='N' AND (as_type='IMAGE' OR as_type='FILE')");
				if ($atom_files === false) continue;


				$update = false;
				foreach ($linear as $i => $l)
				{
					foreach ($atom_files as $af)
					{
						$field2 = trim($af['as_name']);
						$s_id 	= intval($l['atom_cfg'][$field2]);

						if ($s_id > 0)
						{
							$linear[$i]['atom_cfg'][$field2] = self::handleFile($s_id);
							if ($linear[$i]['atom_cfg'][$field2] != $s_id)
							{
								$update = true;
							}
						}

					}
				}

				if ($update)
				{

					$l = array();
					$a = array();

					foreach ($linear as $ll)
					{

						$v 			= $ll['v'];
						$atom_cfg 	= $ll['atom_cfg'];

						$pack = array(
						'v' 		=> $v,
						'atom_cfg' 	=> $atom_cfg,
						);

						$l[] 	= $pack;
						$a[$v] 	= $pack;
					}

					$data = array(
					'l' => $l,
					'a' => $a,
					);

					dbx::update($table,array($field=>json_encode($data)),array('wz_id'=>$wz_id));
				}
			}
		}
	}


	public static function inspect_checkContainerOfFiles($a_id)
	{
		$table = xredaktor_wizards::genWizardTableNameBy_a_id($a_id);

		$conatiners = dbx::queryAll("SELECT * FROM atoms_settings WHERE as_a_id = $a_id AND as_del='N' AND (as_type='CONTAINER-IMAGES' OR as_type='CONTAINER-FILES')");
		if ($conatiners === false)
		{
			echo "NO CONTAINERS: $a_id\n";
			return false;
		}

		foreach ($conatiners as $c)
		{
			$as_id = intval($c['as_id']);
			$table_container = "wizard_container_of_FILES_".$as_id;
			if (!dbx::tablePresent($table_container))
			{
				echo "!!! Container not Found: $table_container\n";
				continue;
			}
			self::copy($table_container);

			$records = dbx::queryAll("SELECT * FROM $table_container WHERE wz_del='N'");
			foreach ($records as $r)
			{
				$wz_s_id = intval($r['wz_s_id']);
				if ($wz_s_id == 0) continue;

				$wz_id = intval($r['wz_id']);
				if ($wz_id == 0) continue;

				$wz_s_id_new = self::handleFile($wz_s_id);
				if ($wz_s_id != $wz_s_id_new)
				{
					dbx::update($table_container,array('wz_s_id'=>$wz_s_id_new),array('wz_id'=>$wz_id));
					echo "UP_DB_CONTAINER [$table_container] ($wz_id) -> $wz_s_id_new\n";
				}
			}
		}
	}


	function handleFile($s_id)
	{

		echo ("Check File: $s_id\n");

		$file_live 	= dbx::queryAttribute("SELECT s_onDisk FROM wsfdev.storage WHERE s_id = $s_id","s_onDisk");
		$file_pre 	= dbx::queryAttribute("SELECT s_onDisk FROM `mpwg-pre`.storage  WHERE s_id = $s_id","s_onDisk");

		$destFile 	= str_replace('/srv/gitgo_daten/www/wsfdev.xgodev.com/web/','/srv/gitgo_daten/www/pre.meineperfektewg.com/web/',$file_live);

		$md5_live 	= false;
		$md5_pre	= false;

		//WIR HABEN JA SCHON MAL GEPACHED

		//if (file_exists($file_live)) nicht via disk hinkönnen
		{

			if (file_exists($destFile))
			{
				//echo "ALREADY DOWNLOADED\n";
				$content = hdx::fread($destFile);
			} else
			{
				//echo "FETCH FILE VIA HTTP\n";
				$content = file_get_contents(str_replace('/srv/gitgo_daten/www/wsfdev.xgodev.com/web/','http://www.meineperfektewg.com/',$file_live));
			}

			$md5_live = md5($content);
		}

		if (file_exists($file_pre))
		{
			$md5_pre = md5_file($file_pre);
		}

		if ($md5_live != $md5_pre)
		{
			$test_live 	= str_replace('/srv/gitgo_daten/www/wsfdev.xgodev.com/web/', 'http://www.meineperfektewg.com/',$file_live);
			$test_pre 	= str_replace('/srv/gitgo_daten/www/pre.meineperfektewg.com/web/', 'http://pre.meineperfektewg.com/',$file_pre);

			echo "[$s_id, LIVE:$test_live]\n";
			echo "[$s_id, PRE:$test_pre]\n";

			$destDir = dirname($destFile);
			$cmd = "mkdir -p '".str_replace("'","\\'",$destDir)."'";
			echo "Creating: $destDir\n";
			exec($cmd);
			echo "DONE\n";
			echo "WRITE: $destFile (OLD:$s_id)\n";

			if (file_exists($destFile) && ($md5_live == md5_file($destFile)))
			{
				echo "Already on Disk\n";
			} else {
				echo "Write on Disk\n";
				hdx::fwrite($destFile,$content);
			}

			$s_id_new = xredaktor_storage::registerExistingFile(1,$destFile);
			return $s_id_new;
		}

		return $s_id;
	}


	function inspect_checkFile($a_id)
	{
		$table = xredaktor_wizards::genWizardTableNameBy_a_id($a_id);
		$files = dbx::queryAll("SELECT * FROM atoms_settings WHERE as_a_id = $a_id AND as_del='N' AND (as_type='FILE' OR as_type='IMAGE')");
		if ($files === false)
		{
			echo "NO FILES: $a_id\n";
			return false;
		}

		echo "Inspecting $a_id | $table ...\n";

		$file_fields = array();
		foreach ($files as $f)
		{
			$file_fields[] = "wz_".$f['as_name']; // TABLE ATTRIBUTE NAME
		}

		$file_fields_sql = implode(",",$file_fields);
		$records = dbx::queryAll("SELECT wz_id,$file_fields_sql FROM $table",false); // auch gelöschte
		if ($records === false) return false;

		foreach ($records as $i => $r)
		{
			$wz_id = intval($r['wz_id']);
			if ($wz_id == 0) continue;

			foreach ($file_fields as $f)
			{
				$s_id = intval($r[$f]);
				if ($s_id == 0) continue;

				$s_id_new = self::handleFile($s_id);

				if ($s_id != $s_id_new)
				{
					dbx::update($table,array($f=>$s_id_new),array('wz_id'=>$wz_id));
					echo "UP_DB [$f] ($wz_id) -> $s_id_new\n";
				}
			}
		}
		return true;
	}


	function genUrlUser()
	{
		$user = dbx::queryAll("SELECT wz_id FROM wizard_auto_707 ORDER BY wz_id ");

		foreach ($user as $u) {
			$id = intval($u['wz_id']);
			echo ("userID: " . $id . "<br>");
			if ($id == 0) continue;
			$url = fe_vanityurls::genUrl_profil($id);
			file_get_contents($url);
		}
	}


	function genUrlRoom($room)
	{
		$room = dbx::queryAll("SELECT wz_id FROM wizard_auto_809 ORDER BY wz_id ");

		foreach ($room as $r)
		{
			$id = intval($r['wz_id']);
			echo ("roomID: " . $id . "<br>");
			if ($id == 0) continue;
			$url = fe_vanityurls::genUrl_room($id);
			file_get_contents($url);
		}
	}
}

$t = time();


import_wsfdev::table_copy('chatitems',800);
import_wsfdev::table_copy('wizard_auto_707',707);
import_wsfdev::table_copy('wizard_auto_717',717);
import_wsfdev::table_copy('wizard_auto_718',718);
import_wsfdev::table_copy('wizard_auto_719',719);
import_wsfdev::table_copy('wizard_auto_720',720);
import_wsfdev::table_copy('wizard_auto_755',755);
import_wsfdev::table_copy('wizard_auto_756',756);
import_wsfdev::table_copy('wizard_auto_765',765);
import_wsfdev::table_copy('wizard_auto_767',767);
import_wsfdev::table_copy('wizard_auto_768',768);
import_wsfdev::table_copy('wizard_auto_771',771);
import_wsfdev::table_copy('wizard_auto_772',772);
import_wsfdev::table_copy('wizard_auto_773',773);
import_wsfdev::table_copy('wizard_auto_775',775);
import_wsfdev::table_copy('wizard_auto_776',776);
import_wsfdev::table_copy('wizard_auto_801',801);
import_wsfdev::table_copy('wizard_auto_809',809);
import_wsfdev::table_copy('wizard_auto_810',810);
import_wsfdev::table_copy('wizard_auto_822',822);
import_wsfdev::table_copy('wizard_auto_834',834);
import_wsfdev::table_copy('wizard_auto_844',844);
import_wsfdev::table_copy('wizard_auto_845',845);
import_wsfdev::table_copy('wizard_auto_846',846);
import_wsfdev::table_copy('wizard_auto_847',847);
import_wsfdev::table_copy('wizard_auto_853',853);
import_wsfdev::table_copy('wizard_auto_861',861);
import_wsfdev::table_copy('wizard_auto_861',882);
import_wsfdev::table_copy('wizard_auto_893',893);


import_wsfdev::genUrlUser();
import_wsfdev::genUrlRoom();





echo "\n\nTotal Seconds: ".(time()-$t)."\n\n";
