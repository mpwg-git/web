<?php /* Smarty version Smarty-3.0.7, created on 2017-03-07 13:38:32
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/812.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:11925152058bea9c86f5259-44709966%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f21a881241520dfb0e9a098ab3cb466dc86bc72' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/812.cache-3.html',
      1 => 1488885596,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11925152058bea9c86f5259-44709966',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="fakten">
    <div class="fakt clearfix">
        <!--<span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>'Frauen in WG'),$_smarty_tpl);?>
:</span><span class="info"><?php echo $_smarty_tpl->getVariable('roomData')->value['wz_UNREG_F'];?>
</span>-->
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>'Frauen in WG'),$_smarty_tpl);?>
:</span><span class="info"><?php echo $_smarty_tpl->getVariable('roomData')->value['wz_COUNT_MITBEWOHNER_F'];?>
</span>
    </div>
    <div class="fakt clearfix">
        <!--<span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>'Männer in WG'),$_smarty_tpl);?>
:</span><span class="info"><?php echo $_smarty_tpl->getVariable('roomData')->value['wz_UNREG_M'];?>
</span>-->
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>'Männer in WG'),$_smarty_tpl);?>
:</span><span class="info"><?php echo $_smarty_tpl->getVariable('roomData')->value['wz_COUNT_MITBEWOHNER_M'];?>
</span>
    </div>
    <?php if ($_smarty_tpl->getVariable('ageSpan')->value['FROM']!==false||$_smarty_tpl->getVariable('ageSpan')->value['TO']!==false){?>
        <div class="fakt clearfix">
            <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>'Alter'),$_smarty_tpl);?>
:</span>
            <span class="info">
                <?php if ($_smarty_tpl->getVariable('ageSpan')->value['FROM']!==false){?><?php echo smarty_function_xr_translate(array('tag'=>'von'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->getVariable('ageSpan')->value['FROM'];?>
<?php }?>
                <?php if ($_smarty_tpl->getVariable('ageSpan')->value['TO']!==false){?>  <?php echo smarty_function_xr_translate(array('tag'=>'bis'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->getVariable('ageSpan')->value['TO'];?>
<?php }?>
            </span>
        </div>
    <?php }?>
</div>

<div class="row">
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mitbewohner')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <?php echo smarty_function_xr_atom(array('a_id'=>813,'single'=>$_smarty_tpl->tpl_vars['v']->value,'return'=>1,'desc'=>'roomie single'),$_smarty_tpl);?>

    <?php }} ?>
</div>