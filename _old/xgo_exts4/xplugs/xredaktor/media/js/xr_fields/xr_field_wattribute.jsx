
Ext.define('Ext.xr.field_wattribute', {
	extend: 'Ext.xf.GridPicker',
	alias: 'widget.xr_field_wattribute',
	config: {
		displayField : 'as_name'
	},

	constructor:function(cnfg){
		var me = this;

		console.info("cnfg",cnfg,this);
		
		var fieldsOfHeader = [
		{name: 'as_id',		text:'Interne Nummer',		type:'int',		hidden: false, 	header:true},
		{name: 'as_a_id',	text:'Wizard',				type:'string',	hidden: false,  header:true},
		{name: 'as_name',	text:'Interner Name',		type:'string',	hidden: false,  header:true}
		];

		var grid = false;
		var dummyCfgHolder = {
			grid:grid
		};


		var wizard = Ext.create('Ext.xr.field_wid',{});

		wizard.on('select',function(x,record){
			wizard.collapse();
			grid.getStore().proxy.extraParams['wid'] = record.data.a_id;
			grid.getStore().load();
		},this);

		grid = xframe_pattern.getInstance().genGrid({

			toolbar_top: ['Wizard',wizard],

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
				load: 	'/xgo/xplugs/xredaktor/ajax/all_atoms_settings/load',
				remove: '/xgo/xplugs/xredaktor/ajax/all_atoms_settings/remove',
				update: '/xgo/xplugs/xredaktor/ajax/all_atoms_settings/update',
				insert: '/xgo/xplugs/xredaktor/ajax/all_atoms_settings/insert',
				move: 	'/xgo/xplugs/xredaktor/ajax/all_atoms_settings/move',
				pid: 	'as_id',
				params: {
					a_s_id: xredaktor.getInstance().getCurrentSiteId()
				},
				fields: fieldsOfHeader
			}
		});

		grid.on('itemdblclick',function(g,record){
			this.collapse();
			this.selectItem(record);
		},this);

		this.grid = grid;
		this.store = this.grid.getStore();
		this.store.load();

		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);


	}


});



