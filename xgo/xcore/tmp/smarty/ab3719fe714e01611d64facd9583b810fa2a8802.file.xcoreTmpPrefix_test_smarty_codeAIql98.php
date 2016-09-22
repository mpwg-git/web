<?php /* Smarty version Smarty-3.0.7, created on 2015-08-12 11:01:19
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAIql98" */ ?>
<?php /*%%SmartyHeaderCode:65699735955cb0b5fcd8588-45470978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab3719fe714e01611d64facd9583b810fa2a8802' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAIql98',
      1 => 1439370079,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65699735955cb0b5fcd8588-45470978',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><div class="col-xs-4 picture-col">
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>13),$_smarty_tpl);?>
">
    <div class="img-wrapper">
        <div class="inner-wrapper">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMG'],'h'=>500,'w'=>470,'rmode'=>"cco",'class'=>"img-responsive shower-img"),$_smarty_tpl);?>

            <div class="overlay-bg">
                <div class="overlay">
                    <p class="upper">
                        <span class="pull-left drduck icon-duck"></span>
                        <span class="pull-right">
                            <span class="prozent"><?php echo $_smarty_tpl->getVariable('data')->value['MATCHPERCENT'];?>
</span>
                            <span class="match">match</span>
                        </span>
                    </p>
                    <div style="clear:both"></div>
                    <div class="infos">
                        <p class="name"><?php echo $_smarty_tpl->getVariable('data')->value['NAME'];?>
</p>
                        <p class="zimmer">Zimmer für <?php echo $_smarty_tpl->getVariable('data')->value['PREIS'];?>
 €</p>
                        <p class="durchschnitt"><?php echo $_smarty_tpl->getVariable('data')->value['ALTERSDURCHSCHNITT'];?>
 Jahre</p>
                        <p class="mitbewohner">
                            
                            <?php  $_smarty_tpl->tpl_vars['F'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['MITBEWOHNER']['F']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['F']->key => $_smarty_tpl->tpl_vars['F']->value){
?>
                                <span class="icon-frau_black"></span>
                            <?php }} ?>
                            
                            <?php  $_smarty_tpl->tpl_vars['Mv'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['MITBEWOHNER']['M']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['Mv']->key => $_smarty_tpl->tpl_vars['Mv']->value){
?>
                                <span class="icon-mann_black"></span>
                            <?php }} ?>
                            
                        </p>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>