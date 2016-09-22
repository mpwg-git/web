<?php /* Smarty version Smarty-3.0.7, created on 2015-10-12 20:27:51
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codes6C7AU" */ ?>
<?php /*%%SmartyHeaderCode:358324952561bfba7ad0245-79660512%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c1f75bc97f12f57788a38877ec58544883d1da2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codes6C7AU',
      1 => 1444674471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '358324952561bfba7ad0245-79660512',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><div class="meinprofil-container">
    <div class="col-xs-12 default-container-paddingtop">

        <h2>Benutzer einladen</h2>
        
        <form class="form-raum-einladen form-default-form" id="form-raum-einladen">
           
           
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
                <label><?php echo smarty_function_xr_translate(array('tag'=>"Email?"),$_smarty_tpl);?>
*</label>
                <div class="column-input v-center">
                    <input class="form-control" name="email" id="email" rel="required" />
                </div>
                <div class="error-div" id="email_error">
                    <?php echo smarty_function_xr_translate(array('tag'=>"Bitte Email angeben"),$_smarty_tpl);?>

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
            
            <?php echo smarty_function_xr_print_r(array('val'=>$_REQUEST),$_smarty_tpl);?>

            
            <input type="hidden" name="roomid" id="roomid" value="" />
            
            <div class="submitbutton-container">
                <button id="form-raum-einladen-save">senden</button>
            </div>
           
        </form>
        
    </div>
</div>