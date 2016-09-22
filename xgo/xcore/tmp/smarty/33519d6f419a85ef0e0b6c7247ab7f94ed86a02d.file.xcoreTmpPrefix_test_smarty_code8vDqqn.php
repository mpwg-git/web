<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 11:58:54
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8vDqqn" */ ?>
<?php /*%%SmartyHeaderCode:19560486955694dc6ed19eb1-13279106%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33519d6f419a85ef0e0b6c7247ab7f94ed86a02d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8vDqqn',
      1 => 1452596334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19560486955694dc6ed19eb1-13279106',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php $_smarty_tpl->tpl_vars['p_id_favsblocked'] = new Smarty_variable(11, null, null);?>

<?php if ($_smarty_tpl->getVariable('mobile')->value==1){?>
    <?php $_smarty_tpl->tpl_vars['p_id_favsblocked'] = new Smarty_variable(17, null, null);?>
<?php }?>

<div class="header-icons-fav-blocked">
    <div class="item <?php if ($_smarty_tpl->getVariable('P_ID')->value==$_smarty_tpl->getVariable('p_id_favsblocked')->value&&$_REQUEST['filter']=='FAVS'){?>active<?php }?>">
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>$_smarty_tpl->getVariable('p_id_favsblocked')->value,'filter'=>'FAVS','m_suffix'=>"favourites"),$_smarty_tpl);?>
">
            
            <?php if ($_smarty_tpl->getVariable('P_ID')->value==$_smarty_tpl->getVariable('p_id_favsblocked')->value&&$_REQUEST['filter']=='FAVS'){?>
                <span class="icon-Favourite_aktiv">
    			<span class="path1"></span><span class="path2"></span>
    			</span>
                <span class="text"><?php echo smarty_function_xr_translate(array('tag'=>"Favourites"),$_smarty_tpl);?>
</span>
            <?php }else{ ?>
                <span class="icon-Favourite_inaktiv"></span>
                <span class="text"><?php echo smarty_function_xr_translate(array('tag'=>"Favourites"),$_smarty_tpl);?>
</span>
            <?php }?>
            
        </a>
    </div>
    <div class="item <?php if ($_smarty_tpl->getVariable('P_ID')->value==$_smarty_tpl->getVariable('p_id_favsblocked')->value&&$_REQUEST['filter']=='BLOCKED'){?>active<?php }?>">
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>$_smarty_tpl->getVariable('p_id_favsblocked')->value,'filter'=>'BLOCKED','m_suffix'=>"blocked"),$_smarty_tpl);?>
">
            
             <?php if ($_smarty_tpl->getVariable('P_ID')->value==$_smarty_tpl->getVariable('p_id_favsblocked')->value&&$_REQUEST['filter']=='BLOCKED'){?>
                <span class="icon-Blocked_aktiv">
    			<span class="path1"></span><span class="path2"></span><span class="path3"></span>
    			</span>
                <span class="text"><?php echo smarty_function_xr_translate(array('tag'=>"Blocked"),$_smarty_tpl);?>
</span>
            <?php }else{ ?>
                 <span class="icon-Blocked_inaktiv"></span>
                <span class="text"><?php echo smarty_function_xr_translate(array('tag'=>"Blocked"),$_smarty_tpl);?>
</span>
            <?php }?>
            
           
        </a>
    </div>
</div>