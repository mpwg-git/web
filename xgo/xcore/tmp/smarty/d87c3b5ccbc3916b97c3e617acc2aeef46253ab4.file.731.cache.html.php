<?php /* Smarty version Smarty-3.0.7, created on 2016-01-14 12:59:34
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/731.cache.html" */ ?>
<?php /*%%SmartyHeaderCode:139536535156978da6c444d9-53867671%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd87c3b5ccbc3916b97c3e617acc2aeef46253ab4' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/731.cache.html',
      1 => 1452514019,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139536535156978da6c444d9-53867671',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_translate')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_translate.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><table border="0" width="500" cellpadding="0" cellspacing="0" align="center" class="fluid">
    <tr>
        <td height="40" style="font-size: 0; line-height: 0;">&nbsp;</td>
    </tr>
    <tr>
        <td class="force-col-center" valign="top" style="font-family: sans-serif; font-size: 14px; line-height: 22px; color: #373737; text-align: center;">
    		<span style="font-size: 65px; line-height: 70px; font-weight: 600; color: #04e0d7;"><?php echo smarty_function_xr_translate(array('tag'=>'VIELEN DANK'),$_smarty_tpl);?>
</span><br />
            <span style="font-size: 35px; line-height: 45px; font-weight: 600; color: #04e0d7;"><?php echo smarty_function_xr_translate(array('tag'=>'FÜR DEINE ANMELDUNG'),$_smarty_tpl);?>
</span><br />
            <span style="font-size: 65px; line-height: 70px; font-weight: 600; color: #04e0d7;">&nbsp;###VORNAME###!&nbsp;</span><br /><br />
    		
            <br /><br />
            
            <center>
            <table width="500" align="center">
                <tr>
                    <td style="text-align: center;  font-family: sans-serif;">
                        <?php echo smarty_function_xr_translate(array('tag'=>'Du hast dich erfolgreich registriert.'),$_smarty_tpl);?>
<br /> <?php echo smarty_function_xr_translate(array('tag'=>'Um Deine <strong>Registrierung zu bestätigen</strong> klicke bitte auf'),$_smarty_tpl);?>

                    </td>
                </tr>
            </table>    
            <br />
            <table width="200" align="center">    
                <tr>
                        
                    <td style="background-color: #04e0d7; text-align: center; color: #ffffff; padding-top: 5px; padding-bottom: 5px;">
                        <a href="###LINK###" style="font-family: sans-serif; font-size: 15px; font-weight: 600; text-decoration: none; color: #ffffff;" target="_blank"><?php echo smarty_function_xr_translate(array('tag'=>'BESTÄTIGEN'),$_smarty_tpl);?>
</a>
                    </td>
                </tr>
            </table>
            
            <table width="500" align="center">
                <tr>
                    <td style="text-align: center;  font-family: sans-serif;">
                        <br />
                        <br />
                        <?php echo smarty_function_xr_translate(array('tag'=>'Falls Du diesen Button nicht klicken kannst, füge bitte folgende URL in deinen Browser ein:'),$_smarty_tpl);?>

                        <br />
                        ###LINK###
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