<?
require_once(dirname(__FILE__).'/../_includes.php');

function smarty_modifier_xr_chars($string)
{
		if (!templatex::arePluginsEnabled()) return false;
	return xredaktor_render::xr_chars($string);
}

