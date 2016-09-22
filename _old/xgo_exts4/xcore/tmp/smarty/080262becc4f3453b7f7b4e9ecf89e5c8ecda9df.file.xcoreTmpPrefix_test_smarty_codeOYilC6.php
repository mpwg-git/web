<?php /* Smarty version Smarty-3.0.7, created on 2014-08-13 03:14:23
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOYilC6" */ ?>
<?php /*%%SmartyHeaderCode:72436307353eabbef83f2f3-92478032%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '080262becc4f3453b7f7b4e9ecf89e5c8ecda9df' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOYilC6',
      1 => 1407892463,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72436307353eabbef83f2f3-92478032',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_img(array('s_id'=>614973,'w'=>698,'h'=>970,'rmode'=>"cco",'q'=>85,'var'=>"prethumb"),$_smarty_tpl);?>

<div class="row">
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('am')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
<div class="col-sm-4<?php if ($_smarty_tpl->tpl_vars['k']->value>8){?> loadMore<?php }?>"<?php if ($_smarty_tpl->tpl_vars['k']->value>8){?> style="display:none;"<?php }?>>
	<div class="lw-item"> 
		<p><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
">
		<?php if ($_smarty_tpl->tpl_vars['v']->value['IMG']>0){?>
		<?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>698,'h'=>970,'rmode'=>"cco",'q'=>85,'var'=>'thumb'),$_smarty_tpl);?>

		<?php }else{ ?>
		<?php echo smarty_function_xr_img(array('s_id'=>614973,'w'=>698,'h'=>970,'rmode'=>"cco",'q'=>85,'var'=>"thumb"),$_smarty_tpl);?>

		<?php }?>
		<img class="lazy img-responsive" with="698" height="970" src="<?php echo $_smarty_tpl->getVariable('prethumb')->value['src'];?>
" data-original="<?php echo $_smarty_tpl->getVariable('thumb')->value['src'];?>
" />
	    </p>
		<h3><?php echo $_smarty_tpl->tpl_vars['v']->value['TYPE'];?>
 <?php echo $_smarty_tpl->tpl_vars['v']->value['EDITION'];?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['YEAR'];?>
</h3>
		<!--
		<p><a title="Gefällt mir" class="like" href="#">Gefällt mir</a><span class="likeCount">5</span> <a title="comments" class="comment nr" href="work-detail.html#disqus_thread">0</a></p>
		-->
		<div class="clearer"><br /></div>
	
        <!-- 	
		<div class="price">
			<form>
				<button class="btn btn-default" type="submit">Buy</button>
			
			    <a href="<?php echo smarty_function_xr_genlink(array('r_id'=>$_smarty_tpl->tpl_vars['v']->value['ID'],'m_suffix'=>$_smarty_tpl->tpl_vars['v']->value['NAME'],'p_id'=>10),$_smarty_tpl);?>
" class="but pull-right">Explore work</a>
			</form>
		</div>
	    -->
	</div>
</div>
<?php }} ?>
</div>