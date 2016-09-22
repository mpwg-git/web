<?php /* Smarty version Smarty-3.0.7, created on 2015-11-10 14:31:56
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQQEhSZ" */ ?>
<?php /*%%SmartyHeaderCode:6070742715641f1ccf03314-85981552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'caf74fa5a61787518ca77c0734f933ad061b5248' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeQQEhSZ',
      1 => 1447162316,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6070742715641f1ccf03314-85981552',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::redirectIfLoggedIn"),$_smarty_tpl);?>


<div class="search-start">
    <h2>WO?</h2>
    <form>
        <?php echo smarty_function_xr_atom(array('a_id'=>764,'addClass'=>"location-start",'return'=>1),$_smarty_tpl);?>

    </form>
    <div class="einleitungstext">
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
"> <span><?php echo smarty_function_xr_translate(array('tag'=>"Deine"),$_smarty_tpl);?>
</span><br/> </a>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
"><span><?php echo smarty_function_xr_translate(array('tag'=>"Pers"),$_smarty_tpl);?>
</span><br/> </a>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
"><span><?php echo smarty_function_xr_translate(array('tag'=>"Önliche"),$_smarty_tpl);?>
</span><br/></a>
        <span><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
">WG</a><span class="icon-duck drduck">
        </span></span><br/>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
"><span>Suchma</span></a>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
"><span>schine</span></a>
        
        <span class="find">Find People, not just Rooms.</span>
        <span class="icons">
            <span class="icon-kamm"></span>
            <span class="icon-klopapier"></span>
            <span class="icon-foen"></span>
            <span class="icon-zahnbuerste"></span>
            <span class="icon-rasierer"></span>
            <span class="icon-badewanne"></span>
        </span>
    </div>
        
</div>