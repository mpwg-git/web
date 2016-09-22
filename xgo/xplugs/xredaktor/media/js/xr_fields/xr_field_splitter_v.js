Ext.define('Ext.xr.field_splitter_v', {
	extend: 'Ext.form.Panel',
	alias: 'widget.xr_field_splitter_v',
	
	
	constructor:function(cnfg){
		
		cnfg.html = "splitter_v: "+cnfg.as_label; 
		
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}
});