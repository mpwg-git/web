<?php /* Smarty version Smarty-3.0.7, created on 2014-09-30 19:23:29
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeN5OCY5" */ ?>
<?php /*%%SmartyHeaderCode:26022771542b0331b75b20-16021984%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae9729675f1aaa30f539cf7c6eab29ba28d4160e' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeN5OCY5',
      1 => 1412105009,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26022771542b0331b75b20-16021984',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_menu')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_menu.php';
?><!-- Header BEGIN -->
<header>
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<a class="navbar-brand" href="<?php echo smarty_function_xr_genlink(array('p_id'=>2),$_smarty_tpl);?>
"><h2>Lürzer's Archiv</h2></a>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse noMaxHeight">
				<ul class="nav navbar-nav dunkelmain">
					<li class="homeB"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>2),$_smarty_tpl);?>
" title="Home">Home</a></li>
					<li class="dropdown">
						<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>37),$_smarty_tpl);?>
" id="link-search">Search</a>
					</li>
					<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
" id="link-submission">Submission</a></li>
				</ul>
				    <?php echo smarty_function_xr_menu(array('p_id'=>2,'P_ID'=>$_smarty_tpl->getVariable('P_ID')->value,'var'=>'menu'),$_smarty_tpl);?>

				<ul class="nav navbar-nav dunkelsub">
				    <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('menu')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
?>
				        <?php if ($_smarty_tpl->tpl_vars['p']->value['p_id']==53){?>
				        <li <?php if ($_smarty_tpl->tpl_vars['p']->value['iAmAParent']=='Y'){?> class="active"<?php }?>><a href="https://luerzersarchive.com/shop" title="<?php echo $_smarty_tpl->tpl_vars['p']->value['p_name'];?>
" target="_self"><?php echo $_smarty_tpl->tpl_vars['p']->value['p_name'];?>
</a></li>
				        <?php }else{ ?>
				        <li <?php if ($_smarty_tpl->tpl_vars['p']->value['iAmAParent']=='Y'){?> class="active"<?php }?>><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>$_smarty_tpl->tpl_vars['p']->value['p_id']),$_smarty_tpl);?>
" title="<?php echo $_smarty_tpl->tpl_vars['p']->value['p_name'];?>
" target="_self"<?php if ($_smarty_tpl->tpl_vars['p']->value['p_id']==10){?> id="link-magazin"<?php }?>><?php echo $_smarty_tpl->tpl_vars['p']->value['p_name'];?>
</a></li>
				        <?php }?>
				    <?php }} ?>
				</ul>
			</div>
		</div>
	</div>
</header>
<!-- Header END -->