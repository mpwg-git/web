<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 12:13:24
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemUAB7I" */ ?>
<?php /*%%SmartyHeaderCode:92604003355d5a8448ab8e5-80083529%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e601939db6c9b71155492b333f65bd172fed1c3b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemUAB7I',
      1 => 1440065604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92604003355d5a8448ab8e5-80083529',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><form class="form-mein-profil" name="">
            <h3><?php echo smarty_function_xr_translate(array('tag'=>"Über Mich"),$_smarty_tpl);?>
</h3>
            
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
            <div class="form-group hasDatePicker">
                <label for="geburtsdatum"><?php echo smarty_function_xr_translate(array('tag'=>"Geburtsdatum"),$_smarty_tpl);?>
</label>
                <input id="geburtsdatum" name="GEBURTSDATUM" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_GEBURTSDATUM'];?>
" class="form-control datepicker" />
            </div>
            <div class="form-group">
                <label for="email"><?php echo smarty_function_xr_translate(array('tag'=>"Email"),$_smarty_tpl);?>
</label>
                <input id="email" name="EMAIL" disabled="true" value="<?php echo $_smarty_tpl->getVariable('user')->value['wz_EMAIL'];?>
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
" class="form-control" placeholder="..."></textarea>
            </div>
            
            <h3><?php echo smarty_function_xr_translate(array('tag'=>"Meine Fakten"),$_smarty_tpl);?>
</h3>
            
            <?php echo smarty_function_xr_atom(array('a_id'=>734,'return'=>1,'desc'=>'zeitraum'),$_smarty_tpl);?>

            <?php echo smarty_function_xr_atom(array('a_id'=>735,'return'=>1,'desc'=>'miete'),$_smarty_tpl);?>

            <?php echo smarty_function_xr_atom(array('a_id'=>736,'return'=>1,'desc'=>'mitbewohner'),$_smarty_tpl);?>

            
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