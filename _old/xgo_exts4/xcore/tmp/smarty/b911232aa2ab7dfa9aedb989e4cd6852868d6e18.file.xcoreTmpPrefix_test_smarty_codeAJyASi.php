<?php /* Smarty version Smarty-3.0.7, created on 2014-10-09 14:06:58
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAJyASi" */ ?>
<?php /*%%SmartyHeaderCode:58703825254369682ba6295-60148535%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b911232aa2ab7dfa9aedb989e4cd6852868d6e18' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeAJyASi',
      1 => 1412863618,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58703825254369682ba6295-60148535',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_profile::sc_get_my_details','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_archive::getMySubmissions','var'=>'work'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_archive::getMyFilmSubmissions','var'=>'film'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_my_archive::getMyStudentsSubmissions','var'=>'students'),$_smarty_tpl);?>

    <!-- logo row -->
	<?php echo smarty_function_xr_atom(array('a_id'=>459,'return'=>1),$_smarty_tpl);?>

	
	<?php if ($_REQUEST['debug']==1){?><?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('work')->value),$_smarty_tpl);?>
<?php }?>
	
	<!-- quicksearch -->
	<div class="row">
		<div class="col-sm-12">
	        <?php echo smarty_function_xr_atom(array('a_id'=>456,'return'=>1),$_smarty_tpl);?>

		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-9">
		    <div class="line-top"></div>
		    <h1>My Archive</h1>
		    
		    <ul class="nav nav-pills p-woche">
				<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>38),$_smarty_tpl);?>
">My Campaigns</a></li>
				<?php if ($_smarty_tpl->getVariable('data')->value['BEYONDARCHIVE']>0){?><li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>40),$_smarty_tpl);?>
">Beyond Archive</a></li><?php }?>
				<li class="active"><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>41),$_smarty_tpl);?>
">My Submissions</a></li>
				<li><a href="<?php echo smarty_function_xr_genlink(array('p_id'=>42),$_smarty_tpl);?>
">My Favorites</a></li>
			</ul>
		
		</div>
		<div class="col-sm-3"></div>
	</div>
	
    <div class="row">
		<div class="col-sm-12">
		    <div class="submnavcontainer">
			    <p><a class="but" href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
">Submit New</a></p>
			</div>
			<hr>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<br>
			<ul class="nav nav-pills p-woche">
				<li class="active mytabs"><a data-toggle="tab" href="#tab-submissions">Print</a></li>
				<li class="mytabs"><a data-toggle="tab" href="#tab-film">Film</a></li>
				<li class="mytabs"><a data-toggle="tab" href="#tab-students">Students</a></li>
			</ul>
		</div>
	</div>
	
	<div class="row">
	    <div class="col-sm-12">
	        <div class="tab-content">
    	        <div id="tab-submissions" class="tab-pane active">
    	            <div class="row">
    	                <div class="col-sm-12">
    	
    	
    <?php echo $_smarty_tpl->getVariable('work')->value;?>

    	
    	
    	
    	
                        </div>
                    </div>
                </div>
                <div id="tab-film" class="tab-pane">
    	            <div class="row">
    	                <div class="col-sm-12">
    	
    	
    <?php echo $_smarty_tpl->getVariable('film')->value;?>

    	
    	
    	
    	
                        </div>
                    </div>
                </div>
                <div id="tab-students" class="tab-pane">
    	            <div class="row">
    	                <div class="col-sm-12">
    	
    	
    <?php echo $_smarty_tpl->getVariable('students')->value;?>

    	
    	
    	
    	
                        </div>
                    </div>
                </div>
            </div>
	    </div>
	</div>
    <?php if (count($_smarty_tpl->getVariable('work')->value)>0){?>
    <hr />
	<div class="row">
		<div class="col-sm-12">
			<!--<p><a class="but" href="#">More</a></p>-->
		</div>
	</div>
	<?php }else{ ?>

	<div class="row">
		<div class="col-sm-12">
			<p class="bigger">You have nothing uploaded yet...</p>
		</div>
	</div>
	<?php }?>
	