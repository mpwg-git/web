<?php /* Smarty version Smarty-3.0.7, created on 2017-02-28 15:38:18
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codedqpiHB" */ ?>
<?php /*%%SmartyHeaderCode:93283268558b58b5a780656-00145625%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91d46ec4d180f64b8cab988b99d90999281b302e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codedqpiHB',
      1 => 1488292698,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93283268558b58b5a780656-00145625',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
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
. <?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['_DE_wz_FRAGE'];?>
</h4>
                <hr>
            </div>
            <div class="col-xs-12 antwort-value">
                <div class="radio radio-inline">
                    <label for="frage_1"><input type="radio" name="frage_1"></label>
                    <label for="frage_1"><input type="radio" name="frage_1"></label>
                    <label for="frage_1"><input type="radio" name="frage_1"></label>
                    <label for="frage_1"><input type="radio" name="frage_1"></label>
                    <label for="frage_1"><input type="radio" name="frage_1"></label>
                </div>
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
                <div class="col-xs-5 text-right antwort-left">
                    <h5 class="antwort-headline"><?php echo $_smarty_tpl->tpl_vars['o']->value['wz_TEXTHEADER_LEFT'];?>
</h5>
                    <!--<p>Geschirr stapelt sich, Staub sammel sich</p>-->
                </div>
                <div class="col-xs-2 text-center"></div>
                <div class="col-xs-5 text-left antwort-right">
                    <h5 class="antwort-headline"><?php echo $_smarty_tpl->tpl_vars['o']->value['wz_TEXTHEADER_RIGHT'];?>
</h5>
                    <!--<p>Mr. Propper war da, kein Staubkorn in Sicht</p>-->
                </div>
            </div>
            <div class="col-xs-12" style="text-align: center;">
                <input type="checkbox" data-toggle="toggle" data-on="SUPER WICHTIG" data-off="WENIG WICHTIG">
            </div>
        <?php }} ?>
    </div>
<?php }} ?>


