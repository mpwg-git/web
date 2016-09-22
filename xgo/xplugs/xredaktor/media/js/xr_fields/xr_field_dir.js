Ext.define('Ext.xr.field_dir', {
	extend: 'Ext.ux.TreePicker',
	alias: 'widget.xr_field_dir',
	config: {
		displayField : 's_name'
	},
	
	
	remoteFetchSelection: function(s_id,callBack) {

		this.setRawValue('Lade Daten ...');

		xframe.ajax({
			scope:this,
			url: "/xgo/xplugs/xredaktor/ajax/gui/getDirSettings",
			params : {
				s_id: s_id
			},
			stateless: function(success,json)
			{
				if (!success) return;
				this.setRawValue(json.file.s_name);
				this.backupFetcher = json;
				
				this.getPicker().selectPath(json.path);
				callBack.call(this,json);
			}
		});

	},

	constructor:function(cnfg){
		cnfg.store = xredaktor_storage.getInstance().getStore();
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	}

});


