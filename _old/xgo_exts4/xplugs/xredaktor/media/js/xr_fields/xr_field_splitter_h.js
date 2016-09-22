Ext.define('Ext.xr.field_splitter_h', {
	extend: 'Ext.form.Panel',
	alias: 'widget.xr_field_splitter_h',
	
	
	constructor:function(cnfg){
		
		cnfg.html = "splitter_h: "+cnfg.as_label; 
		
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}
});