<?php /* Smarty version Smarty-3.0.7, created on 2014-12-09 18:10:22
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coderWqzfD" */ ?>
<?php /*%%SmartyHeaderCode:193754504354873b0e95de46-11773846%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a8c3752e0cffb633842add994cc6a4d73da7940' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coderWqzfD',
      1 => 1418148622,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193754504354873b0e95de46-11773846',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'oa_validation::showAds','var'=>'showAds'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->getVariable('showAds')->value){?>
<div class="adimagecontainer">

    <!-- google 728x90 -->
    <div class="google">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle"
             style="display:inline-block;width:728px;height:90px"
             data-ad-client="ca-pub-8088043234061812"
             data-ad-slot="1971975085"></ins>
        <script>
        setTimeout(function(){
            (adsbygoogle = window.adsbygoogle || []).push({});
        },100);
        </script>
    </div>
    
    <!-- amazon 728x90 -->
    <div class="amazon">
        <iframe src="http://rcm-eu.amazon-adsystem.com/e/cm?t=luersarch-21&o=3&p=48&l=ez&f=ifr&f=ifr" width="728" height="90" scrolling="no" marginwidth="0" marginheight="0" border="0" frameborder="0" style="border:none;"></iframe>
    </div>

</div>
<?php }?>