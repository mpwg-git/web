<?php /* Smarty version Smarty-3.0.7, created on 2015-02-02 16:52:37
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code4CwvAt" */ ?>
<?php /*%%SmartyHeaderCode:94411034154cf9d453469f1-77281129%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc64034f5d4113f1cf0386afba306997d25b5976' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code4CwvAt',
      1 => 1422892357,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '94411034154cf9d453469f1-77281129',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_profiles::sc_get_latest','var'=>'data'),$_smarty_tpl);?>


    <!-- logo row -->
	<?php echo smarty_function_xr_atom(array('a_id'=>459,'return'=>1),$_smarty_tpl);?>

	
	
	<div class="row">
		<div class="col-sm-9">
		<!-- quicksearch -->
			<?php echo smarty_function_xr_atom(array('a_id'=>456,'return'=>1),$_smarty_tpl);?>

	    	<h1>Profiles</h1>
	    	
	    	
	    	
	    	<ul class="nav nav-pills p-woche">
				<li class="active"><a data-toggle="tab" href="#profiles">Featured</a></li>
				<li><a data-toggle="tab" href="#searchtab" id="searchtogglelink">Search</a></li>
			</ul>
	    	
	    	
		</div>
	</div>
	
		
    <?php echo smarty_function_xr_atom(array('a_id'=>677,'return'=>1),$_smarty_tpl);?>

	
	<div class="tab-content">
	    
	    <!-- profiles -->
	    <div id="profiles" class="tab-pane active">
	       
	        <?php echo smarty_function_xr_img(array('s_id'=>270410,'w'=>888,'h'=>592,'rmode'=>"cco",'q'=>85,'var'=>"prethumb"),$_smarty_tpl);?>

        	
        	<?php echo $_smarty_tpl->getVariable('data')->value;?>

        	</div>
	        
        </div>
        <!-- profiles end -->
    
         <!-- search -->
		<div id="searchtab" class="tab-pane">
            <form class="navbar-form suche" role="search" id="profilesearchForm" action="" style="position: relative;">
                <div class="form-group" style="position: relative;">
            		<input type="text" class="form-control" placeholder="Search in Profiles" id="profilesearchInput"><button type="submit" id="profilesearchSubmit" class="btn btn-default" style="min-width: 42px;">OK</button>
            	    <div id="profilesearch_loader"> </div>
            	</div>
        	</form>
        	<div class="row profilesearchResult">
        	    <div class="col-sm-12">
        	    Please enter search term.
        	    </div>
        	</div>
        	
        </div>
        <!-- search -->
            
    </div>
	
</div>
<div>