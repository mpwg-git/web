<?php /* Smarty version Smarty-3.0.7, created on 2015-07-28 09:48:42
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0li1d1" */ ?>
<?php /*%%SmartyHeaderCode:197405475655b733dab99610-63073003%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7d862f3f1a00d909b921f0a557e1706e31a5767' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0li1d1',
      1 => 1438069722,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197405475655b733dab99610-63073003',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
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
        <h3 class="name">Jasmin</h3>
        <p class="subinfo">Mustermann | 26 Jahre</p>
    </div>
    
    <div class="matchinginfo-satz">
        Ihr teilt nicht alle Ansichten aber Wesentliches passt.
    </div>
    
    <div class="button-container-favblock clearfix">
        <div class="inner clearfix">
            <div class="item">
                <span class="icon icon-Favourite_inaktiv"></span>
            </div>
            <div class="item">
                <span class="icon icon-Blocked_inaktiv"></span>
            </div>
            <div class="item">
                <span class="icon icon-Chat_Profil">
    			    <span class="path1"></span><span class="path2"></span><span class="path3"><span class="path4"></span>
    		    </span>
            </div>
            <div class="item">
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>19),$_smarty_tpl);?>
">
                    <span class="icon icon-Map_Profil"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
                </a>
            </div>
        </div>
    </div>

    <div class="wg-img-wrapper">
        <h3 class="headline">Die WG</h3>
        <div class="image-slider">
            <div class="item">
                <?php echo smarty_function_xr_imgWrapper(array('s_id'=>179,'w'=>600,'h'=>300,'rmode'=>"cco",'class'=>"image"),$_smarty_tpl);?>

            </div>
        </div>
        <div class="info-icon-container freetext-toggle"><span class="icon-Info"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span></div>
    </div>
    
    <div class="freetext-container">
        <div class="freetext">
           <span class="icon-Close closer-freetext"></span>
            <p class="headline">
                <strong>FREETEXT</strong>
            </p>
            <p>
                Tem rem re lantiae pro explabo reptur acculpa rchillorum soluptas dolupis im facepe doluptius.
                Ur, officte mporro quis alis alibus, quiam, seditatiossi si que sitem qui veliquatem ipsunto quost quo ommo 
            </p>
        </div>
    </div>
    
    <div class="mitbewohner">
        <h3 class="headline"><?php echo smarty_function_xr_translate(array('tag'=>"Die Mitbewohner"),$_smarty_tpl);?>
</h3>
        <span class="icon-frau"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span>
        <span class="icon-mann"><span class="path1"></span><span class="path2"></span></span>
    </div>
    
    <div class="fakten clearfix">
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
    
</div>