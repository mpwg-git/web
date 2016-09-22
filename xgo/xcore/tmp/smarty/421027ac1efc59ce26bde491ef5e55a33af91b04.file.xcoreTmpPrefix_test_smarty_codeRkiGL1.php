<?php /* Smarty version Smarty-3.0.7, created on 2015-10-08 11:51:30
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeRkiGL1" */ ?>
<?php /*%%SmartyHeaderCode:76237345656163ca238bdc8-75251301%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '421027ac1efc59ce26bde491ef5e55a33af91b04' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeRkiGL1',
      1 => 1444297890,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76237345656163ca238bdc8-75251301',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><form class="form-mein-profil" id="form-mein-profil">
    <h3><?php echo smarty_function_xr_translate(array('tag'=>"Über Mich"),$_smarty_tpl);?>
</h3>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>784,'showFace'=>0,'return'=>1,'desc'=>'userdaten'),$_smarty_tpl);?>
 
    
    <h3><?php echo smarty_function_xr_translate(array('tag'=>"Meine Daten"),$_smarty_tpl);?>
</h3>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>734,'return'=>1,'showFace'=>0,'desc'=>'zeitraum'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>735,'return'=>1,'showFace'=>0,'desc'=>'miete'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>736,'return'=>1,'showFace'=>0,'desc'=>'mitbewohner'),$_smarty_tpl);?>

    <!-- rtr adapt -->
    
    <!-- ende rtr -->
    <?php echo smarty_function_xr_atom(array('a_id'=>737,'return'=>1,'showFace'=>0,'desc'=>'wggroesse'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>738,'return'=>1,'showFace'=>0,'desc'=>'zimmergroesse'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>739,'return'=>1,'showFace'=>0,'desc'=>'abloese'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>740,'return'=>1,'showFace'=>0,'desc'=>'raucher'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>699,'return'=>1,'showFace'=>0,'desc'=>'sprachen'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>700,'return'=>1,'showFace'=>0,'desc'=>'adresse'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>741,'return'=>1,'showFace'=>0,'desc'=>'submit'),$_smarty_tpl);?>

    
</form>
