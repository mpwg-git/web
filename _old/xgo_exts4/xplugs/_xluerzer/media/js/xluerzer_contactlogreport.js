
Date.prototype.getWeekNumber = function(){
	var d = new Date(+this);
	d.setHours(0,0,0);
	d.setDate(d.getDate()+4-(d.getDay()||7));
	return Math.ceil((((d-new Date(d.getFullYear(),0,1))/8.64e7)+1)/7);
};


var xluerzer_contactlogreport = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_contactlogreport";
		}

		this.getInstance = function(config) {
			return new xluerzer_contactlogreport_(config);
			return instance;
		}
	}
})();

var xluerzer_contactlogreport_ = function(config) {
	this.config = config || {};
};

xluerzer_contactlogreport_.prototype = {

	syncDate: function()
	{
		this.grid_overview.getStore().proxy.extraParams['dayx'] = Ext.getCmp(this.field_day_id).getSubmitValue();
		this.grid_overview.getStore().load();
	},

	open: function()
	{
		var me = this;

		var fields =  [
		{name:'eca_date', 			text:'Date', 			type: 'string', width: 80},
		{name:'abu_username',		text:'Representant', 	type: 'string', width: 150},
		{name:'eca_contact_id', 	text:'Contact ID', 		type: 'string', width: 80},
		{name:'eca_contact_id_human', text:'Contact', 		type: 'string', width: 200},
		{name:'eca_description', 	text:'Message', 		type: 'string', flex: 1},
		];

		this.grid_overview = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: true,
			pager: true,
			split: true,
			records_move: false,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('contactlogreport/load'),
				pid: 	'eca_id',
				fields: fields,
				params: {
				}
			}
		});

		this.grid_overview.on('afterrender',function(){
			this.syncDate();
		},this);

		this.field_day_id = Ext.id();

		var gui = Ext.widget({
			title: 'Contact Log Report',
			tbar:[
			'Select Date:',
			{
				xtype: 'datefield',
				emptyText: 'Pick date ...',
				name: 'selectedDate',
				value: new Date(),
				submitFormat: 'Y-m-d',
				id: this.field_day_id,
				listeners: {
					scope: this,
					change: function(c) {
						this.syncDate();
					}
				}
			}/*,
			{
				text: 'Reload',
				iconCls: 'xf_reload',
				scope: this,
				handler: function() {
					this.dayx = Ext.getCmp(this.field_day_id).getValue();
					this.loadDay(this.dayx);
				}
			}*/
			],
			autoScroll: true,
			xtype:'form',
			forceFit:true,
			split: true,
			items: [this.grid_overview],
			layout: 'border'
		});

		this.formPanel = gui;
		xluerzer.getInstance().showContent(gui);
	}



}