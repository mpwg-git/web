<?php /* Smarty version Smarty-3.0.7, created on 2016-01-08 12:18:47
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesg6vCc" */ ?>
<?php /*%%SmartyHeaderCode:108958401568f9b17972681-51372591%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '871ba1111d0a2ccc009221be77ea6d1ab4cf0481' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesg6vCc',
      1 => 1452251927,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108958401568f9b17972681-51372591',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><div class="image-slider">
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('images')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <div class="item">
            <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_S_ID'],'w'=>800,'var'=>"bigimage"),$_smarty_tpl);?>

            <a href="<?php echo $_smarty_tpl->getVariable('bigimage')->value['src'];?>
" class="swipebox">
                <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_S_ID'],'w'=>415,'h'=>220,'rmode'=>"cco",'class'=>"image rsImg"),$_smarty_tpl);?>

            </a>
        </div>
    <?php }} ?>
    
</div>