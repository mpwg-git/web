<?php /* Smarty version Smarty-3.0.7, created on 2015-08-26 20:35:34
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMSACzC" */ ?>
<?php /*%%SmartyHeaderCode:99323892855de06f69f54a3-44785437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4002cd51df244bb88e5fb0d186914a6f329257c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeMSACzC',
      1 => 1440614134,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99323892855de06f69f54a3-44785437',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><p class="frage-header">
    Frage <?php echo $_smarty_tpl->getVariable('data')->value['FRAGE']['wz_NR'];?>

</p>

<p class="frage-frage">
    <?php echo $_smarty_tpl->getVariable('data')->value['FRAGE']['wz_FRAGE'];?>

</p>

<ol class="frage-antworten">
    
    
    
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['OPTIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    
        <?php if (!isset($_smarty_tpl->tpl_vars['option_wz_id']) || !is_array($_smarty_tpl->tpl_vars['option_wz_id']->value)) $_smarty_tpl->createLocalArrayVariable('option_wz_id', null, null);
$_smarty_tpl->tpl_vars['option_wz_id']->value[$_smarty_tpl->tpl_vars['k']->value] = $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
        <li>
           <?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEXT'];?>

        </li>    
    
    <?php }} ?>
    
</ol>

<div class="row frage-ich-container">
    <div class="col-xs-6">
        <div class="frage-ich frage-ichbin">
            <span class="ich-beschreibung">
                Ich bin 
            </span>
            <ul class="option-container js-options-bin">
                <li class="option" data-id="<?php echo $_smarty_tpl->getVariable('option_wz_id')->value[0];?>
">a</li>
                <li class="option" data-id="<?php echo $_smarty_tpl->getVariable('option_wz_id')->value[1];?>
">b</li>
                
                <?php if ($_smarty_tpl->getVariable('option_wz_id')->value[2]){?>
                    <li class="option" data-id="<?php echo $_smarty_tpl->getVariable('option_wz_id')->value[2];?>
">c</li>
                <?php }?>
                
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    
    <div class="col-xs-6">
        <div class="frage-du frage-ichwuensche">
            <span class="du-beschreibung">
                Ich wünsche 
            </span>
            <ul class="option-container js-options-suche">
                <li class="option" data-id="<?php echo $_smarty_tpl->getVariable('option_wz_id')->value[0];?>
">a</li>
                <li class="option" data-id="<?php echo $_smarty_tpl->getVariable('option_wz_id')->value[1];?>
">b</li>
                <?php if ($_smarty_tpl->getVariable('option_wz_id')->value[2]){?>
                    <li class="option" data-id="<?php echo $_smarty_tpl->getVariable('option_wz_id')->value[2];?>
">c</li>    
                <?php }?>
            </ul>
            <div class="clearfix"></div>
        </div>        
    </div>
</div>



<p>
    Wie wichtig ist dir dieses Thema?
</p>

<?php echo smarty_function_xr_atom(array('a_id'=>703,'return'=>1),$_smarty_tpl);?>


<div class="clearfix"></div>

<?php if ($_smarty_tpl->getVariable('data')->value['FRAGE']['wz_id']>1){?>
<a href="#" data-frage="<?php echo $_smarty_tpl->getVariable('data')->value['FRAGE']['wz_id']-1;?>
" class="frage-button-previous-question">
    <span class="icon-pfeil pull-left"></span>    
</a>
<?php }?>

<a href="#" data-frage="<?php echo $_smarty_tpl->getVariable('data')->value['FRAGE']['wz_id'];?>
" class="frage-button-next-question frage-wgtest-submit">
    <span class="icon-pfeil pull-right"></span>    
</a>



