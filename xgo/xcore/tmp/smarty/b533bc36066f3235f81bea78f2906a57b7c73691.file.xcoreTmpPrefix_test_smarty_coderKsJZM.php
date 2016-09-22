<?php /* Smarty version Smarty-3.0.7, created on 2015-10-12 13:52:02
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coderKsJZM" */ ?>
<?php /*%%SmartyHeaderCode:2067228508561b9ee20c97a1-59763294%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b533bc36066f3235f81bea78f2906a57b7c73691' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coderKsJZM',
      1 => 1444650722,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2067228508561b9ee20c97a1-59763294',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_room::sc_getRoomData",'var'=>"data"),$_smarty_tpl);?>


<div class="profil">
    
    
    <div class="col-xs-4 profil-links">
        <?php echo smarty_function_xr_atom(array('a_id'=>682,'data'=>$_smarty_tpl->getVariable('data')->value,'return'=>1),$_smarty_tpl);?>

    </div>
    
    
    <div class="col-xs-8 default-container-paddingtop">
        
        <div class="profil profil-room">
            
            <div class="row">
                
                <div class="col-sm-9">
                    <?php if (count($_smarty_tpl->getVariable('data')->value['IMAGES'])>0){?>
                        <div class="wg-img-wrapper">
                            <h3 class="headline">Die WG</h3>
                                <?php echo smarty_function_xr_atom(array('a_id'=>750,'images'=>$_smarty_tpl->getVariable('data')->value['IMAGES'],'return'=>1),$_smarty_tpl);?>

                        </div>
                    <?php }?>        
                </div>
                
                <div class="col-sm-3">
                    <div class="matchinginfos">
                        <span class="drducksays"><span class="icon-duck"></span> <?php echo smarty_function_xr_translate(array('tag'=>"Dr. Duck Says:"),$_smarty_tpl);?>
</span>
                        <span class="prozent"><?php echo $_smarty_tpl->getVariable('data')->value['MATCHING']['RESULT']['MATCHROOM']['matchGesamt'];?>
</span>
                        <span class="match">match</span>
                         <div class="clearfix"></div>
                    </div>    
                </div>
                
            </div>
            
            
            
            <div class="clearfix"></div>
            
            
            <div class="profil-text">
                <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_BESCHREIBUNG'];?>

            </div>
            
            
            
            <?php echo smarty_function_xr_atom(array('a_id'=>808,'matching'=>$_smarty_tpl->getVariable('data')->value['MATCHING'],'return'=>1,'desc'=>'matchinginfos detail'),$_smarty_tpl);?>



            <div class="mitbewohner clearfix">
                <h3 class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"Die Mitbewohner"),$_smarty_tpl);?>
</h3>
                <?php echo smarty_function_xr_atom(array('a_id'=>812,'mitbewohner'=>$_smarty_tpl->getVariable('data')->value['ROOMIES'],'return'=>1),$_smarty_tpl);?>

            </div>
            
            <?php echo smarty_function_xr_atom(array('a_id'=>706,'return'=>1,'desc'=>'fakten container'),$_smarty_tpl);?>

            
            
        </div>
    </div>
    
</div>

<?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LAT']!=0&&$_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LNG']!=0){?>
    <?php echo smarty_function_xr_atom(array('a_id'=>777,'lat'=>$_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LAT'],'lng'=>$_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LNG'],'return'=>1),$_smarty_tpl);?>

<?php }?>



