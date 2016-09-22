<?php /* Smarty version Smarty-3.0.7, created on 2014-07-24 19:42:34
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/524.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:89811823953d1458a362a58-03686237%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8c609fd0ad7137b894386fecfc541b4c7408e45' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/524.cache.html',
      1 => 1406223754,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89811823953d1458a362a58-03686237',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_magazine::sc_getFilterCombos','var'=>'combos'),$_smarty_tpl);?>


<form class="issue-suche">
	<div class="form-group">
        <div class="back-issues"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>10),$_smarty_tpl);?>
" id="current_issue" <?php if (($_smarty_tpl->getVariable('P_ID')->value==10||$_smarty_tpl->getVariable('P_ID')->value==56||$_smarty_tpl->getVariable('P_ID')->value==57)){?> style="font-weight: bold;"<?php }?>>Current Issue</a></div>
	    <div class="back-issues"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>55),$_smarty_tpl);?>
" id="back_issue" <?php if ($_smarty_tpl->getVariable('P_ID')->value==55){?> style="font-weight: bold;"<?php }?>>Back Issues</a></div>
        <div class="back-issues"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>117),$_smarty_tpl);?>
" id="back_issue" <?php if ($_smarty_tpl->getVariable('P_ID')->value==117){?> style="font-weight: bold;"<?php }?>>Specials</a></div>
        
        <!--
		<label style="float: left; padding-left: 18px; margin-right: 8px; border-left: 1px solid #dddddd;" class="magazine_filter_checkboxes_label">
			<input type="radio" value="Special" id="radio_specials" class="magazine_filter_checkboxes" name="optionsRadiosMagazine"> Special
		</label>
		<label style="float: left; padding-left: 7px; margin-right: 20px; border-left: 1px solid #dddddd;" class="magazine_filter_checkboxes_label">
			<input type="radio" checked="" value="Magazine" id="radio_issues" class="magazine_filter_checkboxes" name="optionsRadiosMagazine"> Magazine
		</label>
		-->
		
		
		<?php if ($_smarty_tpl->getVariable('P_ID')->value==55){?>
		
		<select class="form-control sel combo_issue_years" id="combo_issue_years">
			<option value="<?php echo smarty_function_xr_genlink(array('p_id'=>55),$_smarty_tpl);?>
">Year</option>
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('combos')->value['combo_issues_years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
		    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['k']->value==$_REQUEST['magazine_year']){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</option>
		    <?php }} ?>
		</select>
		<?php }?>
	
		<!-- 
		    <select class="form-control sel combo_issue_year_editions" id="combo_issue_year_editions_<?php echo $_smarty_tpl->getVariable('k')->value;?>
"<?php if ($_smarty_tpl->getVariable('data')->value['YEAR']!=$_smarty_tpl->getVariable('k')->value){?> style="display:none;"<?php }?>>
			<option value="-1">Issue</option>
			<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('v')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['o']->key;
?>
		    <option value="<?php echo $_smarty_tpl->tpl_vars['o']->value['em_id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['o']->value['em_name'];?>
" data-src="<?php echo $_smarty_tpl->tpl_vars['o']->value['em_link'];?>
"<?php if ($_smarty_tpl->getVariable('data')->value['YEAR']==$_smarty_tpl->getVariable('k')->value&&$_smarty_tpl->getVariable('data')->value['EDITION']==$_smarty_tpl->tpl_vars['o']->value['em_edition']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['o']->value['em_edition'];?>
</option>
		    <?php }} ?>
		    </select>
		 -->
		
		
		
		<?php if ($_smarty_tpl->getVariable('P_ID')->value==117){?>
		<select class="form-control sel combo_specials_years" id="combo_specials_years">
			<option value="<?php echo smarty_function_xr_genlink(array('p_id'=>117),$_smarty_tpl);?>
">Year</option>
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('combos')->value['combo_specials_years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
		    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['k']->value==$_REQUEST['special_year']){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</option>
		    <?php }} ?>
		</select>
		<?php }?>
		
		
		<!-- 
		<select class="form-control sel combo_specials_editions" id="combo_specials_editions_<?php echo $_smarty_tpl->getVariable('k')->value;?>
" style="display:none;">
			<option value="-1">Special</option>
			<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('v')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['o']->key;
?>
		    <option value="<?php echo $_smarty_tpl->tpl_vars['o']->value['em_id'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['o']->value['em_name'];?>
" data-src="<?php echo $_smarty_tpl->tpl_vars['o']->value['em_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['o']->value['em_name'];?>
</option>
		    <?php }} ?>
		-->
		</select>
		<div id="fe_core_loader"> </div>
		<div class="clearer"></div>
	</div>
</form>