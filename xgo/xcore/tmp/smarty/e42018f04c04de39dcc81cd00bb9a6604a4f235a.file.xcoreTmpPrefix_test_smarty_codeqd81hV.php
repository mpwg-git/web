<?php /* Smarty version Smarty-3.0.7, created on 2015-06-30 11:23:03
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeqd81hV" */ ?>
<?php /*%%SmartyHeaderCode:212877774255925ff7c79965-91085634%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e42018f04c04de39dcc81cd00bb9a6604a4f235a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeqd81hV',
      1 => 1435656183,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212877774255925ff7c79965-91085634',
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
            
            <div id="slider-range"></div>
            <label for="amount">Price range:</label>
            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
            
            <input class="form-control" name="cost" id="cost"/>
        </div>
        <div class="form-group">
            <label for="location"><?php echo smarty_function_xr_translate(array('tag'=>"Wo?"),$_smarty_tpl);?>
</label>
            <input class="form-control" name="location" id="location"/>
            <span class="icon-Map"><span class="path1"></span><span class="path2"></span></span>
        </div>
        <div class="form-group">
            <label for="umkreis"><?php echo smarty_function_xr_translate(array('tag'=>"Umkreis?"),$_smarty_tpl);?>
</label>
            <input class="form-control" name="umkreis" id="umkreis"/>
        </div>
    </form>
</div>
