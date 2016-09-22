<?php /* Smarty version Smarty-3.0.7, created on 2015-11-04 12:05:49
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeqif7AI" */ ?>
<?php /*%%SmartyHeaderCode:6160473625639e68d0d5515-60401972%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e535377f2f2c19a430c312dddbfb1a7d12c1d0c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeqif7AI',
      1 => 1446635149,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6160473625639e68d0d5515-60401972',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><h2><?php echo smarty_function_xr_translate(array('tag'=>"Meine Wünsche"),$_smarty_tpl);?>
</h2>

<form class="form-mein-profil" id="form-mein-profil">
    <?php echo smarty_function_xr_atom(array('a_id'=>734,'return'=>1,'desc'=>'zeitraum'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>736,'return'=>1,'desc'=>'mitbewohner'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>737,'return'=>1,'desc'=>'wggroesse'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>738,'return'=>1,'desc'=>'zimmergroesse'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>739,'return'=>1,'desc'=>'abloese'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>740,'return'=>1,'desc'=>'raucher'),$_smarty_tpl);?>

    
    
    <?php echo smarty_function_xr_atom(array('a_id'=>741,'return'=>1,'desc'=>'submit'),$_smarty_tpl);?>

</form>