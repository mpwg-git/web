<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 11:08:43
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeiNvgYm" */ ?>
<?php /*%%SmartyHeaderCode:11245252505502b72b50b296-38713297%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b496ea6ff141eb3fe4e4b2d964322eced2b9d087' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeiNvgYm',
      1 => 1426241323,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11245252505502b72b50b296-38713297',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php $_smarty_tpl->tpl_vars['bilder'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['wz_PRODUCTIMAGES'], null, null);?>

<div class="produktdetail-bilder-container">
    
    <?php if (empty($_smarty_tpl->getVariable('bilder',null,true,false)->value)){?>
    no img
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>0,'rmode'=>'cco','w'=>700,'h'=>400),$_smarty_tpl);?>

    
    <?php }else{ ?>
    
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('bilder')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        
            <div class="produktdetail-bild">
                <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['s_id'],'rmode'=>'cco','w'=>700,'h'=>400),$_smarty_tpl);?>

            </div>
        
        <?php }} ?>
    
    <?php }?>
    
</div>