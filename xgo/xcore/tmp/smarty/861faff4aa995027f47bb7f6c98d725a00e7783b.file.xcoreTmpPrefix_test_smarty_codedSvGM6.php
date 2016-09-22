<?php /* Smarty version Smarty-3.0.7, created on 2015-10-12 17:49:28
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codedSvGM6" */ ?>
<?php /*%%SmartyHeaderCode:2009614813561bd68847c787-92702469%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '861faff4aa995027f47bb7f6c98d725a00e7783b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codedSvGM6',
      1 => 1444664968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2009614813561bd68847c787-92702469',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><h2>Raum-Daten</h2>
    
<form class="form-mein-profil" id="form-mein-profil">
    
    <?php echo smarty_function_xr_atom(array('a_id'=>734,'return'=>1,'desc'=>'zeitraum'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>816,'return'=>1,'desc'=>'miete'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>817,'return'=>1,'desc'=>'zimmergroesse'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>739,'return'=>1,'desc'=>'abloese'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>740,'return'=>1,'desc'=>'raucher'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>700,'return'=>1,'desc'=>'adresse'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>741,'return'=>1,'desc'=>'submit'),$_smarty_tpl);?>

    
</form>