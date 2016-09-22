<?php /* Smarty version Smarty-3.0.7, created on 2015-01-13 13:09:53
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaMF2bE" */ ?>
<?php /*%%SmartyHeaderCode:48522103054b50b111f2967-70949849%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7fcf6a9798529b7273c1b6bc579c1f1b174aedf' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeaMF2bE',
      1 => 1421150993,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48522103054b50b111f2967-70949849',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'oa_validation::showAds','var'=>'showAds'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->getVariable('showAds')->value||$_REQUEST['showads']==1){?>
<div class="adimagecontainer">

    <!-- google 300x250 -->
    <div class="google">
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
    
</div>
<?php }?>