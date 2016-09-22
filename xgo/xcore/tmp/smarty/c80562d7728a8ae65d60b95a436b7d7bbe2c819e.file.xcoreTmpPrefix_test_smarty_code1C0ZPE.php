<?php /* Smarty version Smarty-3.0.7, created on 2015-08-28 12:42:55
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1C0ZPE" */ ?>
<?php /*%%SmartyHeaderCode:124016631255e03b2fbf4376-07573266%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c80562d7728a8ae65d60b95a436b7d7bbe2c819e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1C0ZPE',
      1 => 1440758575,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124016631255e03b2fbf4376-07573266',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="geschlecht">
    <label for="female" class="radio">
        <input id="female" type="radio" name="GESCHLECHT" value="F" disabled="disabled" <?php if (($_smarty_tpl->getVariable('user')->value['wz_GESCHLECHT']=='F')){?>checked="checked"<?php }?>>
        <span class="checked icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
        <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
    </label>
    <label for="male" class="radio">
        <input id="male" type="radio" name="GESCHLECHT" value="M" disabled="disabled" <?php if (($_smarty_tpl->getVariable('user')->value['wz_GESCHLECHT']=='M')){?>checked="checked"<?php }?>>
        <span class="checked icon-mann"><span class="path1"></span><span class="path2"></span></span>
        <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
    </label>
</div>