<?php /* Smarty version Smarty-3.0.7, created on 2016-01-15 15:47:28
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/873.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:1908807438569906805d9730-55254831%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28f2a03cbdcd08b63c2f79e97b9bc850d77b196f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/873.cache.html',
      1 => 1452869188,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1908807438569906805d9730-55254831',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Ausstattung"),$_smarty_tpl);?>
</label>
    <div class="column-input v-center" style="width:100%">
        <textarea class="form-control textarea-beschreibung" name="AUSSTATTUNG" placeholder="Waschmaschine, WLAN, Lift, Spülmaschine, Keller, Fahrradabstellplatz, etc."><?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_AUSSTATTUNG'];?>
</textarea>
    </div>
</div>