/*********************************************************************************************************
*******
*******		TREE
*******
*******
*/

xframe_pattern_.prototype.genTree = function(cfg) {


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

	var iconsPrefix = "xf_tree";

	if (cfg.iconsPrefix)
	{
		iconsPrefix = cfg.iconsPrefix;
	}

	var removeButtonItemId = Ext.id();
	var store = false;
	var tree = false;
	var cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {
		clicksToEdit: 2
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
			cfg.xstore.nameField = o.name;
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
					field: {
						xtype: 'combobox',
						typeAhead: true,
						triggerAction: 'all',
						selectOnTab: true,
						store: o.store,
						lazyRender: true,
						listClass: 'x-combo-list-small'
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
					field: {
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

		tmp.flex = 1;
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

	var root_cfg = {
		expanded: true
	};
	root_cfg[cfg.xstore.pid] = 0;
	root_cfg[cfg.xstore.nameField] = cfg.rootTextName || 'Root';


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


	var selModel = Ext.create('Ext.selection.CheckboxModel', {
		//	resizable: false,
		//	flex: 0, //Will not be resized
		//	width: 10,
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
							Ext.getCmp(id).setDisabled(false);
						},this);
					} else
					{
						Ext.each(cfg.selModelButtons,function(id){
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
		Ext.MessageBox.prompt(cfg.cfgADD_text ? cfg.cfgADD_text : 'Hinzufügen', cfg.txt_new || 'Name:', function(a,v){
			if (a != 'ok') return;

			var params = {};

			if (Ext.isObject(cfg.xstore.insertParams))
			{
				Ext.iterate(cfg.xstore.insertParams,function(k,v){
					params[k] = v;
				},this);
			}

			params['fid'] = fatherNodeId;
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
								view.refresh();
								store.getNodeById(fatherNodeId).expand();
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
									view.refresh();
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


	var items = [{
		iconCls:cfg.cfgADD_iconCls ?  cfg.cfgADD_iconCls : iconsPrefix+'_add_inside',
		text: cfg.cfgADD_text ? cfg.cfgADD_text : 'Hinzufügen',
		scope: this,
		handler: function() {
			injectNewNode(menu.latestRecord,menu.latestRecord.data[cfg.xstore.pid]);
		}
	},(cfg.button_del) ? '-' : '',{
		hidden:(!cfg.button_del),
		disabled: (!cfg.button_del),
		iconCls:iconsPrefix+'_del',
		text: 'Löschen',
		scope: this,
		handler: function() {

		}
	},'-',{
		iconCls:'xf_reload',
		text: 'Aktualisieren',
		scope: this,
		handler: function() {
			var record = menu.latestRecord;
			var parent = record.parentNode;
			parent.removeAll();
			store.load({
				node: parent,
				callback: function() {
					view.refresh();
					store.getNodeById(fatherNodeId).expand();
				}
			});
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
							view.refresh();
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
		rootVisible: false
	};

	var bbar = [];

	if (cfg.bbar_add)
	{
		Ext.each(cfg.bbar_add,function(eButton){
			bbar.push(eButton);
		},this);
	}

	var tbar = cfg.toolbar_top || [];

	tbar.push({
		scope: this,
		iconCls: 'xf_reload',
		tooltip: 'Aktualisieren',
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


	if (cfg.button_del && !cfg.disableButtonDel)
	{
		tbar.push({
			itemId: removeButtonItemId,
			//text:'Löschen',
			scope: this,
			tooltip:'Selektiere Datensätze löschen',
			iconCls:'xf_grid_del',
			disabled: true,
			handler:function()
			{

				xframe.yn({
					title:'Löschen',
					msg: 'Wollen sie wirklich die selektierten Datensätze wirklich löschen?',
					scope:this,
					handler: function(btn)
					{
						if (btn != 'yes') return;
						var ids = [];

						Ext.each(selModel.getSelection(),function(r){
							ids.push(r.data[cfg.xstore.pid]);
						},this);

						var params = cfg.xstore.removeParams || {};
						params.ids = ids.join(',');

						xframe.ajax({
							jsonFeedback: true,
							scope: this,
							url: cfg.xstore.remove,
							params: params,
							success: function(json){
								store.load();
							},
							failure: function(json){
								store.load();
							},
							failure_msg: xframe.lang('REMOVE_OF_ITEMS_FAILED')
						});
					}
				});



			}
		});
	}


	if (cfg.button_add)
	{
		tbar.push({
			iconCls: 'xf_add',
			tooltip: 'Am Ende Hinzufügen',
			handler: function(btn)
			{
				injectNewNode(tree.getRootNode(),0);
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
					},1);
				}
			});
			groupButtons.push(tmp);
		},this);

		var tmp = Ext.create('Ext.Action',{
			iconCls:'xf_filter_columns',
			text: 'Alle',
			handler:function() {
				setTimeout(function(){
					var hCt = tree.getView().getHeaderCt();
					Ext.each(hCt.getGridColumns(),function(o){
						o.setVisible(true);
					},this);
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

	tbar.push({
		iconCls: 'xf_search_deep',
		enableToggle: true,
		tooltip: 'Erweiterte Suche',
		xtype: 'button'
	});

	tbar.push({
		id: idOfSerachButton,
		xtype:'searchfield',
		paramName : '_query',
		store:store
	});


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

	var tree_cfg = Ext.apply({
		//collapsible: true,
		//singleExpand: true,
		//bodyCls: 'fixSelModelPanelTree',
		tbar: tbar,
		bbar: bbar,
		border:false,
		tools:tools,
		viewConfig: {
			plugins: {
				ddGroup: cfg.ddGroup || Ext.id(),
				ptype: 'treeviewdragdrop'
			}
		},

		useArrows: true,
		store: store,
		plugins:plugins,
		listeners : {

			beforeitemdblclick: function()
			{
				if (cfg.button_save) {
					return false;
				} else
				{
					return true;
				}
			},

			edit : function(plugin,action)
			{
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
				menu.latestRecord = record;
				menu.showAt(e.xy[0],e.xy[1]);
				e.stopEvent();
			}
		},
		columns: columns
	},cfg,tree_def);

	if (cfg.button_del)
	{
		tree_cfg.selModel = selModel;
	}


	tree = Ext.create('Ext.tree.Panel', tree_cfg);
	tree.initSettings = cfg;


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

	tree.on('resize',function(cmp, adjWidth, adjHeight, options){


		if (!idOfSerachButton) return;
		try{
			var pair 	= Ext.getCmp(idOfSerachButton).getPosition(true);
			var pos_x 	= pair[0]+5;
			Ext.getCmp(idOfSerachButton).setWidth(adjWidth-pos_x);
			//Ext.getCmp(idOfSerachButton).setWidth(adjWidth-(cfg.offsetRight||150));
		} catch(e){}

	},this,{delay:1});

	return tree;
};