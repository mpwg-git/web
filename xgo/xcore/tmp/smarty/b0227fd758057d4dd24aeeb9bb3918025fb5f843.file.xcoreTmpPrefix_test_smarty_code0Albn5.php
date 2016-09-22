<?php /* Smarty version Smarty-3.0.7, created on 2015-08-13 03:14:47
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0Albn5" */ ?>
<?php /*%%SmartyHeaderCode:121278044855cbef879b1bc3-19846945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0227fd758057d4dd24aeeb9bb3918025fb5f843' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code0Albn5',
      1 => 1439428487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '121278044855cbef879b1bc3-19846945',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><form class="add-image-final-form" data-type="<?php echo $_smarty_tpl->getVariable('type')->value;?>
 method="post">
    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('image')->value['new_s_id'],'class'=>"img-responsive"),$_smarty_tpl);?>

    <input type="hidden" name="s_id" value="<?php echo $_smarty_tpl->getVariable('image')->value['new_s_id'];?>
" />
     <input type="hidden" name="type" value="<?php echo $_smarty_tpl->getVariable('type')->value;?>
" />
    
    <div class="clearfix"></div>
</form>

<button type="button" class="add-image-final-submit modal-image-button btn btn-primary">Speichern</button>