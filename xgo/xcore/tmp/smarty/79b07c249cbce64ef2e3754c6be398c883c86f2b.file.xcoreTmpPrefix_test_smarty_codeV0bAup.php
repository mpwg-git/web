<?php /* Smarty version Smarty-3.0.7, created on 2017-03-08 09:53:32
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeV0bAup" */ ?>
<?php /*%%SmartyHeaderCode:189710414058bfc68c4fe906-61782480%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79b07c249cbce64ef2e3754c6be398c883c86f2b' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeV0bAup',
      1 => 1488963212,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189710414058bfc68c4fe906-61782480',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_print_r')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_print_r.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::redirectIfLoggedIn"),$_smarty_tpl);?>




<?php echo smarty_function_xr_siteCall(array('fn'=>"fe_util::isV2",'var'=>"isV2"),$_smarty_tpl);?>


<!-- DESKTOP PICTURES -->
<div class="black-bg" style="display: none;">
	<?php if ($_smarty_tpl->getVariable('isV2')->value==1){?>
		<div class="row start-overlay">
			<div class="col-xs-12">
				<div class="row">
					<div class="col-xs-12">
						<hgroup>
						    <!--<?php echo smarty_function_xr_print_r(array('val'=>$_SESSION),$_smarty_tpl);?>
-->
							<!--<h1><?php echo smarty_function_xr_translate(array('tag'=>"WGs finden den perfekten Mitbewohner!"),$_smarty_tpl);?>
</h1>-->
							<?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?>
							    <h1><span class="tight"><?php echo smarty_function_xr_translate(array('tag'=>"WG"),$_smarty_tpl);?>
</span>s <?php echo smarty_function_xr_translate(array('tag'=>"finden den perfekten Mitbewohner"),$_smarty_tpl);?>
</h1>
							<?php }elseif($_smarty_tpl->getVariable('P_LANG')->value=='en'){?>
							    <h1><?php echo smarty_function_xr_translate(array('tag'=>"WGs finden den perfekten Mitbewohner!"),$_smarty_tpl);?>
</h1>
							<?php }?>
							<h2><?php echo smarty_function_xr_translate(array('tag'=>"Finde hier deine perfekte WG durch Persönlichkeitsmatching"),$_smarty_tpl);?>
<h2/>
						</hgroup>
					</div>
					
                    <div class="col-xs-10 col-md-offset-1" style="padding: 0 45px 0 45px;">
					    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>47),$_smarty_tpl);?>
" class="button start-button"><?php echo smarty_function_xr_translate(array('tag'=>'WG Zimmer<br> finden'),$_smarty_tpl);?>
</a>
					    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>48),$_smarty_tpl);?>
" class="button start-button pull-right"><?php echo smarty_function_xr_translate(array('tag'=>'Neuen Mitbewohner<br> finden'),$_smarty_tpl);?>
</a>
					</div>
				</div>
				<div class="row">
                    <div class="col-xs-10 col-md-offset-1">
						<p class="start-text">
							<?php echo smarty_function_xr_translate(array('tag'=>"Lärm, Party, Sauberkeit in der WG? Da hat jeder eine andere Meinung! Anstelle von 100 Interviews, Massen-Castings und böses Erwachen: Einige Fragen zu deinen Erwartungen und Dr. Duck findet jemanden der wirklich zu dir passt!"),$_smarty_tpl);?>

						</p>
						<div class="text-center" style="margin-bottom: 5rem;">
							<!--<div class="text-center">-->
							<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
" class="button start-button start-button-wie"><?php echo smarty_function_xr_translate(array('tag'=>'Wie funktioniert das?'),$_smarty_tpl);?>
</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-10 col-md-offset-1 start-meinungen">
						<p>&nbsp;</p>
						<?php echo smarty_function_xr_wz_fetch(array('id'=>893,'var'=>'aussagen'),$_smarty_tpl);?>

						<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('aussagen')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
							<div class="row start-meinungen-abstand">
								<div class="col-xs-2">
									<!--<?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_BILD'],'w'=>400,'h'=>400,'rmode'=>'cco','class'=>"img-responsive"),$_smarty_tpl);?>
-->
									<?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_BILD'],'rmode'=>'cco','class'=>"img-responsive"),$_smarty_tpl);?>

									<p class="start-aussagen"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_NAME'];?>
</p>
								</div>
								<div class="col-xs-10">
									<p class="start-aussagen">&bdquo;<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEXT'];?>
&ldquo;</p>
								</div>
							</div>
						<?php }} ?>
						<div class="row start-meinungen-abstand"></div>
					</div>
				</div>
			</div>
		</div>
	<?php }?>
	<div class="row picture-row">
		<div class="js-replacer-pictures-start">
			<div class="col-xs-4 picture-col">
				<div class="img-wrapper">
					<div class="inner-wrapper">
						<!--<?php echo smarty_function_xr_imgWrapper(array('s_id'=>545,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>
-->
					</div>
				</div>
			</div>
			<div class="col-xs-4 picture-col">
				<div class="img-wrapper">
					<div class="inner-wrapper">
						<!--<?php echo smarty_function_xr_imgWrapper(array('s_id'=>546,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>
-->
					</div>
				</div>
			</div>
			<div class="col-xs-4 picture-col">
				<div class="img-wrapper">
					<div class="inner-wrapper">
						<!--<?php echo smarty_function_xr_imgWrapper(array('s_id'=>550,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>
-->
					</div>
				</div>
			</div>
			<div class="col-xs-4 picture-col">
				<div class="img-wrapper">
					<div class="inner-wrapper">
						<!--<?php echo smarty_function_xr_imgWrapper(array('s_id'=>549,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>
-->
					</div>
				</div>
			</div>
			<div class="col-xs-4 picture-col">
				<div class="img-wrapper">
					<div class=" logo">
						<div class="inner-wrapper">
							<!--<?php echo smarty_function_xr_imgWrapper(array('s_id'=>18448,'h'=>400,'w'=>375,'class'=>"img-responsive"),$_smarty_tpl);?>
-->
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-4 picture-col">
				<div class="img-wrapper">
					<div class="inner-wrapper">
						<!--<?php echo smarty_function_xr_imgWrapper(array('s_id'=>548,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>
-->
					</div>
				</div>
			</div>
			<div class="col-xs-4 picture-col">
				<div class="img-wrapper">
					<div class="inner-wrapper">
						<!--<?php echo smarty_function_xr_imgWrapper(array('s_id'=>547,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>
-->
					</div>
				</div>
			</div>
			<div class="col-xs-4 picture-col">
				<div class="img-wrapper">
					<div class="inner-wrapper">
						<!--<?php echo smarty_function_xr_imgWrapper(array('s_id'=>543,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>
-->
					</div>
				</div>
			</div>
			<div class="col-xs-4 picture-col">
				<div class="img-wrapper">
					<div class="inner-wrapper">
						<!--<?php echo smarty_function_xr_imgWrapper(array('s_id'=>544,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>
-->
					</div>
				</div>
			</div>
			<?php if ($_smarty_tpl->getVariable('isV2')->value==1){?>
				<div class="col-xs-4 picture-col">
					<div class="img-wrapper">
						<div class="inner-wrapper">
							<!--<?php echo smarty_function_xr_imgWrapper(array('s_id'=>545,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>
-->
						</div>
					</div>
				</div>
				<div class="col-xs-4 picture-col">
					<div class="img-wrapper">
						<div class="inner-wrapper">
							<!--<?php echo smarty_function_xr_imgWrapper(array('s_id'=>546,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>
-->
						</div>
					</div>
				</div>
				<div class="col-xs-4 picture-col">
					<div class="img-wrapper">
						<div class="inner-wrapper">
							<!--<?php echo smarty_function_xr_imgWrapper(array('s_id'=>550,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>
-->
						</div>
					</div>
				</div>
				<div class="col-xs-4 picture-col">
					<div class="img-wrapper">
						<div class="inner-wrapper">
							<!--<?php echo smarty_function_xr_imgWrapper(array('s_id'=>549,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>
-->
						</div>
					</div>
				</div>
				<div class="col-xs-4 picture-col">
					<div class="img-wrapper">
						<div class=" logo">
							<div class="inner-wrapper">
								<!--<?php echo smarty_function_xr_imgWrapper(array('s_id'=>18448,'h'=>400,'w'=>375,'class'=>"img-responsive"),$_smarty_tpl);?>
-->
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-4 picture-col">
					<div class="img-wrapper">
						<div class="inner-wrapper">
							<!--<?php echo smarty_function_xr_imgWrapper(array('s_id'=>548,'h'=>500,'w'=>470,'rmode'=>"cco",'colorspace'=>"gray",'class'=>"img-responsive"),$_smarty_tpl);?>
-->
						</div>
					</div>
				</div>
			<?php }?>
		</div>
	</div>
</div>
