<?php /* Smarty version Smarty-3.0.7, created on 2017-02-20 14:41:28
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/656.cache-1.html" */ ?>
<?php /*%%SmartyHeaderCode:178245990658aaf208e3ce01-32301973%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c660db87e8c74f070829653de176db9791ba85bf' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/656.cache-1.html',
      1 => 1486558322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178245990658aaf208e3ce01-32301973',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_user::checkLoggedIn",'var'=>"loggedin"),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_refreshSessionData','var'=>'xxx'),$_smarty_tpl);?>


<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_search::getUserId','var'=>'id'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_search::getLoginCounter','var'=>'counter'),$_smarty_tpl);?>

<!--<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::getUserType','val'=>'id','var'=>'type'),$_smarty_tpl);?>
-->
<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_user::sc_getMyUserType','var'=>'type'),$_smarty_tpl);?>




<input type="hidden" id="hiddenUserId" value="<?php echo $_smarty_tpl->getVariable('id')->value;?>
">
<input type="hidden" id="hiddenLoginCounter" value="<?php echo $_smarty_tpl->getVariable('counter')->value;?>
">
<input type="hidden" id="hiddenUserType" value="<?php echo $_smarty_tpl->getVariable('type')->value;?>
">


<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_matching::sc_checkIfCurrentUserIsInMatchingToDoTable','var'=>'stillToDo'),$_smarty_tpl);?>

<?php if ($_smarty_tpl->getVariable('stillToDo')->value===true&&$_smarty_tpl->getVariable('wgteststate')->value==1){?>
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
<?php }?>


<?php echo smarty_function_xr_atom(array('a_id'=>778,'showFace'=>0,'return'=>1,'desc'=>'hidden filter field'),$_smarty_tpl);?>


            
            <!--<div class="searchlist" style="height: 100%; overflow-x: hidden;">-->
            <div class="searchlist" style="height: 100%;">
                <div class="row picture-row">
                    
                    
                    <div class="search-slider rsDefault">
                        
                        <div class="js-replacer-search">
                            
                        </div>
                        
                    </div>	
                    
                    
                </div>
            </div>
            

