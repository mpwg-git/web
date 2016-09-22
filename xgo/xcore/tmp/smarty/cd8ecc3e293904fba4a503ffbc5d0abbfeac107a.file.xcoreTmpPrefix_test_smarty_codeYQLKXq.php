<?php /* Smarty version Smarty-3.0.7, created on 2015-07-18 17:26:43
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeYQLKXq" */ ?>
<?php /*%%SmartyHeaderCode:90624821955aa7033ba2f67-86388277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd8ecc3e293904fba4a503ffbc5d0abbfeac107a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeYQLKXq',
      1 => 1437233203,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90624821955aa7033ba2f67-86388277',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="meinprofil-uebermich">

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
        
    </form>
    
</div>