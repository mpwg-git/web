<?php /* Smarty version Smarty-3.0.7, created on 2015-11-24 18:58:07
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8tOXzS" */ ?>
<?php /*%%SmartyHeaderCode:2795081095654a52fb06414-21215186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa374349cdfe2827bc7ee66ea6f5302ca15e1739' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8tOXzS',
      1 => 1448387887,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2795081095654a52fb06414-21215186',
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