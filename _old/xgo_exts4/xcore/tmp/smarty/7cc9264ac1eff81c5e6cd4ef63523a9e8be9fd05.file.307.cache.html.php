<?php /* Smarty version Smarty-3.0.7, created on 2015-02-24 15:47:40
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/307.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:79143813154ec8f0c6d7ee8-20464549%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cc9264ac1eff81c5e6cd4ef63523a9e8be9fd05' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/307.cache.html',
      1 => 1424789260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79143813154ec8f0c6d7ee8-20464549',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_papsch')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_papsch.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->getVariable('P_LANG')->value;?>
">
    <head>
        <meta charset="utf-8"><?php echo $_smarty_tpl->getVariable('CMS')->value;?>

		<!--[if lt IE 11]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="format-detection" content="telephone=no"> <!-- prevent iphone, tablet and safari making a phone number being blue color -->
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
		
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
        
        <!-- Geodaten -->
        <?php echo smarty_function_xr_atom(array('a_id'=>348,'return'=>1),$_smarty_tpl);?>

        
        <script type="text/javascript">
            top.DOMAIN="<?php echo smarty_function_xr_translate(array('tag'=>'###DOMAIN###'),$_smarty_tpl);?>
";
            top.P_LANG="<?php echo $_smarty_tpl->getVariable('P_LANG')->value;?>
";
        </script>
        
        <!-- CSS INCLUDES -->
        <?php echo smarty_function_xr_atom(array('a_id'=>342,'return'=>1),$_smarty_tpl);?>

    	
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    
	</head>
	<body>
        <!-- Google Tag Manager Snippet -->
        <?php echo smarty_function_xr_atom(array('a_id'=>351,'return'=>1),$_smarty_tpl);?>

        <header>
            
            <!-- Logos und Menüs im Header -->
            <?php echo smarty_function_xr_atom(array('a_id'=>346,'return'=>1),$_smarty_tpl);?>

            
            <!-- Royal Slider -->
            <div class="wrapper">
                <div class="royalSlider rsDefault">
                    <?php  $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('KEYVISUALS')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['k']->key => $_smarty_tpl->tpl_vars['k']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['k']->key;
?>
                        <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['k']->value['BILD'],'var'=>'bannerimg'),$_smarty_tpl);?>

                    	<a class="rsImg" href="<?php echo $_smarty_tpl->getVariable('bannerimg')->value['src'];?>
"><?php echo $_smarty_tpl->getVariable('bannerimg')->value['alt'];?>
</a>
                    <?php }} ?>
                </div>
            </div>
        </header>
    
        <main role="main">
            <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

        </main>
        
        <!-- Footer -->
        <?php echo smarty_function_xr_atom(array('a_id'=>313,'return'=>1),$_smarty_tpl);?>

        
		<!-- Javascript Includes -->
        <?php echo smarty_function_xr_atom(array('a_id'=>343,'return'=>1),$_smarty_tpl);?>


	</body>
</html>
