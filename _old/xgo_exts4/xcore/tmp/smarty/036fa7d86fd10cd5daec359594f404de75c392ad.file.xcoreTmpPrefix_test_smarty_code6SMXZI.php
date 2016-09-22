<?php /* Smarty version Smarty-3.0.7, created on 2014-09-25 01:07:45
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6SMXZI" */ ?>
<?php /*%%SmartyHeaderCode:152981906454236ae1c973e5-82518287%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '036fa7d86fd10cd5daec359594f404de75c392ad' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code6SMXZI',
      1 => 1411607265,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152981906454236ae1c973e5-82518287',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?>
 <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['count']['index']=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['count']['index']++;
?>
                
                <?php if ((!($_smarty_tpl->getVariable('smarty')->value['foreach']['count']['index'] % 2))){?>
                    <?php if (($_smarty_tpl->getVariable('smarty')->value['foreach']['count']['index']!=0)){?>
                        </div>
                    <?php }?>
                    <div class="row">
                <?php }?>
                
                <div class="col-sm-6">
					<div class="lw-item"> 
						<h3 class="marginBottom0 nowra"> <?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
</h3>
						<span class="quick-archiv-nr"><?php echo $_smarty_tpl->tpl_vars['v']->value['CATEGORY'];?>
</span>
						<p class="labelpic"><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>698,'h'=>416,'rmode'=>"cco",'q'=>85,'var'=>"thumb"),$_smarty_tpl);?>
<img class="img-responsive" with="1108" height="340" src2="<?php echo $_smarty_tpl->getVariable('prethumb')->value['src'];?>
" src="<?php echo $_smarty_tpl->getVariable('thumb')->value['src'];?>
"></a></p>
					
						<p> <?php echo $_smarty_tpl->tpl_vars['v']->value['TEXT'];?>
</p>
						<p>&nbsp;</p>
						<div class="clearer"></div>
					</div>
				</div>
            <?php }} ?>
