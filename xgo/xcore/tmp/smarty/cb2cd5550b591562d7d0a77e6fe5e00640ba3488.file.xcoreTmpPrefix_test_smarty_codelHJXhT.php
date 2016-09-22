<?php /* Smarty version Smarty-3.0.7, created on 2016-04-30 21:03:00
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelHJXhT" */ ?>
<?php /*%%SmartyHeaderCode:93654202057250164410cc9-57695495%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb2cd5550b591562d7d0a77e6fe5e00640ba3488' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelHJXhT',
      1 => 1462042980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93654202057250164410cc9-57695495',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getInitFragen",'var'=>"fragen"),$_smarty_tpl);?>


<div class="container register-fragen">
    
    <div class="row">
        <div class="col-xs-12">
            <br />
            <h2><?php echo smarty_function_xr_translate(array('tag'=>'Mein perfektes Zimmer'),$_smarty_tpl);?>
:</h2>
        </div>
        
    </div>
    
    <div class="row">
        <div class="col-xs-2" style="max-width: 110px; padding-top: 8px;">
            <?php echo smarty_function_xr_translate(array('tag'=>'Ort'),$_smarty_tpl);?>
:
        </div>
        <div class="col-xs-5">
            <form>
                <?php echo smarty_function_xr_atom(array('a_id'=>764,'addClass'=>"location-start",'return'=>1),$_smarty_tpl);?>

            </form>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-2" style="max-width: 110px; padding-top: 8px;">
            <?php echo smarty_function_xr_translate(array('tag'=>'Miete max'),$_smarty_tpl);?>
:
        </div>
        <div class="col-xs-5">
            <input type="text" name="mietemax" id="mietemax" value="" class="form-control" />
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12">
            <br /><br /><br />
            <h2><?php echo smarty_function_xr_translate(array('tag'=>'Mein perfekter Mitbewohner'),$_smarty_tpl);?>
:</h2>
        </div>
    </div>
    
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fragen')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        
        <div class="row">
            <div class="col-xs-12">
                <h4><?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_FRAGE'];?>
</h4>
            </div>
        </div>
        
        <?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['v']->value['OPTIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['o']->key;
?>
    
        <div class="row">
            <div class="col-xs-1" style="max-width: 20px;">
                <input type="checkbox" name="" id="antwort_<?php echo $_smarty_tpl->tpl_vars['o']->value['wz_id'];?>
">
            </div>
            <div class="col-xs-9">
                <label for="antwort_<?php echo $_smarty_tpl->tpl_vars['o']->value['wz_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['o']->value['wz_TEXT'];?>
</label>
            </div>
        </div>
    
        <?php }} ?>
    
    <?php }} ?>
    
    <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('fragen')->value),$_smarty_tpl);?>

    
</div>