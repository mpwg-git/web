<?
/*
 * 		HERSTELLEN PRE STEP 1
 * 		
 *		1.) CREATING mysqldump from wsfbeta & mpwg-pre
 * 		2.) RSYNC /web BETA > PRE
 * 		3.) IMPORT mysql MPWG-PRE < WSFBETA
 * 		4.) FIX storage s_onDisk
 */
require_once (dirname(__FILE__) . '/../_includes.php');


class import_wsfbeta
{

	public static function dumpWsfbeta(){
		
		$beta 	= "wsfbeta__".date('d-m-Y').".sql";
		$pre 	= "pre_".date('d-m-Y').".sql";
	
		$out = array();
		exec("mysqldump --user=wsfbeta --password=E2TmPrjWbchy7BUY --host=127.0.0.1 wsfbeta > /web/datamigration/rollout/files/dumpfiles/$beta",$out);
		print_r($out);
		
		$out = array();
		exec("mysqldump --user=mpwg-pre --password=KKDZLDjB8e93EmPA --host=127.0.0.1 mpwg-pre > /web/datamigration/rollout/files/dumpfiles/$pre",$out);
		print_r($out);
		
		echo "DUMP FILES CREATED\n";
		
		
		/*   RSYNC -> BETA  >>>  PRE    */
		
		echo "NEXT STEP = RSYNC BETA > PRE\n\n";
		echo "RSYNC with following command: \n";
		die("rsync --delete -n -avzbe ssh --exclude=.* --exclude=datamigration/ --exclude=xgo/ wsfbeta@beta.meineperfektewg.com:/web/ /web --backup-dir=/web/datamigration/rollout/files/rsync_bkup --stats --progress \n\n");	
	}
	
	
	public static function importWsfbeta(){
			
		$out = array();
		exec("mysql --user=mpwg-pre --password=KKDZLDjB8e93EmPA --host=127.0.0.1 mpwg-pre < /web/datamigration/rollout/files/dumpfiles/beta_dump.sql");
		print_r($out);
		
		echo "IMPORT wsfbeta > mpwg-pre DONE\n\n"; 
	}
	
	
	public static function fixStorage() {
		
		dbx::query("UPDATE storage SET s_onDisk = REPLACE(s_onDisk, '/srv/gitgo_daten/www/wsfbeta.xgodev.com/', '/srv/gitgo_daten/www/pre.meineperfektewg.com/')");
	
		echo "STORAGE fixed \n\n";
	}	
}


$t = time();


import_wsfbeta::dumpWsfbeta();
//RSYNC BETA > PRE --> rsync --delete -n -avzbe ssh --exclude=.* --exclude=rollout/ --exclude=xgo/ wsfbeta@beta.meineperfektewg.com:/web/ /web --backup-dir=/web/datamigration/rollout/files/rsync_bkup --stats --progress
import_wsfbeta::importWsfbeta();
import_wsfbeta::fixStorage();

echo "\n\nTotal Seconds: ".(time()-$t)."\n\n";



