<?php /* Smarty version Smarty-3.0.7, created on 2016-04-07 13:06:37
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/884.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:169080975257063f3d14b3a5-02951988%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9cc42ae8720181e00b4f31f99a1c1cbe4151334' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/884.cache-1.html',
      1 => 1460023390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169080975257063f3d14b3a5-02951988',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="mobile-row">
    
    <!-- FILTERING -->
    <?php echo smarty_function_xr_atom(array('a_id'=>883,'return'=>1,'desc'=>"filtering"),$_smarty_tpl);?>

    <?php if ($_smarty_tpl->getVariable('P_ID')->value==36){?>
        <?php echo smarty_function_xr_atom(array('a_id'=>835,'return'=>1),$_smarty_tpl);?>

    <?php }elseif($_smarty_tpl->getVariable('P_ID')->value==46){?>
        <?php echo smarty_function_xr_atom(array('a_id'=>881,'return'=>1),$_smarty_tpl);?>

    <?php }?>
</div>