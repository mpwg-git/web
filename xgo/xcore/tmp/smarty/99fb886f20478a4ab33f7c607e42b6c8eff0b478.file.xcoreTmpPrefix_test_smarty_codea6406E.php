<?php /* Smarty version Smarty-3.0.7, created on 2015-11-25 09:23:13
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codea6406E" */ ?>
<?php /*%%SmartyHeaderCode:59309026356556ff15e2b60-90195920%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99fb886f20478a4ab33f7c607e42b6c8eff0b478' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codea6406E',
      1 => 1448439793,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59309026356556ff15e2b60-90195920',
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
" id="BESCHRIFTUNG_INTERN" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>"Name in Übersicht?"),$_smarty_tpl);?>
" rel="required"  />
    </div>
    
    <div class="error-div" id="BESCHRIFTUNG_INTERN_error">
        <?php echo smarty_function_xr_translate(array('tag'=>"Bitte interne Beschriftung angeben"),$_smarty_tpl);?>

    </div>
    
</div>