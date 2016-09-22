<?php /* Smarty version Smarty-3.0.7, created on 2016-06-17 17:38:21
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeIPQPgr" */ ?>
<?php /*%%SmartyHeaderCode:7826617895764196d6cf1f1-85464439%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0fa26c2cb44a816d27cbaa3c99361bb98493c30' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeIPQPgr',
      1 => 1466177901,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7826617895764196d6cf1f1-85464439',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_papsch')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_papsch.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_cssWrapperV2')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_cssWrapperV2.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_cssWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_cssWrapper.php';
if (!is_callable('smarty_function_xr_lessWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_lessWrapper.php';
?><head>
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    
	<?php echo smarty_function_xr_cssWrapperV2(array('s_ids'=>'89,15,178,11998,76,39,26,17209,402,408,321,422,13331,426,461,76','var'=>"packedcss"),$_smarty_tpl);?>

	
	<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_util::isNewLayout",'var'=>"newlayout"),$_smarty_tpl);?>

	
	<?php if ($_smarty_tpl->getVariable('newlayout')->value==1){?>
	     
	     
	     <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_util::isV2",'var'=>"isV2"),$_smarty_tpl);?>

	
         <?php if ($_smarty_tpl->getVariable('isV2')->value==1){?>
         
         <?php echo smarty_function_xr_cssWrapper(array('s_id'=>18475),$_smarty_tpl);?>

         <?php echo smarty_function_xr_cssWrapper(array('s_id'=>18557),$_smarty_tpl);?>

         
	     <?php echo smarty_function_xr_lessWrapper(array('ids'=>'13,14'),$_smarty_tpl);?>

	     <?php }else{ ?>
	     <?php echo smarty_function_xr_lessWrapper(array('ids'=>'11,12'),$_smarty_tpl);?>

	     <?php }?>
	     
	<?php }else{ ?>
	    <?php echo smarty_function_xr_lessWrapper(array('ids'=>'6,7'),$_smarty_tpl);?>

	<?php }?>

	
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
    top.deactivate_word1 = '<?php echo smarty_function_xr_translate(array('tag'=>"###loeschen_wort1###"),$_smarty_tpl);?>
';
    top.deactivate_word2 = '<?php echo smarty_function_xr_translate(array('tag'=>"deaktivieren"),$_smarty_tpl);?>
';
    top.activate_word1 = '<?php echo smarty_function_xr_translate(array('tag'=>"###loeschen_wort1###"),$_smarty_tpl);?>
';
    top.activate_word2 = '<?php echo smarty_function_xr_translate(array('tag'=>"aktivieren"),$_smarty_tpl);?>
';
    </script>
    
    <style>	
	.smooth_zoom_preloader {
		background-image: url(/xstorage/template/img/preloader.gif);
	}	
	.smooth_zoom_icons {
		background-image: url(/xstorage/template/img/icons.png);
	}
    </style>
	

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
	<?php echo smarty_function_xr_atom(array('a_id'=>890,'return'=>1,'desc'=>"og stuff"),$_smarty_tpl);?>
	
	
	
</head>