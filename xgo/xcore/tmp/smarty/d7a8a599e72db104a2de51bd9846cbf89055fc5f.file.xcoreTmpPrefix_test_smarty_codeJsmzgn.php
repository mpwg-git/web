<?php /* Smarty version Smarty-3.0.7, created on 2015-11-16 17:04:59
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeJsmzgn" */ ?>
<?php /*%%SmartyHeaderCode:20391551315649feabae6349-10999483%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7a8a599e72db104a2de51bd9846cbf89055fc5f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeJsmzgn',
      1 => 1447689899,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20391551315649feabae6349-10999483',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_chat::sc_getConversations",'var'=>"html"),$_smarty_tpl);?>


<div class="chatcontacts js-chatcontacts default-container-paddingtop">
    <div class="pull-right" style="padding-top:20px;color:#04e0d7;">
                <a href="javascript:history.back();">
                  <span class="icon-Close"></span>
                </a>
    </div>
    <h1><?php echo smarty_function_xr_translate(array('tag'=>"Chat"),$_smarty_tpl);?>
</h1>
    
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
    
    <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']=='suche'){?>
     
    
    <span class="looklikeh1"><?php echo smarty_function_xr_translate(array('tag'=>"Map"),$_smarty_tpl);?>
</span>
    
        <div class="searchform">
        
            <div id="map" class="map">
        </div>
    
    </div>
    
    
    <?php }?>
    
</div>