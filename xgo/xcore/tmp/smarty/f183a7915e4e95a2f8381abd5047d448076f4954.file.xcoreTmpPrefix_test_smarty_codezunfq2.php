<?php /* Smarty version Smarty-3.0.7, created on 2015-11-12 13:47:25
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezunfq2" */ ?>
<?php /*%%SmartyHeaderCode:191882527556448a5d77c0e5-43122607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f183a7915e4e95a2f8381abd5047d448076f4954' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezunfq2',
      1 => 1447332445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191882527556448a5d77c0e5-43122607',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><p class="no-results text-center">
    <span class="no-results-ente">
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>790,'w'=>100),$_smarty_tpl);?>

    </span>
    
    <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('resultsType')->value),$_smarty_tpl);?>

    
    <?php if ($_smarty_tpl->getVariable('resultsType')->value=="FAVS"){?>
        <?php echo smarty_function_xr_translate(array('tag'=>"Leider keine"),$_smarty_tpl);?>
<br /><?php echo smarty_function_xr_translate(array('tag'=>"Treffer zu deinen Suchkriterien"),$_smarty_tpl);?>
    
    <?php }elseif($_smarty_tpl->getVariable('resultsType')->value=="BLOCKED"){?>
        <?php echo smarty_function_xr_translate(array('tag'=>"Du hast noch keine"),$_smarty_tpl);?>
<br /><?php echo smarty_function_xr_translate(array('tag'=>"blockierten User"),$_smarty_tpl);?>
    
    <?php }else{ ?>
        <?php echo smarty_function_xr_translate(array('tag'=>"Du hast noch keine"),$_smarty_tpl);?>
<br /><?php echo smarty_function_xr_translate(array('tag'=>"favorisierten User"),$_smarty_tpl);?>
    
    <?php }?>
    
</p>