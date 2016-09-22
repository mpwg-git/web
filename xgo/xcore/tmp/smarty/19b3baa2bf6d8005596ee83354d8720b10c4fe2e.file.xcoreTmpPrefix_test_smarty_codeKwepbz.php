<?php /* Smarty version Smarty-3.0.7, created on 2016-01-11 12:07:50
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKwepbz" */ ?>
<?php /*%%SmartyHeaderCode:34339765956938d0659a124-43989272%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19b3baa2bf6d8005596ee83354d8720b10c4fe2e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeKwepbz',
      1 => 1452510470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34339765956938d0659a124-43989272',
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