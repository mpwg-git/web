<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 10:19:32
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeN4TvrY" */ ?>
<?php /*%%SmartyHeaderCode:186573970755cb019497c558-51807226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e53f79376ba8e3c1afd4fde249df65b2c0a3c5b4' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeN4TvrY',
      1 => 1439367572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186573970755cb019497c558-51807226',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><div class="col-xs-4 picture-col">
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>13),$_smarty_tpl);?>
">
    <div class="img-wrapper">
        <div class="inner-wrapper">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMG'],'h'=>500,'w'=>470,'rmode'=>"cco",'class'=>"img-responsive shower-img"),$_smarty_tpl);?>

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
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>