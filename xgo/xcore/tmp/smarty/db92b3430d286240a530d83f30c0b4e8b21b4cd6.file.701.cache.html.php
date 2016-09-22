<?php /* Smarty version Smarty-3.0.7, created on 2015-08-24 23:07:09
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/701.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:115099436455db877d5ad396-92498212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db92b3430d286240a530d83f30c0b4e8b21b4cd6' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/701.cache.html',
      1 => 1440450142,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115099436455db877d5ad396-92498212',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group geschlecht-container mitbewohner-container">
    <input type="hidden" id="mitbewohner-frauen-counter" value='<?php echo $_smarty_tpl->getVariable('data')->value["PROFILE"]["MITBEWOHNER"]["F"];?>
' name="AKTUELLE_MITBEWOHNER_F" />
    <input type="hidden" id="mitbewohner-maenner-counter" value='<?php echo $_smarty_tpl->getVariable('data')->value["PROFILE"]["MITBEWOHNER"]["M"];?>
' name="AKTUELLE_MITBEWOHNER_M" />
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Aktuelle Mitbewohner?"),$_smarty_tpl);?>
</label>
    <span class="person">
        <?php if ($_smarty_tpl->getVariable('data')->value["PROFILE"]["MITBEWOHNER"]["F"]>0){?><!--
            --><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->getVariable('data')->value["PROFILE"]["MITBEWOHNER"]["F"]+1 - (1) : 1-($_smarty_tpl->getVariable('data')->value["PROFILE"]["MITBEWOHNER"]["F"])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?><!--
                --><span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="icon-rel icon-minus-rel"></span></span><!--
            --><?php }} ?><!--
        --><?php }?><!--
        --><?php if ($_smarty_tpl->getVariable('data')->value["PROFILE"]["MITBEWOHNER"]["M"]>0){?><!--
            --><?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->getVariable('data')->value["PROFILE"]["MITBEWOHNER"]["M"]+1 - (1) : 1-($_smarty_tpl->getVariable('data')->value["PROFILE"]["MITBEWOHNER"]["M"])+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?><!--
                --><span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span><span class="icon-rel icon-minus-rel"></span></span><!--
            --><?php }} ?><!--
        --><?php }?><!--
    --></span>
    <p class="icon-plus-container">
        <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
        <span class="icon-rel icon-plus-rel"></span>
        <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
    </p>
</div>