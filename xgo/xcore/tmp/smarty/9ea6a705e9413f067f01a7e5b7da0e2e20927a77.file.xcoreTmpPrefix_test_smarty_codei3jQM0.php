<?php /* Smarty version Smarty-3.0.7, created on 2015-11-26 12:32:50
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codei3jQM0" */ ?>
<?php /*%%SmartyHeaderCode:13018228255656ede294d852-30353589%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ea6a705e9413f067f01a7e5b7da0e2e20927a77' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codei3jQM0',
      1 => 1448537570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13018228255656ede294d852-30353589',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Miete?"),$_smarty_tpl);?>
*</label>
    <div class="column-input v-center">
        <input class="form-control" name="MIETE" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_MIETE'];?>
" id="MIETE" placeholder="€?" rel="required"  />
    </div>
    
    <div class="error-div" id="MIETE_error">
        <?php echo smarty_function_xr_translate(array('tag'=>"Bitte Miete(von) angeben"),$_smarty_tpl);?>

    </div>
    
</div>