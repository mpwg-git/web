<?php /* Smarty version Smarty-3.0.7, created on 2015-03-13 10:11:57
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeszH7Or" */ ?>
<?php /*%%SmartyHeaderCode:9538624435502a9dd651c76-87127088%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cd0b25b95fd01c6898457bdad5b79713ca297bb' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeszH7Or',
      1 => 1426237917,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9538624435502a9dd651c76-87127088',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php if ($_smarty_tpl->getVariable('bufferd_forms')->value){?>

    <?php echo $_smarty_tpl->getVariable('html')->value;?>


<?php }else{ ?>

<form class='xr_form <?php echo $_smarty_tpl->getVariable('class')->value;?>
' id="<?php echo $_smarty_tpl->getVariable('form_uid')->value;?>
" data-wz_id='<?php echo $_smarty_tpl->getVariable('form_wz_id')->value;?>
' data-wz_r_id='<?php echo $_smarty_tpl->getVariable('form_wz_r_id')->value;?>
' data-form_id='<?php echo $_smarty_tpl->getVariable('form_id')->value;?>
' data-hash='<?php echo $_smarty_tpl->getVariable('hash')->value;?>
' data-pre-action='<?php echo $_smarty_tpl->getVariable('pre_action')->value;?>
' data-action="<?php echo $_smarty_tpl->getVariable('action')->value;?>
" data-js="<?php echo $_smarty_tpl->getVariable('js')->value;?>
" data-url="<?php echo $_smarty_tpl->getVariable('url')->value;?>
">

<input type='hidden' name='rel_fas_id' value='<?php echo $_smarty_tpl->getVariable('rel_fas_id')->value;?>
'>
<input type='hidden' name='rel_f_id' value='<?php echo $_smarty_tpl->getVariable('rel_f_id')->value;?>
'>

<input type='hidden' name='form_wz_id'   value='<?php echo $_smarty_tpl->getVariable('form_wz_id')->value;?>
'>
<input type='hidden' name='form_wz_r_id' value='<?php echo $_smarty_tpl->getVariable('form_wz_r_id')->value;?>
'>

    <fieldset>

        <?php echo $_smarty_tpl->getVariable('html')->value;?>


        <?php echo smarty_function_xr_atom(array('a_id'=>461,'submit_txt'=>$_smarty_tpl->getVariable('btn')->value['submit_txt'],'return'=>1),$_smarty_tpl);?>

        
    </fieldset>
</form>


<?php }?>

