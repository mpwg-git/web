<?php /* Smarty version Smarty-3.0.7, created on 2014-11-19 13:55:32
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8l3NaJ" */ ?>
<?php /*%%SmartyHeaderCode:165753944546ca1541a5da7-49585446%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3ef18db49a5342637d5e5dbcc7fc6ed798798aa' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code8l3NaJ',
      1 => 1416405332,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165753944546ca1541a5da7-49585446',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_ranking::sc_getStartRanking','ar_contactType_id'=>2,'var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_backend_countries','var'=>'countries'),$_smarty_tpl);?>


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
			<h1 style="position: relative;">Ranking <span id="ranking_loader"> </span></h1>
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	<div class="row">
		
		<div id="ranking-section-result" class="col-sm-9">
			<h2 id="ranking-section-title">Ad Agency </h2>
			<div id="ranking_content_container">
			    <?php echo smarty_function_xr_atom(array('a_id'=>665,'records'=>$_smarty_tpl->getVariable('data')->value,'return'=>1),$_smarty_tpl);?>

			</div>
		</div>
		
		
		<div class="col-sm-3" style="margin-top: 55px;">
			<br>
			<form>
				<ul class="listCD padLeft ranking-menu">
					<li class="IclientsND">
						<a href="#" class="ranking_filter" id="ranking_7" data-src="7">Client</a>
					</li>
					<li class="IagencyND">
						<a href="#" class="active ranking_filter" id="ranking_2" data-src="2">Ad Agency<span class="rankingCounter"></span></a>
					</li>
					<li class="Icreative-directorND">
						<a href="#" class="ranking_filter" id="ranking_16" data-src="16">Creative Director<span class="rankingCounter"></span></a>
					</li>
					<li class="Iart-directorND">
						<a href="#" class="ranking_filter" id="ranking_5" data-src="5">Art Director<span class="rankingCounter"></a>
					</li>
					<li class="IcopywriterND">
						<a href="#" class="ranking_filter" id="ranking_3" data-src="3">Copywriter<span class="rankingCounter"></a>
					</li>
					<li class="IphotographerND">
						<a href="#" class="ranking_filter" id="ranking_1" data-src="1">Photographer<span class="rankingCounter"></a>
					</li>
					<li class="IillustratorND">
						<a href="#" class="ranking_filter" id="ranking_4" data-src="4">Illustrator<span class="rankingCounter"></a>
					</li>
					<li class="ItypographerND">
						<a href="#" class="ranking_filter" id="ranking_13" data-src="13">Typographer<span class="rankingCounter"></a>
					</li>
					<li class="Idigital-artistND">
						<a href="#" class="ranking_filter" id="ranking_14" data-src="14">Digital Artist<span class="rankingCounter"></a>
					</li>
					<li class="IproductionND">
						<a href="#" class="ranking_filter" id="ranking_6" data-src="6">Production Company<span class="rankingCounter"></a>
					</li>
					<li class="IdirectorND">
						<a href="#" class="ranking_filter" id="ranking_8" data-src="8">Director<span class="rankingCounter"></a>
					</li>
					<li class="IinstituteND">
						<a href="#" class="ranking_filter" id="ranking_12" data-src="12">University / School<span class="rankingCounter"></a>
					</li>
					
			    	<li class="linieBottom allRanking" style="margin-top: 24px;">
						<div class="checkbox rankingSearchAll">
							<label><input type="checkbox" id="all-ranking">Search all Rankings</label>
						</div>
					</li>
				</ul>
				<br>
				<div class="form-group">
					<select id="select-country" class="form-control">
					    <option value="-1" selected>International</option>
						<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('countries')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['ac_id'];?>
"<?php if ($_smarty_tpl->tpl_vars['v']->value['ac_id']==$_smarty_tpl->getVariable('data')->value['COUNTRY']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['ac_name'];?>
</option>
						<?php }} ?>
					</select>
				</div>
				<div class="form-group">
					<select id="select-year" class="form-control">
					    <option value="0" selected>Current year</option>
					    <option value="1">Last year</option>
					    <option value="3">Last 3 years</option>
						<option value="5" selected="selected">Last 5 years</option>
						<option value="10">Last 10 years</option>
						<option value="all">Overall</option>
					</select>
				</div>
				<div class="input-group">
					<input type="text" class="form-control" id="rseach_field" value="" />
					<span class="input-group-btn">
						<button type="button" id="ranking-search" class="btn btn-default">Go!</button>
					</span>
				</div>
			</form>
			
		</div>
		
		
	</div>
<script>
$(document).ready(function(){
	fe_ranking.init(2);
});	
</script>
	
	
	