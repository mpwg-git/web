<?php /* Smarty version Smarty-3.0.7, created on 2015-11-18 15:23:15
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeF8JSpL" */ ?>
<?php /*%%SmartyHeaderCode:713476481564c89d36f4311-53425454%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82a496e91500cdeb63cff8d5bf3c5c70f7a08120' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeF8JSpL',
      1 => 1447856595,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '713476481564c89d36f4311-53425454',
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
  
    
    <h3><?php echo smarty_function_xr_translate(array('tag'=>"Meine Fakten"),$_smarty_tpl);?>
</h3>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>734,'return'=>1,'showFace'=>0,'desc'=>'zeitraum'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>735,'return'=>1,'showFace'=>0,'desc'=>'miete'),$_smarty_tpl);?>

    
    <div class="form-group">
        <label><?php echo smarty_function_xr_translate(array('tag'=>"Neue Mitbewohner?"),$_smarty_tpl);?>
</label>
        <div class="column-input v-center">
            <input class="form-control" name="NEUE_MITBEWOHNER_VON" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'von Personen'),$_smarty_tpl);?>
?" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_NEUE_MITBEWOHNER_VON'];?>
" />
        </div><!--
        --><div class="devider v-center">-</div><!--
        --><div class="column-input v-center">
            <input class="form-control" name="NEUE_MITBEWOHNER_BIS" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'bis Personen'),$_smarty_tpl);?>
?" value="<?php echo $_smarty_tpl->getVariable('profile')->value['wz_NEUE_MITBEWOHNER_BIS'];?>
" />
        </div>
    </div>
    


<?php echo smarty_function_xr_atom(array('a_id'=>786,'return'=>1,'showFace'=>0,'desc'=>'geschlecht'),$_smarty_tpl);?>

<?php echo smarty_function_xr_atom(array('a_id'=>701,'return'=>1,'showFace'=>0,'desc'=>'aktuelle mitbewohner'),$_smarty_tpl);?>

<?php echo smarty_function_xr_atom(array('a_id'=>739,'return'=>1,'showFace'=>0,'desc'=>'abloese'),$_smarty_tpl);?>

<?php echo smarty_function_xr_atom(array('a_id'=>740,'return'=>1,'showFace'=>0,'desc'=>'raucher'),$_smarty_tpl);?>

aaa

<?php echo smarty_function_xr_atom(array('a_id'=>700,'return'=>1,'showFace'=>0,'desc'=>'adresse'),$_smarty_tpl);?>

<?php echo smarty_function_xr_atom(array('a_id'=>741,'return'=>1,'showFace'=>0,'desc'=>'submit'),$_smarty_tpl);?>

</form>