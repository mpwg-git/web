<?php /* Smarty version Smarty-3.0.7, created on 2015-12-17 12:06:44
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeIKSFUm" */ ?>
<?php /*%%SmartyHeaderCode:755383056729744401687-53895915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bee94bbd104f1d8e6d883239741510efc8369e7a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeIKSFUm',
      1 => 1450350404,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '755383056729744401687-53895915',
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