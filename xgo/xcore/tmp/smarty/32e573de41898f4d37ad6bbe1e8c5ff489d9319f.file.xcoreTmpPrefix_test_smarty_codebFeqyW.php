<?php /* Smarty version Smarty-3.0.7, created on 2015-07-27 12:29:03
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebFeqyW" */ ?>
<?php /*%%SmartyHeaderCode:93584967255b607efad8328-84885190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32e573de41898f4d37ad6bbe1e8c5ff489d9319f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebFeqyW',
      1 => 1437992943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93584967255b607efad8328-84885190',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="register default-container-padding">
    <h2><?php echo smarty_function_xr_translate(array('tag'=>"Registrieren"),$_smarty_tpl);?>
</h2>
    
    <div class="geschlecht">
        
        <form>
            <div>Ich Bin</div>
            <div class="form-group">
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
            <div class="form-group">
                <label for="suche" class="radio special-label">
                    <input id="biete" type="radio" name="auswahl-suche"/>
                    <span class="checked"><?php echo smarty_function_xr_translate(array('tag'=>'Suche'),$_smarty_tpl);?>
</span>
                    <span class="unchecked"><?php echo smarty_function_xr_translate(array('tag'=>'Suche'),$_smarty_tpl);?>
</span>
                </label>
                ODER 
                <label for="biete" class="radio special-label">
                    <input id="biete" type="radio" name="auswahl-biete"/>
                    <span class="checked"><?php echo smarty_function_xr_translate(array('tag'=>'Biete'),$_smarty_tpl);?>
</span>
                    <span class="unchecked"><?php echo smarty_function_xr_translate(array('tag'=>'Biete'),$_smarty_tpl);?>
</span>
                </label>
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