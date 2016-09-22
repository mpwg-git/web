<?php /* Smarty version Smarty-3.0.7, created on 2016-04-07 11:40:20
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewaih3S" */ ?>
<?php /*%%SmartyHeaderCode:9445228557062b04096ba2-39954080%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1d52d57781ebdcc393d43baf2035a8032fca0e5' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codewaih3S',
      1 => 1460022020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9445228557062b04096ba2-39954080',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_img')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_img.php';
if (!is_callable('smarty_function_xr_imgWrapper')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_imgWrapper.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="de">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="initial-scale=1.0"> <!-- So that mobile webkit will display zoomed in -->
    <meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS -->
    <title>MeinePerfekteWG</title>
    <style type="text/css">

    /* Force Hotmail to display emails at full width */
	.ReadMsgBody {
	    width: 100%;
	    background-color: #ffffff;
	}
	
	/* Force Hotmail to display emails at full width */
	.ExternalClass {
	    width: 100%;
	    background-color: #ffffff;
	}
	
	/* Forces Hotmail to display normal line spacing. */
	.ExternalClass,
	.ExternalClass p,
	.ExternalClass span,
	.ExternalClass font,
	.ExternalClass td,
	.ExternalClass div {
	    line-height:100%;
	}
	
	/* Resolves webkit padding issue. */
	table {
	    border-spacing:0;
	}
	
	/* Resolves the Outlook 2007, 2010, and Gmail td padding issue. */
	table td {
	    border-collapse:collapse;
	}
	
	/* Yahoo auto-sensing link color and border */
	.yshortcuts a {
	    border-bottom: none !important;
	}
        
	@media screen and (max-device-width: 600px), screen and (max-width: 600px) {

	    /* Constrain email width for small screens */
	    table[class="email-container"] {
		    width: 98% !important;
	    }

	    /* Force elements to resize to full width of their container */
	    img[class="fluid"] {
		width: 100% !important;
		height: auto;
	    }

	    table[class="fluid"] {
		width: auto !important;
		margin-left: 20px !important;
		margin-right: 20px !important;
	    }

	    /* Force table cells into rows */
	    td[class="force-col"],
	    td[class="force-col-center"] {
		display: block !important;
		width: 100% !important;
	    }
	    td[class="force-col-center"] {
		text-align: center !important;
	    }
	    img[class="force-col-center"] {
		margin: auto !important;
	    }

	    /* align images left */

	    /* Grid with wrapping image thumbnails */
	    td[class="image-grid"] {
		padding: 0 !important;
	    }
	    img[class="image-grid"] {
		float: none !important;
		display: inline-block !important;
		margin: 0 -2px !important;
	    }

	}

	/* Rules prefixed with 'hh-' repeat much of what's above, but only on handheld screens. */
	@media screen and (max-device-width: 480px), screen and (max-width: 480px) {

	    img[class="hh-fluid"] {
		width: 100% !important;
		height: auto;
	    }

	    td[class="hh-force-col"],
	    td[class="hh-force-col-center"] {
		display: block !important;
		width: 100% !important;
	    }

	    td[class="hh-force-col-center"] {
		text-align: center !important;
	    }

	    img[class="hh-force-col-center"] {
		margin: 0 auto 20px auto !important;
	    }

	    table[class="fluid"] table {
		margin-left: 0 !important;
		margin-right: 0 !important;
	    }
	    table[class="fluid"] table td {
		padding: 0 !important;
	    }

	    img[class="image-grid"] {
		width: 50%;
		height: auto;
	    }

	}
    
    </style>
    
<?php echo $_smarty_tpl->getVariable('CMS')->value;?>

</head>
<body bgcolor="#ffffff" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="margin:0; padding:0;-webkit-text-size-adjust:none; -ms-text-size-adjust:none;background: #ffffff;">
  
<!-- Email Container : BEGIN -->
<table border="0" width="600" cellpadding="0" cellspacing="0" align="center" style="border: none;background: #ffffff;" class="email-container">
    <!-- Mast Image : BEGIN -->
    <tr>
	<td>
	    <?php echo smarty_function_xr_img(array('s_id'=>771,'var'=>'banner','w'=>600,'h'=>254,'ext'=>'jpg','rmode'=>'cco'),$_smarty_tpl);?>

	    <a href="http://www.meineperfektewg.com" target="_blank"><img src="<?php echo $_smarty_tpl->getVariable('banner')->value['src'];?>
" width="600" height="254" border="0" style="display: block;" class="fluid"></a>
	</td>
    </tr>
    <!-- Mast Image : END -->

    <!-- Full Width, Fluid Column : BEGIN -->
    <tr>
	<td>
	    
	    <?php echo $_smarty_tpl->getVariable('CONTENT')->value;?>

	    
	    
	</td>
    </tr>
    
</table>
<!-- Email Container : END -->
  
<!-- Footer : BEGIN -->
<br /><br />
<table border="0" width="600" cellpadding="0" cellspacing="0" align="center" style="background-color: #1d1d1d;" class="email-container">
    <tr>
	<td class="force-col-center" valign="top" style="font-family: sans-serif; color: #ffffff; text-align: left; padding: 5px;">
	    <span style="font-size: 15px; line-height: 25px; font-weight: 100; color: #04e0d7; vertical-align: middle;">&copy; MeinePerfekteWG - est. 2015</span><br />
	</td>
	<td class="force-col-center" valign="top" style="font-family: sans-serif; olor: #ffffff; text-align: right; padding: 5px;">
		<a href="https://www.facebook.com/whoshowersfirst" target="_blank"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>768,'w'=>22,'h'=>22,'ext'=>'png'),$_smarty_tpl);?>
</a>&nbsp;
        <a href="https://twitter.com/whoshowersfirst" target="_blank"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>773,'w'=>22,'h'=>22,'ext'=>'png'),$_smarty_tpl);?>
</a>&nbsp;
        <a href="https://plus.google.com/102736148895233983137"><?php echo smarty_function_xr_imgWrapper(array('s_id'=>769,'w'=>22,'h'=>22,'ext'=>'png'),$_smarty_tpl);?>
</a>&nbsp;
	</td>
    </tr>
</table>
<!-- Footer : END -->

</body>
</html>