<?php /* Smarty version Smarty-3.0.7, created on 2016-01-14 21:52:37
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codepsC5ki" */ ?>
<?php /*%%SmartyHeaderCode:16522930256980a95202af6-92551033%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2ebdeba92f55b01ef155d2d9570064395d20bc8b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codepsC5ki',
      1 => 1452804757,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16522930256980a95202af6-92551033',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><p class="frage-header">
    <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_wgtest::sc_get_fragen_count','var'=>'fragenGesamt'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_translate(array('tag'=>'Frage'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->getVariable('data')->value['FRAGE']['wz_NR'];?>
 <?php echo smarty_function_xr_translate(array('tag'=>"von"),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->getVariable('fragenGesamt')->value;?>

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
<?php if ($_REQUEST['restart']==1){?>
<input type="hidden" name="from_restart" value="<?php echo $_smarty_tpl->getVariable('data')->value['FRAGE']['wz_NR'];?>
">
<?php }?>

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


<div class="sterne-option-wrapper clearfix">
    <p class="pull-left" style="margin-bottom:0px; line-height: 1.8;">
         <?php echo smarty_function_xr_translate(array('tag'=>"Wie wichtig ist dir dieses Thema?"),$_smarty_tpl);?>

    </p>
    
    <?php if ($_smarty_tpl->getVariable('data')->value['ANSWERED']['wz_ANTWORT_WICHTIG']){?>
        <?php echo smarty_function_xr_atom(array('a_id'=>703,'savedRanking'=>$_smarty_tpl->getVariable('data')->value['ANSWERED']['wz_ANTWORT_WICHTIG'],'return'=>1),$_smarty_tpl);?>

    <?php }else{ ?>
        <?php echo smarty_function_xr_atom(array('a_id'=>703,'return'=>1),$_smarty_tpl);?>

    <?php }?>
</div>


<div class="clearfix"></div>

<?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>

<?php if ($_smarty_tpl->getVariable('data')->value['FRAGE']['wz_NR']>1){?>
    <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_wgtest::sc_getPrevFrageId','frageId'=>$_smarty_tpl->getVariable('data')->value['FRAGE']['wz_id'],'var'=>'prevQuestionFrageId'),$_smarty_tpl);?>

    <?php if ($_REQUEST['restart']==1||$_smarty_tpl->getVariable('from_restart')->value){?>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'frageId'=>$_smarty_tpl->getVariable('prevQuestionFrageId')->value,'m_suffix'=>($_smarty_tpl->getVariable('prevQuestionFrageId')->value)."/restart"),$_smarty_tpl);?>
" class="frage-button-previous-question">
    <?php }else{ ?>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'frageId'=>$_smarty_tpl->getVariable('prevQuestionFrageId')->value,'m_suffix'=>$_smarty_tpl->getVariable('prevQuestionFrageId')->value),$_smarty_tpl);?>
" class="frage-button-previous-question">
    <?php }?>

    <span class="icon-pfeil pull-left"></span>    
    </a>
<?php }?>

<a href="#" data-frage="<?php echo $_smarty_tpl->getVariable('data')->value['FRAGE']['wz_id'];?>
" data-redirect="<?php echo smarty_function_xr_genlink(array('p_id'=>11),$_smarty_tpl);?>
" class="frage-button-next-question frage-wgtest-submit">
    <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_wgtest::sc_is_frage_last_frage','frageId'=>$_smarty_tpl->getVariable('data')->value['FRAGE']['wz_id'],'var'=>'isLastFrage'),$_smarty_tpl);?>

    <?php if ($_smarty_tpl->getVariable('isLastFrage')->value){?>
        <span class="save-and-back"><?php echo smarty_function_xr_translate(array('tag'=>"Speichern und zurück"),$_smarty_tpl);?>
</span>
    <?php }else{ ?>
        <span class="icon-pfeil pull-right"></span>    
    <?php }?>
</a>



