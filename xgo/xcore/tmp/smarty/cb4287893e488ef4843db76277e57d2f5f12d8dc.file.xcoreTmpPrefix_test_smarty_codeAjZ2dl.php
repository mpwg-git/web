<?php /* Smarty version Smarty-3.0.7, created on 2015-08-11 16:58:35
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAjZ2dl" */ ?>
<?php /*%%SmartyHeaderCode:43361612655ca0d9bb687b7-30330424%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb4287893e488ef4843db76277e57d2f5f12d8dc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAjZ2dl',
      1 => 1439305115,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43361612655ca0d9bb687b7-30330424',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyData",'var'=>"data"),$_smarty_tpl);?>


<div class="col-xs-4 meinprofil-links">
    <?php echo smarty_function_xr_atom(array('a_id'=>678,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'return'=>1),$_smarty_tpl);?>

</div>

<div class="col-xs-8 default-container-paddingtop meinprofil-meinedaten meinprofil-suche">
    
    <span class="looklikeh1">
        Profil
    </span>
    
    <div class="meinprofil-images-container">
        <?php echo smarty_function_xr_atom(array('a_id'=>743,'showFace'=>0,'return'=>1),$_smarty_tpl);?>
     
    </div>
    
    <div class="clearfix"></div>
        
    <?php echo smarty_function_xr_atom(array('a_id'=>698,'profile'=>$_smarty_tpl->getVariable('data')->value['PROFILE'],'return'=>1),$_smarty_tpl);?>

    
</div>