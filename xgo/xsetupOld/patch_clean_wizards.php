<?

require_once(dirname(__FILE__).'/../xcore/xcore.php');
require_once(dirname(__FILE__).'/../xplugs/xredaktor/_includes.php');
require_once(dirname(__FILE__).'/patch/patch_util.php');

$wizards_deleted = dbx::queryAll("select * from atoms where a_del = 'Y' and a_type = 'WIZARD'");
if ($wizards_deleted === false) $wizards_deleted = array();


foreach ($wizards_deleted as $wzd)
{

	$a_id 		= intval($wzd['a_id']);
	echo "[$a_id]\n";
	if ($a_id == 0) continue;

	$tablename 	= xredaktor_wizards::genWizardTableNameBy_a_id($a_id);

	$kick_tables = array();

	$kick_tables[] = $tablename;
	$kick_tables[] = $tablename.'_published';
	$kick_tables[] = $tablename.'_versioning';

	foreach ($kick_tables as $kt)
	{
		echo "$kt\n";
		dbx::query("DROP TABLE IF EXISTS $kt;");
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
			echo "$t\n";
			dbx::query("DROP TABLE IF EXISTS $t;");
		}
	}
}

die("END\n");
