Ext.define('Ext.xr.field_yn', {
	extend: 'Ext.form.field.Checkbox',
	alias: 'widget.xr_field_yn',
	config: {
	},

	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}

});
