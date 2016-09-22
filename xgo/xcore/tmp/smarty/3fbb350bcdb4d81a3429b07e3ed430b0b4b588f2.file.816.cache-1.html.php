<?php /* Smarty version Smarty-3.0.7, created on 2015-11-26 12:40:00
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/816.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:12400521815656ef907fd1c8-00280901%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fbb350bcdb4d81a3429b07e3ed430b0b4b588f2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/816.cache-1.html',
      1 => 1448537575,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12400521815656ef907fd1c8-00280901',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
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