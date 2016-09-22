<?php /* Smarty version Smarty-3.0.7, created on 2014-09-25 04:47:07
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyQaGTZ" */ ?>
<?php /*%%SmartyHeaderCode:194142325754239e4b6e2129-06077930%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19c3f189820c75161748486c21242be70e7c06da' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyQaGTZ',
      1 => 1411620427,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194142325754239e4b6e2129-06077930',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?>    <!-- quicksearch -->
	<div class="row">
		<div class="col-sm-12">
	        <?php echo smarty_function_xr_atom(array('a_id'=>456,'return'=>1),$_smarty_tpl);?>

		</div>
	</div>
    <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_thisweek::sc_get_dropdowns','var'=>'dropdowns'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_thisweek::sc_get_this_week','var'=>'thisweek'),$_smarty_tpl);?>

    <div class="row">
		<div class="col-sm-9">
		<div class="line-top"></div>
		<form class="issue-suche2">
			<h1>Features</h1>
			<div class="form-group floatLeft" style="display: none;">
				<select class="form-control sel" id="features-year-filter">
				    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dropdowns')->value['years']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['oetw_year'];?>
"<?php if ($_smarty_tpl->tpl_vars['v']->value['oetw_year']==$_smarty_tpl->getVariable('dropdowns')->value['feature_year']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['oetw_year'];?>
</option>
				    <?php }} ?>
				</select>
				<select class="form-control sel" id="features-week-filter">
				    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('dropdowns')->value['weeks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				    <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"<?php if ((count($_smarty_tpl->getVariable('dropdowns')->value['weeks'])-$_smarty_tpl->tpl_vars['k']->value)==$_smarty_tpl->getVariable('dropdowns')->value['feature_week']){?> selected="selected"<?php }?>>Week <?php echo count($_smarty_tpl->getVariable('dropdowns')->value['weeks'])-$_smarty_tpl->tpl_vars['k']->value;?>
</option>
				    <?php }} ?>
				</select>
				<div id="fe_core_loader" style="display: none;"> </div>
				<div class="clearer"></div>
			</div>
			<div class="clearer"></div>
		</form>
		<ul class="nav nav-pills p-woche nav-slider">
			<li class="fix-tabs0" id="features-slider-tab--1"><a href="" class="features-slider-tabs features-slider-tabs2" data-id="-1">All</a></li>
			<li class="fix-tabs1" id="features-slider-tab-0"><a href="" class="features-slider-tabs features-slider-tabs2" data-id="0">Audiovisual</a></li>
			<li class="fix-tabs2" id="features-slider-tab-1"><a href="" class="features-slider-tabs features-slider-tabs2" data-id="1">Campaigns</a></li>
			<li class="fix-tabs3" id="features-slider-tab-2"><a href="" class="features-slider-tabs features-slider-tabs2" data-id="2">Who's Who</a></li>
			<li class="fix-tabs4" id="features-slider-tab-3"><a href="" class="features-slider-tabs features-slider-tabs2" data-id="3">Digital</a></li>
			<li class="fix-tabs5" id="features-slider-tab-4"><a href="" class="features-slider-tabs features-slider-tabs2" data-id="4">Editor's Blog</a></li>
		</ul>

        <script>
        
        
        $( document ).ready(function() {
  
            $('.features-slider-tabs2').click(function(){
                
                var url="/en/features.html?DISABLE_FULL_CACHE&r_id="+(parseInt($(this).data('id'),10)+1);
                var div = "FULL_REPLACE_FEATURES_TYPE";                
                
				$('#'+div).css("position", "relative");
				$('#'+div).append('<div class="pageroverlay">&nbsp;</div>');

                
                fe_core.loadFragment2({

    				loading_el_animation: $('#fe_core_loader'),

    				loading_el: $('h1'),
    				loading_txt: "FEATURES",
    
    				div: div,
    				url: url,
    				
    				scope: this,
    				cb: function(){
    					$('h1').html("FEATURES");
    					fe_core.pagerInit();
    				}

			    });
                
                
            });
  
        });
        
        
        </script>


		</div>
		<div class="col-sm-3"></div>
    </div>
    
    <div class="row">
	    <div class="col-sm-12">


        	<div id="content-slider-tabs" class="royalSlider contentSlider rsDefault">
        		<div>
        			<span class="rsTmb">Audiovisual</span>
        			<p class="labelpic"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>60,'r_id'=>$_smarty_tpl->getVariable('thisweek')->value[0]['ID'],'m_suffix'=>($_smarty_tpl->getVariable('thisweek')->value[0]['TITLE'])),$_smarty_tpl);?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('thisweek')->value[0]['IMG'],'w'=>1108,'h'=>340,'rmode'=>'cco','class'=>"img-responsive rsImg"),$_smarty_tpl);?>
</a></p>
        			
        		</div>
        		<div>
        			<span class="rsTmb">Campaigns</span>
        			<p class="labelpic"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>61,'r_id'=>$_smarty_tpl->getVariable('thisweek')->value[1]['ID'],'m_suffix'=>($_smarty_tpl->getVariable('thisweek')->value[1]['TITLE'])),$_smarty_tpl);?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('thisweek')->value[1]['IMG'],'w'=>1108,'h'=>340,'rmode'=>'cco','class'=>"img-responsive rsImg"),$_smarty_tpl);?>
</a></p>
        			
        		</div>
        		<div>
        			<span class="rsTmb">Who's Who</span>
        			<p class="labelpic"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>62,'r_id'=>$_smarty_tpl->getVariable('thisweek')->value[2]['ID'],'m_suffix'=>($_smarty_tpl->getVariable('thisweek')->value[2]['TITLE'])),$_smarty_tpl);?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('thisweek')->value[2]['IMG'],'w'=>1108,'h'=>340,'rmode'=>'cco','class'=>"img-responsive rsImg"),$_smarty_tpl);?>
</a></p>
        			
        		</div>
        		<div>
        			<span class="rsTmb">Digital</span>
        			<p class="labelpic"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>63,'r_id'=>$_smarty_tpl->getVariable('thisweek')->value[3]['ID'],'m_suffix'=>($_smarty_tpl->getVariable('thisweek')->value[3]['TITLE'])),$_smarty_tpl);?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('thisweek')->value[3]['IMG'],'w'=>1108,'h'=>340,'rmode'=>'cco','class'=>"img-responsive rsImg"),$_smarty_tpl);?>
</a></p>
        			
        		</div>
        		<div>
        			<span class="rsTmb">Editor's Blog</span>
        			<p class="labelpic"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>64,'r_id'=>$_smarty_tpl->getVariable('thisweek')->value[4]['ID'],'m_suffix'=>($_smarty_tpl->getVariable('thisweek')->value[4]['TITLE'])),$_smarty_tpl);?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('thisweek')->value[4]['IMG'],'w'=>1108,'h'=>340,'rmode'=>'cco','class'=>"img-responsive rsImg"),$_smarty_tpl);?>
</a></p>
        			
        		</div>
        	</div>

		</div>
	</div>