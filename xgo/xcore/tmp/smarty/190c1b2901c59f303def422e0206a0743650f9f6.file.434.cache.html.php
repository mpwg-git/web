<?php /* Smarty version Smarty-3.0.7, created on 2015-06-24 15:00:58
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/434.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:729021534558aaa0ad5b190-67743854%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '190c1b2901c59f303def422e0206a0743650f9f6' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/434.cache.html',
      1 => 1435074121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '729021534558aaa0ad5b190-67743854',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
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

