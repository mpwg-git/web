<?php /* Smarty version Smarty-3.0.7, created on 2015-11-03 09:59:25
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewRNGEW" */ ?>
<?php /*%%SmartyHeaderCode:8535192375638776db7a074-15836170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f914cbdfb1dc63d558ab1f31f55ce48cbc69c8df' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewRNGEW',
      1 => 1446541165,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8535192375638776db7a074-15836170',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><div class="col-sm-3 room-roomie">
    <a href="<?php echo $_smarty_tpl->getVariable('single')->value['USER']['PROFILE_URL'];?>
">
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('single')->value['USER']['wz_PROFILBILD'],'w'=>768,'class'=>"img-responsive"),$_smarty_tpl);?>

        <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('single')->value),$_smarty_tpl);?>

        <span class="name" style="color:@blue;"><?php echo $_smarty_tpl->getVariable('single')->value['USER']['wz_VORNAME'];?>
</span>
        
        
        <div class="roomie-matching-info" style="color:@blue;">
            
            <span class="prozent" >
                <?php echo $_smarty_tpl->getVariable('single')->value['MATCHING']['RESULT']['matchGesamt'];?>
    
            </span>
            
        </div>
    </a>    
</div>