<?php /* Smarty version Smarty-3.0.7, created on 2015-10-13 09:50:30
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHSLKrj" */ ?>
<?php /*%%SmartyHeaderCode:1471083508561cb7c69f91b5-45958437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8a97b3ba6b85b679d4418bbce9a0e869564a98b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeHSLKrj',
      1 => 1444722630,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1471083508561cb7c69f91b5-45958437',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn",'var'=>"loggedin"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getInvitations",'var'=>"invitations"),$_smarty_tpl);?>


<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('invitations')->value),$_smarty_tpl);?>


<div class="meinprofil-container meinraum-container">
    <div class="col-xs-12 default-container-paddingtop">

        <h2>Einem Raum beitreten</h2>
        
        <?php if (count($_smarty_tpl->getVariable('invitations')->value)==0){?>
            <?php echo smarty_function_xr_translate(array('tag'=>"Keine Einladungen vorhanden."),$_smarty_tpl);?>

        <?php }else{ ?>
            
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('invitations')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            
                <div class="button-joinroom-container row">
                    <div class="col-xs-6">
                        <button class="js-accept-join" data-room="<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_ROOMID'];?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Beitreten"),$_smarty_tpl);?>
</button>    
                    </div>
                    <div class="col-xs-6">
                        <button class="js-reject-join" data-room="<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_ROOMID'];?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Ablehnen"),$_smarty_tpl);?>
</button>    
                    </div>
                </div>
            
            <?php }} ?>
        
        <?php }?>
        
    </div>
</div>