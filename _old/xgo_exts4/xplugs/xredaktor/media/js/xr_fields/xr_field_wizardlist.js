
Ext.define('Ext.xr.field_wizardlist', {
	extend: 'Ext.grid.Panel',
	alias: 'widget.xr_field_wizardlist',

	title: '',
	height: 300,

	viewConfig: {
		stripeRows: true
	},

	handleRenderer : function(col) {
		if (typeof col.renderer != 'function') {

			var pleaseCallMe = ''+col.renderer;
			col.renderer = function(v,r) {

				try {
					return Ext['xr'][pleaseCallMe].renderer.apply(this,arguments);
				} catch (e) {
					console.info('Failed :: '+pleaseCallMe);
				}

				console.info(arguments);
				return v;
			}
		}
	},

	initComponent: function () {

		this.title = this.fieldLabel;
		console.info(this.backEndInfos);
		console.info(this.columns);

		Ext.each(this.columns,function(col){
			if (col.columns) {
				Ext.each(col.columns,function(_col){
					this.handleRenderer(_col);
				},this);
			} else {
				this.handleRenderer(col);
			}
		},this);

		console.info('this.dbFields',this.dbFields);

		var cfg = {
			xstore: {
				fields: this.dbFields,
				params : this.paramsBack,
				load: 	'/xgo/xplugs/xredaktor/ajax/wzlist/load',
				update: '/xgo/xplugs/xredaktor/ajax/wzlist/update',
				insert: '/xgo/xplugs/xredaktor/ajax/wzlist/insert',
				remove: '/xgo/xplugs/xredaktor/ajax/wzlist/remove',
				move: 	'/xgo/xplugs/xredaktor/ajax/wzlist/move',
				pid: 	'wz_id'
			}
		};

		this.btn_del = Ext.widget({
			xtype: 'button',
			scope: this,
			disabled: true,
			text: 'Löschen',
			iconCls: 'xf_del',
			handler: function() {

				xframe.yn({
					title:'Löschen',
					msg: 'Wollen sie wirklich die selektierten Datensätze wirklich löschen?',
					scope:this,
					handler: function(btn)
					{
						if (btn != 'yes') return;
						var ids = [];

						Ext.each(this.selModel.getSelection(),function(r){
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
								this.store.load();
							},
							failure: function(json){
								this.store.load();
							},
							failure_msg: xframe.lang('REMOVE_OF_ITEMS_FAILED')
						});
					}
				});

			}
		});

		this.bbar = [{
			scope: this,
			text: 'Reload',
			iconCls: 'xf_reload',
			handler: function() {
				console.info('callback',this.getView().getHeight());
				this.store.load();
			}
		},'-',{
			scope: this,
			text: 'Hinzufügen',
			iconCls: 'xf_add',
			handler: function() {

				var params = {};

				if (Ext.isObject(cfg.xstore.insertParams))
				{
					Ext.iterate(cfg.xstore.insertParams,function(k,v){
						params[k] = v;
					},this);
				}

				xframe.ajax({
					scope: this,
					url: cfg.xstore.insert,
					params: params,
					stateless: function(succ,json){
						var id = json.record[cfg.xstore.pid];
						this.store.load();
					},
					failure: function(json){
						this.store.load();
					},
					failure_msg: xframe.lang('NEW_NODE_FAILED')
				});

			}
		},this.btn_del];


		this.cellEditing = new Ext.grid.plugin.CellEditing({
			clicksToEdit: 1
		});

		this.plugins = [this.cellEditing];
		this.store = xframe.getGridStoreByConfig(cfg);
		this.store.load({
			callback: function() {




			}
		});

		this.selModel = Ext.create('Ext.selection.CheckboxModel', {
			resizable: false,
			flex: 0, //Will not be resized
			width: 60,
			singleSelect: true,
			checkOnly: false,
			sortable: false,
			listeners: {
				scope: this,
				selectionchange: function(sm, selections) {

					if (selections.length > 0)
					{
						this.btn_del.setDisabled(false);
					} else
					{
						this.btn_del.setDisabled(true);
					}

				}
			}
		});

		this.listeners = {
			scope: this,
			edit : function(grid,action)
			{

				var params 		= cfg.xstore.updateParams || {};
				var paramsLive 	= cfg.xstore.updateParamsByRecordValue || {};

				Ext.iterate(paramsLive,function(k,v){
					params[k] = action.record.data[v];
				});


				var v = action.value;
				var fixer = Ext.widget({xtype:action.column.initialConfig.editor.xtype});
				if (fixer.patch4db)
				{
					v = fixer.patch4db(v);
				}

				params.id = action.record.data[cfg.xstore.pid];
				params.idProperty = action.record.idProperty;
				params.field = action.field;
				params.value = v;
				params.originalValue = action.originalValue;
				if (params.value == params.originalValue) return;

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
					failure_msg: xframe.lang('UPDATE_OF_DATA_FAILED')
				});
			}
		}

		this.callParent();
	},

	statics: {
		openConfigWindow: function(as,grid) {

			Ext.xr.field.openDefaultConfigWindow({
				grid: grid,
				as: as,
				title: 'Wizard-Datensatz-Liste Einstellungen',
				fields: [{
					xtype: 'xr_field_wattribute',
					name: 'as_config',
					fieldLabel: 'Wizard-Attribute'
				}]
			});

		}
	}


});

