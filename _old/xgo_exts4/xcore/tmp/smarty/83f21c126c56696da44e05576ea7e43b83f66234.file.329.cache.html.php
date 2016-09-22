<?php /* Smarty version Smarty-3.0.7, created on 2015-02-24 15:47:41
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/329.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:201154491054ec8f0da1fed7-30010552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83f21c126c56696da44e05576ea7e43b83f66234' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/329.cache.html',
      1 => 1424789261,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201154491054ec8f0da1fed7-30010552',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_menuGrid')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_menuGrid.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php if ($_REQUEST['bustyp']!=''){?>
    <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_custom::getSubmenu','bustyp'=>$_REQUEST['bustyp'],'var'=>'submenu'),$_smarty_tpl);?>

<?php }elseif($_REQUEST['r_id']!=''){?>
    <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_custom::getSubmenu','id'=>$_REQUEST['r_id'],'var'=>'submenu'),$_smarty_tpl);?>

<?php }?>

<?php if (count($_smarty_tpl->getVariable('submenu')->value)>1){?>
    <hr class="visible-lg"/>
    <div class="container menus visible-lg">
        <div class="submenuDesk">
            <ul class="nav navbar-nav nav-main jquerydyn secondMenu ">
                <?php echo smarty_function_xr_menuGrid(array('p_id'=>$_smarty_tpl->getVariable('f_id')->value,'P_ID'=>$_smarty_tpl->getVariable('P_ID')->value,'online'=>1,'depth'=>2,'var'=>'menu'),$_smarty_tpl);?>

                <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('submenu')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['p']->iteration=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
 $_smarty_tpl->tpl_vars['m']->value = $_smarty_tpl->tpl_vars['p']->key;
 $_smarty_tpl->tpl_vars['p']->iteration++;
?>
                    <li class="dropdown<?php if ($_smarty_tpl->tpl_vars['m']->value==0){?> first <?php }?> number<?php echo $_smarty_tpl->tpl_vars['m']->value+1;?>
">
                        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>216,'r_id'=>$_smarty_tpl->tpl_vars['p']->value['id'],'m_suffix'=>($_smarty_tpl->tpl_vars['p']->value['id'])."/".($_smarty_tpl->tpl_vars['p']->value['name'])),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['p']->value['name'];?>
" target="_self" class="dropdown-toggle hauptmenuepunkt <?php if ($_smarty_tpl->tpl_vars['p']->value['active']==true){?>aktiv<?php }?>">
                            <span><?php echo $_smarty_tpl->tpl_vars['p']->value['name'];?>
</span>
                            <span class="borderRight"></span>
                            <?php if ($_smarty_tpl->tpl_vars['p']->iteration==1){?><span class="borderLeft"></span><?php }?>
                        </a>
                    </li>
                <?php }} ?>
           </ul> 
        </div>
    </div>
<?php }?>