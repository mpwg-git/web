<?php /* Smarty version Smarty-3.0.7, created on 2016-01-12 16:00:00
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/807.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:470017828569514f0cd9a17-40698606%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efc68741be2d6f1fb95a29ca09a35dd6abe47fe5' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/807.cache-3.html',
      1 => 1451984362,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '470017828569514f0cd9a17-40698606',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="col-xs-4 picture-col">
    <div class="img-wrapper">
        <div class="inner-wrapper">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMG'],'h'=>500,'w'=>470,'colorspace'=>"gray",'rmode'=>"cco",'class'=>"img-responsive"),$_smarty_tpl);?>

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
                    <p><?php echo smarty_function_xr_translate(array('tag'=>"Dr. Duck says: Erst registrieren, dann matchen!"),$_smarty_tpl);?>

                    <br /><br /><span class="icon-pfeil"></span> <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>5),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"Gratis anmelden"),$_smarty_tpl);?>
</a></p>
                </div>
            </div>
        </div>
    </div>
</div>