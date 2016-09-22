<?php /* Smarty version Smarty-3.0.7, created on 2015-11-18 17:17:18
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeJLQUnH" */ ?>
<?php /*%%SmartyHeaderCode:1140678756564ca48e2f8cc0-68979823%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fca32fe8e186d65b46898baf0574810cc7b1154' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeJLQUnH',
      1 => 1447863438,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1140678756564ca48e2f8cc0-68979823',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Raumname (nicht öffentlich)"),$_smarty_tpl);?>
*</label>
    <div class="column-input v-center">
        <input class="form-control" name="BESCHRIFTUNG_INTERN" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_BESCHRIFTUNG_INTERN'];?>
" id="BESCHRIFTUNG_INTERN" placeholder="Name in Übersicht?" rel="required"  />
    </div>
    
    <div class="error-div" id="BESCHRIFTUNG_INTERN_error">
        <?php echo smarty_function_xr_translate(array('tag'=>"Bitte interne Beschriftung angeben"),$_smarty_tpl);?>

    </div>
    
</div>