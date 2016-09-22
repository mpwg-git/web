<?php /* Smarty version Smarty-3.0.7, created on 2015-08-16 14:18:44
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeScjvih" */ ?>
<?php /*%%SmartyHeaderCode:89867699655d07fa4aee967-61651858%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1fd2f4a7cbe9da35dc04d1fa96737f182cda315' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeScjvih',
      1 => 1439727524,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89867699655d07fa4aee967-61651858',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
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
                    <li class="option" data-id="a">a</li>
                    <li class="option" data-id="b">b</li>
                    <li class="option" data-id="c">c</li>
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
                    <li class="option" data-id="a">a</li>
                    <li class="option" data-id="b">b</li>
                    <li class="option" data-id="c">c</li>    
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
    
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>$_smarty_tpl->getVariable('P_ID')->value,'m_suffix'=>$_smarty_tpl->getVariable('data')->value['NEXTNR'],'frageId'=>$_smarty_tpl->getVariable('data')->value['NEXTNR']),$_smarty_tpl);?>
" data-frage="<?php echo $_smarty_tpl->getVariable('data')->value['FRAGE']['wz_id'];?>
" class="frage-button-next-question">
        <span class="icon-pfeil pull-right"></span>    
    </a>
    
    
</div>