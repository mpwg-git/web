<?php /* Smarty version Smarty-3.0.7, created on 2016-01-19 18:17:02
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOr2AD1" */ ?>
<?php /*%%SmartyHeaderCode:1173198221569e6f8e7c38a3-78517716%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de4c97dcafb4e029ba20e493b0a13acb2d3d7ce2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOr2AD1',
      1 => 1453223822,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1173198221569e6f8e7c38a3-78517716',
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
if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
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
	
		
    <meta property="og:site_name" content="WhoShowersFirst"/>
    <meta property="og:type" content="website" />
    
    <?php if ($_smarty_tpl->getVariable('P_ID')->value==46){?>
        <?php echo smarty_function_xr_wz_fetch(array('id'=>834,'wz_online'=>'Y','r_id'=>$_REQUEST['blogId'],'var'=>'blogEntry'),$_smarty_tpl);?>

        <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_vanityurls::sc_get_blog_detail_url','blogId'=>$_REQUEST['blogId'],'var'=>'blogEntryURL'),$_smarty_tpl);?>

        
        <?php if ($_smarty_tpl->getVariable('blogEntry')->value['wz_BILD']>0){?>
            <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('blogEntry')->value['wz_BILD'],'ext'=>'jpg','w'=>600,'var'=>'blogPostImage'),$_smarty_tpl);?>

        <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars['blogPostImage'] = new Smarty_variable(false, null, null);?>
        <?php }?>
        
        <meta property="og:title" content="<?php echo $_smarty_tpl->getVariable('blogEntry')->value['wz_HEADLINE'];?>
" />
        <meta property="og:description" content="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('blogEntry')->value['wz_TEXT']);?>
" />
        <?php if ($_smarty_tpl->getVariable('blogPostImage')->value){?>
            <meta property="og:image" content="http://www.whoshowersfirst.com<?php echo $_smarty_tpl->getVariable('blogPostImage')->value['src'];?>
"/>
        <?php }?>
        <meta property="og:url" content="http://www.whoshowersfirst.com<?php echo $_smarty_tpl->getVariable('blogEntryURL')->value;?>
" />
        
        <meta name="twitter:title" content="<?php echo $_smarty_tpl->getVariable('blogEntry')->value['wz_HEADLINE'];?>
" />
        <meta name="twitter:description" content="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('blogEntry')->value['wz_TEXT']);?>
" />
        <meta name="twitter:image" content="http://www.whoshowersfirst.com<?php echo $_smarty_tpl->getVariable('blogPostImage')->value['src'];?>
" />
        <meta name="twitter:url" content="http://www.whoshowersfirst.com<?php echo $_smarty_tpl->getVariable('blogEntryURL')->value;?>
" />
    
        <meta name="description" content="<?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->getVariable('blogEntry')->value['wz_TEXT']);?>
" />
    
    <?php }else{ ?>
        
        <?php echo smarty_function_xr_img(array('s_id'=>167,'ext'=>'jpg','w'=>300,'var'=>'ogImage'),$_smarty_tpl);?>

        
        <meta property="og:title" content="WhoShowersFirst.com - <?php echo smarty_function_xr_translate(array('tag'=>'Deine persönliche WG-Suchmaschine'),$_smarty_tpl);?>
" />
        <meta property="og:description" content="<?php echo smarty_function_xr_translate(array('tag'=>'Suchen'),$_smarty_tpl);?>
.<?php echo smarty_function_xr_translate(array('tag'=>'Matchen'),$_smarty_tpl);?>
.<?php echo smarty_function_xr_translate(array('tag'=>'Wohnen'),$_smarty_tpl);?>
. <?php echo smarty_function_xr_translate(array('tag'=>'Du entscheidest was dir wichtig ist und wir zeigen dir durch schnelle und simple Fragen wer zu dir passt'),$_smarty_tpl);?>
." />
        <meta property="og:image" content="http://www.whoshowersfirst.com<?php echo $_smarty_tpl->getVariable('ogImage')->value['src'];?>
"/>
        <meta property="og:url" content="http://www.whoshowersfirst.com" />
        
        
        
    <?php }?>	
	
	
	
	
	
	
	
	
	
	
	
</head>