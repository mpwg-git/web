<?php /* Smarty version Smarty-3.0.7, created on 2015-08-08 13:32:52
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenjAx14" */ ?>
<?php /*%%SmartyHeaderCode:102872310655c5e8e47ee0e9-61705371%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '317a498d6132fe710545f55c67b93b8e5e10e83c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenjAx14',
      1 => 1439033572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102872310655c5e8e47ee0e9-61705371',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_feUser(array('action'=>'doLogin','triggerByVar'=>'doLogin','triggerByVal'=>'1','var'=>'info'),$_smarty_tpl);?>


<div class="anmelden">
    <span class="close">
         <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>1),$_smarty_tpl);?>
">
            <span class="icon-Close"></span>
        </a>
    </span>
    <h2><?php echo smarty_function_xr_translate(array('tag'=>"Anmelden"),$_smarty_tpl);?>
<br/>Lorem Ipsum Dolor?</h2>
    <form>
        <div class="form-group">
            <label for="email"><span class="small">e</span>Mail</label>
            <input id="email" name="email" class="form-control" />
        </div>
        <div class="form-group">
            <label for="passwort"><?php echo smarty_function_xr_translate(array('tag'=>"Passwort?"),$_smarty_tpl);?>
</label>
            <input id="passwort" name="passwort" type="password" class="form-control" />
            
            <a class="forgotpw"><?php echo smarty_function_xr_translate(array('tag'=>"Passwort vergessen?"),$_smarty_tpl);?>
</a>
        </div>
        <button type="submit" class="button"><?php echo smarty_function_xr_translate(array('tag'=>"Registrieren"),$_smarty_tpl);?>
</button>
    </form>
</div>