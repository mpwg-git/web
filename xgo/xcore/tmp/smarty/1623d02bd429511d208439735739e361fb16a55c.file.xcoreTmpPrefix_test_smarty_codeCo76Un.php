<?php /* Smarty version Smarty-3.0.7, created on 2016-01-14 19:09:56
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCo76Un" */ ?>
<?php /*%%SmartyHeaderCode:2787671185697e4748cbe17-60524343%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1623d02bd429511d208439735739e361fb16a55c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeCo76Un',
      1 => 1452794996,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2787671185697e4748cbe17-60524343',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="meinprofil-profilbild add-image add-image-profil profileimage" data-type="profile">
    
    
    <?php if ($_smarty_tpl->getVariable('theType')->value=='room'){?>
        <?php if ($_smarty_tpl->getVariable('data')->value['IMAGES'][0]){?>
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMAGES'][0]['wz_S_ID'],'w'=>180,'h'=>197,'rmode'=>"cco",'class'=>"profileimage-img"),$_smarty_tpl);?>

        <?php }else{ ?>
            <?php echo smarty_function_xr_atom(array('a_id'=>878,'icontype'=>'raum','return'=>1),$_smarty_tpl);?>

        <?php }?>
    <?php }else{ ?>
        <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']=='biete'&&$_smarty_tpl->getVariable('P_ID')->value==30){?>
            <?php if (!$_smarty_tpl->getVariable('data')->value['IMAGES']){?>
                <?php echo smarty_function_xr_atom(array('a_id'=>878,'return'=>1,'icontype'=>'raum','showFace'=>0,'desc'=>'fallback-icon'),$_smarty_tpl);?>

            <?php }else{ ?>
                <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMAGES'][0]['wz_S_ID'],'w'=>180,'h'=>197,'rmode'=>"cco",'class'=>"profileimage-img"),$_smarty_tpl);?>

            <?php }?>
            
        <?php }else{ ?>
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['USER']['wz_PROFILBILD'],'w'=>180,'h'=>197,'rmode'=>"cco",'class'=>"profileimage-img"),$_smarty_tpl);?>

        <?php }?>
    <?php }?>
    
    <span class="icon-plus"></span>
    <span class="profilbild-hochladen">
        <?php if ($_smarty_tpl->getVariable('theType')->value=='room'){?>
            <?php echo smarty_function_xr_translate(array('tag'=>"Raumbild hochladen"),$_smarty_tpl);?>

        <?php }else{ ?>
            <?php echo smarty_function_xr_translate(array('tag'=>"Profilbild hochladen"),$_smarty_tpl);?>

        <?php }?>
    </span>
    
    <div class="img-upload-label-container">
        <label class="img-upload-label">
        <input type="file" class="fileupload add-image-file" name="add-image-file" data-filename-placement="inside" title="<?php echo smarty_function_xr_translate(array('tag'=>'Datei wählen'),$_smarty_tpl);?>
">
        <span class="upload-progress-bar"></span>
    </label>        
    </div>
</div>

<div class="maininfos">
    <h1><?php echo smarty_function_xr_translate(array('tag'=>"Profil"),$_smarty_tpl);?>
</h1>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>797,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'return'=>1),$_smarty_tpl);?>

    
    <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']=='biete'&&$_smarty_tpl->getVariable('P_ID')->value==30){?>
        <div class="moreimages">
            <?php if ($_smarty_tpl->getVariable('P_ID')->value==8){?>
                <?php echo smarty_function_xr_atom(array('a_id'=>748,'images'=>$_smarty_tpl->getVariable('data')->value['IMAGES'],'fromRoom'=>0,'refid'=>$_REQUEST['roomId'],'return'=>1),$_smarty_tpl);?>

            <?php }else{ ?>
                <?php echo smarty_function_xr_atom(array('a_id'=>748,'images'=>$_smarty_tpl->getVariable('data')->value['IMAGES'],'fromRoom'=>1,'refid'=>$_REQUEST['roomId'],'return'=>1),$_smarty_tpl);?>

            <?php }?>
        </div>
    <?php }?>    
</div>

<div class="clearfix"></div>