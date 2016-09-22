<?php /* Smarty version Smarty-3.0.7, created on 2014-09-30 16:18:47
         compiled from "/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeqCyW2z" */ ?>
<?php /*%%SmartyHeaderCode:1050108623542ad7e7dae262-33837894%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f16341966cc25662011ad600448d2b04b44ffa21' => 
    array (
      0 => '/srv/www/www.luerzersarchive.net/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codeqCyW2z',
      1 => 1412093927,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1050108623542ad7e7dae262-33837894',
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
        
        <?php echo smarty_function_xr_siteCall(array('fn'=>'fe_submissions::sc_get_credits_email','submission'=>$_smarty_tpl->tpl_vars['v']->value,'var'=>'credits'),$_smarty_tpl);?>

        
        <?php if ($_smarty_tpl->tpl_vars['v']->value['es_mediaType_id']==2){?>
        <?php if ($_smarty_tpl->tpl_vars['v']->value['es_video_poster_s_id']>0){?>
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['es_video_poster_s_id'],'w'=>120,'cloud'=>0),$_smarty_tpl);?>

        <?php }else{ ?>
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>270344,'w'=>120,'cloud'=>0),$_smarty_tpl);?>

        <?php }?>
        <?php }else{ ?>
        <?php if ($_smarty_tpl->tpl_vars['v']->value['es_image_highRes_s_id']>0){?>
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['es_image_highRes_s_id'],'w'=>120,'cloud'=>0),$_smarty_tpl);?>

        <?php }else{ ?>
        <?php echo smarty_function_xr_imgWrapper(array('s_id'=>$_smarty_tpl->tpl_vars['v']->value['es_image_s_id'],'w'=>120,'cloud'=>0),$_smarty_tpl);?>

        <?php }?>
        <?php }?>
        
    </td>
    <td>
        <table>
            <tr>
                <td style="font-size: 14px; font-weight: bold;" align="left">&nbsp;<?php echo $_smarty_tpl->tpl_vars['v']->value['es_campaign'];?>
</td>
            </tr>
            <tr>
                <td valign="top" align="left">
                    <table>
                        <tr>
                            <td valign="top" align="left"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270396,'w'=>39,'ext'=>'png','cloud'=>0),$_smarty_tpl);?>
</td>
                            <td valign="top" style="font-size: 14px;" align="left"><?php echo $_smarty_tpl->getVariable('credits')->value['clients'];?>
</td>
                        </tr>
                        <tr>
                            <td valign="top" align="left"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>270388,'w'=>39,'ext'=>'png','cloud'=>0),$_smarty_tpl);?>
</td>
                            <td valign="top" style="font-size: 14px;" align="left"><?php echo $_smarty_tpl->getVariable('credits')->value['agencies'];?>
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