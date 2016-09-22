<?php /* Smarty version Smarty-3.0.7, created on 2015-08-01 11:48:41
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2AzEt5" */ ?>
<?php /*%%SmartyHeaderCode:66113842655bc95f9291db0-95524911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa2067e0f8ee9248fcf858b105381b2da464dc51' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2AzEt5',
      1 => 1438422520,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66113842655bc95f9291db0-95524911',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="profilerstellen default-container-paddingtop">
    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>161,'w'=>197,'h'=>197,'rmode'=>"cco",'class'=>"profileimage"),$_smarty_tpl);?>

    <div class="maininfos">
        <h1>Profil</h1>
        <div class="geschlecht">
            <label for="female" class="radio">
                <input id="female" type="radio" name="gender"/>
                <span class="checked icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
            </label>
            <label for="male" class="radio">
                <input id="male" type="radio" name="gender" />
                <span class="checked icon-mann"><span class="path1"></span><span class="path2"></span></span>
                <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
            </label>
        </div>
        <div class="moreimages">
            <div class="img-container"></div>
            <div class="img-container"></div>
            <div class="img-container add-image"></div>
        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="mainform">
        <form class="" name="">
            <h3><?php echo smarty_function_xr_translate(array('tag'=>"Über Mich"),$_smarty_tpl);?>
</h3>
            <div class="form-group">
                <label><?php echo smarty_function_xr_translate(array('tag'=>"Vorname"),$_smarty_tpl);?>
</label>
                <input class="form-control"/>
            </div>
            <div class="form-group">
                <label><?php echo smarty_function_xr_translate(array('tag'=>"Nachname"),$_smarty_tpl);?>
</label>
                <input class="form-control"/>
            </div>
            <div class="form-group">
                <label><?php echo smarty_function_xr_translate(array('tag'=>"Geburtsdatum"),$_smarty_tpl);?>
</label>
                <input class="form-control"/>
            </div>
            <div class="form-group">
                <label><?php echo smarty_function_xr_translate(array('tag'=>"Email"),$_smarty_tpl);?>
</label>
                <input class="form-control"/>
            </div>
            <div class="form-group">
                <label><?php echo smarty_function_xr_translate(array('tag'=>"Telefon"),$_smarty_tpl);?>
</label>
                <input class="form-control"/>
            </div>
            <div class="form-group">
                <label><?php echo smarty_function_xr_translate(array('tag'=>"Beschreibung"),$_smarty_tpl);?>
</label>
                <input class="form-control"/>
            </div>
            
            <h3><?php echo smarty_function_xr_translate(array('tag'=>"Meine Fakten"),$_smarty_tpl);?>
</h3>
            
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
            
            <div class="form-group geschlecht-container">
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
                    <input class="form-control" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'Personen'),$_smarty_tpl);?>
?" />
                </div><!--
                --><div class="devider v-center">-</div><!--
                --><div class="column-input v-center">
                    <input class="form-control" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'Personen'),$_smarty_tpl);?>
?" />
                </div>
            </div>
            
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
    </div>
</div>