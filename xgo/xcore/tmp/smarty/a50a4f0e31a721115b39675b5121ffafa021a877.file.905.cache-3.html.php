<?php /* Smarty version Smarty-3.0.7, created on 2016-06-17 18:27:40
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/905.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:459191934576424fcd5fa09-23869445%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a50a4f0e31a721115b39675b5121ffafa021a877' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/905.cache-3.html',
      1 => 1466180860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '459191934576424fcd5fa09-23869445',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?>
<div class="all-rows-container-top">
    <div class="all-rows-container clearfix">
        <div class="left-row <?php echo $_smarty_tpl->getVariable('DESKTOP_EXTRACLASS_LEFT')->value;?>
 mCustomScrollbar">
            <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('DESKTOP_LEFTROW')->value,'return'=>1),$_smarty_tpl);?>

        </div>
        
       
        <div class="middle-row<?php if ($_smarty_tpl->getVariable('P_ID')->value!=1){?> darkgrey<?php }?> <?php echo $_smarty_tpl->getVariable('DESKTOP_EXTRACLASS_MIDDLE')->value;?>
 mCustomScrollbar">
       
            <div class="scrollbarfixx">
                <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('DESKTOP_MIDDLEROW')->value,'return'=>1),$_smarty_tpl);?>

            </div>
        </div>
        <div class="right-row <?php echo $_smarty_tpl->getVariable('DESKTOP_EXTRACLASS_RIGHT')->value;?>
 mCustomScrollbar">
            <div class="content">
                
                <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->getVariable('DESKTOP_RIGHTROW')->value,'extraParams'=>$_smarty_tpl->getVariable('DESKTOP_RIGHTROW_PARAMS')->value,'return'=>1),$_smarty_tpl);?>

                
                <?php echo smarty_function_xr_atom(array('a_id'=>643,'return'=>1),$_smarty_tpl);?>

                
            </div>
        </div>
    </div>
</div>