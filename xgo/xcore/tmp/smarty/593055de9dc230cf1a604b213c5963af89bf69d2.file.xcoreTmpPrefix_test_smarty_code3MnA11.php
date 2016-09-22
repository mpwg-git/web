<?php /* Smarty version Smarty-3.0.7, created on 2016-01-18 16:49:47
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code3MnA11" */ ?>
<?php /*%%SmartyHeaderCode:553983341569d099bf05964-61046992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '593055de9dc230cf1a604b213c5963af89bf69d2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code3MnA11',
      1 => 1453132187,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '553983341569d099bf05964-61046992',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><img src="<?php echo $_smarty_tpl->getVariable('image')->value['src'];?>
" id="avatarCrop" class="img-height-responsive avatarCrop <?php echo $_smarty_tpl->getVariable('type')->value;?>
 cropperimage" />
        
<form id="coords" class="coords" onsubmit="return false;" action="#">

	<input data-crop type="hidden" size="4" id="x1" name="x1" value="" />
	<input data-crop type="hidden" size="4" id="y1" name="y1" value="" />
	<input data-crop type="hidden" size="4" id="x2" name="x2" value="" />
	<input data-crop type="hidden" size="4" id="y2" name="y2" value="" />
	<input data-crop type="hidden" size="4" id="w" name="w" value="" />
	<input data-crop type="hidden" size="4" id="h" name="h" value="" />
    <input data-crop type="hidden" size="4" id="origW" name="origW" value="<?php echo $_smarty_tpl->getVariable('image')->value['trueW'];?>
" />
	<input data-crop type="hidden" size="4" id="origH" name="origH" value="<?php echo $_smarty_tpl->getVariable('image')->value['trueH'];?>
" />
	<input data-crop type="hidden" id="s_id" name="s_id" value="<?php echo $_smarty_tpl->getVariable('image')->value['s_id'];?>
" />
	<input data-crop type="hidden" id="new_s_id" name="new_s_id" value="" />
	<input data-crop type="hidden" id="trueOrigW" value="<?php echo $_smarty_tpl->getVariable('image')->value['trueW'];?>
">
	<input data-crop type="hidden" id="trueOrigH" value="<?php echo $_smarty_tpl->getVariable('image')->value['trueH'];?>
">
	<input type="hidden" name="type" value="<?php echo $_smarty_tpl->getVariable('type')->value;?>
" />
	<input type="hidden" name="refid" value="<?php echo $_smarty_tpl->getVariable('refid')->value;?>
" />
    
</form>
<button type="button" class="btn btn-primary modal-image-button close-image-cropper pull-left">Abbrechen</button>
<button type="button" class="btn btn-primary modal-image-button add-image-crop" data-type="<?php echo $_smarty_tpl->getVariable('type')->value;?>
">Weiter</button>
<div class="clearfix"></div>

<?php echo smarty_function_xr_siteCall(array('fn'=>'libx::isDeveloper','var'=>'dev'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->getVariable('dev')->value){?>
<h3>Hi dev!</h3>
<div class="movex" style="background-image:url(<?php echo $_smarty_tpl->getVariable('image')->value['src'];?>
); width:100%; height:100%;"></div>


<?php }?>