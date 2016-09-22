<?php /* Smarty version Smarty-3.0.7, created on 2015-08-24 14:05:39
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codefwPxyE" */ ?>
<?php /*%%SmartyHeaderCode:175473852355db0893e12ed7-94397876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42dcb7dc02d4328a937260e0cc3f0cc7ba4950bd' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codefwPxyE',
      1 => 1440417939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175473852355db0893e12ed7-94397876',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="meinprofil-profilbild add-image add-image-profil profileimage" data-type="profile">
        
    <?php if (($_smarty_tpl->getVariable('data')->value['USER']>0)){?>
         <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['USER']['wz_PROFILBILD'],'w'=>197,'h'=>197,'rmode'=>"cco",'class'=>"profileimage"),$_smarty_tpl);?>

    <?php }else{ ?>
        <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
    <?php }?>
    
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
    
    <?php echo smarty_function_xr_atom(array('a_id'=>797,'return'=>1),$_smarty_tpl);?>

    
    
    <div class="moreimages">
        <?php echo smarty_function_xr_atom(array('a_id'=>748,'images'=>$_smarty_tpl->getVariable('data')->value['IMAGES'],'return'=>1),$_smarty_tpl);?>

    </div>
</div>

<div class="clearfix"></div>