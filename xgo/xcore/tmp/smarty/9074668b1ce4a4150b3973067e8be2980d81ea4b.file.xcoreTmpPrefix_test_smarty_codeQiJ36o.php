<?php /* Smarty version Smarty-3.0.7, created on 2017-02-08 23:47:06
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQiJ36o" */ ?>
<?php /*%%SmartyHeaderCode:755178922589b9feab8f1f1-11651042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9074668b1ce4a4150b3973067e8be2980d81ea4b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQiJ36o',
      1 => 1486594026,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '755178922589b9feab8f1f1-11651042',
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
        <?php echo smarty_function_xr_atom(array('a_id'=>642,'return'=>1),$_smarty_tpl);?>

        
        <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

        
        <?php echo smarty_function_xr_atom(array('a_id'=>761,'return'=>1,'desc'=>"img upload modal"),$_smarty_tpl);?>

        
        <?php echo smarty_function_xr_atom(array('a_id'=>925,'return'=>1),$_smarty_tpl);?>


        <?php echo smarty_function_xr_atom(array('a_id'=>794,'return'=>1,'desc'=>'face in use'),$_smarty_tpl);?>

        
        <!-- FOOTER ATOM -->
        <?php echo smarty_function_xr_atom(array('a_id'=>899,'return'=>1),$_smarty_tpl);?>

        
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
