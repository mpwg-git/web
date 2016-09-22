<?php /* Smarty version Smarty-3.0.7, created on 2015-11-18 18:20:59
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/827.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:1532430050564cb37bd642c0-29077171%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8c2774fcc628e1ca751678d3ab6c1512ae2e9cf' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/827.cache-3.html',
      1 => 1447867259,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1532430050564cb37bd642c0-29077171',
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
