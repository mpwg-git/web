<?php /* Smarty version Smarty-3.0.7, created on 2015-02-02 16:57:27
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/473.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:98167239954cf9e67de6269-97916479%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0543f46f145f6dbc2b7f4ccae2863c1effd2a76f' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/473.cache.html',
      1 => 1422892644,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98167239954cf9e67de6269-97916479',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_distributors::sc_get_latest','var'=>'items'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_distributors::sc_get_dropdown','var'=>'dropdown'),$_smarty_tpl);?>



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
		    <h1>Distributors</h1>
		    
		    <ul class="nav nav-pills p-woche">
				<li class="active"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>16),$_smarty_tpl);?>
">Distributors</a></li>
				<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>17),$_smarty_tpl);?>
">Ratecard</a></li>
        		<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>24),$_smarty_tpl);?>
">Contact Us</a></li>
				<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>14),$_smarty_tpl);?>
">Partners</a></li>
			</ul>
		    
		</div>
		<div class="col-sm-3"></div>
	</div>
	
		
    <?php echo smarty_function_xr_atom(array('a_id'=>677,'return'=>1),$_smarty_tpl);?>

	
	<div class="row">
		<div class="col-sm-3">
			<form class="distributors-suche">
				<div class="form-group">
					<select class="form-control sel" id="distributors-countries">
					    <option value="<?php echo smarty_function_xr_genlink(array('p_id'=>16),$_smarty_tpl);?>
">All Countries</option>
    				    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dropdown')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    				    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['url'];?>
"<?php if ($_smarty_tpl->getVariable('REQUEST')->value['r_id']==$_smarty_tpl->tpl_vars['v']->value['id']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
    				    <?php }} ?>
					</select>
					<div id="fe_core_loader" style="display: none;"> </div>
				</div>
			</form>
		</div>
	</div>
	
	<br />
	
	<div class="row distributors">
		<div class="col-sm-12">
		    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('items')->value['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
			<table>
				<tbody>
				<tr>
					<th>Company
					</th><td><?php echo $_smarty_tpl->tpl_vars['v']->value['COMPANY'];?>
</td>
				</tr>
				
				<?php if ($_smarty_tpl->tpl_vars['v']->value['ADRESS']!=''){?>
				<tr>
					<th>Street
					</th><td><?php echo $_smarty_tpl->tpl_vars['v']->value['ADRESS'];?>
</td>
				</tr>
				<?php }?>
				<tr>
					<th>ZIP/City
					</th><td><?php echo $_smarty_tpl->tpl_vars['v']->value['ZIP'];?>
 <?php echo $_smarty_tpl->tpl_vars['v']->value['CITY'];?>
</td>
				</tr>
				
				<?php if ($_smarty_tpl->tpl_vars['v']->value['COUNTRY']!=''){?>
				<tr>
					<th>Country
					</th><td><?php echo $_smarty_tpl->tpl_vars['v']->value['COUNTRY'];?>
</td>
				</tr>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['v']->value['PHONE']!=''){?>
				<tr>
					<th>Phone
					</th><td><?php echo $_smarty_tpl->tpl_vars['v']->value['PHONE'];?>
</td>
				</tr>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['v']->value['FAX']!=''){?>
				<tr>
					<th>Fax
					</th><td><?php echo $_smarty_tpl->tpl_vars['v']->value['FAX'];?>
</td>
				</tr>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['v']->value['EMAIL']!=''){?>
				<tr>
					<th>Email
					</th><td><a href="mailto:<?php echo $_smarty_tpl->tpl_vars['v']->value['EMAIL'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['EMAIL'];?>
</a></td>
				</tr>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['v']->value['URL']!=''){?>
				<tr>
					<th>Website
					</th><td><a href="http://<?php echo $_smarty_tpl->tpl_vars['v']->value['URL'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['URL'];?>
</a></td>
				</tr>
				<?php }?>
			</tbody></table>
			<hr>
			</table>
			<?php }} ?>
		</div>
	</div>

	
	