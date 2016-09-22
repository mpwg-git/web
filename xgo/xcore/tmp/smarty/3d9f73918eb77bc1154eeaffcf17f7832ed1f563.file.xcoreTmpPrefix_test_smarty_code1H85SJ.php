<?php /* Smarty version Smarty-3.0.7, created on 2015-11-26 13:15:13
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1H85SJ" */ ?>
<?php /*%%SmartyHeaderCode:21439069455656f7d17ebf03-17051547%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d9f73918eb77bc1154eeaffcf17f7832ed1f563' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1H85SJ',
      1 => 1448540113,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21439069455656f7d17ebf03-17051547',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php $_smarty_tpl->tpl_vars['user'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['USER'], null, null);?>
<?php $_smarty_tpl->tpl_vars['matching'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['MATCHING'], null, null);?>
<?php $_smarty_tpl->tpl_vars['room'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['ROOM'], null, null);?>
<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUser2RoomState",'fUserId'=>$_smarty_tpl->getVariable('room')->value['wz_id'],'var'=>"roomState"),$_smarty_tpl);?>


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
                
                <div class="clearfix"></div>
            </div>

            
            <p>
                <div class="icons">
                    <?php echo smarty_function_xr_atom(array('a_id'=>769,'theType'=>"room",'userId'=>$_smarty_tpl->getVariable('room')->value['wz_id'],'state'=>$_smarty_tpl->getVariable('roomState')->value['FAV'],'description'=>"Favourite",'return'=>1),$_smarty_tpl);?>

                </div>
            </p>
            
            <p>
                <div class="icons">
                    <!-- 814 desktop -->
                    <?php echo smarty_function_xr_atom(array('a_id'=>770,'theType'=>"room",'userId'=>$_smarty_tpl->getVariable('room')->value['wz_id'],'state'=>$_smarty_tpl->getVariable('roomState')->value['BLOCK'],'description'=>"Block",'return'=>1),$_smarty_tpl);?>

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