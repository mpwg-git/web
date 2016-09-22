<?php /* Smarty version Smarty-3.0.7, created on 2015-08-21 09:47:24
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebIOLwl" */ ?>
<?php /*%%SmartyHeaderCode:83663724655d6d78c43a2e0-09116108%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cddcc5b9966a83203a781987d669b58366669eb5' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebIOLwl',
      1 => 1440143244,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83663724655d6d78c43a2e0-09116108',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn",'var'=>"loggedin"),$_smarty_tpl);?>


<div class="searchlist">
    
    <div class="row picture-row search-slider rsDefault js-replacer-search">
        
        
        
    </div>
    
</div>



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