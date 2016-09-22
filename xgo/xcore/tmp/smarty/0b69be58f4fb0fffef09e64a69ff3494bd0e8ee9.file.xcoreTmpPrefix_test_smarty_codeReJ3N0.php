<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 11:36:09
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeReJ3N0" */ ?>
<?php /*%%SmartyHeaderCode:171496060655cb1389ae5af8-72645656%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b69be58f4fb0fffef09e64a69ff3494bd0e8ee9' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeReJ3N0',
      1 => 1439372169,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171496060655cb1389ae5af8-72645656',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>


<div class="profil">
    
    <div class="col-xs-4 profil-links">
        <?php echo smarty_function_xr_atom(array('a_id'=>682,'user'=>$_smarty_tpl->getVariable('data')->value['USER'],'return'=>1),$_smarty_tpl);?>

    </div>
    
    <div class="col-xs-8 default-container-paddingtop">
        
        <div class="profil">
            
            <div class="clearfix"></div>
            
            <div class="maininfo">
                <span class="looklikeh1"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_VORNAME'];?>
</h3>
                <p class="subinfo"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_NACHNAME'];?>
 | 26 Jahre</p>
            </div>
            
            <div class="profil-text">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
            </div>
            
            <div class="wg-img-wrapper">
                <h3 class="headline">Die WG</h3>
                <div class="image-slider">
                    <div class="item">
                        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>179,'w'=>415,'h'=>166,'rmode'=>"cco",'class'=>"image"),$_smarty_tpl);?>

                    </div>
                </div>
            </div>
            
            <div class="mitbewohner">
                <h3 class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"Die Mitbewohner"),$_smarty_tpl);?>
</h3>
                <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                <span class="icon-mann"><span class="path1"></span><span class="path2"></span></span>
            </div>
            
            <?php echo smarty_function_xr_atom(array('a_id'=>706,'return'=>1),$_smarty_tpl);?>

            
            
        </div>
    </div>
    
</div>



