<?php /* Smarty version Smarty-3.0.7, created on 2015-12-21 16:27:56
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/656.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:117847588056781a7c63d145-11088359%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b07758f297820a31e274ca9a648097193b179495' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/656.cache.html',
      1 => 1450711673,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117847588056781a7c63d145-11088359',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn",'var'=>"loggedin"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_refreshSessionData','var'=>'xxx'),$_smarty_tpl);?>


<div class="searchlist">
    
    <div class="row picture-row js-replacer-search">
        
        <?php echo $_smarty_tpl->getVariable('results')->value['HTML'];?>

        
    </div>
    
</div>