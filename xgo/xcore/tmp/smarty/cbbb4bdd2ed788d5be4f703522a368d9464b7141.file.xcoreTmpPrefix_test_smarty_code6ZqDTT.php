<?php /* Smarty version Smarty-3.0.7, created on 2015-07-26 17:08:24
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6ZqDTT" */ ?>
<?php /*%%SmartyHeaderCode:39294577855b4f7e8847660-51346425%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbbb4bdd2ed788d5be4f703522a368d9464b7141' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6ZqDTT',
      1 => 1437923304,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39294577855b4f7e8847660-51346425',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?> <div class="col-xs-4 picture-col">
    <div class="img-wrapper">
        <div class="inner-wrapper">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>167,'h'=>500,'w'=>470,'rmode'=>"cco",'class'=>"img-responsive shower-img"),$_smarty_tpl);?>

            <div class="overlay-bg">
                <div class="overlay">
                    <p class="upper">
                        <span class="pull-left drduck icon-duck"></span>
                        <span class="pull-right">
                            <span class="prozent">90</span>
                            <span class="match">match</span>
                        </span>
                    </p>
                    <div style="clear:both"></div>
                    <div class="infos">
                        <p class="name">Jasmin</p>
                        <p class="zimmer">Zimmer für 400 €</p>
                        <p class="durchschnitt"> 26 Jahre</p>
                        <p class="mitbewohner">
                            <span class="icon-frau_black"></span>
                            <span class="icon-frau_black"></span>
                            <span class="icon-frau_black"></span>
                        </p>
                        <p class="button-container">
                            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>13),$_smarty_tpl);?>
" class="button"><?php echo smarty_function_xr_translate(array('tag'=>"Profil"),$_smarty_tpl);?>
</a>
                            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>12),$_smarty_tpl);?>
" class="button"><?php echo smarty_function_xr_translate(array('tag'=>"Chat"),$_smarty_tpl);?>
</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>