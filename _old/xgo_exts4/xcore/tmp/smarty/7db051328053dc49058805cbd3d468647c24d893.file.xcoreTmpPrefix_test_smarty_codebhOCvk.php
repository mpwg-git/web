<?php /* Smarty version Smarty-3.0.7, created on 2014-09-25 01:07:06
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebhOCvk" */ ?>
<?php /*%%SmartyHeaderCode:124348595054236aba190eb9-76380640%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7db051328053dc49058805cbd3d468647c24d893' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebhOCvk',
      1 => 1411607226,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '124348595054236aba190eb9-76380640',
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
<img class="img-responsive" with="698" height="416" src2="<?php echo $_smarty_tpl->getVariable('prethumb')->value['src'];?>
" src="<?php echo $_smarty_tpl->getVariable('thumb')->value['src'];?>
"></a></p>
					
						<p> <?php echo $_smarty_tpl->tpl_vars['v']->value['TEXT'];?>
</p>
						<p>&nbsp;</p>
						<div class="clearer"></div>
					</div>
				</div>
            <?php }} ?>
