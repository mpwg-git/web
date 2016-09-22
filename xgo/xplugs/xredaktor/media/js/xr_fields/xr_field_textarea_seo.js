
Ext.define('Ext.xr.field_textarea_seo', {
	extend: 'Ext.form.field.TextArea',
	alias: 'widget.field_textarea_seo',
	config: {
	},

	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}

});