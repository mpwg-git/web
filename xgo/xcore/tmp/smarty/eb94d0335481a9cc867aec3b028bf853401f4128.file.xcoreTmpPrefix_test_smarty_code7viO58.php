<?php /* Smarty version Smarty-3.0.7, created on 2015-08-01 15:03:00
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7viO58" */ ?>
<?php /*%%SmartyHeaderCode:45333546855bcc3849965d0-42726291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb94d0335481a9cc867aec3b028bf853401f4128' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7viO58',
      1 => 1438434180,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45333546855bcc3849965d0-42726291',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
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
        <div class="image-slider rsDefault">
            <div class="item">
                <?php echo smarty_function_xr_imgWrapper(array('s_id'=>179,'w'=>600,'h'=>300,'rmode'=>"cco",'class'=>"image rsImg"),$_smarty_tpl);?>

            </div>
            <div class="item">
                <?php echo smarty_function_xr_imgWrapper(array('s_id'=>179,'w'=>600,'h'=>300,'rmode'=>"cco",'class'=>"image rsImg"),$_smarty_tpl);?>

            </div>
            <div class="item">
                <?php echo smarty_function_xr_imgWrapper(array('s_id'=>179,'w'=>600,'h'=>300,'rmode'=>"cco",'class'=>"image rsImg"),$_smarty_tpl);?>

            </div>
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
    
     <!-- Button Container -->
    <?php echo smarty_function_xr_atom(array('a_id'=>702,'return'=>1),$_smarty_tpl);?>

    
</div>