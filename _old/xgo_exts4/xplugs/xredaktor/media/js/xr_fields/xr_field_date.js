
Ext.define('Ext.xr.field_date', {
	extend: 'Ext.form.field.Date',
	alias: 'widget.xr_field_date',
	config: {
		selectOnFocus: true
	},

	statics : {
		renderer : function(v,r){
			return v;
			return Ext.Date.format(v,"Y-m-d");
		}
	},

	patch4db : function(v) {
		return v;
		return Ext.Date.format(v,"Y-m-d");
	},

	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	},

	getSubmitData: function() {

		var data = {};
		data[this.getName()] = '' + Ext.Date.format(this.getValue(),"Y-m-d");

		return data;
	}


});