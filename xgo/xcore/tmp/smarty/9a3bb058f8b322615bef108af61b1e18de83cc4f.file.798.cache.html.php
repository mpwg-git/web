<?php /* Smarty version Smarty-3.0.7, created on 2016-02-10 06:31:16
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/798.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:64250932056bacb24279b73-28776515%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a3bb058f8b322615bef108af61b1e18de83cc4f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/798.cache.html',
      1 => 1451984363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64250932056bacb24279b73-28776515',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_wz_fetch(array('id'=>830,'wz_online'=>'Y','var'=>'data'),$_smarty_tpl);?>


<div class="worumgehts default-container-padding">
    
    <h1><?php echo smarty_function_xr_translate(array('tag'=>"FAQ"),$_smarty_tpl);?>
</h1>
    
    <p class="text">
       <?php echo smarty_function_xr_translate(array('tag'=>"Wenn Sie nicht weiter wissen?"),$_smarty_tpl);?>

    </p>
    
         
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    
       <?php echo smarty_function_xr_atom(array('a_id'=>831,'faq'=>$_smarty_tpl->tpl_vars['v']->value,'return'=>1),$_smarty_tpl);?>

    
    <?php }} ?>
    
    
</div>