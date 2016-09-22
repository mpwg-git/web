<?php /* Smarty version Smarty-3.0.7, created on 2015-08-13 03:52:26
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeqXmi6i" */ ?>
<?php /*%%SmartyHeaderCode:200354791955cbf85ae18891-89937148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5a480cd2799ddc7732ebc0fcbaacb37a7cb6491' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeqXmi6i',
      1 => 1439430746,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200354791955cbf85ae18891-89937148',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>


<div class="profil">
    
    <div class="col-xs-4 profil-links">
        <?php echo smarty_function_xr_atom(array('a_id'=>682,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'return'=>1),$_smarty_tpl);?>

    </div>
    
    <div class="col-xs-8 default-container-paddingtop">
        
        <div class="profil">
            
            <div class="clearfix"></div>
            
            <div class="maininfo">
                <span class="looklikeh1"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_VORNAME'];?>
</h3>
                <p class="subinfo"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_NACHNAME'];?>
<?php if ($_smarty_tpl->getVariable('data')->value['USER']['ALTER']>0){?> | <?php echo $_smarty_tpl->getVariable('data')->value['USER']['ALTER'];?>
 Jahre<?php }?></p>
            </div>
            
            <div class="profil-text">
                <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_BESCHREIBUNG'];?>

            </div>
            
            <?php if (count($_smarty_tpl->getVariable('data')->value['IMAGES'])>0){?>
                <div class="wg-img-wrapper">
                    <h3 class="headline">Die WG</h3>
                        <?php echo smarty_function_xr_atom(array('a_id'=>750,'images'=>$_smarty_tpl->getVariable('data')->value['IMAGES'],'return'=>1),$_smarty_tpl);?>

                </div>
            <?php }?>
            
            <?php if ((count($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_MITBEWOHNER']['F'])>0||count($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_MITBEWOHNER']['M'])>0)){?>
                <div class="mitbewohner">
                    <h3 class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"Die Mitbewohner"),$_smarty_tpl);?>
</h3>
                    <?php echo smarty_function_xr_atom(array('a_id'=>752,'mitbewohner'=>$_smarty_tpl->getVariable('data')->value['PROFILE']['wz_MITBEWOHNER'],'return'=>1),$_smarty_tpl);?>

                </div>
            <?php }?>
            
            <?php echo smarty_function_xr_atom(array('a_id'=>706,'return'=>1),$_smarty_tpl);?>

            
            
        </div>
    </div>
    
</div>



