<?php /* Smarty version Smarty-3.0.7, created on 2014-11-11 10:58:56
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelBCGvt" */ ?>
<?php /*%%SmartyHeaderCode:16767970845461ebf0cab5d8-00822857%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31b2bd6b315a5b9d22f99e373d65f5d1beb41225' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codelBCGvt',
      1 => 1415703536,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16767970845461ebf0cab5d8-00822857',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><table>
<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('submissions')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
<tr>
    <td>
        
        <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_submissions::sc_get_student_credits_email','submission'=>$_smarty_tpl->tpl_vars['v']->value,'var'=>'credits'),$_smarty_tpl);?>

        
        <?php if ($_smarty_tpl->tpl_vars['v']->value['ess_mediaType_id']==2){?>
        <?php if ($_smarty_tpl->tpl_vars['v']->value['ess_video_poster_s_id']>0){?>
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['ess_video_poster_s_id'],'w'=>120,'cloud'=>0),$_smarty_tpl);?>

        <?php }else{ ?>
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>270344,'w'=>120,'cloud'=>0),$_smarty_tpl);?>

        <?php }?>
        <?php }else{ ?>
        <?php if ($_smarty_tpl->tpl_vars['v']->value['ess_image_highRes_s_id']>0){?>
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['ess_image_highRes_s_id'],'w'=>120,'cloud'=>0),$_smarty_tpl);?>

        <?php }else{ ?>
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['ess_image_s_id'],'w'=>120,'cloud'=>0),$_smarty_tpl);?>

        <?php }?>
        <?php }?>
        
    </td>
    <td>
        <table>
            <tr>
                <td style="font-size: 14px; font-weight: bold;" align="left">&nbsp;<?php echo $_smarty_tpl->tpl_vars['v']->value['ess_campaign'];?>
 (#<?php echo $_smarty_tpl->tpl_vars['v']->value['ess_id'];?>
)</td>
            </tr>
            <tr>
                <td valign="top" align="left">
                    <table>
                        <tr>
                            <td valign="top" align="left"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270400,'h'=>14,'ext'=>'png','cloud'=>0),$_smarty_tpl);?>
</td>
                            <td valign="top" style="font-size: 14px;" align="left"><?php echo $_smarty_tpl->getVariable('credits')->value['clients'];?>
</td>
                        </tr>
                        <tr>
                            <td valign="top" align="left"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270362,'h'=>14,'ext'=>'png','cloud'=>0),$_smarty_tpl);?>
</td>
                            <td valign="top" style="font-size: 14px;" align="left"><?php echo $_smarty_tpl->getVariable('credits')->value['schools'];?>
</td>
                        </tr>
                    </table>
                </td>
            </tr>
            
        </table>
    </td>
</tr>
<?php }} ?>
</table>