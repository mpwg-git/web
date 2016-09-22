<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 16:08:26
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekZQ95f" */ ?>
<?php /*%%SmartyHeaderCode:185002341854fdb76ac0f3a8-31341227%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4fc3be52fbb524455a4d68d26579cebdbb06cdb' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codekZQ95f',
      1 => 1425913706,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185002341854fdb76ac0f3a8-31341227',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><form class='xr_form <?php echo $_smarty_tpl->getVariable('class')->value;?>
' data-wz_id='<?php echo $_smarty_tpl->getVariable('wz_id')->value;?>
' data-hash='<?php echo $_smarty_tpl->getVariable('hash')->value;?>
' data-pre-action='<?php echo $_smarty_tpl->getVariable('pre_action')->value;?>
' data-action="<?php echo $_smarty_tpl->getVariable('action')->value;?>
" data-js="<?php echo $_smarty_tpl->getVariable('js')->value;?>
" data-url="<?php echo $_smarty_tpl->getVariable('url')->value;?>
">
    <fieldset>

        <?php echo $_smarty_tpl->getVariable('html')->value;?>

    
        <?php echo smarty_function_xr_atom(array('a_id'=>461,'submit_txt'=>$_smarty_tpl->getVariable('btn')->value['submit_txt'],'return'=>1),$_smarty_tpl);?>

        
    </fieldset>
</form>