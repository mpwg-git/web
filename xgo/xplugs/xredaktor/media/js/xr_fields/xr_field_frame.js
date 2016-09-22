Ext.define('Ext.xr.field_frame', {
	extend: 'Ext.ux.TreePicker',
	alias: 'widget.xr_field_frame',
	config: {
		displayField : 'a_name'
	},

	constructor:function(cnfg){
		cnfg.store = xredaktor_atoms.getInstance().getStoreOfAtoms('Seitenelemente','FRAME');
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}

});


