var xluerzer_contacts = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_contacts";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xluerzer_contacts_(config);
			}
			return instance;
		}
	}
})();

var xluerzer_contacts_ = function(config) {
	this.config = config || {};
};

xluerzer_contacts_.prototype = {
	
	
	openContact: function(id) {
		
		var me = this;
		
		var contactDetailsLeft = Ext.create('Ext.form.Panel', {
				xtype: 'form',
				columnWidth: 0.33,
				cls: 'innen-content',
				border: false,
				fieldDefaults: {
					labelAlign: 'top',
					msgTarget: 'side',
					padding: 0,
					anchor: '96%'
				},
				defaultType: 'textfield',
				items: [

					{
						xtype: 'box',
						cls: 'boxTitle',
						html: 'Personal'
					},


					this.simplyCombo({
						fieldLabel: 'Salutation',
						name: 'ec_salutation',
						value: '',
						data: [{k:'',v:''},{k:'Mrs.',v:'Mrs.'},{k:'Ms.',v:'Ms.'}, {k:'Mr.',v:'Mr.'}]
					}),

					{
						fieldLabel: 'First Name',
						name: 'ec_firstname',
					},

					{
						fieldLabel: 'Middle Name',
						name: 'ec_middlename',
					},
					
					{
						fieldLabel: 'Last Name',
						name: 'ec_lastname',
					},

					{
						fieldLabel: 'Adress',
						name: 'ec_address',
					},

					{
						fieldLabel: 'ZIP',
						name: 'ec_zip',
					},

					{
						fieldLabel: 'City',
						name: 'ec_city',
					},


					{
						fieldLabel: 'Country',
						name: 'ec_country_id'
					},

					{
						fieldLabel: 'Phone',
						name: 'ec_phone'
					},
					
					{
						fieldLabel: 'Phone 2',
						name: 'ec_phone2'
					},
					
					{
						fieldLabel: 'Fax',
						name: 'ec_fax'
					},
					
					{
						fieldLabel: 'Email',
						name: 'ec_email'
					},
					
					{
						fieldLabel: 'Email 2',
						name: 'ec_email2'
					},

					{
						fieldLabel: 'Website',
						name: 'ec_url',
						minChars: 3,
					},

				]
		});
		
		
		
		var contactDetailsMiddle = Ext.create('Ext.form.Panel', {
				xtype: 'form',
				columnWidth: .33,
				cls: 'innen-content',
				border: false,
				fieldDefaults: {
					labelAlign: 'top',
					msgTarget: 'side',
					padding: 0,
					anchor: '96%'
				},
				defaultType: 'textfield',
				items: [
					{
						xtype: 'box',
						cls: 'boxTitle',
						html: 'Corporate'
					},

					this.simplyCombo({
						fieldLabel: 'Branch',
						name: 'ec_branch',
						value: '',
						data: [{k:'photographer',v:'Photographer'}, {k:'illustrator',v:'Illustrator'}, {k:'copywriter',v:'Copywriter'}]
					}),

					this.simplyCombo({
						fieldLabel: 'Company',
						name: 'ec_company',
						value: '',
						data: [{k:'',v:''}]
					}),

					this.simplyCombo({
						fieldLabel: 'Position',
						name: 'ec_position',
						value: '',
						data: [{k:'',v:''}]
					}),

					this.simplyCombo({
						fieldLabel: 'Represented by',
						name: 'ec_representedBy',
						value: '',
						data: [{k:'',v:''}]
					})

				]
		});
		
		
		
		var contactDetailsRight = Ext.create('Ext.form.Panel', {
				xtype: 'form',
				columnWidth: .33,
				cls: 'innen-content',
				border: false,
				fieldDefaults: {
					labelAlign: 'top',
					msgTarget: 'side',
					padding: 0,
					anchor: '96%'
				},
				defaultType: 'textfield',
				items: [
					{
						xtype: 'box',
						cls: 'boxTitle',
						html: 'Intern'
					},

					{
						fieldLabel: 'Password',
						name: 'ec_password'
					},
					
					this.simplyCombo({
						fieldLabel: 'Assigned to',
						name: 'ec_assigned_to',
						data: [{k:'0',v:'none'}]
					}),

					{
						xtype: 'datefield',
						emptyText: 'Pick date ...',
						fieldLabel: 'Remind me',
						name: 'remindme'
					},

					{
						xtype: 'boxselect',
						fieldLabel: "Category",
						value: "WA",
						displayField: "_display",
						valueField: "_value",
						emptyText: "Pick categories",
						queryMode: "remote",
					},

					{
						xtype: 'textareafield',
						fieldLabel: 'Notes',
						name: 'ec_notes',
					},

					this.simplyCombo({
						fieldLabel: 'Retired / closed',
						name: 'ec_retired',
						data: [{k:'0',v:'No'}, {k:'1',v:'Yes'}]
					}),

					this.simplyCombo({
						fieldLabel: 'Exclude Ranking',
						name: 'ec_excludeRanking',
						data: [{k:'0',v:'No'}, {k:'1',v:'Yes'}]
					}),

					{
						fieldLabel: 'Data modified',
						name: 'ec_modified',
						disabled: true
					},

					{
						fieldLabel: 'Data created',
						name: 'ec_created',
						disabled: true
					},

				]
		});
		
		
		var ranking = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			search: true,
			pager: true,
			xstore: {
				load: 	this.getAjaxPath('e_contact_details/load/'+id),
				pid: 	'ec_id',
				fields: [
				{name:'ranking',		text:'Ranking', 		type: 'string'},
				{name:'currentYear', 	text:'Current Year', 	type: 'int'},
				{name:'lastYear', 		text:'Last Year', 		type: 'int'},
				{name:'last3Years', 	text:'Last 3 Years', 	type: 'int'},
				{name:'last5Years', 	text:'Last 5 Years', 	type: 'int'},
				{name:'last10Years', 	text:'Last 10 Years', 	type: 'int'},
				{name:'allYears', 		text:'All Years', 		type: 'int'},
				],
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					
				},
				afterrender: function() {
					ranking.store.load();
				}
			}
		});
		
		
		var representant = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			search: true,
			pager: true,
			xstore: {
				load: 	this.getAjaxPath('e_contact_representants/load/'+id),
				remove: this.getAjaxPath('e_contact_representants/remove'),
				update: this.getAjaxPath('e_contact_representants_details/update'),
				insert: this.getAjaxPath('e_contact_representants/insert'),
				move: 	this.getAjaxPath('e_contact_representants/move'),
				
				
				pid: 	'ecr_id',
				fields: [
				{name:'ecr_id', 		text:'ID', 					type: 'int'},
				{name:'ec_id',			text:'Representant for ID', type: 'string'},
				{name:'ec_company', 	text:'Company', 			type: 'string'},
				{name:'ec_firstname', 	text:'First Name', 			type: 'string'},
				{name:'ec_lastname', 	text:'Last Name', 			type: 'string'},
				{name:'ecr_created', 	text:'Created', 			type: 'string'},
				{name:'ecr_modified', 	text:'Modified',	 		type: 'string'}
				],
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {}
			}
		});
		
		representant.on('afterrender',function(){
			representant.getStore().load();
		},this);
		
		
		
		var duplicates = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			search: true,
			pager: true,
			xstore: {
				load: 	this.getAjaxPath('e_contact_duplicates/load/'+id),
				pid: 	'ecd_id',
				fields: [
				{name:'ecd_id', 			text:'ID', 				type: 'int'},
				{name:'ec_id', 				text:'Duplicate ID', 	type: 'string'},
				{name:'ec_company', 		text:'Company', 		type: 'string'},
				{name:'ec_firstname', 		text:'First Name', 		type: 'string'},
				{name:'ec_lastname', 		text:'Last Name', 		type: 'string'},
				{name:'ecd_created', 		text:'Created', 		type: 'string'}
				],
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {}
			}
		});
		
		duplicates.on('afterrender',function(){
			duplicates.getStore().load();
		},this);
		
		
		
		var associates = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			search: true,
			pager: true,
			xstore: {
				load: 	this.getAjaxPath('e_contact_associates/load/'+id),
				pid: 	'eca_id',
				fields: [
				{name:'eca_id', 			text:'ID', 				type: 'int'},
				{name:'ec_id', 				text:'Duplicate ID', 	type: 'string'},
				{name:'ec_company', 		text:'Company', 		type: 'string'},
				{name:'ec_firstname', 		text:'First Name', 		type: 'string'},
				{name:'ec_lastname', 		text:'Last Name', 		type: 'string'},
				{name:'eca_createdon', 		text:'Created', 		type: 'string'}
				],
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {}
			}
		});
		
		associates.on('afterrender',function(){
			associates.getStore().load();
		},this);
		
		
		var paidads = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			search: true,
			pager: true,
			xstore: {
				load: 	this.getAjaxPath('e_contact_paidads/load/'+id),
				pid: 	'id_x',
				fields: [
				{name:'ecb_id', 		text:'ID', 					type: 'int'},
				{name:'ecb_firstname',	text:'Firstname',			type: 'string'},
				{name:'ecb_lastname',	text:'Lastname', 			type: 'string'},
				{name:'ecb_company',	text:'Company', 			type: 'string'},
				{name:'ecb_city',		text:'City', 				type: 'string'},
				{name:'ecb_country_id',	text:'Country', 			type: 'int'},
				{name:'ecb_email',		text:'Email', 				type: 'string'},
				{name:'ecb_phone',		text:'Phone Number', 		type: 'string'},
				],
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {}
			}
		});
		
		paidads.on('afterrender',function(){
			paidads.getStore().load();
		},this);
		
		
		var log = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			search: true,
			pager: true,
			xstore: {
				load: 	this.getAjaxPath('e_contact_log/load/'+id),
				pid: 	'id_x',
				fields: [
				{name:'ecb_id', 		text:'ID', 					type: 'int'},
				{name:'ecb_firstname',	text:'Firstname',			type: 'string'},
				{name:'ecb_lastname',	text:'Lastname', 			type: 'string'},
				{name:'ecb_company',	text:'Company', 			type: 'string'},
				{name:'ecb_city',		text:'City', 				type: 'string'},
				{name:'ecb_country_id',	text:'Country', 			type: 'int'},
				{name:'ecb_email',		text:'Email', 				type: 'string'},
				{name:'ecb_phone',		text:'Phone Number', 		type: 'string'},
				],
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {}
			}
		});
		
		log.on('afterrender',function(){
			log.getStore().load();
		},this);
		
		
		var backups = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			search: true,
			pager: true,
			xstore: {
				load: 	this.getAjaxPath('e_contact_backups/load/'+id),
				pid: 	'id_x',
				fields: [
				{name:'ecb_id', 		text:'ID', 					type: 'int'},
				{name:'ecb_firstname',	text:'Firstname',			type: 'string'},
				{name:'ecb_lastname',	text:'Lastname', 			type: 'string'},
				{name:'ecb_company',	text:'Company', 			type: 'string'},
				{name:'ecb_city',		text:'City', 				type: 'string'},
				{name:'ecb_country_id',	text:'Country', 			type: 'int'},
				{name:'ecb_email',		text:'Email', 				type: 'string'},
				{name:'ecb_phone',		text:'Phone Number', 		type: 'string'},
				],
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {}
			}
		});
		
		backups.on('afterrender',function(){
			backups.getStore().load();
		},this);
		
		
		
		var gui = Ext.create('Ext.tab.Panel', {

			border: false,
			autoScroll: true,
			forceFit: true,
			title: 'Contact ID: '+id,
			layout: 'column',
			tbar: [

				{
					text: 'Save',
					iconCls: 'xf_save'
				}
			],

			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side'
			},

			items:[

			{
				title: 'Details',
				xtype: 'panel',
				border: false,
				anchor: '100%',
				autoScroll: true,
				layout:'column',
				items: [ contactDetailsLeft, contactDetailsMiddle, contactDetailsRight ]

			},

			{
				title: 'Ranking',
				items: ranking
			},

			{
				title: 'Representant',
				border: false,
				anchor: '100%',
				items: representant
			},
			
			{
				title: 'Duplicates',
				items: duplicates
			},

			{
				title: 'Associates',
				items: associates
			},

			{
				title: 'Log',
				items: log
			},

			{
				title: 'Backups',
				items: backups
			},

			]

		});
		
		
		loadData = function()
			{
				console.info("id", id)
				gui.mask('Loading Data ...');
				xframe.ajax({
					scope: me,
					url: me.getAjaxPath('e_contact_details/load/'+id),
					params : {
					},
					stateless: function(success, json)
					{
						gui.unmask();
						if (!success) return;
	
						contactDetailsLeft.getForm().setValues(json);
						contactDetailsMiddle.getForm().setValues(json);
						contactDetailsRight.getForm().setValues(json);
					}
				});
			},
			
			saveData = function(values)
			{
				gui.mask('Saving Data ...');
				xframe.ajax({
					scope: me,
					type: 'post',
					jsonData: values,
					url: me.getAjaxPath('e_contact_details/save/'+id),
					params : {
					},
					stateless: function(success, json)
					{
						gui.unmask();
						if (!success);
	
						contactDetailsLeft.getForm().setValues(json);
						contactDetailsMidlde.getForm().setValues(json);
						contactDetailsRight.getForm().setValues(json);
					}
				});
			},
			
			gui.on('afterrender',function(){
				loadData();
			},this,{buffer:1});
		

		this.showContent(gui);
	},
		



	newCompany: function(id) {

		var gui = Ext.create('Ext.tab.Panel', {

			border: false,
			autoScroll: true,
			title: 'Contact ID: '+id,
			bodyStyle:'padding: 0',
			tbar: [

			{
				text: 'Save',
				iconCls: 'xf_save'
			},

			{
				text: 'Close',
				iconCls: 'xf_abort'
			},
			],

			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				padding: 0,
				margin: 0
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
							anchor: '96%',
							maxWidth: 600,
						},
						defaultType: 'textfield',
						items: [
						
							{
								fieldLabel: 'Company name',
								name: 'name',
								minChars: 3,
							},
	
							{
								fieldLabel: 'Displayed',
								name: 'displayed',
								minChars: 3,
							},
	
							{
								fieldLabel: 'Branch',
								name: 'branch',
								minChars: 3,
							},
	
							this.simplyCombo({
								fieldLabel: 'Contact person',
								name: 'contactPerson',
								value: '',
								data: [{k:'',v:''}]
							}),
	
							{
								fieldLabel: 'Country',
								name: 'country',
								minChars: 3,
							},
	
							{
								fieldLabel: 'City',
								name: 'city',
								minChars: 3,
							},
	
							{
								fieldLabel: 'Adress',
								name: 'adress',
								minChars: 3,
							},
	
							this.textFieldPlus({
								fieldLabel: 'Phone',
								name: 'phone',
								iconCls:'xf_grid_add',
								buttonText: '',
								// buttonWidth: 150,
								dialogType: 'issue',
							}),
	
	
							this.textFieldPlus({
								fieldLabel: 'Fax',
								name: 'fax',
								iconCls:'xf_grid_add',
								buttonText: '',
								// buttonWidth: 150,
								dialogType: 'issue',
							}),
	
							this.textFieldPlus({
								fieldLabel: 'Email',
								name: 'email',
								iconCls:'xf_grid_add',
								buttonText: '',
								// buttonWidth: 150,
								dialogType: 'issue',
							}),
	
							{
								fieldLabel: 'Website',
								name: 'website',
								minChars: 3,
							},
	
							{
								xtype: 'boxselect',
								fieldLabel: "Category",
								value: "WA",
								displayField: "_display",
								valueField: "_value",
								emptyText: "Pick categories",
							},
	
							{
								xtype: 'textareafield',
								fieldLabel: 'Notes',
								name: 'notes',
							},
	
							{
								xtype: 'datefield',
								emptyText: 'Pick date ...',
								fieldLabel: 'Remind me',
								name: 'remindme'
							},
	
							this.simplyCombo({
								fieldLabel: 'Closed',
								name: 'closed',
								value: 'No',
								data: [{k:'n',v:'No'}, {k:'y',v:'Yes'}]
							}),
	
							this.simplyCombo({
								fieldLabel: 'Exclude Ranking',
								name: 'exclude',
								value: 'No',
								data: [{k:'n',v:'No'}, {k:'y',v:'Yes'}]
							}),
	
							{
								fieldLabel: 'Data modified',
								name: 'modified',
								disabled: true
							},
	
							{
								fieldLabel: 'Data created',
								name: 'created',
								disabled: true
							}
						]
					}
					]
				}

				]
			},

			{
				title: 'Attached Persons',
				items: [

				xframe_pattern.getInstance().genGrid({
					region:'center',
					forceFit:true,
					border:false,
					split: true,
					collapseMode: 'mini',
					button_del:true,
					button_add:true,
					search: true,
					pager: true,
					xstore: {
						load: 	this.getAjaxPath('e_submissionOfTheDayX/load?dayx='),
						pid: 	'SubmissionID',
						fields: [
						{name:'id',				text:'ID', 				type: 'int'},
						{name:'status',			text:'Status', 			type: 'int'},
						{name:'firstName',	 	text:'First Name', 		type: 'string'},
						{name:'lastName',	 	text:'Last Name', 		type: 'string'},
						],
					},
					listeners: {
						scope: this,
						buffer: 1,
						itemdblclick: function(g,record) {
							// this.showSubmission(record.data.SubmissionID);
						}
					}
				}),

				]
			},


			{
				title: 'Representatives',
				items: [

				xframe_pattern.getInstance().genGrid({
					region:'center',
					forceFit:true,
					border:false,
					split: true,
					collapseMode: 'mini',
					button_del:true,
					button_add:true,
					search: true,
					pager: true,
					xstore: {
						load: 	this.getAjaxPath('e_submissionOfTheDayX/load?dayx='),
						pid: 	'SubmissionID',
						fields: [
						{name:'id',				text:'ID', 				type: 'int'},
						{name:'status',			text:'Status', 			type: 'int'},
						{name:'firstName',	 	text:'First Name', 		type: 'string'},
						{name:'lastName',	 	text:'Last Name', 		type: 'string'},
						],
					},
					listeners: {
						scope: this,
						buffer: 1,
						itemdblclick: function(g,record) {
							// this.showSubmission(record.data.SubmissionID);
						}
					}
				}),
				
				]
			},


			{
				title: 'Tasks',
				items: [

					xframe_pattern.getInstance().genGrid({
						region:'center',
						forceFit:true,
						border:false,
						split: true,
						collapseMode: 'mini',
	
						button_del:true,
						button_add:true,
						search: true,
						pager: true,
						xstore: {
							load: 	this.getAjaxPath('e_submissionOfTheDayX/load?dayx='),
							pid: 	'SubmissionID',
							fields: [
							{name:'created', 		text:'Ceated', 			type: 'timestamp'},
							{name:'dueDate', 		text:'Due Date', 		type: 'timestamp'},
							{name:'assignedTo', 	text:'Assigned to', 	type: 'string'},
							{name:'assignedFrom', 	text:'Assigned from', 	type: 'string'},
							{name:'summary', 		text:'Summary', 		type: 'string'},
							{name:'priority', 		text:'Priority', 		type: 'int'},
							{name:'status', 		text:'Status', 			type: 'string'}
	
							],
						},
						listeners: {
							scope: this,
							buffer: 1,
							itemdblclick: function(g,record) {
								// this.showSubmission(record.data.SubmissionID);
							}
						}
					}),
				]
			},

			{
				title: 'Duplicates',
				items: [

				xframe_pattern.getInstance().genGrid({
					region:'center',
					forceFit:true,
					border:false,
					split: true,
					collapseMode: 'mini',
					button_del:true,
					button_add:true,
					search: true,
					pager: true,
					xstore: {
						load: 	this.getAjaxPath('e_submissionOfTheDayX/load?dayx='),
						pid: 	'SubmissionID',
						fields: [
							{name:'id', 		text:'ID', 				type: 'int'},
							{name:'company', 	text:'Company', 		type: 'string'},
							{name:'name', 		text:'Name', 			type: 'string'},
							{name:'createdby', 	text:'Created by', 		type: 'string'}
						],
					},
					listeners: {
						scope: this,
						buffer: 1,
						itemdblclick: function(g,record) {
							// this.showSubmission(record.data.SubmissionID);
						}
					}
				}),

				]
			},

			{
				title: 'Associates',
				items: [

				xframe_pattern.getInstance().genGrid({
					region:'center',
					forceFit:true,
					border:false,
					split: true,
					collapseMode: 'mini',
					button_del:true,
					button_add:true,
					search: true,
					pager: true,
					xstore: {
						load: 	this.getAjaxPath('e_submissionOfTheDayX/load?dayx='),
						pid: 	'SubmissionID',
						fields: [
						{name:'id', 		text:'ID', 				type: 'int'},
						{name:'company', 	text:'Company', 		type: 'string'},
						{name:'name', 		text:'Name', 			type: 'string'},
						{name:'createdby', 	text:'Created by', 		type: 'string'},
						],
					},
					listeners: {
						scope: this,
						buffer: 1,
						itemdblclick: function(g,record) {
							// this.showSubmission(record.data.SubmissionID);
						}
					}
				}),

				]
			},

			/* {
				title: 'Paid Ads',
				items: [

				xframe_pattern.getInstance().genGrid({
					region:'center',
					forceFit:true,
					border:false,
					split: true,
					collapseMode: 'mini',
					button_del:true,
					button_add:true,
					search: true,
					pager: true,
					xstore: {
						load: 	this.getAjaxPath('e_submissionOfTheDayX/load?dayx='),
						pid: 	'SubmissionID',
						fields: [
						{name:'status', 		text:'Status', 				type: 'int'},
						{name:'magazine', 		text:'Magazine', 			type: 'string'},
						{name:'paidAdd', 		text:'Paid Ad', 			type: 'string'},
						{name:'net',	 		text:'Net', 				type: 'float'},
						{name:'base',	 		text:'Base', 				type: 'float'},
						{name:'units',	 		text:'Units', 				type: 'int'},
						{name:'salesRep',	 	text:'Sales rep', 			type: 'string'},
						{name:'notes',	 		text:'Notes', 				type: 'text'},
						],
					},
					listeners: {
						scope: this,
						buffer: 1,
						itemdblclick: function(g,record) {
							// this.showSubmission(record.data.SubmissionID);
						}
					}
				}),

				]
			}, */

			{
				title: 'Log',
				items: [

				xframe_pattern.getInstance().genGrid({
					region:'center',
					forceFit:true,
					border:false,
					split: true,
					collapseMode: 'mini',
					button_del:true,
					button_add:true,
					search: true,
					pager: true,
					xstore: {
						load: 	this.getAjaxPath('e_submissionOfTheDayX/load?dayx='),
						pid: 	'SubmissionID',
						fields: [
						{name:'date', 		text:'Date', 			type: 'timestamp'},
						{name:'spoketo', 	text:'Spoke to', 		type: 'string'},
						{name:'log', 		text:'Message', 		type: 'string'},
						],
					},
					listeners: {
						scope: this,
						buffer: 1,
						itemdblclick: function(g,record) {
							// this.showSubmission(record.data.SubmissionID);
						}
					}
				}),

				]
			},

			{
				title: 'Backups',
				items: [

				xframe_pattern.getInstance().genGrid({
					region:'center',
					forceFit:true,
					border:false,
					split: true,
					collapseMode: 'mini',
					button_del:true,
					button_add:true,
					search: true,
					pager: true,
					xstore: {
						load: 	this.getAjaxPath('e_submissionOfTheDayX/load?dayx='),
						pid: 	'SubmissionID',
						fields: [
						{name:'updatedDate', 	text:'Date updated', 	type: 'timestamp'},
						{name:'updatedBy', 		text:'Updated by', 		type: 'string'},
						{name:'log', 			text:'Message', 		type: 'string'},
						],
					},
					listeners: {
						scope: this,
						buffer: 1,
						itemdblclick: function(g,record) {
							// this.showSubmission(record.data.SubmissionID);
						}
					}
				}),

				]
			},

			]

		});

		this.showContent(gui);
	},

	
	searchContacts: function() {

		if (!this.initStorePersonCategories)
		{
			this.initStorePersonCategories = true;

			Ext.define('PersonCategories', {
				extend: 'Ext.data.Model',
				proxy: {
					type: 'ajax',
					url : this.getAjaxPath('crm_personCategories/load'),
					reader: {
						type: 'json',
						root: 'root',
						totalProperty: 'totalCount'
					}
				},

				fields: [
				{name: '_value', 	type: 'string'},
				{name: '_display',	type: 'string'}
				]

			});

			Ext.create('Ext.data.Store', {
				pageSize: 1000,
				model: 'PersonCategories',
				storeId: 'PersonCategories'
			});
		}


		var items_left	= [

			{
				fieldLabel: 'Overall',
				name: 'first',
				emptyText: 'Search in all Fields...'
			},
	
			this.simplyCombo({
				fieldLabel: 'Type?',
				name: 'type',
				value: '',
				data: [{k:'',v:'Ignore'},{k:'c',v:'Company'},{k:'p',v:'Person'}]
			}),
	
	
			this.searchComboCrm({
				fieldLabel: 'First name',
				name: 'first',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'firstname'
			}),
	
			this.searchComboCrm({
				fieldLabel: 'Last name',
				name: 'last',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'lastname'
			}),
	
			this.searchComboCrm({
				fieldLabel: 'Company',
				name: 'company',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'companyname'
			}),
	
			this.searchComboCrm({
				fieldLabel: 'Position',
				name: 'company',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'position'
			}),
	
			this.searchComboCrm({
				fieldLabel: 'Credited as',
				name: 'company',
				minChars: 3,

			}),
	
			{
				fieldLabel: 'Credited in',
				
			},
	
			this.searchComboCrm({
				fieldLabel: 'Country',
				name: 'company',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'country'
			}),
	
			this.searchComboCrm({
				fieldLabel: 'City',
				name: 'company',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'city'
			}),
	
			this.searchComboCrm({
				fieldLabel: 'E-Mail',
				name: 'company',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'email'
			})

		];

		var items_right = [

			this.searchComboCrm({
				fieldLabel: 'Comments',
				name: 'company',
				minChars: 3,
			}),
	
			this.searchComboCrm({
				fieldLabel: 'Contact ID',
				name: 'id',
				minChars: 3,
				searchScope: 'id'
			}),
	
			{
				fieldLabel: 'Assigned to',
				name: 'assigned_to'
			},
	
			{
				xtype: 'fieldcontainer',
				fieldLabel: 'Created',
				labelStyle: 'font-weight:bold;padding:0;',
				layout: 'hbox',
				defaultType: 'textfield',
				items: [{
					xtype: 'datefield',
					flex: 1,
					name: 'firstName',
					emptyText: 'From'
				}, {
					xtype: 'datefield',
					flex: 1,
					name: 'lastName',
					emptyText: 'To',
					margins: '0 0 0 5'
				}]
			},
	
			{
				xtype: 'fieldcontainer',
				fieldLabel: 'Modified',
				labelStyle: 'font-weight:bold;padding:0;',
				layout: 'hbox',
				defaultType: 'textfield',
	
				items: [{
					xtype: 'datefield',
					flex: 1,
					name: 'firstName',
					emptyText: 'From'
				}, {
					xtype: 'datefield',
					flex: 1,
					name: 'lastName',
					emptyText: 'To',
					margins: '0 0 0 5'
				}]
			},
	
			{
				xtype: 'boxselect',
				fieldLabel: "Category",
				value: "WA",
				displayField: "_display",
				valueField: "_value",
				emptyText: "Pick categories",
				store: "PersonCategories",
				queryMode: "remote"
	
			},{
				xtype: 'splitter',
				height: 20
			},{
	
				xtype: 'button',
				text: 'Start search',
				height: 30,
				handler: function() {
					console.info("search contacts");
					
				}
			}
		];

		var searchPanel = Ext.create('Ext.form.Panel', {
			region: 'north',
			border: false,
			collapsible: true,

			bodyStyle:'padding:5px 5px 0',
			width: 350,
			fieldDefaults: {
				msgTarget: 'side',
				labelWidth: 150
			},
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},
			items: [{
				xtype: 'container',
				anchor: '100%',
				layout:'column',
				bodyStyle:'padding:5px 5px 0',
				items:[{
					xtype: 'container',
					columnWidth:.5,
					layout: 'anchor',
					defaults: {
						anchor: '96%'
					},
					defaultType: 'textfield',
					items: items_left
				},{
					xtype: 'container',
					columnWidth:.5,
					layout: 'anchor',
					defaults: {
						anchor: '96%'
					},
					defaultType: 'textfield',
					items: items_right
				}]
			}]
		});

		var fields =  [
		{name:'ec_id', 			text:'ID', 					type: 'int'},
		{name:'ec_firstname',	text:'Firstname',			type: 'string'},
		{name:'ec_lastname',	text:'Lastname', 			type: 'string'},
		{name:'ec_company',		text:'Company', 			type: 'string'},
		{name:'ec_city',		text:'City', 				type: 'string'},
		{name:'ec_country_id',	text:'Country', 			type: 'int'},
		{name:'ec_email',		text:'Email', 				type: 'string'},
		{name:'ec_phone',		text:'Phone Number', 		type: 'string'},
		{name:'ec_assignedTo',	text:'Assigned to', 		type: 'int'},
		];

		var contacts = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			title: 'Contacts',
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			search: true,
			pager: true,
			button_export: true,
			xstore: {
				load: 	this.getAjaxPath('crm_contacts/load'),
				pid: 	'ec_id',
				fields: fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					this.openContact(record.data.ec_id);
				}
			}
		});

		contacts.on('afterrender',function(){
			contacts.getStore().load();
		},this);


		var gui = Ext.create('Ext.panel.Panel', {
			title: 'Search Contacts',
			layout:'border',
			items: [searchPanel,contacts]
		});

		this.showContent(gui);
	},


	
}