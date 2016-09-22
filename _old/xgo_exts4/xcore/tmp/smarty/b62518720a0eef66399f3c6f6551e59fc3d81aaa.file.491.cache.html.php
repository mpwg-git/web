<?php /* Smarty version Smarty-3.0.7, created on 2015-02-02 16:47:39
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/491.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:15581236254cf9c1b6316b1-64144088%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b62518720a0eef66399f3c6f6551e59fc3d81aaa' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/491.cache.html',
      1 => 1422892058,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15581236254cf9c1b6316b1-64144088',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_submissions::sc_get_specials_for_overview','var'=>'specials'),$_smarty_tpl);?>


    <!-- logo row -->
	<?php echo smarty_function_xr_atom(array('a_id'=>459,'return'=>1),$_smarty_tpl);?>

	
	<!-- quicksearch -->
	<div class="row">
		<div class="col-sm-12">
	        <?php echo smarty_function_xr_atom(array('a_id'=>456,'return'=>1),$_smarty_tpl);?>

		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-9">
		    <div class="line-top"></div>
		    <h1>Submit your Work
		         <span style="float: right;">  
        		     <a href="/archive/submissions_help.pdf" target="_blank" class="but detailbutton_back">Help ?</a>
        	   </span> 
		    </h1>
		
		</div>
		<div class="col-sm-3"></div>
	</div>
	
    <?php echo smarty_function_xr_atom(array('a_id'=>677,'return'=>1),$_smarty_tpl);?>


	<div class="row">
		<div class="col-sm-2">
			<p><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270267,'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
</p>
		</div>
		<div class="col-sm-10">
			<h3>Print Campaigns</h3>
			<!--<p><strong>Requirements:</strong><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum faucibus eleifend libero, at commodo turpis semper sagittis. In pulvinar enim imperdiet tortor iaculis a pharetra ligula placerat. Quisque scelerisque, diam non eleifend commodo, dui diam faucibus urna, convallis fermentum lacus tortor et dolor</p>-->
			<p><a class="but" href="<?php echo smarty_function_xr_genlink(array('p_id'=>50),$_smarty_tpl);?>
">submit</a></p>
			<p>&nbsp;</p>
			<div class="row">
				<div class="col-sm-12">
					<div class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h5 class="panel-title"><a class="collapsed" href="#collapseOne" data-parent="#accordion" data-toggle="collapse">FAQ - Print Campains</a></h5>
							</div>
							<div class="panel-collapse collapse" id="collapseOne">
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-3">
											<h3 class="marginTop0">Entry Submission</h3>
										</div>
										<div class="col-sm-7">
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Which file formats can I upload?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Acceptable file formats are JPG, JPEG, PNG, TIFF, TIF, PDF (Adobe PDF/ X-1a, PDF/ X-3).</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">What are the required image specifications?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">For low-res: 72 dpi, colormode RGB, 1280 pixels in width, 5 MB max.<br />
For high-res: 300 dpi, colormode CMYK (where possible ICC Profile ISOcoated_v2), 600 MB max. Ideally, the width should be 165 mm.
</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Do I need to upload both low- and high-res images?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">No, you don’t need to upload both. It’s okay to upload high-res only right from the start. However, you can upload a low-res file first and add a high-resolution version later on (e.g. if your submission is preselected).</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Do I have to pay to submit? How much does publication cost?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">No, submission is free of charge. And neither do you have to pay anything if your work is selected for publication in the magazine.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Can I state more than one name per credit?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Yes. You can name up to three creatives per credit, each of which will also be automatically included in our ranking.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Do I have to fill out everything in the submission form right away?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">No, you can also decide to wait and fill in - or change - credits later. Just select “Don’t know” for the time being. To speed things up, however, it would be better to fill out everything right away while making your submission.</span>
												</div>
											</div>
												<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Am I able to delete or amend data after submission?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Only in part. You can delete submissions, add/change credits and upload/replace images anytime up until your work is preselected. In this case, you will receive a notification instructing you what to do next.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">How can I submit a series of images from one campaign through the online submission form? Should I send them one by one and fill out a separate form for each pic?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">You can upload a series of images in one single submission. The credits you enter will automatically be inserted into all executions of the campaign. In the event that individual credits differ, you can, of course, change them for each image.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">How recent should my work be?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Not older than six months.</span>
												</div>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3">
											<h3 class="marginTop0">Selection</h3>
										</div>
										<div class="col-sm-7">
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">What do “Preselected,” “Pending,” “Selected,” etc. mean?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">If your submission is preselected, you will receive a notification requesting you to enter any further information that might still be missing (credits, high-res file, etc.) Please note: Being preselected does not mean you have made it through to final selection.

<br /><br />“Pending” means that your submission has already been judged, yet it is rather unlikely that it will be published.

<br /><br />A final status – “Selected” or “Not Selected” – will be assigned to your work just as soon as the magazine volume to which you made the submission has been published. 
 or "not selected."</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">When will I know whether my work has been selected for publication?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">You – together with all other creatives who contributed to the campaign – will be notified by email just as soon as the magazine in which your work is featured has been published.</span>
												</div>
											</div>
										</div>
									</div>
								</div>							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="row">
		<div class="col-sm-2">
			<p><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270273,'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
</p>
		</div>
		<div class="col-sm-10">
			<h3>TV Commercials</h3>
			<!--<p><strong>Requirements:</strong><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum faucibus eleifend libero, at commodo turpis semper sagittis. In pulvinar enim imperdiet tortor iaculis a pharetra ligula placerat. Quisque scelerisque, diam non eleifend commodo, dui diam faucibus urna, convallis fermentum lacus tortor et dolor</p>-->
			<p><a class="but" href="<?php echo smarty_function_xr_genlink(array('p_id'=>91),$_smarty_tpl);?>
">submit</a></p>
			<p>&nbsp;</p>
			<div class="row">
				<div class="col-sm-12">
					<div class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h5 class="panel-title"><a class="collapsed" href="#collapseTwo" data-parent="#accordion" data-toggle="collapse">FAQ - TV Commercials</a></h5>
							</div>
							<div class="panel-collapse collapse" id="collapseTwo">
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-3">
											<h3 class="marginTop0">Entry Submission</h3>
										</div>
										<div class="col-sm-7">
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Do I have to submit my campaign via post as well as online?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">No, just submit online.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Do I have to pay to submit?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">No, submission is free of charge.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">What kind of files can I upload?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">The following formats are valid for uploading: .avi, .mpg, .mpeg, .f4v,.mov, .flv, .mp4, .m4v, .wmv, divx, .mkv. The size limit for low-res files is 100MB, for high-res files 1GB.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Am I able to delete or amend data after submission?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Only in part. You can add credits and upload HiRES videos, but you cannot make any other changes to your data once it has been submitted.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">How recent should my work be?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Not older than six months.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Can I state more than one name per credit?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Yes. Up to three creatives - credited in the magazine - will also be automatically included in our ranking.</span>
												</div>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3">
											<h3 class="marginTop0">Selection</h3>
										</div>
										<div class="col-sm-7">
    										<div class="row">
    												<div class="col-sm-1">
    													<span class="question">Q:</span>
    												</div>
    												<div class="col-sm-11">
    													<span class="question">What do “Preselected,” “Pending,” “Selected,” etc. mean?</span>
    												</div>
    												<div class="col-sm-1">
    													<span class="answer">A:</span>
    												</div>
    												<div class="col-sm-11">
    													<span class="answer">If your submission is preselected, you will receive a notification requesting you to enter any further information that might still be missing (credits, high-res file, etc.) Please note: Being preselected does not mean you have made it through to final selection.
    
    <br /><br />“Pending” means that your submission has already been judged, yet it is rather unlikely that it will be published.
    
    <br /><br />A final status – “Selected” or “Not Selected” – will be assigned to your work just as soon as the magazine volume to which you made the submission has been published. 
     or "not selected."</span>
    												</div>
    											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">When will I know if my work has been published or not?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">You – as well as all other creatives who contributed to the campaign – will be notified by email as soon as the magazine in which your work is featured has been published.</span>
												</div>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3">
											<h3 class="marginTop0">Audio &amp; Video Compression </h3>
										</div>
										<div class="col-sm-7">
											<div class="row">
												<div class="col-sm-1">
													<span class="question"></span>
												</div>
												<div class="col-sm-11">
													<span class="question">QUICKTIME &ndash; Audio &amp; Video Compression Settings</span>
												</div>
												<div class="col-sm-1">
													<span class="answer"></span>
												</div>
												<div class="col-sm-11">
													<span class="answer">
														VIDEO <br>
														Framesize: 720 x 576 px<br> 
														Data Rate: 2200 Kbps<br><br>
														AUDIO <br>
														Audio Codec: MPEG-4 Audio<br> 
														Sample Size: 16 <br>
														Sample Rate: 44100 <br>
														Channels: Stereo
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--	
	<div class="row">
		<div class="col-sm-2">
			<p><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270182,'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
</p>
		</div>
		<div class="col-sm-10">
			<h3>Digital World</h3>
			<p><strong>Requirements:</strong><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum faucibus eleifend libero, at commodo turpis semper sagittis. In pulvinar enim imperdiet tortor iaculis a pharetra ligula placerat. Quisque scelerisque, diam non eleifend commodo, dui diam faucibus urna, convallis fermentum lacus tortor et dolor</p>
			<p><a class="but" href="">submit</a></p>
			<p>&nbsp;</p>
			<div class="row">
				<div class="col-sm-12">
					<div class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h5 class="panel-title"><a class="collapsed" href="#collapseThree" data-parent="#accordion" data-toggle="collapse">FAQ - Digital World</a></h5>
							</div>
							<div class="panel-collapse collapse" id="collapseThree">
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-3">
											<h3 class="marginTop0">Entry Submission</h3>
										</div>
										<div class="col-sm-7">
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Do I have to submit my campaign via post as well as online?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">No, just submit online.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Do I have to pay to submit?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">No, submission is free of charge.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">What kind of files can I upload?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">MPG or QuickTime, Resolution: 320 x 400 px. Maximum file size: 10 MB.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Am I able to delete or amend data after submission?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Only in part. You can add credits and upload HiRES videos, but you cannot make any other changes to your data once it has been submitted.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">How recent should my work be?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Not older than six months.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Can I state more than one name per credit?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Yes. Up to three creatives - credited in the magazine - will also be automatically included in our ranking.</span>
												</div>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3">
											<h3 class="marginTop0">Selection</h3>
										</div>
										<div class="col-sm-7">
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">When will I know if my work has been published or not?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">As soon as you receive your copy of the magazine! (If preselected, you will be contacted and asked to send us the high-res image(s) and fill in the creative credits - unless thfdfese have already been entered. The status of your submission(s) can be checked by visiting the link sent by email in acknowledgement of your successfully uploaded submission(s).) As soon as the magazine is published, the status of the submissions will be changed to "selected" or "not selected."</span>
												</div>
											</div>
										</div>
									</div>												
								</div>							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
-->	
	<div class="row positionRelative">
		<div class="col-sm-2">
			<p><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270200,'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
</p>
		</div>
		<div class="col-sm-10">
			<h3>Work to Lürzer's Archiv "Special Edition"</h3>
			<div class="row">
				<div class="col-sm-5">
					<form action="<?php echo smarty_function_xr_genlink(array('p_id'=>97),$_smarty_tpl);?>
" id="start_submit_special_form" method="POST">
						<div class="form-group">
							<select class="form-control" name="special_type" size=4<?php if (isset($_REQUEST['choose_special'])){?> style="border: 1px solid #ff0000"<?php }?>>
							    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('specials')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['em_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['em_name'];?>
</option>
								<?php }} ?>
							</select>
						</div>
                    </form>
				</div>
				<div class="col-sm-7">
					<!--<p><strong>Requirements:</strong><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum faucibus eleifend libero, at commodo turpis semper sagittis. In pulvinar enim imperdiet tortor iaculis a pharetra ligula placerat. Quisque scelerisque, diam non eleifend commodo, dui diam faucibus urna.r</p>	-->
				</div>
			</div>
			<?php if (isset($_REQUEST['choose_special'])){?><p style="color: #ff0000">Please select a special</p><?php }?>
			<p><a class="but" id="start_submit_special" href="<?php echo smarty_function_xr_genlink(array('p_id'=>97),$_smarty_tpl);?>
">submit</a></p>
			<p>&nbsp;</p>
			<div class="row">
				<div class="col-sm-12">
					<div class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h5 class="panel-title"><a class="collapsed" href="#collapseFour" data-parent="#accordion" data-toggle="collapse">FAQ - Special Edition</a></h5>
							</div>
							<div class="panel-collapse collapse" id="collapseFour">
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-3">
											<h3 class="marginTop0">Entry Submission</h3>
										</div>
										<div class="col-sm-7">
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Which file formats can I upload?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Acceptable file formats are JPG, JPEG, PNG, TIFF, TIF, PDF (Adobe PDF/ X-1a, PDF/ X-3).</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">are the required image specifications?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">For low-res: 72 dpi, colormode RGB, 1280 pixels in width, 5 MB max.<br />
For high-res: 300 dpi, colormode CMYK (where possible ICC Profile ISOcoated_v2), 600 MB max. The ideal size is 165 x 113 mm.
</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Do I need to upload both low- and high-res images?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">No, you don’t need to upload both. It’s okay to upload high-res only right from the start. However, you can upload a low-res file first and add a high-resolution version later on (e.g. if your submission is preselected).</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Are there any costs I might incur?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Submission is free of charge. If your work is selected, we charge a modest fee per page to help cover printing costs. Yet you yourself decide how much of your work you would like to have published in a Special.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Am I able to delete or amend data after submission?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Only in part. You can delete submissions, add/change credits and upload/replace images anytime up until your work is preselected. In this case, you will receive a notification instructing you what to do next.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">How can I submit a series of images from one campaign through the online submission form? Should I send them one by one and fill out a separate form for each pic?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">You can upload a series of images in one single submission. The credits you enter will automatically be inserted into all executions of the campaign. In the event that individual credits differ, you can, of course, change them for each image.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">How recent should my work be?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Best not older than 18 months.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">What are the benefits of being included in 200 Best?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">It is the first internationally juried sourcebook.
<br />– 1,500 complimentary copies are sent out to top creatives
<br />– Distributed worldwide
<br />– The chance to be nominated as one of the 200 Best illustrators/photographers/digital artists/packaging designers
</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Who makes the selections?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Selections will be made by the international jury and our editorial department.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">How big is the circulation?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Depending on the Special, 20,000 to 30,000 copies, of which 1,500 are distributed for free.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">For 200 Best Illustrators worldwide, do you accept only work produced for advertising?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">No. You can submit illustrations produced for either advertising or editorial assignments – as well as work created for self-promotional purposes.</span>
												</div>
											</div>
										</div>
									</div>
									
									
								</div>							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	
	<div class="row positionRelative">
		<div class="col-sm-2">
			<p><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270247,'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
</p>
		</div>
		<div class="col-sm-10">
			<h3>Work for the Students Contest</h3>
			<!--<p><strong>Requirements:</strong><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum faucibus eleifend libero, at commodo turpis semper sagittis. In pulvinar enim imperdiet tortor iaculis a pharetra ligula placerat. Quisque scelerisque, diam non eleifend commodo, dui diam faucibus urna, convallis fermentum lacus tortor et dolor</p>-->
			<p><a class="but" href="<?php echo smarty_function_xr_genlink(array('p_id'=>98),$_smarty_tpl);?>
">submit</a></p>
			<p>&nbsp;</p>
			<div class="row">
				<div class="col-sm-12">
					<div class="panel-group">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h5 class="panel-title"><a class="collapsed" href="#collapseFive" data-parent="#accordion" data-toggle="collapse">FAQ - Students Contest</a></h5>
							</div>
							<div class="panel-collapse collapse" id="collapseFive">
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-3">
											<h3 class="marginTop0">Entry Submission</h3>
										</div>
										<div class="col-sm-7">
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Which file formats can I upload?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Acceptable file formats are JPG, JPEG, PNG, TIFF, TIF, PDF (Adobe PDF/ X-1a, PDF/ X-3).</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">What are the required image specifications?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">For low-res: 72 dpi, colormode RGB, 1280 pixels in width, 5 MB max.
<br />For high-res: 300 dpi, colormode CMYK (where possible ICC Profile ISOcoated_v2), 600 MB max. The ideal size is 165 x 113 mm.
</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Do I need to upload both low- and high-res images?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">No, you don’t need to upload both. It’s okay to upload a high-res only right from the start. However, you can upload a low-res file first and add a high-resolution version later on (e.g. if your submission is preselected).</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Do I have to pay to submit? How much does publication cost?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">No, submission is free of charge. And neither do you have to pay anything to have your work published in the magazine.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Do I have to fill out everything in the submission form right away?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">No, you can also fill in credits later on. Just select “Don’t know” for the time being. To speed things up, however, it would be better to fill out everything right away while making your submission.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Am I able to delete or amend data after submission?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Only in part. You can delete submissions, add/change credits and upload/replace images anytime up until your work is preselected. In this case, you will receive a notification instructing you what to do next.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">How can I submit a series of images from one campaign through the online submission form? Should I send them one by one and fill out a separate form for each pic?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">You can upload a series of images in one single submission. The credits you enter will automatically be inserted into all executions of the campaign. In the event that individual credits differ, you can, of course, change them for each image.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">How recent should my work be?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Best not older than 12 months.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Do you really accept print ads only?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">For the time being, yes. However, we are currently thinking of also accepting other forms of advertising in the future, so stay tuned!</span>
												</div>
											</div>
											
										</div>
									</div>	
									<hr />
									<div class="row">
										<div class="col-sm-3">
											<h3 class="marginTop0">Selection</h3>
										</div>
										<div class="col-sm-7">
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">When will I know whether my work has been published?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">If your work is selected for publication, you will again be notified by email.</span>
												</div>
											</div>
										</div>
									</div>
								</div>							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</div>
	