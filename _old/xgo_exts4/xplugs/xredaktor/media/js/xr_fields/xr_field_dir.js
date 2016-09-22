Ext.define('Ext.xr.field_dir', {
	extend: 'Ext.ux.TreePicker',
	alias: 'widget.xr_field_dir',
	config: {
		displayField : 's_name'
	},

	constructor:function(cnfg){
		cnfg.store = xredaktor_storage.getInstance().getStore();
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}

});


