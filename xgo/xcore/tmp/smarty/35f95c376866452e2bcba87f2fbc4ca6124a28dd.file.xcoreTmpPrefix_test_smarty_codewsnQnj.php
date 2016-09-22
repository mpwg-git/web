<?php /* Smarty version Smarty-3.0.7, created on 2015-08-10 11:08:24
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewsnQnj" */ ?>
<?php /*%%SmartyHeaderCode:114057129855c86a086f6514-36427545%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35f95c376866452e2bcba87f2fbc4ca6124a28dd' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewsnQnj',
      1 => 1439197704,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114057129855c86a086f6514-36427545',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="meinprofil-uebermich">

     <div class="meinprofil-profilbild">
        <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
        <span class="icon-plus"></span>
        <span class="profilbild-hochladen">Profilbild hochladen</span>
    </div>

    <div class="meinprofil-uebermich-inner">
    
    <span class="subheadline">
        Über mich
    </span>
    
        <form>
            <div class="form-group geschlecht">
                <div class="radio">
                    <label for="female">
                        <input id="female" type="radio" name="gender" value="female" checked="checked">
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
                <label for="vorname"><?php echo smarty_function_xr_translate(array('tag'=>"Vorname"),$_smarty_tpl);?>
</label>
                <input id="vorname" name="VORNAME" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_VORNAME'];?>
" class="form-control" />
            </div>
            <div class="form-group">
                <label for="nachname"><?php echo smarty_function_xr_translate(array('tag'=>"Nachname"),$_smarty_tpl);?>
</label>
                <input id="nachname" name="NACHNAME" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_NACHNAME'];?>
"class="form-control" />
            </div>
            <div class="form-group">
                <label for="geburtsdatum"><?php echo smarty_function_xr_translate(array('tag'=>"Geburtsdatum"),$_smarty_tpl);?>
</label>
                <input id="geburtsdatum" name="GEBURTSDATUM" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_GEBURTSDATUM'];?>
" class="form-control" />
            </div>
            <div class="form-group">
                <label for="email"><?php echo smarty_function_xr_translate(array('tag'=>"Email"),$_smarty_tpl);?>
</label>
                <input id="email" name="EMAIL" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_EMAIL'];?>
" class="form-control" />
            </div>
             <div class="form-group">
                <label for="telefon"><?php echo smarty_function_xr_translate(array('tag'=>"Telefon"),$_smarty_tpl);?>
</label>
                <input id="telefon" name="TELEFON" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_TELEFON'];?>
" class="form-control" />
            </div>
            <div class="form-group">
                <label for="beschreibung"><?php echo smarty_function_xr_translate(array('tag'=>"Beschreibung"),$_smarty_tpl);?>
</label>
                <textarea id="beschreibung" name="BESCHREIBUNG" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_BESCHREIBUNG'];?>
" class="form-control" placeholder="..."> </textarea>
            </div>
            
            
            
        </form>
    </div>    
</div>