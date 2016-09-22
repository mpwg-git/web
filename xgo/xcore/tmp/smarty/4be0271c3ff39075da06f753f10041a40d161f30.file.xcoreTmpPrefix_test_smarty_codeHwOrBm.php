<?php /* Smarty version Smarty-3.0.7, created on 2015-11-19 12:38:23
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHwOrBm" */ ?>
<?php /*%%SmartyHeaderCode:1541703997564db4af78f720-19783687%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4be0271c3ff39075da06f753f10041a40d161f30' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHwOrBm',
      1 => 1447933103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1541703997564db4af78f720-19783687',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['USER'], null, null);?>
<?php $_smarty_tpl->tpl_vars['matching'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['MATCHING'], null, null);?>
<?php $_smarty_tpl->tpl_vars['room'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['ROOM'], null, null);?>
<?php echo smarty_function_xr_print_r(array('val'=>$_REQUEST),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_room::sc_getMyRoomState",'var'=>"roomState",'roomId'=>$_smarty_tpl->getVariable('room')->value['wz_id']),$_smarty_tpl);?>

<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('roomState')->value),$_smarty_tpl);?>


<div class="profil suche">

    <div class="profil-inner">
        
        
        <div class="profil-inner-padding profile-inner-padding-room">
            <div class="matchinginfos">
                <span class="drducksays"><span class="icon-duck"></span> <?php echo smarty_function_xr_translate(array('tag'=>"Dr. Duck Says:"),$_smarty_tpl);?>
</span>
            
                <p class="match-text">
                <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['GESAMT'];?>

                </p>
                
                
                <span class="prozent"><?php echo $_smarty_tpl->getVariable('data')->value['MATCHING']['RESULT']['MATCHROOM']['matchGesamt'];?>
</span>
                <span class="match">match</span>
                <span><?php echo smarty_function_xr_atom(array('a_id'=>833,'matching'=>$_smarty_tpl->getVariable('data')->value['MATCHING'],'return'=>1,'desc'=>'matchinginfos detail'),$_smarty_tpl);?>
</span>
                <div class="clearfix"></div>
            </div>
            
            
            
            
            
            
            <p>
                <div class="icons">
                    <?php echo smarty_function_xr_atom(array('a_id'=>769,'theType'=>"room",'userId'=>$_smarty_tpl->getVariable('room')->value['wz_id'],'state'=>$_smarty_tpl->getVariable('room')->value['STATE_FAV'],'description'=>"Favourite",'return'=>1),$_smarty_tpl);?>

                </div>
            </p>
            
            <p>
                <div class="icons">
                    <?php echo smarty_function_xr_atom(array('a_id'=>770,'theType'=>"room",'userId'=>$_smarty_tpl->getVariable('room')->value['wz_id'],'state'=>$_smarty_tpl->getVariable('room')->value['STATE_BLOCK'],'description'=>"Block",'return'=>1),$_smarty_tpl);?>

                </div>
            </p>
            
            
            
            
            
            
            <p>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>12,'id'=>$_smarty_tpl->getVariable('room')->value['wz_ADMIN'],'m_suffix'=>"room/".($_smarty_tpl->getVariable('room')->value['wz_id'])),$_smarty_tpl);?>
">
                    <div class="icons">
                        <span class="icon-Chat_Profil">
        				<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span>
        				</span> <span class="icon-description"><?php echo smarty_function_xr_translate(array('tag'=>"Nachricht"),$_smarty_tpl);?>
</span>
                    </div>
                </a>
            </p>
            
           
        </div>
        
    </div>    
</div>