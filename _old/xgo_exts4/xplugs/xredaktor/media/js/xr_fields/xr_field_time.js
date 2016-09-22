Ext.define('Ext.xr.field_time', {
	extend: 'Ext.form.field.Time',
	alias: 'widget.xr_field_time',
	config: {
	},

	statics : {
		renderer : function(v,r){
			return v;
			if (typeof v == 'string') return v;
			return Ext.Date.format(v,"H:i:s");
		}
	},

	patch4db : function(v) {
		return Ext.Date.format(v,"H:i:s");
	},

	constructor:function(cnfg){

		try{
			var e = cnfg.value.split(':');
			v = e[0]+":"+ e[1];
			cnfg.value = v;
		} catch (e) {}


		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}

});
