<?php /* Smarty version Smarty-3.0.7, created on 2015-07-02 12:40:16
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVUBzMD" */ ?>
<?php /*%%SmartyHeaderCode:1675660715595151091a3a1-94198714%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8de615478f720ff8416984ea62326b8fed9d1e3' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVUBzMD',
      1 => 1435833616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1675660715595151091a3a1-94198714',
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
                <p class="name"></p>
                <p class="tease-text"></p>
            </div>
            <div class="controls-wrapper">
                <p class="timestamp"></p>
                <div class="close"></div>
            </div>
        </div>
        
    </div>
    
</div>
