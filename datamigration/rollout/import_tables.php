<?

//	707, 767, 768		USER
//	712					SPRACHEN
//	713, 714			NEWSLETTER
//	715					ANREDEN
//	716					LÄNDER
//	717, 718			PROFIL
//	719					MITGLIEDSCHAFTEN
//	754, 755			WG-TEST/FRAGEN
//	756					WG TEST 2 USER
//	771, 773, 			MATCHING Settings,Results,Texte,Kat.
//	800, 801			CHAT / HIDDEN CONVERSATIONS
//	809, 846, 847, 858	ROOM, Fav., Blocks, Copy Rooms
//	810					BILDER ROOMS
//	822					INVITES
//	830					FAQs
//	834, 882			BLOG, KAT.
//	839					IMPRESSUM
//	840					AGB
//	844, 845, 853		MATCHING RESULTS ROOM, MATCHING to-do; MATCHING ROOM to-do
//	860					KALT_LOGS
//	861					LOGIN COOKIES
//	893					STARTSEITE AUSSAGEN
//	907, 911			PRESSE, KAT.



require_once (dirname(__FILE__) . '/../_includes.php');


$data = array
(
	"chatitems",
	"countrylist",
	"cronjobs",
	"domains",
	"faces",
	"fe_language",
	"fe_tags",
	"forms",
	"forms_actions_mails",
	"forms_atoms_settings",
	"forms_mappings",
	"forms_settings",
	"image_profiles",
	"open_graph_object_types",
	"pages",
	"pages_niceurls",
	"pages_niceurls_match",
	"pages_niceurls_rel",
	"pages_settings_atoms",
	"qmail",
	"roles",
	"roles_settings",
	"roles_tags",
	"roles_tags_roles",
	"roles_tags_user",
	"roles_user",
	"sites",
	"sites_be_languages",
	"sites_faces",
	"sites_fe_languages",
	"timemachine",
	"wizards",
	"wizard_auto_539",
	"wizard_auto_540",
	"wizard_auto_541",
	"wizard_auto_543",
	"wizard_auto_544",
	"wizard_auto_545",
	"wizard_auto_547",
	"wizard_auto_554",
	"wizard_auto_555",
	"wizard_auto_605",
	"wizard_auto_612",
	"wizard_auto_707",
	"wizard_auto_767",
	"wizard_auto_768",
	"wizard_auto_712",
	"wizard_auto_713",
	"wizard_auto_714",
	"wizard_auto_715",
	"wizard_auto_716",
	"wizard_auto_717",
	"wizard_auto_718",
	"wizard_auto_719",
	"wizard_auto_720",
	"wizard_auto_754",
	"wizard_auto_755",
	"wizard_auto_756",
	"wizard_auto_765",
	"wizard_auto_771",
	"wizard_auto_772",
	"wizard_auto_773",
	"wizard_auto_775",
	"wizard_auto_776",
	"wizard_auto_801",
	"wizard_auto_809",
	"wizard_auto_846",
	"wizard_auto_847",
	"wizard_auto_858",
	"wizard_auto_810",
	"wizard_auto_822",
	"wizard_auto_830",
	"wizard_auto_834",
	"wizard_auto_882",
	"wizard_auto_839",
	"wizard_auto_840",
	"wizard_auto_844",
	"wizard_auto_845",
	"wizard_auto_853",
	"wizard_auto_860",
	"wizard_auto_861",
	"wizard_auto_893",
	"wizard_auto_SIMPLE_W2W_707_712",
	"wizard_auto_SIMPLE_W2W_707_809",
	"wizard_auto_SIMPLE_W2W_712_717",
	"wizard_auto_SIMPLE_W2W_712_718",
	"wizard_auto_SIMPLE_W2W_834_882",
	"wizard_container_of_FILES_1409",
	"wizard_container_of_FILES_1463",
	"wizard_container_of_FILES_1788",
	"wizard_container_of_FILES_1807",
	"wizard_container_of_FILES_1904",
	"wizard_container_of_FILES_1980",
	"wizard_container_of_FILES_1993",
	"wizard_container_of_FILES_2157",
	"wizard_relations"
);

//echo count($data);
//die("COUNT");



$list = array();

foreach ($data as $key => $values) {
	$list[] = trim($values);
}

$count = count($list);
foreach ($list as $key) {

	$table = $key;
	$attrs = dbx::getAllAttributes($table);
	$fields = array();

	foreach ($attrs as $key => $value) {
		$fields[] = trim($value['Field']);
	}

	$fieldsStr = implode(',', $fields);
	//$fieldsStr_live = dbx::query("SELECT $fieldsStr FROM wsfdev.$table");

	dbx::query("TRUNCATE $table");
	dbx::query("INSERT INTO $table ($fieldsStr) SELECT $fieldsStr FROM wsfdev.$table");

	//TODO: ALTER TABLE if FIELD !exists
}

/*
function copyFile($s_id)
{
	$s_id = intval($s_id);

	// helper tabelle, live id, locale

	//$live_id = dbx::query("select s_id from wsfdev.storage where s_del = 'N' ");
	//$locale_id = dbx::query("select s_id from storage where s_del = 'N' ");

	//$helperTable = array();


	$present = dbx::query("select * from staging_files where sf_live_s_id = $s_id");


	if ($present === false)
	{

		$filename_live = dbx::queryAttribute("select s_onDisk from storage where s_id = $s_id","s_onDisk");
		if (!is_file($filename_live)) return false;


		// copy from live 2 pre echte file
		$filename_pre = str_replace('pre.meineperfektewg.com','wsfdev.xgodev.com',$filename_live);
		$filename_pre = dirname($filename_pre).'/copyby_import_'.basename($filename_pre);

		copy($filename_live,$filename_pre);

		$s_id_new = xredaktor_storage::registerExistingFile(0,$filename_pre);

		$new_s_id = dbx::insert('staging_files',array('sf_live_s_id'=>$s_id,'sf_pre_s_id'=>$s_id_new));

		return $new_s_id;

	}
	return intval($present['sf_pre_s_id']);
}
*/



function fixFiles($a_id)
{

	$table = xredaktor_wizards::genWizardTableNameBy_a_id($a_id);
	$files = dbx::queryAll("select * from atoms_settings where as_a_id = $a_id and as_del='N' and as_type='FILE'");
	if ($files === false) return false;


	$file_fields 			= array();
	foreach ($files as $f)
	{
		$file_fields[] 				= "wz_".$f['as_name']; // TABLE ATTRIBUTE NAME
	}

	$file_fields_sql 		= implode(",",$file_fields);
	$records = dbx::queryAll("select wz_id,$file_fields_sql from $table",false); // auch gelöschte
	if ($records === false) return false;


	$db_live 	= "wsfdev";
	$db_pre		= "mpwg-pre";

	foreach ($records as $i => $r)
	{
		$wz_id = intval($r['wz_id']);
		if ($wz_id == 0) continue;

		foreach ($file_fields as $f)
		{
			$s_id = intval($r[$f]);
			if ($s_id == 0) continue;

			echo ("Check File: $s_id\n");

			$file_live 	= dbx::queryAttribute("select s_onDisk from `$db_live`.storage where s_id = $s_id","s_onDisk");
			$file_pre 	= dbx::queryAttribute("select s_onDisk from `$db_pre`.storage  where s_id = $s_id","s_onDisk");

			$destFile 	= str_replace('/srv/gitgo_daten/www/wsfdev.xgodev.com/web/','/srv/gitgo_daten/www/pre.meineperfektewg.com/web/',$file_live);

			$md5_live 	= false;
			$md5_pre	= false;


			/*

			WIR HABEN JA SCHON MAL GEPACHED

			*/

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
				$md5_live 	= md5($content);
			}

			if (file_exists($file_pre))
			{
				$md5_pre 	= md5_file($file_pre);
			}

			if ($md5_live != $md5_pre)
			{
				$test_live 	= str_replace('/srv/gitgo_daten/www/wsfdev.xgodev.com/web/',		'http://www.meineperfektewg.com/',$file_live);
				$test_pre 	= str_replace('/srv/gitgo_daten/www/pre.meineperfektewg.com/web/',	'http://pre.meineperfektewg.com/',$file_pre);
				$destDir 	= dirname($destFile);
				$cmd = "mkdir -p '".str_replace("'","\\'",$destDir)."'";
				//echo "$cmd\n"; 
				exec($cmd);
				//echo "DONE\n"; 
				hdx::fwrite($destFile,$content);
				$s_id_new = xredaktor_storage::registerExistingFile(1,$destFile);
				dbx::update($table,array($f=>$s_id_new),array('wz_id'=>$wz_id));
				echo "UP_DB [$f] ($wz_id) -> $s_id_new\n"; 
			}

		}

	}

	return true;
}

fixFiles(707);		// USERS
//fixFiles(720);	// BILDER
fixFiles(809);		// ROOMS
//fixFiles(810);	// Bilder ROOMS


die("ENDE");







/* Tables offen bzw. nicht für Import!?
*

assets_compressed
atoms
atoms_backup_test
atoms_history
atoms_settings
be_language
be_tags
be_users
be_users_history
css_less
css_less_history
storage
storage_defect_images
storage_groups
sys_tags
test
xcore_internal_reporting
xgo_version_info
xm_be_logs
xm_cronjobs
xm_cronjobs_logs
xm_cronjobs_slots
xm_emissions
xm_emissions_lists
xm_emissions_senders
xm_lists
xm_lists_import
xm_lists_remote
xm_recipients
xm_recipients2lists
xm_recipients_history
xm_send_connectors
xm_send_connectors_bounces
xm_send_connectors_popping
xm_send_queue
xm_tracking_clicks
xm_tracking_links
xm_tracking_opening_rates
xm_tracking_unsubscription
xr_state_provider
xtypes_defaults
xtypes_wizard_1_n

*/

