Ext.define('Ext.xr.field_img_gallery', {

	extend: 'Ext.form.FieldContainer',
	alias: 'widget.xr_field_img_gallery',

	config: {
		hideLabel: true
	},

	constructor:function(cnfg){


		this.thumb_w = 200;
		this.thumb_h = 200;


		var json_as_config = Ext.decode(cnfg.as_config,true);

		if (json_as_config)
		{
			if (json_as_config.thumb_w)
			{
				this.thumb_w = parseInt(json_as_config.thumb_w,10);
				this.thumb_h = parseInt(json_as_config.thumb_h,10);
			}
		}

		this.as_id = cnfg.as.as_id;
		this.wz_id = cnfg.wz_id;
		this.label = cnfg.as.as_label;

		this.cnfg = cnfg;
		this.callParent(arguments);//Calling the parent class constructor
		this.initConfig(cnfg);//Initializing the component
		this.makeLayoutImgGallery();
	},

	getValue: function()
	{
		return "";
	},


	statics: {
		openConfigWindow: function(as,grid) {

			Ext.xr.field.openDefaultConfigWindow({
				grid: grid,
				as: as,
				title: 'Verzeichnis',
				as_config_json: true,
				fields: [{
					xtype: 'xr_field_dir',
					name: 's_id',
					fieldLabel: 'Verzeichnis-Root'
				},{
					xtype: 'xr_field_int',
					name: 'thumb_w',
					fieldLabel: 'Thumbs-Breite',
					value: 200
				},{
					xtype: 'xr_field_int',
					name: 'thumb_h',
					fieldLabel: 'Thumbs-Höhe',
					value: 200
				}]
			});

		}
	},

	render_image: function(value, metaData, record)
	{
		var s_id = parseInt(value,10);

		switch(record.data.f_status)
		{
			case 'invalid':
			return "<b>Invalid Filetype:</b> " + record.data.f_filename;
			break;
			case 'error':
			return "<b>Server-Error:</b> " + record.data.f_filename;
			break;
			default: break;
		}

		if (isNaN(s_id)) {
			return "Uploading: " + record.data.f_filename;
		};

		return "<img width='"+this.thumb_w+"' height='"+this.thumb_h+"' src='/xgo/xplugs/xredaktor/ajax/gui/img_gallery/thumb/"+this.as_id+"/"+record.data.wz_s_id+"'>";
	},

	render_image_infos: function(value, metaData, record)
	{
		var f = {};

		if (record.raw.s_media_w)
		{
			f = record.raw;
		} else if (record.data.s_media_w)
		{
			f = record.data;
		}

		if (f.s_media_w)
		{
			return "<b>Dimensions:</b><br>"+f.s_media_w + "x" + f.s_media_h + "px<br><br><b>Size:</b><br>" + f.s_fileSizeBytesHuman + "<br><br><b>Name:</b><br>" + f.s_name
		}

		return '-';
	},

	pseudohtmlrenderer: function(value)
	{
		return value;
	},

	render_percent: function(value)
	{
		return value + "%";
	},


	validFileType: function(ftype)
	{
		switch(ftype)
		{
			case 'image/jpeg2':
			return true;
			default: return false;
		}
	},


	addUploadRecord: function(r)
	{

		var filex 		= r.files[0];

		var f_filename 	= filex.name;
		var f_type 		= filex.type;

		var vId 		= Ext.id();
		var ret			= true;

		if (!this.validFileType(f_type))
		{
			//ret = false;
		}

		this.grid.getStore().add({
			wz_id: 		vId,
			f_filename: 		f_filename,
			f_status: 			(ret) ? f_filename : 'invalid',
			f_upload: 			0
		});

		r.fileHook 		= ''+vId;
		r.url 			= this.uploadUrl+'?as_id='+this.as_id+'&wz_id='+this.wz_id+'&autoRename=1';

		return ret;
	},


	afterGridRendered: function()
	{

		var me = this;

		Ext.widget({
			xtype: 'button',
			iconCls: 'xf_add',
			width: 70,
			renderTo: this.uId_btn,
			text: 'Upload'
		});


		this.pasteDragZone = this.bodyEl.dom;

		$$('#'+this.uId).fileupload({

			url: 		this.uploadUrl,
			dataType: 	'json',
			pasteZone: 	this.pasteDragZone,
			dropZone: 	this.pasteDragZone,
			autoUpload: true

		}).bind('fileuploadadd',function (e, r) {

			return me.addUploadRecord(r);

		}).bind('fileuploadalways',function (e, r) {

			me.grid.getStore().getById(r.fileHook).set({f_upload:'done'});


			var d = Ext.decode(r.jqXHR.responseText,true);
			if (!d)
			{
				console.error(r.jqXHR.responseText);
				me.grid.getStore().getById(r.fileHook).set({f_status:'error'});
				xframe.alert("Server-Fehler","Die Datei konnte nicht verarbeitet werden.");
				return;
			}

			if (d.error)
			{
				xframe.alert("Fehler",d.error);
			}

			if (d.fullInfo)
			{

				var f = d.fullInfo;

				var fi = {
					wz_id: d.fullInfo.wz_id,
					f_filename: d.fullInfo.s_name,
					f_status: 'OK',
					f_image_infos: Ext.id()
				}

				me.grid.getStore().getById(r.fileHook).set(f);
			}


		}).bind('fileuploadprogress',function(e,r){

			var vId 		= r.fileHook;
			var progressInt = parseInt(r.loaded / r.total * 100, 10);
			var gr = me.grid.getStore().getById(vId);
			gr.set({f_upload:progressInt+"%"});

		}).bind('fileuploadsend',function(e,r){
		}).bind('fileuploadprogressall',function(e,data){

			var progressInt = parseInt(data.loaded / data.total * 100, 10);
			var progress 	= data.loaded / data.total;
			me.pAll.updateProgress(progress,'uploading ... ');

			if (progressInt == 100)
			{
				me.pAll.updateProgress(0,data.total + ' Bytes done....');
			}

		});


		this.grid.getStore().load();
	},


	makeLayoutImgGallery: function()
	{

		this.panelZone 	= 'panelZone_'+Ext.id();
		this.uId 		= 'fileUploader_'+Ext.id();
		this.uId_btn 	= 'fileUploader_btn_'+Ext.id();
		this.uploadUrl 	= "/xgo/xplugs/xredaktor/ajax/gui/img_gallery/upload";

		var html = '\
				    <form id="'+this.uId+'" action="'+this.uploadUrl+'" data-url="'+this.uploadUrl+'" method="POST" enctype="multipart/form-data">\
				        <div class="fileupload-buttonbar"  style="margin-top:-2px;">\
				                <span class="fileinput-button">\
				                    <div id="'+this.uId_btn+'"></div>\
				                    <input type="file" name="files" multiple>\
				                </span>\
				            </div>\
				    </form>';

		this.pAll = Ext.create('Ext.ProgressBar', {
			flex: 1,
			text: '[chrome] Pasten von Bildinhalten (nicht Files); linke Mause und Strg/Apfel-V'
		});

		console.info('thumb_w',this.thumb_w);
		
		var fields = [

		{name: 'wz_id', 				text:'ID', 				type:'string', width:50},
		{name: 'wz_id', 				text:'Image', 			type:'string', width: (this.thumb_w + 13),	renderer: this.render_image, scope: this},
		{name: 'f_image_infos',			text:'Image-Infos', 	type:'string', width:150,	renderer: this.render_image_infos, scope: this},

		{name: 'f_title', 				text:'Title', 			type:'string', flex:1, editor: {allowBlank: true, xtype: 'textareafield', height: 200, margin: '180 0 0 0'}},
		{name: 'f_alt', 				text:'Keywords', 		type:'string', flex:1, editor: {allowBlank: true, xtype: 'textareafield', height: 200, margin: '180 0 0 0'}},
		{name: 'f_description', 		text:'Description', 	type:'string', flex:1, editor: {allowBlank: true, xtype: 'textareafield', height: 200, margin: '180 0 0 0'}, renderer: this.pseudohtmlrenderer},
		{name: 'f_licence', 			text:'Lizenz',		 	type:'string', flex:1, editor: {allowBlank: true, xtype: 'textareafield', height: 200, margin: '180 0 0 0'}, renderer: this.pseudohtmlrenderer},

		{name: 'f_filename', 			text:'Filename', 		type:'string', flex:1, 		hidden: true},
		{name: 'f_status', 				text:'Status', 			type:'string', flex:1, 		hidden: true },
		{name: 'wz_s_id', 				text:'SID', 			type:'string', flex:1, 		hidden: true },
		{name: 'f_upload', 				text:'Upload',			type:'string', width: 50}

		];

		this.grid = xframe_pattern.getInstance().genGrid({

			toolbar_top:[{
				bodyStyle:{
				'background-color': '#ebebeb'
				},
				frame : false,
				border: false,
				id: this.panelZone,
				xtype: 'panel',
				html: html
			},{
				iconCls: 'xf_select',
				text: 'Archive',
				scope: this,
				handler: function() {

				}
			}],

			tbar: [this.pAll],

			filters: false,
			resizable: true,
			height: 500,
			search:true,
			forceFit:true,
			border:true,
			split: true,
			records_move:true,
			pager:true,
			title: this.label,
			plugin_numLines: true,
			button_add: false,
			button_del: true,

			xstore: {

				load: 			'/xgo/xplugs/xredaktor/ajax/gui/img_gallery/load',
				remove: 		'/xgo/xplugs/xredaktor/ajax/gui/img_gallery/remove',
				updateCheck: 	'/xgo/xplugs/xredaktor/ajax/gui/img_gallery/updateCheck',
				update: 		'/xgo/xplugs/xredaktor/ajax/gui/img_gallery/update',
				insert: 		'/xgo/xplugs/xredaktor/ajax/gui/img_gallery/insert',
				move: 			'/xgo/xplugs/xredaktor/ajax/gui/img_gallery/move',

				loadParams : {
					as_id: this.as_id,
					wz_id: this.wz_id
				},
				insertParams : {
					as_id : this.as_id,
					wz_id: this.wz_id
				},
				updateParams : {
					as_id : this.as_id,
					wz_id: this.wz_id
				},
				updateParamsByRecordValue : {
					checkId : 'checkId'
				},
				removeParams : {
					as_id : this.as_id,
					wz_id: this.wz_id
				},

				pid: 	'wz_id',
				fields: fields
			}
		});


		this.grid.on('afterrender',this.afterGridRendered,this,{buffer:1});
		this.add(this.grid);
	}


});