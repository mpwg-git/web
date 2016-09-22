<?php /* Smarty version Smarty-3.0.7, created on 2015-02-24 15:47:41
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/309.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:212742577654ec8f0d6abc79-56473900%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b92ef7eee0e7f20dc848476e41912292180f749f' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/309.cache.html',
      1 => 1424789261,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212742577654ec8f0d6abc79-56473900',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?>
<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_custom::getMenu','var'=>'menuNew'),$_smarty_tpl);?>


<ul class="nav navbar-nav nav-main jquerydyn visible-lg">
    <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('menuNew')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
 $_smarty_tpl->tpl_vars['m']->value = $_smarty_tpl->tpl_vars['p']->key;
?>
        
        <?php if ($_smarty_tpl->tpl_vars['p']->value['active']['typ_id']!=''){?>
            <?php if ($_smarty_tpl->tpl_vars['p']->value['active']['typ_id']==$_smarty_tpl->tpl_vars['p']->value['busTyp']){?>
                <?php $_smarty_tpl->tpl_vars["active"] = new Smarty_variable(true, null, null);?>
            <?php }?>
        <?php }elseif($_smarty_tpl->tpl_vars['p']->value['active']['p_id']!=''){?>
            <?php if ($_smarty_tpl->tpl_vars['p']->value['active']['p_id']==$_smarty_tpl->tpl_vars['p']->value['p_id']){?>
                <?php $_smarty_tpl->tpl_vars["active"] = new Smarty_variable(true, null, null);?>
            <?php }?>
        <?php }elseif($_smarty_tpl->tpl_vars['p']->value['active']['bustyp']!=''){?>
            <?php if ($_smarty_tpl->tpl_vars['p']->value['active']['bustyp']==$_smarty_tpl->tpl_vars['p']->value['busTyp']){?>
                <?php $_smarty_tpl->tpl_vars["active"] = new Smarty_variable(true, null, null);?>
            <?php }?>
        <?php }?>
        
        <li class="dropdown<?php if ($_smarty_tpl->tpl_vars['m']->value==0){?> first <?php }?> number<?php echo $_smarty_tpl->tpl_vars['m']->value+1;?>
">
             <a 
                <?php if ($_smarty_tpl->tpl_vars['p']->value['p_id']!=''){?>href="<?php echo smarty_function_xr_genlink(array('p_id'=>$_smarty_tpl->tpl_vars['p']->value['p_id']),$_smarty_tpl);?>
"<?php }?>
                title="<?php echo $_smarty_tpl->tpl_vars['p']->value['name'];?>
"
                target="_self"
                class="dropdown-toggle hauptmenuepunkt <?php if ($_smarty_tpl->getVariable('active')->value==true){?>aktiv<?php }?>"
                <?php if ($_smarty_tpl->tpl_vars['p']->value['busTyp']!=''){?>
                    data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true"
                <?php }?>>
                <span><?php echo $_smarty_tpl->tpl_vars['p']->value['name'];?>
</span>
            </a>
            <?php if ($_smarty_tpl->tpl_vars['p']->value['busTyp']!=''){?>
                <?php echo smarty_function_xr_wz_fetch(array('id'=>332,'var'=>'busse','wz_TYP'=>$_smarty_tpl->tpl_vars['p']->value['busTyp']),$_smarty_tpl);?>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>217,'bustyp'=>$_smarty_tpl->tpl_vars['p']->value['busTyp'],'m_suffix'=>$_smarty_tpl->tpl_vars['p']->value['busTyp']),$_smarty_tpl);?>
" title="<?php echo smarty_function_xr_translate(array('tag'=>'uebersicht'),$_smarty_tpl);?>
</span>" target="_self" class="submenuepunkt">
                            <span><?php echo smarty_function_xr_translate(array('tag'=>'uebersicht'),$_smarty_tpl);?>
</span>
                        </a>
                    </li>
                    <?php  $_smarty_tpl->tpl_vars['p1'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['m1'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('busse')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['p1']->key => $_smarty_tpl->tpl_vars['p1']->value){
 $_smarty_tpl->tpl_vars['m1']->value = $_smarty_tpl->tpl_vars['p1']->key;
?>
                        <?php  $_smarty_tpl->tpl_vars['p2'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['m2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['p1']->value['wz_BESCHREIBUNG']['a']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['p2']->key => $_smarty_tpl->tpl_vars['p2']->value){
 $_smarty_tpl->tpl_vars['m2']->value = $_smarty_tpl->tpl_vars['p2']->key;
?>
                            <li>
                                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>216,'r_id'=>$_smarty_tpl->tpl_vars['p1']->value['wz_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['p1']->value['wz_id'])."/".($_smarty_tpl->tpl_vars['p2']->value['atom_cfg']["_".(((mb_detect_encoding($_smarty_tpl->getVariable('P_LANG')->value, 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->getVariable('P_LANG')->value,SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->getVariable('P_LANG')->value)))."_TITLE"])),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['p2']->value['atom_cfg']["_".(((mb_detect_encoding($_smarty_tpl->getVariable('P_LANG')->value, 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->getVariable('P_LANG')->value,SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->getVariable('P_LANG')->value)))."_TITLE"];?>
" target="_self" class="submenuepunkt">
                                    <span><?php echo $_smarty_tpl->tpl_vars['p2']->value['atom_cfg']["_".(((mb_detect_encoding($_smarty_tpl->getVariable('P_LANG')->value, 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtoupper($_smarty_tpl->getVariable('P_LANG')->value,SMARTY_RESOURCE_CHAR_SET) : strtoupper($_smarty_tpl->getVariable('P_LANG')->value)))."_TITLE"];?>
</span>
                                </a>
                            </li>
                        <?php }} ?>
                    <?php }} ?>
                </ul>
            <?php }?>
        </li>
        <?php $_smarty_tpl->tpl_vars["active"] = new Smarty_variable(false, null, null);?>
    <?php }} ?>
</ul>