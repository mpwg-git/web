<?php /* Smarty version Smarty-3.0.7, created on 2016-01-14 13:28:49
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/866.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:164704756956979481a32a17-54826202%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d292745d339ed4460bdfc9b6af291d8470c7edf' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/866.cache-1.html',
      1 => 1452607753,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164704756956979481a32a17-54826202',
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
.resize-container {
    position: relative;
    display: inline-block;
    cursor: move;
    margin: 0 auto;
    }

.resize-container img {
    display: block
}
    
.resize-container:hover img,
.resize-container:active img {
    outline: 2px dashed rgba(222,60,80,.9);
    }
.resize-handle-ne,
.resize-handle-ne,
.resize-handle-se,
.resize-handle-nw,
.resize-handle-sw {
    position: absolute;
    display: block;
    width: 10px;
    height: 10px;
    background: rgba(222,60,80,.9);
    z-index: 999;
    }

.resize-handle-nw {
    top: -5px;
    left: -5px;
    cursor: nw-resize;
    }

.resize-handle-sw {
    bottom: -5px;
    left: -5px;
    cursor: sw-resize;
    }

.resize-handle-ne {
    top: -5px;
    right: -5px;
    cursor: ne-resize;
    }

.resize-handle-se {
    bottom: -5px;
    right: -5px;
    cursor: se-resize;
    }
    .overlay {
    position: absolute;
    left: 50%;
    top: 50%;
    margin-left: -100px;
    margin-top: -100px;
    z-index: 999;
    width: 200px;
    height: 200px;
    border: solid 2px rgba(222,60,80,.9);
    box-sizing: content-box;
    pointer-events: none;
}

.overlay:after,
.overlay:before {
    content: '';
    position: absolute;
    display: block;
    width: 204px;
    height: 40px;
    border-left: dashed 2px rgba(222,60,80,.9);
    border-right: dashed 2px rgba(222,60,80,.9);
}

.overlay:before {
    top: 0;
    margin-left: -2px;
    margin-top: -40px;
}

.overlay:after {
    bottom: 0;
    margin-left: -2px;
    margin-bottom: -40px;
}

.overlay-inner:after,
.overlay-inner:before {
    content: '';
    position: absolute;
    display: block;
    width: 40px;
    height: 204px;
    border-top: dashed 2px rgba(222,60,80,.9);
    border-bottom: dashed 2px rgba(222,60,80,.9);
}

.overlay-inner:before {
    left: 0;
    margin-left: -40px;
    margin-top: -2px;
}

.overlay-inner:after {
    right: 0;
    margin-right: -40px;
    margin-top: -2px;
}

.btn-crop {
    position: absolute;
    vertical-align: bottom;
    right: 5px;
    bottom: 5px;
    padding: 6px 10px;
    z-index: 999;
    background-color: rgb(222,60,80);
    border: none;
    border-radius: 5px;
    color: #FFF;
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
       
        
 
        <?php echo smarty_function_xr_atom(array('a_id'=>794,'return'=>1,'desc'=>'face in use'),$_smarty_tpl);?>

        <!-- FOOTER ATOM -->
        
		<?php echo smarty_function_xr_atom(array('a_id'=>704,'return'=>1,'desc'=>'js files'),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>757,'return'=>1,'desc'=>'ajax loader'),$_smarty_tpl);?>

        
        <?php echo smarty_function_xr_jsWrapper(array('s_id'=>17270),$_smarty_tpl);?>

        
        
	</body>
</html>