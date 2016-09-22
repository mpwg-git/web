<?php /* Smarty version Smarty-3.0.7, created on 2014-12-16 08:17:15
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOcPq9r" */ ?>
<?php /*%%SmartyHeaderCode:1776381391548fea8b1981a9-38498888%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f42c4980c8b73c7ca410e5d4810441cd7195e3b' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeOcPq9r',
      1 => 1418717835,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1776381391548fea8b1981a9-38498888',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_siteCall')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_siteCall.php';
if (!is_callable('smarty_function_xr_img')) include '/srv/www/www.luerzersarchive.net/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
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
            
            <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['ess_video_poster_s_id'],'w'=>120,'var'=>'submissionimage','cloud'=>0),$_smarty_tpl);?>

        <?php }else{ ?>
        
            <?php echo smarty_function_xr_img(array('s_id'=>270344,'w'=>120,'var'=>'submissionimage','cloud'=>0),$_smarty_tpl);?>

        
        <?php }?>
        <?php }else{ ?>
        <?php if ($_smarty_tpl->tpl_vars['v']->value['ess_image_highRes_s_id']>0){?>
            <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['ess_image_highRes_s_id'],'w'=>120,'var'=>'submissionimage','cloud'=>0),$_smarty_tpl);?>

        <?php }else{ ?>
             <?php echo smarty_function_xr_img(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['ess_image_s_id'],'w'=>120,'var'=>'submissionimage','cloud'=>0),$_smarty_tpl);?>

        <?php }?>
        <?php }?>
        
    </td>
    <td valign="top">
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
                            <td valign="top" align="left">
                            
                            <?php echo smarty_function_xr_img(array('s_id'=>270400,'h'=>14,'ext'=>'png','var'=>'creditclient','cloud'=>0),$_smarty_tpl);?>

                                
                            <img src="http:<?php echo $_smarty_tpl->getVariable('creditclient')->value['url'];?>
" height=14 />
                            
                                
                            </td>
                            <td valign="top" style="font-size: 14px;" align="left"><?php echo $_smarty_tpl->getVariable('credits')->value['clients'];?>
</td>
                        </tr>
                        <tr>
                            <td valign="top" align="left">
                            
                            <?php echo smarty_function_xr_img(array('s_id'=>270362,'h'=>14,'ext'=>'png','var'=>'creditagency','cloud'=>0),$_smarty_tpl);?>

                            
                            <img src="http:<?php echo $_smarty_tpl->getVariable('creditagency')->value['url'];?>
" height=14 />
                            
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