<?php /* Smarty version Smarty-3.0.7, created on 2015-11-03 09:51:06
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6I4zYz" */ ?>
<?php /*%%SmartyHeaderCode:8065537635638757a47e373-90230180%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b1efec7221f35e4baff7db334f80a444c1523b3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6I4zYz',
      1 => 1446540666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8065537635638757a47e373-90230180',
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

        
        <span class="name" style="color:@blue;"><?php echo $_smarty_tpl->getVariable('single')->value['USER']['wz_PROFILBILD'];?>
</span>
        
        
        <div class="roomie-matching-info" style="color:@blue;">
            
            <span class="prozent" >
                <?php echo $_smarty_tpl->getVariable('single')->value['MATCHING']['RESULT']['matchGesamt'];?>
    
            </span>
            
        </div>
    </a>    
</div>