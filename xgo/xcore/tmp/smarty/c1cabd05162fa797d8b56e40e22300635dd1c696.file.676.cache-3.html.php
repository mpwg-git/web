<?php /* Smarty version Smarty-3.0.7, created on 2016-01-14 15:43:58
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/676.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:13244070795697b42e365ef9-04055975%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1cabd05162fa797d8b56e40e22300635dd1c696' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/676.cache-3.html',
      1 => 1452782638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13244070795697b42e365ef9-04055975',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>


<div class="profil">
    <div class="col-xs-4 profil-links">
        <?php echo smarty_function_xr_atom(array('a_id'=>682,'data'=>$_smarty_tpl->getVariable('data')->value,'return'=>1),$_smarty_tpl);?>

    </div>
    <div class="col-xs-8 default-container-paddingtop">
        <div class="profil">
            
            <div class="pull-right" style="padding-top:2px;padding-right:20px;color:#04e0d7;">
                <a href="javascript:history.back();">
                    <span class="icon-Close"></span>
                </a>
            </div>   
            
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
            
            <div class="fakten clearfix">
                <?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_GEBURTSDATUM']!='0000-00-00'&&$_smarty_tpl->getVariable('data')->value['PROFILE']['wz_GEBURTSDATUM']!=''){?>
                <div class="fakt clearfix">
                    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Geburtstag"),$_smarty_tpl);?>
</span><span class="info"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_GEBURTSDATUM'],"%d.%m.%Y");?>
</span>
                </div>
                <?php }?>
                
                <?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_TELEFON']!=''){?>
                <div class="fakt clearfix">
                    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Telefonnummer"),$_smarty_tpl);?>
</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['wz_TELEFON'];?>
</span>
                </div>
                <?php }?>
            </div>
            
            <div class="profil-text">
                <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_BESCHREIBUNG'];?>

            </div>
            
            <?php echo smarty_function_xr_atom(array('a_id'=>808,'matching'=>$_smarty_tpl->getVariable('data')->value['MATCHING'],'return'=>1,'desc'=>'matchinginfos detail'),$_smarty_tpl);?>

            
            <?php if (count($_smarty_tpl->getVariable('data')->value['IMAGES'])>0&&$_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']=='suche'){?>
                <div class="wg-img-wrapper" style="margin-top:2vw">
                    <?php echo smarty_function_xr_atom(array('a_id'=>750,'images'=>$_smarty_tpl->getVariable('data')->value['IMAGES'],'return'=>1),$_smarty_tpl);?>

                </div>
            <?php }?>
            
            <div class="clearfix"></div>
            
            <?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_TYPE']=='suche'){?>
            <div class="fakten">
                <h3 class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"Die Wunschliste"),$_smarty_tpl);?>
</h3>
                <?php echo smarty_function_xr_atom(array('a_id'=>760,'return'=>1),$_smarty_tpl);?>

            </div>
            <?php }?>
        </div>
    </div>
</div>


