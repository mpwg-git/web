<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 15:21:02
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0n6oPS" */ ?>
<?php /*%%SmartyHeaderCode:174292941355d5d43e3e11f9-08960982%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b60ab5422c142a533e5574deee3fc74e581488d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0n6oPS',
      1 => 1440076862,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174292941355d5d43e3e11f9-08960982',
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

    <?php echo smarty_function_xr_atom(array('a_id'=>735,'return'=>1,'desc'=>'miete'),$_smarty_tpl);?>

    
    <div class="form-group">
    <label><?php echo smarty_function_xr_translate(array('tag'=>"Neue Mitbewohner?"),$_smarty_tpl);?>
</label>
    <div class="column-input v-center">
        <input class="form-control" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'von Personen'),$_smarty_tpl);?>
?" />
    </div><!--
    --><div class="devider v-center">-</div><!--
    --><div class="column-input v-center">
        <input class="form-control" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'bis Personen'),$_smarty_tpl);?>
?" />
    </div>
</div>


<?php echo smarty_function_xr_atom(array('a_id'=>736,'label'=>"Geschlecht?",'return'=>1,'desc'=>'geschlecht'),$_smarty_tpl);?>

<?php echo smarty_function_xr_atom(array('a_id'=>701,'return'=>1,'desc'=>'aktuelle mitbewohner'),$_smarty_tpl);?>

<?php echo smarty_function_xr_atom(array('a_id'=>785,'return'=>1,'desc'=>'zimmergroesse'),$_smarty_tpl);?>

<?php echo smarty_function_xr_atom(array('a_id'=>739,'return'=>1,'desc'=>'abloese'),$_smarty_tpl);?>

<?php echo smarty_function_xr_atom(array('a_id'=>740,'return'=>1,'desc'=>'raucher'),$_smarty_tpl);?>

<?php echo smarty_function_xr_atom(array('a_id'=>699,'return'=>1,'desc'=>'sprachen'),$_smarty_tpl);?>

<?php echo smarty_function_xr_atom(array('a_id'=>700,'return'=>1,'desc'=>'adresse'),$_smarty_tpl);?>

<?php echo smarty_function_xr_atom(array('a_id'=>741,'return'=>1,'desc'=>'submit'),$_smarty_tpl);?>

</form>