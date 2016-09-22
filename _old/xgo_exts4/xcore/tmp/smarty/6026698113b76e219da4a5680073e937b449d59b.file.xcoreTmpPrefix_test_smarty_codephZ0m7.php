<?php /* Smarty version Smarty-3.0.7, created on 2014-08-13 03:50:41
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codephZ0m7" */ ?>
<?php /*%%SmartyHeaderCode:36495384553eac471328741-74004781%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6026698113b76e219da4a5680073e937b449d59b' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codephZ0m7',
      1 => 1407894641,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36495384553eac471328741-74004781',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'be_voting::get_voting_students_detail','var'=>'data'),$_smarty_tpl);?>


<div class="row" style="margin-bottom: 20px">
	<div class="col-sm-6 voting-button">
		<a href="#" class="btn reject-button full-width-button" id="reject-button-students" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['submission']['ess_id'];?>
">No</a>
	</div>
	
	<div class="col-sm-6 voting-button">
		<a href="#" class="btn accept-button full-width-button" id="accept-button-students" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['submission']['ess_id'];?>
">Yes</a>
	</div>
</div>
<h3>Student Submission: <?php echo $_smarty_tpl->getVariable('data')->value['submission']['ess_id'];?>
</h3>
<div class="row" style="margin-bottom: 20px">
    <div class="col-sm-12">
        <?php if ($_smarty_tpl->getVariable('data')->value['submission']['ess_mediaType_id']==2){?>
        <?php }else{ ?>
        <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('data')->value['submission']['ess_image_s_id'],'w'=>900,'var'=>'image'),$_smarty_tpl);?>

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
        <div id="submission-details" class="panel-collapse collapsed collapse" style="height: auto;">
        <div class="row">
            <div class="col-sm-12">
                <p class="" style="font-size 16px; font-weight: bold;">Submitted by: <?php echo $_smarty_tpl->getVariable('data')->value['submission']['ess_firstname'];?>
 <?php echo $_smarty_tpl->getVariable('data')->value['submission']['ess_lastname'];?>
</p>
            </div>
        </div>
        <?php if ($_smarty_tpl->getVariable('data')->value['submission']['ess_notes']){?>
        <div class="row">
            <div class="col-sm-12">
                <p class=""><?php echo $_smarty_tpl->getVariable('data')->value['submission']['ess_notes'];?>
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