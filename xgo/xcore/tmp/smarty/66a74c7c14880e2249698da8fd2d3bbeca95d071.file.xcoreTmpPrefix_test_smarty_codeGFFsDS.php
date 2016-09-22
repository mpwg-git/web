<?php /* Smarty version Smarty-3.0.7, created on 2016-08-11 13:06:40
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGFFsDS" */ ?>
<?php /*%%SmartyHeaderCode:18307750257ac5c40d9b977-15719107%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66a74c7c14880e2249698da8fd2d3bbeca95d071' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeGFFsDS',
      1 => 1470913600,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18307750257ac5c40d9b977-15719107',
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
                <a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'de'),$_smarty_tpl);?>
" class="navlinks<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?> active<?php }?>">DE&nbsp;</a><span class="navlinks active">|</span>
					<a href="<?php echo smarty_function_xr_changeLang(array('lang'=>'en'),$_smarty_tpl);?>
" class="navlinks<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='en'){?> active<?php }?>">EN</a>
					<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>28),$_smarty_tpl);?>
" class="navlinks active">&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo smarty_function_xr_translate(array('tag'=>"Abmelden"),$_smarty_tpl);?>
</a>
					</span>
					<div class="clearfix"></div>
		</div>
	</nav>
	
<?php if ($_smarty_tpl->getVariable('P_ID')->value==11){?>
	<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_matching::sc_checkIfUserHasAnyQuestionAnswered','var'=>'hasQuestionsAnswered'),$_smarty_tpl);?>

	<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_matching::sc_checkIfCurrentUserIsInMatchingToDoTable','var'=>'stillToDo'),$_smarty_tpl);?>


	<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_cookie::checkFragenSession','var'=>'hasQuestionsAnsweredInSession'),$_smarty_tpl);?>


	<?php if ($_REQUEST['dev']==1||$_smarty_tpl->getVariable('stillToDo')->value===true){?>
		<!-- noQuestionModal -->
		<div class="modal fade" id="noQuestionModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="mdialog">
				<div class="mcontent">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<!-- <a href="/de/mein-profil/wg-test">
						<div class="stoerer">
							<span>Zu den Fragen</span>
						</div>
					</a> -->
					<div class="mheader">
						<div class="flex-container">
							<div class="flex-item">
								<span class="icon-duck" style="font-size: 3.25em;position: relative;bottom: 4px;line-height: 1.2;"></span>
							</div>
							<div class="flex-item">
								<span class="modalh1">Hallo</span>
							</div>
						</div>
					</div>
					<div class="mbody">
						<p>
							<?php echo smarty_function_xr_translate(array('tag'=>'Dr. Duck vergleicht dich gerade mit weiteren Profilen und ist noch mit der Auswertung beschäftigt.'),$_smarty_tpl);?>

						</p>
					</div>
					<div class="mfooter"></div>
				</div>
			</div>
		</div>
		<?php }elseif($_REQUEST['dev']==2||($_smarty_tpl->getVariable('hasQuestionsAnswered')->value===false&&$_smarty_tpl->getVariable('hasQuestionsAnsweredInSession')->value)){?>
		<!-- noQuestionModal -->
		<div class="modal fade" id="noQuestionModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="mdialog">
				<div class="mcontent">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<a href="/de/mein-profil/wg-test">
						<div class="stoerer">
							<span>Zu den Fragen</span>
						</div>
					</a>
					<div class="mheader">
						<div class="flex-container">
							<div class="flex-item">
								<span class="icon-duck" style="font-size: 3.25em;position: relative;bottom: 4px;line-height: 1.2;"></span>
							</div>
							<div class="flex-item">
								<span class="modalh1">Hallo</span>
							</div>
						</div>
					</div>
					<div class="mbody">
					    <p>
					        <?php echo smarty_function_xr_translate(array('tag'=>'Du hast deine WG-Fragen noch nicht ausgefüllt!<br>Bitte investiere 5 Minuten in die Beantwortung deiner Erwartungen an deine Mitbewohner(innen).<br>Dann können wir den perfekten Match für dich finden!'),$_smarty_tpl);?>

						</p>
					</div>
					<div class="mfooter"></div>
				</div>
			</div>
		</div>
	<?php }?>
<?php }?>


</header>