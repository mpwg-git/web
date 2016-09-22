<?php /* Smarty version Smarty-3.0.7, created on 2015-08-17 11:19:40
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeIfYgZl" */ ?>
<?php /*%%SmartyHeaderCode:167396584255d1a72c3dbe53-21755128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '023f0f2ded60ef2e07ed55def6854552983703b5' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeIfYgZl',
      1 => 1439803180,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167396584255d1a72c3dbe53-21755128',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="input-icon search-input search-input-map <?php if ($_smarty_tpl->getVariable('inForm')->value==1){?>small v-center<?php }?>">
    <input class="form-control autocomplete-location" name="ADRESSE" value="<?php echo $_smarty_tpl->getVariable('value')->value;?>
" name="address" placeholder="Stadt, Ort, PLZ?" />
    <span class="icon-Map">
	    <span class="path1"></span><span class="path2"></span>
	</span>
</div>




