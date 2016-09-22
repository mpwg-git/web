<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 09:42:41
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeE3iodK" */ ?>
<?php /*%%SmartyHeaderCode:20417846595502a301aa1568-19752103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21619b62dd1cc98ac633fa890458dfa168f7cfe4' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeE3iodK',
      1 => 1426236161,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20417846595502a301aa1568-19752103',
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

       
       <div class="newsletter">
           <?php echo smarty_function_xr_atom(array('a_id'=>471,'return'=>1),$_smarty_tpl);?>

       </div>
       
         <div class="social">
           <?php echo smarty_function_xr_atom(array('a_id'=>472,'return'=>1),$_smarty_tpl);?>

       </div>
 
       
    </div>
</footer>

<?php echo smarty_function_xr_jsWrapperV2(array('s_ids'=>'373,16,17,387,388,389,289,411','var'=>"packedjs"),$_smarty_tpl);?>
