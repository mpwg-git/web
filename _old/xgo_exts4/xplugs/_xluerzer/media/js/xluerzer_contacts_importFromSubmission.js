var xluerzer_contactsFromSubmission = (function() {
	var instance = null;
	return new function() {

		this.getInstance = function(config) {
			
				return new xluerzer_contactsFromSubmission_(config);
			
			return instance;
		}
	}
})();

var xluerzer_contactsFromSubmission_ = function(config) {
	this.config = config || {};
};

xluerzer_contactsFromSubmission_.prototype = {

	getSubmitter2backendPanel: function(cfg) {

		if (typeof cfg == 'undefined')
		{
			var cfg = {
				modex: 'norm'
			};

		}

		var companyOrPerson 		= Ext.id();
		var companyFieldId 			= Ext.id();
		var companyFieldId_load		= Ext.id();
		var companyFieldId_create 	= Ext.id();
		var gui = false;

		switch(cfg.modex)
		{
			case 'xcredits':

			var fields = [
			{
				readOnly: true,
				hideTrigger: true,
				xtype: 'numberfield',
				label: 'ID',
				name_old: 'esxc_id',
				name_new: 'ec_id'
			},
			{
				id: companyFieldId,
				label: 'Company ID',
				name_old: '',
				name_new: 'companyId',
				disabled: true,
			},
			{
				id: companyOrPerson,
				xtype: 'xluerzer_contact_type_company_or_person',
				label: 'Company/Person',
				name_old: 'es_type',
				name_new: 'ec_type'
			},
			
			{
				label: 'Company',
				name_old: 'esxc_company',
				name_new: 'ec_company'
			},
			{
				label: 'Firstname',
				name_old: 'esxc_firstname',
				name_new: 'ec_firstname'
			},
			{
				label: 'Lastname',
				name_old: 'esxc_lastname',
				name_new: 'ec_lastname'
			},
			{
				label: 'Street',
				name_old: 'esxc_street',
				name_new: 'ec_address'
			},
			{
				label: 'City',
				name_old: 'esxc_city',
				name_new: 'ec_city'
			},
			{
				label: 'Zip',
				name_old: 'esxc_zip',
				name_new: 'ec_zip'
			},
			{
				//noCopy: true,
				xtype: 'xluerzer_country',
				label: 'Country',
				name_old: 'esxc_country_id',
				name_new: 'ec_country_id'
			},
			{
				label: 'Phone Code',
				name_old: 'esxc_phone_code',
				name_new: 'ec_phone_code'
			},
			{
				label: 'Phone',
				name_old: 'esxc_phone',
				name_new: 'ec_phone'
			},
			{
				label: 'Fax',
				name_old: 'esxc_fax',
				name_new: 'ec_fax'
			},
			{
				label: 'Mail',
				name_old: 'esxc_email',
				name_new: 'ec_email'
			},
			{
				label: 'Web',
				name_old: 'esxc_web',
				name_new: 'ec_url'
			},
			];

			break;
			default:


			var fields = [
			{
				hideTrigger: true,
				readOnly: true,
				xtype: 'numberfield',
				label: 'LOADED CRM RECORD ID',
				name_old: '',
				name_new: 'ec_id'
			},
			{
				id: companyFieldId,
				label: 'Company ID',
				name_old: '',
				name_new: 'companyId',
				disabled: true,
			},
			{
				id: companyOrPerson,
				xtype: 'xluerzer_contact_type_company_or_person',
				label: 'Company/Person',
				name_old: 'es_type',
				name_new: 'ec_type'
			},
			{
				label: 'Company',
				name_old: 'es_company',
				name_new: 'ec_company'
			},
			{
				label: 'Firstname',
				name_old: 'es_firstname',
				name_new: 'ec_firstname'
			},
			{
				label: 'Lastname',
				name_old: 'es_lastname',
				name_new: 'ec_lastname'
			},
			{
				label: 'Street',
				name_old: 'es_address',
				name_new: 'ec_address'
			},
			{
				label: 'City',
				name_old: 'es_city',
				name_new: 'ec_city'
			},
			{
				label: 'Zip',
				name_old: 'es_zip',
				name_new: 'ec_zip'
			},
			{
				noCopy: true,
				xtype2: 'xluerzer_country',
				xtype: 'xluerzer_shop_country',
				label: 'Country',
				name_old: 'es_country_id',
				name_new: 'ec_country_id'
			},
			{
				label: 'Phone Code',
				name_old: 'es_phone_code',
				name_new: 'ec_phone_code'
			},
			{
				label: 'Phone',
				name_old: 'es_phone',
				name_new: 'ec_phone'
			},
			{
				label: 'Fax',
				name_old: 'es_fax',
				name_new: 'ec_fax'
			},
			{
				label: 'Mail',
				name_old: 'es_email',
				name_new: 'ec_email'
			},
			{
				label: 'Web',
				name_old: '',
				name_new: 'ec_url'
			},
			];
		}





		var items 	= [];
		var newIds 	= [];

		items.push({
			xtype: 'text',
			text: 'User submitted'
		});
		items.push({
			xtype: 'text'
		});
		items.push({
			xtype: 'text',
			text: 'Final record',
			height: 30
		});


		Ext.each(fields,function(cfg){

			var id_new = cfg.id || Ext.id();
			newIds.push(id_new);


			if (cfg.name_old == "")
			{
				items.push({
					xtype: 'text'
				});
				items.push({
					xtype: 'text'
				});

			} else {

				items.push({
					//readOnly: cfg.readOnly,
					readOnly: true,
					xtype: cfg.xtype ? cfg.xtype : false,
					fieldLabel: cfg.label,
					width: 300,
					name: cfg.name_old
				});

				if ((cfg.name_old == "esxc_id") || (cfg.noCopy))
				{
					items.push({
						xtype: 'text'
					});
				}
				else
				{
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
					
				

			}

			
			var xtype2 = cfg.xtype ? cfg.xtype : false;
			
			if (cfg.xtype2) {
				xtype2 = cfg.xtype2;
			}

			items.push({
				id: id_new,
				disabled: cfg.disabled,
				readOnly: cfg.readOnly,
				xtype: xtype2,
				fieldLabel: cfg.label,
				width: 300,
				name: cfg.name_new,
				listeners: {
					scope: this,
					change: function() {
						Ext.getCmp(id_new).setFieldStyle({
						'border-color':'red'
						});
					}
				}
			});

		},this);

		
		this.btn_update = Ext.id();

		/***************************************************

		LEFT BUTTONS

		*/

		items.push({

			height: 100,
			xtype: 'panel',
			colspan: 2,
			border: false,
			layout: 'vbox',
			items: [{
				xtype: 'button',
				iconCls: 'xf_save',
				text: cfg.btn_new ?  cfg.btn_new : 'save as new crm contact (and assign to company)',
				scope: this,
				handler: function() {

					var ec_id = this.btn_update_latest_id;

					gui.mask('Updating contact infos ...');
					xframe.ajax({
						scope: this,
						url: xluerzer.getInstance().getAjaxPath('contacts/createNew/'+ec_id),
						params : {
							data: Ext.encode(gui.getForm().getValues()),
							companyId: Ext.getCmp(companyFieldId).getValue() 
						},
						stateless: function(success, json)
						{
							gui.unmask();
							if (!success) return;

							xframe.info('New Contact ',"contact: "+json.ec_id+" was created. contact panel opened.");
							xluerzer_contacts_detail.getInstance().open(json.ec_id);

							if (typeof cfg.callback == 'function')
							{
								cfg.callback.call(cfg.scope,json.ec_id);
							}

						}
					});



				}
			},{
				xtype: 'text',
				height: 10
			},{
				id: this.btn_update,
				disabled: true,
				xtype: 'button',
				iconCls: 'xf_update',
				text: cfg.btn_update ? cfg.btn_update : 'Update Database',
				scope: this,
				handler: function() {

					var ec_id = this.btn_update_latest_id;

					xframe.yn({
						title:'Update database record',
						msg: 'Do you really want to update the record ?',
						scope:this,
						handler: function(btn)
						{
							if (btn != 'yes') return;


							gui.mask('Updating contact infos ...');
							xframe.ajax({
								scope: this,
								url: xluerzer.getInstance().getAjaxPath('contacts/updateById/'+ec_id),
								params : {
									ec_id: ec_id,
									data: Ext.encode(gui.getForm().getValues())
								},
								stateless: function(success, json)
								{
									gui.unmask();
									if (!success) return;
									gui.getForm().setValues(json.contact);

									if (typeof cfg.callback == 'function')
									{
										cfg.callback.call(cfg.scope,ec_id);
									}

								}
							});



						}
					});

				}
			}]
		});


		/***************************************************

		RIGTH BUTTONS

		*/

		
		var buttons = {
			height: 100,
			xtype: 'panel',
			layout: 'vbox',
			border: false,
			items: [

			{
				border: false,
				xtype: 'panel',
				layout:'hbox',
				items:[
				{
					disabled: true,
					id: companyFieldId_create,
					xtype: 'button',
					iconCls: 'xf_add',
					text: 'create company',
					scope: this,
					handler: function() {




						xframe.yn({
							title:'create new database record',
							msg: 'do you really want to create a new company ?',
							scope:this,
							handler: function(btn)
							{
								if (btn != 'yes') return;


								var ec_id = this.btn_update_latest_id;
								gui.mask('Updating contact infos ...');
								xframe.ajax({
									scope: this,
									url: xluerzer.getInstance().getAjaxPath('contacts/createNew/'+ec_id),
									params : {
										data: Ext.encode(gui.getForm().getValues())
									},
									stateless: function(success, json)
									{
										gui.unmask();
										if (!success) return;

										xframe.info('New Company',"contact: "+json.ec_id+" was created. contact panel opened.");
										Ext.getCmp(companyFieldId).setValue(json.ec_id);

									}
								});




							}
						});







					}

				},{xtype:'text',width:10},{
					disabled: true,
					id: companyFieldId_load,
					xtype: 'button',
					iconCls: 'xf_search',
					text: 'load company',
					scope: this,
					handler: function() {






						this.search4contact({
							scope: this,
							callback: function(ec_id) {


								gui.mask('Loading contact infos ...');
								xframe.ajax({
									scope: this,
									url: xluerzer.getInstance().getAjaxPath('contacts/loadById/'+ec_id),
									params : {
										ec_id: ec_id
									},
									stateless: function(success, json)
									{
										gui.unmask();
										if (!success) return;


										if (json.contact.ec_type != "0") {
											xframe.alert("invalid contact","please select a company not a person");
											return;
										}

										Ext.getCmp(companyFieldId).setValue(ec_id);

									}
								});


							}
						});









					}
				}]
			},
			{
				xtype: 'text',
				height: 10
			},{
				xtype: 'button',
				text: 'load data from CRM',
				scope: this,
				iconCls: 'xf_search',
				handler: function() {
					this.search4contact({
						scope: this,
						callback: function(ec_id) {


							gui.mask('Loading contact infos ...');
							xframe.ajax({
								scope: this,
								url: xluerzer.getInstance().getAjaxPath('contacts/loadById/'+ec_id),
								params : {
									ec_id: ec_id
								},
								stateless: function(success, json)
								{
									gui.unmask();
									if (!success) return;

									Ext.each(newIds,function(idx){
										if (!Ext.getCmp(idx)) return;
										console.info(Ext.getCmp(idx));
										
										Ext.getCmp(idx).suspendEvent('change');
										Ext.getCmp(idx).setFieldStyle({
											'border-color':'#22aced'
										});
									},this);

									gui.getForm().setValues(json.contact);

									Ext.each(newIds,function(idx){
										Ext.getCmp(idx).resumeEvent('change');
									},this);


									Ext.getCmp(this.btn_update).setDisabled(false);
									Ext.getCmp(this.btn_update).setText((cfg.btn_update ? cfg.btn_update : 'Update Database') +' : <b>'+ec_id+"</b>");
									this.btn_update_latest_id = ec_id;
								}
							});


						}
					});
				}
			}]


		}

		items.push(buttons);

		/*******************************************************************************************************
		*******************************************************************************************************
		*******************************************************************************************************
		*/


		gui = Ext.widget({

			autoScroll: true,
			title: 'Submitter 2 Backend',
			xtype: 'form',
			defaultType: 'textfield',
			width: 800,
			defaults: {
				labelAlign : 'top',
				anchor: '100%'
			},
			layout: {
				type: 'table',
				columns: 3
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

		Ext.getCmp(companyOrPerson).on('change',function(c){
			var val = c.getValue();
			switch (val)
			{
				case '1':
				Ext.getCmp(companyFieldId_create).setDisabled(true);
				Ext.getCmp(companyFieldId_load).setDisabled(false);
				Ext.getCmp(companyFieldId).setDisabled(false);
				break;
				case '0':
				Ext.getCmp(companyFieldId_create).setDisabled(false);
				Ext.getCmp(companyFieldId_load).setDisabled(true);
				Ext.getCmp(companyFieldId).setDisabled(true);
				break;
			}
		},this);


		return gui;
	},

	search4contact: function(cfg) {

		var win = false;

		var gui = xluerzer_contacts.getInstance().open_search({
			scope: this,
			callback: function(ec_id) {
				win.close();
				cfg.callback.call(cfg.scope,ec_id);
			}
		});
		gui.title = "";

		win = Ext.create('Ext.window.Window', {
			modal: true,
			title: 'Search in Contacts',
			height: $$(window).height()*0.9,
			width: $$(window).width()*0.9,
			layout: 'fit',
			items: [gui]
		});

		win.show();
	},

	import_xCredit: function(esxc_id,callBackIfSaved)
	{

		var win = false;
		var fp = this.getSubmitter2backendPanel({

			btn_new: 'Save as new, and assign to submission',
			btn_update: 'Update record, and assign to submission',
			modex: 'xcredits',
			scope: this,
			callback : function(ec_id) {

				fp.mask('Upating Database ...');
				xframe.ajax({
					scope: this,
					url: xluerzer.getInstance().getAjaxPath('submissions/xcreditSavedPleasJoin/'+esxc_id),
					params : {
						esxc_id: esxc_id,
						ec_id: ec_id
					},
					stateless: function(success, json)
					{
						fp.unmask();

						if (typeof callBackIfSaved == "function") {
							callBackIfSaved();
						}

						if (!success) return;
						win.close();
					}
				});

			}

		});
		fp.title = false;

		win = Ext.create('Ext.window.Window', {
			title: 'Import Contact from Submission: '+esxc_id,
			modal: true,
			height: $$(window).height()*0.8,
			width: 700,
			layout: 'fit',
			items: [fp],
			/*
			tbar: [{
				text: 'Import & Assign to Submission',
				iconCls: 'xf_import',
				scope: this,
				handler: function() {

					fp.mask('Upating Database ...');
					xframe.ajax({
						scope: this,
						url: xluerzer.getInstance().getAjaxPath('submissions/save_xcredit/'+esxc_id),
						params : {
							esxc_id: esxc_id,
							data: Ext.encode(fp.getForm().getValues())
						},
						stateless: function(success, json)
						{
							fp.unmask();
							if (!success) return;
							fp.getForm().setValues(json.record);
							win.close();
							if (typeof callBackIfSaved == "function") {
								callBackIfSaved();
							}
						}
					});

				}
			}],
			*/
			listeners: {
				scope: this,
				afterrender: function(winx) {

					fp.mask('Loading Contact Details ...');
					xframe.ajax({
						scope: this,
						url: xluerzer.getInstance().getAjaxPath('submissions/load_xcredit/'+esxc_id),
						params : {
							esxc_id: esxc_id,
						},
						stateless: function(success, json)
						{
							fp.unmask();
							if (!success) return;
							
							
							var r2 = {}
							
							Ext.iterate(json.record,function(k,v){
								
								r2[k] = v;
								r2[k.split('esxc_').join('ec_')] = v;
								
							},this);
							
							fp.getForm().setValues(r2);
						}
					});

				}
			}
		});

		win.show();


















	},

	import_xCreditOld: function(esxc_id,callBackIfSaved)
	{


		var fp = Ext.widget({
			xtype: 'form',
			defaultType: 'textfield',
			bodyPadding: 20,
			items: [
			{
				readOnly: true,
				name: 'esxc_id',
				fieldLabel: 'ESXC_ID',
				value: esxc_id
			},
			{
				xtype: 'xluerzer_contact_type',
				name: 'esxc_contactType_id',
				fieldLabel: 'Contact Type'
			},
			{
				xtype: 'xluerzer_contact_type_company_or_person',
				name: 'esxc_type',
				fieldLabel: 'Company or Person'
			},
			{
				name: 'esxc_company',
				fieldLabel: 'Company Name'
			},
			{
				name: 'esxc_firstname',
				fieldLabel: 'First Name'
			},
			{
				name: 'esxc_lastname',
				fieldLabel: 'Last Name'
			},
			{
				noCopy: true,
				xtype2: 'xluerzer_country',
				xtype: 'xluerzer_shop_country',
				name: 'esxc_country_id',
				fieldLabel: 'Country'
			},
			{
				name: 'esxc_zip',
				fieldLabel: 'Zip'
			},
			{
				name: 'esxc_city',
				fieldLabel: 'City'
			},
			{
				name: 'esxc_phone_code',
				fieldLabel: 'Phone Code'
			},
			{
				name: 'esxc_phone',
				fieldLabel: 'Phone'
			},

			]
		});


		var win = Ext.create('Ext.window.Window', {
			title: 'Import Contact from Submission: '+esxc_id,
			modal: true,
			height: 400,
			width: 400,
			layout: 'fit',
			items: [fp],
			xbbar: [{
				text: 'Import & Assign to Submission',
				iconCls: 'xf_import',
				scope: this,
				handler: function() {

					fp.mask('Upating Database ...');
					xframe.ajax({
						scope: this,
						url: xluerzer.getInstance().getAjaxPath('submissions/save_xcredit/'+esxc_id),
						params : {
							esxc_id: esxc_id,
							data: Ext.encode(fp.getForm().getValues())
						},
						stateless: function(success, json)
						{
							fp.unmask();
							if (!success) return;
							fp.getForm().setValues(json.record);
							win.close();
							if (typeof callBackIfSaved == "function") {
								callBackIfSaved();
							}
						}
					});

				}
			}],
			listeners: {
				scope: this,
				afterrender: function(winx) {

					fp.mask('Loading Contact Details ...');
					xframe.ajax({
						scope: this,
						url: xluerzer.getInstance().getAjaxPath('submissions/load_xcredit/'+esxc_id),
						params : {
							esxc_id: esxc_id,
						},
						stateless: function(success, json)
						{
							fp.unmask();
							if (!success) return;
							fp.getForm().setValues(json.record);
						}
					});

				}
			}
		});

		win.show();

	},

}