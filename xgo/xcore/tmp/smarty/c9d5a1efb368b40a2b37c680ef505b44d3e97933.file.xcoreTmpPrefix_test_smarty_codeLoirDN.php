<?php /* Smarty version Smarty-3.0.7, created on 2015-10-08 12:15:13
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLoirDN" */ ?>
<?php /*%%SmartyHeaderCode:151368166156164231a68ad7-41450763%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9d5a1efb368b40a2b37c680ef505b44d3e97933' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeLoirDN',
      1 => 1444299313,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151368166156164231a68ad7-41450763',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getFrage",'var'=>"data"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getWgTestState",'userId'=>$_SESSION['xredaktor_feUser_wsf']['wz_id'],'var'=>'wgteststate'),$_smarty_tpl);?>


<div class="col-xs-12 default-container-paddingtop meinprofil-wgtest">
    
    <span class="looklikeh1">
        WG-Test2
    </span>
    
    <p class="wgtest-beschreibung">
        Sed magnimp orecea dis aligniscias quam de cone et et qui sequatiis dolo et praernatur? Qui verchiliquis perovit porum ellabor a senderum.
        Facerum am erferias recto et aut omni nis nihit volori tempore sequas ad ea sam, tet rem vellorum arcid quo disto quo dellut aute con num commoditaspe volum et et hita doluptat quam que remolore et fugiam.
    </p>
    
    <div class="js-wgtest-replacer">    
        
        <?php if ($_smarty_tpl->getVariable('wgteststate')->value==1&&$_REQUEST['restart']!=1){?>
            <?php echo smarty_function_xr_atom(array('a_id'=>779,'return'=>1,'desc'=>'alle fragen beantworted'),$_smarty_tpl);?>

        <?php }else{ ?>
            <?php echo smarty_function_xr_atom(array('a_id'=>766,'return'=>1),$_smarty_tpl);?>

        <?php }?>
        
    </div>
    
</div>