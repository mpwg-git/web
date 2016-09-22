<?php /* Smarty version Smarty-3.0.7, created on 2015-11-23 16:10:16
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOSHVEH" */ ?>
<?php /*%%SmartyHeaderCode:1269360056532c58199d81-04683769%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8406faaa4b76dcbedf2440ae235dd71cb2ae475' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOSHVEH',
      1 => 1448291416,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1269360056532c58199d81-04683769',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><p class="no-results text-center">
    <span class="no-results-ente">
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>790,'w'=>100),$_smarty_tpl);?>

    </span>
    
    
    <?php if ($_smarty_tpl->getVariable('searchType')->value=='biete'){?>
    
        <?php if ($_smarty_tpl->getVariable('resultsType')->value=="FAVS"){?>
            <?php echo smarty_function_xr_translate(array('tag'=>"Du hast noch keine"),$_smarty_tpl);?>
<br /><?php echo smarty_function_xr_translate(array('tag'=>"favorisierten Zimmer"),$_smarty_tpl);?>

        <?php }elseif($_smarty_tpl->getVariable('resultsType')->value=="BLOCKED"){?>
            <?php echo smarty_function_xr_translate(array('tag'=>"Du hast noch keine"),$_smarty_tpl);?>
<br /><?php echo smarty_function_xr_translate(array('tag'=>"blockierten Zimmer"),$_smarty_tpl);?>
    
        <?php }else{ ?>
            <?php echo smarty_function_xr_translate(array('tag'=>"Leider keine"),$_smarty_tpl);?>
<br /><?php echo smarty_function_xr_translate(array('tag'=>"Treffer zu deinen Suchkriterien"),$_smarty_tpl);?>

        <?php }?>
    
    
    <?php }else{ ?>
    
        <?php if ($_smarty_tpl->getVariable('resultsType')->value=="FAVS"){?>
            <?php echo smarty_function_xr_translate(array('tag'=>"Du hast noch keine"),$_smarty_tpl);?>
<br /><?php echo smarty_function_xr_translate(array('tag'=>"favorisierten User"),$_smarty_tpl);?>

        <?php }elseif($_smarty_tpl->getVariable('resultsType')->value=="BLOCKED"){?>
            <?php echo smarty_function_xr_translate(array('tag'=>"Du hast noch keine"),$_smarty_tpl);?>
<br /><?php echo smarty_function_xr_translate(array('tag'=>"blockierten User"),$_smarty_tpl);?>
    
        <?php }else{ ?>
            <?php echo smarty_function_xr_translate(array('tag'=>"Leider keine"),$_smarty_tpl);?>
<br /><?php echo smarty_function_xr_translate(array('tag'=>"Treffer zu deinen Suchkriterien"),$_smarty_tpl);?>

        <?php }?>

    <?php }?>
    
</p>