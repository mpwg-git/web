<?php /* Smarty version Smarty-3.0.7, created on 2015-11-26 10:13:22
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesI62La" */ ?>
<?php /*%%SmartyHeaderCode:17002300605656cd326dc6d2-55232430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87d4a2573ccb070d2598f64bfa52eb0c22705e1d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesI62La',
      1 => 1448529202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17002300605656cd326dc6d2-55232430',
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
    
    <?php if ($_smarty_tpl->getVariable('searchType')->value=='suche'){?>
    
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