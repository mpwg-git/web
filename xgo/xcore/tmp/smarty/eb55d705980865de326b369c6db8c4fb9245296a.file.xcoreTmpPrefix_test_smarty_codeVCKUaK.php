<?php /* Smarty version Smarty-3.0.7, created on 2016-01-19 16:58:38
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVCKUaK" */ ?>
<?php /*%%SmartyHeaderCode:336974289569e5d2ec98bc1-61388752%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb55d705980865de326b369c6db8c4fb9245296a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeVCKUaK',
      1 => 1453219118,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '336974289569e5d2ec98bc1-61388752',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_wz_fetch')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_wz_fetch.php';
if (!is_callable('smarty_function_xr_siteCall')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
?><?php if ($_smarty_tpl->getVariable('dataViaAjax')->value){?>
    <?php $_smarty_tpl->tpl_vars['data'] = new Smarty_variable($_smarty_tpl->getVariable('dataViaAjax')->value, null, null);?>
<?php }else{ ?>
    <?php echo smarty_function_xr_wz_fetch(array('id'=>834,'wz_online'=>'Y','order'=>'wz_created DESC','var'=>'data'),$_smarty_tpl);?>

<?php }?>

<div class="blog-page default-container-paddingtop">
    <!-- <h1>FAQ</h1> -->
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
        <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_vanityurls::sc_get_blog_detail_url','blogId'=>$_smarty_tpl->tpl_vars['v']->value['wz_id'],'var'=>'detailURL'),$_smarty_tpl);?>

        <div class="blog-item" id="post-<?php echo $_smarty_tpl->tpl_vars['v']->value['wz_id'];?>
">
            <div class="image-wrapper">
                <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['wz_BILD'],'w'=>240,'h'=>290,'rmode'=>"cco",'class'=>"image"),$_smarty_tpl);?>
 
            </div>
            <div class="content">
                <div class="header-wrapper">
                    <a href="<?php echo $_smarty_tpl->getVariable('detailURL')->value;?>
">
                        <h3 class="headline"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_HEADLINE'];?>
</h3>
                    </a>
                    <div class="date"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['wz_DATUM'],"%d.%m.%Y");?>
</div> 
                </div>
                <div class="text"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_TEXT'];?>
</div>
                <div class="reporter"><?php echo $_smarty_tpl->tpl_vars['v']->value['wz_REPORTER'];?>
</div>
            </div>
            <div class="clearfix"></div>
        </div>    
    <?php }} ?>
</div>