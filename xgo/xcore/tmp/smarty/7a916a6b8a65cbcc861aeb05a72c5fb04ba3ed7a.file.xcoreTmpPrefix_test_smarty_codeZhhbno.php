<?php /* Smarty version Smarty-3.0.7, created on 2015-10-28 17:54:05
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZhhbno" */ ?>
<?php /*%%SmartyHeaderCode:6444228465630fdade95d21-03495400%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a916a6b8a65cbcc861aeb05a72c5fb04ba3ed7a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZhhbno',
      1 => 1446051245,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6444228465630fdade95d21-03495400',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="meinprofil-images-container">
    
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('images')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    
        <div class="upload-image hasImage" data-fotoid="<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_S_ID'],'w'=>400,'h'=>430,'rmode'=>"cco",'class'=>"img-responsive"),$_smarty_tpl);?>

            
            <span class="popover-del" data-deltype='bild' data-delid="<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
">
                <span class="icon-rel icon-minus-rel"></span>
            </span>
        </div>
        
    <?php }} ?>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>743,'return'=>1),$_smarty_tpl);?>
     
</div>