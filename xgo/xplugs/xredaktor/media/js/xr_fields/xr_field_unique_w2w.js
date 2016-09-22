Ext.define('Ext.xr.field_unique_w2w', {
	extend: 'Ext.form.FieldContainer',
	alias: 'widget.xr_field_unique_w2w',

	config: {
		cols: 1,
		flex: 1
	},

	constructor:function(cnfg){

		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);

		this.idx = Ext.id();
		
		console.info('field_unique_w2w',cnfg);
		
		this.add({
			id: this.idx,
			flex: 1,
			width: '100%',
			autoFlex: true,
			columns: this.cols,
			xtype:'checkboxgroup',
			items: cnfg.cfg_items
		});

	},
	
	getValue: function() 
	{
		var vals = Ext.getCmp(this.idx).getValue();
		return vals[this.rawConfig.name];
	},

	statics: {
		openConfigWindow: function(as,grid) {

			Ext.xr.field.openDefaultConfigWindow({
				grid: grid,
				as: as,
				title: 'Eindeutige Verküpfung',
				fields: [{
					xtype: 'xr_field_wid',
					name: 'as_config',
					as_config: 389,
					fieldLabel: 'Wizard'
				}]
			});

		}
	}

});




