<?php /* Smarty version Smarty-3.0.7, created on 2015-03-06 18:46:05
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/522.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:361599654f9e7dd8d3ad2-81837927%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '769815b7bf53c7fd085f48300c86cfd4992e7c1b' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/522.cache.html',
      1 => 1425663963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '361599654f9e7dd8d3ad2-81837927',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?><?php if (isset($_REQUEST['form_id'])&&$_REQUEST['form_id']!=0){?>

    <?php echo smarty_function_xr_form(array('form_id'=>$_REQUEST['form_id'],'submit_txt'=>'send'),$_smarty_tpl);?>

    
<?php }else{ ?>

    request.form_id not set
    
<?php }?>