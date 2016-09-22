<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 15:09:50
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/870.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:16083465445695092e7b8fd9-84625562%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'feac1a0775a7365f34af3aec83ed9a941c7eafb9' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/870.cache.html',
      1 => 1452607208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16083465445695092e7b8fd9-84625562',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_papsch')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_papsch.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_cssWrapperV2')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_cssWrapperV2.php';
if (!is_callable('smarty_function_xr_lessWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_lessWrapper.php';
if (!is_callable('smarty_function_xr_jsWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_jsWrapper.php';
?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->getVariable('P_LANG')->value;?>
">
    
    <head>
    <meta charset="utf-8"><?php echo $_smarty_tpl->getVariable('CMS')->value;?>

    <!--[if lt IE 11]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		
	<link rel="icon" href="/xstorage/template/img/favicon/favicon.ico">
	<link rel="icon" sizes="196x196" href="/xstorage/template/img/favicon/favicon-196x196.png">
	
	<link rel="apple-touch-icon" sizes="57x57" href="/xstorage/template/img/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/xstorage/template/img/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/xstorage/template/img/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/xstorage/template/img/favicon/apple-touch-icon-144x144.png" />
    
    <!-- ATOMS IN USE -->
    <?php echo smarty_function_xr_atom(array('a_id'=>683,'return'=>1),$_smarty_tpl);?>

	
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
    
    <link type="text/css" rel="stylesheet" href="http://fast.fonts.net/cssapi/e6956f03-3bdc-41f7-b5f4-ace0569aaedf.css"/>
   
    <link rel="stylesheet" href="/xstorage/template/ImageResizeCropCanvas/ImageResizeCropCanvas/css/demo.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    
	<?php echo smarty_function_xr_cssWrapperV2(array('s_ids'=>'89,15,178,11998,76,39,26,17209,402,408,321,422,13331,426,461,76','var'=>"packedcss"),$_smarty_tpl);?>

	<?php echo smarty_function_xr_lessWrapper(array('ids'=>'6,7'),$_smarty_tpl);?>

	
	<script type="text/javascript">
    top.P_LANG='<?php echo $_smarty_tpl->getVariable('P_LANG')->value;?>
';
    top.P_ID=<?php echo $_smarty_tpl->getVariable('P_ID')->value;?>
;
    top.str_yes = '<?php echo smarty_function_xr_translate(array('tag'=>"Ja"),$_smarty_tpl);?>
';
    top.str_no = '<?php echo smarty_function_xr_translate(array('tag'=>"Nein"),$_smarty_tpl);?>
';
    top.delete_word1 = '<?php echo smarty_function_xr_translate(array('tag'=>"###loeschen_wort1###"),$_smarty_tpl);?>
';
    top.delete_word2 = '<?php echo smarty_function_xr_translate(array('tag'=>"###loeschen_wort2###"),$_smarty_tpl);?>
';
    </script>

    <style>
        .container
        {
            position: absolute;
            top: 10%; left: 10%; right: 0; bottom: 0;
        }
        .action
        {
            width: 400px;
            height: 30px;
            margin: 10px 0;
        }
        .cropped>img
        {
            margin-right: 10px;
        }
        .imageBox
        {
            position: relative;
            height: 400px;
            width: 400px;
            border:1px solid #aaa;
            background: #fff;
            overflow: hidden;
            background-repeat: no-repeat;
            cursor:move;
        }

        .imageBox .thumbBox
        {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 200px;
            height: 200px;
            margin-top: -100px;
            margin-left: -100px;
            border: 1px solid rgb(102, 102, 102);
            box-shadow: 0 0 0 1000px rgba(0, 0, 0, 0.5);
            background: none repeat scroll 0% 0% transparent;
        }

        .imageBox .spinner
        {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            text-align: center;
            line-height: 400px;
            background: rgba(0,0,0,0.7);
        }
</style>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
    
  
	
	<body>
	    <!-- Google Tag Manager -->
        <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-P99D63"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-P99D63');</script>
        <!-- End Google Tag Manager -->
	    
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

        <!-- HEADER ATOM -->
        <?php echo smarty_function_xr_atom(array('a_id'=>642,'return'=>1),$_smarty_tpl);?>


        <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

        <?php echo smarty_function_xr_atom(array('a_id'=>761,'return'=>1,'desc'=>"img upload modal"),$_smarty_tpl);?>

        
        
        <script src=" http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
        <script src="/xstorage/template/Cropbox/javascript/cropbox.js" type="text/javascript"></script>
        <script src="/xstorage/template/Cropbox/javascript/cropbox-min.js" type="text/javascript"></script>
        
 
        <?php echo smarty_function_xr_atom(array('a_id'=>794,'return'=>1,'desc'=>'face in use'),$_smarty_tpl);?>

        <!-- FOOTER ATOM -->
        
		<?php echo smarty_function_xr_atom(array('a_id'=>704,'return'=>1,'desc'=>'js files'),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>757,'return'=>1,'desc'=>'ajax loader'),$_smarty_tpl);?>

        
        <?php echo smarty_function_xr_jsWrapper(array('s_id'=>17281),$_smarty_tpl);?>

        
        
	</body>
</html>