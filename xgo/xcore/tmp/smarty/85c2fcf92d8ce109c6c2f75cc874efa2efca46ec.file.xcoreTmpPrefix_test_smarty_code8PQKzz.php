<?php /* Smarty version Smarty-3.0.7, created on 2015-11-25 13:40:37
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8PQKzz" */ ?>
<?php /*%%SmartyHeaderCode:7290757535655ac45ed4607-38036924%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85c2fcf92d8ce109c6c2f75cc874efa2efca46ec' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8PQKzz',
      1 => 1448455237,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7290757535655ac45ed4607-38036924',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('matching')->value),$_smarty_tpl);?>

<?php if ($_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIENBLOCK']!=''){?>
    
    <div class="maching-infos-detail">
        <h3 class="headline">Matching Details</h3>
            <span class="whitetext">
                <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIENBLOCK'];?>

            </span>
        </h3>    
    </div>
    
<?php }?>