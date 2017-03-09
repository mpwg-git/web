<?php /* Smarty version Smarty-3.0.7, created on 2017-03-01 12:27:15
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejTOQ5W" */ ?>
<?php /*%%SmartyHeaderCode:9465282258b6b01307e593-71181557%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87156d117d427d94dd40c3d100ba7d112a043340' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejTOQ5W',
      1 => 1488367635,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9465282258b6b01307e593-71181557',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_fragebogen::sc_getInitFragen",'var'=>"fragen"),$_smarty_tpl);?>


<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fragen')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    <div class="fragen-container">
        <div class="row no-gutter">
            <div class="col-xs-12">
                <h4 class="frage-headline"><?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_id'];?>
. <?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_FRAGE'];?>
</h4>
                <hr>
            </div>
        </div>
        
    <?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['v']->value['OPTIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['o']->key;
?>
        <div class="row no-gutter">
            <div class="col-xs-12 antwort-value">
                <div class="radio radio-inline">
                    <label for="frage_1"><input type="radio" name="frage_1"></label>
                    <label for="frage_1"><input type="radio" name="frage_1"></label>
                    <label for="frage_1"><input type="radio" name="frage_1"></label>
                    <label for="frage_1"><input type="radio" name="frage_1"></label>
                    <label for="frage_1"><input type="radio" name="frage_1"></label>
                </div>
            </div>
            <div class="col-xs-5 text-right antwort-left">
                <h5 class="antwort-headline"><?php echo $_smarty_tpl->tpl_vars['o']->value['wz_TEXTHEADER_LEFT'];?>
</h5>
                <p><?php echo $_smarty_tpl->tpl_vars['o']->value['wz_TEXT_LEFT'];?>
</p>
            </div>
            <div class="col-xs-2 text-center"></div>
            <div class="col-xs-5 text-left antwort-right">
                <h5 class="antwort-headline"><?php echo $_smarty_tpl->tpl_vars['o']->value['wz_TEXTHEADER_RIGHT'];?>
</h5>
                <p><?php echo $_smarty_tpl->tpl_vars['o']->value['wz_TEXT_RIGHT'];?>
</p>
            </div>
        </div>
        <div class="col-xs-12" style="text-align: center;">
            <input type="checkbox" data-toggle="toggle" data-on="SUPER WICHTIG" data-off="WENIG WICHTIG">
        </div>
    <?php }} ?>
    </div>
<?php }} ?>
<div class="text-center">
    <button type="button" id="fragebogen-save" class="btn start-button text-uppercase save-fragebogen"><?php echo smarty_function_xr_translate(array('tag'=>'Speichern'),$_smarty_tpl);?>
</button>
</div>
