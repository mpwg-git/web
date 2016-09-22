<?php /* Smarty version Smarty-3.0.7, created on 2015-11-24 16:12:43
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code95pk2p" */ ?>
<?php /*%%SmartyHeaderCode:58287257456547e6b0d94d3-34664539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d8c48edc78d50aa2af580dc9a95f29bbe262d45' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code95pk2p',
      1 => 1448377963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58287257456547e6b0d94d3-34664539',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="col-xs-6 picture-col">
    <div class="img-wrapper">
        <div class="inner-wrapper">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMG'],'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>

            
            <div class="overlay-bg">
                <div class="overlay">
                    <p class="upper">
                        <span class="pull-left drduck icon-duck"></span>
                        <span class="pull-right">
                            <span class="prozent">?%</span>
                            <span class="match">match</span>
                        </span>
                    </p>
                    <div style="clear:both"></div>
                    <p class="start-erstregistrieren"><?php echo smarty_function_xr_translate(array('tag'=>"Dr. Duck says: Erst registrieren, dann matchen!"),$_smarty_tpl);?>

                    <br /><br /><span class="icon-pfeil"></span> <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>5),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Gratis anmelden"),$_smarty_tpl);?>
</a></p>
                </div>
            </div>
        </div>
    </div>
</div>