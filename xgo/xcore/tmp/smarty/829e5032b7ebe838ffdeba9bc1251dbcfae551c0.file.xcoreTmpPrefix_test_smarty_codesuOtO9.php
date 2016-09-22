<?php /* Smarty version Smarty-3.0.7, created on 2016-05-23 21:40:32
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesuOtO9" */ ?>
<?php /*%%SmartyHeaderCode:199774998657435cb00daec6-20524290%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '829e5032b7ebe838ffdeba9bc1251dbcfae551c0' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesuOtO9',
      1 => 1464032432,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199774998657435cb00daec6-20524290',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_util::isV2",'var'=>"isV2"),$_smarty_tpl);?>


<?php echo smarty_function_xr_feUser(array('action'=>'isLoggedIn','var'=>'isLoggedIn'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->getVariable('isLoggedIn')->value){?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_room::sc_getRoomData",'var'=>"data"),$_smarty_tpl);?>


<?php if ($_REQUEST['debug']==1){?>
    <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value['MATCHING']),$_smarty_tpl);?>

<?php }?>
<div class="profil">
    
    <div class="col-xs-4 profil-links">
        <?php echo smarty_function_xr_atom(array('a_id'=>814,'data'=>$_smarty_tpl->getVariable('data')->value,'return'=>1),$_smarty_tpl);?>

    </div>
    
    <div class="col-xs-8 default-container-paddingtop">
        
        <div class="profil profil-room">
            
            <div class="row">
                
                <div class="col-sm-12" style="">
                    <div class="pull-right" style="padding-top:20px;padding-right:10px;color:#04e0d7;">
                        <a href="javascript:history.back();">
                            <span class="icon-Close"></span>
                        </a>
                    </div>
                    <?php if (count($_smarty_tpl->getVariable('data')->value['IMAGES'])>0){?>
                        <div class="wg-img-wrapper">
                            <h3 class="headline">Die WG</h3>
                            <?php echo smarty_function_xr_atom(array('a_id'=>750,'images'=>$_smarty_tpl->getVariable('data')->value['IMAGES'],'return'=>1),$_smarty_tpl);?>

                        </div>
                    <?php }?>        
                </div>
                
            </div>
            
            <div class="clearfix"></div>

            <div class="profil-text">
                <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_BESCHREIBUNG'];?>

            </div>
            
            <?php echo smarty_function_xr_atom(array('a_id'=>808,'matching'=>$_smarty_tpl->getVariable('data')->value['MATCHING'],'return'=>1,'desc'=>'matchinginfos detail','matchType'=>'room'),$_smarty_tpl);?>

            
            <div class="mitbewohner clearfix">
                <h3 class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"Die Mitbewohner"),$_smarty_tpl);?>
</h3>
                <?php echo smarty_function_xr_atom(array('a_id'=>812,'mitbewohner'=>$_smarty_tpl->getVariable('data')->value['ROOMIES'],'ageSpan'=>$_smarty_tpl->getVariable('data')->value['ROOMIES_AGE'],'roomData'=>$_smarty_tpl->getVariable('data')->value['ROOM'],'return'=>1),$_smarty_tpl);?>

            </div>
            
            <?php echo smarty_function_xr_atom(array('a_id'=>706,'return'=>1,'ageSpan'=>$_smarty_tpl->getVariable('data')->value['ROOMIES_AGE'],'desc'=>'fakten container'),$_smarty_tpl);?>

            
        </div>
    </div>
</div>

<?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_ADRESSE_LAT']!=0&&$_smarty_tpl->getVariable('data')->value['ROOM']['wz_ADRESSE_LNG']!=0){?>
    <?php echo smarty_function_xr_atom(array('a_id'=>777,'lat'=>$_smarty_tpl->getVariable('data')->value['ROOM']['wz_ADRESSE_LAT'],'lng'=>$_smarty_tpl->getVariable('data')->value['ROOM']['wz_ADRESSE_LNG'],'return'=>1),$_smarty_tpl);?>

<?php }?>


<?php }elseif($_smarty_tpl->getVariable('isV2')->value==1){?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_room::sc_getPublicRoomData",'var'=>"data"),$_smarty_tpl);?>


<div class="profil">
    <div class="col-xs-12 default-container-paddingtop">
        
        <div class="profil profil-room">
            
            <div class="row">
                
                <div class="col-sm-12" style="">
                    <div class="pull-right" style="padding-top:20px;padding-right:10px;color:#04e0d7;">
                        <a href="javascript:history.back();">
                            <span class="icon-Close"></span>
                        </a>
                    </div>
                    <?php if (count($_smarty_tpl->getVariable('data')->value['IMAGES'])>0){?>
                        <div class="wg-img-wrapper">
                            <h3 class="headline">Die WG</h3>
                            <?php echo smarty_function_xr_atom(array('a_id'=>750,'images'=>$_smarty_tpl->getVariable('data')->value['IMAGES'],'return'=>1),$_smarty_tpl);?>

                        </div>
                    <?php }?>        
                </div>
                
            </div>
            
            <div class="clearfix"></div>

            <div class="profil-text">
                <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_BESCHREIBUNG'];?>

            </div>
            
            <?php echo smarty_function_xr_feUser(array('action'=>'isLoggedIn','var'=>'isLoggedIn'),$_smarty_tpl);?>

            <?php if (!$_smarty_tpl->getVariable('isLoggedIn')->value){?>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>47),$_smarty_tpl);?>
" class="button start-button" style="position: fixed; z-index:3; bottom: 50px; width: 280px; left: 50%; margin-left: -140px; font-size: 24px; font-family: 'HelveticaNeueW01-65Medi'; font-weight: normal;">
                    <?php echo smarty_function_xr_translate(array('tag'=>'Anmelden'),$_smarty_tpl);?>
<br /><span style="font-size: 16px;">(<?php echo smarty_function_xr_translate(array('tag'=>'und mehr Zimmer sehen'),$_smarty_tpl);?>
)</span>
                </a>
            <?php }?>
            
            <div class="mitbewohner clearfix">
                <h3 class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"Die Mitbewohner"),$_smarty_tpl);?>
</h3>
                <?php echo smarty_function_xr_atom(array('a_id'=>812,'mitbewohner'=>$_smarty_tpl->getVariable('data')->value['ROOMIES'],'ageSpan'=>$_smarty_tpl->getVariable('data')->value['ROOMIES_AGE'],'roomData'=>$_smarty_tpl->getVariable('data')->value['ROOM'],'return'=>1),$_smarty_tpl);?>

            </div>
            
            <?php echo smarty_function_xr_atom(array('a_id'=>706,'return'=>1,'ageSpan'=>$_smarty_tpl->getVariable('data')->value['ROOMIES_AGE'],'desc'=>'fakten container'),$_smarty_tpl);?>

            
        </div>
    </div>
</div>

<?php }?>