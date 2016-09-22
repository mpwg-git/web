<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 09:42:47
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/356.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:705407175502a307191829-76378264%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c0e22a4a4f50d450b0d90a4ce1e28c99b80eb9c' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/356.cache.html',
      1 => 1426236161,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '705407175502a307191829-76378264',
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
