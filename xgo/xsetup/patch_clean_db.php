<?

require_once(dirname(__FILE__).'/../xcore/xcore.php');
require_once(dirname(__FILE__).'/../xplugs/xredaktor/_includes.php');
require_once(dirname(__FILE__).'/patch/patch_util.php');


echo "################################################ DB: ".Ixcore::DB_NAME ."\n\n" ;

$safetyFirst = false;

/*****
*
*	CLEAN OLD STUFF
*	AFTERWARDS
*  PATCH LANG DB SETTINGS like Pages, ...
*  Flush all Wizards, ...
*
*
***/

$wizards_deleted = dbx::queryAll("select * from atoms where a_del = 'Y' and a_type = 'WIZARD'");
if ($wizards_deleted === false) $wizards_deleted = array();


foreach ($wizards_deleted as $wzd)
{

	$a_id 		= intval($wzd['a_id']);
	echo "Check deleted Wizard: [$a_id]\n";
	if ($a_id == 0) continue;

	$tablename 	= xredaktor_wizards::genWizardTableNameBy_a_id($a_id);

	$kick_tables = array();

	$kick_tables[] = $tablename;
	$kick_tables[] = $tablename.'_published';
	$kick_tables[] = $tablename.'_versioning';

	foreach ($kick_tables as $kt)
	{
		if (dbx::tablePresent($kt))
		{
			echo "DROP: $kt\n";
			if (!$safetyFirst)
			{
				dbx::query("DROP TABLE IF EXISTS $kt;");
			}
		}
	}

}


$as_types = array(
'IMG_GALLERY',
'CONTAINER-IMAGES',
'CONTAINER-FILES',
'SIMPLE_W2W',
'UNIQUE_W2W',
);

foreach ($as_types as &$as_type)
{
	$as_type = "'$as_type'";
}

$in = implode(",",$as_types);

$check = dbx::queryAll("select * from atoms_settings,atoms where (a_del = 'Y' OR as_del='Y') and a_type = 'WIZARD' and as_a_id = a_id and as_type IN ($in)");
if ($check === false) $check = array();

foreach ($check as $as)
{

	$as_id = intval($as['as_id']);
	if ($as_id == 0) continue;
	$as_type = $as['as_type'];



	switch ($as_type)
	{
		case 'IMG_GALLERY':
		case 'CONTAINER-IMAGES':
		case 'CONTAINER-FILES':

			$tables = array();
			$tables[] = 'wizard_container_of_FILES_'.$as_id;
			$tables[] = 'wizard_container_of_FILES_'.$as_id.'_published';

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

			$tables = array();
			$tables[] = $tablename;
			$tables[] = $tablename.'_published';

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

			$tablename = $rel['table_name'];
			if ($tablename == '') continue;

			$tables = array();
			$tables[] = $tablename;
			$tables[] = $tablename.'_published';

			break;

		default: continue;
	}



	if (count($tables)>0)
	{
		echo "-------- $as_type | $as_id\n";
		foreach ($tables as $t)
		{
			if (dbx::tablePresent($t))
			{
				echo "DROP: $t\n";

				if (!$safetyFirst)
				{
					dbx::query("DROP TABLE IF EXISTS $t;");
				}
			}
		}
	}
}



if (!$safetyFirst)
{

	$searchers = array(
	'%_published',
	'%_versioning'
	);

	foreach ($searchers as $s)
	{
		$old_crap = dbx::queryAll("SHOW TABLES like '$s' ");
		if ($old_crap === false) $old_crap = array();

		foreach ($old_crap as $d)
		{
			foreach ($d as $balbal => $table)
			{
				dbx::query("DROP TABLE IF EXISTS $table");
			}
		}
	}




	$check = dbx::queryAll("SHOW TABLES like 'wizard_auto_%' ");
	foreach ($check as $d)
	{
		foreach ($d as $balbal => $table)
		{
			//dbx::query("DROP TABLE IF EXISTS $table");
			$wzId = intval(substr($table,strlen('wizard_auto_')));

			if ($wzId > 0)
			{
				$atom = dbx::query("select * from atoms where a_id = $wzId and a_del='N' and a_type = 'WIZARD'");
				if ($atom === false)
				{
					echo "[$table] $wzId --> not found\n";
					dbx::query("DROP TABLE IF EXISTS $table");
				}
				else
				{
					echo "[$table] $wzId --> found\n";
				}
			}
			else
			{

				if (strpos($table,'wizard_auto_UNIQUE_W2W_') !== false)
				{
					$check = substr($table,strlen('wizard_auto_UNIQUE_W2W_'));
					list($as_id,$wz_a,$wz_b) = explode("_",$check);

					$ass 	= dbx::query("select * from atoms_settings,atoms where as_id = $as_id and as_del='N' and a_type = 'WIZARD' and a_del='N' and as_a_id = a_id");
					$z_a 	= dbx::query("select * from atoms where a_id = $wz_a and a_del='N' and a_type = 'WIZARD'");
					$z_b 	= dbx::query("select * from atoms where a_id = $wz_b and a_del='N' and a_type = 'WIZARD'");

					if (($ass===false) || ($z_a===false) || ($z_b===false))
					{
						dbx::query("DROP TABLE IF EXISTS $table");
						echo "UNIQUE W2W: $as_id,$wz_a,$wz_b --> DROP\n";
					} else
					{
						echo "UNIQUE W2W: $as_id,$wz_a,$wz_b --> OK\n";
					}

				}

				if (strpos($table,'wizard_auto_SIMPLE_W2W_') !== false)
				{
					$check = substr($table,strlen('wizard_auto_SIMPLE_W2W_'));
					list($wz_a,$wz_b) = explode("_",$check);

					$z_a = dbx::query("select * from atoms where a_id = $wz_a and a_del='N' and a_type = 'WIZARD'");
					$z_b = dbx::query("select * from atoms where a_id = $wz_b and a_del='N' and a_type = 'WIZARD'");

					if (($z_a===false) || ($z_b===false))
					{
						dbx::query("DROP TABLE IF EXISTS $table");
						echo "SIMPLE W2W: $wz_a,$wz_b --> DROP\n";
					} else
					{
						echo "SIMPLE W2W: $wz_a,$wz_b --> OK\n";
					}

				}

				/*

				wizard_auto_SIMPLE_W2W
				wizard_auto_UNIQUE_W2W

				*/


			}
		}
	}

	$check = dbx::queryAll("SHOW TABLES like 'wizard_container_of_FILES_%' ");
	foreach ($check as $d)
	{
		foreach ($d as $balbal => $table)
		{
			$as_id = intval(substr($table,strlen('wizard_conainer_of_FILES_')));
			if ($as_id > 0)
			{
				echo "CHECK_FILES: $as_id";
			}

		}
	}

	//xredaktor_core::checkFaces();
	//patch_util::lang_fix();
	patch_util::syncWizards();
}

echo "PATCH_CLEAN_DB"; 