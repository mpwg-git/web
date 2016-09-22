<?php /* Smarty version Smarty-3.0.7, created on 2015-08-27 20:09:37
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeWdL7tb" */ ?>
<?php /*%%SmartyHeaderCode:205256947155df52611b7f82-95856248%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07b43216f7883fc3a15e4798bcbcd332a2e75898' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeWdL7tb',
      1 => 1440698977,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '205256947155df52611b7f82-95856248',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIENBLOCK']!=''){?>
    
    <div class="maching-infos-detail">
        <h3 class="headline">Matching Details</h3>
            <?php echo $_smarty_tpl->getVariable('matching')->value['TEXT']['KATEGORIENBLOCK'];?>

        </h3>    
    </div>
    
<?php }?>