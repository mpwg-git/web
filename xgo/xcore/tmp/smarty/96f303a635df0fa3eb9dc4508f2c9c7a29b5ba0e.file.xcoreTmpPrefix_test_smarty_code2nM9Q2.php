<?php /* Smarty version Smarty-3.0.7, created on 2015-08-27 20:10:42
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2nM9Q2" */ ?>
<?php /*%%SmartyHeaderCode:67219463855df52a20b8ac8-12021043%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96f303a635df0fa3eb9dc4508f2c9c7a29b5ba0e' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code2nM9Q2',
      1 => 1440699042,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67219463855df52a20b8ac8-12021043',
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