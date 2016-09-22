<?php /* Smarty version Smarty-3.0.7, created on 2015-08-27 23:45:28
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFO2k7S" */ ?>
<?php /*%%SmartyHeaderCode:52143204255df84f8c47b37-73109911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2733eaae6b1f6da81ea21697e2155499fb3c3b13' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFO2k7S',
      1 => 1440711928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52143204255df84f8c47b37-73109911',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['ZEITRAUM']!=''){?>
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

<div class="fakt clearfix">
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

<div class="fakt clearfix">
    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Sprachen"),$_smarty_tpl);?>
?</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['SPRACHEN'];?>
</span>
</div>

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