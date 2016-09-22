var xluerzer_statistics = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_statistics";
		}

		this.getInstance = function(config) {
			return  new xluerzer_statistics_(config);
			return instance;
		}
	}
})();

var xluerzer_statistics_ = function(config) {
	this.config = config || {};
};

xluerzer_statistics_.prototype = {

	getTab_overview: function()
	{
		var grid_magazine = xframe_pattern.getInstance().genGrid({
			title: 'Overview',
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			search: true,
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('magazines/overview/load'),
				pid: 	'em_id',
				fields: [
				{name:'em_id', 				text:'ID', 				type: 'int',	width: 80},
				{name:'em_cover_s_id', 		text:'Cover',			type: 'int', 	width: 240,		renderer: xluerzer_e.getInstance().renderer_magazinImg},
				{name:'em_year', 			text:'Year',			type: 'int'},
				{name:'em_edition', 		text:'Edition',			type: 'int'},
				{name:'em_type', 			text:'Type',			type: 'int'},
				],
				initSort: '[{"property":"em_year","direction":"DESC"},{"property":"em_edition","direction":"DESC"}]'
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					console.log("opening: "+record.data.em_id)
					this.openDetails(record.data.em_id);
				}
			}
		});

		grid_magazine.on('afterrender',function(){
			grid_magazine.getStore().load();
		},this);

		this.grid_overview = grid_magazine;
	},


	getTab_details: function()
	{

		this.infoPanelId = Ext.id();
		this.tab_details = Ext.widget({

			disabled: true,
			border: false,
			xtype: 'propertygrid',
			defaultType: 'textfield',

			layout: 'fit',
			defaults: {
				anchor: '100%',
			},
			title: 'Details',

			tbar: [{
				text: 'Check',
				iconCls: 'xf_reload',
				scope: this,
				handler: function() {
					this.publish(1);
				},

			},{
				text: 'Publish',
				iconCls: 'xf_save',
				scope: this,
				handler: function() {
					this.publish(0);
				},

			}]

		});
	},

	publish: function(check)
	{
		//Ext.get(this.infoPanelId).update('xxx');

		var me = this;
		this.masterTab.mask('Loading Magazine ...');
		xframe.ajax({
			scope: me,
			url: xluerzer.getInstance().getAjaxPath('magazines/publish'),
			params : {
				em_id: this.em_id,
				check: check
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
				this.tab_details.setSource(json.publish);
				
				
				if (!json.publish_state)
				{
					xframe.alert("Publish","Magazine cannot be publishd. Please fix errors first.");
				}
			}
		});

	},

	open: function()
	{

		var me = this;
		title = 'Publish';

		xluerzer.getInstance().saveLastCommand({
			title: title,
			classx: 'xluerzer_statistics',
			fn: 'open'
		});

		this.getTab_overview();
		this.getTab_details();

		this.masterTab = Ext.create('Ext.tab.Panel', {
			title: title,
			layout: 'fit',
			items: [this.tab_details]
		});

		xluerzer.getInstance().showContent(this.masterTab);
		
	},


	openDetails: function(em_id)
	{
		this.em_id = em_id;
		console.log("openDetails: "+this.em_id)
		this.loadDetails();

	},

	loadDetails: function() {

		var me = this;
		this.masterTab.mask('Loading Magazine ...');
		xframe.ajax({
			scope: me,
			url: xluerzer.getInstance().getAjaxPath('magazines/details/load'),
			params : {
				em_id: this.em_id
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
				this.tab_details.setDisabled(false);
				this.masterTab.setActiveTab(this.tab_details);
			}
		});

	},

}