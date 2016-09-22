<?php /* Smarty version Smarty-3.0.7, created on 2015-11-23 16:01:25
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejANTOo" */ ?>
<?php /*%%SmartyHeaderCode:59179523856532a45546461-11242098%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ae7c51aa8f302b2bd29e522070b91b9a0f1a0f2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejANTOo',
      1 => 1448290885,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59179523856532a45546461-11242098',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_room::sc_getRoomData",'var'=>"data"),$_smarty_tpl);?>

<?php $_smarty_tpl->tpl_vars['matching'] = new Smarty_variable($_smarty_tpl->getVariable('data')->value['MATCHING'], null, null);?>
<div class="profil">
    
    <?php echo smarty_function_xr_atom(array('a_id'=>789,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'return'=>1,'desc'=>"profil main image"),$_smarty_tpl);?>

        
    <?php echo smarty_function_xr_atom(array('a_id'=>790,'return'=>1,'matchGesamt'=>$_smarty_tpl->getVariable('matching')->value['RESULT']['MATCHROOM']['matchGesamt'],'desc'=>"matching infos"),$_smarty_tpl);?>

    
    <div class="clearfix"></div>
    
    <div class="maininfo">
        <h3 class="name"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_VORNAME'];?>
</h3>
        <p class="subinfo"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_NACHNAME'];?>
<?php if ($_smarty_tpl->getVariable('data')->value['USER']['ALTER']>0){?> | <?php echo $_smarty_tpl->getVariable('data')->value['USER']['ALTER'];?>
 Jahre<?php }?></p>
    </div>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>808,'matching'=>$_smarty_tpl->getVariable('data')->value['MATCHING'],'return'=>1,'desc'=>'matchinginfos detail'),$_smarty_tpl);?>

    
    <!-- Button Container 657 mobile -->
    <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value['ROOM']['wz_id']),$_smarty_tpl);?>

    <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUser2RoomState",'fUserId'=>$_smarty_tpl->getVariable('data')->value['ROOM']['wz_id'],'var'=>"roomState"),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>702,'user'=>$_smarty_tpl->getVariable('data')->value['ROOM'],'data'=>$_smarty_tpl->getVariable('data')->value,'theType'=>'room','state'=>$_smarty_tpl->getVariable('roomState')->value,'return'=>1),$_smarty_tpl);?>


     <?php if (count($_smarty_tpl->getVariable('data')->value['IMAGES'])>0){?>
        <div class="wg-img-wrapper">
            <h3 class="headline">Die WG</h3>
                <?php echo smarty_function_xr_atom(array('a_id'=>750,'images'=>$_smarty_tpl->getVariable('data')->value['IMAGES'],'return'=>1),$_smarty_tpl);?>

        </div>
    <?php }?>
    
    
    <?php if (($_smarty_tpl->getVariable('data')->value['PROFILE']['MITBEWOHNER']['F']>0||$_smarty_tpl->getVariable('data')->value['PROFILE']['MITBEWOHNER']['M']>0)){?>
        <div class="mitbewohner">
            <h3 class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"Die Mitbewohner"),$_smarty_tpl);?>
</h3>
            <?php echo smarty_function_xr_atom(array('a_id'=>752,'mitbewohner'=>$_smarty_tpl->getVariable('data')->value['PROFILE']['MITBEWOHNER'],'return'=>1),$_smarty_tpl);?>

        </div>
    <?php }?>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>706,'return'=>1,'desc'=>'fakten container'),$_smarty_tpl);?>

    
</div>