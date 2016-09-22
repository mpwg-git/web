Ext.define('Ext.xr.field_timemachine', {
	extend: 'Ext.ux.TreePicker',
	alias: 'widget.xr_field_timemachine',
	config: {
		displayField : 'tm_name',
		doWidth: 400
	},

	remoteFetchSelection: function(tm_id,callBack) {

		this.setRawValue('Lade Daten ...');

		xframe.ajax({
			scope:this,
			url: "/xgo/xplugs/xredaktor/ajax/gui/getTimemachineSettings",
			params : {
				tm_id: tm_id
			},
			stateless: function(success,json)
			{
				if (!success) return;
				this.setRawValue(json.tm.tm_name);
				this.backupFetcher = json;

				this.getPicker().selectPath(json.path);
				callBack.call(this,json);
			}
		});

	},

	constructor:function(cnfg){
		cnfg.store = xredaktor_timemachine.getInstance().getStoreOfTimemachine(xredaktor.getInstance().getCurrentSiteId());
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
		this.on('afterrender',function(){
			cnfg.store.treex = this.getPicker();
		},this);
	}

});

