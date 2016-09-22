<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 12:51:35
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2r7Gtb" */ ?>
<?php /*%%SmartyHeaderCode:4197713355d5b137ee7838-81199051%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98b4a63b4bc4ceaa4faad6ada68f97b3cc76e11c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2r7Gtb',
      1 => 1440067895,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4197713355d5b137ee7838-81199051',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn",'var'=>"loggedin"),$_smarty_tpl);?>


<div class="searchlist">
    
    <div class="row picture-row search-slider rsDefault js-replacer-search">
        
        <?php echo $_smarty_tpl->getVariable('results')->value['HTML'];?>

        
    </div>
    
</div>