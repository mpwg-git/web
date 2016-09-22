<?php /* Smarty version Smarty-3.0.7, created on 2016-01-20 17:53:40
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeywYWJ4" */ ?>
<?php /*%%SmartyHeaderCode:2026039614569fbb94f25e40-67610517%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8974190ecb44d06f2972332b99e74b63db08981' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeywYWJ4',
      1 => 1453308820,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2026039614569fbb94f25e40-67610517',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
?><?php if ($_smarty_tpl->getVariable('dataViaAjax')->value){?>
    <?php $_smarty_tpl->tpl_vars['data'] = new Smarty_variable($_smarty_tpl->getVariable('dataViaAjax')->value, null, null);?>
<?php }else{ ?>
    <?php echo smarty_function_xr_wz_fetch(array('id'=>834,'wz_online'=>'Y','order'=>'wz_created DESC','var'=>'data'),$_smarty_tpl);?>

<?php }?>

<div id="blog-page" class="blog-page default-container-paddingtop clearfix">
    <!-- <h1>FAQ</h1> -->
    
    <?php if ($_smarty_tpl->getVariable('dataViaAjax')->value){?>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_vanityurls::sc_get_blog_detail_url','blogId'=>$_smarty_tpl->tpl_vars['v']->value['wz_id'],'var'=>'detailURL'),$_smarty_tpl);?>

            <a href="<?php echo $_smarty_tpl->getVariable('detailURL')->value;?>
">
                <div class="blog-item" id="post-<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
">
                    <div class="image-wrapper">
                        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_BILD'],'w'=>240,'h'=>290,'rmode'=>"cco",'class'=>"image"),$_smarty_tpl);?>

                    </div>
                    <div class="content">
                        <div class="header-wrapper">
                            <h3 class="headline"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_HEADLINE'];?>
</h3>
                            <div class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['wz_DATUM'],"%d.%m.%Y");?>
</div> 
                        </div>
                        <div class="text"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEASERTEXT'];?>
</div>
                        <div class="reporter"><?php echo smarty_function_xr_translate(array('tag'=>"mehr"),$_smarty_tpl);?>
...</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </a>
        <?php }} ?>
    <?php }else{ ?>
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
            <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_vanityurls::sc_get_blog_detail_url','blogId'=>$_smarty_tpl->tpl_vars['v']->value['wz_id'],'var'=>'detailURL'),$_smarty_tpl);?>

            <?php if ($_smarty_tpl->tpl_vars['k']->value==0||$_smarty_tpl->tpl_vars['k']->value==1){?>
                <a href="<?php echo $_smarty_tpl->getVariable('detailURL')->value;?>
">
                    <div class="blog-item neueste" id="post-<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
">
                        <div class="image-wrapper">
                            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_BILD'],'w'=>600,'h'=>290,'rmode'=>"cco",'class'=>"image"),$_smarty_tpl);?>

                        </div>
                        <div class="content">
                            <div class="header-wrapper">
                                <h3 class="headline"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_HEADLINE'];?>
</h3>
                                <div class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['wz_DATUM'],"%d.%m.%Y");?>
</div> 
                            </div>
                            <div class="text"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEASERTEXT'];?>
</div>
                            <div class="reporter"><?php echo smarty_function_xr_translate(array('tag'=>"mehr"),$_smarty_tpl);?>
...</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </a>
            <?php }else{ ?>
                <a href="<?php echo $_smarty_tpl->getVariable('detailURL')->value;?>
">
                    <div class="blog-item" id="post-<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
">
                        <div class="image-wrapper">
                            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_BILD'],'w'=>240,'h'=>290,'rmode'=>"cco",'class'=>"image"),$_smarty_tpl);?>

                        </div>
                        <div class="content">
                            <div class="header-wrapper">
                                <h3 class="headline"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_HEADLINE'];?>
</h3>
                                <div class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['wz_DATUM'],"%d.%m.%Y");?>
</div> 
                            </div>
                            <div class="text"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEASERTEXT'];?>
</div>
                            <div class="reporter"><?php echo smarty_function_xr_translate(array('tag'=>"mehr"),$_smarty_tpl);?>
...</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['k']->value==1){?>
                <hr/>
            <?php }?>
        <?php }} ?>
    <?php }?>
</div>