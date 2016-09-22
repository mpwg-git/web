<?php /* Smarty version Smarty-3.0.7, created on 2016-09-15 18:24:22
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/693.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:76736456157dacb36e4c751-51943355%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46bfc20c1975de4977c14ea7bafe8305b4f8df26' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/693.cache-1.html',
      1 => 1472570178,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76736456157dacb36e4c751-51943355',
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
					<div class="modal fade" id="noQuestionModal" tabindex="-1" role="dialog">
                	  <div class="modal-dialog" role="document">
                	    <div class="modal-content">
                	      <div class="modal-header">
                					<span class="icon-duck"></span>
                					<span class="modalh1">Hallo</span>
                					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                	      </div>
                	      <div class="modal-body">
                					<p>
                						<?php echo smarty_function_xr_translate(array('tag'=>'Dr. Duck vergleicht dich gerade mit weiteren Profilen und ist noch mit der Auswertung beschäftigt.'),$_smarty_tpl);?>

                					</p>
                	      </div>
                	      <div class="modal-footer">
                	          <button type="button" class="btn btn-default">
                	              <a href="/de/mein-profil/wg-test">Zu den Fragen</a>
                            </button>
                	       </div>
                	    </div><!-- /.modal-content -->
                	  </div><!-- /.modal-dialog -->
                	</div><!-- /.modal -->
                	<?php }elseif($_REQUEST['dev']==2||($_smarty_tpl->getVariable('hasQuestionsAnswered')->value===false&&$_smarty_tpl->getVariable('hasQuestionsAnsweredInSession')->value)){?>
                	<div class="modal fade" id="noQuestionModal" tabindex="-1" role="dialog">
                	  <div class="modal-dialog" role="document">
                	    <div class="modal-content">
                	      <div class="modal-header">
                					<span class="icon-duck"></span>
                					<span class="modalh1">Hallo</span>
                					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                	      </div>
                	      <div class="modal-body">
                					<p>
                						<?php echo smarty_function_xr_translate(array('tag'=>'Du hast deine WG-Fragen noch nicht ausgefüllt!<br>Bitte investiere 5 Minuten in die Beantwortung deiner Erwartungen an deine Mitbewohner(innen).<br>Dann können wir den perfekten Match für dich finden!'),$_smarty_tpl);?>

                					</p>
                	      </div>
                	      <div class="modal-footer">
                	          <button type="button" class="btn btn-default">
                	              <a href="/de/mein-profil/wg-test">Zu den Fragen</a>
                                </button>
                	       </div>
                	    </div><!-- /.modal-content -->
                	  </div><!-- /.modal-dialog -->
                	</div><!-- /.modal -->
		<?php }?>
    <?php }?>

</header>
