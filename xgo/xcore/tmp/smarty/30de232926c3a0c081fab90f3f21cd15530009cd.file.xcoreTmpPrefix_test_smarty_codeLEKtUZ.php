<?php /* Smarty version Smarty-3.0.7, created on 2015-11-04 12:07:27
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLEKtUZ" */ ?>
<?php /*%%SmartyHeaderCode:12231760895639e6ef6020f8-31062795%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30de232926c3a0c081fab90f3f21cd15530009cd' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLEKtUZ',
      1 => 1446635247,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12231760895639e6ef6020f8-31062795',
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
    
    <?php echo smarty_function_xr_atom(array('a_id'=>784,'return'=>1,'desc'=>'userdaten'),$_smarty_tpl);?>
 
    
    <h3><?php echo smarty_function_xr_translate(array('tag'=>"Meine Fakten"),$_smarty_tpl);?>
</h3>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>734,'return'=>1,'desc'=>'zeitraum'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>828,'return'=>1,'showFace'=>0,'desc'=>'haustiere'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>829,'return'=>1,'showFace'=>0,'desc'=>'veganer'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>741,'return'=>1,'desc'=>'submit'),$_smarty_tpl);?>

</form>