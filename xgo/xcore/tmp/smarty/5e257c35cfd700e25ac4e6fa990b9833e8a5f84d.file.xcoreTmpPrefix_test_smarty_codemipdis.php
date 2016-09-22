<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 21:20:52
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemipdis" */ ?>
<?php /*%%SmartyHeaderCode:36728040954fe00a4d4e0c6-34746810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e257c35cfd700e25ac4e6fa990b9833e8a5f84d' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemipdis',
      1 => 1425932452,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36728040954fe00a4d4e0c6-34746810',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class='row'>
    <div class='xs-col-12'>
        
        <?php echo $_smarty_tpl->getVariable('data')->value['wz_id'];?>

        <?php echo $_smarty_tpl->getVariable('data')->value['wz_STREET'];?>

        
        
        <button type="button" class="pager_edit_record btn btn-primary">edit</button>
        <button type="button" class="pager_edit_record btn btn-primary">delete</button>
        
        
    </div>
</div>