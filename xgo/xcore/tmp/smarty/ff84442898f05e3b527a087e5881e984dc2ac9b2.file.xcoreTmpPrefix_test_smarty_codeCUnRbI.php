<?php /* Smarty version Smarty-3.0.7, created on 2015-08-28 12:38:58
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCUnRbI" */ ?>
<?php /*%%SmartyHeaderCode:63516001955e03a424d0347-17797116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff84442898f05e3b527a087e5881e984dc2ac9b2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCUnRbI',
      1 => 1440758338,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63516001955e03a424d0347-17797116',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_wzActionInvisibleCaptcha')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wzActionInvisibleCaptcha.php';
?><div class="register default-container-padding">
    
    <div class="register-inner">
        <h2><?php echo smarty_function_xr_translate(array('tag'=>"Registrieren"),$_smarty_tpl);?>
</h2>
        
        <div class="geschlecht">
            
            <form action="<?php echo smarty_function_xr_genlink(array('p_id'=>23),$_smarty_tpl);?>
" method="post" id="form-register">
                
                <input name="REGISTERME" id="register-form_REGISTERME" type="hidden" value="1" />
                <?php echo smarty_function_xr_wzActionInvisibleCaptcha(array(),$_smarty_tpl);?>

                
                <div>Ich Bin</div>
                <div class="form-group">
                    <div class="radio">
                        <label for="female">
                            <input id="female" type="radio" name="GESCHLECHT" value="female">
                            <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                            <span class="icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                        </label>
                        <label for="male">
                            <input id="male" type="radio" name="GESCHLECHT" value="male">
                            <span class="icon-mann"><span class="path1"></span><span class="path2"></span></span>
                            <span class="icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="suche" class="radio special-label">
                        <input id="suche" type="radio" name="typ"/>
                        <span class="checked"><?php echo smarty_function_xr_translate(array('tag'=>'Suche'),$_smarty_tpl);?>
</span>
                        <span class="unchecked"><?php echo smarty_function_xr_translate(array('tag'=>'Suche'),$_smarty_tpl);?>
</span>
                    </label>
                    <span class="label-oder">ODER</span>
                    <label for="biete" class="radio special-label">
                        <input id="biete" type="radio" name="typ"/>
                        <span class="checked"><?php echo smarty_function_xr_translate(array('tag'=>'Biete'),$_smarty_tpl);?>
</span>
                        <span class="unchecked"><?php echo smarty_function_xr_translate(array('tag'=>'Biete'),$_smarty_tpl);?>
</span>
                    </label>
                </div>
                
                <div class="form-group">
                    <label for="vorname"><?php echo smarty_function_xr_translate(array('tag'=>"Vorname"),$_smarty_tpl);?>
</label>
                    <input id="vorname" name="vorname" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="nachname"><?php echo smarty_function_xr_translate(array('tag'=>"Nachname"),$_smarty_tpl);?>
</label>
                    <input id="nachname" name="nachname" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="email"><?php echo smarty_function_xr_translate(array('tag'=>"eMail"),$_smarty_tpl);?>
</label>
                    <input id="email" name="email" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="passwort"><?php echo smarty_function_xr_translate(array('tag'=>"Passwort"),$_smarty_tpl);?>
</label>
                    <input id="passwort" name="passwort" type="password" class="form-control" />
                </div>
                 <button class="button" id="form-register-submit"><?php echo smarty_function_xr_translate(array('tag'=>"Registrieren"),$_smarty_tpl);?>
</button>
                
                
            </form>
            
        </div>
    </div>
</div>