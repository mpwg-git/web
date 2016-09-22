<?php /* Smarty version Smarty-3.0.7, created on 2016-09-21 13:51:46
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCJ4kwA" */ ?>
<?php /*%%SmartyHeaderCode:12198313457e29072043396-54126345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c54662020164b413a9b4a0434fbecd2ed4d1a5b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCJ4kwA',
      1 => 1474465906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12198313457e29072043396-54126345',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_set')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_set.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_util::isV2",'var'=>"isV2"),$_smarty_tpl);?>


<?php echo smarty_function_xr_feUser(array('action'=>'isLoggedIn','var'=>'isLoggedIn'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->getVariable('isLoggedIn')->value){?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_room::sc_getRoomData",'var'=>"data"),$_smarty_tpl);?>


<?php echo smarty_function_xr_set(array('FBOG_DATA'=>$_smarty_tpl->getVariable('data')->value['ROOM'],'override'=>0),$_smarty_tpl);?>


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


<?php echo smarty_function_xr_set(array('FBOG_DATA'=>$_smarty_tpl->getVariable('data')->value['ROOM'],'override'=>0),$_smarty_tpl);?>


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
                <?php if (($_smarty_tpl->getVariable('data')->value['ROOM']['wz_HASH']!='')){?>
                    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
" class="button start-button" style="position: fixed; z-index:3; bottom: 90px; padding: 20px 0; left: 45%; font-family: 'HelveticaNeueW01-65Medi'; font-weight: normal;">
                        <span><?php echo smarty_function_xr_translate(array('tag'=>'Jetzt anmelden'),$_smarty_tpl);?>
</span>
                    </a>        
                <?php }else{ ?>
                    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
" class="button start-button" style="position: fixed; z-index:3; bottom: 90px; padding: 20px 0; left: 31%; font-family: 'HelveticaNeueW01-65Medi'; font-weight: normal;">
                        <span><?php echo smarty_function_xr_translate(array('tag'=>'Anmelden'),$_smarty_tpl);?>
</span>
                    </a>
                    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>47),$_smarty_tpl);?>
" class="button start-button" style="position: fixed; z-index:3; bottom: 90px; padding: 20px 0; left: 54%; font-family: 'HelveticaNeueW01-65Medi'; font-weight: normal;">
                        <span><?php echo smarty_function_xr_translate(array('tag'=>'Jetzt Registrieren'),$_smarty_tpl);?>
</span>
                    </a>
                <?php }?>
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

<?php }else{ ?>
<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_room::sc_getRoomData",'var'=>"data"),$_smarty_tpl);?>

<?php }?>

