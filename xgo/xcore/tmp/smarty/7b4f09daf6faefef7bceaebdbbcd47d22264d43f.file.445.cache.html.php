<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 10:10:53
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/445.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:15507668725502a99d2570f7-07815971%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b4f09daf6faefef7bceaebdbbcd47d22264d43f' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/445.cache.html',
      1 => 1426237845,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15507668725502a99d2570f7-07815971',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?><div class="row">
    
    <div class="col-sm-12">
        
       <?php echo smarty_function_xr_form(array('form_id'=>7,'submit_txt'=>'send','var'=>'form'),$_smarty_tpl);?>

        <?php echo $_smarty_tpl->getVariable('form')->value;?>

        
    </div>
    
</div>