<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 13:38:35
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZoEqMJ" */ ?>
<?php /*%%SmartyHeaderCode:201386554455cb303b94dbb2-97434209%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51aad1c2c8768528e4d6d511c8aed918bfa2aa7d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZoEqMJ',
      1 => 1439379515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201386554455cb303b94dbb2-97434209',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getUserData",'var'=>"data"),$_smarty_tpl);?>


<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>


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
                <p class="subinfo"><?php echo $_smarty_tpl->getVariable('data')->value['USER']['wz_VORNAME'];?>
 | 26 Jahre</p>
            </div>
            
            <div class="profil-text">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
            </div>
            
            <div class="upload-image">
                <?php echo smarty_function_xr_imgWrapper(array('s_id'=>393,'rmode'=>"cco",'w'=>121,'h'=>132),$_smarty_tpl);?>

            </div>
            
             <div class="upload-image">
                <?php echo smarty_function_xr_imgWrapper(array('s_id'=>392,'rmode'=>"cco",'w'=>121,'h'=>132),$_smarty_tpl);?>

            </div>
            
            <div class="clearfix"></div>
            
            <div class="fakten">
                <h3 class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"Die Wunschliste"),$_smarty_tpl);?>
</h3>
                
                <div class="fakt clearfix">
                    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Zeitraum"),$_smarty_tpl);?>
?</span><span class="info">ab 01.07.2015</span>
                </div>
                <div class="fakt clearfix">
                    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Miete"),$_smarty_tpl);?>
?</span><span class="info">400 €</span>
                </div>
                <div class="fakt clearfix">
                    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Die Mitbewohner"),$_smarty_tpl);?>
</span><span class="info">
                                    <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                                    <span class="icon-mann"><span class="path1"></span><span class="path2"></span></span>
                    </span>
                </div>
                <div class="fakt clearfix">
                    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"WG-Größe"),$_smarty_tpl);?>
?</span><span class="info">1-3 Personen</span>
                </div>
                <div class="fakt clearfix">
                    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Ablöse"),$_smarty_tpl);?>
?</span><span class="info">OK</span>
                </div>
                <div class="fakt clearfix">
                    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Raucher"),$_smarty_tpl);?>
?</span><span class="info">NEIN</span>
                </div>
                <div class="fakt clearfix">
                    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Sprachen"),$_smarty_tpl);?>
?</span><span class="info">Deutsch | Englisch</span>
                </div>
                <div class="fakt clearfix">
                    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Wunschadresse"),$_smarty_tpl);?>
?</span><span class="info">Mustergasse 10 | 1070 Wien</span>
                </div>
                <div class="fakt clearfix">
                    <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Umkreis"),$_smarty_tpl);?>
?</span><span class="info">5 km</span>
                </div>
                
            </div>
            
            
        </div>
    </div>
    
</div>



