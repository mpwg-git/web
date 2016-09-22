var xluerzer_profiles_fe_users = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_profiles_fe_users";
		}

		this.getInstance = function(config) {
			return new xluerzer_profiles_fe_users_(config);
			return instance;
		}
	}
})();

var xluerzer_profiles_fe_users_ = function(config) {
	this.config = config || {};
};

xluerzer_profiles_fe_users_.prototype = {


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
			name_old: 'feu_type',
			name_new: 'fep_type'
		},
		
		{
			label: 'Company',
			name_old: 'feu_company',
			name_new: 'fep_company'
		},
		{
			label: 'Firstname',
			name_old: 'feu_firstname',
			name_new: 'fep_firstname'
		},
		
		{
			label: 'Position',
			name_old: 'feu_position',
			name_new: 'fep_position'
		},
		{
			label: 'Branch',
			name_old: 'feu_branch',
			name_new: 'fep_branch'
		},
		
		
		
		{
			label: 'Lastname',
			name_old: 'feu_lastname',
			name_new: 'fep_lastname'
		},
		{
			label: 'Street',
			name_old: 'feu_address',
			name_new: 'fep_address'
		},
		{
			label: 'City',
			name_old: 'feu_city',
			name_new: 'fep_city'
		},
		{
			label: 'Zip',
			name_old: 'feu_zip',
			name_new: 'fep_zip'
		},
		{
			xtype: 'xluerzer_country',
			label: 'Country-ID',
			name_old: 'feu_country_id',
			name_new: 'fep_country_id'
		},
		{
			xtype: 'textfield',
			label: 'Country-Name',
			name_old: 'feu_country_name',
			name_new: ''
		},
		{
			label: 'Phone Code',
			name_old: 'feu_phone_code',
			name_new: 'fep_phone_code'
		},
		{
			label: 'Phone',
			name_old: 'feu_phone',
			name_new: 'fep_phone'
		},
		{
			label: 'Phone 2',
			name_old: 'feu_phone2',
			name_new: 'fep_phone2'
		},
		{
			label: 'Fax',
			name_old: 'feu_fax',
			name_new: 'fep_fax'
		},
		{
			label: 'Mail',
			name_old: 'feu_email',
			name_new: 'fep_email'
		},
		{
			label: 'Mail 2',
			name_old: 'feu_email2',
			name_new: 'fep_email2'
		},
		{
			label: 'Web',
			name_old: 'feu_url',
			name_new: 'fep_url'
		},

		{
			label: 'Facebook',
			name_old: 'feu_facebook',
			name_new: 'fep_facebook'
		},
		{
			label: 'Skype',
			name_old: 'feu_skype',
			name_new: 'fep_skype'
		},
		{
			label: 'LinkedIn',
			name_old: 'feu_linkedin',
			name_new: 'fep_linkedin'
		},
		{
			label: 'Twitter',
			name_old: 'feu_twitter',
			name_new: 'fep_twitter'
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
		{name:'feu_id', 		text:'CIC-ID',		width: 50, type: 'int'},
		{name:'feu_firstname',  text:'Firstname', 	type: 'string'},
		{name:'feu_lastname',	text:'Lastname', 	type: 'string'},
		{name:'feu_email',		text:'E-Mail',		type: 'string'},
		];

		this.grid_notsures = xframe_pattern.getInstance().genGrid({
			region:'west',
			forceFit:true,
			border:false,
			title: 'Fe-Users',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('feprofileimporter/grid_fe_users'),
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

		
		this.grid_notsures.on('afterrender',function(fx){
			fx.getStore().load();
		},this);


		this.grid_notsures.on('itemdblclick',function(t,record){

			var feu_id = record.data['feu_id'];
			this.feu_id = feu_id;
			
			this.grid_notsures_duplicates.setDisabled(false);
			this.grid_notsures_duplicates.getStore().proxy.extraParams['feu_id'] = feu_id;
			this.grid_notsures_duplicates.getStore().load();

			this.tab_notsure_detail.mask("Loading ...");
			xframe.ajax({
				scope: this,
				url: xluerzer.getInstance().getAjaxPath('feprofileimporter/loadFE'),
				params : {
					feu_id: feu_id
				},
				stateless: function(success, json)
				{
					this.tab_notsure_detail.unmask();
					if (!success) return;
					this.clearFields();
					this.tab_notsure_detail.getForm().reset();
					this.tab_notsure_detail.getForm().setValues(json.fe_user);
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
		{name:'fep_contact_id', 			text:'ID',			width: 50, type: 'int'},
		{name:'fep_type',		text:'Typ',			width: 100, type: 'string', renderer: tz},
		{name:'fep_is_credited',		text:'Credited',		width: 70, type: 'string'},
		{name:'fep_firstname',   text:'Firstname', 	type: 'string'},
		{name:'fep_lastname',	text:'Lastname', 	type: 'string'},
		{name:'fep_email',		text:'E-Mail',		type: 'string'},
		];

		this.grid_notsures_duplicates = xframe_pattern.getInstance().genGrid({
			region:'east',
			forceFit:true,
			border:false,
			
			title: 'Similar Contacts',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('feprofileimporter/grid_scontacts'),
				params: {
					cic_id : 0
				},
				pid: 	'fep_contact_id',
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

			var fep_contact_id 	= record.data['fep_contact_id'];
			this.fep_contact_id 	= fep_contact_id;

			this.tab_notsure_detail.mask("Loading ...");
			xframe.ajax({
				scope: this,
				url: xluerzer.getInstance().getAjaxPath('feprofileimporter/loadSimilar'),
				params : {
					fep_contact_id: fep_contact_id
				},
				stateless: function(success, json)
				{
					this.tab_notsure_detail.unmask();
					if (!success) return;
					this.tab_notsure_detail.getForm().setValues(json.profile);
					console.info("json.profile",json.profile);
					this.checkDiffs();
				}
			});


		},this);






		this.tab_notsure_detail = Ext.widget({
			title: 'Fe-User vs. Similar',
			region: 'center',
			xtype: 'panel',
			html: '-',
			//disabled: true
		});

		this.tab_notsure_detail = this.getCopyPanel();
		this.tab_notsure_detail.title = 'FE vs. Similar';
		this.tab_notsure_detail.tbar = [{
			iconCls: 'xf_import',
			text: 'link profile & fe-user',
			scope: this,
			handler: function()
			{

				if (!this.fep_contact_id)
				{
					xframe.alert("Error","No imported contact selected");
					return;
				}


				var formData = this.tab_notsure_detail.getForm().getValues();
				xframe.yn({
					title:'Confirm',
					msg: 'Do you really want to link FE-USER: <b>'+this.feu_id+'</b> with Profile-ID: <b>'+this.fep_contact_id+'</b> ?',
					scope:this,
					handler: function(btn)
					{
						if (btn != 'yes') return;

						var gui = this.tab_notsure_detail;
						gui.mask('processing ...');
						xframe.ajax({
							scope: this,
							url: xluerzer.getInstance().getAjaxPath('feprofileimporter/linkThem'),
							params : {
								feu_id: this.feu_id,
								fep_contact_id: this.fep_contact_id
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

			xtype: 'panel',
			region: 'center',
			layout: 'border',
			//disabled: true,
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
			title: 'Fe/Profiles Matcher',
			xtype: 'panel',
			layout: 'border',
			items: [

			this.getTab_notsure_center(),

			],
		});

		xluerzer.getInstance().showContent(this.gui);
	}


}