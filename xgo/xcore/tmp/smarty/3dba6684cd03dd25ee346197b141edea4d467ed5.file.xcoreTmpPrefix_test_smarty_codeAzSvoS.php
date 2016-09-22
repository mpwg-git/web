<?php /* Smarty version Smarty-3.0.7, created on 2016-05-28 11:22:50
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAzSvoS" */ ?>
<?php /*%%SmartyHeaderCode:10200486795749636ad49ee2-81492914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3dba6684cd03dd25ee346197b141edea4d467ed5' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAzSvoS',
      1 => 1464427370,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10200486795749636ad49ee2-81492914',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::redirectIfLoggedIn"),$_smarty_tpl);?>


<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getInitFragen",'var'=>"fragen"),$_smarty_tpl);?>


<form method="post" id="wg-zimmer-finden">

<div class="register-fragen">
    
    <div class="row">
        <div class="col-xs-12">
            <br />
            <h2><?php echo smarty_function_xr_translate(array('tag'=>'Mein perfektes Zimmer'),$_smarty_tpl);?>
:</h2>
        </div>
        
    </div>
    
    <div class="row">
        <div class="col-xs-3" style="max-width: 110px; padding-top: 8px;">
            <?php echo smarty_function_xr_translate(array('tag'=>'Ort'),$_smarty_tpl);?>
:
        </div>
        <div class="col-xs-7 col-lg-6 col-xl-5">
            <form>
                <?php echo smarty_function_xr_atom(array('a_id'=>898,'addClass'=>"location-start",'return'=>1),$_smarty_tpl);?>

            </form>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-3" style="max-width: 110px; padding-top: 8px;">
            <?php echo smarty_function_xr_translate(array('tag'=>'Miete max'),$_smarty_tpl);?>
:
        </div>
        <div class="col-xs-7 col-lg-6 col-xl-5">
            <input type="text" name="MIETEMAX" id="MIETEMAX" value="" class="form-control" rel="required" />
            <div class="error-div" id="MIETEMAX_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Miete angeben'),$_smarty_tpl);?>
</div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12">
            <br /><br /><br />
            <h2><?php echo smarty_function_xr_translate(array('tag'=>'Mein perfekter Mitbewohner'),$_smarty_tpl);?>
:</h2>
        </div>
    </div>
    
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fragen')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        
        <div class="row">
            <div class="col-xs-12">
                <h4><?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_FRAGE'];?>
</h4>
                <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_id'];?>
" class="hidden-fragen" />
            </div>
        </div>
        
        <?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['v']->value['OPTIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['o']->key;
?>
    
        <div class="row">
            <div class="col-xs-1" style="max-width: 20px;">
                <input type="checkbox" class="checkboxV2" name="frage[<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_id'];?>
]" value="<?php echo $_smarty_tpl->tpl_vars['o']->value['wz_id'];?>
" data-frage="<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_id'];?>
">
            </div>
            <div class="col-xs-9">
                <label for="antwort_<?php echo $_smarty_tpl->tpl_vars['o']->value['wz_id'];?>
" style="text-transform: none;"><?php echo $_smarty_tpl->tpl_vars['o']->value['wz_TEXT'];?>
</label>
            </div>
        </div>
    
        <?php }} ?>
        
        <div class="row">
            <div class="col-xs-1" style="max-width: 20px;"></div>
            <div class="col-xs-9">
                <div class="error-div checkbox-error" id="FRAGE_<?php echo $_smarty_tpl->tpl_vars['v']->value['FRAGE']['wz_id'];?>
_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Auswahl treffen'),$_smarty_tpl);?>
</div>
            </div>
        </div>
    
    <?php }} ?>
    
    <div class="row" style="padding-top: 18px;">
        <div class="col-xs-5"></div>
        <div class="col-xs-5 pull-right">
            
            <div class="form-group">
                <input type='hidden' name='doLogin' value='1' />
                <label for="v2_EMAIL"><span class="small">e</span>Mail</label>
                <input id="v2_EMAIL" type="email" name="v2_EMAIL" class="form-control" />
                <div class="error-div" id="v2_EMAIL_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte gültige E-Mail eingeben'),$_smarty_tpl);?>
</div>
            </div>
            <div class="form-group">
                <label for="v2_PASSWORT"><?php echo smarty_function_xr_translate(array('tag'=>"Passwort?"),$_smarty_tpl);?>
</label>
                <input id="v2_PASSWORT" name="v2_PASSWORT" type="password" class="form-control" />
                <div class="error-div" id="v2_PASSWORT_error"><?php echo smarty_function_xr_translate(array('tag'=>'Bitte Passwort eingeben'),$_smarty_tpl);?>
</div>
                
                <!--<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>25),$_smarty_tpl);?>
" class="forgotpw"><?php echo smarty_function_xr_translate(array('tag'=>"Passwort vergessen?"),$_smarty_tpl);?>
</a>-->
            </div>
        </div>    
    </div>
    
    <div class="row" style="padding-top: 18px;">
        <div class="col-xs-5">
            <button class="button start-button js-fb-login"><?php echo smarty_function_xr_translate(array('tag'=>'Weiter mit Facebook Login'),$_smarty_tpl);?>
</button>
        </div>
        <div class="col-xs-5 pull-right">
            <button class="button start-button js-simple-login"><?php echo smarty_function_xr_translate(array('tag'=>'Ich habe bereits ein Profil'),$_smarty_tpl);?>
</button>
           
        </div>
    </div>
    
</div>

</form>