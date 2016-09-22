<?php /* Smarty version Smarty-3.0.7, created on 2014-12-09 18:11:35
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePGNY9a" */ ?>
<?php /*%%SmartyHeaderCode:22289323654873b571f7258-72316979%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a3cb60a1f05c48da5ca8545bb30a5a935069469' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codePGNY9a',
      1 => 1418148695,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22289323654873b571f7258-72316979',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'oa_validation::showAds','var'=>'showAds'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->getVariable('showAds')->value){?>
<div class="adimagecontainer hidden-1400 hidden-1400-on-mobile">

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