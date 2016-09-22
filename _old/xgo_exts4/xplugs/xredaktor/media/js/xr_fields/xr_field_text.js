Ext.define('Ext.xr.field_text', {
	extend: 'Ext.form.field.Text',
	alias: 'widget.xr_field_text',

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
