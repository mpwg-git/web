<?php /* Smarty version Smarty-3.0.7, created on 2017-03-08 10:21:33
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTW8Rtg" */ ?>
<?php /*%%SmartyHeaderCode:101588621058bfcd1d854e46-68887897%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bee6b29b3d25395d216b08abce68e6ad78a4b6f' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTW8Rtg',
      1 => 1488964893,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '101588621058bfcd1d854e46-68887897',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="carousel-caption no-gutter">
    <img class="header-icon-duck" src="/xstorage/template/redesign/svg/icon-duck-white.svg" alt="Dr. Duck" />
    <h1 class="text-uppercase">Find people, not just rooms.</h1>
    <blockquote>
        <h4 class="hl-caption"><b><?php echo smarty_function_xr_translate(array('tag'=>'fp_zitat'),$_smarty_tpl);?>
</b><span class="small" style="display: inline-block;"><?php echo smarty_function_xr_translate(array('tag'=>'fp_zitat-small'),$_smarty_tpl);?>
</span></h4>
    </blockquote>
    <div class="btn-group-register">
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>47),$_smarty_tpl);?>
">    
            <div class="circle" title="WG Zimmer finden">
                <img class="btn-icon-wgzimmer" src="/xstorage/template/redesign/svg/icon-wg-zimmer-finden-white.svg" alt="WG Zimmer finden" />
                <p class="caption-text"><?php echo smarty_function_xr_translate(array('tag'=>'fp_btn-room'),$_smarty_tpl);?>
</p>
            </div>
        </a>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>48),$_smarty_tpl);?>
">
            <div class="circle" title="Neuen Mitbewohner finden">
                <img class="btn-icon-mitbewohner" src="/xstorage/template/redesign/svg/icon-mitbewohner-finden-white.svg" alt="Mitbewohner finden" />
                <p class="caption-text"><?php echo smarty_function_xr_translate(array('tag'=>'fp_btn-mitbewohner'),$_smarty_tpl);?>
</p>
            </div>
        </a>
        <div class="circle" title="WG sucht WG">
            <img class="btn-icon-wgsuchtwg" src="/xstorage/template/redesign/svg/icon-wg-sucht-wg-white.svg" alt="WG sucht WG" />
            <p class="caption-text"><?php echo smarty_function_xr_translate(array('tag'=>'fp_btn-wg'),$_smarty_tpl);?>
</p>
        </div>
    </div>
</div>