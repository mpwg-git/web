<?php /* Smarty version Smarty-3.0.7, created on 2015-10-13 00:52:34
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekZ4Whu" */ ?>
<?php /*%%SmartyHeaderCode:1816524439561c39b2045703-21438754%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7339cc0133178373a4276cc0442fb917d4be2fbf' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekZ4Whu',
      1 => 1444690353,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1816524439561c39b2045703-21438754',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><p class="meinraum-text">
    <?php echo smarty_function_xr_translate(array('tag'=>"Möchtest du deinen Raum wirklich aktivieren? Er wird dann für alle anderen Benutzer wieder in der Suche aufscheinen!"),$_smarty_tpl);?>

</p>
<button class="js-activate-room"><?php echo smarty_function_xr_translate(array('tag'=>"Deaktivieren"),$_smarty_tpl);?>
</button>    
