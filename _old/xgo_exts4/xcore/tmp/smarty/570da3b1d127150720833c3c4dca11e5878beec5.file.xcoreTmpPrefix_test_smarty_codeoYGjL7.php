<?php /* Smarty version Smarty-3.0.7, created on 2014-12-19 08:50:52
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoYGjL7" */ ?>
<?php /*%%SmartyHeaderCode:12631233315493e6eccd6383-87062198%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '570da3b1d127150720833c3c4dca11e5878beec5' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeoYGjL7',
      1 => 1418979052,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12631233315493e6eccd6383-87062198',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
?>	<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('work')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    		<div class="col-sm-6 marginBottom40">
    			<div class="row">
    				<div class="col-sm-6">
    					<div class="lw-item"> 
    						<h3 class="nowra"><?php echo $_smarty_tpl->tpl_vars['v']->value['es_campaign'];?>
 <?php echo $_smarty_tpl->tpl_vars['v']->value['es_ad_title'];?>
</h3>
    						<p>
    						    
    						    <?php if ($_smarty_tpl->tpl_vars['v']->value['es_mediaType_id']==2){?>
    						    <?php if ($_smarty_tpl->tpl_vars['v']->value['es_video_poster_s_id']>0){?>
    						    <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['es_video_poster_s_id'],'w'=>604,'h'=>604,'rmode'=>"cco",'var'=>"thumb"),$_smarty_tpl);?>

    						    <?php }else{ ?>
    						    <?php echo smarty_function_xr_img(array('s_id'=>270338,'w'=>604,'h'=>604,'rmode'=>"cco",'var'=>'thumb'),$_smarty_tpl);?>

    						    <?php }?>
    						    <?php }else{ ?>
    						    <?php if ($_smarty_tpl->tpl_vars['v']->value['es_image_highRes_s_id']==0&&$_smarty_tpl->tpl_vars['v']->value['es_image_s_id']==0){?>
                        		<?php echo smarty_function_xr_img(array('s_id'=>270338,'w'=>604,'h'=>604,'rmode'=>"cco",'var'=>'thumb'),$_smarty_tpl);?>

                        		<?php }elseif($_smarty_tpl->tpl_vars['v']->value['es_image_highRes_s_id']>0){?>
                        		<?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['es_image_highRes_s_id'],'w'=>604,'h'=>604,'rmode'=>"cco",'var'=>'thumb'),$_smarty_tpl);?>

                        		<?php }else{ ?>
                        		<?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['es_image_s_id'],'w'=>604,'h'=>604,'rmode'=>"cco",'var'=>'thumb'),$_smarty_tpl);?>

                        		<?php }?>
    						    <?php }?>
    						    <img class="img-responsive" with="605" height="605" src="<?php echo $_smarty_tpl->getVariable('thumb')->value['src'];?>
">
    						 
    						</p>
    						<p><strong>Submission Nr:</strong> <?php echo $_smarty_tpl->tpl_vars['v']->value['es_id'];?>
</p>
    						<p><strong>Submitted on:</strong> <?php echo $_smarty_tpl->tpl_vars['v']->value['DATUM'];?>
</p>
    						<p><strong>Status:</strong> <span class="<?php if ($_smarty_tpl->tpl_vars['v']->value['es_state']==5){?>em-green<?php }elseif($_smarty_tpl->tpl_vars['v']->value['es_state']==1){?>em-red<?php }else{ ?>em-orange<?php }?>"><?php echo $_smarty_tpl->tpl_vars['v']->value['ess_description'];?>
</span></p>
    					    <?php if ($_smarty_tpl->tpl_vars['v']->value['es_mediaType_id']==1){?>
    					    <p><strong>HighRes:</strong> <span class="<?php if ($_smarty_tpl->tpl_vars['v']->value['es_image_highRes_s_id']!=0){?>em-green<?php }else{ ?>em-red<?php }?>"><?php if ($_smarty_tpl->tpl_vars['v']->value['es_image_highRes_s_id']!=0){?>PRESENT<?php }else{ ?>MISSING<?php }?></span></p>
    					    <?php }elseif($_smarty_tpl->tpl_vars['v']->value['es_mediaType_id']==2){?>
    					    <p><strong>HighRes:</strong> <span class="<?php if ($_smarty_tpl->tpl_vars['v']->value['es_video_highRes_s_id']!=0){?>em-green<?php }else{ ?>em-red<?php }?>"><?php if ($_smarty_tpl->tpl_vars['v']->value['es_video_highRes_s_id']!=0){?>PRESENT<?php }else{ ?>MISSING<?php }?></span></p>
    					    <?php }?>
    					    
    					</div>
    				</div>
    				<div class="col-sm-6">
    					<?php echo $_smarty_tpl->tpl_vars['v']->value['HTML'];?>

    					<?php if (isset($_smarty_tpl->tpl_vars['v']->value['URL'])&&$_smarty_tpl->tpl_vars['v']->value['URL']!=''){?>
    					<p><a class="but floatRight" href="<?php echo $_smarty_tpl->tpl_vars['v']->value['URL'];?>
">Edit</a></p>
    					<?php }?>
    				</div>
    			</div>
    		</div>
    		<?php if ($_smarty_tpl->tpl_vars['k']->value>0&&($_smarty_tpl->tpl_vars['k']->value+1)%2==0){?>
    		<div class="clearer"></div>
    		<?php }?>
	<?php }} ?>