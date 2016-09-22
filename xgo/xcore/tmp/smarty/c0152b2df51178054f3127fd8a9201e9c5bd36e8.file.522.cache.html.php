<?php /* Smarty version Smarty-3.0.7, created on 2015-06-24 15:46:48
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/522.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:1346137991558ab4c89d9804-09234107%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0152b2df51178054f3127fd8a9201e9c5bd36e8' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/522.cache.html',
      1 => 1435074121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1346137991558ab4c89d9804-09234107',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?><?php if (isset($_REQUEST['form_id'])&&$_REQUEST['form_id']!=0){?>

    <?php echo smarty_function_xr_form(array('form_id'=>$_REQUEST['form_id'],'submit_txt'=>'send'),$_smarty_tpl);?>

    
<?php }else{ ?>

    request.form_id not set
    
<?php }?>