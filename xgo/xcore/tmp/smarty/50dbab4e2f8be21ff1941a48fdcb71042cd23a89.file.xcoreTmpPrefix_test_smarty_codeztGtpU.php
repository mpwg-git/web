<?php /* Smarty version Smarty-3.0.7, created on 2015-07-18 12:58:50
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeztGtpU" */ ?>
<?php /*%%SmartyHeaderCode:168613662155aa316a25dd70-43516540%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50dbab4e2f8be21ff1941a48fdcb71042cd23a89' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeztGtpU',
      1 => 1437217130,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168613662155aa316a25dd70-43516540',
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
">Meine Fakten</a>        
    </li>
    <li>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>15),$_smarty_tpl);?>
">Mein Konto</a>        
    </li>
    <li>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10),$_smarty_tpl);?>
">Mein WG Test</a>   
    </li>
</ul>