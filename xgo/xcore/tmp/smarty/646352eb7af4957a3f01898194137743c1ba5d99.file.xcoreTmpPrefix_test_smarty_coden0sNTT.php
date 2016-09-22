<?php /* Smarty version Smarty-3.0.7, created on 2015-11-24 18:58:09
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coden0sNTT" */ ?>
<?php /*%%SmartyHeaderCode:1645004625654a531185094-23894592%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '646352eb7af4957a3f01898194137743c1ba5d99' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coden0sNTT',
      1 => 1448387889,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1645004625654a531185094-23894592',
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