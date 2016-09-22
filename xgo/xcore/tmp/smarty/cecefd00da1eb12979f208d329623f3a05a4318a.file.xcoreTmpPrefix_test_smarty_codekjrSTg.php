<?php /* Smarty version Smarty-3.0.7, created on 2015-11-23 12:01:02
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekjrSTg" */ ?>
<?php /*%%SmartyHeaderCode:987655995652f1ee4bb206-05879165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cecefd00da1eb12979f208d329623f3a05a4318a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekjrSTg',
      1 => 1448276462,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '987655995652f1ee4bb206-05879165',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
?>
    
<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>12,'id'=>$_smarty_tpl->getVariable('data')->value['USER']['wz_id'],'m_suffix'=>$_smarty_tpl->getVariable('data')->value['USER']['wz_id']),$_smarty_tpl);?>
" class="chat-conversation-container" data-userid="<?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_id'];?>
">    

    <div class="contact"> 
        <?php if ($_smarty_tpl->getVariable('data')->value['NOTSEEN']>0){?>
        <div class="new-message-counter"><?php echo $_smarty_tpl->getVariable('data')->value['NOTSEEN'];?>
</div>
        <?php }?>
        <div class="image-wrapper">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['USER']['PROFILEIMAGE'],'h'=>56,'w'=>53,'colorspace'=>"gray",'class'=>"image blackandwhite"),$_smarty_tpl);?>

        </div>
        <div class="teaser-wrapper">
            <p class="name"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_VORNAME'];?>
 <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_NACHNAME'];?>
</p>
            <p class="teaser-text"><?php echo $_smarty_tpl->getVariable('data')->value['MESSAGE']['wz_MESSAGE'];?>
</p>
        </div>
        <div class="controls-wrapper">
            <p class="timestamp"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('data')->value['MESSAGE']['wz_TIME'],'%d.%m.%Y');?>
</p>
            <div class="close">
                <span class="icon-Close js-hide-conversation" data-messageid="<?php echo $_smarty_tpl->getVariable('data')->value['MESSAGE']['wz_id'];?>
" data-userid="<?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_id'];?>
"></span>
            </div>
        </div>
    </div>

    
</a>
<div class="clearfix"></div>