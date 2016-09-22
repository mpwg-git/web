<?php /* Smarty version Smarty-3.0.7, created on 2015-08-20 12:49:24
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeubBq4f" */ ?>
<?php /*%%SmartyHeaderCode:29166814455d5b0b48235c8-70846181%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b8221755e20c3dfb3ac3f2cfe7b2c15b73010fe' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeubBq4f',
      1 => 1440067764,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29166814455d5b0b48235c8-70846181',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="searchform">
    <h1><?php echo smarty_function_xr_translate(array('tag'=>"Suche"),$_smarty_tpl);?>
</h1>
    <form>
        
        <div class="form-group">
            <label for="date"><?php echo smarty_function_xr_translate(array('tag'=>"Wann?"),$_smarty_tpl);?>
</label>
            <div class="input-icon hasDatePicker">
                <input class="form-control search-date datepicker" name="search-date" placeholder="<?php echo smarty_function_xr_translate(array('tag'=>'ab'),$_smarty_tpl);?>
"/>
                <span class="add-on"><i class="icon-calendar"></i></span>
    		</div>
        </div>
       
       
       <?php echo smarty_function_xr_atom(array('a_id'=>780,'return'=>1,'desc'=>'slider preis'),$_smarty_tpl);?>

       
       <?php echo smarty_function_xr_atom(array('a_id'=>778,'return'=>1),$_smarty_tpl);?>

       
    </form>
</div>
