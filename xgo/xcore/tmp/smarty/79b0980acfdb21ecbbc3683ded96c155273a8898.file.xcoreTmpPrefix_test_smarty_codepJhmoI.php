<?php /* Smarty version Smarty-3.0.7, created on 2015-08-28 12:57:19
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codepJhmoI" */ ?>
<?php /*%%SmartyHeaderCode:175026175955e03e8f83c470-27746386%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79b0980acfdb21ecbbc3683ded96c155273a8898' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codepJhmoI',
      1 => 1440759439,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175026175955e03e8f83c470-27746386',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php $_smarty_tpl->tpl_vars['p_id_favsblocked'] = new Smarty_variable(11, null, null);?>

<?php if ($_smarty_tpl->getVariable('mobile')->value==1){?>
    <?php $_smarty_tpl->tpl_vars['p_id_favsblocked'] = new Smarty_variable(17, null, null);?>
<?php }?>

<div class="item">
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>$_smarty_tpl->getVariable('p_id_favsblocked')->value,'filter'=>'FAVS','m_suffix'=>"favourites"),$_smarty_tpl);?>
">
        
        <?php if ($_smarty_tpl->getVariable('P_ID')->value==$_smarty_tpl->getVariable('p_id_favsblocked')->value&&$_REQUEST['filter']=='FAVS'){?>
            <span class="icon-Favourite_aktiv"></span>
            Favourites
        <?php }else{ ?>
            <span class="icon-Favourite_inaktiv"></span>
            Favourites
        <?php }?>
        
    </a>
</div>
<div class="item">
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>$_smarty_tpl->getVariable('p_id_favsblocked')->value,'filter'=>'BLOCKED','m_suffix'=>"blocked"),$_smarty_tpl);?>
">
        
         <?php if ($_smarty_tpl->getVariable('P_ID')->value==$_smarty_tpl->getVariable('p_id_favsblocked')->value&&$_REQUEST['filter']=='FAVS'){?>
             <span class="icon-Blocked_aktiv"></span>
             Blocked
        <?php }else{ ?>
             <span class="icon-Blocked_inaktiv"></span>
        Blocked
        <?php }?>
        
       
    </a>
</div>