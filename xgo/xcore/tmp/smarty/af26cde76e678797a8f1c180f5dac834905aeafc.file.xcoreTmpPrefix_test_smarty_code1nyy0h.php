<?php /* Smarty version Smarty-3.0.7, created on 2016-07-17 13:09:15
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1nyy0h" */ ?>
<?php /*%%SmartyHeaderCode:67156354578b675bd8e5b2-49578701%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af26cde76e678797a8f1c180f5dac834905aeafc' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1nyy0h',
      1 => 1468753755,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67156354578b675bd8e5b2-49578701',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_xr_atom')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_atom.php';
?>
<div class="search-start default-container-padding mobileV2">
   
   <div class="row">
       <div class="col-xs-4">
           <?php echo smarty_function_xr_imgWrapper(array('s_id'=>18448,'h'=>200,'style'=>"max-width: 100px;",'class'=>"img-responsive"),$_smarty_tpl);?>

       </div>
       <div class="col-xs-7 text-center mpwg-teaser-wrapper">
           <span class="mpwg-teaser">
           <?php echo smarty_function_xr_translate(array('tag'=>"DIE"),$_smarty_tpl);?>
 <?php echo smarty_function_xr_translate(array('tag'=>"PERSÖNLICHE"),$_smarty_tpl);?>
<br/>
           <?php echo smarty_function_xr_translate(array('tag'=>"WG-SUCHMASCHINE"),$_smarty_tpl);?>
<br/>
           <?php echo smarty_function_xr_translate(array('tag'=>"Find People. Not just"),$_smarty_tpl);?>
<br/>
           <?php echo smarty_function_xr_translate(array('tag'=>"rooms"),$_smarty_tpl);?>
.
           </span>
           <span class="icon-duck drduck"></span>
       </div>
   </div>
   
   <br /><br />
   
   <div class="row">
        <div class="col-xs-12">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>47),$_smarty_tpl);?>
" class="button start-button"><?php echo smarty_function_xr_translate(array('tag'=>'WG Zimmer finden'),$_smarty_tpl);?>
</a>
            <br class="hidden-sm" /><br class="hidden-sm" />
        </div>
        <div class="col-xs-12">
           <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>48),$_smarty_tpl);?>
" class="button start-button"><?php echo smarty_function_xr_translate(array('tag'=>'Neuen Mitbewohner finden'),$_smarty_tpl);?>
</a>
        </div>
   </div>
   
   <br /><br />
   
   <div class="row">
        <div class="col-xs-12 blog-header">
           <?php echo smarty_function_xr_translate(array('tag'=>'WG-NEWS'),$_smarty_tpl);?>
:
        </div>
        <div class="col-xs-12 blog blog-start">
        
        <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_blog::sc_get_latest_blogentries','var'=>'blogdata'),$_smarty_tpl);?>

        
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('blogdata')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                
            <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_vanityurls::sc_get_blog_detail_url','blogId'=>$_smarty_tpl->tpl_vars['v']->value['wz_id'],'var'=>'detailURL'),$_smarty_tpl);?>

            
            <a href="<?php echo $_smarty_tpl->getVariable('detailURL')->value;?>
">
                <div class="row" id="post-<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
">
                    <div class="col-xs-3">
                        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_BILD'],'w'=>70,'h'=>85,'rmode'=>"cco",'class'=>"image"),$_smarty_tpl);?>

                    </div>
                    <div class="col-xs-9">
                        <div class="header-wrapper">
                            <h3 class="headline"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_HEADLINE'];?>
</h3>
                            <div class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['wz_DATUM'],"%d.%m.%Y");?>
</div> 
                        </div>
                        
                    </div>
                    <div class="clearfix"></div>
                </div>
            </a>
            
            <hr/>
            
        <?php }} ?>
        <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        
        <div style="height: 8px;"></div>
        
        <div class="col-xs-12">
            <div class="text-center">
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>36),$_smarty_tpl);?>
" class="button start-button"><?php echo smarty_function_xr_translate(array('tag'=>'Weitere News'),$_smarty_tpl);?>
...</a>
            </div>
        </div>
        
        <div style="height: 80px;"></div>
    </div>
    <br><br>
   
    <?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?>
    
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
"  style="display: block; float: left; width: 33.3333333%;"> 
            <span class="bigicon icon-WorumGehts"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span>
        </a>    
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>5),$_smarty_tpl);?>
"  style="display: block; float: left; width: 33.3333333%;"> 
            <span class="bigicon icon-Registrieren"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span><span class="path17"></span></span>   
        </a>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
"  style="display: block; float: left; width: 33.3333333%;"> 
            <span class="bigicon icon-Anmelden"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span>
        </a>    
    <?php }elseif($_smarty_tpl->getVariable('P_LANG')->value=='en'){?>
        
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
"  style="display: block; float: left; width: 33.3333333%;"><span class="bigicon en-icon-WorumGehts_E"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span></a>
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>5),$_smarty_tpl);?>
"  style="display: block; float: left; width: 33.3333333%;"><span class="bigicon en-icon-Registrieren_E"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span></span></a>   
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
"  style="display: block; float: left; width: 33.3333333%;"><span class="bigicon en-icon-Anmelden_E"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span></a>
            
    <?php }?>
    <br>
    <br>
    <br>
    <br>
    <br><br><br>
</div>
<br>
<br>
<?php echo smarty_function_xr_atom(array('a_id'=>643,'return'=>1),$_smarty_tpl);?>
