<?php /* Smarty version Smarty-3.0.7, created on 2015-11-03 10:03:52
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeYl3D1C" */ ?>
<?php /*%%SmartyHeaderCode:1591234499563878789e0a58-83076493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d64e5cd53a0ceac0d0b7af966cd1183eb0c3c84' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeYl3D1C',
      1 => 1446541432,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1591234499563878789e0a58-83076493',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><div class="col-sm-3 room-roomie">
    <a href="<?php echo $_smarty_tpl->getVariable('single')->value['USER']['PROFILE_URL'];?>
">
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('single')->value['USER']['wz_PROFILBILD'],'w'=>768,'class'=>"img-responsive"),$_smarty_tpl);?>

        <span class="roomie-matching-name" style="color:@blue;"><?php echo $_smarty_tpl->getVariable('single')->value['USER']['wz_VORNAME'];?>
</span>
        
        
        <div class="roomie-matching-info" style="color:@blue;">
            
            <span class="prozent" >
                <?php echo $_smarty_tpl->getVariable('single')->value['MATCHING']['RESULT']['matchGesamt'];?>
    
            </span>
            
        </div>
    </a>    
</div>