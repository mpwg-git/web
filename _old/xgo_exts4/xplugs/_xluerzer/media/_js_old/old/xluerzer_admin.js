var xluerzer_admin = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_admin";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xluerzer_admin_(config);
			}
			return instance;
		}
	}
})();

var xluerzer_admin_ = function(config) {
	this.config = config || {};
};

xluerzer_admin_.prototype = {


	getMenu: function() {

		var menuItems =  [

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'Backend User',
				pid: 'abu_id',
				fields: [{name:'abu_username',text:'Name'},{name:'abu_email',text:'Email'},{name:'abu_lastLogin',text:'Last login'}],
				scopex: 'a_backenduser',
				initSort: '[{"property":"abu_lastLogin","direction":"DESC"}]'
			},

			cfg_record: {
				handler: this.default_recordInterface,
				scope: this,
				at_id: 1,
				pid: 	'abu_id',
				prefix: 'abu_',
				title: 'Backend User',
				scopex: 'a_backenduser'
			}

		}),

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'Frontend / Shop User',
				pid: 'feu_id',
				fields: [{name:'feu_email',text:'E-Mail'},{name:'feu_lastname',text:'Last Name'},{name:'feu_firstname',text:'First name'},{name:'feu_company',text:'Company'},{name:'feu_zipcode',text:'ZIP'},{name:'feu_city',text:'City'},{name:'feu_country_id',text:'Country'},{name:'feu_modified_ts',text:'Modified'},{name:'feu_profileViews',text:'Profile Views'}],
				scopex: 'a_frontendcontact',
				initSort: '[{"property":"feu_lastname,"direction":"ASC"}]'
			},

			cfg_record: {
				handler: this.default_recordInterface,
				scope: this,
				at_id: 1,
				pid: 	'afc_id',
				prefix: 'afc_',
				scopex: 'a_frontendcontact',
				title: 'Frontend User'
			}

		}),

		{
			xtype:'text',
			text: '',
			cls: 'spacer'
		},

		{
			text: 'Preview Settings',
			disabled: true,
		},

		{
			text:'Submission Settings',
			// handler: this.showSubmissionSettings,
			// scope: this,
			menu: [
			xluerzer_gui.getInstance().defaultAction({

				cfg_grid: {
					text:'Submission Categories',
					pid: 'cat_id',
					fields: [{name:'cat_name',text:'Name'},{name:'cat_filename',text:'Filename'}],
					scopex: 'a_submission_categories',
					initSort: '[{"property":"cat_name","direction":"ASC"}]'
				},

				cfg_record: {
					handler: this.default_recordInterface,
					scope: this,
					at_id: 1,
					pid: 	'cat_id',
					prefix: 'cat_',
					scopex: 'a_submission_categories',
					title: 'Submission Categories'
				}

			}),
			{
				text: 'Submission Credits',
				disabled: true,
			},
			]
		},

		{
			text:'Data Setttings',
			idx: -1,
			menu: [

			xluerzer_gui.getInstance().defaultAction({

				cfg_grid: {
					text:'Countries',
					pid: 'c_id',
					fields: [{name:'c_name',text:'Name'},{name:'c_iso',text:'ISO Code'},{name:'c_modified_ts',text:'Modified'}],
					scopex: 'a_countries',
					initSort: '[{"property":"c_name","direction":"DESC"}]'
				},

				cfg_record: {
					handler: this.default_recordInterface,
					scope: this,
					at_id: 1,
					pid: 	'c_id',
					prefix: 'c_',
					scopex: 'a_countries',
					title: 'Country'
				}

			}),


			xluerzer_gui.getInstance().defaultAction({

				cfg_grid: {
					text:'Salutations',
					pid: 'as_id',
					fields: [{name:'as_salutation',text:'Salutation'},{name:'as_old_salutation',text:'Old Salutation'},{name:'as_modified_ts',text:'Modified'}],
					scopex: 'a_salutations',
					initSort: '[{"property":"as_id","direction":"ASC"}]'
				},

				cfg_record: {
					handler: this.default_recordInterface,
					scope: this,
					at_id: 1,
					pid: 	'as_id',
					prefix: 'a_',
					scopex: 'a_salutations',
					title: 'Salutation'
				}

			}),

			{
				text: 'Positions',
				disabled: true,
			},

			xluerzer_gui.getInstance().defaultAction({

				cfg_grid: {
					text:'Branches',
					pid: 'ab_id',
					fields: [{name:'ab_name',text:'Branch'},{name:'ab_modified_ts',text:'Modified'}],
					scopex: 'a_branches',
					initSort: '[{"property":"ab_name","direction":"ASC"}]'
				},

				cfg_record: {
					handler: this.default_recordInterface,
					scope: this,
					at_id: 1,
					pid: 	'ab_id',
					prefix: 'ab_',
					scopex: 'a_branches',
					title: 'Branch'
				}

			})


			]
		},

		{
			xtype:'text',
			text: '',
			cls: 'spacer'
		},

		{
			text: 'Newsletter',
			menu: [
			{
				text:'NL Administration',
				disabled: true,
				idx: -1
			},

			{
				text:'NL Templates',
				disabled: true,
				idx: -1
			},
			]
		},


		{
			text: 'Voting',
			menu: [
			{
				text:'Voting Settings',
				disabled: true,
				idx: -1
			},

			{
				text:'voting Reports',
				disabled: true,
				idx: -1
			},
			]
		},

		{
			xtype:'text',
			text: '',
			cls: 'spacer'
		},


		{
			text: 'Overview Log',
			scope: this,
			handler: function() {

				var scopex = 'oe_log_overview';

				var fields = [
				{name: 'al_id',						text:'ID',		type:'int'},
				{name: 'al_ip',						text:'IP',		type:'string'},
				{name: 'al_host',					text:'HOST',	type:'string'},
				{name: 'al_action',					text:'ACTION',	type:'string'},
				{name: 'al_created_ts',				text:'TS',		type:'string'},
				{name: 'al_backend_user_id_human',	text:'USER',	type:'string'},
				{name: 'al_mods',					text:'CHANGE',	type:'string'},
				];

				var gui = xframe_pattern.getInstance().genGrid({
					region:'center',
					forceFit:true,
					border:false,
					title: 'Log',
					split: true,
					collapseMode: 'mini',
					button_del:false,
					button_add:false,
					search: true,
					editor: true,
					pager: true,
					xstore: {
						params: {},
						initSort: '[{"property":"al_id","direction":"DESC"}]',
						load: 	this.getAjaxPath(scopex+'/load'),
						update: this.getAjaxPath(scopex+'/update'),
						insert: this.getAjaxPath(scopex+'/insert'),
						move: 	this.getAjaxPath(scopex+'/move'),
						remove:	this.getAjaxPath(scopex+'/remove'),
						pid: 	'al_id',
						fields: fields
					},
					listeners: {
						scope: this,
						buffer: 1,
						itemdblclick: function(g,record) {
						},
					}
				});

				gui.on('afterrender',function() {
					gui.getStore().load();
				},this);
				xluerzer.getInstance().showContent(gui);
			}

		},


		{
			text:'URL Mapper',
			disabled: true,
		},

		{
			text:'IP Datenbank',
			disabled: true,
		}

		];

		return menuItems;
	},

	getAjaxPath : function(suffix)
	{
		return xluerzer.getInstance().getAjaxPath(suffix);
	},

	getDefaultContentByScope: function(prefix,scopex)
	{
		console.info(prefix,scopex);
		var items = [];

		switch (scopex)
		{


			case 'a_backenduser':
			items = [

			{

				fieldLabel: 'Username',
				name: 'abu_username'
			},

			{
				fieldLabel: 'Email',
				name: 'abu_email'
			},

			{
				fieldLabel: 'Password',
				name: 'abu_password'
			}

			];
			break;


			case 'a_frontendcontact':
			items = [

			{
				fieldLabel: 'First Name',
				name: 'afc_firstname'
			},

			{
				fieldLabel: 'Last Name',
				name: 'afc_lastname'
			},

			{
				fieldLabel: 'Company',
				name: 'afc_company'
			},

			{
				fieldLabel: 'Street',
				name: 'afc_street'
			},

			{
				fieldLabel: 'ZIP',
				name: 'afc_zipcode'
			},

			{
				fieldLabel: 'State',
				name: 'afc_state'
			},

			{
				fieldLabel: 'Country',
				name: 'afc_country_id'
			},

			{
				fieldLabel: 'Telephone',
				name: 'afc_tel'
			},

			{
				fieldLabel: 'Fax',
				name: 'afc_fax'
			},

			{
				fieldLabel: 'Email',
				name: 'afc_email'
			},

			{
				fieldLabel: 'Website',
				name: 'afc_url'
			}


			];
			break;


			case 'a_submission_categories':
			items = [

			{
				fieldLabel: 'Name',
				name: 'cat_name'
			},

			{
				fieldLabel: 'Filename',
				name: 'cat_filename'
			}

			];
			break;


			case 'a_countries':
			items = [

			{
				fieldLabel: 'Name',
				name: 'c_name'
			},

			{
				fieldLabel: 'ISO Code',
				name: 'c_iso'
			}

			];
			break;


			case 'a_salutations':
			items = [

			{
				fieldLabel: 'Salutation',
				name: 'as_salutation'
			},

			{
				fieldLabel: 'Old Salutation',
				name: 'as_old_salutation',
				disabled: true
			}


			];
			break;


			case 'a_branches':
			items = [

			{
				fieldLabel: 'Branch Name',
				name: 'ab_name'
			}

			];
			break;

			default: break;
		}

		console.info('items',items);

		return items;
	},



	default_recordInterface: function(record,cfg) {

		console.info('Info',record,cfg,record[cfg['pid']]);

		var scopex 	= cfg.scopex;
		var prefix 	= cfg.prefix;
		var id 		= record.data[cfg['pid']];
		var me 		= this;

		var tbar = [{
			text: 'Save',
			iconCls: 'xf_save',
			scope: this,
			handler: function() {
				saveData();
			}
		}];

		var forms 	= gui;


		var gui = Ext.create('Ext.form.Panel', {
			border: false,
			title: cfg.title+': '+id,
			tbar: tbar,
			cls: 'innen-content-single',
			defaultType: 'textfield',
			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				autoScroll: true,
				width: '100%'
			},
			items: this.getDefaultContentByScope(prefix,scopex)
		});

		loadData = function()
		{
			gui.mask('Loading Data ...');
			xframe.ajax({
				scope: me,
				url: xluerzer.getInstance().getAjaxPath('a_data_load/'+id),
				params : {
					id: id,
					scopex: cfg.scopex
				},
				stateless: function(success, json)
				{
					gui.unmask();
					if (!success) return;
					gui.getForm().setValues(json.record);

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
				url: xluerzer.getInstance().getAjaxPath('a_data_save/'+id),
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



































	/********************************************************************************************************************************************************************************************/

	editBeUser: function(id) {

		var gui = Ext.create('Ext.tab.Panel', {

			border: false,
			autoScroll: true,
			title: 'BE User ID: '+id,
			bodyStyle:'padding: 0',
			tbar: [

			{
				text: 'Save',
				iconCls: 'xf_save'
			},

			{
				text: 'Close',
				iconCls: 'xf_abort'
			}
			],

			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side'
			},

			items:[

			{
				title: 'Details',
				items: [

				{
					xtype: 'container',
					anchor: '100%',
					layout:'column',
					bodyStyle:'padding:10px',
					items: [

					{
						xtype: 'container',
						columnWidth:1,
						padding: 10,
						layout: 'anchor',
						defaults: {
							anchor: '96%'
						},
						defaultType: 'textfield',
						items: [


						{
							fieldLabel: 'Username',
							name: 'username',
							minChars: 3,
						},

						{
							fieldLabel: 'Email',
							name: 'email',
							minChars: 3,
						},

						{
							fieldLabel: 'First Name',
							name: 'first_name',
							minChars: 3,
						},

						{
							fieldLabel: 'Last Name',
							name: 'last_name',
							minChars: 3,
						},

						{
							fieldLabel: 'Password',
							name: 'password',
							inputType: 'password',
							minChars: 3,
						},

						{
							xtype: 'textareafield',
							fieldLabel: 'Notes',
							name: 'notes',
						},

						]
					}
					]

				}

				]

			},

			{
				title: 'Ranking'
			},

			{
				title: 'Log'
			}

			]

		});

		this.showContent(gui);
	},





	showBeUsers: function() {

		var fields =  [
		{name:'id', 				type: 'int'},
		{name:'username',	 		type: 'string'},
		{name:'email',			 	type: 'string'},
		{name:'password', 			type: 'password'},
		];

		var gui = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			title: 'Backend Users',
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			search: true,
			pager: true,
			columns: [

			{
				text: 'ID',
				maxWidth: 100,
				dataIndex: 'id'
			},

			{
				text: 'Username',
				dataIndex: 'username',
				editor:{allowBlank: false}
			},

			{
				text: 'Email',
				dataIndex: 'email',
				editor:{allowBlank: false}
			},

			{
				text: 'First Name',
				dataIndex: 'first_name',
				editor:{allowBlank: false}
			},

			{
				text: 'Last Name',
				dataIndex: 'last_name',
				editor:{allowBlank: false}
			},

			{
				text: 'Password',
				dataIndex: 'password',
				editor:{allowBlank: false}
			},

			{
				text: 'Notes',
				dataIndex: 'notes',
				editor:{allowBlank: false}
			}

			],
			tbar: [{
				xtype: 'pagingtoolbar',
				border: false,
				flex: 1,
				pageSize: 100,
				// store: store,
				displayInfo: true,
				plugins: Ext.create('Ext.ux.ProgressBarPager', {}),
				displayMsg: '{0} - {1} of {2}'
			}],
			xstore: {
				load: 	this.getAjaxPath('e_submissionOfTheDayX/load?dayx=2014-01-08'),
				pid: 	'SubmissionIsD',
				fields: fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					this.editBeUser();
				}
			}
		});

		gui.on('afterrender',function(){
			gui.getStore().load();
		},this);

		this.showContent(gui);
	},

	showBeUserSettings: function() {

		var gui = create.widget({
			xtype: 'panel',
			html: 'BE User Settings'
		});
		this.showContent(gui);
	},

	showFeUserSettings: function() {

		var gui = create.widget({
			xtype: 'panel',
			html: 'FE / Shop User'
		});
		this.showContent(gui);
	},

	showPreviewSettings: function() {

		var gui = create.widget({
			xtype: 'panel',
			html: 'Preview Settings'
		});
		this.showContent(gui);
	},

	showSubmissionCategories: function() {

		var gui = create.widget({
			xtype: 'panel',
			html: 'Submission Category Settings'
		});
		this.showContent(gui);
	},

	showSubmissionCredits: function() {

		var gui = create.widget({
			xtype: 'panel',
			html: 'Submission Credits Settings'
		});
		this.showContent(gui);
	},

	showDataCountries: function() {

		var gui = create.widget({
			xtype: 'panel',
			html: 'Data Countries Settings'
		});
		this.showContent(gui);
	},

	showDataCategories: function() {

		var gui = create.widget({
			xtype: 'panel',
			html: 'Data Categories Settings'
		});
		this.showContent(gui);
	},

	showDataSalutations: function() {

		var gui = create.widget({
			xtype: 'panel',
			html: 'Data Salutation Settings'
		});
		this.showContent(gui);
	},

	showDataPositions: function() {

		var gui = create.widget({
			xtype: 'panel',
			html: 'Data Position Settings'
		});
		this.showContent(gui);
	},

	showDataBranches: function() {

		var gui = create.widget({
			xtype: 'panel',
			html: 'Data Branches Settings'
		});
		this.showContent(gui);
	},

	showNlAdmin: function() {

		var gui = create.widget({
			xtype: 'panel',
			html: 'Newsletter Administration'
		});
		this.showContent(gui);
	},

	showNlTemplates: function() {

		var gui = create.widget({
			xtype: 'panel',
			html: 'Newsletter Templates'
		});
		this.showContent(gui);
	},

	showVotingSettings: function() {

		var gui = create.widget({
			xtype: 'panel',
			html: 'Voting Settings'
		});
		this.showContent(gui);
	},

	showVotingReports: function() {

		var gui = create.widget({
			xtype: 'panel',
			html: 'Voting Reports'
		});
		this.showContent(gui);
	},

	showReminder: function() {

		var gui = create.widget({
			xtype: 'panel',
			html: 'Reminder overview'
		});
		this.showContent(gui);
	},

	showLogAccess: function() {

		var gui = create.widget({
			xtype: 'panel',
			html: 'Access log'
		});
		this.showContent(gui);
	},

	showLogBe: function() {

		var gui = create.widget({
			xtype: 'panel',
			html: 'Backend log'
		});
		this.showContent(gui);
	},

	showLogFe: function() {

		var gui = create.widget({
			xtype: 'panel',
			html: 'Frontend log'
		});
		this.showContent(gui);
	},

	showUrlMapper: function() {

		var gui = create.widget({
			xtype: 'panel',
			html: 'Url Mapper'
		});
		this.showContent(gui);
	},

	showIpDb: function() {

		var gui = create.widget({
			xtype: 'panel',
			html: 'IP Database'
		});
		this.showContent(gui);
	}
}