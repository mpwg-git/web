<?php /* Smarty version Smarty-3.0.7, created on 2015-08-16 15:40:38
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeG3qlXX" */ ?>
<?php /*%%SmartyHeaderCode:190566750955d092d63d75e6-27237421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0584162322987c4d3f62744b6de0dbf248385e44' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeG3qlXX',
      1 => 1439732438,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190566750955d092d63d75e6-27237421',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getFrage",'var'=>"data"),$_smarty_tpl);?>


<div class="col-xs-4 meinprofil-links">
    <?php echo smarty_function_xr_atom(array('a_id'=>678,'return'=>1),$_smarty_tpl);?>

</div>

<div class="col-xs-8 default-container-paddingtop meinprofil-wgtest">
    
    <span class="looklikeh1">
        WG-Test
    </span>
    
    <p class="wgtest-beschreibung">
        Sed magnimp orecea dis aligniscias quam de cone et et qui sequatiis dolo et praernatur? Qui verchiliquis perovit porum ellabor a senderum.
        Facerum am erferias recto et aut omni nis nihit volori tempore sequas ad ea sam, tet rem vellorum arcid quo disto quo dellut aute con num commoditaspe volum et et hita doluptat quam que remolore et fugiam.
    </p>
    
    <p class="frage-header">
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
                    <li class="option" data-id="<?php echo $_smarty_tpl->getVariable('option_wz_id')->value[2];?>
">c</li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        
        <div class="col-xs-6">
            <div class="frage-ich frage-ichwuensche">
                <span class="ich-beschreibung">
                    Ich wünsche 
                </span>
                <ul class="option-container js-options-suche">
                    <li class="option" data-id="<?php echo $_smarty_tpl->getVariable('option_wz_id')->value[0];?>
">a</li>
                    <li class="option" data-id="<?php echo $_smarty_tpl->getVariable('option_wz_id')->value[1];?>
">b</li>
                    <li class="option" data-id="<?php echo $_smarty_tpl->getVariable('option_wz_id')->value[2];?>
">c</li>    
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
    
    <a href="#" data-frage="<?php echo $_smarty_tpl->getVariable('data')->value['FRAGE']['wz_id'];?>
" class="frage-button-next-question frage-wgtest-submit">
        <span class="icon-pfeil pull-right"></span>    
    </a>
    
    
</div>