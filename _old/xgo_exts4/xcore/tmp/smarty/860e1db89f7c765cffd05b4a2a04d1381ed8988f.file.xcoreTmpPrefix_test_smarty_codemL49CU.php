<?php /* Smarty version Smarty-3.0.7, created on 2014-11-27 09:07:41
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemL49CU" */ ?>
<?php /*%%SmartyHeaderCode:1555518075476e9dd964176-25060273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '860e1db89f7c765cffd05b4a2a04d1381ed8988f' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemL49CU',
      1 => 1417079261,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1555518075476e9dd964176-25060273',
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
		<div class="col-sm-3">
			<br>
			<form>
				<ul class="listCD padLeft ranking-menu">
					<li class="IclientsND linieBottom">
						<a href="#" class="ranking_filter" id="ranking_7" data-src="7">Client</a>
					</li>
					<li class="IagencyND linieBottom">
						<a href="#" class="active ranking_filter" id="ranking_2" data-src="2">Ad Agency<span class="rankingCounter"></span></a>
					</li>
					<li class="Icreative-directorND linieBottom">
						<a href="#" class="ranking_filter" id="ranking_16" data-src="16">Creative Director<span class="rankingCounter"></span></a>
					</li>
					<li class="Iart-directorND linieBottom">
						<a href="#" class="ranking_filter" id="ranking_5" data-src="5">Art Director<span class="rankingCounter"></a>
					</li>
					<li class="IcopywriterND linieBottom">
						<a href="#" class="ranking_filter" id="ranking_3" data-src="3">Copywriter<span class="rankingCounter"></a>
					</li>
					<li class="IphotographerND linieBottom">
						<a href="#" class="ranking_filter" id="ranking_1" data-src="1">Photographer<span class="rankingCounter"></a>
					</li>
					<li class="IillustratorND linieBottom">
						<a href="#" class="ranking_filter" id="ranking_4" data-src="4">Illustrator<span class="rankingCounter"></a>
					</li>
					<li class="ItypographerND linieBottom">
						<a href="#" class="ranking_filter" id="ranking_13" data-src="13">Typographer<span class="rankingCounter"></a>
					</li>
					<li class="Idigital-artistND linieBottom">
						<a href="#" class="ranking_filter" id="ranking_14" data-src="14">Digital Artist<span class="rankingCounter"></a>
					</li>
						<li class="IdirectorND linieBottom">
						<a href="#" class="ranking_filter" id="ranking_8" data-src="8">Director<span class="rankingCounter"></a>
					</li>
					<li class="IproductionND linieBottom">
						<a href="#" class="ranking_filter" id="ranking_6" data-src="6">Production Company<span class="rankingCounter"></a>
					</li>
				
					<li class="IinstituteND linieBottom">
						<a href="#" class="ranking_filter" id="ranking_12" data-src="12">University / School<span class="rankingCounter"></a>
					</li>
					
			    	<li class="linieBottom allRanking">
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
		<div id="ranking-section-result" class="col-sm-9">
			<h2 id="ranking-section-title">Ad Agency </h2>
			<div id="ranking_content_container">
			    <?php echo smarty_function_xr_atom(array('a_id'=>536,'records'=>$_smarty_tpl->getVariable('data')->value,'return'=>1),$_smarty_tpl);?>

			</div>
		</div>
	</div>
<script>
$(document).ready(function(){
	fe_ranking.init(2);
});	
</script>
	
	
	