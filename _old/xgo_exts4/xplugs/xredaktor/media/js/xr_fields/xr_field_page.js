Ext.define('Ext.xr.field_page', {
	extend: 'Ext.ux.TreePicker',
	alias: 'widget.xr_field_page',
	config: {
		displayField : 'p_name',
		doWidth: 400
	},


	remoteFetchSelection: function(p_id,callBack) {

		this.setRawValue('Lade Daten ...');

		xframe.ajax({
			scope:this,
			url: "/xgo/xplugs/xredaktor/ajax/gui/getPageSettings",
			params : {
				p_id: p_id
			},
			stateless: function(success,json)
			{
				if (!success) return;
				this.setRawValue(json.page.p_name);
				this.backupFetcher = json;
				
				this.getPicker().selectPath(json.path);
				callBack.call(this,json);
			}
		});

	},

	constructor:function(cnfg){
		cnfg.store = xredaktor_pages.getInstance().getStoreOfPages(xredaktor.getInstance().getCurrentSiteId());
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
		this.on('afterrender',function(){
			cnfg.store.treex = this.getPicker();
		},this);
	}

});


