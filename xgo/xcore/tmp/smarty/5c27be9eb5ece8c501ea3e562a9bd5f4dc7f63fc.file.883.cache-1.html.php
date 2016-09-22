<?php /* Smarty version Smarty-3.0.7, created on 2016-08-02 15:39:14
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/883.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:1746054657a0a282c38b51-35941871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c27be9eb5ece8c501ea3e562a9bd5f4dc7f63fc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/883.cache-1.html',
      1 => 1453314650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1746054657a0a282c38b51-35941871',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_wz_fetch(array('id'=>882,'var'=>'kategorien'),$_smarty_tpl);?>


<div class="blog-page filter-wrapper">
    <span class="looklikeh1">
        <?php echo smarty_function_xr_translate(array('tag'=>"Blog"),$_smarty_tpl);?>

    </span>
    <form id="blog-kategorie" class="blog-kategorie-form clearfix">
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
</div>