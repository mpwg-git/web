<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 18:32:30
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code23eBCD" */ ?>
<?php /*%%SmartyHeaderCode:70437758355d6011ecd13a8-31815363%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b922ecc19522fd874364ce7f73d080df2be9c5b0' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code23eBCD',
      1 => 1440088350,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70437758355d6011ecd13a8-31815363',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="picture-col">
    <div class="img-wrapper">
        <div class="inner-wrapper">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>167,'w'=>768,'rmode'=>"cco",'class'=>"img-responsive shower-img rsImg"),$_smarty_tpl);?>

            
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMG'],'w'=>768,'rmode'=>"cco",'class'=>"img-responsive shower-img rsImg"),$_smarty_tpl);?>

            
            <div class="matchinginfos">
                <span class="prozent">85</span>
                <span class="match">match</span>
            </div>
            
            <div class="overlay-bg">
                <div class="overlay">
                    <p class="upper">
                        <span class="drduck icon-duck"></span>
                        <span class="">
                            <span class="prozent">85</span>
                            <span class="match">match</span>
                        </span>
                    </p>
                    <div class="clearfix"></div>
                    <div class="infos">
                        <p class="name">Jasmin</p>
                        <p class="zimmer">400 € / Zimmer</p>
                        <div class="button-container-favblock clearfix">
                            <div class="inner clearfix">
                                <div class="item">
                                    <span class="icon icon-Favourite_inaktiv"></span><span class="item-beschreibung">Favorit</span>
                                </div>
                                <div class="item">
                                    <span class="icon icon-Blocked_inaktiv"></span><span class="item-beschreibung">Blockieren</span>        
                                </div>
                            </div>
                        </div>
                        <p class="button-container">
                            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>13),$_smarty_tpl);?>
" class="button"><?php echo smarty_function_xr_translate(array('tag'=>"Profil"),$_smarty_tpl);?>
</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>