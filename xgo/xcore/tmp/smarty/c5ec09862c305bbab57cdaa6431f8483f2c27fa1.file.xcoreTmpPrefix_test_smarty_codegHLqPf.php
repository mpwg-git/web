<?php /* Smarty version Smarty-3.0.7, created on 2015-08-05 14:30:14
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codegHLqPf" */ ?>
<?php /*%%SmartyHeaderCode:94118004055c201d6113a85-69894019%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5ec09862c305bbab57cdaa6431f8483f2c27fa1' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codegHLqPf',
      1 => 1438777814,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94118004055c201d6113a85-69894019',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="anmelden default-container-padding">
    <h2><?php echo smarty_function_xr_translate(array('tag'=>"Anmelden"),$_smarty_tpl);?>
<br/>Lorem Ipsum Dolor?</h2>
    <form class="standardform">
        <div class="form-group">
            <label for="email" class="small"><?php echo smarty_function_xr_translate(array('tag'=>"eMail?"),$_smarty_tpl);?>
</label>
            <input id="email" name="email" class="form-control" />
        </div>
        <div class="form-group">
            <label for="passwort"><?php echo smarty_function_xr_translate(array('tag'=>"Passwort?"),$_smarty_tpl);?>
</label>
            <input id="passwort" name="passwort" type="password" class="form-control" />
            
            <a class="forgotpw"><?php echo smarty_function_xr_translate(array('tag'=>"Passwort vergessen?"),$_smarty_tpl);?>
</a>
        </div>
        <button type="submit" class="button"><?php echo smarty_function_xr_translate(array('tag'=>"Anmelden"),$_smarty_tpl);?>
</button>
    </form>
</div>