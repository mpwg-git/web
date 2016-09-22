<?php /* Smarty version Smarty-3.0.7, created on 2015-02-02 16:54:41
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemmTMmP" */ ?>
<?php /*%%SmartyHeaderCode:14370942354cf9dc1170573-00701685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae9c4e4e801ee09cdda27dec103f1597f3bc2fc5' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemmTMmP',
      1 => 1422892481,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14370942354cf9dc1170573-00701685',
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
	
		
    <?php echo smarty_function_xr_atom(array('a_id'=>677,'return'=>1),$_smarty_tpl);?>

	
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
" class="openexternal"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>510,'class'=>"img-responsive leichterrahmen"),$_smarty_tpl);?>
</a></p>
	    </div>
	    <div class="col-sm-9">
		    <div class="list-item">
		        <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['v']->value['URL'];?>
">
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
				</a>
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