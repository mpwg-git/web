<?php /* Smarty version Smarty-3.0.7, created on 2015-11-10 14:47:07
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2VYwmK" */ ?>
<?php /*%%SmartyHeaderCode:5431458615641f55b821226-95779621%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37ba4853aa958795c8784474f8b5adc6936ff275' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2VYwmK',
      1 => 1447163227,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5431458615641f55b821226-95779621',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::redirectIfLoggedIn"),$_smarty_tpl);?>


<div class="search-start default-container-padding">
    <h2>WO?</h2>
    <form>
        <?php echo smarty_function_xr_atom(array('a_id'=>764,'return'=>1),$_smarty_tpl);?>

    </form>
    <div class="einleitungstext">
        <span class="deine"><?php echo smarty_function_xr_translate(array('tag'=>"Deine"),$_smarty_tpl);?>
</span><br/>
        <span><?php echo smarty_function_xr_translate(array('tag'=>"Persönliche"),$_smarty_tpl);?>
</span><br/>
        <span><?php echo smarty_function_xr_translate(array('tag'=>"Wg Suchma"),$_smarty_tpl);?>
</span>
        <span><?php echo smarty_function_xr_translate(array('tag'=>"schine"),$_smarty_tpl);?>
</span><span class="icon-duck drduck"></span>
        
        <span class="find">Find People, not just Rooms</span>
    </div>
   
    
</div>
<?php echo smarty_function_xr_atom(array('a_id'=>643,'return'=>1),$_smarty_tpl);?>
