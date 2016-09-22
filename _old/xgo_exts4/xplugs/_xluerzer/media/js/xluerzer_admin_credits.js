

var xluerzer_admin_credits = (function() {
	var instance = null;
	return new function() {

		this.getInstance = function(config) {
			return new xluerzer_admin_credits_(config);
			return instance;
		}
	}
})();

var xluerzer_admin_credits_ = function(config) {
	this.config = config || {};
};

xluerzer_admin_credits_.prototype = {

	getTab_mags: function()
	{
		this.grid_mags = xframe_pattern.getInstance().genGrid({
			title: 'Magazine Types',
			region:'west',
			width: 200,
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			search: true,
			records_move: false,
			pager: false,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('admin-credits_magtypes/load'),
				pid: 	'emt_id',
				fields: [
				{name:'emt_id', 						text:'ID', 				type: 'int',	width: 80},
				{name:'emt_name', 						text:'Name',			type: 'string'},
				{name:'emt_archiveNumberPrefix', 		text:'Prefix',			type: 'string'},
				],
				initSort: '[{"property":"emt_name","direction":"ASC"}]'
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					this.openDetails(record.data.emt_id,record.data.emt_name);
				}
			}
		});

		this.grid_mags.on('afterrender',function(){
			this.grid_mags.getStore().load();
		},this);


	},

	getTab_settings: function()
	{
		this.grid_credits = xframe_pattern.getInstance().genGrid({
			disabled: true,
			title: 'Available Credits',
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			search: true,
			records_move: true,
			pager: false,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('admin-credits_assignedCredits/load'),
				move: 	xluerzer.getInstance().getAjaxPath('admin-credits_assignedCredits/move'),
				pid: 	'c2m_id',
				fields: [
				{name:'c2m_id', 					text:'ID', 				type: 'int',	width: 80},
				{name:'act_description', 			text:'Description',		type: 'string'},
				{name:'act_id', 					text:'Type-ID',			type: 'int'},
				{name:'c2m_checked', 				text:'Available',		type: 'bool'},
				{name:'c2m_sort', 					text:'Sort',			type: 'int'},
				],
				initSort: '[{"property":"c2m_sort","direction":"ASC"}]'
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					console.log("opening: "+record.data.em_id)
					this.openDetails(record.data.emt_id,record.data.act_description);
				}
			}
		});
		
		this.grid_credits.getStore().on('update',function(grid,r){

			var record = r.data;

			this.gui.mask("Saving data ....");
			xframe.ajax({
				scope: this,
				url: xluerzer.getInstance().getAjaxPath('admin-credits_assignedCredits/save_check'),
				params : {
					c2m_id: record['c2m_id'],
					check: record['c2m_checked'] ? '1' : '0'
				},
				stateless: function(success, json)
				{
					this.grid_credits.getStore().load();
					this.gui.unmask();
					if (!success) return;
				}
			});


		},this);


		this.grid_credits.on('afterrender',function(){
			
		},this);

	},

	openDetails: function(emt_id,emt_name)
	{
		console.log("opening: ",emt_id,emt_name)
		this.grid_credits.setTitle("Available Credits for : "+emt_name);
		this.grid_credits.setDisabled(false);
		this.grid_credits.getStore().proxy.extraParams['emt_id'] = emt_id;
		this.grid_credits.getStore().load();
	},

	open: function()
	{
		this.getTab_mags();
		this.getTab_settings();

		this.gui = Ext.widget({
			title: 'Credits Administration',
			xtype: 'panel',
			layout: 'border',
			items: [this.grid_credits,this.grid_mags]
		});

		xluerzer.getInstance().showContent(this.gui);
	}



}