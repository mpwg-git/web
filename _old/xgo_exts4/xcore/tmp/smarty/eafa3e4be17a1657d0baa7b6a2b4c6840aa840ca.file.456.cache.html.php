<?php /* Smarty version Smarty-3.0.7, created on 2014-07-24 19:33:40
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/456.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:42566127353d1437439fde5-28045523%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eafa3e4be17a1657d0baa7b6a2b4c6840aa840ca' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/456.cache.html',
      1 => 1406223220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42566127353d1437439fde5-28045523',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_users::is_logged_in','var'=>'loggedin'),$_smarty_tpl);?>


<form class="navbar-form suche" role="search" id="quicksearchForm" action="" style="position: relative;">
	<!-- quicksearch -->
	<div class="form-group" style="position: relative;">
		<input type="text" class="form-control" placeholder="Quick Search" id="quicksearchInput"> <button type="submit" id="quicksearchSubmit" class="btn btn-default" style="min-width: 42px;">OK</button>
	    <div id="quicksearch_loader"> </div>
	</div>
	
	<div style="display: none;" id="searchResultWrapper" class="ohne">
	
    		<div class="searchResult">
    		    <div class="row">
    		        <div class="col-sm-4">
    		            links
    		        </div>
    		        <div class="col-sm-4">
    		            mitte
    		        </div>
    		        <div class="col-sm-4">
    		            rechts
    		        </div>
        			<div class="countResults">
        			</div>
        		</div>	
    		</div>
    		
    </div>
    
	<!-- quicksearch END -->
	<div class="form-group links" id="logged_in_box">
	    <?php if ($_smarty_tpl->getVariable('loggedin')->value==true){?>
	    <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_users::get_login_box_data','var'=>'user'),$_smarty_tpl);?>

	    <p>HI, <?php echo $_smarty_tpl->getVariable('user')->value['NAME'];?>
 - <a href="<?php echo $_smarty_tpl->getVariable('user')->value['LINK_SIGNOUT'];?>
"><strong>Sign Out</strong></a> <span>&nbsp;|&nbsp;</span> <a href="<?php echo $_smarty_tpl->getVariable('user')->value['LINK_MYARCHIVE'];?>
">My Archive</a> <span>&nbsp;|&nbsp;</span> <a href="<?php echo $_smarty_tpl->getVariable('user')->value['LINK_MYPROFILE'];?>
">My Profile</a></p>
	    <?php }else{ ?>
		<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>34),$_smarty_tpl);?>
"><strong>Sign In</strong> <span>&nbsp;|&nbsp;</span> <strong>Sign Up</strong></a>
		<?php }?>
	</div>
</form>