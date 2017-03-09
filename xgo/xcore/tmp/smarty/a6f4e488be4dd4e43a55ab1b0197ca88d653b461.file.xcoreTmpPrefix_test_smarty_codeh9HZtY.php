<?php /* Smarty version Smarty-3.0.7, created on 2017-02-22 23:50:32
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeh9HZtY" */ ?>
<?php /*%%SmartyHeaderCode:102215662758ae15b8796cf2-97013147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6f4e488be4dd4e43a55ab1b0197ca88d653b461' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeh9HZtY',
      1 => 1487803832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102215662758ae15b8796cf2-97013147',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div id="main-content">
    <form method="post" id="wg-zimmer-finden">
    <div class="register-fragen">
    <div class="row">
        <div class="col-md-3">
            <h3><?php echo smarty_function_xr_translate(array('tag'=>'reg_suche-h3-wunschWG'),$_smarty_tpl);?>
</h3>
            <h5><?php echo smarty_function_xr_translate(array('tag'=>'reg_suche-h5-ort'),$_smarty_tpl);?>
</h5>
            <h5><?php echo smarty_function_xr_translate(array('tag'=>'reg_suche-h5-miete'),$_smarty_tpl);?>
</h5>
            <input type="text" name="MIETEMAX" id="MIETEMAX" value="" placeholder="€?" class="form-control" rel="required">
            <div class="error-div" id="MIETEMAX_error">Bitte Miete angeben</div>
        </div>
        <div class="col-md-6">
            <h3><?php echo smarty_function_xr_translate(array('tag'=>'reg_suche-h3-fragebogen'),$_smarty_tpl);?>
</h3>
        </div>
        <div class="col-md-3">         
            <h3><?php echo smarty_function_xr_translate(array('tag'=>'reg_suche-h3-konto'),$_smarty_tpl);?>
</h3>
            <br>
            <h3><?php echo smarty_function_xr_translate(array('tag'=>'reg_suche-h3-keinKonto'),$_smarty_tpl);?>
</h3>
        </div>
    </div>
</div>