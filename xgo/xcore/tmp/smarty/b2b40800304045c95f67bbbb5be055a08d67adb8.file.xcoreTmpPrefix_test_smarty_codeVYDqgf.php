<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 16:04:30
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVYDqgf" */ ?>
<?php /*%%SmartyHeaderCode:95736034955d5de6e129379-22623773%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2b40800304045c95f67bbbb5be055a08d67adb8' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVYDqgf',
      1 => 1440079470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95736034955d5de6e129379-22623773',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="profil">
    
    <?php echo smarty_function_xr_atom(array('a_id'=>789,'return'=>1,'desc'=>"profil main image"),$_smarty_tpl);?>

    
    <?php echo smarty_function_xr_atom(array('a_id'=>790,'return'=>1,'desc'=>"matching infos"),$_smarty_tpl);?>

    
    <div class="profil-images-container">
        <div class="upload-image">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>393,'rmode'=>"cco",'w'=>121,'h'=>132),$_smarty_tpl);?>

        </div>
        
        <div class="upload-image">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>392,'rmode'=>"cco",'w'=>121,'h'=>132),$_smarty_tpl);?>

        </div>
        
        <div class="upload-image">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>392,'rmode'=>"cco",'w'=>121,'h'=>132),$_smarty_tpl);?>

        </div>
        
        <div class="clearfix"></div>    
    </div>
    
    <div class="maininfo">
        <span class="looklikeh1">Name</h3>
        <p class="subinfo">Nachname | 26 Jahre</p>
    </div>
    
    <div class="profil-text">
        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
    </div>
    
   <div class="fakten clearfix">
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
            <span class="aufzaehlung"><?php echo smarty_function_xr_translate(array('tag'=>"Mitbewohner"),$_smarty_tpl);?>
?</span><span class="info">Egal</span>
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
    <!-- Button Container -->
    <?php echo smarty_function_xr_atom(array('a_id'=>702,'return'=>1),$_smarty_tpl);?>

    
</div>