<?php /* Smarty version Smarty-3.0.7, created on 2016-04-30 18:22:33
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeilTbhY" */ ?>
<?php /*%%SmartyHeaderCode:14770970365724dbc91e3a19-69622048%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cec4a92cdfd58b9cdf408d445f2b32f33c1b3c0d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeilTbhY',
      1 => 1462033353,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14770970365724dbc91e3a19-69622048',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>"fe_util::isV2",'var'=>"isV2"),$_smarty_tpl);?>


<?php if ($_smarty_tpl->getVariable('isV2')->value==1){?>
<div class="logowrapper">
<?php echo smarty_function_xr_imgWrapper(array('s_id'=>18448,'h'=>400,'w'=>375,'class'=>"img-responsive"),$_smarty_tpl);?>


</div>

<div class="col-xs-12 darkgrey blog">
    
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
                <div class="col-xs-4">
                    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_BILD'],'w'=>70,'h'=>85,'rmode'=>"cco",'class'=>"image"),$_smarty_tpl);?>

                </div>
                <div class="col-xs-8">
                    <div class="header-wrapper">
                        <h3 class="headline"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_HEADLINE'];?>
</h3>
                        <div class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['wz_DATUM'],"%d.%m.%Y");?>
</div> 
                    </div>
                    <p class="text"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEASERTEXT'];?>
</p>
                    <p>
                        <?php  $_smarty_tpl->tpl_vars['categoryId'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kk'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['v']->value['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['categoryId']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['categoryId']->iteration=0;
if ($_smarty_tpl->tpl_vars['categoryId']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['categoryId']->key => $_smarty_tpl->tpl_vars['categoryId']->value){
 $_smarty_tpl->tpl_vars['kk']->value = $_smarty_tpl->tpl_vars['categoryId']->key;
 $_smarty_tpl->tpl_vars['categoryId']->iteration++;
 $_smarty_tpl->tpl_vars['categoryId']->last = $_smarty_tpl->tpl_vars['categoryId']->iteration === $_smarty_tpl->tpl_vars['categoryId']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categoryCheck']['last'] = $_smarty_tpl->tpl_vars['categoryId']->last;
?>
                            <?php echo $_smarty_tpl->getVariable('categories')->value[$_smarty_tpl->tpl_vars['categoryId']->value]['wz_KATEGORIE'];?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['categoryCheck']['last']){?>,<?php }?>
                        <?php }} ?>
                    </p>
                    <div class="reporter"><?php echo smarty_function_xr_translate(array('tag'=>"mehr"),$_smarty_tpl);?>
...</div>
                </div>
                <div class="clearfix"></div>
            </div>
        </a>
        
    <?php }} ?>
    
</div>

<?php }else{ ?>

<div class="startsite">
    <ul class="menu">
        <?php if ($_smarty_tpl->getVariable('P_LANG')->value=='de'){?>
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->getVariable('extraParams')->value==1){?>class="active"<?php }?>><span class="bigicon icon-WorumGehts"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span></a>
            </li>
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>5),$_smarty_tpl);?>
"><span class="bigicon icon-Registrieren"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span><span class="path17"></span></span></a>   
            </li>
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
"><span class="bigicon icon-Anmelden"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span></a>
            </li>
        <?php }elseif($_smarty_tpl->getVariable('P_LANG')->value=='en'){?>
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>4),$_smarty_tpl);?>
" <?php if ($_smarty_tpl->getVariable('extraParams')->value==1){?>class="active"<?php }?>><span class="bigicon en-icon-WorumGehts_E"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span></a>
            </li>
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>5),$_smarty_tpl);?>
"><span class="bigicon en-icon-Registrieren_E"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span></span></a>   
            </li>
            <li>
                <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>6),$_smarty_tpl);?>
"><span class="bigicon en-icon-Anmelden_E"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></span></a>
            </li>
        <?php }?>
    </ul>
</div>

<?php }?>

