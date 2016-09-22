Ext.define('Ext.xr.field_container', {
	extend: 'Ext.form.Panel',
	alias: 'widget.xr_field_container',
	
	hidden: true,
	
	constructor:function(cnfg){
		
		cnfg.html = "Container : "+cnfg.as_label; 
		
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}
});