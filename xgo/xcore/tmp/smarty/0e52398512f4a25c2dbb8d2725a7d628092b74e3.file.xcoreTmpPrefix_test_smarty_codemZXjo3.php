<?php /* Smarty version Smarty-3.0.7, created on 2015-06-29 15:20:20
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemZXjo3" */ ?>
<?php /*%%SmartyHeaderCode:19929704365591461472f3e0-41201426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e52398512f4a25c2dbb8d2725a7d628092b74e3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemZXjo3',
      1 => 1435584020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19929704365591461472f3e0-41201426',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><div class="searchform">
    <h1><?php echo smarty_function_xr_translate(array('tag'=>"Suche"),$_smarty_tpl);?>
</h1>
    <form>
        <div class="form-group">
            <input class="form-control" name="search" />
            <span class="icon-Lupe"></span>
        </div>
        <div class="form-group">
            <label for="date"><?php echo smarty_function_xr_translate(array('tag'=>"Wann?"),$_smarty_tpl);?>
</label>
            <input class="form-control" name="date" id="date"/>
        </div>
        <div class="form-group">
            <label for="cost"><?php echo smarty_function_xr_translate(array('tag'=>"Wieviel?"),$_smarty_tpl);?>
</label>
            <input class="form-control" name="cost" id="cost"/>
        </div>
        <div class="form-group">
            <label for="location"><?php echo smarty_function_xr_translate(array('tag'=>"Wo?"),$_smarty_tpl);?>
</label>
            <input class="form-control" name="location" id="location"/>
        </div>
        <div class="form-group">
            <label for="umkreis"><?php echo smarty_function_xr_translate(array('tag'=>"Umkreis?"),$_smarty_tpl);?>
</label>
            <input class="form-control" name="umkreis" id="umkreis"/>
        </div>
    </form>
</div>
