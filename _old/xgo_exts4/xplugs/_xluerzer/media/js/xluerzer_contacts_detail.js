var xluerzer_contacts_detail = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_contacts_detail";
		}

		this.getInstance = function(config) {
			return new xluerzer_contacts_detail_(config);
			return instance;
		}
	}
})();

var xluerzer_contacts_detail_ = function(config) {
	this.config = config || {};
};

xluerzer_contacts_detail_.prototype = {

	logPopUp: function(idx)
	{
		console.info('idx',idx);

		var fp = Ext.widget({
			xtype: 'form',
			bodyPadding:20,
			layout: 'anchor',
			defaults: {
				anchor: '100%'
			},
			items: [

			{
				fieldLabel: 'Created by',
				xtype: 'xluerzer_backend_users',
				name: 'eca_backendUser_id',
			},

			{
				fieldLabel: 'Date',
				xtype: 'textfield',
				name: 'eca_date',
			},

			{
				fieldLabel: 'Time',
				xtype: 'textfield',
				name: 'eca_time',
			},

			{
				fieldLabel: 'Spoke to',
				xtype: 'textfield',
				name: 'eca_contact',
			},

			{
				fieldLabel: 'Message',
				xtype: 'textarea',
				name: 'eca_description',
				height: 200
			},


			{
				fieldLabel: 'Created',
				xtype: 'textfield',
				readOnly: true,
				name: 'eca_created_ts',
			},
			{
				fieldLabel: 'Modified',
				xtype: 'textfield',
				readOnly: true,
				name: 'eca_modified_ts',
			},


			]
		});

		var win = Ext.create('Ext.window.Window', {
			modal: true,
			title: 'Contact Log #'+idx,
			height: 500,
			width: 600,
			layout: 'fit',
			items: fp,
			bbar: [
			{
				iconCls: 'xf_save',
				text: 'Save',
				scope: this,
				handler: function()
				{

					win.mask('Save Data ...');
					xframe.ajax({
						scope: this,
						url: xluerzer.getInstance().getAjaxPath('contactsDetail/saveContactLog'),
						params : {
							eca_id: idx,
							record: Ext.encode(fp.getForm().getValues())
						},
						stateless: function(success, json)
						{
							fp.getForm().setValues(json.record);
							this.grid_contact_log.getStore().load();
							win.unmask();
							win.close();
							if (!success) return;
						}
					});



				}
			},
			{
				iconCls: 'xf_del',
				text: 'Delete',
				scope: this,
				handler: function()
				{

					win.mask('Processing ...');
					xframe.ajax({
						scope: this,
						url: xluerzer.getInstance().getAjaxPath('contactsDetail/delContactLog'),
						params : {
							eca_id: idx
						},
						stateless: function(success, json)
						{
							this.grid_contact_log.getStore().load();
							win.unmask();
							win.close();
						}
					});

				}
			}
			],
			listeners: {
				scope: this,
				afterrender: function()
				{


					win.mask('Loading Data ...');
					xframe.ajax({
						scope: this,
						url: xluerzer.getInstance().getAjaxPath('contactsDetail/loadContactLog'),
						params : {
							eca_id: idx
						},
						stateless: function(success, json)
						{
							fp.getForm().setValues(json.record);
							win.unmask();
							if (!success) return;
						}
					});


				}
			}
		});

		win.show();
	},


	reminderPopUp: function(idx)
	{
		console.info('idx',idx);

		var me = this;

		var fp = Ext.widget({
			xtype: 'form',
			bodyPadding:20,
			layout: 'anchor',
			defaults: {
				anchor: '100%'
			},
			items: [

			{
				fieldLabel: 'Created by',
				xtype: 'xluerzer_backend_users',
				name: 'ecr_created_by'
			},
			{
				fieldLabel: 'State',
				xtype: 'xluerzer_reminder_state',
				name: 'ecr_state'
			},

			{
				fieldLabel: 'Date',
				xtype: 'datefield',
				name: 'ecr_date',
				submitFormat: 'Y-m-d'
			},


			{
				fieldLabel: 'Time',
				xtype: 'timefield',
				name: 'ecr_time',
				format: 'H:i',
				submitFormat: 'H:m:00'
			},
			{
				fieldLabel: 'Notes',
				xtype: 'textarea',
				name: 'ecr_notes',
				height: 200
			},


			{
				fieldLabel: 'Created',
				xtype: 'textfield',
				readOnly: true,
				name: 'ecr_created_ts',
			},
			{
				fieldLabel: 'Modified',
				xtype: 'textfield',
				readOnly: true,
				name: 'ecr_modified_ts',
			},


			]
		});

		var win = Ext.create('Ext.window.Window', {
			modal: true,
			title: 'Reminder for #'+idx,
			height: 500,
			width: 600,
			layout: 'fit',
			items: fp,
			bbar: [
			{
				iconCls: 'xf_save',
				text: 'Save',
				scope: this,
				handler: function()
				{

					win.mask('Save Reminder Data ...');
					xframe.ajax({
						scope: this,
						url: xluerzer.getInstance().getAjaxPath('e_reminder_data/save'),
						params : {
							ecr_id: idx,
							record: Ext.encode(fp.getForm().getValues())
						},
						stateless: function(success, json)
						{
							fp.getForm().setValues(json.record);
							//this.grid_contact_log.getStore().load();
							win.unmask();
							win.close();
							me.grid_reminder.getStore().load();
							if (!success) return;
						}
					});



				}
			},

			],
			listeners: {
				scope: this,
				afterrender: function()
				{


					win.mask('Loading Data ...');
					xframe.ajax({
						scope: this,
						url: xluerzer.getInstance().getAjaxPath('e_reminder_data/load'),
						params : {
							ecr_id: idx
						},
						stateless: function(success, json)
						{
							fp.getForm().setValues(json.record);
							win.unmask();
							if (!success) return;
						}
					});


				}
			}
		});

		win.show();
	},


	logPopUp_cats: function()
	{
		var me = this;
		var win = Ext.create('Ext.window.Window', {
			modal: true,
			title: 'Categories of contact #'+this.ec_id,
			height: 500,
			width: 600,
			layout: 'fit',
			items: [{
				xtype: 'xluerzer_contact_categories',
				title: '',
				ec_id: this.ec_id,
				handler: function() {
					me.loadDetails.call(me);
				}
			}],
			listeners: {
				scope: this,
				afterrender: function()
				{
				}
			}
		});

		win.show();
	},


	getTab_details: function()
	{

		var me = this;
		var grid_contact_log = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:true,
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,

			fn_add: this.logPopUp,
			fn_add_scope: this,

			search: true,
			pager: true,
			records_move: false,
			height: 350,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('contactsDetail/contactLog/load'),
				insert: xluerzer.getInstance().getAjaxPath('contactsDetail/contactLog/insert'),
				remove: xluerzer.getInstance().getAjaxPath('contactsDetail/contactLog/remove'),
				pid: 	'eca_id',
				fields: [
				{name:'eca_date', 			text:'Date', 			type: 'string', width: 80},
				{name:'abu_username',		text:'Representant', 	type: 'string', width: 150},
				{name:'eca_contact', 		text:'Spoke to', 		type: 'string', width: 200},
				{name:'eca_description', 	text:'Message', 		type: 'string', flex: 1},
				],
				initSort: '[{"property":"eca_date","direction":"DESC"}]',
				params: {
					ec_id: this.ec_id
				}
			},

			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					this.logPopUp(record.data.eca_id);
				}
			}
		});

		this.grid_contact_log = grid_contact_log;

		grid_contact_log.on('afterrender',function(){
			grid_contact_log.getStore().load();
		},this);




		var grid_reminder = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:true,
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,

			fn_add: this.reminderPopUp,
			fn_add_scope: this,

			search: true,
			pager: true,
			records_move: false,
			height: 350,
			xstore: {
				initSort: '[{"property":"ecr_date","direction":"DESC"}]',
				load: 	xluerzer.getInstance().getAjaxPath('e_reminder/load'),
				insert: xluerzer.getInstance().getAjaxPath('e_reminder/insert'),
				remove:	xluerzer.getInstance().getAjaxPath('e_reminder/remove'),
				pid: 	'ecr_id',
				fields: [
				{name:'ecr_id', 				text:'ID', 				type: 'int', width: 60},
				{name:'ecr_state', 				text:'State', 			type: 'string'},
				{name:'ecr_date', 				text:'Due Date', 		type: 'string'},
				{name:'ecr_time',	 			text:'Due Time', 		type: 'string'},
				{name:'ecr_notes', 				text:'Notes', 			type: 'string'},
				{name:'ecr_created_by',			text:'Creator', 		type: 'string'},
				{name:'ecr_modified_by',		text:'Modified By', 	type: 'string'}
				],
				params: {
					ecr_contact_id: this.ec_id
				}
			},

			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					this.reminderPopUp(record.data.ecr_id);
				}
			}
		});

		this.grid_reminder = grid_reminder;

		grid_reminder.on('afterrender',function(){
			grid_reminder.getStore().load();
		},this);


		me.firstLoad = false;


		this.panel_company_id = Ext.id();
		this.panel_company_infos_id = Ext.id();

		this.contact_types_id = Ext.id();
		this.panel_details_left = Ext.widget({

			border: false,
			columnWidth: 0.5,
			minWidth: 550,
			xtype: 'form',
			height: '100%',
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},
			items: [


			{
				bodyPadding: 20,
				disabled: true,
				id: this.panel_company_id,
				xtype: 'panel',
				title: 'Company',
				items: [{
					border: false,
					id: this.panel_company_infos_id,
					xtype: 'panel',
					html: '-'
				},{
					xtype: 'text',
					height: 10
				},{
					xtype: 'xluerzer_company',
					name: 'ec_company_id_via_n2n',
					fieldLabel: 'Company ID',
					callBack: function(iiiddd) {

						console.info('Value',iiiddd);


						if (iiiddd == 0)
						{
							var html = "-";
							Ext.getCmp(me.panel_company_infos_id).update(html);
							return;
						}


						Ext.getCmp(me.panel_company_infos_id).mask('Loading Contact ...');
						xframe.ajax({
							scope: me,
							url: xluerzer.getInstance().getAjaxPath('contactsDetail/details/load'),
							params : {
								ec_id: iiiddd
							},
							stateless: function(success, json)
							{

								Ext.getCmp(me.panel_company_infos_id).unmask();

								if (json.record.ec_type == 1)
								{
									Ext.getCmp(this.panel_company_infos_id).update("ERROR: a person was selected.");
								} else
								{



									if (me.firstLoad)
									{
										var ec_company2 = "c/o "+json.record.ec_company+", "+json.record.ec_city;
										me.panel_details_left.getForm().findField("ec_company").setValue(ec_company2);


										var fields = ['ec_company','ec_zip','ec_city','ec_email','ec_email2','ec_country_id','ec_state','ec_fax','ec_phone','ec_phone2','ec_url','ec_position','ec_branch'];

										Ext.each(fields,function(f){

											var f2 = me.panel_details_left.getForm().findField(f);

											if (f2)
											{
												f2.setFieldStyle({'border-color':'red'});
											}

										},this);
									}
									
									me.firstLoad = true;




									var html = "-";

									if (json.record)
									{
										html = "";
										html += "<b>"+json.record.ec_company+"</b><br>";
										html += ""+json.record.ec_address+", ";
										html += ""+json.record.ec_city+"<br>";
										html += ""+json.record.ac_name+"<br>";
									}

									Ext.getCmp(this.panel_company_infos_id).update(html);
								}

							}
						});





					}
				}]

			}

			,{
				xtype: 'text',
				height: 10
			},






			{
				padding: '0 0 0 105',
				border: false,
				xtype: 'panel',
				anchor: '100%',
				height: 20,
				layout: {
					type: 'hbox',
					align: 'stretch'
				},

				items: [{
					boxLabel  : 'Exclude Ranking',
					xtype: 'checkbox',
					uncheckedValue: 0,
					inputValue: 1,
					name: 'rankingExcluded'
				},

				{
					xtype: 'text',
					width: 10
				},

				{
					boxLabel  : 'Closed / Retired',
					xtype: 'checkbox',
					uncheckedValue: 0,
					inputValue: 1,
					name: 'ec_retired'
				},

				{
					xtype: 'text',
					width: 10
				},
				{
					boxLabel  : 'Show in web (also with no credits, but published)',
					xtype: 'checkbox',
					uncheckedValue: 0,
					inputValue: 1,
					name: 'ec_show_on_web'
				}]

			},


			{
				xtype: 'text',
				height: 20
			},

			{
				name: 'ec_id',
				fieldLabel: 'Contact ID',
				readOnly: true,
			},

			{
				id: this.contact_types_id,
				xtype: 'xluerzer_contact_type_company_or_person',
				name: 'ec_type',
				fieldLabel: 'Contact Type',
				ec_id: this.ec_id,
				listeners: {
					scope: this,
					change: function(fx) {
						if (fx.getValue() == 1)
						{
							Ext.getCmp(this.panel_company_id).setDisabled(false);
						} else
						{
							Ext.getCmp(this.panel_company_id).setDisabled(true);
						}
					}
				}
			},
			{
				name: 'ec_lastname',
				fieldLabel: 'Last Name'
			},
			{
				name: 'ec_firstname',
				fieldLabel: 'First Name'
			},
			{
				name: 'ec_company',
				fieldLabel: 'Company'
			},
			{
				name: 'ec_branch',
				fieldLabel: 'Branch'
			},
			
			xluerzer_gui.getInstance().searchComboContacts({
				fieldLabel: 'Position',
				name: 'ec_position',
				minChars: 3,
				emptyText: 'Not set',
				searchScope: 'ec_position'
			}),
			{
				xtype: 'xluerzer_contacttypeid',
				name: 'ec_contactType_id',
				fieldLabel: 'Contact Type Detail'
			},
			{
				name: 'ec_address',
				fieldLabel: 'Address'
			},
			{
				name: 'ec_zip',
				fieldLabel: 'ZIP'
			},
			{
				name: 'ec_city',
				fieldLabel: 'City'
			},
			{
				name: 'ec_state',
				fieldLabel: 'State'
			},
			{
				name: 'ec_phone',
				fieldLabel: 'Telephone'
			},
			{
				name: 'ec_phone2',
				fieldLabel: 'Telephone 2'
			},
			{
				name: 'ec_fax',
				fieldLabel: 'Fax'
			},
			{
				name: 'ec_email',
				fieldLabel: 'Email'
			},
			{
				name: 'ec_email2',
				fieldLabel: 'Email 2'
			},
			{
				name: 'ec_url',
				fieldLabel: 'Website'
			},
			{
				maxWidth: 80,
				xtype: 'button',
				text: 'Open Website',
				scope: this,
				handler: function() {
					var v = this.panel_details_left.getForm().getValues();
					var url = v['ec_url'];
					if (url != "")
					{
						window.open('http://'+url,'OPEN_WEB_'+url);
					}
				}
			},
			{
				xtype: 'xluerzer_country',
				name: 'ec_country_id',
				fieldLabel: 'Country'
			},
			{
				name: 'ec_skype',
				fieldLabel: 'Skype'
			},
			{
				name: 'ec_facebook',
				fieldLabel: 'Facebook'
			},
			{
				name: 'ec_linkedin',
				fieldLabel: 'Linkedin'
			},
			{
				name: 'ec_twitter',
				fieldLabel: 'Twitter'
			},
			/*
			{
			name: 'ec_password',
			fieldLabel: 'Password'
			},
			*/
			{
				xtype: 'textareafield',
				fieldLabel: 'Second Contact',
				name: 'ec_secondContact',
				margin: '20px 0 20px 0'
			},
			{
				name: 'ec_vat',
				fieldLabel: 'VAT'
			},
			{
				name: 'ec_client_id',
				xtype: 'numberfield',
				minValue: 900000,
				maxValue: 999999,
				fieldLabel: 'Client ID'
			},
			{
				name: 'ec_created_ts',
				fieldLabel: 'Created',
				readOnly: true
			},
			{
				name: 'ec_modified_ts',
				fieldLabel: 'Modified',
				readOnly: true
			}
			]
		});

		this.panel_categories_id = Ext.id();

		this.panel_details_right = Ext.widget({

			border: false,
			columnWidth: 0.5,
			minWidth: 550,
			xtype: 'form',
			height: '100%',
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},
			items: [
			{
				xtype: 'xluerzer_backend_users',
				name: 'ec_assignedTo',
				fieldLabel: 'Assigned To',
				maxWidth: 400
			},

			/*{
			xtype: 'xluerzer_contact_categories',
			fieldLabel: 'Categories',
			ec_id: this.ec_id,
			collapsible: true,
			collapsed: false
			},*/

			{
				xtype: 'text',
				text: 'Reminder',
				style: "font-weight: bold;",
				height: 20,
				margin: '20px 0 0 0'
			},
			grid_reminder,
			{
				xtype: 'text',
				height: 10,
			},

			{
				xtype: 'text',
				text: 'Contact Log',
				style: "font-weight: bold;",
				height: 20,
				margin: '20px 0 0 0'
			},
			grid_contact_log,

			{
				xtype: 'text',
				height: 10,
			},
			{
				xtype: 'textarea',
				height: 200,
				name: 'ec_note',
				fieldLabel: 'Notes'
			},


			{
				margin: '10 0 0 0',
				xtype: 'text',
				text: 'Categories',
				style: "font-weight: bold;",
				height: 20
			},

			{
				id: this.panel_categories_id,
				xtype: 'panel',
				html: '<div style="padding:20px">-</div>'
			},

			{
				text: 'Edit Categories',
				xtype: 'button',
				scope: this,
				handler: function() {
					this.logPopUp_cats();
				}
			},





			]
		});


		this.undeleteButton_id = Ext.id();

		this.tab_details = Ext.widget({

			xtype: 'panel',
			layout: 'column',

			defaults: {
				layout: 'anchor',
				defaults: {
					anchor: '100%',

				},
				bodyPadding: 20,
			},


			title: 'Details',
			autoScroll: true,
			items: [

			this.panel_details_left,
			this.panel_details_right,

			],

			tbar: ['->',{
				iconCls:'xl_publish',
				text:'Undelete',
				id: this.undeleteButton_id,
				scope: this,
				disabled: true,
				handler: function() {
					this.undeleteContact()
				}
			},
			{
				text: 'Reload',
				iconCls: 'xf_reload',
				scope: this,
				handler: function() {
					this.loadDetails();
				}
			},'-',{
				iconCls:'xf_copy',
				text:'Merge basic contact data',
				scope: this,
				handler: function() {
					xluerzer_contacts_load_from_contacts.getInstance().doIt(this.ec_id,this.panel_details_left);
				}
			},/*'-',{
				iconCls:'xl_publish',
				text:'Publish',
				scope: this,
				handler: function() {
					this.publish();
				}
			},{
				text: 'Save Details',
				iconCls: 'xf_save',
				scope: this,
				handler: function() {
					this.saveDetails();
				}
			},*/'-',{
				iconCls:'xf_save',
				text:'Save & Publish',
				scope: this,
				handler: function() {
					this.saveDetails();
					this.publish();
				}
			}],

			listeners: {

				scope: this,
				afterrender: function()
				{
					Ext.defer(function(){
						this.tab_details.updateLayout();
						this.tab_details.doLayout();
					},100,this);
				}
			}

		});


	},

	getTab_representatives: function()
	{

		var grid_representatives = xframe_pattern.getInstance().genGrid({

			flex: 1,
			layout: 'fit',
			height: '100%',
			forceFit: true,
			title: 'Representatives',
			region:'center',
			border:false,
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:false,
			toolbar_top: [{

				iconCls: 'xf_add',
				text: 'ADD',
				scope: this,
				handler: function()
				{


					xluerzer_contacts.getInstance().search4submissionPopUp({
						scope: this,
						callback: function(ec_id) {

							xframe.ajax({
								scope: this,
								url: xluerzer.getInstance().getAjaxPath('contactsDetail/setRepr/save'),
								params : {
									ec_id: this.ec_id,
									other: ec_id
								},
								stateless: function(success, json)
								{
									grid_representatives.getStore().load();
									this.masterTab.unmask();
									if (!success) return;
								}
							});
						}
					});



				}

			}],
			search: false,
			pager: true,
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('contactsDetail/representatives/load'),
				update: xluerzer.getInstance().getAjaxPath('contactsDetail/representatives/update'),
				remove: xluerzer.getInstance().getAjaxPath('contactsDetail/representatives/remove'),
				pid: 	'ecr_id',
				fields: [


				{name:'ec_id', 				text:'Contact ID', 		type: 'int'},
				{name:'ec_company', 		text:'Company', 		type: 'string'},
				{name:'ec_firstname', 		text:'Firstname', 		type: 'string'},
				{name:'ec_lastname', 		text:'Lastname', 		type: 'string'},


				{name:'ec_city', 				text:'City', 			type: 'string'},
				{name:'ac_name', 				text:'Country', 		type: 'string'},
				{name:'abu_email', 				text:'Assigned To', 	type: 'string'},
				{name:'ecr_comments', 			text:'Comments', 		type: 'string', editor: {xtype: 'textfield'}},





				{name:'ecr_created_ts', 	text:'Created', 			type: 'string'},
				{name:'ecr_modified_ts', 	text:'Modified', 			type: 'string'}
				],
				params: {
					ec_id: this.ec_id
				}
			},
			listeners2: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					xluerzer_contacts_detail.getInstance().open(record.data.ec_id);
				}
			}
		});

		grid_representatives.on('itemdblclick',function(g,record){
			xluerzer_contacts_detail.getInstance().open(record.data.ec_id);
		},this);


		var grid_clients = xframe_pattern.getInstance().genGrid({

			flex: 1,
			layout: 'fit',
			height: '100%',
			forceFit: true,
			title: 'Clients',
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:false,

			toolbar_top: [{

				iconCls: 'xf_add',
				text: 'ADD',
				scope: this,
				handler: function()
				{



					xluerzer_contacts.getInstance().search4submissionPopUp({
						scope: this,
						callback: function(ec_id) {

							xframe.ajax({
								scope: this,
								url: xluerzer.getInstance().getAjaxPath('contactsDetail/setClient/save'),
								params : {
									ec_id: this.ec_id,
									other: ec_id
								},
								stateless: function(success, json)
								{
									grid_clients.getStore().load();
									this.masterTab.unmask();
									if (!success) return;
								}
							});
						}
					});



				}

			}],


			search: false,
			pager: true,
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('contactsDetail/clients/load'),
				update: xluerzer.getInstance().getAjaxPath('contactsDetail/clients/update'),
				remove: xluerzer.getInstance().getAjaxPath('contactsDetail/clients/remove'),
				pid: 	'ecr_id',
				fields: [

				{name:'ec_id', 				text:'Contact ID', 		type: 'int'},
				{name:'ec_company', 		text:'Company', 		type: 'string'},
				{name:'ec_firstname', 		text:'Firstname', 		type: 'string'},
				{name:'ec_lastname', 		text:'Lastname', 		type: 'string'},


				{name:'ec_city', 				text:'City', 			type: 'string'},
				{name:'ac_name', 				text:'Country', 		type: 'string'},
				{name:'abu_email', 				text:'Assigned To', 	type: 'string'},
				{name:'ecr_comments', 			text:'Comments', 		type: 'string', editor: {xtype: 'textfield'}},





				{name:'ecr_created_ts', 	text:'Created', 			type: 'string'},
				{name:'ecr_modified_ts', 	text:'Modified', 			type: 'string'}
				],
				params: {
					ec_id: this.ec_id
				}
			},
			listeners2: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					xluerzer_contacts_detail.getInstance().open(record.data.ec_id);
				}
			}
		});

		grid_clients.on('itemdblclick',function(g,record){
			xluerzer_contacts_detail.getInstance().open(record.data.ec_id);
		},this);

		this.tab_representatives = Ext.widget({

			xtype: 'panel',
			layout: 'hbox',
			height: 500,

			defaults: {
				layout: 'anchor',
				defaults: {
					anchor: '100%',

				},
			},

			title: 'Representants',
			autoScroll: true,
			items: [
			grid_representatives,
			grid_clients
			],

			listeners: {

				scope: this,
				afterrender: function()
				{
					Ext.defer(function(){
						this.tab_details.updateLayout();
						this.tab_details.doLayout();
					},100,this);
				}
			}

		});



		this.tab_representatives.on('afterrender',function(){
			grid_representatives.getStore().load();
			grid_clients.getStore().load();
		},this);

		// this.tab_representatives = grid_representatives;
	},

	getTab_ranking: function()
	{

		var grid_ranking = xframe_pattern.getInstance().genGrid({
			title: 'Ranking',
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('contactsDetail/ranking/load'),
				pid: 	'ar_id',
				fields: [
				{name:'ar_contactType_id', 	text:'Contact type', 	type: 'int'},
				{name:'ar_pub_all', 		text:'Overall',			type: 'int'},
				{name:'ar_pub_0', 			text:'Current year',	type: 'int'},
				{name:'ar_pub_1', 			text:'Last year',		type: 'int'},
				{name:'ar_pub_3', 			text:'Last 3 years',	type: 'int'},
				{name:'ar_pub_5', 			text:'last 5 years',	type: 'int'},
				{name:'ar_pub_10', 			text:'Last 10 years',	type: 'int'},
				],
				params: {
					ec_id: this.ec_id
				}
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {}
			}
		});

		grid_ranking.on('afterrender',function(){
			grid_ranking.getStore().load();
		},this);

		this.tab_ranking = grid_ranking;
	},

	getTab_distributors: function()
	{

		var grid_distributors = xframe_pattern.getInstance().genGrid({
			title: 'Distributors',
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:false,

			toolbar_top: [{

				iconCls: 'xf_add',
				text: 'ADD',
				scope: this,
				handler: function()
				{



					xluerzer_contacts.getInstance().search4submissionPopUp({
						scope: this,
						callback: function(ec_id) {

							xframe.ajax({
								scope: this,
								url: xluerzer.getInstance().getAjaxPath('contactsDetail/setDistri/save'),
								params : {
									ec_id: this.ec_id,
									other: ec_id
								},
								stateless: function(success, json)
								{
									grid_distributors.getStore().load();
									this.masterTab.unmask();
									if (!success) return;
								}
							});
						}
					});



				}

			}],


			search: false,
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('contactsDetail/distributors'),
				pid: 	'ed_id',
				fields: [
				{name:'ed_country_id', 		text:'Country ID', 		type: 'int'},
				{name:'ed_shop_country_id', text:'Shop Country ID',	type: 'int'},
				{name:'ed_created_ts', 		text:'Created',			type: 'string'},
				{name:'ed_modified_ts', 	text:'Modified',		type: 'string'},

				],
				params: {
					ec_id: this.ec_id
				}
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {}
			}
		});

		grid_distributors.on('afterrender',function(){
			grid_distributors.getStore().load();
		},this);

		this.tab_distributors = grid_distributors;
	},

	getTab_duplicates: function()
	{

		var grid_duplicates = xframe_pattern.getInstance().genGrid({
			title: 'Duplicates',
			region:'center',
			forceFit:true,
			border:false,
			split: true,

			collapseMode: 'mini',
			button_del:true,
			button_add:false,

			toolbar_top: [{

				iconCls: 'xf_add',
				text: 'ADD',
				scope: this,
				handler: function()
				{


					xluerzer_contacts.getInstance().search4submissionPopUp({
						scope: this,
						callback: function(ec_id) {

							xframe.ajax({
								scope: this,
								url: xluerzer.getInstance().getAjaxPath('contactsDetail/setDupli/save'),
								params : {
									ec_id: this.ec_id,
									other: ec_id
								},
								stateless: function(success, json)
								{
									grid_duplicates.getStore().load();
									this.masterTab.unmask();
									if (!success) return;
								}
							});
						}
					});



				}

			}],

			search: false,
			records_move: false,
			pager: true,
			xstore: {
				load: 		xluerzer.getInstance().getAjaxPath('contactsDetail/duplicates'),
				remove: 	xluerzer.getInstance().getAjaxPath('contactsDetail/duplicates/remove'),
				pid: 	'ecd_id',
				fields: [
				{name:'ec_id', 			text:'Contact ID', 		type: 'int'},

				{name:'ec_company', 		text:'Company', 		type: 'string'},
				{name:'ec_firstname', 		text:'Firstname', 		type: 'string'},
				{name:'ec_lastname', 		text:'Lastname', 		type: 'string'},

				{name:'ecd_created_ts', 	text:'Created', 		type: 'string'},
				{name:'ecd_modified_ts', 	text:'Modified', 		type: 'string'}
				],
				params: {
					ec_id: this.ec_id
				}
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {}
			}
		});

		grid_duplicates.on('afterrender',function(){
			grid_duplicates.getStore().load();
		},this);

		this.tab_duplicates = grid_duplicates;
	},

	getTab_associated: function()
	{

		this.grid_assoc = xframe_pattern.getInstance().genGrid({
			title: 'Associated',
			region:'center',
			forceFit:true,
			border:false,
			split: true,

			height: '100%',

			collapseMode: 'mini',
			button_del:true,
			button_add:false,

			toolbar_top: [{

				iconCls: 'xf_add',
				text: 'ADD',
				scope: this,
				handler: function()
				{


					xluerzer_contacts.getInstance().search4submissionPopUp({
						scope: this,
						callback: function(ec_id) {

							xframe.ajax({
								scope: this,
								url: xluerzer.getInstance().getAjaxPath('contactsDetail/setAssociate/save'),
								params : {
									ec_id: this.ec_id,
									other: ec_id
								},
								stateless: function(success, json)
								{
									this.grid_assoc.getStore().load();
									this.masterTab.unmask();
									if (!success) return;
								}
							});
						}
					});



				}

			}],

			search: false,
			records_move: false,
			pager: true,
			xstore: {
				load: 		xluerzer.getInstance().getAjaxPath('contactsDetail/associated'),
				remove: 	xluerzer.getInstance().getAjaxPath('contactsDetail/associated/remove'),
				pid: 	'eca_id',
				fields: [
				{name:'ec_id', 			text:'Contact ID', 	type: 'int'},

				{name:'ec_company', 		text:'Company', 		type: 'string'},
				{name:'ec_firstname', 		text:'Firstname', 		type: 'string'},
				{name:'ec_lastname', 		text:'Lastname', 		type: 'string'},


				{name:'eca_created_ts', 	text:'Created', 		type: 'string'},
				{name:'eca_modified_ts', 	text:'Modified', 		type: 'string'}
				],
				params: {
					ec_id: this.ec_id
				}
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {}
			}
		});

		this.grid_assoc.on('afterrender',function(){
			this.grid_assoc.getStore().load();
		},this);




		this.grid_assocReverse = xframe_pattern.getInstance().genGrid({
			title: 'Associated (Reverse)',
			region:'center',
			forceFit:true,
			border:false,
			split: true,

			height: '100%',

			collapseMode: 'mini',
			button_del:false,
			button_add:false,


			search: false,
			records_move: false,
			pager: true,
			xstore: {
				load: 		xluerzer.getInstance().getAjaxPath('contactsDetail/associatedReverse'),

				pid: 	'eca_id',
				fields: [
				{name:'ec_id', 			text:'Contact ID', 	type: 'int'},

				{name:'ec_company', 		text:'Company', 		type: 'string'},
				{name:'ec_firstname', 		text:'Firstname', 		type: 'string'},
				{name:'ec_lastname', 		text:'Lastname', 		type: 'string'},


				{name:'eca_created_ts', 	text:'Created', 		type: 'string'},
				{name:'eca_modified_ts', 	text:'Modified', 		type: 'string'}
				],
				params: {
					ec_id: this.ec_id
				}
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {}
			}
		});

		this.grid_assocReverse.on('afterrender',function(){
			this.grid_assocReverse.getStore().load();
		},this);





















		this.tab_assoc2 = Ext.widget({

			xtype: 'panel',
			layout: 'hbox',


			defaults: {
				layout: 'anchor',
				defaults: {
					anchor: '100%',

				},
			},

			title: 'Associated',
			autoScroll: true,
			items: [
			this.grid_assoc,
			this.grid_assocReverse
			],

			listeners: {

				scope: this,
				afterrender: function()
				{
					Ext.defer(function(){
						this.tab_details.updateLayout();
						this.tab_details.doLayout();
					},100,this);
				}
			}

		});






















	},


	getTab_employees: function()
	{

		var grid_employees = xframe_pattern.getInstance().genGrid({
			title: 'Employees',
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('contactsDetail/employees'),
				pid: 	'ecptoc_id',
				fields: [
				{name:'ecptoc_id', 			text:'Employee ID', 	type: 'int'},
				{name:'ec_id', 				text:'Contact ID', 		type: 'int'},
				{name:'ec_firstname', 		text:'Firstname', 		type: 'string'},
				{name:'ec_lastname', 		text:'Lastname', 		type: 'string'},
				{name:'ec_email', 			text:'E-Mail', 			type: 'string'},
				{name:'ecptoc_created_ts', 	text:'Created', 		type: 'string'},
				{name:'ecptoc_modified_ts', 	text:'Modified', 		type: 'string'}
				],
				params: {
					ec_id: this.ec_id
				}
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					xluerzer_contacts_detail.getInstance().open(record.data.ec_id);
				}
			}
		});

		grid_employees.on('afterrender',function(){
			grid_employees.getStore().load();
		},this);

		this.tab_employees = grid_employees;
	},



	saveDetails: function()
	{

		var saveData = {};
		var data = this.panel_details_left.getForm().getValues();

		data['ec_assignedTo'] = this.panel_details_right.getForm().getValues()['ec_assignedTo'];
		data['ec_note'] = this.panel_details_right.getForm().getValues()['ec_note'];

		this.masterTab.mask('Saving contact ...');
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('contactsDetail/save'),
			params : {
				ec_id: this.ec_id,
				data: Ext.encode(data)
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
			}
		});

	},

	capitalise: function(string) {
		string = string.split('fep_')[1];
		return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
	},

	getTab_addons2: function(credited)
	{

		var items2 = [
		{
			xtype: 'text',
			text: 'FE/Profile Settings'
		}
		];

		/*
		#########################################################################################
		#########################################################################################
		#########################################################################################
		#########################################################################################
		*/

		var fields = [

		{
			label: 'Company',
			name_old: 'fep_company',
			name_new: 'ec_company'
		},
		{
			label: 'Firstname',
			name_old: 'fep_firstname',
			name_new: 'ec_firstname'
		},
		{
			label: 'Lastname',
			name_old: 'fep_lastname',
			name_new: 'ec_lastname'
		},
		{
			label: 'Street',
			name_old: 'fep_street',
			name_new: 'ec_address'
		},
		{
			label: 'City',
			name_old: 'fep_city',
			name_new: 'ec_city'
		},
		{
			label: 'Zip',
			name_old: 'fep_zipcode',
			name_new: 'ec_zip'
		},
		{
			xtype: 'xluerzer_country',
			label: 'Country',
			name_old: 'fep_country_id',
			name_new: 'ec_country_id'
		},
		{
			label: 'Phone Code',
			name_old: 'fep_phone_code',
			name_new: 'ec_phone_code'
		},
		{
			label: 'Phone',
			name_old: 'fep_phone',
			name_new: 'ec_phone'
		},
		{
			label: 'Fax',
			name_old: 'fep_fax',
			name_new: 'ec_fax'
		},
		{
			label: 'Mail',
			name_old: 'fep_email',
			name_new: 'ec_email'
		},
		{
			label: 'Web',
			name_old: 'fep_url',
			name_new: 'ec_url'
		},

		];

		var items 	= [];
		var newIds 	= [];

		items.push({
			xtype: 'text',
			text: 'Visible-Web | Profile-Data'
		});
		items.push({
			xtype: 'text'
		});
		items.push({
			xtype: 'text'
		});
		items.push({
			xtype: 'text',
			text: 'CRM-Data',
			height: 30
		});

		Ext.each(fields,function(cfg){

			var id_new 	= cfg.id || Ext.id();
			var id_old 	= cfg.id || Ext.id();

			newIds.push(id_new);

			if (cfg.name_old == "")
			{
				items.push({
					xtype: 'text'
				});
				items.push({
					xtype: 'text'
				});
				items.push({
					xtype: 'text'
				});

			} else {


				var tmpx = {
					labelAlign : 'top',
					//anchor: '95%',
					xtype: cfg.xtype ? cfg.xtype : 'textfield',
					fieldLabel: cfg.label,
					width: 280,
					name: cfg.name_old,
					id: id_old,
					listeners: {
						scope: this,
						change: function() {
							if (this.skipChangeEvent) return;
							Ext.getCmp(id_old).setFieldStyle({
							'border-color':'red'
							});
						}
					}
				};

				var namex = 'fep_publish'+this.capitalise(cfg.name_old);

				switch(namex)
				{
					case 'fep_publishEmail':
					namex = "fep_publishMail";
					break;
					case 'fep_publishZipcode':
					namex = "fep_publishzip";
					break;
					case 'fep_publishPhone_code':
					namex = "fep_publishPhoneCode";
					break;
					default: break;
				}

				var blackListVars = {
					fep_publishCity: 1,
					fep_publishCountry_id: 1,
				};

				var hiddenx = false;

				if (blackListVars[namex])
				{
					hiddenx = true;
				}

				console.info("namex",namex);

				var cbx = {
					disabled: hiddenx,
					name: namex,
					xtype: 'checkbox',
					uncheckedValue: 0,
					inputValue: 1,
					width: 20,
					style: {
					'margin-top': '18px'
					}
				};

				var tt = {
					width: 300,
					//fieldLabel: cfg.label,
					layout: 'hbox',
					xtype: 'panel',
					border: false,
					items: [cbx,tmpx]
				};

				items.push(tt);

				items.push({
					xtype: 'button',
					iconCls: 'xl_copy_left',
					style: {
						marginTop: '13px',
						marginLeft: '10px',
						marginRight: '10px',
					},
					scope: this,
					handler: function() {

						var olds = gui.getForm().getValues();
						var up = {};

						up[cfg.name_old] = olds[cfg.name_new];
						gui.getForm().setValues(up);

						Ext.getCmp(id_old).setFieldStyle({
						'border-color':'red'
						});
					}
				});




				items.push({
					xtype: 'button',
					iconCls: 'xl_copy_right',
					style: {
						marginTop: '13px',
						marginLeft: '10px',
						marginRight: '10px',
					},
					scope: this,
					handler: function() {
						var olds = gui.getForm().getValues();
						var up = {};
						up[cfg.name_new] = olds[cfg.name_old];
						gui.getForm().setValues(up);

						Ext.getCmp(id_new).setFieldStyle({
						'border-color':'red'
						});
					}
				});
			}

			items.push({
				id: id_new,
				disabled: cfg.disabled,
				readOnly: cfg.readOnly,
				xtype: cfg.xtype ? cfg.xtype : false,
				fieldLabel: cfg.label,
				width: 300,
				name: cfg.name_new,
				listeners: {
					scope: this,
					change: function() {
						if (this.skipChangeEvent) return;
						Ext.getCmp(id_new).setFieldStyle({
						'border-color':'red'
						});
					}
				}
			});

		},this);


		/*
		#########################################################################################
		#########################################################################################
		#########################################################################################
		#########################################################################################
		*/

		items.push({
			xtype: 'text',
			height: 30,
			colspan: 4
		});

		items.push({
			colspan: 3,
			xtype: 'textfield',
			name: 'fep_fe_user_id',
			fieldLabel: 'FE-USER ID'
		});

		items.push({
			xtype: 'button',
			text: 'import from fe-user',
			scope: this,
			handler: function()
			{
				xluerzer_contacts_load_from_contacts_pp.getInstance().doIt(this.ec_id,this.superCrmForm);
			}
		});

		items.push({
			colspan: 4,
			name: 'fep_profile_image_s_id',
			fieldLabel: 'Image',
			xtype: 'xr_field_file_2',
			img_w: 0,
			img_h: 0,
			dir: 858305,
			addPath: Ext.Date.format(new Date(),"Y")+'/'+Ext.Date.getWeekOfYear(new Date()),
		});


		items.push({
			xtype: 'text',
			height: 30,
			colspan: 4
		});


		/* ---------------------------------- */

		items.push({
			iconCls: 'xf_update',
			xtype: 'button',
			text: 'update profile data',
			scope: this,
			handler: function()
			{
				this.update_profile();
			}
		});
		items.push({
			xtype: 'text'
		});
		items.push({
			xtype: 'text'
		});
		items.push({
			iconCls: 'xf_update',
			xtype: 'button',
			text: 'update crm data',
			scope: this,
			handler: function()
			{
				this.update_crm();
			}
		});


		/*
		#########################################################################################
		#########################################################################################
		#########################################################################################
		#########################################################################################
		*/



		var gui = Ext.widget({

			autoScroll: true,
			xtype: 'form',
			defaultType: 'textfield',
			width: 800,
			defaults: {
				labelAlign : 'top',
				anchor: '100%'
			},
			layout: {
				type: 'table',
				columns: 4
			},
			bodyStyle: 'padding:20px',

			items: items,

			listeners: {
				scope: this,
				buffer: 10,
				afterrender: function() {
				}
			}


		});

		this.superCrmForm = gui;

		items2.push(gui);




		this.publicProfileSettings = Ext.widget({
			bodyPadding: 20,
			title: 'Record',
			tbar: [{
				text: 'Reload',
				iconCls: 'xf_reload',
				scope: this,
				handler: function() {
					this.loadDetails();
				}
			}],
			xtype: 'form',
			autoScroll: true,
			items: items2
		});


		this.publicProfileLog2 = Ext.widget({
			bodyPadding: 20,
			title: 'Log',
			xtype: 'panel',
			html: '-'
		});


		this.publicProfileLog = xluerzer_gui.getInstance().getDefaultTabPanel_log({scopex:'fe_profiles'},this.ec_id);


		this.publicProfileLogin = Ext.widget({
			bodyPadding: 20,
			title: 'Login',
			xtype: 'form',
			items: [{
				xtype: 'textfield',
				name: 'fep_fe_user_id',
				fieldLabel: 'FE-USER-ID',
			}]
		});

		this.publicProfileSettingsWrapper = Ext.widget({
			title: 'public profile settings',
			xtype: 'tabpanel',
			items: [this.publicProfileSettings, this.publicProfileLog]
		});




	},

	getTab_addons: function(credited)
	{

		var grids = [];

		if (credited)
		{
			Ext.each(credited,function(xx){

				var tmp = xframe_pattern.getInstance().genGrid({
					title: xx.act_description+" ("+xx.cnt+")",
					region:'center',
					forceFit:true,
					border:false,
					split: true,
					collapseMode: 'mini',
					button_del:false,
					button_add:false,
					search: true,
					pager: true,
					records_move: false,
					height: 350,
					xstore: {
						load: 	xluerzer.getInstance().getAjaxPath('contactsDetail/mediaByCatId/load'),
						pid: 	'eam_id',
						fields: [
						{name:'eam_type', 				text:'Type', 			type: 'int', renderer: xluerzer_media.getInstance().renderer_submission_mediaType},
						{name:'eam_id', 				text:'Artwork', 		type: 'int', renderer: xluerzer_media.getInstance().renderer_submission_small},
						{name:'eam_id', 				text:'Media-ID', 		type: 'int'},
						{name:'eam_specials_archivNr', 	text:'ArchivNr', 		type: 'string'},
						{name:'eam_record_title', 		text:'Client', 			type: 'string'},
						{name:'ac_name', 				text:'Category', 		type: 'string'},
						],
						params: {
							ec_id: this.ec_id,
							eamc_contactType_id: xx.eamc_contactType_id
						},
						initSort: '[{"property":"eam_id","direction":"DESC"}]'
					},

					listeners: {
						scope: this,
						buffer: 1,
						afterrender:function(g)
						{
							g.getStore().load();
						},
						itemdblclick: function(g,record) {
							xluerzer_media.getInstance().openMedia(record.data.eam_id);
						}
					}
				});

				grids.push(tmp);
			},this);
		}

		if (!this.media)
		{

			var disabled = false;
			if (!credited) disabled = true;

			this.media = Ext.widget({
				title: 'Work in Archive',
				xtype: 'tabpanel',
				disabled: disabled,
				border: false,
				items: grids
			});
			this.masterTab.add(this.media);
		} else {
			this.media.removeAll();
			this.media.add(grids);
			this.media.doLayout();
		}

	},

	update_profile: function()
	{
		var data = this.publicProfileSettings.getForm().getValues();
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('contactsDetail/updateProfile/save'),
			params : {
				ec_id: this.ec_id,
				data: Ext.encode(data),
				type: 'profile'
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
				this.loadDetails();
			}
		});
	},

	update_crm: function()
	{
		var data = this.publicProfileSettings.getForm().getValues();
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('contactsDetail/updateContacts/save'),
			params : {
				ec_id: this.ec_id,
				data: Ext.encode(data),
				type: 'contacts'
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
				this.loadDetails();
			}
		});
	},

	publish: function()
	{
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('contactsDetail/publish/do'),
			params : {
				ec_id: this.ec_id,
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
				this.loadDetails();
			}
		});
	},

	open: function(ec_id)
	{

		var me = this;
		this.ec_id = ec_id;

		var title = 'Contact: '+ec_id;

		xluerzer.getInstance().saveLastCommand({
			title: title,
			classx: 'xluerzer_contacts_detail',
			fn: 'open',
			param_0: ec_id,
		});

		this.skipChangeEvent = false;

		this.getTab_associated();
		this.getTab_addons2();
		this.getTab_details();
		this.getTab_employees();
		this.getTab_representatives();
		this.getTab_ranking();
		this.getTab_distributors();
		this.getTab_duplicates();

		this.tab_log = xluerzer_gui.getInstance().getDefaultTabPanel_log({
			prefix: 'ec_',
			scopex: 'e_contacts'
		},this.ec_id);


		this.masterTab = Ext.create('Ext.tab.Panel', {
			activeTab: 0,
			title: title,
			layout: 'fit',
			xtbar:[],
			items: [this.tab_details,this.tab_employees,this.tab_representatives,/*this.tab_distributors,*/this.tab_duplicates,this.tab_assoc2,this.tab_ranking,this.publicProfileSettingsWrapper,this.tab_log],
			plugins: Ext.create('Ext.ux.TabCloseMenu'),
			listeners: {

				scope: this,
				afterrender: function() {
					this.loadDetails();
				} // afterrender


			}
		});

		xluerzer.getInstance().showContent(this.masterTab);

	},
	
	undeleteContact: function()
	{
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('contactsDetail/undeleteContact'),
			params : {
				ec_id: this.ec_id,
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
				this.loadDetails();
				Ext.getCmp(this.undeleteButton_id).setDisabled(true);
				
			}
		});
	},

	loadDetails: function() {
		var me = this;
		console.info("id", this.ec_id)

		this.masterTab.mask('Loading Contact ...');
		xframe.ajax({
			scope: me,
			url: xluerzer.getInstance().getAjaxPath('contactsDetail/details/load'),
			params : {
				ec_id: this.ec_id
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;

				this.skipChangeEvent = true;
				this.publicProfileSettings.getForm().setValues(json.record);
				this.publicProfileSettings.getForm().setValues(json.record.profile);
				this.skipChangeEvent = false;


				if (!json.record.profile)
				{
					this.publicProfileSettings.setDisabled(true);
					this.publicProfileLog.setDisabled(true);
				} else {
					this.publicProfileSettings.setDisabled(false);
					this.publicProfileLog.setDisabled(false);
				}
				
				
				if (json.record.ec_del == 'Y')
				{
					console.log("c is deleted");
					Ext.getCmp(this.undeleteButton_id).setDisabled(false);
				}


				this.panel_details_left.getForm().setValues(json.record);
				this.panel_details_right.getForm().setValues(json.record);
				this.getTab_addons(json.record.credited);

				this.tab_log.setNewRecordId(this.ec_id);

				var html = "";
				if (json.record.cats)
				{
					Ext.each(json.record.cats,function(c){
						html += c.accg_categorygroup + " \\ " + c.acc_category + "<br>";
					},this);
				} else {
					html = '-';
				}

				html = "<div style='padding:20px;'>" + html + "</div>";
				Ext.getCmp(this.panel_categories_id).update(''+html);

				//if ()
				{
					this.tab_employees.setDisabled((json.record.ec_type == 1));
				}


				Ext.getCmp(this.panel_company_id).setDisabled((json.record.ec_type == 0));

				if (json.record.ec_type == 0)
				{
					Ext.getCmp(this.panel_company_infos_id).update("");
				} else
				{

					var html2 = "-";

					if (json.record.company)
					{
						html2 = "";
						html2 += "<b>"+json.record.company.ec_company+"</b><br>";
						html2 += ""+json.record.company.ec_address+", ";
						html2 += ""+json.record.company.ec_city+"<br>";
						html2 += ""+json.record.company.ac_name+"<br>";
					}

					//Ext.getCmp(this.panel_company_infos_id).update(''+html2);
				}






			}
		});

	},







}