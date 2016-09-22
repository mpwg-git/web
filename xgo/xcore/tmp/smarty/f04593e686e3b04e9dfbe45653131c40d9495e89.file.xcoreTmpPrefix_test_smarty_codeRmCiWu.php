<?php /* Smarty version Smarty-3.0.7, created on 2015-11-10 15:37:07
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeRmCiWu" */ ?>
<?php /*%%SmartyHeaderCode:114221327756420113ed5465-14167817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f04593e686e3b04e9dfbe45653131c40d9495e89' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeRmCiWu',
      1 => 1447166227,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114221327756420113ed5465-14167817',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?>

<div class="default-container-paddingtop">
    
    
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
    
    
    
    
    <span class="looklikeh1">Map</span>
    <div class="searchform" s>
            <div id="map" class="map" style="height:400px;"></div>
        
    </div>        
</div>