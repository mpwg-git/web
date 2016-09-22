<?php /* Smarty version Smarty-3.0.7, created on 2015-10-13 06:13:32
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6jtoXx" */ ?>
<?php /*%%SmartyHeaderCode:1354642165561c84ec8d82b0-83182825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77830953db9166a8ba0366ae7d7a7cf4d401859a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6jtoXx',
      1 => 1444709612,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1354642165561c84ec8d82b0-83182825',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><p class="meinraum-text default-beschreibung">
    <?php echo smarty_function_xr_translate(array('tag'=>"Möchtest du deinen Raum wirklich aktivieren? Er wird dann für alle anderen Benutzer wieder in der Suche aufscheinen!"),$_smarty_tpl);?>

</p>
<button class="js-activate-room"><?php echo smarty_function_xr_translate(array('tag'=>"Aktivieren"),$_smarty_tpl);?>
</button>    
