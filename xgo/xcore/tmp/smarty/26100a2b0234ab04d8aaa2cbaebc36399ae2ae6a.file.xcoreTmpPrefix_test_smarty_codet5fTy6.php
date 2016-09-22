<?php /* Smarty version Smarty-3.0.7, created on 2015-08-24 14:06:26
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codet5fTy6" */ ?>
<?php /*%%SmartyHeaderCode:158075131155db08c2b2cce9-35391279%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26100a2b0234ab04d8aaa2cbaebc36399ae2ae6a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codet5fTy6',
      1 => 1440417986,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158075131155db08c2b2cce9-35391279',
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
            <input id="male" type="radio" name="gender" />
            <span class="checked icon-mann"><span class="path1"></span><span class="path2"></span></span>
            <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
        </label>
    </div>