<?php /* Smarty version Smarty-3.0.7, created on 2015-10-09 13:03:36
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewvYECj" */ ?>
<?php /*%%SmartyHeaderCode:69575253956179f0882fd58-59805356%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4bb6f6c274fa204a768731e728acbec9bbe8d79c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewvYECj',
      1 => 1444388616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69575253956179f0882fd58-59805356',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><div class="col-sm-4">
    <a href="$single['USER']['PROFILE_URL']">
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('single')->value['USER']['wz_PROFILBILD']),$_smarty_tpl);?>

    </a>    
</div>

