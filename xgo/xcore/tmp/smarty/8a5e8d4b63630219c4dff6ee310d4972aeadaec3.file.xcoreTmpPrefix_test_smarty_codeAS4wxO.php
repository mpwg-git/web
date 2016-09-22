<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 10:41:48
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAS4wxO" */ ?>
<?php /*%%SmartyHeaderCode:23963123555cb06cc4fbce4-57336704%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a5e8d4b63630219c4dff6ee310d4972aeadaec3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAS4wxO',
      1 => 1439368908,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23963123555cb06cc4fbce4-57336704',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_search::sc_getResults",'var'=>"results"),$_smarty_tpl);?>


<div class="searchlist">
    
    <div class="pfeil pfeil-up searchlist-js-up">
        <span class="icon-pfeil_bg">
		<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span>
		</span>
    </div>
    
    <div class="row picture-row js-replacer-search">
        
        <?php echo $_smarty_tpl->getVariable('results')->value['html'];?>

        
    </div>
    
    <div class="pfeil pfeil-down searchlist-js-down">
        <span class="icon-pfeil_bg">
		<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span>
		</span>
    </div>
    
</div>