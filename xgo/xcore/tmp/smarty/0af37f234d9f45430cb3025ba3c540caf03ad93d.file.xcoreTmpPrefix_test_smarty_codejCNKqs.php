<?php /* Smarty version Smarty-3.0.7, created on 2015-08-03 15:10:27
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejCNKqs" */ ?>
<?php /*%%SmartyHeaderCode:155001913155bf6843546673-05373986%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0af37f234d9f45430cb3025ba3c540caf03ad93d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejCNKqs',
      1 => 1438607427,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155001913155bf6843546673-05373986',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?> <div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Neue Mitbewohner?"),$_smarty_tpl);?>
</label>
    <div class="column-input v-center">
        <input class="form-control" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'von Personen'),$_smarty_tpl);?>
?" />
    </div><!--
    --><div class="devider v-center">-</div><!--
    --><div class="column-input v-center">
        <input class="form-control" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'bis Personen'),$_smarty_tpl);?>
?" />
    </div>
</div>