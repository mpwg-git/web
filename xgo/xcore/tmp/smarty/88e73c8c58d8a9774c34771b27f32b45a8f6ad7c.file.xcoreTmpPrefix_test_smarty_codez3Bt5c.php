<?php /* Smarty version Smarty-3.0.7, created on 2015-06-24 16:36:41
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codez3Bt5c" */ ?>
<?php /*%%SmartyHeaderCode:1401617722558ac079197932-64623692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88e73c8c58d8a9774c34771b27f32b45a8f6ad7c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codez3Bt5c',
      1 => 1435156601,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1401617722558ac079197932-64623692',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_papsch')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_papsch.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_cssWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_cssWrapper.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_jsWrapperV2')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_jsWrapperV2.php';
?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->getVariable('P_LANG')->value;?>
">
    <head>
        <meta charset="utf-8"><?php echo $_smarty_tpl->getVariable('CMS')->value;?>

        <!--[if lt IE 11]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<link rel="shortcut icon" href="ico/favicon.ico">
		
        <?php if ($_smarty_tpl->getVariable('WTITLETAG')->value!=''){?>
            <title><?php echo $_smarty_tpl->getVariable('WTITLETAG')->value;?>
 - <?php echo smarty_function_xr_papsch(array('postfix'=>' - '),$_smarty_tpl);?>
<?php echo smarty_function_xr_translate(array('tag'=>'###SITE_TITLE###'),$_smarty_tpl);?>
</title>
        <?php }else{ ?>
            <?php if ($_smarty_tpl->getVariable('TITLETAG')->value!=''){?>
                <title><?php echo $_smarty_tpl->getVariable('TITLETAG')->value;?>
<?php if ($_smarty_tpl->getVariable('P_ID')->value!='184'){?> - <?php echo smarty_function_xr_papsch(array('postfix'=>' - '),$_smarty_tpl);?>
<?php echo smarty_function_xr_translate(array('tag'=>'###SITE_TITLE###'),$_smarty_tpl);?>
<?php }?></title>
            <?php }elseif($_smarty_tpl->getVariable('AHEADLINE')->value!=''){?>
                <title><?php echo $_smarty_tpl->getVariable('AHEADLINE')->value;?>
 - <?php echo smarty_function_xr_papsch(array('postfix'=>' - '),$_smarty_tpl);?>
<?php echo smarty_function_xr_translate(array('tag'=>'###SITE_TITLE###'),$_smarty_tpl);?>
</title>
            <?php }else{ ?>
                <title><?php echo smarty_function_xr_translate(array('tag'=>'###SITE_TITLE###'),$_smarty_tpl);?>
</title>
            <?php }?>
        <?php }?>

        <meta name="description" content="<?php echo $_smarty_tpl->getVariable('DESCRIPTION')->value;?>
" />
        <meta name="keywords" content="<?php echo $_smarty_tpl->getVariable('KEYWORDS')->value;?>
" />
        <?php if ($_smarty_tpl->getVariable('ROBOTS')->value=='1'){?><meta name="robots" content="noindex" /><?php }?>
        
		<!-- Bootstrap core CSS -->
        <?php echo smarty_function_xr_cssWrapper(array('s_id'=>12,'var'=>"bootstrap.css"),$_smarty_tpl);?>

        <!-- SWIPEBOX -->
        <?php echo smarty_function_xr_cssWrapper(array('s_id'=>34,'var'=>"swipebox.css"),$_smarty_tpl);?>

        <!-- ANIMATE CSS -->
        <?php echo smarty_function_xr_cssWrapper(array('s_id'=>7,'var'=>"animate.css"),$_smarty_tpl);?>

        <!-- IcoMoon -->
        <?php echo smarty_function_xr_cssWrapper(array('s_id'=>40,'var'=>"icomoon.css"),$_smarty_tpl);?>

        <!-- Fonts -->
        <?php echo smarty_function_xr_cssWrapper(array('s_id'=>56,'var'=>"latofont.css"),$_smarty_tpl);?>

        <!-- Fonts -->
        <?php echo smarty_function_xr_cssWrapper(array('s_id'=>47,'var'=>"merriweather.css"),$_smarty_tpl);?>

		<!-- Custom styles for this template -->
        <!-- Less -->
        <link rel="stylesheet/less" type="text/css" href="/xstorage/template/css/mixinsAndVars.less">
        <link rel="stylesheet/less" type="text/css" href="/xstorage/template/css/styles.less">

        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.0/less.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="home page_<?php echo $_smarty_tpl->getVariable('P_ID')->value;?>
 <?php echo $_smarty_tpl->getVariable('BODYKLASSE')->value;?>
">
        <!-- Google Tag Manager -->
        <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5TRLMV"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5TRLMV');</script>
        <!-- End Google Tag Manager -->

        <!--- NAVIGATION MOBILE ---->
        <?php echo smarty_function_xr_atom(array('a_id'=>319,'return'=>1),$_smarty_tpl);?>

        
        <!--- NAVIGATION ---->
        <?php echo smarty_function_xr_atom(array('a_id'=>318,'return'=>1),$_smarty_tpl);?>

        
        <div class="mobile-nav-pusher">
            
            <!--- HEADER ---->
            <?php echo smarty_function_xr_atom(array('a_id'=>315,'return'=>1),$_smarty_tpl);?>

            
            <div class="container">
                <!--- MISSION ---->
                <?php echo smarty_function_xr_atom(array('a_id'=>308,'return'=>1),$_smarty_tpl);?>

            </div>
                
            <hr class="zickzack">
                
            <div class="container">    
                <!--- LEISTUNGEN ---->
                <?php echo smarty_function_xr_atom(array('a_id'=>310,'return'=>1),$_smarty_tpl);?>

            </div>   
            <div class="container">    
                <!--- KONTAKT ---->
                <?php echo smarty_function_xr_atom(array('a_id'=>312,'return'=>1),$_smarty_tpl);?>

            </div> 
            <div class="container">    
                <!--- FOOTER ---->
                <?php echo smarty_function_xr_atom(array('a_id'=>314,'return'=>1),$_smarty_tpl);?>

            </div> 
            <!--- IMPRESSUM ---->
            <?php echo smarty_function_xr_atom(array('a_id'=>316,'return'=>1),$_smarty_tpl);?>

        </div>

		<!-- Bootstrap core JavaScript -->
        <?php echo smarty_function_xr_jsWrapperV2(array('s_ids'=>'','var'=>"packedjs"),$_smarty_tpl);?>

	</body>
</html>
