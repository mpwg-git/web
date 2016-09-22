<?php /* Smarty version Smarty-3.0.7, created on 2015-03-12 19:50:08
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecBNYDU" */ ?>
<?php /*%%SmartyHeaderCode:8851173535501dfe050ada7-28699262%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7945046c9a35149cd8bad3c34a98a548986e676' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codecBNYDU',
      1 => 1426186208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8851173535501dfe050ada7-28699262',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_jsWrapperV2')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_jsWrapperV2.php';
?><hr />
<footer class="foot">
    <div class="container">
       footer 
       
       <?php echo $_smarty_tpl->getVariable('DROPBOXVALS')->value;?>
>
       
       <div class="newsletter">
           <?php echo smarty_function_xr_atom(array('a_id'=>471,'return'=>1),$_smarty_tpl);?>

       </div>
       
         <div class="social">
           <?php echo smarty_function_xr_atom(array('a_id'=>472,'return'=>1),$_smarty_tpl);?>

       </div>
 
       
    </div>
</footer>

<?php echo smarty_function_xr_jsWrapperV2(array('s_ids'=>'373,16,17,387,388,389,289','var'=>"packedjs"),$_smarty_tpl);?>
