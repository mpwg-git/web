<?php /* Smarty version Smarty-3.0.7, created on 2017-03-07 11:10:22
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezl0PUT" */ ?>
<?php /*%%SmartyHeaderCode:190950695558be870e6908d6-60178117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bc98868f6e54c1e24df326ce6bf6094c7897854' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codezl0PUT',
      1 => 1488881422,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190950695558be870e6908d6-60178117',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn",'var'=>"loggedin"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_refreshSessionData','var'=>'xxx'),$_smarty_tpl);?>


<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_search::getUserId','var'=>'id'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_search::getLoginCounter','var'=>'counter'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_getMyUserType','var'=>'type'),$_smarty_tpl);?>






<input type="hidden" id="hiddenUserId" value="<?php echo $_smarty_tpl->getVariable('id')->value;?>
">
<input type="hidden" id="hiddenLoginCounter" value="<?php echo $_smarty_tpl->getVariable('counter')->value;?>
">
<input type="hidden" id="hiddenUserType" value="<?php echo $_smarty_tpl->getVariable('type')->value;?>
">

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_matching::sc_checkIfCurrentUserIsInMatchingToDoTable','var'=>'stillToDo'),$_smarty_tpl);?>

	
<?php if ($_smarty_tpl->getVariable('stillToDo')->value==true){?>
	<div class="modal fade" id="noQuestionModal" tabindex="-1" role="dialog">
		<div class="modal-dialog noQuestionModal" role="document">
			<div class="modal-content noQuestionModal">
				<div class="modal-header">
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
<?php }?>

<div class="searchlist">
    
    <?php if ($_smarty_tpl->getVariable('results')->value['COUNT']>9){?>
        <div class="pfeil pfeil-up searchlist-js-up">
            <span class="icon-pfeil_bg">
    		<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span>
    		</span>
        </div>
    <?php }?>
    
    <div class="row picture-row js-replacer-search">
        
        <?php echo $_smarty_tpl->getVariable('results')->value['HTML'];?>

        
    </div>
   
    <?php if ($_smarty_tpl->getVariable('results')->value['COUNT']>9){?>
        <div class="pfeil pfeil-down searchlist-js-down">
            <span class="icon-pfeil_bg">
    		<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span>
    		</span>
        </div>
    <?php }?>
</div>
