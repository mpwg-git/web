<?php /* Smarty version Smarty-3.0.7, created on 2016-08-03 12:50:44
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/816.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:6483568557a1cc843fc461-42289092%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fab80fb60c7ff0ef41d55ca247f43417935af64e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/816.cache-1.html',
      1 => 1451984363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6483568557a1cc843fc461-42289092',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Miete?"),$_smarty_tpl);?>
*</label>
    <div class="column-input v-center">
        <input class="form-control" name="MIETE" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_MIETE'];?>
" id="MIETE" placeholder="€?" rel="required"  />
    </div>
    
    <div class="error-div" id="MIETE_error">
        <?php echo smarty_function_xr_translate(array('tag'=>"Bitte Miete(von) angeben"),$_smarty_tpl);?>

    </div>
    
</div>