<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 16:30:16
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codes9OIul" */ ?>
<?php /*%%SmartyHeaderCode:115433972655030288290f91-33089674%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fe100e9c713e3cc798ea83eb3c534f73ae59b13' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codes9OIul',
      1 => 1426260616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115433972655030288290f91-33089674',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_cimg')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_cimg.php';
?><?php $_smarty_tpl->tpl_vars['bilder'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['wz_PRODUCTIMAGES'], null, null);?>

<div class="produktdetail-bilder-container">
    
    <?php if (empty($_smarty_tpl->getVariable('bilder',null,true,false)->value)){?>
        <?php echo smarty_function_xr_cimg(array('show_default'=>1,'p_id'=>1,'w'=>700,'h'=>400),$_smarty_tpl);?>

    <?php }else{ ?>
    
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('bilder')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        
            <div class="produktdetail-bild">
                 <?php echo smarty_function_xr_cimg(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['s_id'],'p_id'=>1,'rmode'=>'cco','w'=>700,'h'=>400),$_smarty_tpl);?>

            </div>
        
        <?php }} ?>
    
    <?php }?>
    
</div>