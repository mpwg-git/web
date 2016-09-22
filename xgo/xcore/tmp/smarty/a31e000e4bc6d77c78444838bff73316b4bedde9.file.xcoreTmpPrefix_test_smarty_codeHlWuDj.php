<?php /* Smarty version Smarty-3.0.7, created on 2015-08-10 11:34:59
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHlWuDj" */ ?>
<?php /*%%SmartyHeaderCode:93934168755c870430813c4-94200010%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a31e000e4bc6d77c78444838bff73316b4bedde9' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHlWuDj',
      1 => 1439199299,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93934168755c870430813c4-94200010',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><h2>Meine Daten</h2>
    
    <form class="form-mein-profil">
        
        <div class="form-group">
            <label><?php echo smarty_function_xr_translate(array('tag'=>"Zeitraum?"),$_smarty_tpl);?>
</label>
            <div class="column-input v-center hasDatePicker">
                <input class="form-control datepicker" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'ab'),$_smarty_tpl);?>
?" />
                <span class="add-on"><i class="icon-calendar"></i></span>
            </div><!--
            --><div class="devider v-center">-</div><!--
            --><div class="column-input v-center hasDatePicker">
                <input class="form-control datepicker" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'bis'),$_smarty_tpl);?>
?"/>
                 <span class="add-on"><i class="icon-calendar"></i></span>
            </div>
        </div>
        
        <div class="form-group">
            <label><?php echo smarty_function_xr_translate(array('tag'=>"Miete?"),$_smarty_tpl);?>
</label>
            <div class="column-input v-center">
                <input class="form-control" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'von'),$_smarty_tpl);?>
 €?" />
            </div><!--
            --><div class="devider v-center">-</div><!--
            --><div class="column-input v-center">
                <input class="form-control" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'bis'),$_smarty_tpl);?>
 €?" />
            </div>
        </div>
        
         <div class="form-group">
            <label><?php echo smarty_function_xr_translate(array('tag'=>"Neue Mitbewohner?"),$_smarty_tpl);?>
</label>
            <div class="column-input v-center">
                <input class="form-control" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'von Personen'),$_smarty_tpl);?>
?" />
            </div><!--
            --><div class="devider v-center">-</div><!--
            --><div class="column-input v-center">
                <input class="form-control" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'bis Personen'),$_smarty_tpl);?>
?" />
            </div>
        </div>
        
        
        <div class="form-group geschlecht-container">
            <label><?php echo smarty_function_xr_translate(array('tag'=>"Geschlecht?"),$_smarty_tpl);?>
</label>
            <label for="geschlecht-female" class="radio special-label">
                <input id="geschlecht-female" type="radio" name="geschlecht"/>
                <span class="checked icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
            </label>
            <label for="geschlecht-male" class="radio special-label">
                <input id="geschlecht-male" type="radio" name="geschlecht" />
                <span class="checked icon-mann"><span class="path1"></span><span class="path2"></span></span>
                <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
            </label>
        </div>
        
       
        <?php echo smarty_function_xr_atom(array('a_id'=>701,'return'=>1),$_smarty_tpl);?>

        
        <div class="form-group">
            <label><?php echo smarty_function_xr_translate(array('tag'=>"zimmergrösse?"),$_smarty_tpl);?>
</label>
            <div class="column-input v-center">
                <input class="form-control" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'von'),$_smarty_tpl);?>
 <?php echo smarty_function_xr_translate(array('tag'=>'m²'),$_smarty_tpl);?>
?" />
            </div><!--
            --><div class="devider v-center">-</div><!--
            --><div class="column-input v-center">
                <input class="form-control" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'bis'),$_smarty_tpl);?>
 <?php echo smarty_function_xr_translate(array('tag'=>'m²'),$_smarty_tpl);?>
?"/>
            </div>
        </div>
        
        <div class="form-group">
            <label><?php echo smarty_function_xr_translate(array('tag'=>"Ablöse?"),$_smarty_tpl);?>
</label>
            <label for="abloeseja" class="radio special-label">
                <input id="abloeseja" type="radio" name="abloese"/>
                <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>
                <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>
            </label>
            <label for="abloesenein" class="radio special-label">
                <input id="abloesenein" type="radio" name="abloese" />
                <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>
                <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>
            </label>
        </div>
        
        <div class="form-group">
            <label><?php echo smarty_function_xr_translate(array('tag'=>"Raucher?"),$_smarty_tpl);?>
</label>
            <label for="raucherja" class="radio special-label">
                <input id="raucherja" type="radio" name="raucher"/>
                <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>
                <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>
            </label>
            <label for="rauchernein" class="radio special-label">
                <input id="rauchernein" type="radio" name="raucher" />
                <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>
                <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>
            </label>
        </div>
        
        <?php echo smarty_function_xr_atom(array('a_id'=>699,'return'=>1),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>700,'return'=>1),$_smarty_tpl);?>

        
        <div class="form-group submitbutton-container">
            <input type="submit" value="speichern" />
        </div>
        
        
    </form>