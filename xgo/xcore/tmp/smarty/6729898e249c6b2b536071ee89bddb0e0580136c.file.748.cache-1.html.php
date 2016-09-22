<?php /* Smarty version Smarty-3.0.7, created on 2016-08-03 12:50:43
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/748.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:52131668657a1cc83eb97b9-71191966%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6729898e249c6b2b536071ee89bddb0e0580136c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/748.cache-1.html',
      1 => 1452795229,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52131668657a1cc83eb97b9-71191966',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><div class="meinprofil-images-container">
    
    <?php $_smarty_tpl->tpl_vars['deltype'] = new Smarty_variable('bild', null, null);?>
    <?php if ($_smarty_tpl->getVariable('fromRoom')->value==1){?>
        <?php $_smarty_tpl->tpl_vars['deltype'] = new Smarty_variable('bild-room', null, null);?>
    <?php }?>
    
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('images')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    
        <?php if ($_smarty_tpl->getVariable('fromRoom')->value==1&&$_smarty_tpl->tpl_vars['k']->value==0){?><?php continue 1?><?php }?>
        
    
        <div class="upload-image hasImage" data-fotoid="<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
">
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_S_ID'],'w'=>400,'h'=>430,'rmode'=>"cco",'class'=>"img-responsive"),$_smarty_tpl);?>

            <span class="popover-del" data-deltype='bild' data-delid="<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
">
                <span class="icon-rel icon-minus-rel"></span>
            </span>
        </div>
        
    <?php }} ?>
    
    <?php echo smarty_function_xr_atom(array('a_id'=>743,'fromRoom'=>$_smarty_tpl->getVariable('fromRoom')->value,'refid'=>$_smarty_tpl->getVariable('refid')->value,'return'=>1),$_smarty_tpl);?>
      
</div>

<div class="clearfix"></div>