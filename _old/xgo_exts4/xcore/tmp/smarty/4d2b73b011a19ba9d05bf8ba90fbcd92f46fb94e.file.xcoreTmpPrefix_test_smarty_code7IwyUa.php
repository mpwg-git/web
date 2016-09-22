<?php /* Smarty version Smarty-3.0.7, created on 2014-10-10 08:42:40
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7IwyUa" */ ?>
<?php /*%%SmartyHeaderCode:179515857354379c005ddc18-84243779%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d2b73b011a19ba9d05bf8ba90fbcd92f46fb94e' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code7IwyUa',
      1 => 1412930560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179515857354379c005ddc18-84243779',
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
		    <h1>Submit your Work</h1>
		
		</div>
		<div class="col-sm-3"></div>
	</div>

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
													<span class="question">Can I upload files such as tiff, pdf, qxd, psd, etc.?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">No. Jpeg files only for the submission. Later, for uploading the high-res files, pdfs or tiffs are necessary.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Can I upload an image bigger than 2 MB?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">For the first submission phase: no. The size limit is 2 MB (2048 KB, which is 600 pixels in height, multiple 72dpi). When submitting the high-res files: yes! An image can be identified by an ID when uploaded.</span>
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
													<span class="question">Can I state more than one name per credit?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Yes. Up to three creatives - credited in the magazine - will also be automatically included in our ranking.</span>
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
													<span class="answer">Only in part. You can add credits and upload HiRES images, but you cannot make any other changes to your data once it has been submitted.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">How can I submit a series of images from one campaign through the online submission form? Should I send them one by one and fill out a form for each pic?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Yes, you have to submit each image of the campaign and fill in the form. This way, each single image can be identified by an ID when uploaded.</span>
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
													<span class="question">When will I know if my work has been published or not?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">As soon as you receive your copy of the magazine! (If preselected, you will be contacted and asked to send us the high-res image(s) and fill in the creative credits - unless these have already been entered. The status of your submission(s) can be checked by visiting the link sent by email in acknowledgement of your successfully uploaded submission(s).) As soon as the magazine is published, the status of the submissions will be changed to "selected" or "not selected."</span>
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
													<span class="question">Can I upload files such as tiff, pdf, qxd, psd, etc.?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">No. Jpeg files only for the submission. Later, for uploading the high-res files, pdfs or tiffs are necessary.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Can I upload an image bigger than 2 MB?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">For the first submission phase: no. The size limit is 2 MB (2048 KB, which is 600 pixels in height, multiple 72dpi). When submitting the high-res files: yes! An image can be identified by an ID when uploaded.</span>
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
													<span class="question">Can I state more than one name per credit?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Yes. Up to three creatives - credited in the magazine - will also be automatically included in our ranking.</span>
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
													<span class="answer">Only in part. You can add credits and upload HiRES images, but you cannot make any other changes to your data once it has been submitted.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">How can I submit a series of images from one campaign through the online submission form? Should I send them one by one and fill out a form for each pic?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Yes, you have to submit each image of the campaign and fill in the form. This way, each single image can be identified by an ID when uploaded.</span>
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
													<span class="question">When will I know if my work has been published or not?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">As soon as you receive your copy of the magazine! (If preselected, you will be contacted and asked to send us the high-res image(s) and fill in the creative credits - unless these have already been entered. The status of your submission(s) can be checked by visiting the link sent by email in acknowledgement of your successfully uploaded submission(s).) As soon as the magazine is published, the status of the submissions will be changed to "selected" or "not selected."</span>
												</div>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-sm-3">
											<h3 class="marginTop0">Specials - 200 Best</h3>
										</div>
										<div class="col-sm-7">
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Are there any other costs I will incur?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">If your work is selected, we charge a moderate fee per page to help meet printing costs. Yet you yourself decide how much of your work you would like to have published in a Special.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">How can I submit a series of images from one campaign through the online submission form? Should I send them one by one and fill out a form for each pic?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">Yes, you have to submit each image of the campaign and fill in the form. This way, each single image can be identified by an ID when uploaded.</span>
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
													<span class="answer">
														<ul class="faqUl">
															<li>
																The first internationally juried sourcebook.
															</li>
															<li>
																3,000 free copies sent out to top art directors (15 addresses each per illustrator/photographer)
															</li>
															<li>
																Circulated worldwide
															</li>
															<li>
																The chance to be nominated as one of the 200 Best illustrators/photographers
															</li>
														</ul>
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
													<span class="answer">Selections will be made by our international jury and our editorial department.</span>
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
													<span class="answer">Depending on the Special, 20.000 to 30,000 copies, of which 3,000 are distributed for free.</span>
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
													<span class="answer">No. You can submit advertising and editorial illustrations.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">What are your upcoming Specials?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">200 Best Packaging Designs worldwide, 200 Best Illustrators worldwide, 200 Best Digital Designers worldwide, and 200 Best Direct Mailings worldwide.</span>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-1">
													<span class="question">Q:</span>
												</div>
												<div class="col-sm-11">
													<span class="question">Can anybody submit to 200 Best?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">No. Only those nominated by top art directors, or who have been featured in our "200 Best" Specials or in our Magazine, and/or are among the top 100 in our 5-year-ranking (illustrators/photographers)</span>
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
													<span class="question">How can I submit work to the Students Contest?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">All that students need to do is provide the information requested and to upload a low-res image. In the event of pre-selection, the student will be contacted direct and asked to send in any further information that may then be required, such as a high-res and creative credits.</span>
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
													<span class="question">When will I know if my work has been published or not?</span>
												</div>
												<div class="col-sm-1">
													<span class="answer">A:</span>
												</div>
												<div class="col-sm-11">
													<span class="answer">As soon as you receive your copy of the magazine!</span>
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
	