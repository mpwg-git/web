<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 19:14:49
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/877.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:477784325695429997ee86-23295260%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5526e69b9452bf15614fefc1425e588f8f45dbc5' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/877.cache.html',
      1 => 1452622472,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '477784325695429997ee86-23295260',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Alter der Mitbewohner?"),$_smarty_tpl);?>
</label>
    <div class="column-input v-center">
        <input class="form-control" name="MITBEWOHNER_ALTER_VON" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_MITBEWOHNER_ALTER_VON'];?>
" id="MITBEWOHNER_ALTER_VON" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'von'),$_smarty_tpl);?>
?" />
    </div><!--
    --><div class="devider v-center">-</div><!--
    --><div class="column-input v-center">
        <input class="form-control" name="MITBEWOHNER_ALTER_BIS" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_MITBEWOHNER_ALTER_BIS'];?>
" id="MITBEWOHNER_ALTER_BIS" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'bis'),$_smarty_tpl);?>
?" />
    </div>
</div>