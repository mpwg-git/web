<?php
function smarty_modifier_xr_patch4newsletter($string, $search, $replace)
{
	if (!templatex::arePluginsEnabled()) return false;
	return str_replace($search,$replace,$string);
}

