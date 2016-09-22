<?php /* Smarty version Smarty-3.0.7, created on 2016-01-08 15:40:36
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHQhs6S" */ ?>
<?php /*%%SmartyHeaderCode:683323636568fca643580b0-20483042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52f4b3cbc76efee3862aa762671f45b92700af26' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHQhs6S',
      1 => 1452264036,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '683323636568fca643580b0-20483042',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
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
                <span style="vertical-align:middle">Favourites</span>
            <?php }else{ ?>
                <span class="icon-Favourite_inaktiv"></span>
                <span style="vertical-align:middle">Favourites</span>
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
                <span style="vertical-align:middle">Blocked</span>
            <?php }else{ ?>
                 <span class="icon-Blocked_inaktiv"></span>
                <span style="vertical-align:middle">Blocked</span>
            <?php }?>
            
           
        </a>
    </div>
</div>