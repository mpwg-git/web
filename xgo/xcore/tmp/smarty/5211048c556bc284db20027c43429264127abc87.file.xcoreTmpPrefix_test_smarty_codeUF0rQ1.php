<?php /* Smarty version Smarty-3.0.7, created on 2017-02-08 18:53:46
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeUF0rQ1" */ ?>
<?php /*%%SmartyHeaderCode:422803004589b5b2a77aa27-32970874%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5211048c556bc284db20027c43429264127abc87' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeUF0rQ1',
      1 => 1486576426,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '422803004589b5b2a77aa27-32970874',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_lessWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_lessWrapper.php';
if (!is_callable('smarty_function_xr_cssWrapperV2')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_cssWrapperV2.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_cssWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_cssWrapper.php';
?><head>

    <!-- Google Tag Manager -->
    <!--
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-52J8F5');</script>
    -->
    <!-- End Google Tag Manager -->
    
    <meta charset="utf-8">
	 <?php echo $_smarty_tpl->getVariable('CMS')->value;?>

    <!--[if lt IE 11]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->

	<!--<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="Author" content="MeinePerfekteWG.com">
    <meta name="description" content="<?php echo $_smarty_tpl->getVariable('DESCRIPTION')->value;?>
" />
    <meta name="keywords" content="<?php echo $_smarty_tpl->getVariable('KEYWORDS')->value;?>
" />


    <?php if ($_smarty_tpl->getVariable('ROBOTS')->value=='1'){?><meta name="robots" content="noindex" /><?php }?>

    <link rel="canonical" href="https://www.meineperfektewg.com">

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
</title>
    <?php }else{ ?>
        <?php if ($_smarty_tpl->getVariable('TITLETAG')->value!=''){?>
            <title><?php echo $_smarty_tpl->getVariable('TITLETAG')->value;?>
<?php if ($_smarty_tpl->getVariable('P_ID')->value!='184'){?><?php }?></title>
        <?php }elseif($_smarty_tpl->getVariable('AHEADLINE')->value!=''){?>
            <title><?php echo $_smarty_tpl->getVariable('AHEADLINE')->value;?>
</title>
        <?php }else{ ?>
            <title><?php echo smarty_function_xr_translate(array('tag'=>'###SITE_TITLE###'),$_smarty_tpl);?>
</title>
        <?php }?>
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

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1029349123846307');
        fbq('track', "PageView");
    </script>

    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1029349123846307&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<?php echo smarty_function_xr_atom(array('a_id'=>890,'return'=>1,'desc'=>"og stuff"),$_smarty_tpl);?>


    <?php if ($_smarty_tpl->getVariable('P_ID')->value==1){?>
    	<style>
            * {box-sizing: border-box}html {font-family: sans-serif;text-size-adjust: 100%;font-size: 10px;-webkit-tap-highlight-color: rgba(0, 0, 0, 0)}body,html {height: 100%}html,body {height: 100%}body {margin: 0;font-family: HelveticaNeueW01-45Ligh;font-size: 16px;line-height: 1.42857;color: #333;background-color: #fff;overflow-y: hidden}.fb_reset,a {text-transform: none}.fb_reset,[class*=" icon-"],[class^="icon-"] {font-style: normal;font-weight: 400;font-variant-ligatures: normal;font-variant-caps: normal;line-height: 1}.fb_reset {background: 0;border: 0;border-spacing: 0;color: #000;cursor: auto;direction: ltr;font-family: "lucida grande", tahoma, verdana, arial, sans-serif;font-size: 11px;letter-spacing: normal;margin: 0;overflow: visible;padding: 0;text-align: left;text-indent: 0;text-shadow: none;visibility: visible;white-space: normal;word-spacing: normal;font-style: normal;font-variant-ligatures: normal;font-variant-caps: normal;font-weight: normal;line-height: 1;text-transform: none;text-decoration: none}.fb_reset>div {overflow: hidden}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section,summary {display: block}header {background: #000;position: relative;z-index: 9;min-width: 992px!important}.left-row,.middle-row,.right-row {float: left;position: relative;overflow-x: hidden;overflow-y: visible;height: calc(100% - 2.556vw)}.left-row {width: 22.5%;padding: 32px 32px 20px}header .left-row {background: transparent;height: auto;overflow-x: hidden;padding: 0;overflow-y: visible}header nav.left-row {padding-left: 15px}header nav .main-nav {padding-top: 8px;padding-bottom: 8px}a {background-color: transparent;color: inherit;text-transform: none;text-decoration: none}a,a:active,a:focus,a:hover {outline: 0!important}a,a:hover,a:active,a:focus {outline: 0!important}header a {text-transform: uppercase}img {border: 0;vertical-align: middle}.middle-row {width: 55%;background: #fff;overflow-x: hidden;height: 99%}header .middle-row {background: transparent;height: auto;overflow: auto}.right-row {height: calc(100% - 4.97vw);width: 22.5%}header .right-row {height: auto;overflow: auto}header nav.right-row {padding-right: 15px}.pull-right {float: right!important}header nav .main-nav .navlinks {color: #8d98a0;font-family: HelveticaNeueW01-ThinCn_673383;display: inline-block;font-size: 18px;text-transform: uppercase}header nav .main-nav .navlinks.active {color: #04e0d7}.cookie-warning-top {background: #04e0d7;color: #000;width: 100%;padding: 10px 15px 10px 20px;position: absolute;z-index: 2;opacity: 0;transform: translate(0px, -100%);transition: all 300ms ease}.cookie-warning-top.active {transform: translate(0px, 0px);opacity: 1}.cookie-warning-top .text {float: left;width: calc(100% - 3vw)}[class*=" icon-"],[class^="icon-"] {font-family: icomoon;speak: none;text-transform: none;-webkit-font-smoothing: antialiased}[class^="icon-"],[class*=" icon-"] {font-family: icomoon;speak: none;font-style: normal;font-weight: normal;font-variant-ligatures: normal;font-variant-caps: normal;text-transform: none;line-height: 1;-webkit-font-smoothing: antialiased}.cookie-warning-top .closing-icon {float: right;font-size: 1.3vw;cursor: pointer}.all-rows-container-top {height: 96%;max-width: 1920px;margin-left: auto;margin-right: auto;position: relative;overflow-x: auto!important;min-width: 992px!important}.all-rows-container {height: 99%;min-width: 992px!important}.mCustomScrollbar.mCS_no_scrollbar,.mCustomScrollbar.mCS_touch_action {touch-action: auto}.mCustomScrollBox {position: relative;overflow: hidden;height: 100%;max-width: 100%;outline: 0;direction: ltr}.mCSB_container {overflow: hidden;width: auto;height: auto}.mCSB_inside>.mCSB_container {margin-right: 15px}.mCSB_container.mCS_no_scrollbar_y.mCS_y_hidden {margin-right: 0}.einleitungstext {font-family: jaapokkiregular}.einleitungstext a {color: inherit!important;text-decoration: none!important}.search-start .einleitungstext span {text-transform: uppercase;background: #04e0d7;color: #fff;font-size: 55px;line-height: 80px;height: 67px;padding-left: 7px;padding-right: 7px;display: inline-block;position: relative}.search-start .einleitungstext span .drduck {color: #000;position: absolute;left: calc(110%);background: transparent;top: 0}.h1,.h2,.h3,.h4,.h5,.h6,h1,h2,h3,h4,h5,h6 {font-family: inherit;font-weight: 500;line-height: 1.1;color: inherit}.h1,.h2,.h3,h1,h2,h3 {margin-top: 20px;margin-bottom: 10px}h1,h2,h3 {color: #04e0d7;margin: 0;font-family: jaapokkiregular}h2 {color: #04e0d7!important;font-family: HelveticaNeueW01-ThinCn_673383!important;font-size: 2.7rem!important;letter-spacing: inherit!important;margin-top: 4rem!important;text-transform: uppercase!important}.h2,h2 {font-size: 30px}.search-start h2.find {color: #000!important;font-family: HelveticaNeueW01-ThinCn_673383!important;font-size: 2.7rem!important;font-weight: bold!important;letter-spacing: inherit!important;margin-top: 5rem!important;text-align: left!important;text-transform: uppercase!important}.search-start .einleitungstext span.icons {line-height: initial;padding-left: 0;height: auto;background: #fff;font-size: 55px}.search-start .einleitungstext span.icons span {line-height: initial;height: auto;background: #fff;color: #000;font-size: 35px;padding: 0}.fb_iframe_widget iframe,.mCSB_scrollTools {position: absolute}.mCSB_scrollTools {width: 16px;height: auto;left: auto;top: 0;right: 0;bottom: 0;opacity: .75;position: absolute}.mCSB_scrollTools,.mCSB_scrollTools .mCSB_buttonDown,.mCSB_scrollTools .mCSB_buttonLeft,.mCSB_scrollTools .mCSB_buttonRight,.mCSB_scrollTools .mCSB_buttonUp,.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar {transition: opacity .2s ease-in-out, background-color .2s ease-in-out}.mCSB_scrollTools,.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,.mCSB_scrollTools .mCSB_buttonUp,.mCSB_scrollTools .mCSB_buttonDown,.mCSB_scrollTools .mCSB_buttonLeft,.mCSB_scrollTools .mCSB_buttonRight {transition: opacity .2s ease-in-out, background-color .2s ease-in-out}.mCSB_scrollTools .mCSB_draggerContainer {position: absolute;top: 0;left: 0;bottom: 0;right: 0;height: auto}.mCSB_scrollTools .mCSB_dragger {cursor: pointer;width: 100%;height: 30px;z-index: 1}.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar {position: relative;width: 4px;height: 100%;margin: 0 auto;border-radius: 16px;text-align: center;background-color: rgba(255, 255, 255, 0.74902)}.mCSB_scrollTools .mCSB_draggerRail {width: 2px;height: 100%;margin: 0 auto;border-radius: 16px;background-color: rgba(0, 0, 0, 0.4)}.black-bg {background: #697984!important}.row {margin-right: -15px;margin-left: -15px;margin: 0 -2.2rem 0 -0.75rem}.start-overlay {position: absolute;top: 0;z-index: 1;background: url("/xstorage/template/img/start-overlay.png");height: 100%;width: 100%;margin-left: 0}.row.start-overlay {background-color: #697984}div.row:first-of-type {margin-top: 0}.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-xl-1,.col-xl-10,.col-xl-11,.col-xl-12,.col-xl-2,.col-xl-3,.col-xl-4,.col-xl-5,.col-xl-6,.col-xl-7,.col-xl-8,.col-xl-9,.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9,.col-xxl-1,.col-xxl-10,.col-xxl-11,.col-xxl-12,.col-xxl-2,.col-xxl-3,.col-xxl-4,.col-xxl-5,.col-xxl-6,.col-xxl-7,.col-xxl-8,.col-xxl-9 {float: left}.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9 {position: relative;min-height: 1px;padding: 0 15px;padding-right: 15px;padding-left: 15px}.col-xs-12 {width: 100%}.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9 {float: left}.col-xs-10 {width: 83.3333%}.col-xs-offset-1 {margin-left: 8.33333%}h1, .start-overlay h1 {color: #04e0d7;font-family: jaapokkiregular;font-size: 5rem;text-align: center;line-height: 1;letter-spacing: -0.099rem;padding: 2rem 1rem;}.start-overlay h2 {font-weight: bold;text-align: center!important;letter-spacing: .1rem!important}.button,button {display: inline-block;font-size: 16px;padding-top: 11px;padding-bottom: 11px;text-align: center;background: #04e0d7;color: #fff;text-transform: uppercase;border: 0}button,.button {display: inline-block;font-size: 16px;padding-top: 11px;padding-bottom: 11px;text-align: center;background: #04e0d7;color: #fff;text-transform: uppercase;border: 0}.button.start-button,p.start-text-1,p.start-text-2 {font-family: HelveticaNeueW01-65Medi;font-weight: 400}.button.start-button {width: 300px;font-size: 22px;font-family: HelveticaNeueW01-65Medi;font-weight: normal;border-radius: .4rem;text-shadow: #697984 1px 1px 1px;color: #fff!important}.col-xs-10.col-xs-offset-1 .button.start-button {text-align: center;margin: 0 auto 2rem}p {margin: 0 0 10px;font-family: HelveticaNeueW01-45Ligh}p.start-text {color: #fff;font-family: HelveticaNeueW01-45Ligh;font-size: 1.8rem;margin: 2rem 0 4rem;text-align: center;text-transform: none}.text-center {text-align: center}.button.start-button.start-button-wie {width: 340px;text-transform: none}div.row:last-of-type {margin-top: 0}.start-overlay .start-meinungen {color: #000}.row .start-meinungen-abstand {margin: 0;padding-top: 2rem}.start-overlay .start-meinungen .start-meinungen-abstand {padding-top: 24px}.row.start-meinungen-abstand:first-of-type {padding-top: 0}.col-xs-2 {width: 16.6667%}.carousel-inner>.item>a>img,.carousel-inner>.item>img,.img-responsive,.thumbnail a>img,.thumbnail>img {display: block;max-width: 100%;height: auto}p.start-aussagen {color: #fff;font-family: HelveticaNeueW01-45Ligh;font-size: 1.5rem}.col-xs-2 p.start-aussagen {font-size: 1.4rem;letter-spacing: .03rem}.picture-row {margin-left: -0.2rem;margin-right: -0.2rem}.col-xs-4 {width: 33.3333%}.picture-col {padding-left: 2px;padding-right: 2px;margin-bottom: 4px;transform: translateZ(0px)}.img-wrapper {width: 100%;overflow: hidden;position: relative;transition: all 300ms ease}.img-wrapper .inner-wrapper {height: 100%;width: 100%;position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%)}.right-row .content {margin: auto;width: 80%}.right-row.machmichbreiter .content {width: 90%}.right-row .logowrapper {text-align: center;padding-top: 50px}.right-row .logowrapper img {margin-left: auto;margin-right: auto;max-width: 200px}.right-row .blog {padding-top: 10px}.col-xl-4 {width: 33.3333%}.col-xxl-3 {width: 25%}.col-xl-1,.col-xl-2,.col-xl-3,.col-xl-4,.col-xl-5,.col-xl-6,.col-xl-7,.col-xl-8,.col-xl-9,.col-xl-10,.col-xl-11,.col-xl-12 {float: left}.col-xxl-1,.col-xxl-2,.col-xxl-3,.col-xxl-4,.col-xxl-5,.col-xxl-6,.col-xxl-7,.col-xxl-8,.col-xxl-9,.col-xxl-10,.col-xxl-11,.col-xxl-12 {float: left}.col-md-12,.col-sm-12 {width: 100%}.col-xl-8 {width: 66.6667%}.col-xxl-9 {width: 75%}.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9 {float: left}.col-sm-12 {width: 100%}.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9 {float: left}.col-md-12 {width: 100%}.header-wrapper {color: #04e0d7!important}.h3,h3 {font-size: 24px}h3 {margin-bottom: 10px;margin-top: 25px;font-size: 27px}h3,h3.headline {color: #04e0d7;font-family: jaapokkiregular;font-size: 2.7rem}.blog h3 {font-family: HelveticaNeueW01-65Medi;font-size: 1.6rem!important}.right-row .blog h3 {margin-top: 18px;font-size: 1.6rem}.right-row .blog.blog-start h3 {margin-top: 0}.right-row .date {font-family: HelveticaNeueW01-45Ligh!important;color: #333!important}.right-row .blog .date {font-size: 13px;color: #fff}.right-row .blog.blog-start .date {color: #000}.right-row .blog .text {color: #fff;font-size: 13px}.right-row .blog.blog-start .text {color: #000}hr {height: 0;box-sizing: content-box;margin-top: 20px;margin-bottom: 20px;border-width: 1px 0 0;border-image: initial;border-right-style: initial;border-bottom-style: initial;border-left-style: initial;border-right-color: initial;border-bottom-color: initial;border-left-color: initial;border-top-style: solid;border-top-color: #eee}.right-row .footer {margin-top: 20px;padding-bottom: 20px;padding-top: 15px;position: fixed;bottom: 0;font-size: 1.3rem!important;background: #fff;font-weight: normal;font-family: HelveticaNeueW01-45Ligh;text-transform: none;width: 18.5%}.right-row .footer .footer-bottom>a,.right-row .footer .footer-top>a {border-right: 1px solid #333;padding-right: 5px;text-transform: uppercase}.right-row .footer .footer-top>a,.right-row .footer .footer-bottom>a {border-right: 1px solid #333;padding-right: 5px;text-transform: uppercase}.right-row .footer .footer-top>a {border-right: .1rem solid #697984;padding-right: .5rem;text-transform: uppercase}.right-row .footer .footer-bottom>a>span,.right-row .footer .footer-top>a>span {font-size: 15px}.right-row .footer .footer-top>a>span {font-size: 1.8rem;text-shadow: #666 .126rem .126rem .126rem}.right-row .footer .footer-top>a>span,.right-row .footer .footer-bottom>a>span {font-size: 15px}.right-row .footer .footer-bottom>a:last-of-type,.right-row .footer .footer-top>a:last-of-type {border: none!important}.right-row .footer .footer-top>a:last-of-type,.right-row .footer .footer-bottom>a:last-of-type {border: none!important}.right-row .footer .footer-bottom>a {border-right: .1rem solid #697984;padding-right: .5rem;text-transform: uppercase}.right-row .footer .footer-bottom>a>span {font-size: 1.5rem}.right-row .footer img {height: 20px;width: auto}.modal,.upload-image-modal {display: none}.fade {opacity: 0;transition: opacity .15s linear}.modal {position: fixed;top: 0;right: 0;bottom: 0;left: 0;z-index: 1040;overflow: hidden;outline: 0;display: none}.upload-image-modal {display: none}.modal-dialog {position: relative;width: 600px;margin: 30px auto}.upload-image-modal .modal-dialog {top: 50px;bottom: 50px;position: absolute;left: 0;right: 0}.modal.fade .modal-dialog {transition: transform .3s ease-out;transform: translate(0px, -25%)}.modal-content {position: relative;background-color: #fff;-webkit-background-clip: padding-box;background-clip: padding-box;border: 1px solid rgba(0, 0, 0, 0.2);border-radius: 6px;outline: 0;box-shadow: rgba(0, 0, 0, 0.498039) 0 5px 15px}.modal-dialog .modal-content {height: 180px;background-color: #04e0d7}.upload-image-modal .modal-dialog .modal-body,.upload-image-modal .modal-dialog .modal-content {height: 100%}.upload-image-modal .modal-dialog .modal-content {height: 100%}.modal-body {position: relative;padding: 15px}.upload-image-modal .modal-dialog .modal-body {height: 100%}.upload-image-modal .modal-dialog .add-image-crop-area {height: calc(100% - 44px)!important}#EmailConfirmModal {padding-left: 0}.modal-header {min-height: 16.43px;padding: 15px;border-bottom: 1px solid #e5e5e5}.modal-dialog .modal-content .modal-header {height: 33.3333%;border: 0}div#EmailConfirmModal .modal-header {padding-bottom: 0}button,input,optgroup,select,textarea {font-family: inherit;font-size: inherit;line-height: inherit;margin: 0;font-style: inherit;font-variant: inherit;font-weight: inherit;font-stretch: inherit;color: inherit}button {overflow: visible;outline: 0!important}button,select {text-transform: none}button,html input[type="button"],input[type="reset"],input[type="submit"] {-webkit-appearance: button;cursor: pointer}button,input,select,textarea {font-family: inherit;font-size: inherit;line-height: inherit}.close {float: right;font-size: 21px;font-weight: 700;line-height: 1;color: #000;text-shadow: #fff 0 1px 0;opacity: .2}button.close {-webkit-appearance: none;padding: 0;cursor: pointer;background: 0;border: 0}.modal-header .close {margin-top: -2px}div#EmailConfirmModal .modal-header .close {margin-top: -5px;opacity: .4;font-size: 25px}.h4,.h5,.h6,h4,h5,h6 {margin-top: 10px;margin-bottom: 10px}.h4,h4 {font-size: 18px}h4 {font-size: 1.9rem;letter-spacing: -0.025rem}.btn,.modal-title {line-height: 1.42857}.modal-title {margin: 0;line-height: 1.42857}div#EmailConfirmModal .modal-body {padding-top: 0}div#EmailConfirmModal button#sendEmailConfirmationAgain {margin-top: 20px;color: #fff;background-color: #697984;border: #fff;font-size: 14px;border-radius: 5px}.modal-footer {padding: 15px;text-align: right;border-top: 1px solid #e5e5e5}div#EmailConfirmModal .modal-footer {display: none;border: 0}.btn {display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: 400;text-align: center;white-space: nowrap;vertical-align: middle;touch-action: manipulation;cursor: pointer;user-select: none;background-image: none;border: 1px solid transparent;border-radius: 0;line-height: 1.42857}.btn-default {color: #333;background-color: #fff;border-color: #ccc}.ajax-loader {z-index: 9999;display: none;background: rgba(0, 0, 0, 0.8);width: 100%;position: fixed;top: 0;left: 0;right: 0;bottom: 0}#fountainG,.ajax-loader .text {height: 28px;margin: auto;right: 0;bottom: 0;left: 0}.ajax-loader .text {animation-delay: .2s;animation-name: show_animation_text;animation-duration: 1s;animation-fill-mode: forwards;opacity: 0;position: absolute;width: 100%;top: -25px;text-align: center;letter-spacing: 13px;color: #1caf9a;height: 28px;margin: auto;left: 0;right: 0;bottom: 0}#fountainG {position: absolute;width: 252px;top: 25px;height: 28px;margin: auto;left: 0;right: 0;bottom: 0}.fountainG {position: absolute;top: 0;width: 42px;height: 42px;animation-name: bounce_fountainG;animation-duration: 1.5s;animation-iteration-count: infinite;animation-direction: normal;transform: scale(0.3);border-radius: 19px}#fountainG_1 {left: 0;animation-delay: .6s}.fountainG span {font-size: 42px}#fountainG_2 {left: 42px;animation-delay: .75s}#fountainG_3 {left: 84px;animation-delay: .9s}#fountainG_4 {left: 126px;animation-delay: 1.05s}#fountainG_5 {left: 168px;animation-delay: 1.2s}#fountainG_6 {left: 210px;animation-delay: 1.35s} 
        </style>
        <!-- <?php echo smarty_function_xr_lessWrapper(array('ids'=>'18'),$_smarty_tpl);?>
 -->
    <?php }else{ ?>
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
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/xstorage/template/plugins/guillotine/jquery.guillotine.css"/>
</head>
