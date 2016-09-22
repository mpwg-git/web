<?php /* Smarty version Smarty-3.0.7, created on 2015-11-20 13:20:34
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTCeTSu" */ ?>
<?php /*%%SmartyHeaderCode:1507083429564f1012b4ba65-66511107%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13656eaac98a1aa34e73944f15e487cef7ed168c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTCeTSu',
      1 => 1448022034,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1507083429564f1012b4ba65-66511107',
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


<div class="chatcontacts">
    
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
    
</div>
