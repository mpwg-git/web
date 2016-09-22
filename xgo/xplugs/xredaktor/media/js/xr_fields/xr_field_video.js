Ext.define('Ext.xr.field_video', {
	extend: 'Ext.form.field.Text',
	alias: 'widget.xr_field_video',

	config: {
	},
	
	statics : {
		renderer : function(v,r){
			return v;
		}
	},
	
	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}
});
