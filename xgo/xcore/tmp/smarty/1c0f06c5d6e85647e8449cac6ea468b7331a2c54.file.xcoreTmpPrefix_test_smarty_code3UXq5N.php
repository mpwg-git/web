<?php /* Smarty version Smarty-3.0.7, created on 2017-03-01 11:01:18
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code3UXq5N" */ ?>
<?php /*%%SmartyHeaderCode:135485898858b69bee407917-98169139%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c0f06c5d6e85647e8449cac6ea468b7331a2c54' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code3UXq5N',
      1 => 1488362478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '135485898858b69bee407917-98169139',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_blog::sc_get_latest_blogentries','var'=>'blogdata'),$_smarty_tpl);?>


<div id="latest-news" class="container-fluid">
    <!--<div class="col-md-3 col-sm-2 col-xs-12">-->
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>36),$_smarty_tpl);?>
"><h1 class="latest-news">Latest News.</span></h1></a>
    <!--</div>-->
    <div class="col-xs-12 blog-start">
        
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('blogdata')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <div class="col-xs-5" <?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>style='margin-right: 6%;'<?php }?>">
                <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_vanityurls::sc_get_blog_detail_url','blogId'=>$_smarty_tpl->tpl_vars['v']->value['wz_id'],'var'=>'detailURL'),$_smarty_tpl);?>

                <a href="<?php echo $_smarty_tpl->getVariable('detailURL')->value;?>
">
                    <div id="post-<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
">
                        <div>
                            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_BILD'],'w'=>70,'h'=>85,'rmode'=>"cco",'class'=>"image"),$_smarty_tpl);?>

                        </div>
                        <!--<div class="col-sm-12 col-md-12 col-xl-8 col-xxl-9">-->
                            <div class="header-wrapper">
                                <div class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['wz_DATUM'],"%d.%m.%Y");?>
</div> 
                                <h3 class="latest-news text-uppercase"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_HEADLINE'];?>
</h3>
                            </div>
                            <p class="blog-start-text"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEASERTEXT'];?>
</p>
                            
                        <!--</div>-->
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>
                <div class="col-xs-2 "></div>
            <?php }?>    
        <?php }} ?>
    </div>
</div>
<!--
<div id="latest-news" class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-sm-2 col-xs-12">
            <a href="/de/blog"><h1 class="latest-news">Latest News.</span></h1></a>
        </div>
        <div class="col-md-6 col-sm-10 col-xs-12">
            <img class="blog-news" src="/xstorage/template/img/redesign/tmp_1.jpg">
        </div>
        <div class="col-md-3 hidden-sm hidden-xs"></div>
    </div>
</div> 
-->