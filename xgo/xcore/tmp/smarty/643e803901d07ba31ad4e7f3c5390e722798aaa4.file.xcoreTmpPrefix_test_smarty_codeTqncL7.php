<?php /* Smarty version Smarty-3.0.7, created on 2015-12-16 12:26:59
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTqncL7" */ ?>
<?php /*%%SmartyHeaderCode:99170480156714a833a0f71-19212431%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '643e803901d07ba31ad4e7f3c5390e722798aaa4' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTqncL7',
      1 => 1450265219,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99170480156714a833a0f71-19212431',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><p class="frage-header">
    <?php echo smarty_function_xr_translate(array('tag'=>'Frage'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->getVariable('data')->value['FRAGE']['wz_NR'];?>
 <?php echo smarty_function_xr_translate(array('tag'=>"von"),$_smarty_tpl);?>
 15
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
    
    <div class="col-xs-12">
        <div class="frage-ich frage-ichbin">
            <span class="ich-beschreibung">
                 <?php echo smarty_function_xr_translate(array('tag'=>"Ich bin"),$_smarty_tpl);?>
 
            </span>
            <ul class="option-container js-options-bin">
                <li class="option<?php if ($_smarty_tpl->getVariable('data')->value['ANSWERED']['wz_ANTWORT_BIN']==$_smarty_tpl->getVariable('option_wz_id')->value[0]){?> active<?php }?>" data-id="<?php echo $_smarty_tpl->getVariable('option_wz_id')->value[0];?>
">a</li>
                <li class="option<?php if ($_smarty_tpl->getVariable('data')->value['ANSWERED']['wz_ANTWORT_BIN']==$_smarty_tpl->getVariable('option_wz_id')->value[1]){?> active<?php }?>" data-id="<?php echo $_smarty_tpl->getVariable('option_wz_id')->value[1];?>
">b</li>
                
                <?php if ($_smarty_tpl->getVariable('option_wz_id')->value[2]){?>
                    <li class="option<?php if ($_smarty_tpl->getVariable('data')->value['ANSWERED']['wz_ANTWORT_BIN']==$_smarty_tpl->getVariable('option_wz_id')->value[2]){?> active<?php }?>" data-id="<?php echo $_smarty_tpl->getVariable('option_wz_id')->value[2];?>
">c</li>
                <?php }?>
                
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    
    
    <div class="col-xs-12" style="margin-top:15px;">
        <div class="frage-du frage-ichwuensche">
            <span class="du-beschreibung">
                <?php echo smarty_function_xr_translate(array('tag'=>"Ich suche"),$_smarty_tpl);?>
 
            </span>
            <ul class="option-container js-options-suche">
                <li class="option<?php if ($_smarty_tpl->getVariable('data')->value['ANSWERED']['wz_ANTWORT_SUCHE']==$_smarty_tpl->getVariable('option_wz_id')->value[0]){?> active<?php }?>" data-id="<?php echo $_smarty_tpl->getVariable('option_wz_id')->value[0];?>
">a</li>
                <li class="option<?php if ($_smarty_tpl->getVariable('data')->value['ANSWERED']['wz_ANTWORT_SUCHE']==$_smarty_tpl->getVariable('option_wz_id')->value[1]){?> active<?php }?>" data-id="<?php echo $_smarty_tpl->getVariable('option_wz_id')->value[1];?>
">b</li>
                <?php if ($_smarty_tpl->getVariable('option_wz_id')->value[2]){?>
                    <li class="option<?php if ($_smarty_tpl->getVariable('data')->value['ANSWERED']['wz_ANTWORT_BIN']==$_smarty_tpl->getVariable('option_wz_id')->value[2]){?> active<?php }?>" data-id="<?php echo $_smarty_tpl->getVariable('option_wz_id')->value[2];?>
">c</li>    
                <?php }?>
            </ul>
            <div class="clearfix"></div>
        </div>        
    </div>
</div>


<div class="sterne-option-wrapper">
    <p>
         <?php echo smarty_function_xr_translate(array('tag'=>"Wie wichtig ist dir dieses Thema?"),$_smarty_tpl);?>

    </p>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ANSWERED']['wz_ANTWORT_WICHTIG']){?>
        <?php echo smarty_function_xr_atom(array('a_id'=>703,'savedRanking'=>$_smarty_tpl->getVariable('data')->value['ANSWERED']['wz_ANTWORT_WICHTIG'],'return'=>1),$_smarty_tpl);?>

    <?php }else{ ?>
        <?php echo smarty_function_xr_atom(array('a_id'=>703,'return'=>1),$_smarty_tpl);?>

    <?php }?>
</div>


<div class="clearfix"></div>

<?php if ($_smarty_tpl->getVariable('data')->value['FRAGE']['wz_id']>1){?>
<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'frageid'=>($_smarty_tpl->getVariable('data')->value['FRAGE']['wz_id']-1),'m_suffix'=>($_smarty_tpl->getVariable('data')->value['FRAGE']['wz_id']-1)),$_smarty_tpl);?>
" class="frage-button-previous-question">
    <span class="icon-pfeil pull-left"></span>    
</a>
<?php }?>

<a href="#" data-frage="<?php echo $_smarty_tpl->getVariable('data')->value['FRAGE']['wz_id'];?>
" class="frage-button-next-question frage-wgtest-submit">
    <span class="icon-pfeil pull-right"></span>    
</a>



