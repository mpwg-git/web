<?php /* Smarty version Smarty-3.0.7, created on 2017-03-08 14:13:48
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/693.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:171158162558c0038c878894-63394817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f825f71441e906728488ff48fb7bb91da84f46c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/693.cache-3.html',
      1 => 1488978812,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171158162558c0038c878894-63394817',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_changeLang')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_changeLang.php';
?><header class="clearfix <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
">
	<nav class="left-row">
		<div class="main-nav">

			<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>1),$_smarty_tpl);?>
">
				<?php echo smarty_function_xr_imgWrapper(array('s_id'=>18447,'w'=>144,'h'=>22),$_smarty_tpl);?>

			</a>

		</div>
	</nav>
	<nav class="middle-row">
		<div class="profile-nav">
			<div class="controls-wrapper">
				<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>7),$_smarty_tpl);?>
" class="main-item-wrapper <?php if ($_smarty_tpl->getVariable('P_ID')->value==7){?>active<?php }?>">
					<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyProfileImage",'var'=>'profImg'),$_smarty_tpl);?>


						<?php if ($_smarty_tpl->getVariable('profImg')->value!=false){?>
							<?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('profImg')->value,'w'=>44,'h'=>44,'rmode'=>"cco",'colorspace'=>"gray",'var'=>"profileImg"),$_smarty_tpl);?>

								<?php }else{ ?>
									<?php echo smarty_function_xr_img(array('s_id'=>161,'w'=>44,'h'=>44,'rmode'=>"cco",'colorspace'=>"gray",'var'=>"profileImg"),$_smarty_tpl);?>

										<?php }?>

											<img src="<?php echo $_smarty_tpl->getVariable('profileImg')->value['src'];?>
" class="main-item profile-image">
											<span class="text"><?php echo smarty_function_xr_translate(array('tag'=>"Profil"),$_smarty_tpl);?>
</span>
				</a>
				<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>11),$_smarty_tpl);?>
" class="main-item-wrapper <?php if ($_smarty_tpl->getVariable('P_ID')->value==11){?>active<?php }?>">
					<span class="main-item icon-Lupe"></span>
					<span class="text"><?php echo smarty_function_xr_translate(array('tag'=>"Treffer"),$_smarty_tpl);?>
</span>
				</a>
			</div>

			<div class="logo-legend-section  pull-right">
				<?php echo smarty_function_xr_atom(array('a_id'=>782,'showFace'=>0,'return'=>1,'desc'=>'icons block / fav'),$_smarty_tpl);?>

			</div>
		</div>
	</nav>
	<nav class="right-row">
		<div class=" main-nav pull-right">

					<span>
					    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>28),$_smarty_tpl);?>
" class="navlinks active"><?php echo smarty_function_xr_translate(array('tag'=>"Abmelden"),$_smarty_tpl);?>
&nbsp;|&nbsp;</a>
                <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'de'),$_smarty_tpl);?>
" class="navlinks<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?> active<?php }?>">DE&nbsp;</a><span class="navlinks active">|</span>
					<a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'en'),$_smarty_tpl);?>
" class="navlinks<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='en'){?> active<?php }?>">EN</a>

					</span>
					<div class="clearfix"></div>
		</div>
	</nav>

<?php if ($_smarty_tpl->getVariable('P_ID')->value==11){?>
	<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_matching::sc_checkIfUserHasAnyQuestionAnswered','var'=>'hasQuestionsAnswered'),$_smarty_tpl);?>

	<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_matching::sc_checkIfCurrentUserIsInMatchingToDoTable','var'=>'stillToDo'),$_smarty_tpl);?>

	<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_cookie::checkFragenSession','var'=>'hasQuestionsAnsweredInSession'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getWgTestState",'userId'=>$_SESSION['xredaktor_feUser_wsf']['wz_id'],'var'=>'wgteststate'),$_smarty_tpl);?>

    <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getLoginCount",'var'=>'loginCount'),$_smarty_tpl);?>


	<?php if ($_smarty_tpl->getVariable('stillToDo')->value===true&&$_smarty_tpl->getVariable('wgteststate')->value==1&&$_smarty_tpl->getVariable('loginCount')->value!=0){?>
		<div class="modal fade" id="noQuestionModal" tabindex="-1" role="dialog">
			<div class="modal-dialog noQuestionModal" role="document">
				<div class="modal-content noQuestionModal" style="min-height: 170px;">
					<div class="modal-header noQuestionModal">
						<div class="col-xs-6 col-md-4"></div>
						<div class="col-xs-6 col-md-4">
							<span class="icon-duck"></span>
							<span class="modalh1"><?php echo smarty_function_xr_translate(array('tag'=>'Hallo!'),$_smarty_tpl);?>
</span>
							<br>
							<p>
								<?php echo smarty_function_xr_translate(array('tag'=>'Dr. Duck vergleicht dich gerade mit weiteren Profilen und ist noch mit der Auswertung beschäftigt.'),$_smarty_tpl);?>

							</p>
						</div>
						<div class="col-xs-6 col-md-4">
							<div class="col-xs-6 col-md-3">
								<!--<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?>-->
						        <!--<a href="/de/mein-profil">-->
							    <!--<div class="mheader-stoerer">-->
								<!--<span style="font-size:2rem; top:28%;left:2%;"><?php echo smarty_function_xr_translate(array('tag'=>'Mein <br>Profil'),$_smarty_tpl);?>
</span>-->
								<!--</div>-->
							    <!--</a>-->
                                <!--<?php }elseif($_smarty_tpl->getVariable('P_LANG')->value=='en'){?>-->
                                <!--<a href="/en/mein-profil">-->
							    <!--<div class="mheader-stoerer">-->
								<!--<span style="font-size:2rem; top:28%;left:2%;"><?php echo smarty_function_xr_translate(array('tag'=>'Mein <br>Profil'),$_smarty_tpl);?>
</span>-->
								<!--</div>-->
							    <!--</a>-->
                                <!--<?php }?>-->
							</div>
							<div class="col-xs-6 col-md-9" style="padding-right:0;">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    <?php }elseif(($_smarty_tpl->getVariable('hasQuestionsAnswered')->value===false&&$_smarty_tpl->getVariable('hasQuestionsAnsweredInSession')->value&&$_smarty_tpl->getVariable('wgteststate')->value==0&&$_smarty_tpl->getVariable('loginCount')->value!==0)){?>
	    <div class="modal fade" id="noQuestionModal" tabindex="-1" role="dialog">
			<div class="modal-dialog noQuestionModal" role="document">
				<div class="modal-content noQuestionModal" style="min-height: 170px;">
					<div class="modal-header noQuestionModal">
						<div class="col-xs-6 col-md-4"></div>
						<div class="col-xs-6 col-md-4">
							<span class="icon-duck"></span>
							<span class="modalh1"><?php echo smarty_function_xr_translate(array('tag'=>'Hallo!'),$_smarty_tpl);?>
</span>
							<br>
							<p>
								<?php echo smarty_function_xr_translate(array('tag'=>'Du hast noch keine Fragen vom WG-Test beantwortet!'),$_smarty_tpl);?>

								<br>
								<?php echo smarty_function_xr_translate(array('tag'=>'Dr. Duck kann dir deswegen nicht sagen, wer am besten zu dir passt!'),$_smarty_tpl);?>

							</p>
						</div>
						<div class="col-xs-6 col-md-4">
							<div class="col-xs-6 col-md-3">
							<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?>
						   	<a href="/de/mein-profil/wg-test">
									<div class="mheader-stoerer">
										<span><?php echo smarty_function_xr_translate(array('tag'=>'Zu den Fragen'),$_smarty_tpl);?>
</span>
									</div>
								</a>
                     <?php }elseif($_smarty_tpl->getVariable('P_LANG')->value=='en'){?>
                         <a href="/en/mein-profil/wg-test">
							    	<div class="mheader-stoerer">
										<span><?php echo smarty_function_xr_translate(array('tag'=>'Zu den Fragen'),$_smarty_tpl);?>
</span>
									</div>
							   </a>
                     <?php }?>
						</div>
							<div class="col-xs-6 col-md-9">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }elseif($_smarty_tpl->getVariable('hasQuestionsAnswered')->value===true&&$_smarty_tpl->getVariable('hasQuestionsAnsweredInSession')->value&&$_smarty_tpl->getVariable('wgteststate')->value==2&&$_smarty_tpl->getVariable('loginCount')->value!==0){?>
        <div class="modal fade" id="noQuestionModal" tabindex="-1" role="dialog">
			<div class="modal-dialog noQuestionModal" role="document">
				<div class="modal-content noQuestionModal" style="min-height: 170px;">
					<div class="modal-header noQuestionModal">
						<div class="col-xs-6 col-md-4"></div>
						<div class="col-xs-6 col-md-4">
							<span class="icon-duck"></span>
							<span class="modalh1"><?php echo smarty_function_xr_translate(array('tag'=>'Hallo!'),$_smarty_tpl);?>
</span>
							<br>
							<p>
								<?php echo smarty_function_xr_translate(array('tag'=>'Du hast noch nicht alle Fragen vom WG-Test beantwortet. Nimm dir kurz Zeit, damit dich Dr. Duck noch besser matchen kann!'),$_smarty_tpl);?>

							</p>
						</div>
						<div class="col-xs-6 col-md-4">
							<div class="col-xs-6 col-md-3">
							<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?>
						        <a href="/de/mein-profil/wg-test">
							        <div class="mheader-stoerer">
									    <span><?php echo smarty_function_xr_translate(array('tag'=>'Zu den Fragen'),$_smarty_tpl);?>
</span>
									</div>
							    </a>
                            <?php }elseif($_smarty_tpl->getVariable('P_LANG')->value=='en'){?>
                                <a href="/en/mein-profil/wg-test">
							    	<div class="mheader-stoerer">
								    	<span><?php echo smarty_function_xr_translate(array('tag'=>'Zu den Fragen'),$_smarty_tpl);?>
</span>
								    </div>
							    </a>
                            <?php }?>
							</div>
							<div class="col-xs-6 col-md-9">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }?>
<?php }?>


</header>