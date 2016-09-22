<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 17:55:49
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codepjL6g2" */ ?>
<?php /*%%SmartyHeaderCode:72123323255d5f885bbc532-80941783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f23a683cb5b3e9237106cf59a5368a20b812f23d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codepjL6g2',
      1 => 1440086149,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72123323255d5f885bbc532-80941783',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><h2>Meine Daten</h2>

<form class="form-mein-profil" id="form-mein-profil">
    <?php echo smarty_function_xr_atom(array('a_id'=>734,'return'=>1,'showFace'=>0,'desc'=>'zeitraum'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>735,'return'=>1,'desc'=>'miete'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>736,'return'=>1,'desc'=>'mitbewohner'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>737,'return'=>1,'desc'=>'wggroesse'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>738,'return'=>1,'desc'=>'zimmergroesse'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>739,'return'=>1,'desc'=>'abloese'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>740,'return'=>1,'desc'=>'raucher'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>699,'return'=>1,'desc'=>'sprachen'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>700,'return'=>1,'desc'=>'adresse'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>741,'return'=>1,'desc'=>'submit'),$_smarty_tpl);?>

</form>