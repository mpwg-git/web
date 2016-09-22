<?php /* Smarty version Smarty-3.0.7, created on 2014-08-24 19:53:36
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeB9mBRS" */ ?>
<?php /*%%SmartyHeaderCode:164499602953fa42c0c706f6-11901526%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd574c05066ae5ceb4189ec2f8ca1ac582c0a2b4b' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeB9mBRS',
      1 => 1408910016,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164499602953fa42c0c706f6-11901526',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_cssWrapperV2')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_cssWrapperV2.php';
if (!is_callable('smarty_function_xr_jsWrapperV2')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_jsWrapperV2.php';
if (!is_callable('smarty_function_xr_jsWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_jsWrapper.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><!DOCTYPE html><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_users::is_logged_in','var'=>'loggedin'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_sseo::sc_getSseo','var'=>'sseo'),$_smarty_tpl);?>

<html lang="en">
	<head>
		<meta charset="utf-8"><?php echo $_smarty_tpl->getVariable('CMS')->value;?>

		<!--[if lt IE 11]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		
		<meta name="author" content="">
		<link rel="shortcut icon" href="/archive_template/img/favicon.ico">
		<title>Lürzer's Archive</title>
		
		<meta name="description" content="<?php if ($_smarty_tpl->getVariable('sseo')->value['DESCRIPTION']){?><?php echo $_smarty_tpl->getVariable('sseo')->value['DESCRIPTION'];?>
<?php }?>">
		<meta name="keywords" content="<?php if ($_smarty_tpl->getVariable('sseo')->value['KEYWORDS']){?><?php echo $_smarty_tpl->getVariable('sseo')->value['KEYWORDS'];?>
<?php }?>">
		
		<meta property="og:site_name" content="Luerzer's Archive - Advertising worldwide"/>
		
		<?php if ($_smarty_tpl->getVariable('sseo')->value['OG_TITLE']){?>
		<meta property="og:title" content="<?php echo $_smarty_tpl->getVariable('sseo')->value['OG_TITLE'];?>
"/>
        <?php }?>
        
        <?php if ($_smarty_tpl->getVariable('sseo')->value['OG_IMAGE']&&$_smarty_tpl->getVariable('sseo')->value['OG_IMAGE']!=0){?>
        <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('sseo')->value['OG_IMAGE'],'var'=>'ogimage'),$_smarty_tpl);?>

        <?php echo smarty_function_xr_print_r(array('val'=>$_smarty_tpl->getVariable('ogimage')->value),$_smarty_tpl);?>

        <meta property="og:image" content="<?php echo $_smarty_tpl->getVariable('ogimage')->value;?>
"/>
        <?php }?>
        
        <?php if ($_smarty_tpl->getVariable('sseo')->value['OG_DESCRIPTION']){?>
        <meta property="og:description" content="<?php echo $_smarty_tpl->getVariable('sseo')->value['OG_DESCRIPTION'];?>
"/>
	    <?php }?>
		
		
		<script type="text/javascript"> if (!window.console) console = {log: function() {},error: function() {},info: function() {}}; </script>
		
		<?php echo smarty_function_xr_cssWrapperV2(array('s_ids'=>'270130,270148,270126,,1181094,270149,270135,270134,270322,270146,270125,270138,270133,270147,270131,270139,858266,858269,1180881','var'=>"packedcss"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapperV2(array('s_ids'=>'270122,269989,270121,269992,269995,269996,270030,270052,1180984,1180985,1180986,1180983,270040,270049,270043,270054,270048,270041,270002,270117,858267,858271,858270,270321,269991,269999,1180887,270113,270029,270001,269997,269986,270004,270005,270006,270019,270020,270021,270022,270023,270024,270025,270026,270027,614967,1145009,1174878,1175374,1175383,1175385,270032,269994','var'=>"packed"),$_smarty_tpl);?>

		
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<?php echo smarty_function_xr_jsWrapper(array('s_id'=>269988,'var'=>"html5shivjs"),$_smarty_tpl);?>

		<![endif]-->
		
		
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53d645050f6e67ea"></script>
		
	</head>
	<script type="text/javascript">
	top.FULL_CACHE=false;
    top.P_LANG='<?php echo $_smarty_tpl->getVariable('P_LANG')->value;?>
';
    top.P_ID='<?php echo $_smarty_tpl->getVariable('P_ID')->value;?>
';
    </script>
	<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-51135574-1', 'luerzersarchive.com');
      ga('send', 'pageview');
    </script>
	
	<body class="home" draggable="false">
	    <div id="mask"></div>
		<div class="wrap">
			
			<!--- Header --->
			<?php echo smarty_function_xr_atom(array('a_id'=>448,'return'=>1),$_smarty_tpl);?>

			
			<!-- Content BEGIN -->
			<section class="content">
				<div class="container">
					<div class="innercont">
					
					    <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

					    
					</div>
				</div>
			</section>
			<!-- Content END -->
						
		</div>
		
		<!--- Footer --->
		<?php echo smarty_function_xr_atom(array('a_id'=>449,'return'=>1),$_smarty_tpl);?>

		
	    <!-- Modal BEGIN -->
		<div class="modal fade" id="myModal">
			<div class="modal-dialog">
			    <div class="modal-close-me">
			        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>270337,'w'=>30,'ext'=>'png'),$_smarty_tpl);?>

				</div>
				<div class="modal-content">
				
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Modal title</h4>
					</div>
					<div class="modal-body">
						<p>One fine body&hellip;</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal END -->
		
		 <!-- Modal LOGIN -->
		<div id="modallogin" class="modal">
        	<div class="modal-dialog">
                <div class="modal-content">
                	<div class="modal-body">
                	    <form id="LOGIN_FORM_MODAL">
            				<div class="form-group">
            				    <h3>Please login</h3><br />
            					<label for="exampleInputEMAIL">Email</label>
            					<input type="email" placeholder="Enter Email" id="LOGIN_EMAIL" name="LOGIN_EMAIL" class="form-control">
            				</div>
            				<div class="form-group">
            					<label for="exampleInputPWD">Password</label>
            					<input type="password" placeholder="Enter Password" id="LOGIN_PASSWORD" name="LOGIN_PASSWORD" class="form-control">
            					<p>I forgot my <a href="reset-password.html">password</a></p>
            				</div>
            				<div class="checkbox">
            				  <label>
            				    <input type="checkbox" name="PLEASE_REMEMBER_ME" id="PLEASE_REMEMBER_ME" value="">
            				    <p>Keep me signed in. (Clear the check box if you're on a shared computer.)</p>
            				  </label>
            				</div>
            				<button class="but" id="LOGIN_BUTTON_MODAL">Sign In</button>  <button type="button" class="but" data-dismiss="modal" id="LOGIN_CLOSE_BUTTON_MODAL">Close</button>
            				<div class="form-group">
            					<p id="LOGIN_ERROR_MODAL" class="FORM_ERROR"><br>User or Password wrong!</p>
            				</div>
        		    	</form>
                	   
            	    </div>
            	</div>
        	</div>    
	    </div>
	    
	    
	    
	     <!-- Modal FAV -->
		<div id="modalfav" class="modal">
        		<div class="modal-dialog">
                    <div class="modal-content">
                    	<div class="modal-body">
                    	    <form id="FAV_FORM_CHOOSE">
                				<div class="form-group">
                				   <h3>Add to Favorites List <a class="moregrau" href="<?php echo smarty_function_xr_genlink(array('p_id'=>42),$_smarty_tpl);?>
">Manage Lists</a></h3>
                            			<p>
                            			<select class="form-control sel combo_fav_lists nofloat" id="fav_lists_add_fav">
                            		    </select>
                            		    </p>
                				<button class="but" id="FAV_FORM_ADD_FAV_BUTTON">Add</button>  <button type="button" class="but" data-dismiss="modal" id="FAV_FORM_CLOSE_BUTTON">Close</button>
                				</div>
            		    	</form>
                    	   
                	    </div>
                	</div>
            	</div>    
	    </div>
	    
		
		
	</body>

<script type="text/javascript">
    $(document).ready(function(){
        <?php if ($_smarty_tpl->getVariable('loggedin')->value==true){?>
        fe_users.is_logged_in(1); 
        <?php }else{ ?>
        fe_users.is_logged_in(0);
        <?php }?>
        fe_users.init_login_register()
        fe_likes.register();
        fe_favs.register();
        
        if(top.FULL_CACHE==true)
        {
            fe_users.login_full_cache();
        }
    });
</script>
</html>
