<?php /* Smarty version Smarty-3.0.7, created on 2015-08-10 11:39:30
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebbggN7" */ ?>
<?php /*%%SmartyHeaderCode:4355768055c87152524687-95609247%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42f7a54f45390509713cc8d9df36bc1d8fa22f6f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebbggN7',
      1 => 1439199570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4355768055c87152524687-95609247',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Miete?"),$_smarty_tpl);?>
</label>
    <div class="column-input v-center">
        <input class="form-control" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_MIETE_VON'];?>
" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'von'),$_smarty_tpl);?>
 €?" />
    </div><!--
    --><div class="devider v-center">-</div><!--
    --><div class="column-input v-center">
        <input class="form-control" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_MIETE_BIS'];?>
" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'bis'),$_smarty_tpl);?>
 €?" />
    </div>
</div>