<?php /* Smarty version Smarty-3.0.7, created on 2017-02-21 02:53:10
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/884.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:122181722358ab9d861e8b61-69510975%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b67a413b506a707595f28150f06562b28549ca6' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/884.cache-1.html',
      1 => 1486581406,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122181722358ab9d861e8b61-69510975',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="mobile-row">
    
    <!-- FILTERING -->
    <?php echo smarty_function_xr_atom(array('a_id'=>883,'return'=>1,'desc'=>"filtering"),$_smarty_tpl);?>

    <?php if ($_smarty_tpl->getVariable('P_ID')->value==36){?>
        <?php echo smarty_function_xr_atom(array('a_id'=>835,'return'=>1),$_smarty_tpl);?>

    <?php }elseif($_smarty_tpl->getVariable('P_ID')->value==46){?>
        <?php echo smarty_function_xr_atom(array('a_id'=>881,'return'=>1),$_smarty_tpl);?>

    <?php }?>
</div>