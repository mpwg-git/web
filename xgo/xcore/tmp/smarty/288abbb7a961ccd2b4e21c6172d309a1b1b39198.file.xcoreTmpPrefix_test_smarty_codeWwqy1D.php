<?php /* Smarty version Smarty-3.0.7, created on 2015-07-23 17:30:15
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeWwqy1D" */ ?>
<?php /*%%SmartyHeaderCode:176405664855b10887811912-55633553%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '288abbb7a961ccd2b4e21c6172d309a1b1b39198' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeWwqy1D',
      1 => 1437665415,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176405664855b10887811912-55633553',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="profil">
    
    <div class="col-xs-4 profil-links">
        <?php echo smarty_function_xr_atom(array('a_id'=>682,'return'=>1),$_smarty_tpl);?>

    </div>
    
    <div class="col-xs-8 default-container-paddingtop">
        
        <div class="profil">
            
            <div class="clearfix"></div>
            
            <div class="maininfo">
                <h3 class="name">Name</h3>
                <p class="subinfo">Nachname | 26 Jahre</p>
            </div>
            
            <div class="wg-img-wrapper">
                <h3 class="headline">Die WG</h3>
                <div class="image-slider">
                    <div class="item">
                        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>179,'w'=>600,'h'=>300,'rmode'=>"cco",'class'=>"image"),$_smarty_tpl);?>

                    </div>
                </div>
            </div>
            
            <div class="mitbewohner">
                <h3 class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"Die Mitbewohner"),$_smarty_tpl);?>
</h3>
                <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
                <span class="icon-mann"><span class="path1"></span><span class="path2"></span></span>
            </div>
            
            <div class="fakten">
                <h3 class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"Die Fakten"),$_smarty_tpl);?>
</h3>
                
                <div class="fakt clearfix">
                    <span class="aufzaehlung">Zeitraum:</span><span class="info">ab 01.07.2015</span>
                </div>
                <div class="fakt clearfix">
                    <span class="aufzaehlung">Miete</span><span class="info">400 €</span>
                </div>
                <div class="fakt clearfix">
                    <span class="aufzaehlung">Zimmergrösse</span><span class="info">123</span>
                </div>
                <div class="fakt clearfix">
                    <span class="aufzaehlung">test</span><span class="info">123</span>
                </div>
                
            </div>
            <div class="icons">
                <span class="icon-Favourite_inaktiv"></span>
                
            </div>
            
        </div>
    </div>
    
</div>



