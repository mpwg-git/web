<?php /* Smarty version Smarty-3.0.7, created on 2015-01-13 13:09:50
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeW8n68T" */ ?>
<?php /*%%SmartyHeaderCode:40851668954b50b0e19ca55-26129511%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'acd879f40ee8098335c34ecb4f46a293e6638e80' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeW8n68T',
      1 => 1421150990,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '40851668954b50b0e19ca55-26129511',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'oa_validation::showAds','var'=>'showAds'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->getVariable('showAds')->value||$_REQUEST['showads']==1){?>
<div class="adimagecontainer">
    
    <!-- google 320x50 -->
    <div class="google">
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
    
</div>
<?php }?>