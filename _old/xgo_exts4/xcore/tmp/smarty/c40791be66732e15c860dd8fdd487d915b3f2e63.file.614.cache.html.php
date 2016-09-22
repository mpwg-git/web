<?php /* Smarty version Smarty-3.0.7, created on 2014-08-05 16:29:15
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/614.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:113337894253e0ea3b82c138-30431664%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c40791be66732e15c860dd8fdd487d915b3f2e63' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/614.cache.html',
      1 => 1407248955,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113337894253e0ea3b82c138-30431664',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_thisweek::sc_detailpage_get_id','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_thisweek::sc_get_this_week','var'=>'thisweek'),$_smarty_tpl);?>




<div class="row">
	<div class="col-sm-12">
		<a class="navbar-brandCont" href="<?php echo smarty_function_xr_genlink(array('p_id'=>2),$_smarty_tpl);?>
">Lürzer's Archiv</a>
	</div>
</div>
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
			<h1>Features</h1>
			<div class="form-group floatLeft">
			    <input type="hidden" name="page_id" id="page_id" value="<?php echo $_smarty_tpl->getVariable('P_ID')->value;?>
" />
				<select class="form-control sel" id="features-detail-year-filter">
				    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['dropdowns']['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['oetw_year'];?>
"<?php if ($_smarty_tpl->tpl_vars['v']->value['oetw_year']==$_smarty_tpl->getVariable('data')->value['dropdowns']['feature_year']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['oetw_year'];?>
</option>
				    <?php }} ?>
				</select>
				<select class="form-control sel" id="features-detail-week-filter">
				    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['dropdowns']['weeks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"<?php if ((count($_smarty_tpl->getVariable('data')->value['dropdowns']['weeks'])-$_smarty_tpl->tpl_vars['k']->value)==$_smarty_tpl->getVariable('data')->value['dropdowns']['feature_week']){?> selected="selected"<?php }?>>Week <?php echo count($_smarty_tpl->getVariable('data')->value['dropdowns']['weeks'])-$_smarty_tpl->tpl_vars['k']->value;?>
</option>
				    <?php }} ?>
				</select>
				<div id="fe_core_loader" style="display: none;"> </div>
				<div class="clearer"></div>
			</div>
			<div class="clearer"></div>
		</form>
		<ul class="nav nav-pills p-woche">
			<li class="tit"><h1>WEEK <?php echo $_smarty_tpl->getVariable('data')->value['data']['KW'];?>
 / <?php echo $_smarty_tpl->getVariable('data')->value['data']['YEAR'];?>
</h1></li>
			<li class="fix-tabs1<?php if ($_smarty_tpl->getVariable('P_ID')->value==60){?> active<?php }?>"><a href="<?php echo $_smarty_tpl->getVariable('thisweek')->value[0]['LINK'];?>
">Audiovisual</a></li>
			<li class="fix-tabs2<?php if ($_smarty_tpl->getVariable('P_ID')->value==61){?> active<?php }?>"><a href="<?php echo $_smarty_tpl->getVariable('thisweek')->value[1]['LINK'];?>
">Campaigns</a></li>
			<li class="fix-tabs3<?php if ($_smarty_tpl->getVariable('P_ID')->value==62){?> active<?php }?>"><a href="<?php echo $_smarty_tpl->getVariable('thisweek')->value[2]['LINK'];?>
">Who's Who</a></li>
			<li class="fix-tabs4<?php if ($_smarty_tpl->getVariable('P_ID')->value==63){?> active<?php }?>"><a href="<?php echo $_smarty_tpl->getVariable('thisweek')->value[3]['LINK'];?>
">Digital</a></li>
			<li class="fix-tabs5<?php if ($_smarty_tpl->getVariable('P_ID')->value==64){?> active<?php }?>"><a href="<?php echo $_smarty_tpl->getVariable('thisweek')->value[4]['LINK'];?>
">Editor's Blog</a></li>
		</ul>
	</div>
	<div class="col-sm-3"></div>
</div>
<div class="row">
	<div class="col-sm-12">
		<p><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['data']['IMG'],'ext'=>'jpg','alt'=>"Banner",'class'=>"img-responsive"),$_smarty_tpl);?>
</p>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<h2><?php echo $_smarty_tpl->getVariable('data')->value['data']['TITLE'];?>
</h2>
	</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<?php echo $_smarty_tpl->getVariable('data')->value['data']['COLLEFTPRE'];?>

	</div>
	<div class="col-sm-6">
		<?php echo $_smarty_tpl->getVariable('data')->value['data']['COLRIGHTPRE'];?>

	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<hr />
		<div class="share">
		    <?php echo smarty_function_xr_atom(array('a_id'=>461,'return'=>1),$_smarty_tpl);?>

		</div>
		<div class="clearer"></div>
	</div>
</div>

<script>
    $(document).ready(function() {
        fe_count.view('THISWEEK',<?php echo $_smarty_tpl->getVariable('data')->value['data']['ID'];?>
);
    });
</script>
