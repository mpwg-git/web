<?php /* Smarty version Smarty-3.0.7, created on 2016-01-14 15:20:44
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/698.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:18233259985697aebc018d30-93075218%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19a518f75027eebbb06afae2bd5db2f91b1ac8de' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/698.cache-1.html',
      1 => 1452778914,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18233259985697aebc018d30-93075218',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><form class="form-mein-profil" id="form-mein-profil">
    
    
    
    <h3><?php echo smarty_function_xr_translate(array('tag'=>"Meine Daten"),$_smarty_tpl);?>
</h3>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>736,'return'=>1,'showFace'=>0,'desc'=>'mitbewohner'),$_smarty_tpl);?>

    
    
    
    <?php echo smarty_function_xr_atom(array('a_id'=>737,'return'=>1,'desc'=>'wggroesse','showFace'=>0),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>738,'return'=>1,'desc'=>'zimmergroesse','showFace'=>0),$_smarty_tpl);?>

    
    
    <?php echo smarty_function_xr_atom(array('a_id'=>739,'return'=>1,'desc'=>'abloese'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>740,'return'=>1,'desc'=>'raucher'),$_smarty_tpl);?>

    
    
    <?php echo smarty_function_xr_atom(array('a_id'=>828,'return'=>1,'desc'=>'haustiere'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>829,'return'=>1,'desc'=>'veganer'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>869,'return'=>1,'showFace'=>0,'desc'=>'barrierefrei'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>741,'return'=>1,'showFace'=>1,'desc'=>'submit'),$_smarty_tpl);?>

    
</form>
