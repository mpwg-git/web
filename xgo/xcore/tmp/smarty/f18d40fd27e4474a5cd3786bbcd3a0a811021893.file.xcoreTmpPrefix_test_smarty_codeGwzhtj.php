<?php /* Smarty version Smarty-3.0.7, created on 2017-03-08 14:27:52
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGwzhtj" */ ?>
<?php /*%%SmartyHeaderCode:201129279158c006d893a339-77120199%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f18d40fd27e4474a5cd3786bbcd3a0a811021893' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGwzhtj',
      1 => 1488979672,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201129279158c006d893a339-77120199',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_fragebogen::sc_getInitFragen",'var'=>"fragen"),$_smarty_tpl);?>


<form method="post" id="register-fragebogen">

    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fragen')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <div class="fragen-container fragenNR_<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
">
            <div class="row no-gutter fragenNR_<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
_headline">
                <div class="col-xs-12">
                    <?php if ($_smarty_tpl->tpl_vars['k']->value<7){?>
                        <h4 class="frage-headline"><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
. <?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?><?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['_DE_wz_FRAGE'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['_EN_wz_FRAGE'];?>
<?php }?></h4>
                    <?php }else{ ?>
                        <h4 class="frage-headline"><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
. <?php if ($_smarty_tpl->getVariable('P_ID')->value==47){?><?php echo smarty_function_xr_translate(array('tag'=>'frage-hl-suchender'),$_smarty_tpl);?>
<?php }?><?php if ($_smarty_tpl->getVariable('P_ID')->value==48){?><?php echo smarty_function_xr_translate(array('tag'=>'frage-hl-anbieter'),$_smarty_tpl);?>
<?php }?></h4>
                    <?php }?>
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
            <div class="row no-gutter fragenNR_<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
_antworten">
                <div class="col-xs-1"></div>
                <div class="col-xs-3 text-right antwort-left">
                    <h5 class="antwort-headline"><?php echo $_smarty_tpl->tpl_vars['o']->value['wz_TEXTHEADER_LEFT'];?>
</h5>
                    <p><?php echo $_smarty_tpl->tpl_vars['o']->value['wz_TEXT_LEFT'];?>
</p>
                </div>
                <div class="col-xs-4 antwort-value">
                    <div class="radio radio-inline">
                        <label for="fragenNR_<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
"><input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
" value="0" data-frage="<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_id'];?>
"></label>
                        <label for="fragenNR_<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
"><input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
" value="1" data-frage="<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_id'];?>
"></label>
                        <label for="fragenNR_<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
"><input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
" value="2" data-frage="<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_id'];?>
"></label>
                        <label for="fragenNR_<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
"><input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
" value="3" data-frage="<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_id'];?>
"></label>
                        <label for="fragenNR_<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
"><input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_NR'];?>
" value="4" data-frage="<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_id'];?>
"></label>
                    </div>
                    <input type="checkbox" data-toggle="toggle" data-on="<?php echo smarty_function_xr_translate(array('tag'=>'fp_Fragen-wichtig'),$_smarty_tpl);?>
" data-off="<?php echo smarty_function_xr_translate(array('tag'=>'fp_Fragen-unwichtig'),$_smarty_tpl);?>
">
                </div>
                <div class="col-xs-3 text-left antwort-right">
                    <h5 class="antwort-headline"><?php echo $_smarty_tpl->tpl_vars['o']->value['wz_TEXTHEADER_RIGHT'];?>
</h5>
                    <p><?php echo $_smarty_tpl->tpl_vars['o']->value['wz_TEXT_RIGHT'];?>
</p>
                </div>
                <div class="col-xs-1"></div>
            </div>
            <!--<div class="col-xs-12" style="text-align: center;">-->
            <!--    <input type="checkbox" data-toggle="toggle" data-on="<?php echo smarty_function_xr_translate(array('tag'=>'fp_Fragen-wichtig'),$_smarty_tpl);?>
" data-off="<?php echo smarty_function_xr_translate(array('tag'=>'fp_Fragen-unwichtig'),$_smarty_tpl);?>
">-->
            <!--</div>-->
        <?php }} ?>
        </div>
    <?php }} ?>
    <div class="text-center" style="display: none;">
        <button type="button" id="fragebogen-save" class="btn start-button text-uppercase save-fragebogen"><?php echo smarty_function_xr_translate(array('tag'=>'Speichern'),$_smarty_tpl);?>
</button>
    </div>
</form>
