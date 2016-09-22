<?php /* Smarty version Smarty-3.0.7, created on 2015-03-06 17:15:11
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeYCtEw3" */ ?>
<?php /*%%SmartyHeaderCode:203212713054f9d28f160eb9-69479187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bea044285f99d633148ca6264560e97d89d458f0' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeYCtEw3',
      1 => 1425658511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203212713054f9d28f160eb9-69479187',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><form class='xr_form <?php echo $_smarty_tpl->getVariable('class')->value;?>
' data-wz_id='<?php echo $_smarty_tpl->getVariable('wz_id')->value;?>
' data-hash='<?php echo $_smarty_tpl->getVariable('hash')->value;?>
' data-pre-action='<?php echo $_smarty_tpl->getVariable('pre_action')->value;?>
' data-action="<?php echo $_smarty_tpl->getVariable('action')->value;?>
" data-js="<?php echo $_smarty_tpl->getVariable('js')->value;?>
" data-url="<?php echo $_smarty_tpl->getVariable('url')->value;?>
">
    <fieldset>
    
        <?php if (count($_smarty_tpl->getVariable('fields')->value)>1){?>
            <?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fields')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value){
?>
                
                <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->tpl_vars['field']->value),$_smarty_tpl);?>

                
                <?php if ($_smarty_tpl->tpl_vars['field']->value['ROW_CLOSE']){?>
                    </div>
                <?php }?>
                
                <?php if ($_smarty_tpl->tpl_vars['field']->value['ROW_OPEN']){?>
                    <div class="row">
                <?php }?>
                
                
                    <div class='col-sm-<?php echo $_smarty_tpl->tpl_vars['field']->value['col'];?>
'>
                        <?php echo smarty_function_xr_atom(array('a_id'=>$_smarty_tpl->tpl_vars['field']->value['tpl_id'],'field'=>$_smarty_tpl->tpl_vars['field']->value,'return'=>1),$_smarty_tpl);?>

                    </div>
                
            <?php }} ?>
            
              </div>
            
        <?php }?>
        <div class="xr_form_submit_container">
            <button type="submit" class="xr_form_submit btn btn-primary"><?php echo $_smarty_tpl->getVariable('btn')->value['submit_txt'];?>
</button>
        </div>
    </fieldset>
</form>