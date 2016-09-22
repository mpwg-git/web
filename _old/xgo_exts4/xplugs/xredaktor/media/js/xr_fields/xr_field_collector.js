Ext.define('Ext.xr.field_collector', {
	extend: 'Ext.form.field.Text',
	alias: 'widget.xr_field_collector',
	config: {
		hidden: true
	},
	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}
});
