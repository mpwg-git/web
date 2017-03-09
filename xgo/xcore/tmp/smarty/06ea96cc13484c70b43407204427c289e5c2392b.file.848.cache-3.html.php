<?php /* Smarty version Smarty-3.0.7, created on 2017-02-10 17:58:14
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/848.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:496898231589df126197226-39897402%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06ea96cc13484c70b43407204427c289e5c2392b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/848.cache-3.html',
      1 => 1486558322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '496898231589df126197226-39897402',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Raumname (nicht öffentlich)"),$_smarty_tpl);?>
*</label>
    <div class="column-input v-center" style="width:66%">
        <?php if ($_smarty_tpl->getVariable('profile')->value['wz_BESCHRIFTUNG_INTERN']!=''){?>
            <input class="form-control" name="BESCHRIFTUNG_INTERN" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_BESCHRIFTUNG_INTERN'];?>
" id="BESCHRIFTUNG_INTERN" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>"Name in Übersicht?"),$_smarty_tpl);?>
" rel="required"  />
        <?php }else{ ?>
            <input class="form-control" name="BESCHRIFTUNG_INTERN" value='<?php echo smarty_function_xr_translate(array('tag'=>"Raum"),$_smarty_tpl);?>
' id="BESCHRIFTUNG_INTERN" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>"Name in Übersicht?"),$_smarty_tpl);?>
" rel="required"  />
        <?php }?>
    </div>
    
    <div class="error-div" id="BESCHRIFTUNG_INTERN_error">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="error-message"><?php echo smarty_function_xr_translate(array('tag'=>"Bitte interne Beschriftung angeben"),$_smarty_tpl);?>
</span>
    </div>
    
</div>