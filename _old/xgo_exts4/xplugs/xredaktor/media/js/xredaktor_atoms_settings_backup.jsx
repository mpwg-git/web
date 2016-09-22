
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

	getAndCheckInitCfg: function(cfg)
	{
		// Assoz
		if (typeof cfg.patchMD5Pass			== "undefined")	cfg.patchMD5Pass = {};
		if (typeof cfg.patchMD5PassLoaded	== "undefined")	cfg.patchMD5PassLoaded = {};
		if (typeof cfg.patchTS				== "undefined")	cfg.patchTS = {};
		if (typeof cfg.patchCombos 			== "undefined")	cfg.patchCombos = {};
		if (typeof cfg.patchRadios 			== "undefined")	cfg.patchRadios = {};
		if (typeof cfg.filterNames 			== "undefined") cfg.filterNames = {};
		if (typeof cfg.patchImages 			== "undefined") cfg.patchImages = {};
		if (typeof cfg.patchImagesButton 	== "undefined")	cfg.patchImagesButton = {};
		if (typeof cfg.patchTimes 			== "undefined")	cfg.patchTimes = {};
		if (typeof cfg.patchDates 			== "undefined")	cfg.patchDates = {};
		// Linear
		if (typeof cfg.langs 				== "undefined") cfg.langs= [];
		if (typeof cfg.tabchangeHandlers 	== "undefined")	cfg.tabchangeHandlers = [];
		return cfg;
	},

	genSimpleWizardListByConfig : function(cfg,items,r,lang)
	{
		var me				= this;
		var disabled 		= false;
		var readOnly 		= (r.as_gui == 'READONLY');
		var be_lang 		= xredaktor.getInstance().getCurrentBElang();
		var slot   			= "all";
		var preFix 			= "";
		var height			= 400;
		var n2n_cfg_as_id	= r.as_id;

		if (lang != "")
		{
			slot   = lang;
			preFix = '_'+lang+'_';
		}

		var field_text 	= Ext.id();
		var field_pid 	= Ext.id();

		var gui_Loader = Ext.create('Ext.Panel',{
			layout:'fit',
			height:height,
			html:''
		});

		console.info("getN2NSettings - CONFIG",r.as_config);

		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/wizards_n2n_grid/getN2NSettings',
			params : {
				mode: 'simple',
				n2n_cfg_as_id: n2n_cfg_as_id
			},
			stateless : function(state,json)
			{
				console.info('state',state);

				if (!state)
				{
					return;
				}

				var fields = [
				{name: 'wz_id',			text:'Interne Nummer',				type:'int',		hidden: false, 	header:true, width: 10},
				{name: 'checkId',		text:'Checked Interne Nummer',		type:'int',		hidden: true, 	header:true, width: 10},
				{name: 'wz_n2n_check',	text:'Zugewiesen',				type:'bool',	hidden: false, 	header:true}
				];

				var grid = false;
				var gridHeaderCfgHelper = {
					grid:grid
					,readOnly:true
				};
				var fields2 = [];


				Ext.each(json.settings,function(r){
					this.buildHeaderObjectByAS(gridHeaderCfgHelper,fields,r);
					delete(fields[fields.length-1]['editor']);
					fields[fields.length-1].text = fields[fields.length-1].text + ' ['+ r.as_id +']';
				},this);

				var wzListScopeID = 0;

				grid = xframe_pattern.getInstance().genGrid({
					region:'west',
					search:true,
					forceFit:true,
					border:false,
					split: true,
					records_move:false,
					pager:true,
					title: '',
					plugin_numLines: false,
					button_add: false,
					button_del: false,
					xstore: {
						load: 	'/xgo/xplugs/xredaktor/ajax/wizards_n2n_grid/load',
						loadParams : {
							mode: 'simple',
							n2n_cfg_as_id: n2n_cfg_as_id
						},
						remove: '/xgo/xplugs/xredaktor/ajax/wizards_n2n_grid/remove',
						updateCheck: '/xgo/xplugs/xredaktor/ajax/wizards_n2n_grid/updateCheck',
						update: '/xgo/xplugs/xredaktor/ajax/wizards_n2n_grid/update',
						insert: '/xgo/xplugs/xredaktor/ajax/wizards_n2n_grid/insert',
						insertParams : {
							mode: 'simple',
							n2n_cfg_as_id : n2n_cfg_as_id
						},
						updateParams : {
							mode: 'simple',
							n2n_cfg_as_id : n2n_cfg_as_id
						},
						updateParamsByRecordValue : {
							mode: 'simple',
							checkId : 'checkId'
						},
						removeParams : {
							mode: 'simple',
							n2n_cfg_as_id : n2n_cfg_as_id
						},
						move: 	'/xgo/xplugs/xredaktor/ajax/wizards_n2n_grid/move',
						pid: 	'wz_id',
						fields: fields
					}
				});


				gridHeaderCfgHelper.grid = grid;
				grid.getStore().load();

				gui_Loader.removeAll();
				gui_Loader.add(grid);
				gui_Loader.doLayout();

				var wz_id = -1;

				// FIX FOR 4.0.7
				grid.checkchange = function(e,gridColumn,recordId,checked)
				{
					var record = grid.getStore().getAt(recordId);
					var params = Ext.clone(grid.initSettings.xstore.updateParams) || {};
					params.id = record.data[record.idProperty];
					params.idProperty = record.idProperty;
					params.field = gridColumn.dataIndex;
					params.value = checked ? 'on' : 'off';
					params.wzListScopeID = wz_id;

					xframe.ajax({
						jsonFeedback: true,
						scope: this,
						url: grid.initSettings.xstore.updateCheck,
						params: params,
						success: function(json){
							if (json.record == false)
							{
								xframe.alert('ACHTUNG','Änderung wurde vom Server zurückgewiesen!');
								store.load();
							} else
							{
								if (json.reload)
								{
									store.load();
								}
								if (typeof cfg.updateHandler == 'function') cfg.updateHandler();
							}
						},
						failure: function(json){
							store.load();
						},
						failure_msg: xframe.lang('UPDATE_OF_DATA_FAILED')
					});
				}

				grid.on('checkchange',function(gridColumn,record,checked){
					return;
					console.info('checkchange',arguments);
					var params = Ext.clone(grid.initSettings.xstore.updateParams) || {};
					params.id = record.data[record.idProperty];
					params.idProperty = record.idProperty;
					params.field = gridColumn.dataIndex;
					params.value = checked ? 'on' : 'off';
					params.wzListScopeID = wz_id;

					xframe.ajax({
						jsonFeedback: true,
						scope: this,
						url: grid.initSettings.xstore.updateCheck,
						params: params,
						success: function(json){
							if (json.record == false)
							{
								xframe.alert('ACHTUNG','Änderung wurde vom Server zurückgewiesen!');
								store.load();
							} else
							{
								if (json.reload)
								{
									store.load();
								}
								if (typeof cfg.updateHandler == 'function') cfg.updateHandler();
							}
						},
						failure: function(json){
							store.load();
						},
						failure_msg: xframe.lang('UPDATE_OF_DATA_FAILED')
					});


				},this);

				cfg.grid.on('selectionchange',function(v,sel){
					grid.setDisabled((sel.length == 0));
					if (sel.length == 0) return;
					wz_id = sel[0].data.wz_id;
					wzListScopeID = wz_id;
					grid.store.proxy.extraParams['wzListScopeID'] = wz_id;
					grid.store.load();
				},this);


			}
		});

		items[slot].push({
			as_group: r.as_group,
			xtype:'fieldset',
			title: r.as_label + ((!disabled) ? '' : ' - <font color="red"><b>ACHTUNG: NOCH NICHT KONFIGURIERT</b></font>'),
			defaultType: 'textfield',
			collapsed: false,
			layout: 'anchor',
			defaults: {
				anchor: '100%'
			},
			items :[gui_Loader]
		});

	},





	genWizardListByConfig : function(cfg,items,r,lang)
	{
		var be_lang = xredaktor.getInstance().getCurrentBElang();
		var me 	 	= this;
		var slot   	= "all";
		var preFix 	= "";

		var fp = false;
		var cfgFieldId = Ext.id();
		var height = 300;
		var formCfg = false;

		var gui_Loader = Ext.create('Ext.Panel',{
			layout:'fit',
			height:height,
			html:''
		});

		items[slot].push(gui_Loader);

		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/wizards/getSettingsViaAS',
			params : {
				as_id:r.as_config
			},
			success: function(json)
			{
				try{


					var a_id = json.record.a_id;
					var fields = [
					{name: 'wz_id',		text:'Interne Nummer',		type:'int',		hidden: false, 	header:true, width: 10},
					{name: 'wz_online', text:'Online', 				type:'string', 	hidden: false, 	header:true, xtype: 'combo', store : [['Y','Ja'],['N','Nein']], width: 10},
					{name: 'wz_sort',	text:'Sortierung',			type:'int' , 	hidden: true, 	header:true, editor: {xtype: 'numberfield',allowDecimals:false}}
					];

					var grid = false;
					var gridHeaderCfgHelper = {
						grid:grid
						//,readOnly:true
					};
					var fields2 = [];


					Ext.each(json.settings,function(r){
						this.buildHeaderObjectByAS(gridHeaderCfgHelper,fields,r);
						//delete(fields[fields.length-1]['editor']);
						fields[fields.length-1].text = fields[fields.length-1].text + ' ['+ r.as_id +']';
					},this);

					var wzListScopeID = 0;

					var insertParams = {
						domagic : a_id,
						wzListScope: r.as_config,
						wzListScopeID : wzListScopeID
					};

					//grid = this.grid = xframe_pattern.getInstance().genGrid({
					grid = xframe_pattern.getInstance().genGrid({
						region:'west',
						search:true,
						forceFit:true,
						border:false,
						split: true,
						records_move:false,
						pager:true,
						title: r.as_label,
						plugin_numLines: false,
						button_add: true,
						button_del: true,
						xstore: {
							load: 	'/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/load',
							loadParams : {
								domagic : a_id,
								wzListScope: r.as_config
								//,wzListScopeID : wzListScopeID
							},
							remove: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/remove',
							update: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/update',
							insert: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/insert',
							insertParams : insertParams,
							updateParams : {
								domagic : a_id,
								wzListScope: r.as_config
								//,wzListScopeID : wzListScopeID
							},
							removeParams : {
								domagic : a_id,
								wzListScope: r.as_config
								//,wzListScopeID : wzListScopeID
							},
							move: 	'/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/move',
							pid: 	'wz_id',
							fields: fields
						}
					});
					gridHeaderCfgHelper.grid = grid;
					grid.getStore().load();

					gui_Loader.removeAll();
					gui_Loader.add(grid);
					gui_Loader.doLayout();

					console.info(cfg);

					cfg.grid.on('selectionchange',function(v,sel){
						grid.setDisabled((sel.length == 0));
						if (sel.length == 0) return;
						var wz_id = sel[0].data.wz_id;
						wzListScopeID = wz_id;
						grid.store.proxy.extraParams['wzListScopeID'] = wz_id;
						grid.store.load();

						insertParams.wzListScopeID = wz_id;
						console.info('xxxxxxxxxxxxxxxxxxx',wz_id);


					},this);

				} catch (e)
				{
					console.info(e);
				}

			}
		});

	},


	genWizComboByConfigHeader : function(masterCfg,r,lang)
	{
		//var r = Ext.clone(r2);
		var hidden 		= false;
		if (r.as_useAsHeader == 'N') hidden = true;
		var modelId = Ext.id();
		Ext.define(modelId, {
			extend: 'Ext.data.Model',
			proxy: {
				type: 'ajax',
				url : '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/load',
				extraParams : {
					domagic:r.as_config,
					doPaging:1
				},
				reader: {
					type: 'json',
					root: 'root',
					totalProperty: 'totalCount'
				}
			},

			fields: [
			{name: 'wz_id', type:'string'},
			{name: '_WZ_LABEL_', type:'string'}
			]
		});

		var pageSize = 20;

		var ds = Ext.create('Ext.data.Store', {
			pageSize: pageSize,
			model: modelId
		});

		var xname = r.as_name;
		if (typeof lang != "undefined") {
			xname =  '_'+lang+'_'+r.as_name;
		}

		console.info('xname',xname);

		var lastSel = "";

		var editor = {
			minChars: 1,
			name: ""+xname,
			queryMode:'remote',
			queryParam: '_query',
			xtype: 'combo',
			store: ds,
			displayField: '_WZ_LABEL_',
			valueField: 'wz_id',
			typeAhead: false,
			hideLabel: true,
			hideTrigger:true,
			anchor: '100%',
			listConfig: {
				loadingText: 'Suche Datensätze...',
				emptyText: 'Keine Datensätze gefunden.',
				getInnerTpl: function() {
					return '<div class="search-item">' +
					'<h3><span>[{wz_id}]</span> {_WZ_LABEL_}</h3>' +
					'</div>';
				}
			},
			pageSize: pageSize,
			listeners: {
				afterrender:function(){
					if (!masterCfg.grid)
					{
						console.info('refresh-grid is undefined',masterCfg);
						return;
					}
					masterCfg.grid.getStore().on('beforeload',function(){
						lastSel = "";
						console.info('beforeload');
					});
				},
				select: function(combo, selection) {
					lastSel = selection[0].data['_WZ_LABEL_'];
				}
			}
		};


		if (typeof lang == "undefined") {
			var ret = {
				width: 200,
				hidden: hidden,
				text: r.as_label,
				name:  xname,
				xgroup: r.as_group,
				editor:editor,
				renderer: function(v) {
					if (lastSel!="") return lastSel;
					return v;
				}
			};
			if (masterCfg.readOnly)
			{
				delete(ret['editor']);
			}
			return ret;
		}

		var ret ={
			width: 200,
			hidden: hidden,
			text: r.as_label+' '+lang,
			name: xname,
			xgroup: r.as_group,
			editor:editor,
			renderer: function(v) {
				if (lastSel!="") return lastSel;
				return v;
			}
		};

		if (masterCfg.readOnly)
		{
			delete(ret['editor']);
		}

		return ret;
	},

	genComboByConfigHeader : function(mCfg,r,lang)
	{
		var hidden 		= false;
		if (r.as_useAsHeader == 'N') hidden = true;
		var disabled 	= false;
		var readOnly 	= (r.as_gui == 'READONLY');
		var data 		= this.checkLinearAssozDataArray(r.as_config)['l'];
		var data_lang 	= [];
		var be_lang = xredaktor.getInstance().getCurrentBElang();

		Ext.each(data,function(pack){
			if (pack[be_lang])
			{
				data_lang.push([pack['v'],pack[be_lang]]);
			} else
			{
				data_lang.push([pack['v'],pack['g']]);
			}
		},this);

		if (data.length == 0)
		{
			disabled = true;
		}

		var renderStore = new Ext.data.ArrayStore({
			fields: ['id','v'],
			data:data_lang
		});



		if (typeof lang == "undefined") {
			var ret = {
				width: 150,
				hidden: hidden,
				text: r.as_label,
				name:  r.as_name,
				xgroup: r.as_group,
				editor:{
					disabled:disabled,
					readOnly:readOnly,
					xtype: 'combobox',
					typeAhead: true,
					triggerAction: 'all',
					selectOnTab: true,
					store: data_lang,
					lazyRender: false,
					listClass: 'x-combo-list-small'
				},
				renderer: function(v) {
					try{
						return renderStore.getById(v).data.v;
					} catch (e) {
						//console.info('genCheckboxesByConfigHeader',v,'----',dbX);
					}
				}
			};

			if (mCfg.readOnly)
			{
				delete(ret['editor']);
			}
			return ret;
		}

		var ret =  {
			width: 150,
			hidden: hidden,
			text: r.as_label+' '+lang,
			name:  '_'+lang+'_'+r.as_name,
			xgroup: r.as_group,
			editor:{
				disabled:disabled,
				readOnly:readOnly,
				xtype: 'combobox',
				typeAhead: true,
				triggerAction: 'all',
				selectOnTab: true,
				store: data_lang,
				lazyRender: false,
				listClass: 'x-combo-list-small'
			},
			renderer: function(v) {
				try{
					return renderStore.getById(v).data.v;
				} catch (e) {
					//console.info('genCheckboxesByConfigHeader',v,'----',dbX);
				}
			}
		};

		if (mCfg.readOnly)
		{
			delete(ret['editor']);
		}
		return ret;
	},


	genComboByConfigHeaderYN : function(mCfg,r,lang)
	{
		var hidden 		= false;
		if (r.as_useAsHeader == 'N') hidden = true;
		var disabled 	= false;
		var readOnly 	= (r.as_gui == 'READONLY');
		var data 		= this.checkLinearAssozDataArray(r.as_config)['l'];
		var data_lang 	= [];
		var be_lang = xredaktor.getInstance().getCurrentBElang();

		data_lang.push(['N','Nein']);
		data_lang.push(['Y','Ja']);

		var renderStore = new Ext.data.ArrayStore({
			fields: ['id','v'],
			data:data_lang
		});

		if (typeof lang == "undefined") {
			var ret = {
				width: 150,
				hidden: hidden,
				text: r.as_label,
				name:  r.as_name,
				xgroup: r.as_group,
				editor:{
					disabled:disabled,
					readOnly:readOnly,
					xtype: 'combobox',
					typeAhead: true,
					triggerAction: 'all',
					selectOnTab: true,
					store: data_lang,
					lazyRender: false,
					listClass: 'x-combo-list-small'
				},
				renderer: function(v) {
					try{
						return renderStore.getById(v).data.v;
					} catch (e) {
						//console.info('genCheckboxesByConfigHeader',v,'----',dbX);
					}
				}
			};

			if (mCfg.readOnly)
			{
				delete(ret['editor']);
			}
			return ret;
		}

		var ret =  {
			width: 150,
			hidden: hidden,
			text: r.as_label+' '+lang,
			name:  '_'+lang+'_'+r.as_name,
			xgroup: r.as_group,
			editor:{
				disabled:disabled,
				readOnly:readOnly,
				xtype: 'combobox',
				typeAhead: true,
				triggerAction: 'all',
				selectOnTab: true,
				store: data_lang,
				lazyRender: false,
				listClass: 'x-combo-list-small'
			},
			renderer: function(v) {
				try{
					return renderStore.getById(v).data.v;
				} catch (e) {
					//console.info('genCheckboxesByConfigHeader',v,'----',dbX);
				}
			}
		};

		if (mCfg.readOnly)
		{
			delete(ret['editor']);
		}
		return ret;
	},

	genCheckboxesByConfigHeader : function(mCfg,fields,r,lang)
	{
		var disabled 	= false;
		var readOnly 	= (r.as_gui == 'READONLY');
		var be_lang 	= xredaktor.getInstance().getCurrentBElang();
		var data 		= this.checkLinearAssozDataArray(r.as_config)['l'];
		var hidden 		= false;

		if (r.as_useAsHeader == 'N') hidden = true;
		if (data.length == 0)
		{
			readOnly = true;
			var tmp = {
				v : -1
			};
			tmp[be_lang] = "<font color='red'>ACHTUNG: KONFIGURATION UNGÜLTIG</font>";
			data.push(tmp);
		}

		if (typeof lang == "undefined") {

			var cfg = [];
			Ext.each(data,function(pack,index){

				var dbX = [['on','X'],['off','-']];

				var renderStore = new Ext.data.ArrayStore({
					fields: ['id','v'],
					data: dbX
				});


				var tmp = {
					width: 100,
					hidden: hidden,
					text: r.as_label + ' - '+ pack[be_lang]+'',
					name:  r.as_name+'_'+pack['v'],
					xgroup: r.as_group,
					editor:{
						selectOnFocus:true,
						disabled:disabled,
						readOnly:readOnly,
						xtype: 'combobox',
						typeAhead: true,
						triggerAction: 'all',
						selectOnTab: true,
						store: dbX,
						lazyRender: false,
						listClass: 'x-combo-list-small'
					},
					renderer: function(v) {
						try{
							return renderStore.getById(v).data.v;
						} catch (e) {
							//console.info('genCheckboxesByConfigHeader',v,'----',dbX);
						}
					}
				};

				if (mCfg.readOnly)
				{
					delete(tmp.editor);
				}
				fields.push(tmp);
			},this);
			return cfg;
		}

		return;
		/*var cfg = [];
		Ext.each(data,function(pack,index){

		var tmp = {
		readOnly:readOnly,
		as_group: r.as_group,
		xtype: 'checkboxfield',
		name: '_'+lang+'_'+r.as_name+'_'+pack['v'],
		value: pack['v'],
		fieldLabel: (index==0) ? r.as_label : '',
		boxLabel: pack[be_lang]
		};

		if (index>0)
		{
		tmp.labelSeparator = '';
		tmp.hideEmptyLabel = false;
		}

		cfg.push(tmp);

		},this);
		return cfg;
		*/
	},

	getGenericEmptyText : function()
	{
		return "Nicht gesetzt";
	},

	buildHeaderObjectByAS : function(cfg,fields,r2)
	{
		var r = Ext.clone(r2);
		var be_lang 		= xredaktor.getInstance().getCurrentBElang().toUpperCase();
		var readOnly 		= false;
		var hidden 			= false;
		var emptyText		= this.getGenericEmptyText();

		if (r.as_useAsHeader == 'N') hidden = true;
		r.as_name = 'wz_'+r.as_name;

		if (cfg.readOnly) readOnly = true;

		/****************************************
		** CHECK CFG OBJECT
		***/

		cfg = this.getAndCheckInitCfg(cfg);

		if ((typeof cfg.langs == "undefined") || (cfg.langs.length == 0)) {
			cfg.langs= [];
			var langs_ = xredaktor.getInstance().getLanguageConfigFE(xredaktor.getInstance().getCurrentSiteId());
			Ext.each(langs_,function(l,i){
				cfg.langs.push(l.fel_ISO);
			},this);
		}

		if (r.as_label == "") r.as_label = '<font color="red">Keine Bezeichnung</font>';
		if (r.as_label == "") r.as_label = '<font color="red">Keine Bezeichnung und keine Variable</font>';

		if (cfg.langs.length == 0)
		{
			r.as_type_multilang = 'N';
		}

		try{
			switch (r.as_type)
			{
				case 'WIZARD':
				if (r.as_type_multilang == 'Y')
				{
					Ext.each(cfg.langs,function(lang){
						fields.push(this.genWizComboByConfigHeader(cfg,r,lang));
					},this);
				} else
				{
					fields.push(this.genWizComboByConfigHeader(cfg,r));
				}
				break;
				case 'RADIO':
				case 'COMBO':
				if (r.as_type_multilang == 'Y')
				{
					Ext.each(cfg.langs,function(lang){
						fields.push(this.genComboByConfigHeader(cfg,r,lang));
					},this);
				} else
				{
					fields.push(this.genComboByConfigHeader(cfg,r));
				}
				break;
				case 'YN':
				if (r.as_type_multilang == 'Y')
				{
					Ext.each(cfg.langs,function(lang){
						fields.push(this.genComboByConfigHeaderYN(cfg,r,lang));
					},this);
				} else
				{
					fields.push(this.genComboByConfigHeaderYN(cfg,r));
				}
				break;

				case 'CHECKBOX':
				if (r.as_type_multilang == 'Y')
				{
					Ext.each(cfg.langs,function(lang){
						this.genCheckboxesByConfigHeader(cfg,fields,r,lang);
					},this);
				} else
				{
					this.genCheckboxesByConfigHeader(cfg,fields,r);
				}
				break;

				case 'GEO-POINT':
				case 'TEXT':
				console.info(cfg);
				if (r.as_type_multilang == 'Y')
				{
					Ext.each(cfg.langs,function(lang) {
						if (be_lang != lang) hidden = true;
						var tmp = {
							emptyText: emptyText,
							hidden: hidden,
							xgroup: r.as_group,
							text: r.as_label + ' ' + lang,
							name:  '_'+lang+'_'+r.as_name,
							width: 150,
							editor:{
								selectOnFocus:true,
								readOnly:readOnly,
								xtype: 'textfield'
							}
						};
						if (readOnly) delete(tmp['editor']);
						fields.push(tmp);
					},this);
				} else
				{
					var tmp  = {
						emptyText: emptyText,
						hidden: hidden,
						xgroup: r.as_group,
						text: r.as_label,
						name:  r.as_name,
						width: 150,
						editor:{
							selectOnFocus:true,
							readOnly:readOnly,
							xtype: 'textfield'
						}
					};
					if (readOnly) delete(tmp['editor']);
					fields.push(tmp);
				}

				break;
				case 'TEXTAREA':
				if (r.as_type_multilang == 'Y')
				{
					Ext.each(cfg.langs,function(lang){
						if (be_lang != lang) hidden = true;
						fields.push({
							emptyText: emptyText,
							hidden:hidden,
							xgroup: r.as_group,
							text: r.as_label + ' ' + lang,
							name: '_'+lang+'_'+r.as_name,
							width: 150,
							editor:{
								selectOnFocus:true,
								readOnly:readOnly,
								xtype: 'textarea'
							}
						});
					},this);
				} else
				{
					fields.push({
						emptyText: emptyText,
						hidden: hidden,
						xgroup: r.as_group,
						text: r.as_label,
						name: r.as_name,
						width: 150,
						editor:{
							selectOnFocus:true,
							readOnly:readOnly,
							xtype: 'textarea'
						}
					});
				}
				break;

				case 'GEO-POINT':
				break;

				case 'HTML':
				if (r.as_type_multilang == 'Y')
				{
					Ext.each(cfg.langs,function(lang){
						if (be_lang != lang) hidden = true;
						fields.push({
							hidden:hidden,
							xgroup: r.as_group,
							text: r.as_label + ' ' + lang,
							name: '_'+lang+'_'+r.as_name,
							width: 200,
							xeditor:{
								selectOnFocus:true,
								readOnly:readOnly,
								xtype: 'htmleditor2',
								defaultValue:''
							}
						});
					},this);
				} else
				{
					fields.push({
						hidden: hidden,
						xgroup: r.as_group,
						text: r.as_label,
						name: r.as_name,
						width: 200,
						xeditor:{
							selectOnFocus:true,
							readOnly:readOnly,
							xtype: 'htmleditor2',
							defaultValue:''
						}
					});
				}
				break;
				case 'DATE':
				if (r.as_type_multilang == 'N')
				{
					fields.push({
						emptyText: emptyText,
						hidden: hidden,
						xgroup: r.as_group,
						text: r.as_label,
						name: r.as_name,
						editor: {
							selectOnFocus:true,
							readOnly:readOnly,
							altFormats: 'Y-m-d|d.m.Y',
							xtype: 'datefield'
						}
					});
				} else
				{
					Ext.each(cfg.langs,function(lang){
						var nameDate 	= '_'+lang+'_'+r.as_name;
						if (be_lang != lang) hidden = true;
						fields.push({
							emptyText: emptyText,
							hidden: hidden,
							xgroup: r.as_group,
							text: r.as_label + ' ' + lang,
							name: nameDate,
							editor: {
								selectOnFocus:true,
								readOnly:readOnly,
								altFormats: 'Y-m-d|d.m.Y',
								xtype: 'datefield'
							}
						});
					},this);
				}
				break;
				case 'TIME':
				if (r.as_type_multilang == 'N')
				{
					fields.push({
						emptyText: emptyText,
						hidden: hidden,
						xgroup: r.as_group,
						text: r.as_label,
						name: r.as_name,
						editor: {
							selectOnFocus:true,
							readOnly:readOnly,
							xtype: 'timefield'
						}
					});
				} else
				{
					Ext.each(cfg.langs,function(lang){
						if (be_lang != lang) hidden = true;
						fields.push({
							emptyText: emptyText,
							hidden: hidden,
							id: idTime,
							xgroup: r.as_group,
							text: r.as_label+' '+lang,
							name: '_'+lang+'_'+r.as_name,
							editor: {
								selectOnFocus:true,
								readOnly:readOnly,
								xtype: 'timefield'
							}
						});
					},this);
				}
				break;


				case 'INT':
				if (r.as_type_multilang == 'N')
				{
					fields.push({
						emptyText: emptyText,
						hidden: hidden,
						xgroup: r.as_group,
						text: r.as_label,
						name:  r.as_name,
						editor: {
							selectOnFocus:true,
							readOnly:readOnly,
							xtype: 'numberfield',
							allowDecimals:false
						}
					});
				} else
				{
					Ext.each(cfg.langs,function(lang){
						if (be_lang != lang) hidden = true;
						fields.push({
							emptyText: emptyText,
							hidden: hidden,
							xgroup: r.as_group,
							text: r.as_label+' '+lang,
							name:  '_'+lang+'_'+r.as_name,
							editor: {
								selectOnFocus:true,
								readOnly:readOnly,
								xtype: 'numberfield',
								allowDecimals:false
							}
						});
					},this);
				}
				break;
				case 'FLOAT':
				if (r.as_type_multilang == 'N')
				{
					fields.push({
						emptyText: emptyText,
						hidden: hidden,
						text: r.as_label,
						name:  r.as_name,
						editor: {
							selectOnFocus:true,
							readOnly:readOnly,
							xtype: 'numberfield',
							decimalSeparator: '.'
						}
					});
				} else
				{
					Ext.each(cfg.langs,function(lang){
						if (be_lang != lang) hidden = true;
						fields.push({
							emptyText: emptyText,
							hidden: hidden,
							xgroup: r.as_group,
							text: r.as_label+' '+lang,
							name:  '_'+lang+'_'+r.as_name,
							editor: {
								selectOnFocus:true,
								readOnly:readOnly,
								xtype: 'numberfield',
								decimalSeparator: '.'
							}
						});
					},this);
				}
				break;
				default:

				if (r.as_type_multilang == 'Y')
				{
					fields.push({
						emptyText: emptyText,
						name: r.as_name,
						text: r.as_label + ' DE',
						type: 'string',
						hidden: hidden,
						editor: {
							selectOnFocus:true,
							allowBlank: false,
							xtype: 'textfield'
						}
					});
				}
				else
				{
					fields.push({
						emptyText: emptyText,
						name: r.as_name,
						text: r.as_label,
						type: 'string',
						hidden: hidden,
						editor: {
							selectOnFocus:true,
							allowBlank: false,
							xtype: 'textfield'
						}
					});
				}

			}
		} catch (e) {
			console.info(e);
			console.info('header',r,'kann nicht gebaut werden...');
		};
	},

	genAtomListByConfig : function(cfg,items,r,lang)
	{



		var be_lang = xredaktor.getInstance().getCurrentBElang();
		var me 	 	= this;
		var slot   	= "all";
		var preFix 	= "";
		var ms 		= me.checkLinearAssozDataArray({});

		var a_wizard_as_p_name 		= 0;
		var a_wizard_as_p_nameASS 	= {};
		var tileRecord = "";

		if (typeof ms.autoIDOffset == 'undefined')
		{
			ms.autoIDOffset = 0;
		}

		if (lang != "")
		{
			slot   = lang;
			preFix = '_'+lang+'_';
		}

		var fp = false;
		var cfgFieldId = Ext.id();
		var height = 150;
		var formCfg = false;

		var cfgpanel = Ext.create('Ext.Panel',{
			region:'center',
			border:false,
			frame:false,
			html:''
		});
		var grid = xframe_pattern.getInstance().genMatrix({
			region:'west',
			autoID: true,
			autoIDOffset : ms.autoIDOffset,
			autoDestroyStore: false,
			title:'Datensätze',
			width: '60%',
			data: me.checkLinearAssozDataArray(ms)['l'],
			auto_flush: {
				scope: me,
				handler: function(oldCfg,newCfg)
				{

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
				fields: [
				{name: 'atom_cfg', 	text:'atom_cfg',	type:'string', header:false},
				{name: 'v', 		text:'InterneID',	type:'string', width: 200}
				//,{name: 'g', 		text:'Anzeige',		type:'string', width: 200, editor: {allowBlank: false,xtype: 'textfield'}}
				]
			}
		});

		var mstore = grid.getStore();

		if (cfg.grid)
		{
			cfg.grid.on('selectionchange',function(){
				try {
					fp.currentVid = undefined;
					mstore.removeAll();
					fp.getForm().reset();
					fp.injectData({});
				} catch (e) {

				}
			});
		}

		var gui = Ext.create('Ext.Panel',{
			layout:'border',
			border:false,
			split:true,
			height:height,
			items:[grid,cfgpanel]
		});

		function syncCurrentFormPanelInput()
		{
			if (typeof fp.currentVid == 'undefined')
			{
				return;
			}

			r 		= fp.currentVid;
			id		= r.v;
			vals 	= fp.getValues();
			var dbr = mstore.getById(id);
			if (dbr == null) {
				console.info('Letzter Record wurde gelöscht...');
			} else
			{
				dbr.data['atom_cfg'] = vals;
				dbr.set('g',vals[tileRecord]);
			}
		}

		grid.on('selectionchange',function(view,selections){
			cfgpanel.setDisabled(!(selections.length == 1));
			if (selections.length == 1)
			{
				var r=false,id=false,vals=false,dbr=false;

				if (typeof fp.currentVid != 'undefined')
				{
					console.info('SYNC!!!!');
					syncCurrentFormPanelInput();
				}

				fp.getForm().reset();

				r = selections[0].data;
				fp.currentVid = r;
				id = r.v;

				dbr = mstore.getById(id);
				if (dbr == null)
				{
					return;
				}
				vals = dbr.data['atom_cfg'];
				if (typeof vals == 'undefined') {
					vals = {};
				}

				fp.injectData(vals);
				cfgpanel.setDisabled(false);
			} else
			{
				cfgpanel.setDisabled(true);
			}

		},this,{delay:1});

		var gui_Loader = Ext.create('Ext.Panel',{
			layout:'fit',
			height:height,
			html:''
		});


		gui_Loader.on('afterrender',function(){

			var myMask = false;

			if (!Ext.isNumeric(r.as_config))
			{
				myMask = new Ext.LoadMask({target:gui_Loader,msg:"<font color='red'>Konfiguration ist noch für '<b>"+r.as_label+"</b>' nicht gesetzt bzw. Ungültig.</font>"});
				myMask.show();
				return;
			}

			myMask = new Ext.LoadMask({target:gui_Loader,msg:"Lade Konfiguration ..."});
			myMask.show();

			xframe.ajax({
				scope:this,
				url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/getMultiFormDataByAtomConfig',
				params : {
					a_id: r.as_config
				},
				success: function(json)
				{
					try{
						a_wizard_as_p_name = json.atom.a_wizard_as_p_name;

						Ext.each(json.settings,function(f){
							if (f.as_id == a_wizard_as_p_name) {
								a_wizard_as_p_nameASS = f;
								var preFIX = "";
								if (f.as_type_multilang == 'Y')
								{
									preFIX = '_'+be_lang+'_';
								}
								tileRecord = preFIX+f.as_name;
								console.info('tileRecord',tileRecord);
							}
						},this);

						fp = this.doDefaultLayoutOfFields({
							json : json,
							normButtons : []
						});

						formCfg = fp.formCfg;

						fp.on('afterrender',function(){

							console.info('Höhe',fp.getHeight());
							var minHeight = 800;
							var h = fp.getHeight()+45;
							if (h < minHeight) h = minHeight;

							gui_Loader.setHeight(h);
							gui_Loader.doLayout();
						},this,{delay:100});

						myMask.hide();

						cfgpanel.removeAll();
						cfgpanel.add(fp);
						cfgpanel.doLayout();
						cfgpanel.setDisabled('true');

						gui_Loader.removeAll();
						gui_Loader.add(gui);
						gui_Loader.doLayout();

					} catch (e)
					{
						console.info('getMultiFormDataByAtomConfig::success_handler',e);
					}
				}
			});

		},this);

		/* ********************************************* FORM *************************************************************** */

		function getCurrentSettings()
		{
			var records = mstore.getRange();
			ms.autoIDOffset = grid.getAutoIDOffset();
			ms.a = {};
			ms.l = [];
			Ext.each(records,function(r){
				ms.a[r.data.v] = r.data;
				ms.l.push(r.data);
			},this);

			var jsonCfg = Ext.encode(ms);
			console.info('jsonCfg',jsonCfg);
			return jsonCfg;
		}

		gui_Loader.as_group = r.as_group;

		var discardEvent_CHANGE = false;

		items[slot].push({
			id: cfgFieldId,
			as_group: r.as_group,
			xtype:'hidden',
			name: preFix+r.as_name,
			listeners : {
				afterrender : function(el){
					cfg.finalForm.on('updateFieldsForSaveAction',function() {
						syncCurrentFormPanelInput();
						discardEvent_CHANGE = true;
						el.setValue(getCurrentSettings()); // FOR SURE ....
						discardEvent_CHANGE = false;
					},this);
				},




				change : function(tthis,newValue) {
					console.info('change');
					if (discardEvent_CHANGE) return;
					mstore.removeAll();

					fp.currentVid = undefined;

					var data = Ext.decode(newValue,true);
					if (data == null)
					{
						return;
					} else
					{
						ms.autoIDOffset = Ext.clone(data.autoIDOffset);
						grid.setAutoIDOffset(data.autoIDOffset);

						mstore.loadData(Ext.clone(data.l));
						Ext.each(data.l,function(r){
							var id = r.v;
							var dr = mstore.getById(id);
							dr.data['atom_cfg'] = r['atom_cfg'];
						},this)
					}
				}
			}
		});


		items[slot].push(gui_Loader);
		return;
	},

	genAtomListByConfig2 : function(cfg,items,r,lang)

	{



		var be_lang = xredaktor.getInstance().getCurrentBElang();
		var me 	 	= this;
		var slot   	= "all";
		var preFix 	= "";
		var ms 		= me.checkLinearAssozDataArray({});

		var a_wizard_as_p_name 		= 0;
		var a_wizard_as_p_nameASS 	= {};
		var tileRecord = "";

		if (typeof ms.autoIDOffset == 'undefined')
		{
			ms.autoIDOffset = 0;
		}

		if (lang != "")
		{
			slot   = lang;
			preFix = '_'+lang+'_';
		}

		var fp = false;
		var cfgFieldId = Ext.id();
		var height = 150;
		var formCfg = false;

		var cfgpanel = Ext.create('Ext.Panel',{
			region:'center',
			border:false,
			frame:false,
			html:''
		});
		var grid = xframe_pattern.getInstance().genMatrix({
			region:'west',
			autoID: true,
			autoIDOffset : ms.autoIDOffset,
			autoDestroyStore: false,
			title:'Datensätze',
			width: '60%',
			data: me.checkLinearAssozDataArray(ms)['l'],
			auto_flush: {
				scope: me,
				handler: function(oldCfg,newCfg)
				{

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
				fields: [
				{name: 'atom_cfg', 	text:'atom_cfg',	type:'string', header:false},
				{name: 'v', 		text:'InterneID',	type:'string', width: 200},
				{name: 'g', 		text:'Anzeige',		type:'string', width: 200, editor: {allowBlank: false,xtype: 'textfield'}}
				]
			}
		});

		var mstore = grid.getStore();

		cfg.grid.on('selectionchange',function(){
			mstore.removeAll();
			fp.getForm().reset();
			fp.injectData({});
		});

		var gui = Ext.create('Ext.Panel',{
			layout:'border',
			border:false,
			split:true,
			height:height,
			items:[grid,cfgpanel]
		});

		function syncCurrentFormPanelInput()
		{
			if (typeof fp.currentVid == 'undefined')
			{
				return;
			}

			r 		= fp.currentVid;
			id		= r.v;
			vals 	= fp.getValues();
			var dbr = mstore.getById(id);
			if (dbr == null) {
				console.info('Letzter Record wurde gelöscht...');
			} else
			{
				dbr.data['atom_cfg'] = vals;
				dbr.set('g',vals[tileRecord]);
			}
		}

		grid.on('selectionchange',function(view,selections){

			cfgpanel.setDisabled(!(selections.length == 1));
			if (selections.length == 1)
			{
				var r=false,id=false,vals=false,dbr=false;

				if (typeof fp.currentVid != 'undefined')
				{
					syncCurrentFormPanelInput();
				}

				fp.getForm().reset();

				r = selections[0].data;
				fp.currentVid = r;
				id = r.v;

				dbr = mstore.getById(id);
				if (dbr == null)
				{
					return;
				}
				vals = dbr.data['atom_cfg'];
				if (typeof vals == 'undefined') {
					vals = {};
				}

				fp.injectData(vals);
				cfgpanel.setDisabled(false);
			} else
			{
				cfgpanel.setDisabled(true);
			}

		},this,{delay:1});

		var gui_Loader = Ext.create('Ext.Panel',{
			layout:'fit',
			height:height,
			html:''
		});


		gui_Loader.on('afterrender',function(){

			var myMask = false;

			if (!Ext.isNumeric(r.as_config))
			{
				myMask = new Ext.LoadMask({target:gui_Loader,msg:"<font color='red'>Konfiguration ist noch für '<b>"+r.as_label+"</b>' nicht gesetzt bzw. Ungültig.</font>"});
				myMask.show();
				return;
			}

			myMask = new Ext.LoadMask({target:gui_Loader,msg:"Lade Konfiguration ..."});
			myMask.show();

			xframe.ajax({
				scope:this,
				url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/getMultiFormDataByAtomConfig',
				params : {
					a_id: r.as_config
				},
				success: function(json)
				{
					try{
						a_wizard_as_p_name = json.atom.a_wizard_as_p_name;

						Ext.each(json.settings,function(f){
							if (f.as_id == a_wizard_as_p_name) {
								a_wizard_as_p_nameASS = f;
								var preFIX = "";
								if (f.as_type_multilang == 'Y')
								{
									preFIX = '_'+be_lang+'_';
								}
								tileRecord = preFIX+f.as_name;
								console.info('tileRecord',tileRecord);
							}
						},this);

						fp = this.doDefaultLayoutOfFields({
							json : json,
							normButtons : []
						});

						formCfg = fp.formCfg;

						fp.on('afterrender',function(){

							console.info('Höhe',fp.getHeight());
							var minHeight = 800;
							var h = fp.getHeight()+45;
							if (h < minHeight) h = minHeight;

							gui_Loader.setHeight(h);
							gui_Loader.doLayout();
						},this,{delay:100});

						myMask.hide();

						cfgpanel.removeAll();
						cfgpanel.add(fp);
						cfgpanel.doLayout();
						cfgpanel.setDisabled('true');

						gui_Loader.removeAll();
						gui_Loader.add(gui);
						gui_Loader.doLayout();

					} catch (e)
					{
						console.info('getMultiFormDataByAtomConfig::success_handler',e);
					}
				}
			});

		},this);

		/* ********************************************* FORM *************************************************************** */

		function getCurrentSettings()
		{
			var records = mstore.getRange();
			ms.autoIDOffset = grid.getAutoIDOffset();
			ms.a = {};
			ms.l = [];
			Ext.each(records,function(r){
				ms.a[r.data.v] = r.data;
				ms.l.push(r.data);
			},this);

			var jsonCfg = Ext.encode(ms);
			console.info('jsonCfg',jsonCfg);
			return jsonCfg;
		}

		gui_Loader.as_group = r.as_group;

		var discardEvent_CHANGE = false;

		items[slot].push({
			id: cfgFieldId,
			as_group: r.as_group,
			xtype:'hidden',
			name: preFix+r.as_name,
			listeners : {
				afterrender : function(el){
					cfg.finalForm.on('updateFieldsForSaveAction',function() {
						syncCurrentFormPanelInput();
						discardEvent_CHANGE = true;
						el.setValue(getCurrentSettings()); // FOR SURE ....
						discardEvent_CHANGE = false;
					},this);
				},




				change : function(tthis,newValue) {
					console.info('change');
					if (discardEvent_CHANGE) return;
					mstore.removeAll();
					var data = Ext.decode(newValue,true);
					if (data == null)
					{
						return;
					} else
					{
						ms.autoIDOffset = Ext.clone(data.autoIDOffset);
						grid.setAutoIDOffset(data.autoIDOffset);

						mstore.loadData(Ext.clone(data.l));
						Ext.each(data.l,function(r){
							var id = r.v;
							var dr = mstore.getById(id);
							dr.data['atom_cfg'] = r['atom_cfg'];
						},this)
					}
				}
			}
		});


		items[slot].push(gui_Loader);
		return;
	},

	convertLinearData2ArrayStore : function(data,be_lang)
	{
		var data_lang = [];
		Ext.each(data,function(pack){
			data_lang.push([pack['v'],pack[be_lang]]);
		},this);
		return data_lang;
	},

	genComboByConfig : function(cfg,r,lang)
	{
		if (typeof cfg.patchCombos == "undefined") cfg.patchCombos = {};


		var initSettings = Ext.decode(r.as_init,true);
		if (initSettings != null)
		{
			var initVal = initSettings[r.as_name];
			cfg.patchCombos[r.as_name] = initSettings;
		} else
		{
			cfg.patchCombos[r.as_name] = null;
		}

		var disabled = false;
		var readOnly = (r.as_gui == 'READONLY');
		var data = this.checkLinearAssozDataArray(r.as_config)['l'];
		var data_lang = [];
		var be_lang = xredaktor.getInstance().getCurrentBElang();

		Ext.each(data,function(pack){
			if (pack[be_lang])
			{
				data_lang.push([pack['v'],pack[be_lang]]);
			} else
			{
				if (pack['g']) data_lang.push([pack['v'],pack['g']]);
				else data_lang.push([pack['v'],pack['v']]);
			}

		},this);

		if (data.length == 0)
		{
			disabled = true;
		}

		if (typeof lang == "undefined") {
			return {
				disabled:disabled,
				readOnly:readOnly,
				as_group: r.as_group,
				xtype: 'combobox',
				typeAhead: true,
				triggerAction: 'all',
				selectOnTab: true,
				store: data_lang,
				lazyRender: true,
				listClass: 'x-combo-list-small',
				fieldLabel: r.as_label,
				maxWidth: 300,
				name:  r.as_name,
				value: initVal
			};
		}

		return {
			disabled:disabled,
			maxWidth: 300,
			readOnly:readOnly,
			as_group: r.as_group,
			xtype: 'combobox',
			typeAhead: true,
			triggerAction: 'all',
			selectOnTab: true,
			store: data_lang,
			lazyRender: true,
			listClass: 'x-combo-list-small',
			fieldLabel: r.as_label,
			name:  '_'+lang+'_'+r.as_name,
			value: initVal
		};

	},

	genComboByConfigYN : function(cfg,r,lang)
	{
		if (typeof cfg.patchCombos == "undefined") cfg.patchCombos = {};


		var initSettings = Ext.decode(r.as_init,true);
		if (initSettings != null)
		{
			var initVal = initSettings[r.as_name];
			cfg.patchCombos[r.as_name] = initSettings;
		} else
		{
			cfg.patchCombos[r.as_name] = null;
		}

		var disabled = false;
		var readOnly = (r.as_gui == 'READONLY');
		var data = this.checkLinearAssozDataArray(r.as_config)['l'];
		var data_lang = [];
		var be_lang = xredaktor.getInstance().getCurrentBElang();

		data_lang.push(['N','Nein']);
		data_lang.push(['Y','Ja']);

		if (typeof lang == "undefined") {
			return {
				disabled:disabled,
				readOnly:readOnly,
				as_group: r.as_group,
				xtype: 'combobox',
				typeAhead: true,
				triggerAction: 'all',
				selectOnTab: true,
				store: data_lang,
				lazyRender: true,
				listClass: 'x-combo-list-small',
				fieldLabel: r.as_label,
				maxWidth: 300,
				name:  r.as_name,
				value: initVal
			};
		}

		return {
			disabled:disabled,
			maxWidth: 300,
			readOnly:readOnly,
			as_group: r.as_group,
			xtype: 'combobox',
			typeAhead: true,
			triggerAction: 'all',
			selectOnTab: true,
			store: data_lang,
			lazyRender: true,
			listClass: 'x-combo-list-small',
			fieldLabel: r.as_label,
			name:  '_'+lang+'_'+r.as_name,
			value: initVal
		};

	},

	genRadiosByConfig : function(cfg,r,lang)
	{
		var disabled 	= false;
		var readOnly 	= (r.as_gui == 'READONLY');
		var be_lang 	= xredaktor.getInstance().getCurrentBElang();
		var data 		= this.checkLinearAssozDataArray(r.as_config)['l'];

		if (typeof cfg.patchRadios == "undefined") cfg.patchRadios = {};
		var initSettings = Ext.decode(r.as_init,true);
		if (initSettings != null)
		{
			var initVal = initSettings[r.as_name];
			cfg.patchRadios[r.as_name] = initSettings;
		} else
		{
			cfg.patchRadios[r.as_name] = null;
		}

		if (data.length == 0)
		{
			readOnly = true;
			var tmp = {
				v : -1
			};
			tmp[be_lang] = "<font color='red'>ACHTUNG: KONFIGURATION UNGÜLTIG</font>";
			data.push(tmp);
		}

		if (typeof lang == "undefined") {

			var cfg = [];
			Ext.each(data,function(pack,index){

				var boxLabel = pack['v'];
				if (pack['g']) 		boxLabel = pack['g'];
				if (pack[be_lang]) 	boxLabel = pack[be_lang];

				var tmp = {
					disabled:disabled,
					readOnly:readOnly,
					as_group: r.as_group,
					xtype: 'radiofield',
					name: r.as_name,
					inputValue: pack['v'],
					fieldLabel: (index==0) ? r.as_label : '',
					boxLabel: boxLabel
				};

				if (index>0)
				{
					tmp.labelSeparator = '';
					tmp.hideEmptyLabel = false;
				}

				cfg.push(tmp);

			},this);
			return cfg;
		}


		var data_lang = [];


		var cfg = [];
		Ext.each(data,function(pack,index){

			var boxLabel = pack['v'];
			if (pack['g']) 		boxLabel = pack['g'];
			if (pack[be_lang]) 	boxLabel = pack[be_lang];

			var tmp = {
				disabled:disabled,
				readOnly:readOnly,
				as_group: r.as_group,
				xtype: 'radiofield',
				name: '_'+lang+'_'+r.as_name,
				inputValue: pack['v'],
				fieldLabel: (index==0) ? r.as_label : '',
				boxLabel: boxLabel
			};

			if (index>0)
			{
				tmp.labelSeparator = '';
				tmp.hideEmptyLabel = false;
			}

			cfg.push(tmp);

		},this);
		return cfg;
	},

	genCheckboxesByConfig : function(masterCfg,r,lang)
	{
		var readOnly = (r.as_gui == 'READONLY');
		var be_lang = xredaktor.getInstance().getCurrentBElang();
		var data = this.checkLinearAssozDataArray(r.as_config)['l'];

		if (data.length == 0)
		{
			readOnly = true;
			var tmp = {
				v : -1
			};
			tmp[be_lang] = "<font color='red'>ACHTUNG: KONFIGURATION UNGÜLTIG</font>";
			data.push(tmp);
		}

		if (typeof lang == "undefined") {

			var cfg = [];
			Ext.each(data,function(pack,index){

				var xxname = r.as_name+'_'+pack['v'];
				masterCfg.filterNames[xxname] = 1;

				var boxLabel = pack['v'];
				if (pack['g']) 		boxLabel = pack['g'];
				if (pack[be_lang])	boxLabel = pack[be_lang];

				var tmp = {
					readOnly:readOnly,
					as_group: r.as_group,
					xtype: 'checkboxfield',
					name: xxname,
					value: pack['v'],
					fieldLabel: (index==0) ? r.as_label : '',
					boxLabel: boxLabel
				};

				if (index>0)
				{
					tmp.labelSeparator = '';
					tmp.hideEmptyLabel = false;
				}

				cfg.push(tmp);

			},this);
			return cfg;
		}

		var cfg = [];
		Ext.each(data,function(pack,index){

			var xxname = '_'+lang+'_'+r.as_name+'_'+pack['v'];
			masterCfg.filterNames[xxname] = 1;

			var tmp = {
				readOnly:readOnly,
				as_group: r.as_group,
				xtype: 'checkboxfield',
				name: xxname,
				value: pack['v'],
				fieldLabel: (index==0) ? r.as_label : '',
				boxLabel: pack[be_lang]
			};

			if (index>0)
			{
				tmp.labelSeparator = '';
				tmp.hideEmptyLabel = false;
			}

			cfg.push(tmp);

		},this);
		return cfg;

	},


	genFormPanelViewElement_wizard : function(cfg,items,r,lang)
	{
		var me			= this;
		var disabled 	= false;
		var readOnly 	= (r.as_gui == 'READONLY');
		var be_lang 	= xredaktor.getInstance().getCurrentBElang();
		var slot   		= "all";
		var preFix 		= "";


		if (!Ext.isNumeric(r.as_config))
		{
			readOnly = true;
			disabled = true;
		}

		if (lang != "")
		{
			slot   = lang;
			preFix = '_'+lang+'_';
		}

		var field_text 	= Ext.id();
		var field_pid 	= Ext.id();

		items[slot].push({
			as_group: r.as_group,
			id:field_pid,
			xtype: 'hidden',
			name: preFix+r.as_name,
			listeners: {
				change: function(tf,v)
				{
					xframe.ajax({
						scope:this,
						url: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/getDataRecordByIdName',
						params : {
							id: v,
							domagic: r.as_config,
							lang: be_lang
						},
						success: function(json)
						{
							Ext.getCmp(field_text).setValue(json.name);
						}
					});
				}
			}
		});

		var butts = {
			xtype: 'container',
			layout: 'hbox',
			margin: '0 0 10',
			items: [{
				disabled:readOnly,
				xtype: 'button',
				scope: this,
				iconCls:'xf_select',
				text: 'Datensatz auswählen',
				handler: function() {

					/*
					xredaktor_gui.getInstance().chooseWizardDataRecord({
					cb_ok_scope : me,
					cb_ok_fn : function(){

					}
					});
					*/

					xframe.ajax({
						scope:this,
						url: '/xgo/xplugs/xredaktor/ajax/atoms/getWizardSettings',
						params : {
							a_id:r.as_config
						},
						success: function(json)
						{
							try{

								var as_type_multilang 	= 'N';
								//var name 				= 'wz_id'+json.ass[json.record.a_wizard_as_p_name]['as_name'];
								var name 				= 'wz_id';
								//var text 				= json.ass[json.record.a_wizard_as_p_name]['as_label'];
								var text 				= 'wz_id';


								if (as_type_multilang == 'Y')
								{
									name = '_'+be_lang+'_'+name;
									text = text+ ' '+be_lang;
								}

								var newSelection = '';
								var win = false;
								var width 	= 	window.innerWidth*0.9;
								var height 	=  	window.innerHeight*0.9;

								width 	= 640;

								var fieldsOfHeader = [
								{name: 'wz_id',		text:'Interne Nummer',		type:'int',		hidden: true,  	header:false}
								//{name: name,		text:text,					type:'string',	hidden: false,  header:true}
								];

								var grid = false;
								var dummyCfgHolder = {
									grid:grid
								};

								Ext.iterate(json.ass,function(as_id,r){
									console.info(as_id,r);
									me.buildHeaderObjectByAS(dummyCfgHolder,fieldsOfHeader,r);
								},this);

								console.info(fieldsOfHeader);


								grid = this.grid = xframe_pattern.getInstance().genGrid({
									region:'west',
									forceFit:true,
									border:false,
									split: true,
									tools:[],
									pager:true,
									justDblClick:true,
									xstore: {
										load: 	'/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/load',
										loadParams : {
											domagic : r.as_config
										},
										remove: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/remove',
										update: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/update',
										insert: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/insert',
										insertParams : {
											domagic :  r.as_config
										},
										updateParams : {
											domagic :  r.as_config
										},
										move: 	'/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/move',
										pid: 	'wz_id',
										fields: fieldsOfHeader
									}
								});

								dummyCfgHolder.grid = grid;

								grid.getStore().load();
								grid.on('itemdblclick',function(view,record) {
									Ext.getCmp(field_pid).suspendEvents();
									Ext.getCmp(field_pid).setValue(record.data.wz_id);
									Ext.getCmp(field_pid).resumeEvents();
									Ext.getCmp(field_text).setValue(record.data[name]);
									win.destroy();
								},this);

								win = Ext.create('widget.window', {
									border:false,
									iconCls:'xf_select',
									title: 'Datensatz wählen...',
									closable: true,
									width: width,
									height: height,
									modal:true,
									layout: 'fit',
									items: [grid]
								});
								win.show();
							} catch (e)
							{
								console.info('getWizardSettings::success_handler',e);
							}
						}
					});
				}
			}, {
				xtype: 'component',
				width: 10
			}, {
				disabled:readOnly,
				iconCls:'xf_select_del',
				xtype: 'button',
				scope: this,
				text: 'Datensatz entfernen',
				handler: function() {
					Ext.getCmp(field_pid).suspendEvents();
					Ext.getCmp(field_pid).setValue('');
					Ext.getCmp(field_text).setValue('');
					Ext.getCmp(field_pid).resumeEvents();
				}
			}]
		};

		items[slot].push({
			as_group: r.as_group,
			xtype:'fieldset',
			title: r.as_label + ((!disabled) ? '' : ' - <font color="red"><b>ACHTUNG: NOCH NICHT KONFIGURIERT</b></font>'),
			defaultType: 'textfield',
			collapsed: false,
			layout: 'anchor',
			defaults: {
				anchor: '100%'
			},
			items :[{
				fieldLabel: 'Datensatz',
				readOnly:true,
				id:field_text
			},butts]
		});
	},





	/*******************************************************
	**	genWIZARD2WIZARDByConfig
	**
	****/




	genWIZARD2WIZARDByConfig : function(cfg,items,r,lang)
	{
		var me				= this;
		var disabled 		= false;
		var readOnly 		= (r.as_gui == 'READONLY');
		var be_lang 		= xredaktor.getInstance().getCurrentBElang();
		var slot   			= "all";
		var preFix 			= "";
		var height			= 400;
		var n2n_cfg_as_id	= r.as_id;

		if (lang != "")
		{
			slot   = lang;
			preFix = '_'+lang+'_';
		}

		var field_text 	= Ext.id();
		var field_pid 	= Ext.id();

		var gui_Loader = Ext.create('Ext.Panel',{
			layout:'fit',
			height:height,
			html:''
		});

		console.info("getN2NSettings - CONFIG",r.as_config);

		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/wizards_n2n_grid/getN2NSettings',
			params : {
				n2n_cfg_as_id: n2n_cfg_as_id
			},
			stateless : function(state,json)
			{
				console.info('state',state);

				if (!state)
				{
					return;
				}

				var fields = [
				{name: 'wz_id',		text:'Interne Nummer',		type:'int',		hidden: false, 	header:true, width: 10},
				{name: 'checkId',	text:'Checked Interne Nummer',		type:'int',		hidden: true, 	header:true, width: 10},
				{name: 'wz_n2n_check',	text:'Zugewiesen',		type:'bool',	hidden: false, 	header:true}
				];

				var grid = false;
				var gridHeaderCfgHelper = {
					grid:grid
					//,readOnly:true
				};
				var fields2 = [];


				Ext.each(json.settings,function(r){
					this.buildHeaderObjectByAS(gridHeaderCfgHelper,fields,r);
					//delete(fields[fields.length-1]['editor']);
					fields[fields.length-1].text = fields[fields.length-1].text + ' ['+ r.as_id +']';
				},this);

				var wzListScopeID = 0;

				grid = xframe_pattern.getInstance().genGrid({
					region:'west',
					search:true,
					forceFit:true,
					border:false,
					split: true,
					records_move:false,
					pager:true,
					title: '',
					plugin_numLines: false,
					button_add: false,
					button_del: false,
					xstore: {
						load: 	'/xgo/xplugs/xredaktor/ajax/wizards_n2n_grid/load',
						loadParams : {
							n2n_cfg_as_id: n2n_cfg_as_id
						},
						remove: '/xgo/xplugs/xredaktor/ajax/wizards_n2n_grid/remove',
						updateCheck: '/xgo/xplugs/xredaktor/ajax/wizards_n2n_grid/updateCheck',
						update: '/xgo/xplugs/xredaktor/ajax/wizards_n2n_grid/update',
						insert: '/xgo/xplugs/xredaktor/ajax/wizards_n2n_grid/insert',
						insertParams : {
							n2n_cfg_as_id : n2n_cfg_as_id
						},
						updateParams : {
							n2n_cfg_as_id : n2n_cfg_as_id
						},
						updateParamsByRecordValue : {
							checkId : 'checkId'
						},
						removeParams : {
							n2n_cfg_as_id : n2n_cfg_as_id
						},
						move: 	'/xgo/xplugs/xredaktor/ajax/wizards_n2n_grid/move',
						pid: 	'wz_id',
						fields: fields
					}
				});


				gridHeaderCfgHelper.grid = grid;
				grid.getStore().load();

				gui_Loader.removeAll();
				gui_Loader.add(grid);
				gui_Loader.doLayout();

				var wz_id = -1;



				// FIX FOR 4.0.7
				grid.checkchange = function(e,gridColumn,recordId,checked)
				{
					var record = grid.getStore().getAt(recordId);
					var params = Ext.clone(grid.initSettings.xstore.updateParams) || {};
					params.id = record.data[record.idProperty];
					params.idProperty = record.idProperty;
					params.field = gridColumn.dataIndex;
					params.value = checked ? 'on' : 'off';
					params.wzListScopeID = wz_id;

					xframe.ajax({
						jsonFeedback: true,
						scope: this,
						url: grid.initSettings.xstore.updateCheck,
						params: params,
						success: function(json){
							if (json.record == false)
							{
								xframe.alert('ACHTUNG','Änderung wurde vom Server zurückgewiesen!');
								store.load();
							} else
							{
								if (json.reload)
								{
									store.load();
								}
								if (typeof cfg.updateHandler == 'function') cfg.updateHandler();
							}
						},
						failure: function(json){
							store.load();
						},
						failure_msg: xframe.lang('UPDATE_OF_DATA_FAILED')
					});
				}

				grid.on('checkchange',function(gridColumn,record,checked){
					return;
					console.info('checkchange',arguments);
					var params = Ext.clone(grid.initSettings.xstore.updateParams) || {};
					params.id = record.data[record.idProperty];
					params.idProperty = record.idProperty;
					params.field = gridColumn.dataIndex;
					params.value = checked ? 'on' : 'off';
					params.wzListScopeID = wz_id;

					xframe.ajax({
						jsonFeedback: true,
						scope: this,
						url: grid.initSettings.xstore.updateCheck,
						params: params,
						success: function(json){
							if (json.record == false)
							{
								xframe.alert('ACHTUNG','Änderung wurde vom Server zurückgewiesen!');
								store.load();
							} else
							{
								if (json.reload)
								{
									store.load();
								}
								if (typeof cfg.updateHandler == 'function') cfg.updateHandler();
							}
						},
						failure: function(json){
							store.load();
						},
						failure_msg: xframe.lang('UPDATE_OF_DATA_FAILED')
					});


				},this);

				cfg.grid.on('selectionchange',function(v,sel){
					grid.setDisabled((sel.length == 0));
					if (sel.length == 0) return;
					wz_id = sel[0].data.wz_id;
					wzListScopeID = wz_id;
					grid.store.proxy.extraParams['wzListScopeID'] = wz_id;
					grid.store.load();
				},this);


			}
		});

		items[slot].push({
			as_group: r.as_group,
			xtype:'fieldset',
			title: r.as_label + ((!disabled) ? '' : ' - <font color="red"><b>ACHTUNG: NOCH NICHT KONFIGURIERT</b></font>'),
			defaultType: 'textfield',
			collapsed: false,
			layout: 'anchor',
			defaults: {
				anchor: '100%'
			},
			items :[gui_Loader]
		});

	},


















	genWAttributeByConfig : function(cfg,items,r,lang)
	{

		var me			= this;
		var disabled 	= false;
		var readOnly 	= (r.as_gui == 'READONLY');
		var be_lang 	= xredaktor.getInstance().getCurrentBElang();
		var slot   		= "all";
		var preFix 		= "";

		if (lang != "")
		{
			slot   = lang;
			preFix = '_'+lang+'_';
		}

		var field_text 	= Ext.id();
		var field_pid 	= Ext.id();

		items[slot].push({
			as_group: r.as_group,
			id: field_pid,
			xtype: 'hidden',
			name: preFix+r.as_name,
			listeners: {
				change: function(tf,v)
				{
					if (v == "") {
						Ext.getCmp(field_text).setValue('');
						return true;
					}

					try{
						xframe.ajax({
							scope:this,
							url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/getDataRecordFieldByIdName',
							params : {
								id: v,
								lang: be_lang
							},
							success: function(json)
							{
								Ext.getCmp(field_text).setValue('WZ: '+json.atom.a_name+' - Feld: '+json.as.as_name);
							}
						});
					} catch (e) {console.info('error',e);}
				}
			}
		});

		var butts = {
			xtype: 'container',
			layout: 'hbox',
			margin: '0 0 10',
			items: [{
				disabled:readOnly,
				xtype: 'button',
				scope: this,
				iconCls:'xf_select',
				text: 'Datensatzfeld auswählen',
				handler: function() {

					try{

						var newSelection 	= '';
						var win 			= false;
						var width 			= window.innerWidth*0.9;
						var height 			= window.innerHeight*0.9;
						width 				= 640;

						var fieldsOfHeader = [
						{name: 'as_id',		text:'Interne Nummer',		type:'int',		hidden: false, 	header:true},
						{name: 'as_a_id',	text:'Wizard',				type:'string',	hidden: false,  header:true},
						{name: 'as_name',	text:'Interner Name',		type:'string',	hidden: false,  header:true}
						];

						var grid = false;
						var dummyCfgHolder = {
							grid:grid
						};

						grid = xframe_pattern.getInstance().genGrid({
							region:'west',
							forceFit:true,
							border:false,
							plugin_numLines:false,
							split: true,
							tools:[],
							pager:true,
							justDblClick:true,
							xstore: {
								load: 	'/xgo/xplugs/xredaktor/ajax/all_atoms_settings/load',
								remove: '/xgo/xplugs/xredaktor/ajax/all_atoms_settings/remove',
								update: '/xgo/xplugs/xredaktor/ajax/all_atoms_settings/update',
								insert: '/xgo/xplugs/xredaktor/ajax/all_atoms_settings/insert',
								move: 	'/xgo/xplugs/xredaktor/ajax/all_atoms_settings/move',
								pid: 	'wz_id',
								params: {
									a_s_id: xredaktor.getInstance().getCurrentSiteId()
								},
								fields: fieldsOfHeader
							}
						});

						dummyCfgHolder.grid = grid;

						grid.getStore().load();
						grid.on('itemdblclick',function(view,record) {
							Ext.getCmp(field_pid).suspendEvents();
							Ext.getCmp(field_pid).setValue(record.data.as_id);
							Ext.getCmp(field_pid).resumeEvents();
							Ext.getCmp(field_text).setValue(record.data.as_name);
							win.destroy();
						},this);

						win = Ext.create('widget.window', {
							border:false,
							iconCls:'xf_select',
							title: 'Wizard Attribut',
							closable: true,
							width: width,
							height: height,
							modal:true,
							layout: 'fit',
							items: [grid]
						});
						win.show();
					} catch (e)
					{
						console.info('genWAttributeByConfig::success_handler',e);
					}
				}


			}, {
				xtype: 'component',
				width: 10
			}, {
				disabled:readOnly,
				iconCls:'xf_select_del',
				xtype: 'button',
				scope: this,
				text: 'Datensatz entfernen',
				handler: function() {
					Ext.getCmp(field_pid).suspendEvents();
					Ext.getCmp(field_pid).setValue('');
					Ext.getCmp(field_text).setValue('');
					Ext.getCmp(field_pid).resumeEvents();
				}
			}]
		};



		items[slot].push({
			as_group: r.as_group,
			xtype:'fieldset',
			title: r.as_label + ((!disabled) ? '' : ' - <font color="red"><b>ACHTUNG: NOCH NICHT KONFIGURIERT</b></font>'),
			defaultType: 'textfield',
			collapsed: false,
			layout: 'anchor',
			defaults: {
				anchor: '100%'
			},
			items :[{
				fieldLabel: 'Datensatzfeld',
				readOnly:true,
				id:field_text
			},butts]
		});

	},




	genFormPanelViewElement_link : function(cfg,items,r,lang)
	{
		var me 			= this;
		var readOnly 	= (r.as_gui == 'READONLY');
		var slot   		= "all";
		var preFix 		= "";

		if (lang != "")
		{
			slot   = lang;
			preFix = '_'+lang+'_';
		}

		var field_storage 	= Ext.id(false,'field_storage');
		var field_pid 		= Ext.id(false,'field_pid');
		var field_pid2 		= Ext.id(false,'field_pid2');
		var id_type 		= Ext.id(false,'id_type');
		var id_target 		= Ext.id(false,'id_target');
		var id_ext 			= Ext.id(false,'id_ext');
		var id_title		= Ext.id(false,'id_title');
		var hiddenFileData	= Ext.id(false,'hiddenFileData');

		items[slot].push({
			as_group: r.as_group,
			id: hiddenFileData,
			xtype: 'hidden',
			name:  preFix+r.as_name,
			listeners : {
				change : function(tthis,newValue) {


					var data = Ext.decode(newValue,true);
					if (data == null)
					{
						return;
					}

					Ext.getCmp(field_pid).suspendEvents();
					Ext.getCmp(id_title).suspendEvents();
					Ext.getCmp(id_ext).suspendEvents();
					Ext.getCmp(id_target).suspendEvents();
					Ext.getCmp(id_type).suspendEvents();

					Ext.getCmp(id_title).setValue(data.title)
					Ext.getCmp(field_pid).setValue(data.internal)
					Ext.getCmp(id_ext).setValue(data.external)
					//Ext.getCmp(id_target).setValue({id_target:data.target});
					Ext.getCmp(id_target).setValue(data.target);
					//Ext.getCmp(id_type).setValue({id_type:data.type})
					Ext.getCmp(id_type).setValue(data.type)

					xframe.ajax({
						scope:this,
						url: '/xgo/xplugs/xredaktor/ajax/pages/getById',
						params : {
							p_id:data.internal
						},
						success: function(json)
						{
							Ext.getCmp(field_pid2).setValue(json.record.p_name);
						}
					});

					Ext.getCmp(id_title).resumeEvents();
					Ext.getCmp(field_pid).resumeEvents();
					Ext.getCmp(id_ext).resumeEvents();
					Ext.getCmp(id_target).resumeEvents();
					Ext.getCmp(id_type).resumeEvents();

				}
			}
		});

		var flushLinkData = function()
		{


			var data = {
				title: 		Ext.getCmp(id_title).getValue(),
				internal: 	Ext.getCmp(field_pid).getValue(),
				external: 	Ext.getCmp(id_ext).getValue(),
				//target: 	Ext.getCmp(id_target).getValue().id_target,
				target: 	Ext.getCmp(id_target).getValue(),
				//type: 		Ext.getCmp(id_type).getValue().id_type,
				type: 		Ext.getCmp(id_type).getValue()
			};


			var hidden = Ext.getCmp(hiddenFileData);
			hidden.suspendEvents();
			hidden.setValue(Ext.encode(data));
			hidden.resumeEvents();
		}

		var butts = {
			xtype: 'container',
			layout: 'hbox',
			margin: '0 0 10',
			items: [{
				disabled:readOnly,
				xtype: 'button',
				scope: this,
				iconCls:'xf_select',
				text: 'Link Auswählen',
				handler: function() {

					/*
					var newSelection = '';
					var win = false;
					var width 	= window.innerWidth*0.9;
					var height 	=  window.innerHeight*0.9;

					width 	= 640;

					var tree = xframe_pattern.getInstance().genTree({
					region:'west',
					split: true,
					tools:[],
					bbar_add2:[{
					text:'Auswählen',
					scope:this,
					handler:function(){
					win.destroy();
					}
					}],
					title: '',
					button_save:false,
					forceFit:true,
					xstore: {
					load: 	'/xgo/xplugs/xredaktor/ajax/pages/load',
					update: '/xgo/xplugs/xredaktor/ajax/pages/update',
					insert: '/xgo/xplugs/xredaktor/ajax/pages/insert',
					move: 	'/xgo/xplugs/xredaktor/ajax/pages/move',
					pid: 	'p_id',
					fields: [
					{name: 'p_name',		text:'Name der Seite',	type:'string', folder: true, editor: {
					allowBlank: false,
					xtype: 'textfield'
					}},
					{name: 'p_id',			text:'Interne Nummer',	type:'int', 	hidden: true}
					]
					}
					});

					tree.on('load',function() {

					var p_id = Ext.getCmp(field_pid).getValue()

					if (!Ext.isNumeric(p_id))
					{
					return;
					}
					xframe.ajax({
					scope:me,
					url: xredaktor.getPath() + '/ajax/pages/getPathOfPage',
					params: {
					p_id: p_id
					},
					success: function(json) {
					if (json.path2expand == '/')
					{
					tree.selectPath('/0/'+p_id,'p_id','/',function(){
					});
					return;
					}
					tree.selectPath('/0'+json.path2expand+'/'+p_id,'p_id','/',function(){
					});
					},
					failure: function() {
					this.gui.setDisabled(false);
					}
					});

					},this);

					tree.on('itemdblclick',function(view,record) {
					Ext.getCmp(field_pid).setValue(record.data.p_id);
					Ext.getCmp(field_pid2).setValue(record.data.p_name);
					win.destroy();
					},this);

					win = Ext.create('widget.window', {
					border:false,
					modal: true,
					title: 'Seitenbaum',
					closable: true,
					width: width,
					height: height,
					layout: 'fit',
					items: [tree]
					});
					win.show();*/


					xredaktor_gui.getInstance().showPageTree({
						p_id : Ext.getCmp(field_pid).getValue(),
						cb_ok_fn : function(id,name){
							Ext.getCmp(field_pid).setValue(id);
							Ext.getCmp(field_pid2).setValue(name);
						},
						cb_ok_scope : me
					});



				}
			}, {
				xtype: 'component',
				width: 10
			}, {
				iconCls:'xf_select_del',
				disabled:readOnly,
				xtype: 'button',
				scope: this,
				text: 'Link entfernen',
				handler: function() {
					Ext.getCmp(field_pid).setValue('');
				}
			}]
		};

		items[slot].push({
			as_group: r.as_group,
			xtype:'fieldset',
			title: r.as_label,
			defaultType: 'textfield',
			collapsed: false,
			layout: 'anchor',
			defaults: {
				anchor: '100%'
			},
			items :[
			{
				readOnly:readOnly,
				id: id_title,
				fieldLabel: 'Titel',
				listeners:{
					change:function()
					{
						flushLinkData();
					}
				}

			},


			{
				id: id_type,
				readOnly:readOnly,
				xtype: 'combobox',
				typeAhead: true,
				triggerAction: 'all',
				selectOnTab: true,
				store: [['internal','Intern'],['external','Extern']],
				value: 'internal',
				lazyRender: true,
				listClass: 'x-combo-list-small',
				fieldLabel: 'Lokation',
				maxWidth: 300,
				name: 'id_type',
				listeners:{
					change:function()
					{
						flushLinkData();
					}
				}
			}



			/*
			{
			xtype: 'radiogroup',
			flex: 1,
			maxWidth: 300,
			fieldLabel: 'Lokation',
			id: id_type,
			items: [
			{boxLabel: 'Intern', name: 'id_type', inputValue: 'internal', checked: true,readOnly:readOnly},
			{boxLabel: 'Extern', name: 'id_type', inputValue: 'external',readOnly:readOnly}
			],
			listeners:{
			change:function()
			{
			flushLinkData();
			}
			}
			}

			*/

			,


			{
				id: id_target,
				readOnly:readOnly,
				xtype: 'combobox',
				typeAhead: true,
				triggerAction: 'all',
				selectOnTab: true,
				store: [['_top','Selbe Seite'],['_blank','Neue Seite']],
				value: '_top',
				lazyRender: true,
				listClass: 'x-combo-list-small',
				fieldLabel: 'Zielseite',
				maxWidth: 300,
				name: 'id_target',
				listeners:{
					change:function()
					{
						flushLinkData();
					}
				}
			}


			,
			{
				xtype:'fieldset',
				title: 'Destination',
				defaultType: 'textfield',
				collapsed: false,
				layout: 'anchor',
				defaults: {
					anchor: '100%'
				},
				items :[
				{
					readOnly:readOnly,
					id: id_ext,
					fieldLabel: 'Externer-Url',
					listeners:{
						change:function()
						{
							flushLinkData();
						}
					}

				},{
					fieldLabel: 'Interner-Url',
					readOnly:true,
					id:field_pid2
				},{
					xtype:'hidden',
					id:field_pid,
					listeners:{
						change:function()
						{
							flushLinkData();
						}
					}
				},
				butts]
			}
			],
			listeners:{
				afterrender: function()
				{
					//flushLinkData();
				}
			}
		});
	},

	genFormPanelViewElement_image : function(cfg,items,r,lang)
	{
		var me = this;
		var readOnly = (r.as_gui == 'READONLY');
		var slot   = "all";
		var preFix = "";

		if (lang != "")
		{
			slot   = lang;
			preFix = '_'+lang+'_';
		}

		var hiddenFileData = Ext.id();
		var imgID = Ext.id();

		items[slot].push({
			as_group: r.as_group,
			id: hiddenFileData,
			xtype: 'hidden',
			name:  preFix+r.as_name
		});

		cfg.patchImages[preFix+r.as_name] = imgID;
		cfg.patchImagesButton[imgID] = -1;

		var latestSaved = -1;

		items[slot].push({
			as_group: r.as_group,
			xtype:'fieldset',
			title: r.as_label,
			defaultType: 'textfield',
			collapsed: false,
			layout: 'anchor',
			defaults: {
				anchor: '100%'
			},
			items :[{
				xtype: 'container',
				layout: 'hbox',
				margin: '0 0 10',
				items: [{
					xtype: 'panel',
					border: false,
					width: 170,
					height: 170,
					html: '<div><div class="FA_SELECTOR_imgHolder"><img id="'+imgID+'" src="" width="150px" height="150px"></div></div>'
				}, {
					xtype: 'component',
					width: 10
				},
				{
					xtype: 'panel',
					border: false,
					width: 600,
					height: 170,
					html: '<div><div id="'+imgID+'_info">Informationen werden geladen...</div></div>'
				}

				]
			},{
				xtype: 'container',
				layout: 'hbox',
				margin: '0 0 10',
				items: [{
					disabled:readOnly,
					iconCls:'xf_select',
					xtype: 'button',
					scope: this,
					text: 'Datei auswählen...',
					handler: function() {

						var win = false;

						var width 	= window.innerWidth*0.9;
						var height 	=  window.innerHeight*0.9;

						if (latestSaved==-1)
						{
							latestSaved = cfg.patchImagesButton[imgID];
						}

						var panel = xredaktor_storage.getInstance().getMainPanel({
							s_storage_scope: xredaktor.getInstance().getCurrentBasicStorage(),
							site_id: xredaktor.getInstance().getCurrentSiteId(),
							width: width,
							height: height,
							mode: 'window',
							preSelect: cfg.patchImagesButton[imgID],
							latestSaved : latestSaved,
							win: win,
							scope:this,
							handler:function(data)
							{
								if (!Ext.isNumeric(data.s_id)) data.s_id = '';
								var s_id = data.s_id;
								cfg.patchImagesButton[imgID] = s_id;
								//var url = '/xgo/xplugs/xredaktor/ajax/storage/scaleBoxed/'+s_id+'/150/150'; // macht jetzt updateVisible
								//Ext.get(imgID).dom.setAttribute('src',url)
								Ext.getCmp(hiddenFileData).setValue(s_id);
								win.destroy();
								me.updateVisibleImages(cfg.finalForm);
							}
						});

						win = Ext.create('widget.window', {
							border:false,
							title: 'Filearchiv',
							modal: true,
							closable: true,
							width: width,
							height: height,
							layout: 'border',
							items: [panel]
						});
						win.show();
					}
				}, {
					xtype: 'component',
					width: 10
				},{
					xtype: 'button',
					scope: this,
					disabled:readOnly,
					iconCls:'xf_select_del',
					text: 'Datei entfernen',
					handler: function() {
						var url = '/xgo/xplugs/xredaktor/ajax/storage/scaleBoxed//150/150';
						Ext.get(imgID).dom.setAttribute('src',url)
						Ext.getCmp(hiddenFileData).setValue('');
					}
				}]
			}]
		});
	},

	genFormPanelView : function(cfg,items,r)
	{
		var emptyText = this.getGenericEmptyText();
		if (typeof cfg.enableEditable == "undefined") cfg.enableEdit = false;
		if (cfg.enableEditable) r.as_gui = "NORMAL";

		var readOnly = (r.as_gui == 'READONLY');
		if (r.as_gui == 'HIDDEN')
		{
			if (r.as_type_multilang == 'Y')
			{
				Ext.each(cfg.langs,function(lang){
					items[lang].push({
						as_group: r.as_group,
						xtype: 'hidden',
						name:  '_'+lang+'_'+r.as_name
					});
				},this);
			} else
			{
				items['all'].push({
					as_group:  r.as_group,
					xtype: 'hidden',
					name:  r.as_name
				});
			}
			return;
		}

		/****************************************
		** CHECK CFG OBJECT
		***/

		cfg = this.getAndCheckInitCfg(cfg);


		if (typeof cfg.finalForm == "undefined") {
			console.info('genFormPanelView - finalFom is not set!!!!');
		}

		if (r.as_label == "") r.as_label = '<font color="red">Keine Bezeichnung</font>';
		if (r.as_label == "") r.as_label = '<font color="red">Keine Bezeichnung und keine Variable</font>';

		if (cfg.langs.length == 0)
		{
			r.as_type_multilang = 'N';
		} else
		{
		}

		// FILTER

		switch(r.as_type)
		{
			case 'WIZARD2WIZARD':
			case 'CHECKBOX':
			break;
			default:
			if (r.as_type_multilang == 'Y')
			{
				Ext.each(cfg.langs,function(lang){
					var name = '_'+lang+'_'+r.as_name;
					cfg.filterNames[name] = 1;
				},this);
			} else
			{
				cfg.filterNames[r.as_name] = 1;
			}
		}

		switch(r.as_type)
		{
			/**************** DISABLED ***********************/

			case 'SIMPLE_W2W':
			try{
				if (r.as_type_multilang == 'Y')
				{
					Ext.each(cfg.langs,function(lang){
						this.genSimpleWizardListByConfig(cfg,items,r,lang);
					},this);
				} else
				{
					this.genSimpleWizardListByConfig(cfg,items,r,'');
				}
			} catch (e)
			{
				console.info('genSimpleWizardListByConfig',e);
			}
			return;

			/*********************  ALL ***********************/


			case 'WIZARDLIST':
			try{
				if (r.as_type_multilang == 'Y')
				{
					Ext.each(cfg.langs,function(lang){
						this.genWizardListByConfig(cfg,items,r,lang);
					},this);
				} else
				{
					this.genWizardListByConfig(cfg,items,r,'');
				}
			} catch (e)
			{
				console.info('WIZARDLIST',e);
			}
			break;



			case 'WIZARD2WIZARD':
			try{
				if (r.as_type_multilang == 'Y')
				{
					Ext.each(cfg.langs,function(lang){
						this.genWIZARD2WIZARDByConfig(cfg,items,r,lang);
					},this);
				} else
				{
					this.genWIZARD2WIZARDByConfig(cfg,items,r,'');
				}
			} catch (e)
			{
				console.info('WIZARDLIST',e);
			}
			break;

			case 'WATTRIBUTE':
			try{
				if (r.as_type_multilang == 'Y')
				{
					Ext.each(cfg.langs,function(lang){
						this.genWAttributeByConfig(cfg,items,r,lang);
					},this);
				} else
				{
					this.genWAttributeByConfig(cfg,items,r,'');
				}
			} catch (e)
			{
				console.info('WIZARDLIST',e);
			}
			break;

			case 'WIZARDLIST':
			try{
				if (r.as_type_multilang == 'Y')
				{
					Ext.each(cfg.langs,function(lang){
						this.genWizardListByConfig(cfg,items,r,lang);
					},this);
				} else
				{
					this.genWizardListByConfig(cfg,items,r,'');
				}
			} catch (e)
			{
				console.info('WIZARDLIST',e);
			}
			break;

			case 'ATOMLIST':
			if (r.as_type_multilang == 'Y')
			{
				Ext.each(cfg.langs,function(lang){
					this.genAtomListByConfig(cfg,items,r,lang);
				},this);
			} else
			{
				this.genAtomListByConfig(cfg,items,r,'');
			}
			break;
			case 'COMBO':
			if (r.as_type_multilang == 'Y')
			{
				Ext.each(cfg.langs,function(lang){
					items[lang].push(this.genComboByConfig(cfg,r,lang));
				},this);
			} else
			{
				items['all'].push(this.genComboByConfig(cfg,r));
			}
			break;
			case 'YN':
			if (r.as_type_multilang == 'Y')
			{
				Ext.each(cfg.langs,function(lang){
					items[lang].push(this.genComboByConfigYN(cfg,r,lang));
				},this);
			} else
			{
				items['all'].push(this.genComboByConfigYN(cfg,r));
			}
			break;
			case 'CHECKBOX':
			if (r.as_type_multilang == 'Y')
			{
				Ext.each(cfg.langs,function(lang){
					items[lang].push(this.genCheckboxesByConfig(cfg,r,lang));
				},this);
			} else
			{
				items['all'].push(this.genCheckboxesByConfig(cfg,r));
			}
			break;
			case 'RADIO':
			if (r.as_type_multilang == 'Y')
			{
				Ext.each(cfg.langs,function(lang){
					items[lang].push(this.genRadiosByConfig(cfg,r,lang));
				},this);
			} else
			{
				items['all'].push(this.genRadiosByConfig(cfg,r));
			}
			break;
			case 'MD5PASSWORD':
			console.info('inputType');
			if (r.as_type_multilang == 'Y')
			{
				Ext.each(cfg.langs,function(lang){
					var idPwd = Ext.id();
					items[lang].push({
						emptyText: emptyText,
						readOnly:readOnly,
						as_group: r.as_group,
						xtype: 'textfield',
						inputType: 'password',
						fieldLabel: r.as_label,
						name:  '_'+lang+'_'+r.as_name,
						width: 500
					});
					cfg.patchMD5Pass['_'+lang+'_'+r.as_name] = idPwd;
				},this);
			} else
			{
				var idPwd = Ext.id();
				items['all'].push({
					emptyText: emptyText,
					readOnly:readOnly,
					as_group: r.as_group,
					xtype: 'textfield',
					inputType: 'password',
					fieldLabel: r.as_label,
					name:  r.as_name,
					width: 500
				});
				cfg.patchMD5Pass[r.as_name] = idPwd;
			}

			break;
			case 'GEO-POINT':
			case 'TEXT':
			if (r.as_type_multilang == 'Y')
			{
				Ext.each(cfg.langs,function(lang){
					items[lang].push({
						emptyText: emptyText,
						readOnly:readOnly,
						as_group: r.as_group,
						xtype: 'textfield',
						fieldLabel: r.as_label,
						name:  '_'+lang+'_'+r.as_name,
						width: 500
					});
				},this);
			} else
			{
				items['all'].push({
					emptyText: emptyText,
					readOnly:readOnly,
					as_group: r.as_group,
					xtype: 'textfield',
					fieldLabel: r.as_label,
					name:  r.as_name,
					width: 500
				});
			}

			break;
			case 'TEXTAREA':
			if (r.as_type_multilang == 'Y')
			{
				Ext.each(cfg.langs,function(lang){
					items[lang].push({
						emptyText: emptyText,
						readOnly:readOnly,
						as_group: r.as_group,
						xtype: 'textarea',
						fieldLabel: r.as_label,
						name:  '_'+lang+'_'+r.as_name,
						width: 500
					});
				},this);
			} else
			{
				items['all'].push({
					emptyText: emptyText,
					readOnly:readOnly,
					as_group: r.as_group,
					xtype: 'textarea',
					fieldLabel: r.as_label,
					name:  r.as_name,
					width: 500
				});
			}
			break;
			case 'HTML':
			if (r.as_type_multilang == 'Y')
			{
				Ext.each(cfg.langs,function(lang){
					items[lang].push({
						emptyText: emptyText,
						readOnly:readOnly,
						as_group: r.as_group,
						xtype: 'htmleditor2',
						value:'',
						defaultValue:'',
						fieldLabel:  r.as_label,
						name:  '_'+lang+'_'+r.as_name,
						height: 300
					});
				},this);
			} else
			{
				items['all'].push({
					emptyText: emptyText,
					readOnly:readOnly,
					as_group: r.as_group,
					value:'',
					xtype: 'htmleditor2',
					height: 300,
					defaultValue:'',
					fieldLabel:  r.as_label,
					name:  r.as_name
				});
			}
			break;
			case 'WIZARD':
			if (r.as_type_multilang == 'Y')
			{
				Ext.each(cfg.langs,function(lang){
					this.genFormPanelViewElement_wizard(cfg,items,r,lang);
				},this);
			} else
			{
				this.genFormPanelViewElement_wizard(cfg,items,r,'');
			}
			break;
			case 'LINK':
			if (r.as_type_multilang == 'Y')
			{
				Ext.each(cfg.langs,function(lang){
					this.genFormPanelViewElement_link(cfg,items,r,lang);
				},this);
			} else
			{
				this.genFormPanelViewElement_link(cfg,items,r,'');
			}
			break;
			case 'FILE':
			if (r.as_type_multilang == 'Y')
			{
				Ext.each(cfg.langs,function(lang){
					this.genFormPanelViewElement_image(cfg,items,r,lang);
				},this);
			} else
			{
				this.genFormPanelViewElement_image(cfg,items,r,'');
			}
			break;


			case 'DATE':
			if (r.as_type_multilang == 'N')
			{
				var idDate = Ext.id();
				items['all'].push({
					emptyText: emptyText,
					maxWidth: 250,
					readOnly:readOnly,
					id:idDate,
					as_group: r.as_group,
					xtype: 'datefield',
					fieldLabel: r.as_label,
					name:  r.as_name,
					altFormats: 'Y-m-d|d.m.Y'
				});
				cfg.patchDates[r.as_name] = idDate;
			} else
			{
				Ext.each(cfg.langs,function(lang){
					var idDate 		= Ext.id();
					var nameDate 	= '_'+lang+'_'+r.as_name;
					items[lang].push({
						emptyText: emptyText,
						maxWidth: 250,
						readOnly:readOnly,
						id:idDate,
						as_group: r.as_group,
						xtype: 'datefield',
						fieldLabel: r.as_label,
						name:  nameDate,
						altFormats: 'Y-m-d|d.m.Y'
					});
					cfg.patchDates[nameDate] = idDate;
				},this);
			}
			break;
			case 'TIME':
			if (r.as_type_multilang == 'N')
			{
				var idTime = Ext.id();
				items['all'].push({
					emptyText: emptyText,
					maxWidth: 250,
					readOnly:readOnly,
					id:idTime,
					as_group: r.as_group,
					xtype: 'timefield',
					fieldLabel: r.as_label,
					name:  r.as_name
				});
				cfg.patchTimes[r.as_name] = idTime;
			} else
			{
				Ext.each(cfg.langs,function(lang){
					var idTime = Ext.id();
					items[lang].push({
						emptyText: emptyText,
						maxWidth: 250,
						readOnly:readOnly,
						id:idTime,
						as_group: r.as_group,
						xtype: 'timefield',
						fieldLabel: r.as_label,
						name:  '_'+lang+'_'+r.as_name
					});
					cfg.patchTimes['_'+lang+'_'+r.as_name] = idTime;
				},this);
			}
			break;
			case 'INT':
			if (r.as_type_multilang == 'N')
			{
				items['all'].push({
					emptyText: emptyText,
					maxWidth: 300,
					readOnly:readOnly,
					as_group: r.as_group,
					xtype: 'numberfield',
					fieldLabel: r.as_label,
					name:  r.as_name,
					allowDecimals:false
				});
			} else
			{
				Ext.each(cfg.langs,function(lang){
					items[lang].push({
						emptyText: emptyText,
						maxWidth: 300,
						readOnly:readOnly,
						as_group: r.as_group,
						xtype: 'numberfield',
						fieldLabel: r.as_label,
						name:  '_'+lang+'_'+r.as_name,
						allowDecimals:false
					});
				},this);
			}
			break;
			case 'FLOAT':
			if (r.as_type_multilang == 'N')
			{
				items['all'].push({
					emptyText: emptyText,
					maxWidth: 300,
					readOnly:readOnly,
					as_group: r.as_group,
					xtype: 'numberfield',
					fieldLabel: r.as_label,
					name:  r.as_name,
					decimalSeparator: '.'
				});
			} else
			{
				Ext.each(cfg.langs,function(lang){
					items[lang].push({
						emptyText: emptyText,
						maxWidth: 300,
						readOnly:readOnly,
						as_group: r.as_group,
						xtype: 'numberfield',
						fieldLabel: r.as_label,
						name:  '_'+lang+'_'+r.as_name,
						decimalSeparator: '.'
					});
				},this);
			}
			break;

			case 'TIMESTAMP':
			if (r.as_type_multilang == 'N')
			{
				var idDate = Ext.id();
				var idTime = Ext.id();
				items['all'].push({
					as_group: r.as_group,
					xtype:'fieldset',
					title: r.as_label,
					defaultType: 'textfield',
					collapsed: false,
					layout: 'anchor',
					defaults: {
						anchor: '100%'
					},
					items :[{
						emptyText: emptyText,
						maxWidth: 250,
						readOnly:readOnly,
						id:idDate,
						xtype: 'datefield',
						fieldLabel: 'Datum',
						name:  r.as_name+'_date'
					},{
						emptyText: emptyText,
						maxWidth: 250,
						readOnly:readOnly,
						id:idTime,
						xtype: 'timefield',
						fieldLabel: 'Uhrzeit',
						name:  r.as_name+'_time'
					}]
				});

				cfg.patchTS[r.as_name] = {
				'date':idDate,
				'time':idTime
				};

			} else
			{
				Ext.each(cfg.langs,function(lang){
					var idDate = Ext.id();
					var idTime = Ext.id();
					items[lang].push({
						as_group: r.as_group,
						xtype:'fieldset',
						title: r.as_label,
						defaultType: 'textfield',
						collapsed: false,
						layout: 'anchor',
						defaults: {
							anchor: '100%'
						},
						items :[{
							emptyText: emptyText,
							maxWidth: 250,
							readOnly:readOnly,
							id:idDate,
							xtype: 'datefield',
							fieldLabel: 'Datum',
							name:  '_'+lang+'_'+r.as_name+'_date'
						},{
							emptyText: emptyText,
							maxWidth: 250,
							readOnly:readOnly,
							id:idTime,
							xtype: 'timefield',
							fieldLabel: 'Uhrzeit',
							name:  '_'+lang+'_'+r.as_name+'_time'
						}]
					});

					cfg.patchTS['_'+lang+'_'+r.as_name] = {
					'date':idDate,
					'time':idTime
					};

				},this);
			}
			break;


			case 'COMMENT':
			if (r.as_type_multilang == 'N')
			{
				items['all'].push({
					as_group: r.as_group,
					xtype: 'panel',
					border:false,
					html:  "<b>"+r.as_label+"</b>"
				});
			} else
			{
				Ext.each(cfg.langs,function(lang){
					items[lang].push({
						as_group: r.as_group,
						xtype: 'panel',
						border:false,
						html:  "<b>"+r.as_label+"</b>"
					});
				},this);
			}
			break;

			default:
			if (r.as_type_multilang == 'N')
			{
				items['all'].push({
					as_group: r.as_group,
					xtype: 'panel',
					html:  'Name:'+r.as_name+' Label:'+r.as_label+' => Typ:'+r.as_type+' wird noch nicht unterstützt'
				});
			} elseif (r.as_type_multilang == 'N')
			{
				Ext.each(cfg.langs,function(lang){
					items['all'].push({
						as_group: r.as_group,
						xtype: 'panel',
						html:  'Name:'+r.as_name+' Label:'+r.as_label+' => Typ:'+r.as_type+' wird noch nicht unterstützt'
					});
				},this);
			}
		}
	},


	/***************************************************************************************************************************************************/
	/***************************************************************************************************************************************************/
	/***************************************************************************************************************************************************/
	/***************************************************************************************************************************************************/
	/***************************************************************************************************************************************************/

	processGenericInputPanel : function(cfg)
	{

		var be_lang 		= xredaktor.getInstance().getCurrentBElang().toUpperCase();
		var title			= cfg.title || '';
		var json			= cfg.json;
		var panel2replace 	= cfg.panel;
		var buttons			= cfg.buttons || [];
		var finalForm 		= false;
		var me 				= this;
		var latestLoadId 	= -1;
		var normButtons 	= [];

		// ################# CHECKS
		if (typeof cfg.button_abort == "undefined") cfg.button_abort = true;

		Ext.each(buttons,function(b){
			normButtons.push(b);
		},this);

		normButtons.push({
			iconCls:'xf_save',
			text: 'Speichern',
			scope: this,
			handler: function()
			{
				var params = cfg.save_params || {};
				var values = me.doDefaultLayoutSaveValues.call(me,finalForm);

				params.json_cfg = Ext.encode(values),
				params.id = latestLoadId;

				xframe.ajax({
					url:cfg.save,
					params : params,
					success: function(json)
					{
					}
				});
			}
		});

		if (cfg.button_abort)
		{
			normButtons.push({
				iconCls:'xf_abort',
				text: 'Abbrechen',
				scope:this,
				handler:function()
				{
					this.inputPanel.win.hide();

					if (me.inputPanel.button_abort && me.inputPanel.button_abort_scope)
					{
						me.inputPanel.button_abort.call(me.inputPanel.button_abort_scope);
					}

				}
			});
		}

		finalForm = this.doDefaultLayoutOfFields({
			title: 			title,
			json: 			json,
			normButtons: 	normButtons,
			normButtonsLoc:	'T',
			grid: cfg.grid || false
		});



		finalForm.loadRecordByConfig = function(selectorOfRecord,showTitle,extraLoadSettings)
		{
			finalForm.setDisabled(false);
			if (typeof showTitle == 'undefined') showTitle = true;
			if (typeof extraLoadSettings == 'undefined') extraLoadSettings = -1;

			var params = cfg.load_params;
			params.id = -1;
			params.selector = Ext.encode(selectorOfRecord);
			params.extraLoadSettings = extraLoadSettings;

			xframe.ajax({
				scope:me,
				url: cfg.load,
				params : params,
				success: function(json)
				{
					latestLoadId = json.record_wz_id;
					me.doDefaultLayoutLoadValues(finalForm,json.value);
					try {mask.hide();} catch (e) {};
					if (showTitle) { finalForm.setTitle('Datensatzkonfiguration #'+latestLoadId); }
				}
			});
		};

		finalForm.loadRecordById = function(id,showTitle,extraLoadSettings)
		{
			finalForm.setDisabled(false);
			if (typeof showTitle == 'undefined') showTitle = true;
			if (typeof extraLoadSettings == 'undefined') extraLoadSettings = -1;

			var params = cfg.load_params;
			params.id = id;
			params.extraLoadSettings = extraLoadSettings;
			latestLoadId = id;

			try {
				var mask = new Ext.LoadMask({target:finalForm,msg:"Bitte warten"});
				mask.show();
			} catch (e) {};


			xframe.ajax({
				scope:me,
				url: cfg.load,
				params : params,
				success: function(json)
				{

					me.doDefaultLayoutLoadValues(finalForm,json.value);
					try {mask.hide();} catch (e) {};
					if (showTitle) { finalForm.setTitle('Datensatzkonfiguration #'+id); }

				}
			});
		}

		panel2replace.removeAll();
		panel2replace.add(finalForm);
		panel2replace.doLayout();

		return finalForm;
	},


	/***************************************************************************************************************************************************/
	/***************************************************************************************************************************************************/
	/***************************************************************************************************************************************************/
	/***************************************************************************************************************************************************/
	/***************************************************************************************************************************************************/

	updateVisibleImages: function(finalForm)
	{
		var formCfg = finalForm.formCfg;
		var values 	= finalForm.getForm().getValues();

		/* TAB FIXING */
		Ext.iterate(formCfg.patchImages,function(name,idx){
			if (typeof values[name] == 'undefined') 	values[name] = "";
			if (!Ext.isNumeric(values[name])) 			values[name] = "";
			var s_id = values[name];
			if (s_id == 'undefined') s_id = "";
			if (typeof s_id == 'undefined') s_id = "";
			formCfg.patchImagesButton[idx] = s_id;
			if (s_id == 0) s_id = '';
			var url = '/xgo/xplugs/xredaktor/ajax/storage/scaleBoxed/'+s_id+'/150/150';
			try{
				Ext.get(idx).dom.setAttribute('src',url)
				if (Ext.isNumeric(s_id))
				{

					var tpl = new Ext.XTemplate([
					'<tpl for=".">',
					'<div class="FA_BE_SELECT">',
					'<div class="download"><b>Link:</b> <a href="{webSrc}" target="_blank">{s_name}</a></div>',
					'<div class="info"><b>Width:</b> {s_media_w}px<br>',
					'<b>Height:</b> {s_media_h}px<br>',
					'<b>Mime:</b> {s_mimeType}<br>',
					'<b>Verzeichnis:</b> {dirOfFile}<br>',
					'<b>Größe:</b> {s_fileSizeBytesHuman}</div>',
					'</div>',
					'</tpl>']);

					xframe.ajax({
						url: '/xgo/xplugs/xredaktor/ajax/storage/getById',
						params: {
							s_id: s_id
						},
						success: function(json) {
							try{
								Ext.get(idx+'_info').update(tpl.applyTemplate(json.file));
							} catch (e) {
								console.info('storage/getById::success');
							}
						},
						failure: function() {
						}
					});

				} else
				{
					Ext.get(idx+'_info').update('');
				}
			} catch(e) {
				console.info('fixFormAfterTabchange patchImages hidden',e);
			}
		},this);
	},

	fixFormAfterTabchange : function(finalForm, tabPanel, newCard)
	{
		console.info('fixFormAfterTabchange');
		var formCfg = finalForm.formCfg;
		var values 	= finalForm.getForm().getValues();

		/// Basic Cor fixing
		this.updateVisibleImages(finalForm);

		/// Remote Tab Change
		if (Ext.isIterable(formCfg.tabchangeHandlers))
		{
			Ext.iterate(formCfg.tabchangeHandlers,function(fnPack,idx){

				if ((typeof fnPack.fn == 'function') && (fnPack.scope))
				{
					fnPack.fn.call(fnPack.scope, finalForm, tabPanel, newCard);
				} else
				{
					console.error('fixFormAfterTabchange - invalid config',fnPack);
				}
			});
		}
	},


	doDefaultLayoutOfFields : function(cfg,autoScroll)
	{

		if (typeof autoScroll == 'undefined') autoScroll = true;

		var me 				= this;
		var title 			= cfg.title || "";
		var json 			= cfg.json;
		var langs 			= json.langs;
		var normButtons 	= cfg.normButtons || [];
		var finalForm		= false;
		var grid			= cfg.grid || false;

		if (typeof cfg.normButtonsLoc == 'undefined') 	cfg.normButtonsLoc = "B";
		if (typeof cfg.isFrame == 'undefined') 			cfg.isFrame = false;

		var items = {all: []};


		var langs = [];
		var langs_ = xredaktor.getInstance().getLanguageConfigFE(xredaktor.getInstance().getCurrentSiteId());
		Ext.each(langs_,function(l,i){
			langs.push(l.fel_ISO);
		},this);

		Ext.each(langs,function(lang) {
			items[lang] = [];
		},this);

		if (cfg.isFrame)
		{
			items.sys = [{
				fieldLabel: 'Nice-Url-Segment ? Wie müssen wir das hier machen ... ',
				name: 'niceurl',
				value: ''
			},{
				fieldLabel: 'Robots',
				name: 'robots',
				value: ''
			}];
		}

		/*
		var formCfg = {
		grid:grid,
		patchTimes: {},
		patchDates: {},
		patchCombos: {},
		patchRadios: {},
		finalForm:finalForm,
		patchImages: {},
		langs: langs,
		patchImagesButton: {},
		tabchangeHandlers : []
		};
		*/

		var formCfg = {
			grid:grid,
			finalForm:finalForm,
			langs: langs
		};

		formCfg = this.getAndCheckInitCfg(formCfg);

		Ext.each(json.settings,function(r){

			this.genFormPanelView(formCfg,items,r);

			try{

			} catch (e) {
				console.info('Typenfelhler::',r,e);
			}
		},this);


		var packs 		= [];
		var titleNames 	= [];
		var useTabPanel	= true;
		var tabsUsed	= false;
		var tabPanelId = {};

		console.info('items',items);

		Ext.iterate(items,function(k,list){
			var title = "";
			switch(k)
			{
				case 'all':
				title = "Generisch";
				break;
				case 'sys':
				title = "Systemeinstellungen";
				break;
				default:
				title = "&nbsp;&nbsp;"+k+"&nbsp;&nbsp;";
			}
			if (list.length>0)
			{
				titleNames.push(title);
			}
		});

		if (titleNames.length <= 1)
		{
			useTabPanel = false;
		}

		console.info('titleNames',titleNames,items);

		Ext.iterate(items,function(k,list){
			var title = "";
			var titleStripped = "";
			switch(k)
			{
				case 'all':
				titleStripped = title = "Generisch";
				break;
				case 'sys':
				titleStripped = title = "Systemeinstellungen";
				break;
				default:
				title = "&nbsp;&nbsp;"+k+"&nbsp;&nbsp;";
				titleStripped = k;
			}

			if ((k == 'sys') && (!json.page)) return;

			if (!useTabPanel)
			{
				titleStripped = title = '';
			}

			var bufferedHiddenFields = false;

			if (list.length > 0)
			{

				var groupsOrder = [];
				var groups = {};
				var grpCnt = 0;
				var defName = "Allgemein";

				Ext.each(list,function(it) {

					if (it.xtype == 'hidden')
					{
						var hIt = Ext.clone(it);
						if (!bufferedHiddenFields) bufferedHiddenFields = [];
						bufferedHiddenFields.push(hIt);
						console.info('ADDD',hIt);
						return;
					}

					if (typeof it == 'undefined')
					{
						console.info(k,"it == 'undefined'",list);
						return;
					}

					var as_group = it.as_group;
					if (typeof it.as_group == "undefined") 			as_group = defName;

					if (Ext.isArray(it))
					{
						if (it.length ==  0) return;
						as_group = it[0].as_group;
						if (typeof it[0].as_group == "undefined") 	as_group = defName;
					}

					if (as_group == "") 							as_group = defName;

					if (typeof groups[as_group] == "undefined")
					{
						groupsOrder.push(as_group);
						groups[as_group] = [];
						grpCnt++;
					}

					groups[as_group].push(it);
				},this);

				if (grpCnt == 1)
				{
					packs.push({
						title:title,
						defaultType: 'textfield',
						autoScroll:true,
						layout:'anchor',
						defaults: {
							anchor: '100%'
						},
						fieldDefaults: {
							msgTarget: 'side',
							anchor: '100%'
						},
						items: [list]
					});
				} else
				{

					groupsOrder.sort();
					var _list = [];

					tabsUsed = true;
					Ext.each(groupsOrder,function(as_group) {

						if (bufferedHiddenFields)
						{
							console.info(bufferedHiddenFields);
							Ext.each(bufferedHiddenFields,function(it) {
								groups[as_group].push(it);
								console.info('hidden',as_group,it.name);
							});
							bufferedHiddenFields = false;
						}

						_list.push({
							xtype: 'form',
							title: "&nbsp;&nbsp;"+as_group+"&nbsp;&nbsp;",
							titleStripped : as_group,
							defaultType: 'textfield',
							autoScroll:true,
							items: [groups[as_group]]
						});
					},this);

					tabPanelId[''+k] = Ext.id();

					packs.push({
						title: title,
						autoScroll:true,
						defaultType: 'textfield',
						id:tabPanelId[k],
						xtype:'tabpanel',
						activeTab: 0,
						items: _list,
						listeners : {
							tabchange: function(tabPanel, newCard)
							{
								console.info('tab-change-sub');
								me.fixFormAfterTabchange(finalForm, tabPanel, newCard);
							}
						}
					});
				}
			}

		},this);


		var tbar 	= [];
		var buttons = [];


		switch (cfg.normButtonsLoc)
		{
			case 'T':
			tbar = cfg.normButtons;
			break;
			case 'B':
			buttons = cfg.normButtons;
			default:
		}


		var gitems = [{
			xtype:'tabpanel',
			activeTab: 0,
			defaults:{
				bodyStyle:'padding:10px'
			},
			items:[packs],
			listeners : {
				tabchange: function(tabPanel, newCard)
				{
					console.info('tab-change-top');
					me.fixFormAfterTabchange(finalForm, tabPanel, newCard);
				}
			}
		}];

		if (!useTabPanel)
		{
			gitems = [{
				layout: 'fit',
				xtype:'panel',
				autoScroll:true,
				defaults:{
					bodyStyle:'padding:10px'
				},
				border:false,
				items:[packs]
			}];
		} else
		{
		}

		console.info('gitems',gitems);

		var finalFormCfg = {
			title: title,
			frame: false,
			border: false,
			layout:'fit',
			fieldDefaults: {
				msgTarget: 'side',
				anchor: '100%'
			},
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},
			items: gitems,
			tbar:tbar,
			buttons:buttons
		};

		if (tbar.length == 0)
		{
			delete(finalFormCfg['tbar']);
		}

		console.info('finalFormCfg',finalFormCfg);

		finalForm = Ext.create('Ext.form.Panel',finalFormCfg);

		formCfg.finalForm = finalForm;

		finalForm.updateFieldsForSaveAction = function()
		{
			finalForm.fireEvent('updateFieldsForSaveAction');
		}

		finalForm.injectData = function(values)
		{
			me.doDefaultLayoutLoadValues(finalForm,values);
		}

		finalForm.tabPanelId = tabPanelId;

		finalForm.on('afterrender',function(){
			var values = Ext.decode(json.value,true);
			if (values == null) values = {};
			finalForm.injectData(values);
		},this,{delay:100});

		finalForm.formCfg = formCfg;
		return finalForm;
	},

	doDefaultLayoutSaveValues: function(finalForm)
	{
		var formCfg = finalForm.formCfg;
		finalForm.updateFieldsForSaveAction();
		var values = finalForm.getForm().getValues();

		/*****************************
		**	NORMING DATA ...
		**/

		Ext.iterate(formCfg.patchMD5Pass,function(name,idx){
			if (typeof values[name] == 'undefined') values[name] = "";

			if (formCfg.patchMD5PassLoaded[name] != values[name])
			{
				values[name] = Ext.util.MD5(values[name]);
			}

		},this);

		//######################################################### TS
		Ext.iterate(formCfg.patchTS,function(name,cfg) {
			try{

				var dbDate = "";
				var dbTime = "";

				if (values[name+'_date'] == "") {
					dbDate = "0000-00-00";
				} else {
					var genericDate = Ext.getCmp(cfg['date']).getValue();
					dbDate = Ext.Date.format(genericDate,"Y-m-d");
				}

				if (values[name+'_time'] == "")
				{
					dbTime 	= '00:00:00';
				} else
				{
					var genericDate = Ext.getCmp(cfg['time']).getValue();
					dbTime = Ext.Date.format(genericDate,"H:i:s");
				}

				values[name] = dbDate + " " + dbTime;

			} catch(e)
			{
				values[name] = "0000-00-00 00:00:00";
			}
		},this);

		//######################################################### DATES
		Ext.iterate(formCfg.patchDates,function(name,idx) {
			try{
				if (values[name] == "") {
					values[name] = "0000-00-00";
				} else {
					var genericDate = Ext.getCmp(idx).getValue();
					values[name] = Ext.Date.format(genericDate,"Y-m-d");
				}
			} catch(e)
			{
				values[name] = "0000-00-00";
			}
		},this);

		//######################################################### TIMES
		Ext.iterate(formCfg.patchTimes,function(name,idx) {
			try{
				if (values[name] == "")
				{
					values[name] 	= '00:00:00';
				} else
				{
					var genericDate = Ext.getCmp(idx).getValue();
					values[name] = Ext.Date.format(genericDate,"H:i:s");
				}
			} catch(e) {
				values[name] 	= '00:00:00';
			}
		},this);

		if (typeof formCfg.filterNames != 'undefined')
		{
			var filtered = {};
			Ext.iterate(formCfg.filterNames,function(k,v){
				filtered[k] = Ext.clone(values[k]);
			});

			return filtered;
		}

		return values;
	},

	doDefaultLayoutLoadValues: function(finalForm,values)
	{
		try {

			var formCfg = finalForm.formCfg;
			if (values == null) values = {};

			Ext.iterate(formCfg.patchMD5Pass,function(name,idx){
				if (typeof values[name] == 'undefined') values[name] = "";
				formCfg.patchMD5PassLoaded[name] = values[name];
			},this);

			/* PRE DATA FIXING */

			// ############# TS
			Ext.iterate(formCfg.patchTS,function(name,cfg){
				if (typeof values[name] == 'undefined') values[name] = "0000-00-00 00:00:00";

				var dbTS 	= values[name];

				var dbDate 	= dbTS.split(' ')[0];
				var dbTime 	= dbTS.split(' ')[1];

				if ((dbDate == "0000-00-00") || (dbDate == "")) {
					delete(values[name+'_date']);
					dbTime = "";
				} else
				{
					values[name+'_date'] = dbDate;
				}

				try{
					dbTime = dbTime.split(':');
					dbTime = dbTime[0]+':'+dbTime[1];
				} catch (e)
				{
					dbTime = "";
				}

				if (dbTime == "")
				{
					delete(values[name+'_time']);
				} else
				{
					values[name+'_time'] = dbTime;
				}

			},this);

			// ############# DATE
			Ext.iterate(formCfg.patchDates,function(name,idx){
				if (typeof values[name] == 'undefined') values[name] = "0000-00-00";
				var dbDate = values[name];
				if ((dbDate == "0000-00-00") || (dbDate == "")){
					delete(values[name]);
				}
			},this);

			// ############# TIMES
			Ext.iterate(formCfg.patchTimes,function(name,idx) {
				if (typeof values[name] == "undefined") {
					delete(values[name]);
				} else
				{
					try{
						var dbTime		= values[name].split(':');
						values[name] 	= dbTime[0]+':'+dbTime[1];
					} catch (e)
					{
						delete(values[name]);
					}
				}
			},this);

			// ############# COMBOS
			Ext.iterate(formCfg.patchCombos,function(name,initValues) {
				//console.info("Ext.iterate(formCfg.patchCombos",name,initValues);

				if (initValues == null) return;
				if (typeof initValues[name] == 'undefined') 	return;
				if (initValues[name] == null) 					return;

				if (typeof values[name] == "undefined") {
					values[name] = "";
				}

				if (values[name] == null) {
					values[name] = "";
				}

				if (values[name] == "")
				{
					values[name] = initValues[name];
				}

			},this);

			// ############# Radios
			Ext.iterate(formCfg.patchRadios,function(name,initValues) {
				//console.info("Ext.iterate(formCfg.patchCombos",name,initValues);

				if (initValues == null) return;
				if (typeof initValues[name] == 'undefined') 	return;
				if (initValues[name] == null) 					return;

				if (typeof values[name] == "undefined") {
					values[name] = "";
				}

				if (values[name] == null) {
					values[name] = "";
				}

				if (values[name] == "")
				{
					values[name] = initValues[name];
				}

			},this);

			/* SETTING FROM  */
			finalForm.getForm().reset();
			finalForm.getForm().setValues(values);

			/* POST DATA FIXING */
			Ext.iterate(formCfg.patchImages,function(name,idx){
				if (typeof values[name] == 'undefined') 	values[name] = "";
				if (!Ext.isNumeric(values[name])) 			values[name] = "";
				var s_id = values[name];
				if (s_id == 'undefined') s_id = "";
				if (typeof s_id == 'undefined') s_id = "";
				formCfg.patchImagesButton[idx] = s_id;
				if (s_id == 0) s_id = '';
				var url = '/xgo/xplugs/xredaktor/ajax/storage/scaleBoxed/'+s_id+'/150/150';
				try{
					Ext.get(idx).dom.setAttribute('src',url)
					if (Ext.isNumeric(s_id))
					{

						var tpl = new Ext.XTemplate([
						'<tpl for=".">',
						'<div class="FA_BE_SELECT">',
						'<div class="download"><b>Link:</b> <a href="{webSrc}" target="_blank">{s_name}</a></div>',
						'<div class="info"><b>Width:</b> {s_media_w}px<br>',
						'<b>Height:</b> {s_media_h}px<br>',
						'<b>Mime:</b> {s_mimeType}<br>',
						'<b>Verzeichnis:</b> {dirOfFile}<br>',
						'<b>Größe:</b> {s_fileSizeBytesHuman}</div>',
						'</div>',
						'</tpl>']);

						xframe.ajax({
							url: '/xgo/xplugs/xredaktor/ajax/storage/getById',
							params: {
								s_id: s_id
							},
							success: function(json) {
								try{
									Ext.get(idx+'_info').update(tpl.applyTemplate(json.file));
								} catch (e) {
									console.info('storage/getById::success');
								}
							},
							failure: function() {
							}
						});

					} else
					{
						Ext.get(idx+'_info').update('');
					}
				} catch(e) {
					console.info('FA Item nicht sichtbar, kein update...');
					//console.info('Ext.iterate(formCfg.patchImages,',e);
				}

			},this);
		} catch (e)
		{
			console.info('doDefaultLayoutLoadValues',e);
		}
	},

	/***************************************************************************************************************************************************/
	/***************************************************************************************************************************************************/
	/***************************************************************************************************************************************************/
	/***************************************************************************************************************************************************/
	/***************************************************************************************************************************************************/


	processInputFromPanel : function(json,buttons)
	{

		var me 			= this;
		var normButtons = [];
		var finalForm 	= false;

		Ext.each(buttons,function(b){
			normButtons.push(b);
		},this);


		normButtons.push({
			iconCls: 'xf_save',
			text: 'Speichern',
			scope: this,
			handler: function()
			{
				var values = me.doDefaultLayoutSaveValues.call(me,finalForm);
				xframe.ajax({
					url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/saveFormDataByPAS',
					params : {
						psa_json_cfg:Ext.encode(values),
						psa_id:json.psa_id
					},
					success: function(json)
					{
						try{
							finalForm.setDisabled(false);
							if (me.inputPanel.button_save && me.inputPanel.button_save_scope)
							{
								me.inputPanel.button_save.call(me.inputPanel.button_save_scope,json);
							}
							me.inputPanel.win.destroy();
						} catch(e)
						{
							console.info('processInputFromPanel::save',e);
						}
					}
				});
			}
		});

		normButtons.push({
			iconCls:'xf_abort',
			text: 'Abbrechen',
			scope:this,
			handler:function()
			{
				this.inputPanel.win.hide();

				if (me.inputPanel.button_abort && me.inputPanel.button_abort_scope)
				{
					me.inputPanel.button_abort.call(me.inputPanel.button_abort_scope);
				}

			}
		});

		finalForm = this.doDefaultLayoutOfFields({
			json : json,
			normButtons : normButtons
		});

		this.inputPanel.removeAll();
		this.inputPanel.add(finalForm);
		this.inputPanel.doLayout();
	},


	/***************************************************************************************************************************************************/
	/***************************************************************************************************************************************************/
	/***************************************************************************************************************************************************/
	/***************************************************************************************************************************************************/
	/***************************************************************************************************************************************************/

	genInputFormPanel : function(psa_id,buttons)
	{
		xframe.ajax({
			params : {
				psa_id: psa_id
			},
			url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/getFormDataByPAS',
			success:function(json){
				this.processInputFromPanel(json,buttons);
			},
			scope: this
		});
	},

	genInputFormPanelViaPage : function(p_id)
	{
		var me = this;
		xframe.ajax({
			params : {
				p_id: p_id
			},
			url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/getFormDataByPID',
			success:function(json){
				setTimeout(function(){
					me.processInputFromPanel.call(me,json);
				},10);
			},
			scope: this
		});
	},

	getInputPanel : function(cfg)
	{
		var me = this;
		var title 	= cfg.title 		|| 'Atom-Konfiguration';
		var emptyTxt = cfg.emptyTxt 	|| '...';

		this.inputPanel = Ext.create('Ext.Panel',{
			border: false,
			region:'center',
			layout: 'fit',
			items: [Ext.create('Ext.Panel',{
				html:emptyTxt
			})]
		});

		this.inputPanel.refactory = function(psa_id,buttons)
		{

			me.inputPanel.removeAll();
			me.inputPanel.add(Ext.create('Ext.Panel',{
				html:'<div style="padding:50px;"><b>Lade Baustein Einstellungen...</b></div>'
			}));
			me.inputPanel.doLayout();

			genInputFormPanel = psa_id;
			me.genInputFormPanel(psa_id,buttons);
		}

		this.inputPanel.refactoryByPage = function(p_id)
		{
			me.inputPanel.removeAll();
			me.inputPanel.add(Ext.create('Ext.Panel',{
				html:'<div style="padding:50px;"><b>Lade Seiten Einstellungen...</b></div>'
			}));
			me.inputPanel.doLayout();
			me.genInputFormPanelViaPage.call(me,p_id);
		}

		return this.inputPanel;
	},


	/************************************************************************************************************
	*************************************************************************************************************
	*				CONFIG PANEL PROPERTYS
	*
	*/


	doInit : function(as_name,as_id,as_type,as_init,r)
	{

		var me 			= this;
		var items 		= {all: []}; // FORCE NO LANG!
		var formCfg		= {
			enableEditable: true
		};

		var patchImages = {};

		this.genFormPanelView(formCfg,items,r.data);

		console.info(items);


		var win = xframe_pattern.getInstance().genFormPanelWindow({
			title: 'Initalwert - Eingabe',
			items : items['all'],
			bodyStyle: 'padding:50px',
			//layout: 'box',
			//	width: 640,
			//	height: 480,
			autoWidth: true,
			autoHeight: true,
			buttons: [{
				iconCls:'xf_save',
				text: 'Speichern',
				scope: this,
				handler: function()
				{

					var v = Ext.encode(win.formPanel.getForm().getValues());
					xframe.ajax({
						url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/updateInit',
						params: {
							as_init : v,
							as_id:as_id
						},
						success: function(json)
						{
							me.reloadStore();
							win.destroy();
						}
					});
				}
			},{
				iconCls:'xf_abort',
				text: 'Abbrechen',
				scope:this,
				handler:function()
				{
					win.destroy();
				}
			}]
		});
		formCfg.finalForm 			= win.formPanel;
		formCfg.finalForm.formCfg 	= formCfg
		console.info(formCfg.finalForm,Ext.decode(as_init,true));
		this.doDefaultLayoutLoadValues(formCfg.finalForm,Ext.decode(as_init,true));
		win.show();
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

	rebuildAssozDataForLinAssozDataArray : function(l)
	{
		if (typeof l == "undefined") 			l = [];
		if (!Ext.isArray(l)) 					l = [];

		var data = {'l':l,'a':{}};

		Ext.each(l,function(pack){
			try{
				data['a'][pack.v] = pack;
			} catch(e) {};
		},this);

		return data;
	},

	doConfig : function(as_name,as_id,as_type,as_config,anime)
	{

		/// Config






		var me = this;
		var items = [];
		switch (as_type)
		{
			case 'WIZARD2WIZARD':
			try {
				xredaktor_gui.getInstance().showFormWin({
					animateTarget:anime,
					vid: 202,
					width:500,
					title: 'W:W Konfiguration',
					initValue: Ext.decode(as_config,true),
					xsave: {
						url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/updateConfig',
						pressInJsonName : 'as_config',
						params: {
							as_id:		as_id
						}
					},
					scope:this,
					handler: function (values)
					{
						var r = this.grid.getStore().getById(as_id);
						r.set('as_config',Ext.encode(values));

					}







				});
			} catch (e) {console.info(e);}
			break;

			case 'STAMPER':

			xredaktor_gui.getInstance().showFormWin({
				animateTarget:anime,
				vid: 205,
				title: 'Stamper-Konfiguration',
				initValue: Ext.decode(as_config,true),
				xsave: {
					url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/updateConfig',
					pressInJsonName : 'as_config',
					params: {
						as_id:		as_id
					}
				},
				scope:this,
				handler: function (values)
				{
					var r = this.grid.getStore().getById(as_id);
					r.set('as_config',Ext.encode(values));
				}
			});
			break;


			case 'DATE':
			case 'TIME':
			case 'TIMESTAMP':

			xredaktor_gui.getInstance().showFormWin({
				animateTarget:anime,
				vid: 203,
				title: 'Textfeld-Konfiguration',
				initValue: Ext.decode(as_config,true),
				xsave: {
					url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/updateConfig',
					pressInJsonName : 'as_config',
					params: {
						as_id:		as_id
					}
				},
				scope:this,
				handler: function (values)
				{
					var r = this.grid.getStore().getById(as_id);
					r.set('as_config',Ext.encode(values));
				}
			});
			break;

			case 'WIZARDLIST':

			var newSelection = '';
			var win = false;
			var width 	= 	window.innerWidth*0.9;
			var height 	=  	window.innerHeight*0.9;

			width 	= 640;

			var fieldsOfHeader = [
			{name: 'as_id',		text:'Interne Nummer',		type:'int',		hidden: false, 	header:true},
			{name: 'as_a_id',	text:'Wizard',				type:'string',	hidden: false,  header:true},
			{name: 'as_name',	text:'Interner Name',		type:'string',	hidden: false,  header:true}
			];

			var grid = false;
			var dummyCfgHolder = {
				grid:grid
			};

			grid = xframe_pattern.getInstance().genGrid({
				defaultSearchValue: as_config,
				region:'west',
				forceFit:true,
				border:false,
				plugin_numLines:false,
				split: true,
				tools:[],
				pager:true,
				collapsible: false,
				justDblClick:true,
				xstore: {
					load: 	'/xgo/xplugs/xredaktor/ajax/all_atoms_settings/load',
					remove: '/xgo/xplugs/xredaktor/ajax/all_atoms_settings/remove',
					update: '/xgo/xplugs/xredaktor/ajax/all_atoms_settings/update',
					insert: '/xgo/xplugs/xredaktor/ajax/all_atoms_settings/insert',
					move: 	'/xgo/xplugs/xredaktor/ajax/all_atoms_settings/move',
					pid: 	'wz_id',
					fields: fieldsOfHeader,
					params: {
						a_s_id: xredaktor.getInstance().getCurrentSiteId()
					}
				}
			});

			dummyCfgHolder.grid = grid;

			grid.getStore().load();
			grid.on('itemdblclick',function(view,record) {
				win.destroy();
				xframe.ajax({
					url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/updateConfig',
					params: {
						as_config : record.data.as_id,
						as_id:		as_id
					},
					success: function() {
						me.grid.setDisabled(false);
						me.reloadStore();
					},
					failure: function() {
						me.grid.setDisabled(false);
						me.reloadStore();
					}
				});
			},this);

			win = Ext.create('widget.window', {
				border:false,
				iconCls:'xf_select',
				title: 'AS - Datensatz wählen... ['+as_config+']',
				width: width,
				height: height,
				modal:true,
				layout: 'fit',
				items: [grid]
			});
			win.show();



			break;


			case 'REMOTE_FIELD':


			//try {

			xredaktor_gui.getInstance().showFormWin({
				animateTarget:anime,
				vid: 204,
				width:500,
				title: 'Remote Field',
				initValue: Ext.decode(as_config,true),
				xsave: {
					url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/updateConfig',
					pressInJsonName : 'as_config',
					params: {
						as_id:		as_id
					}
				},
				scope:this,
				handler: function (values)
				{
					var r = this.grid.getStore().getById(as_id);
					r.set('as_config',Ext.encode(values));

				}







			});
			//	} catch (e) {console.info(e);}

			break;



			case 'ATOMLIST':
			case 'WIZARD':
			case 'SIMPLE_W2W':
			case 'UNIQUE_W2W':

			var _title 	= "";
			var _a_type = "";

			switch(as_type)
			{
				case 'SIMPLE_W2W':
				case 'WIZARDLIST':
				case 'WIZARD':
				_title 	= "Wizards";
				_a_type = "WIZARD";
				break;
				case 'ATOMLIST':
				_title 	= "Bausteine";
				_a_type = "ATOM";
				break;
			}

			var newSelection = '';
			var win = false;
			var width 	= window.innerWidth*0.9;
			var height 	=  window.innerHeight*0.9;

			width 	= 640;

			var tree = xframe_pattern.getInstance().genTree({
				region:'center',
				split: true,
				tools:[],
				justDblClick:true,
				forceFit:true,
				bbar_add2:[{
					iconCls:'xf_save',
					text:'Auswahl Speichern',
					scope:this,
					handler:function(){
						win.destroy();
						xframe.ajax({
							url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/updateConfig',
							params: {
								as_config : newSelection,
								as_id:		as_id
							},
							success: function() {
								me.grid.setDisabled(false);
								me.reloadStore();
							},
							failure: function() {
								me.grid.setDisabled(false);
								me.reloadStore();
							}
						});
					}
				}],
				title: '',
				forceFit:true,
				xstore: {
					load: 	'/xgo/xplugs/xredaktor/ajax/atoms/load',
					loadParams : {
						a_type : _a_type,
						a_s_id : xredaktor.getInstance().getCurrentSiteId(),
						gui_mode : 'WIZARD'
					},
					update: '/xgo/xplugs/xredaktor/ajax/atoms/update',
					insert: '/xgo/xplugs/xredaktor/ajax/atoms/insert',
					insertParams : {
						a_type : _a_type,
						a_s_id : xredaktor.getInstance().getCurrentSiteId()
					},
					move: 	'/xgo/xplugs/xredaktor/ajax/atoms/move',
					pid: 	'a_id',
					fields: [
					{name: 'a_name', text:_title,	type:'string', folder: true, editor: {
						allowBlank: false,
						xtype: 'textfield'
					}},
					{name: 'a_id',			text:'Interne Nummer',	type:'int', 	hidden: true}
					]
				}
			});

			tree.on('itemdblclick',function(view,r){
				win.destroy();
				xframe.ajax({
					url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/updateConfig',
					params: {
						as_config : r.data.a_id,
						as_id:		as_id
					},
					success: function() {
						me.grid.setDisabled(false);
						me.reloadStore();
					},
					failure: function() {
						me.grid.setDisabled(false);
						me.reloadStore();
					}
				});
			},this);

			var json = false;

			tree.on('load',function() {
				if (as_config=="") return;

				if (json) {
					if (json.path2expand == '/')
					{
						tree.selectPath('/0/'+as_config,'a_id','/',function(){
						});
						return;
					}
					tree.selectPath('/0'+json.path2expand+'/'+as_config,'a_id','/',function(){
					});
				} else
				{
					xframe.ajax({
						scope:me,
						url: xredaktor.getPath() + '/ajax/atoms/getPathOfAtom',
						params: {
							a_id: as_config
						},
						success: function(_json) {
							json = _json;

							if (json.path2expand == '/')
							{
								tree.selectPath('/0/'+as_config,'a_id','/',function(){
								});
								return;
							}

							console.info("//a_id",as_config);

							tree.selectPath('/0'+json.path2expand+'/'+as_config,'a_id','/',function(){
							});
						},
						failure: function() {
							this.gui.setDisabled(false);
						}
					});
				}
			},this,{buffer:100});


			win = Ext.create('widget.window', {
				border:false,
				title: _title,
				closable: true,
				width: width,
				modal:true,
				height: height,
				layout: 'border',
				items: [tree]
			});
			win.on('afterender__',function(){
				win.doLayout(true);
			},this,{delay:1});
			win.show();
			break;
			case 'COMBO':
			case 'RADIO':
			case 'CHECKBOX':

			var title = "";

			switch(as_type)
			{
				case 'COMBO':
				title = 'Dropdown Konfiguration';
				break;
				case 'RADIO':
				title = 'Radio Konfiguration';
				break;
				case 'CHECKBOX':
				title = 'Checkbox Konfiguration';
				break;
			}

			var fields = [
			{name: 'v', text:'Wert',		type:'string', width: 200, editor: {
				allowBlank: false,
				xtype: 'textfield'
			}},
			{name: 'g', text:'Anzeige',	type:'string', width: 200, editor: {
				allowBlank: false,
				xtype: 'textfield'
			}}];

			var langs = xredaktor.getInstance().getLFE();

			console.info('langs',langs);

			Ext.each(langs,function(s){
				var iso = s.fel_ISO;
				fields.push({name: iso.toUpperCase(), text:'Anzeige '+iso,	type:'string', width: 200, editor: {
					allowBlank: false,
					xtype: 'textfield'
				}});
			});

			var autocheckId = Ext.id();
			var win = xframe.win({
				title:title,
				modal:true,
				items: xframe_pattern.getInstance().genMatrix({
					data: me.checkLinearAssozDataArray(as_config)['l'],
					toolbar_bottom : [{
						xtype:'label',
						id: autocheckId,
						html:'Eingabenkontrolle: <b>noch nicht ausgeführt.</b>'
					}],
					auto_flush: {
						scope: me,
						handler: function(oldCfg,newCfg)
						{
							Ext.getCmp(autocheckId).setText('Überprüfe Eingabe ...');

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
								Ext.getCmp(autocheckId).setText('Achtung: <b>Die Matrix beinhaltet min. 2 gleiche Werte, dies kann zu fehlern führen.</b> ',false);
							} else
							{
								Ext.getCmp(autocheckId).setText('Eingabenkontrolle: Keine Fehler gefunden.');
							}
							if (errorEmpty)
							{
								Ext.getCmp(autocheckId).setText('Achtung: <b>Die Matrix beinhaltet min. einen Datensatz dessen "Anzeigen" nicht eingegeben wurde.</b> ',false);
							}
							if (errorEmptyV)
							{
								Ext.getCmp(autocheckId).setText('Achtung: <b>Die Matrix beinhaltet min. einen Datensatz dessen Wert wurde nicht eingegeben wurde.</b> ',false);
							}

						}
					},
					tools: false,
					autoDestroyStore:false,
					forceFit:true,
					plugin_numLines: true,
					button_add: true,
					button_del: true,
					button_save : {
						scope: me,
						iconCls:'xf_save',
						text: 'Konfiguration speichern',
						handler: function(oldCfg,newCfg)
						{
							var fixed = me.rebuildAssozDataForLinAssozDataArray(newCfg);
							xframe.ajax({
								url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/updateConfig',
								params: {
									as_config : Ext.encode(fixed),
									as_id:		as_id
								},
								success: function() {
									me.grid.setDisabled(false);
									me.reloadStore();
								},
								failure: function() {
									me.grid.setDisabled(false);
									me.reloadStore();
								}
							});

							setTimeout(function(){
								win.destroy();
							},1);
						}
					},
					xstore: {
						pid: 	'v',
						fields: fields
					}})
			});
			win.show();

			break;
			case 'ARRAY':
			xframe.alert('Info','Noch nicht programmiert :: '+as_type);
			break;

			case 'DIR':
			case 'CONTAINER-IMAGES':
			case 'CONTAINER-FILES':

			var win 	= false;
			var width 	= window.innerWidth*0.9;
			var height 	= window.innerHeight*0.9;

			var panel = xredaktor_storage.getInstance().getDirPanel({
				s_storage_scope: xredaktor.getInstance().getCurrentBasicStorage(),
				site_id: xredaktor.getInstance().getCurrentSiteId(),
				width: width,
				height: height,
				mode: 'dir',
				preSelectDir: as_config,
				latestSaved : as_config,
				win: win,
				scope:this,
				handler:function(data)
				{

					if (!Ext.isNumeric(data.s_id)) data.s_id = '';
					var s_id = data.s_id;

					xframe.ajax({
						url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/updateConfig',
						params: {
							as_config : s_id,
							as_id:		as_id
						},
						success: function() {
							me.grid.setDisabled(false);
							me.reloadStore();
						},
						failure: function() {
							me.grid.setDisabled(false);
							me.reloadStore();
						}
					});

					setTimeout(function(){
						win.destroy();
					},1);
				}
			});

			win = Ext.create('widget.window', {
				border:false,
				title: 'Stammverzeichnis auswählen',
				modal: true,
				closable: true,
				width: width,
				height: height,
				layout: 'fit',
				items: [panel]
			});
			win.show();
			break;

			default:
			xframe.alert('Fehler','Typ '+as_type+' existiert NOCH nicht.');
			break;
		}
	},

	unConfigAble : function()
	{
		return "<div style='background-color:black;color:white;'>Bitte Typ auswählen.</div>";
	},

	handleMultiConfigField : function(o,v,r)
	{
		if ((r.data.as_type == "UNDEFINED")||(r.data.as_type == "")) return this.unConfigAble();

		var extraCss = "";
		var button = true;

		switch (r.data.as_type_multi)
		{
			case 'N':
			button = false;
			extraCss = " cellNotUseable";
			break;
			default:
			break;
		}

		var me = this;
		var idx = Ext.id();

		if (button) {
			setTimeout(function(){
				try{
					Ext.get(idx).addClsOnOver('cellButtonUp');
					Ext.get(idx).on('click',function(){
						// this.doConfig(r.data.as_name,r.data.as_id,r.data.as_type,r.data.as_config);
						xframe.alert('NOCHT NICHT GECODED','NOCHT NICHT GECODED');
					},me);
				} catch(e){}
			},1);
		}
		return "<div class='cellButton"+extraCss+"' id='"+idx+"' >Konfigurieren</div>";
	},

	handleConfigField : function(o,v,r)
	{
		if ((r.data.as_type == "UNDEFINED")||(r.data.as_type == "")) return this.unConfigAble();

		var extraCss = "";
		var button = true;

		switch (r.data.as_type)
		{
			case 'FLOAT':
			case 'INT':
			//case 'TIME':
			//case 'DATE':
			//case 'TIMESTAMP':
			//case 'TEXT':
			case 'TEXTAREA':
			case 'HTML':
			case 'FILE':
			case 'INT':
			case 'FLOAT':
			case 'LINK':
			case 'CONTAINER':
			button = false;
			extraCss = " cellNotUseable";
			break;
			default:
			break;
		}

		var me = this;
		var idx = Ext.id();

		if (button) {
			setTimeout(function(){
				try{
					Ext.get(idx).addClsOnOver('cellButtonUp');
					Ext.get(idx).on('click',function(crap,anime){
						this.doConfig(r.data.as_name,r.data.as_id,r.data.as_type,r.data.as_config,anime);
					},me);
				} catch(e){}
			},1);
		}

		var error = "";

		switch (r.data.as_type) {
			case 'CONTAINER-IMAGES':
			case 'CONTAINER-FILES':
			case 'DIR':
			case 'REMOTE_FIELD':
			case 'SIMPLE_W2W':
			case 'UNIQUE_W2W':
			if (r.data.as_config.split(' ').join('') == "")
			{
				error = " style='background-color:red;color:white;' ";
			}
			break;

			default: break;
		}


		return "<div class='cellButton"+extraCss+"' id='"+idx+"' "+error+">Konfigurieren</div>";
	},

	handleInitField : function(o,v,r)
	{
		if ((r.data.as_type == "UNDEFINED")||(r.data.as_type == "")) return this.unConfigAble();

		var extraCss = "";
		var button = true;

		switch (r.data.as_type)
		{
			case 'COMMENT':
			case 'CONTAINER':
			case 'ATOMLIST':
			case 'FILE':
			button = false;
			extraCss = " cellNotUseable";
			break;
			default:
			break;
		}

		var me = this;
		var idx = Ext.id();
		if (button)
		{
			setTimeout(function(){
				try{
					Ext.get(idx).addClsOnOver('cellButtonUp');
					Ext.get(idx).on('click',function(){
						this.doInit(r.data.as_name,r.data.as_id,r.data.as_type,r.data.as_init,r);
					},me);
				} catch(e){}
			},1);
		}


		
		var contentAvail = ""; 
		if (r.data.as_init.split(' ').join('') != "")
		{
			console.info("XXXXXXXXXXXXXXXXXXXXXXXXXXXX");
			contentAvail = " style='background-color:#00b1e7;color:black;!important' ";
		}

		return "<div class='cellButton"+extraCss+"' id='"+idx+"' "+contentAvail+" >Initalwert</div>";
	},


	handleLang : function(renderStore,args)
	{
		var v = args[0];
		var r = args[2];

		if ((r.data.as_type == "UNDEFINED")||(r.data.as_type == "")) return this.unConfigAble();

		var extraCss = "";
		var button = true;

		switch (r.data.as_type)
		{
			case 'CONTAINER':
			button = false;
			extraCss = " cellNotUseable";
			break;
			default:
			break;
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


		var as_type = o.record.data.as_type;

		try {
			var d = this.atom_types_store.getNodeById(as_type);
		} catch (e) {
			return gmode;
		}

		if (!d.data.guiMode) return "-";
		if (!d.data.guiMode[gmode]) return gmode;

		return d.data.guiMode[gmode];

	},



	getMainPanel : function(a_id, a_type)
	{

		var u = Ext.create('Ext.xr.atom_type',{});
		this.atom_types_store = u.getStoreX();

		var me 					= this;
		this.a_type 			= a_type;
		var toolbar_bottom 		= [];
		this.btn_wiz_onoff 		= Ext.id();
		this.btn_wiz_fieldName 	= Ext.id();

		var atomTypes = [
		['CONTAINER',		'Container von Bausteinen'],
		['CONTAINER-IMAGES','Container von Bildern'],
		['CONTAINER-FILES',	'Container von Datein'],
		['SIMPLE_W2W',		'Generische Verknüpfung (n:n)'],
		['UNIQUE_W2W',		'Eindeutige Verknüpfung (n:n) - Feldbezogen'],
		['ATOMLIST',		'Baustein-Liste'],
		['WID',				'Wizard'],
		['WIZARD',			'Wizard-Datensatz'],
		['WIZARDLIST',		'Wizard-Datensatz-Liste (1:n)'],
		['WATTRIBUTE',		'Wizard-Attribute'],
		['WIZARD2WIZARD',	'Wizard - Wizard (n:n)'],
		['LINK',			'Verlinkung'],
		['TEXT',			'Textzeile'],
		['TEXTAREA',		'Textfeld'],
		['MD5PASSWORD',		'MD5-Passwort'],
		['HTML',			'Html'],
		['FILE',			'Filearchiv'],
		['DIR',				'Filearchiv-Ordner'],
		['COMBO',			'Dropdown'],
		['RADIO',			'Radiobuttons'],
		['CHECKBOX',		'Checkbox'],
		['DATE',			'Datum'],
		['TIME',			'Uhrzeit'],
		['TIMESTAMP',		'Datum+Uhrzeit'],
		['INT',				'Ganzezahl'],
		['FLOAT',			'Gleitkommazahl'],
		['GEO-POINT',		'Geo-Punkt'],
		['GEO-BOX',			'Geo-Box'],
		['GEO-POLY',		'Geo-Polygon'],
		['YN',				'Ja/Nein']
		];

		switch (a_type)
		{
			case 'WIZARD':
			break;
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

		var as_typiii = Ext.create('Ext.xr.atom_type',{});

		var but_settings = Ext.create('Ext.Button', {
			iconCls: 'xf_settings',
			text: 'Einstellungen',
			menu: [but_settings_copy,but_settings_paste]
		});

		var autocheckId = Ext.id();
		this.grid = xframe_pattern.getInstance().genGrid({
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


				{name: 'as_gui_pos', 		xgroup:'Normal',										text:'Gui-Position', type:'string', 	xtype: 'combo', store : [['H','Halbe Breite'],['F','Volle Breite']]},


				{name: 'as_useAsHeader', 		hidden: true,scope:this, 		renderer:this.renderYess, xgroup:['Normal','Erweitert'],						text:'Grid', 	type:'string', xtype: 'combo', store : [['Y','Ja'],['N','Nein']], header: (a_type=='WIZARD') ? true:false},
				{name: 'as_useAsHeaderSort', 	hidden: true,xgroup:['Normal','Erweitert'],						text:'Grid Pos', 	type:'int' , 	editor: {xtype: 'numberfield',allowDecimals:false}, header: (a_type=='WIZARD') ? true:false},
				{name: 'as_use4Export', 		hidden: true,xgroup:['Normal','Erweitert'],							text:'Export', 	type:'string', xtype: 'combo', store : [['Y','Ja'],['N','Nein']], renderer:this.renderYess, scope:this},
				{name: 'as_use4ExportSort', 	hidden: true,xgroup:['Normal','Erweitert'],						text:'Export Pos', 	type:'int' , 	editor: {xtype: 'numberfield',allowDecimals:false}, header: (a_type=='WIZARD') ? true:false},


				{name: 'as_group',  		xgroup:['Normal','Erweitert'],							text:'Gruppe', 		type:'string', width: 200, editor: {xtype: 'textfield',selectOnFocus:true}},
				{name: 'as_collection',		scope: this, renderer: this.handleCollection, xgroup:['Normal','Erweitert'],							text:'Collection', 	type:'string', width: 50, editor: {xtype: 'textfield',selectOnFocus:true}},
				{name: 'as_gui_width', 		xgroup:'Normal',										text:'Gui-Spalten', type:'int', 	editor: {xtype: 'numberfield',allowDecimals:false}},
				{name: 'as_gui_mode', 		scope: this, renderer: this.handleGuiMode, xgroup:'Normal',										text:'Gui-Mode', 	type:'int', 	editor: {xtype: 'numberfield',allowDecimals:false}},

				/*
				{name: 'as_gui_height', 		xgroup:'Normal',									text:'Gui-Höhe', type:'int', 	editor: {xtype: 'numberfield',allowDecimals:false}},
				*/
				//,
				//{name: 'as_type', 			xgroup:['Normal','Erweitert'], 							text:'Typ', type:'string', xtype: 'combo', rendererStore: [['UNDEFINED','Noch nicht gesetzt']], store : atomTypes, width: 130},

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