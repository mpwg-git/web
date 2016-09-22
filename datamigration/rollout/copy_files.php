<?
/*
SCRIPT
	--> copy xsite
	--> copy xstorage/templates/js
	--> copy xGo/xplugs/xkalt
	--> delete cache files
	
	(--> copy csvexport)
	(--> copy datamigration)
*/	
	
	
	
/***********************************************************************************************\	
						<!--	import_copyrooms	-->
	
	vor script ausführung ev. schritte vornehmen (sonst ev. keine bilder im xkalt zu rooms):
		
		--> delete cache-files
		--> truncate 858
		--> DELETE * FROM wizard_auto_809 WHERE wz_SOURCE = wg-gesucht

\***********************************************************************************************/

require_once (dirname(__FILE__) . '/../_includes.php');


//ASSETS / CODELESS TEST COPY

$rel_path	= "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/";

$src		= $rel_path . 'assets/codeless/'; 
//$src_scan	= scandir($src);

$dest		= $rel_path . 'assets/codelss/';


echo "SRC: $src";
echo "<br>";
echo count($src_scan);



//str_replace('/srv/gitgo_daten/www/wsfdev.xgodev.com/web/','/srv/gitgo_daten/www/pre.meineperfektewg.com/web/',$file_live);