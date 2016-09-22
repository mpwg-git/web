<?php /* Smarty version Smarty-3.0.7, created on 2015-11-04 11:43:47
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeDaDDsy" */ ?>
<?php /*%%SmartyHeaderCode:19452808155639e163894c46-62058432%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4289ea1b23bdb5fe6b18e5ecea4449593940de3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeDaDDsy',
      1 => 1446633827,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19452808155639e163894c46-62058432',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyData",'var'=>"data"),$_smarty_tpl);?>


<div class="meinprofil-container grey-bg">
    
    
    <div class="col-xs-12 default-container-paddingtop">
        
        <span class="looklikeh1">
            Profil
            <div style="clear:both"></div>
            <span class="subheadline whoiam"><?php if ($_smarty_tpl->getVariable('data')->value['USER']['wz_TYPE']=='suche'){?><?php echo smarty_function_xr_translate(array('tag'=>"Suchender"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_translate(array('tag'=>"Anbieter"),$_smarty_tpl);?>
<?php }?></span>
        </span>
        
        <ul class="meinprofil-options">
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>8),$_smarty_tpl);?>
">Meine Daten</a>        
            </li>
            
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'restart'=>0),$_smarty_tpl);?>
">Mein WG Test</a>   
            </li>
            
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>15),$_smarty_tpl);?>
">Mein Konto</a>        
            </li>
            
           
            
            
        </ul>
        
    </div>
</div>