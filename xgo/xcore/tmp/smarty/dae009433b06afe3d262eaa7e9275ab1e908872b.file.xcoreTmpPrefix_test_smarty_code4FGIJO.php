<?php /* Smarty version Smarty-3.0.7, created on 2017-03-02 14:01:43
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code4FGIJO" */ ?>
<?php /*%%SmartyHeaderCode:52340205058b817b7132016-84969855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dae009433b06afe3d262eaa7e9275ab1e908872b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code4FGIJO',
      1 => 1488459703,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52340205058b817b7132016-84969855',
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
                <h4 class="frage-headline"><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
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
                    <label for="frage_<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
"><input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
"></label>
                    <label for="frage_<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
"><input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
"></label>
                    <label for="frage_<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
"><input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
"></label>
                    <label for="frage_<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
"><input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
"></label>
                    <label for="frage_<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
"><input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
"></label>
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
            <input type="checkbox" data-toggle="toggle" data-on="<?php echo smarty_function_xr_translate(array('tag'=>'fp_Fragen-wichtig'),$_smarty_tpl);?>
" data-off="<?php echo smarty_function_xr_translate(array('tag'=>'fp_Fragen-unwichtig'),$_smarty_tpl);?>
">
        </div>
    <?php }} ?>
    </div>
<?php }} ?>
<div class="text-center">
    <button type="button" id="fragebogen-save" class="btn start-button text-uppercase save-fragebogen"><?php echo smarty_function_xr_translate(array('tag'=>'Speichern'),$_smarty_tpl);?>
</button>
</div>
