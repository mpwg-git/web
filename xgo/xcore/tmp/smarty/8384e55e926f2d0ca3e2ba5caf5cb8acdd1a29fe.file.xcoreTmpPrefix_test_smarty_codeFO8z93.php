<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 21:20:26
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFO8z93" */ ?>
<?php /*%%SmartyHeaderCode:44994156054fe008aeb07a4-46245664%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8384e55e926f2d0ca3e2ba5caf5cb8acdd1a29fe' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeFO8z93',
      1 => 1425932426,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44994156054fe008aeb07a4-46245664',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class='row'>
    <div class='xs-col-12'>
        
        <?php echo $_smarty_tpl->getVariable('data')->value['wz_id'];?>

        <?php echo $_smarty_tpl->getVariable('data')->value['wz_STREET'];?>

        
        
        <button type="submit" class="pager_edit_record btn btn-primary">edit</button>
        <button type="submit" class="pager_edit_record btn btn-primary">delete</button>
        
        
    </div>
</div>