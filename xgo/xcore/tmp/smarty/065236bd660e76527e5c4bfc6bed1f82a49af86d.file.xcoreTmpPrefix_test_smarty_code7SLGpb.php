<?php /* Smarty version Smarty-3.0.7, created on 2015-08-03 13:14:16
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7SLGpb" */ ?>
<?php /*%%SmartyHeaderCode:147675538355bf4d08eca4e6-48555459%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '065236bd660e76527e5c4bfc6bed1f82a49af86d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7SLGpb',
      1 => 1438600456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147675538355bf4d08eca4e6-48555459',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
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
        <button type="submit" class="button"><?php echo smarty_function_xr_translate(array('tag'=>"Anmelden"),$_smarty_tpl);?>
</button>
    </form>
</div>

<?php echo smarty_function_xr_atom(array('a_id'=>662,'return'=>1),$_smarty_tpl);?>
