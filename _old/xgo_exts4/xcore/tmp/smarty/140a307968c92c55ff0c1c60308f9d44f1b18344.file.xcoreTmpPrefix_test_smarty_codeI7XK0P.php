<?php /* Smarty version Smarty-3.0.7, created on 2014-12-04 12:08:24
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeI7XK0P" */ ?>
<?php /*%%SmartyHeaderCode:10275183454804eb883ea50-32848358%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '140a307968c92c55ff0c1c60308f9d44f1b18344' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeI7XK0P',
      1 => 1417694904,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10275183454804eb883ea50-32848358',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_cssWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_cssWrapper.php';
if (!is_callable('smarty_function_xr_jsWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_jsWrapper.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'be_voting::is_logged_in','var'=>'loggedin'),$_smarty_tpl);?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"><?php echo $_smarty_tpl->getVariable('CMS')->value;?>

		<!--[if lt IE 11]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="ico/favicon.ico">
		<title>Lürzer's Archiv - Voting</title>
		
		<!-- Bootstrap core CSS -->
		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>270130,'var'=>"bootstrapcss"),$_smarty_tpl);?>

		
		<!-- Custom styles for this template -->
		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>270149,'var'=>"fontcss"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>270135,'var'=>"customcss"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>270133,'var'=>"jrcss"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>270134,'var'=>"mwcss"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>270125,'var'=>"jpaginatormcss"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>1174851,'var'=>"responsiveslides"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>270147,'var'=>"videocss"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_cssWrapper(array('s_id'=>1180881,'var'=>"lightboxcss"),$_smarty_tpl);?>

	
	    <!-- Bootstrap core JavaScript -->
		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>270122,'var'=>"jqueryjs"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>269989,'var'=>"jqueryuiminjs"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>270121,'var'=>"bootstrapjs"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>269991,'var'=>"lazyloaderjs"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>269995,'var'=>"videojs"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('s_id'=>1180887,'var'=>"lightboxjs"),$_smarty_tpl);?>

		<?php echo smarty_function_xr_jsWrapper(array('d_id'=>270003,'var'=>"finaljs"),$_smarty_tpl);?>

	    
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<?php echo smarty_function_xr_jsWrapper(array('s_id'=>269988,'var'=>"html5shivjs"),$_smarty_tpl);?>

		<![endif]-->
	</head>
	<body class="home">
		<div class="wrap">
		
			<!-- Header BEGIN -->
			<header>
				<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<div class="container">
						<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>134),$_smarty_tpl);?>
"><h2 class="navbar-brand" style="margin-top:0; padding: 0">Lürzer's Archiv</h2></a>
						<div class="navbar-header">
							
						</div>
						<div class="collapse navbar-collapse">
							
							
							<!--<ul class="nav navbar-nav dunkelsub">
								<li><a href="features.html">Voting</a></li>
								<li><a href="inspiration.html">Inspiration</a></li>
								<li><a href="ranking.html">Ranking</a></li>
								<li><a href="blog.html">Blog</a></li>
								<li><a href="shop.html">Shop</a></li>
								<li><a href="services.html">Services</a></li>
								<li><a href="issue.html">Magazine</a></li>
								<li><a href="contest.html">Students</a></li> -->
							</ul>
						
								<a class="navbar-brandCont" href="<?php echo smarty_function_xr_genlink(array('p_id'=>134),$_smarty_tpl);?>
">Lürzer's Archiv</a>
						</div>
					</div>
				</div>
			</header>
			<!-- Header END -->
			
			<!-- Content BEGIN -->
			<section class="content">
				<div class="container">
					<div class="innercont">
					    <div class="row">
                    		<div class="col-sm-12">
                                <form class="navbar-form suche" role="search" id="quicksearchForm" action="" style="position: relative;">
                                	<div class="form-group links">
                                	    <?php if ($_smarty_tpl->getVariable('loggedin')->value==true){?>
                                	    <?php echo smarty_function_xr_siteCall(array('fn'=>'be_voting::get_login_box_data','var'=>'user'),$_smarty_tpl);?>

                                	    <p>HI, <?php echo $_smarty_tpl->getVariable('user')->value['NAME'];?>
 - <a href="<?php echo $_smarty_tpl->getVariable('user')->value['LINK_SIGNOUT'];?>
"><strong>Sign Out</strong></a></p>
                                		<?php }?>
                                	</div>
                                </form>
                    		</div>
                    	</div>
						<div class="row">
							<div class="col-sm-12">
							<!--	<a class="navbar-brandCont" href="index.html">Lürzer's Archiv</a> -->
							</div>
						</div>
						<div class="row">
							<div class="col-sm-9">
	
							</div>
							<div class="col-sm-3"></div>
						</div>
						
						<div class="row">
							<div class="col-sm-12">
							    <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- Content END -->
						
		</div>
	

	
		
<?php if ('loggedin'==true){?>
<script type="text/javascript">
    $(document).ready(function(){
        be_voting_users.is_logged_in(1); 
    });
</script>
<?php }?>
	</body>
</html>