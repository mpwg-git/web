<?php /* Smarty version Smarty-3.0.7, created on 2015-08-19 14:21:07
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeB3wAAL" */ ?>
<?php /*%%SmartyHeaderCode:185334725655d474b3145814-55571524%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c32610d5c5ae31c33e51cd775500844a7b9dea6' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeB3wAAL',
      1 => 1439986867,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185334725655d474b3145814-55571524',
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
 €?" rel="required" />
    </div>
    
    <div class="error-div" id="MIETE_VON_error">
        <?php echo smarty_function_xr_translate(array('tag'=>"Bitte Zeitraum angeben"),$_smarty_tpl);?>

    </div>
    <div class="error-div" id="MIETE_BIS_error">
        <?php echo smarty_function_xr_translate(array('tag'=>"Bitte Zeitraum angeben"),$_smarty_tpl);?>

    </div>
    
</div>