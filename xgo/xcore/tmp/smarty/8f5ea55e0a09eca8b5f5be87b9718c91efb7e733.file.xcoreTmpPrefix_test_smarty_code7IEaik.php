<?php /* Smarty version Smarty-3.0.7, created on 2016-08-17 15:53:11
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7IEaik" */ ?>
<?php /*%%SmartyHeaderCode:179516425357b46c4777c7f1-48532686%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8f5ea55e0a09eca8b5f5be87b9718c91efb7e733' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7IEaik',
      1 => 1471441991,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179516425357b46c4777c7f1-48532686',
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