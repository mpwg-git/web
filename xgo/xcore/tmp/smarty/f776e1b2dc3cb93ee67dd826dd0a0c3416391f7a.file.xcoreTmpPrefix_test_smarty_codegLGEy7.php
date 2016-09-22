<?php /* Smarty version Smarty-3.0.7, created on 2015-11-26 12:48:45
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codegLGEy7" */ ?>
<?php /*%%SmartyHeaderCode:203387325656f19dec3781-78446724%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f776e1b2dc3cb93ee67dd826dd0a0c3416391f7a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codegLGEy7',
      1 => 1448538525,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203387325656f19dec3781-78446724',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><h2><?php echo smarty_function_xr_translate(array('tag'=>"Meine Daten"),$_smarty_tpl);?>
</h2>

<form class="form-mein-profil" id="form-mein-profil">
    <?php echo smarty_function_xr_atom(array('a_id'=>736,'return'=>1,'desc'=>'mitbewohner'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>737,'return'=>1,'desc'=>'wggroesse'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>738,'return'=>1,'desc'=>'zimmergroesse'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>739,'return'=>1,'desc'=>'abloese'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>740,'return'=>1,'desc'=>'raucher'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>828,'return'=>1,'desc'=>'haustiere'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>829,'return'=>1,'desc'=>'veganer'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>741,'return'=>1,'desc'=>'submit'),$_smarty_tpl);?>

</form>