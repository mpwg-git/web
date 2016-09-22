<?php /* Smarty version Smarty-3.0.7, created on 2015-08-13 01:26:10
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code29b1HH" */ ?>
<?php /*%%SmartyHeaderCode:63845337855cbd612c912c1-99551590%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b747beeb1eaffb0287877fc54deef9065fa4ccc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code29b1HH',
      1 => 1439421970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63845337855cbd612c912c1-99551590',
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
    
    <?php echo smarty_function_xr_atom(array('a_id'=>743,'return'=>1),$_smarty_tpl);?>

    
    <div class="clearfix"></div>
        
    <?php echo smarty_function_xr_atom(array('a_id'=>732,'profile'=>$_smarty_tpl->getVariable('data')->value['PROFILE'],'return'=>1),$_smarty_tpl);?>

    
</div>