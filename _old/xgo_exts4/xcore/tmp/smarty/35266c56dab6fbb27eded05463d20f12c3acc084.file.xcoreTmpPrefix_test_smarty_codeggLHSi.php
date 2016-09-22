<?php /* Smarty version Smarty-3.0.7, created on 2014-12-16 08:29:31
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeggLHSi" */ ?>
<?php /*%%SmartyHeaderCode:2026918952548fed6bbb67d5-03567253%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35266c56dab6fbb27eded05463d20f12c3acc084' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeggLHSi',
      1 => 1418718571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2026918952548fed6bbb67d5-03567253',
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
        
         <a href="http://luerzersarchive.net/en/my-submissions.html">        
            <img src="http:<?php echo $_smarty_tpl->getVariable('submissionimage')->value['url'];?>
" width="120" border="0" />
        </a>
        
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