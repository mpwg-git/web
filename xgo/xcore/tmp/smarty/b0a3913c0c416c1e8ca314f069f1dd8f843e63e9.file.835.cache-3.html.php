<?php /* Smarty version Smarty-3.0.7, created on 2017-02-23 19:59:40
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/835.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:41239008358af311c0c69c5-59912545%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0a3913c0c416c1e8ca314f069f1dd8f843e63e9' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/835.cache-3.html',
      1 => 1487641990,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41239008358af311c0c69c5-59912545',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php if ($_smarty_tpl->getVariable('dataViaAjax')->value){?>
    <?php $_smarty_tpl->tpl_vars['data'] = new Smarty_variable($_smarty_tpl->getVariable('dataViaAjax')->value, null, null);?>
<?php }else{ ?>
    <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_blog::sc_get_all_blogentries','var'=>'data'),$_smarty_tpl);?>

<?php }?>

<?php echo smarty_function_xr_siteCall(array('fn'=>'fe_blog::get_categories_keyed','var'=>'categories'),$_smarty_tpl);?>

<?php if ($_REQUEST['dev']==1){?><?php }?>

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
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['k']->value==1){?>
                <hr/>
            <?php }?>
        <?php }} ?>
    <?php }?>
    <a style="display:block;text-align:right;color:white;margin: 4rem 0;" href="<?php echo smarty_function_xr_genlink(array('p_id'=>1),$_smarty_tpl);?>
"><?php echo smarty_function_xr_translate(array('tag'=>"zurück zur Startseite"),$_smarty_tpl);?>
</a>
</div>

