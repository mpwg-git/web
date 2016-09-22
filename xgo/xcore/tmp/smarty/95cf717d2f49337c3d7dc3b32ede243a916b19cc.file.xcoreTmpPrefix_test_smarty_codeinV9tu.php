<?php /* Smarty version Smarty-3.0.7, created on 2016-01-15 15:46:09
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeinV9tu" */ ?>
<?php /*%%SmartyHeaderCode:98441184256990631577ac2-04570244%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95cf717d2f49337c3d7dc3b32ede243a916b19cc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeinV9tu',
      1 => 1452869169,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98441184256990631577ac2-04570244',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Lage"),$_smarty_tpl);?>
</label>
    <div class="column-input v-center" style="width:100%">
        <textarea class="form-control textarea-beschreibung" name="LAGE" placeholder="Öffentliche Verkehrsmittel, nächster Supermarkt, wichtige Punkte in der Nähe, ..."><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_LAGE'];?>
</textarea>
    </div>
</div>