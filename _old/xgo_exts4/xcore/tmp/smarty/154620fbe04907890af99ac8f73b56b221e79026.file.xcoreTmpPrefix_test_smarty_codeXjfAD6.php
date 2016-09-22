<?php /* Smarty version Smarty-3.0.7, created on 2014-10-31 09:07:04
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeXjfAD6" */ ?>
<?php /*%%SmartyHeaderCode:2084421570545351381d9213-24079898%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '154620fbe04907890af99ac8f73b56b221e79026' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeXjfAD6',
      1 => 1414746424,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2084421570545351381d9213-24079898',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><div id='<?php echo $_smarty_tpl->getVariable('records')->value['pager']['div_id'];?>
'>
<div>


<?php if ($_smarty_tpl->getVariable('records')->value['records']===false&&(!$_smarty_tpl->getVariable('records')->value['recordsCnt']||$_smarty_tpl->getVariable('records')->value['recordsCnt']=='')){?>
NO RECORDS FOUND.

<?php }elseif($_smarty_tpl->getVariable('records')->value['records']===false){?>
NO RECORDS FOUND IN THIS CATEGORY.<br /><br />
Please choose other category to see results.

    <script>
    
    $('#ranking_1 > .rankingCounter').html( " " );
    $('#ranking_2 > .rankingCounter').html( " " );
    $('#ranking_3 > .rankingCounter').html( " " );
    $('#ranking_4 > .rankingCounter').html( " " );
    $('#ranking_5 > .rankingCounter').html( " " );
    $('#ranking_6 > .rankingCounter').html( " " );
    $('#ranking_7 > .rankingCounter').html( " " );
    $('#ranking_8 > .rankingCounter').html( " " );
    $('#ranking_9 > .rankingCounter').html( " " );
    $('#ranking_10 > .rankingCounter').html( " " );
    $('#ranking_11 > .rankingCounter').html( " " );
    $('#ranking_12 > .rankingCounter').html( " " );
    $('#ranking_13 > .rankingCounter').html( " " );
    $('#ranking_14 > .rankingCounter').html( " " );
    $('#ranking_15 > .rankingCounter').html( " " );
    $('#ranking_16 > .rankingCounter').html( " " );
    
    <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('records')->value['recordsCnt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['count']['index']=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['count']['index']++;
?>
   
    $('#ranking_'+<?php echo $_smarty_tpl->tpl_vars['c']->value['contact_type'];?>
+' > .rankingCounter').html( " (<b><?php echo $_smarty_tpl->tpl_vars['c']->value['count'];?>
</b>)" );
    <?php }} ?>
    </script>

<?php }else{ ?>

    <script>
    
    $('#ranking_1 > .rankingCounter').html( " " );
    $('#ranking_2 > .rankingCounter').html( " " );
    $('#ranking_3 > .rankingCounter').html( " " );
    $('#ranking_4 > .rankingCounter').html( " " );
    $('#ranking_5 > .rankingCounter').html( " " );
    $('#ranking_6 > .rankingCounter').html( " " );
    $('#ranking_7 > .rankingCounter').html( " " );
    $('#ranking_8 > .rankingCounter').html( " " );
    $('#ranking_9 > .rankingCounter').html( " " );
    $('#ranking_10 > .rankingCounter').html( " " );
    $('#ranking_11 > .rankingCounter').html( " " );
    $('#ranking_12 > .rankingCounter').html( " " );
    $('#ranking_13 > .rankingCounter').html( " " );
    $('#ranking_14 > .rankingCounter').html( " " );
    $('#ranking_15 > .rankingCounter').html( " " );
    $('#ranking_16 > .rankingCounter').html( " " );
    
    
    <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('records')->value['recordsCnt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
    $('#ranking_'+<?php echo $_smarty_tpl->tpl_vars['c']->value['contact_type'];?>
+' > .rankingCounter').html( " (<b><?php echo $_smarty_tpl->tpl_vars['c']->value['count'];?>
</b>)" );
    <?php }} ?>
    </script>

    <?php if ($_smarty_tpl->getVariable('records')->value['overall']==1){?>
    
    
        <div class="row">
            <div class="col-sm-12">
                <table class="rankingOverallTable">
                    <tr>
                        <!-- <th>
                            Image
                        </th> -->
                        <th>
                            Name
                        </th>
                        <th>
                            Category
                        </th>
                        <th>
                            Current year
                        </th>
                        <th>
                            Last year
                        </th>
                        <th>
                            Last 3 years
                        </th>
                        <th>
                            Last 5 years
                        </th>
                        <th>
                            Last 10 years
                        </th>
                        <th>
                            Overall
                        </th>
                    </tr>
                   
                    <?php  $_smarty_tpl->tpl_vars['x'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('records')->value['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['x']->key => $_smarty_tpl->tpl_vars['x']->value){
?>
                    
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['x']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['count']['index']=-1;
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['count']['index']++;
?>
                        <tr>

                            <td>
                                <?php if (($_smarty_tpl->getVariable('smarty')->value['foreach']['count']['index']==0)){?>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['fep_fullname'];?>
</a>
                                <?php }?>
                                
                            </td>
                            <td class="capitalize">
                                <?php echo $_smarty_tpl->tpl_vars['v']->value['act_description'];?>

                            </td>
                            <td>
                                 <?php echo $_smarty_tpl->tpl_vars['v']->value['RANK0'];?>

                            </td>
                            <td>
                                 <?php echo $_smarty_tpl->tpl_vars['v']->value['RANK1'];?>

                            </td>
                            <td>
                                 <?php echo $_smarty_tpl->tpl_vars['v']->value['RANK3'];?>

                            </td>
                            <td>
                                 <?php echo $_smarty_tpl->tpl_vars['v']->value['RANK5'];?>

                            </td>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['v']->value['RANK10'];?>

                            </td>
                            <td>
                                <?php echo $_smarty_tpl->tpl_vars['v']->value['RANKOVERALL'];?>

                            </td>
                        </tr>
                        <?php }} ?>
                    
                    <tr>
                        <td colspan="8"><hr /></td>
                    </tr>
                    <?php }} ?>
                    
                </table>
            </div>
        </div>
    
    <?php }else{ ?>

        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('records')->value['records']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <div class="row">
        
        	<div class="col-sm-3">
        		<p><a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
">
        		<?php if ($_smarty_tpl->tpl_vars['v']->value['fep_profile_image_s_id']==0){?>
        		    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>858272,'w'=>180,'h'=>240,'class'=>"img-responsive"),$_smarty_tpl);?>

        		<?php }else{ ?>
        		    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['fep_profile_image_s_id'],'w'=>180,'h'=>240,'class'=>"img-responsive leichterrahmen"),$_smarty_tpl);?>

        		<?php }?>
        		</a></p>
        	</div>
        	<div class="col-sm-5">
        	
        	<?php $_smarty_tpl->tpl_vars['pos'] = new Smarty_variable(intval($_smarty_tpl->getVariable('records')->value['pager']['start'])+$_smarty_tpl->tpl_vars['k']->value, null, null);?>
        	    
        		<p class="r-pos">CURRENTLY RANKED - <span>
        		    
                <?php if ($_smarty_tpl->tpl_vars['v']->value['RANK']){?>
        	    <?php echo $_smarty_tpl->tpl_vars['v']->value['RANK'];?>

                <?php }else{ ?>
                <?php if ($_smarty_tpl->getVariable('pos')->value+1<10){?>0<?php }?><?php echo $_smarty_tpl->getVariable('pos')->value+1;?>

                <?php }?>
        	        		    
        		</span></p>
        		<h3><?php if (($_smarty_tpl->tpl_vars['v']->value['TYPE']==0&&$_smarty_tpl->tpl_vars['v']->value['fep_company']!='')){?>
        		<?php echo $_smarty_tpl->tpl_vars['v']->value['fep_company'];?>

        		    <?php if ($_smarty_tpl->tpl_vars['v']->value['fep_company']==''){?>
        		        <?php echo $_smarty_tpl->tpl_vars['v']->value['fep_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['v']->value['fep_lastname'];?>

        		    <?php }?>
        		<?php }else{ ?>
        		<?php if ($_smarty_tpl->tpl_vars['v']->value['fep_firstname']!=''){?><?php echo $_smarty_tpl->tpl_vars['v']->value['fep_firstname'];?>
 <?php }?><?php echo $_smarty_tpl->tpl_vars['v']->value['fep_lastname'];?>

        		    <?php if ($_smarty_tpl->tpl_vars['v']->value['fep_firstname']==''&&$_smarty_tpl->tpl_vars['v']->value['fep_lastname']==''){?>
        		        <?php echo $_smarty_tpl->tpl_vars['v']->value['fep_company'];?>

        		    <?php }?>
        		<?php }?>
        		</h3>
        		<div class="progress">
        			<div style="width: <?php if ($_smarty_tpl->tpl_vars['v']->value[$_smarty_tpl->getVariable('records')->value['field']]<100){?><?php echo $_smarty_tpl->tpl_vars['v']->value[$_smarty_tpl->getVariable('records')->value['field']];?>
<?php }else{ ?>100<?php }?>%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar">
        				<?php echo $_smarty_tpl->tpl_vars['v']->value[$_smarty_tpl->getVariable('records')->value['field']];?>

        			</div>
        		</div>
        	</div>
        </div>
        <?php }} ?>
    <?php }?>

<?php }?>


</div>

<div class="row">
<div class="col-sm-12">

<?php if ($_smarty_tpl->getVariable('records')->value['records']!==false){?>
<!--- pagination start --->
		
		
            <div class="pagination-wrapper">
                <ul class="pagination pagination-box fe_pager">

                    <li><a href="#" data-pager='<?php echo $_smarty_tpl->getVariable('records')->value['pager']['pager'];?>
' data-pager-pos='<?php echo $_smarty_tpl->getVariable('records')->value['pager']['prev'];?>
' data-pager-div='<?php echo $_smarty_tpl->getVariable('records')->value['pager']['div_id'];?>
' data-pager-cnt='<?php echo $_smarty_tpl->getVariable('records')->value['pager']['cnt'];?>
' data-pager-params='<?php echo $_smarty_tpl->getVariable('records')->value['pager']['params'];?>
'>&laquo;</a></li>
                    
                    
                    <?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('records')->value['pager']['buttons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value){
?>
                    <li class="<?php if ($_smarty_tpl->tpl_vars['b']->value==$_smarty_tpl->getVariable('records')->value['pager']['pos']){?>active<?php }?>"><a href="#" data-pager='<?php echo $_smarty_tpl->getVariable('records')->value['pager']['pager'];?>
' data-pager-pos='<?php echo $_smarty_tpl->tpl_vars['b']->value;?>
' data-pager-div='<?php echo $_smarty_tpl->getVariable('records')->value['pager']['div_id'];?>
' data-pager-cnt='<?php echo $_smarty_tpl->getVariable('records')->value['pager']['cnt'];?>
' data-pager-params='<?php echo $_smarty_tpl->getVariable('records')->value['pager']['params'];?>
'><?php echo $_smarty_tpl->tpl_vars['b']->value+1;?>
</a></li>
                    <?php }} ?>
                    
                    
                    <li><a href="#" data-pager='<?php echo $_smarty_tpl->getVariable('records')->value['pager']['pager'];?>
' data-pager-pos='<?php echo $_smarty_tpl->getVariable('records')->value['pager']['next'];?>
' data-pager-div='<?php echo $_smarty_tpl->getVariable('records')->value['pager']['div_id'];?>
' data-pager-cnt='<?php echo $_smarty_tpl->getVariable('records')->value['pager']['cnt'];?>
' data-pager-params='<?php echo $_smarty_tpl->getVariable('records')->value['pager']['params'];?>
'>&raquo;</a></li>
                    
                    
                </ul>
                
                <div class="pagernumberswrapper">
                <div class="btn-group number-items-dropdown fe_pager_cnt">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?php echo $_smarty_tpl->getVariable('records')->value['pager']['cnt'];?>
 <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu">
                        
                        <?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('records')->value['pager']['limits']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value){
?>
                        <li><a href="#" data-cnt='<?php echo $_smarty_tpl->tpl_vars['l']->value;?>
' data-pager='<?php echo $_smarty_tpl->getVariable('records')->value['pager']['pager'];?>
' data-div='<?php echo $_smarty_tpl->getVariable('records')->value['pager']['div_id'];?>
' data-pager-params='<?php echo $_smarty_tpl->getVariable('records')->value['pager']['params'];?>
'><?php echo $_smarty_tpl->tpl_vars['l']->value;?>
</a></li>
                        <?php }} ?>
                        
                    </ul>
                </div>
                <div class="number-per-page">Items per page:</div>
                </div>
                
            </div>
            
<!--- pagination end --->
<?php }?>
</div>


</div>
</div>