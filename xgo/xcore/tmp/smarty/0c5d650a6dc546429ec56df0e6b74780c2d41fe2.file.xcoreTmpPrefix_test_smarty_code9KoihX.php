<?php /* Smarty version Smarty-3.0.7, created on 2015-10-12 20:19:00
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code9KoihX" */ ?>
<?php /*%%SmartyHeaderCode:1510066247561bf9942bc2c6-17599864%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c5d650a6dc546429ec56df0e6b74780c2d41fe2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code9KoihX',
      1 => 1444673940,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1510066247561bf9942bc2c6-17599864',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?>


<h2>Benutzer einladen</h2>

<form class="form-room-einladen form-default-form" id="form-room-einladen">
   
   
   <div class="form-group">
        <label><?php echo smarty_function_xr_translate(array('tag'=>"Betreff?"),$_smarty_tpl);?>
*</label>
        <div class="column-input v-center">
            <input class="form-control" name="subject" value="<?php echo smarty_function_xr_translate(array('tag'=>"###DEFAULT_INVITE_SUBJECT###"),$_smarty_tpl);?>
" id="subject" rel="required" />
        </div>
        <div class="error-div" id="subject_error">
            <?php echo smarty_function_xr_translate(array('tag'=>"Bitte Betreff angeben"),$_smarty_tpl);?>

        </div>
    </div>
    
    <div class="form-group">
        <label for="text"><?php echo smarty_function_xr_translate(array('tag'=>"Beschreibung"),$_smarty_tpl);?>
</label>
        <textarea id="text" name="text" class="form-control" placeholder=""><?php echo smarty_function_xr_translate(array('tag'=>"###DEFAULT_INVITE_TEXT###"),$_smarty_tpl);?>
</textarea>
        <div class="error-div" id="text_error">
            <?php echo smarty_function_xr_translate(array('tag'=>"Bitte Nachricht angeben"),$_smarty_tpl);?>

        </div>
    </div>
    
    <div class="submitbutton-container">
        <button id="form-room-einladen-save">senden</button>
    </div>
   
</form>