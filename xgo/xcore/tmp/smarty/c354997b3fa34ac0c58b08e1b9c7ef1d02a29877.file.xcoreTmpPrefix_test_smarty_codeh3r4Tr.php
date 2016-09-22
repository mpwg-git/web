<?php /* Smarty version Smarty-3.0.7, created on 2016-09-19 12:49:54
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeh3r4Tr" */ ?>
<?php /*%%SmartyHeaderCode:154554293357dfc2d21a8e18-23801587%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c354997b3fa34ac0c58b08e1b9c7ef1d02a29877' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeh3r4Tr',
      1 => 1474282194,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154554293357dfc2d21a8e18-23801587',
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
        <!-- Google Tag Manager -->
        <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5J4HQD"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5J4HQD');</script>
        <!-- End Google Tag Manager -->
        
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

        
        <!-- CONTENT -->
        <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

        <!-- CONTENT -->
        
        <?php echo smarty_function_xr_atom(array('a_id'=>761,'return'=>1,'desc'=>"img upload modal"),$_smarty_tpl);?>

        
        
        <script src=" http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
        
        <?php echo smarty_function_xr_atom(array('a_id'=>794,'return'=>1,'desc'=>'face in use'),$_smarty_tpl);?>

        <!-- FOOTER ATOM -->
        <?php echo smarty_function_xr_atom(array('a_id'=>643,'return'=>1),$_smarty_tpl);?>

        
        <?php echo smarty_function_xr_atom(array('a_id'=>899,'return'=>1),$_smarty_tpl);?>

		
       	<?php echo smarty_function_xr_atom(array('a_id'=>704,'return'=>1,'desc'=>'js files'),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>757,'return'=>1,'desc'=>'ajax loader'),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>799,'return'=>1,'desc'=>'landscape overlay'),$_smarty_tpl);?>

        
        <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getEmailConfirmMsg",'var'=>"EmailConfirmMsg"),$_smarty_tpl);?>

        
        <?php if ($_smarty_tpl->getVariable('EmailConfirmMsg')->value){?>
        
        <script>
            
            var showEmailConfirmMsg = true;
            
        </script>
        
        <?php }?>
        
	</body>
</html>
