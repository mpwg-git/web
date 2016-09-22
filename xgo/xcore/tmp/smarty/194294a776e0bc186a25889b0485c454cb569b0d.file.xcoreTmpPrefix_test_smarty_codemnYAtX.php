<?php /* Smarty version Smarty-3.0.7, created on 2016-06-16 19:38:25
         compiled from "/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemnYAtX" */ ?>
<?php /*%%SmartyHeaderCode:17612976305762e411a54847-32219688%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '194294a776e0bc186a25889b0485c454cb569b0d' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/tmp/xcoreTmpPrefix_test_smarty_codemnYAtX',
      1 => 1466098705,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17612976305762e411a54847-32219688',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_jsWrapperV2')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_jsWrapperV2.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsfdev.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->getVariable('P_LANG')->value;?>
">
    
    <head>
       
       <link rel="stylesheet" type="text/css" href="/xstorage/template/libs/font-awesome/css/font-awesome.css" />
       <link rel="stylesheet" type="text/css" href="/xstorage/template/libs/daterangepicker/daterangepicker.css" />
       
       <style>
           .daterangepicker
           {
               display:none;
           }
       </style>
        
        <?php echo smarty_function_xr_jsWrapperV2(array('s_ids'=>'97','var'=>"jquery"),$_smarty_tpl);?>

        <?php echo smarty_function_xr_jsWrapperV2(array('s_ids'=>'18542','var'=>"moment"),$_smarty_tpl);?>

        <?php echo smarty_function_xr_jsWrapperV2(array('s_ids'=>'18543','var'=>"daterangepicker"),$_smarty_tpl);?>

        
        <script src="/csvexport/js/scripts.js" type="text/javascript"></script>
        
       <script>
           
           $(document).ready(function(){
              $('#datum').daterangepicker({
        			autoApply: true,
        			"minDate": "12.04.2016",
        			locale: {
        	      		format: 'DD.MM.YYYY',
        		        "daysOfWeek": [
        		            "So",
        		            "Mo",
        		            "Di",
        		            "Mi",
        		            "Do",
        		            "Fr",
        		            "Sa"
        		        ],
        		        "monthNames": [
        		            "Jänner",
        		            "Februar",
        		            "März",
        		            "April",
        		            "Mai",
        		            "Juni",
        		            "Juli",
        		            "August",
        		            "September",
        		            "Oktober",
        		            "November",
        		            "Dezember"
        		        ]
        	    	}
        		}, 
        		function(start, end, label) {
        			$('#von').val(start.format('YYYY-MM-DD'));
        			$('#bis').val(end.format('YYYY-MM-DD'));
        		}); 
           });
           
       </script>
       
    </head>
     
	<body>
	   
	   
	   <!--
	   <form action="export.php">
	       
	        <div>
	            <label>Zeitraum</label>
	            <input type="text" name="datum" id="datum" /> <button>Erstellen</button>
	            <input type="hidden" name="von" id="von" value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
" />
	            <input type="hidden" name="bis" id="bis" value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d");?>
" />
	        </div>
	        
	   </form>
	   -->
	   
	   <form action="exports/fragen.php">
	       
	        <div style="margin-bottom: 10px;">
	            <label>Fragen </label>
	            <button>Erstellen</button>
	        </div>
	        
	   </form>
	   
	   <form action="exports/user.php">
	       
	        <div style="margin-bottom: 10px;">
	            <label>User </label>
	            <button>Erstellen</button>
	        </div>
	        
	   </form>
	   
	   <form action="exports/rooms.php">
	       
	        <div style="margin-bottom: 10px;">
	            <label>Rooms </label>
	            <button>Erstellen</button>
	        </div>
	        
	   </form>
	   
	   <form action="exports/messages.php">
	       
	        <div style="margin-bottom: 10px;">
	            <label>Messages </label>
	            <button>Erstellen</button>
	        </div>
	        
	   </form>
	   
	   <button>User Bilder</button> <button>Room Bilder</button>
	   
	   <div id="results"></div>
	   
	</body>
</html>