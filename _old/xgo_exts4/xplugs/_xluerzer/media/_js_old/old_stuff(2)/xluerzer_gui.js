var xluerzer_gui = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_gui";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xluerzer_gui_(config);
			}
			return instance;
		}

	}
})();

var xluerzer_gui_ = function(config) {
	this.config = config || {};
};

xluerzer_gui_.prototype = {
	
	searchCombo: function(cfg)
	{

		var model 	= Ext.id();
		var url 	= this.getAjaxPath('s_e_submissionSearchComboFor/'+cfg.searchScope);

		Ext.define(model, {
			extend: 'Ext.data.Model',
			proxy: {
				type: 'ajax',
				url : url,
				reader: {
					type: 'json',
					root: 'root',
					totalProperty: 'totalCount'
				}
			},

			fields: [
			{name: '_value', 	type: 'string'},
			{name: '_display',	type: 'string'}
			]

		});

		var pageSize = 10;

		var ds = Ext.create('Ext.data.Store', {
			pageSize: pageSize,
			model: model
		});

		return {
			minChars: cfg.minChars,
			fieldLabel: cfg.fieldLabel,
			name: cfg.name,
			emptyText: cfg.emptyText,
			xtype: 'combo',
			store: ds,
			cls: cfg.cls,
			flex: cfg.flex,

			displayField: '_display',
			valueField: '_value',

			typeAhead: true,
			hideTrigger: true,

			displayMsg: '{0} - {1} of {2}',
			//selectOnFocus: true,

			listConfig: {
				loadingText: 'searching...',
				emptyText: 'no matching records found.',
				getInnerTpl2: function() {
					return '<div class="search-item">' +
					'<h3><span>{[Ext.Date.format(values.lastPost, "M j, Y")]}<br />by {author}</span>{title}</h3>' +
					'{excerpt}' +
					'</div>';
				}
			},
			pageSize: pageSize,
			listeners: {
				select: function(combo, selection) {
					var post = selection[0];
					if (post) {

					}
				}
			}
		};

	},
	
	searchComboCrm: function(cfg)
	{

		var model 	= Ext.id();
		var url 	= this.getAjaxPath('e_crmSearchComboFor/'+cfg.searchScope);

		Ext.define(model, {
			extend: 'Ext.data.Model',
			proxy: {
				type: 'ajax',
				url : url,
				reader: {
					type: 'json',
					root: 'root',
					totalProperty: 'totalCount'
				}
			},

			fields: [
			{name: '_value', 	type: 'string'},
			{name: '_display',	type: 'string'}
			]

		});

		var pageSize = 10;

		var ds = Ext.create('Ext.data.Store', {
			pageSize: pageSize,
			model: model
		});

		return {
			minChars: cfg.minChars,
			fieldLabel: cfg.fieldLabel,
			name: cfg.name,
			emptyText: cfg.emptyText,
			xtype: 'combo',
			store: ds,

			displayField: '_display',
			valueField: '_value',

			typeAhead: true,
			hideTrigger: true,

			displayMsg: '{0} - {1} of {2}',
			//selectOnFocus: true,

			listConfig: {
				loadingText: 'searching...',
				emptyText: 'no matching records found.',
				getInnerTpl2: function() {
					return '<div class="search-item">' +
					'<h3><span>{[Ext.Date.format(values.lastPost, "M j, Y")]}<br />by {author}</span>{title}</h3>' +
					'{excerpt}' +
					'</div>';
				}
			},
			pageSize: pageSize,
			listeners: {
				select: function(combo, selection) {
					var post = selection[0];
					if (post) {

					}
				}
			}
		};

	},

	
	getDefaultTabPanel_sseo: function(cfg,tbar)
	{

		var prefix = cfg.prefix;
		
		var items_left = [
				
			{
				inputValue: 'Y',
				uncheckedValue: 'N',
				xtype: 'checkbox',
				name: prefix+'meta_keywords_auto',
				labelAlign: 'left',
				fieldLabel: 'Auto Meta Keywords'
			},
			{

				xtype: 'textareafield',
				name: prefix+'meta_keywords',
				fieldLabel: 'Meta Keywords',
				height: 100,
				margin: '0 0 40 0'
				
			},
			{
				inputValue: 'Y',
				uncheckedValue: 'N',
				xtype: 'checkbox',
				name: prefix+'meta_desc_auto',
				labelAlign: 'left',
				fieldLabel: 'Auto Meta Description'
			},
			{
				xtype: 'textareafield',
				height: 100,
				name: prefix+'meta_desc',
				fieldLabel: 'Meta Description',
				margin: '0 0 40 0'
			},
			{
				inputValue: 'Y',
				uncheckedValue: 'N',
				xtype: 'checkbox',
				name: prefix+'vu_auto',
				labelAlign: 'left',
				fieldLabel: 'Auto Vanity URL'
			},
			{
				xtype: 'textfield',
				name: prefix+'vu_url',
				fieldLabel: 'Vanity URL'
			}
		];
		
		
		var items_right = [

			{
				inputValue: 'Y',
				uncheckedValue: 'N',
				xtype: 'checkbox',
				labelAlign: 'left',
				name: prefix+'og_auto',
				fieldLabel: 'Auto Open Graph'
			},
			
			{
				xtype: 'textfield',
				name: prefix+'og_title',
				fieldLabel: 'Open Graph Title'
			},
			{
				xtype: 'textareafield',
				height: 100,
				name: prefix+'og_description',
				fieldLabel: 'Open Graph Description'
			},
			{
				xtype: 'textfield',
				name: prefix+'og_url',
				fieldLabel: 'Open Graph URL'
			},
			{
				xtype: 'textfield',
				name: prefix+'og_site_name',
				fieldLabel: 'Open Graph Sitename'
			},
			
			{
				xtype: 'xr_field_file',
				name: prefix+'og_image',
				fieldLabel: 'Open Graph Image'
			},

		];
		
		
		
		
		var gui = Ext.widget({
			title: 'Social & SEO',
			xtype: 'form',
			cls: 'innen-content',
			tbar: tbar,
			items: [

				{
				xtype: 'fieldcontainer',
				layout: 'hbox',
				width: '100%',
				forceFit: true,
				defaultType: 'textfield',
				fieldDefaults: {
					labelAlign: 'top',
					msgTarget: 'side',
					width: 200
				},

				items: [

					{
						xtype: 'container',
						width: 300,
						items: items_left
					},
					{
						xtype: 'splitter',
						width: 20,
					},
					{
						xtype: 'container',
						flex: 1,
						items: items_right
					},
				]
				}
			]
		});
		return gui;
	},


	getDefaultTabPanel_log: function(cfg,id)
	{
		var scopex = 'oe_log';
		var prefix = cfg.prefix;

		var fields = [
		{name: 'al_id',						text:'ID',		type:'int'},
		{name: 'al_ip',						text:'IP',		type:'string'},
		{name: 'al_host',					text:'HOST',	type:'string'},
		{name: 'al_action',					text:'ACTION',	type:'string'},
		{name: 'al_created_ts',				text:'TS',		type:'string'},
		{name: 'al_backend_user_id_human',	text:'USER',	type:'string'},
		{name: 'al_mods',					text:'CHANGE',	type:'string'},
		];

		var gui = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			title: 'Log',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: true,
			editor: true,
			pager: true,
			xstore: {
				params: {
					scopex_r_id: id,
					scopex: cfg.scopex
				},
				initSort: '[{"property":"al_id","direction":"DESC"}]',
				load: 	this.getAjaxPath(scopex+'/load'),
				update: this.getAjaxPath(scopex+'/update'),
				insert: this.getAjaxPath(scopex+'/insert'),
				move: 	this.getAjaxPath(scopex+'/move'),
				remove:	this.getAjaxPath(scopex+'/remove'),
				pid: 	'al_id',
				fields: fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
				},
			}
		});

		gui.on('afterrender',function() {
			gui.getStore().load();
		},this);


		return gui;
	},

	getDefaultTabPanel_preview: function(cfg,id)
	{
		var idx = Ext.id();
		var gui = Ext.widget({
			title: 'Preview',
			xtype: 'panel',
			layout: 'fit',
			tbar: [{
				iconCls: 'xf_reload',
				text: 'RELOAD PREVIEW',
				scope: this,
				handler: function() {
					console.info(idx);
					console.info($$('#'+idx));
					$$('#'+idx)[0].src = $$('#'+idx)[0].src;
				}
			}],
			items:[{
				id: idx,
				xtype : "component",
				autoEl : {
					tag : "iframe",
					src : "/xgo/xplugs/xluerzer/ajax/misc_render/"+cfg.at_id+"/"+id
				}
			}]
		});
		return gui;
	},



	getDefaultTabPanel_gallery: function(cfg,idx)
	{
		var scopex			= cfg.scopex;
		var prefix 			= cfg.prefix;
		var currentDir 		= 618527;
		var getStorageId 	= 1;


		var uId 		= 'fileUploader_'+Ext.id();
		var uploadUrl 	= "/xgo/xplugs/xredaktor/ajax/storage/file-upload";

		var html = '\
				    <form id="'+uId+'" action="'+uploadUrl+'" data-url="'+uploadUrl+'" method="POST" enctype="multipart/form-data">\
				        <div class="fileupload-buttonbar xr_fullUploader">\
				                <span class="fileinput-button">\
				                    <div class="xr_fullUploader_icon">&#128228;</div>\
				                    <span style="margin-left:38px;">UPLOAD / DROP / PASTE</span>\
				                    <input type="file" name="files[]" multiple>\
				                </span>\
				            </div>\
				    </form>';

		var pAll = Ext.create('Ext.ProgressBar', {
			flex: 1
		});


		var showImg = function(value)
		{
			if ((value !== 'undefined') && (value != 0)) {
				return "<img width=120 height=40 src='/xgo/xplugs/xluerzer/ajax/oe_media/titleImg/"+value+"'>";
			}
			else {
				return "";
				return "<img width=120 height=40 src='/xgo/xplugs/xluerzer/ajax/oe_media/titleImg/default.png'>";
			}
		}

		var uploadData = [];
		var uploadGridInfo = xframe_pattern.getInstance().genMatrix({
			region: 'center',
			height:300,
			collapseMode:'mini',
			data: uploadData,
			tools: false,
			records_move: false,
			plugin_numLines: true,
			records2array:true,
			autoDestroyStore:false,
			button_add: false,
			button_del: true,
			button_save: false,
			tbar: [pAll],
			xstore: {
				pid: 	'f_id',
				fields: [
				{name: 'f_image_id', 			text:'Bild', 			type:'string', width:140, renderer: showImg},

				{name: 'f_title', 				text:'Titel', 			type:'string', flex:1, editor: {allowBlank: false, xtype: 'textfield'}},
				{name: 'f_alt', 				text:'Keywords', 		type:'string', flex:1, editor: {allowBlank: false, xtype: 'textareafield'}},
				{name: 'f_description', 		text:'Description', 	type:'string', flex:1, editor: {allowBlank: false, xtype: 'textareafield'}},

				{name: 'f_loaded', 				text:'Loaded', 			type:'string', width:100, 	hidden: true},

				{name: 'f_time', 				text:'Zeitpunkt', 		type:'string', width:100, 	hidden: true},
				{name: 'f_filename', 			text:'Lokal', 			type:'string', flex:1, 		hidden: true},
				{name: 'f_filenameRemote', 		text:'Server', 			type:'string', flex:1, 		hidden: true },
				{name: 'f_percent', 			text:'Upload',			type:'string', width: 50,	scope:this}
				]
			}
		});


		uploadGridInfo.getStore().on('remove',function(s,r) {
			var s_id = r.data.f_image_id;
			xframe.ajax({
				scope: this,
				url: '/xgo/xplugs/xluerzer/ajax/oe_gallery/removeFile',
				params: {
					scopex: scopex,
					scopex_r_id: idx,
					s_id: s_id
				},
				stateless: function(succ,json){
					if (!succ) return;
				}
			});
		},this);

		uploadGridInfo.on('edit', function(grid,action)
		{
			var params = {};

			params.id = action.record.data.f_image_id;
			params.idProperty = action.record.idProperty;
			params.field = action.field;
			params.value = action.value;
			params.originalValue = action.originalValue;
			params.lang = 'EN';
			//if (params.value == params.originalValue) return;

			console.info(params);

			xframe.ajax({
				scope: this,
				url: '/xgo/xplugs/xluerzer/ajax/oe_gallery/setFileInfos',
				params: params,
				stateless: function(succ,json){
					if (!succ) return;
				}
			});

		});

		var loadInfos 	= false;
		var img_gallery = [];

		uploadGridInfo.on('afterrender',function(){
			if (!loadInfos) return;
			if (img_gallery.length == 0) return;

			uploadGridInfo.mask('Lade Gallery Data ...');
			var s_ids = Ext.encode(img_gallery);

			xframe.ajax({
				scope: this,
				url: '/xgo/xplugs/xluerzer/ajax/oe_gallery/getFileInfos',
				params: {
					s_ids: s_ids
				},
				stateless: function(success, json) {
					uploadGridInfo.unmask();
					if (!success) return;

					Ext.iterate(json.infos,function(k, f){

						var r = uploadGridInfo.getStore().getById(k);

						var s_alts		= Ext.decode(f.s_alts,true);
						var s_titles	= Ext.decode(f.s_titles,true);
						var s_descs		= Ext.decode(f.s_descs,true);

						if (!s_titles) 	s_titles 	= {};
						if (!s_alts) 	s_alts 		= {};
						if (!s_descs) 	s_descs 	= {};

						if (!s_titles['EN']) 	s_titles['EN'] = "";
						if (!s_alts['EN']) 		s_alts['EN'] = "";
						if (!s_descs['EN']) 	s_descs['EN'] = "";

						var f_title = s_titles['EN'];
						var f_alt 	= s_alts['EN'];
						var f_desc 	= s_descs['EN'];

						
						r.set('f_title',		f_title);
						r.set('f_alt',			f_alt);
						r.set('f_description',	f_desc);

					},this);



				}
			});

		},this);

		var getValues = function()
		{

		}

		var setValues = function(jsonData)
		{
			uploadGridInfo.getStore().removeAll();
			img_gallery = Ext.decode(jsonData[prefix+'img_gallery'],true);

			Ext.each(img_gallery,function(s_id){
				loadInfos = true;
				var vId = Ext.id();
				uploadGridInfo.getStore().add({
					f_loaded: 'Y',
					f_id: s_id,
					f_image_id: s_id
				});
			},this);
		}

		fileUploaded = function(fileHook,s_id,r)
		{
			r.set({
				f_percent: 'DONE.',
				f_image_id: ''+s_id
			});

			xframe.ajax({
				scope:this,
				url: '/xgo/xplugs/xluerzer/ajax/oe_gallery/append',
				params: {
					scopex: scopex,
					scopex_r_id: idx,
					s_id: s_id
				},
				stateless: function(succ,json) {
					if (!succ) return;
				},
				failure: function() {
				}
			});


		}

		$ = $$;

		var panelZone = 'panelZone_'+Ext.id();
		var me = this;

		//this.findANotUsedName

		this.addFileRecord = function(e, r, f_filename) {
			var date = new Date();
			var str = date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds() + " "+ date.getDate() + "." + date.getMonth() + "." + date.getFullYear();
			var vId = Ext.id();

			uploadGridInfo.getStore().add({
				f_id: vId,
				f_time: str,
				f_filename: f_filename,
				f_filenameRemote: f_filename,
				f_percent: 0
			});

			r.fileHook = ''+vId;
			r.currentDir = ''+currentDir;
			r.url = uploadUrl+'?s_id='+currentDir+'&s_storage_scope='+getStorageId+'&autoRename=1';
		}

		var uploadRegistered = {};

		var gui = Ext.widget({
			xtype: 'panel',
			region: 'south',
			layout: 'border',

			height: 600,
			split: true,

			title: 'Gallery',

			items: [{
				id: panelZone,
				xtype: 'panel',
				region: 'north',
				html: html,
				height: 47
			},uploadGridInfo],



			listeners: {
				scope:this,
				buffer:10,
				afterrender: function() {

					var pasteDragZone = Ext.get(panelZone);

					$$('#'+uId).fileupload({
						url: uploadUrl,
						dataType: 'json',
						pasteZone: pasteDragZone.dom,
						dropZone: pasteDragZone.dom,
						autoUpload: false
					}).bind('fileuploadadd',function (e, r) {

						var f_filename = r.files[0].name;
						if (typeof f_filename == 'undefined')
						{
							var f_type = r.files[0].type;

							Ext.MessageBox.prompt('Filename', 'without the extension('+f_type+'):', function(s,name){
								if (s != 'ok') return;
								f_filename = name +'.'+ f_type.split('/')[1];
								me.addFileRecord(e, r, f_filename);
							});
						} else
						{
							me.addFileRecord(e, r, f_filename);
						}

					}).bind('fileuploadalways',function (e, data) {

						var d = Ext.decode(data.jqXHR.responseText,true);
						if (!d) return;
						if ((d.s_id) && (!uploadRegistered[d.s_id])) {
							uploadRegistered[d.s_id] = true;

							var gr = uploadGridInfo.getStore().getById(data.fileHook);
							fileUploaded(data.fileHook,d.s_id,gr);
						}

					}).bind('fileuploadprogress',function(e,r){

						var vId 		= r.fileHook;
						var progressInt = parseInt(r.loaded / r.total * 100, 10);
						var gr = uploadGridInfo.getStore().getById(vId);
						gr.set({f_percent:progressInt+'%'});

					}).bind('fileuploadsend',function(e,r){
					}).bind('fileuploadprogressall',function(e,data){

						var progressInt = parseInt(data.loaded / data.total * 100, 10);
						var progress 	= data.loaded / data.total;
						pAll.updateProgress(progress,'uploading ... ');
						if (progressInt == 100)
						{
							pAll.updateProgress(0,'done.');
						}

					});

				}
			}
		});

		gui.setValues = setValues;

		return gui;
	},

	getAjaxPath : function(suffix)
	{
		return xluerzer.getInstance().getAjaxPath(suffix);
	},

	defaultAction: function(cfg) {

		var ret = {
			iconCls: '',
			text: cfg.cfg_grid.text,
			handler: function() {
				xluerzer.getInstance().showContent(this.defaultSearcher(cfg.cfg_grid,cfg.cfg_record));
			},
			scope: this
		}

		return ret;
	},

	renderer_kickHtml: function(value)
	{
		value = "<div>"+value+"<div>";
		return $$(value).text();
	},

	defaultSearcher: function(cfg,recordDetail) {

		var fields = [
		{name: cfg.pid,	text:'ID',	type:'int', width: 50}
		];


		Ext.each(cfg.fields,function(item){

			if (Ext.isObject(item)) {

				switch(item.type)
				{
					case 'image':
					item.type = "string";
					break;
					default:
					item.type = "string";
				}

				if (typeof item.flex == 'undefined')
				{
					item.flex = 1;
				}

				fields.push(item);
			} else {
				//fields.push({name: item, text: item,	type: 'string'});
			}

		},this);

		Ext.each(fields,function(d){
			if (d.kickHtml)
			{
				d.renderer  = this.renderer_kickHtml;
			}
		},this);

		var scopex 	= cfg.scopex;
		var gui 	= xframe_pattern.getInstance().genGrid({

			region:'center',
			forceFit:true,
			border:false,
			title: 'Overview '+ cfg.text,
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			search: true,
			editor: true,
			pager: true,
			xstore: {
				initSort: cfg.initSort,
				load: 	this.getAjaxPath(scopex+'/load'),
				update: this.getAjaxPath(scopex+'/update'),
				insert: this.getAjaxPath(scopex+'/insert'),
				move: 	this.getAjaxPath(scopex+'/move'),
				remove:	this.getAjaxPath(scopex+'/remove'),
				pid: 	cfg.pid,
				fields: fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					if (!recordDetail.handler) return;

					if (recordDetail.handler && recordDetail.scope) {
						recordDetail.handler.call(recordDetail.scope,record,recordDetail);
					} else {
						console.info("cfg_record is not configured correctly ...");
					}
				},
			}
		});

		gui.on('afterrender',function(){
			scope: this,
			gui.getStore().load({
				callback: function(records, operation, success) {
					// color change depending on status (jquery)
					$$('.pending').closest('tr').find('td').each (function() {
						$$(this).addClass('pendingClass');
					});

					$$('.draft').closest('tr').find('td').each (function() {
						$$(this).addClass('draftClass');
					});

				}
			});

		},this);

		return gui;
	},


	/*

	######################
	######################
	######################
	######################
	######################
	######################
	######################
	######################
	######################
	######################
	######################
	######################


	*/


	chooseImageField: function(cfg) {

		var label;

		if (typeof cfg !== 'undefined') {
			if (typeof cfg.fieldLabel !== 'undefined') {
				label = cfg.fieldLabel;
			}
			else {
				label = 'Image';
			}
			if (typeof cfg.name !== 'undefined') {
				name = cfg.name;
			}
			else {
				name = 'imagetest';
			}
		}

		return {
			emptyText: 'please choose image...',
			xtype: 'xr_field_file',
			fieldLabel: label,
			cls: 'imageContainerBox',
			name: name
		};
	},


	setLinkField: function(cfg) {

		if (typeof cfg !== 'undefined') {
			if (typeof cfg.name !== 'undefined') {
				name = cfg.name;
			}
			else {
				name = 'url';
			}
		}

		return {
			xtype: 'textfield',
			name: name,
			emptyText: 'http://',
			fieldLabel: 'Link',
			width: '100%'
		};
	},


	setStateField: function(cfg) {

		if (typeof cfg !== 'undefined') {
			if (typeof cfg.name !== 'undefined') {
				name = cfg.name;
			}
			else {
				name = 'state';
			}
		}

		return this.simplyCombo({
			fieldLabel: 'State',
			name: name,
			value: '',
			data: [{k:'',v:''},{k:'1',v:'Published'},{k:'2',v:'Pending Review'}, {k:'3',v:'Draft'}]
		});
	},


	shortDescriptionField: function(cfg) {

		if (typeof cfg !== 'undefined') {
			if (typeof cfg.name !== 'undefined') {
				name = cfg.name;
			}
			else {
				name = 'desc_short';
			}
		}

		return {
			xtype:'xr_field_html',
			name: name,
			fieldLabel: 'Short Description',

			height: 150
		};
	},


	longDescriptionField: function(cfg) {

		if (typeof cfg !== 'undefined') {
			if (typeof cfg.name !== 'undefined') {
				name = cfg.name;
			}
			else {
				name = 'desc_long';
			}
		}

		return {
			xtype:'xr_field_html',
			name: name,
			fieldLabel: 'Long Description',
			width: '100%'
		};
	},


	setNameField: function(cfg) {

		return {
			xtype: 'textfield',
			name: 'name',
			emptyText: '',
			fieldLabel: 'Name',
			width: 150
		};
	},


	publishStartField: function(cfg) {

		if (typeof cfg !== 'undefined') {
			if (typeof cfg.name !== 'undefined') {
				name = cfg.name;
			}
			else {
				name = 'date_start';
			}
		}

		return {
			xtype: 'datefield',
			emptyText: 'Pick date ...',
			fieldLabel: 'Publish Start',
			name: name
		};
	},


	publishEndField: function(cfg) {

		if (typeof cfg !== 'undefined') {
			if (typeof cfg.name !== 'undefined') {
				name = cfg.name;
			}
			else {
				name = 'date_end';
			}
		}

		return {
			xtype: 'datefield',
			emptyText: 'Pick date ...',
			fieldLabel: 'Publish End',
			name: name,
		};
	},


	keywordsField: function(cfg) {

		if (typeof cfg !== 'undefined') {
			if (typeof cfg.name !== 'undefined') {
				name = cfg.name;
			}
			else {
				name = 'keywords';
			}
		}

		return {
			xtype: 'textarea',
			fieldLabel: 'Keywords',
			name: name,
			width: 150
		};

	},


	titleField: function(cfg) {

		if (typeof cfg !== 'undefined') {
			if (typeof cfg.name !== 'undefined') {
				name = cfg.name;
			}
			else {
				name = 'date_end';
			}
			if (typeof cfg.name_keywords !== 'undefined') {
				name_keywords = cfg.name_keywords;
			}
			else {
				name_keywords = 'keywords';
				console.log ("kw undefined");
			}
		}

		return {
			xtype: 'fieldcontainer',
			layout: 'hbox',
			width: '100%',
			forceFit: true,
			defaultType: 'textfield',

			items: [

			{
				name: name,
				fieldLabel: 'Title',
				flex: 1,
			},
			{
				xtype: 'splitter',
				width: 20,
			},
			{
				xtype: 'textareafield',
				fieldLabel: 'Keywords',
				name: name_keywords,
				flex: 1,
			}

			]
		};
	},


	html2Field: function(cfg) {

		if (typeof cfg !== 'undefined') {
			if (typeof cfg.name_left !== 'undefined') {
				name_left = cfg.name_left;
			}
			else {
				name_left = 'col_left';
			}
			if (typeof cfg.name_right !== 'undefined') {
				name_right = cfg.name_right;
			}
			else {
				name_right = 'col_right';
			}
		}

		return {
			xtype: 'fieldcontainer',
			layout: 'column',
			width: '100%',
			items: [{
				xtype:'xr_field_html',
				cls: 'htmlEditor',
				columnWidth: 0.5,
				fieldLabel: 'Left',
				name: name_left,
			},{
				xtype: 'splitter',
				width:20
			},{
				xtype:'xr_field_html',
				cls: 'htmlEditor',
				columnWidth: 0.5,
				fieldLabel: 'Right',
				name: name_right
			}]
		};
	},


	textFieldPlus: function(cfg) {

		return {
			xtype: 'fieldcontainer',
			fieldLabel: cfg.fieldLabel,
			layout: 'column',
			forceFit: true,
			width: '96%',
			forceFit: true,
			defaultType: 'textfield',
			items: [

			{
				cls: cfg.cls,
				name: cfg.name,
				/* TODO chrome margin?
				* width?
				*/
				margin: '0, 0, 0, 3'
			},

			{
				xtype: 'button',
				iconCls: cfg.iconCls,
				text: cfg.buttonText,
				width: cfg.buttonWidth,
				listeners: {
					scope: this,
					click: function() {
						this.ìnsertAfterThis();
					}
				}
			},

			]
		};

	},

	simplyCombo: function(cfg) {

		var ds = Ext.create('Ext.data.Store', {
			fields: ['k', 'v'],
			data : cfg.data
		});

		return {
			value: cfg.value,
			xtype: 'combo',
			width: cfg.width,
			fieldLabel: cfg.fieldLabel,
			name: cfg.name,
			store: ds,
			queryMode: 'local',
			displayField: 'v',
			valueField: 'k',
			listeners: cfg.listeners,
			multiSelect: cfg.multiSelect
			//selectOnFocus: true
		};

	},


}