<?php /* Smarty version Smarty-3.0.7, created on 2015-08-24 22:05:50
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHTXYPL" */ ?>
<?php /*%%SmartyHeaderCode:147754387555db791ea9dd63-29992448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cbd3f8f4d49e0703fc3c8e48f88661044b4bfe9' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHTXYPL',
      1 => 1440446750,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147754387555db791ea9dd63-29992448',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group geschlecht-container mitbewohner-container">
    <input type="hidden" id="mitbewohner-frauen-counter" value='<?php echo $_smarty_tpl->getVariable('data')->value["PROFILE"]["wz_MITBEWOHNER"]["F"];?>
' name="MITBEWOHNER[F]" />
    <input type="hidden" id="mitbewohner-maenner-counter" value='<?php echo $_smarty_tpl->getVariable('data')->value["PROFILE"]["wz_MITBEWOHNER"]["M"];?>
' name="MITBEWOHNER[M]" />
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Aktuelle Mitbewohner?"),$_smarty_tpl);?>
</label>
    <span class="person">
        <?php if ($_smarty_tpl->getVariable('data')->value["PROFILE"]["wz_MITBEWOHNER"]["F"]>0){?><!--
            --><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->getVariable('data')->value["PROFILE"]["wz_MITBEWOHNER"]["F"]+1 - (1) : 1-($_smarty_tpl->getVariable('data')->value["PROFILE"]["wz_MITBEWOHNER"]["F"])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?><!--
                --><span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span><!--
            --><?php }} ?><!--
        --><?php }?><!--
        --><?php if ($_smarty_tpl->getVariable('data')->value["PROFILE"]["wz_MITBEWOHNER"]["M"]>0){?><!--
            --><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->getVariable('data')->value["PROFILE"]["wz_MITBEWOHNER"]["M"]+1 - (1) : 1-($_smarty_tpl->getVariable('data')->value["PROFILE"]["wz_MITBEWOHNER"]["M"])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?><!--
                --><span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span><!--
            --><?php }} ?><!--
        --><?php }?><!--
    --></span>
    <p class="icon-plus-container">
        <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
        <span class="icon-rel icon-plus-rel"></span>
        <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
    </p>
    
    
</div>