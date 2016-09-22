<?php /* Smarty version Smarty-3.0.7, created on 2015-07-13 17:49:21
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMIN6xh" */ ?>
<?php /*%%SmartyHeaderCode:184111019255a3de0179b781-68423217%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c9ed5b3f4bcbd1ceff1e11ab34d1c20821d3c3b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMIN6xh',
      1 => 1436802561,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184111019255a3de0179b781-68423217',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><script type="text/javascript">
    $(function(){
        

        
    });
</script>

<div class="searchform">
    <h1><?php echo smarty_function_xr_translate(array('tag'=>"Suche"),$_smarty_tpl);?>
</h1>
    <form>
        <div class="form-group">
            <label for="date"><?php echo smarty_function_xr_translate(array('tag'=>"Wann?"),$_smarty_tpl);?>
</label>
            <div class="input-icon">
                <input class="form-control" name="date" id="date" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'ab'),$_smarty_tpl);?>
"/>
                <span class="icon-Lupe"></span>
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
            <div class="input-icon location-input">
                <input class="form-control" name="location" id="location"/>
                <span class="icon-Map"><span class="path1"></span><span class="path2"></span></span>
            </div>
        </div>
        <div class="form-group">
            <label for="umkreis"><?php echo smarty_function_xr_translate(array('tag'=>"Umkreis?"),$_smarty_tpl);?>
</label>
            <div id="umkreis-slider"></div>
            <p class="legend clearfix"><span class="pull-left"><?php echo smarty_function_xr_translate(array('tag'=>"5 km"),$_smarty_tpl);?>
</span><span class="pull-right"><?php echo smarty_function_xr_translate(array('tag'=>"50 km"),$_smarty_tpl);?>
</span></p>
        </div>
        <!--
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d170129.24812898834!2d16.380059899999996!3d48.2206849!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476d079e5136ca9f%3A0xfdc2e58a51a25b46!2sWien!5e0!3m2!1sde!2sat!4v1435660054811" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        -->
        <div id="map" class="map"></div>
    </form>
</div>
