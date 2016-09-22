<?php /* Smarty version Smarty-3.0.7, created on 2015-07-26 22:51:40
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewRrhKy" */ ?>
<?php /*%%SmartyHeaderCode:161041581755b5485cb34040-36371732%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6e9bd32d024e0c0306471fc2319de9b4e00ffbd' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewRrhKy',
      1 => 1437943900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161041581755b5485cb34040-36371732',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="profil">
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
    
    
    <div class="fakten clearfix">
        <h3 class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"Die Wunschliste"),$_smarty_tpl);?>
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
        <div class="fakt clearfix">
            <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Ablöse"),$_smarty_tpl);?>
</span><span class="info">NEIN</span>
        </div>
        <div class="fakt clearfix">
            <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Raucher"),$_smarty_tpl);?>
</span><span class="info">NEIN</span>
        </div>
        <div class="fakt clearfix">
            <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Sprachen"),$_smarty_tpl);?>
</span><span class="info">Deutsch | Englisch</span>
        </div>
        <div class="fakt clearfix">
            <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Adresse"),$_smarty_tpl);?>
</span><span class="info">Deutsch | Englisch</span>
        </div>
        <div class="fakt clearfix">
            <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Entfernung"),$_smarty_tpl);?>
</span><span class="info">10 KM</span>
        </div>
        
    </div>
    <div class="icons">
        <span class="icon-Favourite_inaktiv"></span>
        
    </div>
    
</div>