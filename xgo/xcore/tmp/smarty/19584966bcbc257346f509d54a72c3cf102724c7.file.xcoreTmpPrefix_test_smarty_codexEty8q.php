<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 10:23:43
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexEty8q" */ ?>
<?php /*%%SmartyHeaderCode:211823366755cb028fe60a53-48309291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19584966bcbc257346f509d54a72c3cf102724c7' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexEty8q',
      1 => 1439367823,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211823366755cb028fe60a53-48309291',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_search::sc_getResults",'var'=>"html"),$_smarty_tpl);?>


<div class="searchlist">
    
    <div class="pfeil pfeil-up searchlist-js-up">
        <span class="icon-pfeil_bg">
		<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span>
		</span>
    </div>
    
    <div class="row picture-row js-replacer-search">
        
        <?php echo $_smarty_tpl->getVariable('html')->value;?>

        
    </div>
    
    <div class="pfeil pfeil-down searchlist-js-down">
        <span class="icon-pfeil_bg">
		<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span>
		</span>
    </div>
    
</div>