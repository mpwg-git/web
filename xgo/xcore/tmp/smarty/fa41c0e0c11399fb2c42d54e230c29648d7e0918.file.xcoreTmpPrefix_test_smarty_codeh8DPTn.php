<?php /* Smarty version Smarty-3.0.7, created on 2015-11-24 18:52:35
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeh8DPTn" */ ?>
<?php /*%%SmartyHeaderCode:17865863535654a3e34ff4f4-95180817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa41c0e0c11399fb2c42d54e230c29648d7e0918' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeh8DPTn',
      1 => 1448387555,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17865863535654a3e34ff4f4-95180817',
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
   
     <?php echo smarty_function_xr_atom(array('a_id'=>784,'showFace'=>0,'user'=>$_smarty_tpl->getVariable('user')->value,'return'=>1,'desc'=>'userdaten'),$_smarty_tpl);?>
  
    
    <h3><?php echo smarty_function_xr_translate(array('tag'=>"Raum Daten"),$_smarty_tpl);?>
</h3>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>848,'return'=>1,'desc'=>'interne beschriftung'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>734,'return'=>1,'showFace'=>0,'desc'=>'zeitraum'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>735,'return'=>1,'showFace'=>0,'desc'=>'miete'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>785,'return'=>1,'showFace'=>0,'desc'=>'zimmergroesse'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>740,'return'=>1,'showFace'=>0,'desc'=>'raucher'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>739,'return'=>1,'showFace'=>0,'desc'=>'abloese'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>828,'return'=>1,'desc'=>'haustiere'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>829,'return'=>1,'desc'=>'veggie'),$_smarty_tpl);?>


    <?php echo smarty_function_xr_atom(array('a_id'=>700,'return'=>1,'showFace'=>0,'desc'=>'adresse'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>818,'return'=>1,'showFace'=>0,'desc'=>'submitroom'),$_smarty_tpl);?>

    


</form>