<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 12:21:12
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coder83pXc" */ ?>
<?php /*%%SmartyHeaderCode:56193963455d5aa1831b705-70085398%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c91f86f4365a608cdc74ffe5f229ccfbc80c48ad' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coder83pXc',
      1 => 1440066072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56193963455d5aa1831b705-70085398',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyData",'var'=>"data"),$_smarty_tpl);?>


<div class="profilerstellen">
   
   <div class="meinprofil-profilbild add-image add-image-profil profileimage" data-type="profile">
        
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
        
        <div class="geschlecht">
            <label for="female" class="radio">
                <input id="female" type="radio" name="gender"/>
                <span class="checked icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                <span class="unchecked icon-frau_outline"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
            </label>
            <label for="male" class="radio">
                <input id="male" type="radio" name="gender" />
                <span class="checked icon-mann"><span class="path1"></span><span class="path2"></span></span>
                <span class="unchecked icon-mann_outline"><span class="path1"></span><span class="path2"></span></span>
            </label>
        </div>
        <div class="moreimages">
            <?php echo smarty_function_xr_atom(array('a_id'=>748,'images'=>$_smarty_tpl->getVariable('data')->value['IMAGES'],'return'=>1),$_smarty_tpl);?>

        </div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="mainform">
        
        <?php echo smarty_function_xr_atom(array('a_id'=>698,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'profile'=>$_smarty_tpl->getVariable('data')->value['PROFILE'],'return'=>1),$_smarty_tpl);?>

        
    </div>
</div>