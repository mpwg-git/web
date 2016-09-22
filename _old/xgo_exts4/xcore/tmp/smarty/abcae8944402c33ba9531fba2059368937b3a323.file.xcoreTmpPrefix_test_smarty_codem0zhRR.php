<?php /* Smarty version Smarty-3.0.7, created on 2014-08-13 17:45:20
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codem0zhRR" */ ?>
<?php /*%%SmartyHeaderCode:173929444553eb88100bc0b4-78384954%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'abcae8944402c33ba9531fba2059368937b3a323' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codem0zhRR',
      1 => 1407944720,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173929444553eb88100bc0b4-78384954',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_students::sc_get_media_details','var'=>'data'),$_smarty_tpl);?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_students::sc_already_voted','var'=>'vote'),$_smarty_tpl);?>


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
		    
    		<h1>Student of the year - Voting</h1>
			
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	<div class="row">
		<div class="col-sm-9">
		    
		    <h1><?php echo $_smarty_tpl->getVariable('data')->value['TITLE'];?>
 <span class="workdetailmagazineinfos">(<?php echo $_smarty_tpl->getVariable('data')->value['MAGAZINEEDITION'];?>
/<?php echo $_smarty_tpl->getVariable('data')->value['MAGAZINEYEAR'];?>
)</span></h1>
		</div>
		<div class="col-sm-3"></div>
	</div>
	
    <div class="row">
		<div class="col-sm-8 workdetailpic">
			<p class="labelpic"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('data')->value['IMG'],'w'=>1140,'class'=>"img-responsive rsImg"),$_smarty_tpl);?>
</p>
			<div class="picbottommetalinks"><p class="lw-item workdetailpicbottom"><a class="workdetailsizebutton but" href="">Enlarge</a> <a class="workdetailsizebutton but" href="" style="display: none">Shrink</a></p></div>
		</div>
		<div class="col-sm-4 workdetailright">
		    <?php echo $_smarty_tpl->getVariable('data')->value['CREDITSHTML'];?>

		    <div class="workdetailmetainfo">
    			<p><span class="workdetailmetatitle">Views:</span> <?php echo $_smarty_tpl->getVariable('data')->value['VIEWS'];?>
</p>
    		
    			
    		</div>
    		
    		<div class="workdetailmetainfo">
    			<h2>Think this is a winner?</h2>
    		    
    		    <textarea name="voting_comment" id="voting_comment" class="form-control" style="height: 150px;"<?php if (count($_smarty_tpl->getVariable('vote')->value)>0){?> disabled="disabled"<?php }?>><?php echo $_smarty_tpl->getVariable('vote')->value['evs_comment'];?>
</textarea>
    		    <div class="clearer"></div>
    			<br />
		        <br />
		        <div class="picbottommetalinks"><p class="lw-item workdetailpicbottom">
    		        <?php if (count($_smarty_tpl->getVariable('vote')->value)>0){?>
    		        <?php if ($_smarty_tpl->getVariable('vote')->value['evs_vote']==1){?>
    		        <a class="but button-large disable-submission-send" href="#">Yes</a>
    		        <?php }else{ ?>
    		        <a class="but button-large disable-submission-send" href="#" style="margin-left: 6px;">No</a>
    		        <?php }?>
    		        <?php }else{ ?>
    		        <a class="but button-large" style="margin-right: 6px;" href="#" id="voting_yes" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['ID'];?>
">Yes</a>
    		        <a class="but button-large" href="#" id="voting_no" data-id="<?php echo $_smarty_tpl->getVariable('data')->value['ID'];?>
">No</a>
    		        <?php }?>
    		        <div class="clearer"></div>
    		        <br />
    		        <span id="voting_successfull" style="display:none; color: green; font-weight: bold; float:right;">Voting successfull!</span>
		        </p></div>
			    <br /><br />
    		</div>
		</div>
	</div>
	<?php if ($_smarty_tpl->getVariable('data')->value['TEXT']!=''){?>
	<div class="row">
	    <div class="col-sm-12">
	        <p class="workdetailtext"><?php echo $_smarty_tpl->getVariable('data')->value['TEXT'];?>
</p>
	    </div>
	</div>	
	<?php }?>
	<div class="row workdetailscreditbottom" style="display: none">
	    <div class="col-sm-12">
	        <?php echo $_smarty_tpl->getVariable('data')->value['CREDITSHTML'];?>
<br />
	    </div>
	</div>	
	<!--
	<div class="row">
	    <div class="col-sm-8">
	        <hr>
        	<p class="keywords"><strong>Keywords:</strong> 
                <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['KEYWORDS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                    <a href="/en/search/keyword/<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</a>
                <?php }} ?>
            </p>
        </div>
	</div>	
	-->
	<div class="row">
		<div class="col-sm-12">
			<hr>
			<div class="share">
				<?php echo smarty_function_xr_atom(array('a_id'=>461,'return'=>1),$_smarty_tpl);?>

			</div>
			<div class="clearer"></div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
	
			<div class="comments-disqus">
	               <!-- disqus -->
    	            <?php echo smarty_function_xr_atom(array('a_id'=>462,'return'=>1),$_smarty_tpl);?>

			</div>
    	</div>
	</div>

<script>
    $(document).ready(function() {
        fe_count.view('MEDIA',<?php echo $_smarty_tpl->getVariable('data')->value['ID'];?>
);
    });
</script>