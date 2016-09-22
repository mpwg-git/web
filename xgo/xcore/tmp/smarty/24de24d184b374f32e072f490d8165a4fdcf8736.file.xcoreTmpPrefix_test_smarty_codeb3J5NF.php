<?php /* Smarty version Smarty-3.0.7, created on 2015-07-18 12:39:42
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeb3J5NF" */ ?>
<?php /*%%SmartyHeaderCode:165814196255aa2cee2bc3e8-81810926%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24de24d184b374f32e072f490d8165a4fdcf8736' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeb3J5NF',
      1 => 1437215982,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165814196255aa2cee2bc3e8-81810926',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?>Mein Profil

<ul>
    <li>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>8),$_smarty_tpl);?>
">Meine Daten</a>        
    </li>
    <li>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>15),$_smarty_tpl);?>
">Mein Konto</a>        
    </li>
    <li>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>8),$_smarty_tpl);?>
">Mein WG Test</a>   
    </li>
</ul>