<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 11:06:14
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeArJzF9" */ ?>
<?php /*%%SmartyHeaderCode:541528885502b696db2950-57220711%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88bdaef2df404a07381ebe779d6920d5add33c90' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeArJzF9',
      1 => 1426241174,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '541528885502b696db2950-57220711',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php if (empty($_smarty_tpl->getVariable('data',null,true,false)->value['wz_PRODUCTIMAGES'])){?>

    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>0,'w'=>700,'h'=>400),$_smarty_tpl);?>


<?php }else{ ?>

<?php }?>