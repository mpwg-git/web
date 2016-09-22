<?php /* Smarty version Smarty-3.0.7, created on 2015-11-12 17:54:46
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codex98UrJ" */ ?>
<?php /*%%SmartyHeaderCode:17842892875644c456583346-42227611%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a84c49021c58e60c3b8dc194dce9eb96c0d0a83' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codex98UrJ',
      1 => 1447347286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17842892875644c456583346-42227611',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_wzActionInvisibleCaptcha')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wzActionInvisibleCaptcha.php';
?><div class="register">
    <?php echo smarty_function_xr_atom(array('a_id'=>723,'return'=>1,'desc'=>"closer"),$_smarty_tpl);?>

    
    <h2><?php echo smarty_function_xr_translate(array('tag'=>"Registrieren"),$_smarty_tpl);?>
<br/><?php echo smarty_function_xr_translate(array('tag'=>"Reg 2 Zeile?"),$_smarty_tpl);?>
</h2>
    
    <div class="geschlecht">
        
       <form action="<?php echo smarty_function_xr_genlink(array('p_id'=>23),$_smarty_tpl);?>
" method="post" id="form-register">
            
            <input name="REGISTERME" id="register-form_REGISTERME" type="hidden" value="1" />
                <?php echo smarty_function_xr_wzActionInvisibleCaptcha(array(),$_smarty_tpl);?>

                
                <div class="geschlecht-chooser">
                    <div class="form-group">
                        <div class="radio">
                            <label for="female">
                                <input id="female" type="radio" name="GESCHLECHT" value="female" rel="required_radio_oneofmany">
                                <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                                <span class="icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                                <span class="fz">?</span>
                            </label>
                            <label for="male">
                                <input id="male" type="radio" name="GESCHLECHT" value="male"  rel="required_radio_oneofmany">
                                <span class="icon-mann"><span class="path1"></span><span class="path2"></span></span>
                                <span class="icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
                                <span class="fz">?</span>
                            </label>
                        </div>
                        <div class="error-div" id="GESCHLECHT_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Geschlecht auswählen'),$_smarty_tpl);?>
</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="radio">
                        <label for="suche">
                            <input id="suche" type="radio" name="TYPE" value="suche" rel="required_radio_oneofmany">
                            <span><?php echo smarty_function_xr_translate(array('tag'=>'Suche'),$_smarty_tpl);?>
</span>
                            <span class="fz">?</span>
                        </label>
                        <label for="biete">
                            <input id="biete" type="radio" name="TYPE" value="biete" rel="required_radio_oneofmany">
                            <span><?php echo smarty_function_xr_translate(array('tag'=>'Biete'),$_smarty_tpl);?>
</span>
                            <span class="fz">?</span>
                        </label>
                    </div>
                    <div class="error-div" id="TYPE_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Typ auswählen'),$_smarty_tpl);?>
</div>
                </div>
                
                <div class="form-group">
                    <label for="vorname"><?php echo smarty_function_xr_translate(array('tag'=>"Vorname?"),$_smarty_tpl);?>
*</label>
                    <input id="VORNAME" name="VORNAME" class="form-control" rel="required" />
                    <div class="error-div" id="VORNAME_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Vorname angeben'),$_smarty_tpl);?>
</div>
                </div>
                <div class="form-group">
                    <label for="nachname"><?php echo smarty_function_xr_translate(array('tag'=>"Nachname?"),$_smarty_tpl);?>
*</label>
                    <input id="NACHNAME" name="NACHNAME" class="form-control" rel="required" />
                    <div class="error-div" id="NACHNAME_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Nachname angeben'),$_smarty_tpl);?>
</div>
                </div>
                <div class="form-group">
                    <label for="email"><?php echo smarty_function_xr_translate(array('tag'=>"eMail?"),$_smarty_tpl);?>
*</label>
                    <input id="EMAIL" name="EMAIL" class="form-control" rel="required_email" />
                    <div class="error-div" id="EMAIL_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Email angeben'),$_smarty_tpl);?>
</div>
                </div>
                <div class="form-group">
                    <label for="passwort"><?php echo smarty_function_xr_translate(array('tag'=>"Passwort?"),$_smarty_tpl);?>
*</label>
                    <input id="PASSWORT" name="PASSWORT" type="password" class="form-control" rel="required"/>
                    <div class="error-div" id="PASSWORT_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Passwort angeben'),$_smarty_tpl);?>
</div>
                </div>
                <button class="button" id="form-register-submit"><?php echo smarty_function_xr_translate(array('tag'=>"Registrieren"),$_smarty_tpl);?>
</button>
            
        </form>
        
    </div>
</div>