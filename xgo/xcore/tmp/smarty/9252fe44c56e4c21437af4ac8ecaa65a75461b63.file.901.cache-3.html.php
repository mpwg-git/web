<?php /* Smarty version Smarty-3.0.7, created on 2017-02-20 21:26:44
         compiled from "/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/901.cache-3.html" */ ?>
<?php /*%%SmartyHeaderCode:180289248158ab5104a94f82-40359831%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9252fe44c56e4c21437af4ac8ecaa65a75461b63' => 
    array (
      0 => '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/atom_cache/901.cache-3.html',
      1 => 1487588824,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180289248158ab5104a94f82-40359831',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_xr_jsWrapperV2')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xplugs/xredaktor/classes/../smarty/function.xr_jsWrapperV2.php';
if (!is_callable('smarty_modifier_date_format')) include '/srv/gitgo_daten/www/wsfbeta.xgodev.com/web/xgo/xcore/libs/smarty3/plugins/modifier.date_format.php';
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

        
        <script src="/csvexport/js/script.js" type="text/javascript"></script>
        
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

        <div style="margin-bottom: 10px;">
	    	<label>Chatnachrichten</label>
	    	<a href="../datamigration/list-chatnachrichten.php" target="_blank"><button>Anzeigen</button></a>
	    </div>
		<br>
		<div style="margin-bottom: 10px;">
            <label>User deaktivieren (lastLogin > 3 month) </label>
            <br>
            <a href="../datamigration/deactivate-user-accounts.php?printlist" target="_blank"><button>Userlist</button></a>
            <button onclick="return confirmDeactivation()">Deactivate users</button>
            <a href="../datamigration/deactivate-user-accounts.php?deactivateuser" target="_blank"><button id="do-deactivation" style="display: none;">Deactivate users now</button></a>
        </div>
	   <br>
	   
		<div style="margin-bottom: 10px;">
            <label>Emailbestätigungen senden (Userregistration > 2 days)</label>
            <br>
            <a href="../datamigration/deactivate-user-accounts.php?printlistemail" target="_blank"><button>Userlist</button></a>
            <button onclick="return confirmMailSend()">Send mails</button>
            <a href="../datamigration/deactivate-user-accounts.php?resendemailconfirm" target="_blank"><button id="send-emails" style="display: none;">Send mails now</button></a>
        </div>
        
	   		<br><br>
	   <button id="userBilder">User Bilder</button> <button id="roomBilder">Room Bilder</button>
	   
	   


	   <div id="results"></div>

	    <script>
    	    function confirmDeactivation()
    	    {
                if(confirm('Useraccounts wirklich deaktivieren?'))
                {
                    $('button#do-deactivation').show();
                }
                else
                {
                    $('button#do-deactivation').hide();
                }
    	        
    	    }
    	    function confirmMailSend()
    	    {
                if(confirm('Emails an alle User senden?'))
                {
                    $('button#send-emails').show();
                }
                else
                {
                    $('button#send-emails').hide();
                }
    	        
    	    }
    	       
	    </script> 
	</body>
</html>



