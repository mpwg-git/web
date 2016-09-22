<?php /* Smarty version Smarty-3.0.7, created on 2015-02-02 16:13:33
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/468.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:19008690354cf941da37f66-74264551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83ca369d661c75bafd50f0b86a6f84982045d920' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/468.cache.html',
      1 => 1422890012,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19008690354cf941da37f66-74264551',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_search::sc_getSearchCfg','var'=>'searchCfg'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_magazine::sc_getFilterCombos','var'=>'magazinecombos'),$_smarty_tpl);?>


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
		    <h1 style="position: relative;">Archive <span id="archive_loader"></h1>
		    <input class="form-control" id="searchFullText" placeholder="search term" type="text" value=''>
		    <div id="searchexplanation">&nbsp;</div>
		</div>
		<div class="col-sm-3"></div>
	</div>
	
    <?php echo smarty_function_xr_atom(array('a_id'=>677,'return'=>1),$_smarty_tpl);?>

    
	
	
<div class="row">
	<div id="filterDiv" class="col-sm-3">

		<div class="filter-box">
		    <h3 class="panel-title searchAdvanced"><a data-toggle="collapse" data-parent="#accordion" href="#advanced-filter" id="advancedsearch" class="collapsed">ADVANCED SEARCH</a></h3>
			
			<div id="advanced-filter" class="panel-collapse collapse collapsed">
				<div class="checkbox">
				    <label><input type="checkbox" class='media_type_value'  value="AM_TYPE_PRINT"><span class="labeltext">Print</span></label>
				</div>
				<div class="checkbox">
				    <label><input type="checkbox" class='media_type_value'  value="AM_TYPE_TV"><span class="labeltext">Video</span></label>
				</div>
				<div class="checkbox">
				    <label><input type="checkbox" class='media_type_value'  value="AM_TYPE_DIGITAL"><span class="labeltext">Digital</span></label>
				</div>
			
				<hr />
				
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('searchCfg')->value['contact_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
?>
				<div class="checkbox">
					<label><input type="checkbox" class='contact_types_value' value="<?php echo $_smarty_tpl->tpl_vars['v']->value['act_id'];?>
"><span class="labeltext"><?php echo $_smarty_tpl->tpl_vars['v']->value['act_description'];?>
</span></label>
				</div>
				<div id="wrapper_input_searcher_contact_<?php echo $_smarty_tpl->tpl_vars['v']->value['act_id'];?>
" class="inputtokenwrapper" style="display:none; overflow: hidden;">
				    <input type="text" class="contact_types_value_search" data-type="<?php echo $_smarty_tpl->tpl_vars['v']->value['act_id'];?>
" id="input_searcher_contact_<?php echo $_smarty_tpl->tpl_vars['v']->value['act_id'];?>
" name="input_searcher_contact_<?php echo $_smarty_tpl->tpl_vars['v']->value['act_id'];?>
" />
			    </div>
			    <script>
			        $(document).ready(function(){
                    	fe_search.registerTokens(<?php echo $_smarty_tpl->tpl_vars['v']->value['act_id'];?>
);
                    });
			    </script>
			    <?php }} ?>
                
                <form class='fullSearchForm'>
        	    	<div class="input-group">
        			    <span class="input-group-btn">
            				<button type="button" class="btn btn-default searchButton">Go!</button>
            				<button type="button" class="btn btn-default searchResetButton">Reset</button>
            			</span>
        		    </div>
        		</form>
                
                <hr/>					
                
                <div class="searchMultiple">
				<label>Categories
					<select multiple class="form-control txFeld searchMultiple" id='categories_values' name='categories_values'>
                        <option value="-1">All</option>
					    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('searchCfg')->value['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
?>
						    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['ac_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['ac_name'];?>
</option>
					    <?php }} ?>

					</select>
                </label>
                </div>
                
                <div class="searchMultiple">
                <label>Countries
                    <select multiple class="form-control txFeld" id='countries_values' name='countries_values'>
				        <option value="-1">International</option>
    					<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('searchCfg')->value['countries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
?>
    						<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['ac_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['ac_name'];?>
</option>
    					<?php }} ?>
					
					</select>
                </label>
                </div>
                <hr/>

				<div class="radio">
					<label>
						<input name="timePeriod" id="optionsRadios0" value="ALL" checked="" type="radio" checked> All Magazines
					</label>
				</div>
				
				<div class="radio">
					<label>
						<input name="timePeriod" id="optionsRadios1" value="TIME"  type="radio"> Published in Lürzer's Archive
					</label>
				</div>
						
				<div class="form-group">
					<div class="row">
					    <div class="col-sm-2">
							<p>from</p>
						</div>
						<div class="col-sm-10">
							<select class="form-control selL" id='TIME_MONTH_START'>
								<option value="01">January</option>
								<option value="02">February</option>
								<option value="03">March</option>
								<option value="04">April</option>
								<option value="05">May</option>
								<option value="06">June</option>
								<option value="07">July</option>
								<option value="08">August</option>
								<option value="09">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
							<select class="form-control selL" id='TIME_YEAR_START'>
								<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('magazinecombos')->value['combo_issues_years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                				    <?php if ($_smarty_tpl->tpl_vars['k']->value!=''){?>
                				    <option><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</option>
                				    <?php }?>
                				<?php }} ?>
							</select>
						</div>
					</div>
					<br />
					<div class="row">
						<div class="col-sm-2">
							<p>to</p>
						</div>
						<div class="col-sm-10">
							<select class="form-control selL" id='TIME_MONTH_END'>
								<option value="01">January</option>
								<option value="02">February</option>
								<option value="03">March</option>
								<option value="04">April</option>
								<option value="05">May</option>
								<option value="06">June</option>
								<option value="07">July</option>
								<option value="08">August</option>
								<option value="09">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
							<select class="form-control selL" id='TIME_YEAR_END'>
							  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('magazinecombos')->value['combo_issues_years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            				    <?php if ($_smarty_tpl->tpl_vars['k']->value!=''){?>
            				    <option><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</option>
            				    <?php }?>
            				<?php }} ?>
							</select>
						</div>
					</div>
				</div>
						
				<hr />
				
				<div class="radio">
					<label>
						<input name="timePeriod" id="optionsRadios2" value="ISSUE"  type="radio"> Published in Lürzer's Archive Issue
					</label>
				</div>
				
				<div class="form-group">
					<select class="form-control selL" id='ISSUE_EDITION'>
						<option>06</option>
						<option>05</option>
						<option>04</option>
						<option>03</option>									
						<option>02</option>
						<option>01</option>
					</select>
					<select class="form-control selL" id='ISSUE_YEAR'>
						
        				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('magazinecombos')->value['combo_issues_years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        				    <?php if ($_smarty_tpl->tpl_vars['k']->value!=''){?>
        				    <option><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</option>
        				    <?php }?>
        				<?php }} ?>
					</select>
				</div>
				
				<hr />
						
				<div class="radio">
					<label>
						<input name="timePeriod" id="optionsRadios3" value="SPECIAL"  type="radio"> Published in Lürzer's Archive Special
					</label>
				</div>
				
				<div class="form-group">
					<select class="form-control"  id='SEPCIAL_YEAR'>
						
						<?php  $_smarty_tpl->tpl_vars['v2'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('magazinecombos')->value['combo_specials_editions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v2']->key => $_smarty_tpl->tpl_vars['v2']->value){
?>
    						
    						<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['v2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
?>
    						<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['em_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['em_name'];?>
</option>
    					    <?php }} ?>
    						
    					<?php }} ?>
						
						
						
					</select>
				</div>
				
				<div class="form-group width100p" style='display:none;'>
				<label>Results per Section
					<select class="form-control" id='LIMIT_RESULTS'>
						<option selected>12</option>
						<option>24</option>
						<option>48</option>
						<option>72</option>
					</select>
				</label>
				</div>

    	    	<form class='fullSearchForm'>
        	    	<div class="input-group">
        			    <span class="input-group-btn">
            				<button type="button" class="btn btn-default searchButton">Go!</button>
            				<button type="button" class="btn btn-default searchResetButton">Reset</button>
            			</span>
        		    </div>
        		</form>

			</div>
				
		</div>
	</div>


		
		            
		
	
	
	
	<div class="col-sm-9" id='searchResultsTabs'>
		<div class="row">
			<div class="col-sm-12" id="filter-section-result">
				<ul class="nav nav-pills p-woche">
					
					<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('startSet')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    					<li class='searchTab searchStartTab'><a data-toggle="tab" href="#tab-start-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">MOST VIEWED <?php echo $_smarty_tpl->tpl_vars['v']->value['LABEL'];?>
</a></li>
                    <?php }} ?>
					
				</ul>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				<div class="tab-content">
					
					<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('startSet')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
					
						<div id="tab-start-<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="tab-pane active">
    					    <?php echo $_smarty_tpl->tpl_vars['v']->value['HTML'];?>

    					</div>
                    <?php }} ?>
					
				</div>
			</div>
		</div>
	</div>
	

	
</div>

<script>
$(document).ready(function(){
	fe_search.init();
});
</script>


