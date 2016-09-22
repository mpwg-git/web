<?php /* Smarty version Smarty-3.0.7, created on 2015-12-22 09:31:20
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/689.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:58588613756790a58f2c2b8-97130795%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e59f9ac028a1bff81b5fbe7d4c8b91d01216aa4c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/689.cache-3.html',
      1 => 1450724522,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58588613756790a58f2c2b8-97130795',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php if ($_REQUEST['comingFromRedirect']){?>
    <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyRoomData",'roomId'=>$_REQUEST['roomId'],'var'=>"data"),$_smarty_tpl);?>

<?php }else{ ?>
    <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyRoomData",'roomId'=>$_REQUEST['roomId'],'var'=>"data",'redirect'=>true),$_smarty_tpl);?>

<?php }?>


<?php if ($_REQUEST['dev']==1){?>
<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>

<?php }?>

<div class="col-xs-4 meinprofil-links">
    <?php echo smarty_function_xr_atom(array('a_id'=>678,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'return'=>1),$_smarty_tpl);?>

</div>

<div class="col-xs-8 default-container-paddingtop meinprofil-meinedaten meinprofil-biete">
    
    <div class="pull-right" style="font-size: 0.924vw; padding-top:5px; color:#04e0d7;">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>7),$_smarty_tpl);?>
">
                <span class="icon-Close"></span>
            </a>
    </div>  
    
    
    <span class="looklikeh1">
        <?php echo smarty_function_xr_translate(array('tag'=>"Mein Raum"),$_smarty_tpl);?>

    </span>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>851,'return'=>1,'showFace'=>0),$_smarty_tpl);?>

    
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_ACTIVE']=='Y'){?>
        <button class="js-deactivate-room" data-room="<?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_id'];?>
"><?php echo smarty_function_xr_translate(array('tag'=>'Deaktivieren'),$_smarty_tpl);?>
</button>
    <?php }else{ ?>
        <button class="js-activate-room" data-room="<?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_id'];?>
"><?php echo smarty_function_xr_translate(array('tag'=>'Aktivieren'),$_smarty_tpl);?>
</button>
    <?php }?>
    <button class="js-delete-room-popup" data-room="<?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_id'];?>
">
        <?php echo smarty_function_xr_translate(array('tag'=>"Raum löschen"),$_smarty_tpl);?>

    </button>
    
    
    
    
    <?php echo smarty_function_xr_atom(array('a_id'=>748,'images'=>$_smarty_tpl->getVariable('data')->value['IMAGES'],'fromRoom'=>1,'refid'=>$_REQUEST['roomId'],'return'=>1),$_smarty_tpl);?>

    
    <div class="clearfix"></div>
        
    <?php echo smarty_function_xr_atom(array('a_id'=>732,'profile'=>$_smarty_tpl->getVariable('data')->value['ROOM'],'return'=>1),$_smarty_tpl);?>

    
</div>