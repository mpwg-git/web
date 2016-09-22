<?php /* Smarty version Smarty-3.0.7, created on 2015-07-09 11:20:17
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyew8Fm" */ ?>
<?php /*%%SmartyHeaderCode:1757179435559e3cd1e8a781-11435144%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38307075b768d16136616041c02fe7a6b7302d5d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyew8Fm',
      1 => 1436433617,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1757179435559e3cd1e8a781-11435144',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_papsch')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_papsch.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_cssWrapperV2')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_cssWrapperV2.php';
if (!is_callable('smarty_function_xr_lessWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_lessWrapper.php';
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
        
        <link type="text/css" rel="stylesheet" href="http://fast.fonts.net/cssapi/e6956f03-3bdc-41f7-b5f4-ace0569aaedf.css"/>
        
		<?php echo smarty_function_xr_cssWrapperV2(array('s_ids'=>'89,15,50,178,76,39,26','var'=>"packedcss"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_lessWrapper(array('ids'=>'4,5'),$_smarty_tpl);?>


		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
        
        <!-- HEADER ATOM --->
        <?php echo smarty_function_xr_atom(array('a_id'=>642,'return'=>1),$_smarty_tpl);?>


        <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

        
        <!-- TEST ATOM --->
        <?php echo smarty_function_xr_atom(array('a_id'=>644,'return'=>1),$_smarty_tpl);?>

        
        <!-- FOOTER ATOM --->
        <?php echo smarty_function_xr_atom(array('a_id'=>643,'return'=>1),$_smarty_tpl);?>

        
		<!-- Bootstrap core JavaScript -->
        <?php echo smarty_function_xr_jsWrapperV2(array('s_ids'=>'97,93,77,177,51,48','var'=>"packedjs"),$_smarty_tpl);?>

	</body>
</html>
