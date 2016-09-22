var xluerzer_oe = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_oe";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xluerzer_oe_(config);
			}
			return instance;
		}
	}
})();

var xluerzer_oe_ = function(config) {
	this.config = config || {};
};

xluerzer_oe_.prototype = {


	getMenu: function()
	{
		var menuItems = [

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'This Week',
				pid: 'oetw_id',
				fields: [{name:'oetw_state',text:'Status', width: 80,renderer: this.renderer_state},{name:'oetw_title',text:'Title'},{name:'oetw_desc_short',text:'Short Description',kickHtml:true},{name:'oetw_day',text:'Day', width: 80},{name:'oetw_created_ts',text:'Created on', width: 80},{name:'oetw_keywords',text:'Keywords'},{name:'oetw_media_id',text:'Image',renderer: this.renderer_titleImg}],
				scopex: 'oe_thisweek',
				initSort: '[{"property":"oetw_id","direction":"DESC"}]'
			},

			cfg_record: {
				handler: this.default_recordInterface,
				scope: this,
				at_id: 1,
				pid: 	'oetw_id',
				prefix: 'oetw_',
				title: 'This Week',
				scopex: 'oe_thisweek'
			}

		}),

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'Inspiration',
				pid: 'oei_id',
				fields: [{name:'oei_state',text:'Status', width: 80,renderer: this.renderer_state},{name:'oei_title',text:'Title'},{name:'oei_desc_short',text:'Short Description',kickHtml:true},{name:'oei_created_ts',text:'Created On', width: 80},{name:'oei_date_start',text:'Publish start', width: 80},{name:'oei_date_end',text:'Publish end', width: 80},{name:'oei_keywords',text:'Keywords'},{name:'oei_media_id',text:'Image',renderer: this.renderer_titleImg}],
				scopex: 'oe_inspiration',
				initSort: '[{"property":"oei_id","direction":"DESC"}]'
			},

			cfg_record: {
				handler: this.default_recordInterface,
				scope: this,
				at_id: 2,
				pid: 'oei_id',
				prefix: 'oei_',
				title: 'Inspiration',
				scopex: 'oe_inspiration'
			}



		}),

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'Partners',
				pid: 'oep_id',
				fields: [{name:'oep_state',text:'Status', width: 80,renderer: this.renderer_state},{name:'oep_title',text:'Title'},{name:'oep_desc_short',text:'Short Description',kickHtml:true},{name:'oep_created_ts',text:'Created On', width: 80},{name:'oep_date_start',text:'Publish start', width: 80},{name:'oep_date_end',text:'Publish end', width: 80},{name:'oep_keywords',text:'Keywords'},{name:'oep_media_id',text:'Image',renderer: this.renderer_titleImg}],
				scopex: 'oe_partners',
				initSort: '[{"property":"oep_id","direction":"DESC"}]'
			},

			cfg_record: {
				handler: this.default_recordInterface,
				scope: this,
				at_id: 3,
				pid: 'oep_id',
				prefix: 'oep_',
				title: 'Partner',
				scopex: 'oe_partners'
			}

		}),

		xluerzer_gui.getInstance().defaultAction({


			cfg_grid: {

				text:'Designer Profiles',
				pid: 'oedp_id',
				fields: [{name:'oedp_state',text:'Status', width: 80,renderer: this.renderer_state},{name:'oedp_title',text:'Title'},{name:'oedp_desc_short',text:'Short Description',kickHtml:true},{name:'oedp_created_ts',text:'Created On', width: 80},{name:'oedp_date_start',text:'Publish start', width: 80},{name:'oedp_date_end',text:'Publish end', width: 80},{name:'oedp_keywords',text:'Keywords'},{name:'oedp_media_id',text:'Image',renderer: this.renderer_titleImg}],
				scopex: 'oe_designerprofiles',
				initSort: '[{"property":"oedp_id","direction":"DESC"}]'
			},

			cfg_record: {
				handler: this.default_recordInterface,
				scope: this,
				at_id: 4,
				pid: 'oedp_id',
				prefix: 'oedp_',
				title: 'Designer Profile',
				scopex: 'oe_designerprofiles'
			}

		}),

		xluerzer_gui.getInstance().defaultAction({


			cfg_grid: {
				text:"Editor's Blog",
				pid: 'oebp_id',
				fields: [{name:'oebp_state',text:'Status', width: 80,renderer: this.renderer_state},{name:'oebp_title',text:'Title'},{name:'oebp_desc_short',text:'Short Description',kickHtml:true},{name:'oebp_created_ts',text:'Created On', width: 80},{name:'oebp_date_start',text:'Publish start', width: 80},{name:'oebp_date_end',text:'Publish end', width: 80},{name:'oebp_keywords',text:'Keywords'},{name:'oebp_media_id',text:'Image',renderer: this.renderer_titleImg},{name:'oebp_featured',text:'Featured', width: 80,renderer: this.featuredRender, scope: this}],
				scopex: 'oe_blogposts',
				initSort: '[{"property":"oebp_id","direction":"DESC"}]'
			},

			cfg_record: {
				handler: this.default_recordInterface,
				scope: this,
				at_id: 5,
				pid: 'oebp_id',
				prefix: 'oebp_',
				title: 'Editor Blog',
				scopex: 'oe_blogposts'
			}

		}),

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'Events',
				pid: 'oee_id',
				fields: [{name:'oee_state',text:'Status', width: 80,renderer: this.renderer_state},{name:'oee_title',text:'Title'},{name:'oee_desc_short',text:'Short Description',kickHtml:true},{name:'oee_created_ts',text:'Created On', width: 80},{name:'oee_date_start',text:'Publish start', width: 80},{name:'oee_date_end',text:'Publish end', width: 80},{name:'oee_keywords',text:'Keywords'},{name:'oee_media_id',text:'Image',renderer: this.renderer_titleImg}],
				scopex: 'oe_events',
				initSort: '[{"property":"oee_id","direction":"DESC"}]'
			},

			cfg_record: {
				handler: this.default_recordInterface,
				scope: this,
				at_id: 6,
				pid: 'oee_id',
				prefix: 'oee_',
				title: 'Event',
				scopex: 'oe_events'
			}


		}),

		xluerzer_gui.getInstance().defaultAction({
			cfg_grid: {
				text:'Other Article',
				pid: 'oeoa_id',
				fields: [{name:'oeoa_state',text:'Status', width: 80,renderer: this.renderer_state},{name:'oeoa_title',text:'Title'},{name:'oeoa_desc_short',text:'Short Description',kickHtml:true},{name:'oeoa_created',text:'Created On', width: 80},{name:'oeoa_date_start',text:'Publish start', width: 80},{name:'oeoa_date_end',text:'Publish end', width: 80},{name:'oeoa_keywords',text:'Keywords'},{name:'oeoa_media_id',text:'Image',renderer: this.renderer_titleImg}],
				scopex: 'oe_otherarticle',
				initSort: '[{"property":"oeoa_id","direction":"DESC"}]'
			},
			cfg_record: {
				handler: this.default_recordInterface,
				scope: this,
				at_id: 7,
				pid: 'oeoa_id',
				prefix: 'oeoa_',
				title: 'Article',
				scopex: 'oe_otherarticle'
			}
		}),

		{
			xtype:'text',
			text: '',
			cls: 'spacer'
		},

		{
			text:'Frontpage Configuration',
			handler: this.openFrontPageConfig,
			disabled: true,
			scope: this
		},

		{
			xtype:'text',
			text: '',
			cls: 'spacer'
		},

		/*
		xluerzer_gui.getInstance().defaultAction({
		text:'File Manager',
		disabled: true,
		pid: 'id',
		fields: [{name:'s_id',text:'Status', width: 80,renderer: this.renderer_state, scope: this},{name:'title',text:'Title'},{name:'created',text:'Created On', width: 80},{name:'keywords',text:'Keywords'},{name:'media_id',text:'Image',renderer: this.renderer_titleImg}],
		scopex: 'oe_gallery'
		})
		*/

		];

		return menuItems;
	},

	renderer_state: function(value) {
		switch(''+value)
		{
			case '1': return "<span class='published'>published</span>";
			case '2': return "<span class='pending'>pending review</span>";
			case '3': return "<span class='draft'>draft</span>";
			default: return "unkown";
		}
	},

	renderer_titleImg: function(value) {
		if ((value !== 'undefined') && (value != 0)) {
			return "<img width=120 height=40 src='/xgo/xplugs/xluerzer/ajax/oe_media/titleImg/"+value+"'>";
		}
		else {
			return "";
			return "<img width=120 height=40 src='/xgo/xplugs/xluerzer/ajax/oe_media/titleImg/default.png'>";
		}
	},


	getDefaultSettingsByScope: function(prefix,scopex)
	{
		var items  = [
		xluerzer_gui.getInstance().setStateField({
			name: prefix+'state'
		}),
		xluerzer_gui.getInstance().publishStartField({
			name: prefix+'date_start'
		}),
		xluerzer_gui.getInstance().publishEndField({
			name: prefix+'date_end'
		}),
		xluerzer_gui.getInstance().chooseImageField({
			name: prefix+'media_id'
		})
		];

		switch (scopex)
		{
			case 'oe_events':
			items = [
			xluerzer_gui.getInstance().setStateField({
				name: 'oee_state'
			}),
			{
				xtype: 'datefield',
				emptyText: 'Pick date ...',
				fieldLabel: 'From date',
				name: 'oee_date_from',
			},
			{
				xtype: 'datefield',
				emptyText: 'Pick date ...',
				fieldLabel: 'To date',
				name: 'oee_date_to',
			},
			xluerzer_gui.getInstance().chooseImageField({
				name: 'oee_media_id'
			})


			];
			break;
			case 'oe_thisweek':
			items  = [
			xluerzer_gui.getInstance().setStateField({
				name: prefix+'state'
			}),
			xluerzer_gui.getInstance().publishStartField({
				name: prefix+'day'
			}),
			xluerzer_gui.getInstance().chooseImageField({
				name: prefix+'media_id'
			})
			];
			break;

			case 'oe_blogposts':
			items = [
			xluerzer_gui.getInstance().setStateField({
				name: prefix+'state'
			}),
			xluerzer_gui.getInstance().simplyCombo({
				fieldLabel: 'Featured Post',
				name: prefix+'featured',
				data: [{k:'0',v:'No'},{k:'1',v:'Yes'}]
			}),
			xluerzer_gui.getInstance().publishStartField({
				name: prefix+'date_start'
			}),
			xluerzer_gui.getInstance().publishEndField({
				name: prefix+'date_end'
			}),
			xluerzer_gui.getInstance().chooseImageField({
				name: prefix+'media_id'
			}),
			xluerzer_gui.getInstance().chooseImageField({
				fieldLabel: 'Blog Overview',
				name: prefix+'img_promo_id'
			}),
			xluerzer_gui.getInstance().chooseImageField({
				fieldLabel: 'Blog Featured',
				name: prefix+'img_promo_single_id'
			})
			];
			break;
			default : break;
		}

		return items;
	},

	getDefaultContentByScope: function(prefix,scopex)
	{
		var items = [

		{
			xtype: 'fieldcontainer',
			layout: 'hbox',
			width: '100%',
			forceFit: true,
			defaultType: 'textfield',

			items: [

			{
				xtype: 'container',
				flex: 3,
				items: [
				{
					xtype: 'textfield',
					name: prefix+'title',
					fieldLabel: 'Title',
					width: '100%',
					height: 40
				},

				{
					xtype: 'xr_field_html',
					fieldLabel: 'Short description',
					name: prefix+'desc_short',
					height: 175,
					width: '100%'
				},
				]
			},

			{
				xtype: 'splitter',
				width: 20,
			},
			{
				xtype: 'textareafield',
				fieldLabel: 'Keywords',
				name: prefix+'keywords',
				flex: 1,
				height: 220
			}

			]
		},

		{
			xtype: 'fieldcontainer',
			layout: 'column',
			width: '100%',
			items: [{
				xtype:'xr_field_html',
				columnWidth: 0.5,
				fieldLabel: 'Left',
				name: prefix+'col_left',
			},{
				xtype: 'splitter',
				width:20
			},{
				xtype:'xr_field_html',
				columnWidth: 0.5,
				fieldLabel: 'Right',
				name: prefix+'col_right'
			}]
		}

		];


		switch (scopex)
		{
			case 'oe_inspiration':
			items = [

			{

				xtype: 'fieldcontainer',
				layout: 'hbox',
				width: '100%',
				forceFit: true,
				defaultType: 'textfield',

				items: [

				{
					xtype: 'container',
					flex: 3,
					items: [
					{
						xtype: 'textfield',
						name: 'oei_title',
						fieldLabel: 'Title',
						width: '100%',
						height: 40
					},

					{
						xtype: 'xr_field_html',
						fieldLabel: 'Short description',
						name: 'oei_desc_short',
						height: 175,
						width: '100%'
					},
					]
				},

				{
					xtype: 'splitter',
					width: 20,
				},
				{
					xtype: 'textareafield',
					fieldLabel: 'Keywords',
					name: 'oei_keywords',
					flex: 1,
					height: 220
				}

				]
			},


			xluerzer_gui.getInstance().setLinkField({
				name: 'oei_url'
			})

			];
			break;

			case 'oe_designerprofiles':
			items = [

			{

				xtype: 'fieldcontainer',
				layout: 'hbox',
				width: '100%',
				forceFit: true,
				defaultType: 'textfield',

				items: [

				{
					xtype: 'container',
					flex: 1,
					items: [

					{
						xtype: 'textfield',
						fieldLabel: 'First Name:',
						name: 'oedp_name_first',
						width: '100%'
					},

					{
						xtype: 'textfield',
						fieldLabel: 'Last Name:',
						name: 'oedp_name_last',
						width: '100%'
					},


					{
						xtype: 'textareafield',
						fieldLabel: 'Keywords',
						name: 'oedp_keywords',
						width: '100%',
						height: 120
					},

					]
				},

				{
					xtype: 'splitter',
					width: 20,
				},
				{
					xtype:'xr_field_html',
					fieldLabel: 'Bio',
					name: 'oedp_bio',
					height: 220,
					flex: 3
				}

				]
			},


			xluerzer_gui.getInstance().setLinkField({
				name: 'oedp_url'
			})

			];
			break;

			case 'oe_events':
			items = [

			{

				xtype: 'fieldcontainer',
				layout: 'hbox',
				width: '100%',
				forceFit: true,
				defaultType: 'textfield',

				items: [

				{
					xtype: 'container',
					flex: 3,
					items: [
					{
						xtype: 'textfield',
						name: 'oee_title',
						fieldLabel: 'Title',
						width: '100%',
						height: 40
					},

					{
						xtype: 'textareafield',
						fieldLabel: 'Short description',
						name: 'oee_desc_short',
						height: 175,
						width: '100%'
					},
					]
				},

				{
					xtype: 'splitter',
					width: 20,
				},
				{
					xtype: 'textareafield',
					fieldLabel: 'Keywords',
					name: 'oee_keywords',
					flex: 1,
					height: 220
				}

				]
			},


			xluerzer_gui.getInstance().longDescriptionField({
				name: 'oee_desc_long'
			}),

			xluerzer_gui.getInstance().setLinkField({
				name: 'oee_url'
			}),

			];

			break;

			case 'oe_partners':
			items = [

			{

				xtype: 'fieldcontainer',
				layout: 'hbox',
				width: '100%',
				forceFit: true,
				defaultType: 'textfield',

				items: [

				{
					xtype: 'container',
					flex: 3,
					items: [
					{
						xtype: 'textfield',
						name: 'oep_title',
						fieldLabel: 'Title',
						width: '100%',
						height: 40
					},

					{
						xtype: 'xr_field_html',
						fieldLabel: 'Short description',
						name: 'oep_desc_short',
						height: 175,
						width: '100%'
					},
					]
				},

				{
					xtype: 'splitter',
					width: 20,
				},
				{
					xtype: 'textareafield',
					fieldLabel: 'Keywords',
					name: 'oep_keywords',
					flex: 1,
					height: 220
				}

				]
			},

			xluerzer_gui.getInstance().longDescriptionField({
				name: 'oep_desc_long'
			}),

			xluerzer_gui.getInstance().setLinkField({
				name: 'oep_url'
			})


			]

			break;

			default: break;
		}

		return items;
	},

	default_recordInterface: function(record,cfg) {

		console.info('Info',record,cfg,record[cfg['pid']]);

		var scopex 	= cfg.scopex;
		var prefix 	= cfg.prefix;
		var id 		= record.data[cfg['pid']];
		var me 		= this;

		var columns = [
		{ text: 'Image',  		dataIndex: 'thumb'},
		{ text: 'Filename',  	dataIndex: 'name' },
		{ text: 'Title',  		dataIndex: 'title'},
		{ text: 'Description',  dataIndex: 'description'},
		{ text: 'Uploaded', 	dataIndex: 'uploaded' },
		{ text: 'Size', 		dataIndex: 'size' },
		{ text: 'Size', 		dataIndex: 'del' }
		];

		var panel_settings = Ext.widget({
			xtype: 'form',
			border: false,
			region: 'west',
			title: 'Settings',
			width: 200,
			collapsible: true,
			collapseDirection : 'left',
			margin: '0',
			split: true,
			cls: 'settings',
			autoScroll: true,
			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				padding: 0
			},
			items: this.getDefaultSettingsByScope(prefix,scopex)
		});


		var tbar = [{
			text: 'Save',
			iconCls: 'xf_save',
			scope: this,
			handler: function() {
				saveData();
			}
		}];

		var tpanel_content 	= Ext.create('Ext.form.Panel', {
			title: 'Content',
			border: false,
			cls: 'innen-content',
			xtype: 'form',
			autoScroll: true,
			tbar: tbar,
			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				padding: 0
			},

			items: this.getDefaultContentByScope(prefix,scopex)
		});

		var tpanel_sseo		= xluerzer_gui.getInstance().getDefaultTabPanel_sseo(cfg,tbar);
		var tpanel_log 		= xluerzer_gui.getInstance().getDefaultTabPanel_log(cfg,id);
		var tpanel_preview 	= xluerzer_gui.getInstance().getDefaultTabPanel_preview(cfg,id);
		var tpanel_gallery 	= xluerzer_gui.getInstance().getDefaultTabPanel_gallery(cfg,id);
		var forms 			= [panel_settings, tpanel_content, tpanel_sseo];


		var panel_content = {
			xtype: 'tabpanel',
			region: 'center',
			border: false,
			cls: 'content',
			items: [tpanel_content,tpanel_gallery,tpanel_preview,tpanel_sseo,tpanel_log]
		};

		var gui = Ext.create('Ext.panel.Panel', {
			border: false,
			title: cfg.title+': '+id,
			layout: 'border',
			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				autoScroll: true,
			},

			items: [panel_settings,panel_content]
		});


		loadData = function()
		{
			gui.mask('Loading Data ...');
			xframe.ajax({
				scope: me,
				url: xluerzer.getInstance().getAjaxPath('oe_data_load/'+id),
				params : {
					id: id,
					scopex: cfg.scopex
				},
				stateless: function(success, json)
				{
					gui.unmask();
					if (!success) return;
					Ext.each(forms,function(formx) {
						formx.getForm().setValues(json.record);
					},this);

					tpanel_gallery.setValues(json.record);
				}
			});
		},

		saveData = function()
		{
			var values = {}
			Ext.each(forms,function(formx){
				Ext.apply(values, formx.getForm().getValues());
			});
			var record = Ext.encode(values);

			gui.mask('Saving Data ...');
			xframe.ajax({
				scope: me,
				type: 'post',
				url: xluerzer.getInstance().getAjaxPath('oe_data_save/'+id),
				params : {
					id: id,
					scopex: cfg.scopex,
					record: record
				},
				stateless: function(success, json)
				{
					gui.unmask();
					if (!success) return;

					Ext.each(forms,function(formx) {
						formx.getForm().setValues(json.record);
					},this);

					tpanel_gallery.setValues(json.record);
				}
			});
		},

		gui.on('afterrender',function(){
			loadData();
		},this,{buffer:1});

		xluerzer.getInstance().showContent(gui);
	},


}