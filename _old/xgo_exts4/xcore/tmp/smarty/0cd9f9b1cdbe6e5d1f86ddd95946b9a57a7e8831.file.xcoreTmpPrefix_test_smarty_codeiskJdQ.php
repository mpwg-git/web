<?php /* Smarty version Smarty-3.0.7, created on 2014-08-14 13:46:20
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeiskJdQ" */ ?>
<?php /*%%SmartyHeaderCode:46963993253eca18cb9f511-87583351%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cd9f9b1cdbe6e5d1f86ddd95946b9a57a7e8831' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeiskJdQ',
      1 => 1408016780,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46963993253eca18cb9f511-87583351',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'be_voting::get_overview_detail_students','var'=>'data'),$_smarty_tpl);?>


<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-2">
            <b>Image</b>
            </div>
            <div class="col-sm-1">
            <b>ID</b>
            </div>
            <div class="col-sm-2">
            <b>Submitted on</b>
            </div>
            <div class="col-sm-1">
            <b>Status</b>
            </div>
            <div class="col-sm-2">
            <b>Submitted By</b>
            </div>
            <div class="col-sm-2">
            <b>Email</b>
            </div>
            <div class="col-sm-2">
            <b>&nbsp;</b>
            </div>
        </div>
    </div>
</div>
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
<hr />
<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-2">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>149,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['ess_id'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."-".($_smarty_tpl->tpl_vars['v']->value['ess_id'])),$_smarty_tpl);?>
" target="_self">
            <?php if ($_smarty_tpl->tpl_vars['v']->value['ess_mediaType_id']==2){?>
            <?php if ($_smarty_tpl->tpl_vars['v']->value['ess_video_poster_s_id']>0){?>
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['ess_video_poster_s_id'],'w'=>444,'class'=>"img-responsive"),$_smarty_tpl);?>

            <?php }else{ ?>
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>270344,'w'=>150),$_smarty_tpl);?>

            <?php }?>
            <?php }else{ ?>
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['ess_image_s_id'],'w'=>444,'class'=>"img-responsive"),$_smarty_tpl);?>

            <?php }?>
            </a>
            </div>
            <div class="col-sm-1">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>149,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['ess_id'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."-".($_smarty_tpl->tpl_vars['v']->value['ess_id'])),$_smarty_tpl);?>
" target="_self">
            <?php echo $_smarty_tpl->tpl_vars['v']->value['ess_id'];?>

            </a>
            </div>
            <div class="col-sm-2">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>149,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['ess_id'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."-".($_smarty_tpl->tpl_vars['v']->value['ess_id'])),$_smarty_tpl);?>
" target="_self">
            <?php echo $_smarty_tpl->tpl_vars['v']->value['ess_created_ts'];?>

            </a>
            </div>
            <div class="col-sm-1">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>149,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['ess_id'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."-".($_smarty_tpl->tpl_vars['v']->value['ess_id'])),$_smarty_tpl);?>
" target="_self">
            <?php echo $_smarty_tpl->tpl_vars['v']->value['ess_state'];?>

            </a>
            </div>
            <div class="col-sm-2">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>149,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['ess_id'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."-".($_smarty_tpl->tpl_vars['v']->value['ess_id'])),$_smarty_tpl);?>
" target="_self">
            <?php echo $_smarty_tpl->tpl_vars['v']->value['NAME'];?>

            </a>
            </div>
            <div class="col-sm-4">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>149,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['ess_id'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."-".($_smarty_tpl->tpl_vars['v']->value['ess_id'])),$_smarty_tpl);?>
" target="_self">
            <?php echo $_smarty_tpl->tpl_vars['v']->value['ess_email'];?>

            </a>
            </div>
        </div>
    </div>
</div>
<?php }} ?>