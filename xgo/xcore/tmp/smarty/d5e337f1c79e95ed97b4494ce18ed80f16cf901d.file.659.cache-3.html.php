<?php /* Smarty version Smarty-3.0.7, created on 2016-08-02 10:21:20
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/659.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:182911002257a05800ad6077-41422848%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5e337f1c79e95ed97b4494ce18ed80f16cf901d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/659.cache-3.html',
      1 => 1464030680,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182911002257a05800ad6077-41422848',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_feUser(array('action'=>'isLoggedIn','var'=>'isLoggedIn'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->getVariable('isLoggedIn')->value){?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_chat::sc_getConversations",'var'=>"html"),$_smarty_tpl);?>


<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn",'var'=>"checkLogin"),$_smarty_tpl);?>


<div class="chatcontacts js-chatcontacts default-container-paddingtop">
    
    <?php $_smarty_tpl->tpl_vars['P_ID'] = new Smarty_Variable($_smarty_tpl->getVariable('P_ID',null,true,false)->value);if ($_smarty_tpl->tpl_vars['P_ID']->value = !'7'){?>
        <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']=='suche'){?>
            <span class="looklikeh1 title-map"><?php echo smarty_function_xr_translate(array('tag'=>"Map"),$_smarty_tpl);?>
</span>
            <div class="searchform">
                <div id="map" class="map"></div>
            </div>
        <?php }?>
    <?php }?>
    
    <span class="looklikeh1 title-chat"><?php echo smarty_function_xr_translate(array('tag'=>"Chat"),$_smarty_tpl);?>
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
    
</div>

<?php }else{ ?>

<?php echo smarty_function_xr_atom(array('a_id'=>661,'return'=>1),$_smarty_tpl);?>


<?php }?>