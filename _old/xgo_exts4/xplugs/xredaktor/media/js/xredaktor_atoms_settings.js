
var xredaktor_atoms_settings = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xredaktor_atoms_settings_(config);
			}
			return instance;
		}
	}
})();

var xredaktor_atoms_settings_ = function(config) {
	this.config = config || {};
};

xredaktor_atoms_settings_.prototype = {

	getStoreOfAtomsSettings: function()
	{

	},
	
	checkLinearAssozDataArray : function(as_config)
	{
		var data = Ext.decode(as_config,true);
		if (data == null)						data = {'l':[],'a':{}};
		if (typeof data == "undefined") 		data = {'l':[],'a':{}};
		if (typeof data['l'] == "undefined") 	data['l'] = [];
		if (typeof data['a'] == "undefined") 	data['a'] = {};
		if (!Ext.isArray(data['l'])) 			data['l'] = [];
		if (!Ext.isObject(data['a'])) 			data['a'] = [];
		return data;
	},

	/***************************************************************************************************************************************************/
	/***************************************************************************************************************************************************/
	/***************************************************************************************************************************************************/
	/***************************************************************************************************************************************************/
	/***************************************************************************************************************************************************/

	unConfigAble : function()
	{
		return "<div style='background-color:black;color:white;'>Bitte Typ auswählen.</div>";
	},


	get_xr_field_by_as_type: function(as_type)
	{
		var normalized = as_type.toLowerCase().split('-').join('_');

		if (Ext['xr']['field_'+normalized]) {
			if (Ext['xr']['field_'+normalized].openConfigWindow) {
				console.info(as_type,'cfg_window: OK');
			} else {
				console.error(as_type,'cfg_window: NOK');
			}
		} else {
			console.error(as_type,'cfg_window: NOK (OTHER PROBLEM !!!)');
			return false;
		}

		return Ext['xr']['field_'+normalized];
	},

	get_xr_widget_by_as_type: function(as_type)
	{
		var normalized = as_type.toLowerCase().split('-').join('_');
		return 'xr_field_'+normalized;
	},

	handleConfigField : function(o,v,r)
	{
		try {
			if ((r.data.as_type == "UNDEFINED")||(r.data.as_type == "")) return this.unConfigAble();

			var me 		= this;
			var error	= '';
			var idx 	= Ext.id();

			var as_type = r.data.as_type;

			try {
				var d = this.atom_types_store.getNodeById(as_type);
			} catch (e) {
				return v;
			}

			if (!d.data.btn_cfg) {
				return "<div class='cellButton cellNotUseable' id='"+idx+"' >Konfigurieren</div>";
			}

			setTimeout(function(){
				try{
					Ext.get(idx).addClsOnOver('cellButtonUp');
					Ext.get(idx).on('click',function(crap,anime){
						var xr_field = this.get_xr_field_by_as_type(as_type);
						if (typeof xr_field.openConfigWindow != "function")
						{
							xframe.alert("Interner Fehler","Typ: "+as_type+" kann nicht konfiguriert werden.");
						} else {
							xr_field.openConfigWindow(r.data,this.grid);
						}
					},me);
				} catch(e){}
			},1);

			if (r.data.as_config == "")
			{
				error = " style='background-color:red;color:white;' ";
			}

			var xr_class = this.get_xr_field_by_as_type(as_type);
			return "<div class='cellButton' id='"+idx+"' "+error+">Konfigurieren</div>";
		} catch(e) {
			return "X";
		}
	},

	handleInitField : function(o,v,r)
	{
		try {
			if ((r.data.as_type == "UNDEFINED")||(r.data.as_type == "")) return this.unConfigAble();

			var me 		= this;
			var idx 	= Ext.id();

			var as_type = r.data.as_type;

			try {
				var d = this.atom_types_store.getNodeById(as_type);
			} catch (e) {
				return v;
			}

			var contentAvail = "";
			if (r.data.as_init.split(' ').join('') != "")
			{
				contentAvail = " style='background-color:#00b1e7;color:white;' ";
			}


			if (d.data.btn_init_disabled) {
				return "<div class='cellButton cellNotUseable' id='"+idx+"'>Initalwert</div>";
			} else {

				setTimeout(function(){
					try {

						Ext.get(idx).addClsOnOver('cellButtonUp');
						Ext.get(idx).on('click',function(){

							Ext.widget('xr_field').openInitalValueWindow({
								grid: me.grid,
								as: r.data,
								title: 'Inital-Wert',
								fields: [{
									xtype: me.get_xr_widget_by_as_type(as_type),
									name: 'as_init',
									fieldLabel: 'Initalwert'
								}]
							});

						},me);

					} catch(e){}
				},1);

				return "<div class='cellButton' id='"+idx+"' "+contentAvail+">Initalwert</div>";
			}
		} catch(e) {
			return "X";
		}
	},


	handleLang : function(renderStore,args)
	{
		var v = args[0];
		var r = args[2];

		if ((r.data.as_type == "UNDEFINED")||(r.data.as_type == "")) return this.unConfigAble();

		var as_type = r.data.as_type;

		var extraCss = "";
		if (r.data.btn_multilang_disabled) {
			extraCss = " cellNotUseable";
		}

		var txt = v;

		try{
			txt = renderStore.getById(v).data.v;
		} catch(e) {}

		return "<div class='"+extraCss+"'>"+txt+"</div>";
	},





	renderYess : function(renderStore,args)
	{
		var v = args[0];
		var r = args[2];

		var txt = v;

		var extraCss = "";

		try{
			txt = renderStore.getById(v).data.v;
			if (renderStore.getById(v).data.id == 'Y') extraCss = "HIGHLIGHT_YESS";
		} catch(e) {}

		return "<div class='"+extraCss+"'>"+txt+"</div>";
	},

	reloadStore : function()
	{
		this.grid.getStore().load();
	},

	loadAtom : function (a_id,a_type)
	{
		this._a_id = a_id;
		this.a_type = a_type;
		this.grid.setDisabled(false);
		this.grid.initSettings.xstore.insertParams['as_a_id'] = a_id;
		var store = this.grid.getStore();
		store.proxy.extraParams['as_a_id'] = a_id;
		store.load();
	},


	getColorUpMyLife: function() {

		var colors = ['#0033FF','#0066FF','#0099FF','#00CCFF','#00FFFF','#99FFFF','#99CCFF','#9999FF','#9966FF','#9933FF','#9900FF','#CC00FF'];
		return colors;

	},

	handleCollection: function(collName,o,j) {
		if (collName == "") return '';

		if (!this.collection_marker) {
			this.collection_markerIndex = 0;
			this.collection_marker 		= {}
		}

		if (!this.collection_marker[collName])
		{
			this.collection_marker[collName] = this.getColorUpMyLife()[this.collection_markerIndex];
			this.collection_markerIndex++;
		}

		var col = this.collection_marker[collName];
		return "<span style='background-color:"+col+";text-align:center;color:#cccccc;'>&nbsp;&nbsp;</span>&nbsp;&nbsp;"+collName+"";

	},

	handleAsType: function(as_type,o,j)
	{

		try {
			var d = this.atom_types_store.getNodeById(as_type);
		} catch (e) {
			return as_type;
		}

		if (!d) return as_type;
		if (!d.data) return as_type;
		if (!d.data.iconCls) return as_type;

		var iconCls = d.data.iconCls;
		var label 	= d.data.label;

		return '<div style="position:relative;"><span class="rendererIconCls '+iconCls+'"></span><span class="rendererIconLabel">'+label+"</span></div>";
	},

	handleGuiMode: function(gmode,o,j) {

		try {
			if (!o) return gmode;
			if (!o.record) return gmode;
			if (!o.record.data) return gmode;

			var as_type = o.record.data.as_type;

			try {
				var d = this.atom_types_store.getNodeById(as_type);
			} catch (e) {
				return gmode;
			}

			if (!d.data.guiMode) return "-";
			if (!d.data.guiMode[gmode]) return gmode;

			return d.data.guiMode[gmode];
		} catch (e) {
			return 'X';
		}
	},



	getMainPanel : function(a_id, a_type)
	{

		/*
		setTimeout(function(){

		console.json({
		hallo: 'dkjdlkjdlkdjlkdjlkdj',
		json: {
		tzu: {
		tz: {
		key0: '1',
		1: '2',
		key2: '3',
		},
		array: [1,2,3,4],
		tza: 1
		},
		tza: 1
		}
		});

		console.info('WINNNNNNNNNNNNNNNNNNNNNNNN');

		},100);
		*/

		var u = Ext.create('Ext.xr.field_atom_type',{});
		this.atom_types_store = u.getStoreX();

		var me 					= this;
		this.a_type 			= a_type;
		var toolbar_bottom 		= [];
		this.btn_wiz_onoff 		= Ext.id();
		this.btn_wiz_fieldName 	= Ext.id();

		switch (a_type)
		{
			case 'WIZARD':
			case 'FRAME':
			case 'ATOM':
			break;
			default:
			console.info("getMainPanel: Invalid a_type::",a_type);
			return;
		}

		var startPanelFormCols = Ext.id();
		toolbar_bottom.push('Formularspalten: ',{
			xtype: 'xr_field_int',
			iconCls: 'xr_form_grid',
			value: 2,
			id: startPanelFormCols,
			name: 'a_gui_cols',
			listeners: {
				scope: this,
				blur: function(field) {

					this.grid.mask("Aktualisiere Daten...");


					xframe.ajax({
						scope:me,
						url: '/xgo/xplugs/xredaktor/ajax/atoms/updateAtomFormPanelSettings',
						params : {
							a_id:me._a_id,
							a_gui_cols: field.getValue()
						},
						stateless: function(state,json)
						{
							this.grid.unmask();
						}
					});
				}
			}
		});

		if (a_type == "WIZARD")
		{


			toolbar_bottom.push('->',{
				iconCls:'xf_db_warn',
				text:'Alle Felder synchen',
				handler:function()
				{
					var mask = xframe.mask(me.grid);
					xframe.ajax({
						scope:me,
						url: '/xgo/xplugs/xredaktor/ajax/atoms/synchWizardSettings',
						params : {
							a_id:me._a_id
						},
						success: function(json)
						{
							mask.hide();
						},
						failure: function()
						{
							mask.hide();
						}
					});
				}
			});
		}


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
					url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/copySelection',
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
												url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/pasteSelection',
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

		var as_typiii = Ext.create('Ext.xr.field_atom_type',{});

		var but_settings = Ext.create('Ext.Button', {
			iconCls: 'xf_settings',
			text: 'Einstellungen',
			menu: [but_settings_copy,but_settings_paste]
		});

		var autocheckId = Ext.id();
		this.grid = xframe_pattern.getInstance().genGrid({
			iconCls: 'xf_control_panel',
			search: true,
			stateId: 'xr_atom_settings_grid',
			toolbar_bottom : toolbar_bottom,
			region:'center',
			layout: 'fit',
			selModelButtons:[but_settings_copy_id],
			border:false,
			split: true,
			collapseMode: 'mini',
			title: 'Felder',
			plugin_numLines: true,
			button_add: true,
			toolbar_top:[but_settings,'-'],
			forceFit:true,
			button_del: true,
			toolbar_bottom2 : [{
				xtype:'label',
				id: autocheckId,
				html:'Eingabenkontrolle: <b>noch nicht ausgeführt.</b>'
			}],
			xstore: {
				params: {
					a_s_id: xredaktor.getInstance().getCurrentSiteId()
				},
				load: 	'/xgo/xplugs/xredaktor/ajax/atoms_settings/load',
				loadParams : {
					as_a_id : a_id
				},
				remove: '/xgo/xplugs/xredaktor/ajax/atoms_settings/remove',
				update: '/xgo/xplugs/xredaktor/ajax/atoms_settings/update',
				insert: '/xgo/xplugs/xredaktor/ajax/atoms_settings/insert',
				insertParams : {
					as_a_id : a_id
				},
				move: 	'/xgo/xplugs/xredaktor/ajax/atoms_settings/move',
				pid: 	'as_id',
				fields: [
				{name: 'as_id',				xgroup:['Normal','Erweitert','Sprachenspezifisch'],		text:'Interne Nummer', hidden:false, type:'int'},
				{name: 'as_name',			xgroup:['Normal','Erweitert','Sprachenspezifisch'],		text: (a_type=='WIZARD') ? 'Attribut' :'Variablenname',	type:'string', width: 200, editor: {allowBlank: false, xtype: 'textfield',selectOnFocus:true}},
				{name: 'as_label', 			xgroup:['Normal','Erweitert','Sprachenspezifisch'], 	text:'Interne Beschriftung',	type:'string', width: 200, editor: {allowBlank: true,xtype: 'textfield',selectOnFocus:true}},


				{name: 'as_type', scope: this, renderer:this.handleAsType, width: 200, xgroup:['Normal','Erweitert'], text:'Typ', type:'string', editor: {allowBlank: false, xtype: 'xr_field_atom_type',selectOnFocus:true}},
				{name: 'as_type_multilang',  width: 50, xgroup:['Normal','Erweitert'],							text:'Sprachenspezifisch', 	type:'string', xtype: 'combo', store : [['Y','Ja'],['N','Nein']], renderer:this.handleLang, scope:this},


				{name: 'as_gui_pos', 		xgroup:'Normal',										text:'Gui-Position', type:'string', 	xtype: 'combo', store : [['H','1x'],['F','2x'],['3','3x']]},


				{name: 'as_useAsHeader', 		hidden: false,scope:this, 		renderer:this.renderYess, xgroup:['Normal','Erweitert'],						text:'Grid', 	type:'string', xtype: 'combo', store : [['Y','Ja'],['N','Nein']], header: (a_type=='WIZARD') ? true:false},
				{name: 'as_useAsHeaderSort', 	hidden: true,xgroup:['Normal','Erweitert'],						text:'Grid Pos', 	type:'int' , 	editor: {xtype: 'numberfield',allowDecimals:false}, header: (a_type=='WIZARD') ? true:false},
				{name: 'as_use4Export', 		hidden: true,xgroup:['Normal','Erweitert'],							text:'Export', 	type:'string', xtype: 'combo', store : [['Y','Ja'],['N','Nein']], renderer:this.renderYess, scope:this},
				{name: 'as_use4ExportSort', 	hidden: true,xgroup:['Normal','Erweitert'],						text:'Export Pos', 	type:'int' , 	editor: {xtype: 'numberfield',allowDecimals:false}, header: (a_type=='WIZARD') ? true:false},


				{name: 'as_group',  		xgroup:['Normal','Erweitert'],							text:'Gruppe', 		type:'string', width: 200, editor: {xtype: 'textfield',selectOnFocus:true}},
				{name: 'as_collection',		scope: this, renderer: this.handleCollection, xgroup:['Normal','Erweitert'],							text:'Collection', 	type:'string', width:200, editor: {xtype: 'textfield',selectOnFocus:true}},
				{name: 'as_gui_width', 		xgroup:'Normal',										text:'Gui-Spalten', type:'int', 	editor: {xtype: 'numberfield',allowDecimals:false}},
				{name: 'as_gui_mode', 		scope: this, renderer: this.handleGuiMode, xgroup:'Normal',										text:'Gui-Mode', 	type:'int', 	editor: {xtype: 'numberfield',allowDecimals:false}},

				/*
				{name: 'as_gui_height', 		xgroup:'Normal',									text:'Gui-Höhe', type:'int', 	editor: {xtype: 'numberfield',allowDecimals:false}},
				*/

				{name: 'as_name_de', 		xgroup:'Sprachenspezifisch', 							text:'Beschriftung DE',	hidden:true, type:'string', width: 200, editor: {allowBlank: false,xtype: 'textfield',selectOnFocus:true}},
				{name: 'as_name_en', 		xgroup:'Sprachenspezifisch', 							text:'Beschriftung EN',	hidden:true, type:'string', width: 200, editor: {allowBlank: false,xtype: 'textfield',selectOnFocus:true}},
				{name: 'as_name_ru', 		xgroup:'Sprachenspezifisch', 							text:'Beschriftung RU',	hidden:true, type:'string', width: 200, editor: {allowBlank: false,xtype: 'textfield',selectOnFocus:true}},

				{name: 'as_gui', 			xgroup:'Erweitert',										text:'Modus', type:'string', xtype: 'combo', store : [['NORMAL','Editierbar'],['READONLY','Nicht veränderbar'],['HIDDEN','Ausgeblendet']]},
				{name: 'as_config_gui',		xgroup:['Normal','Erweitert'],							text:'Konfiguration',	type:'string' , hidden: false, xtype: 'button', button: {renderer: this.handleConfigField,scope: this}},
				{name: 'as_config_init',	xgroup:['Normal','Erweitert'], 							text:'Initalwert',	type:'string' , hidden: false, xtype: 'button', button: {renderer: this.handleInitField,scope: this}},



				{name: 'as_sort',	text:'Sortierung', type:'int' , hidden: true, header:true},
				{name: 'as_config',	type:'string' , hidden: true, header:false},
				{name: 'as_init',	type:'string' , hidden: true, header:false},
				{name: 'as_content',type:'string' , hidden: true, header:false},
				{name: 'as_db',		type:'string' , hidden: true, header:false}
				]
			},
			updateHandler : function()
			{
				Ext.getCmp(autocheckId).setText('Überprüfe Eingabe ...');

				try{
					var doubles 		= {};
					var errorDoubles 	= false;
					var errorEmpty 		= false;

					Ext.each(me.grid.getStore().getRange(),function(i) {
						var r = i.data;
						if (r.as_name=="")
						{
							errorEmpty = true;
							return;
						}

						if (typeof doubles[key] == 'undefined') {
							doubles[key] = 1;
						}
						else
						{
							errorDoubles = true;
						}
					},this);

					if (errorDoubles)
					{
						Ext.getCmp(autocheckId).setText('Achtung: <b>Die Matrix beinhaltet min. 2 gleiche Werte, dies kann zu fehlern führen.</b> ',false);
					} else
					{
						Ext.getCmp(autocheckId).setText('Eingabenkontrolle: Keine Fehler gefunden.');
					}
					if (errorEmpty)
					{
						Ext.getCmp(autocheckId).setText('Achtung: <b>Die Matrix beinhaltet min. eine Zeile dessen Variablennamen nicht eingegeben wurde.</b> ',false);
					}

				} catch(e){console.info('updateHandler',e)};
			}
		});


		this.grid.loadAtom = function()
		{
			return me.loadAtom.apply(me,arguments);
		}

		this.grid.setAtomsInfos = function(record) {
			Ext.getCmp(startPanelFormCols).setValue(record.a_gui_cols);
		}

		return this.grid;
	}

}