<?php /* Smarty version Smarty-3.0.7, created on 2017-03-09 10:08:28
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/951.cache-4.html" */ ?>
<?php /*%%SmartyHeaderCode:56023303358c11b8c6c29f8-55922180%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efe269842b4a31930fda8fefaae1b8b989122176' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/951.cache-4.html',
      1 => 1489050506,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56023303358c11b8c6c29f8-55922180',
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
    <div class="btn-wrapper">
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
            <a href="#">
                <div class="circle" title="WG sucht WG">
                    <img class="btn-icon-wgsuchtwg" src="/xstorage/template/redesign/svg/icon-wg-sucht-wg-white.svg" alt="WG sucht WG" />
                    <p class="caption-text"><?php echo smarty_function_xr_translate(array('tag'=>'fp_btn-wg'),$_smarty_tpl);?>
</p>
                </div>
            </a>
        </div>
    </div>
</div>