<?php /* Smarty version Smarty-3.0.7, created on 2015-12-22 13:09:09
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/732.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:47236343956793d6517c175-89234719%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90677397a2823421dcc069947b3d8744dcf4f521' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/732.cache-3.html',
      1 => 1450786148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47236343956793d6517c175-89234719',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?>
<form class="form-mein-raum" id="form-mein-raum">
    
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('data')->value['ROOM']['wz_id'];?>
" />
    <br>
    
    <div class="form-group geschlecht-container">
        <label><?php echo smarty_function_xr_translate(array('tag'=>"Gesucht?"),$_smarty_tpl);?>
</label>
        
        <label for="mitbew-female" class="radio special-label">
            <input id="mitbew-female" type="radio" name="GESCHLECHT_MITBEWOHNER" value="F" <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_GESCHLECHT_MITBEWOHNER']=='F'){?>checked="checked"<?php }?>/>
            <span class="checked icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
            <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
        </label>
        <label for="mitbew-male" class="radio special-label">
            <input id="mitbew-male" type="radio" name="GESCHLECHT_MITBEWOHNER" value="M" <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_GESCHLECHT_MITBEWOHNER']=='M'){?>checked="checked"<?php }?> "/>
            <span class="checked icon-mann"><span class="path1"></span><span class="path2"></span></span>
            <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
        </label>
        <label for="mitbew-egal" class="radio special-label">
            <input id="mitbew-egal" type="radio" name="GESCHLECHT_MITBEWOHNER" value="X" <?php if ($_smarty_tpl->getVariable('data')->value['ROOM']['wz_GESCHLECHT_MITBEWOHNER']=='X'){?>checked="checked"<?php }?>/>
            <span class="checked circle circle-filled circle-with-text" style="vertical-align:bottom"><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
            <span class="unchecked circle circle-plain circle-with-text" style="vertical-align:bottom"><?php echo smarty_function_xr_translate(array('tag'=>'egal'),$_smarty_tpl);?>
</span>
        </label>
    </div>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>856,'return'=>1,'desc'=>'unreg mitbewohner F'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>855,'return'=>1,'desc'=>'unreg mitbewohner M'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>848,'return'=>1,'desc'=>'interne beschriftung'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>734,'return'=>1,'desc'=>'zeitraum'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>816,'return'=>1,'desc'=>'miete'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>817,'return'=>1,'desc'=>'zimmergroesse'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>740,'return'=>1,'desc'=>'raucher'),$_smarty_tpl);?>

     
    <?php echo smarty_function_xr_atom(array('a_id'=>739,'return'=>1,'noEgal'=>1,'desc'=>'abloese'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>828,'return'=>1,'desc'=>'haustiere'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>829,'return'=>1,'desc'=>'veggie'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>819,'return'=>1,'desc'=>'adresse'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>854,'return'=>1,'desc'=>'beschreibung'),$_smarty_tpl);?>

    
    
    
    <?php echo smarty_function_xr_atom(array('a_id'=>818,'return'=>1,'desc'=>'submitroom'),$_smarty_tpl);?>

    
</form>