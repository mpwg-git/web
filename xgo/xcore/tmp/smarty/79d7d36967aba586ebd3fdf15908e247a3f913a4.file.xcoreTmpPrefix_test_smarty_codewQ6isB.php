<?php /* Smarty version Smarty-3.0.7, created on 2015-08-03 13:16:17
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewQ6isB" */ ?>
<?php /*%%SmartyHeaderCode:15783688955bf4d811cfbb1-52293009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79d7d36967aba586ebd3fdf15908e247a3f913a4' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewQ6isB',
      1 => 1438600577,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15783688955bf4d811cfbb1-52293009',
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
    <div class="clearfix"></div>
    
    <div class="anmelden-inner">
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
</div>

<?php echo smarty_function_xr_atom(array('a_id'=>662,'return'=>1),$_smarty_tpl);?>
