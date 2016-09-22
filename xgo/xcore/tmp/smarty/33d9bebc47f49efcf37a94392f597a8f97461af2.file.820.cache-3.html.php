<?php /* Smarty version Smarty-3.0.7, created on 2015-11-18 18:02:58
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/820.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:901481321564caf42a95d66-00902684%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33d9bebc47f49efcf37a94392f597a8f97461af2' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/820.cache-3.html',
      1 => 1447866178,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '901481321564caf42a95d66-00902684',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn",'var'=>"loggedin"),$_smarty_tpl);?>


<div class="meinprofil-container">
    <div class="col-xs-12 default-container-paddingtop">

        <h2>Benutzer einladen</h2>
        
        
        <p class="meinraum-text default-beschreibung">
            <?php echo smarty_function_xr_translate(array('tag'=>"Hier kannst du Benutzer in deine WG einladen - egal ob sie schon auf WSF registriert sind, oder noch nicht."),$_smarty_tpl);?>

        </p>
        
        <form class="form-raum-einladen form-default-form" id="form-raum-einladen">
           
           <input type="hidden" name="id" value="<?php echo $_REQUEST['roomId'];?>
" />
           
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
                <textarea id="text" name="text" class="form-control" rows=4 placeholder=""><?php echo smarty_function_xr_translate(array('tag'=>"###DEFAULT_INVITE_TEXT###"),$_smarty_tpl);?>
</textarea>
                <div class="error-div" id="text_error">
                    <?php echo smarty_function_xr_translate(array('tag'=>"Bitte Nachricht angeben"),$_smarty_tpl);?>

                </div>
            </div>
            
            <div class="submitbutton-container">
                <button id="form-raum-einladen-save">senden</button>
            </div>
           
           <div class="js-success-notification default-beschreibung">
               Benutzer erfolgreich eingeladen!
           </div> 
           
        </form>
        
    </div>
</div>