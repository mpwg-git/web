<?php /* Smarty version Smarty-3.0.7, created on 2015-11-12 10:31:03
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6WvcrV" */ ?>
<?php /*%%SmartyHeaderCode:126952332556445c57c15075-06355505%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85910227f7f1c53c00ade6cc92ca3e1af4816cf2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6WvcrV',
      1 => 1447320663,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126952332556445c57c15075-06355505',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>


<div class="profil">
    
    <div class="col-xs-4 profil-links">
        <?php echo smarty_function_xr_atom(array('a_id'=>682,'data'=>$_smarty_tpl->getVariable('data')->value,'return'=>1),$_smarty_tpl);?>

    </div>
    
    
    <div class="col-xs-8 default-container-paddingtop">
        
        <div class="pull-right" style="padding-right:20px;color:#04e0d7;">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>37),$_smarty_tpl);?>
">
                <span class="icon-Close"></span>
            </a>
        </div>
        <div class="profil">
            
        
            
            <div class="clearfix"></div>
            
            
            <div class="maininfo">
                
                <span class="looklikeh1"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_VORNAME'];?>
</h3>
                <p class="subinfo"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_NACHNAME'];?>
<?php if ($_smarty_tpl->getVariable('data')->value['USER']['ALTER']>0){?> | <?php echo $_smarty_tpl->getVariable('data')->value['USER']['ALTER'];?>
 Jahre<?php }?></p>
                
               
            </div>
            <span class="subheadline whoiam"><?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']=='suche'){?><?php echo smarty_function_xr_translate(array('tag'=>"Suchender"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_translate(array('tag'=>"Anbieter"),$_smarty_tpl);?>
<?php }?></span>

            
            <div class="profil-text">
                <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_BESCHREIBUNG'];?>

            </div>
            
            <?php echo smarty_function_xr_atom(array('a_id'=>808,'matching'=>$_smarty_tpl->getVariable('data')->value['MATCHING'],'return'=>1,'desc'=>'matchinginfos detail'),$_smarty_tpl);?>

            
            <?php if (count($_smarty_tpl->getVariable('data')->value['IMAGES'])>0){?>
                <div class="wg-img-wrapper">
                    <?php echo smarty_function_xr_atom(array('a_id'=>750,'images'=>$_smarty_tpl->getVariable('data')->value['IMAGES'],'return'=>1),$_smarty_tpl);?>

                </div>
            <?php }?>
            
            <div class="clearfix"></div>
            
            <div class="fakten">
                <h3 class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"Die Wunschliste"),$_smarty_tpl);?>
</h3>
                
                <?php echo smarty_function_xr_atom(array('a_id'=>760,'return'=>1),$_smarty_tpl);?>

                
            </div>
            
            
        </div>
    </div>
    
</div>


