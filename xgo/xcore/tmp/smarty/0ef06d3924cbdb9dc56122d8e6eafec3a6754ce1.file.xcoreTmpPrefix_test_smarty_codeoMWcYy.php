<?php /* Smarty version Smarty-3.0.7, created on 2015-08-13 02:03:57
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoMWcYy" */ ?>
<?php /*%%SmartyHeaderCode:196658616755cbdeed374100-36609767%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ef06d3924cbdb9dc56122d8e6eafec3a6754ce1' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoMWcYy',
      1 => 1439424237,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196658616755cbdeed374100-36609767',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<img src="<?php echo $_smarty_tpl->getVariable('image')->value['src'];?>
" id="avatarCrop" class="img-responsive avatarCrop <?php echo $_smarty_tpl->getVariable('type')->value;?>
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
    
    <button type="button" class="btn btn-primary add-image-crop" data-type="<?php echo $_smarty_tpl->getVariable('type')->value;?>
">Weiter</button>
    
</form>