Ext.define('Ext.xr.field_unique_w2w', {
	extend: 'Ext.form.field.Text',
	alias: 'widget.xr_field_unique_w2w',
	
	config: {
		cols: 1
	},
	
	constructor:function(cnfg){
		
		cnfg.html = 'dddddddddddd';
		
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}

});

