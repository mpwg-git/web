<?php /* Smarty version Smarty-3.0.7, created on 2017-03-07 12:26:15
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeWzi9QR" */ ?>
<?php /*%%SmartyHeaderCode:17759337258be98d758d5e4-66718054%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c7f87baa88547da03c662bb4854f851e7a2e9d2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeWzi9QR',
      1 => 1488885975,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17759337258be98d758d5e4-66718054',
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
	            <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-52J8F5"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->	 
        
        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                  appId      : '1101804963210825',
                  xfbml      : true,
                  version    : 'v2.6'
                });
              };
            
            (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.6&appId=242558162535234";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        
        <?php echo smarty_function_xr_atom(array('a_id'=>642,'return'=>1),$_smarty_tpl);?>

        
        <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

        
        <?php echo smarty_function_xr_atom(array('a_id'=>761,'return'=>1,'desc'=>"img upload modal"),$_smarty_tpl);?>


        <?php echo smarty_function_xr_atom(array('a_id'=>794,'return'=>1,'desc'=>'face in use'),$_smarty_tpl);?>

        <!-- FOOTER ATOM -->
        <?php echo smarty_function_xr_atom(array('a_id'=>643,'return'=>1),$_smarty_tpl);?>

        
        <?php echo smarty_function_xr_atom(array('a_id'=>899,'return'=>1),$_smarty_tpl);?>

        
        <script src="/xstorage/template/js/jquery-2.1.4.min.js" type="text/javascript" ></script>
        <script src="//cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
        
        <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyC8wi58RIMPGI379eTvxC7e6khEM5s898E&libraries=places" type="text/javascript"></script>
        
       	<?php echo smarty_function_xr_atom(array('a_id'=>704,'return'=>1,'desc'=>'js files'),$_smarty_tpl);?>

       	
        <?php echo smarty_function_xr_atom(array('a_id'=>757,'return'=>1,'desc'=>'ajax loader'),$_smarty_tpl);?>

        <script src="/xstorage/template/plugins/guillotine/jquery.guillotine.js"></script>
        
        <!--<?php echo smarty_function_xr_atom(array('a_id'=>799,'return'=>1,'desc'=>'landscape overlay'),$_smarty_tpl);?>
-->
        
        <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getEmailConfirmMsg",'var'=>"EmailConfirmMsg"),$_smarty_tpl);?>

        
        <?php if ($_smarty_tpl->getVariable('EmailConfirmMsg')->value){?>
            <script>
                var showEmailConfirmMsg = true;
            </script>
        <?php }?>

	</body>
</html>