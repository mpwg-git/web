/*********************************************************************************************************
*******
*******		MATRIX
*******
*******
*/

xframe_pattern_.prototype.genMatrix = function(cfg) {

	var backupData = [];

	if (typeof cfg.data == "undefined") cfg.data = [];
	if (!Ext.isArray(cfg.data)) cfg.data = [];

	if (cfg.data)
	{
		backupData = Ext.clone(cfg.data);
	}

	var autoIDOffset = 0;
	
	if (typeof cfg.autoIDOffset != "undefined")
	{
		autoIDOffset = Ext.clone(cfg.autoIDOffset);
	}

	var store = false;
	var grid = false;
	var model_id = Ext.id();

	var removeButtonItemId = Ext.id();
	var columns = [];
	var cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {
		clicksToEdit: 1
	});

	if (cfg.plugin_numLines)
	{
		columns.push(Ext.create('Ext.grid.RowNumberer'));
	}

	if (typeof cfg.cellButtonCls == 'undefined') 	cfg.cellButtonCls = 'cellButton';
	if (typeof cfg.cellButtonUpCls == 'undefined') 	cfg.cellButtonUpCls = 'cellButtonUp';


	Ext.each(cfg.xstore.fields,function(o){

		if (typeof o.header == 'undefined') o.header = true;
		if (!o.header) return;

		var tmp = {
			text: o.text,
			dataIndex: o.name,
			sortable: o.sortable || true
		};

		if (o.width)
		{
			tmp.width = o.width;
		}

		if (o.editor)
		{
			tmp.editor = o.editor;
			if (typeof tmp.editor.selectOnFocus == "unedefined") tmp.editor.selectOnFocus = true;
		}

		if (o.hidden)
		{
			tmp.hidden = true;
		}

		if (o.renderer && o.scope)
		{
			tmp.renderer = function(){
				o.renderer.apply(o.scope,arguments);
			}
		}

		if (o.xtype)
		{
			switch(o.xtype)
			{
				case 'combo':

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
						selectOnTab: true,
						store: o.store,
						lazyRender: true,
						listClass: 'x-combo-list-small'
					}
				});
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
		columns.push(tmp);
	});

	Ext.define(model_id, {
		idProperty: cfg.xstore.pid,
		extend: 'Ext.data.Model',
		fields: cfg.xstore.fields
	});


	if (typeof cfg.autoDestroyStore == 'undefined')
	{
		cfg.autoDestroyStore = true;
	}

	//store = Ext.create('Ext.data.ArrayStore', {
	store = Ext.create('Ext.data.Store', {
		data: cfg.data,
		autoDestroy: cfg.autoDestroyStore, // PROBLEM IF DESTROY FROM OUTSIDE ...
		model: model_id,
		listeners : {
			move : function(node,oldParent,newParent,index,options)
			{

			}
		}
	});

	var grid_def = {
		title: '',
		region: 'center',
		split: true
	};

	var dockedItems 	= [];
	var toolbar_top		= cfg.toolbar_top || [];
	var toolbar_bottom	= cfg.toolbar_bottom || [];

	function defaultAdd()
	{

		var fieldsY = {};
		Ext.each(cfg.xstore.fields,function(o){
			if (typeof o.header == 'undefined') o.header = true;
			if (!o.header) return;
			fieldsY[o.name] = '';
		});

		if (cfg.autoID)
		{
			autoIDOffset++
			fieldsY[cfg.xstore.pid] = autoIDOffset;
		}

		var r = Ext.ModelManager.create(fieldsY, model_id);

		cellEditing.cancelEdit();
		var i = store.add(r);

		setTimeout(function(){
			cellEditing.startEditByPosition({
				row: store.getCount()-1,
				column: 2
			});
		},100);
	}




	if (cfg.button_add)
	{
		toolbar_top.push({
			text:'Neu',
			tooltip:'Neuen Datensatz anfügen',
			iconCls:'xf_add',
			scope: this,
			handler: function()
			{
				defaultAdd();
			}
		});
	}

	var selModel = Ext.create('Ext.ux.CheckboxModelPatched', {
		singleSelect: true,
		checkOnly: false,
		listeners: {
			selectionchange: function(sm, selections) {
				if (cfg.button_del)
				{
					grid.down('#'+removeButtonItemId).setDisabled(selections.length == 0);
				}
			}
		}
	});




	if (cfg.button_del)
	{
		toolbar_top.push({
			itemId: removeButtonItemId,
			text:'Löschen',
			scope: this,
			tooltip:'Selektierte Datensätze löschen',
			iconCls:'xf_del',
			disabled: true,
			handler:function()
			{
				Ext.each(selModel.getSelection(),function(r){
					store.remove(r)
				},this);
			}
		});
	}


	// AT END
	/*if (toolbar_top.length > 0) toolbar_top.push('-');
	toolbar_top.push({
	text:'Zurücksetzten',
	scope: this,
	tooltip:'Remove the selected item',
	iconCls:'reload',
	handler : function()
	{
	store.loadData(backupData,false);
	}
	});*/

	if (typeof cfg.button_save == 'undefined')  cfg.button_save = true;

	if (cfg.button_save)
	{
		toolbar_top.push('-');

		var fn 		= Ext.clone(cfg.button_save.handler);
		var scope 	= Ext.clone(cfg.button_save.scope);

		var cfg_button_save = cfg.button_save;

		/*Ext.applyIf(cfg_button_save,cfg.button_save );
		Ext.applyIf(cfg_button_save,cfg.button_save,{
		text: 'Speichern',
		tooltip: 'Konfiguration speichern.',
		iconCls: 'xf_save',
		scope: this,
		handler: function()
		{
		console.info('XXXXXXXXXXXX');
		if (cfg.records2array)
		{
		var dataArray = [];
		store.each(function(r){
		var rec = [];

		Ext.each(cfg.xstore.fields,function(o){
		rec.push(r.data[o.name]);
		});

		dataArray.push(rec);
		},this);
		fn.call(scope,backupData,dataArray);
		} else
		{
		var dataArray = [];
		store.each(function(r){
		dataArray.push(r.data);
		},this);
		fn.call(scope,backupData,dataArray);
		}
		}
		});*/

		cfg_button_save.handler = function()
		{
			if (cfg.records2array)
			{
				var dataArray = [];
				store.each(function(r){
					var rec = [];

					Ext.each(cfg.xstore.fields,function(o){
						rec.push(r.data[o.name]);
					});

					dataArray.push(rec);
				},this);
				fn.call(scope,backupData,dataArray);
			} else
			{
				var dataArray = [];
				store.each(function(r){
					dataArray.push(r.data);
				},this);
				fn.call(scope,backupData,dataArray);
			}
		}

		toolbar_top.push(cfg_button_save);
	}

	if (typeof cfg.records_move == 'undefined')
	{
		cfg.records_move = true;
	}

	if (cfg.records_move)
	{
		toolbar_top.push('->','Sortierung mittels DND');
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
	if (toolbar_bottom.length > 0)
	{
		var tmp = {
			xtype: 'toolbar',
			dock: 'bottom',
			items: toolbar_bottom
		};
		dockedItems.push(tmp);
	}

	var dndName = Ext.id();
	var grid_cfg = Ext.apply({
		columnLines: true,

		dockedItems: dockedItems,
		tools:[{
			type:'plus',
			tooltip: 'add',
			handler: function(event, toolEl, panel){

			}
		},{
			type:'refresh',
			tooltip: 'Refresh form Data',
			handler: function(event, toolEl, panel){
				store.load();
			}
		}],
		store: store,
		plugins:[cellEditing],
		listeners : {
			beforeitemdblclick: function()
			{
				return false;
			},
			edit : function(grid,action)
			{
				if (cfg.auto_flush)
				{
					var fn 		= Ext.clone(cfg.auto_flush.handler);
					var scope 	= Ext.clone(cfg.auto_flush.scope);

					if (cfg.records2array)
					{
						var dataArray = [];
						store.each(function(r){
							var rec = [];
							Ext.each(cfg.xstore.fields,function(o){
								rec.push(r.data[o.name]);
							});

							dataArray.push(rec);
						},this);
						fn.call(scope,backupData,dataArray);
					} else
					{
						var dataArray = [];
						store.each(function(r){
							dataArray.push(r.data);
						},this);
						fn.call(scope,backupData,dataArray);
					}
				}
			}
		},
		columns: columns
	},cfg,grid_def);

	if (cfg.button_del) {
		grid_cfg.selModel = selModel;
	}

	if (cfg.records_move)
	{
		grid_cfg.viewConfig = {
			plugins: {
				ptype: 'gridviewdragdrop',
				dragGroup: dndName,
				dropGroup: dndName
			},
			listeners: {
				drop: function(node, data, dropRec, dropPosition) {
				}
			}
		};
	}

	grid = Ext.create('Ext.grid.Panel', grid_cfg);
	grid.initSettings = cfg;
	grid.setAutoIDOffset = function(newOffset)
	{
		autoIDOffset = Ext.clone(newOffset);
	}
	grid.getAutoIDOffset = function()
	{
		return autoIDOffset;
	}

	return grid;
};