<?php /* Smarty version Smarty-3.0.7, created on 2014-08-05 20:41:11
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/559.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:95207353153e125477abd04-07119253%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b788c84ba6e8bc67affc4421b9c8958898655ee6' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/559.cache.html',
      1 => 1407264071,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95207353153e125477abd04-07119253',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_submissions::sc_confirm','SUBMISSIONTYPE'=>'SPECIALS','var'=>'data'),$_smarty_tpl);?>


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
		    <h1>Confirm - Print</h1>
		    
		    <ul class="nav nav-pills p-woche">
    			<li><a href="#">Step 1 - Contact Data</a></li>
    			<li class=""><a href="#">Step 2- Input Your Work</a></li>
    			<li class="active"><a href="#">Step 3- Confirm</a></li>
    		</ul>
		
		</div>
		<div class="col-sm-3"></div>
	</div>
	
	<div class="row">
		<div id="uploaded-images" class="col-sm-12">
		
			
		<div id="uploaded-imagess" class="col-sm-12">
			
		<!-- image BEGIN -->

	    
		
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <div class="row uploadedImg-1 submission-wrapper" style="margin-top: 40px; position:relative;" id="submission-wrapper-247">
				<div class="col-sm-4 static-uploaded-images">
				
					<?php if ($_smarty_tpl->tpl_vars['v']->value['estd_highres_thumbnail']!=''){?>
            		<img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['estd_highres_thumbnail'];?>
" class="img-responsive" alt="">
            		<?php }else{ ?>
            		<img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['estd_lowres_thumbnail'];?>
" class="img-responsive" alt="">
            		<?php }?>
					
					<div class="image-info-plus upload-area">
						highres status:  <?php if ($_smarty_tpl->tpl_vars['v']->value['estd_highres']!=''){?><span style="color: green;">PRESENT</span><?php }else{ ?><span style="color: red;">MISSING</span><?php }?>
					</div>
					
					
				</div>
				
				<div class="col-sm-6 static-credits uploadedImg-1">
				<form class="submit-submission" id="submit-submission-247">	
		
					<div class="form-group">
								<label for="exampleInputKEY">Campaign</label>
								<br />
								<?php echo $_smarty_tpl->tpl_vars['v']->value['RAW']['Campaign'];?>

					</div>
					
					<div class="form-group">
								<label for="exampleInputAT">Ad Title</label>
								<br />
								<?php echo $_smarty_tpl->tpl_vars['v']->value['RAW']['ADTitle'];?>

					</div>
					
					<div class="form-group">
								<label for="exampleInputADDescription">Explanation</label>
								<br />
								<?php echo $_smarty_tpl->tpl_vars['v']->value['RAW']['Explanation'];?>

					</div>
					
					<div class="form-group">
								<label for="datepicker">Release Date</label>
								<br />
								<?php echo $_smarty_tpl->tpl_vars['v']->value['RAW']['Release'];?>

					</div>
		
					<div class="form-group">
							<label for="exampleInputKEY">Keywords</label>
							<br />
							<?php echo $_smarty_tpl->tpl_vars['v']->value['RAW']['Keywords'];?>

					</div>
		
		
					<div class="form-group">
						<h3 class="linieBottom">Credits</h3>
						<ul class="listCD">
						    <?php  $_smarty_tpl->tpl_vars['credit'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['v']->value['CREDITS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['credit']->key => $_smarty_tpl->tpl_vars['credit']->value){
 $_smarty_tpl->tpl_vars['c']->value = $_smarty_tpl->tpl_vars['credit']->key;
?>
							<li class="I<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
ND linieBottom">
                                <a href="#"><strong><?php echo $_smarty_tpl->tpl_vars['credit']->value['TYPE'];?>
:</strong> <?php echo $_smarty_tpl->tpl_vars['credit']->value['CREDITLIST'];?>
</a>
                            </li>
                            <?php }} ?>
						</ul>
					</div>
						
				</form>	
				</div>
			
          
            
			</div>
            <?php if (count($_smarty_tpl->getVariable('data')->value)>($_smarty_tpl->tpl_vars['k']->value+1)){?>
            <hr>
            <?php }?>
<?php }} ?>
        </div>
<!-- image END --><!-- image BEGIN -->
										
		
		</div>										
	</div>

</div>

<div class="checkbox">
  <label>
    <input type="checkbox" value="" id="checkbox_agree_toc">
    <p id="text_agree_toc">I agree to the <a data-remote="<?php echo smarty_function_xr_genlink(array('p_id'=>86),$_smarty_tpl);?>
" data-target="#myModal" data-toggle="modal" href="#" id="text_agree_toc_link">terms and conditions</a></p>
  </label>
</div>

<div class="row">
    <div class="col-sm-12 marginTop20 marginBottom20">
    <a class="but button-large" href="<?php echo smarty_function_xr_genlink(array('p_id'=>99),$_smarty_tpl);?>
">Back</a> <a id="submit-confirm" class="but button-large" href="<?php echo smarty_function_xr_genlink(array('p_id'=>103),$_smarty_tpl);?>
">Confirm</a>
    </div>
</div>

<br />