<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 09:43:36
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTtCq8b" */ ?>
<?php /*%%SmartyHeaderCode:15275717305502a3388596e0-98140152%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77234f384a45ece17d15e76df5949850ee42ee0e' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTtCq8b',
      1 => 1426236216,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15275717305502a3388596e0-98140152',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?><div id="content-slider-1" class="royalSlider contentSlider rsDefault">

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