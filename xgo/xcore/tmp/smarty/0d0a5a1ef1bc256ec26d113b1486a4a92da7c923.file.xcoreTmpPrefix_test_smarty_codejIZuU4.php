<?php /* Smarty version Smarty-3.0.7, created on 2015-12-21 10:45:30
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejIZuU4" */ ?>
<?php /*%%SmartyHeaderCode:7067076125677ca3a025fb7-08486785%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d0a5a1ef1bc256ec26d113b1486a4a92da7c923' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codejIZuU4',
      1 => 1450691129,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7067076125677ca3a025fb7-08486785',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>

<?php echo smarty_function_xr_feUser(array('action'=>'isLoggedIn','var'=>'isLoggedIn'),$_smarty_tpl);?>




<div class="chat js-chat-data" data-userid="<?php echo $_REQUEST['id'];?>
">
    
    <div class="js-chatheader header clearfix">
        
        <div class="name"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_VORNAME'];?>
 <br/> <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_NACHNAME'];?>
</div>
            <div class="pull-right" style="padding-right:20px;padding-top:20px;color:#04e0d7;">
                <?php if ($_smarty_tpl->getVariable('isLoggedIn')->value===true){?><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>16),$_smarty_tpl);?>
"><?php }else{ ?><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>1),$_smarty_tpl);?>
"><?php }?>
                  <span class="icon-Close"></span>
                </a>
            </div>
        
        
        
        <?php echo smarty_function_xr_siteCall(array('fn'=>'xredaktor_feUser::getUserId','var'=>'myUserId'),$_smarty_tpl);?>

        <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_is_active','userId'=>$_smarty_tpl->getVariable('myUserId')->value,'var'=>'iAmActive'),$_smarty_tpl);?>

        <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_is_active','userId'=>$_REQUEST['id'],'var'=>'otherIsActive'),$_smarty_tpl);?>

        
        <?php if ($_smarty_tpl->getVariable('otherIsActive')->value&&$_smarty_tpl->getVariable('iAmActive')->value){?>
        <div class="js-chattext textwindow">
            <textarea placeholder="<?php echo smarty_function_xr_translate(array('tag'=>"dein text"),$_smarty_tpl);?>
"></textarea>
        </div>
        <div class="row">
            <?php }elseif(!$_smarty_tpl->getVariable('otherIsActive')->value){?>
                <p><?php echo smarty_function_xr_translate(array('tag'=>'Chatten nicht möglich, da das Konto des Chat-Empfängers zur Zeit deaktiviert ist!'),$_smarty_tpl);?>
</p>
            <?php }elseif(!$_smarty_tpl->getVariable('iAmActive')->value){?>
                <p><?php echo smarty_function_xr_translate(array('tag'=>'Du kannst nicht chatten, da dein Konto zur Zeit deaktiviert ist!'),$_smarty_tpl);?>
</p>
            <?php }?>
        </div>
        
    </div>
    
    <div class="js-chatwindow chatwindow <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
">
    </div>
    
    
    
</div>