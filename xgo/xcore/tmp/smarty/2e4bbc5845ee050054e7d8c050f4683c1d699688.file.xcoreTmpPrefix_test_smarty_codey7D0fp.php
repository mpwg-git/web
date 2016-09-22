<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 11:06:42
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codey7D0fp" */ ?>
<?php /*%%SmartyHeaderCode:20713332725502b6b223a186-76135105%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e4bbc5845ee050054e7d8c050f4683c1d699688' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codey7D0fp',
      1 => 1426241202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20713332725502b6b223a186-76135105',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php $_smarty_tpl->tpl_vars['bilder'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['wz_PRODUCTIMAGES'], null, null);?>


<?php if (empty($_smarty_tpl->getVariable('bilder',null,true,false)->value)){?>

    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>0,'w'=>700,'h'=>400),$_smarty_tpl);?>


<?php }else{ ?>

    <

<?php }?>