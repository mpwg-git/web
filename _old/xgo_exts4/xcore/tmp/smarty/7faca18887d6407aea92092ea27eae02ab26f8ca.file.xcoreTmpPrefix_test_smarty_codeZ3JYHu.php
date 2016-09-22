<?php /* Smarty version Smarty-3.0.7, created on 2014-11-19 09:51:59
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZ3JYHu" */ ?>
<?php /*%%SmartyHeaderCode:635366137546c683f8982c6-06494627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7faca18887d6407aea92092ea27eae02ab26f8ca' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeZ3JYHu',
      1 => 1416390719,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '635366137546c683f8982c6-06494627',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_file')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_file.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'be_voting::get_voting_detail','var'=>'data'),$_smarty_tpl);?>


<div class="row" style="margin-bottom: 20px">
	<div class="col-sm-6 voting-button">
		<a href="#" class="btn reject-button full-width-button" id="reject-button" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['submission']['es_id'];?>
" data-ev="<?php echo $_smarty_tpl->getVariable('data')->value['ev_id'];?>
">No</a>
	</div>
	
	<div class="col-sm-6 voting-button">
		<a href="#" class="btn accept-button full-width-button" id="accept-button" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['submission']['es_id'];?>
" data-ev="<?php echo $_smarty_tpl->getVariable('data')->value['ev_id'];?>
">Yes</a>
	</div>
</div>
<h3>Submission: <?php echo $_smarty_tpl->getVariable('data')->value['submission']['es_id'];?>
</h3>
<div class="row" style="margin-bottom: 20px">
    <div class="col-sm-8" style="margin-left: auto; margin-right: auto; float: none;">
        <?php if ($_smarty_tpl->getVariable('data')->value['submission']['es_mediaType_id']==2){?>
        <?php if ($_smarty_tpl->getVariable('data')->value['submission']['es_video_480_mp4_s_id']>0){?>
        <?php if ($_smarty_tpl->getVariable('data')->value['submission']['es_video_poster_s_id']>0){?>
        <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('data')->value['submission']['es_video_poster_s_id'],'w'=>900,'var'=>'image'),$_smarty_tpl);?>

        <?php }else{ ?>
        <?php echo smarty_function_xr_img(array('s_id'=>270344,'w'=>900,'var'=>'image'),$_smarty_tpl);?>

        <?php }?>
        <?php echo smarty_function_xr_file(array('s_id'=>$_smarty_tpl->getVariable('data')->value['submission']['es_video_480_mp4_s_id'],'var'=>'mp4'),$_smarty_tpl);?>

	  
	    <video id="video" class="video-js vjs-default-skin vjs-big-play-centered"
          controls preload="auto" width="100%"
          poster="<?php echo $_smarty_tpl->getVariable('image')->value['src'];?>
"
          data-setup='{}'>
           <source src="<?php echo $_smarty_tpl->getVariable('mp4')->value['url'];?>
" type='video/mp4' />
        </video>
            
        <?php }else{ ?>
        <?php if ($_smarty_tpl->getVariable('data')->value['es_video_poster_s_id']>0){?>
        <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('data')->value['submission']['es_video_poster_s_id'],'w'=>900,'var'=>'image'),$_smarty_tpl);?>

        <?php }else{ ?>
        <?php echo smarty_function_xr_img(array('s_id'=>270344,'w'=>900,'var'=>'image'),$_smarty_tpl);?>

        <?php }?>
        <?php }?>
        
        
        
        
        <?php }else{ ?>
        <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('data')->value['submission']['es_image_s_id'],'w'=>900,'var'=>'image'),$_smarty_tpl);?>

        <img src="<?php echo $_smarty_tpl->getVariable('image')->value['src'];?>
" class="img-responsive" alt="">
        <?php }?>
        
    </div>
</div>
<?php if ($_smarty_tpl->getVariable('data')->value['showDetails']==1){?>
<div class="row" style="padding-bottom: 10px">
    <div class="col-sm-12">
        <h3 class="panel-title searchAdvanced">
        <a data-toggle="collapse" data-parent="#accordion" href="#submission-details" class="collapsed">Submission Details</a>
        </h3>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div id="submission-details" class="panel-collapse collapsed collapse in" style="height: auto;">
        <div class="row">
            <div class="col-sm-12">
                <p class="" style="font-size 16px; font-weight: bold;">Submitted by: <?php echo $_smarty_tpl->getVariable('data')->value['submission']['es_firstname'];?>
 <?php echo $_smarty_tpl->getVariable('data')->value['submission']['es_lastname'];?>
</p>
            </div>
        </div>
        <?php if ($_smarty_tpl->getVariable('data')->value['submission']['es_notes']){?>
        <div class="row">
            <div class="col-sm-12">
                <p class=""><?php echo $_smarty_tpl->getVariable('data')->value['submission']['es_notes'];?>
</p>
            </div>
        </div>
        <?php }?>
        
        <div class="row workdetailscreditbottom">
            <div class="col-sm-12">
                <?php echo $_smarty_tpl->getVariable('data')->value['submission']['CREDITSHTML'];?>
<br />
            </div>
        </div>
    </div>
</div>
<?php }?>