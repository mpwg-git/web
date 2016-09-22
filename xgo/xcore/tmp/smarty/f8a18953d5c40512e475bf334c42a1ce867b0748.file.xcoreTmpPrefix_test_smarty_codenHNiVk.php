<?php /* Smarty version Smarty-3.0.7, created on 2015-11-16 15:43:56
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenHNiVk" */ ?>
<?php /*%%SmartyHeaderCode:13633135315649ebacbd1071-62668722%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8a18953d5c40512e475bf334c42a1ce867b0748' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenHNiVk',
      1 => 1447685036,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13633135315649ebacbd1071-62668722',
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
    
    
    
    <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']=='suche'){?>
     
    <span class="looklikeh1"><?php echo smarty_function_xr_translate(array('tag'=>"Map"),$_smarty_tpl);?>
</span>
    <div class="searchform">
        <div id="map" class="map"></div>
    </div>
    
    <?php }?>
    
    <div class="contacts-wrapper js-chatcontacts-replace">
       
       <?php echo $_smarty_tpl->getVariable('html')->value;?>

       
    </div>
    
</div>
