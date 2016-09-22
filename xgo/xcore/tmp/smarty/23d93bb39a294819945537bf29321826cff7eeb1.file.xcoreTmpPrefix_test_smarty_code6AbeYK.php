<?php /* Smarty version Smarty-3.0.7, created on 2016-09-21 07:27:26
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6AbeYK" */ ?>
<?php /*%%SmartyHeaderCode:82618076257e2365e1b7552-69880633%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23d93bb39a294819945537bf29321826cff7eeb1' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6AbeYK',
      1 => 1474442846,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82618076257e2365e1b7552-69880633',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><!--<li class="room-settings" style=" list-style-position:inside;-->
<!--    border: 1px solid #04e0d7;margin-bottom:10px;padding:5px; list-style-type:none;">-->
<li class="room-settings">    
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>30,'createNew'=>1),$_smarty_tpl);?>
">
        <span class="room-name no-padding-left room-new" >
            <?php echo smarty_function_xr_translate(array('tag'=>"Neuen Raum anlegen"),$_smarty_tpl);?>

        </span>
    </a>
    <a title="<?php echo smarty_function_xr_translate(array('tag'=>"Neuen Raum anlegen"),$_smarty_tpl);?>
" class="room-edit-icon icon-new pull-right" href="<?php echo smarty_function_xr_genlink(array('p_id'=>30,'createNew'=>1),$_smarty_tpl);?>
">
        <span></span>
        <span class="add-add"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
    </a>
</li>