<?php /* Smarty version Smarty-3.0.7, created on 2015-10-13 00:37:08
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoUdOKX" */ ?>
<?php /*%%SmartyHeaderCode:2034318128561c3614bacf10-52811685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '134a66559087a5fd8262b2f92721c3a99ae4b507' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoUdOKX',
      1 => 1444689428,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2034318128561c3614bacf10-52811685',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><p class="meinraum-text">
    <?php echo smarty_function_xr_translate(array('tag'=>"Möchtest du deinen Raum wirklich deaktivieren? Er wird dann für andere Benutzer nicht mehr in der Suche aufscheinen!"),$_smarty_tpl);?>

</p>
<button class="js-deactivate-room" data-room="<?php echo $_smarty_tpl->getVariable('roomId')->value;?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Deaktivieren"),$_smarty_tpl);?>
</button>    
