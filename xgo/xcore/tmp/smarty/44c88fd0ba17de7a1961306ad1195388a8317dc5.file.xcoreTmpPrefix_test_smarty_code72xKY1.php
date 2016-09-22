<?php /* Smarty version Smarty-3.0.7, created on 2015-08-11 12:14:05
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code72xKY1" */ ?>
<?php /*%%SmartyHeaderCode:142025816655c9caed1e25b9-83787231%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44c88fd0ba17de7a1961306ad1195388a8317dc5' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code72xKY1',
      1 => 1439288045,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142025816655c9caed1e25b9-83787231',
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
    
   <?php echo smarty_function_xr_atom(array('a_id'=>743,'showFace'=>0,'return'=>1),$_smarty_tpl);?>

    
    <div class="clearfix"></div>
        
    <?php echo smarty_function_xr_atom(array('a_id'=>698,'profile'=>$_smarty_tpl->getVariable('data')->value['PROFILE'],'return'=>1),$_smarty_tpl);?>

    
</div>