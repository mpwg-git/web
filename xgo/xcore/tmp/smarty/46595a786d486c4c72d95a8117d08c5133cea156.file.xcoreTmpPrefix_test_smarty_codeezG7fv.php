<?php /* Smarty version Smarty-3.0.7, created on 2016-08-12 11:21:04
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeezG7fv" */ ?>
<?php /*%%SmartyHeaderCode:165213074257ad9500387890-79487441%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46595a786d486c4c72d95a8117d08c5133cea156' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeezG7fv',
      1 => 1470993664,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165213074257ad9500387890-79487441',
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
        				<a href="/de/mein-profil/wg-test">
        					<div class="mheader-stoerer">
        						<span>Zu den Fragen</span>
        					</div>
        				</a>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        					<span aria-hidden="true">×</span>
        				</button>
        			</div>
        			<div class="modal-body">
        				<p>
        					<?php echo smarty_function_xr_translate(array('tag'=>'Du hast noch keine Fragen vom WG-Test beantwortet!'),$_smarty_tpl);?>

        					<br>
        					<?php echo smarty_function_xr_translate(array('tag'=>'Dr. Duck kann dir deswegen nicht sagen, wer am besten zu dir passt!'),$_smarty_tpl);?>

        				</p>
			        </div>
			    <div class="modal-footer"></div>
		    </div>
    		<!-- /.modal-content -->
	    </div>
	    <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
	<?php }?>
<?php }?>


</header>