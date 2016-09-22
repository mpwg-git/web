<?php /* Smarty version Smarty-3.0.7, created on 2015-11-26 09:08:04
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code912yav" */ ?>
<?php /*%%SmartyHeaderCode:19073304815656bde441a4d9-35503308%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a04fbbc1d7494c0568edcf5975898723c12e107c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code912yav',
      1 => 1448525284,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19073304815656bde441a4d9-35503308',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><li class="room-settings">
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>30,'createNew'=>1),$_smarty_tpl);?>
">
        <span class="room-name no-padding-left room-new">
            <?php echo smarty_function_xr_translate(array('tag'=>"Neuen Raum anlegen"),$_smarty_tpl);?>

        </span>
    </a>
    <a title="<?php echo smarty_function_xr_translate(array('tag'=>"Neuen Raum anlegen"),$_smarty_tpl);?>
" class="room-edit-icon icon-new" href="<?php echo smarty_function_xr_genlink(array('p_id'=>30,'createNew'=>1),$_smarty_tpl);?>
">
        <span></span>
        <span class="add-add"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
    </a>
</li>