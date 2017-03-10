<?php /* Smarty version Smarty-3.0.7, created on 2017-03-10 00:25:20
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/641.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:145416467558c1e4606e1df5-23509831%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cb487e711dc9f6466b41bb768f014a751402253' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/641.cache-3.html',
      1 => 1489101406,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145416467558c1e4606e1df5-23509831',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_cssWrapperV2')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_cssWrapperV2.php';
if (!is_callable('smarty_function_xr_cssWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_cssWrapper.php';
if (!is_callable('smarty_function_xr_lessWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_lessWrapper.php';
?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->getVariable('P_LANG')->value;?>
">
    <?php echo smarty_function_xr_atom(array('a_id'=>647,'return'=>1),$_smarty_tpl);?>

	<body>

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
        
        <!-- HEADER ATOM -->
        <?php echo smarty_function_xr_atom(array('a_id'=>642,'return'=>1),$_smarty_tpl);?>

        
        <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

        
        <?php echo smarty_function_xr_atom(array('a_id'=>761,'return'=>1,'desc'=>"img upload modal"),$_smarty_tpl);?>

        
        <?php echo smarty_function_xr_atom(array('a_id'=>925,'return'=>1),$_smarty_tpl);?>


        <?php echo smarty_function_xr_atom(array('a_id'=>794,'return'=>1,'desc'=>'face in use'),$_smarty_tpl);?>

        
        <!-- FOOTER ATOM -->
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
        
        <?php if ($_smarty_tpl->getVariable('P_ID')->value==1){?>
        	<!-- BELOW THE FOLD CSS -->
        	<link type="text/css" rel="stylesheet" href="//fast.fonts.net/cssapi/e6956f03-3bdc-41f7-b5f4-ace0569aaedf.css"/>
            <?php echo smarty_function_xr_cssWrapperV2(array('s_ids'=>'89,15,178,11998,76,39,26,17209,402,408,321,422,13331,426,461,76','var'=>"packedcss"),$_smarty_tpl);?>

            <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_util::isNewLayout",'var'=>"newlayout"),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->getVariable('newlayout')->value==1){?>
                <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_util::isV2",'var'=>"isV2"),$_smarty_tpl);?>

                <?php if ($_smarty_tpl->getVariable('isV2')->value==1){?>
                    <?php echo smarty_function_xr_cssWrapper(array('s_id'=>18475),$_smarty_tpl);?>

                    <?php echo smarty_function_xr_cssWrapper(array('s_id'=>18557),$_smarty_tpl);?>

                	<?php echo smarty_function_xr_lessWrapper(array('ids'=>'13,14,18'),$_smarty_tpl);?>

            	<?php }else{ ?>
            	    <?php echo smarty_function_xr_lessWrapper(array('ids'=>'11,12'),$_smarty_tpl);?>

            	<?php }?>
            <?php }else{ ?>
                <?php echo smarty_function_xr_lessWrapper(array('ids'=>'6,7'),$_smarty_tpl);?>

            <?php }?>
        <?php }?>
        
	</body>
</html>
