<?php /* Smarty version Smarty-3.0.7, created on 2015-11-26 14:10:44
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coder1lypM" */ ?>
<?php /*%%SmartyHeaderCode:269503083565704d438a9c9-13695992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd6cd9cd5d1f8acb95fc9e2d7ab1e2cca00bb866' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coder1lypM',
      1 => 1448543444,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '269503083565704d438a9c9-13695992',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Raumname (nicht öffentlich)"),$_smarty_tpl);?>
*</label>
    <div class="column-input v-center" style="width:66.1%">
        <input class="form-control" name="BESCHRIFTUNG_INTERN" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_BESCHRIFTUNG_INTERN'];?>
" id="BESCHRIFTUNG_INTERN" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>"Name in Übersicht?"),$_smarty_tpl);?>
" rel="required"  />
    </div>
    
    <div class="error-div" id="BESCHRIFTUNG_INTERN_error">
        <?php echo smarty_function_xr_translate(array('tag'=>"Bitte interne Beschriftung angeben"),$_smarty_tpl);?>

    </div>
    
</div>