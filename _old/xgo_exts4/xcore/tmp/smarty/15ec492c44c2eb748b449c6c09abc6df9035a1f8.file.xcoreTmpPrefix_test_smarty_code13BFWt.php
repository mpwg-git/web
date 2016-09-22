<?php /* Smarty version Smarty-3.0.7, created on 2014-08-13 17:04:20
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code13BFWt" */ ?>
<?php /*%%SmartyHeaderCode:85463636453eb7e747d79a3-67319493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15ec492c44c2eb748b449c6c09abc6df9035a1f8' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code13BFWt',
      1 => 1407942260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85463636453eb7e747d79a3-67319493',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?><?php if ($_smarty_tpl->getVariable('GA')->value['oeedit']==1){?>
<?php echo smarty_function_xr_siteCall(array('fn'=>'oe_preview::sc_get_student_interview','var'=>'winner'),$_smarty_tpl);?>

<?php }else{ ?>
<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_students::sc_get_dropdowns','var'=>'dropdowns'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_students::sc_getNominations','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_students::sc_get_interview','var'=>'winner'),$_smarty_tpl);?>

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
		
		    <form class="issue-suche">
    		    <h1>Students Contest</h1>
    		    <?php if ($_smarty_tpl->getVariable('GA')->value['oeedit']==1){?>
    		    <?php }else{ ?>
    		    <div class="form-group floatLeft">
					<select id="students-year-filter" class="form-control sel">
					<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dropdowns')->value['dropdown']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
					    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['url'];?>
"<?php if ($_smarty_tpl->getVariable('dropdowns')->value['students_year']==$_smarty_tpl->tpl_vars['v']->value['year']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['year'];?>
</option>
					<?php }} ?>
					</select>
					<div id="fe_core_loader" style="display: none;"> </div>
					<div class="clearer"></div>
				</div>
				<?php }?>
				<div class="clearer"></div>
			</form>
		    
		    <ul class="nav nav-pills p-woche">
				<li class="active"><a href="#">Current Year</a></li>
				<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>30),$_smarty_tpl);?>
">Vote for the students contest</a></li>
			</ul>
		    
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	<div class="row">
		<div class="col-sm-9 prevent-overflow">
			<h2><?php echo $_smarty_tpl->getVariable('winner')->value['TITLE'];?>
</h2>
			<?php echo $_smarty_tpl->getVariable('winner')->value['TEXT'];?>

		</div>
		<div class="col-sm-3">
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('winner')->value['GALLERY']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
			  <p><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['SRC'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['v']->value['ALT'];?>
" longdesc="<?php echo $_smarty_tpl->tpl_vars['v']->value['DESC'];?>
" class="img-responsive">
			      <span class="gallerycaption"><?php echo $_smarty_tpl->tpl_vars['v']->value['DESC'];?>
</span>
			  </p>
			<?php }} ?>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
		    <br />
		    <?php if ($_smarty_tpl->getVariable('dropdowns')->value['previous']!=''){?>
		    <a class="but but-prev" style="margin-right: 6px;" href="<?php echo $_smarty_tpl->getVariable('dropdowns')->value['previous'];?>
">Previous Year</a>
		    <?php }?>
		    <?php if ($_smarty_tpl->getVariable('dropdowns')->value['next']!=''){?>
		    <a class="but but-prev" href="<?php echo $_smarty_tpl->getVariable('dropdowns')->value['next'];?>
">Next Year</a>
		    <?php }?>
			<br /><br />
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<h2 class="linieBottom">Nominations</h2>
		</div>
	</div>
	
	<div class="row">
	
	    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    		<div class="col-sm-4">
    			<div class="lw-item"> 
    				<h3 class="nowra"><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
&nbsp;</h3>
    				<p class="labelpic"><a href="<?php echo smarty_function_xr_genlink(array('m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['TITLE'])."-".($_smarty_tpl->tpl_vars['v']->value['ID']),'r_id'=>$_smarty_tpl->tpl_vars['v']->value['ID'],'p_id'=>29),$_smarty_tpl);?>
"><?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>698,'h'=>416,'rmode'=>"cco",'q'=>85,'var'=>"thumb"),$_smarty_tpl);?>
<img class="lazy img-responsive" with="698" height="416" src="<?php echo $_smarty_tpl->getVariable('prethumb')->value['src'];?>
" data-original="<?php echo $_smarty_tpl->getVariable('thumb')->value['src'];?>
"></a></p>
    			</div>
    		</div>
    		
    		<?php $_smarty_tpl->tpl_vars['k1'] = new Smarty_variable($_smarty_tpl->tpl_vars['k']->value+1, null, null);?>
    		<?php if ($_smarty_tpl->getVariable('k1')->value%3==0){?></div><div class="row"><?php }?>
    	<?php }} ?>
		
	</div>