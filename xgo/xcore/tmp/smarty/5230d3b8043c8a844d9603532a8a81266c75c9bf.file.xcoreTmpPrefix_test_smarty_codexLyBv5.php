<?php /* Smarty version Smarty-3.0.7, created on 2015-08-21 09:47:42
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexLyBv5" */ ?>
<?php /*%%SmartyHeaderCode:202867992555d6d79ed17ef9-56740366%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5230d3b8043c8a844d9603532a8a81266c75c9bf' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codexLyBv5',
      1 => 1440143262,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202867992555d6d79ed17ef9-56740366',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn",'var'=>"loggedin"),$_smarty_tpl);?>



<div class="royalSlider rsDefault">
    <!-- simple image slide -->
    <img class="rsImg" src="image.jpg" alt="image desc" />

    <!-- lazy loaded image slide -->
    <a class="rsImg" href="image.jpg">image desc</a>

    <!-- HTML content slide -->
    <p>Content goes here</p>

    <!-- image and content -->
    <div>
        <img class="rsImg" src="image.jpg" data-rsVideo="https://vimeo.com/44878206" />
        <p>Some content after...</p>
    </div>

    <!-- HTML content -->
    <div>
        Put any HTML content here
    </div>

    <!-- HTML content (100% with and height) -->
    <div class="rsContent">
        Put any HTML content here
    </div>
</div>	




<div class="searchlist">
    <div class="row picture-row search-slider rsDefault js-replacer-search">
        
    </div>
</div>



