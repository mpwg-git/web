<?php /* Smarty version Smarty-3.0.7, created on 2015-12-17 19:29:24
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeus2dda" */ ?>
<?php /*%%SmartyHeaderCode:13272458215672ff0448d584-53861603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '297f291c01610e5321277ce1d7ac1d5aa54f4783' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeus2dda',
      1 => 1450376964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13272458215672ff0448d584-53861603',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_getMyUserType','var'=>'userType'),$_smarty_tpl);?>

<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('userType')->value),$_smarty_tpl);?>


<?php if ($_smarty_tpl->getVariable('userType')->value=='biete'){?>
    <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_ADRESSE']!=''){?>
        Gesuchte Adresse: <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_ADRESSE'];?>
 
        <br>
        Umkreis: <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_UMKREIS'];?>
 
    <?php }?>
    
    Miete: von <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_MIETE_VON'];?>
 bis <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_MIETE_BIS'];?>

    <br>
    
    Suche ab: <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['USER']['wz_ZEITRAUM_VON'],"%d.%m.%Y");?>

    <br>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_VON']>0||$_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_BIS']>0){?>
        WG-Größe: 
        <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_VON']>0){?>
            von <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_VON'];?>

        <?php }?>
        <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_BIS']>0){?>
            bis <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_BIS'];?>

        <?php }?>
        <br>
    <?php }?>
    
    
    <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_ZIMMERGROESSE_VON']>0||$_smarty_tpl->getVariable('data')->value['USER']['wz_ZIMMERGROESSE_BIS']>0){?>
        Zimmergröße: 
        <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_ZIMMERGROESSE_VON']>0){?>
            von <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_ZIMMERGROESSE_VON'];?>

        <?php }?>
        <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_ZIMMERGROESSE_BIS']>0){?>
            bis <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_ZIMMERGROESSE_BIS'];?>

        <?php }?>
        <br>
    <?php }?>
    
    Haustiere: <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_HAUSTIERE'];?>

    <br>
    
    Vegetarier / Veganer: <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_VEGGIE'];?>

    <br>
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