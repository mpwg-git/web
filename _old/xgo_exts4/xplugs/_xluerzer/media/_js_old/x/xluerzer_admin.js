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
	
	
	getMenuAdmin: function() {

		var menuItems =  [

			{
				text:'BE User Settings',
				handler: this.showBeUsers,
				scope: this,
			},
			
			{
				text:'FE / Shop User',
				disabled: true,
			},
			
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
					{
						text: 'Submission categories',
						disabled: true,
					},
					{
						text: 'Submission credits',
						disabled: true,
					},
				] 
			},
			
			{
				text:'Data Setttings',
				idx: -1,
				menu: [
					{
						text: 'Contries',
						disabled: true,
					},
					{
						text: 'Categories',
						disabled: true,
					},
					{
						text: 'Salutations',
						disabled: true,
					},
					{
						text: 'Positions',
						disabled: true,
					},
					{
						text: 'Branches',
						disabled: true,
					}
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
				text:'Reminder',
				disabled: true,
			},
			
			{
				xtype:'text',
				text: '',
				cls: 'spacer'
			},
			
			{
				text:'Logs',
				idx: -1,
				menu: [
					{
						text: 'Access log',
						disabled: true,
					},
					{
						text: 'BE log',
						disabled: true,
					},
					{
						text: 'FE log',
						disabled: true,
					}				
				]
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