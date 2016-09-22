<?php /* Smarty version Smarty-3.0.7, created on 2015-11-16 15:27:41
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoeRO4c" */ ?>
<?php /*%%SmartyHeaderCode:8634725035649e7dd1d0327-32409216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bee068cafbbc082f3ac4644dde7476dedb07a82' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoeRO4c',
      1 => 1447684061,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8634725035649e7dd1d0327-32409216',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_chat::sc_getConversations",'var'=>"html"),$_smarty_tpl);?>


<div class="chatcontacts js-chatcontacts default-container-paddingtop">
    
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
    <div class="searchform">
        <div id="map" class="map"></div>
    </div>
    
    
    
    
    <div class="contacts-wrapper js-chatcontacts-replace">
       
       <?php echo $_smarty_tpl->getVariable('html')->value;?>

       
    </div>
    
</div>
