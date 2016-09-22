<?php /* Smarty version Smarty-3.0.7, created on 2015-06-29 13:25:19
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeXu3des" */ ?>
<?php /*%%SmartyHeaderCode:160113567555912b1f326859-39990860%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8898bde5c616a42fd5299744aba8ee11ef286a0b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeXu3des',
      1 => 1435577119,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160113567555912b1f326859-39990860',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="register">
    <span class="close">
        <span class="icon-Close"></span>
    </span>
    <h2><?php echo smarty_function_xr_translate(array('tag'=>"Registrieren"),$_smarty_tpl);?>
<br/>Lorem Ipsum Dolor?</h2>
    
    <div class="geschlecht">
        <div class="radio">
            <label for="female">
                <input id="female" type="radio" name="gender" value="female">
                <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                <span class="icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
            </label>
            <label for="male">
                <input id="male" type="radio" name="gender" value="male">
                <span class="icon-mann"><span class="path1"></span><span class="path2"></span></span>
                <span class="icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
            </label>
        </div>
        
    </div>
</div>