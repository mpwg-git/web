<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 16:25:22
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZHhtyO" */ ?>
<?php /*%%SmartyHeaderCode:1935007695550301623b48e4-98336827%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37f7575d555acebc8e53fc627b38c4e861490634' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZHhtyO',
      1 => 1426260322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1935007695550301623b48e4-98336827',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_cimg')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_cimg.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php $_smarty_tpl->tpl_vars['bilder'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['wz_PRODUCTIMAGES'], null, null);?>

<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('S_ID')->value),$_smarty_tpl);?>


<div class="produktdetail-bilder-container">
    
    <?php if (empty($_smarty_tpl->getVariable('bilder',null,true,false)->value)){?>
        
        <?php echo smarty_function_xr_cimg(array('show_default'=>1,'rmode'=>'cco','w'=>700,'h'=>400),$_smarty_tpl);?>

    
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