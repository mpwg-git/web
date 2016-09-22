<?php /* Smarty version Smarty-3.0.7, created on 2014-09-30 16:07:39
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/507.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:1617424891542ad54b8be3b3-03819125%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ecbc8894b19ec050ceb8a9a2a2f784fd8bea2a5' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/507.cache.html',
      1 => 1412093218,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1617424891542ad54b8be3b3-03819125',
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

    <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_thisweek::sc_get_this_week','var'=>'thisweek'),$_smarty_tpl);?>

    <div class="row">
		<div class="col-sm-9">
		    <div class="line-top"></div>
    		<ul class="nav nav-pills p-woche nav-slider startfeatures">
    			<li class="tit"><h1>Features</h1></li>
    			<li class="fix-tabs1" id="features-slider-tab-0"><a href="" class="features-slider-tabs" data-id="0">Audiovisual</a></li>
    			<li class="fix-tabs2" id="features-slider-tab-1"><a href="" class="features-slider-tabs" data-id="1">Campaigns</a></li>
    			<li class="fix-tabs3" id="features-slider-tab-2"><a href="" class="features-slider-tabs" data-id="2">Who's Who</a></li>
    			<li class="fix-tabs4" id="features-slider-tab-3"><a href="" class="features-slider-tabs" data-id="3">Digital</a></li>
    			<li class="fix-tabs5" id="features-slider-tab-4"><a href="" class="features-slider-tabs" data-id="4">Editor's Blog</a></li>
    		</ul>
		</div>
		<div class="col-sm-3"></div>
    </div>
    
    <div class="row features-startseiten-row">
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