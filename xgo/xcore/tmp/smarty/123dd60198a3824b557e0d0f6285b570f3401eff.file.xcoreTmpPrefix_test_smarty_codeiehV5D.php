<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 14:23:03
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeiehV5D" */ ?>
<?php /*%%SmartyHeaderCode:7736302845694fe37cb3114-41815615%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '123dd60198a3824b557e0d0f6285b570f3401eff' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeiehV5D',
      1 => 1452604983,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7736302845694fe37cb3114-41815615',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="fakten">
    <h3 class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"Die Fakten"),$_smarty_tpl);?>
</h3>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_ZEITRAUM_VON']!=''||$_smarty_tpl->getVariable('data')->value['ROOM']['wz_ZEITRAUM_BIS']!=''){?>
        <div class="fakt clearfix">
            <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Zeitraum"),$_smarty_tpl);?>
</span>
            <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_ZEITRAUM_VON']!=''){?> 
                <span style="display:block; float:left; color:#fff">
                    <?php if (!$_smarty_tpl->getVariable('data')->value['ROOM']['wz_ZEITRAUM_BIS']){?>
                        <?php echo smarty_function_xr_translate(array('tag'=>'von'),$_smarty_tpl);?>

                    <?php }?>
                    <?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_ZEITRAUM_VON'];?>

                </span>
            <?php }?>
            <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_ZEITRAUM_VON']&&$_smarty_tpl->getVariable('data')->value['ROOM']['wz_ZEITRAUM_BIS']){?>
                <span style="display:block; float:left; color:#fff">&nbsp;-&nbsp;</span>
            <?php }?>
            <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_ZEITRAUM_BIS']!=''){?>
                <span style="display:block; float:left; color:#fff">
                    <?php if (!$_smarty_tpl->getVariable('data')->value['ROOM']['wz_ZEITRAUM_VON']){?>
                        <?php echo smarty_function_xr_translate(array('tag'=>'bis'),$_smarty_tpl);?>

                    <?php }?>
                    <?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_ZEITRAUM_BIS'];?>

                </span>
            <?php }?>
        </div>
    <?php }?>
    
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['ZEITRAUM']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Zeitraum"),$_smarty_tpl);?>
:</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['ZEITRAUM'];?>
</span>
    </div>
    <?php }?>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_MIETE']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Miete"),$_smarty_tpl);?>
</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_MIETE'];?>
 €</span>
    </div>
    <?php }?>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_GROESSE']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Zimmergrösse"),$_smarty_tpl);?>
</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_GROESSE'];?>
 m²</span>
    </div>
    <?php }?>
    

    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['ABLOESE']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Ablöse"),$_smarty_tpl);?>
</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['ABLOESE'];?>
</span>
    </div>
    <?php }?>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['ZUSATZKOSTEN']>0){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Zusatzkosten"),$_smarty_tpl);?>
</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['ZUSATZKOSTEN'];?>
 €</span>
    </div>
    <?php }?>

    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['RAUCHER']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Raucher"),$_smarty_tpl);?>
</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['RAUCHER'];?>
</span>
    </div>
    <?php }?>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['HAUSTIERE']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Haustiere"),$_smarty_tpl);?>
</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['HAUSTIERE'];?>
</span>
    </div>
    <?php }?>
    
        
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['VEGGIE']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Vegetarier"),$_smarty_tpl);?>
<br><?php echo smarty_function_xr_translate(array('tag'=>"/Veganer"),$_smarty_tpl);?>
</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['VEGGIE'];?>
</span>
    </div>
    <?php }?>
    
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['BARRIEREFREI']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Barrierefrei"),$_smarty_tpl);?>
</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['BARRIEREFREI'];?>
</span>
    </div>
    <?php }?>
    
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['SPRACHEN']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Sprachen"),$_smarty_tpl);?>
</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['SPRACHEN'];?>
</span>
    </div>
    <?php }?>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_AUSSTATTUNG']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Beschreibung"),$_smarty_tpl);?>
</span><span class="info"><?php echo nl2br($_smarty_tpl->getVariable('data')->value['ROOM']['wz_AUSSTATTUNG']);?>
</span>
    </div>
    <?php }?>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_LAGE']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Beschreibung"),$_smarty_tpl);?>
</span><span class="info"><?php echo nl2br($_smarty_tpl->getVariable('data')->value['ROOM']['wz_LAGE']);?>
</span>
    </div>
    <?php }?>
    
    
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_BESCHREIBUNG']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Beschreibung"),$_smarty_tpl);?>
</span><span class="info"><?php echo nl2br($_smarty_tpl->getVariable('data')->value['ROOM']['wz_BESCHREIBUNG']);?>
</span>
    </div>
    <?php }?>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_ADRESSE']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Adresse"),$_smarty_tpl);?>
</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_ADRESSE'];?>
</span>
    </div>
    <?php }?>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_ADRESSE']!=''){?>
        <script>
            top.showOnMap2 = {
                'lat':"<?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_ADRESSE_LAT'];?>
",
                'lng':"<?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_ADRESSE_LNG'];?>
",
                'el' : '.map2'
            };
        </script>
        <div id="map" class="map2" style="height:60vw"></div>
    <?php }?>
    
</div>




