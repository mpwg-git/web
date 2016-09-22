var xluerzer_contacts_load_from_contacts = (function() {
	var instance = null;
	return new function() {

		this.getInstance = function(config) {

			return new xluerzer_contacts_load_from_contacts_(config);

			return instance;
		}
	}
})();

var xluerzer_contacts_load_from_contacts_ = function(config) {
	this.config = config || {};
};

xluerzer_contacts_load_from_contacts_.prototype = {


	doIt: function(ec_id,fp_current_data)
	{
		var currentData = fp_current_data.getForm().getValues();
		var _currentData = {};
		var fp = this.getCopyPanel();

		Ext.iterate(currentData,function(k,v){
			var k2 = k.split('ec_').join('es_');
			_currentData[k2] = v;
		},this);
		
		
		console.info("_currentData",_currentData);


		var win = Ext.create('Ext.window.Window', {
			title: 'Merge Contact: ',
			modal: true,
			height: $$(window).height()*0.8,
			width: 700,
			layout: 'fit',
			items: [fp],
			listeners: {
				scope: this,
				afterrender: function(winx) {
					fp.getForm().setValues(_currentData);
				}
			},

			bbar: [
			'->',
			{
				iconCls: 'xf_save',
				text: 'Apply contact data',
				scope: this,
				handler: function() {
					fp_current_data.getForm().setValues(fp.getForm().getValues());
					win.close();
				}

			},'-',
			{

				iconCls: 'xf_search',
				text: 'Search contact',
				scope: this,
				handler: function() {



					xluerzer_contacts.getInstance().search4submissionPopUp({
						scope: this,
						callback: function(id) {
							var ec_id = parseInt(id,10);

							win.mask("Loading data ...");
							xframe.ajax({
								scope: this,
								url: xluerzer.getInstance().getAjaxPath('contactsDetail/details/load'),
								params : {
									ec_id: ec_id
								},
								stateless: function(success, json)
								{
									win.unmask();
									if (!success) return;
									delete(json.record.ec_id);
									fp.getForm().setValues(json.record);
								}
							});


						}
					});




				}

			}

			]
		});

		win.show();


	},


	getCopyPanel: function() {


		var companyOrPerson 		= Ext.id();
		var companyFieldId 			= Ext.id();
		var companyFieldId_load		= Ext.id();
		var companyFieldId_create 	= Ext.id();
		var gui = false;

		var fields = [
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
			name_old: 'es_street',
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
			xtype: 'xluerzer_country',
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
			name_old: 'es_web',
			name_new: 'ec_url'
		},
		];


		var items 	= [];
		var newIds 	= [];

		items.push({
			xtype: 'text',
			text: 'Current Data'
		});
		items.push({
			xtype: 'text'
		});
		items.push({
			xtype: 'text',
			text: 'Loaded Data',
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

				if (cfg.name_old == "esxc_id")
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
						Ext.getCmp(id_new).setFieldStyle({
						'border-color':'red'
						});
					}
				}
			});

		},this);


		this.btn_update = Ext.id();

		gui = Ext.widget({

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

}