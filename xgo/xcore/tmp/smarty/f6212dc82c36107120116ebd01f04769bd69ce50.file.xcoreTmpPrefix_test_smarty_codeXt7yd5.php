<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 11:33:14
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeXt7yd5" */ ?>
<?php /*%%SmartyHeaderCode:142866411855d1aa5ac65037-63217493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6212dc82c36107120116ebd01f04769bd69ce50' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeXt7yd5',
      1 => 1439803994,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142866411855d1aa5ac65037-63217493',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->getVariable('P_LANG')->value;?>
">
    
    <?php echo smarty_function_xr_atom(array('a_id'=>647,'return'=>1),$_smarty_tpl);?>

	
	<body>
        <div id="fb-root"></div>
        <script>
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.4&appId=242558162535234";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
        <!-- HEADER ATOM --->
        <?php echo smarty_function_xr_atom(array('a_id'=>642,'return'=>1),$_smarty_tpl);?>


        <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

        <?php echo smarty_function_xr_atom(array('a_id'=>761,'return'=>1,'desc'=>"img upload modal"),$_smarty_tpl);?>

        
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places" type="text/javascript"></script>
        
        <!-- FOOTER ATOM --->
        <?php echo smarty_function_xr_atom(array('a_id'=>643,'return'=>1),$_smarty_tpl);?>

        
		<?php echo smarty_function_xr_atom(array('a_id'=>704,'return'=>1),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>757,'return'=>1),$_smarty_tpl);?>

        
	</body>
</html>
