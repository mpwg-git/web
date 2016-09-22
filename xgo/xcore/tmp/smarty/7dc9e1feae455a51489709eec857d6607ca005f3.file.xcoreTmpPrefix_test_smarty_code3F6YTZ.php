<?php /* Smarty version Smarty-3.0.7, created on 2015-11-24 18:55:17
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code3F6YTZ" */ ?>
<?php /*%%SmartyHeaderCode:11939650645654a485d2fc68-10615569%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7dc9e1feae455a51489709eec857d6607ca005f3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code3F6YTZ',
      1 => 1448387717,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11939650645654a485d2fc68-10615569',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><form class="form-mein-raum" id="form-mein-raum">
    
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_id'];?>
" />
    
    <h3><?php echo smarty_function_xr_translate(array('tag'=>"Über Mich"),$_smarty_tpl);?>
</h3>
   
   <?php echo smarty_function_xr_atom(array('a_id'=>784,'return'=>1,'desc'=>'userdaten'),$_smarty_tpl);?>
 
    
    <h3><?php echo smarty_function_xr_translate(array('tag'=>"Raum Daten"),$_smarty_tpl);?>
</h3>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>848,'return'=>1,'desc'=>'interne beschriftung'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>734,'return'=>1,'desc'=>'zeitraum'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>735,'return'=>1,'desc'=>'miete'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>739,'return'=>1,'desc'=>'abloese'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>740,'return'=>1,'desc'=>'raucher'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>828,'return'=>1,'desc'=>'haustiere'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>829,'return'=>1,'desc'=>'veggie'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>700,'return'=>1,'desc'=>'adresse'),$_smarty_tpl);?>



<?php echo smarty_function_xr_atom(array('a_id'=>818,'return'=>1,'desc'=>'submitroom'),$_smarty_tpl);?>


<?php echo smarty_function_xr_atom(array('a_id'=>786,'return'=>1,'desc'=>'geschlecht'),$_smarty_tpl);?>


</form>