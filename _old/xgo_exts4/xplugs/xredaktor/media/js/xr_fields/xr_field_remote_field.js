Ext.define('Ext.xr.field_remote_field', {
	extend: 'Ext.form.field.Text',
	alias: 'widget.xr_field_remote_field',
	config: {
		
	},

	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}

});
