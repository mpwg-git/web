<?php /* Smarty version Smarty-3.0.7, created on 2015-07-23 16:22:44
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezfZ0se" */ ?>
<?php /*%%SmartyHeaderCode:25760824655b0f8b4e8c568-34968582%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1acf31d2db3a930e76e6c079a1eaf7001c7042c6' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezfZ0se',
      1 => 1437661364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25760824655b0f8b4e8c568-34968582',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="profil-container">
    
    <div class="col-xs-4 profil-links">
        <?php echo smarty_function_xr_atom(array('a_id'=>678,'return'=>1),$_smarty_tpl);?>

    </div>
    
    <div class="col-xs-8 default-container-paddingtop">
        
        <div class="profil">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>161,'w'=>197,'h'=>197,'rmode'=>"cco",'class'=>"profileimage"),$_smarty_tpl);?>

            <div class="matchinginfos">
                <span class="drducksays"><span class="icon-duck"></span> <?php echo smarty_function_xr_translate(array('tag'=>"Dr. Duck Says:"),$_smarty_tpl);?>
</span>
                
                <span class="prozent">85</span>
                <span class="match">match</span>
            </div>
            
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



