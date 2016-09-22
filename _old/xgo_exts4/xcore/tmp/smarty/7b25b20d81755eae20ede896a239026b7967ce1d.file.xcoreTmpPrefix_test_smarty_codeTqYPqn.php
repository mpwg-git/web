<?php /* Smarty version Smarty-3.0.7, created on 2014-12-09 19:50:22
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTqYPqn" */ ?>
<?php /*%%SmartyHeaderCode:13064736145487527ece3ba5-26958981%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b25b20d81755eae20ede896a239026b7967ce1d' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTqYPqn',
      1 => 1418154622,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13064736145487527ece3ba5-26958981',
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
    
    
</div>
<?php }?>