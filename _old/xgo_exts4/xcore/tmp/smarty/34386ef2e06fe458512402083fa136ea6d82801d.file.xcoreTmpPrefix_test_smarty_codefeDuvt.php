<?php /* Smarty version Smarty-3.0.7, created on 2014-12-09 18:14:05
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codefeDuvt" */ ?>
<?php /*%%SmartyHeaderCode:19070928354873bedde9b30-17799343%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34386ef2e06fe458512402083fa136ea6d82801d' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codefeDuvt',
      1 => 1418148845,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19070928354873bedde9b30-17799343',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'oa_validation::showAds','var'=>'showAds'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->getVariable('showAds')->value){?>
<div class="adimagecontainer visible-992">

    <!-- google 300x250 -->
    <div class="google">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle"
             style="display:inline-block;width:300px;height:250px"
             data-ad-client="ca-pub-8088043234061812"
             data-ad-slot="9774443486"></ins>
        <script>
        setTimeout(function(){
            (adsbygoogle = window.adsbygoogle || []).push({});
        },200);
        </script>
    </div>
    
    <!-- amazon 300x250 -->
    <div class="amazon">
        <iframe src="http://rcm-eu.amazon-adsystem.com/e/cm?t=luersarch-21&o=3&p=12&l=ez&f=ifr&f=ifr" width="300" height="250" scrolling="no" marginwidth="0" marginheight="0" border="0" frameborder="0" style="border:none;"></iframe>
    </div>
</div>
<?php }?>