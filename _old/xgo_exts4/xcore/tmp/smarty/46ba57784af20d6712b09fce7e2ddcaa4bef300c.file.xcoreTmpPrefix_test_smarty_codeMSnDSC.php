<?php /* Smarty version Smarty-3.0.7, created on 2014-12-09 18:09:25
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMSnDSC" */ ?>
<?php /*%%SmartyHeaderCode:9404840854873ad57a4f98-10395630%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46ba57784af20d6712b09fce7e2ddcaa4bef300c' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMSnDSC',
      1 => 1418148565,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9404840854873ad57a4f98-10395630',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'oa_validation::showAds','var'=>'showAds'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->getVariable('showAds')->value){?>
<div class="adimagecontainer">
    
    <!-- google 320x50 -->
    <div class="google">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle"
             style="display:inline-block;width:320px;height:50px"
             data-ad-client="ca-pub-8088043234061812"
             data-ad-slot="8018508683"></ins>
        <script>
        setTimeout(function(){
            (adsbygoogle = window.adsbygoogle || []).push({});
        },50);
        </script>
    </div>
    
    <!-- amazon 320x50 -->
    <div class="amazon">
        <iframe src="http://rcm-eu.amazon-adsystem.com/e/cm?t=luersarch-21&o=3&p=288&l=ez&f=ifr&f=ifr" width="320" height="50" scrolling="no" marginwidth="0" marginheight="0" border="0" frameborder="0" style="border:none;"></iframe>
    </div>
</div>
<?php }?>