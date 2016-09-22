<?php /* Smarty version Smarty-3.0.7, created on 2015-08-19 13:35:53
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeO858Eq" */ ?>
<?php /*%%SmartyHeaderCode:130512218155d46a193c0ce6-57090329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc830eb91cb52ad93d4d91e8ba6fc3181c7acc5e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeO858Eq',
      1 => 1439984153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130512218155d46a193c0ce6-57090329',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><h2>Meine Daten</h2>
    
<form class="form-mein-profil" id="form-mein-profil">
    
    <?php echo smarty_function_xr_atom(array('a_id'=>734,'return'=>1,'desc'=>'zeitraum'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>735,'return'=>1,'desc'=>'miete'),$_smarty_tpl);?>

    
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
    
    <?php echo smarty_function_xr_atom(array('a_id'=>701,'return'=>1,'desc'=>'mitbewohner'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>738,'return'=>1,'desc'=>'zimmergroesse'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>739,'return'=>1,'desc'=>'abloese'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>740,'return'=>1,'desc'=>'raucher'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>699,'return'=>1,'desc'=>'sprachen'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>700,'return'=>1,'desc'=>'adresse'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>741,'return'=>1,'desc'=>'submit'),$_smarty_tpl);?>

    
</form>