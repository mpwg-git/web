<?php /* Smarty version Smarty-3.0.7, created on 2015-11-25 11:04:48
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeWVRFI1" */ ?>
<?php /*%%SmartyHeaderCode:894926726565587c0c68067-93200183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de501451351f0227e1288ab527cd86b192fcf7dc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeWVRFI1',
      1 => 1448445888,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '894926726565587c0c68067-93200183',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php  $_smarty_tpl->tpl_vars['room'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('roomdataNew')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["roomloop"]['iteration']=0;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['room']->key => $_smarty_tpl->tpl_vars['room']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["roomloop"]['iteration']++;
?>
    <li class="room-settings">
        <a class="room-edit" href="<?php echo smarty_function_xr_genlink(array('p_id'=>30,'m_suffix'=>($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_id'])."/".($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_BESCHRIFTUNG_INTERN']),'roomId'=>$_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_id']),$_smarty_tpl);?>
">
            <span class="room-number">
                <?php echo smarty_function_xr_translate(array('tag'=>'Raum'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['roomloop']['iteration'];?>

            </span>
            <span class="room-name">
                <?php echo $_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_BESCHRIFTUNG_INTERN'];?>
 
            </span>
        </a>
        
        <?php if ($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_ACTIVE']=='N'){?>
            <?php ob_start();?><?php echo smarty_function_xr_translate(array('tag'=>'Aktivieren'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['activate'] = new Smarty_variable($_tmp1, null, null);?>
        <?php }else{ ?>
            <?php ob_start();?><?php echo smarty_function_xr_translate(array('tag'=>'Deaktivieren'),$_smarty_tpl);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['activate'] = new Smarty_variable($_tmp2, null, null);?>
        <?php }?>
        <a title="<?php echo $_smarty_tpl->getVariable('activate')->value;?>
" data-room="<?php echo $_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_id'];?>
" class="js-deactivate-room room-edit-icon icon-status <?php if ($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_ACTIVE']=='N'){?>inactive<?php }else{ ?>active<?php }?>" href="<?php echo smarty_function_xr_genlink(array('p_id'=>32,'m_suffix'=>($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_id'])."/".($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_BESCHRIFTUNG_INTERN']),'roomId'=>$_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_id']),$_smarty_tpl);?>
">
            <span><?php echo $_smarty_tpl->getVariable('activate')->value;?>
</span>
        </a>
        
        <a title="<?php echo smarty_function_xr_translate(array('tag'=>"User einladen"),$_smarty_tpl);?>
" class="room-edit-icon icon-invite" href="<?php echo smarty_function_xr_genlink(array('p_id'=>31,'m_suffix'=>($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_id'])."/".($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_BESCHRIFTUNG_INTERN']),'roomId'=>$_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_id']),$_smarty_tpl);?>
">
            <span><?php echo smarty_function_xr_translate(array('tag'=>"User einladen"),$_smarty_tpl);?>
</span>
        </a>
        
        <a title="<?php echo smarty_function_xr_translate(array('tag'=>"Raum löschen"),$_smarty_tpl);?>
" class="room-edit-icon icon-delete" href="<?php echo smarty_function_xr_genlink(array('p_id'=>31,'m_suffix'=>($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_id'])."/".($_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_BESCHRIFTUNG_INTERN']),'roomId'=>$_smarty_tpl->tpl_vars['room']->value['ROOM']['wz_id']),$_smarty_tpl);?>
">
            <span><?php echo smarty_function_xr_translate(array('tag'=>"User einladen"),$_smarty_tpl);?>
</span>
        </a>
    </li>
<?php }} ?>
<li class="room-settings room-new">
    <span class="room-name no-padding-left">
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>30,'createNew'=>1),$_smarty_tpl);?>
">&nbsp;<?php echo smarty_function_xr_translate(array('tag'=>"Neuen Raum anlegen"),$_smarty_tpl);?>
</a>
    </span>
</li>