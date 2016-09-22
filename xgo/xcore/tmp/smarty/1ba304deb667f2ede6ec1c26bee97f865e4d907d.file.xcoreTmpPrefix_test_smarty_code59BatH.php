<?php /* Smarty version Smarty-3.0.7, created on 2015-11-24 17:49:42
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code59BatH" */ ?>
<?php /*%%SmartyHeaderCode:21018686356549526d70b24-91805461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ba304deb667f2ede6ec1c26bee97f865e4d907d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code59BatH',
      1 => 1448383782,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21018686356549526d70b24-91805461',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?>    <h3><?php echo smarty_function_xr_translate(array('tag'=>"Über Mich"),$_smarty_tpl);?>
</h3>
   
     <?php echo smarty_function_xr_atom(array('a_id'=>784,'showFace'=>0,'user'=>$_smarty_tpl->getVariable('user')->value,'return'=>1,'desc'=>'userdaten'),$_smarty_tpl);?>
  
    
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


<?php echo smarty_function_xr_atom(array('a_id'=>828,'return'=>1,'desc'=>'haustiere'),$_smarty_tpl);?>

<?php echo smarty_function_xr_atom(array('a_id'=>829,'return'=>1,'desc'=>'veggie'),$_smarty_tpl);?>


<?php echo smarty_function_xr_atom(array('a_id'=>700,'return'=>1,'showFace'=>0,'desc'=>'adresse'),$_smarty_tpl);?>

<?php echo smarty_function_xr_atom(array('a_id'=>741,'return'=>1,'showFace'=>0,'desc'=>'submit'),$_smarty_tpl);?>

</form>