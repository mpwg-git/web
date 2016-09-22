<?php /* Smarty version Smarty-3.0.7, created on 2016-01-05 12:38:10
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/702.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:517461831568bab224ab0e2-27831683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '523c4adc72e451e283f685b0543e560d26ffdf0e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/702.cache.html',
      1 => 1451984365,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '517461831568bab224ab0e2-27831683',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php if ($_smarty_tpl->getVariable('isRoom')->value==1){?>
    <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_getUser2RoomState','fUserId'=>$_smarty_tpl->getVariable('user')->value['wz_id'],'var'=>'roomState'),$_smarty_tpl);?>

    <?php $_smarty_tpl->tpl_vars['stateFav'] = new Smarty_variable($_smarty_tpl->getVariable('roomState')->value['FAV'], null, null);?>
    <?php $_smarty_tpl->tpl_vars['stateBlk'] = new Smarty_variable($_smarty_tpl->getVariable('roomState')->value['BLOCK'], null, null);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['stateFav'] = new Smarty_variable($_smarty_tpl->getVariable('user')->value['STATE_FAV'], null, null);?>
    <?php $_smarty_tpl->tpl_vars['stateBlk'] = new Smarty_variable($_smarty_tpl->getVariable('user')->value['STATE_BLOCK'], null, null);?>
<?php }?>

<!-- 702 def -->
<div class="button-container-favblock clearfix">
    <div class="inner clearfix">
        <div class="item">
            
            <?php echo smarty_function_xr_atom(array('a_id'=>769,'userId'=>$_smarty_tpl->getVariable('user')->value['wz_id'],'isRoom'=>$_smarty_tpl->getVariable('isRoom')->value,'state'=>$_smarty_tpl->getVariable('stateFav')->value,'return'=>1),$_smarty_tpl);?>

        </div>
        <div class="item">
            
            <?php echo smarty_function_xr_atom(array('a_id'=>770,'userId'=>$_smarty_tpl->getVariable('user')->value['wz_id'],'isRoom'=>$_smarty_tpl->getVariable('isRoom')->value,'state'=>$_smarty_tpl->getVariable('stateBlk')->value,'return'=>1),$_smarty_tpl);?>

        </div>
        
       <?php if ($_smarty_tpl->getVariable('favblockonly')->value!=1){?>
            <div class="item">
                 <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>16,'id'=>$_smarty_tpl->getVariable('user')->value['wz_id'],'m_suffix'=>$_smarty_tpl->getVariable('user')->value['wz_id']),$_smarty_tpl);?>
">
                    <span class="icon icon-Chat_Profil">
        			    <span class="path1"></span><span class="path2"></span><span class="path3"><span class="path4"></span>
        		    </span>
        		 </a>
            </div>
            
            <?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LAT']!=0&&$_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LNG']!=0){?>
                <div class="item">
                    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>19,'id'=>$_smarty_tpl->getVariable('user')->value['wz_id']),$_smarty_tpl);?>
" m_suffix=$user['wz_id']%<?php ?>>
                        <span class="icon icon-Map_Profil"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
                    </a>
                </div>
            <?php }?>
        <?php }?>
        
    </div>
</div>