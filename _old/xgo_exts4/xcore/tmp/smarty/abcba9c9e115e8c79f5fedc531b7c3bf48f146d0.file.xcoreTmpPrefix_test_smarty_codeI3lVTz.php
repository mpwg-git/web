<?php /* Smarty version Smarty-3.0.7, created on 2015-01-13 13:09:40
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeI3lVTz" */ ?>
<?php /*%%SmartyHeaderCode:45108813254b50b04b64ed6-57044790%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'abcba9c9e115e8c79f5fedc531b7c3bf48f146d0' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeI3lVTz',
      1 => 1421150980,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45108813254b50b04b64ed6-57044790',
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
    
    <ins class="adsbygoogle"
         style="display:inline-block;width:300px;height:600px"
         data-ad-client="ca-pub-8088043234061812"
         data-ad-slot="8496186685"></ins>
    <script>
    setTimeout(function(){
        (adsbygoogle = window.adsbygoogle || []).push({});
    },170);
    </script>
</div>
<?php }?>