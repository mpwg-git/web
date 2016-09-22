<?php /* Smarty version Smarty-3.0.7, created on 2015-08-24 11:28:15
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemnSCaa" */ ?>
<?php /*%%SmartyHeaderCode:25804676355dae3af172b17-97525611%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5c91bbcdec6629ae94718d504c8c8cef9991cce' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemnSCaa',
      1 => 1440408495,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25804676355dae3af172b17-97525611',
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
                Mustergasse 10/22 | 1010 Wien
            </p>
        </div>
    </div>
    
    <div id="map" class="map"></div>
    
    
</div>