<?php /* Smarty version Smarty-3.0.7, created on 2016-08-02 16:14:15
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/872.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:202611463157a0aab7697620-17657837%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc9da851eb179ec7e241a4c28429566fe71920b9' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/872.cache.html',
      1 => 1452604204,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202611463157a0aab7697620-17657837',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="form-group">
    <label for="zusatzkosten-val"><?php echo smarty_function_xr_translate(array('tag'=>"Zusatzkosten?"),$_smarty_tpl);?>
*</label>
    <div class="column-input v-center">
        <input class="form-control" name="ZUSATZKOSTEN" value="<?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_ZUSATZKOSTEN'];?>
" id="zusatzkosten-val" placeholder="0" rel="required"  />
    </div>
</div>