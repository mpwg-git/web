<?php /* Smarty version Smarty-3.0.7, created on 2015-11-20 15:22:27
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code78tOwW" */ ?>
<?php /*%%SmartyHeaderCode:1158929029564f2ca35e7801-34210904%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b319ee16f87b467e377a3302a6f26635bc9a8f04' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code78tOwW',
      1 => 1448029347,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1158929029564f2ca35e7801-34210904',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_chat::sc_getConversations",'var'=>"html"),$_smarty_tpl);?>

<?php echo smarty_function_xr_feUser(array('action'=>'isLoggedIn','var'=>'isLoggedIn'),$_smarty_tpl);?>


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
    
    
    

    
    <div class="contacts-wrapper js-chatcontacts-replace">
       
       <?php echo $_smarty_tpl->getVariable('html')->value;?>

       
    </div>
    
    <?php $_smarty_tpl->tpl_vars['P_ID'] = new Smarty_Variable($_smarty_tpl->getVariable('P_ID',null,true,false)->value);if ($_smarty_tpl->tpl_vars['P_ID']->value = !'7'){?>
    
        <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']=='suche'){?>
         
        
        <span class="looklikeh1"><?php echo smarty_function_xr_translate(array('tag'=>"Map"),$_smarty_tpl);?>
</span>
        
            <div class="searchform">
            
                <div id="map" class="map">
            </div>
        
        </div>
        
        
        <?php }?>
        
    <?php }?>
    
    
</div>
