<?php /* Smarty version Smarty-3.0.7, created on 2016-01-13 10:58:44
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codek4t4jg" */ ?>
<?php /*%%SmartyHeaderCode:195911726356961fd4e35ed5-15841744%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa76356289c30ff8063e6dc0a187131fa6e87219' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codek4t4jg',
      1 => 1452679124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195911726356961fd4e35ed5-15841744',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value['IMAGES']),$_smarty_tpl);?>


<div class="meinprofil-profilbild add-image add-image-profil profileimage" data-type="profile">
    
    
    <?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']=='biete'&&$_smarty_tpl->getVariable('P_ID')->value==30){?>
        <?php if (!$_smarty_tpl->getVariable('data')->value['IMAGES']){?>
        AAA
            <?php $_smarty_tpl->tpl_vars['icontype'] = new Smarty_variable('raum', null, null);?>
            <?php echo smarty_function_xr_atom(array('a_id'=>878,'return'=>1,'showFace'=>0,'desc'=>'fallback-icon'),$_smarty_tpl);?>

        <?php }else{ ?>
        BBB
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMAGES'][0]['wz_S_ID'],'w'=>180,'h'=>197,'rmode'=>"cco",'class'=>"profileimage-img"),$_smarty_tpl);?>

        <?php }?>
    <?php }else{ ?>
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['USER']['wz_PROFILBILD'],'w'=>180,'h'=>197,'rmode'=>"cco",'class'=>"profileimage-img"),$_smarty_tpl);?>

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