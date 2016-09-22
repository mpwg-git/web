<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 18:50:52
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/443.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:174937949854fddd7ce66917-34208270%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65ae946499ae5a23ed3d1836c0405cee6d851776' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/443.cache.html',
      1 => 1425923450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174937949854fddd7ce66917-34208270',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?><div class="row">
    
    <div class="col-sm-4">
        
        <?php echo smarty_function_xr_atom(array('a_id'=>467,'pageid'=>$_smarty_tpl->getVariable('P_ID')->value,'return'=>1),$_smarty_tpl);?>

        
    </div>
    
    <div class="col-sm-8">
        
        <?php echo smarty_function_xr_form(array('form_id'=>1,'submit_txt'=>'send','var'=>'form'),$_smarty_tpl);?>

        
        <?php echo $_smarty_tpl->getVariable('form')->value;?>

        
    </div>
    
</div>