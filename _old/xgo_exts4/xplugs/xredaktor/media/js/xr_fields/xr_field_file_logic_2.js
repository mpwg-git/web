Ext.define('Ext.xr.field_file_logic_2', {
	extend: 'Ext.form.FieldContainer',
	alias: 'widget.field_file_logic_2',

	config: {
		fieldLabel: 'File',
		labelWidth: 100,
		width: 300
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
		return this.hiddenX.getValue();
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

		var me 			= this;
		this.imgId 		= Ext.id();
		this.imgInfo 	= Ext.id();


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



		this.add({
			xtype: 'fieldcontainer',
			width: 400,
			minWidth: 400,
			// The body area will contain three text fields, arranged
			// horizontally, separated by draggable splitters.
			layout: 'vbox',
			listeners: {
				scope: this,
				buffer: 1,
				afterrender: function()
				{


					Ext.widget({
						xtype: 'button',
						iconCls: 'xf_select',
						renderTo: uId_btn,
						text: 'Upload'
					});

					$$('#'+uId).fileupload({
						dataType: 'json',
						autoUpload: false,
						add: function (e, data) {

							var fn_scope 	= me.rawConfig.scope;
							var fn 			= me.rawConfig.getUploadUrl;

							var url = fn.call(fn_scope);
							console.info("Upload",url);

							if (!url)
							{
								return;
							}
							
							$$('#'+uId).attr('action',url);
							$$('#'+uId).fileupload(
							'option',
							'url',
							url
							);
							data.submit();
						}
					}).bind('fileuploadadd',function (e, r) {
					}).bind('fileuploadalways',function (e, data) {


						var info = Ext.decode(data.jqXHR.responseText,true);

						var fn_scope 	= me.rawConfig.scope;
						var fn 			= me.rawConfig.uploadDone;

						if (typeof fn == 'function')
						{
							var url = fn.call(fn_scope,info);
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
				hidden: true,
				xtype: 'panel',
				border: false,
				width: 170,
				height: 170,
				html: '<div><div class="FA_SELECTOR_imgHolder"><img id="'+me.imgId+'" src="" width="150px" height="150px"></div></div>'
			}, {
				xtype: 'text',
				height: 5
			}, pAll,eInfos,{
				xtype: 'text',
				height: 5
			}, {
				hidden: true,
				id: me.imgInfo,
				border: false,
				xtype: 'panel',
				html: '<div></div>',
				flex: 1
			}, {
				xtype: 'text',
				height: 5
			}, {
				border: false,
				xtype: 'panel',
				//height: 200,
				width: 400,
				layout: 'hbox',
				flex: 1,
				items: [
				{
					xtype: 'box',
					autoEl: {
						tag: 'div',
						html: html
					}
				}

				]

			}]
		});

	},


	delFile: function() {
		this.hiddenX.setValue(0);
		this.showImageX();
	},

	showImageX: function() {

		var s_id = this.hiddenX.getValue();

		if (s_id == "") s_id = 0;
		if (s_id == 0) 	s_id = "";

		var url = '/xgo/xplugs/xredaktor/ajax/storage/scaleBoxed/'+s_id+'/150/150';

		try{
			Ext.get(this.imgId).dom.setAttribute('src',url);
			Ext.getCmp(this.imgInfo).update("ID:"+s_id);
		} catch (e) {

			this.on('afterrender',function(){
				Ext.get(this.imgId).dom.setAttribute('src',url);
				Ext.getCmp(this.imgInfo).update("ID:"+s_id);
			},this,{buffer:10})

		}
	},

	chooseFile: function() {


		/*
		if (!this.showDia)
		{
		var me 	= this;
		var win = false;

		var width 	= window.innerWidth*0.9;
		var height 	=  window.innerHeight*0.9;

		if (this.latestSaved ==-1)
		{
		this.latestSaved = this.rawConfig.value;
		}

		var panel = xredaktor_storage.getInstance().getMainPanel({
		s_storage_scope: xredaktor.getInstance().getCurrentBasicStorage(),
		site_id: xredaktor.getInstance().getCurrentSiteId(),
		width: width,
		height: height,
		mode: 'window',
		preSelect: me.rawConfig.value,
		latestSaved : me.latestSaved,
		win: win,
		scope:this,
		handler:function(data)
		{
		if (!Ext.isNumeric(data.s_id)) data.s_id = '';
		var s_id = data.s_id;

		this.hiddenX.setValue(s_id);
		this.showImageX();

		setTimeout(function(){
		win.hide();
		},10);
		}
		});

		win = Ext.create('widget.window', {
		border:false,
		title: 'Filearchiv',
		modal: true,
		closable: true,
		width: width,
		height: height,
		layout: 'border',
		items: [panel]
		});

		this.showDia = win;
		}

		this.showDia.show();

		*/

		var me = this;
		if (!this.xstorage) this.xstorage = xredaktor_storage.getInstance();

		this.latestSaved = this.rawConfig.value;

		this.xstorage.showFileDialog({
			s_storage_scope: xredaktor.getInstance().getCurrentBasicStorage(),
			site_id: xredaktor.getInstance().getCurrentSiteId(),
			preSelect: me.rawConfig.value,
			latestSaved : me.latestSaved,
			scope:this,
			callBack:function(datax)
			{
				var data = datax[0].data;
				if (!Ext.isNumeric(data.s_id)) data.s_id = '';
				var s_id = data.s_id;

				me.rawConfig.value = s_id;
				this.hiddenX.setValue(s_id);
				this.showImageX();
			}
		});


	}




});
