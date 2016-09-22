<?php /* Smarty version Smarty-3.0.7, created on 2015-07-23 11:18:17
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2RiQfu" */ ?>
<?php /*%%SmartyHeaderCode:196073038955b0b159e201f0-59484124%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'edf64eedc1d2052f2a5c2d1bc10ac656c4917f5c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2RiQfu',
      1 => 1437643097,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196073038955b0b159e201f0-59484124',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="col-xs-4 meinprofil-links">
    <?php echo smarty_function_xr_atom(array('a_id'=>678,'return'=>1),$_smarty_tpl);?>

</div>

<div class="col-xs-8 default-container-paddingtop meinprofil-meinedaten">
    
    <span class="looklikeh1">
        Profil
    </span>
    
    <div class="upload-image">
        <span class="bild-hinzufuegen">Bild hinzufügen</span>
    </div>
        
    <h2>Meine Daten</h2>
    
    <form class="form-mein-profil">
        
        <div class="form-group">
            <label><?php echo smarty_function_xr_translate(array('tag'=>"Zeitraum?"),$_smarty_tpl);?>
</label>
            <div class="column-input v-center hasDatePicker">
                <input class="form-control datepicker"/>
                <span class="add-on"><i class="icon-lupe" id="cal"></i></span>
            </div><!--
            --><div class="devider v-center">-</div><!--
            --><div class="column-input v-center">
                <input class="form-control datepicker"/>
            </div>
        </div>
        
        <div class="form-group">
            <label><?php echo smarty_function_xr_translate(array('tag'=>"Miete?"),$_smarty_tpl);?>
</label>
            <div class="column-input v-center">
                <input class="form-control"/>
            </div><!--
            --><div class="devider v-center">-</div><!--
            --><div class="column-input v-center">
                <input class="form-control"/>
            </div>
        </div>
        
        <div class="form-group">
            <label><?php echo smarty_function_xr_translate(array('tag'=>"Mitbewohner?"),$_smarty_tpl);?>
</label>
            <label for="mitbew-female" class="radio special-label">
                <input id="mitbew-female" type="radio" name="mitbewohner"/>
                <span class="checked icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
            </label>
            <label for="mitbew-male" class="radio special-label">
                <input id="mitbew-male" type="radio" name="mitbewohner" />
                <span class="checked icon-mann"><span class="path1"></span><span class="path2"></span></span>
                <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
            </label>
        </div>
        
        <div class="form-group">
            <label><?php echo smarty_function_xr_translate(array('tag'=>"WG-Grösse?"),$_smarty_tpl);?>
</label>
            <div class="column-input v-center">
                <input class="form-control"/>
            </div><!--
            --><div class="devider v-center">-</div><!--
            --><div class="column-input v-center">
                <input class="form-control"/>
            </div>
        </div>
        
        <div class="form-group">
            <label><?php echo smarty_function_xr_translate(array('tag'=>"zimmergrösse?"),$_smarty_tpl);?>
</label>
            <div class="column-input v-center">
                <input class="form-control"/>
            </div><!--
            --><div class="devider v-center">-</div><!--
            --><div class="column-input v-center">
                <input class="form-control"/>
            </div>
        </div>
        
        <div class="form-group">
            <label><?php echo smarty_function_xr_translate(array('tag'=>"Ablöse?"),$_smarty_tpl);?>
</label>
            <label for="abloeseja" class="radio special-label">
                <input id="abloeseja" type="radio" name="abloese"/>
                <span class="checked circle circle-filled">ja</span>
                <span class="unchecked circle circle-plain">ja</span>
            </label>
            <label for="abloesenein" class="radio special-label">
                <input id="abloesenein" type="radio" name="abloese" />
                <span class="checked circle circle-filled">nein</span>
                <span class="unchecked circle circle-plain">nein</span>
            </label>
        </div>
        
        <div class="form-group">
            <label><?php echo smarty_function_xr_translate(array('tag'=>"Raucher?"),$_smarty_tpl);?>
</label>
            <label for="raucherja" class="radio special-label">
                <input id="raucherja" type="radio" name="raucher"/>
                <span class="checked circle circle-filled">ja</span>
                <span class="unchecked circle circle-plain">ja</span>
            </label>
            <label for="rauchernein" class="radio special-label">
                <input id="rauchernein" type="radio" name="raucher" />
                <span class="checked circle circle-filled">nein</span>
                <span class="unchecked circle circle-plain">nein</span>
            </label>
        </div>
        
        <div class="form-group">
            <label><?php echo smarty_function_xr_translate(array('tag'=>"Sprachen?"),$_smarty_tpl);?>
</label>
             <div class="column-input v-center">
                <input class="form-control"/>
            </div>
        </div>
        
        <div class="form-group">
            <label><?php echo smarty_function_xr_translate(array('tag'=>"Adresse?"),$_smarty_tpl);?>
*</label>
             <div class="column-input v-center">
                <input class="form-control"/>
            </div>
        </div>
        
        <div class="form-group submitbutton-container">
            <input type="submit" value="speichern" />
        </div>
        
        
    </form>
    
</div>