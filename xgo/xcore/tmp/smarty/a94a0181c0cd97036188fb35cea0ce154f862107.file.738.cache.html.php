<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 12:13:53
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/738.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:89583296155d5a8617d4496-55867126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a94a0181c0cd97036188fb35cea0ce154f862107' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/738.cache.html',
      1 => 1440065474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89583296155d5a8617d4496-55867126',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"zimmergrösse?"),$_smarty_tpl);?>
</label>
    <div class="column-input v-center">
        <input class="form-control" name="ZIMMERGROESSE_VON" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'von'),$_smarty_tpl);?>
 <?php echo smarty_function_xr_translate(array('tag'=>'m²'),$_smarty_tpl);?>
?" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_ZIMMERGROESSE_VON'];?>
" />
    </div><!--
    --><div class="devider v-center">-</div><!--
    --><div class="column-input v-center">
        <input class="form-control" name="ZIMMERGROESSE_BIS" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'bis'),$_smarty_tpl);?>
 <?php echo smarty_function_xr_translate(array('tag'=>'m²'),$_smarty_tpl);?>
?" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_ZIMMERGROESSE_BIS'];?>
"/>
    </div>
</div>