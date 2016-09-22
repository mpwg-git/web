<?php /* Smarty version Smarty-3.0.7, created on 2015-10-13 06:13:20
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1KuOph" */ ?>
<?php /*%%SmartyHeaderCode:1552816721561c84e09fb785-36676886%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f27e11b282b982d868a405bb032e2daf5bb53e87' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1KuOph',
      1 => 1444709600,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1552816721561c84e09fb785-36676886',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><p class="meinraum-text default-beschreibung">
    <?php echo smarty_function_xr_translate(array('tag'=>"Möchtest du deinen Raum wirklich deaktivieren? Er wird dann für andere Benutzer nicht mehr in der Suche aufscheinen!"),$_smarty_tpl);?>

</p>
<button class="js-deactivate-room"><?php echo smarty_function_xr_translate(array('tag'=>"Deaktivieren"),$_smarty_tpl);?>
</button>


