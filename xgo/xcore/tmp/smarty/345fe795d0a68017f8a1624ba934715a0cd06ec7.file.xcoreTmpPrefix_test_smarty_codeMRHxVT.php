<?php /* Smarty version Smarty-3.0.7, created on 2015-11-24 10:15:53
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMRHxVT" */ ?>
<?php /*%%SmartyHeaderCode:135769331256542ac9959727-05579715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '345fe795d0a68017f8a1624ba934715a0cd06ec7' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMRHxVT',
      1 => 1448356553,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135769331256542ac9959727-05579715',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><div class="worumgehts">
    <h2><?php echo smarty_function_xr_translate(array('tag'=>"Worum geht's?"),$_smarty_tpl);?>
</h2>
    <h3><?php echo smarty_function_xr_translate(array('tag'=>"Suchen. Matchen. Wohnen."),$_smarty_tpl);?>
</h3>
    
    <p class="text"><?php echo $_smarty_tpl->getVariable('TEXTBLOCK_1')->value;?>

    </p>
    
    <div class="icon-pfeil-container">
        <span class="icon-pfeil"></span>    
    </div>
    <br>
    
    <p class="text"><?php echo $_smarty_tpl->getVariable('TEXTBLOCK_2')->value;?>

    </p>



    <h2><?php echo smarty_function_xr_translate(array('tag'=>"So geht‘s!"),$_smarty_tpl);?>
</h2>
    <div class="row">
        <div class="col-xs-4 plan active">
            
            <div class="info">
                <h4>1. <?php echo smarty_function_xr_translate(array('tag'=>"Gratis registrieren:"),$_smarty_tpl);?>
</h4>
                <h5></h5>
                <div class="desc">
                    <?php echo smarty_function_xr_translate(array('tag'=>"Profil mit Erwartungen ausfüllen & Matchingfragen beantworten."),$_smarty_tpl);?>

                    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>5),$_smarty_tpl);?>
" class="button"><?php echo smarty_function_xr_translate(array('tag'=>"Registrieren"),$_smarty_tpl);?>
</a>
                </div>
            </div>
        </div>
        
        <div class="col-xs-4 plan active">
         
            <div class="info">
                <h4>2. <?php echo smarty_function_xr_translate(array('tag'=>"Finden"),$_smarty_tpl);?>
</h4>
                <h5></h5>
                <div class="desc">
                    <?php echo smarty_function_xr_translate(array('tag'=>"Liste an potentiellen Kandidaten sehen mit jeweiligem Matchingergebnis."),$_smarty_tpl);?>

                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
        
        <div class="col-xs-4 plan active">
            
            <div class="info">
                <h4>3. <?php echo smarty_function_xr_translate(array('tag'=>"Wohnen"),$_smarty_tpl);?>
</h4>
                <h5></h5>
                <div class="desc">
                    <?php echo smarty_function_xr_translate(array('tag'=>"---mit Mitbewohnern die wirklich zu dir passen."),$_smarty_tpl);?>

                    
                </div>
            </div>
        </div>
    </div>
</div>