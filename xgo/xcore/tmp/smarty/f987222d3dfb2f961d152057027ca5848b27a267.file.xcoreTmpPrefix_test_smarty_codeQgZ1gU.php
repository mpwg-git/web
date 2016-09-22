<?php /* Smarty version Smarty-3.0.7, created on 2015-12-21 18:27:58
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQgZ1gU" */ ?>
<?php /*%%SmartyHeaderCode:20301670215678369e924ed7-54914559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f987222d3dfb2f961d152057027ca5848b27a267' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQgZ1gU',
      1 => 1450718878,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20301670215678369e924ed7-54914559',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_getMyUserType','var'=>'userType'),$_smarty_tpl);?>


<?php if ($_smarty_tpl->getVariable('userType')->value=='biete'){?>
    <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_ADRESSE']!=''){?>
        <div class="fakt clearfix">
            <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Gesuchte Adresse"),$_smarty_tpl);?>
?</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_ADRESSE'];?>
</span>
        </div>
    
        <div class="fakt clearfix">
            <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Umkreis"),$_smarty_tpl);?>
?</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_UMKREIS'];?>
</span>
        </div>
    <?php }?>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_MIETE_VON']!=''||$_smarty_tpl->getVariable('data')->value['ROOM']['wz_MIETE_BIS']!=''){?>
        <div class="fakt clearfix">
            <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Miete"),$_smarty_tpl);?>
?</span>
            <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_MIETE_VON']!=''){?> 
                <span style="display:block; float:left; color:#fff">
                    <?php if (!$_smarty_tpl->getVariable('data')->value['ROOM']['wz_MIETE_BIS']){?>
                        <?php echo smarty_function_xr_translate(array('tag'=>'von'),$_smarty_tpl);?>

                    <?php }?>
                    <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_MIETE_VON'];?>

                </span>
            <?php }?>
            <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_MIETE_VON']&&$_smarty_tpl->getVariable('data')->value['ROOM']['wz_MIETE_BIS']){?>
                <span style="display:block; float:left; color:#fff">&nbsp;-&nbsp;</span>
            <?php }?>
            <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_MIETE_BIS']!=''){?>
                <span style="display:block; float:left; color:#fff">
                    <?php if (!$_smarty_tpl->getVariable('data')->value['ROOM']['wz_MIETE_VON']){?>
                        <?php echo smarty_function_xr_translate(array('tag'=>'bis'),$_smarty_tpl);?>

                    <?php }?>
                    <?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_MIETE_VON'];?>

                </span>
            <?php }?>
        </div>
    <?php }?>
    
    lala
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Miete von"),$_smarty_tpl);?>
?</span><span class="info">€ <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_MIETE_VON'];?>
</span>
    </div>
    
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Miete bis"),$_smarty_tpl);?>
?</span><span class="info">€ <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_MIETE_BIS'];?>
</span>
    </div>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_ZEITRAUM_VON']!='0000-00-00'){?>
        <div class="fakt clearfix">
            <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Suche ab"),$_smarty_tpl);?>
?</span><span class="info"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['USER']['wz_ZEITRAUM_VON'],"%d.%m.%Y");?>
</span>
        </div>
    <?php }?>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_VON']>0||$_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_BIS']>0){?>
    
        <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_VON']>0){?>
            <div class="fakt clearfix">
                <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"WG-Größe von"),$_smarty_tpl);?>
?</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_VON'];?>
</span>
            </div>
        <?php }?>
        
        <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_BIS']>0){?>
            <div class="fakt clearfix">
                <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"WG-Größe bis"),$_smarty_tpl);?>
?</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_BIS'];?>
</span>
            </div>
        <?php }?>
    <?php }?>
    
    
    <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_ZIMMERGROESSE_VON']>0||$_smarty_tpl->getVariable('data')->value['USER']['wz_ZIMMERGROESSE_BIS']>0){?>
    
        <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_ZIMMERGROESSE_VON']>0){?>
            <div class="fakt clearfix">
                <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Zimmergröße von"),$_smarty_tpl);?>
?</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_ZIMMERGROESSE_VON'];?>
</span>
            </div>
        <?php }?>
        
        <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_ZIMMERGROESSE_BIS']>0){?>
            <div class="fakt clearfix">
                <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Zimmergröße bis"),$_smarty_tpl);?>
?</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_ZIMMERGROESSE_BIS'];?>
</span>
            </div>
        <?php }?>
    <?php }?>
    
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Haustiere"),$_smarty_tpl);?>
?</span><span class="info"><?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_HAUSTIERE']=='Y'){?><?php echo smarty_function_xr_translate(array('tag'=>"Ja"),$_smarty_tpl);?>
<?php }elseif($_smarty_tpl->getVariable('data')->value['USER']['wz_HAUSTIERE']=='N'){?><?php echo smarty_function_xr_translate(array('tag'=>"Nein"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_translate(array('tag'=>"Egal"),$_smarty_tpl);?>
<?php }?></span>
    </div>
    
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Vegetarier / Veganer"),$_smarty_tpl);?>
?</span><span class="info"><?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_VEGGIE']=='Y'){?><?php echo smarty_function_xr_translate(array('tag'=>"Ja"),$_smarty_tpl);?>
<?php }elseif($_smarty_tpl->getVariable('data')->value['USER']['wz_VEGGIE']=='N'){?><?php echo smarty_function_xr_translate(array('tag'=>"Nein"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_translate(array('tag'=>"Egal"),$_smarty_tpl);?>
<?php }?></span>
    </div>
    
<?php }?>


<?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['ZEITRAUM']!=''){?>
<div class="fakt clearfix">
    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Zeitraum"),$_smarty_tpl);?>
?</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['ZEITRAUM'];?>
</span>
</div>
<?php }?>

<?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['MIETE']!=''){?>
<div class="fakt clearfix">
    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Miete"),$_smarty_tpl);?>
?</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['MIETE'];?>
 €</span>
</div>
<?php }?>

<div class="fakt clearfix gewuenschter-mitbewohner">
    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Mitbewohner"),$_smarty_tpl);?>
</span><span class="info">
                    <span class="icon-frau" <?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_MITBEWOHNER']=='M'){?>style="display:none;"<?php }?>><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                    <span class="icon-mann" <?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_MITBEWOHNER']=='F'){?>style="display:none;"<?php }?>><span class="path1"></span><span class="path2"></span></span>
    </span>
</div>

<?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['WGGROESSE']!=''){?>
<div class="fakt clearfix">
    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"WG-Größe"),$_smarty_tpl);?>
?</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['WGGROESSE'];?>
 Personen</span>
</div>
<?php }?>

<div class="fakt clearfix">
    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Ablöse"),$_smarty_tpl);?>
?</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['ABLOESE'];?>
</span>
</div>

<div class="fakt clearfix">
    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Raucher"),$_smarty_tpl);?>
?</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['RAUCHER'];?>
</span>
</div>

<?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_SPRACHEN']!=''){?>
<div class="fakt clearfix">
    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Sprachen"),$_smarty_tpl);?>
?</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['SPRACHEN'];?>
</span>
</div>
<?php }?>

<?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE']!=''){?>
<div class="fakt clearfix">
    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Wunschadresse"),$_smarty_tpl);?>
?</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE'];?>
</span>
</div>
<?php }?>

<?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_UMKREIS']!='0'&&$_smarty_tpl->getVariable('data')->value['PROFILE']['wz_UMKREIS']!=''){?>
<div class="fakt clearfix">
    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Umkreis"),$_smarty_tpl);?>
?</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['wz_UMKREIS'];?>
 KM</span>
</div>
<?php }?>