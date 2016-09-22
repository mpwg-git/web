Ext.define('Ext.xr.field_action', {
	extend: 'Ext.form.field.Text',
	alias: 'widget.xr_field_action',
	config: {
	},
	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}
});
