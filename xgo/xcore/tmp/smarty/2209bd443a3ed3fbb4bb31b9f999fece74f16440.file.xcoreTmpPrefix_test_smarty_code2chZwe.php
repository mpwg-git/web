<?php /* Smarty version Smarty-3.0.7, created on 2015-07-18 12:35:33
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2chZwe" */ ?>
<?php /*%%SmartyHeaderCode:202131770355aa2bf5297603-60401898%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2209bd443a3ed3fbb4bb31b9f999fece74f16440' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2chZwe',
      1 => 1437215733,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202131770355aa2bf5297603-60401898',
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
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>9),$_smarty_tpl);?>
">Mein Konto</a>        
    </li>
    <li>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>8),$_smarty_tpl);?>
">Mein WG Test</a>   
    </li>
</ul>