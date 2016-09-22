<?php /* Smarty version Smarty-3.0.7, created on 2015-08-10 10:43:54
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesKAE8z" */ ?>
<?php /*%%SmartyHeaderCode:78285747655c8644a643728-24879286%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec29277e799b86c6a4327034c12205268456e89f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesKAE8z',
      1 => 1439196234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78285747655c8644a643728-24879286',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyData",'var'=>"data"),$_smarty_tpl);?>


<div class="col-xs-4 meinprofil-links">
    <?php echo smarty_function_xr_atom(array('a_id'=>678,'return'=>1),$_smarty_tpl);?>

</div>

<div class="col-xs-8 default-container-paddingtop meinprofil-meinedaten">
    
    <span class="looklikeh1">
        Profil
    </span>
    
    <div class="upload-image add-image">
        <span class="bild-hinzufuegen">Bild hinzufügen</span>
    </div>
    
    <div class="clearfix"></div>
        
    <?php echo smarty_function_xr_atom(array('a_id'=>698,'return'=>1),$_smarty_tpl);?>

    
</div>