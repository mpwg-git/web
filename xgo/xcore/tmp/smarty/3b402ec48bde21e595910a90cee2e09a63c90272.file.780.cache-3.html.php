<?php /* Smarty version Smarty-3.0.7, created on 2017-03-08 13:58:42
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/780.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:74986627358c000027f2a68-58015913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b402ec48bde21e595910a90cee2e09a63c90272' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/780.cache-3.html',
      1 => 1488977911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74986627358c000027f2a68-58015913',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><div class="form-group">
    <label for="cost"><?php echo smarty_function_xr_translate(array('tag'=>"bereit zu zahlen"),$_smarty_tpl);?>
</label>
    <div class="fakeline"></div>
    <div id="slider-range" data-valueab="<?php echo $_smarty_tpl->getVariable('searchSession')->value['price_from'];?>
" data-valuebis="<?php echo $_smarty_tpl->getVariable('searchSession')->value['price_to'];?>
"></div>
    <p class="legend clearfix"><span class="pull-left"><?php echo smarty_function_xr_translate(array('tag'=>"VON"),$_smarty_tpl);?>
</span><span class="pull-right"><?php echo smarty_function_xr_translate(array('tag'=>"BIS"),$_smarty_tpl);?>
</span></p>
</div>



<!--
<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_room::sc_getMieteByUserId','var'=>'miete'),$_smarty_tpl);?>


<div class="form-group">
    <label id="cost" for="cost"><?php echo smarty_function_xr_translate(array('tag'=>"bereit zu zahlen:"),$_smarty_tpl);?>
</label>
    <div class="fakeline"></div>
    <?php if (count($_smarty_tpl->getVariable('miete')->value)==0||$_smarty_tpl->getVariable('miete')->value==false){?>
        <div id="slider-range" data-valueab="1" data-valuebis="1000"></div>
    <?php }elseif(count($_smarty_tpl->getVariable('miete')->value)==1){?>
        <div id="slider-range" data-valueab="1" data-valuebis="<?php echo $_smarty_tpl->getVariable('miete')->value['wz_MIETE'];?>
"></div>
    <?php }else{ ?>
        <div id="slider-range" data-valueab="<?php echo intval($_smarty_tpl->getVariable('miete')->value[0]['wz_MIETE'])-50;?>
" data-valuebis="<?php echo intval($_smarty_tpl->getVariable('miete')->value[1]['wz_MIETE'])+50;?>
"></div>
    <?php }?>
    <p class="legend clearfix"><span class="pull-left"><?php echo smarty_function_xr_translate(array('tag'=>"VON"),$_smarty_tpl);?>
</span><span class="pull-right"><?php echo smarty_function_xr_translate(array('tag'=>"BIS"),$_smarty_tpl);?>
</span></p>
</div>
-->