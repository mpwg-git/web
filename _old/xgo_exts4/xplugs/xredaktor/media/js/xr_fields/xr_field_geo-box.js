Ext.define('Ext.xr.field_geo-box', {
	extend: 'Ext.form.field.Hidden',
	alias: 'widget.xr_field_geo-box',
	config: {
		guiMode: 'box'
	},

	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}

});