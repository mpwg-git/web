<?php /* Smarty version Smarty-3.0.7, created on 2015-11-05 09:38:27
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codez1xHa8" */ ?>
<?php /*%%SmartyHeaderCode:647494503563b158344dab3-69796529%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39f7fb0a5b4fca7b0f6b9d7cd2518a5b7c6bcdd4' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codez1xHa8',
      1 => 1446712707,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '647494503563b158344dab3-69796529',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><form class="form-mein-profil" id="form-mein-profil">
    
    
    <?php echo smarty_function_xr_atom(array('a_id'=>784,'showFace'=>0,'return'=>1,'desc'=>'userdaten'),$_smarty_tpl);?>
 
    
    <h3><?php echo smarty_function_xr_translate(array('tag'=>"Meine Daten"),$_smarty_tpl);?>
</h3>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>734,'return'=>1,'showFace'=>0,'desc'=>'zeitraum'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>736,'return'=>1,'showFace'=>0,'desc'=>'mitbewohner'),$_smarty_tpl);?>

    
    
    <?php echo smarty_function_xr_atom(array('a_id'=>737,'return'=>1,'showFace'=>0,'desc'=>'wggroesse'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>738,'return'=>1,'showFace'=>0,'desc'=>'zimmergroesse'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>739,'return'=>1,'showFace'=>0,'desc'=>'abloese'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>740,'return'=>1,'showFace'=>0,'desc'=>'raucher'),$_smarty_tpl);?>

    
    
    <?php echo smarty_function_xr_atom(array('a_id'=>828,'return'=>1,'showFace'=>0,'desc'=>'haustiere'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>829,'return'=>1,'showFace'=>0,'desc'=>'veganer'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>741,'return'=>1,'showFace'=>0,'desc'=>'submit'),$_smarty_tpl);?>

    
</form>
