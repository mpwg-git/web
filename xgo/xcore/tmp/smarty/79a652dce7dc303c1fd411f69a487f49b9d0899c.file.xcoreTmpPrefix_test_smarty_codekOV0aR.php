<?php /* Smarty version Smarty-3.0.7, created on 2016-01-07 12:16:23
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekOV0aR" */ ?>
<?php /*%%SmartyHeaderCode:1253120672568e4907a93ee9-72422157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79a652dce7dc303c1fd411f69a487f49b9d0899c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekOV0aR',
      1 => 1452165383,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1253120672568e4907a93ee9-72422157',
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
    <div class="item">
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>$_smarty_tpl->getVariable('p_id_favsblocked')->value,'filter'=>'FAVS','m_suffix'=>"favourites"),$_smarty_tpl);?>
">
            
            <?php if ($_smarty_tpl->getVariable('P_ID')->value==$_smarty_tpl->getVariable('p_id_favsblocked')->value&&$_REQUEST['filter']=='FAVS'){?>
                <span class="icon-Favourite_aktiv">
    			<span class="path1"></span><span class="path2"></span>
    			</span>
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
            
             <?php if ($_smarty_tpl->getVariable('P_ID')->value==$_smarty_tpl->getVariable('p_id_favsblocked')->value&&$_REQUEST['filter']=='BLOCKED'){?>
                <span class="icon-Blocked_aktiv">
    			<span class="path1"></span><span class="path2"></span><span class="path3"></span>
    			</span>
                Blocked
            <?php }else{ ?>
                 <span class="icon-Blocked_inaktiv"></span>
                Blocked
            <?php }?>
            
           
        </a>
    </div>
</div>