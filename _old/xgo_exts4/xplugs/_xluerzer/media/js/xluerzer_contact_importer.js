var xluerzer_contact_importer = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_contact_importer";
		}

		this.getInstance = function(config) {
			return new xluerzer_contact_importer_(config);
			return instance;
		}
	}
})();

var xluerzer_contact_importer_ = function(config) {
	this.config = config || {};
};

xluerzer_contact_importer_.prototype = {



	openUploadWindow: function()
	{


		var win = false;
		var field_name_id = Ext.id();
		var field_file_id = Ext.id();

		var fp = Ext.widget({
			xtype: 'form',
			defaultType: 'textfield',
			bodyPadding: 20,
			items: [

			{
				id: field_name_id,
				name: 'ci_name',
				fieldLabel: 'Name'
			},
			{
				id: field_file_id,
				xtype: 'xr_field_file_3',
				fieldLabel: 'File',
				cls: 'imageContainerBox',
				img_w: 300,
				img_h: 400,
				dir: 1208303,
				addPath: Ext.Date.format(new Date(),"Y")+'/'+Ext.Date.getWeekOfYear(new Date()),
				name: 'ci_s_id'
			},

			{
				iconCls: 'xf_import',
				xtype: 'button',
				text: 'Import',
				scope: this,
				handler: function()
				{
					var name = Ext.getCmp(field_name_id).getValue();
					var s_id = Ext.getCmp(field_file_id).getValue();

					if ((name.length == 0) || (s_id == 0))
					{
						xframe.alert("Error","Please specify name and file");
					} else {



						win.mask("Importing ...");
						xframe.ajax({
							scope: this,
							url: xluerzer.getInstance().getAjaxPath('cimporter/doImport'),
							params : {
								name: name,
								s_id: s_id
							},
							stateless: function(success, json)
							{
								win.unmask();
								if (!success) return;
								win.close();
								xframe.alert("Success","Data processed - for detailed informations open via Archive Import #"+json.ci_id);
								this.grid_archive.getStore().load();
							}
						});




					}

				}
			}

			]
		});




		win = Ext.create('Ext.window.Window', {
			modal: true,
			title: 'Upload CSV File',
			height: 500,
			width: 500,
			layout: 'fit',
			items: [fp]
		});

		win.show();



	},

	getTab_imports: function()
	{

		var fields2 =  [
		{name:'ci_id', 			text:'ID',		width: 50, type: 'int'},
		{name:'ci_created',		text:'Date', 	type: 'string'},
		{name:'ci_name', 		text:'Name', 	type: 'string'},
		{name:'ci_state', 		text:'Status', 	type: 'string'},
		];

		this.grid_archive = xframe_pattern.getInstance().genGrid({
			collapsible: true,
			region:'west',
			maxWidth: 300,
			width: 300,
			forceFit:true,
			border:false,
			title: 'Archive',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			records_move: false,
			pager: true,
			toolbar_top:[{
				iconCls: 'xf_download',
				text: 'Download Sample',
				scope: this,
				handler: function()
				{
					window.open("/xgo/xplugs/xluerzer/ajax/cimporter/doExport");
				}
			},{
				iconCls: 'xf_upload',
				text: 'Upload',
				scope: this,
				handler: function()
				{
					this.openUploadWindow();
				}
			}],
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('cimporter/grid_archive'),
				params: {
				},
				pid: 	'ci_id',
				fields: fields2
			},
			listeners: {
				scope:this,
				buffer: 1,
				afterrender: function(t) {
					t.getStore().load();
				}
			}
		});

		this.grid_archive.on('itemdblclick',function(t,record){

			var ci_id = record.data['ci_id'];

			this.tab_notsure_center.setDisabled(false);
			this.tab_notsure_center.setTitle("Inspecting :: "+record.data['ci_name']+" | "+record.data['ci_id']);

			this.grid_notsures.getStore().proxy.extraParams['ci_id'] = ci_id;
			this.grid_notsures.getStore().load();

			this.grid_notsures_duplicates.setDisabled(true);
			this.grid_notsures_duplicates.getStore().proxy.extraParams['cic_id'] = 0;
			this.grid_notsures_duplicates.getStore().load();

			this.grid_notsures_duplicates.getStore().load();



		},this);


		return this.grid_archive;
	},


	getTab_details: function()
	{
		this.tab_details = Ext.widget({
			collapsible: true,
			title: 'Details',
			xtype: 'panel',
			region: 'south',
			height: 200,
			items: []
		});

		return this.tab_details;
	},




	checkDiffs: function()
	{
		var me = this;
		Ext.iterate(this.idsx,function(k,v){

			var val_l = ""
			var val_r = ""

			try {
				val_l = Ext.getCmp(k).getValue();
			} catch (e) {}
			try {
				val_r = Ext.getCmp(v).getValue();
			} catch (e) {}

			if (val_l != val_r)
			{
				try {
					Ext.getCmp(k).setFieldStyle({
					'border-color':'red'
					});
				} catch (e) {}
				try {
					Ext.getCmp(v).setFieldStyle({
					'border-color':'red'
					});
				} catch (e) {}
			} else {
				try {
					Ext.getCmp(k).setFieldStyle({
					'border-color':'green'
					});
				} catch (e) {}
				try {
					Ext.getCmp(v).setFieldStyle({
					'border-color':'green'
					});
				} catch (e) {}
			}

		},me);
	},


	clearFields: function()
	{
		var me = this;
		Ext.iterate(this.idsx,function(k,v){

			try {
				Ext.getCmp(k).setFieldStyle({
				'border-color':'#b5b8c8'
				});
			} catch (e) {}
			try {
				Ext.getCmp(v).setFieldStyle({
				'border-color':'#b5b8c8'
				});
			} catch (e) {}

		},me);
	},




	getCopyPanel: function() {


		var companyOrPerson 		= Ext.id();
		var companyFieldId 			= Ext.id();
		var companyFieldId_load		= Ext.id();
		var companyFieldId_create 	= Ext.id();
		var gui = false;

		var fields = [


		{
			xtype: 'xluerzer_contact_type_company_or_person',
			label: 'Company/Person',
			name_old: 'cic_type',
			name_new: 'ec_type'
		},
		
		{
			label: 'Company',
			name_old: 'cic_company',
			name_new: 'ec_company'
		},
		{
			label: 'Firstname',
			name_old: 'cic_firstname',
			name_new: 'ec_firstname'
		},
		
		{
			label: 'Position',
			name_old: 'cic_position',
			name_new: 'ec_position'
		},
		{
			label: 'Branch',
			name_old: 'cic_branch',
			name_new: 'ec_branch'
		},
		
		
		
		{
			label: 'Lastname',
			name_old: 'cic_lastname',
			name_new: 'ec_lastname'
		},
		{
			label: 'Street',
			name_old: 'cic_address',
			name_new: 'ec_address'
		},
		{
			label: 'City',
			name_old: 'cic_city',
			name_new: 'ec_city'
		},
		{
			label: 'Zip',
			name_old: 'cic_zip',
			name_new: 'ec_zip'
		},
		{
			xtype: 'xluerzer_country',
			label: 'Country-ID',
			name_old: 'cic_country_id',
			name_new: 'ec_country_id'
		},
		{
			xtype: 'textfield',
			label: 'Country-Name',
			name_old: 'cic_country_name',
			name_new: ''
		},
		{
			label: 'Phone Code',
			name_old: 'cic_phone_code',
			name_new: 'ec_phone_code'
		},
		{
			label: 'Phone',
			name_old: 'cic_phone',
			name_new: 'ec_phone'
		},
		{
			label: 'Phone 2',
			name_old: 'cic_phone2',
			name_new: 'ec_phone2'
		},
		{
			label: 'Fax',
			name_old: 'cic_fax',
			name_new: 'ec_fax'
		},
		{
			label: 'Mail',
			name_old: 'cic_email',
			name_new: 'ec_email'
		},
		{
			label: 'Mail 2',
			name_old: 'cic_email2',
			name_new: 'ec_email2'
		},
		{
			label: 'Web',
			name_old: 'cic_url',
			name_new: 'ec_url'
		},

		{
			label: 'Facebook',
			name_old: 'cic_facebook',
			name_new: 'ec_facebook'
		},
		{
			label: 'Skype',
			name_old: 'cic_skype',
			name_new: 'ec_skype'
		},
		{
			label: 'LinkedIn',
			name_old: 'cic_linkedin',
			name_new: 'ec_linkedin'
		},
		{
			label: 'Twitter',
			name_old: 'cic_twitter',
			name_new: 'ec_twitter'
		},
		];


		var items 	= [];
		var newIds 	= [];

		items.push({
			xtype: 'text',
			text: 'Imported Data'
		});
		items.push({
			xtype: 'text'
		});
		items.push({
			xtype: 'text'
		});
		items.push({
			xtype: 'text',
			text: 'Similar Data',
			height: 30
		});


		this.idsx = {};
		var me = this;



		Ext.each(fields,function(cfg){

			var id_new = cfg.id || Ext.id();
			var id_old = Ext.id();

			this.idsx[id_new] = id_old;


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

				items.push({
					id: id_old,
					//readOnly: cfg.readOnly,
					//readOnly: true,
					xtype: cfg.xtype ? cfg.xtype : false,
					fieldLabel: cfg.label,
					width: "100%",
					//width: 300,
					//anchor: '100%',
					name: cfg.name_old,
					listeners: {
						scope: this,
						change: function() {
							this.checkDiffs();
						}
					}
				});

				if ((cfg.name_old == "esxc_id") || (cfg.name_new == ''))
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
				}
				else
				{
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

							var olds = this.tab_notsure_detail.getForm().getValues();
							var up = {};

							up[cfg.name_old] = olds[cfg.name_new];


							this.tab_notsure_detail.getForm().setValues(up);
							this.checkDiffs();
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

							var olds = this.tab_notsure_detail.getForm().getValues();
							var up = {};
							up[cfg.name_new] = olds[cfg.name_old];
							this.tab_notsure_detail.getForm().setValues(up);

							this.checkDiffs();
						}
					});
				}



			}


			if (cfg.name_new != '')
			{
				items.push({
					id: id_new,
					disabled: cfg.disabled,
					readOnly: cfg.readOnly,
					xtype: cfg.xtype ? cfg.xtype : false,
					fieldLabel: cfg.label,
					width: "100%",
					//anchor: '100%',
					name: cfg.name_new,
					listeners: {
						scope: this,
						change: function() {
							this.checkDiffs();
						}
					}
				});
			}

		},this);


		this.btn_update = Ext.id();

		gui = {
			region: 'center',
			autoScroll: true,
			xtype: 'form',
			defaultType: 'textfield',
			defaults: {
				labelAlign : 'top',
				anchor: '100%'
			},
			layout: {
				type: 'table',
				columns: 4
			},
			bodyStyle: 'padding:20px',
			items: items
		};

		return gui;
	},


	getTab_notsure_center: function()
	{

		var me = this;
		var fields =  [
		{name:'cic_id', 		text:'CIC-ID',		width: 50, type: 'int'},
		{name:'cic_ec_id',		text:'C-ID',		width: 100, type: 'string'},
		{name:'cic_status',		text:'Status',		width: 100, type: 'string'},
		{name:'cic_firstname',  text:'Firstname', 	type: 'string'},
		{name:'cic_lastname',	text:'Lastname', 	type: 'string'},
		{name:'cic_email',		text:'E-Mail',		type: 'string'},
		];

		this.grid_notsures = xframe_pattern.getInstance().genGrid({
			region:'west',
			forceFit:true,
			border:false,
			title: 'Imported Contacts',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('cimporter/grid_icontacts'),
				params: {
					ci_id : 0
				},
				pid: 	'ci_id',
				fields: fields
			},
			listenersx: {
				scope:this,
				buffer: 1,
				afterrender: function(t) {
					t.getStore().load();
				}
			}
		});



		this.grid_notsures.on('itemdblclick',function(t,record){

			var cic_id = record.data['cic_id'];
			this.grid_notsures_duplicates.setDisabled(false);
			this.grid_notsures_duplicates.getStore().proxy.extraParams['cic_id'] = cic_id;
			this.grid_notsures_duplicates.getStore().load();



			this.cic_id = cic_id;

			this.tab_notsure_detail.mask("Loading ...");
			xframe.ajax({
				scope: this,
				url: xluerzer.getInstance().getAjaxPath('cimporter/loadImported'),
				params : {
					cic_id: cic_id
				},
				stateless: function(success, json)
				{
					this.tab_notsure_detail.unmask();
					if (!success) return;


					this.clearFields();
					this.tab_notsure_detail.getForm().reset();
					this.tab_notsure_detail.getForm().setValues(json.cic_contact);
				}
			});






		},this);

		/*

		#####################################################################
		#####################################################################
		#####################################################################
		#####################################################################
		#####################################################################
		#####################################################################

		*/
		
		var tz = function(v)
		{
			if (v==0) return 'Company';
			return "Person";
		}
		
		var fields2 =  [
		{name:'ec_id', 			text:'ID',			width: 50, type: 'int'},
		{name:'ec_type',		text:'Typ',			width: 100, type: 'string', renderer: tz},
		{name:'ec_firstname',   text:'Firstname', 	type: 'string'},
		{name:'ec_lastname',	text:'Lastname', 	type: 'string'},
		{name:'ec_email',		text:'E-Mail',		type: 'string'},
		];

		this.grid_notsures_duplicates = xframe_pattern.getInstance().genGrid({
			region:'east',
			forceFit:true,
			border:false,
			disabled: true,
			title: 'Similar Contacts',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('cimporter/grid_scontacts'),
				params: {
					cic_id : 0
				},
				pid: 	'ec_id',
				fields: fields2
			},
			listenersx: {
				scope:this,
				buffer: 1,
				afterrender: function(t) {
					t.getStore().load();
				}
			}
		});


		this.ec_id 	= false;
		this.cic_id = false;

		this.grid_notsures_duplicates.on('itemdblclick',function(t,record){

			var ec_id 	= record.data['ec_id'];
			this.ec_id 	= ec_id;

			this.tab_notsure_detail.mask("Loading ...");
			xframe.ajax({
				scope: this,
				url: xluerzer.getInstance().getAjaxPath('cimporter/loadSimilar'),
				params : {
					ec_id: ec_id
				},
				stateless: function(success, json)
				{
					this.tab_notsure_detail.unmask();
					if (!success) return;
					this.tab_notsure_detail.getForm().setValues(json.cic_contact);
					this.checkDiffs();
				}
			});


		},this);






		this.tab_notsure_detail = Ext.widget({
			title: 'Imported vs. Similar',
			region: 'center',
			xtype: 'panel',
			html: '-',
			disabled: true
		});

		this.tab_notsure_detail = this.getCopyPanel();
		this.tab_notsure_detail.title = 'Imported vs. Similar';
		this.tab_notsure_detail.tbar = [{
			iconCls: 'xf_import',
			text: 'update & import as new record (imported data)',
			scope: this,
			handler: function()
			{

				if (!this.cic_id)
				{
					xframe.alert("Error","No imported contact selected");
					return;
				}


				var formData = this.tab_notsure_detail.getForm().getValues();
				xframe.yn({
					title:'Confirm',
					msg: 'Do you really want to insert imported data as new contact CIC-ID:'+this.cic_id+' ?',
					scope:this,
					handler: function(btn)
					{
						if (btn != 'yes') return;

						var gui = this.tab_notsure_detail;
						gui.mask('processing ...');
						xframe.ajax({
							scope: this,
							url: xluerzer.getInstance().getAjaxPath('cimporter/updateAndImportImported'),
							params : {
								cic_id: this.cic_id,
								data: Ext.encode(formData)
							},
							stateless: function(success, json)
							{
								gui.unmask();
								if (!success) return;
							}
						});

					}
				});




			}
		},'->',{
			iconCls: 'xf_update',
			text: 'update choosen similar',
			scope: this,
			handler: function()
			{

				if (!this.ec_id)
				{
					xframe.alert("Error","No contact selected");
					return;
				}

				var formData = this.tab_notsure_detail.getForm().getValues();
				xframe.yn({
					title:'Confirm',
					msg: 'Do you really want to update existing contact C-ID:'+this.ec_id+' ?',
					scope:this,
					handler: function(btn)
					{
						if (btn != 'yes') return;

						var gui = this.tab_notsure_detail;
						gui.mask('processing ...');
						xframe.ajax({
							scope: this,
							url: xluerzer.getInstance().getAjaxPath('cimporter/updateAndImportContact'),
							params : {
								ec_id: this.ec_id,
								data: Ext.encode(formData)
							},
							stateless: function(success, json)
							{
								gui.unmask();
								if (!success) return;
							}
						});

					}
				});







			}
		}];

		this.tab_notsure_detail = Ext.widget(this.tab_notsure_detail);


		this.tab_notsure_center = Ext.widget({
			title: '-',
			xtype: 'panel',
			region: 'center',
			layout: 'border',
			disabled: true,
			items: [this.grid_notsures_duplicates,this.grid_notsures,this.tab_notsure_detail],
		});




		return this.tab_notsure_center;
	},

	getTab_notsure_detail_duplicates: function()
	{
		this.tab_notsure_detail_duplicates = Ext.widget({
			title: 'Duplicates',
			region: 'east',
			xtype: 'panel',
			layout: 'border',
			items: [],
		});

		return this.tab_notsure_detail_duplicates;
	},


	open: function()
	{

		this.gui = Ext.widget({
			title: 'Import Contacts via CSV',
			xtype: 'panel',
			layout: 'border',
			items: [

			this.getTab_imports(),
			this.getTab_notsure_center(),

			],
		});

		xluerzer.getInstance().showContent(this.gui);
	}


}