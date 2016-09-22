<?php /* Smarty version Smarty-3.0.7, created on 2016-01-20 19:25:22
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyhuaAP" */ ?>
<?php /*%%SmartyHeaderCode:1103997819569fd1125081d6-59943349%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb8709694fa53d630a78a9c3c20735e34843c1e7' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeyhuaAP',
      1 => 1453314322,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1103997819569fd1125081d6-59943349',
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

<div id="blog-page" class="blog-page default-container-paddingtop">
    <!-- <h1>FAQ</h1> -->
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