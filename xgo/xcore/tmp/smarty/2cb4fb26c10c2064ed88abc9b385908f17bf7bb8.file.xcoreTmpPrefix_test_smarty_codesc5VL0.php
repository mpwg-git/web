<?php /* Smarty version Smarty-3.0.7, created on 2017-03-03 10:33:00
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesc5VL0" */ ?>
<?php /*%%SmartyHeaderCode:120105098858b9384c4b4fc9-58393529%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2cb4fb26c10c2064ed88abc9b385908f17bf7bb8' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codesc5VL0',
      1 => 1488533580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120105098858b9384c4b4fc9-58393529',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'fe_blog::sc_get_latest_blogentries','var'=>'blogdata'),$_smarty_tpl);?>

<?php echo smarty_function_xr_wz_fetch(array('id'=>893,'var'=>'aussagen'),$_smarty_tpl);?>


<div id="latest-news" class="container-fluid">
    <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>36),$_smarty_tpl);?>
"><h1 class="latest-news">Latest News.</span></h1></a>
    <div class="col-xs-12 blog-start">
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('aussagen')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>
            	<div class="col-lg-3 col-lg-offset-3 col-xs-5 startseiten-aussagen">
                    <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_BILD'],'rmode'=>'cco','class'=>"image"),$_smarty_tpl);?>

            		<div class="header-wrapper">
            		    <h3 class="latest-news start-aussagen text-uppercase"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_NAME'];?>
</h3>
                    </div>
            		<p class="blog-start-text start-aussagen">&bdquo;<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEXT'];?>
&ldquo;</p>
            	</div>
            <?php }?>	
        <?php }} ?>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('blogdata')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <div class="col-lg-3 col-xs-5 blog-entry-<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
">
                <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_vanityurls::sc_get_blog_detail_url','blogId'=>$_smarty_tpl->tpl_vars['v']->value['wz_id'],'var'=>'detailURL'),$_smarty_tpl);?>

                <a href="<?php echo $_smarty_tpl->getVariable('detailURL')->value;?>
">
                    <div id="post-<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
">
                        <div>
                            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_BILD'],'w'=>254,'h'=>254,'rmode'=>"cco",'class'=>"image"),$_smarty_tpl);?>

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
        <?php }} ?>
    </div>
    <div class="more-news text-center">
        <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>36),$_smarty_tpl);?>
" class="btn btn-lg col-md-12 btn-icons-reg text-uppercase"><?php echo smarty_function_xr_translate(array('tag'=>'fp_more-news'),$_smarty_tpl);?>
</a>
    </div>
</div>
<div class="clearfix"></div>