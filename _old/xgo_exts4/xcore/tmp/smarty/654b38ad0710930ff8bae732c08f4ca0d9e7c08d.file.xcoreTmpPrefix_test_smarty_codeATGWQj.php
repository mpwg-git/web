<?php /* Smarty version Smarty-3.0.7, created on 2015-01-13 13:21:48
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeATGWQj" */ ?>
<?php /*%%SmartyHeaderCode:155943487954b50ddcb23b22-59398291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '654b38ad0710930ff8bae732c08f4ca0d9e7c08d' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeATGWQj',
      1 => 1421151708,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155943487954b50ddcb23b22-59398291',
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
             data-ad-slot="7708197080"></ins>
        <script>
        setTimeout(function(){
            (adsbygoogle = window.adsbygoogle || []).push({});
        },50);
        </script>
    </div>
    
</div>
<?php }?>