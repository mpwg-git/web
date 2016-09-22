<?
require_once(dirname(__FILE__).'/_includes.php');
require_once(dirname(__FILE__).'/../xgo/xplugs/_includes.php');


$res = fe_matching::matchUser2Room(1,223,false,true);


die(" ".print_r($res));
