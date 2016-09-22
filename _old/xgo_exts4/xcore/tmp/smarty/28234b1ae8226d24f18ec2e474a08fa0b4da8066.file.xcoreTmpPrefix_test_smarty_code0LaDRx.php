<?php /* Smarty version Smarty-3.0.7, created on 2015-01-13 13:00:05
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0LaDRx" */ ?>
<?php /*%%SmartyHeaderCode:99802225654b508c5736973-24591951%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28234b1ae8226d24f18ec2e474a08fa0b4da8066' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0LaDRx',
      1 => 1421150405,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99802225654b508c5736973-24591951',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'oa_validation::showAds','var'=>'showAds'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->getVariable('showAds')->value||$_REQUEST['showads']==1){?>
<div class="adimagecontainer">

    <!-- google 300x600 -->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <ins class="adsbygoogle"
         style="display:inline-block;width:300px;height:600px"
         data-ad-client="ca-pub-8088043234061812"
         data-ad-slot="8496186685"></ins>
    <script>
    setTimeout(function(){
        (adsbygoogle = window.adsbygoogle || []).push({});
    },150);
    </script>
</div>
<?php }?>