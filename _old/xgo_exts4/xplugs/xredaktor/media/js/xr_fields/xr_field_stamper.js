Ext.define('Ext.xr.field_stamper', {
	extend: 'Ext.form.field.Text',
	alias: 'widget.xr_field_stamper',
	config: {
		hidden: true
	},
	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	},

	statics: {
		openConfigWindow: function(as,grid) {

			Ext.xr.field.openDefaultConfigWindow({
				grid: grid,
				as: as,
				title: 'Stamper Einstellung',
				fields: [{
					xtype: 'xr_field_atom',
					name: 'as_config',
					fieldLabel: 'Basutein'
				}]
			});
			
		}
	}
});
