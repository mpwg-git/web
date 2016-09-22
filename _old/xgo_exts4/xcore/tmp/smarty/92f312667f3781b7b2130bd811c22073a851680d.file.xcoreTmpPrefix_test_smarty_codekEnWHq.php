<?php /* Smarty version Smarty-3.0.7, created on 2015-01-13 13:22:20
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekEnWHq" */ ?>
<?php /*%%SmartyHeaderCode:68161867354b50dfc554f88-27553405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92f312667f3781b7b2130bd811c22073a851680d' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekEnWHq',
      1 => 1421151740,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68161867354b50dfc554f88-27553405',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'oa_validation::showAds','var'=>'showAds'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->getVariable('showAds')->value||$_REQUEST['showads']==1){?>
<div class="adimagecontainer">

    <!-- google 728x90 -->
    <div class="google">
        <ins class="adsbygoogle"
             style="display:inline-block;width:728px;height:90px"
             data-ad-client="ca-pub-8088043234061812"
             data-ad-slot="9184930280"></ins>
        <script>
        setTimeout(function(){
            (adsbygoogle = window.adsbygoogle || []).push({});
        },100);
        </script>
    </div>
    
    
</div>
<?php }?>