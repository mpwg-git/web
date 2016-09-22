<?php /* Smarty version Smarty-3.0.7, created on 2015-01-13 13:25:05
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeD97uXe" */ ?>
<?php /*%%SmartyHeaderCode:59521831954b50ea1bf3d24-25333031%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5875d15c66419df942b53e688005e0525b76a4c2' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeD97uXe',
      1 => 1421151905,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59521831954b50ea1bf3d24-25333031',
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
        },200);
        </script>
    </div>
    
   
</div>
<?php }?>