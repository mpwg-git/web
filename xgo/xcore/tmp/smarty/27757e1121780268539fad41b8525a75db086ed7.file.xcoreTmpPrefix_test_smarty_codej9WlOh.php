<?php /* Smarty version Smarty-3.0.7, created on 2015-10-30 16:32:44
         compiled from "/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codej9WlOh" */ ?>
<?php /*%%SmartyHeaderCode:11245360256338d9cd30752-83893652%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27757e1121780268539fad41b8525a75db086ed7' => 
    array (
      0 => '/srv/gitgo_daten/www/wsf.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codej9WlOh',
      1 => 1446219164,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11245360256338d9cd30752-83893652',
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
    		<span style="font-size: 65px; line-height: 70px; font-weight: 600; color: #04e0d7;">HALLO,</span><br />
            <span style="font-size: 35px; line-height: 45px; font-weight: 600; color: #04e0d7;">###ABSENDER_VORNAME### ###ABSENDER_NACHNAME### </span><br />
            <span style="font-size: 35px; line-height: 45px; font-weight: 600; color: #04e0d7;">&nbsp; hat dich in die WG eingeladen!&nbsp;</span><br /><br />
    		
            <br /><br />
            
            <center>
            <table width="500" align="center">
                <tr>
                    <td style="text-align: center;  font-family: sans-serif;">
                        <?php echo $_smarty_tpl->getVariable('TEXT')->value;?>

                    </td>
                </tr>
            </table>    
                
            <table width="200" align="center">    
                <tr>
                    <td style="background-color: #04e0d7; text-align: center; color: #ffffff; padding-top: 5px; padding-bottom: 5px;">
                        <a href="http://wsf.xgodev.com###LINK###" style="font-family: sans-serif; font-size: 15px; font-weight: 600; text-decoration: none; color: #ffffff;" target="_blank">REGISTRIEREN</a>
                    </td>
                </tr>
            </table>
            </center>
            <br /><br />
            
            <?php echo smarty_function_xr_imgWrapper(array('s_id'=>767,'w'=>43,'h'=>41,'ext'=>'png'),$_smarty_tpl);?>
<br /><br /><br />
            
        </td>
    </tr>
</table>