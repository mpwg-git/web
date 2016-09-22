<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 09:41:53
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1Z1QtR" */ ?>
<?php /*%%SmartyHeaderCode:4778756795502a2d131da74-85215671%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2333f4c1810d898dbc3731d8575b807d1d129a9' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1Z1QtR',
      1 => 1426236113,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4778756795502a2d131da74-85215671',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?><div id="content-slider-1" class="royalSlider contentSlider rsDefault">

   <?php $_smarty_tpl->tpl_vars['slides'] = new Smarty_variable(false, null, null);?>
   
   <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('slides')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				   
    <div>
    	<?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_BILD'],'var'=>'bannerimg'),$_smarty_tpl);?>

    	<a class="rsImg" href="<?php echo $_smarty_tpl->getVariable('bannerimg')->value['src'];?>
"></a>
    </div>
    
    <?php }} ?>
    
</div>