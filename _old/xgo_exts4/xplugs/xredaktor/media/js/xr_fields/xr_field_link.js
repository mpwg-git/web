Ext.define('Ext.xr.field_link', {




	extend: 'Ext.form.FieldContainer',
	alias: 'widget.xr_field_link',
	config: {
	},


	getDefaultTargets: function() {
		var targets 	= [['_self','Selbe Seite'],['_blank','Neue Seite'],['_top','Top-Frame']];
		return targets;
	},

	getDefaultTargetCombo: function(name,value) {

		if (typeof value == "undefined") value = "_top";

		//var combo = Ext.create('Ext.form.ComboBox', );
		var combo = {
			fieldLabel: 'Target',
			name: name,
			xtype: 'combobox',
			typeAhead: true,
			triggerAction: 'all',
			selectOnTab: true,
			value: value,
			store: this.getDefaultTargets()
		};
		return combo;
	},


	getPanel_page: function() {

		var gui = Ext.create('Ext.form.Panel', {
			title: 'Internal Page',
			bodyPadding: 5,

			height: 110,
			xr_link_type: 'page',

			layout: 'anchor',
			defaults: {
				anchor: '100%',
				labelAlign: 'left'
			},
			defaultType: 'textfield',
			items: [{
				fieldLabel: 'Page',
				name: 'p_id',
				xtype:'xr_field_page'
			},{
				fieldLabel: 'Manual title',
				name: 'p_title',
			},this.getDefaultTargetCombo('p_target')],
		});

		return gui;
	},

	getPanel_media: function() {

		var gui = Ext.create('Ext.form.Panel', {
			title: 'Media',
			bodyPadding: 5,

			height: 187,
			xr_link_type: 'media',

			layout: 'vbox',
			defaults: {
			},
			defaultType: 'textfield',
			items: [{
				fieldLabel: '',
				name: 'm_s_id',
				xtype: 'xr_field_file',
				width: 450
			},{
				xtype: 'splitter',
				width: 10
			},{
				flex: 1,
				xtype: 'panel',
				border: false,
				layout: 'anchor',
				defaults: {
					anchor: '100%'
				},
				items: [this.getDefaultTargetCombo('m_target')]
			}]
		});

		return gui;
	},

	getPanel_external: function() {

		var gui = Ext.create('Ext.form.Panel', {
			title: 'External URL',
			bodyPadding: 5,

			height: 110,
			xr_link_type: 'external',

			layout: 'anchor',
			defaults: {
				anchor: '100%',
				labelAlign: 'left'
			},
			defaultType: 'textfield',
			items: [{
				fieldLabel: 'URL',
				name: 'ext_url'
			},{
				fieldLabel: 'Title',
				name: 'ext_title',
			},this.getDefaultTargetCombo('ext_target')],
		});

		return gui;

	},

	getPanel_email: function() {

		var gui = Ext.create('Ext.form.Panel', {
			title: 'E-Mail',
			bodyPadding: 5,

			height: 326,
			xr_link_type: 'email',

			layout: 'anchor',
			defaults: {
				anchor: '100%',
				labelAlign: 'left'
			},
			defaultType: 'textfield',
			items: [{
				fieldLabel: 'Subject',
				name: 'email_subject'
			},{
				fieldLabel: 'E-Mail (TO)',
				name: 'email_to'
			},{
				fieldLabel: 'E-Mail (CC)',
				name: 'email_cc'
			},{
				fieldLabel: 'Message',
				name: 'email_content',
				xtype: 'textarea',
				height: 200
			}],
		});

		return gui;

	},

	getPanel_tel: function() {

		var gui = Ext.create('Ext.form.Panel', {
			title: 'Telefon',
			bodyPadding: 5,

			height: 110,
			xr_link_type: 'tel',

			layout: 'anchor',
			defaults: {
				anchor: '100%',
				labelAlign: 'left'
			},
			defaultType: 'textfield',
			items: [{
				fieldLabel: 'Telephone number',
				name: 'tel_number'
			},{
				fieldLabel: 'Titel',
				name: 'tel_title',
			},this.getDefaultTargetCombo('tel_target')],
		});

		return gui;

	},

	getPanel_lightbox: function() {

		var gui = Ext.create('Ext.form.Panel', {
			title: 'Lightbox',
			bodyPadding: 5,

			height: 262,
			xr_link_type: 'lightbox',

			layout: 'anchor',
			defaults: {
				anchor: '100%',
				labelAlign: 'left'
			},
			defaultType: 'textfield',
			items: [{
				fieldLabel: 'Title',
				name: 'lb_title'
			},{
				fieldLabel: 'Html',
				name: 'lb_html',
				xtype: 'xr_field_html',
				height: 200
			}],
		});

		return gui;


	},

	getPanel_infopool: function() {


		var gui = Ext.create('Ext.form.Panel', {
			title: 'Infopool-Record',
			bodyPadding: 5,

			height: 115,
			xr_link_type: 'infopool',

			layout: 'anchor',
			defaults: {
				anchor: '100%',
				labelAlign: 'left'
			},
			defaultType: 'textfield',
			items: [{
				fieldLabel: '',
				name: 'infopool_pair',
				xtype: 'xr_field_infopool_record'
			}],
		});

		return gui;

	},

	getSelectionHeight: function(items,sel) {
		var panel = items[sel];
		return panel.height;
	},

	handleChangeEvent: function() {
		this.updateValues();
	},

	updateSettings: function() {

		var finalTab 	= this.tabPanel.getActiveTab();
		var config  = {
			sel: finalTab.xr_link_type,
			cfg: {}
		};

		Ext.each(this.tab_items,function(form){
			var data = form.getForm().getValues();
			config['cfg'][form.xr_link_type] = data;
		},this);


		var newValue = Base64.encode(Ext.encode(config));
		var oldValue = this.hiddenX.getValue();


		this.hiddenX.suspendEvents();
		this.hiddenX.setValue(newValue);
		this.hiddenX.resumeEvents();

		if (newValue != oldValue) {
			this.fireEvent('change',this,newValue);
		}

		console.info("update",config);


	},

	getValue: function() {
		//console.info('getValue');
		this.updateSettings();
		return this.hiddenX.getValue();
	},

	setValue: function(value) {
		this.updateSettings();
		this.hiddenX.setValue(value);
	},


	getSubmitValue: function(){
		//console.info('getSubmitValue');
		this.updateSettings();
		return this.hiddenX.getValue();
	},

	updateValues: function()
	{
		var config = this.hiddenX.getValue();
		if (config != "") {
			var config = Ext.decode(Base64.decode(config),true);
			if (config)
			{
				if (config.sel) {
					var tab2type = {};
					Ext.each(this.tab_items,function(form){
						tab2type[form.xr_link_type] = form;
					},this);
					Ext.iterate(config.cfg,function(type,settings){
						if (!tab2type[type]) return;
						var form = tab2type[type];
						form.getForm().setValues(settings);
					},this);
				}
			}
		}
	},

	initTabs: function() {


		Ext.each(this.tab_items,function(form){
			Ext.each(form.items.items,function(field){

				if (field.xtype=='panel') {
					Ext.each(field.items.items,function(field){
						if (!field.name) return;
						field.on('change',function(){
							this.updateSettings();
						},this);
					},this);
					return; // DEEPER CHILDS....
				}

				if (!field.name) return;

				field.on('change',function(){
					this.updateSettings();
				},this);
			},this);

		},this);

		this.updateValues();
		try{
			this.tabPanel.setDisabled(false);
		} catch(e) {}
	},

	combatOldValues:function(value)
	{
		var settings = Ext.decode(value,true);
		console.info('lade',value,settings);
		if (!settings) return value;


		if ((!settings.choose) && (!settings.type)) return value;

		// INFOPOOL
		if (!settings.choose) {

			var target 		= settings['target'];
			var title 		= settings['title'];

			var fixed		= {
				sel: "",
				cfg: {
					email:{},
					external:{},
					infopool:{},
					media:{},
					page:{}
				}
			};

			if (settings.type == 'external')
			{
				fixed['sel'] = 'external';
				fixed['cfg']['external'] = {
					ext_url: settings['external'],
					ext_title: title,
					ext_target: target
				};
			} else {
				internal = parseInt(settings['internal'],10);
				if (internal == 0) return '';
				fixed['sel'] = 'page';
				fixed['cfg']['page'] = {
					p_id: settings['internal'],
					p_title: title,
					p_target: target
				};
			}

			console.info("FIXED-URL-GEN1",fixed);
			return 	Base64.encode(Ext.encode(fixed));
		}

		// HTML-EDITOR OLD
		if (settings.choose)
		{

			var fixed		= {
				sel: "",
				cfg: {
					email:{},
					external:{},
					infopool:{},
					media:{},
					page:{}
				}
			};


			switch (settings['choose'])
			{
				case 'EMAIL':
				fixed['sel'] = 'email';
				fixed['cfg']['email'] = {
					email_subject: settings['email_subject'],
					email_to: settings['email_to'],
					email_cc: settings['email_cc'],
					email_content: settings['email_body']
				};
				return 	Base64.encode(Ext.encode(fixed));


				case 'FA':
				fixed['sel'] = 'media';
				fixed['cfg']['media'] = {
					m_s_id: parseInt(settings['filearchiv'],10),
					m_target: '_blank'
				};
				return 	Base64.encode(Ext.encode(fixed));



				case 'LINK':
				default:

				var target 		= settings['target'];
				var title 		= settings['title'];

				var fixed		= {
					sel: "",
					cfg: {
						email:{},
						external:{},
						infopool:{},
						media:{},
						page:{}
					}
				};

				if (settings.type == 'external')
				{
					fixed['sel'] = 'external';
					fixed['cfg']['external'] = {
						ext_url: settings['external'],
						ext_title: title,
						ext_target: target
					};
				} else {
					internal = parseInt(settings['internal'],10);
					if (internal == 0) return '';
					fixed['sel'] = 'page';
					fixed['cfg']['page'] = {
						p_id: settings['internal'],
						p_title: title,
						p_target: target
					};
				}

				console.info("FIXED-URL-GEN2",fixed);
				return 	Base64.encode(Ext.encode(fixed));
			}
		}

		return ''; // something wrong here ;D

	},



	constructor:function(cnfg){

		if (!cnfg.value) cnfg.value = "";
		cnfg.value = this.combatOldValues(cnfg.value);

		var me 			= this;
		this.tabPanelId = Ext.id();
		this.rawConfig 	= cnfg;


		this.callParent(arguments);
		this.initConfig(cnfg);

		this.hiddenX = Ext.create('Ext.form.field.Hidden',{
			name: cnfg.name,
			value: cnfg.value,
			listeners: {
				scope: this,
				change: this.handleChangeEvent
			}
		});


		var items = [];

		items.push(this.getPanel_external());
		items.push(this.getPanel_page());
		//items.push(this.getPanel_media());
		items.push(this.getPanel_email());
		//items.push(this.getPanel_tel());
		//items.push(this.getPanel_lightbox());
		items.push(this.getPanel_infopool());

		this.tab_items = items;

		var selectionTab = 0;

		var config = Ext.decode(Base64.decode(cnfg.value),true);
		if (config)
		{
			//console.info('config',config);
			if (config.sel) {
				Ext.each(this.tab_items,function(form,i){
					if (form.xr_link_type == config.sel) selectionTab = i;
				},this);
			}
		}

		this.tabPanel = Ext.create('Ext.tab.Panel', {
			activeTab: selectionTab,
			plain: true,
			disabled: true,
			height: this.getSelectionHeight(items,selectionTab),
			items: items,
			listeners: {
				scope: this,
				buffer: 0,
				tabchange: function(tp,newCard) {
					var h = newCard.height;
					tp.setHeight(h);
					this.updateSettings();
				},
				afterrender: function() {
					Ext.defer(this.initTabs,100,this);
				}
			}
		});

		this.add(this.hiddenX);
		this.add(this.tabPanel);

	}



});
