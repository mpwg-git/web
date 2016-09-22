var xluerzer_ads = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_ads";
		}

		this.getInstance = function(config) {
			return new xluerzer_ads_(config);
			return instance;
		}
	}
})();

var xluerzer_ads_ = function(config) {
	this.config = config || {};
};

xluerzer_ads_.prototype = {

	open_overview: function()
	{

		this.grid_overview = xframe_pattern.getInstance().genGrid({
			region:'west',
			width: 200,
			title: 'Campaings',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			search: true,
			pager: true,
			records_move: false,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('ads/overview/load'),
				insert: xluerzer.getInstance().getAjaxPath('ads/overview/insert'),
				remove: xluerzer.getInstance().getAjaxPath('ads/overview/remove'),
				pid: 	'a_id',
				initSort: '[{"property":"a_id","direction":"DESC"}]',
				fields: [
				{name:'a_id',		text:'ID', 						type: 'int',		width:60},
				{name:'a_clicks', 	text:'Clicks', 					type: 'int',		width:110},
				{name:'a_name',		text:'Name', 					type: 'string',		flex:1},
				]
			},

			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					this.openDetails(record.data.a_id);
				}
			}
		});

		this.grid_overview.on('afterrender',function(){
			this.grid_overview.getStore().load();
		},this);


		this.panel_settings = Ext.widget({
			bodyPadding: 20,
			disabled: true,
			region: 'center',
			xtype: 'form',
			autoScroll: true,
			tbar: ['->',{
				iconCls: 'xf_save',
				xtype: 'button',
				scope: this,
				text: 'Save',
				handler: this.save
			}],
			items: [
			{
				fieldLabel: 'Name',
				xtype: 'textfield',
				name: 'a_name',
			},

			{
				fieldLabel: 'URL',
				xtype: 'textfield',
				name: 'a_url',
			},

			{
				fieldLabel: 'Overall Clicks',
				readOnly: true,
				xtype: 'textfield',
				name: 'a_clicks',
			},

			{
				xtype: 'fieldset',
				title: 'Placements | start/stop',
				maxWidth: 320,
				items: [
				{
					fieldLabel: 'Startdate',
					xtype: 'datefield',
					name: 'a_start',
					submitFormat: 'Y-m-d'
				},
				{
					fieldLabel: 'Stopdate',
					xtype: 'datefield',
					name: 'a_stop',
					submitFormat: 'Y-m-d'
				}
				]
			},



			{
				xtype: 'fieldset',
				title: 'AD - Media',
				maxWidth: 320,
				items: [

				{
					fieldLabel: 'Skyscraper (vertical)',
					xtype: 'xr_field_file',
					name: 'a_media_sky_s_id',
				},
				{
					fieldLabel: 'Medium-Rec.(horizontal)',
					xtype: 'xr_field_file',
					name: 'a_media_mrectangle_s_id',
				}

				]
			},


			{
				xtype: 'fieldset',
				title: 'Placements',
				maxWidth: 320,
				items: [{
					boxLabel: 'Feature',
					xtype: 'checkbox',
					name: 'a_pos_feature',
					inputValue: '1',
					uncheckedValue: '0',
				},
				{
					boxLabel: 'Blog',
					xtype: 'checkbox',
					name: 'a_pos_blog',
					inputValue: '1',
					uncheckedValue: '0',
				},
				{
					boxLabel: 'Inspiration',
					xtype: 'checkbox',
					name: 'a_pos_inspiration',
					inputValue: '1',
					uncheckedValue: '0',
				}]
			}


			]
		});

		this.gui = Ext.widget({
			title: 'ADS-Configuration',
			xtype: 'panel',
			layout: 'border',
			items: [this.panel_settings,this.grid_overview]
		});


		xluerzer.getInstance().showContent(this.gui);
	},


	openDetails: function(a_id)
	{
		this.a_id = a_id;
		this.gui.mask('loading config ...');
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('ads/load/'+a_id),
			params : {
				a_id: a_id
			},
			stateless: function(success, json)
			{
				this.gui.unmask();
				if (!success) return;
				this.panel_settings.setDisabled(false);
				this.panel_settings.getForm().setValues(json.data);
			}
		});
	},

	save: function()
	{
		this.gui.mask('saving config ...');
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('ads/save/'+this.a_id),
			params : {
				a_id: this.a_id,
				data: Ext.encode(this.panel_settings.getForm().getValues())
			},
			stateless: function(success, json)
			{
				this.grid_overview.getStore().load();
				this.gui.unmask();
				if (!success) return;
			}
		});
	}

}