var xluerzer_e = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_e";
		}

		this.getInstance = function(config) {

			return new xluerzer_e_(config);

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
				fields: [{name:'ei_state',text:'Status', width: 80},{name:'ei_title',text:'Interview Partner'},{name:'ei_modified_ts',text:'Modified on', width: 80},{name:'ei_created_ts',text:'Created on', width: 80},{name:'ei_preview_image',text:'Image',renderer: renderer_interviewImg},{name:'ei_img_gallery',text:'Gallery',  renderer: xluerzer_oe.getInstance().renderer_gallery}],
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
			case 'e_students_winner':
			items = [
			{
				xtype: 'numberfield',
				fieldLabel: 'Year',
				name: 'esw_year',
			},
			
			xluerzer_gui.getInstance().simplyCombo({
				emptyText: 'Pick state ...',
				fieldLabel: 'State',
				name: 'esw_state',
				readOnly: false,
				value: '',
				data: [{k:'',v:''},{k:'PUBLISHED',v:'Published'},{k:'READYFORPUBLISH',v:'Pending Review'}, {k:'EDITING',v:'Draft'}]
			})
			
			];
			break;

			case 'e_interviews':
			items = [
			xluerzer_gui.getInstance().setStateField({
				name: 'ei_state',
				readOnly: true
			}),
			{
				xtype: 'textfield',
				readOnly: true,
				fieldLabel: 'Edition',
				name: 'ei_edition',
			},
			{
				xtype: 'textfield',
				readOnly: true,
				fieldLabel: 'Year',
				name: 'ei_year',
			},
			/*
			{
			name: 'ei_preview_image',
			fieldLabel: 'Image',
			xtype: 'xr_field_file_2',
			img_w: 0,
			img_h: 0,
			dir: 297042,
			addPath: Ext.Date.format(new Date(),"Y")+'/'+Ext.Date.getWeekOfYear(new Date()),
			},
			*/

			{
				name: 'ei_pdfOnly',
				boxLabel: 'PDF only',
				xtype: 'checkbox',
				inputValue: 'Y',
				uncheckedValue: 'N'
			},
			{
				name: 'ei_pdf',
				fieldLabel: 'PDF-Download (OLD)',
				xtype: 'xr_field_file'
			}

			];
			break;

			case 'e_digitalInterviews':
			items = [
			xluerzer_gui.getInstance().setStateField({
				name: 'edi_state',
				readOnly: true
			}),
			{
				xtype: 'textfield',
				readOnly: true,
				fieldLabel: 'Edition',
				name: 'edi_edition',
			},
			{
				xtype: 'textfield',
				readOnly: true,
				fieldLabel: 'Year',
				name: 'edi_year',
			}

			];
			break;


			case 'e_digital_app':
			items = [

			xluerzer_gui.getInstance().simplyCombo({
				fieldLabel: 'State',
				name: 'eda_state',
				value: '',
				data: [{k:'0',v:'Editing'},{k:'1',v:'Submitted'},{k:'9',v:'Published'},{k:'10',v:'Unpublished'}],
				readOnly: true
			}),

			/*
			{
			xtype: 'textfield',
			//readOnly: true,
			fieldLabel: 'Year',
			name: 'eda_year',
			},
			{
			xtype: 'textfield',
			//readOnly: true,
			fieldLabel: 'Edition',
			name: 'eda_edition',
			},
			*/

			{
				fieldLabel: 'Magazine',
				name: 'eda_magazine_id',
				xtype: 'xluerzer_magazine'
			}
			,

			{
				name: 'eda_preview_image',
				fieldLabel: 'Preview Image',
				xtype: 'xr_field_file_2',
				img_w: 698,
				img_h: 416,
				dir: 1180398,
				addPath: Ext.Date.format(new Date(),"Y")+'/'+Ext.Date.getWeekOfYear(new Date()),
			},

			];
			break;

			case 'e_digital_web':
			items = [
			xluerzer_gui.getInstance().simplyCombo({
				fieldLabel: 'State',
				name: 'edw_state',
				value: '',
				data: [{k:'0',v:'Editing'},{k:'1',v:'Submitted'},{k:'9',v:'Published'},{k:'10',v:'Unpublished'}],
				readOnly: true
			}),


			/*
			{
			xtype: 'textfield',
			//readOnly: true,
			fieldLabel: 'Year',
			name: 'edw_year',
			},
			{
			xtype: 'textfield',
			//readOnly: true,
			fieldLabel: 'Edition',
			name: 'edw_edition',
			},
			*/

			{
				fieldLabel: 'Magazine',
				name: 'edw_magazine_id',
				xtype: 'xluerzer_magazine'
			}
			,
			{
				name: 'edw_preview_image',
				fieldLabel: 'Preview Image',
				xtype: 'xr_field_file_2',
				img_w: 698,
				img_h: 416,
				dir: 1180399,
				addPath: Ext.Date.format(new Date(),"Y")+'/'+Ext.Date.getWeekOfYear(new Date()),
			},
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

	getDefaultTbarByScope: function(prefix,scopex)
	{

		var items  = ['->',{
			text: 'Reload',
			iconCls: 'xf_reload',
			scope: this,
			handler: function() {
				this.loadData();
			}
		},'-',{
			text: 'Save',
			iconCls: 'xf_save',
			scope: this,
			handler: function() {
				this.saveData();
			}
		}];

		switch (scopex)
		{

			case 'e_interviews':
			case 'e_digitalInterviews':

			items = ['->',{
				text: 'Reload',
				iconCls: 'xf_reload',
				scope: this,
				handler: function() {
					this.loadData();
				}
			},'-',
			{
				text: 'Unpublish',
				iconCls: 'xf_unpublish',
				scope: this,
				handler: function() {
					this.unpublishData();
				}
			},{
				text: 'Publish',
				iconCls: 'xl_publish',
				scope: this,
				handler: function() {
					this.publishData();
				}
			},
			'-',{
				text: 'Save',
				iconCls: 'xf_save',
				scope: this,
				handler: function() {
					this.saveData();
				}
			}];

			break;

			case 'e_digital_app':
			case 'e_digital_web':

			items = ['->',{
				text: 'Reload',
				iconCls: 'xf_reload',
				scope: this,
				handler: function() {
					this.loadData();
				}
			},'-',{
				text: 'Unpublish',
				iconCls: 'xf_unpublish',
				scope: this,
				handler: function() {
					this.unpublishData();
				}
			},
			{
				text: 'Publish',
				iconCls: 'xl_publish',
				scope: this,
				handler: function() {
					this.publishData();
				}
			},'-',
			{
				text: 'Save',
				iconCls: 'xf_save',
				scope: this,
				handler: function() {
					this.saveData();
				}
			}];
			break;

			default: break;
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
				name: 'ei_title'
			},

			{
				name: 'ei_col_left',
				fieldLabel: 'Content',
				xtype: 'xr_field_html',
				width: '90%',
				margin: '10px'
			},
			
			{
				xtype: 'xluerzer_designerprofile',
				name: 'ei_link_profile',
				fieldLabel: 'Designer Profile ID',
				xsearch: true
			},
			
			{
				xtype: 'textfield',
				fieldLabel: 'Link Homepage',
				name: 'ei_link_extern'
			},

			];
			break;

			case 'e_students_winner':
			items = [

			{
				xtype: 'textfield',
				fieldLabel: 'Title',
				name: 'esw_title',
				width: 400
			},

			xluerzer_gui.getInstance().longDescriptionField({
				name: 'esw_col_left'
			}),

			];
			break;

			case 'e_digitalInterviews':
			items = [

			{
				xtype: 'textfield',
				fieldLabel: 'Interviewpartner',
				name: 'edi_title'
			},

			{
				name: 'edi_col_left',
				fieldLabel: 'Content',
				xtype: 'xr_field_html',
				width: '90%',
				margin: '10px'
			},
			
			{
				xtype: 'xluerzer_designerprofile',
				name: 'edi_link_profile',
				fieldLabel: 'Designer Profile ID',
				xsearch: true
			},
			
			{
				xtype: 'textfield',
				fieldLabel: 'Link Homepage',
				name: 'edi_link_extern'
			},

			];
			break;

			case 'e_digital_app':
			items = [
			{
				xtype: 'textfield',
				fieldLabel: 'Title',
				name: 'eda_title'
			},

			xluerzer_gui.getInstance().longDescriptionField({
				name: 'eda_description'
			}),
			{
				xtype: 'textfield',
				fieldLabel: 'Link 1',
				name: 'eda_link1'
			},
			{
				xtype: 'textfield',
				fieldLabel: 'Linktext 1',
				name: 'eda_linkText1'
			},
			{
				xtype: 'textfield',
				fieldLabel: 'Link 2',
				name: 'eda_link2'
			},
			{
				xtype: 'textfield',
				fieldLabel: 'Linktext 2',
				name: 'eda_linkText2'
			},
			];
			break;

			case 'e_digital_web':
			items = [
			{
				xtype: 'textfield',
				fieldLabel: 'Title',
				name: 'edw_title'
			},

			xluerzer_gui.getInstance().longDescriptionField({
				name: 'edw_description'
			}),
			{
				xtype: 'textfield',
				fieldLabel: 'Link 1',
				name: 'edw_link1'
			},
			{
				xtype: 'textfield',
				fieldLabel: 'Linktext 1',
				name: 'edw_linkText1'
			},
			{
				xtype: 'textfield',
				fieldLabel: 'Link 2',
				name: 'edw_link2'
			},
			{
				xtype: 'textfield',
				fieldLabel: 'Linktext 2',
				name: 'edw_linkText2'
			},

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


	default_recordInterfaceLastCommand: function(param_0)
	{
		var data = Ext.decode(param_0);
		this.default_recordInterface({data:data.record_data},data.cfg);
	},

	search4digital_interviewPopUp: function(cfgx)
	{
		var win = false;

		var gui = xluerzer_submissions.getInstance().open_search({
			scope: this,
			callback: function(edi) {
				win.close();
				cfg.callback.call(cfg.scope,edi);
			}
		});

		var cfg = {
			text:'Digital Interviews',
			pid: 'edi_id',
			fields: [{name:'edi_state',text:'Status', width: 80},{name:'edi_magazine_id',text:'Mag-ID', width: 80},{name:'edi_year',text:'Year', width: 50},{name:'edi_edition',text:'Edition', width: 50},{name:'edi_title',text:'Interview Partner'},{name:'edi_modified_ts',text:'Modified on', width: 80},{name:'edi_created_ts',text:'Created on', width: 80},{name:'edi_preview_image',text:'Image',renderer: xluerzer_e.getInstance().renderer_interviewImg}],
			scopex: 'e_digitalInterviews',
			initSort: '[{"property":"edi_id","direction":"DESC"}]'
		};

		gui = xluerzer_gui.getInstance().defaultSearcher(cfg,{
			handler: function(record) {
				win.close();
				cfgx.callback.call(cfgx.scope,record.data.edi_id);
			},
			scope: this
		});

		gui.title = "";

		win = Ext.create('Ext.window.Window', {
			modal: true,
			title: 'Search in Interviews',
			height: $$(window).height()*0.8,
			width: $$(window).width()*0.9,
			layout: 'fit',
			items: [gui]
		});

		win.show();
	},

	search4interviewPopUp: function(cfgx)
	{
		var win = false;

		var gui = xluerzer_submissions.getInstance().open_search({
			scope: this,
			callback: function(ei_id) {
				win.close();
				cfg.callback.call(cfg.scope,ei_id);
			}
		});

		var cfg =  {
			text:'Interviews',
			pid: 'ei_id',
			fields: [{name:'ei_state',text:'Status', width: 80},{name:'ei_magazine_id',text:'Mag-ID', width: 80},{name:'ei_year',text:'Year', width: 50},{name:'ei_edition',text:'Edition', width: 50},{name:'ei_title',text:'Interview Partner'},{name:'ei_modified_ts',text:'Modified on', width: 80},{name:'ei_created_ts',text:'Created on', width: 80},{name:'ei_preview_image',text:'Image',renderer: xluerzer_e.getInstance().renderer_interviewImg}],
			scopex: 'e_interviews',
			initSort: '[{"property":"ei_id","direction":"DESC"}]'
		};

		gui = xluerzer_gui.getInstance().defaultSearcher(cfg,{
			handler: function(record) {
				win.close();
				cfgx.callback.call(cfgx.scope,record.data.ei_id);
			},
			scope: this
		});
		gui.title = "";


		win = Ext.create('Ext.window.Window', {
			modal: true,
			title: 'Search in Digital Interviews',
			height: $$(window).height()*0.8,
			width: $$(window).width()*0.9,
			layout: 'fit',
			items: [gui]
		});

		win.show();
	},

	open_web: function(edw_id)
	{
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('e_web_getById/'+edw_id),
			params : {
				id: edw_id
			},
			stateless: function(success, json)
			{
				if (!success) return;
				xluerzer_e.getInstance().default_recordInterface({data:json.data},{pid:'edw_id',at_id: 13,scopex:'e_digital_web',prefix:'edw_',title:'Websites'});
			}
		});
	},


	open_app: function(eda_id)
	{
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('e_app_getById/'+eda_id),
			params : {
				id: eda_id
			},
			stateless: function(success, json)
			{
				if (!success) return;
				xluerzer_e.getInstance().default_recordInterface({data:json.data},{pid:'eda_id',at_id: 12,scopex:'e_digital_app',prefix:'eda_',title:'Apps'});
			}
		});
	},

	open_interview: function(ei_id)
	{
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('e_interview_getById/'+ei_id),
			params : {
				id: ei_id
			},
			stateless: function(success, json)
			{
				if (!success) return;
				xluerzer_e.getInstance().default_recordInterface({data:json.data},{pid:'ei_id',at_id: 9,scopex:'e_interviews',prefix:'ei_',title:'Interview'});
			}
		});
	},

	open_digital_interview: function(edi_id)
	{
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('e_dinterviewx_getById/'+edi_id),
			params : {
				id: edi_id
			},
			stateless: function(success, json)
			{
				if (!success) return;
				xluerzer_e.getInstance().default_recordInterface({data:json.data},{pid:'edi_id',at_id: 10,scopex:'e_digitalInterviews',prefix:'edi_',title:'Digital Interview'});
			}
		});
	},

	default_recordInterface: function(record,cfg) {

		var scopex 	= cfg.scopex;
		var prefix 	= cfg.prefix;
		var id 		= record.data[cfg['pid']];
		var me 		= this;


		var ftitle = cfg.title+': '+id;

		xluerzer.getInstance().saveLastCommand({
			text: ''+ftitle,
			title: ''+ftitle,
			classx: 'xluerzer_e',
			fn: 'default_recordInterfaceLastCommand',
			param_0: ''+Ext.encode({record_data:record.data,cfg:cfg})
		});

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
				margin: 10
			},
			items: this.getDefaultSettingsByScope(prefix,scopex)
		});

		/*
		var tbar = [{
		text: 'Reload',
		iconCls: 'xf_reload',
		scope: this,
		handler: function() {
		loadData();
		}
		},{
		text: 'Save',
		iconCls: 'xf_save',
		scope: this,
		handler: function() {
		saveData();
		}
		}]; */

		var tbar = this.getDefaultTbarByScope(prefix,scopex);

		var tpanel_content 	= Ext.create('Ext.form.Panel', {
			title: 'Content',
			border: false,
			cls: 'innen-content',
			xtype: 'form',
			autoScroll: true,
			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				margin: 10
			},

			items: this.getDefaultContentByScope(prefix,scopex)
		});

		var tpanel_sseo		= xluerzer_gui.getInstance().getDefaultTabPanel_sseo(cfg,false,false);
		var tpanel_log 		= xluerzer_gui.getInstance().getDefaultTabPanel_log(cfg,id);
		var tpanel_preview 	= xluerzer_gui.getInstance().getDefaultTabPanel_preview(cfg,id);
		var tpanel_gallery 	= xluerzer_gui.getInstance().getDefaultTabPanel_gallery(cfg,id);
		var forms 			= [panel_settings, tpanel_content, tpanel_sseo];


		// TODO
		if (scopex == 'e_digital_app' || scopex == 'e_digital_web') {

			var credits = Ext.widget({

				bodyPadding: 20,
				xtype: 'form',
				title: 'Credits',
				overflowY: 'auto',
				items: [
				{
					xtype: 'xluerzer_credit_client_company' // 7
				},
				{
					xtype: 'xluerzer_credit_art_director' // 5
				},
				{
					xtype: 'xluerzer_credit_ad_agency' // 2
				},
				{
					xtype: 'xluerzer_credit_creative_director' // 16
				},
				{
					xtype: 'xluerzer_credit_production_company' // 6
				},
				{
					xtype: 'xluerzer_credit_copywriter' // 3
				},
				{
					xtype: 'xluerzer_credit_director' // 8
				},
				{
					xtype: 'xluerzer_credit_digital_artist' // 14
				},
				{
					xtype: 'xluerzer_credit_illustrator' // 4
				},
				{
					xtype: 'xluerzer_credit_photographer' // 1
				}
				],


				tbar: [{
					text: 'Save Credits',
					iconCls: 'xf_save',
					scope: this,
					handler: function() {
						this.saveCredits();
					}
				}],


			});


			var panel_content = {

				xtype: 'tabpanel',
				region: 'center',
				border: false,
				cls: 'content',
				items: [tpanel_content,tpanel_gallery,credits,tpanel_preview,tpanel_sseo,tpanel_log]
			};

		}

		else {
			var panel_content = {
				xtype: 'tabpanel',

				region: 'center',
				border: false,
				cls: 'content',
				items: [tpanel_content,tpanel_gallery,tpanel_preview,tpanel_sseo,tpanel_log]
			};
		}

		var gui = Ext.create('Ext.panel.Panel', {
			border: false,
			title: ftitle,
			layout: 'border',
			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				autoScroll: true,
			},
			tbar: tbar,
			items: [panel_settings,panel_content]
		});


		this.loadData = function()
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


					if (scopex == 'e_digital_app' || scopex == 'e_digital_web') {

						console.info(credits.getForm());

						credits.getForm().setValues(json.credits);
					}

				}
			});
		};

		this.saveData = function()
		{
			var values = {}
			Ext.each(forms,function(formx){
				//console.info(formx,'START);
				Ext.apply(values, formx.getForm().getValues());
				//console.info(formx,'DONE');
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
					panel_settings.getForm().setValues(json.record);
					tpanel_content.getForm().setValues(json.record);
					tpanel_sseo.getForm().setValues(json.record);
					tpanel_preview.loadOtherId(id);
				}
			});
		};

		this.saveCredits =  function()
		{

			var fcredits = {};

			// credits
			Ext.each(credits.items.items,function(inp){
				if (typeof inp['getContacts'] != 'function') return;
				var cfg = inp.getContacts.call(inp);
				fcredits[cfg.contactType] = cfg.contactIds;
			},this);

			var params = {
				id: id,
				scopex: cfg.scopex,
				credits: Ext.encode(fcredits),
			}

			gui.mask('Saving Credits ...');
			xframe.ajax({
				scope: this,
				url: xluerzer.getInstance().getAjaxPath('e_credits_save/'+id),
				params : params,
				stateless: function(success, json)
				{
					gui.unmask();
					if (!success) return;
					tpanel_preview.loadOtherId(id);
				}
			});

		};


		this.publishData = function()
		{

			var values = {}
			Ext.each(forms,function(formx){
				Ext.apply(values, formx.getForm().getValues());
			});
			var record = Ext.encode(values);

			console.info("publish", record);

			gui.mask('Publishing Data ...');
			xframe.ajax({
				scope: me,
				type: 'post',
				url: xluerzer.getInstance().getAjaxPath('publish/e_publish/'),
				params : {
					id: id,
					scopex: cfg.scopex,
					record: record
				},
				stateless: function(success, json)
				{
					gui.unmask();
					if (!success) return;
					this.loadData();

				}
			});

		},

		this.unpublishData = function()
		{

			var values = {}
			Ext.each(forms,function(formx){
				Ext.apply(values, formx.getForm().getValues());
			});
			var record = Ext.encode(values);

			console.info("unpublish", record);

			gui.mask('Unpublishing Data ...');
			xframe.ajax({
				scope: me,
				type: 'post',
				url: xluerzer.getInstance().getAjaxPath('publish/e_unpublish/'),
				params : {
					id: id,
					scopex: cfg.scopex,
					record: record
				},
				stateless: function(success, json)
				{
					gui.unmask();
					if (!success) return;
					this.loadData();
				}
			});
		},


		gui.on('afterrender',function(){
			this.loadData();
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

	getFirstImageOfGallery: function(gal)
	{

		try {
			var g = Ext.decode(gal,true);
			if (g[0])
			{
				return g[0];
			}
		} catch (e) {}

		return 0;
	},

	renderer_titleImgFromGallery_interview: function(value,td,r)
	{
		var s_id = this.getFirstImageOfGallery(r.data.ei_img_gallery);
		return '<img width="146" height="172" src="/xgo/xplugs/xluerzer/ajax/e_media/interviewImg/'+s_id+'">';
	},

	renderer_titleImgFromGallery_dinterview: function(value,td,r)
	{
		var s_id = this.getFirstImageOfGallery(r.data.edi_img_gallery);
		return '<img width="146" height="172" src="/xgo/xplugs/xluerzer/ajax/e_media/interviewImg/'+s_id+'">';
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

		return "<img width=146 height=172 src='/xgo/xplugs/xluerzer/ajax/e_media/interviewImg/"+value+"'>";

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

		return "<img width=157 height=218 src='/xgo/xplugs/xluerzer/ajax/e_media/magazinImg/"+value+"'>";


	}






}