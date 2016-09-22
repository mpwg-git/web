<?php /* Smarty version Smarty-3.0.7, created on 2016-01-14 15:28:27
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeSXFpxA" */ ?>
<?php /*%%SmartyHeaderCode:5052216055697b08ba8d006-86794282%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cee19d0a9edad77c7369eff07e716243e37f27a4' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeSXFpxA',
      1 => 1452781707,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5052216055697b08ba8d006-86794282',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['ZEITRAUM']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Zeitraum"),$_smarty_tpl);?>
?</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['ZEITRAUM'];?>
</span>
    </div>
    <?php }?>

    <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_MIETE_VON']!=''||$_smarty_tpl->getVariable('data')->value['USER']['wz_MIETE_BIS']!=''){?>
        <div class="fakt clearfix">
            <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Miete"),$_smarty_tpl);?>
?</span>
            <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_MIETE_VON']!=''){?> 
                <span style="display:block; float:left; color:#fff">
                    <?php if (!$_smarty_tpl->getVariable('data')->value['USER']['wz_MIETE_BIS']){?>
                        <?php echo smarty_function_xr_translate(array('tag'=>'von'),$_smarty_tpl);?>

                    <?php }?>
                    € <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_MIETE_VON'];?>

                </span>
            <?php }?>
            <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_MIETE_VON']&&$_smarty_tpl->getVariable('data')->value['USER']['wz_MIETE_BIS']){?>
                <span style="display:block; float:left; color:#fff">&nbsp;-&nbsp;</span>
            <?php }?>
            <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_MIETE_BIS']!=''){?>
                <span style="display:block; float:left; color:#fff">
                    <?php if (!$_smarty_tpl->getVariable('data')->value['USER']['wz_MIETE_VON']){?>
                        <?php echo smarty_function_xr_translate(array('tag'=>'bis'),$_smarty_tpl);?>

                    <?php }?>
                    € <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_MIETE_BIS'];?>

                </span>
            <?php }?>
        </div>
    <?php }?>
    
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
    
    <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_VON']>0||$_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_BIS']>0){?>
        <div class="fakt clearfix">
            <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"WG - Größe"),$_smarty_tpl);?>
?</span>
            <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_VON']!=''){?> 
                <span style="display:block; float:left; color:#fff">
                    <?php if (!$_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_BIS']){?>
                        <?php echo smarty_function_xr_translate(array('tag'=>'von'),$_smarty_tpl);?>

                    <?php }?>
                    <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_VON'];?>

                </span>
            <?php }?>
            <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_VON']&&$_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_BIS']){?>
                <span style="display:block; float:left; color:#fff">&nbsp;-&nbsp;</span>
            <?php }?>
            <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_BIS']!=''){?>
                <span style="display:block; float:left; color:#fff">
                    <?php if (!$_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_VON']){?>
                        <?php echo smarty_function_xr_translate(array('tag'=>'bis'),$_smarty_tpl);?>

                    <?php }?>
                    <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_WGGROESSE_BIS'];?>

                </span>
            <?php }?>
        </div>
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

