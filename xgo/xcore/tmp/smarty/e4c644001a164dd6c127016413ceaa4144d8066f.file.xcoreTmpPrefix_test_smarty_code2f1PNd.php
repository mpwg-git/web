<?php /* Smarty version Smarty-3.0.7, created on 2015-11-18 17:06:20
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2f1PNd" */ ?>
<?php /*%%SmartyHeaderCode:1072156122564ca1fcb09243-67301179%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4c644001a164dd6c127016413ceaa4144d8066f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2f1PNd',
      1 => 1447862780,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1072156122564ca1fcb09243-67301179',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><h2>Raum-Daten</h2>
    
<form class="form-mein-raum" id="form-mein-raum">
    
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_id'];?>
" />
    <?php echo smarty_function_xr_atom(array('a_id'=>734,'return'=>1,'desc'=>'zeitraum'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>816,'return'=>1,'desc'=>'miete'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>817,'return'=>1,'desc'=>'zimmergroesse'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>740,'return'=>1,'desc'=>'raucher'),$_smarty_tpl);?>

     
    <?php echo smarty_function_xr_atom(array('a_id'=>739,'return'=>1,'noEgal'=>1,'desc'=>'abloese'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>828,'return'=>1,'desc'=>'haustiere'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>829,'return'=>1,'desc'=>'veggie'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>819,'return'=>1,'desc'=>'adresse'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>818,'return'=>1,'desc'=>'submitroom'),$_smarty_tpl);?>

    
</form>