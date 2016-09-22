<?php /* Smarty version Smarty-3.0.7, created on 2015-07-20 19:01:50
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejVzO7S" */ ?>
<?php /*%%SmartyHeaderCode:71201395955ad297e5f50d8-70069441%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c09cd9ae468806e2214d2ecd8ee25f0701ee408' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejVzO7S',
      1 => 1437411710,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71201395955ad297e5f50d8-70069441',
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
    
    <form>
        
        <div class="form-group">
                <label><?php echo smarty_function_xr_translate(array('tag'=>"Zeitraum?"),$_smarty_tpl);?>
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
                <label for="mitbew-female" class="radio">
                    <input id="mitbew-female" type="radio" name="mitbewohner"/>
                    <span class="checked icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                    <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                </label>
                <label for="mitbew-male" class="radio">
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
                <label><?php echo smarty_function_xr_translate(array('tag'=>"Miete?"),$_smarty_tpl);?>
</label>
                <label for="abloeseja" class="radio">
                    <input id="abloeseja" type="radio" name="abloese"/>
                    <span class="checked icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                    <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                </label>
                <label for="abloesenein" class="radio">
                    <input id="abloesenein" type="radio" name="abloese" />
                    <span class="checked icon-mann"><span class="path1"></span><span class="path2"></span></span>
                    <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
                </label>
            </div>
            
            <div class="form-group">
                <label><?php echo smarty_function_xr_translate(array('tag'=>"Miete?"),$_smarty_tpl);?>
</label>
                <label for="raucherja" class="radio">
                    <input id="raucherja" type="radio" name="raucher"/>
                    <span class="checked icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                    <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                </label>
                <label for="rauchernein" class="radio">
                    <input id="rauchernein" type="radio" name="raucher" />
                    <span class="checked icon-mann"><span class="path1"></span><span class="path2"></span></span>
                    <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
                </label>
            </div>
        
        
    </form>
    
</div>