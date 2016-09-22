
Ext.define('Ext.xr.field_textarea', {
	extend: 'Ext.form.field.TextArea',
	alias: 'widget.xr_field_textarea',
	config: {
	},

	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}

});