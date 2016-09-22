var xredaktor_storage = (function() {

	var instance = null;
	var filePopUp = null;


	return new function() {

		this.showFileDialog = function(cfg) {

			if (filePopUp == null) {
				var config = {};
				filePopUp = new xredaktor_storage_(config);
			}

			filePopUp.showFileDialog(cfg);
		}

		this.getInstance = function(config) {
			
			return new xredaktor_storage_(config);
			
			if (instance == null) {
				instance = new xredaktor_storage_(config);
			}
			return instance;
		}
	}
})();

var xredaktor_storage_ = function(config) {
	this.flyIdOfFilePre 	= "flyIdOfFile_"+Ext.id()+"_";
	this.config 			= config || {};
	this.viewSize 			= 1;
	this.winHolder			= false;
	this.showFileDialogMode = false;
	this.multiSelect		= true;
	this.currentDir			= 0;
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

	showFileDialog: function(cfg) {

		var width 	= window.innerWidth*0.9;
		var height 	=  window.innerHeight*0.9;

		this.showFileDialogCfg 	= cfg;
		this.showFileDialogMode	= true;

		this.showFileDialogCfg.preSelect		= parseInt(this.showFileDialogCfg.preSelect,10);
		this.showFileDialogCfg.latestSaved		= parseInt(this.showFileDialogCfg.latestSaved,10);

		if (isNaN(this.showFileDialogCfg.preSelect)) 	this.showFileDialogCfg.preSelect 	= 0;
		if (isNaN(this.showFileDialogCfg.latestSaved)) 	this.showFileDialogCfg.latestSaved 	= 0;

		if (!this.winHolder)
		{
			var gui 			= this.getMainPanel();

			this.button_select  = Ext.widget({
				xtype: 'button',
				text: 'Choose File',
				iconCls: 'xf_select',
				scope: this,
				disabled: true,
				handler: this.doAction
			});

			this.winHolder 		= Ext.create('widget.window', {
				border:false,
				title: 'Choose File',
				modal: true,
				closable: true,
				width: width,
				height: height,
				layout: 'border',
				closeAction: 'hide',
				items: [gui],
				bbar: ['->',this.button_select],
				listeners: {
					scope: this,
					show: function() {
						this.initSelection();
					},
					afterrender: function() {
						this.handleRefresh();
					}
				}
			});

		}



		this.winHolder.show();
	},

	openView: function(startIdx) {
		xframe_workbench.getInstance().openView({
			gui: this.getViewPanel({s_id:0})
		});

	},

	getViewPanel : function(cfg) {

		var s_id = cfg.s_id || 0;

		var panel =  {
			frame: false,
			border: false,
			iconCls: 'xr_storage',
			closable: true,
			id: 'xredaktor_storage::openView::'+s_id,
			layout: 'border',
			title: 'Storage',
			items: this.getMainPanel()
		};

		return panel;
	},

	processDelDir : function(store,s_id,reloadMeFunc)
	{
		var me=this;
		this.fullView.setDisabled(true);
		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/storage/delDir',
			params: {
				s_id: s_id
			},

			success: function(json) {
				try{
					this.fullView.setDisabled(false);
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
				this.fullView.setDisabled(false);
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

	processOpenFiles: function(view)
	{
		this.currentSelection = [];
		var rs = view.getSelectionModel( ).getSelection( );

		Ext.each(rs,function(r){
			this.currentSelection.push(r.data);
		},this);

		this.doAction();
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

	syncDir : function(store,s_id,callBack)
	{
		var mask = new Ext.LoadMask({target: this.fullView, msg:"Bitte warten Synchronisierung läuft ..."});;
		mask.show();

		xframe.ajax({
			scope: this,
			url: '/xgo/xplugs/xredaktor/ajax/storage/syncDir',
			params: {
				s_id: s_id,
				s_storage_scope: this.getStorageId()
			},
			success: function() {
				mask.hide();
				store.load();
				try{callBack();}catch(e){}
			},
			failure: function() {
				mask.hide();
				store.load();
			}
		});
	},

	getPanelDirs: function() {

		var s_storage_scope = this.getStorageId();
		var me 				= this;

		var fields = [
		{name: 's_name',	text:'Directories',	type:'string', folder: true, editor: {allowBlank: false,xtype: 'textfield'}},
		{name: 's_id',		text:'ID',	type:'string', 	hidden: true},
		{name: 's_lastmod',	text:'Last Modification',	type:'string' , hidden: true},
		{name: 's_dir',		text:'DIR',		type:'hidden' , hidden: true}
		];

		var bbar = [{
			iconCls:'xf_dir_sync',
			text:'Sync Storage',
			scope:this,
			handler:function(crap,reloadMeFunc)
			{
				var s_storage_scope 	= s_storage_scope;
				var s_id 				= 0;
				var s_name 				= crap.s_name;

				xframe.yn({
					title:'Confirm',
					msg: 'Sync root directory?',
					scope:this,
					handler: function(btn)
					{
						if (btn != 'yes') return;
						this.syncDir(this.panelDir.getStore(),s_id,function(){
							reloadMeFunc();
						});
					}
				});

			}
		}];


		var latestDirSelection = 0;
		var buttonSelect = Ext.id();

		var tree = xframe_pattern.getInstance().genTree({
			forceFit:true,
			region:'west',
			border:false,
			split: true,
			ddGroup: 'dirDropper',
			button_add:true,
			button_del:false,
			title: 'Directories',
			cfgADD_text: 'Create child - directory',
			cfgADD_iconCls: 'xf_dir_create',
			rootVisible:true,
			width: 300,
			rootTextName: 'Root',
			bbar_add: bbar,
			cMenu : [{
				iconCls:'xf_dir_delete',
				text:'Delete directory',
				scope:this,
				handler:function(crap,reloadMeFunc)
				{
					var s_id = crap.s_id;
					var s_name = crap.s_name;

					if (s_id == 0)
					{
						xframe.alert('Alert','Root directory cannot be deleted!');
					}

					xframe.yn({
						title:'Confirm',
						msg: 'Delete directory "'+s_name+'" ?',
						scope:this,
						handler: function(btn)
						{
							if (btn != 'yes') return;
							this.processDelDir(tree.getStore(),s_id,reloadMeFunc);
						}
					});

				}
			},{
				disabled: true,
				iconCls:'xf_dir_sync',
				text:'Sync directory',
				scope:this,
				handler:function(crap,reloadMeFunc)
				{
					var s_storage_scope 	= s_storage_scope;
					var s_id 	= crap.s_id;
					var s_name 	= crap.s_name;

					xframe.yn({
						title:'Confirm',
						msg: 'Sync directory "'+s_name+'" ?',
						scope:this,
						handler: function(btn)
						{
							if (btn != 'yes') return;
							this.syncDir(this.panelDir.getStore(),s_id,function(){
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
				//remove: '/xgo/xplugs/xredaktor/ajax/storage/remove',

				loadParams : {
					s_storage_scope : s_storage_scope
				},
				insertParams : {
					s_storage_scope : s_storage_scope
				},

				pid: 	's_id',
				nameField: 's_name',
				fields: fields
			}
		});

		var just4init = false;

		tree.getStore().on('load',function(){
			if (just4init) return;
			just4init = true;
			this.selectDir(0);
		},this);

		tree.on('beforeitemexpand',function(node){
			//	tree.getSelectionModel().select(node,false);
		},this);

		tree.on('selectionchange',function(view,selections,options){

			if (selections.length != 1)
			{
				this.selectDir(0);
				return;
			}

			var s_id = selections[0].data.s_id;
			this.selectDir(s_id);

		},this);

		tree.on('afterrender',function(){
		},this);

		return tree;

	},


	selectDir: function(s_id)
	{
		//console.info("selectDir",s_id);


		if (!s_id) {
			s_id = 0;
		}

		if (this.limitDir) {
			s_id = this.limitDir;
		}

		Ext.util.Cookies.set('fa_last_s_id',s_id);
		this.currentDir = s_id;

		this.filesView.mask('loading ...');
		this.filesView.getStore().proxy.extraParams['s_id'] = s_id;
		//		this.filesView.getStore().proxy.extraParams['page'] = 0;
		// 		this.filesView.getStore().proxy.extraParams['start'] = 0;
		//this.filesView.getStore().load();

		Ext.getCmp(this.pager).moveFirst();

		this.filesView.unmask();

	},


	openSelection: function(rs) {
		Ext.each(rs,function(r,i){
			window.open('/xgo/xplugs/xredaktor/ajax/storage/downloadFile/'+r.data.s_id);
		},this);
	},

	doAction: function() {

		if (this.showFileDialogMode) {
			this.winHolder.hide();
			this.showFileDialogCfg.callBack.call(this.showFileDialogCfg.scope,this.currentSelections);
		} else {
			this.openSelection(this.currentSelections);
		}

	},


	handleRefresh: function() {

		var viewId = this.filesView.el.dom.id;

		$$(".storageView img").lazyload({
			container: $("#"+this.filesView.el.dom.id)
		});


		if (this.afterActionIdOfFile)
		{
			var r = this.filesView.getStore().findRecord('s_id',this.afterActionIdOfFile);
			if (r)
			{
				this.filesView.getSelectionModel().select(r);

				var idx = this.flyIdOfFilePre+this.afterActionIdOfFile;

				var off = $$('#'+idx).offset();
				var h	= this.filesView.getHeight()/2;

				this.filesView.scrollBy(0, off.top-h, true);
			}
		}

		$$('#'+viewId+' .chossenFA_FILE').removeClass('chossenFA_FILE_SAVED');

		if (!this.showFileDialogMode) return;


		if (this.showFileDialogCfg.preSelect)
		{
			$$('#'+viewId+' .chossenFA_FILE').removeClass('chossenFA_FILE');
			var r = this.filesView.getStore().findRecord('s_id',this.showFileDialogCfg.preSelect);
			if (r)
			{
				this.filesView.getSelectionModel().select(r);

				var idx = this.flyIdOfFilePre+this.showFileDialogCfg.preSelect;
				Ext.get(idx).addCls('chossenFA_FILE');

				var off = $$('#'+idx).offset();
				var h	= this.filesView.getHeight()/2;

				this.filesView.scrollBy(0, off.top-h, true);
			}
		}

		if (this.showFileDialogCfg.latestSaved)
		{
			$$('#'+viewId+' .chossenFA_FILE').removeClass('chossenFA_FILE_SAVED');
			try{
				Ext.get(this.flyIdOfFilePre+this.showFileDialogCfg.latestSaved).addCls('chossenFA_FILE_SAVED');
			} catch (e){}
		}

	},

	initSelection: function()
	{
		var preSel 	= 0;
		var me 		= this;

		if ((this.showFileDialogCfg) && (this.showFileDialogCfg.preSelect)) {
			preSel = this.showFileDialogCfg.preSelect;
		} else
		{
			preSel = Ext.util.Cookies.get('fa_last_s_id');
		}

		try {
			if (this.showFileDialogCfg.preSelectDir)
			{
				preSel = this.showFileDialogCfg.preSelectDir;
			}
		} catch (e) {}


		if (this.limitDir) {
			preSel = this.limitDir;
		}

		if (preSel)
		{
			this.panelDir.setDisabled(false);
			xframe.ajax({
				scope:this,
				url: '/xgo/xplugs/xredaktor/ajax/storage/getPathOfDir',
				params: {
					s_id: preSel
				},
				success: function(json) {

					if (json.path2expand == '/')
					{
						this.panelDir.setDisabled(false);
						return;
					}

					this.panelDir.selectPath('/0'+json.path2expand,'s_id','/',function(success,node){


						me.panelDir.getSelectionModel().select(node);
						Ext.defer(function(){
							me.panelDir.setDisabled(false);
						},100);

						me.handleRefresh();

					});
				},
				failure: function() {
					me.tree.setDisabled(false);
				}
			});
		}

	},

	selectionChange: function(dv, nodes)
	{
		this.currentSelections = nodes;

		var l = nodes.length, s = l !== 1 ? 's' : '';
		this.filesView.up('panel').setTitle(this.filesView.initialConfig.title+' (' + l + ' item' + s + ' selected)');

		if (this.showFileDialogMode)
		{
			this.button_select.setDisabled(true);
			if (l > 0) this.button_select.setDisabled(false);
		}

		if (l == 0)
		{
			this.afterActionIdOfFile = false;
			this.btn_files_del.setDisabled(true);
			this.btn_files_zip.setDisabled(true);
			this.btn_files_open.setDisabled(true);
		} else {

			this.btn_files_del.setDisabled(false);
			this.btn_files_zip.setDisabled(false);

			this.afterActionIdOfFile = nodes[0].data.s_id;

			if (l != 1)
			{
				this.btn_files_open.setDisabled(true);
			} else
			{
				this.btn_files_open.setDisabled(false);
			}

		}

		// FILE INFO
		if (l == 1) {
			this.showFileInfo(nodes[0]);
		}  else {
			this.showFileInfo(false);
		}

	},


	getStorageId: function()
	{
		return 1;
	},


	reloadPanelFiles: function()
	{
		this.filesView.getStore().load();
		this.showFileInfo(this.latestSel);
	},

	storeModUpdate: function()
	{
		this.viewStore.proxy.extraParams['sort'] = Ext.encode([{"property":this.sorterAddOn.property,"direction":this.sorterAddOn.direction}]);
	},

	storeModSortInit: function() {

		var latestSortSettings =  Ext.util.Cookies.get('fa_sortSettings');

		if (latestSortSettings)
		{
			this.sorterAddOn = Ext.decode(latestSortSettings);
		} else
		{
			this.sorterAddOn = {"property":"s_id","direction":"ASC"};
		}

		this.storeModUpdate();
	},

	storeModSort: function(key,value) {

		try {
			if (this.sorterAddOn['property']) {}
		} catch (e)
		{
			this.sorterAddOn = {"property":"s_id","direction":"ASC"};
		}

		this.sorterAddOn[key] = value;

		Ext.util.Cookies.set('fa_sortSettings',Ext.encode(this.sorterAddOn));

		this.storeModUpdate();
		this.viewStore.load();
	},


	addStoreParams: function(storeParams,loadIt)
	{
		this.viewStore.proxy.extraParams['extraParams'] = Ext.encode(storeParams);
		if (typeof loadIt != 'undefined') {
			if (loadIt) this.viewStore.load();
		}
	},

	getPanelFiles: function(store) {

		var me 				= this;
		var s_storage_scope = this.getStorageId();
		var s_id 			= 0;

		var store = Ext.create('Ext.data.Store', {
			autoLoad: false,
			pageSize: 100,
			fields: ['s_id','webSrc', 's_name', 'scaleSrc','s_mimeType','s_media_h','s_media_w','s_fileSizeBytes','s_fileSizeBytesHuman', {name: 'leaf', defaultValue: false}, {name: 's_dir', defaultValue: 'N'}],
			proxy: {
				type: 'ajax',
				url : '/xgo/xplugs/xredaktor/ajax/storage/loadFiles',
				reader: {
					type: 'json',
					root: 'root',
					totalProperty: 'totalCount'
				}
			},
			listeners: {
				beforeload: function(store, operation){
				}
			}
		});

		this.viewStore = store;

		store.proxy.extraParams = {
			s_id: s_id,
			s_storage_scope: s_storage_scope
		};

		this.storeModSortInit();

		store.load();


		var latestViewSize =  Ext.util.Cookies.get('fa_viewSize');
		if (latestViewSize)
		{
			this.viewSize = latestViewSize;
		}

		var tpl = new Ext.XTemplate(

		'<tpl if="this.viewMode == 1">',
		'<div class="storageView">',
		'</tpl>',

		'<tpl if="this.viewMode == 2">',
		'<div class="storageView storageView_size_2">',
		'</tpl>',

		'<tpl if="this.viewMode == 3">',
		'<div class="storageView storageView_size_3">',
		'</tpl>',


		'<tpl for=".">',
		'<div class="thumb-wrap" id="'+this.flyIdOfFilePre+'{s_id}">',

		'<tpl if="this.viewMode == 1">',
		'<div class="thumb"><img data-original="{scaleSrc}/80/60" src="/xgo/xplugs/xredaktor/media/img/lazy_load_80x60.jpg" title="ID:{s_id} - {s_name:htmlEncode}"></div>',
		'</tpl>',

		'<tpl if="this.viewMode == 2">',
		'<div class="thumb size2"><img data-original="{scaleSrc}/160/120"  src="/xgo/xplugs/xredaktor/media/img/lazy_load_160x120.jpg"  title="ID:{s_id} - {s_name:htmlEncode}"></div>',
		'</tpl>',

		'<tpl if="this.viewMode == 3">',
		'<div class="thumb size3"><img data-original="{scaleSrc}/320/240"  src="/xgo/xplugs/xredaktor/media/img/lazy_load_320x240.jpg"  title="ID:{s_id} - {s_name:htmlEncode}"></div>',
		'</tpl>',

		'<span class="x-editable">{shortName:htmlEncode}</span>',
		'</div>',
		'</tpl>',
		'</div>',
		'<div class="x-clear"></div>',
		{
			viewMode: this.viewSize,
			getCurrentViewMode: function() {
				return this.viewMode;
			},
			setViewMode: function(viewMode) {
				if(viewMode > 3 || viewMode < 1)
				viewMode = 1;
				Ext.util.Cookies.set('fa_viewSize',viewMode);
				this.viewMode = viewMode;
			}
		});

		if (this.showFileDialogMode)
		{
			this.multiSelect = this.showFileDialogCfg.multiSelect || false;
		}


		store.on('update',function(store,r) {

			var s_id 	= r.data.s_id;
			var s_name 	= r.data.name;

			xframe.ajax({
				scope: this,
				url: '/xgo/xplugs/xredaktor/ajax/storage/updateName',
				params: {
					s_id: 	s_id,
					s_name: s_name
				},
				success: function(json) {

					if (json.overrideParam)
					{
						xframe.yn({
							title: json.title,
							msg: json.msg,
							scope: this,
							handler: function(feedback){

								if (feedback == 'yes') {


									xframe.ajax({
										scope: this,
										url: '/xgo/xplugs/xredaktor/ajax/storage/updateName',
										params: {
											s_id: 	s_id,
											s_name: s_name,
											userApproved: json.overrideParam
										},
										success: function(json) {
											store.load();
										},
										failure: function() {
											store.load();
										}
									});

								} else {
									store.load();
								}
							}
						});
					} else {
						store.load();
					}
				},
				failure: function() {
					console.info('ERRR');
					store.load();
				}
			});

		},this);




		var title = "Files";
		var view = Ext.create('Ext.view.View', {
			title: title,
			store: store,
			tpl: tpl,

			autoScroll: true,
			multiSelect: this.multiSelect,
			trackOver: true,
			overItemCls: 'x-item-over',
			itemSelector: 'div.thumb-wrap',
			emptyText: '<div class="noFiles">Empty Folder</div>',
			plugins: [
			Ext.create('Ext.ux.DataView.DragSelector', {}),
			Ext.create('Ext.ux.DataView.LabelEditor', {
				dataIndex: 'name',
				listeners: {
					scope: me,
					canceledit: function() {
					},
					complete: function(tf,fname_new,fname_old) {
					}
				}
			})
			],
			prepareData: function(data) {

				/*
				Ext.apply(data, {
				shortName: Ext.util.Format.ellipsis(data.s_name, 15),
				sizeString: Ext.util.Format.fileSize(data.size),
				dateString: Ext.util.Format.date(data.lastmod, "m/d/Y g:i a")
				});
				*/

				Ext.apply(data, {
					shortName:	data.s_name,
					sizeString: Ext.util.Format.fileSize(data.size),
					dateString: Ext.util.Format.date(data.lastmod, "d.m.Y h:i:s")
				});


				return data;
			},
			listeners: {
				scope: this,
				selectionchange: this.selectionChange,
				itemdblclick: function(view,r){
					this.currentSelection = [r.data];
					this.doAction();
				},
				refresh: this.handleRefresh,
				afterrender: function () {


					var dz = new Ext.view.DragZone({
						view: view,
						ddGroup: 'dirDropper',
						dragText: 'Move or copy file(s) ...'
					});


					this.panelDir.getView().on('beforedrop', function(node, data, overModel, dropPosition, dropHandlers) {

						if (data.records.length == 0) return false;
						if (data.records[0].data['s_dir'] == 'Y') return true;

						// Defer the handling
						dropHandlers.wait = true;
						dropHandlers.cancelDrop();

						Ext.MessageBox.show({
							scope: this,
							title: 'Move or Copy ?',
							msg: 'Do you want to move or copy the file(s) ?',
							buttons: Ext.MessageBox.YESNOCANCEL,
							buttonText:{
								yes: "Move",
								no: "Copy"
							},
							fn: function(btn) {

								//dropHandlers.cancelDrop();
								//dropHandlers.processDrop();

								var records = data.records;
								var father	= 0;

								try {
									father	= Ext.get(node).getAttribute('data-recordid');
								} catch (e) {
									return;
								}

								if (dropPosition != 'append') {
									father = this.panelDir.getStore().getNodeById(Ext.get(node).getAttribute('data-recordid')).parentNode.data.s_id;
								}

								var mode = "";
								var txt  = "";

								switch (btn)
								{
									case 'yes': // verschieben
									mode = "move";
									txt = "Move";
									break;
									case 'no': // kopieren
									mode = "copy";
									txt = "Copy";
									break;
									default: // abbruch
									return;
								}


								var pipe = [];
								Ext.each(records,function(obj){
									pipe.push({s_id:obj.data.s_id,newFatherId:father,mode:mode});
								},this);

								console.info(pipe);

								var myMask = new Ext.LoadMask({target: this.fullView, msg:"'"+txt+"' is being processed ..."});
								myMask.show();

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
												txt.push('File <b>'+pack.s.s_name+'</b> already exists in the directory.');
											},this);
											xframe.alert('Files could not be moved',txt.join('<br>'));
										}
										store.load();
										myMask.hide();
									},

									failure: function() {
										store.load();
										myMask.hide();
									}
								});

							}
						});
					},this);


				}
			}
		});


		this.filesView 		= view;
		var viewSizeText 	= 'Normal';













		var text_1 = "Normal";
		var text_2 = "Medium";
		var text_3 = "Large";

		switch (this.viewSize)
		{
			case '2':
			viewSizeText 	= text_2;
			break;
			case '3':
			viewSizeText 	= text_3;
			break;
			default:
			viewSizeText 	= text_1;
			break;
		}

		this.btn_files_del = Ext.create('Ext.Button', {
			disabled: true,
			text:'Delete',
			iconCls:'xf_del',
			scope: this,
			handler: function() {

				xframe.yn({
					title:'Confirm',
					msg: 'Do you really want to delete the selected Files?',
					scope:this,
					handler: function(btn)
					{
						if (btn != 'yes') return;
						this.processDelFiles(this.filesView);
					}
				});

			}
		});

		this.btn_files_zip = Ext.create('Ext.Button', {
			disabled: true,
			text:'Zip & Download',
			iconCls:'xf_zip_file',
			scope: this,
			handler: function() {
				this.processZipFiles(this.filesView);
			}
		});


		this.btn_files_open = Ext.create('Ext.Button', {
			disabled: true,
			text:'Open File',
			iconCls:'xf_open',
			scope: this,
			handler: function() {
				this.processOpenFiles(this.filesView);
			}
		});

		var sort_property 	= this.sorterAddOn['property'];
		var sort_direction	= this.sorterAddOn['direction'];

		this.pager = Ext.id();

		return {
			bbar: [{
				id: this.pager,
				flex: 1,
				xtype: 'pagingtoolbar',
				store: store,
				dock: 'bottom',
				displayInfo: true
			}],
			tbar: [{
				text:'Reload',
				iconCls:'xf_reload',
				scope: this,
				handler: function() {
					this.reloadPanelFiles();
				}
			},'-',this.btn_files_del,'-',this.btn_files_zip,this.btn_files_open,'-','Search:',{
				xtype:'xfsearchfield',
				paramName : '_query',
				store: store,
				//url: 'searcher',
				flex: 1,
				extraParams:{
					s_id: 0,
					s_storage_scope: s_storage_scope
				}
			},{
				xtype: 'splitbutton',
				columns: 2,
				defaults: {
					scale: 'small'
				},
				text: viewSizeText,
				iconCls: 'xf_resize',
				menu: [{
					text: text_1,
					iconCls: 'xf_resize',
					scope: this,
					handler: function(btn) {
						view.tpl.setViewMode(1);
						view.refresh();
						btn.up('splitbutton').setText(btn.text);
					}
				},{
					text: text_2,
					iconCls: 'xf_resize',
					scope: this,
					handler: function(btn) {
						view.tpl.setViewMode(2);
						view.refresh();
						btn.up('splitbutton').setText(btn.text);
					}
				},{
					text: text_3,
					iconCls: 'xf_resize',
					scope: this,
					handler: function(btn) {
						view.tpl.setViewMode(3);
						view.refresh();
						btn.up('splitbutton').setText(btn.text);
					}
				}]
			},{
				xtype: 'splitbutton',
				columns: 2,
				defaults: {
					scale: 'small'
				},
				text: 'Sort',
				iconCls: 'xf_sort_asc',
				menu: [{
					text: 'ID',
					checked: (sort_property == 's_id'),
					group: 'sort_what',
					scope: this,
					handler: function(btn) {
						this.storeModSort('property','s_id');
					}
				},{
					text: 'Alphabetically',
					checked: (sort_property == 's_name'),
					group: 'sort_what',
					scope: this,
					handler: function(btn) {
						this.storeModSort('property','s_name');
					}
				},{
					text: 'Modification Date',
					checked: (sort_property == 's_lastmod'),
					group: 'sort_what',
					scope: this,
					handler: function(btn) {
						this.storeModSort('property','s_lastmod');
					}
				},{
					text: 'Filesize',
					checked: (sort_property == 's_fileSizeBytes'),
					group: 'sort_what',
					scope: this,
					handler: function(btn) {
						this.storeModSort('property','s_fileSizeBytes');
					}
				},'-',{
					checked: (sort_direction == 'DESC'),
					group: 'sort_dir',
					text: 'Descending',
					scope: this,
					handler: function(btn) {
						this.storeModSort('direction','DESC');
					}
				},{
					checked: (sort_direction == 'ASC'),
					group: 'sort_dir',
					text: 'Ascending',
					scope: this,
					handler: function(btn) {
						this.storeModSort('direction','ASC');
					}
				}]
			}],
			title: title,
			xtype: 'panel',
			region: 'center',
			layout: 'fit',
			items: [view]
		};
	},


	getFileExtension : function(filename)
	{
		if (filename.indexOf('.') == -1) return false;
		return filename.split('.').pop();
	},

	getPanelUpload: function() {


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

		var cb_auto_renew = Ext.widget({
			xtype: 'checkbox',
			boxLabel: 'Auto Rename Files',
			checked: true,
			disabled: true,
		});

		//var btn = Ext.

		var uploadData = [];
		var uploadGridInfo = xframe_pattern.getInstance().genMatrix({
			region: 'center',
			height:300,
			collapseMode:'mini',
			data: uploadData,
			tools: false,
			bbar: [cb_auto_renew],
			records_move: false,
			plugin_numLines: true,
			records2array:true,
			autoDestroyStore:false,
			button_add: false,
			button_del: false,
			button_save: false,
			toolbar_bottom: [pAll],
			xstore: {
				pid: 	'f_id',
				fields: [
				//				{name: 'f_status', 		text:'Status', 		type:'string', flex:1},
				{name: 'f_time', 			text:'Timestamp', 		type:'string', width:100},
				{name: 'f_filename', 		text:'Local - filename', 		type:'string', flex:1},
				{name: 'f_filenameRemote', 	text:'Server - filename', 		type:'string', flex:1},
				{name: 'f_percent', 		text:'Upload',	type:'string', width: 70,scope:this}
				]
			}
		});

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
				f_status: 'INIT',
				f_time: str,
				f_filename: f_filename,
				f_filenameRemote: f_filename,
				f_percent: 0
			});

			var autoRename = cb_auto_renew.getValue();

			r.fileHook = ''+vId;
			r.currentDir = ''+me.currentDir;
			r.url = uploadUrl+'?s_id='+me.currentDir+'&s_storage_scope='+me.getStorageId()+'&autoRename='+(autoRename?'1':'0');


			xframe.ajax({
				scope:this,
				url: '/xgo/xplugs/xredaktor/ajax/storage/fileNameExists',
				params: {
					s_id: me.currentDir,
					s_storage_scope: me.getStorageId(),
					f_filename: f_filename
				},
				success: function(json) {

					return;
					//var gr = uploadGridInfo.getStore().getById(r.fileHook);
					//gr.set({f_time:json.ts});

					if (json.file_exists) {


						if (!autoRename)
						{



							Ext.MessageBox.show({
								icon: 'x-message-box-question',
								title: 'Achtung: Datei existiert bereits auf dem Server',
								msg: 'Was möchten Sie tun ?',
								buttons: Ext.MessageBox.YESNOCANCEL,
								width: 400,
								buttonText:{
									yes: 	"<span style='color:green;'>Automatisch-Umbenennen</span>",
									no: 	"<span style='color:red;'>Überschreiben</span>"
								},
								fn: function(what2do) {

									if (what2do == 'no') { // over


										Ext.MessageBox.show({
											icon: 'x-message-box-question',
											title: 'Achtung: Datei wird überschrieben !',
											msg: 'Bitte Vorgang bestätigen ',
											buttons: Ext.MessageBox.YESNO,
											buttonText:{
												yes: 	"<span style='color:red;font-weight:bold;'>Überschreiben</span>",
												no: 	"<span style='font-weight:bold;'>Abbruch</span>"
											},
											fn: function(what2do) {

												if (what2do == 'yes')
												{

													var gr = uploadGridInfo.getStore().getById(r.fileHook);
													gr.set({f_filenameRemote:"<span style='color:red;'>Überschrieben</span>"});

													r.url = uploadUrl+'?s_id='+me.currentDir+'&s_storage_scope='+me.getStorageId()+'&autoRename=0';
													r.submit();
												}
											}
										});




									} else if (what2do == 'yes')
									{
										var gr = uploadGridInfo.getStore().getById(r.fileHook);
										gr.set({f_filenameRemote:json.final_name});

										r.url = uploadUrl+'?s_id='+me.currentDir+'&s_storage_scope='+me.getStorageId()+'&autoRename=1';
										r.submit();
									}


								}
							});

						} else {

							var gr = uploadGridInfo.getStore().getById(r.fileHook);
							gr.set({f_filenameRemote:json.final_name});

							r.submit();
						}

					} else {

						// FILE NOT EXISTS !!
						console.info('UPLOAD',r);
						r.submit();

					}
				},
				failure: function() {
				}
			});


		}


		var gui = Ext.widget({
			xtype: 'panel',
			region: 'south',
			layout: 'border',

			height: 600,
			split: true,


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
						autoUpload: true
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

					}).bind('fileuploadalways2',function (e, data) {

						/*
						if (data.result.success)
						{
						var s_id = data.result.s_id;

						if (data.currentDir == me.currentDir) // same dir view ....
						{
						me.filesView.getStore().load({
						scope: me,
						callback: function(records, operation, success) {

						var r = this.filesView.getStore().findRecord('s_id',s_id);
						if (r)
						{
						this.filesView.getSelectionModel().select(r);

						var idx = this.flyIdOfFilePre+s_id;
						Ext.get(idx).addCls('uploadedFA_FILE');

						var off = $$('#'+idx).offset();
						var h	= this.filesView.getHeight()/2;

						this.filesView.scrollBy(0, off.top-h, true);

						Ext.defer(function(){
						Ext.get(idx).removeCls('uploadedFA_FILE');
						},500,this);


						Ext.defer(function(){

						var vId 		= data.fileHook;
						var deleteR 	= uploadGridInfo.getStore().getById(vId);
						uploadGridInfo.getStore().remove(deleteR);

						},1000,this);

						}
						}
						});
						}

						} else {
						xframe.alert('UPLOAD FAILED',data.result.msg);
						}

						*/

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
							me.reloadPanelFiles.call(me);
						}

					});

				}
			}
		});


		return gui;
	},


	showFileInfo : function(r) {

		this.latestSel = r;
		this.panelInfo.down('button').setDisabled(false);

		if (!r) {

			this.panelTags.setDisabled(true);
			this.panelInfo.setDisabled(true);

			this.panelInfo.setSource({});
			return;
		}

		this.panelTags.setDisabled(false);
		this.panelInfo.setDisabled(false);

		this.panelInfo.setLoading('Loading File Info');
		this.panelTags.fileSelect(r);

		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/storage/getFileInfo',
			params: {
				s_id: r.data.s_id
			},
			stateless: function(succ,json) {
				this.panelInfo.setLoading(false);

				if (succ)
				{
					this.panelInfo.setSource(json.file_info);
				}
			}
		});

		if (typeof this.extraLoaders == 'function')
		{
			this.extraLoaders.call(this.extraLoadersScope,r);
		}

	},

	getPanelInfo: function() {

		var pg = Ext.create('Ext.grid.property.Grid', {
			bbar: ['->',{
				disabled: true,
				text: 'Reload',
				iconCls: 'xf_reload',
				scope: this,
				handler: function() {
					this.showFileInfo(this.latestSel);
				}
			}],
			title: 'File Infos',
			sortableColumns: false,
			source: {
			}
		});

		return pg;
	},

	getPanelTags : function()
	{
		var s_storage_scope = this.getStorageId();
		var site_id 		= 1;

		if (typeof r == 'undefined') 		r = {s_id:-1};
		if (typeof r.s_id == "undefined") 	r.s_id  -1;

		var s_id 		= r.s_id;
		var me 			= this;

		var fe_langs 	= xredaktor.getInstance().getLanguageConfigFE(site_id);

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
			title: 'Alt-Tag',
			height:300,
			disabled:true,
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
			toolbar_bottom : ['->',{
				iconCls:'xf_reload',
				text:'Reload',
				handler:function(){
					grid.loadAlts(latestR_sid);
				}
			}],
			auto_flush: {
				scope: me,
				handler: function(oldCfg,newCfg)
				{
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
						stateless: function(succ) {
							grid.setDisabled(false);
						}
					});
				}
			},
			xstore: {
				pid: 	'a_id',
				fields: [{name: 'a_lang', text:'Language', type:'string', width: 100},
				{name: 'a_alt', text:'Alternate-Tag',	type:'string', flex:1, editor: {allowBlank: false,xtype: 'textfield'}}
				]
			}
		});

		grid.loadAlts = function(s_id)
		{
			grid.setLoading('Loading File infos...');
			xframe.ajax({
				url: '/xgo/xplugs/xredaktor/ajax/storage/getAlts',
				params: {
					s_id: s_id
				},
				stateless: function(succ,json) {

					grid.setLoading(false);
					if (!succ) return false;

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
			latestR_sid = s_id = r.data.s_id;
			grid.loadAlts(s_id);
		}

		return grid;
	},

	getMainPanel : function(cfg) {

		if (typeof cfg == 'undefined') cfg = {};

		this.limitDir		= 0;
		this.panelDir 		= this.getPanelDirs();

		if (typeof cfg != 'undefined')
		{

			if (typeof cfg.extraLoaders == 'function')
			{
				this.extraLoaders 		= cfg.extraLoaders;
				this.extraLoadersScope 	= cfg.scope || this;
			}

			switch(cfg.guiMode)
			{
				case 'FILES_ONLY':
				this.limitDir = cfg.dir_s_id;
				this.panelDir.setVisible(false);
				break;
				default: break;
			}
		}

		this.panelFiles 	= this.getPanelFiles(this.panelDir.getStore());

		if (typeof cfg.storeParams != 'undefined')
		{
			this.addStoreParams(cfg.storeParams);
		}

		this.panelUpload	= this.getPanelUpload();

		this.panelInfo		= this.getPanelInfo();
		this.panelTags 		= this.getPanelTags();

		this.panelDoc		= Ext.widget({
			xtype: 'tabpanel',
			region: 'center',
			activeTab: 0,
			items: [this.panelInfo,this.panelTags]
		});

		this.panelRight		= Ext.widget({
			xtype:'panel',
			layout: 'border',
			region: 'east',
			width: 300,
			split: true,
			items: [this.panelUpload,this.panelDoc],
			listeners: {
				scope: this,
				buffer: 1,
				resize: function() {
					var h = this.panelRight.getHeight();
					this.panelUpload.setHeight(h/2);
				}
			}
		});

		var gui = Ext.widget({
			xtype: 'panel',
			layout: 'border',
			region: 'center',
			items: [this.panelDir,this.panelFiles,this.panelRight],
			listeners: {
				scope: this,
				afterrender: function() {

					this.panelInfo.setDisabled(true); // bug of extjs, if tab panel disabled is rendered

					if (!this.showFileDialogMode) {
						this.initSelection();
					}
				}
			}
		});

		this.fullView = gui;

		return gui
	},


	/* ###### */


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





	getDirPanel : function(cfg)
	{
		var me = this;
		this.checkAndSaveCfg(cfg);

		var fields = [
		{name: 's_name',	xgroup:['Minimal','Standard','Sprachenspezifisch'],	text:'Directory',	type:'string', folder: true, editor: {allowBlank: false,xtype: 'textfield'}, width: this.getWidthByPercentage(25)},
		{name: 's_id',		xgroup: 'Standard',	text:'ID',	type:'string', 	hidden: true},
		{name: 's_lastmod',	xgroup: 'Standard',	text:'Last Modification',	type:'string' , hidden: true},
		{name: 's_dir',		xgroup: '',	text:'is Dir',	type:'string' , hidden: true, defaultValue:'Y'}
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
			cfgADD_text: 'Create directory',
			cfgADD_iconCls: 'xf_dir_create',
			ddGroup: this.ddGroup,
			rootVisible:false,
			width: this.getWidthByPercentage(30),
			rootTextName: 'Root',
			bbar_add: bbar,
			bbar_add2: [{
				id: me.delButtonDirId,
				text:'Delete',
				iconCls:'xf_del',
				scope:this,
				disabled:true,
				handler:function()
				{
					var s_id = Ext.getCmp(me.delButtonDirId).kickS_id;
					var s_name = Ext.getCmp(me.delButtonDirId).kickS_name;
					xframe.yn({
						title:'Confirm',
						msg: 'Delete directory "'+s_name+'" ?',
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
				text:'Delete directory',
				scope:this,
				handler:function(crap,reloadMeFunc)
				{
					var s_id = crap.s_id;
					var s_name = crap.s_name;

					if (s_id == 0)
					{
						xframe.alert('Alert','You cannot delete the root directory !');
					}

					xframe.yn({
						title:'Confirm',
						msg: 'Delete directory "'+s_name+'" ?',
						scope:this,
						handler: function(btn)
						{
							if (btn != 'yes') return;
							this.processDelDir(this.tree.getStore(),s_id,reloadMeFunc);
						}
					});

				}
			},{
				disabled: true,
				iconCls:'xf_dir_sync',
				text:'Synchronise Disk with DB',
				scope:this,
				handler:function(crap,reloadMeFunc)
				{
					var s_storage_scope 	= crap.s_storage_scope;
					var s_id 	= crap.s_id;
					var s_name 	= crap.s_name;

					xframe.yn({ 
						title:'Confirm',
						msg: 'Synchronise "'+s_name+'"?',
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
				nameField: 's_name',
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
	}


};