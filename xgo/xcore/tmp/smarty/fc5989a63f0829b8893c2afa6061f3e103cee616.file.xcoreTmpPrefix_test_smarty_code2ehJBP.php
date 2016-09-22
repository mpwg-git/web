<?php /* Smarty version Smarty-3.0.7, created on 2015-08-10 11:47:13
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2ehJBP" */ ?>
<?php /*%%SmartyHeaderCode:104413063755c87321aec9c4-12799820%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc5989a63f0829b8893c2afa6061f3e103cee616' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2ehJBP',
      1 => 1439200033,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104413063755c87321aec9c4-12799820',
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

    
     <div class="form-group">
        <label><?php echo smarty_function_xr_translate(array('tag'=>"Neue Mitbewohner?"),$_smarty_tpl);?>
</label>
        <div class="column-input v-center">
            <input class="form-control" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'von Personen'),$_smarty_tpl);?>
?" value="<?php echo $_smarty_tpl->getVariable('profil')->value;?>
" />
        </div><!--
        --><div class="devider v-center">-</div><!--
        --><div class="column-input v-center">
            <input class="form-control" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'bis Personen'),$_smarty_tpl);?>
?" />
        </div>
    </div>
    
    <div class="form-group geschlecht-container">
        <label><?php echo smarty_function_xr_translate(array('tag'=>"Geschlecht?"),$_smarty_tpl);?>
</label>
        <label for="geschlecht-female" class="radio special-label">
            <input id="geschlecht-female" type="radio" name="geschlecht"/>
            <span class="checked icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
            <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
        </label>
        <label for="geschlecht-male" class="radio special-label">
            <input id="geschlecht-male" type="radio" name="geschlecht" />
            <span class="checked icon-mann"><span class="path1"></span><span class="path2"></span></span>
            <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
        </label>
    </div>
   
    <?php echo smarty_function_xr_atom(array('a_id'=>701,'return'=>1,'desc'=>'mitbewohner'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>738,'return'=>1,'desc'=>'zimmergroesse'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>739,'return'=>1,'desc'=>'abloese'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>740,'return'=>1,'desc'=>'raucher'),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>699,'return'=>1,'desc'=>'sprachen'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>700,'return'=>1,'desc'=>'adresse'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_atom(array('a_id'=>741,'return'=>1,'desc'=>'submit'),$_smarty_tpl);?>

    
</form>