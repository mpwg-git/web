<?
function smarty_modifier_xr_rot13($string)
{ 
	if (!templatex::arePluginsEnabled()) return false;
    return str_rot13 ($string);
} 
 