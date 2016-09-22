<?php /* Smarty version Smarty-3.0.7, created on 2015-03-06 18:14:31
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeozUgSZ" */ ?>
<?php /*%%SmartyHeaderCode:15342241754f9e077b904d0-87968822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28c1a00a6fe9ccb37bdfdfec79df87a93a62c7ca' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeozUgSZ',
      1 => 1425662071,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15342241754f9e077b904d0-87968822',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_jsWrapperV2')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_jsWrapperV2.php';
?><footer class="foot">
    <div class="container">
       footer 
       
       <div class="newsletter">
           <?php echo smarty_function_xr_atom(array('a_id'=>471,'return'=>1),$_smarty_tpl);?>

       </div>
       
         <div class="social">
           <?php echo smarty_function_xr_atom(array('a_id'=>472,'return'=>1),$_smarty_tpl);?>

       </div>
      <?php echo smarty_function_xr_genlink(array('p_id'=>22),$_smarty_tpl);?>

       
    </div>
</footer>

<?php echo smarty_function_xr_jsWrapperV2(array('s_ids'=>'373,16,17','var'=>"packedjs"),$_smarty_tpl);?>
