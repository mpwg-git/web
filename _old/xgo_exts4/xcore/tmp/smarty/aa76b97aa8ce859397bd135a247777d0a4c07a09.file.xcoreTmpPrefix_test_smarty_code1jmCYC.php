<?php /* Smarty version Smarty-3.0.7, created on 2014-08-14 13:47:40
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1jmCYC" */ ?>
<?php /*%%SmartyHeaderCode:209816791053eca1dc1719b0-81559583%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa76b97aa8ce859397bd135a247777d0a4c07a09' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_code1jmCYC',
      1 => 1408016860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209816791053eca1dc1719b0-81559583',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'be_voting::get_overview_detail','var'=>'data'),$_smarty_tpl);?>


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
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>135,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['es_id'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->getVariable('data')->value['ev_id'])."-".($_smarty_tpl->tpl_vars['v']->value['es_id'])),$_smarty_tpl);?>
" target="_self">
            <?php if ($_smarty_tpl->tpl_vars['v']->value['es_mediaType_id']==2){?>
            <?php if ($_smarty_tpl->tpl_vars['v']->value['es_video_poster_s_id']>0){?>
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['es_video_poster_s_id'],'w'=>444,'class'=>"img-responsive"),$_smarty_tpl);?>

            <?php }else{ ?>
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>270344,'w'=>150),$_smarty_tpl);?>

            <?php }?>
            <?php }else{ ?>
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['es_image_s_id'],'w'=>444,'class'=>"img-responsive"),$_smarty_tpl);?>

            <?php }?>
            </a>
            </div>
            <div class="col-sm-1">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>135,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['es_id'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->getVariable('data')->value['ev_id'])."-".($_smarty_tpl->tpl_vars['v']->value['es_id'])),$_smarty_tpl);?>
" target="_self">
            <?php echo $_smarty_tpl->tpl_vars['v']->value['es_id'];?>

            </a>
            </div>
            <div class="col-sm-2">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>135,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['es_id'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->getVariable('data')->value['ev_id'])."-".($_smarty_tpl->tpl_vars['v']->value['es_id'])),$_smarty_tpl);?>
" target="_self">
            <?php echo $_smarty_tpl->tpl_vars['v']->value['es_created_ts'];?>

            </a>
            </div>
            <div class="col-sm-1">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>135,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['es_id'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->getVariable('data')->value['ev_id'])."-".($_smarty_tpl->tpl_vars['v']->value['es_id'])),$_smarty_tpl);?>
" target="_self">
            <?php echo $_smarty_tpl->tpl_vars['v']->value['es_state'];?>

            </a>
            </div>
            <div class="col-sm-2">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>135,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['es_id'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->getVariable('data')->value['ev_id'])."-".($_smarty_tpl->tpl_vars['v']->value['es_id'])),$_smarty_tpl);?>
" target="_self">
            <?php echo $_smarty_tpl->tpl_vars['v']->value['NAME'];?>

            </a>
            </div>
            <div class="col-sm-4">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>135,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['es_id'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->getVariable('data')->value['ev_id'])."-".($_smarty_tpl->tpl_vars['v']->value['es_id'])),$_smarty_tpl);?>
" target="_self">
            <?php echo $_smarty_tpl->tpl_vars['v']->value['es_email'];?>

            </a>
            </div>
        </div>
    </div>
</div>
<?php }} ?>