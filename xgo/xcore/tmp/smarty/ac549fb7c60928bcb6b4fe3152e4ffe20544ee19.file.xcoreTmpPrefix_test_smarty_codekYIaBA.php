<?php /* Smarty version Smarty-3.0.7, created on 2016-08-17 16:15:23
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekYIaBA" */ ?>
<?php /*%%SmartyHeaderCode:159332374057b4717bb1dd36-11502245%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac549fb7c60928bcb6b4fe3152e4ffe20544ee19' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekYIaBA',
      1 => 1471443323,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159332374057b4717bb1dd36-11502245',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_wz_fetch(array('id'=>911,'var'=>'kategorien'),$_smarty_tpl);?>



<span class="looklikeh1">
    Pressebereich
</span>
<form id="presse-kategorie" class="presse-kategorie-form">
    <ul class="presse-cat-list">
        <li>
            <input id="presse-kategorie-all" type="checkbox"/>
            <div class="fake-checkbox"></div>
            <label for="presse-kategorie-all"><?php echo smarty_function_xr_translate(array('tag'=>"Alle Kategorien"),$_smarty_tpl);?>
</label>    
        </li>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('kategorien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <li>
                <input id="presse-kategorie-<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
" class="presse-menu-input" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
" name="pressecat-<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
"/>
                <div class="fake-checkbox"></div>
                <label for="presse-kategorie-<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_KATEGORIE'];?>
</label>                
            </li>
        <?php }} ?>
    </ul>
</form>
<div id="presse-page" class="presse-page default-container-paddingtop">
	<h1>Presse-Page</h1>
</div>