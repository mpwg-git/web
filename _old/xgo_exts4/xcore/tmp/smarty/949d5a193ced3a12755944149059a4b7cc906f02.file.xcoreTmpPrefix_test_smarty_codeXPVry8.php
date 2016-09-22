<?php /* Smarty version Smarty-3.0.7, created on 2014-07-28 14:23:04
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeXPVry8" */ ?>
<?php /*%%SmartyHeaderCode:61302342653d640a8ec0837-32495769%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '949d5a193ced3a12755944149059a4b7cc906f02' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeXPVry8',
      1 => 1406550184,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61302342653d640a8ec0837-32495769',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_events::sc_get_latest','var'=>'data'),$_smarty_tpl);?>


<?php if ($_smarty_tpl->getVariable('GA')->value['oeedit']==1){?>
<?php echo smarty_function_xr_siteCall(array('fn'=>'oe_preview::sc_get_events','var'=>'data'),$_smarty_tpl);?>

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
	    	<h1>Future Events</h1>
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        
    <div class="row">
	    <div class="col-sm-3">
		    <p><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['v']->value['URL'];?>
" class="openexternal"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>510,'class'=>"img-responsive"),$_smarty_tpl);?>
</a></p>
	    </div>
	    <div class="col-sm-9">
		    <div class="list-item">
    			<p><strong>
    			<?php echo $_smarty_tpl->tpl_vars['v']->value['DATEFROM'];?>

    				<?php if (($_smarty_tpl->tpl_vars['v']->value['DATETO']!="0000-00-00")){?>
                        to <?php echo $_smarty_tpl->tpl_vars['v']->value['DATETO'];?>
        
                    <?php }?>
                </strong></p>
				<span class="looklikeH1noBorder"><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
</span>
				<p><?php echo $_smarty_tpl->tpl_vars['v']->value['TEXT'];?>
</p>
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