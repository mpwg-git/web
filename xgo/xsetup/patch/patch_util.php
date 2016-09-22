<?

class patch_util
{

	static $dbCfg = array();

	public static function getLines($file)
	{
		$chunksize = 100*8192;
		$f = fopen($file, 'rb');
		$lines = 0;

		while (!feof($f)) {
			$lines += substr_count(fread($f, $chunksize), "\n");
		}

		fclose($f);

		return $lines;
	}


	public static function cleanTableName($tableNameOrig)
	{
		$tableNameOrig = str_replace(array(' ','[dbo]','.','[',']'), array('','','','',''), $tableNameOrig);
		return $tableNameOrig;
	}


	public static function doDB_table_finished($filex,$table_name,$fields)
	{
		$fields_assoz = array();
		$table_name_final = "old_".$filex."__".$table_name;

		dbx::query("DROP TABLE IF EXISTS `$table_name_final` ;");

		$sql = "CREATE TABLE `$table_name_final` (";
		$sql .= "`id_x` int(11) NOT NULL AUTO_INCREMENT,";

		foreach ($fields as $f)
		{
			foreach ($f as $field => $type)
			{
				$sql .= "`$field`  $type , \n\r";

				$is_int 	= false;
				$is_float 	= false;
				$is_blob 	= ($type == 'LONGBLOB NOT NULL');
				$is_text 	= (($type == 'VARCHAR(255)  NOT NULL') || ($type == 'text  NOT NULL'));
				$is_bit 	= ($type == "enum('Y','N') NOT NULL DEFAULT 'N'");
				$is_datetime= ($type == 'datetime  NOT NULL');


				$fields_assoz[$field] = array(
				'sql' 			=> $type,
				'is_text'		=> $is_text,
				'is_int'		=> $is_int,
				'is_float'		=> $is_float,
				'is_bit'		=> $is_bit,
				'is_datetime'	=> $is_datetime,
				'is_blob'		=> $is_blob,
				);

			}
		}

		$sql .= "
			PRIMARY KEY (`id_x`),
  			UNIQUE KEY `id_x` (`id_x`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;"; 


		dbx::query($sql);


		self::$dbCfg[$table_name] = array(
		"newName" 	=> $table_name_final,
		"fields"	=> $fields_assoz
		);

	}



	public static function handleType($table_name,$typeCrap)
	{
		$typeCrap = trim($typeCrap);
		if ($typeCrap == "") return false;

		list($field,$cfg) = explode("]",$typeCrap,2);

		$typeMapper = array(
		'image'				=> 'LONGBLOB NOT NULL',
		'uniqueidentifier' 	=> 'text  NOT NULL',
		'float' 			=> 'float NOT NULL',
		'money' 			=> 'BIGINT NOT NULL',
		'numeric' 			=> 'BIGINT  NOT NULL',
		'decimal' 			=> 'DOUBLE  NOT NULL',
		'varchar' 			=> 'VARCHAR(255)  NOT NULL',
		'char' 				=> 'VARCHAR(255)  NOT NULL',
		'tinyint' 			=> 'SMALLINT  NOT NULL',
		'int' 				=> 'int  NOT NULL',
		'datetime' 			=> 'datetime  NOT NULL',
		'text' 				=> 'text  NOT NULL',
		'timestamp'			=> 'datetime  NOT NULL',
		'bit'				=> "enum('Y','N') NOT NULL DEFAULT 'N'",
		);

		foreach ($typeMapper as $oldType => $newType)
		{
			if (strpos($cfg,$oldType) !== false) {

				if ($newType === false) return false;

				$field 		= trim(str_replace(array("[","]"," "),array("","",""),$field));
				$newType 	= trim($newType);

				return array($field => $newType);
			}
		}


		die("NO TYPE FOUND :: ".$field."|".$cfg);

		return true;
	}

	public static function table_create($filex,$pack)
	{
		$fLine = $pack[0];
		list($crap,$tableName,$crap) = explode("`",$fLine,3);
		$tableName = trim($tableName);

		if (dbx::tablePresent($tableName)) {

			self::echox("TABLE PRESENT ... $tableName");

			array_pop($pack);
			array_shift($pack);

			foreach ($pack as $attrib)
			{
				$attrib = trim($attrib);
				$pos 	= strpos($attrib,'`');
				if ($pos === false) continue;
				if ($pos != 0) continue;

				list($crap,$attribX,$setting) = explode("`",$attrib,3);

				if (substr(trim($setting),-1) == ',')
				{
					$setting = substr(trim($setting),0,-1).";";
				}

				if (dbx::attributePresent($tableName,$attribX)) {
					$sqlx = "ALTER TABLE  `$tableName` CHANGE  `$attribX` `$attribX` ".$setting;
				} else {
					$sqlx = "ALTER TABLE  `$tableName` ADD `$attribX` ".$setting;
				}

				//self::echox($sqlx);
				dbx::query($sqlx);
			}


		} else
		{
			self::echox("TABLE NOT PRESENT ... $tableName");
			$sql = implode("",$pack);
			dbx::query($sql);
			return ;
		}
		return ;


		print_r($pack);

		//self::doDB_table_finished($filex,$table_name,$fields);
	}


	public static function processPatchingByCompleteSqlFile()
	{
		$file = dirname(__FILE__).'/patch.sql';
		self::process($file);
	}

	public static function echox($str)
	{
		//$str = trim(str_replace(array("\r","\n"),array("",""),$str));
		echo "<pre>".$str."</pre>\n";
		ob_end_flush();
		ob_flush();
		flush();
	}

	public static function process($file)
	{
		self::echox("<h2>1) Patching DB-Structure</h2>");

		if (!file_exists($file)) die("Patch - File not found ...");


		self::echox("Counting Lines ... [WAIT]");
		self::echox("\rLines: ".($fileLines = self::getLines($file))."							\n");

		$timeStart = time();

		$cmd = array('CREATE TABLE'=>'table_create');

		$action 	= "";
		$pack 		= array();
		$line 		= "";
		$curLine 	= 0;
		$lastPerc 	= -1;
		$counter 	= array();

		$file_handle = fopen($file, "r");
		while ($line = fgets ($file_handle)) {

			$curLine++;
			$per = round(($curLine/$fileLines)*100,2);

			if ($lastPerc != $per)
			{
				$lastPerc 	= $per;
				$dur 		= time() - $timeStart;
				$howLong 	= $dur * 100 / $lastPerc;
				$howLongRest= $howLong - $dur;;
				$howLongHu  = libx::sec2Time($howLongRest);

				//self::echox(sprintf("\r-> %3d %% (Done in:%2d h %2d min %2d sec) [TOTAL: %3d secs]	\r",$lastPerc,$howLongHu['hours'],$howLongHu['minutes'],$howLongHu['seconds'],$howLong));

			}

			//$line = mb_convert_encoding($line,'utf-8','utf-16');

			$line = str_replace("\n","",$line);
			$line = str_replace("\r","",$line);

			$line = trim($line);
			if ($line == "") continue;

			if ($action == "")
			{
				foreach ($cmd as $k => $v)
				{
					if (strpos($line,$k)!==false)
					{
						$action = $k;
						$pack[] = $line;
						break;
					}
				}
			} else { // search for ) ....

				$strip = substr(trim($line),0,1);

				if ($strip == ')')
				{
					$pack[] = $line;
					call_user_func('self::'.$cmd[$action],$filex,$pack);
					// RESET
					if (!isset($counter[$action])) $counter[$action] = 0;
					$counter[$action]++;
					$action = "";
					$pack = array();

				} else {
					$pack[] = $line;
				}

			}

		}

		self::lang_fix();
		self::timemachine_fix();





		self::echox("\n\r END - PATCHING DB STRUCTURE ");
		fclose($file_handle);
	}

	public static function syncWizards()
	{
		frontcontrollerx::echox("<h2>2) Synching Wizards to Database ...</h2>");
		$wizards = dbx::queryAll("select * from atoms where a_del='N' and a_type='WIZARD'");
		foreach ($wizards as $w)
		{
			$a_id 	= $w['a_id'];
			$a_name	= $w['a_name'];
			frontcontrollerx::echox("<h3>$a_name ($a_id)</h3>");
			xredaktor_wizards::checkWizardFields($a_id,true);
		}
	}

	public static function repairStorage()
	{
		/*

		$path 		= xxxxx
		$newPath 	= Ixcore::htdocsRoot;

		self::echox("<h2>3) Repairing Storage File Structure ...</h2>");
		$sql = "UPDATE storage set s_onDisk = REPLACE(s_onDisk,'$path','$newPath')";
		dbx::query($sql);

		*/
	}


	public static function cleanImageCaches()
	{
		$storage_groups = dbx::queryAll("select * from storage_groups");
		if ($storage_groups === false) $storage_groups = array();

		foreach ($storage_groups as $sg)
		{
			$path = Ixcore::htdocsRoot . '/' . $sg['sg_name']. '/' . '_cache';
			if (is_dir($path)) {
				$files = hdx::readDirFlatArray($path);
				foreach ($files as $file)
				{
					if ($file['TYPE'] != 'FILE') continue;
					@unlink($file['F_NAME_FULL']);
				}
			}
		}

	}

	public static function cleanCache()
	{
		self::echox("<h2>4) Cleaning ALL Caches ....</h2>");
		xredaktor_core::flushAllTemp();
		self::cleanImageCaches();
	}

	public static function cleanDb()
	{
		self::echox("<h2>5) Cleaning DB Data....</h2>");
		dbx::query("delete from atoms where a_del = 'Y' and a_s_id = 0");
		dbx::query("delete from atoms_settings where as_a_id NOT IN (select a_id from atoms where 1)");
		dbx::query("delete from pages_niceurls ");
		dbx::query("delete FROM `pages_settings_atoms` WHERE `psa_p_id` not in (select p_id from pages where 1)");
	}

	public static function doAll()
	{
		self::processPatchingByCompleteSqlFile();
		self::syncWizards();
		self::repairStorage();
		self::cleanCache();
		self::cleanDb();
		xredaktor_core::checkFaces();
	}


	public static function timemachine_fix()
	{
		return false;
		$actions = array(
		array('table'=>'pages',					'field'=>'p_tm_id',		'after'=>'p_isOnline'),
		array('table'=>'pages_settings_atoms',	'field'=>'psa_tm_id',	'after'=>'psa_id'),
		);

		$wizards = dbx::queryAll("select * from atoms where a_del='N' and a_type='WIZARD'");
		foreach ($wizards as $w)
		{
			$a_id	= $w['a_id'];
			$table 	= xredaktor_wizards::genWizardTableNameBy_a_id($a_id);
			if (!dbx::tablePresent($table)) continue;
			$actions[] = array('table'=>$table, 'field'=>'wz_tm_id', 'after'=>'wz_online');
		}

		foreach ($actions as $a)
		{
			$table = $a['table'];
			$field = $a['field'];
			$after = $a['after'];

			if (!dbx::tablePresent($table)) continue;
			if (!dbx::attributePresent($table,$field))
			{
				$sql = "ALTER TABLE `$table` ADD `$field` INT NOT NULL AFTER `$after`";
			} else {
				$sql = "ALTER TABLE `$table` CHANGE `$field` `$field` INT NOT NULL";
			}

			dbx::query($sql);
		}

	}


	public static function lang_fix()
	{

		$langs = dbx::queryAll("select bel_ISO as ISO from be_language UNION select fel_ISO as ISO from fe_language");
		if ($langs === false) $langs = array();

		/********************************************************************/
		/**********************    ALTER THE TABLES  ************************/
		/********************************************************************/

		$alterCmds = array(
		//               ATOMS
		array(
		'after'			=> 'a_name',
		'table'			=> 'atoms',
		'change' 		=> 'a_name_',
		'type'			=> 'TINYTEXT'
		),
		//               ATOMS-SETTINGS
		array(
		'after'			=> 'as_name',
		'table'			=> 'atoms_settings',
		'change' 		=> 'as_name_',
		'type'			=> 'TINYTEXT'
		),
		//               BE-TAGS
		array(
		'after'			=> 'bet_tag',
		'table'			=> 'be_tags',
		'change' 		=> 'bet_t_',
		'type'			=> 'TINYTEXT'
		),
		//               FE-TAGS
		array(
		'after'			=> 'fet_tag',
		'table'			=> 'fe_tags',
		'change' 		=> 'fet_t_',
		'type'			=> 'TINYTEXT'
		),
		//               PAGE - NICE
		array(
		'after'			=> 'p_nice',
		'table'			=> 'pages',
		'change' 		=> 'p_nice_',
		'type'			=> 'TINYTEXT'
		),
		//               PAGE - NAME
		array(
		'after'			=> 'p_name',
		'table'			=> 'pages',
		'change' 		=> 'p_name_',
		'type'			=> 'TINYTEXT'
		),

		//               PAGE - ONLINE
		array(
		'after'			=> 'p_isOnline',
		'table'			=> 'pages',
		'change' 		=> 'p_online_',
		'type'			=> "enum('N', 'Y')",
		'default'		=> "DEFAULT  'Y'"

		),
		//               PAGE - MENU
		array(
		'after'			=> 'p_inMenue',
		'table'			=> 'pages',
		'change' 		=> 'p_menu_',
		'type'			=> "enum('N', 'Y')",
		'default'		=> "DEFAULT  'Y'"
		),
		//               STORAGE
		array(
		'after'			=> 's_name',
		'table'			=> 'storage',
		'change' 		=> 's_name_',
		'type'			=> 'TINYTEXT'
		),
		//               STORAGEGROUP
		array(
		'after'			=> 'sg_name',
		'table'			=> 'storage_groups',
		'change' 		=> 'sg_name_',
		'type'			=> 'TINYTEXT'
		),

		);

		foreach ($alterCmds as $sett)
		{

			$after  	= $sett['after'];
			$table  	= $sett['table'];
			$type		= $sett['type'];
			$change		= $sett['change'];
			$default	= $sett['default'];


			foreach ($langs as $lang)
			{
				$iso 		= strtolower($lang['ISO']);
				$newAttrib 	= $change.$iso;

				if (!dbx::attributePresent($table,$newAttrib))
				{
					$sql = "ALTER TABLE  `$table` ADD  `$newAttrib` $type NOT NULL $default AFTER `$after` ";
					echo $sql."<br>\n";
					dbx::query($sql);
				} else
				{
					$sql = "ALTER TABLE  `$table` CHANGE  `$newAttrib` `$newAttrib` $type NOT NULL $default AFTER `$after` ";
					echo $sql."<br>\n";
					dbx::query($sql);
				}

			}
		}

		/*

		****************** NON MULTIS

		*/

		$fields2kick 	= array(

		// TIMEMACHINE
		array(
		'field'			=> 'p_tm_id',
		'table'			=> 'pages',
		),
		array(
		'field'			=> 'p_forAdminOnly',
		'table'			=> 'pages',
		),

		);

		foreach ($fields2kick as $sett)
		{
			$field	= $sett['field'];
			$table	= $sett['table'];
			if (dbx::attributePresent($table,$field))
			{
				$sql = "ALTER TABLE  `$table` DROP `$field`";
				echo $sql."<br>\n";
				dbx::query($sql);
			}

		}

		$fields2check	= array(

		// PAGES
		array(
		'after'			=> 'p_id',
		'table'			=> 'pages',
		'change' 		=> 'p_full_cache',
		'type'			=> "enum('N', 'Y')",
		'default'		=> "DEFAULT  'N'"
		),

		array(
		'after'			=> 'p_id',
		'table'			=> 'pages',
		'change' 		=> 'p_sseo',
		'type'			=> "MEDIUMTEXT"
		),

		array(
		'after'			=> 'p_sseo',
		'table'			=> 'pages',
		'change' 		=> 'p_sseo_link',
		'type'			=> "TINYTEXT"
		),


		// GOTO LINKS
		array(
		'after'			=> 'p_id',
		'table'			=> 'pages',
		'change' 		=> 'p_goto_link',
		'type'			=> "TEXT"
		),

		array(
		'after'			=> 'p_id',
		'table'			=> 'pages',
		'change' 		=> 'p_goto_active',
		'type'			=> "enum('N', 'Y')",
		'default'		=> "DEFAULT  'N'"
		),

		// SITEMAP
		array(
		'after'			=> 'p_id',
		'table'			=> 'pages',
		'change' 		=> 'p_goto_link',
		'type'			=> "TEXT"
		),


		// ATOMS
		array(
		'after'			=> 'a_id',
		'table'			=> 'atoms',
		'change' 		=> 'a_db_name',
		'type'			=> 'TINYTEXT'
		),


		);

		foreach ($fields2check as $sett)
		{

			$after  	= $sett['after'];
			$table  	= $sett['table'];
			$type		= $sett['type'];
			$newAttrib	= $sett['change'];
			$default	= $sett['default'];

			if (!dbx::attributePresent($table,$newAttrib))
			{
				$sql = "ALTER TABLE  `$table` ADD  `$newAttrib` $type NOT NULL $default AFTER `$after` ";
				echo $sql."<br>\n";
				dbx::query($sql);
			} else
			{
				$sql = "ALTER TABLE  `$table` CHANGE  `$newAttrib` `$newAttrib` $type NOT NULL $default AFTER `$after` ";
				echo $sql."<br>\n";
				dbx::query($sql);
			}
		}


		$wizards = dbx::queryAll("select * from atoms where a_del='N' and a_type='WIZARD'");
		foreach ($wizards as $w) {

			$a_id = intval($w['a_id']);
			$es = json_decode($w['a_wizardSettings'],true);
			if ($es['es_databaseTableName'] != '')
			{
				dbx::update('atoms',array('a_db_name'=>$es['es_databaseTableName']),array('a_id'=>intval($a_id)));
			}

		}


		return true;
	}


}
