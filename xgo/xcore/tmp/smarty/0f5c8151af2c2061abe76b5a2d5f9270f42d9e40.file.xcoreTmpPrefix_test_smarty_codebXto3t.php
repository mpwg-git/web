<?php /* Smarty version Smarty-3.0.7, created on 2016-08-11 12:44:11
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebXto3t" */ ?>
<?php /*%%SmartyHeaderCode:164300833557ac56fb3e1101-98537659%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f5c8151af2c2061abe76b5a2d5f9270f42d9e40' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codebXto3t',
      1 => 1470912251,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '164300833557ac56fb3e1101-98537659',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><header class="clearfix black header-suche <?php echo $_smarty_tpl->getVariable('addClass')->value;?>
">
	<nav class="left-row">
		<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>7),$_smarty_tpl);?>
">

			<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::getMyProfileImage",'var'=>'profImg'),$_smarty_tpl);?>

				<?php if ($_smarty_tpl->getVariable('profImg')->value!=false){?>
					<?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->getVariable('profImg')->value,'w'=>25,'h'=>25,'colorspace'=>"gray",'var'=>"profileImg"),$_smarty_tpl);?>

						<?php }else{ ?>
							<?php echo smarty_function_xr_img(array('s_id'=>161,'w'=>25,'h'=>25,'colorspace'=>"gray",'var'=>"profileImg"),$_smarty_tpl);?>

								<?php }?>

?
MATCH

									<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>7),$_smarty_tpl);?>
">
                <img src="<?php echo $_smarty_tpl->getVariable('profileImg')->value['src'];?>
" class="main-item profile-image" style="vertical-align:middle">
                <span class="text"><?php echo smarty_function_xr_translate(array('tag'=>"Profil"),$_smarty_tpl);?>
</span>
            </a>

		</a>
	</nav>

	<nav class="middle-row">
		<div class="logo-legend-section pull-right" style="vertical-align:top;font-size: 3.5vw">


			<?php echo smarty_function_xr_atom(array('a_id'=>782,'showFace'=>0,'mobile'=>1,'return'=>1,'desc'=>'icons block / fav'),$_smarty_tpl);?>


				<div class="clearfix"></div>
		</div>
	</nav>
	<?php if ($_smarty_tpl->getVariable('P_ID')->value==17){?>
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
		</div>	<?php }?>
<?php }?>

</header>
