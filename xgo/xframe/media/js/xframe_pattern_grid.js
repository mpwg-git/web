/*********************************************************************************************************
*******
*******		GRID
*******
*******
*/


Ext.define('Ext.org.GridPanel', {
	extend: 'Ext.grid.Panel',
	alias : 'widget.pixgrid',
	mixins: {
		draggable   : 'Ext.ux.DataView.Draggable'
	}
});

xframe_pattern_.prototype.genGrid = function(cfg) {

	if (cfg.justDblClick)
	{
		cfg.button_save = false;
		cfg.records_move = false;
		if (typeof cfg.plugin_numLines == "undefined")
		{
			cfg.plugin_numLines = true;
		}
		cfg.button_add = false;
		cfg.button_del = false;
	}


	if (typeof cfg.filters == 'undefined')
	{
		cfg.filters = true;
	}


	if (!cfg.filters)
	{
		cfg.features = false;
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
	var grid = false;
	var model_id = Ext.id();
	var store = false;

	var removeButtonItemId = Ext.id();
	var columns = [];
	var cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {
		clicksToEdit: 1
	});

	if (cfg.plugin_numLines)
	{
		columns.push(Ext.create('Ext.grid.RowNumberer',{
			/*minWidth: 40,
			maxWidth: 40,
			width: 40*/
		}));
	}

	if (typeof cfg.cellButtonCls == 'undefined') 	cfg.cellButtonCls = 'cellButton';
	if (typeof cfg.cellButtonUpCls == 'undefined') 	cfg.cellButtonUpCls = 'cellButtonUp';

	var xgroupsCnt = 0;
	var xgroups = {};

	var filters = {
		ftype: 'filters',
		encode: true,
		filters: []
	};

	Ext.each(cfg.xstore.fields,function(o){

		if (typeof o.header == 'undefined') o.header = true;
		if (!o.header) return;


		var sortable = true;

		if (typeof o.sortable != 'undefined')
		{
			sortable = o.sortable;
		}

		var tmp = {
			xtype: 'gridcolumn',
			text: o.text,
			filterable: true,
			dataIndex: o.name,
			sortable: sortable
		};


		if (typeof o.filterable != 'undefined')
		{
			tmp.filterable = o.filterable;
		}



		if (o.type == 'bool')
		{
			tmp.xtype = 'checkcolumn';
			tmp.listeners = {
				checkchange: function(thisColumn, rowIndex, checked, eOpts) {
					if (typeof me.gridHolder.checkchange == "function") {
						me.gridHolder.checkchange.call(me.gridHolder,eOpts,thisColumn,rowIndex,checked);
					}
				}
			};

		}

		if (typeof o.width != 'undefined')
		{
			tmp.width 		= o.width;
			tmp.resizable 	= false;
			tmp.flex 		= 0;
		}

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

		if (o.renderer)
		{
			tmp.renderer = o.renderer;
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
			} else
			{
				tmp.editor = o.editor;
			}
		}

		if (o.hidden)
		{
			tmp.hidden = true;
		}

		if (o.renderer && o.scope)
		{
			tmp.renderer = function(){
				return o.renderer.apply(o.scope,arguments);
			}
		}

		if (o.xtype)
		{
			switch(o.xtype)
			{
				case 'renderer':


				if (o.nativeStore)
				{
					tmp.renderer = function(v) {
						{try{return o.nativeStore.getById(v).data[o.nativeStore_field_label];} catch(e) {return v;}}
					}
				} else
				{
					var data = Ext.clone(o.store);
					if (o.rendererStore)
					{
						Ext.each(o.rendererStore,function(pair){
							data.push(pair);
						});
					}
					var renderStore = new Ext.data.ArrayStore({
						fields: ['id','v'],
						data:data
					});
					tmp.renderer = function(v) {
						if (o.renderer && o.scope){return o.renderer.apply(o.scope,[renderStore,arguments]);} else
						{try{return renderStore.getById(v).data.v;} catch(e) {return v;}}
					}
				}
				break;

				case 'combo':

				var data = Ext.clone(o.store);


				if (o.store)
				{
					tmp.type = 'list';
					tmp.options = [];

					Ext.each(o.store,function(p){
						tmp.options.push({
							id: p[0], text: p[1]
						});
					});

				}

				if (o.rendererStore)
				{
					Ext.each(o.rendererStore,function(pair){
						data.push(pair);
					});
				}

				var renderStore = new Ext.data.ArrayStore({
					fields: ['id','v'],
					data:data
				});

				tmp = Ext.apply(tmp,{
					renderer : function(v) {
						if (o.renderer && o.scope)
						{
							return o.renderer.apply(o.scope,[renderStore,arguments]);

						} else
						{
							try{
								return renderStore.getById(v).data.v;
							} catch(e) {return v;}
						}
					},
					field: {
						xtype: 'combobox',
						typeAhead: true,
						triggerAction: 'all',
						selectOnTab: false,
						selectOnFocus: false,
						store: o.store,
						lazyRender: false,
						listClass: 'x-combo-list-small',
						//columnWidth: 1000,
						matchFieldWidth: true,
						minWidth: 200,
						listeners: {
							focus: function(cb)
							{
								cb.expand();
							}
						}
					}
				});

				if (typeof o.listWidth != 'undefined')
				{
					tmp.listWidth	= o.listWidth;
					tmp.flex 	= 0;
				}



				break;
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
				default: break;
			}
		}

		tmp.stateId = o.name;

		columns.push(tmp);
	});

	Ext.define(model_id, {
		extend: 'Ext.data.Model',
		fields: cfg.xstore.fields,
		idProperty : cfg.xstore.pid
	});

	var extraParams = {};

	if (Ext.isObject(cfg.xstore.loadParams))
	{
		Ext.iterate(cfg.xstore.loadParams,function(k,v){
			extraParams[k] = v;
		},this);
	}

	var pageSize = 100;

	store = Ext.create('Ext.data.Store', {
		autoDestroy: true,
		model: model_id,
		remoteSort: true,
		pageSize: pageSize,
		proxy: {
			extraParams: extraParams,
			type: 'ajax',
			url: cfg.xstore.load,
			reader: {
				root: 'root',
				totalProperty: 'totalCount'
			},
			listeners: {
				exception: function(proxy, response, operation){

					var json = Ext.decode(response.responseText);
					if (json)
					{
						if (json.DEBUG)
						{
							var win = xframe.win({
								modal:true,
								title: 'Server Debugnachricht',
								items: {xtype:'panel',html:json.DEBUG,autoScroll:true},
								buttons:[{
									text:'OK',
									handler:function(){
										win.destroy();
									}
								}]
							});
							win.show();
						}
					}
					/*
					Ext.MessageBox.show({
					title: 'REMOTE EXCEPTION',
					msg: operation.getError(),
					icon: Ext.MessageBox.ERROR,
					buttons: Ext.Msg.OK
					});
					*/
				}
			}
		},
		listeners : {
			move : function(node,oldParent,newParent,index,options)
			{
				var params = cfg.xstore.updateParams || {};
				params.id 	= node.data[cfg.xstore.pid];
				params.ofid = oldParent.data[cfg.xstore.pid];
				params.nfid = newParent.data[cfg.xstore.pid];
				params.sort = index;


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
			}
		}
	});

	store.on('beforeload',function(s){
		s.proxy.extraParams['BE_LANG'] = xredaktor.getInstance().getCurrentBElang();
	},this);
	store.proxy.extraParams['BE_LANG'] = xredaktor.getInstance().getCurrentBElang();

	store.proxy.extraParams.doPaging 	= (cfg.pager) ? '1' : '0';

	if (cfg.xstore.initSort)
	{
		store.proxy.extraParams.initSort = cfg.xstore.initSort;
	}


	var grid_def = {
		title: '',
		region: 'center',
		split: true,
		border:false,
		collapsible: false,
		collapseMode: 'mini'
	};

	var dockedItems 	= [];
	var toolbar_top		= cfg.toolbar_top || [];
	var toolbar_bottom	= cfg.toolbar_bottom || [];

	var meArguments = arguments;

	function defaultAdd()
	{

		var params = {};

		if (Ext.isObject(cfg.xstore.insertParams))
		{
			Ext.iterate(cfg.xstore.insertParams,function(k,v){
				params[k] = v;
			},this);
		}

		if (Ext.isFunction(cfg.xstore.insertParamsFunc))
		{
			var tt = cfg.xstore.insertParamsFunc();
			Ext.iterate(tt,function(k,v){
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


		xframe.ajax({
			scope: this,
			url: cfg.xstore.insert,
			params: params,
			success: function(json){
				var id = json.record[cfg.xstore.pid];
				store.load();
				console.log("fn add",cfg.fn_add,"fn add scope",cfg.fn_add_scope);
				if ((typeof cfg.fn_add == "function") && (cfg.fn_add_scope))
				{
					console.log("call fn add");
					cfg.fn_add.call(cfg.fn_add_scope,id);
				}
			},
			failure: function(json){
				store.load();
			},
			failure_msg: xframe.lang('NEW_NODE_FAILED')
		});

		return;
		/*
		var fieldsY = {};
		Ext.each(cfg.xstore.fields,function(o){
		if (typeof o.header == 'undefined') o.header = true;
		if (!o.header) return;
		fieldsY[o.name] = '';
		});

		fieldsY['intId'] = Ext.id();
		fieldsY[cfg.xstore.pid] = -1;

		var r = Ext.ModelManager.create(fieldsY, model_id);

		cellEditing.cancelEdit();
		store.insert(0,r);
		setTimeout(function(){
		cellEditing.startEditByPosition({
		row: 0,
		column: 2
		});
		},100);
		*/
	}

	if (cfg.button_add)
	{
		toolbar_top.push({
			text:'Add',
			iconCls:'xf_grid_add',
			scope: this,
			handler: function()
			{
				defaultAdd();
			}
		});
	}

	var selModel = Ext.create('Ext.selection.CheckboxModel', {
		name: 'CheckboxModel',
		resizable: false,
		flex: 0, //Will not be resized
		width: 60,
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
							try{
								Ext.getCmp(id).setDisabled(false);
								Ext.getCmp(id).grid_selections = selections;
							} catch (e) {};
						},this);
					} else
					{
						Ext.each(cfg.selModelButtons,function(id){
							try{
								Ext.getCmp(id).setDisabled(true);
								Ext.getCmp(id).grid_selections = selections;
							} catch (e) {};
						},this);
					}
				}
				if (cfg.button_del && !cfg.disableButtonDel)
				{
					grid.down('#'+removeButtonItemId).setDisabled(selections.length == 0);
				}
			}
		}
	});

	if (cfg.button_del && !cfg.disableButtonDel)
	{
		toolbar_top.push({
			itemId: removeButtonItemId,
			text:'Delete',
			scope: this,
			iconCls:'xf_grid_del',
			disabled: true,
			handler:function()
			{

				xframe.yn({
					title:'Deleter',
					msg: 'Do you really want to delete the selected records?',
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


						if (typeof cfg.xstore.extraProxyValuesFn == 'function')
						{
							var extra = cfg.xstore.extraProxyValuesFn();
							Ext.iterate(extra,function(k,v){
								params[k] = v;
							},this);
						}


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

	// AT END
	if (toolbar_top.length > 0) toolbar_top.push('-');

	if (xgroupsCnt>0)
	{

		var groupButtons = [];
		Ext.iterate(xgroups,function(k,v) {
			var tmp = {
				text: k,
				iconCls:'xf_filter_columns',
				handler:function() {

					grid.getView().suspendEvents(false);

					setTimeout(function(){
						var fields = {}
						Ext.each(v,function(o){
							fields[o.name] = 1;
						},this);
						var hCt = grid.getView().getHeaderCt();

						Ext.each(hCt.getGridColumns(),function(o){
							if (o.isCheckerHd) return;
							var dataIndex = o.dataIndex;
							//o.setVisible((fields[dataIndex] == 1));
							o.hidden = !(fields[dataIndex] == 1);
						},this);

						/*
						var grid = ...;
						for (var i = 0; i < grid.columns.length; i++) {
						var column = grid.columns[i];
						column.hidden = false // or true, instead column.setVisible(bool);
						column.width = 100 // instead column.setWidth(100);
						}
						grid.headerCt.updateLayout();
						*/
						
						grid.headerCt.updateLayout();

					},1);

					grid.getView().resumeEvents( );

				}
			};
			groupButtons.push(tmp);
		},this);

		var tmp = {
			iconCls:'xf_filter_columns',
			text: 'Alle',
			handler:function() {
				setTimeout(function(){
					var hCt = grid.getView().getHeaderCt();
					Ext.each(hCt.getGridColumns(),function(o){
						//o.setVisible(true);
						o.hidden = false;
					},this);
					grid.headerCt.updateLayout();
				},1);
			}
		};

		groupButtons.push('-');
		groupButtons.push(tmp);


		/*
		toolbar_top.push({
		text:'Spalten',
		menu:[groupButtons]
		});
		*/

	}

	//toolbar_top.push('->');
	toolbar_top.push({
		//text:'Reload',
		scope: this,
		//tooltip:'Reload',
		iconCls:'xf_reload',
		handler : function()
		{
			store.load();
		}
	});

	var idOfSerachButton = Ext.id();

	if (cfg.button_import)
	{
		toolbar_top.push('-');

		toolbar_top.push({
			text:xframe.lang('Import'),
			iconCls:'xf_grid_import',
			scope: this,
			handler: function()
			{


				var win = false;
				var form = Ext.create('Ext.form.Panel', {
					frame: true,
					bodyPadding: '10 10 0',
					defaults: {
						anchor: '100%',
						allowBlank: false,
						msgTarget: 'side',
						labelWidth: 70
					},

					items: [{
						xtype: 'filefield',
						emptyText: xframe.lang('Bitte wählen Sie eine XLS-Datei'),
						fieldLabel: xframe.lang('XLS-Datei'),
						name: 'csv_file',
						buttonText: '',
						buttonConfig: {
							iconCls: 'xf_save'
						}
					}],

					buttons: [{
						text: xframe.lang('Upload'),
						handler: function(){
							var form = this.up('form').getForm();
							if(form.isValid()){
								form.submit({
									url: cfg.xstore.csv_import,
									waitMsg: xframe.lang('Daten werden übermittelt...'),
									success: function(fp, o) {
										grid.getStore().load();
										win.close();
									},
									failure: function(fp,o) {
										try {
											var d = Ext.decode(o.response.responseText);
											var e = d.error;
										} catch(ex) {
											e = xframe.lang("Unbekannter Fehler");
										}

										grid.getStore().load();
										win.close();

										xframe.alert(xframe.lang("Import fehlgeschlagen"),e);
									}
								});
							}
						}
					}]
				});

				win = Ext.widget('window', {
					title: xframe.lang('Import XLS Data'),
					closeAction: 'hide',
					width: 500,
					height: 150,
					layout: 'fit',
					resizable: false,
					modal: true,
					items: form
				});
				win.show();
			}
		});

		if (!cfg.button_export) {
			toolbar_top.push('-');
		}
	}


	if (cfg.button_export)
	{


		var name = 'CSV_DOWNLOADER_FRAME_'+Ext.id();

		toolbar_top.push('-');

		toolbar_top.push({
			xtype:'panel',
			width: 0,
			height: 0,
			html: '<iframe name="'+name+'"></iframe>'
		});

		var nameExport 	= Ext.id();
		var nameId 		= Ext.id();

		toolbar_top.push({
			id: nameExport,
			scope: me,
			iconCls: 'xf_grid_export',
			text: 'Export',
			handler: function() {


				var url = cfg.xstore.load;
				if (url.indexOf("?") == -1) {
					url += "?";
				} else
				{
					url += "&";
				}

				url += "exportToCsv=1";

				var cfgx 	= store.proxy.extraParams;
				cfgx.filter = grid.filters.getFilterData();

				if (Ext.getCmp(idOfSerachButton))
				{
					cfgx['_query'] = Ext.getCmp(idOfSerachButton).getValue();
				}

				url += "&csvName=" + Ext.getCmp(nameId).getValue();
				cfgx.filename = Ext.getCmp(nameId).getValue();



				Ext.iterate(grid.getStore().proxy.extraParams,function(k,v){
					url += "&"+k+"="+v;
				},this);

				console.info(cfgx);

				url += '&queryPack='+Base64.encode(Ext.encode(cfgx));

				window.open(url,name);

			}
		});



		toolbar_top.push({
			xtype: 'textfield',
			id: nameId,
			value: 'Export',
			listeners: {
				specialkey: function(field, e){
					if (e.getKey() == e.ENTER) {
						Ext.getCmp(nameExport).handler();
					}
				}
			}
		});

		toolbar_top.push('.csv');
		toolbar_top.push('-');

	}

	if (cfg.justDblClick || cfg.search)
	{
		toolbar_top.push({
			//maxWidth: 400,
			flex: 1,
			id:idOfSerachButton,
			paramName : '_query',
			xtype:'searchfield',
			store:store,
			value: cfg.defaultSearchValue || ''
		});
	}

	if (cfg.button_del)
	{
		//toolbar_top.push('->');
		//toolbar_top.push('Deselektieren: Strg/Ctrl-Click');
	}


	if (typeof cfg.records_move == 'undefined')
	{
		cfg.records_move = true;
	}

	if (cfg.records_move)
	{
		//toolbar_top.push('->','Sortierung mittels DND');
	}





	if (toolbar_top.length > 0)
	{
		var tmp = {
			xtype: 'toolbar',
			dock: 'top',
			items: toolbar_top
		};
		dockedItems.push(tmp);
	}


	if (cfg.pagerTop)
	{
		var ptTop = Ext.create('Ext.PagingToolbar', {
			flex: 1,
			pageSize: pageSize,
			store: store,
			dock: 'top',
			displayInfo: true,
			plugins: Ext.create('Ext.ux.ProgressBarPager', {}),
			displayMsg: '{0} - {1} of {2}'
		})
		var tmp = {
			xtype: 'toolbar',
			dock: 'top',
			items: ptTop
		};
		dockedItems.push(ptTop);
	}

	if (cfg.toolbar_bottom2)
	{
		var tmp = {
			xtype: 'toolbar',
			dock: 'bottom',
			items: cfg.toolbar_bottom2
		};
		dockedItems.push(tmp);
	}

	if (cfg.pager)
	{
		var pt = Ext.create('Ext.PagingToolbar', {
			flex: 1,
			pageSize: pageSize,
			store: store,
			dock: 'bottom',
			displayInfo: true,
			plugins: Ext.create('Ext.ux.ProgressBarPager', {}),
			displayMsg: '{0} - {1} of {2}'
		})
		dockedItems.push(pt);
	}



	if (toolbar_bottom.length > 0)
	{
		var tmp = {
			xtype: 'toolbar',
			dock: 'bottom',
			items: toolbar_bottom
		};
		dockedItems.push(tmp);
	}

	var dndName = cfg.ddGroup || Ext.id();

	var tools = [{
		type:'refresh',
		tooltip: 'Refresh form Data',
		handler: function(event, toolEl, panel){
			store.load();
		}
	}];

	if (cfg.button_add)
	{
		/*
		tools.push({
		type:'plus',
		tooltip: 'add',
		handler: function(event, toolEl, panel){
		}
		});
		*/
	}

	var menu = false;
	var items = [];

	if (cfg.cMenu)
	{
		Ext.each(cfg.cMenu,function(but){
			var bHandler = but.handler;
			but.handler = function()
			{
				bHandler.call(but.scope,menu.latestRecord.data);
			}
			items.push(but);
		},this);

		menu = Ext.create('Ext.menu.Menu', {
			style: {
				overflow: 'visible'
			},
			items: items
		});
	}


	var defDND = {
		plugins: {
			ptype: 'gridviewdragdrop',
			dragGroup: dndName,
			dropGroup: dndName
		},
		listeners: {
			drop: function(node, data, dropRec, dropPosition) {
				var dropOn = dropRec ? ' ' + dropPosition + ' ' + dropRec.get('name') : ' on empty view';
				//Ext.example.msg("Drag from right to left", 'Dropped ' + data.records[0].get('name') + dropOn);



				var recs2 = [];

				store.each(function(r){
					recs2.push(r.data[cfg.xstore.pid]);
				});

				var recs = [];

				Ext.each(data.records,function(r){
					recs.push(r.data[cfg.xstore.pid]);
				});

				var params = cfg.xstore.updateParams || {};
				params.dropPosition 	= dropPosition,
				params.recs 			= recs.join(','),
				params.recs2 			= recs2.join(','),
				params.dropRec 			= dropRec.data[cfg.xstore.pid]

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
				return;
			}
		}
	};

	if (cfg.noDND) defDND = {};


	var viewConfig = defDND;

	if (cfg.viewConfig) viewConfig = cfg.viewConfig;


	//viewConfig.enableTextSelection = true;

	var grid_cfg = Ext.apply({



		columnLines: true,
		flex: 1,
		features: [filters],
		dockedItems: dockedItems,
		//tools:tools,
		listeners: {
			drop: function(node, data, dropRec, dropPosition) {
			}
		},
		store: store,
		plugins: [cellEditing],
		viewConfig: viewConfig,
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
			edit : function(grid,action)
			{
				console.info("EDIT");

				var params 		= cfg.xstore.updateParams || {};
				var paramsLive 	= cfg.xstore.updateParamsByRecordValue || {};

				Ext.iterate(paramsLive,function(k,v){
					params[k] = action.record.data[v];
				});


				params.id = action.record.data[cfg.xstore.pid];
				params.idProperty = action.record.idProperty;
				params.field = action.field;
				params.value = action.value;
				params.originalValue = action.originalValue;
				if (params.value == params.originalValue) return;

				if (typeof cfg.xstore.extraProxyValuesFn == 'function')
				{
					var extra = cfg.xstore.extraProxyValuesFn();
					Ext.iterate(extra,function(k,v){
						params[k] = v;
					},this);
				}

				xframe.ajax({
					jsonFeedback: true,
					scope: this,
					url: cfg.xstore.update,
					params: params,
					success: function(json){
						if (json.record == false)
						{
							xframe.alert('ACHTUNG','Änderung wurde vom Server zurückgewiesen!');
							store.load();
						} else
						{
							action.record.set(json.record);
							if (json.reload)
							{
								store.load();
							}
							if (typeof cfg.updateHandler == 'function') cfg.updateHandler();
						}
					},
					failure: function(json){
						store.load();
					},
					failure_msg: xframe.lang('Speichern fehlgeschlagen')
				});
			},
			itemcontextmenu : function(Ext_view_View, record,item,index,e,options)
			{
				if (!menu) return;
				menu.latestRecord = record;
				menu.setPosition(e.xy[0],e.xy[1]);
				menu.show();
				e.stopEvent();
			}
		},
		columns: columns
	},cfg,grid_def);


	if (cfg.width)
	{
		grid_cfg.width = cfg.width;
	}

	//if (typeof cfg.title == 'undefined') cfg.title = "";

	if ((!cfg.title) || (cfg.title == ""))
	{
		delete(grid_cfg.tools);
	}

	if (!cfg.records_move)
	{
		delete(grid_cfg.viewConfig.plugins);
	}

	if (cfg.button_del)
	{
		grid_cfg.selModel = selModel;
	}

	if ((cfg.selModelButtons) && (cfg.selModelButtons.length>0)) {
		grid_cfg.selModel = selModel;
	}

	if (cfg.loadAuto)
	{
		store.load();
	}

	grid = Ext.create('Ext.grid.Panel', grid_cfg);

	if (grid.child('[dock=bottom]') && (cfg.filters))
	{
		grid.child('[dock=bottom]').add([
		'->',
		{
			iconCls: 'xf_del',
			text: 'Delete Filter',
			handler: function () {
				grid.filters.clearFilters();
			}
		}
		]);
	}





	grid.on('resize',function(cmp, adjWidth, adjHeight, options){
		if (!idOfSerachButton) return;
		try{
			var pair 	= Ext.getCmp(idOfSerachButton).getPosition(true);
			var pos_x 	= pair[0]+5;
			Ext.getCmp(idOfSerachButton).setWidth(adjWidth-pos_x);
		} catch(e){}

	},this,{delay:1});


	this.gridHolder = grid;


	grid.initSettings = cfg;
	return grid;
};