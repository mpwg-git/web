<?php /* Smarty version Smarty-3.0.7, created on 2015-10-12 20:12:01
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZLiav1" */ ?>
<?php /*%%SmartyHeaderCode:615289919561bf7f1cc6df5-48764965%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bbf50a013c4cfc053cafc94e6d40de471cf24415' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZLiav1',
      1 => 1444673521,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '615289919561bf7f1cc6df5-48764965',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><h2>Benutzer einladen</h2>

<form class="form-room-einladen" id="form-room-einladen">
   
   
   <div class="form-group">
        <label><?php echo smarty_function_xr_translate(array('tag'=>"Betreff?"),$_smarty_tpl);?>
*</label>
        <div class="column-input v-center">
            <input class="form-control" name="subject" value="<?php echo smarty_function_xr_translate(array('tag'=>"###DEFAULT_INVITE_SUBJECT###"),$_smarty_tpl);?>
" id="subject" rel="required" />
        </div>
        <div class="error-div" id="ZEITRAUM_VON_error">
            <?php echo smarty_function_xr_translate(array('tag'=>"Bitte Betreff angeben"),$_smarty_tpl);?>

        </div>
    </div>
    
    
    
   
   
    <div class="submitbutton-container">
        <button id="form-room-einladen-save">senden</button>
    </div>
   
</form>