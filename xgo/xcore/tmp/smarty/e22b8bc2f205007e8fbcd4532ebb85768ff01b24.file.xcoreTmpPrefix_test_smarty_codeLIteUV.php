<?php /* Smarty version Smarty-3.0.7, created on 2015-07-23 10:48:37
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLIteUV" */ ?>
<?php /*%%SmartyHeaderCode:165263566555b0aa6590cf91-50538151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e22b8bc2f205007e8fbcd4532ebb85768ff01b24' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLIteUV',
      1 => 1437641317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165263566555b0aa6590cf91-50538151',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><div class="contact">
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
<div class="clearfix"></div>