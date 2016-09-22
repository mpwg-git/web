<?php /* Smarty version Smarty-3.0.7, created on 2015-11-13 16:33:08
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code10ZHmA" */ ?>
<?php /*%%SmartyHeaderCode:568778974564602b455d317-00608526%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9cebfba8059b3dbd4d2d9f3eeedbc3bc30f3fe1f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code10ZHmA',
      1 => 1447428788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '568778974564602b455d317-00608526',
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
:</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['ZEITRAUM'];?>
</span>
    </div>
    <?php }?>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['MIETE']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Miete"),$_smarty_tpl);?>
</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['MIETE'];?>
 €</span>
    </div>
    <?php }?>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['ZIMMERGROESSE']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Zimmergrösse"),$_smarty_tpl);?>
</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['ZIMMERGROESSE'];?>
 m²</span>
    </div>
    <?php }?>
    

    <?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['ABLOESE']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Ablöse"),$_smarty_tpl);?>
</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['ABLOESE'];?>
</span>
    </div>
    <?php }?>

    
    
    
    
    <?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['RAUCHER']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Raucher"),$_smarty_tpl);?>
</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['RAUCHER'];?>
</span>
    </div>
    <?php }?>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['SPRACHEN']!=''){?>
    <div class="fakt clearfix">
        <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Sprachen"),$_smarty_tpl);?>
</span><span class="info"><?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['SPRACHEN'];?>
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
    
</div>




