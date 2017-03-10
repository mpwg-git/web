<?php /* Smarty version Smarty-3.0.7, created on 2017-03-10 00:59:50
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/641.cache-4.html" */ ?>
<?php /*%%SmartyHeaderCode:108408734258c1ec76eeafa8-68246620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e23b91f4ee0bfb2bc87a114ebcf158616c0afbbd' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/641.cache-4.html',
      1 => 1489103878,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108408734258c1ec76eeafa8-68246620',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->getVariable('P_LANG')->value;?>
">
    <?php echo smarty_function_xr_atom(array('a_id'=>647,'return'=>1),$_smarty_tpl);?>

    
    <body>
        <!-- HEADER ATOM -->
        <div class="page-wrapper">
            <?php echo smarty_function_xr_atom(array('a_id'=>940,'return'=>1),$_smarty_tpl);?>

            
                <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

            
            <!-- FOOTER ATOM -->
            <?php echo smarty_function_xr_atom(array('a_id'=>943,'return'=>1),$_smarty_tpl);?>

        </div>
            
        
        <?php echo smarty_function_xr_atom(array('a_id'=>761,'return'=>1,'desc'=>"img upload modal"),$_smarty_tpl);?>

            
        <?php echo smarty_function_xr_atom(array('a_id'=>794,'return'=>1,'desc'=>'face in use'),$_smarty_tpl);?>

            
        <?php echo smarty_function_xr_atom(array('a_id'=>899,'return'=>1),$_smarty_tpl);?>

       
    	<?php echo smarty_function_xr_atom(array('a_id'=>704,'return'=>1,'desc'=>'js files'),$_smarty_tpl);?>

            
        <?php echo smarty_function_xr_atom(array('a_id'=>757,'return'=>1,'desc'=>'ajax loader'),$_smarty_tpl);?>

            
        <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getEmailConfirmMsg",'var'=>"EmailConfirmMsg"),$_smarty_tpl);?>

            
        <?php if ($_smarty_tpl->getVariable('EmailConfirmMsg')->value){?>
            <script>
                var showEmailConfirmMsg = true;
            </script>
        <?php }?>
        
        
	</body>
</html>

