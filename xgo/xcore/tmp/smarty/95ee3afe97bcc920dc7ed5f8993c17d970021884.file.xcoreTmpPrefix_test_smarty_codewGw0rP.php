<?php /* Smarty version Smarty-3.0.7, created on 2015-07-26 21:29:54
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewGw0rP" */ ?>
<?php /*%%SmartyHeaderCode:13240760055b535320e94e3-52513658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95ee3afe97bcc920dc7ed5f8993c17d970021884' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewGw0rP',
      1 => 1437938994,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13240760055b535320e94e3-52513658',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>16),$_smarty_tpl);?>
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