<?php /* Smarty version Smarty-3.0.7, created on 2015-11-26 10:14:54
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2xOgNS" */ ?>
<?php /*%%SmartyHeaderCode:2601030745656cd8e433015-82283720%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '975633e1d0b474c76897121d6be207de3c5afd2f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2xOgNS',
      1 => 1448529294,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2601030745656cd8e433015-82283720',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><p class="no-results text-center">
    <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('searchType')->value),$_smarty_tpl);?>

    <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('resultsType')->value),$_smarty_tpl);?>

    
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