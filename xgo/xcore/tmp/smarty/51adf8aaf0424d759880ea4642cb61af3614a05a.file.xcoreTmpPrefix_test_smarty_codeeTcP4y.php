<?php /* Smarty version Smarty-3.0.7, created on 2016-01-05 16:01:27
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeeTcP4y" */ ?>
<?php /*%%SmartyHeaderCode:1945501069568bdac7d7ec50-89568109%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51adf8aaf0424d759880ea4642cb61af3614a05a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeeTcP4y',
      1 => 1452006087,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1945501069568bdac7d7ec50-89568109',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_feUser')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_feUser.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>

<?php echo smarty_function_xr_feUser(array('action'=>'isLoggedIn','var'=>'isLoggedIn'),$_smarty_tpl);?>


<div class="chat default-container-paddingtop js-chat-data" data-userid="<?php echo $_REQUEST['id'];?>
">
    <div class="js-chatheader header clearfix">
        
        <div class="name"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_VORNAME'];?>
 <br/> <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_NACHNAME'];?>
</div>
            <div class="pull-right" style="padding-top:20px;color:#04e0d7;">
                <?php if ($_smarty_tpl->getVariable('isLoggedIn')->value===true){?><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>7),$_smarty_tpl);?>
"><?php }else{ ?><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>1),$_smarty_tpl);?>
"><?php }?>
                  <span class="icon-Close"></span>
                </a>
            </div>
        
        
    </div>
    
    <div class="js-chatwindow chatwindow <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
">
    </div>
    
    
    <?php echo smarty_function_xr_siteCall(array('fn'=>'xredaktor_feUser::getUserId','var'=>'myUserId'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_is_active','userId'=>$_smarty_tpl->getVariable('myUserId')->value,'var'=>'iAmActive'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_is_active','userId'=>$_REQUEST['id'],'var'=>'otherIsActive'),$_smarty_tpl);?>

    
    <?php if ($_smarty_tpl->getVariable('otherIsActive')->value&&$_smarty_tpl->getVariable('iAmActive')->value){?>
    <div class="js-chattext textwindow">
        <textarea placeholder="<?php echo smarty_function_xr_translate(array('tag'=>"dein text"),$_smarty_tpl);?>
"></textarea>
        <button><?php echo smarty_function_xr_translate(array('tag'=>'Senden'),$_smarty_tpl);?>
</button>
    </div>
    <?php }elseif(!$_smarty_tpl->getVariable('otherIsActive')->value){?>
        <?php echo smarty_function_xr_translate(array('tag'=>'Chatten nicht möglich, da das Konto des Chat-Empfängers zur Zeit deaktiviert ist!'),$_smarty_tpl);?>

    <?php }elseif(!$_smarty_tpl->getVariable('iAmActive')->value){?>
        <?php echo smarty_function_xr_translate(array('tag'=>'Du kannst nicht chatten, da dein Konto zur Zeit deaktiviert ist!'),$_smarty_tpl);?>

    <?php }?>
    
    
    
    
</div>