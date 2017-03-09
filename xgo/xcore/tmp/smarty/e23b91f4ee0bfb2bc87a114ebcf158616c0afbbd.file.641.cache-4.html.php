<?php /* Smarty version Smarty-3.0.7, created on 2017-03-10 00:17:26
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/641.cache-4.html" */ ?>
<?php /*%%SmartyHeaderCode:156014458258c1e2863837e3-56438249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e23b91f4ee0bfb2bc87a114ebcf158616c0afbbd' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/641.cache-4.html',
      1 => 1489101406,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156014458258c1e2863837e3-56438249',
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

            
        <script src="/xstorage/template/js/jquery-2.1.4.min.js" type="text/javascript" ></script>
        <script src="//cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
        <script src="/xstorage/template/js/jquery.md5.js" type="text/javascript" ></script>
            
            
        <script  src="//maps.googleapis.com/maps/api/js?key=AIzaSyC8wi58RIMPGI379eTvxC7e6khEM5s898E&libraries=places" type="text/javascript"></script>
    		
    	<?php echo smarty_function_xr_atom(array('a_id'=>704,'return'=>1,'desc'=>'js files'),$_smarty_tpl);?>

        <script src="/xstorage/template/plugins/guillotine/jquery.guillotine.js"></script>
            
        <?php echo smarty_function_xr_atom(array('a_id'=>757,'return'=>1,'desc'=>'ajax loader'),$_smarty_tpl);?>

            
        <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getEmailConfirmMsg",'var'=>"EmailConfirmMsg"),$_smarty_tpl);?>

            
        <?php if ($_smarty_tpl->getVariable('EmailConfirmMsg')->value){?>
            <script>
                var showEmailConfirmMsg = true;
            </script>
        <?php }?>
        
        
	</body>
</html>

