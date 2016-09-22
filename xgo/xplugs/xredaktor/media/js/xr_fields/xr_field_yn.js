Ext.define('Ext.xr.field_yn', {

	extend: 'Ext.form.field.Checkbox',
	alias: 'widget.xr_field_yn',

	config: {

	},

	getValue: function()
	{
		var v = this.getRawValue();
		if (v) return "Y";
		return "N";
	},

	constructor:function(cnfg){


		//console.info('superclass',this.superclass.getValue());

		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}


});
