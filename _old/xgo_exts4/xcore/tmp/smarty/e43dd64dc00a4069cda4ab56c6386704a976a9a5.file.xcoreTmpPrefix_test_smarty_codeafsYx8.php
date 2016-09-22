<?php /* Smarty version Smarty-3.0.7, created on 2015-01-30 15:17:05
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeafsYx8" */ ?>
<?php /*%%SmartyHeaderCode:176244364154cb9261884ca7-73419780%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e43dd64dc00a4069cda4ab56c6386704a976a9a5' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeafsYx8',
      1 => 1422627425,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176244364154cb9261884ca7-73419780',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?>

<?php if ($_smarty_tpl->getVariable('type')->value=='PROFILES'){?>
    <div class="col-sm-6" style="padding-bottom: 10px;">
        <div class="row">
        
            <div class="col-sm-4 filter-image">
                <a href="<?php echo $_smarty_tpl->getVariable('record')->value['LINK'];?>
"><?php if ($_smarty_tpl->getVariable('record')->value['IMG']!=0){?><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('record')->value['IMG'],'w'=>400,'h'=>500,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270338,'w'=>400,'h'=>500,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
</a><?php }?>
            </div>
            
            <div class="col-sm-8 filter-text">
                <div style="padding-top: 28px;">
                    <a href="<?php echo $_smarty_tpl->getVariable('record')->value['LINK'];?>
"><h3 class="nowra"><?php echo $_smarty_tpl->getVariable('record')->value['TITLE'];?>
&nbsp;</h3></a>
                    <span class="quick-archiv-nr"><?php if ($_smarty_tpl->getVariable('record')->value['COMPANY']!=''&&$_smarty_tpl->getVariable('record')->value['COMPANY']!='c/o'){?><?php echo $_smarty_tpl->getVariable('record')->value['COMPANY'];?>
<br /><?php }?><?php if ($_smarty_tpl->getVariable('record')->value['CITY']!=''){?><?php echo $_smarty_tpl->getVariable('record')->value['CITY'];?>
 <?php }?><?php if ($_smarty_tpl->getVariable('record')->value['COUNTRY']!=''){?><?php echo $_smarty_tpl->getVariable('record')->value['COUNTRY'];?>
<?php }?></span>
                </div>
            </div>
            
        </div>
    </div>
<?php }elseif($_smarty_tpl->getVariable('type')->value=='FEATURES'){?>
    <div class="col-sm-6">
        <div class="row lw-item">
            <?php if ($_smarty_tpl->getVariable('record')->value['DAY_OF_WEEK']==1){?>
                <?php $_smarty_tpl->tpl_vars['cat'] = new Smarty_variable("Audiovisual", null, null);?>
            <?php }elseif($_smarty_tpl->getVariable('record')->value['DAY_OF_WEEK']==2){?>
                <?php $_smarty_tpl->tpl_vars['cat'] = new Smarty_variable("Campaigns", null, null);?>
            <?php }elseif($_smarty_tpl->getVariable('record')->value['DAY_OF_WEEK']==3){?>
                <?php $_smarty_tpl->tpl_vars['cat'] = new Smarty_variable("Who's Who", null, null);?>
            <?php }elseif($_smarty_tpl->getVariable('record')->value['DAY_OF_WEEK']==4){?>
                <?php $_smarty_tpl->tpl_vars['cat'] = new Smarty_variable("Digital", null, null);?>
            <?php }elseif($_smarty_tpl->getVariable('record')->value['DAY_OF_WEEK']==5){?>
                <?php $_smarty_tpl->tpl_vars['cat'] = new Smarty_variable("Editor's Blog", null, null);?>
            <?php }?>
            <div class="col-sm-12 filter-text">
                <a href="<?php echo $_smarty_tpl->getVariable('record')->value['LINK'];?>
"><h3 class="nowra features-title-search"><?php echo $_smarty_tpl->getVariable('record')->value['TITLE'];?>
&nbsp;</h3></a>
                <span class="quick-archiv-nr"><?php echo $_smarty_tpl->getVariable('cat')->value;?>
</span>
            </div>
            <div class="col-sm-12 filter-image">
                <a href="<?php echo $_smarty_tpl->getVariable('record')->value['LINK'];?>
"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('record')->value['IMG'],'w'=>400,'h'=>120,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
</a>
            </div>
            
        </div>
    </div>
<?php }elseif($_smarty_tpl->getVariable('type')->value=='INTERVIEWS'){?>
    <div class="col-sm-3">
        <div class="row">
        
            <div class="col-sm-12 filter-text">
                <a href="<?php echo $_smarty_tpl->getVariable('record')->value['LINK'];?>
"><h3 class="nowra interview-title-search"><?php echo $_smarty_tpl->getVariable('record')->value['TITLE'];?>
&nbsp;</h3></a>
                <span class="quick-archiv-nr"><?php if ($_smarty_tpl->getVariable('record')->value['TABLE_X_X']==0){?>INTERVIEW - <?php }else{ ?>DIGITAL INTERVIEW - <?php }?><?php echo $_smarty_tpl->getVariable('record')->value['EDITION'];?>
/<?php echo $_smarty_tpl->getVariable('record')->value['YEAR'];?>
</span>
            </div>
            <div class="col-sm-12 filter-image">
                <a href="<?php echo $_smarty_tpl->getVariable('record')->value['LINK'];?>
"><?php if ($_smarty_tpl->getVariable('record')->value['IMG']!=0){?><?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('record')->value['IMG'],'w'=>400,'h'=>300,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
<?php }else{ ?><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270410,'w'=>400,'h'=>300,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>
<?php }?></a>
            </div>
            
        </div>
    </div>
<?php }else{ ?>
    <div class="col-sm-3">
        <div class="row lw-item">
        
            <div class="col-sm-12 filter-text">
                <a href="<?php echo $_smarty_tpl->getVariable('record')->value['LINK'];?>
"><h3 class="nowra marginBottom0"><?php echo $_smarty_tpl->getVariable('record')->value['TITLE'];?>
&nbsp;</h3></a>
                <span class="quick-archiv-nr"><?php if ($_smarty_tpl->getVariable('record')->value['TYPEX']==4){?>WEB<?php }elseif($_smarty_tpl->getVariable('record')->value['TYPEX']==5){?>APP<?php }?> <?php echo $_smarty_tpl->getVariable('record')->value['ARCHIV_NR'];?>
</span>
            </div>
            <div class="col-sm-12 filter-image">
                <a href="<?php echo $_smarty_tpl->getVariable('record')->value['LINK'];?>
">
                <?php if (($_smarty_tpl->getVariable('record')->value['IMG'])){?>
                    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->getVariable('record')->value['IMG'],'w'=>401,'h'=>301,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>

                <?php }else{ ?>
                    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>270338,'w'=>400,'h'=>300,'rmode'=>"cco",'ext'=>'jpg','class'=>"img-responsive"),$_smarty_tpl);?>

                <?php }?></a>
            </div>
            
        </div>
    </div>
<?php }?>