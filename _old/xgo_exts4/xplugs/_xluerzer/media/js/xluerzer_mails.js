
var xluerzer_mails = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_mails";
		}

		this.getInstance = function(config) {
			return new xluerzer_mails_(config);
			
			return instance;
		}
	}
})();

var xluerzer_mails_ = function(config) {
	this.config = config || {};
};

xluerzer_mails_.prototype = {

	
	open_admin: function()
	{
		
		var grid_templates = xframe_pattern.getInstance().genGrid({
			title: 'Overview',
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			search: true,
			button_del: true,
			button_add: true,
			records_move: false,
			pager: false,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('mails/overview/load'),
				insert: xluerzer.getInstance().getAjaxPath('mails/overview/insert'),
				update: xluerzer.getInstance().getAjaxPath('mails/overview/update'),
				move: 	xluerzer.getInstance().getAjaxPath('mails/overview/move'),
				remove:	xluerzer.getInstance().getAjaxPath('mails/overview/remove'),
				pid: 	'amt_id',
				fields: [
				{name:'amt_id', 			text:'ID', 				type: 'int',	width: 30},
				{name:'amt_subject', 		text:'Subject',			type: 'string', width: 345}
				],
				initSort: '[{"property":"amt_id","direction":"DESC"}]'
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					this.open_details(record.data.amt_id);
				}
			}
		});
		
		grid_templates.on('afterrender',function(){
			grid_templates.getStore().load();
		},this);
		
	
		var panel_settings = Ext.widget({
			xtype: 'panel',
			border: false,
			region: 'west',
			title: 'Templates',
			width: 400,
			collapsible: true,
			collapseDirection : 'left',
			margin: '0',
			split: true,
			cls: 'settings',
			autoScroll: true,
			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				margin: 10
			},
			items: [grid_templates]
		});


		var tbar = [{
			text: 'Save',
			iconCls: 'xf_save',
			scope: this,
			handler: function() {
				this.save_details();
			}
		}];
		
		var panel_content = {
			xtype: 'form',
			region: 'center',
			title: 'Template Details',
			border: false,
			cls: 'content',
			tbar: tbar,
			bodyPadding: 20,
			items: [
				
				{
					xtype: 'textfield',
					name: 'amt_subject',
					fieldLabel: 'Subject',
					flex: 1,
					width: '100%'
				},
				{
					xtype: 'splitter',
					height: 20,
				},
				{
					xtype: 'xr_field_html',
					fieldLabel: 'Body Text',
					name: 'amt_body',
					height: 400,
					width: '100%'
				},
			]
		};


		var gui = Ext.create('Ext.form.Panel', {
			xtype: 'panel',
			border: false,
			title: 'Mail Admin',
			layout: 'border',
			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				autoScroll: true,
			},
			
			items: [panel_settings,panel_content]
		});	
		
		this.gui = gui;
		
		xluerzer.getInstance().showContent(gui);
			
	},
	
	
	open_details: function(amt_id)
	{
		console.log("opening: "+amt_id);
		
		this.amt_id = amt_id;
		
		var me = this;

		this.gui.mask('Loading...');
		xframe.ajax({
			scope: me,
			url: xluerzer.getInstance().getAjaxPath('mails/details/'),
			params : {
				amt_id: amt_id
			},
			stateless: function(success, json)
			{
				this.gui.unmask();
				if (!success) return;

				console.info("panel", this.gui);

				this.gui.getForm().setValues(json.record);

			}
		});
		
	},
	
	
	save_details: function()
	{
		
		console.log("Save..");
		var data = this.gui.getForm().getValues();
		
		console.info('data',data);
		var record = Ext.encode(data);
		
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('mails/save/'),
			params : {
				data: record,
				amt_id: this.amt_id
			},
			stateless: function(success, json)
			{
				this.gui.unmask();
				if (!success) return;
				console.info(json);
			}
		});
	},
	
	

}