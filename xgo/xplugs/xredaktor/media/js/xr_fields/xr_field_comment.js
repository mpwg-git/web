Ext.define('Ext.xr.field_comment', {
	extend: 'Ext.form.Panel',
	alias: 'widget.xr_field_comment',
	
	
	constructor:function(cnfg){
		
		cnfg.html = "comment: "+cnfg.as_label; 
		
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}
});