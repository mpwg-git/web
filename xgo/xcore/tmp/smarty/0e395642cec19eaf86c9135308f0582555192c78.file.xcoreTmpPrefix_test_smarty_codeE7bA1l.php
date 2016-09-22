<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 19:14:32
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeE7bA1l" */ ?>
<?php /*%%SmartyHeaderCode:51921328256954288240a13-74508494%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e395642cec19eaf86c9135308f0582555192c78' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeE7bA1l',
      1 => 1452622472,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '51921328256954288240a13-74508494',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Alter der Mitbewohner?"),$_smarty_tpl);?>
</label>
    <div class="column-input v-center">
        <input class="form-control" name="MITBEWOHNER_ALTER_VON" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_MITBEWOHNER_ALTER_VON'];?>
" id="MITBEWOHNER_ALTER_VON" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'von'),$_smarty_tpl);?>
?" />
    </div><!--
    --><div class="devider v-center">-</div><!--
    --><div class="column-input v-center">
        <input class="form-control" name="MITBEWOHNER_ALTER_BIS" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_MITBEWOHNER_ALTER_BIS'];?>
" id="MITBEWOHNER_ALTER_BIS" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'bis'),$_smarty_tpl);?>
?" />
    </div>
</div>