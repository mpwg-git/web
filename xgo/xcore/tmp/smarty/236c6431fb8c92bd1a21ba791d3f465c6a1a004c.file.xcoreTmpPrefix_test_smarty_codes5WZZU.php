<?php /* Smarty version Smarty-3.0.7, created on 2015-10-30 15:53:06
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codes5WZZU" */ ?>
<?php /*%%SmartyHeaderCode:278332060563384523afa63-63928685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '236c6431fb8c92bd1a21ba791d3f465c6a1a004c' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codes5WZZU',
      1 => 1446216786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '278332060563384523afa63-63928685',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><table border="0" width="500" cellpadding="0" cellspacing="0" align="center" class="fluid">
    <tr>
        <td height="40" style="font-size: 0; line-height: 0;">&nbsp;</td>
    </tr>
    <tr>
        <td class="force-col-center" valign="top" style="font-family: sans-serif; font-size: 14px; line-height: 22px; color: #373737; text-align: center;">
            <span style="font-size: 35px; line-height: 45px; font-weight: 600; color: #04e0d7;"><?php echo $_smarty_tpl->getVariable('BEGRUESSUNG')->value;?>
</span><br />
            <span style="font-size: 65px; line-height: 70px; font-weight: 600; color: #04e0d7;">&nbsp;###VORNAME###!&nbsp;</span><br /><br />
    		
            <br /><br />
            
            <center>
            <table width="500" align="center">
                <tr>
                    <td style="text-align: center; font-family: sans-serif;">
                        <span><?php echo $_smarty_tpl->getVariable('TEXT')->value;?>
</span>
                    </td>
                    <br>
                </tr>
            </table>    
                
            <table width="200" align="center">    
                <tr>
                    <td style="background-color: #04e0d7; text-align: center; color: #ffffff; padding-top: 5px; padding-bottom: 5px;">
                        <a href="###LINK###" style="font-family: sans-serif; font-size: 15px; font-weight: 600; text-decoration: none; color: #ffffff;" target="_blank"><?php echo $_smarty_tpl->getVariable('ZURUECK')->value;?>
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