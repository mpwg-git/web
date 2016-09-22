<?php /* Smarty version Smarty-3.0.7, created on 2015-08-24 11:27:00
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeow3K2f" */ ?>
<?php /*%%SmartyHeaderCode:84790493355dae36416e208-12549806%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdef1b841436b8257ba746f9216d55e38cc6416e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeow3K2f',
      1 => 1440408420,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84790493355dae36416e208-12549806',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>


<div class="profil-map">
    <div class="upper-container">
        <div class="upper default-container-padding">
            
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>13),$_smarty_tpl);?>
">
                <span class="icon-Close"></span>
            </a>
            
            <p class="name">
                Jasmin
            </p>
            <p>
                Mustergasse 10/22 | 1010 Wien
            </p>
        </div>
    </div>
    
    <div id="map" class="map"></div>
    
    
</div>