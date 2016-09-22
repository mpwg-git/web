<?php /* Smarty version Smarty-3.0.7, created on 2014-07-28 14:42:57
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codevSMfmL" */ ?>
<?php /*%%SmartyHeaderCode:2273839053d645513c5bb8-78999889%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3517822255ab20f602aa897575230bd655bcace8' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codevSMfmL',
      1 => 1406551377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2273839053d645513c5bb8-78999889',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_cssWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_cssWrapper.php';
if (!is_callable('smarty_function_xr_jsWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_jsWrapper.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><!DOCTYPE html><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_users::is_logged_in','var'=>'loggedin'),$_smarty_tpl);?>

<html lang="en">
	<head>
		<meta charset="utf-8"><?php echo $_smarty_tpl->getVariable('CMS')->value;?>

		<!--[if lt IE 11]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="/archive_template/img/favicon.ico">
		<title>Lürzer's Archive</title>
		
		<!-- Bootstrap core CSS -->
		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>270130,'var'=>"bootstrapcss"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>270148,'var'=>"tokencss"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>270126,'var'=>"tokenfbcss"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>1181094,'var'=>"tokensearchcss"),$_smarty_tpl);?>

		
		<!-- Custom styles for this template -->
		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>270149,'var'=>"fontcss"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>270135,'var'=>"customcss"),$_smarty_tpl);?>


		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>270134,'var'=>"mwcss"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>270322,'var'=>"royalslidercss"),$_smarty_tpl);?>

	    
	    <?php echo smarty_function_xr_cssWrapper(array('s_id'=>270146,'var'=>"rs-default-css"),$_smarty_tpl);?>

	
		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>270125,'var'=>"jpaginatormcss"),$_smarty_tpl);?>

		
		
		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>270138,'var'=>"datepickercss"),$_smarty_tpl);?>

		
		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>270133,'var'=>"jrcss"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>270147,'var'=>"videocss"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>270131,'var'=>"videothumbcss"),$_smarty_tpl);?>

		
		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>270139,'var'=>"jcropcss"),$_smarty_tpl);?>

		
		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>270122,'var'=>"jqueryjs"),$_smarty_tpl);?>

		
		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>269989,'var'=>"jqueryuiminjs"),$_smarty_tpl);?>

		<!-- Bootstrap core JavaScript -->
		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>270121,'var'=>"bootstrapjs"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>269992,'var'=>"scrolltojs"),$_smarty_tpl);?>

		
		
		
		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>269995,'var'=>"videojs"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>269996,'var'=>"videothumbjs"),$_smarty_tpl);?>

		
		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>270030,'var'=>"token-input"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>270052,'var'=>"jquery-ui-widget"),$_smarty_tpl);?>


        <?php echo smarty_function_xr_jsWrapper(array('s_id'=>1180984,'var'=>"cookiejs"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>1180985,'var'=>"load-image"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>1180986,'var'=>"tmpl-js"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>1180983,'var'=>"canvas-to-blob-js"),$_smarty_tpl);?>

		
		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>270040,'var'=>"jquery-iframe-transport"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>270049,'var'=>"jquery-fileupload"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>270043,'var'=>"jquery-fileupload-process"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>270054,'var'=>"jquery-fileupload-image"),$_smarty_tpl);?>

		
		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>270048,'var'=>"jquery-fileupload-validate"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>270041,'var'=>"jquery-fileupload-ui"),$_smarty_tpl);?>

		
		
		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>270002,'var'=>"submission"),$_smarty_tpl);?>

		
		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>270117,'var'=>"pwdstrength"),$_smarty_tpl);?>

		
		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>858266,'var'=>"scrollercss"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>858267,'var'=>"scrollerjs"),$_smarty_tpl);?>

		
		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>858269,'var'=>"validationEnginecss"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>858271,'var'=>"validationEngineENjs"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>858270,'var'=>"validationEnginejs"),$_smarty_tpl);?>

		
		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>1180881,'var'=>"lightboxcss"),$_smarty_tpl);?>

		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<?php echo smarty_function_xr_jsWrapper(array('s_id'=>269988,'var'=>"html5shivjs"),$_smarty_tpl);?>

		<![endif]-->
		
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53d645050f6e67ea"></script>
	</head>
	<script type="text/javascript">
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
	    
	  
		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>270321,'var'=>"royalsliderjs"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>269991,'var'=>"lazyloaderjs"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>269999,'var'=>"jcropjs"),$_smarty_tpl);?>

		
		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>1180887,'var'=>"lightboxjs"),$_smarty_tpl);?>

		
		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>270113,'var'=>"customjs"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>270029,'var'=>"jpaginatorjs"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>270001,'var'=>"disqusjs"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>269997,'var'=>"tabsliderjs"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>269986,'var'=>"backtotopjs"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('d_id'=>270003,'var'=>"finaljs"),$_smarty_tpl);?>

		
		
		
		
		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>270032,'var'=>"mwjs"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>269994,'var'=>"jrjs"),$_smarty_tpl);?>

		
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
    });
</script>
</html>
