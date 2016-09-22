<?php /* Smarty version Smarty-3.0.7, created on 2016-01-13 17:45:53
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeNJiZ9G" */ ?>
<?php /*%%SmartyHeaderCode:104280717556967f41dbdf28-08820398%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20f7858caefef5667f961c1aa14b0c8f27210cc6' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeNJiZ9G',
      1 => 1452703553,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104280717556967f41dbdf28-08820398',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_wz_fetch(array('id'=>834,'wz_online'=>'Y','var'=>'data'),$_smarty_tpl);?>


<div class="default-container-paddingtop">
    <!-- <h1>FAQ</h1> -->
    <span class="looklikeh1">
        <?php echo smarty_function_xr_translate(array('tag'=>"Blog"),$_smarty_tpl);?>

    </span>
    <br>
    <br>
    <div class="faq-container">
        <div class="worumgehts">
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>  
                <div>
                    <b class="" style="color:#04e0d7;"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_HEADLINE'];?>
</b>
                </div> 
                <div style="">
                    <div class="faq-text"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEXT'];?>
</div>
                    <div class="faq-text"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_REPORTER'];?>
</div>
                    <div class="faq-text"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_DATUM'];?>
</div> 
                    <div class="faq-text"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_BILD'],'w'=>120,'h'=>160),$_smarty_tpl);?>
</div> 
                </div>
            <?php }} ?>
        </div>
     </div>    
</div>