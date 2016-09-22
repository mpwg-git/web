<?php /* Smarty version Smarty-3.0.7, created on 2015-11-20 15:16:28
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codepbTjJx" */ ?>
<?php /*%%SmartyHeaderCode:1867146429564f2b3ce88963-98219390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3c93219d17d4eb9bd047ca6464a1d9c0562d059' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codepbTjJx',
      1 => 1448028988,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1867146429564f2b3ce88963-98219390',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_chat::sc_getConversations",'var'=>"html"),$_smarty_tpl);?>

<?php echo smarty_function_xr_feUser(array('action'=>'isLoggedIn','var'=>'isLoggedIn'),$_smarty_tpl);?>



<div class="chatcontacts js-chatcontacts default-container-paddingtop">
   <div class="pull-right" style="padding-top:20px; padding-right:20px;color:#04e0d7;">
                <?php if ($_smarty_tpl->getVariable('isLoggedIn')->value===true){?><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>7),$_smarty_tpl);?>
"><?php }else{ ?><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>1),$_smarty_tpl);?>
"><?php }?>
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
    
    
    
</div>