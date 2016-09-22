<?php /* Smarty version Smarty-3.0.7, created on 2015-08-25 11:48:09
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code5NMNUs" */ ?>
<?php /*%%SmartyHeaderCode:79291924055dc39d93010a2-40639259%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8809cc482c2b90808c28655188c7e2a92bc398ed' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code5NMNUs',
      1 => 1440496089,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79291924055dc39d93010a2-40639259',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
?><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>12,'id'=>$_smarty_tpl->getVariable('data')->value['USER']['wz_id'],'m_suffix'=>$_smarty_tpl->getVariable('data')->value['USER']['wz_id']),$_smarty_tpl);?>
">

    <div class="contact">
        <?php if ($_smarty_tpl->getVariable('newMessages')->value==1){?>
        <div class="new-message-counter">114</div>
        <?php }?>
        <div class="image-wrapper">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['USER']['PROFILEIMAGE'],'h'=>56,'w'=>53,'class'=>"image"),$_smarty_tpl);?>

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