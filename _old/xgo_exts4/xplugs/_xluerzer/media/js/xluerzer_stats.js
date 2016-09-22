var xluerzer_stats = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_stats";
		}

		this.getInstance = function(config) {
			return  new xluerzer_stats_(config);
			
			return instance;
		}
	}
})();

var xluerzer_stats_ = function(config) {
	this.config = config || {};
};

xluerzer_stats_.prototype = {

	processTabs: function(stats)
	{

		this.masterTab.removeAll();
		Ext.iterate(stats,function(name,values){

			var tmp = Ext.widget({

				border: false,
				xtype: 'propertygrid',
				defaultType: 'textfield',

				nameColumnWidth: 400,

				layout: 'fit',
				defaults: {
					anchor: '100%',
				},
				title: name,

				listeners: {
					scope: this,
					buffer: 1,
					afterrender: function()
					{
						tmp.setSource(values);
					}
				}

			});

			this.masterTab.add(tmp);

		},this);

		this.masterTab.setActiveTab(0);

	},

	open_overview: function()
	{

		var me = this;
		title = 'Statistics';

		xluerzer.getInstance().saveLastCommand({
			title: title,
			classx: 'xluerzer_stats',
			fn: 'open_overview'
		});

		this.masterTab = Ext.create('Ext.tab.Panel', {
			activeTab: 0,
			title: title,
			layout: 'fit',
			items: [],
			tbar: [{
				text: 'reload statistics',
				iconCls: 'xf_reload',
				scope: this,
				handler: function() {
					this.loadDetails();
				},

			}],
			listeners: {
				scope: this,
				buffer: 1,
				afterrender: function(){
					this.loadDetails();
				}
			}
		});

		xluerzer.getInstance().showContent(this.masterTab);
	},

	loadDetails: function() {

		var me = this;
		this.masterTab.mask('loading statistics  ...');
		xframe.ajax({
			scope: me,
			url: xluerzer.getInstance().getAjaxPath('stats/details/load'),
			params : {
				em_id: this.em_id
			},

			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;

				this.processTabs(json.stats);

				//this.masterTab.setActiveTab(this.tab_details);
				//this.tab_details.setSource(json.stats);
			}
		});

	},

}