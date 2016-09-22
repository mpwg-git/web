<?

die("INVALID CALL");

echo "<h1>xGo-Cleaning ...</h1>";
require_once(dirname(__FILE__).'/../xcore/xcore.php');


$sqls = array(

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