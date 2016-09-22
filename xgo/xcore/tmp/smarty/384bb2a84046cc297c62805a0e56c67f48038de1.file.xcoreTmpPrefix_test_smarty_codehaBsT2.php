<?php /* Smarty version Smarty-3.0.7, created on 2015-10-30 13:39:56
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codehaBsT2" */ ?>
<?php /*%%SmartyHeaderCode:5562961925633651c310727-97906969%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '384bb2a84046cc297c62805a0e56c67f48038de1' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codehaBsT2',
      1 => 1446208796,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5562961925633651c310727-97906969',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIENBLOCK']!=''){?>
    
    <div class="maching-infos-detail">
        <h3 class="headline">Matching Details</h3>
            <span class="whitetext">
                <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIENBLOCK'];?>

            </span>
        </h3>    
    </div>
    
<?php }?>