<?php /* Smarty version Smarty-3.0.7, created on 2016-04-30 21:09:17
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeNu2ZK1" */ ?>
<?php /*%%SmartyHeaderCode:541823549572502dd188578-76679389%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cf5d8d89f591fbb257cbc8ad3fa82c39a7cf7aa' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeNu2ZK1',
      1 => 1462043357,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '541823549572502dd188578-76679389',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
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
                <input type="checkbox" name="frage_<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
" id="antwort_<?php echo $_smarty_tpl->tpl_vars['o']->value['wz_id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['o']->value['wz_id'];?>
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
    
     <div class="row" style="padding-top: 18px;">
        <div class="col-xs-5">
            <button class="start-button js-fb-login"><?php echo smarty_function_xr_translate(array('tag'=>'Weiter mit Facebook Login'),$_smarty_tpl);?>
</button>
        </div>
        <div class="col-xs-5 pull-right">
            <button class="start-button js-simple-login"><?php echo smarty_function_xr_translate(array('tag'=>'Ich habe bereits ein Profil'),$_smarty_tpl);?>
</button>
        </div>
    </div>
    
</div>