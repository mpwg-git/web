<?php /* Smarty version Smarty-3.0.7, created on 2015-03-10 09:56:38
         compiled from "/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTVDV3V" */ ?>
<?php /*%%SmartyHeaderCode:118742708454feb1c6155e83-04529211%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '090ccddde71e9506799c90235a83ccd39f7f996f' => 
    array (
      0 => '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeTVDV3V',
      1 => 1425977798,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118742708454feb1c6155e83-04529211',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_form')) include '/srv/gitgo_daten/www/shop.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_form.php';
?><div class='row'>
    <div class='col-xs-12' style='padding:20px;'>
        
        <?php echo $_smarty_tpl->getVariable('data')->value['wz_id'];?>

        <?php echo $_smarty_tpl->getVariable('data')->value['wz_STREET'];?>

        
        <br>
        
        
        <div style='display:none'>
            <?php echo smarty_function_xr_form(array('form_id'=>5,'var'=>'form'),$_smarty_tpl);?>

        </div>
        
        <?php echo $_smarty_tpl->getVariable('form')->value;?>

        
        
        <button type="button" class="pager_edit_record btn btn-primary">edit</button>
        <button type="button" class="pager_edit_record btn btn-primary">delete</button>
        
        
    </div>
</div>