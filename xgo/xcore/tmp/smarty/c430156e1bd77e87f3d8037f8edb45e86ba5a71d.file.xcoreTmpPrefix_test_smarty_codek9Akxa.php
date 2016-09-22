<?php /* Smarty version Smarty-3.0.7, created on 2015-08-21 10:54:15
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codek9Akxa" */ ?>
<?php /*%%SmartyHeaderCode:177210382255d6e738001dc9-96090707%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c430156e1bd77e87f3d8037f8edb45e86ba5a71d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codek9Akxa',
      1 => 1440147255,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177210382255d6e738001dc9-96090707',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="searchform default-container-padding">
    <h1><?php echo smarty_function_xr_translate(array('tag'=>"Suche"),$_smarty_tpl);?>
</h1>
    <form>
        <div class="form-group">
            <label for="date"><?php echo smarty_function_xr_translate(array('tag'=>"Wann?"),$_smarty_tpl);?>
</label>
            <div class="input-icon hasDatePicker">
                <input class="form-control search-date datepicker" name="search-date" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'ab'),$_smarty_tpl);?>
"/>
                <span class="add-on"><i class="icon-calendar"></i></span>
    		</div>
        </div>
        <div class="form-group">
            <label for="cost"><?php echo smarty_function_xr_translate(array('tag'=>"Wieviel?"),$_smarty_tpl);?>
</label>
            <div id="slider-range"></div>
            <p class="legend clearfix"><span class="pull-left"><?php echo smarty_function_xr_translate(array('tag'=>"VON"),$_smarty_tpl);?>
</span><span class="pull-right"><?php echo smarty_function_xr_translate(array('tag'=>"BIS"),$_smarty_tpl);?>
</span></p>
            
        </div>
        <div class="form-group">
            <label for="location"><?php echo smarty_function_xr_translate(array('tag'=>"Wo?"),$_smarty_tpl);?>
</label>
            <input class="form-control" name="location" id="location"/>
            <span class="icon-Map"><span class="path1"></span><span class="path2"></span></span>
        </div>
        <div class="form-group">
            <label for="umkreis"><?php echo smarty_function_xr_translate(array('tag'=>"Umkreis?"),$_smarty_tpl);?>
</label>
            <div id="umkreis-slider"></div>
            <p class="legend clearfix"><span class="pull-left"><?php echo smarty_function_xr_translate(array('tag'=>"5 km"),$_smarty_tpl);?>
</span><span class="pull-right"><?php echo smarty_function_xr_translate(array('tag'=>"50 km"),$_smarty_tpl);?>
</span></p>
        </div>
        
        
        <div class="form-group">
            <a class="karte-anzeigen js-toggle-map">
                <span class="icon-Map"><span class="path1"></span><span class="path2"></span></span> Karte anzeigen
            </a>
        </div>
        
        <?php echo smarty_function_xr_atom(array('a_id'=>793,'return'=>1,'desc'=>'map mobile'),$_smarty_tpl);?>

        
        
    </form>
    
</div>
