<?php /* Smarty version Smarty-3.0.7, created on 2016-04-08 12:15:11
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHG5HMF" */ ?>
<?php /*%%SmartyHeaderCode:1626347641570784af7529a1-57243171%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4941294047d9dd06a45070348c7f21324d1d30d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHG5HMF',
      1 => 1460110511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1626347641570784af7529a1-57243171',
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
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_GESCHLECHT_MITBEWOHNER']!=''){?>
        <div class="fakt clearfix gewuenschter-mitbewohner">
            <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Mitbewohner"),$_smarty_tpl);?>
</span><span class="info">
                <span class="icon-frau" <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_GESCHLECHT_MITBEWOHNER']=='M'){?>style="display:none;"<?php }?>><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                <span class="icon-mann" <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_GESCHLECHT_MITBEWOHNER']=='F'){?>style="display:none;"<?php }?>><span class="path1"></span><span class="path2"></span></span>
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
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_LAGE']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Lage"),$_smarty_tpl);?>
</span><span class="info full-width"><?php echo nl2br($_smarty_tpl->getVariable('data')->value['ROOM']['wz_LAGE']);?>
</span>
    </div>
    <?php }?>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_AUSSTATTUNG']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Ausstattung"),$_smarty_tpl);?>
</span><span class="info full-width"><?php echo nl2br($_smarty_tpl->getVariable('data')->value['ROOM']['wz_AUSSTATTUNG']);?>
</span>
    </div>
    <?php }?>
    
    
    
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_BESCHREIBUNG']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Beschreibung"),$_smarty_tpl);?>
</span><span class="info full-width"><?php echo nl2br($_smarty_tpl->getVariable('data')->value['ROOM']['wz_BESCHREIBUNG']);?>
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




