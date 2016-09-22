<?php /* Smarty version Smarty-3.0.7, created on 2015-11-10 13:08:25
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeecE08w" */ ?>
<?php /*%%SmartyHeaderCode:1112895625641de3954cb97-05614863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f72c4bf6e59f3324ee1ec28cb55d4778a93b46c0' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeecE08w',
      1 => 1447157305,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1112895625641de3954cb97-05614863',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getFrage",'var'=>"data"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getWgTestState",'userId'=>$_SESSION['xredaktor_feUser_wsf']['wz_id'],'var'=>'wgteststate'),$_smarty_tpl);?>


<div class="col-xs-4 meinprofil-links">
    <?php echo smarty_function_xr_atom(array('a_id'=>678,'return'=>1),$_smarty_tpl);?>

</div>

<div class="col-xs-8 default-container-paddingtop meinprofil-wgtest">
    
    <span class="looklikeh1">
        WG-Leben
    </span>
    
    <p class="wgtest-beschreibung">
        Sed magnimp orecea dis aligniscias quam de cone et et qui sequatiis dolo et praernatur? Qui verchiliquis perovit porum ellabor a senderum.
        Facerum am erferias recto et aut omni nis nihit volori tempore sequas ad ea sam, tet rem vellorum arcid quo disto quo dellut aute con num commoditaspe volum et et hita doluptat quam que remolore et fugiam.
    </p>
    
    <div class="js-wgtest-replacer">    
        
        <?php if ($_smarty_tpl->getVariable('wgteststate')->value==1&&$_REQUEST['restart']!=1&&!isset($_REQUEST['frageid'])){?>
            <?php echo smarty_function_xr_atom(array('a_id'=>779,'return'=>1,'desc'=>'alle fragen beantworted'),$_smarty_tpl);?>

        <?php }else{ ?>
            <?php echo smarty_function_xr_atom(array('a_id'=>766,'return'=>1),$_smarty_tpl);?>

        <?php }?>
        
    </div>
    
</div>