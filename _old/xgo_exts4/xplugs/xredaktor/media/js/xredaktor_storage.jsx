Ext.define('Ext.org.ImageView', {
	extend: 'Ext.view.View',
	alias : 'widget.imageview',
	requires: ['Ext.data.Store'],
	mixins: {
		dragSelector: 'Ext.ux.DataView.DragSelector',
		draggable   : 'Ext.ux.DataView.Draggable'
	},
	initComponent: function() {
		this.mixins.dragSelector.init(this);
		this.callParent();
	}
});

var xredaktor_storage = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			//if (instance == null) {
			instance = new xredaktor_storage_(config);
			//}
			return instance;
		}
	}
})();

var xredaktor_storage_ = function(config) {
	this.config = config || {};
};

xredaktor_storage_.prototype = {


	getStore : function(s_storage_scope) {

		if (typeof s_storage_scope == "undefined") s_storage_scope = xredaktor.getInstance().getCurrentBasicStorage();
		
		var store = xframe.getStoreByConfig({
			rootTextName: 'Storage',
			fields: [
			{name: 's_name',	type:'string', folder: true},
			{name: 's_id',		type:'int'},
			{name: 's_lastmod',	type:'string'},
			{name: 's_dir',		type:'string'}
			],
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/storage/load',
				update: '/xgo/xplugs/xredaktor/ajax/storage/update',
				insert: '/xgo/xplugs/xredaktor/ajax/storage/insert',
				move: 	'/xgo/xplugs/xredaktor/ajax/storage/move',
				loadParams : {
					s_storage_scope : s_storage_scope
				},
				insertParams : {
					s_storage_scope : s_storage_scope
				},
				pid: 		's_id',
				nameField:	's_name'
			}
		});

		//store.load();
		return store;
	},

	syncDir : function(store,s_id,callBack)
	{
		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/storage/syncDir',
			params: {
				s_id: s_id,
				s_storage_scope:this.cfg.s_storage_scope
			},
			success: function() {
				store.load();
				try{callBack();}catch(e){}
			},
			failure: function() {
				store.load();
			}
		});
	},

	processDelFiles : function(view)
	{

		var ids = [];
		var rs = view.getSelectionModel( ).getSelection( );
		Ext.each(rs,function(r){
			ids.push(r.data.s_id);
		},this);

		xframe.ajax({
			url: '/xgo/xplugs/xredaktor/ajax/storage/delFiles',
			params: {
				s_ids: ids.join(',')
			},
			success: function(json) {

				if (json.files_used.length > 0)
				{
					var txt = [];
					Ext.each(json.files_used,function(s){
						txt.push(s.s_name+' ist bereits in Verwendung.');
					},this);
					xframe.alert('Folgende Datein können nicht gelöscht werden:',txt.join('<br>'));
				}

				view.getStore().load();
			},
			failure: function() {
				view.getStore().load();
			}
		});


	},

	processZipFiles : function(view)
	{

		var ids = [];
		var rs = view.getSelectionModel( ).getSelection( );
		Ext.each(rs,function(r){
			ids.push(r.data.s_id);
		},this);


		window.open('/xgo/xplugs/xredaktor/ajax/storage/zipFiles?ids='+ids.join(','));

	},

	getCurrentView : function()
	{
		return (this.showGrid) ? this.gridView : this.view;
	},

	processDelDir : function(store,s_id,reloadMeFunc)
	{
		var me=this;
		this.view.setDisabled(true);
		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/storage/delDir',
			params: {
				s_id: s_id
			},

			success: function(json) {
				try{
					this.view.setDisabled(false);
					if (json.files_used.length > 0)
					{
						var txt = [];
						Ext.each(json.files_used,function(s){
							var usage = [];

							Ext.each(s.f.whereInUsage,function(u) {
								usage.push(me.renderType(u.su_type) + ': '+u.su_p_id+' - '+ me.renderLangTag(u.su_langtag));
							},this);

							txt.push('<tr valign="top"><td><b>'+s.f.hname+'</b></td><td>&nbsp;&nbsp;</td><td>'+usage.join('<br>')+"</td></tr>");
						},this);
						xframe.alert('Verzeichnis kann nicht gelöscht werden','Folgende Datein sind bereits in Verwendung:<br><br><table>'+txt.join('')+"</table>");
					}
					else
					{
						try{reloadMeFunc();}catch(e){}
					}
				} catch (e) {console.info(e)}
			},
			failure: function() {
				this.view.setDisabled(false);
				store.load();
			}
		});
	},


	actionFileTypeVideo : function(r)
	{
		var me = this;
		var dummyId = Ext.id();
		var dummyPanel = Ext.create('Ext.Panel',{
			layout:'fit',
			html:'<a href="'+r.data.webSrc+'" id="insertVideo_'+dummyId+'" style="display:block;width:100%;height:100%;"></a>'
		});
		var win = xframe.win({
			modal:true,
			scope:this,
			title:'Videoansicht',
			items:[dummyPanel],
			resizable:false,
			listeners:{
				afterrender: function() {
					console.info('dddd');
					var path = xframe.getPath()+'/libs/flowplayer';
					try{
						flowplayer("insertVideo_"+dummyId, path+"/flowplayer-3.2.7.swf",{
							scaling:'fit'
						});
					} catch (e)
					{
						console.info(e);
					}
				}
			}
		});
		win.show();
	},

	handleFileTypes : function(r)
	{
		switch (r.data.s_mimeType)
		{
			case 'video/x-flv':
			break;
			default:return;
		}
	},

	getDefaultWidth: function()
	{
		return 76;
	},

	getDefaultHeight: function()
	{
		return 76;
	},

	getViewPanel : function(cfg)
	{
		var me = this;
		this.store = Ext.create('Ext.data.Store', {
			autoLoad: false,
			fields: ['s_id','webSrc', 's_name', 'scaleSrc','s_mimeType','s_media_h','s_media_w','s_fileSizeBytes','s_fileSizeBytesHuman', {name: 'leaf', defaultValue: false}, {name: 's_dir', defaultValue: 'N'}],
			proxy: {
				type: 'ajax',
				url : '/xgo/xplugs/xredaktor/ajax/storage/loadFiles',
				reader: {
					type: 'json',
					root: ''
				}
			},
			listeners: {
				beforeload: function(store, operation){
				}
			}
		});

		this.store.on('update',function(store,r) {

			var s_id 	= r.data.s_id;
			var s_name 	= r.data.s_name;

			xframe.ajax({
				url: '/xgo/xplugs/xredaktor/ajax/storage/updateName',
				params: {
					s_id: 	s_id,
					s_name: s_name
				},
				success: function() {
					store.load();
				},
				failure: function() {
					store.load();
				}
			});

		},this);

		this.store.proxy.extraParams = {
			s_id: 0,
			s_storage_scope: cfg.s_storage_scope
		};
		this.store.load();

		var w = this.getDefaultWidth();
		var h = this.getDefaultHeight();

		var imageTpl = new Ext.XTemplate([
		'<tpl for=".">',
		'<div class="thumb-wrap">',
		'<div class="thumb" id="flyIdOfFile_{s_id}">',
		(!Ext.isIE6? '<img src="{scaleSrc}/'+w+'/'+h+'" style="width:'+w+'px;height:'+h+'px" title="SID: {s_id}"/>' :
		'<div title="SID: {s_id}" style="width:'+w+'px;height:'+h+'px;filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'{scaleSrc}/'+w+'/'+h+'\')"></div>'),
		'</div>',
		'<span class="x-editable">{shortName}</span>',
		'</div>',
		'</tpl>']);

		var ghostTpl = [
		'<tpl for=".">',
		'<img src="{scaleSrc}/'+w+'/'+h+'" />',
		'<tpl if="xindex % 4 == 0"><br /></tpl>',
		'</tpl>',
		'<div class="count">',
		'{[values.length]} files selected',
		'<div>'
		];
		
		
		var flvId = Ext.id();

		var menu = Ext.create('Ext.menu.Menu', {
			style: {
				overflow: 'visible'
			},
			items: [{
				iconCls:'xf_zip',
				//id:'zipAndDownload',
				text:'Zippen und Downloaden',
				scope:this,
				handler:function(){
					this.processZipFiles(this.getCurrentView());
				}
			},{
				iconCls:'xf_del',
				text: 'Löschen',
				scope: this,
				handler: function() {
					xframe.yn({
						title:'Löschen',
						msg: 'Wollen sie wirklich die selektierten Datein löschen?',
						scope:this,
						handler: function(btn)
						{
							if (btn != 'yes') return;
							this.processDelFiles(this.getCurrentView());
						}
					});
				}
			},'-',{
				iconCls:'xf_play',
				disabled:true,
				id:flvId,
				text:'Video Abspielen',
				scope: this,
				handler:function(){
					this.actionFileTypeVideo(menu.latestRecord);
				}
			}]
		});

		var zipBtn = Ext.id();
		var delBtn = Ext.id();
		var ddGroup = this.ddGroup;

		var view = Ext.create('Ext.org.ImageView', {
			store: this.store,
			tpl: imageTpl,
			trackOver: true,
			multiSelect: true,
			emptyText: '<div class="empty_storage_dir">Keine Files verfügbar</div>',
			cls: 'x-image-view',
			overItemCls: 'x-item-over',
			itemSelector: 'div.thumb-wrap',
			autoScroll: true,
			plugins: [
			Ext.create('Ext.ux.DataView.LabelEditor', {dataIndex: 's_name'})
			],
			prepareData: function(data) {
				Ext.apply(data, {
					shortName: Ext.util.Format.ellipsis(data.s_name, 15)
				});
				return data;
			},
			listeners: {

				selectionchange: function(dv, nodes ){
					var l = nodes.length;
					Ext.getCmp(zipBtn).setDisabled(l==0);
					Ext.getCmp(delBtn).setDisabled(l==0);
				},
				itemcontextmenu : function(Ext_view_View, record,item,index,e,options)
				{
					view.select(record,true);
					menu.latestRecord = record;
					menu.setPosition(e.xy[0],e.xy[1]);

					Ext.getCmp(flvId).setDisabled(true);
					switch(record.data.s_mimeType)
					{
						case 'video/x-flv':
						Ext.getCmp(flvId).setDisabled(false);
						break;
					}

					menu.show();
					e.stopEvent();
				}
			}
		});

		view.store.on('load',function(s,records){
			Ext.each(records,this.handleFileTypes,this);
		},this);

		top.xredaktor_fileArchivRefreshView = function()
		{
			view.store.load();
		}


		view.mixins.draggable.init(view, {
			ddConfig: {
				ddGroup: ddGroup
			},
			ghostTpl: ghostTpl
		});


		view.on('itemdblclick',function(view,r){
			if (cfg.mode == 'window')
			{
				cfg.handler.call(cfg.scope,r.data);
				return false;
			} else
			{
				window.open('/xgo/xplugs/xredaktor/ajax/storage/downloadFile/'+r.data.s_id);
				return false;
			}
		},this);

		view.on('refresh',function() {

			if (this.preSelectNode != -1)
			{
				var r = this.store.findRecord('s_id',this.preSelectNode);
				view.getSelectionModel().select(r);
				this.preSelectNode = -1;
			}

			try{
				Ext.get('flyIdOfFile_'+cfg.preSelect).addCls('chossenFA_FILE');
			} catch(e) {}

			try{
				Ext.get('flyIdOfFile_'+cfg.latestSaved).addCls('chossenFA_FILE_SAVED');
			} catch(e) {}

			if (me.reportBack.s_id)
			{
				var r = this.store.findRecord('s_id',me.reportBack.s_id);
				view.getSelectionModel().select(r);
			}

		},this,{delay:10});


		this.showGrid = false;


		var fieldsOfGrid = [

		{name: 's_id',		text:'Interne Nummer',hidden:true,type:'int'},
		{name: 's_gui',		text:'Ansicht',hidden:false,type:'string', width: 200, renderer:function(v,s,r) {
			return '<div align="center"><img src="'+r.data.scaleSrc+'/'+w+'/'+h+'" title="S_ID:'+r.data.s_id+'"></div>';
		}},
		{name: 's_name', 	text:'Dateiname',	type:'string', width: 200, editor: {
			allowBlank: false,
			xtype: 'textarea'
		}},
		{name:'scaleSrc',	type:'string',header:false},
		{name:'webSrc',	type:'string',header:false},
		{name:'s_name',	type:'string',header:false},
		{name:'s_mimeType',	type:'string',header:false},
		{name:'s_media_h',	type:'string',header:false},
		{name:'s_media_w',	type:'string',header:false},
		{name:'s_fileSizeBytes',	type:'string',header:false},
		{name:'s_fileSizeBytesHuman',	type:'string',header:false}
		];


		var site_id = this.cfg.site_id;
		var fe_langs = xredaktor.getInstance().getLanguageConfigFE(site_id);
		Ext.each(fe_langs,function(s) {
			var iso = s.fel_ISO;
			fieldsOfGrid.push({name: 's_alt_'+iso, 	text:'Alt-Tag '+iso,	type:'string', width: 200, editor: {
				allowBlank: false,
				xtype: 'textarea'
			}});
		},this);

		var abspielenId = Ext.id();

		this.gridView = xframe_pattern.getInstance().genGrid({
			region:'center',
			layout: 'fit',
			split: true,
			border:false,
			disableButtonDel:true,
			forceFit:true,
			ddGroup: this.ddGroup,
			cMenu2 : [{
				id:abspielenId,
				iconCls:'xf_play',
				text:'Abspielen',
				scope:this,
				handler:function()
				{
					console.info('Absielen');
				}
			}],
			button_del: true,
			records_move: false,
			tools:[],
			xstore: {
				load: '/xgo/xplugs/xredaktor/ajax/storage/loadFilesMixed',
				loadParams : {
					s_id : 0,
					s_storage_scope: this.cfg.s_storage_scope
				},
				remove: '/xgo/xplugs/xredaktor/ajax/storage/delFiles',
				update: '/xgo/xplugs/xredaktor/ajax/storage/updateMixed',
				pid: 	's_id',
				fields: fieldsOfGrid
			}
		});

		this.gridView.on('itemdblclick',function(view,r){
			if (cfg.mode == 'window')
			{
				cfg.handler.call(cfg.scope,r.data);
				return false;
			} else
			{
				window.open('/xgo/xplugs/xredaktor/ajax/storage/downloadFile/'+r.data.s_id);
				return false;
			}
		},this);


		this.gridView.on('selectionchange',function(dv, selections){

			var l = selections.length;
			Ext.getCmp(zipBtn).setDisabled(l==0);
			Ext.getCmp(delBtn).setDisabled(l==0);

			if ((selections.length > 1) || (selections.length == 0))
			{
				me.panel_FileInfo.setDisabled(true);
				return true;
			}
			me.panel_FileMeta.fileSelect(selections[0].data);
			me.panel_FileInfo.fileSelect(selections[0].data);
			return true;
		},this,{delay:20});

		this.gridView.on('afterrender',function(){
			console.info('afterrender');
			try{
				this.gridView.mixins.draggable.init(this.gridView, {
					ddConfig: {
						ddGroup: this.ddGroup
					},
					ghostTpl: ghostTpl
				});
			} catch(e) {
				console.info('XXX');
			}
		},this);

		this.gridView.getStore().skipQuery = true;

		var panel = Ext.create('Ext.Panel',{
			tbar:[{
				width: 400,
				fieldLabel: 'Suche',
				labelWidth: 50,
				xtype:'xfsearchfield',
				store:	this.store,
				store2:this.gridView.getStore()
			},{
				fieldLabel: 'Alle Verzeichnisse',
				xtype:'checkbox',
				listeners:{
					change: function(field,value) {
						me.tree.setDisabled(value);
						me.store.proxy.extraParams['qALL'] = value ? 'Y' : 'N';
						me.gridView.getStore().proxy.extraParams['qALL'] = value ? 'Y' : 'N';


						if (me.showGrid)
						{
							me.gridView.getStore().load();
						} else
						{
							me.store.load();
						}
					}
				}
			}],
			title: 'Datein',
			layout: 'fit',
			border:false,
			width: this.getWidthByPercentage(40),
			region: 'center',
			tools:[{
				type:'refresh',
				tooltip: 'Refresh form Data',
				scope:this,
				handler: function(event, toolEl, panel){
					this.store.load();
				}
			}],
			bbar: [{
				id:delBtn,
				iconCls:'xf_del',
				text:'Löschen',
				disabled:true,
				scope:this,
				handler:function()
				{
					xframe.yn({
						title:'Löschen',
						msg: 'Wollen sie wirklich die selektierten Datein löschen?',
						scope:this,
						handler: function(btn)
						{
							if (btn != 'yes') return;
							this.processDelFiles(this.getCurrentView());
						}
					});
				}
			},{
				id:zipBtn,
				iconCls:'xf_zip',
				text:'Zippen und Downloaden',
				disabled:true,
				scope:this,
				handler:function()
				{
					this.processZipFiles(this.getCurrentView());
				}
			},'->',(cfg.mode=='window') ? 'Doppelklick: Auswählen' : 'Doppelklick: Download',{
				iconCls:'xf_view_detail',
				text:'Anzeige Wechseln',
				scope:this,
				handler:function(btn)
				{
					me.showGrid = !me.showGrid;

					Ext.getCmp(zipBtn).setDisabled(true);
					Ext.getCmp(delBtn).setDisabled(true);

					if (!me.showGrid)
					{
						me.store.skipQuery = false;
						me.gridView.getStore().skipQuery = true;
					} else
					{
						me.store.skipQuery = true;
						me.gridView.getStore().skipQuery = false;
					}

					var iconCls = "";
					var item = (me.showGrid) ? this.gridView : view;
					if (!me.showGrid) iconCls = 'xf_view_detail';
					else iconCls = 'xf_view_images';

					btn.setIconCls(iconCls);
					panel.removeAll(false);
					panel.add(item);
					panel.doLayout(true);
					item.getStore().load();
				}
			}],
			items: [view]
		});

		this.view = view;
		panel.viewX = view;
		return panel;
	},

	getUploadPanel : function()
	{
		this.iframeID 	= Ext.id();
		this.latestIframeUrl = this.iframeURL	= "/xgo/xplugs/xredaktor/ajax/storage/uploadFrame";

		var panel = Ext.create('Ext.Panel',{
			title: 'Datei-Upload',
			split: true,
			border:false,
			collapsible:true,
			collapsed:false,
			height: 200,
			layout: 'fit',
			animCollapse:false,
			region: 'south',
			tools:[{
				type:'refresh',
				tooltip: 'Refresh form Data',
				scope:this,
				handler: function(event, toolEl, panel){
					this.frefreshUploadSrcFrame();
				}
			}],
			html : "<iframe id='"+this.iframeID+"' src='"+this.iframeURL+"' width=100% height=100% frameborder=0></iframe>"
		});

		return panel;
	},

	renderLangTag : function(v)
	{
		switch(v)
		{
			case '': 		return "Generisch";
			default: return v;
		}
	},

	renderType : function(v)
	{
		switch(v)
		{
			case 'PAGE': 		return "Seite";
			case 'INIT': 		return "Initialwert";
			case 'WIZARD': 		return "Wizard";
			case 'UNDEFINED': 	return "Unbekannt";
			default: return v;
		}
	},

	getFileInfo : function(r)
	{
		var me = this;
		var w = 320;
		var h = 200;
		var playVid = Ext.id();

		var tpl = new Ext.XTemplate([
		'<tpl for=".">',
		'<div class="mid-wrap">',
		'<div class="mid" id="BigflyIdOfFile_{s_id}">',
		(!Ext.isIE6? '<img src="{scaleSrc}/'+w+'/'+h+'" style="width:'+w+'px;height:'+h+'px" />' :
		'<div style="width:'+w+'px;height:'+h+'px;filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'{scaleSrc}/'+w+'/'+h+'\')"></div>'),
		'</div>',
		'<span class="download"><a href="{webSrc}" target="_blank">{s_name}</a></span>',
		'<div class="info"><b>Width:</b> {s_media_w}px<br>',
		'<b>Height:</b> {s_media_h}px<br>',
		'<b>Mime:</b> {s_mimeType}<br>',
		'<b>Verzeichnis:</b> {webSrc}<br>',
		'<b>Größe:</b> {s_fileSizeBytesHuman}<br><br><div id="'+playVid+'"></div></div>',
		'</div>',
		'</tpl>']);

		var s_id = false;

		var fInfoPanel = Ext.create('Ext.Panel',{
			collapseMode:'mini',
			region:'center',
			html:'',
			title:'Informationen'
		});


		var fUsage = xframe_pattern.getInstance().genGrid({
			region:'center',
			split: true,
			border:false,
			title:'In Verwendung',
			button_del: false,
			button_add: false,
			forceFit:true,
			records_move: false,
			tools:[],
			bbar:[{
				iconCls:'xf_scan',
				scope:this,
				text:'Verknüpfungen neu erstellen',
				handler:function(){
					xframe.ajax({
						url: '/xgo/xplugs/xredaktor/ajax/storage/fixFileUsage',
						params: {
						},
						success: function() {
							fUsage.store.load();
						},
						failure: function() {
							fUsage.store.load();
						}
					});
				}
			}],
			xstore: {
				load: '/xgo/xplugs/xredaktor/ajax/storage/loadUsage',
				loadParams : {
					s_id : 0,
					s_storage_scope: this.cfg.s_storage_scope
				},
				pid: 	'su_id',
				fields: [
				{name: 'su_id',			text:'Interne Nummer',hidden:false,type:'int'},
				{name: 'su_type',		text:'Art',	hidden:false,	type:'string', renderer:function(v) {
					return me.renderType(v);
				}},
				{name: 'su_p_id', 		text:'Seitennummer', type:'int'},
				{name: 'su_psa_id', 	text:'PSA', type:'int'},
				{name: 'su_langtag', 	text:'Sprache', type:'string',renderer:function(v) {
					return me.renderLangTag(v);
				}}
				]
			}
		});

		this.panel_FileMeta = this.getFileMeta();


		var gui = Ext.create('Ext.tab.Panel', {
			tbar:[{
				iconCls:'xf_download',
				text:'Download',
				scope:this,
				handler:function(){
					window.open('/xgo/xplugs/xredaktor/ajax/storage/downloadFile/'+s_id);
				}
			}],
			activeTab: 0,
			title:'Ausgewählte Datei',
			border:false,
			region: 'center',
			disabled:true,
			split: true,
			collapseMode: 'mini',
			//tabPosition : 'bottom',
			items: [this.panel_FileMeta, fInfoPanel, fUsage]
		});


		gui.fileSelect = function(r) {
			s_id = r.s_id;
			gui.setDisabled(false);
			fInfoPanel.update(tpl.applyTemplate(r));

			fUsage.store.proxy.extraParams = {
				s_id: s_id
			};
			fUsage.store.load();

			if (r.s_mimeType == 'video/x-flv')
			{
				Ext.create('Ext.Button', {
					iconCls:'xf_play',
					scope:me,
					text: 'Video Abspielen',
					renderTo: playVid,
					handler: function() {
						this.actionFileTypeVideo({data:r});
					}
				});
			}
		}

		return gui;
	},

	getFileMeta : function(r)
	{
		if (typeof r == 'undefined') r = {s_id:-1};
		if (typeof r.s_id == "undefined") r.s_id  -1;

		var s_id = r.s_id;
		var me = this;
		var s_storage_scope = this.cfg.s_storage_scope;
		var site_id = this.cfg.site_id;
		var fe_langs = xredaktor.getInstance().getLanguageConfigFE(site_id);

		console.info('fe_langs',fe_langs);

		var altData = [];
		var altDataAssoz = {};
		var s_alts = Ext.decode(altData,true);
		if (s_alts == null) s_alts = {};

		Ext.each(fe_langs,function(s) {
			var iso = s.fel_ISO;
			if (typeof s_alts[iso] == 'undefined') {
				s_alts[iso] = "";
			}
			var tmp = [];
			tmp.push(iso,s_alts[iso]);
			altData.push(tmp);
		},this);

		var latestR_sid = 0;

		var grid = xframe_pattern.getInstance().genMatrix({
			title: 'Metadaten',
			region:'south',
			height:300,
			//disabled:true,
			collapseMode:'mini',
			data: altData,
			tools: false,
			records_move: false,
			plugin_numLines: true,
			records2array:true,
			autoDestroyStore:false,
			button_add: false,
			button_del: false,
			button_save: false,
			toolbar_top : [{
				iconCls:'xf_reload',
				text:'Aktualisieren',
				handler:function(){
					grid.loadAlts(latestR_sid);
				}
			}],
			auto_flush: {
				scope: me,
				handler: function(oldCfg,newCfg)
				{
					console.info(arguments);
					var dataAssoz = {};
					Ext.each(newCfg,function(d){
						dataAssoz[d[0]] = d[1];
					},this);
					xframe.ajax({
						url: '/xgo/xplugs/xredaktor/ajax/storage/updateAlts',
						params: {
							s_alts: Ext.encode(dataAssoz),
							s_id:	s_id
						},
						success: function() {
							me.grid.setDisabled(false);
							me.reloadStore();
						},
						failure: function() {
							me.grid.setDisabled(false);
							me.reloadStore();
						}
					});
				}
			},
			xstore: {
				pid: 	'a_id',
				fields: [{name: 'a_lang', text:'Sprache', type:'string', width: 50},
				{name: 'a_alt', text:'Alt-Tag',	type:'string', width: 500, editor: {
					allowBlank: false,
					xtype: 'textfield'
				}}
				]
			}
		});

		grid.loadAlts = function(s_id)
		{
			xframe.ajax({
				url: '/xgo/xplugs/xredaktor/ajax/storage/getAlts',
				params: {
					s_id: s_id
				},
				success: function(json) {

					var altData = [];
					var altDataAssoz = {};
					var s_alts = Ext.decode(json.record.s_alts,true);
					if (s_alts == null) s_alts = {};

					Ext.each(fe_langs,function(s) {
						var iso = s.fel_ISO;
						if (typeof s_alts[iso] == 'undefined') {
							s_alts[iso] = "";
						}
						var tmp = [];
						tmp.push(iso,s_alts[iso]);
						altData.push(tmp);
					},this);

					grid.getStore().loadData(altData);
					grid.setDisabled(false);
				}
			});
		}

		grid.fileSelect = function(r)
		{
			//grid.setDisabled(true);
			latestR_sid = s_id = r.s_id;
			grid.loadAlts(s_id);
		}

		return grid;
	},

	changeUploadSrcParam : function(s_id)
	{
		var src = this.iframeURL+'?s_id='+s_id+'&s_storage_scope='+this.cfg.s_storage_scope;
		this.latestIframeUrl = src;
		Ext.get(this.iframeID).dom.setAttribute('src',src);
	},

	frefreshUploadSrcFrame : function()
	{
		Ext.get(this.iframeID).dom.setAttribute('src',this.latestIframeUrl);
	},


	getWidthByPercentage : function(percentage)
	{
		if (this.cfg.mode == 'window')
		{
			return this.cfg.width*percentage/100;
		} else
		{
			return window.innerWidth*percentage/100;
		}
	},

	getDirPanel : function(cfg)
	{
		var me = this;
		this.checkAndSaveCfg(cfg);

		var fields = [
		{name: 's_name',	xgroup:['Minimal','Standard','Sprachenspezifisch'],	text:'Verzeichnisse',	type:'string', folder: true, editor: {allowBlank: false,xtype: 'textfield'}, width: this.getWidthByPercentage(25)},
		{name: 's_id',		xgroup: 'Standard',	text:'Interne Nummer',	type:'string', 	hidden: true},
		{name: 's_lastmod',	xgroup: 'Standard',	text:'Letzte änderung',	type:'string' , hidden: true},
		{name: 's_dir',		xgroup: '',	text:'Letzte änderung',	type:'string' , hidden: true, defaultValue:'Y'}
		];

		Ext.each(xredaktor.getInstance().getLFE(),function(o){
			var lower = o.fel_ISO.toLowerCase();
			var upper = o.fel_ISO.toUpperCase();
			fields.push({name: 's_name_'+lower,	text:'Segment in '+upper,	xgroup: 'Sprachenspezifisch', 	type:'string', folder: false, editor: {xtype: 'textfield'},hidden:true});
		});


		var bbar = [];
		var latestDirSelection = 0;
		var buttonSelect = Ext.id();

		if (cfg.mode == 'dir')
		{
			bbar.push('->',{
				id: buttonSelect,
				disabled:true,
				iconCls:'xf_select',
				text:'Auswählen',
				scope:me,
				disabled:true,
				handler:function()
				{
					cfg.handler.call(cfg.scope,latestDirSelection);
				}
			});
		}

		this.tree = xframe_pattern.getInstance().genTree({
			forceFit:true,
			region:'west',
			border:false,
			split: true,
			button_add:true,
			title: 'FileArchiv',
			cfgADD_text: 'Verzeichnis anlegen',
			cfgADD_iconCls: 'xf_dir_create',
			ddGroup: this.ddGroup,
			rootVisible:false,
			width: this.getWidthByPercentage(30),
			rootTextName: 'Wurzel',
			bbar_add: bbar,
			bbar_add2: [{
				id: me.delButtonDirId,
				text:'Löschen',
				iconCls:'xf_del',
				scope:this,
				disabled:true,
				handler:function()
				{
					var s_id = Ext.getCmp(me.delButtonDirId).kickS_id;
					var s_name = Ext.getCmp(me.delButtonDirId).kickS_name;
					xframe.yn({
						title:'Löschen',
						msg: 'Wollen sie wirklich die selektierten Ordner "'+s_name+'" löschen?',
						scope:this,
						handler: function(btn)
						{
							if (btn != 'yes') return;
							this.processDelDir(this.tree.getStore(),s_id);
						}
					});
				}
			}],
			cMenu : [{
				iconCls:'xf_dir_delete',
				text:'Verzeichnis löschen',
				scope:this,
				handler:function(crap,reloadMeFunc)
				{
					var s_id = crap.s_id;
					var s_name = crap.s_name;

					if (s_id == 0)
					{
						xframe.alert('Achtung','Die Verzeichniswurzel kann nicht gelöscht werden!');
					}

					xframe.yn({
						title:'Löschen',
						msg: 'Wollen sie wirklich die selektierten Ordner "'+s_name+'" löschen?',
						scope:this,
						handler: function(btn)
						{
							if (btn != 'yes') return;
							this.processDelDir(this.tree.getStore(),s_id,reloadMeFunc);
						}
					});

				}
			},{
				iconCls:'xf_dir_sync',
				text:'Mit Filesystem synchronisieren',
				scope:this,
				handler:function(crap,reloadMeFunc)
				{
					var s_storage_scope 	= crap.s_storage_scope;
					var s_id 	= crap.s_id;
					var s_name 	= crap.s_name;

					xframe.yn({
						title:'Datenträger synchronisation',
						msg: 'Wollen sie wirklich die selektierten Ordner "'+s_name+'" mit der Datenbank synchronisieren?',
						scope:this,
						handler: function(btn)
						{
							if (btn != 'yes') return;
							this.syncDir(this.view.store,s_id,function(){
								reloadMeFunc();
							});
						}
					});

				}
			}],
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/storage/load',
				update: '/xgo/xplugs/xredaktor/ajax/storage/update',
				insert: '/xgo/xplugs/xredaktor/ajax/storage/insert',
				move: 	'/xgo/xplugs/xredaktor/ajax/storage/move',

				loadParams : {
					s_storage_scope : cfg.s_storage_scope
				},
				insertParams : {
					s_storage_scope : cfg.s_storage_scope
				},

				pid: 	's_id',
				fields: fields
			}
		});


		if (cfg.mode == 'dir')
		{
			this.tree.on('selectionchange',function(view,selections,options){
				if (selections.length != 1)
				{
					Ext.getCmp(buttonSelect).setDisabled(true);
					return true;
				}
				Ext.getCmp(buttonSelect).setDisabled(false);
				latestDirSelection =  selections[0].data;
			},this);

			var started = false;
			this.tree.on('load',function(){
				if (!cfg.preSelectDir) return;
				if (started) return;
				started = true;

				this.tree.setDisabled(true);
				xframe.ajax({
					scope:me,
					url: '/xgo/xplugs/xredaktor/ajax/storage/getPathOfDir',
					params: {
						s_id: cfg.preSelectDir
					},
					success: function(json) {
						if (json.path2expand == '/')
						{
							me.tree.setDisabled(false);
							return;
						}
						this.tree.expandPath('/0'+json.path2expand,'s_id','/',function(success,node){
							//if (node.data.s_id != json.s_fid) return;
							me.preSelectNode = cfg.preSelect;
							me.tree.getSelectionModel().select(node);

							setTimeout(function(){
								me.tree.setDisabled(false);
							},100);
						});
					},
					failure: function() {
						me.tree.setDisabled(false);
					}
				});

			},this,{buffer:1});
		}

		return this.tree;
	},

	checkAndSaveCfg : function(cfg)
	{
		if (typeof cfg == 'undefined')
		{
			xframe.alert('Internal ERROR','CFg vom mainpanel ist nicht gesetzt...');
		}

		if (!cfg.mode) cfg.mode = false;
		this.cfg = cfg;

		this.ddGroup 		= Ext.id();
		this.delButtonDirId = Ext.id();
		this.reportBack 	= -1;
		this.preSelectNode 	= -1;
	},


	getMainPanel : function(cfg)
	{
		var me = this;
		this.checkAndSaveCfg(cfg);

		var fields = [
		{name: 's_name',	xgroup:['Minimal','Standard','Sprachenspezifisch'],	text:'Verzeichnisse',	type:'string', folder: true, editor: {allowBlank: false,xtype: 'textfield'}, width: this.getWidthByPercentage(25)},
		{name: 's_id',		xgroup: 'Standard',	text:'Interne Nummer',	type:'string', 	hidden: true},
		{name: 's_lastmod',	xgroup: 'Standard',	text:'Letzte änderung',	type:'string' , hidden: true},
		{name: 's_dir',		xgroup: '',	text:'Letzte änderung',	type:'string' , hidden: true, defaultValue:'Y'}
		];

		Ext.each(xredaktor.getInstance().getLFE(),function(o){
			var lower = o.fel_ISO.toLowerCase();
			var upper = o.fel_ISO.toUpperCase();
			fields.push({name: 's_name_'+lower,	text:'Segment in '+upper,	xgroup: 'Sprachenspezifisch', 	type:'string', folder: false, editor: {xtype: 'textfield'},hidden:true});
		});

		this.tree = this.getDirPanel(cfg);

		if (cfg.preSelect)
		{
			var started = false;
			this.tree.on('load',function(){
				if (started) return;
				started = true;

				xframe.ajax({
					scope:me,
					url: '/xgo/xplugs/xredaktor/ajax/storage/getPathOfFile',
					params: {
						s_id: cfg.preSelect
					},
					success: function(json) {
						if (json.path2expand == '/')
						{
							this.gui.setDisabled(false);
							return;
						}
						this.tree.expandPath('/0'+json.path2expand,'s_id','/',function(success,node){
							if (node.data.s_id != json.s_fid) return;
							me.preSelectNode = cfg.preSelect;
							me.tree.getSelectionModel().select(node);
							me.gui.setDisabled(false);
						});
					},
					failure: function() {
						this.gui.setDisabled(false);
					}
				});
			},this,{delay:1})
		}


		this.panel_FileInfo = this.getFileInfo();
		this.viewPanel = this.getViewPanel(cfg);
		this.viewPanel.viewX.on('selectionchange',function(view,selections,options){
			if ((selections.length > 1) || (selections.length == 0))
			{
				this.panel_FileInfo.setDisabled(true);
				//this.panel_FileMeta.setDisabled(true);
				return true;
			}
			this.panel_FileMeta.fileSelect(selections[0].data);
			this.panel_FileInfo.fileSelect(selections[0].data);

		},me);

		this.tree.on('beforeload',function(){
			//Ext.getCmp(me.delButtonDirId).setDisabled(true);
		},this);

		this.tree.on('selectionchange',function(view,selections,options){
			this.view.setDisabled(false);
			if (selections.length == 0)
			{
				//Ext.getCmp(me.delButtonDirId).setDisabled(true);
				return true;
			}
			//Ext.getCmp(me.delButtonDirId).setDisabled(false);
			var s_id 	= selections[0].data.s_id;
			var s_name 	= selections[0].data.s_name;
			//Ext.getCmp(me.delButtonDirId).kickS_id 	= s_id;
			//Ext.getCmp(me.delButtonDirId).kickS_name 	= s_name;

			/*this.store.proxy.extraParams = {
			s_id: s_id
			};*/
			this.store.proxy.extraParams['s_id'] = s_id;
			this.changeUploadSrcParam(s_id);
			/*			this.gridView.getStore().proxy.extraParams = {
			s_id: s_id
			};*/
			this.gridView.getStore().proxy.extraParams['s_id'] = s_id;

			console.info(this.showGrid);
			if (this.showGrid)
			{
				this.gridView.getStore().load();
			} else
			{
				this.store.load();
			}

		},this);


		var delayedFileMove = false;
		var pipe = [];

		function pushUpdates()
		{
			this.myMask = new Ext.LoadMask({target:this.gui,msg:"'Verschieben' wird durchgeführt ..."});
			this.myMask.show();
			xframe.ajax({
				scope:this,
				url: '/xgo/xplugs/xredaktor/ajax/storage/moveFiles',
				params: {
					doThis: Ext.encode(pipe)
				},
				success: function(json) {
					if (json.notMoved.length > 0)
					{
						var txt = [];
						Ext.each(json.notMoved,function(pack){
							txt.push('Die Datei <b>'+pack.s.s_name+'</b> existiert bereits in dem Verzeichnis.');
						},this);
						xframe.alert('Datein konnten nicht verschoben werden',txt.join('<br>'));
					}
					pipe = [];
					this.view.store.load();
					this.gridView.store.load();
					this.myMask.hide();
				},
				failure: function() {
					pipe = [];
					this.myMask.hide();
				}
			});
		}

		function moveFileToNewDir(s_id,newFatherId)
		{
			pipe.push({s_id:s_id,newFatherId:newFatherId});
			if (delayedFileMove) clearTimeout(delayedFileMove);
			delayedFileMove = setTimeout(function(){pushUpdates.call(me);},100);
		}

		this.tree.on('beforeiteminsert',function(newFather,fileNode,refNode,options){
			if (fileNode.data.s_dir == 'Y') return true;
			moveFileToNewDir(fileNode.data.s_id,newFather.data.s_id);
			return false;
		});

		this.tree.on('beforeitemappend',function(newFather,fileNode,refNode,options) {
			if (fileNode.data.s_dir == 'Y') return true;
			moveFileToNewDir(fileNode.data.s_id,newFather.data.s_id);
			return false;
		});

		var bbar = [];

		this.right = Ext.create('Ext.Panel',{
			border:false,
			split: true,
			width: this.getWidthByPercentage(30),
			layout: 'border',
			region: 'east',
			items: [this.getUploadPanel(),this.panel_FileInfo]
		});


		var items = [this.tree,this.viewPanel,this.right];

		if (!cfg.mode) cfg.mode = false;
		if (cfg.mode == 'window')
		{
			var buttonSelect = Ext.id();
			bbar.push('->',{
				id: buttonSelect,
				disabled:true,
				iconCls:'xf_select',
				text:'Auswählen',
				scope:me,
				disabled:true,
				handler:function()
				{
					cfg.handler.call(cfg.scope,me.reportBack);
				}
			});

			this.viewPanel.viewX.on('selectionchange',function(view,selections,options){
				if (selections.length == 0) return;
				try{
					me.reportBack = selections[0].data;
					Ext.getCmp(buttonSelect).setDisabled(false);
					Ext.getCmp(buttonSelect).setText("'"+me.reportBack.s_name+"' <b>Auswählen</b>");
				} catch(e){console.info('this.viewPanel.viewX.onselectionchange',e)};
			},me);
		}



		this.gui = Ext.create('Ext.Panel',{
			disabled: (cfg.preSelect) ? true : false,
			region:'center',
			layout: 'border',
			border:false,
			items : items,
			bbar:bbar
		});



		return this.gui;
	}
};