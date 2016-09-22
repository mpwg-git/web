<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 12:50:25
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeA4mB7x" */ ?>
<?php /*%%SmartyHeaderCode:102598856355d5b0f1018970-04818767%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75f2886140fac6ffc75daf64159ddc1dd9be3145' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeA4mB7x',
      1 => 1440067824,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102598856355d5b0f1018970-04818767',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn",'var'=>"loggedin"),$_smarty_tpl);?>


<div class="searchlist">
    
    <?php if ($_smarty_tpl->getVariable('results')->value['COUNT']>9){?>
        <div class="pfeil pfeil-up searchlist-js-up">
            <span class="icon-pfeil_bg">
    		<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span>
    		</span>
        </div>
    <?php }?>
    
    <div class="row picture-row js-replacer-search">
        
        <?php echo $_smarty_tpl->getVariable('results')->value['HTML'];?>

        
    </div>
    <?php if ($_smarty_tpl->getVariable('results')->value['COUNT']>9){?>
        <div class="pfeil pfeil-down searchlist-js-down">
            <span class="icon-pfeil_bg">
    		<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span>
    		</span>
        </div>
    <?php }?>
    
</div>