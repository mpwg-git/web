var xredaktor_wizards = (function() {
	var instance = null;
	return new function() {

		this.TITLE_SHOW = true,
		this.TITLE_HIDE = false,

		this.RECORD_AUTO_INSERT 		= 10,
		this.RECORD_NOT_PRESENT_FAIL	= 0,

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xredaktor_wizards_(config);
			}
			return instance;
		}
	}
})();

var xredaktor_wizards_ = function(config) {
	this.config = config || {};
};

xredaktor_wizards_.prototype = {

	doAtomSettingGridHeader : function(cfg,fields,r)
	{
		xredaktor_atoms_settings.getInstance().buildHeaderObjectByAS(cfg,fields,r);
		return;
	},

	getDefaultWizardView : function(a_id,contentWindow,title,mask,extraConfig,params)
	{
		var me = this;

		this.wizardContent = contentWindow;
		this.myMask = mask;

		var loadParams = {
		};

		try{
			loadParams = params.load;
		}catch(e){}

		loadParams['domagic'] = a_id;

		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/wizards/getSettings',
			params : {
				a_id:a_id
			},
			success: function(json)
			{
				var fields = [
				{name: 'wz_id',		text:'Interne Nummer',		type:'int',		hidden: false, 	header:true, width: 10},
				{name: 'wz_online', text:'Online', 				type:'string', 	hidden: false, 	header:true, xtype: 'combo', store : [['Y','Ja'],['N','Nein']], width: 10},
				{name: 'wz_sort',	text:'Sortierung',			type:'int' , 	hidden: true, 	header:true, editor: {xtype: 'numberfield',allowDecimals:false}}
				];

				var grid = false;
				var gridHeaderCfgHelper = {
					grid:grid
				};
				var fields2 = [];

				Ext.each(json.settings,function(r){
					this.doAtomSettingGridHeader(gridHeaderCfgHelper,fields,r);
					fields[fields.length-1].text = fields[fields.length-1].text + ' ['+ r.as_id +']';
				},this);

				grid = this.grid = xframe_pattern.getInstance().genGrid({
					region:'west',
					search:true,
					forceFit:true,
					border:false,
					split: true,
					pager:true,
					title: title || 'Wizard :: '+a_id,
					plugin_numLines: false,
					button_add: true,
					button_del: true,
					xstore: {
						load: 	'/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/load',
						loadParams : loadParams,
						remove: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/remove',
						update: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/update',
						insert: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/insert',
						insertParams : {
							domagic : a_id
						},
						updateParams : {
							domagic : a_id
						},
						removeParams : {
							domagic : a_id
						},
						move: 	'/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/move',
						pid: 	'wz_id',
						fields: fields
					}
				});
				gridHeaderCfgHelper.grid = grid;
				grid.getStore().load();

				var panel = Ext.create('Ext.Panel',{
					layout:'fit',
					border:false,
					items:[Ext.create('Ext.Panel',{html:'<div style="padding:30px">Formularansicht wird generiert...</div>'})]
				});

				var detail = Ext.create('Ext.Panel',{
					border:false,
					region:'center',
					layout:'fit',
					items:[panel]
				});

				var gui = Ext.create('Ext.Panel',{
					border:false,
					layout:'border',
					items:[grid,detail]
				});

				this.wizardContent.removeAll(true);
				this.wizardContent.add(gui);
				this.wizardContent.doLayout();
				this.wizardContent.setDisabled(false);

				var wizard_form = xredaktor_atoms_settings.getInstance().processGenericInputPanel({
					title: 	'Datensatzkonfiguration',
					button_abort:false,
					json: 	json,
					panel: 	panel,
					load: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/spreadLoad',
					load_params : {
						domagic: a_id
					},
					save: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/spreadSave',
					save_params: {
						domagic: a_id
					},
					grid: grid
				});

				wizard_form.setDisabled(true);
				me.myMask.hide();

				grid.on('selectionchange',function(view,selections,options){
					if (!wizard_form) return;
					if (selections.length == 0) {
						wizard_form.setDisabled(true);
						return;
					}
					var r = selections[0].data;
					wizard_form.loadRecordById(r.wz_id);
				},this);

			}
		});

	},

	changeWizard : function(x,r)
	{
		var me = this;
		var a_id = r[0].data.a_id;
		xframe.setAppTitle('IP: '+ r[0].data.a_name.capitalize());
		this.myMask = new Ext.LoadMask({target:this.wizardContent, msg:"Ansicht wird erstellt..."});
		this.myMask.show();
		if (!this.firstTime)
		{
			this.firstTime = true;
			//this.wizardSelection.collapse();
		}
		try{
			this.getDefaultWizardView(a_id,this.wizardContent,r[0].data.a_name.capitalize());
		} catch (e)
		{
			console.info(e);
		}
	},


	genGuiListOfRecords : function(cfg,panelCfg,onlyThisFieldsArray)
	{
		if (typeof onlyThisFields == 'undefined') onlyThisFields = [];
		if (!Ext.isArray(onlyThisFields)) onlyThisFields = [];

		var container 	= Ext.create('Ext.Panel',panelCfg);
		var mask 		= false;
		var a_id 		= cfg.wz_id;

		var me = this;
		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/wizards/getSettings',
			params : {
				a_id:a_id
			},
			success: function(json)
			{
				try
				{
					var fields = [];

					if (typeof cfg.column_wz_id == 'undefined')
					{
						cfg.column_wz_id = false;
					}

					if (cfg.column_wz_id)
					{
						fields.push({name: 'wz_id',text:(typeof cfg.column_wz_id_title == 'undefined') ? 'Interne Nummer' : cfg.column_wz_id_title, type:'int', hidden: false, 	header:true});
					} else {
						fields.push({name: 'wz_id',text:'Interne Nummer', type:'int', header: false, hidden: true, header:false, width: 10});
					}

					var grid = false;
					var gridHeaderCfgHelper = {
						grid:grid
					};


					if (typeof cfg.readOnly != 'undefined')
					{
						gridHeaderCfgHelper.readOnly = cfg.readOnly;
					}


					var fields2 = [];

					var filterFields = {};
					if (onlyThisFieldsArray.length != 0)
					{
						Ext.each(onlyThisFieldsArray,function(rid){
							filterFields[rid] = 1;
						},this);
					}

					Ext.each(json.settings,function(r) {

						if (!onlyThisFieldsArray || onlyThisFieldsArray.length != 0)
						{
							if (typeof filterFields[r.as_id] != 'undefined')
							{
								this.doAtomSettingGridHeader(gridHeaderCfgHelper,fields,r);
								fields[fields.length-1].text = fields[fields.length-1].text + ' ['+ r.as_id +']';
							} else
							{
								try{
									if (r.as_type_multilang == 'Y')
									{
										fields.push({
											name: '_DE_wz_'+r.as_name,
											text: r.as_label + ' DE',
											type: 'string',
											hidden: true
										});
									}
									else
									{
										fields.push({
											name: 'wz_'+r.as_name,
											text: r.as_label,
											type: 'string',
											hidden: true
										});
									}
								} catch(e)
								{
									console.info(e);
								}
							}
						} else
						{

							this.doAtomSettingGridHeader(gridHeaderCfgHelper,fields,r);
							fields[fields.length-1].text = fields[fields.length-1].text + ' ['+ r.as_id +']';
						}






					},this);

					if (typeof cfg.loadParams == 'undefined') cfg.loadParams = {};
					var loadParams = cfg.loadParams;
					loadParams.domagic = a_id;

					grid = this.grid = xframe_pattern.getInstance().genGrid({
						region:(cfg.detail)?'west':'center',
						search:true,
						forceFit:true,
						border:false,
						split: true,
						pager:true,
						title: cfg.title || '',
						plugin_numLines: false,
						records_move: cfg.records_move || false,
						button_add: cfg.button_add || false,
						button_del: cfg.button_del || false,
						xstore: {
							load: 	'/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/load',
							loadParams : loadParams,
							remove: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/remove',
							update: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/update',
							insert: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/insert',
							insertParams : {
								domagic : a_id
							},
							updateParams : {
								domagic : a_id
							},
							removeParams : {
								domagic : a_id
							},
							move: 	'/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/move',
							pid: 	'wz_id',
							fields: fields
						}
					});

					if (typeof cfg.gridLoaded_function == 'function')
					{
						cfg.gridLoaded_function.call(cfg.gridLoaded_scope,grid);
					}

					container.recordsGrid = grid;
					gridHeaderCfgHelper.grid = grid;
					grid.getStore().load();

					var panel = Ext.create('Ext.Panel',{
						layout:'fit',
						border:false,
						items:[Ext.create('Ext.Panel',{html:'<div style="padding:30px">Formularansicht wird generiert...</div>'})]
					});

					var detail = Ext.create('Ext.Panel',{
						border:false,
						region:'center',
						layout:'fit',
						items:[panel]
					});

					var items = [grid]
					if (cfg.detail)
					{
						items.push(detail);
					}

					var gui = Ext.create('Ext.Panel',{
						border:false,
						layout:'border',
						items:items
					});

					container.removeAll(true);
					container.add(gui);
					container.doLayout();
					container.setDisabled(false);

					if (cfg.detail)
					{
						var wizard_form = xredaktor_atoms_settings.getInstance().processGenericInputPanel({
							title: 	'Datensatzkonfiguration',
							button_abort:false,
							json: 	json,
							panel: 	panel,
							load: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/spreadLoad',
							load_params : {
								domagic: a_id
							},
							save: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/spreadSave',
							save_params: {
								domagic: a_id
							},
							grid: grid
						});

						container.recordForm = wizard_form;

						wizard_form.setDisabled(true);
						mask.hide();

						grid.on('selectionchange',function(view,selections,options){
							if (!wizard_form) return;
							if (selections.length == 0) {
								wizard_form.setDisabled(true);
								return;
							}
							var r = selections[0].data;
							wizard_form.loadRecordById(r.wz_id);
						},this);
					} else
					{
						mask.hide();
					}
				}
				catch (e)
				{
					console.info(e);
				}
			}
		});

		container.on('afterrender',function(){
			mask = new Ext.LoadMask({target:container, msg:"Ansicht wird erstellt..."});
			mask.show();
		},this);

		return container;
	},

	genGuiFormOfRecord : function(cfg,panelCfg,onlyThisFieldsArray)
	{
		if (typeof onlyThisFields == 'undefined') onlyThisFields = [];
		if (!Ext.isArray(onlyThisFields)) onlyThisFields = [];

		var container 	= Ext.create('Ext.Panel',panelCfg);
		var mask 		= false;
		var a_id 		= cfg.wz_id;

		var me = this;
		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/wizards/getSettings',
			params : {
				a_id:a_id
			},
			success: function(json)
			{
				try
				{
					var panel = Ext.create('Ext.Panel',{
						layout:'fit',
						border:false,
						items:[Ext.create('Ext.Panel',{html:'<div style="padding:30px">Formularansicht wird generiert...</div>'})]
					});

					var detail = Ext.create('Ext.Panel',{
						border:false,
						region:'center',
						layout:'fit',
						items:[panel]
					});

					var gui = Ext.create('Ext.Panel',{
						border:false,
						layout:'border',
						items:[detail]
					});

					container.removeAll(true);
					container.add(gui);
					container.doLayout();
					container.setDisabled(false);

					var wizard_form = xredaktor_atoms_settings.getInstance().processGenericInputPanel({
						title: 	cfg.title || '',
						button_abort:false,
						json: 	json,
						panel: 	panel,
						load: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/spreadLoad',
						load_params : {
							domagic: a_id
						},
						save: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/spreadSave',
						save_params: {
							domagic: a_id
						}
					});


					if (typeof cfg.formLoaded_function == 'function')
					{
						cfg.formLoaded_function.call(cfg.formLoaded_scope,wizard_form);
					}

					container.recordForm = wizard_form;
					wizard_form.setDisabled(true);
					mask.hide();

				}
				catch (e)
				{
					console.info(e);
				}
			}
		});

		container.on('afterrender',function(){
			mask = new Ext.LoadMask({target:container, msg:"Ansicht wird erstellt..."});
			mask.show();
		},this);

		return container;
	},

	genGuiFormOfRecordByVid : function(cfg,panelCfg,onlyThisFieldsArray)
	{
		if (typeof onlyThisFields == 'undefined') onlyThisFields = [];
		if (!Ext.isArray(onlyThisFields)) onlyThisFields = [];

		console.info('panelCfg',panelCfg);

		var container 		= Ext.create('Ext.Panel',panelCfg);
		var mask 			= false;
		var maskIsNotNeeded	= false;
		var a_id 			= -1;
		var latestLoadId 	= -1;
		var showTitle		= false;
		var gui 			= false;

		var me = this;
		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/gui/getFormSettingsViaVID',
			params : {
				vid: cfg.wz_vid,
				s_id: xredaktor.getInstance().getCurrentSiteId()
			},
			success: function(json)
			{

				a_id 	= json.a_id;


				var final_tbar = [{
					iconCls: 'xf_save',
					text: 'Save',
					formBind: true,
					disabled: true,
					handler: function() {

						gui.mask('Speicher Daten ...');

						if (latestLoadId == -1)
						{
							console.info("Form didn't load a record. Save aborted");
							return;
						}

						var json_cfg = Ext.encode(gui.getForm().getValues());
						

						xframe.ajax({
							scope:me,
							url: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/spreadSave',
							params : {
								domagic: a_id,
								json_cfg: json_cfg,
								id: latestLoadId
							},
							stateless: function(state,json)
							{
								gui.unmask();
								if (!state) return;
								gui.getForm().setValues(json.value);
							}
						});


					}
				}];

				gui = xredaktor_forms.getInstance().finalize(final_tbar,json);
				gui.loadRecordByConfig = function(selectorOfRecord,showTitle,extraLoadSettings) {


					gui.setDisabled(false);
					if (typeof showTitle == 'undefined') 			showTitle = true;
					if (typeof extraLoadSettings == 'undefined') 	extraLoadSettings = -1;

					var params = {
						domagic: a_id,
						id: latestLoadId,
						selector: Ext.encode(selectorOfRecord),
						extraLoadSettings: extraLoadSettings
					};

					xframe.ajax({
						scope:me,
						url: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/spreadLoad',
						params : params	,
						success: function(json)
						{
							latestLoadId = json.record_wz_id;
							gui.getForm().setValues(json.value);
							try {mask.hide();} catch (e) {};
							if (showTitle) { finalForm.setTitle('Datensatzkonfiguration #'+latestLoadId); }
						}
					});
				}






				container.removeAll(true);
				container.add(gui);
				container.doLayout();
				container.setDisabled(false);


				var wizard_form = gui;

				if (typeof cfg.formLoaded_function == 'function')
				{
					cfg.formLoaded_function.call(cfg.formLoaded_scope,wizard_form);
				}

				container.recordForm = wizard_form;
				wizard_form.setDisabled(false);

				if (mask) {
					mask.hide();
				}

				maskIsNotNeeded = true;

			}
		});

		container.on('afterrender',function(){
			if (!maskIsNotNeeded)
			{
				mask = new Ext.LoadMask({target:container, msg:"Ansicht wird erstellt..."});
				mask.show();
			}
		},this);


		container.getForm = function() {
			return gui.getForm();
		};

		return container;
	}

};