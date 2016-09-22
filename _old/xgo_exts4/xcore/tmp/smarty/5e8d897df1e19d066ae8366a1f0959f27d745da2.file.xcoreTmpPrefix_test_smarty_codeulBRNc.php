<?php /* Smarty version Smarty-3.0.7, created on 2015-02-02 16:55:48
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeulBRNc" */ ?>
<?php /*%%SmartyHeaderCode:201982264754cf9e04c65bd0-02153654%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e8d897df1e19d066ae8366a1f0959f27d745da2' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeulBRNc',
      1 => 1422892548,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201982264754cf9e04c65bd0-02153654',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_partners::sc_get_latest','var'=>'data'),$_smarty_tpl);?>


<?php if ($_smarty_tpl->getVariable('GA')->value['oeedit']==1){?>
<?php echo smarty_function_xr_siteCall(array('fn'=>'oe_preview::sc_get_partners','var'=>'data'),$_smarty_tpl);?>

<?php }?>

    <!-- logo row -->
	<?php echo smarty_function_xr_atom(array('a_id'=>459,'return'=>1),$_smarty_tpl);?>

	
	<!-- quicksearch -->
	<div class="row">
		<div class="col-sm-12">
	        <?php echo smarty_function_xr_atom(array('a_id'=>456,'return'=>1),$_smarty_tpl);?>

		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-9">
            <div class="line-top"></div>
	    	<h1>Partners</h1>
	    	
	    	<ul class="nav nav-pills p-woche">
				
				<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>16),$_smarty_tpl);?>
">Distributors</a></li>
				<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>17),$_smarty_tpl);?>
">Ratecard</a></li>
				<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>24),$_smarty_tpl);?>
">Contact Us</a></li>
				<li class="active"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>14),$_smarty_tpl);?>
">Partners</a></li>
			</ul>
		</div>
		<div class="col-sm-3"></div>
	</div>
	
		
    <?php echo smarty_function_xr_atom(array('a_id'=>677,'return'=>1),$_smarty_tpl);?>

	
	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
	
	<?php if (($_smarty_tpl->tpl_vars['v']->value['URL']!='URL')&&($_smarty_tpl->tpl_vars['v']->value['URL']!='')){?>
	    <?php $_smarty_tpl->tpl_vars['url'] = new Smarty_variable($_smarty_tpl->tpl_vars['v']->value['URL'], null, null);?>
	<?php }else{ ?>
	    <?php $_smarty_tpl->tpl_vars['url'] = new Smarty_variable('', null, null);?>
	<?php }?>
	
    <div class="row">
	    <div class="col-sm-3">
		    <p><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>510,'class'=>"img-responsive"),$_smarty_tpl);?>
</p>
	    </div>
	    <div class="col-sm-9">
		    <div class="list-item">
				<h3><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
</h3>
				<p><?php echo $_smarty_tpl->tpl_vars['v']->value['TEXT'];?>
</p>
				
				<?php if (($_smarty_tpl->getVariable('url')->value!='')){?><p><a href="<?php echo $_smarty_tpl->getVariable('url')->value;?>
" target="_blank" class="openexternal">Open Website</a></p><?php }?>
		    </div>
	    </div>
    </div>
	
	<div class="row">
		<div class="col-sm-12">
		<hr>
		</div>
	</div>
	
	<?php }} ?>

	<p><a class="but" href="<?php echo $_smarty_tpl->getVariable('data')->value['LINK_OVERVIEW'];?>
">back</a></p>

