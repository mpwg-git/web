Ext.define('Ext.xr.field_geo-poly', {
	extend: 'Ext.form.field.Hidden',
	alias: 'widget.xr_field_geo-poly',
	config: {
		guiMode: 'poly'
	},

	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}

});
