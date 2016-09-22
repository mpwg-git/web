var xredaktor_atoms = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xredaktor_atoms_(config);
			}
			return instance;
		}
	}
})();

var xredaktor_atoms_ = function(config) {
	this.config = config || {};
};

xredaktor_atoms_.prototype = {


	getStoreOfAtoms : function(rootTextName,a_type,s_id)
	{

		if (typeof s_id == "undefined") s_id = xredaktor.getInstance().getCurrentSiteId();

		var store = xframe.getStoreByConfig({
			rootTextName: rootTextName,
			fields: [
			{name: 'a_name',	type:'string', folder: true},
			{name: 'a_id',		type:'int'}
			],
			xstore: {
				params : {
					a_s_id : s_id,
					a_type : a_type,
					gui_mode : 'NONE'
				},
				load: 	'/xgo/xplugs/xredaktor/ajax/atoms/load',
				update: '/xgo/xplugs/xredaktor/ajax/atoms/update',
				insert: '/xgo/xplugs/xredaktor/ajax/atoms/insert',
				remove: '/xgo/xplugs/xredaktor/ajax/atoms/remove',
				move: 	'/xgo/xplugs/xredaktor/ajax/atoms/move',
				pid: 		'a_id',
				nameField:	'a_name'
			}
		});

		return store;
	},

	srcEditor: function(cfg) {

		var me = this;
		if (typeof this.zendis == 'undefined') this.zendis = {};





		var gui = Ext.create('Ext.Component', {
			html: ''
		});



		gui.on('afterrender',function(ta){

			ta.srcEditor = ace.edit(ta.el.id);
			ta.srcEditor.setTheme("ace/theme/chrome");
			ta.srcEditor.getSession().setMode("ace/mode/html");


			ta.srcEditor.commands.addCommand({
				name: "save",
				bindKey: {win: "Ctrl-S", mac: "Command-S"},
				exec: function(editor) {
					me.saveContent.call(me,cfg.f_id);
				}
			})

			ta.srcEditor.commands.addCommand({
				name: "reload",
				bindKey: {win: "Ctrl-R", mac: "Command-R"},
				exec: function(editor) {
					me.loadAtomById.call(me,me.currentAtomId);
				}
			})

			if (typeof this.zendis[cfg.f_id] == "string")
			{
				ta.srcEditor.setValue(me.zendis[cfg.f_id],-1);
			}

			this.zendis[cfg.f_id] = ta.srcEditor;

		},this, {buffer:10});


		var wrapper = Ext.create('Ext.panel.Panel', {
			layout: 'fit',
			title: cfg.f_name,
			items: gui,
			tbar: [{
				scope: this,
				iconCls: 'xf_save',
				text: 'Speichern',
				handler: function() {
					me.saveContent.call(me,cfg.f_id);
				}
			},{
				scope: this,
				iconCls: 'xf_reload',
				text: 'Reload',
				handler: function() {
					this.loadAtomById(this.currentAtomId);
				}
			}]
		});

		return wrapper;
	},

	setSrcEditors: function(atom)
	{
		try {
			this.zendis[0].setValue(atom.a_content,-1);
		} catch (e) {
			this.zendis[0] = atom.a_content;
		}

		Ext.each(xredaktor.getInstance().masterCfg.faces,function(c){

			var f_id = c.f_id;
			var c = atom['a_content_'+f_id];

			try {
				this.zendis[f_id].setValue(c,-1);
			} catch (e) {
				this.zendis[f_id] = c;
			}

		},this);

		console.info(this.zendis);

	},


	initSrcEditors: function() {

		var ret = [];

		ret.push(this.srcEditor({
			f_id: 	'0',
			f_name: '[default]'
		}));

		Ext.each(xredaktor.getInstance().masterCfg.faces,function(c){

			ret.push(this.srcEditor({
				f_id: 	c.f_id,
				f_name: c.f_name
			}));

		},this);

		return ret;
	},



	getMainPanel : function(a_type, s_id)
	{
		if (typeof s_id == 'undefined') 	s_id 	= "-1";
		if (typeof a_type == 'undefined') 	a_type 	= "ATOM";

		var me 					= this;
		var title 				= "";
		var titleSel			= "";
		var title2				= "";
		var txt_new				= "";
		var loadAtomById		= function(){};
		var cookieName 			= 'xr_'+a_type+'_last_sel_'+xredaktor.getInstance().getCurrentSiteId();

		var virtualIdSupport 	= false;
		var showWizardSettings 	= false;

		if (s_id == 0) virtualIdSupport = true;

		switch(a_type)
		{
			case 'ATOM':
			titleSel= "B";
			title 	= "Bausteine";
			title2 	= "Name des Bauststeins";
			txt_new	= "Name des Bauststeins";
			iconsPrefix = "xr_atoms";
			startTab	= 1;
			break;
			case 'FRAME':
			titleSel= "SB";
			title 	= "Seitenelement";
			title2 	= "Name des Seitenelements";
			txt_new	= "Name des Seitenelements";
			iconsPrefix = "xr_frames";
			startTab	= 1;
			break;
			case 'WIZARD':
			titleSel= "WZ";
			title 	= "Wizards";
			title2 	= "Name des Wizards";
			txt_new	= "Name des Wizards";
			iconsPrefix = "xr_wizards";
			showWizardSettings = true;
			startTab	= 0;
			break;
			default:
			title = "Unbekannter ATOM-TYP";
			break;
		}

		try {
			startTab = parseInt(Ext.util.Cookies.get('STORE_ACTIVE_PANEL_CONF_'+a_type),10);
		}catch(e){}

		this.currentAtomId 		= -1;
		this.configPanel 		= xredaktor_atoms_settings.getInstance().getMainPanel(0,a_type);
		this.saveContent = function(f_id)
		{

			var params = {
				a_id: 		this.currentAtomId,
				f_id: 		f_id,
				content: 	this.zendis[f_id].getValue()
			};

			this.tabPanel.mask('Speicher Code ...');
			xframe.ajax({
				scope: this,
				url: '/xgo/xplugs/xredaktor/ajax/atoms/saveCode',
				params : params,
				stateless: function(success,json) {
					if (!success)
					{
						xframe.alert('Speichern fehlgeschlagen','Achtung der Sourcecode konnte nicht gespeichert werden!');
					}
					this.tabPanel.unmask();
				}
			});

		}


		this.configPanel.getStore().on('load',function(s,records){

			if (a_type == 'WIZARD')
			{
//				this.tabPanel.setActiveTab(this.configPanel);
			}

		},this);


		var what = {};
		checkAutoLoad = function(x)
		{
			if (what[x]) return;
			what[x] = true;

			if ((what['panel']) && (what['tree_store'])) {
				var a_id = 0;
				try {
					a_id = parseInt(Ext.util.Cookies.get(cookieName),10);
				}catch(e){}

				if (a_id > 0) {

					this.tree.mask("Öffne letzten Datensatz...");
					this.tree.doSearcherAndSelect(a_id,function(){
						me.tree.unmask();
					});
				}
			}
		}


		this.wizardSettings = xredaktor_gui.getInstance().renderFormViaVid({
			iconCls: 'xf_settings',
			scope: me,
			listeners: {
				afterBuildFormPanel: function(fp) {
					checkAutoLoad.call(me,'panel');
				},
				afterrender: function(gui) {
					console.info('latestWizardSettings',latestWizardSettings);
					console.info("AFTER_RENDERERRRRR");
					me.wizardSettings.getGui().setFormData(latestWizardSettings);
				}
			},
			vid: 100,
			msg: 'Lade Einstellungen...',
			title: 'Wizard Konfiguration',
			buttons:[{
				iconCls:'xf_save',
				text:'Einstellungen Speichern',
				scope:this,
				handler:function(btn)
				{
					btn.setDisabled(true);
					var a_wizardSettings = Ext.encode(this.wizardSettings.getGui().getFormData());

					xframe.ajax({
						scope:this,
						url: '/xgo/xplugs/xredaktor/ajax/atoms/setWizardSettings',
						params : {
							a_id: this.currentAtomId,
							a_wizardSettings: a_wizardSettings
						},
						stateless: function(success,json)
						{
							btn.setDisabled(false);
						}
					});
				}
			}]
		});

		var items = [this.configPanel];

		if (showWizardSettings) items.push(this.wizardSettings);
		else {
			var ses = this.initSrcEditors();
			Ext.each(ses,function(e){
				items.push(e);
			},this);
		}

		this.tabPanel = Ext.create('Ext.tab.Panel', {
			title: titleSel+': -' ,
			activeTab: startTab,
			tabPosition: 'left',
			border:false,
			region: 'center',
			split: true,
			collapseMode: 'mini',
			items: items,
			disabled: true,
			listeners: {
				scope: this,
				tabchange: function(tb,activeTab) {
					var activeTabIndex 	= this.tabPanel.items.findIndex('id', activeTab.id);
					Ext.util.Cookies.set('STORE_ACTIVE_PANEL_CONF_'+a_type,activeTabIndex);
				}
			}
		});

		var but_settings_copy_id = Ext.id();
		var but_settings_copy = {
			iconCls:'xf_settings_copy',
			id:but_settings_copy_id,
			disabled:true,
			scope:this,
			text:'Einstellungen Kopieren',
			handler: function(){
				var sel 	= this.grid.getSelectionModel();
				var keys 	= [];
				Ext.each(sel.getSelection(),function(r){
					keys.push(r.data.as_id);
				},this);

				var mask = xframe.mask(this.grid);
				xframe.ajax({
					scope:this,
					url: '/xgo/xplugs/xredaktor/ajax/atoms/copySelection',
					params : {
						keys: keys.join(',')
					},
					success: function(json)
					{
						mask.hide();
						var win = xframe.win({
							modal:true,
							title:'Kopierte Einstellungen',
							items:[{
								xtype:'textarea',
								selectOnFocus:true,
								value:json.encoded
							}]
						});
						win.show();
					}
				});
			}
		};

		var but_settings_paste = {
			scope:this,
			iconCls:'xf_settings_insert',
			text:'Einstellungen Einfügen',
			handler: function(){


				var textId 	= Ext.id();
				var checkId = Ext.id();

				var win = xframe.win({
					modal:true,
					title:'Kopierte Einstellungen Einfügen',
					items:[{
						id:textId,
						selectOnFocus:true,
						xtype: 'textarea',
						value:'Kopierte Einstellungen hier einfügen ...'
					}],
					bbar:[{
						id:checkId,
						xtype:'checkbox',
						labelWidth:200,
						fieldLabel: 'Namen "Matchen" und Überschreiben!'
					},'->',{
						scope:this,
						iconCls:'xf_settings_insert',
						text:'Einfügen',
						handler:function() {

							xframe.yn({
								title:'Einfügen',
								msg: 'Wollen sie wirklich die Konfiguration einfügen?',
								scope:this,
								handler: function(btn)
								{
									if (btn != 'yes') return;



									xframe.yn({
										title:'ACHTUNG',
										msg: 'Kontrollieren Sie die Einstellung Einfügen/Matchen und überschreibeen !',
										scope:this,
										handler: function(btn)
										{
											if (btn != 'yes') return;


											xframe.ajax({
												scope:this,
												url: '/xgo/xplugs/xredaktor/ajax/atoms/pasteSelection',
												params : {
													a_id: me._a_id,
													code: Ext.getCmp(textId).getValue(),
													match_Names: Ext.getCmp(checkId).getValue() ? 'Y' : 'N'
												},
												success: function(json)
												{
													var mask = xframe.mask(this.grid);
													if (json.state)
													{
														me.grid.getStore().load();
													} else
													{
														xframe.alert('Import fehlgeschlagen','Leider konnten die kopierten Einstellungen nicht eingefügt werden.');
													}
													win.destroy();
													mask.hide();
												}
											});



										}
									});




								}
							});

						}
					}]
				});
				win.show();
			}
		};

		var but_settings = Ext.create('Ext.Button', {
			iconCls:'xf_settings',
			tooltip: 'Einstellungen',
			menu: [but_settings_copy,but_settings_paste]
		});


		var fields = [
		{name: 'a_name', 	xgroup:['Normal','Sprachenspezifisch','Erweitert'],	text:title2,			type:'string', 	folder: true, editor: {allowBlank: false,xtype: 'textfield'}},
		{name: 'a_id',		xgroup:'Erweitert', 								text:'Interne Nummer',	type:'int', 	hidden: false, width: 30},
		{name: 'a_sort',	xgroup:'Erweitert', 								text:'Sortierung',		type:'int', 	hidden: true},
		{name: 'a_vid',		xgroup:'Erweitert', 								text:'Virtuelle ID',	type:'int', 	hidden: !virtualIdSupport, header: virtualIdSupport, editor:true, width: 30},
		{name: 'a_lastmod',	xgroup:'Erweitert', 								text:'Letzte Änderung',	type:'string', 	hidden: true}
		];

		Ext.each(xredaktor.getInstance().getLBE(),function(o){
			var lower = o.bel_ISO.toLowerCase();
			var upper = o.bel_ISO.toUpperCase();
			//fields.push({name: 'a_name_'+lower, xgroup:'Sprachenspezifisch', text: upper+' '+title2, type:'string', 	hidden: true, folder: false, editor: {xtype: 'textfield'}});
		});


		this.tree = xframe_pattern.getInstance().genTree({
			xf_search_deep: true,
			iconsPrefix: iconsPrefix,
			selModelButtons:[but_settings_copy_id],
			toolbar_top:[but_settings],
			button_add:true,
			button_del:true,
			//stateId: 'xr_atom_mpanel_tree'+a_type,
			region:'west',
			title: title,
			//forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			txt_new: txt_new,
			xstore: {
				params : {
					a_s_id : s_id,
					a_type : a_type,
					gui_mode : 'NONE'
				},
				load: 	'/xgo/xplugs/xredaktor/ajax/atoms/load',
				update: '/xgo/xplugs/xredaktor/ajax/atoms/update',
				insert: '/xgo/xplugs/xredaktor/ajax/atoms/insert',
				remove: '/xgo/xplugs/xredaktor/ajax/atoms/remove',
				move: 	'/xgo/xplugs/xredaktor/ajax/atoms/move',
				pid: 	'a_id',
				fields: fields
			}
		});


		var latestWizardSettings = {};


		loadAtomById = function(a_id,finallyDoWizard) {

			console.info("loadAtomById");
			
			if (typeof finallyDoWizard == "undefined") finallyDoWizard = false;

			this.tabPanel.setDisabled(false);
			this.currentAtomId = a_id;
			this.configPanel.loadAtom(a_id,a_type);

			this.tabPanel.mask('Loading Data ...');

			xframe.ajax({
				scope:this,
				url: '/xgo/xplugs/xredaktor/ajax/atoms/getWizardSettings',
				params : {
					a_id: a_id
				},
				success: function(json)
				{

					this.tabPanel.unmask();

					me.configPanel.setAtomsInfos(json.record);
					this.tabPanel.setTitle(titleSel+': '+ json.record.a_name.capitalize());
					xframe.setAppTitle(titleSel+': '+ json.record.a_name.capitalize());


					if (a_type == 'WIZARD')
					{
						latestWizardSettings = Ext.decode(json.record.a_wizardSettings,true);
						if (latestWizardSettings == null) {
							this.wizardSettings.getGui().getForm().reset();
							return;
						}
						try{
							console.info('latestWizardSettings',latestWizardSettings);
							this.wizardSettings.getGui().setFormData(latestWizardSettings);
						} catch (e) {
							console.info("Wizarddatenkonfiguration kann nicht gesetzt werden....",latestWizardSettings);
						};
					} else {
						me.setSrcEditors.call(me,json.record);
					}

				}
			});
		}


		this.loadAtomById = loadAtomById;


		this.tree.getStore().on('load',function(){
			checkAutoLoad.call(me,'tree_store');
		},this);


		this.tree.on('selectionchange',function(view,selections,options){

			if (selections.length == 0)	{
				Ext.util.Cookies.set(cookieName, 0);
				this.tabPanel.setDisabled(true);
				return;
			}

			var a_id = selections[0].data.a_id;
			Ext.util.Cookies.set(cookieName, a_id);

			loadAtomById.call(this,a_id,true);

		},this,{delay:1});

		var gui = Ext.create('Ext.Panel',{
			border:false,
			layout: 'border',
			split: true,
			collapseMode: 'mini',
			defaults:{
				split: true,
				collapseMode: 'mini'
			},
			items : [this.tree,this.tabPanel]
		});



		return gui;
	}


};