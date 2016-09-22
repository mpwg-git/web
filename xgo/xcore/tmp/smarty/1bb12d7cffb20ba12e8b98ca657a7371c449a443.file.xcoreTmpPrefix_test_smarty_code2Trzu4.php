<?php /* Smarty version Smarty-3.0.7, created on 2015-12-17 11:26:59
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2Trzu4" */ ?>
<?php /*%%SmartyHeaderCode:207415414456728df3315d90-86358119%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bb12d7cffb20ba12e8b98ca657a7371c449a443' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2Trzu4',
      1 => 1450348019,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207415414456728df3315d90-86358119',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Beschreibung"),$_smarty_tpl);?>
</label>
    <div class="column-input v-center">
        <textarea name="BESCHREIBUNG"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_BESCHREIBUNG'];?>
</textarea>
    </div>
    
    <div class="error-div" id="MIETE_VON_error">
        <?php echo smarty_function_xr_translate(array('tag'=>"Bitte Miete(von) angeben"),$_smarty_tpl);?>

    </div>
    
</div>