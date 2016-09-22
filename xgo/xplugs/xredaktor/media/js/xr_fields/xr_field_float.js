Ext.define('Ext.xr.field_float', {
	extend: 'Ext.form.field.Number',
	alias: 'widget.xr_field_float',
	config: {
		allowDecimals:true,
		decimalSeparator: '.'
	},

	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}

});