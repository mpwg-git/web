var xredaktor_manage_sites = (function() {
	var instance = null;
	return new function() {

		this.getTitle = function() {
			return "Projekte";
		}

		this.getInstance = function(config) {
			instance = new xredaktor_manage_sites_(config);
			return instance;
		}
	}
})();

var xredaktor_manage_sites_ = function(config) {
	this.config = config || {};
};

xredaktor_manage_sites_.prototype = {

	map2field : function(o)
	{

		var tmp = {
			fieldLabel: o.text,
			name: o.name,
			readOnly: (o.formMode == 'RO')
		};

		switch (o.type)
		{
			case 'string':
			tmp.xtype 			= "textfield";
			break;
			case 'int':
			tmp.xtype 			= "numberfield";
			tmp.allowDecimals 	= false;
			break;
			case 'xr_field_file':
			tmp.xtype 			= "xr_field_file";
			break;
			default:
			tmp.xtype 			= o.type;
			break;
		}


		if (!o.store)
		{
			return tmp;
		}

		var combo = {
			readOnly: (o.formMode == 'RO'),
			fieldLabel: o.text,
			name: o.name,
			xtype: 'combobox',
			typeAhead: true,
			triggerAction: 'all',
			selectOnTab: true,
			store: o.store,
			lazyRender: false,
			listClass: 'x-combo-list-small',
			listeners: {
				focus: function(cb)
				{
					cb.expand();
				}
			}
		};

		return combo;
	},


	getMainPanel : function()
	{
		var me = this;

		this.sites = xframe_pattern.getInstance().genGrid({
			region:'west',
			forceFit:true,
			border:false,
			title:xframe.lang('Projekte'),
			split: true,
			width: 200,
			button_add: true,
			button_del: true,
			collapseMode: 'mini',
			xstore: {
				load: 	xredaktor.getPath() + '/ajax/sites/load',
				update: xredaktor.getPath() + '/ajax/sites/update',
				insert: xredaktor.getPath() + '/ajax/sites/insert',
				move: 	xredaktor.getPath() + '/ajax/sites/move',
				remove: xredaktor.getPath() + '/ajax/sites/remove',
				pid: 	's_id',
				fields: [
				{name: 's_id',						text:xframe.lang('ID'),					type:'int', 	hidden: false, xgroup:[xframe.lang('Basic'),xframe.lang('Mail'),xframe.lang('Pages')], width: 50},
				{name: 's_name', 					text:xframe.lang('Projektname'),		type:'string',	hidden: false, editor: {xtype: 'textfield'}, xgroup:[xframe.lang('Basic'),xframe.lang('Mail')]},
				{name: 's_defaultSite', 			text:xframe.lang('Standardseite'),		type:'string', 	hidden: false, xtype: 'combo', store : [['Y',xframe.lang('Ja - Bei Unbekannter Domain')],['N',xframe.lang('Nein')]], xgroup:[xframe.lang('Basic'),xframe.lang('Mail')]},
				{name: 's_default_lang',			text:xframe.lang('Default-Sprache'),	type:'string',  hidden: true, editor: {xtype: 'textfield'}, xgroup:[xframe.lang('Basic')]},
				{name: 's_online', 					text:xframe.lang('Online'),				type:'string',  hidden: true, xtype: 'combo', store : [['Y',xframe.lang('Online')],['N',xframe.lang('Offline')]]},
				{name: 's_p_id', 					text:xframe.lang('Startpage'),			type:'int', 	hidden: true, editor: {xtype: 'numberfield',allowDecimals:false}, xgroup:[xframe.lang('Pages')]},
				{name: 's_error_p_id',				text:xframe.lang('Errorpage'),			type:'string',  hidden: true, editor: {xtype: 'numberfield',allowDecimals:false}, xgroup:[xframe.lang('Pages')]},
				{name: 's_maintenance_p_id', 		text:xframe.lang('Wartungsseite'),		type:'int', 	hidden: true, editor: {xtype: 'numberfield',allowDecimals:false}, xgroup:[xframe.lang('Pages')]},
				{name: 's_maintenance', 			text:xframe.lang('Wartungsmodus'),		type:'string',  hidden: true, xtype: 'combo', store : [['Y',xframe.lang('Aktiv')],['N',xframe.lang('Inaktiv')]], xgroup:[xframe.lang('Pages')]},
				{name: 's_redirectTLP', 			text:xframe.lang('Top Level Redirect'),	type:'string',  hidden: true, xtype: 'combo', store : [['Y',xframe.lang('Aktiv')],['N',xframe.lang('Inaktiv')]], xgroup:[xframe.lang('Basic')]},
				{name: 's_redirectTLP_domain',		text:xframe.lang('TLR-Domain'),			type:'string',  hidden: true, editor: {xtype: 'textfield'}, xgroup:[xframe.lang('Basic')]},
				{name: 's_s_storage_scope', 		text:xframe.lang('Storagegroup'),		type:'int',  	hidden: true, editor: {xtype: 'numberfield',allowDecimals:false}, xgroup:[xframe.lang('Basic')]},
				{name: 's_mail_from_name', 			text:xframe.lang('E-Mail Name'),		type:'string',  hidden: true, editor: {xtype: 'textfield'}, xgroup:[xframe.lang('Mail')]},
				{name: 's_mail_from_email', 		text:xframe.lang('E-Mail'),				type:'string',  hidden: true, editor: {xtype: 'textfield'}, xgroup:[xframe.lang('Mail')]},
				{name: 's_mail_smtp_server', 		text:xframe.lang('Smtp-Server'),		type:'string',  hidden: true, editor: {xtype: 'textfield'}, xgroup:[xframe.lang('Mail')]},
				{name: 's_mail_smtp_server_port', 	text:xframe.lang('Smtp-Port'),			type:'string',  hidden: true, editor: {xtype: 'numberfield',allowDecimals:false}, xgroup:[xframe.lang('Mail')]},
				{name: 's_mail_smtp_server_auth', 	text:xframe.lang('Smtp-Auth'),		type:'string',  hidden: true, xtype: 'combo', store : [['Y',xframe.lang('Ja')],['N',xframe.lang('Nein')]], xgroup:[xframe.lang('Mail')]},
				{name: 's_mail_smtp_user', 			text:xframe.lang('Smtp-User'),		type:'string',  hidden: true, editor: {xtype: 'textfield'}, xgroup:[xframe.lang('Mail')]},
				{name: 's_mail_smtp_pwd', 			text:xframe.lang('Smtp-Pwd'),		type:'string',  hidden: true, editor: {xtype: 'textfield'}, xgroup:[xframe.lang('Mail')]},
				{name: 's_suffix', 					text:xframe.lang('Suffix'),			type:'string', 	hidden: true, header: false},
				{name: 's_robots_txt', 										type:'string', 	hidden: true, header: false},
				{name: 's_humans_txt', 										type:'string', 	hidden: true, header: false}
				]
			}
		});

		this.domains = xframe_pattern.getInstance().genGrid({
			title:xframe.lang('Domains'),
			region:'center',
			forceFit:true,
			border:false,
			//split: true,
			button_add: true,
			button_del: true,
			//collapseMode: 'mini',
			xstore: {
				load: 	xredaktor.getPath() + '/ajax/domains/load',
				update: xredaktor.getPath() + '/ajax/domains/update',
				insert: xredaktor.getPath() + '/ajax/domains/insert',
				move: 	xredaktor.getPath() + '/ajax/domains/move',
				remove: xredaktor.getPath() + '/ajax/domains/remove',
				pid: 	'd_id',
				fields: [
				{name: 'd_id',				text:xframe.lang('Interne Nummer'),				type:'int', 	hidden: true},
				{name: 'd_name', 			text:xframe.lang('Name'),						type:'string',  editor: {allowBlank: false, xtype: 'textfield'}},
				{name: 'd_online', 			text:xframe.lang('Aktiv'),						type:'string',  xtype: 'combo', store : [['Y',xframe.lang('Online')],['N',xframe.lang('Offline')]]},
				{name: 'd_face_id', 		text:xframe.lang('Face ID'),						type:'int', 	editor: {xtype: 'numberfield',allowDecimals:false}}
				]
			}
		});

		this.forms_atoms = xframe_pattern.getInstance().genGrid({
			title:xframe.lang('Form Atoms'),
			region:'center',
			forceFit:true,
			border:false,
			//split: true,
			button_add: true,
			button_del: true,
			//collapseMode: 'mini',
			xstore: {
				load: 	xredaktor.getPath() + '/ajax/form_atoms/load',
				update: xredaktor.getPath() + '/ajax/form_atoms/update',
				insert: xredaktor.getPath() + '/ajax/form_atoms/insert',
				move: 	xredaktor.getPath() + '/ajax/form_atoms/move',
				remove: xredaktor.getPath() + '/ajax/form_atoms/remove',
				pid: 	'fm_id',

				initSort: '[{"property":"fm_type","direction":"ASC"}]',

				fields: [
				{name: 'fm_id',				text:xframe.lang('Interne Nummer'),				type:'int', 	hidden: true},
				{name: 'fm_type', 			text:xframe.lang('Type'),						type:'string',  editor: {allowBlank: false, xtype: 'textfield'}},
				{name: 'fm_a_id', 			text:xframe.lang('Atom ID'),					type:'int', 	editor: {xtype: 'numberfield',allowDecimals:false}},
				{name: 'fm_view_a_id', 			text:xframe.lang('View Atom ID'),					type:'int', 	editor: {xtype: 'numberfield',allowDecimals:false}},

				{name: 'fm_avail_fe', 			text:xframe.lang('FE'),					type:'string', 	xtype: 'combo', store : [['Y',xframe.lang('Verfügbar')],['N',xframe.lang('Ausgeblendet')]]},
				{name: 'fm_avail_be', 			text:xframe.lang('BE'),					type:'string', 	xtype: 'combo', store : [['Y',xframe.lang('Verfügbar')],['N',xframe.lang('Ausgeblendet')]]},


				]
			}
		});

		this.languages_fe = xframe_pattern.getInstance().genGrid({
			title:xframe.lang('FE-Sprachen'),
			region:'east',
			width:200,
			forceFit:true,
			border:false,
			//split: true,
			//collapseMode: 'mini',
			xstore: {
				load: 	xredaktor.getPath() + '/ajax/sites_lang_fe/load',
				update: xredaktor.getPath() + '/ajax/sites_lang_fe/update',
				insert: xredaktor.getPath() + '/ajax/sites_lang_fe/insert',
				move: 	xredaktor.getPath() + '/ajax/sites_lang_fe/move',
				pid: 	'sfl_id',
				fields: [
				{name: 'sfl_id',		text:xframe.lang('Interne Nummer'),	type:'int', 	hidden: true},
				{name: 'fel_name',		text:xframe.lang('Sprache'),			type:'string'},
				{name: 'sfl_online', 	text:xframe.lang('Aktiv'),			type:'string',  xtype: 'combo', store : [['Y',xframe.lang('Aktiv')],['N',xframe.lang('Inaktiv')]]}
				]
			}
		});

		this.languages_be = xframe_pattern.getInstance().genGrid({
			title:xframe.lang('BE-Sprachen'),
			region:'east',
			width:200,
			forceFit:true,
			border:false,
			//split: true,
			//collapseMode: 'mini',
			xstore: {
				load: 	xredaktor.getPath() + '/ajax/sites_lang_be/load',
				update: xredaktor.getPath() + '/ajax/sites_lang_be/update',
				insert: xredaktor.getPath() + '/ajax/sites_lang_be/insert',
				move: 	xredaktor.getPath() + '/ajax/sites_lang_be/move',
				pid: 	'sbl_id',
				fields: [
				{name: 'sbl_id',		text:xframe.lang('Interne Nummer'),		type:'int', 	hidden: true},
				{name: 'bel_name',		text:xframe.lang('Sprache'),			type:'string'},
				{name: 'sbl_online', 	text:xframe.lang('Aktiv'),				type:'string',  xtype: 'combo', store : [['Y',xframe.lang('Aktiv')],['N',xframe.lang('Inaktiv')]]}
				]
			}
		});

		this.languages_face = xframe_pattern.getInstance().genGrid({
			title:xframe.lang('Faces'),
			region:'east',
			width:200,
			forceFit:true,
			border:false,
			//split: true,
			//collapseMode: 'mini',
			xstore: {
				load: 	xredaktor.getPath() + '/ajax/sites_faces/load',
				update: xredaktor.getPath() + '/ajax/sites_faces/update',
				insert: xredaktor.getPath() + '/ajax/sites_faces/insert',
				move: 	xredaktor.getPath() + '/ajax/sites_faces/move',
				pid: 	'sf_id',
				fields: [
				{name: 'sf_id',			text:'Interne Nummer',	type:'int', 	hidden: false, width: 50},
				{name: 'f_name',		text:'Face',			type:'string'},
				{name: 'sf_online', 	text:'Aktiv',			type:'string',  xtype: 'combo', store : [['Y',xframe.lang('Aktiv')],['N',xframe.lang('Inaktiv')]]}
				]
			}
		});



		/*
		this.feUsersPanel = false;
		this.feUsersPanelWrapper = xredaktor_wizards.getInstance().genGuiFormOfRecordByVid({
		wz_vid:5000,
		formLoaded_scope: this,
		formLoaded_function: function(formPanel)
		{
		me.feUsersPanel = formPanel;
		}
		},{
		region:'north',
		layout:'fit',
		height: 300,
		html:'',
		title:xframe.lang('FE-USER Standard Konfiguration')
		});
		*/



		this.robots_txt = Ext.create('Ext.form.field.TextArea', {
			title: 'robots.txt'
		});

		this.humans_txt = Ext.create('Ext.form.field.TextArea', {
			title: 'humans.txt'
		});


		this.lates_r = false;
		this.latest_s_id = -1;
		this.robots = Ext.create('Ext.Panel', {
			layout:'fit',
			tbar:  [{
				scope: this,
				iconCls: 'xf_save',
				text : xframe.lang('Speichern'),
				handler: function()
				{
					var s_robots_txt = me.robots_txt.getValue();
					this.lates_r.set('s_robots_txt',s_robots_txt);

					var mask = xframe.mask(me.robots);
					xframe.ajax({
						scope: me,
						url: '/xgo/xplugs/xredaktor/ajax/sites/update',
						params : {
							s_id : me.latest_s_id,
							s_robots_txt : s_robots_txt
						},
						stateless: function(json)
						{
							mask.hide();
						}
					});

				}
			}],
			disabled:true,
			title:'robots.txt',
			items: [this.robots_txt]
		});


		this.lates_h = false;
		this.humans = Ext.create('Ext.Panel', {
			layout:'fit',
			tbar:  [{
				scope: this,
				text : xframe.lang('Speichern'),
				iconCls: 'xf_save',
				handler: function()
				{
					var s_humans_txt = me.humans_txt.getValue();
					this.lates_h.set('s_humans_txt',s_humans_txt);

					var mask = xframe.mask(me.humans);
					xframe.ajax({
						scope: me,
						url: '/xgo/xplugs/xredaktor/ajax/sites/update',
						params : {
							s_id : me.latest_s_id,
							s_humans_txt : s_humans_txt
						},
						stateless: function(json)
						{
							mask.hide();
						}
					});

				}
			}],
			disabled:true,
			title:'humans.txt',
			items: [this.humans_txt]
		});


		var fields = [
		{fs: 'A',  	name: 's_online',					text:xframe.lang('Online')				, type: 'string', xtype: 'renderer', store : [['N',xframe.lang('Offline')],['Y',xframe.lang('Online')]]},
		{fs: 'A',	name: 's_p_id',						text:xframe.lang('Startpage')			, type: 'xr_field_page'},
		{fs: 'A',	name: 's_error_p_id',				text:xframe.lang('Errorpage')			, type: 'xr_field_page'},
		{fs: 'A',  	name: 's_p_id_outofdate',			text:xframe.lang('Out-Of-Date')			, type: 'int'},

		{fs: 'A',  	name: 's_p_forms',					text:xframe.lang('Forms')				, type: 'xr_field_page'},
		{fs: 'A',  	name: 's_p_id_mobile',				text:xframe.lang('Mobile-Startseite')	, type: 'xr_field_page'},

		{fs: 'A',  	name: 's_default_img_s_id',			text:xframe.lang('Default Image')		, type: 'xr_field_file'},
		{fs: 'A',  	name: 's_favico_s_id',				text:xframe.lang('Favicon')				, type: 'xr_field_file'},

		{fs: 'B',	name: 's_redirectTLP',				text:xframe.lang('Top Level Redirect')	, type:	'string', xtype: 'renderer', store : [['Y',xframe.lang('Ja - Bei Unbekannter Domain')],['N',xframe.lang('Nein')]]},
		{fs: 'B', 	name: 's_redirectTLP_domain',		text:xframe.lang('TLR-Domain')			, type:	'string'},

		{fs: 'C', 	name: 's_mail_from_name',			text:xframe.lang('E-Mail Name')			, type:	'string'},
		{fs: 'C',	name: 's_mail_from_email',			text:xframe.lang('E-Mail')				, type:	'string'},
		{fs: 'C',	name: 's_mail_smtp_server',			text:xframe.lang('Smtp-Server')			, type:	'string'},
		{fs: 'C',	name: 's_mail_smtp_server_port',	text:xframe.lang('Smtp-Server-Port')	, type:	'int'},
		{fs: 'C',	name: 's_mail_smtp_server_auth',	text:xframe.lang('Smtp-Server-Auth')	, xtype: 'renderer', store : [['N',xframe.lang('Nein')],['Y',xframe.lang('Ja')]]},
		{fs: 'C',	name: 's_mail_smtp_user',			text:xframe.lang('Smtp-User')			, type:	'string'},
		{fs: 'C',	name: 's_mail_smtp_pwd',			text:xframe.lang('Smtp-Pwd')			, type:	'string'},
		{fs: 'D', 	name: 's_s_storage_scope',			text:xframe.lang('Storagegroup')		, type:	'int'},
		{fs: 'E', 	name: 's_suffix',					text:xframe.lang('URL')					, type:	'string'},
		{fs: 'F', 	name: 's_default_lang',				text:xframe.lang('Startsprache')		, type:	'string'}

		];

		var me = this;
		var fs = {
		'A' : xframe.lang('Allgemein'),
		'B' : xframe.lang('Redirects'),
		'C' : xframe.lang('E-Mails'),
		'D' : xframe.lang('Storage Group'),
		'E' : xframe.lang('URL - Einstellungen'),
		'F' : xframe.lang('Sprach - Einstellungen')
		};

		var items 	= [];
		var groups 	= {};

		Ext.each(fields,function(r){
			if (!groups[r.fs]) groups[r.fs] = [];
			groups[r.fs].push(this.map2field(r));
		},this);

		Ext.iterate(groups,function(k,v){
			items.push({
				xtype: 'fieldset',
				defaultType: 'textfield',
				defaults: {
					anchor: '100%'
				},
				title: fs[k],
				items: v
			});
		},this);

		this.basicConfig = Ext.create('Ext.form.Panel', {
			frame: false,
			region: 'center',
			title: xframe.lang('Einstellungen'),
			bodyStyle:'padding:5px 5px 0',
			width: 350,
			autoScroll: true,
			fieldDefaults: {
				msgTarget: 'side'
				//,labelWidth: 150
			},
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},
			items: items,
			tbar: [{
				iconCls: 'xf_save',
				scope: this,
				text: xframe.lang('Speichern'),
				handler: function(){
					var update 	= this.basicConfig.getForm().getValues();
					update.s_id = this.latest_s_id;

					xframe.ajax({
						scope: me,
						url: "/xgo/xplugs/xredaktor/ajax/sites/updateMany",
						params : update,
						success: function(fulldata) {
						},
						stateless: function(json)
						{
						}
					});
				}
			}]
		});

		this.sitesWrapper = Ext.create('Ext.tab.Panel', {
			border:false,
			region:'center',
			disabled:true,
			items: [this.basicConfig,this.domains,this.languages_fe,this.languages_face,this.forms_atoms,this.robots,this.humans,this.getCSSPanel()]
		});

		this.sites.on('selectionchange',function(v,sel){
			this.latest_s_id = -1;
			this.sitesWrapper.setDisabled(sel.length != 1);
			if (sel.length == 0) return;
			var s_id = sel[0].data.s_id;
			this.latest_s_id = s_id;
			xframe.guiSetParams({s_id:s_id},[this.domains,this.languages_fe,this.languages_be,this.languages_face,this.forms_atoms],true);

			/*
			if (me.feUsersPanel)
			{
			//me.feUsersPanel.loadRecordById(s_id,xredaktor_wizards.TITLE_HIDE,xredaktor_wizards.RECORD_AUTO_INSERT);
			me.feUsersPanel.loadRecordByConfig({wz_SITE_ID:s_id},xredaktor_wizards.TITLE_HIDE,xredaktor_wizards.RECORD_AUTO_INSERT);
			}
			*/

			if (sel.length > 1)
			{
				this.robots.setDisabled(true);
				this.humans.setDisabled(true);
				this.panel_css.setDisabled(true);
			} else
			{
				this.panel_css.setDisabled(false);
				this.humans.setDisabled(false);
				this.robots.setDisabled(false);
				this.lates_r = sel[0];
				this.lates_h = sel[0];
				me.robots_txt.setValue(sel[0].data.s_robots_txt);
				me.humans_txt.setValue(sel[0].data.s_humans_txt);

				this.basicConfig.setDisabled(true);
				xframe.ajax({
					url: '/xgo/xplugs/xredaktor/ajax/sites/loadx',
					params: {s_id:this.latest_s_id},
					success: function(d) {
						me.basicConfig.getForm().setValues(d.d);
						me.basicConfig.setDisabled(false);
					},
					failure: function() {
					}
				});

			}

		},this,{delay:1});



		var gui = Ext.create('Ext.Panel',{
			border:false,
			layout:'border',
			items:[this.sites,this.sitesWrapper],
			listeners: {
				afterrender:function()
				{
					me.sites.getStore().load();

				}
			}
		});

		gui.on('afterrender',function(){
			this.sites.setWidth(200);
		},this);

		//return this.feUsersPanelWrapper;

		return gui;
	},

	getCSSPanel : function()
	{
		var me = this;
		var fields = [
		{name: 'v', text:xframe.lang('Css-Klassenname'),		type:'string', editor: {
			allowBlank: false,
			xtype: 'textfield'
		}},
		{name: 'g', text:xframe.lang('Beschreibung'),	type:'string', editor: {
			allowBlank: false,
			xtype: 'textfield'
		}}];

		var langs = xredaktor.getInstance().getLFE();

		Ext.each(langs,function(s){
			var iso = s.fel_ISO;
			fields.push({name: iso.toUpperCase(), text:xframe.lang('Beschreibung ')+iso,	type:'string',  editor: {
				allowBlank: false,
				xtype: 'textfield'
			}});
		});

		var autocheckId = Ext.id();
		var as_config = "";

		this.editorCss_classes = xframe_pattern.getInstance().genMatrix({
			title: xframe.lang('CSS-Klassen'),
			data: xredaktor_atoms_settings.getInstance().checkLinearAssozDataArray(as_config)['l'],
			toolbar_bottom : [{
				xtype:'label',
				id: autocheckId,
				html:xframe.lang('Eingabenkontrolle: <b>noch nicht ausgeführt.</b>')
			}],
			auto_flush: {
				scope: me,
				handler: function(oldCfg,newCfg)
				{
					Ext.getCmp(autocheckId).setText(xframe.lang('Überprüfe Eingabe ...'));

					var doubles 		= {};
					var errorDoubles 	= false;
					var errorEmpty 		= false;
					var errorEmptyV		= false;

					Ext.each(newCfg,function(i){
						var key = i.v;

						if (typeof doubles[key] == 'undefined') {
							doubles[key] = 1;
						}
						else
						{
							errorDoubles = true;
						}

						if (i['v'] == "")
						{
							errorEmptyV = true;
						}

						var checkValues = "";

						Ext.iterate(i,function(k,v){
							if (k == 'v') return;
							checkValues += v;
						},this);

						if (checkValues == "") errorEmpty = true;
					},this);

					if (errorDoubles)
					{
						Ext.getCmp(autocheckId).setText(xframe.lang('Achtung: <b>Die Matrix beinhaltet min. 2 gleiche Werte, dies kann zu fehlern führen.</b> '),false);
					} else
					{
						Ext.getCmp(autocheckId).setText(xframe.lang('Eingabenkontrolle: Keine Fehler gefunden.'));
					}
					if (errorEmpty)
					{
						Ext.getCmp(autocheckId).setText(xframe.lang('Achtung: <b>Die Matrix beinhaltet min. einen Datensatz dessen "Beschreibung" nicht eingegeben wurde.</b> '),false);
					}
					if (errorEmptyV)
					{
						Ext.getCmp(autocheckId).setText(xframe.lang('Achtung: <b>Die Matrix beinhaltet min. einen Datensatz dessen Wert wurde nicht eingegeben wurde.</b> '),false);
					}

				}
			},
			tools: false,
			autoDestroyStore:false,
			forceFit:true,
			plugin_numLines: true,
			button_add: true,
			button_del: true,
			xstore: {
				pid: 	'v',
				fields: fields
			}
		});

		this.editorCss_source = Ext.create('Ext.form.field.TextArea', {
			title: xframe.lang('CSS-SOURCE-CODE'),
			value: ''
		});

		this.panel_css = Ext.create('Ext.tab.Panel', {
			title: xframe.lang('HTML-EDITOR Konfiguration'),
			layout:'fit',
			tbar:  [{
				scope: this,
				iconCls: 'xf_save',
				text : xframe.lang('Speichern'),
				handler: function()
				{

					var dataArray 	= [];
					var store 		= me.editorCss_classes.getStore();

					store.each(function(r){
						var rec = [];
						Ext.each(fields,function(o){
							rec.push(r.data[o.name]);
						});
						dataArray.push(rec);
					},this);

					var fixed 	= xredaktor_atoms_settings.getInstance().rebuildAssozDataForLinAssozDataArray(dataArray);
					var params 	= {
						css_source: 	me.editorCss_source.getValue(),
						css_classes: 	Ext.encode(fixed),
						s_id: 			me.latest_s_id
					};

					xframe.ajax({
						url: '/xgo/xplugs/xredaktor/ajax/sites/updateCssConfig',
						params: params,
						success: function() {
						},
						failure: function() {
						}
					});

				}
			}],
			disabled: true,
			items: [this.editorCss_classes,this.editorCss_source]
		});

		var last_s_id = -1;

		this.panel_css.on('activate',function(){

			if (last_s_id == me.latest_s_id) return;
			last_s_id = me.latest_s_id;

			var plain = Ext.decode(this.lates_r.raw.s_html_editor,true);

			if (!plain) plain = {
				css_source : '',
				css_classes : ''
			};

			if (typeof plain.css_source 	== "undefined") plain.css_source 	= "";
			if (typeof plain.css_classes 	== "undefined") plain.css_classes 	= "";


			var d = xredaktor_atoms_settings.getInstance().checkLinearAssozDataArray(Ext.encode(plain.css_classes))['l'];

			if (d) {
				this.editorCss_classes.getStore().loadData(d);
				this.editorCss_source.setValue(plain.css_source);
			}

		},this);


		return this.panel_css;

	}
};