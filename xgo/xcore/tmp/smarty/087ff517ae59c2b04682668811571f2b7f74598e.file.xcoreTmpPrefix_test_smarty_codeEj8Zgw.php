<?php /* Smarty version Smarty-3.0.7, created on 2015-07-02 11:01:02
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeEj8Zgw" */ ?>
<?php /*%%SmartyHeaderCode:11260575495594fdced33269-11613224%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '087ff517ae59c2b04682668811571f2b7f74598e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeEj8Zgw',
      1 => 1435827662,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11260575495594fdced33269-11613224',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="profilerstellen">
    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>161,'w'=>197,'h'=>197,'rmode'=>"cco",'class'=>"profileimage"),$_smarty_tpl);?>

    <div class="maininfos">
        <h1>Profil</h1>
        <div class="geschlecht">
            <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
            <span class="icon-mann"><span class="path1"></span><span class="path2"></span></span>
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
                <label><?php echo smarty_function_xr_translate(array('tag'=>"Miete?"),$_smarty_tpl);?>
</label>
                <label for="female" class="radio">
                    <input id="female" type="radio" name="gender" checked/>
                    <span class="checked icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                    <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                </label>
                <label for="male" class="radio">
                    <input id="male" type="radio" name="gender" />
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
                    <input id="abloeseja" type="radio" name="abloese" checked/>
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
                    <input id="raucherja" type="radio" name="raucher" checked/>
                    <span class="checked icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                    <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                </label>
                <label for="rauchernein" class="radio">
                    <input id="rauchernein" type="radio" name="raucher" />
                    <span class="checked icon-mann"><span class="path1"></span><span class="path2"></span></span>
                    <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
                </label>
            </div>
            
            <div class="form-group">
                <label><?php echo smarty_function_xr_translate(array('tag'=>"Beschreibung"),$_smarty_tpl);?>
</label>
                <input class="form-control"/>
            </div>
            <div class="form-group">
                <label><?php echo smarty_function_xr_translate(array('tag'=>"Beschreibung"),$_smarty_tpl);?>
</label>
                <input class="form-control"/>
            </div>
            <div class="form-group clearfix">
                <a href="" class="button pull-right">Speichern</a>
            </div>
        </form>
    </div>
   
</div>