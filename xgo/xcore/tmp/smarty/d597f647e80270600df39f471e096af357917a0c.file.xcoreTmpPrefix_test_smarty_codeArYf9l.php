<?php /* Smarty version Smarty-3.0.7, created on 2017-02-28 15:27:31
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeArYf9l" */ ?>
<?php /*%%SmartyHeaderCode:39892028558b588d38df3c2-16788783%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd597f647e80270600df39f471e096af357917a0c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeArYf9l',
      1 => 1488292051,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39892028558b588d38df3c2-16788783',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_fragebogen::sc_getInitFragen",'var'=>"fragen"),$_smarty_tpl);?>


<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('fragen')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    <div class="fragen-container">
        <div class="row no-gutter">
            <div class="col-xs-12">
                <h4 class="frage-headline">1. Sauberkeitslevel</h4>
                <hr>
            </div>
            <div class="col-xs-12 antwort-value">
                <div class="radio radio-inline">
                    <label for="frage_1"><input type="radio" name="frage_1"></label>
                    <label for="frage_1"><input type="radio" name="frage_1"></label>
                    <label for="frage_1"><input type="radio" name="frage_1"></label>
                    <label for="frage_1"><input type="radio" name="frage_1"></label>
                    <label for="frage_1"><input type="radio" name="frage_1"></label>
                </div>
            </div>
        </div>
        <div class="row no-gutter">
            <div class="col-xs-5 text-right antwort-left">
                <h5 class="antwort-headline">Schmutzfink</h5>
                <p>Geschirr stapelt sich, Staub sammel sich</p>
            </div>
            <div class="col-xs-2 text-center"></div>
            <div class="col-xs-5 text-left antwort-right">
                <h5 class="antwort-headline">Sauberkeits-<br>fanatiker</h5>
                <p>Mr. Propper war da, kein Staubkorn in Sicht</p>
            </div>
            <!--<div class="hidden-lg hidden-md col-sm-1 col-xs-1"></div>-->
        </div>
        <div class="col-xs-12" style="text-align: center;">
            <input type="checkbox" data-toggle="toggle" data-on="SUPER WICHTIG" data-off="WENIG WICHTIG">
        </div>
    </div>
<?php }} ?>


<!--
<div class="fragen-container">
    <div class="row no-gutter">
        <div class="col-xs-12">
            <h4 class="frage-headline">1. Sauberkeitslevel</h4>
            <hr>
        </div>
        <div class="col-xs-12 antwort-value">
            <div class="radio radio-inline">
                <label for="frage_1"><input type="radio" name="frage_1"></label>
                <label for="frage_1"><input type="radio" name="frage_1"></label>
                <label for="frage_1"><input type="radio" name="frage_1"></label>
                <label for="frage_1"><input type="radio" name="frage_1"></label>
                <label for="frage_1"><input type="radio" name="frage_1"></label>
            </div>
        </div>
    </div>
    <div class="row no-gutter">
        <div class="col-xs-5 text-right antwort-left">
            <h5 class="antwort-headline">Schmutzfink</h5>
            <p>Geschirr stapelt sich, Staub sammel sich</p>
        </div>
        <div class="col-xs-2 text-center"></div>
        <div class="col-xs-5 text-left antwort-right">
            <h5 class="antwort-headline">Sauberkeits-<br>fanatiker</h5>
            <p>Mr. Propper war da, kein Staubkorn in Sicht</p>
        </div>
        <!--<div class="hidden-lg hidden-md col-sm-1 col-xs-1"></div>-->
    </div>
    <div class="col-xs-12" style="text-align: center;">
        <input type="checkbox" data-toggle="toggle" data-on="SUPER WICHTIG" data-off="WENIG WICHTIG">
    </div>
</div>



<div class="fragen-container">
    <div class="row no-gutter">
        <div class="col-xs-12">
            <h4 class="frage-headline">1. Sauberkeitslevel</h4>
            <hr>
        </div>
        <div class="col-xs-12 antwort-value">
            <div class="radio radio-inline">
                <label for="frage_1"><input type="radio" name="frage_1"></label>
                <label for="frage_1"><input type="radio" name="frage_1"></label>
                <label for="frage_1"><input type="radio" name="frage_1"></label>
                <label for="frage_1"><input type="radio" name="frage_1"></label>
                <label for="frage_1"><input type="radio" name="frage_1"></label>
            </div>
        </div>
    </div>
    <div class="row no-gutter">
        <div class="col-xs-5 text-right antwort-left">
            <h5 class="antwort-headline">Schmutzfink</h5>
            <p>Geschirr stapelt sich, Staub sammel sich</p>
        </div>
        <div class="col-xs-2 text-center"></div>
        <div class="col-xs-5 text-left antwort-right">
            <h5 class="antwort-headline">Sauberkeits-<br>fanatiker</h5>
            <p>Mr. Propper war da, kein Staubkorn in Sicht</p>
        </div>
        <!--<div class="hidden-lg hidden-md col-sm-1 col-xs-1"></div>-->
    </div>
    <div class="col-xs-12" style="text-align: center;">
        <input type="checkbox" data-toggle="toggle" data-on="SUPER WICHTIG" data-off="WENIG WICHTIG">
    </div>
</div>
-->