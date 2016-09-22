<?php /* Smarty version Smarty-3.0.7, created on 2015-08-01 12:35:16
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1b648L" */ ?>
<?php /*%%SmartyHeaderCode:163718415055bca0e4e58246-82982635%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc26bd433911b3c6df6c8adcd454a7fc0a0120a6' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1b648L',
      1 => 1438425316,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163718415055bca0e4e58246-82982635',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="register">
    <span class="close">
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>1),$_smarty_tpl);?>
">
            <span class="icon-Close"></span>
        </a>
    </span>
    <h2><?php echo smarty_function_xr_translate(array('tag'=>"Registrieren"),$_smarty_tpl);?>
<br/>Lorem Ipsum Dolor?</h2>
    
    <div class="geschlecht">
        
        <form>
            <div class="form-group">
                <div class="radio">
                    <label for="female">
                        <input id="female" type="radio" name="gender" value="female">
                        <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                        <span class="icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                        <span class="fz">?</span>
                    </label>
                    <label for="male">
                        <input id="male" type="radio" name="gender" value="male">
                        <span class="icon-mann"><span class="path1"></span><span class="path2"></span></span>
                        <span class="icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
                        <span class="fz">?</span>
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="radio">
                    <label for="suche">
                        <input id="suche" type="radio" name="typ" value="suche">
                        <span>Suche</span>
                        <span class="fz">?</span>
                    </label>
                    <label for="biete">
                        <input id="biete" type="radio" name="typ" value="biete">
                        <span>Biete</span>
                        <span class="fz">?</span>
                    </label>
                </div>
            </div>
            
            <div class="form-group">
                <label for="vorname"><?php echo smarty_function_xr_translate(array('tag'=>"Vorname?"),$_smarty_tpl);?>
</label>
                <input id="vorname" name="vorname" class="form-control" />
            </div>
            <div class="form-group">
                <label for="nachname"><?php echo smarty_function_xr_translate(array('tag'=>"Nachname?"),$_smarty_tpl);?>
</label>
                <input id="nachname" name="nachname" class="form-control" />
            </div>
            <div class="form-group">
                <label for="email"><?php echo smarty_function_xr_translate(array('tag'=>"eMail?"),$_smarty_tpl);?>
</label>
                <input id="email" name="email" class="form-control" />
            </div>
            <div class="form-group">
                <label for="passwort"><?php echo smarty_function_xr_translate(array('tag'=>"Passwort?"),$_smarty_tpl);?>
</label>
                <input id="passwort" name="passwort" class="form-control" />
            </div>
            <button type="submit" class="button"><?php echo smarty_function_xr_translate(array('tag'=>"Registrieren"),$_smarty_tpl);?>
</button>
            
            
        </form>
        
    </div>
</div>