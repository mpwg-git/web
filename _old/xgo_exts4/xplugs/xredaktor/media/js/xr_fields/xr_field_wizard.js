
Ext.define('Ext.xr.field_wizard', {
	extend: 'Ext.xf.GridPicker',
	alias: 'widget.xr_field_wizard',
	config: {
		modal : true,
		displayField : 'wzr_title'
	},




	getValue: function() {
		return this.hiddenX.getValue();
	},

	setValue: function(value) {
		console.info("setValue33333333",value);
		this.hiddenX.setValue(value);
		this.handleChangeEvent({value:value});
	},

	getSubmitValue: function(){
		return this.hiddenX.getValue();
	},

	handleChangeEvent: function(cfg)
	{
		
		console.info('handleChangeEvent',cfg,this.rawConfig);
		
		var idx = cfg.value;
		var domagic = this.rawConfig.as_config;

		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/getDataRecordByIdName',
			params : {
				id: idx,
				domagic: domagic,
				lang: 'DE'
			},
			success: function(json)
			{
				this.setRawValue(json.name);
			}
		});



	},


	constructor:function(cnfg){



		console.info("!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!",cnfg);


		var me = this;

		var fieldsOfHeader = [
		{name: 'wz_id',		text:'Interne Nummer',		type:'int',		hidden: false, 	header:true},
		{name: 'wzr_title',	text:'Bezeichnung',			type:'string',	hidden: false,  header:true}
		];

		var grid = false;
		var dummyCfgHolder = {
			grid:grid
		};

		grid = xframe_pattern.getInstance().genGrid({

			toolbar_top: [{
				scope: me,
				text: 'Schließen',
				iconCls: 'xf_select_del',
				handler: function() {
					Ext.each(Ext.ComponentQuery.query('viewport'),function(cmp){
						cmp.setDisabled(false);
					},this)
					this.collapse();
				}
			},{
				scope: me,
				text: 'Auswahl löschen',
				iconCls: 'xf_select_del',
				handler: function() {
					this.setValue('');
				}
			}],

			collapsible: false,
			floating: true,
			hidden: true,
			maxHeight: 300,
			shadow: false,
			manageHeight: false,
			height: 300,
			width: 100,
			forceFit:true,
			border:true,
			plugin_numLines:false,
			split: false,

			pager:true,
			justDblClick:true,
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid_2/load',
				pid: 	'wz_id',
				params: {
					domagic: cnfg.as_config
				},
				fields: fieldsOfHeader
			}
		});

		grid.on('show',function(mex){
			Ext.each(Ext.ComponentQuery.query('viewport'),function(cmp){
				cmp.setDisabled(true);
			},this)
		},this);

		grid.on('itemdblclick',function(g,record){
			Ext.each(Ext.ComponentQuery.query('viewport'),function(cmp){
				cmp.setDisabled(false);
			},this)
			this.collapse();
			this.selectItem(record);
		},this);


		this.hiddenX = Ext.create('Ext.form.field.Hidden',{
			name: cnfg.name,
			value: cnfg.value,
			listeners: {
				scope: this,
				change: this.handleChangeEvent
			}
		});



		this.grid = grid;
		this.store = this.grid.getStore();
		this.store.load();

		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);


	},

	statics: {
		openConfigWindow: function(as,grid) {

			Ext.xr.field.openDefaultConfigWindow({
				grid: grid,
				as: as,
				title: 'Wizard-Datensatz Einstellung',
				fields: [{
					xtype: 'xr_field_wid',
					name: 'as_config',
					fieldLabel: 'Wizard'
				}]
			});

		}
	}


});



