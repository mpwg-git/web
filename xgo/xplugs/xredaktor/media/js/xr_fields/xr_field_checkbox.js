Ext.define('Ext.xr.field_checkbox', {
	extend: 'Ext.form.field.Checkbox',
	alias: 'widget.xr_field_checkbox',
	config: {
	},

	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	},

	statics: {
		openConfigWindow: function(as,grid) {
			Ext.xr.field.openDefaultConfigWindowAssozSettings({
				grid: grid,
				as: as,
				title: 'Einstellung'
			});
		}
	}
});
