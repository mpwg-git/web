<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 15:00:51
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOnKD1t" */ ?>
<?php /*%%SmartyHeaderCode:5222310456950713907da7-74627804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66a29ef118d99c1c331130af9d61bfdf9635a552' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOnKD1t',
      1 => 1452607251,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5222310456950713907da7-74627804',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="default-container-paddingtop">
    
   
    <span class="looklikeh1"><?php echo smarty_function_xr_translate(array('tag'=>"Chat"),$_smarty_tpl);?>
</span>
    <form>
        <div class="form-group">
            <div class="input-icon">
                <input class="form-control js-search-personen" name="date" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'Personen suchen'),$_smarty_tpl);?>
?"/>
                <span class="icon-Lupe" style="font-size: .924vw;margin-top: -0.462vw; right: .33vw;"></span>
    		</div>
        </div>
    </form>
    1
    <div class="contacts-wrapper js-chatcontacts-replace">
       <?php echo $_smarty_tpl->getVariable('html')->value;?>

    </div>
2
    <span class="looklikeh1"><?php echo smarty_function_xr_translate(array('tag'=>"Map"),$_smarty_tpl);?>
</span>
    <div class="searchform">
        <div id="map" class="map"></div>
    </div>        
    
</div>
