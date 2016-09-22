<?php /* Smarty version Smarty-3.0.7, created on 2015-07-27 17:42:13
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeRAA4dj" */ ?>
<?php /*%%SmartyHeaderCode:167192865255b65155778df3-60649073%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7647ab59397563e304bddcaf40100f338040631' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeRAA4dj',
      1 => 1438011733,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167192865255b65155778df3-60649073',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="searchform default-container-padding">
    <h1><?php echo smarty_function_xr_translate(array('tag'=>"Suche"),$_smarty_tpl);?>
</h1>
    <form>
        <div class="form-group">
            <label for="date"><?php echo smarty_function_xr_translate(array('tag'=>"Wann?"),$_smarty_tpl);?>
</label>
            <input class="form-control" name="date" id="date"/>
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
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>18),$_smarty_tpl);?>
" class="karte-anzeigen">
                <span class="icon-Map"><span class="path1"></span><span class="path2"></span></span> Karte anzeigen
            </a>
        </div>
    </form>
    
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>17),$_smarty_tpl);?>
">Ergebnisse</a>
    
</div>
