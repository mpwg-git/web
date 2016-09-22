<?php /* Smarty version Smarty-3.0.7, created on 2015-12-22 18:35:39
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenOisrJ" */ ?>
<?php /*%%SmartyHeaderCode:741754761567989eb1e1b39-66171865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '248a0c50914008d1722eebe4d65bd0ce62e8cd6a' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codenOisrJ',
      1 => 1450805739,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '741754761567989eb1e1b39-66171865',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><table border="0" width="500" cellpadding="0" cellspacing="0" align="center" class="fluid">
    <tr>
        <td height="40" style="font-size: 0; line-height: 0;">&nbsp;</td>
    </tr>
    <tr>
        <td class="force-col-center" valign="top" style="font-family: sans-serif; font-size: 14px; line-height: 22px; color: #373737; text-align: center;">
            <span style="font-size: 35px; line-height: 45px; font-weight: 600; color: #04e0d7;"><?php echo smarty_function_xr_translate(array('tag'=>"Hallo"),$_smarty_tpl);?>
!</span><br />
            <br /><br />
            <center>
                <table width="500" align="center">
                    <tr>
                        <td style="text-align: center; font-family: sans-serif;">
                            <span><?php echo $_smarty_tpl->getVariable('TEXT1')->value;?>
</span>
                        </td>
                        <br>
                    </tr>
                </table>    
                
                <table width="200" align="center">    
                    <tr>
                        <td style="background-color: #04e0d7; text-align: center; color: #ffffff; padding-top: 5px; padding-bottom: 5px;">
                            <a href="###HASHLINK###" style="font-family: sans-serif; font-size: 15px; font-weight: 600; text-decoration: none; color: #ffffff;" target="_blank"><?php echo $_smarty_tpl->getVariable('BTNTEXT1')->value;?>
</a>
                        </td>
                    </tr>
                </table>
                
                <table width="500" align="center">
                    <tr>
                        <td style="text-align: center; font-family: sans-serif;">
                            <span><?php echo $_smarty_tpl->getVariable('TEXT2')->value;?>
</span>
                        </td>
                        <br>
                    </tr>
                </table>      
                
                <table width="200" align="center">    
                    <tr>
                        <td style="background-color: #04e0d7; text-align: center; color: #ffffff; padding-top: 5px; padding-bottom: 5px;">
                            <a href="###ACTIVELINK###" style="font-family: sans-serif; font-size: 15px; font-weight: 600; text-decoration: none; color: #ffffff;" target="_blank"><?php echo $_smarty_tpl->getVariable('BTNTEXT2')->value;?>
</a>
                        </td>
                    </tr>
                </table>
            </center>
            <br /><br />
            
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>767,'w'=>43,'h'=>41,'ext'=>'png'),$_smarty_tpl);?>
<br /><br /><br />
            
            <table width="500" align="center">
                <tr>
                    <td style="text-align: center; font-family: sans-serif;">
                        <?php echo $_smarty_tpl->getVariable('MAILFOOTERTEXT')->value;?>

                    </td>
                </tr>
            </table> 
            
            <br /><br />
            
        </td>
    </tr>
</table>