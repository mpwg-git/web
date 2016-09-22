<?php /* Smarty version Smarty-3.0.7, created on 2015-08-24 11:26:13
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeohjEB0" */ ?>
<?php /*%%SmartyHeaderCode:29997571255dae33535e5f3-98614341%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87905f357777ec707c57634f21c66f40c7d92dac' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeohjEB0',
      1 => 1440408373,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29997571255dae33535e5f3-98614341',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>


<div class="profil-map">
    <div class="upper-container">
        <div class="upper default-container-padding">
            
            <a href="<?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['PROFILE_URL'];?>
">
                <span class="icon-Close"></span>
            </a>
            
            <p class="name">
                <?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_VORNAME'];?>

            </p>
            <p>
                <?php echo $_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE'];?>

            </p>
        </div>
    </div>
    
    <div id="map" class="map"></div>
    
    
</div>