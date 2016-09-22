<?php /* Smarty version Smarty-3.0.7, created on 2016-01-20 19:31:03
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/883.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:2004527371569fd26775d9d3-27223387%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6dae1b26ec9036a81f5c525f7fb090de12280d2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/883.cache.html',
      1 => 1453314650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2004527371569fd26775d9d3-27223387',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_wz_fetch(array('id'=>882,'var'=>'kategorien'),$_smarty_tpl);?>


<span class="looklikeh1">
    <?php echo smarty_function_xr_translate(array('tag'=>"Blog"),$_smarty_tpl);?>

</span>
<form id="blog-kategorie" class="blog-kategorie-form">
    <ul class="blog-cat-list">
        <li>
            <input id="blog-kategorie-all" type="checkbox"/>
            <div class="fake-checkbox"></div>
            <label for="blog-kategorie-all"><?php echo smarty_function_xr_translate(array('tag'=>"Alle Kategorien"),$_smarty_tpl);?>
</label>    
        </li>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('kategorien')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <li>
                <input id="blog-kategorie-<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
" class="blog-menu-input" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
" name="blogcat-<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
"/>
                <div class="fake-checkbox"></div>
                <label for="blog-kategorie-<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_KATEGORIE'];?>
</label>                
            </li>
        <?php }} ?>
    </ul>
</form>