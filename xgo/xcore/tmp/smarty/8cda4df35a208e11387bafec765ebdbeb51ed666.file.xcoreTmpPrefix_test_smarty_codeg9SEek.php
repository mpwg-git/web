<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 13:24:27
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeg9SEek" */ ?>
<?php /*%%SmartyHeaderCode:17579228235694f07b805644-05597854%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8cda4df35a208e11387bafec765ebdbeb51ed666' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeg9SEek',
      1 => 1452601467,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17579228235694f07b805644-05597854',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php  $_smarty_tpl->tpl_vars['room'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('roomdataNew')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["roomloop"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['room']->key => $_smarty_tpl->tpl_vars['room']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["roomloop"]['iteration']++;
?>
    <?php if ($_REQUEST['dev']==1){?>
        <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->tpl_vars['room']->value),$_smarty_tpl);?>

    <?php }?>
    
    <li class="room-settings <?php if ($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_ACTIVE']!='Y'){?>room-not-active<?php }?>" style=" list-style-position:inside; list-style:none; border: 1px solid #04e0d7;margin-bottom:10px;padding:5px; ">
        <a class="room-edit" href="<?php echo smarty_function_xr_genlink(array('p_id'=>30,'m_suffix'=>($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_id'])."/".($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_BESCHRIFTUNG_INTERN']),'roomId'=>$_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_id']),$_smarty_tpl);?>
">
            <span class="room-number">
                <?php echo smarty_function_xr_translate(array('tag'=>'Raum'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['roomloop']['iteration'];?>

            </span>
            <span class="room-name" style="padding-left:50px;">
                <?php echo $_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_BESCHRIFTUNG_INTERN'];?>
 
            </span>
        </a>
        
        <?php $_smarty_tpl->tpl_vars['onclick'] = new Smarty_variable('', null, null);?>
        <?php if ($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_ACTIVE']=='N'){?>
            <?php ob_start();?><?php echo smarty_function_xr_translate(array('tag'=>'Aktivieren'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['activateStr'] = new Smarty_variable($_tmp1, null, null);?>
            <?php $_smarty_tpl->tpl_vars['jsclass'] = new Smarty_variable("js-activate-room", null, null);?>
            <?php $_smarty_tpl->tpl_vars['iconclass'] = new Smarty_variable("inactive", null, null);?>
        <?php }else{ ?>
            <?php ob_start();?><?php echo smarty_function_xr_translate(array('tag'=>'Deaktivieren'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['activateStr'] = new Smarty_variable($_tmp2, null, null);?>
            <?php $_smarty_tpl->tpl_vars['jsclass'] = new Smarty_variable("js-deactivate-room", null, null);?>
            <?php $_smarty_tpl->tpl_vars['iconclass'] = new Smarty_variable("active", null, null);?>
        <?php }?>
        
        
        
        
        
        <a  title="<?php echo smarty_function_xr_translate(array('tag'=>"Raum löschen"),$_smarty_tpl);?>
" 
            class="js-delete-room-popup room-edit-icon icon-delete pull-right" 
            style="display:inline-block; cursor:pointer;"
            data-room="<?php echo $_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_id'];?>
" >
            <span>&nbsp;</span>
            <span class="add-xdelete edit-icon"><span class="path1"></span><span class="path2"></span></span>
        </a>
        <?php if ($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_ACTIVE']!='Y'){?>
            <a class="room-edit-icon pull-right">
                <span class="icon-Blocked_inaktiv"></span>
            </a>
        <?php }?>
    </li>
<?php }} ?>
