<?php /* Smarty version Smarty-3.0.7, created on 2015-07-18 12:39:41
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeJN8t3d" */ ?>
<?php /*%%SmartyHeaderCode:80507648655aa2ced34ab92-71375738%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '944bf982c69352cb6624f2184913c39ab7e4b2b8' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeJN8t3d',
      1 => 1437215981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80507648655aa2ced34ab92-71375738',
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