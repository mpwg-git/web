<?php /* Smarty version Smarty-3.0.7, created on 2015-08-24 14:06:59
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeUvKaxT" */ ?>
<?php /*%%SmartyHeaderCode:72609798855db08e377f8f7-00468670%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54a31718c5fb4f86e6ebe72ac8c0824935ecd065' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeUvKaxT',
      1 => 1440418019,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72609798855db08e377f8f7-00468670',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="geschlecht">
        <label for="female" class="radio">
            <input id="female" type="radio" name="GESCHLECHT" value="F" <?php if (($_smarty_tpl->getVariable('user')->value['wz_GESCHLECHT']=='F')){?>checked="checked"<?php }?>">
            <span class="checked icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
            <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
        </label>
        <label for="male" class="radio">
            <input id="male" type="radio" name="GESCHLECHT" value="M" <?php if (($_smarty_tpl->getVariable('user')->value['wz_GESCHLECHT']=='M')){?>checked="checked"<?php }?>>
            <span class="checked icon-mann"><span class="path1"></span><span class="path2"></span></span>
            <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
        </label>
    </div>