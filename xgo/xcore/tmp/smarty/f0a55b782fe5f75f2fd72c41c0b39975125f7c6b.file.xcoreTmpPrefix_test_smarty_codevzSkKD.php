<?php /* Smarty version Smarty-3.0.7, created on 2015-06-29 13:33:48
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codevzSkKD" */ ?>
<?php /*%%SmartyHeaderCode:189744967755912d1c958c41-67313395%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0a55b782fe5f75f2fd72c41c0b39975125f7c6b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codevzSkKD',
      1 => 1435577628,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189744967755912d1c958c41-67313395',
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
        
        <form>
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
            
            
            <div class="form-control">
                <label for="vorname"><?php echo smarty_function_xr_translate(array('tag'=>"Vorname?"),$_smarty_tpl);?>
</label>
                <input id="vorname" name="vorname" class="form-control" />
            </div>
            <div class="form-control">
                <label for="nachname"><?php echo smarty_function_xr_translate(array('tag'=>"Nachname?"),$_smarty_tpl);?>
</label>
                <input id="nachname" name="nachname" class="form-control" />
            </div>
            <div class="form-control">
                <label for="email"><?php echo smarty_function_xr_translate(array('tag'=>"eMail?"),$_smarty_tpl);?>
</label>
                <input id="email" name="email" class="form-control" />
            </div>
            <div class="form-control">
                <label for="passwort"><?php echo smarty_function_xr_translate(array('tag'=>"Passwort?"),$_smarty_tpl);?>
</label>
                <input id="passwort" name="passwort" class="form-control" />
            </div>
            
        </form>
        
    </div>
</div>