Ext.define('Ext.xr.xr_field_file_2', {
	extend: 'Ext.form.FieldContainer',
	alias: 'widget.xr_field_file_2',

	config: {
		fieldLabel: 'File',
		labelWidth: 100,
		minWidth: 200,
		minHieght: 200
	},

	constructor:function(cnfg){

		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);

		this.makeGui();
		this.hiddenX = Ext.create('Ext.form.field.Hidden',{
			name: cnfg.name,
			value: cnfg.value,
			listeners: {
				scope: this,
				change: function(fieldx,value){
					this.showImageX();
				}
			}
		});

		this.add(this.hiddenX);
		this.on('afterrender',function(){
			this.showImageX();
		},this,{buffer:10})
	},

	getValue: function() {
		var v = parseInt(this.hiddenX.getValue(),10);
		if (isNaN(v)) v = 0;
		return v;
	},


	setValue: function(value) {
		this.hiddenX.setValue(value);
		this.showImageX();
	},


	_formatFileSize: function (bytes) {
		if (typeof bytes !== 'number') {
			return '';
		}
		if (bytes >= 1000000000) {
			return (bytes / 1000000000).toFixed(2) + ' GB';
		}
		if (bytes >= 1000000) {
			return (bytes / 1000000).toFixed(2) + ' MB';
		}
		return (bytes / 1000).toFixed(2) + ' KB';
	},

	_formatBitrate: function (bits) {
		if (typeof bits !== 'number') {
			return '';
		}
		if (bits >= 1000000000) {
			return (bits / 1000000000).toFixed(2) + ' Gbit/s';
		}
		if (bits >= 1000000) {
			return (bits / 1000000).toFixed(2) + ' Mbit/s';
		}
		if (bits >= 1000) {
			return (bits / 1000).toFixed(2) + ' kbit/s';
		}
		return bits.toFixed(2) + ' bit/s';
	},

	_formatTime: function (seconds) {
		var date = new Date(seconds * 1000),
		days = parseInt(seconds / 86400, 10);
		days = days ? days + 'd ' : '';
		return days +
		('0' + date.getUTCHours()).slice(-2) + ':' +
		('0' + date.getUTCMinutes()).slice(-2) + ':' +
		('0' + date.getUTCSeconds()).slice(-2);
	},

	_formatPercentage: function (floatValue) {
		return (floatValue * 100).toFixed(2) + ' %';
	},


	makeGui: function() {


		var me 				= this;
		this.imgId 			= Ext.id();
		this.imgInfo 		= Ext.id();
		this.iamrendered 	= false;
		this.btn_download	= Ext.id();
		this.dimPanel		= Ext.id();
		this.btn_archive	= Ext.id();
		this.btn_crop		= Ext.id();


		var uId 		= 'fileUploader_'+Ext.id();
		var uId_btn		= 'btn_fileUploader_'+Ext.id();
		var uploadUrl 	= this.uploadUrl;

		var html = '\
				    <form id="'+uId+'" action="'+uploadUrl+'" data-url="'+uploadUrl+'" method="POST" enctype="multipart/form-data">\
				        <div class="fileupload-buttonbar"  style="margin-top:-2px;">\
				                <span class="fileinput-button">\
				                    <div id="'+uId_btn+'"></div>\
				                    <input type="file" name="file">\
				                </span>\
				            </div>\
				    </form>';


		var pAll = Ext.create('Ext.ProgressBar', {
			width: 170,
			flex: 1
		});

		var eInfos = Ext.create('Ext.panel.Panel', {
			border: false,
			height: 50,
			html: '-'
		});

		var stdButtonWidth = 75;

		this.add({
			xtype: 'fieldcontainer',
			width: 200,
			minWidth: 200,
			layout: 'vbox',
			listeners: {
				scope: this,
				buffer: 1,
				afterrender: function()
				{
					this.iamrendered = true;
					this.showImageX();

					Ext.widget({
						xtype: 'button',
						iconCls: 'xf_add',
						width: stdButtonWidth,
						renderTo: uId_btn,
						text: 'Upload'
					});

					$$('#'+uId).fileupload({
						dataType: 'json',
						autoUpload: false,
						add: function (e, data) {

							

							me.getFinalDir({
								scope: me,
								fn: function(s_id) {

									var url 	= "/xgo/xplugs/xredaktor/ajax/storage/file-upload-single?f_s_id="+s_id;
									

									$$('#'+uId).attr('action',url);
									$$('#'+uId).fileupload(
									'option',
									'url',
									url
									);
									data.submit();

								}
							});


						}
					}).bind('fileuploadadd',function (e, r) {
					}).bind('fileuploadalways',function (e, data) {


						var info = Ext.decode(data.jqXHR.responseText,true);

						if (!info) {
							console.info("Invalid Backend Response");
							return;
						}
						if ((!info.MSG)&&(!info.FILE)) {
							console.info("Invalid Backend Response II");
							return;
						}

						if (info.MSG)
						{
							xframe.alert("Upload failed",info.MSG);
						} else
						{
							
							me.setValue(info.FILE);



							var fn_scope 	= me.rawConfig.scope;
							var fn 			= me.rawConfig.uploadDone;

							if (typeof fn == 'function')
							{
								var url = fn.call(fn_scope,info);
							}

						}

					}).bind('fileuploadprogress',function(e,data){



					}).bind('fileuploadsend',function(e,data){
					}).bind('fileuploadprogressall',function(e,data){

						var info = '<br>Remaining Time: <b>'+me._formatTime((data.total - data.loaded) * 8 / data.bitrate) + '</b><br>Transfered: ' +	me._formatFileSize(data.loaded) + ' / ' + me._formatFileSize(data.total);
						eInfos.update(info);

						var progressInt = parseInt(data.loaded / data.total * 100, 10);
						var progress 	= data.loaded / data.total;
						pAll.updateProgress(progress,me._formatPercentage(data.loaded / data.total)+' ('+me._formatBitrate(data.bitrate)+')');
						if (progressInt == 100)
						{
							pAll.updateProgress(0,'done.');

						}

					});


				}
			},
			items: [{
				xtype: 'panel',
				border: false,
				width: 170,
				height: 170,
				html: '<div><div class="FA_SELECTOR_imgHolder"><img id="'+me.imgId+'" src="" width="150px" height="150px"></div></div>'
			}, {
				id: this.dimPanel,
				xtype: 'text',
				text: 'Dim: -'
			}, {
				xtype: 'text',
				height: 5
			}, pAll,eInfos,{
				xtype: 'text',
				height: 5
			}, {
				id: me.imgInfo,
				border: false,
				xtype: 'panel',
				html: '<div></div>',
				width: 170,
				minWidth: 170
			}, {
				xtype: 'text',
				height: 10
			}, {
				border: false,
				xtype: 'panel',
				width: 190,
				minWidth: 190,
				layout: 'hbox',
				flex: 1,
				items: [
				{
					width: stdButtonWidth,
					xtype: 'box',
					autoEl: {
						tag: 'div',
						html: html
					}
				},
				{
					xtype: 'text',
					width: 10
				},{
					scope: this,
					xtype: 'button',
					width: stdButtonWidth,
					iconCls: 'xf_del',
					text: 'Delete',
					scope: this,
					handler: this.delFile
				}

				]

			},{
				xtype: 'text',
				height: 10
			}, {
				border: false,
				xtype: 'panel',
				width: 200,
				minWidth: 200,
				layout: 'hbox',
				flex: 1,
				items: [
				{
					id: this.btn_archive,
					width: stdButtonWidth,
					scope: this,
					xtype: 'button',
					iconCls: 'xf_select',
					text: 'Archive',
					scope: this,
					handler: this.archive
				},
				{
					xtype: 'text',
					width: 10
				},{
					id: this.btn_download,
					disabled: true,
					width: stdButtonWidth,
					scope: this,
					xtype: 'button',
					iconCls: 'xf_download',
					text: 'Download',
					scope: this,
					handler: this.downloadFile
				}

				]

			},{
				xtype: 'text',
				height: 10
			}, {
				border: false,
				xtype: 'panel',
				width: 200,
				minWidth: 200,
				layout: 'hbox',
				flex: 1,
				items: [
				{
					id: this.btn_crop,
					width: stdButtonWidth,
					scope: this,
					disabled: true,
					xtype: 'button',
					iconCls: 'xf_crop_image',
					text: 'Crop',
					scope: this,
					handler: this.crop
				}

				]

			}]
		});

	},

	downloadFile: function()
	{
		var s_id = this.getValue();
		if (s_id == 0) return;
		window.open('/xgo/xplugs/xredaktor/ajax/storage/downloadFile/'+s_id,'DOWNLOAD_FILE_2');
	},

	delFile: function() {
		this.hiddenX.setValue(0);
		this.showImageX();
	},

	updateFileInfos: function()
	{

		var panelx = Ext.getCmp(this.imgInfo);

		panelx.mask('loading infos...');
		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/storage/getFileInfo',
			params: {
				s_id: this.getValue()
			},
			stateless: function(succ,json) {
				panelx.unmask();

				var html = "";

				html += "<b>ID: </b>"+json.file_info.id;
				html += "<br><b>Name: </b>"+json.file_info.name;
				html += "<br><b>Size: </b>"+json.file_info['file size'];
				html += "<br><b>Dim: </b>"+json.file_info.width+" x "+json.file_info.height+" px";

				this.crop_src_image = json.file_info.url;
				if (json.original_file)
				{
					this.crop_original_s_id = json.original_file.s_id;
					this.crop_src_image = json.original_file.webSrc;
				}

				this.crop_selection = Ext.decode(json.f.s_crop_data,true);
				this.crop_selection = Ext.decode(json.f.s_crop_data,true);

				panelx.update(html);
			}
		});

		

		if ((this.img_w) && (this.img_h))
		{
			var i = this.img_w+' x '+this.img_h;
			Ext.getCmp(this.dimPanel).setText('Required: '+i+" px");
		}
	},

	showImageX: function() {

		if (!this.iamrendered) return;

		var s_id = this.getValue();
		Ext.getCmp(this.btn_download).setDisabled((s_id == 0));
		Ext.getCmp(this.btn_crop).setDisabled((s_id == 0));

		if (s_id == "") s_id = 0;
		if (s_id == 0) 	s_id = "";

		var url = '/xgo/xplugs/xredaktor/ajax/storage/scaleBoxed/'+s_id+'/150/150';

		var container = this;
		container.mask("Loading...");
		$$('#'+this.imgId).unbind('load');
		$$('#'+this.imgId).attr('src','');
		$$('#'+this.imgId).load(function() {
			container.unmask();
		});

		$$('#'+this.imgId).attr('src',url);
		this.updateFileInfos();
	},

	getFinalDir: function(cb) {

		var panelx = Ext.getCmp(this.imgInfo);
		panelx.mask('opening storage...');
		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/storage/getDir_s_id',
			params: {
				f_s_id: this.dir || 0,
				addPath : this.addPath
			},
			stateless: function(succ,json) {
				panelx.unmask();
				cb.fn.call(cb.scope,json.s_id);
			}
		});

	},

	archive: function() {
		this.getFinalDir({
			scope: this,
			fn: function(s_id) {
				this.dir_s_id = s_id;
				this.openStorage();
			}
		});
	},

	openStorage: function() {
		if (!this.xstorage) this.xstorage = xredaktor_storage.getInstance();
		this.latestSaved = this.rawConfig.value;
		this.xstorage.showFileDialog({
			s_storage_scope: xredaktor.getInstance().getCurrentBasicStorage(),
			site_id: xredaktor.getInstance().getCurrentSiteId(),
			preSelectDir: this.dir_s_id || 0,
			preSelect: this.getValue(),
			latestSaved : this.latestSaved,
			scope:this,
			callBack:function(datax)
			{
				var data = datax[0].data;
				var s_id = data.s_id;
				if (!Ext.isNumeric(s_id)) s_id = '';
				this.setValue(s_id);
				this.showImageX();
			}
		});
	},

	crop: function()
	{
		if (!this.crop_selection) this.crop_selection = "";

		var src 		= this.crop_src_image;
		var selection 	= this.crop_selection;

		this.cropThisImage(src,selection,function(selection){
			this.crop_selection = selection;
			if (selection == "")
			{
				this.setValue(this.crop_original_s_id);
			}
			this.crop_done();
		});
	},

	crop_done: function()
	{

		this.mask("cropping image ...");
		xframe.ajax({
			scope: this,
			url: '/xgo/xplugs/xredaktor/ajax/storage/cropImageAndSaveNew',
			params: {
				s_id: this.getValue(),
				crop: Ext.encode(this.crop_selection)
			},
			stateless: function(succ,json) {
				this.unmask();
				this.setValue(json.new_s_id);
			}
		});

	},

	cropThisImage: function(src,selection,cb) {

		var me			= this;
		var width 		= window.innerWidth*0.9;
		var height 		= window.innerHeight*0.9;
		var widthbox 	= width - 80;
		var heightbox 	= height - 80;
		var cropper 	= Ext.id();
		var preview 	= Ext.id();
		var boundx 		= 0;
		var boundy 		= 0;

		var latest	= {};

		var previewWidth 	= 130;
		var previewHeight	= 130;

		
		console.info("widthbox | heightbox :",widthbox,heightbox);
		
		var getCoords = function(c){

			console.log("gte coords",c.x, c.y,c.x2,c.y2,c.w,c.h);

			/*
			var rW = Ext.get(cropper).parent().getWidth();
			var rH = rW * Ext.get(cropper).dom.height / Ext.get(cropper).dom.width;

			var fx 	= Ext.get(cropper).dom.width 	* c.x  	/ rW;
			var fy 	= Ext.get(cropper).dom.height 	* c.y  	/ rH;
			var fx2 = Ext.get(cropper).dom.width 	* c.x2  / rW;
			var fy2 = Ext.get(cropper).dom.height 	* c.y2  / rH;
			var w	= Ext.get(cropper).dom.width 	* c.w  / rW;
			var h	= Ext.get(cropper).dom.height 	* c.h  / rH;
			*/
			
			var rW = c.w;
			var rH = c.h;
			
			latest = {
				x: 	c.x,
				y: 	c.y,
				x2: c.x2,
				y2: c.y2,
				w: c.w,
				h: c.h,
			};
		};



		var oW = 0;
		var oH = 0;

		initJCrop = function() {
			
			
			var aspectRatio = 1;
			if ((me.img_h) && (me.img_w))
			{
				aspectRatio = me.img_w / me.img_h;
			}

			$$("#"+cropper).Jcrop({
				aspectRatio: aspectRatio,
				minSize : [0,0],
				boxWidth: widthbox, 
				boxHeight: heightbox,
				onSelect:getCoords,
				onChange:getCoords
			},function(){

				me.jcrop_api = this;
				
				oW = Ext.get(cropper).dom.width;
				oH = Ext.get(cropper).dom.height;
				
				if (selection != "") {
					if (typeof selection.x != 'undefined') {


						console.info("latest",selection);

						/*
						var rW = Ext.get(cropper).parent().getWidth();
						var rH = rW * Ext.get(cropper).dom.height / Ext.get(cropper).dom.width;

						var fx 	= rW*selection.x / Ext.get(cropper).dom.width;
						var fy 	= rH*selection.y / Ext.get(cropper).dom.height;
						var fx2 = rW*selection.x2 / Ext.get(cropper).dom.width;
						var fy2 = rH*selection.y2 / Ext.get(cropper).dom.height;
						*/
						
						
						var fx 	= selection.x;
						var fy 	= selection.y ;
						var fx2 = selection.x2;
						var fy2 = selection.y2;
						
						var tmp = [fx,fy,fx2,fy2];

						

						this.setSelect(tmp);
					}
				}
				var bounds = this.getBounds();
				boundx = bounds[0];
				boundy = bounds[1];



			});
		}


		var win = Ext.create('Ext.window.Window', {
			bbar: ['->',{
				scope: this,
				iconCls: 'xr_use_full_image',
				text: 'use full image',
				handler: function() {
					latest = "";
					cb.call(this,latest);
					win.close();
				}
			},'-',{
				scope: this,
				text: 'select area',
				iconCls: 'xf_crop',
				handler: function() {
					cb.call(this,latest);
					win.close();
				}
			},{
				text: 'abort',
				iconCls: 'xf_abort',
				handler: function() {
					win.close();
				}
			}],
			modal: true,
			title: 'image area cropper',
			layout: 'border',
			width: width,
			height: height,
			listeners: {
				scope: this,
				buffer:10,
				afterrender: function() {
					initJCrop();
				}
			},

			items: [
			{
				region: 'center',
				autoScroll: true,
				items: [{
					id:cropper,
					xtype:'image',
					src: src
				}]
			}]
		}).show();

	},






});
