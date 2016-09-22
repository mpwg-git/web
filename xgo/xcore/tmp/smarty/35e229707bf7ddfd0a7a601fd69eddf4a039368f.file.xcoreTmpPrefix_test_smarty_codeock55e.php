<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 15:41:26
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeock55e" */ ?>
<?php /*%%SmartyHeaderCode:181359071555cb4d06cac0d0-84782283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35e229707bf7ddfd0a7a601fd69eddf4a039368f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeock55e',
      1 => 1439386886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181359071555cb4d06cac0d0-84782283',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn",'var'=>"loggedin"),$_smarty_tpl);?>


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