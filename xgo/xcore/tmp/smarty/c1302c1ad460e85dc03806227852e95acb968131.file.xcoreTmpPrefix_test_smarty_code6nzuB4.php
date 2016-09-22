<?php /* Smarty version Smarty-3.0.7, created on 2015-10-13 00:36:18
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6nzuB4" */ ?>
<?php /*%%SmartyHeaderCode:295192880561c35e20e87b1-62005594%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1302c1ad460e85dc03806227852e95acb968131' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6nzuB4',
      1 => 1444689378,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '295192880561c35e20e87b1-62005594',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><p class="meinraum-text">
    <?php echo smarty_function_xr_translate(array('tag'=>"Möchtest du deinen Raum wirklich deaktivieren? Er wird dann für andere Benutzer nicht mehr in der Suche aufscheinen!"),$_smarty_tpl);?>

</p>
<button class="js-deactivate-room" data-room="<?php echo $_REQUEST['joinRoom'];?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Deaktivieren"),$_smarty_tpl);?>
</button>    
