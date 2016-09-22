<?php /* Smarty version Smarty-3.0.7, created on 2016-04-30 19:22:34
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOPMC6L" */ ?>
<?php /*%%SmartyHeaderCode:4854915815724e9dacb8759-28145855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04830fa9d7ac32c874e5dd10ef38e026b4b3df59' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOPMC6L',
      1 => 1462036954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4854915815724e9dacb8759-28145855',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="container">
    
    <div class="row">
        <div class="col-xs-12">
            <br />
            <h2><?php echo smarty_function_xr_translate(array('tag'=>'Mein perfektes Zimmer'),$_smarty_tpl);?>
:</h2>
        </div>
        
    </div>
    
    <div class="row">
        <div class="col-xs-2" style="max-width: 110px;">
            <?php echo smarty_function_xr_translate(array('tag'=>'Ort'),$_smarty_tpl);?>
:
        </div>
        <div class="col-xs-5">
            <form>
                <?php echo smarty_function_xr_atom(array('a_id'=>764,'addClass'=>"location-start",'return'=>1),$_smarty_tpl);?>

            </form>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-2" style="max-width: 110px;">
            <?php echo smarty_function_xr_translate(array('tag'=>'Miete max'),$_smarty_tpl);?>
:
        </div>
        <div class="col-xs-5">
            <input type="text" name="mietemax" id="mietemax" value="" class="form-control" />
        </div>
    </div>
    
</div>