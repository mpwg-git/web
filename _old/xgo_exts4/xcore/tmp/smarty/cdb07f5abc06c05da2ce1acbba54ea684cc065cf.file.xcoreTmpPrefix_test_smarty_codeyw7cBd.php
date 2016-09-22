<?php /* Smarty version Smarty-3.0.7, created on 2015-01-13 12:27:11
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyw7cBd" */ ?>
<?php /*%%SmartyHeaderCode:124717575154b5010f99d115-56397761%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdb07f5abc06c05da2ce1acbba54ea684cc065cf' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyw7cBd',
      1 => 1421148431,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124717575154b5010f99d115-56397761',
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
    },400);
    </script>
</div>
<?php }?>