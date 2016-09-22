<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 18:17:40
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeWlDtvx" */ ?>
<?php /*%%SmartyHeaderCode:44795936855d5fda4ce9a71-60714830%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5891c6e92abb47ae7b08f107b67eecf201586490' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeWlDtvx',
      1 => 1440087460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44795936855d5fda4ce9a71-60714830',
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