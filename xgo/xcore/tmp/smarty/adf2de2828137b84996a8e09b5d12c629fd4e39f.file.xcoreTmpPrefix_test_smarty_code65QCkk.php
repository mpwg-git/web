<?php /* Smarty version Smarty-3.0.7, created on 2015-10-09 16:52:49
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code65QCkk" */ ?>
<?php /*%%SmartyHeaderCode:5234788175617d4c1ee2dc0-26280612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'adf2de2828137b84996a8e09b5d12c629fd4e39f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code65QCkk',
      1 => 1444402369,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5234788175617d4c1ee2dc0-26280612',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><div class="col-sm-3">
    <a href="<?php echo $_smarty_tpl->getVariable('single')->value['USER']['PROFILE_URL'];?>
">
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('single')->value['USER']['wz_PROFILBILD']),$_smarty_tpl);?>

        <div class="roomie-matching-info">
            <span class="prozent">
                <?php echo $_smarty_tpl->getVariable('single')->value['MATCHING']['RESULT']['matchGesamt'];?>
%    
            </span>
            
            
        </div>
    </a>    
</div>