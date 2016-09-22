<?php /* Smarty version Smarty-3.0.7, created on 2015-07-26 21:32:14
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeB3ynGp" */ ?>
<?php /*%%SmartyHeaderCode:109778276755b535be8bd635-26428957%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea5b929b1d8837f146d8c6c527ade11a7db462c8' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeB3ynGp',
      1 => 1437939134,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109778276755b535be8bd635-26428957',
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
            <p class="name">Max Mustermann</p>
            <p class="teaser-text">der text is mega long long</p>
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