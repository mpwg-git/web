<?php
function smarty_modifier_xr_parseDate($string,$cfg)
{
	if (xredaktor_core::isCodeTesting()) return;
	
	if (strpos($string,"/")!==false)
	{
		list($_m,$_d,$_y) = explode("/",$string);
	} else
	{
		list($_d,$_m,$_y) = explode(".",$string);
	}

	$dateFinal = mktime(0,0,0,$_m,$_d,$_y);
	$txt = date($cfg,$dateFinal);

	return $txt;
}

