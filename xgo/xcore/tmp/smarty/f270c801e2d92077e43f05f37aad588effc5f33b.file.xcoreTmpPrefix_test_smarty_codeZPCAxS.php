<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 15:41:00
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZPCAxS" */ ?>
<?php /*%%SmartyHeaderCode:41841752255cb4cec2e26d7-96741592%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f270c801e2d92077e43f05f37aad588effc5f33b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZPCAxS',
      1 => 1439386860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41841752255cb4cec2e26d7-96741592',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?>a
<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn"),$_smarty_tpl);?>


<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_search::sc_getResults",'var'=>"results"),$_smarty_tpl);?>


<div class="searchlist">
    
    <?php if ($_smarty_tpl->getVariable('results')->value['COUNT']>0){?>
        <div class="pfeil pfeil-up searchlist-js-up">
            <span class="icon-pfeil_bg">
    		<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span>
    		</span>
        </div>
    <?php }?>
    
    <div class="row picture-row js-replacer-search">
        
        <?php echo $_smarty_tpl->getVariable('results')->value['HTML'];?>

        
    </div>
    <?php if ($_smarty_tpl->getVariable('results')->value['COUNT']>0){?>
        <div class="pfeil pfeil-down searchlist-js-down">
            <span class="icon-pfeil_bg">
    		<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span>
    		</span>
        </div>
    <?php }?>
    
</div>