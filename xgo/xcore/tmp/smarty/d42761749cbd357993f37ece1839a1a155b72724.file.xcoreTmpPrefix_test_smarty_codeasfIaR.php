<?php /* Smarty version Smarty-3.0.7, created on 2016-01-13 09:49:04
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeasfIaR" */ ?>
<?php /*%%SmartyHeaderCode:152510594356960f8051b237-52078775%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd42761749cbd357993f37ece1839a1a155b72724' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeasfIaR',
      1 => 1452674944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152510594356960f8051b237-52078775',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?>

<div class="meinprofil-profilbild add-image add-image-profil profileimage" data-type="profile">
        
    <?php if (($_smarty_tpl->getVariable('data')->value['USER']>0)){?>
         <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['USER']['wz_PROFILBILD'],'w'=>180,'h'=>197,'rmode'=>"cco",'class'=>"profileimage-img"),$_smarty_tpl);?>

    <?php }else{ ?>
        <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
    <?php }?>
    
    <span class="icon-plus"></span>
    <span class="profilbild-hochladen"><?php echo smarty_function_xr_translate(array('tag'=>"Profilbild hochladen"),$_smarty_tpl);?>
</span>
    
    <div class="img-upload-label-container">
        <label class="img-upload-label">
        <input type="file" class="fileupload add-image-file" name="add-image-file" data-filename-placement="inside" title="Datei wählen">
        <span class="upload-progress-bar"></span>
    </label>        
    </div>
</div>

<div class="maininfos">
    <h1><?php echo smarty_function_xr_translate(array('tag'=>"Profil"),$_smarty_tpl);?>
</h1>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>797,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'return'=>1),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>

    
</div>

<div class="clearfix"></div>