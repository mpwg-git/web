<?php /* Smarty version Smarty-3.0.7, created on 2016-01-13 09:21:31
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6QT7ql" */ ?>
<?php /*%%SmartyHeaderCode:13920388575696090b125459-17813228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da417be55488b00cb93f001ec57176bb6effcd06' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6QT7ql',
      1 => 1452673291,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13920388575696090b125459-17813228',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn",'var'=>"loggedin"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_refreshSessionData','var'=>'xxx'),$_smarty_tpl);?>


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