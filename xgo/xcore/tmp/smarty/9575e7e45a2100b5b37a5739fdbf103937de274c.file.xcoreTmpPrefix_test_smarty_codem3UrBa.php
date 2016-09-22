<?php /* Smarty version Smarty-3.0.7, created on 2015-08-28 00:23:21
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codem3UrBa" */ ?>
<?php /*%%SmartyHeaderCode:102168887555df8dd9ad5804-54860519%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9575e7e45a2100b5b37a5739fdbf103937de274c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codem3UrBa',
      1 => 1440714201,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102168887555df8dd9ad5804-54860519',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
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
    
    <div id="map2" class="map"></div>
    
    
</div>

<?php if ($_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LAT']!=0&&$_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LNG']!=0){?>
    <?php echo smarty_function_xr_atom(array('a_id'=>777,'lat'=>$_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LAT'],'lng'=>$_smarty_tpl->getVariable('data')->value['PROFILE']['wz_ADRESSE_LNG'],'return'=>1),$_smarty_tpl);?>

<?php }?>