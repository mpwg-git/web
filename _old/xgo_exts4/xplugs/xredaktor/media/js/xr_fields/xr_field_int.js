
Ext.define('Ext.xr.field_int', {
	extend: 'Ext.form.field.Number',
	alias: 'widget.xr_field_int',
	config: {
		allowDecimals:false
	},

	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}

});
