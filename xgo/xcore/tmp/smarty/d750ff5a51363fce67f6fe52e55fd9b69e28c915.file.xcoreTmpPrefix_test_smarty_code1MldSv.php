<?php /* Smarty version Smarty-3.0.7, created on 2015-07-27 18:28:31
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1MldSv" */ ?>
<?php /*%%SmartyHeaderCode:138063543355b65c2f2abf80-19459166%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd750ff5a51363fce67f6fe52e55fd9b69e28c915' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1MldSv',
      1 => 1438014511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138063543355b65c2f2abf80-19459166',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="col-xs-12 picture-col">
    <div class="img-wrapper">
        <div class="inner-wrapper">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>167,'h'=>500,'w'=>470,'rmode'=>"cco",'class'=>"img-responsive shower-img"),$_smarty_tpl);?>

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
                        <p class="button-container-favblock clearfix">
                            <div class="inner">
                                <div class="item">
                                    <span class="icon-Favourite_inaktiv"></span><span class="item-beschreibung">Favorit</span>
                                </div>
                                
                                <span class="icon-Blocked_inaktiv"></span><span class="item-beschreibung">Blockieren</span>    
                            </div>
                        </p>
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