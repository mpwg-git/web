Ext.define('Ext.xr.field_wid', {
	extend: 'Ext.ux.TreePicker',
	alias: 'widget.xr_field_wid',
	config: {
		displayField : 'a_name',
		doWidth: 400
	},

	remoteFetchSelection: function(a_id,callBack) {
		this.setRawValue('Lade Daten ...');
		xframe.ajax({
			scope:this,
			url: "/xgo/xplugs/xredaktor/ajax/gui/getAtomSettings",
			params : {
				a_id: a_id
			},
			stateless: function(success,json)
			{
				if (!success) return;
				this.setRawValue(json.atom.a_name);
				this.backupFetcher = json;

				this.getPicker().selectPath(json.path);
				callBack.call(this,json);
			}
		});
	},

	constructor:function(cnfg){
		cnfg.store = xredaktor_atoms.getInstance().getStoreOfAtoms('Wizards','WIZARD');
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
		this.on('afterrender',function(){
			cnfg.store.treex = this.getPicker();
		},this);
		
	}

});


