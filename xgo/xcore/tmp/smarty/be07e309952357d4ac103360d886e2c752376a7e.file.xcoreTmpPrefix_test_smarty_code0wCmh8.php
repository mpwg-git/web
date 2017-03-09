<?php /* Smarty version Smarty-3.0.7, created on 2017-02-23 10:34:55
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0wCmh8" */ ?>
<?php /*%%SmartyHeaderCode:141996176058aeacbf56a685-97964281%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be07e309952357d4ac103360d886e2c752376a7e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0wCmh8',
      1 => 1487842495,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141996176058aeacbf56a685-97964281',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div id="main-content">
    <form method="post" id="wg-zimmer-finden">
        <div class="register-fragen">
            <!--<div class="row no-gutter">-->
                    <div class="col-md-3">
                        <div class="register-wunsch-wg">
                            <h3><?php echo smarty_function_xr_translate(array('tag'=>'reg_suche-h3-wunschWG'),$_smarty_tpl);?>
</h3>
                        
                            <h5><?php echo smarty_function_xr_translate(array('tag'=>'reg_suche-h5-ort'),$_smarty_tpl);?>
</h5>
                            <div class="input-icon search-input search-input-map">
                                <input type="text" class="form-control autocomplete-location-v2" id="ADRESSE" rel="required" name="ADRESSE" value="" placeholder="Stadt, Ort, PLZ?" autocomplete="off">
                                <span class="icon-Map js-autocomplete-duck">
                    	            <span class="path1"></span><span class="path2"></span>
                    	        </span>
                            </div>
                	        <div class="location-hidden-container">
                    	        <input type="hidden" name="ADRESSE_STRASSE" class="location-strasse route" value="">
                            	<input type="hidden" name="ADRESSE_STRASSE_NR" class="location-strasse-nr street_number" value="">
                            	<input type="hidden" name="ADRESSE_PLZ" class="location-plz postal_code" value="">
                            	<input type="hidden" name="ADRESSE_STADT" class="location-stadt locality" value="Wien">
                            	<input type="hidden" name="ADRESSE_LAND" class="location-land country" value="AT">
                            	<input type="hidden" name="ADRESSE_LAT" class="location-lat" value="">
                            	<input type="hidden" name="ADRESSE_LNG" class="location-lng" value="">
                            	<input type="hidden" class="administrative_area_level_1">
                    	    </div>
                            <div class="error-div" id="ADRESSE_error">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" style="display: none;"></span>
                                <span class="error-message">Bitte Adresse angeben</span>
                            </div>
                        
                            <h5><?php echo smarty_function_xr_translate(array('tag'=>'reg_suche-h5-miete'),$_smarty_tpl);?>
</h5>
                            <input type="text" name="MIETEMAX" id="MIETEMAX" value="" placeholder="€?" class="form-control" rel="required">
                            <div class="error-div" id="MIETEMAX_error">Bitte Miete angeben</div>
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="col-md-6">
                        <div class="register-fragebogen">
                            <h3><?php echo smarty_function_xr_translate(array('tag'=>'reg_suche-h3-fragebogen'),$_smarty_tpl);?>
</h3>
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="col-md-3">         
                        <div class="register-konto">
                            <h3><?php echo smarty_function_xr_translate(array('tag'=>'reg_suche-h3-konto'),$_smarty_tpl);?>
</h3>
                            <h6 class="mpwg-color text-uppercase">Dann melde dich hier an!</h6>
                            <button class="button text-uppercase" id="fb-login-submit">Mit Facebook anmelden</button>
                            <br>
                            <br>
                            <button class="button text-uppercase" id="form-login-submit">Anmelden</button>
                            <br>
                            <hr>
                            <br>
                            <h3><?php echo smarty_function_xr_translate(array('tag'=>'reg_suche-h3-keinKonto'),$_smarty_tpl);?>
</h3>
                            <h6 class="mpwg-color text-uppercase">Dann registriere dich gleich hier!</h6>
                        </div>
                    </div>
        </div>
    </form>
</div>