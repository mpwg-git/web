<?php /* Smarty version Smarty-3.0.7, created on 2015-11-11 18:39:48
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeiGdedB" */ ?>
<?php /*%%SmartyHeaderCode:152002362556437d6402b224-24925997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '801f65d4165ebed5d80f0781c654bfbbdfa9413b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeiGdedB',
      1 => 1447263587,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152002362556437d6402b224-24925997',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?>

<div class="default-container-paddingtop">
    
    aaa
    <span class="looklikeh1"><?php echo smarty_function_xr_translate(array('tag'=>"Chat"),$_smarty_tpl);?>
</span>
    <form>
        <div class="form-group">
            <div class="input-icon">
                <input class="form-control js-search-personen" name="date" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'Personen suchen'),$_smarty_tpl);?>
?"/>
                <span class="icon-Lupe"></span>
    		</div>
        </div>
    </form>
    
    
    
    
    <span class="looklikeh1"><?php echo smarty_function_xr_translate(array('tag'=>"Map"),$_smarty_tpl);?>
</span>
    <div class="searchform" s>
            <div id="map" class="map"></div>
        
    </div>        
</div>