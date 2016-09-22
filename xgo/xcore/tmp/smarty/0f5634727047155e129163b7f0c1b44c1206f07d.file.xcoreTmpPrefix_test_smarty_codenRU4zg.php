<?php /* Smarty version Smarty-3.0.7, created on 2015-11-18 18:20:59
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenRU4zg" */ ?>
<?php /*%%SmartyHeaderCode:1248011345564cb37ba9e485-38538765%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f5634727047155e129163b7f0c1b44c1206f07d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenRU4zg',
      1 => 1447867259,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1248011345564cb37ba9e485-38538765',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><p class="meinraum-text default-beschreibung">
    <?php echo smarty_function_xr_translate(array('tag'=>"Möchtest du deinen Raum wirklich aktivieren? Er wird dann für alle anderen Benutzer wieder in der Suche aufscheinen!"),$_smarty_tpl);?>

</p>
<button class="js-activate-room" data-room="<?php echo $_REQUEST['roomId'];?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Aktivieren"),$_smarty_tpl);?>
</button>   
