<?php /* Smarty version Smarty-3.0.7, created on 2015-07-14 15:34:14
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codez1IaHF" */ ?>
<?php /*%%SmartyHeaderCode:165656711555a50fd6271b84-70228514%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7911065be9baa16866b1cabcc5f582896c1f284' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codez1IaHF',
      1 => 1436880854,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165656711555a50fd6271b84-70228514',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="anmelden">
    <span class="close">
        <span class="icon-Close"></span>
    </span>
    <h2><?php echo smarty_function_xr_translate(array('tag'=>"Anmelden"),$_smarty_tpl);?>
<br/>Lorem Ipsum Dolor?</h2>
    <form>
        <div class="form-group">
            <label for="email"><?php echo smarty_function_xr_translate(array('tag'=>"eMail?"),$_smarty_tpl);?>
</label>
            <input id="email" name="email" class="form-control" />
        </div>
        <div class="form-group">
            <label for="passwort"><?php echo smarty_function_xr_translate(array('tag'=>"Passwort?"),$_smarty_tpl);?>
</label>
            <input id="passwort" name="passwort" class="form-control" />
            
            <a class="forgotpw"><?php echo smarty_function_xr_translate(array('tag'=>"Passwort vergessen?"),$_smarty_tpl);?>
</a>
        </div>
        <button type="submit" class="button"><?php echo smarty_function_xr_translate(array('tag'=>"Registrieren"),$_smarty_tpl);?>
</button>
    </form>
</div>