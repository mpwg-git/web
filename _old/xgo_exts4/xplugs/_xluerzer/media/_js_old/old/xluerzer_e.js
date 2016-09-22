var xluerzer_e = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_e";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xluerzer_e_(config);
			}
			return instance;
		}
	}
})();

var xluerzer_e_ = function(config) {
	this.config = config || {};
};

xluerzer_e_.prototype = {

	getMenu: function() {

		var menuItems = [

		{
			text:'Submissions',
			handler: xluerzer_submissions.getInstance().showSubmissionsByDay,
			scope: xluerzer_submissions.getInstance()
		},

		{
			text:'Search Submissions',
			handler: xluerzer_submissions.getInstance().searchNorm,
			scope: xluerzer_submissions.getInstance()
		},

		{
			text:'Search Students Submissions',
			handler: xluerzer_submissions.getInstance().searchStudents,
			scope: xluerzer_submissions.getInstance()
		},

		{
			xtype:'text',
			text: '',
			cls: 'spacer'
		},

		{
			text:'Contacts',
			handler: xluerzer_contacts.getInstance().searchContacts,
			scope:  xluerzer_contacts.getInstance()
		},
		{
			text:'CSV Import <b>(csv bitte an gitgo schicken)</b>',
			idx: -1
		},
		{
			xtype:'text',
			text: '',
			cls: 'spacer'
		},
		{
			text:'Ads of the Week',
			//handler: this.showAdsOfTheWeekOverview,
			scope: this,
		},
		{
			xtype:'text',
			text: '',
			cls: 'spacer'
		},

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'Magazines',
				pid: 'em_id',
				fields: [{name:'em_year',text:'Year', width: 80},{name:'em_edition',text:'Edition', width: 80},{name:'em_modified_ts',text:'Modified on', width: 80},{name:'em_created_ts',text:'Created on', width: 80},{name:'em_cover_id',text:'Image',renderer: this.renderer_magazinImg}],
				scopex: 'e_magazines',
				initSort: '[{"property":"em_id","direction":"DESC"}]'
			},

			cfg_record: {
				handler: this.default_recordInterface,
				scope: this,
				at_id: 8,
				pid: 	'em_id',
				prefix: 'em_',
				title: 'Magazine',
				scopex: 'e_magazines'
			}

		}),

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'Interviews',
				pid: 'ei_id',
				fields: [{name:'ei_state',text:'Status', width: 80},{name:'ei_partner',text:'Interview Partner'},{name:'ei_modified_ts',text:'Modified on', width: 80},{name:'ei_created_ts',text:'Created on', width: 80},{name:'ei_preview_image',text:'Image',renderer: this.renderer_interviewImg}],
				scopex: 'e_interviews',
				initSort: '[{"property":"ei_id","direction":"DESC"}]'
			},

			cfg_record: {
				handler: this.default_recordInterface,
				scope: this,
				at_id: 9,
				pid: 	'ei_id',
				prefix: 'ei_',
				title: 'Interview',
				scopex: 'e_interviews'
			}
		}),

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'Digital',
				pid: 'edm_id',
				fields: [{name:'edm_title',text:'Title', width: 200},{name:'edm_description',text:'Description'},{name:'edm_isApp',text:'App',renderer: this.renderer_app, width: 80},{name:'edm_modified_ts',text:'Modified on', width: 80},{name:'edm_created_ts',text:'Created on', width: 80}],
				scopex: 'e_digitals',
				initSort: '[{"property":"edm_id","direction":"DESC"}]'
			},

			cfg_record: {
				handler: this.default_recordInterface,
				scope: this,
				at_id: 10,
				pid: 	'edm_id',
				prefix: 'edm_',
				title: 'Digital',
				scopex: 'e_digitals'
			}

		}),
		{
			xtype:'text',
			text: '',
			cls: 'spacer'
		},

		{
			text:'Publishing',
			handler: function() {
				xluerzer_publish.getInstance().open();
			},
			scope: this,
		},
		{
			xtype:'text',
			text: '',
			cls: 'spacer'
		},
		{
			text:'Mailings',
			disabled: true,
			idx: -1
		}
		];

		return menuItems;
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
			case 'e_interviews':
			items = [
			xluerzer_gui.getInstance().setStateField({
				name: 'ei_state'
			}),
			{
				xtype: 'textfield',
				readonly: true,
				fieldLabel: 'Edition',
				name: 'ei_edition',
			},
			{
				xtype: 'textfield',
				readonly: true,
				fieldLabel: 'Year',
				name: 'ei_year',
			},
			xluerzer_gui.getInstance().chooseImageField({
				name: 'ei_preview_image'
			})

			];
			break;
			
			
			case 'e_digitals':
			items = [
			xluerzer_gui.getInstance().setStateField({
				name: 'edm_state'
			})
			

			];
			break;
			
			
			
			default : break;
		} 

		return items;
	},
	
	
	getDefaultContentByScope: function(prefix,scopex)
	{
		console.info(prefix,scopex);
		var items = [];

		switch (scopex)
		{

			case 'e_magazines':
			items = [

				

			];
			break;

			case 'e_interviews':
			items = [

				{
				xtype: 'textfield',
				fieldLabel: 'Interviewpartner',
				name: 'ei_partner'
				},
				
				xluerzer_gui.getInstance().longDescriptionField({
				name: 'ei_col_left'
				}),

			];
			break;

			case 'e_digitals':
			items = [
				{
				xtype: 'textfield',
				fieldLabel: 'Title',
				name: 'edm_title'
				},
				
				xluerzer_gui.getInstance().longDescriptionField({
				name: 'edm_description'
				}),
				
				xluerzer_gui.getInstance().setLinkField({
				name: 'edm_link'
				})

			];
			break;

			default: break;
		}

		console.info('items',items);

		return items;
	},
	
	
	default_recordInterface: function(record,cfg) {

		var scopex 	= cfg.scopex;
		var prefix 	= cfg.prefix;
		var id 		= record.data[cfg['pid']];
		var me 		= this;

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
				url: xluerzer.getInstance().getAjaxPath('e_data_load/'+id),
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
				url: xluerzer.getInstance().getAjaxPath('e_data_save/'+id),
				params : {
					id: id,
					scopex: cfg.scopex,
					record: record
				},
				stateless: function(success, json)
				{
					gui.unmask();
					if (!success) return;
					gui.getForm().setValues(json.record);
				}
			});
		},

		gui.on('afterrender',function(){
			loadData();
		},this,{buffer:1});

		xluerzer.getInstance().showContent(gui);
	},

	renderer_app: function(value)
	{
		if ((value !== 'undefined') && (value != 0)) {
			return "No";
		}
		else {
			return "Yes";
		}
	},
	

	renderer_digitalImg: function(value)
	{
		if ((value !== 'undefined') && (value != 0)) {
			return "<img width=163 height=80 src='/xgo/xplugs/xluerzer/ajax/e_media/digitalImg/"+value+"'>";
		}
		else {
			return "";
			return "<img width=163 height=80 src='/xgo/xplugs/xluerzer/ajax/e_media/digitalImg/default.png'>";
		}
	},

	renderer_interviewImg: function(value)
	{
		if ((value !== 'undefined') && (value != 0)) {
			return "<img width=146 height=172 src='/xgo/xplugs/xluerzer/ajax/e_media/interviewImg/"+value+"'>";
		}
		else {
			return "";
			return "<img width=146 height=172 src='/xgo/xplugs/xluerzer/ajax/e_media/interviewImg/default.png'>";
		}
	},

	renderer_magazinImg: function(value)
	{
		if ((value !== 'undefined') && (value != 0)) {
			return "<img width=157 height=218 src='/xgo/xplugs/xluerzer/ajax/e_media/magazinImg/"+value+"'>";
		}
		else {
			return "";
			return "<img width=157 height=218 src='/xgo/xplugs/xluerzer/ajax/e_media/magazinImg/default.png'>";
		}
	}
	
	

}