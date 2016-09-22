<?php /* Smarty version Smarty-3.0.7, created on 2015-11-12 13:15:50
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekPrrnz" */ ?>
<?php /*%%SmartyHeaderCode:635689515564482f6179926-52589697%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12bc4cc1cdc71c8efdacef6bbf7ac44b963a9992' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekPrrnz',
      1 => 1447330550,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '635689515564482f6179926-52589697',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><style>
    
    .meinprofil-wgtest .option-container>li {
    float: left;
    width: 9.4vw;
    height: 9.4vw;
    line-height: 9.4vw;
    font-family: 'jaapokkiregular';
    font-size: 5.2vw;
    text-transform: uppercase;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    -moz-background-clip: padding;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 2px solid #04e0d7;
    text-align: center;
    font-weight: 500;
    margin-right: 1vw;
    cursor: pointer;
}

    .positionpfeilmobil{
        
        margin-top:-57px;
        
    }
    
    .positionpfeilmobil2{
        margin-left:200px;
        
    }
    

</style>


<p class="frage-header">
    <?php echo smarty_function_xr_translate(array('tag'=>'Frage'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->getVariable('data')->value['FRAGE']['wz_NR'];?>

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
        <!-- <div class="frage-ich frage-ichbin"> -->
        <div class="frage-du frage-ichwuensche">    
            <span class="ich-beschreibung">
                Bin 
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
                Wünsche 
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
<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10,'frageid'=>($_smarty_tpl->getVariable('data')->value['FRAGE']['wz_id']-1),'m_suffix'=>($_smarty_tpl->getVariable('data')->value['FRAGE']['wz_id']-1)),$_smarty_tpl);?>
" class="frage-button-previous-question">
    <span class="icon-pfeil pull-left positionpfeilmobil positionpfeilmobil2"></span>    
</a>
<?php }?>

<a href="#" data-frage="<?php echo $_smarty_tpl->getVariable('data')->value['FRAGE']['wz_id'];?>
" class="frage-button-next-question frage-wgtest-submit">
    <span class="icon-pfeil pull-right positionpfeilmobil" ></span>    
</a>



