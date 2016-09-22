<?php /* Smarty version Smarty-3.0.7, created on 2015-11-18 18:20:19
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/821.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:333525286564cb3530a1030-08232542%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2788d0d9e0db33bca3c6edff72e603d917ad8a01' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/821.cache-3.html',
      1 => 1447867218,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '333525286564cb3530a1030-08232542',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn",'var'=>"loggedin"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_room::sc_getMyRoomState",'var'=>"roomState",'roomId'=>$_REQUEST['roomId']),$_smarty_tpl);?>


<div class="meinprofil-container meinraum-container">
    
    
    <div class="col-xs-12 default-container-paddingtop">
        
        <div class="pull-right" style="padding-top:20px;color:#04e0d7;">
                            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>7),$_smarty_tpl);?>
">
                                <span class="icon-Close"></span>
                            </a>
        </div>

        <h2><?php echo smarty_function_xr_translate(array('tag'=>"Raum Status ändern"),$_smarty_tpl);?>
</h2>
        
        <div class="button-joinroom-container">
            
            <?php if ($_smarty_tpl->getVariable('roomState')->value==1){?>
                <?php echo smarty_function_xr_atom(array('a_id'=>826,'return'=>1),$_smarty_tpl);?>

            <?php }else{ ?>
                <?php echo smarty_function_xr_atom(array('a_id'=>827,'return'=>1),$_smarty_tpl);?>

            <?php }?>
            
            
        </div>
        
    </div>
</div>
