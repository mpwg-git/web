<?php /* Smarty version Smarty-3.0.7, created on 2015-08-25 11:28:05
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code5swkzk" */ ?>
<?php /*%%SmartyHeaderCode:32985466655dc352510a090-67598314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c57a15033a184c0703b8d15b426e97329208574' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code5swkzk',
      1 => 1440494885,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32985466655dc352510a090-67598314',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>12),$_smarty_tpl);?>
">

    <div class="contact">
        <?php if ($_smarty_tpl->getVariable('newMessages')->value==1){?>
        <div class="new-message-counter">114</div>
        <?php }?>
        <div class="image-wrapper">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>165,'h'=>56,'w'=>53,'class'=>"image"),$_smarty_tpl);?>

        </div>
        <div class="teaser-wrapper">
            <p class="name"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_VORNAME'];?>
 <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_NACHNAME'];?>
</p>
            <p class="teaser-text"><?php echo $_smarty_tpl->getVariable('data')->value['MESSAGE']['wz_MESSAGE'];?>
</p>
        </div>
        <div class="controls-wrapper">
            <p class="timestamp">12.05.</p>
            <div class="close">
                <span class="icon-Close"></span>
            </div>
        </div>
    </div>

    
</a>
<div class="clearfix"></div>