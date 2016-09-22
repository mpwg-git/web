/*********************************************************************************************************
*******
*******		TREE
*******
*******
*/

xframe_pattern_.prototype.genTree = function(cfg) {


	console.log("tree config", cfg);

	if (cfg.justDblClick)
	{
		cfg.button_save = false;
		cfg.records_move = false;
		cfg.plugin_numLines = true;
		cfg.button_add = false;
		cfg.button_del = false;
	}

	if (cfg.xstore.params)
	{
		if (!Ext.isObject(cfg.xstore.loadParams))	cfg.xstore.loadParams 	= {};
		if (!Ext.isObject(cfg.xstore.insertParams)) cfg.xstore.insertParams = {};
		if (!Ext.isObject(cfg.xstore.updateParams)) cfg.xstore.updateParams = {};
		if (!Ext.isObject(cfg.xstore.removeParams)) cfg.xstore.removeParams = {};

		Ext.iterate(cfg.xstore.params,function(k,v){
			cfg.xstore.loadParams[k] 	= v;
			cfg.xstore.insertParams[k] 	= v;
			cfg.xstore.updateParams[k] 	= v;
			cfg.xstore.removeParams[k] 	= v;
		},this);
	}

	var me = this;
	var iconsPrefix = "xf_tree";

	if (cfg.iconsPrefix)
	{
		iconsPrefix = cfg.iconsPrefix;
	}

	var removeButtonItemId = Ext.id();
	var store = false;
	var tree = false;

	var cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {
		clicksToEdit: 2,
		beforeEdit : function(event) {

			if (event.column && event.column.isCheckerHd) {
				return false;
			}
			return true; }
	});

	var model_id = Ext.id();
	var columns = [];


	var xgroupsCnt = 0;
	var xgroups = {};

	function handleObject(o) {

		var tmp = {
			text: o.text,
			dataIndex: o.name,
			sortable: o.sortable || true
		};

		if (o.xgroup) {
			if (!Ext.isArray(o.xgroup)) o.xgroup = [o.xgroup];
			Ext.each(o.xgroup,function(oxg){
				xgroupsCnt++;
				if (typeof xgroups[oxg] == "undefined")
				{
					xgroups[oxg] = [];
				}
				xgroups[oxg].push(o);
			},this);
		}

		if (o.folder)
		{
			tmp.xtype = 'treecolumn';
			//cfg.xstore.nameField = o.name;
		}

		if (o.renderer && o.scope)
		{
			tmp.renderer = function(){
				return o.renderer.apply(o.scope,arguments);
			}
		} else {

			if (o.renderer)
			{
				tmp.renderer = o.renderer;
			}

		}




		if (o.editor)
		{
			if (o.editor === true)
			{
				switch (o.type)
				{
					case 'int':
					tmp.editor = {xtype: 'numberfield',allowDecimals:false};
					break;
					default: o.editor = false;
				}
			} else {
				tmp.editor = o.editor;
			}
		}

		if (o.hidden)
		{
			tmp.hidden = true;
		}

		if (o.width)
		{
			tmp.width = o.width;
		}

		if (o.xtype)
		{
			switch(o.xtype)
			{

				case 'button':
				if (typeof o.button.renderer == 'function')
				{
					tmp = Ext.apply(tmp,{
						renderer : function(v,cls,r) {
							return o.button.renderer.call(o.button.scope,o,v,r)
						}
					});
				} else
				{
					tmp = Ext.apply(tmp,{
						renderer : function(v,cls,r)
						{
							var idx = Ext.id();
							setTimeout(function(){
								try{
									Ext.get(idx).addClsOnOver(cfg.cellButtonUpCls);
									Ext.get(idx).on('click',o.button.handler,o.button.scope);
								} catch(e){}
							},1);
							return "<div class='"+cfg.cellButtonCls+"' id='"+idx+"' >"+o.button.text+"</div>";
						}
					});
				}
				break;

				case 'combo':

				var cbStore = new Ext.data.ArrayStore({
					fields: ['id','v'],
					data:o.store
				});

				tmp = Ext.apply(tmp,{
					renderer : function(v) {
						try{
							return cbStore.getById(v).data.v;
						} catch(e) {return v;}
					},
					editor: {
						xtype: 'combobox',
						typeAhead: true,
						triggerAction: 'all',
						selectOnTab: true,
						store: o.store,
						//lazyRender: true,
						listClass: 'x-combo-list-small',
						minWidth: 300,
						listeners: {
							focus: function(cb)
							{
								cb.expand();
							}
						}
					}
				});

				break;

				case 'rcombo':

				var rcombo_model_id = Ext.id();

				Ext.define(rcombo_model_id, {
					extend: 'Ext.data.Model',
					fields: [
					{type: 'string', name: 'k'},
					{type: 'string', name: 'v'}
					]
				});

				var rstore = Ext.create('Ext.data.Store', {
					autoLoad: true,
					//autoDestroy: true,
					model: rcombo_model_id,
					proxy: {
						type: 'ajax',
						url: o.store,
						reader: {
							root: 'root',
							totalProperty: 'totalCount'
						}
					}
				});

				tmp = Ext.apply(tmp,{
					renderer : function(v) {
						try{
							return rstore.findRecord('k',v).data.v;
						} catch(e) {}
					},
					editor: {
						xtype: 'combobox',
						displayField: 'v',
						valueField: 'k',
						typeAhead: true,
						triggerAction: 'all',
						selectOnTab: true,
						store: rstore,
						//lazyRender: true,
						listClass: 'x-combo-list-small'
					}
				});

				break;
				default: break;
			}
		}

		if (typeof o.flex == 'undefined') {
			if (o.width)
			{

			} else
			{
				tmp.flex = 1;
			}
		}

		return tmp;
	}

	var storeFields = [];

	Ext.each(cfg.xstore.fields,function(o){

		var tmp = false;
		if (o.columns) {

			var tmp2 = [];
			Ext.each(o.columns,function(o2){
				tmp2.push(handleObject(o2));
			},this);

			var tmp = {
				text: o.text,
				columns: tmp2,
				width: 100
			};

		} else
		{
			storeFields.push(o);
			tmp = handleObject(o);
		}

		if (tmp)
		{
			if (!tmp.width) {
				//tmp.flex = 1;
			}

			if (tmp.hidden) {
				tmp.hidden = false;
				tmp.listeners = {
					single: true
					,afterrender: function() {
						this.hide();
					}
				};
			}

			columns.push(tmp);
		}

	},this);

	storeFields.push({
		name:'iconCls',type:'string', defaultValue: iconsPrefix+'_node'
	});


	Ext.define(model_id, {
		extend: 'Ext.data.Model',
		fields: storeFields,
		idProperty : cfg.xstore.pid
	});

	var root_cfg = cfg.root_cfg || {
		expanded: true
	};

	root_cfg['id'] 				= 0;
	root_cfg[cfg.xstore.pid] 	= 0;
	root_cfg[cfg.xstore.nameField] = cfg.rootTextName || 'Root';

	console.log("root cfg", root_cfg);

	var extraParams = {};

	if (Ext.isObject(cfg.xstore.loadParams))
	{
		Ext.iterate(cfg.xstore.loadParams,function(k,v){
			extraParams[k] = v;
		},this);
	}

	store = Ext.create('Ext.data.TreeStore', {
		model: model_id,
		proxy: {
			type: 'ajax',
			url: cfg.xstore.load,
			extraParams : extraParams
		},
		remoteFilter: true,
		remoteSort: true,
		root: root_cfg,

		folderSort: cfg.folderSort || false,
		listenerns : {
			move : function(node,oldParent,newParent,index,options)
			{
				console.info('move',arguments);

				var params = {
					id : node.data[cfg.xstore.pid],
					ofid: oldParent.data[cfg.xstore.pid],
					nfid: newParent.data[cfg.xstore.pid],
					sort: index
				};

				Ext.iterate(cfg.xstore.updateParams,function(k,v){
					params[k] 	= v;
				},this);

				xframe.ajax({
					scope: this,
					url: cfg.xstore.move,
					params: params,
					success: function(json){
					},
					failure: function(json){
						store.load();
					},
					failure_msg: xframe.lang('MOVE_NODE_FAILED')
				});


			}


		}
	});
	
	
	store.on('beforeload',function(s){
		s.proxy.extraParams['BE_LANG'] = xredaktor.getInstance().getCurrentBElang();
	},this);
	store.proxy.extraParams['BE_LANG'] = xredaktor.getInstance().getCurrentBElang();
	

	

	console.info('cfg.xstore.load',cfg.xstore.load);


	var selModel = Ext.create('Ext.selection.CheckboxModel', {
		//resizable: true,
		//flex: 1, //Will not be resized
		//	width: 10,
		// width: 10,

		/*
		headerWidth: 10,
		maxWidth: 10,
		minWidth: 10,
		*/

		singleSelect: true,
		checkOnly: false,
		sortable: false,
		listeners: {
			selectionchange: function(sm, selections) {
				if (typeof cfg.selModelButtons != 'undefined')
				{
					if (selections.length>0)
					{
						Ext.each(cfg.selModelButtons,function(id){
							if (!Ext.getCmp(id)) return;
							Ext.getCmp(id).setDisabled(false);
						},this);
					} else
					{
						Ext.each(cfg.selModelButtons,function(id){
							if (!Ext.getCmp(id)) return;
							Ext.getCmp(id).setDisabled(true);
						},this);
					}
				}
				if (cfg.button_del && !cfg.disableButtonDel)
				{
					tree.down('#'+removeButtonItemId).setDisabled(selections.length == 0);
				}
			}
		}
	});



	/*
	cfgADD_text: 'Verzeichnis anlegen'
	cfgADD_iconCls: 'xf_dir_create',
	*/

	function injectNewNode(record, fatherNodeId)
	{

		var params = {};
		if (Ext.isObject(cfg.xstore.insertParams))
		{
			Ext.iterate(cfg.xstore.insertParams,function(k,v){
				params[k] = v;
			},this);
		}

		if (typeof cfg.xstore.extraProxyValuesFn == 'function')
		{
			var extra = cfg.xstore.extraProxyValuesFn();
			Ext.iterate(extra,function(k,v){
				params[k] = v;
			},this);
		}


		params['fid'] = fatherNodeId;

		if (cfg.doNotAskForName)
		{

			// todo: copy paste auf single mcahen

			xframe.ajax({
				scope: this,
				url: cfg.xstore.insert,
				params: params,
				success: function(json){

					if (record.isLeaf())
					{
						var parent = record.parentNode;
						parent.removeAll();
						store.load({
							node: parent,
							callback: function() {
								//view.refresh();
								//store.getNodeById(fatherNodeId).expand();
							}
						});
					} else
					{
						if (!record.isLoaded())
						{
							record.expand();
						} else
						{
							record.removeAll();
							store.load({
								node: record,
								callback: function() {
									record.expand();
								}
							});
						}
					}


				},
				failure: function(json){
					store.load();
				},
				failure_msg: xframe.lang('NEW_NODE_FAILED')
			});

			return;
		}


		Ext.MessageBox.prompt(cfg.cfgADD_text ? cfg.cfgADD_text : 'Hinzufügen', cfg.txt_new || 'Name:', function(a,v){
			if (a != 'ok') return;

			params['name'] = v;

			xframe.ajax({
				scope: this,
				url: cfg.xstore.insert,
				params: params,
				success: function(json){

					if (record.isLeaf())
					{
						var parent = record.parentNode;
						parent.removeAll();
						store.load({
							node: parent,
							callback: function() {
								//view.refresh();
								//store.getNodeById(fatherNodeId).expand();
							}
						});
					} else
					{
						if (!record.isLoaded())
						{
							record.expand();
						} else
						{
							record.removeAll();
							store.load({
								node: record,
								callback: function() {
									record.expand();
								}
							});
						}
					}


				},
				failure: function(json){
					store.load();
				},
				failure_msg: xframe.lang('NEW_NODE_FAILED')
			});
		});
	}


	var startDel = function() {
		xframe.yn({
			title: 'Confirm',
			msg: 'Delete selected record(s) ?',
			scope: me,
			handler: function(btn)
			{
				if (btn != 'yes') return;
				var ids = [];

				Ext.each(selModel.getSelection(),function(r){
					ids.push(r.data[cfg.xstore.pid]);
				},this);

				var params = cfg.xstore.removeParams || {};
				params.ids = ids.join(',');

				if (typeof cfg.xstore.extraProxyValuesFn == 'function')
				{
					var extra = cfg.xstore.extraProxyValuesFn();
					Ext.iterate(extra,function(k,v){
						params[k] = v;
					},this);
				}

				var reloadedNodes = {};
				Ext.each(selModel.getSelection(),function(r) {
					if (!r.parentNode) return;
					var id2check = r.parentNode.id;
					if (reloadedNodes[id2check]) return;
					reloadedNodes[id2check] = r;
				},this);

				xframe.ajax({
					jsonFeedback: true,
					scope: this,
					url: cfg.xstore.remove,
					params: params,
					success: function(json){

						Ext.iterate(reloadedNodes,function(k,r) {
							store.load({node:r.parentNode});
						},this);

					},
					failure: function(json){
						store.load();
					},
					failure_msg: xframe.lang('REMOVE_OF_ITEMS_FAILED')
				});
			}
		});
	}

	var items = [{
		hidden: (!cfg.button_add),
		iconCls:cfg.cfgADD_iconCls ?  cfg.cfgADD_iconCls : iconsPrefix+'_add_inside',
		text: cfg.cfgADD_text ? cfg.cfgADD_text : 'Hinzufügen',
		scope: this,
		handler: function() {
			injectNewNode(menu.latestRecord,menu.latestRecord.data[cfg.xstore.pid]);
		}
	},{
		hidden:(!cfg.button_del),
		disabled: (!cfg.button_del),
		iconCls:iconsPrefix+'_del',
		text: 'Delete',
		scope: this,
		handler: function() {
			startDel();
		}
	},'-',{
		iconCls:'xf_reload',
		text: 'Reload',
		scope: this,
		handler: function() {
			var record = menu.latestRecord;
			store.load({ node: record});
		}
	}];

	if (cfg.cMenu)
	{
		items.push('-');
		Ext.each(cfg.cMenu,function(but){
			var bHandler = but.handler;
			but.handler = function()
			{
				bHandler.call(but.scope,menu.latestRecord.data,function(){
					var record = menu.latestRecord;
					var parent = record.parentNode;
					parent.removeAll();
					store.load({
						node: parent,
						callback: function() {
							store.getNodeById(fatherNodeId).expand();
						}
					});
				});
			}
			items.push(but);
		},this);
	}


	var menu = Ext.create('Ext.menu.Menu', {
		style: {
			overflow: 'visible'
		},
		items: items
	});

	var tree_def = {
		title: '',
		region: 'center',
		split: true,
		border:false,
		width: 500,
		multiSelect: false,
		rootVisible: cfg.rootVisible || false
	};

	var bbar = [];

	if (cfg.bbar_add)
	{
		Ext.each(cfg.bbar_add,function(eButton){
			bbar.push(eButton);
		},this);
	}

	if (cfg.toolbar_bottom)
	{
		Ext.each(cfg.toolbar_bottom,function(eButton){
			bbar.push(eButton);
		},this);
	}

	var tbar = cfg.toolbar_top || [];




	if (cfg.button_add)
	{
		tbar.push({
			iconCls: 'xf_add',
			text:'Add',
			tooltip: 'Am Ende Hinzufügen',
			handler: function(btn)
			{
				injectNewNode(tree.getRootNode(),0);
			}
		});
	}

	if (cfg.button_del && !cfg.disableButtonDel)
	{
		tbar.push({
			itemId: removeButtonItemId,
			//text:'Löschen',
			scope: this,
			tooltip:'Selektiere Datensätze löschen',
			text:'Delete',
			iconCls:'xf_grid_del',
			disabled: true,
			handler:function()
			{
				startDel();
			}
		});
	}

	tbar.push('-');
	tbar.push({
		scope: this,
		iconCls: 'xf_reload',
		//text:'Reload',
		tooltip: 'Reload',
		handler: function(btn)
		{
			btn.setDisabled(true);
			store.load({
				scope   : this,
				callback: function(records, operation, success) {
					btn.setDisabled(false);
				}
			});
		}
	});

	if (cfg.btnExpandAll)
	{
		tbar.push({
			iconCls: 'xf_expand',
			text: '',
			scope: this,
			handler: function(){
				console.info('tree',tree);
				tree.mask("bitte warten...");
				setTimeout(function(){
					tree.expandAll(function(){
						tree.unmask();
					},this);
				},1);
			}
		});
	}

	if (cfg.btnCollapseAll)
	{
		tbar.push({
			iconCls: 'xf_collapse',
			text: '',
			scope: this,
			handler: function(){
				tree.mask("bitte warten...");
				setTimeout(function(){
					tree.collapseAll(function(){
						tree.unmask();
					},this);
				},1);
			}
		});
	}


	if (cfg.tbar_add)
	{
		Ext.each(cfg.tbar_add,function(eButton){
			tbar.push(eButton);
		},this);
	}


	idOfSerachButton = Ext.id();
	if (xgroupsCnt>0)
	{

		var groupButtons = [];
		Ext.iterate(xgroups,function(k,v) {
			var tmp = Ext.create('Ext.Action',{
				text: k,
				iconCls:'xf_filter_columns',
				handler:function() {

					tree.mask("Bitte warten ...");

					setTimeout(function(){
						var fields = {}
						Ext.each(v,function(o){
							fields[o.name] = 1;
						},this);
						var hCt = tree.getView().getHeaderCt();
						Ext.each(hCt.getGridColumns(),function(o,indexxx){
							if (indexxx == 0) return;
							var dataIndex = o.dataIndex;
							if (o.isVisible() != (fields[dataIndex] == 1))
							{
								o.setVisible((fields[dataIndex] == 1));
							}
						},this);
						tree.unmask();

					},1);
				}
			});
			groupButtons.push(tmp);
		},this);

		var tmp = Ext.create('Ext.Action',{
			iconCls:'xf_filter_columns',
			text: 'Alle',
			handler:function() {

				tree.mask("Bitte warten ...");

				setTimeout(function(){
					var hCt = tree.getView().getHeaderCt();
					Ext.each(hCt.getGridColumns(),function(o){
						o.setVisible(true);
					},this);

					tree.unmask();

				},1);
			}
		});



		groupButtons.push('-');
		groupButtons.push(tmp);

		tbar.push({
			iconCls:'xf_filter',
			tooltip:'Spalten anpassen',
			menu:groupButtons
		});

	}

	if (cfg.xf_search_deep)
	{
		tbar.push({
			iconCls: 'xf_search_deep',
			enableToggle: true,
			tooltip: 'Erweiterte Suche',
			xtype: 'button',
			scope: this,
			handler: function(t) {



				store.proxy.extraParams['deepsearch'] = (t.pressed) ? 'y' : 'n';
				store.load();
			}
		});
	}

	if (cfg.iCannotSearch)
	{

	} else {



		var extraProxyValuesFn = false;
		if (typeof cfg.xstore.extraProxyValuesFn == 'function')
		{
			extraProxyValuesFn =  cfg.xstore.extraProxyValuesFn;
		}


		tbar.push({
			maskIt: function() { return tree; },
			id: idOfSerachButton,
			idOfNodes: cfg.xstore.pid,
			xtype:'xfsearchfield_struct',
			paramName : '_query',
			store: store,
			url: cfg.xstore.load,
			flex: 1,
			extraParams:cfg.xstore.loadParams,
			extraProxyValuesFn: extraProxyValuesFn
		});
	}






	var plugins = [];

	if (typeof cfg.button_save == 'undefined') cfg.button_save = true;
	if (cfg.button_save)
	{
		plugins.push(cellEditing);
	}

	var tools = [{
		type:'refresh',
		tooltip: 'Aktualisieren',
		handler: function(event, toolEl, panel){
			tree.getPath
			store.load();
		}
	}];

	if (cfg.button_add)
	{
		tools.push({
			type:'plus',
			tooltip: 'Am Ende Hinzufügen',
			handler: function(event, toolEl, panel){
				injectNewNode(tree.getRootNode(),0);
			}
		});
	}

	var viewConfig = {
		plugins: {
			ddGroup: cfg.ddGroup || Ext.id(),
			ptype: 'treeviewdragdrop'
		}
	};



	if (cfg.noDND) viewConfig = {};

	var tree_cfg = Ext.apply({

		tbar: tbar,
		bbar: bbar,
		border:false,
		//tools:tools,
		viewConfig: viewConfig,
		useArrows: true,
		store: store,
		plugins:plugins,
		listeners : {

			beforeitemdblclick2: function()
			{
				if (cfg.button_save) {
					return false;
				} else
				{
					return true;
				}
			},

			beforeedit: function(editor, e, eOpts ) {
				if (e.record.getId() == 0) return false;
				return true;
			},

			edit : function(plugin,action)
			{
				if (action.record.getId() == 0) return;

				if (action.value == action.originalValue)
				{
					return;
				}


				var extraParams = {
					id : action.record.getId(),
					idProperty: action.record.idProperty,
					field : action.field,
					value : action.value,
					originalValue : action.originalValue
				};

				if (Ext.isObject(cfg.xstore.updateParams))
				{
					Ext.iterate(cfg.xstore.updateParams,function(k,v){
						extraParams[k] = v;
					},this);
				}

				if (typeof cfg.xstore.extraProxyValuesFn == 'function')
				{
					var extra = cfg.xstore.extraProxyValuesFn();
					Ext.iterate(extra,function(k,v){
						extraParams[k] = v;
					},this);
				}

				xframe.ajax({
					jsonFeedback: true,
					scope: this,
					url: cfg.xstore.update,
					params: extraParams,
					success: function(json){
						action.record.set(json.record);
					},
					failure: function(json){
						store.load();
					},
					failure_msg: xframe.lang('Speichern fehlgeschlagen')
				});
			},
			itemcontextmenu : function(Ext_view_View, record,item,index,e,options)
			{
				//if (record.getId() == 0) return false;
				e.stopEvent();

				if (cfg.nodeMenu) {
					cfg.nodeMenu.latestRecord = record;
					cfg.nodeMenu.showAt(e.xy[0],e.xy[1]);

				} else
				{
					menu.latestRecord = record;
					menu.showAt(e.xy[0],e.xy[1]);
				}
			},

			checkchange : function(node,check, options){
				console.log("checked");

				if (cfg.xstore.checkchange)
				{
					console.log("calling");
					cfg.xstore.checkchange(node, check, options);
				}

			}

		},
		columns: columns
	},cfg,tree_def);

	tree_cfg.forceFit = false;

	console.info('cfg',cfg);

	if (cfg.button_del)
	{
		tree_cfg.selModel = selModel;
	}


	if (cfg.selModelButtons)
	{
		tree_cfg.selModel = selModel;
	}

	if (cfg.xtype == 'check-tree')
	{
		console.log("is checktree");
		tree_cfg['xtype'] = 'check-tree';
	}

	tree = Ext.create('Ext.tree.Panel', tree_cfg);
	tree.initSettings = cfg;

	store.treex = tree;

	if (!cfg.viewConfig) {
		tree.on('beforeitemmove',function(node,oldParent,newParent,index,options) {

			var params = {
				id : node.data[cfg.xstore.pid],
				ofid: oldParent.data[cfg.xstore.pid],
				nfid: newParent.data[cfg.xstore.pid],
				sort: index
			};

			Ext.iterate(cfg.xstore.updateParams,function(k,v){
				params[k] 	= v;
			},this);

			if (typeof cfg.xstore.extraProxyValuesFn == 'function')
			{
				var extra = cfg.xstore.extraProxyValuesFn();
				Ext.iterate(extra,function(k,v){
					params[k] = v;
				},this);
			}

			xframe.ajax({
				scope: this,
				url: cfg.xstore.move,
				params: params,
				success: function(json){
				},
				failure: function(json){
					store.load();
				},
				failure_msg: xframe.lang('MOVE_NODE_FAILED')
			});
			return true;
		},this);

	}


	tree.getSearcher = function() {
		return Ext.getCmp(idOfSerachButton);
	}

	tree.doSearcherAndSelect = function(v,callBack) {

		if (typeof callBack == 'undefined') {
			callBack = false;
		}

		var cmp = tree.getSearcher();
		var callBack2 = function() {

			if (typeof callBack == "function") {
				callBack();
			}
		}

		cmp.setValue(v);
		cmp.onTrigger2Click.call(cmp,false,true,callBack2);
	}



	return tree;
};