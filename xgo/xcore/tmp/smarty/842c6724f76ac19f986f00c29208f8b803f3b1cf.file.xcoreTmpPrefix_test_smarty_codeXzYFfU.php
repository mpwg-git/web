<?php /* Smarty version Smarty-3.0.7, created on 2015-11-16 12:49:37
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeXzYFfU" */ ?>
<?php /*%%SmartyHeaderCode:2835453845649c2d1b69a27-24027724%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '842c6724f76ac19f986f00c29208f8b803f3b1cf' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeXzYFfU',
      1 => 1447674577,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2835453845649c2d1b69a27-24027724',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_papsch')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_papsch.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_cssWrapperV2')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_cssWrapperV2.php';
if (!is_callable('smarty_function_xr_lessWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_lessWrapper.php';
?><head>
    <meta charset="utf-8"><?php echo $_smarty_tpl->getVariable('CMS')->value;?>

    <!--[if lt IE 11]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="icon" href="/xstorage/template/img/favicon/favicon.ico">
	
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
    
	<?php echo smarty_function_xr_cssWrapperV2(array('s_ids'=>'89,15,50,11998,178,76,39,26,402,408,461,461','var'=>"packedcss"),$_smarty_tpl);?>

	<?php echo smarty_function_xr_lessWrapper(array('ids'=>'8,9'),$_smarty_tpl);?>

	
	<script type="text/javascript">
    top.P_LANG='<?php echo $_smarty_tpl->getVariable('P_LANG')->value;?>
';
    </script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>