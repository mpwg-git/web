



$(document).ready(function()
{
		var cropperOptions = {
			//customUploadButtonId:'/xsite/call/fe_testupload/test',
			cropData:{
				"dummyData":1,
				"dummyData2":"text"
			},
			uploadUrl:'/xsite/call/fe_testupload/test',
			cropUrl:'/xsite/call/fe_testupload/testCrop',
			//loaderHtml:'<img class="loader" src="/xstorage/template/Croppic/assets/img/placeholder.png">',
			zoomFactor:10,
			doubleZoomControls:true,
			rotateFactor:10,
			rotateControls:true,
			processInline:true,
			imgEyecandy:true,
			imgEyecandyOpacity:0.2
	

		}		
		
		var cropperHeader = new Croppic('cropContainerHeader', cropperOptions);
		var cropper = new Croppic('cropContrainerHeader', cropperOptions);
		cropper.destroy();
		cropper.reset();
		
		});
