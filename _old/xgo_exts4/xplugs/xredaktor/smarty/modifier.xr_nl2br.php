<?php
/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage PluginsModifier
 */

/**
 * Smarty capitalize modifier plugin
 * 
 * Type:     modifier<br>
 * Name:     capitalize<br>
 * Purpose:  capitalize words in the string
 * 
 * @link 
 * @author Monte Ohrt <monte at ohrt dot com> 
 * @param string $ 
 * @return string 
 */
function smarty_modifier_xr_nl2br($string)
{ 
    return nl2br($string);
} 

