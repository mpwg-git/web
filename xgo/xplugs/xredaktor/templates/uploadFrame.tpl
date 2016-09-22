<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<title>flashuploader</title>
<link href="../../libs/swfupload/css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../../../xframe/libs/swfupload/swfupload.js"></script>
<script type="text/javascript" src="../../libs/swfupload/js/swfupload.queue.js"></script>
<script type="text/javascript" src="../../libs/swfupload/js/fileprogress.js"></script>
<script type="text/javascript" src="../../libs/swfupload/js/handlers.js"></script>
<script type="text/javascript">
var upload1;

window.onload = function() {
	upload1 = new SWFUpload({
		// Backend Settings
		upload_url: "/xgo/xplugs/xredaktor/upload/_up.php",
		post_params: {
		"PHPSESSID" : "<%$session%>",
		"s_id" : "<%$s_id%>",
		"s_storage_scope" : "<%$s_storage_scope%>"
		},

		// File Upload Settings
		file_size_limit : "102400",	// 100MB
		file_types : "*.*",
		file_types_description : "All Files",
		file_upload_limit : "0",
		file_queue_limit : "0",

		// Event Handler Settings (all my handlers are in the Handler.js file)
		file_dialog_start_handler : fileDialogStart,
		file_queued_handler : fileQueued,
		file_queue_error_handler : fileQueueError,
		file_dialog_complete_handler : fileDialogComplete,
		upload_start_handler : uploadStart,
		upload_progress_handler : uploadProgress,
		upload_error_handler : uploadError,
		upload_success_handler : uploadSuccess,
		upload_complete_handler : uploadComplete,

		// Button Settings
		button_image_url : "../../libs/swfupload/img/XPButtonUploadText_61x22.png",
		button_placeholder_id : "spanButtonPlaceholder1",
		button_width: 61,
		button_height: 22,

		// Flash Settings
		flash_url : "../../../../xframe/libs/swfupload/Flash/swfupload.swf",


		custom_settings : {
			progressTarget : "fsUploadProgress1",
			cancelButtonId : "btnCancel1"
		},

		// Debug Settings
		debug: false
	});
}
	</script>
</head>
<body>
<div id="content">

	<form id="form1" action="index.php" method="post" enctype="multipart/form-data">
<div style="padding-left: 5px;">
							<span id="spanButtonPlaceholder1"></span>
							<input id="btnCancel1" type="button" value="Alle Uploads abbrechen" onclick="cancelQueue(upload1);" disabled="disabled" style="margin-left: 2px; height: 22px; font-size: 8pt;" />
							<br />
						</div>
		<table>
			<tr valign="top">
				<td>
					<div>
						<div class="fieldset flash" id="fsUploadProgress1">
							<span class="legend">Upload - Warteschlange</span>
						</div>
					</div>
				</td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>
