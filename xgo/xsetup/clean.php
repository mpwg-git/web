<?

die();

echo "<h1>xGo-Cleaning ...</h1>";
require_once(dirname(__FILE__).'/../xcore/xcore.php');
require_once(dirname(__FILE__).'/../xplugs/xredaktor/_includes.php');

// DAS MUSS ALS ERSTES LAUFEN, DAMIT DB SAFE iST !
//require_once(dirname(__FILE__).'/patch_clean_db.php');

unlink(Ixcore::htdocsRoot .'/xgo/xcore/logs/dbx.log');
unlink(Ixcore::htdocsRoot .'/xgo/xcore/logs/mailx.log');
unlink(Ixcore::htdocsRoot .'/xgo/xcore/logs/secx.log');

$storageGroups = dbx::queryAll("select * from storage_groups");
foreach ($storageGroups as $sg)
{
	$sg_name = trim($sg['sg_name']);
	if ($sg_name == "") continue;

	$dir = Ixcore::htdocsRoot . '/' . $sg_name;
	if (is_dir($dir))
	{
		system("rm -R $dir");
	}

	mkdir($dir);
	mkdir($dir.'/_cache');
	mkdir($dir.'/_deleted');
}


/// ASSSETS 

$dir = Ixcore::htdocsRoot . '/assets';
if (is_dir($dir))
{
	system("rm -R $dir");
}

mkdir($dir);
mkdir($dir.'/codeless');
mkdir($dir.'/compressed');
mkdir($dir.'/jscompressed');
mkdir($dir.'/mwlc');
mkdir($dir.'/uncompressed');


//////////////////////////////


dbx::query("DELETE FROM `atoms_settings` WHERE as_a_id NOT IN (select a_id from atoms)");
dbx::query("DELETE FROM `atoms_settings` WHERE as_del = 'Y'");
dbx::query("DELETE FROM `atoms` WHERE a_del = 'Y'");

$wizards = dbx::queryAll("select * from atoms where a_type='WIZARD' and a_s_id != 0");

foreach ($wizards as $w)
{
	$a_id = intval($w['a_id']);
	$table = xredaktor_wizards::genWizardTableNameBy_a_id($a_id);
	dbx::query("DROP TABLE IF EXISTS $table;");
}

$doIt = array(
"SHOW TABLES like 'wizard_auto_%' ",
"SHOW TABLES like 'wizard_container_of_FILES_%' ",
);

foreach ($doIt as $sql)
{
	$d = dbx::queryAll($sql);
	foreach ($d as $balbal => $tables)
	{
		foreach ($tables as $xxx => $table)
		{
			dbx::query("DROP TABLE IF EXISTS $table;");
		}
	}
}

$sqls = array(

'truncate open_graph_object_types;',
'truncate xtypes_wizard_1_n;',
'truncate image_profiles;',
'truncate qmail;',
'truncate forms;',
'truncate forms_actions_mails;',
'truncate pages_niceurls;',
'truncate pages_not_found;',
'truncate xr_state_provider;',
'truncate pages_settings_atoms_history;',
'truncate css_less;',
'truncate atoms_history;',
'truncate assets_compressed;',
'truncate storage;',
'truncate pages;',
'truncate pages_niceurls_match;',
'truncate pages_settings_atoms;',
//'truncate be_users2groups;',
//'truncate be_users_groups;',
'truncate be_users_history;',
'truncate domains;',
'truncate faces;',
'truncate fe_tags;',
//'truncate fe_users_config;',
'truncate roles;',
'truncate roles_settings;',
'truncate roles_tags_user;',
'truncate roles_user;',
'truncate sites;',
'truncate sites_be_languages;',
'truncate sites_faces;',
'truncate sites_fe_languages;',
'truncate sys_tags;',
'truncate timemachine;',
'truncate xcore_internal_reporting;',
'truncate xgo_version_info;',
'truncate xgo_version_info;',

'TRUNCATE `xm_be_logs`;',
'TRUNCATE `xm_cronjobs`;',
'TRUNCATE `xm_cronjobs_logs`;',
'TRUNCATE `xm_cronjobs_slots`;',
'TRUNCATE `xm_emissions`;',
'TRUNCATE `xm_emissions_lists`;',
'TRUNCATE `xm_emissions_senders`;',
'TRUNCATE `xm_lists`;',
'TRUNCATE `xm_lists_import`;',
'TRUNCATE `xm_lists_remote`;',
'TRUNCATE `xm_recipients`;',
'TRUNCATE `xm_recipients2lists`;',
'TRUNCATE `xm_recipients_history`;',
'TRUNCATE `xm_send_connectors`;',
'TRUNCATE `xm_send_connectors_bounces`;',
'TRUNCATE `xm_send_connectors_popping`;',
'TRUNCATE `xm_send_queue`;',
'TRUNCATE `xm_tracking_clicks`;',
'TRUNCATE `xm_tracking_links`;',
'TRUNCATE `xm_tracking_opening_rates`;',
'TRUNCATE `xm_tracking_unsubscription`;',

'TRUNCATE `atoms_history`;',

'truncate pages_settings_atoms;',
'delete from be_users where wz_id >1;',

'drop table  if exists frontcontrollers;',
'drop table  if exists controllers;',
'drop table  if exists storage_diff;',
'drop table  if exists storage_metacomments;',
'drop table  if exists storage_niceurls;',
'drop table  if exists storage_usage;',
'drop table  if exists pages_history;',

'delete FROM `atoms_settings` WHERE `as_a_id` IN ( select a_id from atoms where a_s_id != 0)',
'delete FROM `atoms` WHERE  a_s_id != 0',

);

foreach ($sqls as $sql)
{
	echo "$sql...<br>";
	dbx::query($sql);
}

xcore::flushTemp();
xredaktor_core::flushTemp();

