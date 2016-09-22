<?php /* Smarty version Smarty-3.0.7, created on 2015-11-10 15:36:37
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFVVisw" */ ?>
<?php /*%%SmartyHeaderCode:953849373564200f50f49f4-05725222%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21ae488b5a23c16a75e44f51a214a67f1e794c13' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFVVisw',
      1 => 1447166197,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '953849373564200f50f49f4-05725222',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><span class="looklikeh1"><?php echo smarty_function_xr_translate(array('tag'=>"Chat"),$_smarty_tpl);?>
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

<div class="default-container-paddingtop">
    <span class="looklikeh1">Map</span>
    <div class="searchform" s>
            <div id="map" class="map" style="height:400px;"></div>
        
    </div>        
</div>