<?php /* Smarty version Smarty-3.0.7, created on 2015-07-02 12:40:58
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelYVIjf" */ ?>
<?php /*%%SmartyHeaderCode:8811126005595153a6f6db4-15351361%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd39c07f3c8e1d3ff368866599d1fce9fdb079053' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelYVIjf',
      1 => 1435833658,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8811126005595153a6f6db4-15351361',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><div class="searchform">
    <h1><?php echo smarty_function_xr_translate(array('tag'=>"Chat"),$_smarty_tpl);?>
</h1>
    <form>
        <div class="form-group">
            <label for="date"><?php echo smarty_function_xr_translate(array('tag'=>"Personen Suchen"),$_smarty_tpl);?>
</label>
            <input class="form-control" name="date" id="date"/>
        </div>
    </form>
    
    <div class="contacts-wrapper">
        <div class="contact">
            <div class="image-wrapper">
                <?php echo smarty_function_xr_imgWrapper(array('s_id'=>139,'h'=>140,'w'=>130,'class'=>"image"),$_smarty_tpl);?>

            </div>
            <div class="teaser-wrapper">
                <p class="name">Max Mustermann</p>
                <p class="tease-text">der text is mega</p>
            </div>
            <div class="controls-wrapper">
                <p class="timestamp">12.05.</p>
                <div class="close">
                    <span class="icon-Close"></span>
                </div>
            </div>
        </div>
        
    </div>
    
</div>
