<?php /* Smarty version Smarty-3.0.7, created on 2016-08-09 11:31:04
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenklCCu" */ ?>
<?php /*%%SmartyHeaderCode:127353414057a9a2d8ab3213-98633739%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9684d03aeca3a599efc45c932a84aaf4d8f18385' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenklCCu',
      1 => 1470735064,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127353414057a9a2d8ab3213-98633739',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>

<?php echo smarty_function_xr_feUser(array('action'=>'isLoggedIn','var'=>'isLoggedIn'),$_smarty_tpl);?>


<?php echo smarty_function_xr_siteCall(array('fn'=>'xredaktor_feUser::getUserId','var'=>'myUserId'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_is_active','userId'=>$_smarty_tpl->getVariable('myUserId')->value,'var'=>'iAmActive'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_is_active','userId'=>$_REQUEST['id'],'var'=>'otherIsActive'),$_smarty_tpl);?>



<div class="chat js-chat-data" data-userid="<?php echo $_REQUEST['id'];?>
">
    
    <div class="js-chatheader header clearfix">
        
        <a href="<?php echo $_smarty_tpl->getVariable('data')->value['USER']['PROFILE_URL'];?>
" title="<?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_VORNAME'];?>
 <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_NACHNAME'];?>
">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['USER']['wz_PROFILBILD'],'w'=>190,'h'=>200,'rmode'=>"cco",'class'=>"chatimage-top pull-left"),$_smarty_tpl);?>

        </a>
        
        <a href="<?php echo $_smarty_tpl->getVariable('data')->value['USER']['PROFILE_URL'];?>
" title="<?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_VORNAME'];?>
 <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_NACHNAME'];?>
">
            <div class="name"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_VORNAME'];?>
 <br/> <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_NACHNAME'];?>
</div>
        </a>
        
        <div class="pull-right" style="padding-right:20px;padding-top:20px;color:#04e0d7;">
            <?php if ($_smarty_tpl->getVariable('isLoggedIn')->value===true){?><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>16),$_smarty_tpl);?>
"><?php }else{ ?><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>1),$_smarty_tpl);?>
"><?php }?>
              <span class="icon-Close"></span>
            </a>
        </div>
        
        
        
    </div>
    
    <?php if (!$_smarty_tpl->getVariable('otherIsActive')->value){?>
        <div class="clearfix"><?php echo smarty_function_xr_translate(array('tag'=>'Chatten nicht möglich, da das Konto des Chat-Empfängers zur Zeit deaktiviert ist!'),$_smarty_tpl);?>
</div>
    <?php }elseif(!$_smarty_tpl->getVariable('iAmActive')->value){?>
        <div class="clearfix"><?php echo smarty_function_xr_translate(array('tag'=>'Du kannst nicht chatten, da dein Konto zur Zeit deaktiviert ist!'),$_smarty_tpl);?>
</div>
        
        <script>
            
            var showEmailConfirmMsg = true;
            
        </script>
        
    <?php }?>
    
    <div class="js-chatwindow chatwindow <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
">
    </div>
    
    
    
    <?php if ($_smarty_tpl->getVariable('otherIsActive')->value&&$_smarty_tpl->getVariable('iAmActive')->value){?>
    <div class="js-chattext textwindow">
        <textarea placeholder="<?php echo smarty_function_xr_translate(array('tag'=>"dein text"),$_smarty_tpl);?>
"></textarea>
        <button style="vertical-align:top;width: 18.8%; padding: 11px;"><?php echo smarty_function_xr_translate(array('tag'=>'Senden'),$_smarty_tpl);?>
</button>
    </div>
    <?php }?>
    

    
</div>

