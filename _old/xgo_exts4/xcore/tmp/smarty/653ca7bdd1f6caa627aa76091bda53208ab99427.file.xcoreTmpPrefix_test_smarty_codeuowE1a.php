<?php /* Smarty version Smarty-3.0.7, created on 2014-08-22 13:18:06
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeuowE1a" */ ?>
<?php /*%%SmartyHeaderCode:66855081753f726eec6fd11-93715464%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '653ca7bdd1f6caa627aa76091bda53208ab99427' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeuowE1a',
      1 => 1408706286,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66855081753f726eec6fd11-93715464',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_genlink')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_genlink.php';
?><?php echo smarty_function_xr_siteCall(array('fn'=>'be_voting::get_overview','var'=>'data'),$_smarty_tpl);?>

<?php if (count($_smarty_tpl->getVariable('data')->value['step1'])>0){?>
<div class="row" style="padding-bottom: 40px;">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-2">
            <b>Voting - Step 1</b>
            </div>
            <div class="col-sm-2">
            <b>Submitted work</b>
            </div>
            <div class="col-sm-8">
            <b>To vote</b>
            </div>
        </div>
    </div>
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['step1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    <?php if ($_smarty_tpl->tpl_vars['v']->value['TODO']>0){?>
    
    <div class="col-sm-12">
        <hr />
        <div class="row">
            <div class="col-sm-2">
            <?php if ($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE']>0){?>
            <?php if ($_smarty_tpl->tpl_vars['v']->value['TYPE']==4){?>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>149,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."/".($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'])),$_smarty_tpl);?>
" target="_self"><?php echo $_smarty_tpl->tpl_vars['v']->value['ev_name'];?>
</a>
            <?php }else{ ?>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>135,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."/".($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'])),$_smarty_tpl);?>
" target="_self"><?php echo $_smarty_tpl->tpl_vars['v']->value['ev_name'];?>
</a>
            <?php }?>
            <?php }else{ ?>
            <?php echo $_smarty_tpl->tpl_vars['v']->value['ev_name'];?>

            <?php }?>
            </div>
            <div class="col-sm-2">
            <?php if ($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE']>0){?>
            <?php if ($_smarty_tpl->tpl_vars['v']->value['TYPE']==4){?>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>149,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."/".($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'])),$_smarty_tpl);?>
" target="_self"><?php echo $_smarty_tpl->tpl_vars['v']->value['SUM'];?>
</a>
            <?php }else{ ?>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>135,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."/".($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'])),$_smarty_tpl);?>
" target="_self"><?php echo $_smarty_tpl->tpl_vars['v']->value['SUM'];?>
</a>
            <?php }?>
            <?php }else{ ?>
            <?php echo $_smarty_tpl->tpl_vars['v']->value['SUM'];?>

            <?php }?>
            </div>
            <div class="col-sm-2">
            <?php if ($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE']>0){?>
            <?php if ($_smarty_tpl->tpl_vars['v']->value['TYPE']==4){?>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>149,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."/".($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'])),$_smarty_tpl);?>
" target="_self"><?php echo $_smarty_tpl->tpl_vars['v']->value['TODO'];?>
</a>
            <?php }else{ ?>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>135,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."/".($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'])),$_smarty_tpl);?>
" target="_self"><?php echo $_smarty_tpl->tpl_vars['v']->value['TODO'];?>
</a>
            <?php }?>
            <?php }else{ ?>
            <?php echo $_smarty_tpl->tpl_vars['v']->value['TODO'];?>

            <?php }?>
            </div>
            <div class="col-sm-6">
            <?php if ($_smarty_tpl->tpl_vars['v']->value['TYPE']==4){?>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>150,'r_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>$_smarty_tpl->tpl_vars['v']->value['ev_name']),$_smarty_tpl);?>
" target="_self">Overview - Todo</a>
            <?php }else{ ?>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>137,'r_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>$_smarty_tpl->tpl_vars['v']->value['ev_name']),$_smarty_tpl);?>
" target="_self">Overview - Todo</a>
            <?php }?>
            </div>
        </div>
    </div>
    <?php }?>
    <?php }} ?>
</div>
<?php }?>
<?php if (count($_smarty_tpl->getVariable('data')->value['step2'])>0){?>
<div class="row" style="padding-bottom: 40px;">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-2">
            <b>Voting - Step 2</b>
            </div>
            <div class="col-sm-2">
            <b>Submitted work</b>
            </div>
            <div class="col-sm-8">
            <b>To vote</b>
            </div>
        </div>
    </div>
    
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['step2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    <?php if ($_smarty_tpl->tpl_vars['v']->value['TODO']>0){?>
    
    <div class="col-sm-12">
        <hr />
        <div class="row">
            <div class="col-sm-2">
            <?php if ($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE']>0){?>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>147,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."/".($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'])),$_smarty_tpl);?>
" target="_self"><?php echo $_smarty_tpl->tpl_vars['v']->value['ev_name'];?>
</a>
            <?php }else{ ?>
            <?php echo $_smarty_tpl->tpl_vars['v']->value['ev_name'];?>

            <?php }?>
            </div>
            <div class="col-sm-2">
            <?php if ($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE']>0){?>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>147,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."/".($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'])),$_smarty_tpl);?>
" target="_self"><?php echo $_smarty_tpl->tpl_vars['v']->value['SUM'];?>
</a>
            <?php }else{ ?>
            <?php echo $_smarty_tpl->tpl_vars['v']->value['SUM'];?>

            <?php }?>
            </div>
            <div class="col-sm-2">
            <?php if ($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE']>0){?>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>147,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."/".($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'])),$_smarty_tpl);?>
" target="_self"><?php echo $_smarty_tpl->tpl_vars['v']->value['TODO'];?>
</a>
            <?php }else{ ?>
            <?php echo $_smarty_tpl->tpl_vars['v']->value['TODO'];?>

            <?php }?>
            </div>
            <div class="col-sm-6">
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>148,'r_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>$_smarty_tpl->tpl_vars['v']->value['ev_name']),$_smarty_tpl);?>
" target="_self">Overview - Todo</a>
            </div>
        </div>
    </div>
    <?php }?>
    <?php }} ?>
</div>
<?php }?>
<?php if (count($_smarty_tpl->getVariable('data')->value['x1'])>0){?>
<div class="row" style="padding-bottom: 40px;">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-2">
            <b>Move to main voting</b>
            </div>
            <div class="col-sm-2">
            <b>Submitted work</b>
            </div>
            <div class="col-sm-8">
            <b>To vote</b>
            </div>
        </div>
    </div>
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['x1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    <?php if ($_smarty_tpl->tpl_vars['v']->value['TODO']>0){?>
    
    <div class="col-sm-12">
        <hr />
        <div class="row">
            <div class="col-sm-2">
            <?php if ($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE']>0){?>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>153,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."/".($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'])),$_smarty_tpl);?>
" target="_self"><?php echo $_smarty_tpl->tpl_vars['v']->value['ev_name'];?>
</a>
            <?php }else{ ?>
            <?php echo $_smarty_tpl->tpl_vars['v']->value['ev_name'];?>

            <?php }?>
            </div>
            <div class="col-sm-2">
            <?php if ($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE']>0){?>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>153,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."/".($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'])),$_smarty_tpl);?>
" target="_self"><?php echo $_smarty_tpl->tpl_vars['v']->value['SUM'];?>
</a>
            <?php }else{ ?>
            <?php echo $_smarty_tpl->tpl_vars['v']->value['SUM'];?>

            <?php }?>
            </div>
            <div class="col-sm-2">
            <?php if ($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE']>0){?>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>153,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."/".($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'])),$_smarty_tpl);?>
" target="_self"><?php echo $_smarty_tpl->tpl_vars['v']->value['TODO'];?>
</a>
            <?php }else{ ?>
            <?php echo $_smarty_tpl->tpl_vars['v']->value['TODO'];?>

            <?php }?>
            </div>
            <div class="col-sm-6">
            <!--<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>148,'r_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>$_smarty_tpl->tpl_vars['v']->value['ev_name']),$_smarty_tpl);?>
" target="_self">Overview - Todo</a>-->
            </div>
        </div>
    </div>
    <?php }?>
    <?php }} ?>
</div>
<?php }?>

<?php if (count($_smarty_tpl->getVariable('data')->value['x2'])>0){?>
<div class="row" style="padding-bottom: 40px;">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-2">
            <b>Override to preselected</b>
            </div>
            <div class="col-sm-2">
            <b>Submitted work</b>
            </div>
            <div class="col-sm-8">
            <b>To vote</b>
            </div>
        </div>
    </div>
    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('data')->value['x2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
    <?php if ($_smarty_tpl->tpl_vars['v']->value['TODO']>0){?>
    
    <div class="col-sm-12">
        <hr />
        <div class="row">
            <div class="col-sm-2">
            <?php if ($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE']>0){?>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>154,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."/".($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'])),$_smarty_tpl);?>
" target="_self"><?php echo $_smarty_tpl->tpl_vars['v']->value['ev_name'];?>
</a>
            <?php }else{ ?>
            <?php echo $_smarty_tpl->tpl_vars['v']->value['ev_name'];?>

            <?php }?>
            </div>
            <div class="col-sm-2">
            <?php if ($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE']>0){?>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>154,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."/".($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'])),$_smarty_tpl);?>
" target="_self"><?php echo $_smarty_tpl->tpl_vars['v']->value['SUM'];?>
</a>
            <?php }else{ ?>
            <?php echo $_smarty_tpl->tpl_vars['v']->value['SUM'];?>

            <?php }?>
            </div>
            <div class="col-sm-2">
            <?php if ($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE']>0){?>
            <a href="<?php echo smarty_function_xr_genlink(array('p_id'=>154,'es_id'=>$_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'],'ev_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>($_smarty_tpl->tpl_vars['v']->value['ev_id'])."/".($_smarty_tpl->tpl_vars['v']->value['FIRSTTOVOTE'])),$_smarty_tpl);?>
" target="_self"><?php echo $_smarty_tpl->tpl_vars['v']->value['TODO'];?>
</a>
            <?php }else{ ?>
            <?php echo $_smarty_tpl->tpl_vars['v']->value['TODO'];?>

            <?php }?>
            </div>
            <div class="col-sm-6">
            <!--<a href="<?php echo smarty_function_xr_genlink(array('p_id'=>148,'r_id'=>$_smarty_tpl->tpl_vars['v']->value['ev_id'],'m_suffix'=>$_smarty_tpl->tpl_vars['v']->value['ev_name']),$_smarty_tpl);?>
" target="_self">Overview - Todo</a>-->
            </div>
        </div>
    </div>
    <?php }?>
    <?php }} ?>
</div>
<?php }?>