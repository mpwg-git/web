<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 18:18:42
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeImSuFs" */ ?>
<?php /*%%SmartyHeaderCode:81095293955d5fde22ca4f6-52746797%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0aa3880d0653dec71091c9df6909ed6a0b2f824e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeImSuFs',
      1 => 1440087522,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81095293955d5fde22ca4f6-52746797',
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