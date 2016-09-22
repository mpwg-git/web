<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 14:16:12
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7d5yPj" */ ?>
<?php /*%%SmartyHeaderCode:62954002955cb390c155304-21178059%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a88d5248227c2ae5bfb646149d590cdbc870c5a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7d5yPj',
      1 => 1439381772,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62954002955cb390c155304-21178059',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyData",'var'=>"data"),$_smarty_tpl);?>


<div class="col-xs-4 meinprofil-links">
    <?php echo smarty_function_xr_atom(array('a_id'=>678,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'return'=>1),$_smarty_tpl);?>

</div>

<div class="col-xs-8 default-container-paddingtop meinprofil-meinedaten meinprofil-biete">
    
    <span class="looklikeh1">
        Profil
    </span>
    
    <div class="upload-image">
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>393,'rmode'=>"cco",'w'=>121,'h'=>132),$_smarty_tpl);?>

    </div>
    
     <div class="upload-image">
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>392,'rmode'=>"cco",'w'=>121,'h'=>132),$_smarty_tpl);?>

    </div>
    
     <div class="upload-image add-image">
        <span class="bild-hinzufuegen">Bild hinzufügen</span>
    </div>
    
    <div class="clearfix"></div>
        
    <?php echo smarty_function_xr_atom(array('a_id'=>732,'return'=>1),$_smarty_tpl);?>

    
</div>