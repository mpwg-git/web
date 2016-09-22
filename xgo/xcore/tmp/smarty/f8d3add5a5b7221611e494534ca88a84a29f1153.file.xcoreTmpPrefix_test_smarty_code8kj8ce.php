<?php /* Smarty version Smarty-3.0.7, created on 2015-08-10 11:41:52
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8kj8ce" */ ?>
<?php /*%%SmartyHeaderCode:67571541355c871e02b4d78-33645289%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8d3add5a5b7221611e494534ca88a84a29f1153' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8kj8ce',
      1 => 1439199712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67571541355c871e02b4d78-33645289',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><h2>Meine Daten</h2>
    
    <form class="form-mein-profil">
        
        <?php echo smarty_function_xr_atom(array('a_id'=>734,'return'=>1,'desc'=>'zeitraum'),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>735,'return'=>1,'desc'=>'miete'),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>736,'return'=>1,'desc'=>'mitbewohner'),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>737,'return'=>1,'desc'=>'wggroesse'),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>738,'return'=>1,'desc'=>'zimmergroesse'),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>739,'return'=>1,'desc'=>'zimmergroesse'),$_smarty_tpl);?>

        
        
        
        
        
       
        
        <div class="form-group">
            <label><?php echo smarty_function_xr_translate(array('tag'=>"Raucher?"),$_smarty_tpl);?>
</label>
            <label for="raucherja" class="radio special-label">
                <input id="raucherja" type="radio" name="raucher" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_RAUCHER']=='Y'){?>checked="checked"<?php }?>/>
                <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>
                <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'ja'),$_smarty_tpl);?>
</span>
            </label>
            <label for="rauchernein" class="radio special-label">
                <input id="rauchernein" type="radio" name="raucher" <?php if ($_smarty_tpl->getVariable('profile')->value['wz_RAUCHER']=='N'){?>checked="checked"<?php }?>/>
                <span class="checked circle circle-filled"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>
                <span class="unchecked circle circle-plain"><?php echo smarty_function_xr_translate(array('tag'=>'nein'),$_smarty_tpl);?>
</span>
            </label>
        </div>
        
        <?php echo smarty_function_xr_atom(array('a_id'=>699,'return'=>1),$_smarty_tpl);?>

        <?php echo smarty_function_xr_atom(array('a_id'=>700,'return'=>1),$_smarty_tpl);?>

        
        <div class="form-group submitbutton-container">
            <input type="submit" value="speichern" />
        </div>
        
        
    </form>