<?php /* Smarty version Smarty-3.0.7, created on 2015-08-26 17:14:47
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code4zMdGh" */ ?>
<?php /*%%SmartyHeaderCode:163874280255ddd7e79997b7-79131177%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27bddbeff3aef64b389154e15fc6ef262f2fea07' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code4zMdGh',
      1 => 1440602087,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163874280255ddd7e79997b7-79131177',
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
        <input class="form-control" name="MIETE_VON" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_MIETE_VON'];?>
" id="MIETE_VON" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'von'),$_smarty_tpl);?>
 €?" rel="required"  />
    </div><!--
    --><div class="devider v-center">-</div><!--
    --><div class="column-input v-center">
        <input class="form-control" name="MIETE_BIS" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_MIETE_BIS'];?>
" id="MIETE_BIS" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'bis'),$_smarty_tpl);?>
 €?" />
    </div>
    
    <div class="error-div" id="MIETE_VON_error">
        <?php echo smarty_function_xr_translate(array('tag'=>"Bitte Miete(von) angeben"),$_smarty_tpl);?>

    </div>
    
</div>