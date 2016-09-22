
Ext.define('Ext.xr.field_radio', {
	extend: 'Ext.form.RadioGroup',
	alias: 'widget.xr_field_radio',
	config: {
	},

	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	},
	
	getValuePatched:function()
	{
		return this.getValue()[this.rawConfig.name];
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
