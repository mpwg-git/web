<?php
function smarty_modifier_xr_patch4newsletter($string, $search, $replace)
{
	return str_replace($search,$replace,$string);
}

