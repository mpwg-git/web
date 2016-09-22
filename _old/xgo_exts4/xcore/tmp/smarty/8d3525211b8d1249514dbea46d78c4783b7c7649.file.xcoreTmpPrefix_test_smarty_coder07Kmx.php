<?php /* Smarty version Smarty-3.0.7, created on 2014-10-16 09:49:48
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coder07Kmx" */ ?>
<?php /*%%SmartyHeaderCode:497202062543f94bc8dcf41-85378992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d3525211b8d1249514dbea46d78c4783b7c7649' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_coder07Kmx',
      1 => 1413452988,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '497202062543f94bc8dcf41-85378992',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?>

<?php if ($_smarty_tpl->getVariable('result_cnt')->value==0){?>
<div class="row quick-content">
    <div style="width: 198px; text-align: center; font-size: 16px;">
    No results... 
    </div>
</div>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['anzahl'] = new Smarty_variable(count($_smarty_tpl->getVariable('result')->value), null, null);?>
    
    <div class="row quick-content">
    
        <div class="quick-close"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270337,'w'=>15,'h'=>15,'ext'=>'png'),$_smarty_tpl);?>
</div>
    
        <div class="col-sm-4 quick-column">
            <div class="row quick-row">
            
                <?php if ($_smarty_tpl->getVariable('result')->value['PRINT']['COUNT']==''){?><?php if (!isset($_smarty_tpl->tpl_vars['result']) || !is_array($_smarty_tpl->tpl_vars['result']->value)) $_smarty_tpl->createLocalArrayVariable('result', null, null);
$_smarty_tpl->tpl_vars['result']->value['PRINT']['COUNT'] = 0;?><?php }?>
                <h2><a href="<?php echo $_smarty_tpl->getVariable('result')->value['PRINT']['LINK_OVERVIEW'];?>
">Print</a> <span class="resultsnumber"><a href="<?php echo $_smarty_tpl->getVariable('result')->value['PRINT']['LINK_OVERVIEW'];?>
">(<?php echo $_smarty_tpl->getVariable('result')->value['PRINT']['COUNT'];?>
)</a></span><div class="quick-more"><a href="<?php echo $_smarty_tpl->getVariable('result')->value['PRINT']['LINK_OVERVIEW'];?>
">more</a></div></h2>
                
                <?php if (array_key_exists('PRINT',$_smarty_tpl->getVariable('result')->value)){?>
                
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value['PRINT']['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                        <?php if ($_smarty_tpl->tpl_vars['k']->value>4){?><?php break 1?><?php }?> 
                        <div class="col-sm-12 quick-item">
                            <div class="row">
                                <?php if (($_smarty_tpl->tpl_vars['v']->value['IMG'])){?>
                                    <div class="col-sm-3 quick-image">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>400,'h'=>300,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
</a>
                                    </div>
                                    <div class="col-sm-9 quick-text">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><h3><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
&nbsp;</h3></a>
                                        <span class="quick-archiv-nr"><?php echo $_smarty_tpl->tpl_vars['v']->value['ARCHIV_NR'];?>
</span>
                                    </div>
                                <?php }else{ ?>
                                    <div class="col-sm-12 quick-textfull">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><h3><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
&nbsp;</h3></a>
                                        <span class="quick-archiv-nr"><?php echo $_smarty_tpl->tpl_vars['v']->value['ARCHIV_NR'];?>
</span>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    <?php }} ?>
                <?php }else{ ?>
                
                    NO RECORDS
                
                <?php }?>
                    
            </div>
        </div>
        
        <div class="col-sm-4 quick-column">
            <div class="row quick-row">
            
                <?php if ($_smarty_tpl->getVariable('result')->value['VIDEOS']['COUNT']==''){?><?php if (!isset($_smarty_tpl->tpl_vars['result']) || !is_array($_smarty_tpl->tpl_vars['result']->value)) $_smarty_tpl->createLocalArrayVariable('result', null, null);
$_smarty_tpl->tpl_vars['result']->value['VIDEOS']['COUNT'] = 0;?><?php }?>
                <h2><a href="<?php echo $_smarty_tpl->getVariable('result')->value['VIDEOS']['LINK_OVERVIEW'];?>
">Videos</a> <span class="resultsnumber"><a href="<?php echo $_smarty_tpl->getVariable('result')->value['VIDEOS']['LINK_OVERVIEW'];?>
">(<?php echo $_smarty_tpl->getVariable('result')->value['VIDEOS']['COUNT'];?>
)</a></span><div class="quick-more"><a href="<?php echo $_smarty_tpl->getVariable('result')->value['VIDEOS']['LINK_OVERVIEW'];?>
">more</a></div></h2>
                
                <?php if (array_key_exists('VIDEOS',$_smarty_tpl->getVariable('result')->value)){?>
                
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value['VIDEOS']['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                        <?php if ($_smarty_tpl->tpl_vars['k']->value>4){?><?php break 1?><?php }?> 
                        <div class="col-sm-12 quick-item">
                            <div class="row">
                                <?php if (($_smarty_tpl->tpl_vars['v']->value['IMG'])){?>
                                    <div class="col-sm-3 quick-image">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>480,'h'=>270,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
</a>
                                    </div>
                                    <div class="col-sm-9 quick-text">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><h3><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
&nbsp;</h3></a>
                                        <span class="quick-archiv-nr"><?php echo $_smarty_tpl->tpl_vars['v']->value['ARCHIV_NR'];?>
</span>
                                    </div>
                                <?php }else{ ?>
                                    <div class="col-sm-12 quick-textfull">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><h3><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
&nbsp;</h3></a>
                                        <span class="quick-archiv-nr"><?php echo $_smarty_tpl->tpl_vars['v']->value['ARCHIV_NR'];?>
</span>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    <?php }} ?>
                <?php }else{ ?>
                
                    NO RECORDS
                
                <?php }?>
                    
            </div>
        </div>
        
        <div class="col-sm-4 quick-column">
            <div class="row quick-row">
            
                <?php if ($_smarty_tpl->getVariable('result')->value['DIGITAL']['COUNT']==''){?><?php if (!isset($_smarty_tpl->tpl_vars['result']) || !is_array($_smarty_tpl->tpl_vars['result']->value)) $_smarty_tpl->createLocalArrayVariable('result', null, null);
$_smarty_tpl->tpl_vars['result']->value['DIGITAL']['COUNT'] = 0;?><?php }?>
                <h2><a href="<?php echo $_smarty_tpl->getVariable('result')->value['DIGITAL']['LINK_OVERVIEW'];?>
">Digital</a> <span class="resultsnumber"><a href="<?php echo $_smarty_tpl->getVariable('result')->value['DIGITAL']['LINK_OVERVIEW'];?>
">(<?php echo $_smarty_tpl->getVariable('result')->value['DIGITAL']['COUNT'];?>
)</a></span><div class="quick-more"><a href="<?php echo $_smarty_tpl->getVariable('result')->value['PROFILES']['LINK_OVERVIEW'];?>
">more</a></div></h2>
                
                <?php if (array_key_exists('DIGITAL',$_smarty_tpl->getVariable('result')->value)){?>
                
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value['DIGITAL']['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                        <?php if ($_smarty_tpl->tpl_vars['k']->value>4){?><?php break 1?><?php }?> 
                        <div class="col-sm-12 quick-item">
                            <div class="row">
                                
                                    <div class="col-sm-3 quick-image">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['IMG']!=''){?><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>400,'h'=>300,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270410,'w'=>400,'h'=>300,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
<?php }?></a>
                                    </div>
                                    <div class="col-sm-9 quick-text">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><h3><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
 <?php echo $_smarty_tpl->tpl_vars['v']->value['COMPANY'];?>
&nbsp;</h3></a>
                                        <span class="quick-archiv-nr"><?php if ($_smarty_tpl->tpl_vars['v']->value['TYPEX']==4){?>WEB<?php }elseif($_smarty_tpl->tpl_vars['v']->value['TYPEX']==5){?>APP<?php }?></span>
                                    </div>
                                
                            </div>
                        </div>
                    <?php }} ?>
                <?php }else{ ?>
                
                    NO RECORDS
                
                <?php }?>
                    
            </div>
        </div>
        
    </div>
    
    <div class="row quick-content">
    
        <div class="col-sm-4 quick-column">
            <div class="row quick-row">
            
            
                <?php if ($_smarty_tpl->getVariable('result')->value['PROFILES']['COUNT']==''){?><?php if (!isset($_smarty_tpl->tpl_vars['result']) || !is_array($_smarty_tpl->tpl_vars['result']->value)) $_smarty_tpl->createLocalArrayVariable('result', null, null);
$_smarty_tpl->tpl_vars['result']->value['PROFILES']['COUNT'] = 0;?><?php }?>
                <h2><a href="<?php echo $_smarty_tpl->getVariable('result')->value['PROFILES']['LINK_OVERVIEW'];?>
">Profiles</a> <span class="resultsnumber"><a href="<?php echo $_smarty_tpl->getVariable('result')->value['PROFILES']['LINK_OVERVIEW'];?>
">(<?php echo $_smarty_tpl->getVariable('result')->value['PROFILES']['COUNT'];?>
)</a></span><div class="quick-more"><a href="<?php echo $_smarty_tpl->getVariable('result')->value['PROFILES']['LINK_OVERVIEW'];?>
">more</a></div></h2>
                
                <?php if (array_key_exists('PROFILES',$_smarty_tpl->getVariable('result')->value)){?>
                
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value['PROFILES']['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                        <?php if ($_smarty_tpl->tpl_vars['k']->value>4){?><?php break 1?><?php }?> 
                        <div class="col-sm-12 quick-item-profile">
                            <div class="row">
                                
                                    <div class="col-sm-3 quick-image">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['IMG']!=0){?><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>300,'h'=>350,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_imgWrapper(array('s_id'=>614973,'w'=>300,'h'=>350,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
<?php }?></a>
                                    </div>
                                    <div class="col-sm-9 quick-text">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><h3><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
&nbsp;</h3></a>
                                        <span class="quick-archiv-nr"> <?php if ($_smarty_tpl->tpl_vars['v']->value['COMPANY']!=''&&$_smarty_tpl->tpl_vars['v']->value['COMPANY']!='c/o'){?><?php echo $_smarty_tpl->tpl_vars['v']->value['COMPANY'];?>
<br /><?php }?><?php if ($_smarty_tpl->tpl_vars['v']->value['CITY']!=''){?><?php echo $_smarty_tpl->tpl_vars['v']->value['CITY'];?>
 <?php }?><?php if ($_smarty_tpl->tpl_vars['v']->value['COUNTRY']!=''){?><?php echo $_smarty_tpl->tpl_vars['v']->value['COUNTRY'];?>
<?php }?></span>
                                    </div>
                                
                            </div>
                        </div>
                    <?php }} ?>
                <?php }else{ ?>
                
                    NO RECORDS
                
                <?php }?>
                    
            </div>
        </div>
        
        <div class="col-sm-4 quick-column">
            <div class="row quick-row">
            
                <?php if ($_smarty_tpl->getVariable('result')->value['INTERVIEWS']['COUNT']==''){?><?php if (!isset($_smarty_tpl->tpl_vars['result']) || !is_array($_smarty_tpl->tpl_vars['result']->value)) $_smarty_tpl->createLocalArrayVariable('result', null, null);
$_smarty_tpl->tpl_vars['result']->value['INTERVIEWS']['COUNT'] = 0;?><?php }?>
                <h2><a href="<?php echo $_smarty_tpl->getVariable('result')->value['INTERVIEWS']['LINK_OVERVIEW'];?>
">Interviews</a> <span class="resultsnumber"><a href="<?php echo $_smarty_tpl->getVariable('result')->value['INTERVIEWS']['LINK_OVERVIEW'];?>
">(<?php echo $_smarty_tpl->getVariable('result')->value['INTERVIEWS']['COUNT'];?>
)</a></span><div class="quick-more"><a href="<?php echo $_smarty_tpl->getVariable('result')->value['INTERVIEWS']['LINK_OVERVIEW'];?>
">more</a></div></h2>
                
                <?php if (array_key_exists('INTERVIEWS',$_smarty_tpl->getVariable('result')->value)){?>
                
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value['INTERVIEWS']['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                   
                        <?php if ($_smarty_tpl->tpl_vars['k']->value>4){?><?php break 1?><?php }?> 
                        <div class="col-sm-12 quick-item">
                            <div class="row">
                                <div class="col-sm-3 quick-image">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php if ($_smarty_tpl->tpl_vars['v']->value['IMG']!=0){?><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>400,'h'=>300,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270410,'w'=>400,'h'=>300,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
<?php }?></a>
                                </div>
                                <div class="col-sm-9 quick-text">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><h3><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
&nbsp;</h3></a>
                                    <span class="quick-archiv-nr"><?php if ($_smarty_tpl->tpl_vars['v']->value['TABLE_X_X']==0){?>INTERVIEW - <?php }else{ ?>DIGITAL INTERVIEW - <?php }?><?php echo $_smarty_tpl->tpl_vars['v']->value['EDITION'];?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value['YEAR'];?>
</span>
                                </div>
                            </div>
                        </div>
                    <?php }} ?>
                <?php }else{ ?>
                
                    NO RECORDS
                
                <?php }?>
                    
            </div>
        </div>
        
        <div class="col-sm-4 quick-column">
            <div class="row quick-row">
            
                <?php if ($_smarty_tpl->getVariable('result')->value['FEATURES']['COUNT']==''){?><?php if (!isset($_smarty_tpl->tpl_vars['result']) || !is_array($_smarty_tpl->tpl_vars['result']->value)) $_smarty_tpl->createLocalArrayVariable('result', null, null);
$_smarty_tpl->tpl_vars['result']->value['FEATURES']['COUNT'] = 0;?><?php }?>
                <h2><a href="<?php echo $_smarty_tpl->getVariable('result')->value['FEATURES']['LINK_OVERVIEW'];?>
">Features</a> <span class="resultsnumber"><a href="<?php echo $_smarty_tpl->getVariable('result')->value['FEATURES']['LINK_OVERVIEW'];?>
">(<?php echo $_smarty_tpl->getVariable('result')->value['FEATURES']['COUNT'];?>
)</a></span><div class="quick-more"><a href="<?php echo $_smarty_tpl->getVariable('result')->value['FEATURES']['LINK_OVERVIEW'];?>
">more</a></div></h2>
                
                <?php if (array_key_exists('FEATURES',$_smarty_tpl->getVariable('result')->value)){?>
                
                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('result')->value['FEATURES']['ITEMS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                        <?php if ($_smarty_tpl->tpl_vars['k']->value>6){?><?php break 1?><?php }?> 
                        <div class="col-sm-12 quick-item">
                            <?php if ($_smarty_tpl->tpl_vars['v']->value['DAY_OF_WEEK']==1){?>
                                <?php $_smarty_tpl->tpl_vars['cat'] = new Smarty_variable("Audiovisual", null, null);?>
                            <?php }elseif($_smarty_tpl->tpl_vars['v']->value['DAY_OF_WEEK']==2){?>
                                <?php $_smarty_tpl->tpl_vars['cat'] = new Smarty_variable("Campaigns", null, null);?>
                            <?php }elseif($_smarty_tpl->tpl_vars['v']->value['DAY_OF_WEEK']==3){?>
                                <?php $_smarty_tpl->tpl_vars['cat'] = new Smarty_variable("Who's Who", null, null);?>
                            <?php }elseif($_smarty_tpl->tpl_vars['v']->value['DAY_OF_WEEK']==4){?>
                                <?php $_smarty_tpl->tpl_vars['cat'] = new Smarty_variable("Digital", null, null);?>
                            <?php }elseif($_smarty_tpl->tpl_vars['v']->value['DAY_OF_WEEK']==5){?>
                                <?php $_smarty_tpl->tpl_vars['cat'] = new Smarty_variable("Editor's Blog", null, null);?>
                            <?php }?>
                            <div class="row">
                                <?php if (($_smarty_tpl->tpl_vars['v']->value['IMG'])){?>
                                    <div class="col-sm-4 quick-image">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['IMG'],'w'=>114,'h'=>35,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
</a>
                                    </div>
                                    <div class="col-sm-8 quick-text">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><h3><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
&nbsp;</h3></a>
                                        <span class="quick-archiv-nr"><?php echo $_smarty_tpl->getVariable('cat')->value;?>
</span>
                                    </div>
                                <?php }else{ ?>
                                    <div class="col-sm-12 quick-textfull">
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['LINK'];?>
"><h3><?php echo $_smarty_tpl->tpl_vars['v']->value['TITLE'];?>
&nbsp;</h3></a>
                                        <span class="quick-archiv-nr"><?php echo $_smarty_tpl->getVariable('cat')->value;?>
</span>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    <?php }} ?>
                <?php }else{ ?>
                
                    NO RECORDS
                
                <?php }?>
                    
            </div>
        </div>
        
    </div>
    
<?php }?>

<script>
$(document).ready(function(){
	$('div.quick-close').click(function(e){
		e.preventDefault();
		console.log("111");
		$('#quicksearchSubmit').html('OK');
		$('#searchResultWrapper').hide();
		$('#quicksearch_loader').hide();
		$('#mask').hide();
	});
});
</script>