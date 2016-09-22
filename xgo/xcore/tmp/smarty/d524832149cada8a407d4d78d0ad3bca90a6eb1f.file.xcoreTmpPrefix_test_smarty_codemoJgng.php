<?php /* Smarty version Smarty-3.0.7, created on 2015-07-19 16:05:30
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemoJgng" */ ?>
<?php /*%%SmartyHeaderCode:164337401055abaeaad57140-65799785%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd524832149cada8a407d4d78d0ad3bca90a6eb1f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemoJgng',
      1 => 1437314730,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164337401055abaeaad57140-65799785',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="meinprofil-uebermich default-container-paddingtop">

Über mich

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
            <label for="geburtsdatum"><?php echo smarty_function_xr_translate(array('tag'=>"Geburtsdatum"),$_smarty_tpl);?>
</label>
            <input id="geburtsdatum" name="geburtsdatum" class="form-control" />
        </div>
        <div class="form-group">
            <label for="email"><?php echo smarty_function_xr_translate(array('tag'=>"Email"),$_smarty_tpl);?>
</label>
            <input id="email" name="email" class="form-control" />
        </div>
         <div class="form-group">
            <label for="telefon"><?php echo smarty_function_xr_translate(array('tag'=>"Telefon"),$_smarty_tpl);?>
</label>
            <input id="telefon" name="telefon" class="form-control" />
        </div>
        <div class="form-group">
            <label for="beschreibung"><?php echo smarty_function_xr_translate(array('tag'=>"Beschreibung"),$_smarty_tpl);?>
</label>
            <textarea id="beschreibung" name="beschreibung" class="form-control"> </textarea>
        </div>
        
        
        
    </form>
    
</div>