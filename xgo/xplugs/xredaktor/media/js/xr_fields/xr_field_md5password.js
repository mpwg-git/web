Ext.define('Ext.xr.field_md5password', {
	extend: 'Ext.form.field.Text',
	alias: 'widget.xr_field_md5password',
	config: {
		inputType: 'password'
	},

	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	},
	
	getSubmitData: function() {
		
		var val 	= this.getValue();
		var data 	= {};
		
		if (this.rawConfig.value != val) {
			val = Ext.util.MD5(val);
		}
		
		data[this.getName()] = '' + val;
		
		return data;
	}

});
