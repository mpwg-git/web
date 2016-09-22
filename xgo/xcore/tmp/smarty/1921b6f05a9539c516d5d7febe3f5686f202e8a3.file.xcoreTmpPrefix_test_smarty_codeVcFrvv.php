<?php /* Smarty version Smarty-3.0.7, created on 2015-06-30 15:28:36
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVcFrvv" */ ?>
<?php /*%%SmartyHeaderCode:10406716735592998461ae24-72361417%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1921b6f05a9539c516d5d7febe3f5686f202e8a3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVcFrvv',
      1 => 1435670916,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10406716735592998461ae24-72361417',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="profil">
    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>161,'w'=>197,'h'=>197,'rmode'=>"cco",'class'=>"profileimage"),$_smarty_tpl);?>

    <div class="matchinginfos">
        <span class="drducksays"><span class="icon-duck"></span> <?php echo smarty_function_xr_translate(array('tag'=>"Dr. Duck Says:"),$_smarty_tpl);?>
</span>
        
        <span class="prozent">85</span>
        <span class="match">match</span>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="maininfo">
        <p class="name">Name</p>
        <p class="subinfo">Nachname | 26 Jahre</p>
    </div>
    
    <div class="wg-img-wrapper">
        <p class="headline">Die WG</p>
        <div class="image-slider">
            <div class="item">
                <?php echo smarty_function_xr_imgWrapper(array('s_id'=>179,'w'=>600,'h'=>300,'rmode'=>"cco",'class'=>"image"),$_smarty_tpl);?>

            </div>
        </div>
    </div>
    
    <div class="mitbewohner">
        <span class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"Die Mitbewohner"),$_smarty_tpl);?>
</span>
    </div>
    
</div>