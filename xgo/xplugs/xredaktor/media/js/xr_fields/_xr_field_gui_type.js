
Ext.define('Ext.xr.field_gui_type', {
	extend: 'Ext.tree.Panel',
	alias: 'widget.xr_field_gui_type',

	config: {

		displayField : 'label',
		doWidth: 500,
		width: 300,
		minWidth: 300,
		useArrows: true,

		viewConfig: {
			plugins: {
				ptype: 'treeviewdragdrop',
				ddGroup: 'DND_FORMS_DRAG',
				containerScroll: true
			},
			copy: true
		}

	},

	constructor: function(cnfg){
		cnfg.store = this.getStoreX();
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	},


	getStoreX: function(){

		var data = {
			label:		"Gui-Typen",
			iconCls:	'xr_field_gui_root',
			gui_type: 	Ext.id(),
			expanded: true,
			children: [



			{
				fas_type: 'GUI',
				label:		'Row',
				fas_gui_type:	'row',
				leaf: false,
				expanded: true,
				iconCls:	'xr_gui_row',
				btn_cfg: true,
				btn_init_disabled: true
			},{
				fas_type: 'GUI',
				label:		'Tabpanel',
				fas_gui_type:	'tabpanel',
				leaf: false,
				expanded: true,
				iconCls:	'xr_gui_tabpanel',
				btn_cfg: true,
				btn_init_disabled: true,
				children: [{
					fas_type: 'GUI',
					label:		'Tab',
					fas_gui_type:	'tab',
					leaf: false,
					expanded: true,
					iconCls:	'xr_gui_tabpanel_tab',
					btn_cfg: true,
					btn_init_disabled: true
				}]
				
				
			},/*{
				fas_type: 'GUI',
				label:		'Step',
				fas_gui_type:	'step',
				leaf: false,
				expanded: true,
				iconCls:	'xr_gui_step',
				btn_cfg: true,
				btn_init_disabled: true
			},*/{
				fas_type: 'GUI',
				label:		'Field-Set',
				fas_gui_type:	'fieldcontainer',
				leaf: false,
				expanded: true,
				iconCls:	'xr_gui_fieldcontainer',
				btn_cfg: true,
				btn_init_disabled: true
			},{
				fas_type: 'GUI',
				label:		'Grid',
				fas_gui_type:	'grid',
				leaf: false,
				expanded: true,
				iconCls:	'xr_gui_grid',
				btn_cfg: true,
				btn_init_disabled: true,
				children: [{
					fas_type: 'GUI',
					label:		'Grid-Spalte',
					fas_gui_type:	'grid_column',
					leaf: false,
					expanded: true,
					iconCls:	'xr_gui_grid_column',
					btn_cfg: true,
					btn_init_disabled: true
				}]
			}




			]};


			Ext.define('xr_field_gui_type', {
				extend: 'Ext.data.Model',
				fields: [
				{name: 'fas_type', 	type: 'string'},
				{name: 'fas_gui_type', 	type: 'string'},
				{name: 'label', 	type: 'string'},
				{name: 'guiMode'},
				{name: 'btn_init_disabled'},
				{name: 'btn_cfg'},
				{name: 'iconCls'},
				],
				idProperty : 'fas_gui_type'
			});

			var store = Ext.create('Ext.data.TreeStore', {
				model: 'xr_field_gui_type',
				proxy: {
					type: 'memory'
				},
				folderSort: true
			});

			var rootNode = store.setRootNode(data);

			return store;
	}

});


