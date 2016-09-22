<?php /* Smarty version Smarty-3.0.7, created on 2015-11-16 19:53:29
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codetj3F2w" */ ?>
<?php /*%%SmartyHeaderCode:1219628877564a2629ba4dd7-20909365%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a0b721282ca9cd0e831c63b2643919b1c99b32a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codetj3F2w',
      1 => 1447700009,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1219628877564a2629ba4dd7-20909365',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="fakten">
    <h3 class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"Die Fakten"),$_smarty_tpl);?>
</h3>
    
    
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
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Vegetarier/Veganer"),$_smarty_tpl);?>
</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['VEGGIE'];?>
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
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_ADRESSE']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Adresse"),$_smarty_tpl);?>
</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_ADRESSE'];?>
</span>
    </div>
    <?php }?>
    
    
    
</div>