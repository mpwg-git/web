<?php /* Smarty version Smarty-3.0.7, created on 2014-12-16 15:40:48
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/588.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:1812260236549052807b78b2-77493887%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46e1de3803ed124521af4a679de1f24dfc8003d8' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/588.cache.html',
      1 => 1418744445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1812260236549052807b78b2-77493887',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_modifier_replace')) include '/srv/www/www.luerzersarchive.net/web/xgo/xcore/libs/smarty3/plugins/modifier.replace.php';
?>
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        
        
        <?php if ((($_smarty_tpl->tpl_vars['k']->value)%3)==0){?>
            </div>
            <div class="row">
        <?php }?>
                        

        <div class="col-sm-4 minHeight290">
			<div class="lw-item"> 
				<p class="labelpic">
				<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['v']->value['URLEXT'];?>
<?php $_tmp1=ob_get_clean();?><?php if (($_tmp1==1)){?>
				<a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['v']->value['URL'];?>
"><?php echo smarty_function_xr_imgWrapper(array('w'=>500,'h'=>350,'rmode'=>'cco','s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'class'=>"img-responsive"),$_smarty_tpl);?>
</a>
				<?php }else{ ?>
				<a href="/goto/inspiration/<?php echo $_smarty_tpl->tpl_vars['v']->value['ID'];?>
<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['v']->value['URL'],'http://www.luerzersarchive.com','');?>
"><?php echo smarty_function_xr_imgWrapper(array('w'=>500,'h'=>350,'rmode'=>'cco','s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'class'=>"img-responsive"),$_smarty_tpl);?>
</a>
				<?php }?>
				    
				</p>
				<p><?php echo $_smarty_tpl->tpl_vars['v']->value['TEXT'];?>
</p>
			</div>
	    </div>
        
    <?php }} ?>
                    
