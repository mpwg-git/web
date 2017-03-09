<?php /* Smarty version Smarty-3.0.7, created on 2017-02-20 14:41:29
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/693.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:143432546858aaf209477f80-85247116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46bfc20c1975de4977c14ea7bafe8305b4f8df26' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/693.cache-1.html',
      1 => 1486558322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143432546858aaf209477f80-85247116',
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

		<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_wgtest::sc_getWgTestState",'userId'=>$_SESSION['xredaktor_feUser_wsf']['wz_id'],'var'=>'wgteststate'),$_smarty_tpl);?>

	    <?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::sc_getLoginCount",'var'=>'loginCount'),$_smarty_tpl);?>



		<?php if ($_smarty_tpl->getVariable('stillToDo')->value===true&&$_smarty_tpl->getVariable('wgteststate')->value==1&&$_smarty_tpl->getVariable('loginCount')->value>0){?>
					<div class="modal fade" id="noQuestionModal" tabindex="-1" role="dialog">
                	  <div class="modal-dialog" role="document">
                	    <div class="modal-content">
                	      <div class="modal-header">
                					<span class="icon-duck"></span>
                					<span class="modalh1"><?php echo smarty_function_xr_translate(array('tag'=>'Hallo!'),$_smarty_tpl);?>
</span>
                					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                	      </div>
                	      <div class="modal-body">
                					<p>
											<?php echo smarty_function_xr_translate(array('tag'=>'Dr. Duck vergleicht dich gerade mit weiteren Profilen und ist noch mit der Auswertung beschäftigt.'),$_smarty_tpl);?>

                					</p>
                	      </div>
                	    </div><!-- /.modal-content -->
                	  </div><!-- /.modal-dialog -->
                	</div><!-- /.modal -->
						<?php }elseif(($_smarty_tpl->getVariable('hasQuestionsAnswered')->value===false&&$_smarty_tpl->getVariable('hasQuestionsAnsweredInSession')->value&&$_smarty_tpl->getVariable('wgteststate')->value==0&&$_smarty_tpl->getVariable('loginCount')->value>0)){?>
						<div class="modal fade" id="noQuestionModal" tabindex="-1" role="dialog">
                	  <div class="modal-dialog" role="document">
                	    <div class="modal-content">
                	      <div class="modal-header">
                					<span class="icon-duck"></span>
                					<span class="modalh1"><?php echo smarty_function_xr_translate(array('tag'=>'Hallo!'),$_smarty_tpl);?>
</span>
                					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                	      </div>
                	      <div class="modal-body">
                			<p>
									<?php echo smarty_function_xr_translate(array('tag'=>'Du hast noch keine Fragen vom WG-Test beantwortet!'),$_smarty_tpl);?>

									<br>
									<?php echo smarty_function_xr_translate(array('tag'=>'Dr. Duck kann dir deswegen nicht sagen, wer am besten zu dir passt!'),$_smarty_tpl);?>

								</p>
                	      </div>
                	      <div class="modal-footer">
                	        <button type="button" class="btn btn-default">
                	            <?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?>
                	                <a href="/de/mein-profil/wg-test"><?php echo smarty_function_xr_translate(array('tag'=>'Zu den Fragen'),$_smarty_tpl);?>
</a>
                	            <?php }elseif($_smarty_tpl->getVariable('P_LANG')->value=='en'){?>
                	                <a href="/en/mein-profil/wg-test"><?php echo smarty_function_xr_translate(array('tag'=>'Zu den Fragen'),$_smarty_tpl);?>
</a>
                	            <?php }?>
                                </button>
                	       </div>
                	    </div><!-- /.modal-content -->
                	  </div><!-- /.modal-dialog -->
                	</div><!-- /.modal -->
                	<?php }elseif($_smarty_tpl->getVariable('hasQuestionsAnswered')->value===true&&$_smarty_tpl->getVariable('hasQuestionsAnsweredInSession')->value&&$_smarty_tpl->getVariable('wgteststate')->value==2&&$_smarty_tpl->getVariable('loginCount')->value>0){?>
                	<div class="modal fade" id="noQuestionModal" tabindex="-1" role="dialog">
                	  <div class="modal-dialog" role="document">
                	    <div class="modal-content">
                	      <div class="modal-header">
                					<span class="icon-duck"></span>
                					<span class="modalh1"><?php echo smarty_function_xr_translate(array('tag'=>'Hallo!'),$_smarty_tpl);?>
</span>
                					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                	      </div>
                	      <div class="modal-body">
                			<p>
						    		<?php echo smarty_function_xr_translate(array('tag'=>'Du hast noch nicht alle Fragen vom WG-Test beantwortet. Nimm dir kurz Zeit, damit dich Dr. Duck noch besser matchen kann!'),$_smarty_tpl);?>

								</p>
                	      </div>
                	      <div class="modal-footer">
                	        <button type="button" class="btn btn-default">
                	            <?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?>
                	                <a href="/de/mein-profil/wg-test"><?php echo smarty_function_xr_translate(array('tag'=>'Zu den Fragen'),$_smarty_tpl);?>
</a>
                	            <?php }elseif($_smarty_tpl->getVariable('P_LANG')->value=='en'){?>
                	                <a href="/en/mein-profil/wg-test"><?php echo smarty_function_xr_translate(array('tag'=>'Zu den Fragen'),$_smarty_tpl);?>
</a>
                	            <?php }?>
                                </button>
                	       </div>
                	    </div><!-- /.modal-content -->
                	  </div><!-- /.modal-dialog -->
                	</div><!-- /.modal -->
		<?php }?>
    <?php }?>

</header>
