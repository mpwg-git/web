Ext.define('Ext.xr.field_geo_poly', {
	extend: 'Ext.xr.field_geo_point',
	alias: 'widget.xr_field_geo_poly',
	config: {
		guiMode: 'poly',
		hideLabel: true,
		resizable: true
	},

	
	getValue2: function()
	{
		return this.polyValue;
	},
	
	
	constructor:function(cnfg){
		
		this.polyValue = ''+cnfg.value;
		
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}

});
