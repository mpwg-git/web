<?php /* Smarty version Smarty-3.0.7, created on 2015-11-04 18:00:20
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexo0eHq" */ ?>
<?php /*%%SmartyHeaderCode:1223838960563a39a4a2c8e5-94787158%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37a12770dc880ae95cb43d6b01a3ff878eae5030' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexo0eHq',
      1 => 1446656420,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1223838960563a39a4a2c8e5-94787158',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="meinprofil-profilbild add-image add-image-profil profileimage" data-type="profile">
        
  
    
    <span class="icon-plus"></span>
    <span class="profilbild-hochladen">Profilbild hochladen</span>
    
    <div class="img-upload-label-container">
        <label class="img-upload-label">
        <input type="file" class="fileupload add-image-file" name="add-image-file" data-filename-placement="inside" title="Datei wählen">
        <span class="upload-progress-bar"></span>
    </label>        
    </div>
</div>

<div class="maininfos">
    <h1>Profil</h1>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>797,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'return'=>1),$_smarty_tpl);?>

    
    
    <div class="moreimages">
        <?php echo smarty_function_xr_atom(array('a_id'=>748,'images'=>$_smarty_tpl->getVariable('data')->value['IMAGES'],'return'=>1),$_smarty_tpl);?>

    </div>
</div>

<div class="clearfix"></div>