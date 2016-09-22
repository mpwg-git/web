<?php /* Smarty version Smarty-3.0.7, created on 2015-08-27 01:20:58
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codep4BUp8" */ ?>
<?php /*%%SmartyHeaderCode:153309721755de49daa4e468-91325628%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a529e8af2572e2ae2476cb1b33f0f49d92c9e71b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codep4BUp8',
      1 => 1440631258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153309721755de49daa4e468-91325628',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="col-xs-4 picture-col">
    <div class="img-wrapper">
        <div class="inner-wrapper">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>545,'h'=>500,'w'=>470,'rmode'=>"cco",'class'=>"img-responsive shower-img"),$_smarty_tpl);?>

            <div class="overlay-bg">
                <div class="overlay">
                    <p class="upper">
                        <span class="pull-left drduck icon-duck"></span>
                        <span class="pull-right">
                            <span class="prozent">90%</span>
                            <span class="match">match</span>
                        </span>
                    </p>
                    <div style="clear:both"></div>
                    <p><?php echo smarty_function_xr_translate(array('tag'=>"Dr. Duck says: Erst registrieren, dann matchen!"),$_smarty_tpl);?>
</p>
                    <p><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>5),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Gratis anmelden"),$_smarty_tpl);?>
</a></p>
                </div>
            </div>
        </div>
    </div>
</div>