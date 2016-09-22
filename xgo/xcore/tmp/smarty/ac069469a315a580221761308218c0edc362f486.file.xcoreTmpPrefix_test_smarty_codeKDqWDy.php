<?php /* Smarty version Smarty-3.0.7, created on 2015-10-12 17:48:09
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKDqWDy" */ ?>
<?php /*%%SmartyHeaderCode:630301282561bd6390de563-89474884%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac069469a315a580221761308218c0edc362f486' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKDqWDy',
      1 => 1444664889,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '630301282561bd6390de563-89474884',
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