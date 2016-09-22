var xcrm_gui2 = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xcrm_gui2";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xcrm_gui2_(config);
			}
			return instance;
		}
	}
})();

var xcrm_gui2_ = function(config) {
	this.config = config || {};
};

xcrm_gui2_.prototype = {


	genGird : function(names,title,myData)
	{
		var fields 	= [];
		var columns = [];
		var myData2 	= [];

		Ext.each(names,function(n){
			fields.push({name:n});
			columns.push({
				text     : n,
				flex     : 1,
				sortable : false,
				dataIndex: n
			});
		},this);

		// create the data store
		var store = Ext.create('Ext.data.ArrayStore', {
			fields: fields,
			data: myData
		});

		// create the Grid
		var grid = Ext.create('Ext.grid.Panel', {
			title: title,
			layout: 'fit',
			region: 'west',
			width: 200,
			store: store,
			collapsible: true,
			//collapseMode: 'mini',
			split: true,
			columns: columns,
			viewConfig: {
				stripeRows: true
			}
		});

		return grid;
	},

	getGenericPanel : function(a_id,r_id,title,save_title,closable,afterSave) {

		var me = this;

		var buttons = [{
			text:	save_title,
			iconCls:'xf_save',
			scope: this,
			handler: function() {

				var data = panel.getGui().getFormData();

				xframe.ajax({
					scope:this,
					url: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/spreadSave',
					params : {

						domagic:	a_id,
						json_cfg:	Ext.encode(data),
						id: 		r_id

					},
					success: function(json)
					{
						if (typeof afterSave == 'function') afterSave(json);
					}
				});

			}
		}];

		if (a_id == 209) {
			buttons.push('->',{
				text:	'Betrieb löschen',
				iconCls:'xf_del',
				scope: this,
				handler: function() {


					xframe.yn({
						title:'Löschen',
						msg: 'Wollen sie wirklich den Betrieb löschen ?',
						scope:this,
						handler: function(btn)
						{
							if (btn != 'yes') return;

							var data = panel.getGui().getFormData();

							xframe.ajax({
								scope:this,
								url: '/xgo/xplugs/xcrm/ajax/gui/delBetrieb',
								params : {
									b_id: r_id
								},
								success: function(json)
								{
									Ext.getCmp('BETRIEB_'+r_id).close();
								}
							});


						}
					});
				}
			});
		}

		var panel = xredaktor_gui.getInstance().renderFormViaId({

			extraCfg : {
				_id_wz_id: a_id,
				_id_r_id: r_id
			},

			closable: closable,
			scope: me,
			listeners: {
				afterrender: function(gui) {

				}
			},
			id: a_id,
			r_id: r_id,
			msg: 'Formular wird geladen ...',
			title: title,
			buttons:buttons
		});

		return panel;
	},

	getPanel_BetriebsPanel: function(r_id, panel){

		return this.getGenericPanel(209,r_id,'Betriebsdaten','Daten speichern',false,function(json){
			Ext.getCmp('BETRIEB_'+r_id).setTitle(json.titleIt+' ['+r_id+']');
		});

	},

	openTab : function(cfg,r_id,titleIt) {
		var me = this;
		var panel 	= me.getGenericPanel(cfg.wz_id,r_id,titleIt+' ['+r_id+']','Daten speichern',true,function(feedback){
			grid.getStore().load();
			tab.setTitle(feedback.titleIt + ' ['+r_id+']');
		});
		this.center.add(panel);
	},


	getPanel_defaultTab : function(cfg) {

		var me = this;

		var filter = [];

		var fields = [
		{name: 'wz_id',			text:'Interne Nummer',		type:'int',		hidden: false, 	header:true},
		{name: 'titleIt', 		text:'Name', 				type:'string', 	hidden: false, 	header:true}
		];

		var openTab = false;

		var gen_add = function(idx) {

			xframe.ajax({
				scope:this,
				url: '/xgo/xplugs/xcrm/ajax/gui/addKat',
				params : {
					b_id:	cfg.b_id,
					idx:	cfg.wz_id
				},
				success: function(json)
				{
					grid.getStore().load();

					var wz_id 	= json.wz_id;
					var wzId	= json.wzId;

					openTab(wz_id,'Neuer Datensatz');
				}
			});

		}

		var btn_add = {
			scope: this,
			iconCls: 'xf_add',
			text:	cfg.text_add,
			handler: function() {
				gen_add();
			}
		};



		var grid = this.grid = xframe_pattern.getInstance().genGrid({
			button_export: true,
			toolbar_top: [btn_add],
			selModelButtons: [],
			region:'west',
			search:true,
			forceFit:true,
			width: 100,
			border:false,
			split: true,
			pager:true,
			title: 'Übersicht',
			plugin_numLines: false,
			button_add: false,
			button_del: true,
			button_export: true,
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/load',
				loadParams : {
					titleIt: 1,
					domagic : cfg.wz_id,
					wzListScopeID: cfg.b_id,
					wzListScope: cfg.binder
				},
				remove: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/remove',
				update: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/update',
				insert: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/insert',
				insertParams : {
					domagic : cfg.wz_id
				},
				updateParams : {
					domagic : cfg.wz_id
				},
				removeParams : {
					domagic : cfg.wz_id
				},
				move: 	'/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/move',
				pid: 	'wz_id',
				fields: fields
			}
		});

		grid.on('afterrender',function(){
			grid.getStore().load();
		},this);

		var tabpanel = Ext.create('Ext.tab.Panel',{
			border:false,
			region: 'center',
			defaults: {
				closable: true
			}
		});


		openTab = function(r_id,titleIt) {

			if (!me.checkIfOpen) 				me.checkIfOpen = {};
			if (!me.checkIfOpen[cfg.wz_id]) 	me.checkIfOpen[cfg.wz_id] = {};

			if (me.checkIfOpen[cfg.wz_id][r_id]) {
				tabpanel.setActiveTab(me.checkIfOpen[cfg.wz_id][r_id]);
				return;
			}

			var tab 	= false;
			var panel 	= me.getGenericPanel(cfg.wz_id,r_id,titleIt+' ['+r_id+']','Daten speichern',true,function(feedback){
				grid.getStore().load();
				tab.setTitle(feedback.titleIt + ' ['+r_id+']');
			});

			tab = tabpanel.add(panel);
			tab.on('destroy',function(){
				me.checkIfOpen[cfg.wz_id][r_id] = false;
			},me);

			me.checkIfOpen[cfg.wz_id][r_id] = tab;

			tab.show();
		}

		grid.on('itemdblclick',function(t,r){

			var r_id 	= r.data.wz_id;
			var titleIt = r.data.titleIt;

			openTab(r_id,titleIt);

		},this);

		var ret = {
			title: cfg.title,
			layout: 'fit',
			items : [{
				xtype: 'panel',
				layout: 'border',
				items: [grid,tabpanel]
			}]
		}

		return ret;
	},

	getPanel_BetriebsPanel_Ansprechpersonen: function(b_id) {

		var ret = this.getPanel_defaultTab({
			b_id:		b_id,
			wz_id: 		210,
			binder:		1127,
			title: 		'Ansprechpersonen',
			text_add: 	'Ansprechperson erstellen'
		});

		return ret;
	},

	getPanel_BetriebsPanel_Notizen: function(b_id) {

		var ret = this.getPanel_defaultTab({
			b_id:		b_id,
			wz_id: 		215,
			binder:		1152,
			title: 		'Notizen',
			text_add: 	'Notizen erstellen'

		});

		return ret;
	},

	getPanel_BetriebsPanel_Events: function(b_id) {

		var ret = this.getPanel_defaultTab({
			b_id:		b_id,
			wz_id: 		213,
			binder:		1155,
			title: 		'Events',
			text_add: 	'Events erstellen'
		});

		return ret;
	},

	getPanel_BetriebsPanel_Angebote: function(b_id) {

		var ret = this.getPanel_defaultTab({
			b_id:		b_id,
			wz_id: 		212,
			binder:		1153,
			title: 		'Angebote',
			text_add: 	'Angebote erstellen'
		});

		return ret;
	},



	getPanel_BetriebsPanel_Kategorien: function(b_id) {

		var me 		= this;
		var grid 	= false;
		var openTab = false;



		var gen_add = function(idx) {

			xframe.ajax({
				scope:this,
				url: '/xgo/xplugs/xcrm/ajax/gui/addKat',
				params : {
					b_id:	b_id,
					idx:	idx
				},
				success: function(json)
				{
					grid.getStore().load();

					var wz_id 	= json.wz_id;
					var wzId	= json.wzId;

					openTab(wzId,wz_id,'Neuer Datensatz');
				}
			});

		}

		var button_add = {
			xtype:'splitbutton',
			text: 'Kategorie hinzufügen',
			iconCls: 'xf_add',
			menu: [{
				text: 'Unterkunft',
				scope: this,
				handler: function() {
					gen_add(211);
				}
			},{
				text: 'Kulinarik',
				scope: this,
				handler: function() {
					gen_add(217);
				}
			},{
				text: 'Feinschmeckerei & Shopping',
				scope: this,
				handler: function() {
					gen_add(322);
				}
			},{
				text: 'Wein',
				scope: this,
				handler: function() {
					gen_add(218);
				}
			},{
				text: 'Kultur',
				scope: this,
				handler: function() {
					gen_add(219);
				}
			},{
				text: 'Sport & Freizeit',
				scope: this,
				handler: function() {
					gen_add(220);
				}
			},{
				text: 'Natur',
				scope: this,
				handler: function() {
					gen_add(221);
				}
			},{
				text: 'Partner & Lieferanten',
				scope: this,
				handler: function() {
					gen_add(222);
				}
			}]
		};


		var but_del_id = Ext.id();
		var but_del = {
			iconCls:'xf_del',
			id:but_del_id,
			disabled:true,
			scope:this,
			text:'Kategorien löschen',
			handler: function(){


				xframe.yn({
					title:'Löschen',
					msg: 'Wollen sie wirklich die selektierten Datensätze wirklich löschen?',
					scope:this,
					handler: function(btn)
					{
						if (btn != 'yes') return;


						var sel 	= grid.getSelectionModel();
						var keys 	= [];

						Ext.each(sel.getSelection(),function(r){
							keys.push(r.data.wzId+'_'+r.data.wz_id);
						},this);

						xframe.ajax({
							scope:this,
							url: '/xgo/xplugs/xcrm/ajax/gui/delKats',
							params : {
								b_id: b_id,
								keys: keys.join(',')
							},
							success: function(json)
							{
								grid.getStore().load();
							}
						});

					}
				});


			}
		};





		var fields = [
		{name: 'id',			text:'Interne Nummer',		type:'int',		hidden: false, 	header:true},
		{name: 'wz_id',			text:'Datensatz ID',		type:'int',		hidden: false, 	header:true},
		{name: 'wzId',			text:'Wizard',				type:'int',		hidden: true, 	header:true},
		{name: 'titleIt', 		text:'Name', 				type:'string', 	hidden: false, 	header:true}
		];

		grid = this.grid = xframe_pattern.getInstance().genGrid({
			toolbar_top: [button_add,but_del],
			selModelButtons: [but_del_id],
			region:'west',
			search:true,
			forceFit:true,
			width: 100,
			border:false,
			split: true,
			pager:true,
			title: 'Übersicht',
			plugin_numLines: false,
			button_add: false,
			button_del: false,
			search: false,
			xstore: {
				load: 	'/xgo/xplugs/xcrm/ajax/gui/getKats',
				loadParams : {
					b_id: b_id
				},
				pid: 	'id',
				fields: fields
			}
		});


		var tabpanel = Ext.create('Ext.tab.Panel',{
			border:false,
			region: 'center',
			defaults: {
				closable: true
			}
		});

		grid.on('afterrender',function(){
			grid.getStore().load();
		},this,{buffer:10});



		openTab = function(wzId,r_id,titleIt) {


			if (!me.checkIfOpen) 			me.checkIfOpen = {};
			if (!me.checkIfOpen[wzId]) 		me.checkIfOpen[wzId] = {};

			if (me.checkIfOpen[wzId][r_id]) {
				tabpanel.setActiveTab(me.checkIfOpen[wzId][r_id]);
				return;
			}

			var tab 	= false;
			var panel 	= me.getGenericPanel(wzId,r_id,titleIt+' ['+r_id+']','Daten speichern',true,function(feedback){
				grid.getStore().load();
				tab.setTitle(feedback.titleIt + ' ['+r_id+']');
			});

			tab = tabpanel.add(panel);

			tab.on('destroy',function(){
				me.checkIfOpen[wzId][r_id] = false;
			},me);

			me.checkIfOpen[wzId][r_id] = tab;

			tab.show();

		}

		grid.on('itemdblclick',function(t,r){

			var wzId 	= r.data.wzId;
			var r_id 	= r.data.wz_id;
			var titleIt = r.data.titleIt;

			console.info("wzId",wzId);

			openTab(wzId,r_id,titleIt);

		},this);


		var ret = {
			title: 'Kategorien',
			layout: 'fit',
			items : [{
				xtype: 'panel',
				layout: 'border',
				items: [grid,tabpanel]
			}]

		}

		return ret;
	},


	openBetrieb: function(wz_id,wz_title)
	{
		var me 		= this;
		var fid		= 'BETRIEB_'+wz_id;

		var panel	= Ext.getCmp(fid);


		if (!panel)
		{
			panel 	= Ext.createWidget('tabpanel',{
				id: fid,
				closable: true,
				layout: 'fit',
				border: false,
				region: 'center',
				title: wz_title+' ['+wz_id+']',
				defaults: {
					border: false
				},
				items: [
				me.getPanel_BetriebsPanel(wz_id,panel),
				me.getPanel_BetriebsPanel_Kategorien(wz_id),
				me.getPanel_BetriebsPanel_Ansprechpersonen(wz_id),
				me.getPanel_BetriebsPanel_Notizen(wz_id),
				me.getPanel_BetriebsPanel_Events(wz_id),
				me.getPanel_BetriebsPanel_Angebote(wz_id)
				]
			});
			me.center.add(panel).show();
		} else
		{
			me.center.setActiveTab(panel);
		}

	},


	rendererX : function(v,r) {
		if (r.record.data.wz_online == 'N') {
			return "<span style='background-color:black;color:white;padding-left:5px;padding-right:5px;'>"+v+"</span>";
		}
		return v;
	},


	createWelcome : function()
	{
		var me = this;
		return Ext.create('Ext.ux.IFrame',{

			bodyStyle:'padding:0',
			closable: true,
			title: 'Startseite',
			autoScroll: true,
			loader: {
				url: '/xgo/xplugs/xcrm/media/html/start.html',
				autoLoad: true,
				listeners: {
					scope: me,
					load: function() {
						me.enableStartButtons();
					}
				}
			}
		});
	},

	openSetup: function() {
		console.info('openSetup');
	},

	enableStartButtons: function() {
		var me = this;

		$$('.start_screen_personen').click(function(){
			Ext.getCmp(me.id_leftPanel_ansprechperson).expand();
		});

		$$('.start_screen_betriebe').click(function(){
			Ext.getCmp(me.id_leftPanel_betriebsdaten).expand();
		});

		$$('.start_screen_angebote').click(function(){
			Ext.getCmp(me.id_leftPanel_angebote).expand();
		});

		$$('.start_screen_events').click(function(){
			Ext.getCmp(me.id_leftPanel_events).expand();
		});

		$$('.start_screen_notizen').click(function(){
			Ext.getCmp(me.id_leftPanel_notizen).expand();
		});

		$$('.start_screen_bilder').click(function(){
			Ext.getCmp(me.id_leftPanel_bildDb).expand();
		});

		$$('.start_screen_reports').click(function(){
			Ext.getCmp(me.id_leftPanel_report).expand();
		});

		$$('.start_screen_mailings').click(function(){
			Ext.getCmp(me.id_leftPanel_newsletter).expand();
		});

		$$('.start_screen_setup').click(function(){
			me.openSetup.call(me);
		});

		Ext.each(this.hiders,function(css){
			$$('.'+css).hide();
		},this);

	},



	buildDesktop : function()
	{
		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xcrm/ajax/gui/loadDataStorage',
			params : {
				ids: '307,276,307,284,285'
			},
			success: function(json)
			{
				this.dataStorage = json.data;
				this.buildDesktop2();
			}
		});
	},

	buildCheckBoxList: function(wz_id,idx,fieldName) {

		var items = [];

		Ext.each(this.dataStorage[wz_id],function(kk){
			items.push({
				boxLabel: kk[fieldName],
				name: idx,
				inputValue: kk.wz_id
			});
		},this);

		return items;
	},

	convert2field: function(h)
	{
		switch(h.as_type)
		{
			case 'TEXT':
			case 'TEXTAREA':
			case 'COMBO':
			return {name: 'wz_'+h.as_name,	text:h.as_name, type:'string' , hidden: false, 	header:true};


			case 'SIMPLE_W2W':
			case 'WIZARD':

			return {name: 'wz_'+h.as_name,	text:h.as_name, type:'string' , hidden: false, 	header:true};

			break;

			default:
			console.info("Adding invalid Type",h.as_type,h);
			return false;
		}
		return false;
	},


	buildUpGirdCallBack: function(cfg)
	{

		var exportFieldsAvailable = [];
		try {
			exportFieldsAvailable = cfg['gridCfg']['export'];
		} catch (e) {}

		var a_id = cfg.wzId;
		var filter = [];

		var fields = [
		{name: 'wz_id',		text:'ID',					type:'int',		hidden: false, 	header:true, width: 60, renderer: this.rendererX, flex: 0},
		{name: 'wz_online', text:'AKTIV', 				type:'string', 	hidden: false, 	header:true, xtype: 'combo', store : [['Y','Ja'],['N','Nein']], width: 60, flex: 0},
		{name: 'titleIt',	text:'NAME',				type:'string' , hidden: false, 	header:true}
		];

		Ext.each(cfg.gridCfg.header,function(h){
			var addOn = this.convert2field(h);
			if (addOn) {
				fields.push(addOn);
			}
		},this);


		console.info("fields",fields);

		var grid = false;
		var gridHeaderCfgHelper = {
			grid:grid
		};

		var sorters = [];

		if (cfg.sorters)
		{
			sorters = cfg.sorters;
		}

		if (cfg.extraStoreParams)
		{
			sorters = cfg.sorters;
		}

		var xParams = {
			titleIt: 1,
			domagic : a_id
		};

		if (cfg.extraStoreParams)
		{
			Ext.iterate(cfg.extraStoreParams,function(k,v){
				xParams[k] = v;
			});
		}

		grid = xframe_pattern.getInstance().genGrid({
			id: cfg.id || Ext.id(),
			closable: true,
			noDND: true,
			toolbar_top: [],
			selModelButtons: [],
			region:'west',
			search:true,
			forceFit:true,
			border:false,
			split: true,
			pager:true,
			button_export: exportFieldsAvailable,
			title: cfg.title,
			plugin_numLines: false,
			button_add: false,
			button_del: true,
			xstore: {

				sorters: sorters,

				load: 	'/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/load',
				remove: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/remove',
				update: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/update',
				insert: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/insert',
				loadParams: xParams,
				updateParams: xParams,
				removeParams: xParams,

				pid: 	'wz_id',
				fields: fields
			}
		});


		cfg.callback.call(cfg.scope,grid);
	},


	buildUpGird: function(cfg)
	{

		// cfg.wzId
		// cfg.title
		// cfg.scope
		// cfg.callback


		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xcrm/ajax/gui/getGridCfg',
			params : {
				wzId: cfg.wzId || 0
			},
			success: function(json)
			{
				cfg.gridCfg = json;
				this.buildUpGirdCallBack(cfg);
			}
		});

	},





	buildDesktop2 : function()
	{
		xframe.setAppTitle("Die Burgenland Datenbank - Layout 2");




		var me = this;
		$ = $$;


		this.top = Ext.create('Ext.Panel',{
			layout: 'fit',
			region: 'north',
			border: false,
			html: '<div id="xcrm_logo_customer"></div><div id="bt_abmelden"></div>',
			baseCls: 'xcrm_top_header',
			height: 110
		});

		this.top.on('afterrender',function(){
			$('#bt_abmelden').unbind('click');
			$('#bt_abmelden').click(function(){
				top.logoff();
				setTimeout(function(){
					top.location.reload();
				},100);
			});
		},this);

		this.top.on('resize',function(){

			var left 	= this.top.getWidth()-120;
			var top 	= 40;

			$('#bt_abmelden').css({
			'left':left,
			'top': top
			});

		},this);


		this.center = Ext.createWidget('tabpanel',{
			layout: 'fit',
			border: false,
			region: 'center',
			activeTab: 0,
			itemId: 'tabPanel',
			items: [this.createWelcome()]
		});

		this.center.on('afterrender',function(m,w,h){

			this.startup();

		},this,{buffer:10});



		this.right = Ext.create('Ext.Panel',{
			layout: 'fit',
			border: false,
			region: 'east',
			width: 400,
			html:'',
			title:'Content',
			collapsible: true,
			//collapseMode: 'mini',
			split: true
		});


		this.left = Ext.create('Ext.Panel',{
			layout: 'fit',
			region: 'west',
			border: false,
			autoScroll: true,
			bodyCls: '',
			width: 400,
			html: 'left',
			title: 'Suche',
			collapsible: true,
			//collapseMode: 'mini',
			split: true
		});



		var betriebsdatenSuche = false;
		var reportdatenSuche = false;

		update_searchResultHandlers = function() {





			$('.betrieb_poster .betrieb_poster_edit, .betrieb_poster .betrieb_poster_img').unbind('click');
			$('.betrieb_poster .betrieb_poster_edit, .betrieb_poster .betrieb_poster_img').click(function(){

				var xtype		= $(this).parent().attr('xtype');
				var wz_id 		= $(this).parent().attr('wz_id');
				var wz_title 	= $(this).parent().attr('wz_title');




				me.openBetrieb(wz_id,wz_title);






			});

		}


		doGridFilter = function(grid,filters) {


			var upsP = false;
			var ups = {};

			Ext.iterate(filters,function(k,v){
				if (!grid.filters.getFilter(k))
				{
					upsP = true;

					//if (!ups[k]) ups[k] = [];
					//ups[k].push(v);
					ups[k] = v;

					return;
				}
				grid.filters.getFilter(k).setActive(true) ;
				grid.filters.getFilter(k).setValue(v) ;
			});


			if (upsP)
			{
				console.info("Change Prx",ups);
				grid.getStore().proxy.extraParams.defaultNumericQueryAddons = Ext.encode(ups);
				//grid.getStore().load();
			} else {

				if (grid.getStore().proxy.extraParams.defaultNumericQueryAddons)
				{
					delete(grid.getStore().proxy.extraParams.defaultNumericQueryAddons);
				}

			}


		}




		doSearch_betriebe = function(queryCfgOld) {







			var queryCfg = {};
			Ext.iterate(queryCfgOld,function(k,v){
				queryCfg[k] = v;
			});

			if (!betriebsdatenSuche)
			{

				var filter = [];

				var fields = [
				{name: 'wz_id',		text:'ID',					type:'int',		hidden: false, 	header:true, width: 60, renderer: this.rendererX, flex: 0},
				{name: 'wz_online', text:'Aktiv', 				type:'string', 	hidden: false, 	header:true, xtype: 'combo', store : [['Y','Ja'],['N','Nein']], width: 50, flex: 0},
				{name: 'titleIt',	text:'Name',				type:'string' , hidden: false, 	header:true},
				//{name: 'wz_NAME',	text:'Name',				type:'string' , hidden: false, 	header:true},
				{name: 'wz_PLZ',	text:'PLZ',					type:'string' , hidden: false, 	header:true},
				{name: 'wz_ORT',	text:'Ort',					type:'string' , hidden: false, 	header:true},
				{name: 'wz_STRASSE',text:'Strasse',				type:'string' , hidden: false, 	header:true},
				{name: 'wz_sort',	text:'Sortierung',			type:'int' , 	hidden: true, 	header:true, editor: {xtype: 'numberfield',allowDecimals:false}}
				];

				var grid = false;
				var gridHeaderCfgHelper = {
					grid:grid
				};

				grid = this.grid = xframe_pattern.getInstance().genGrid({
					closable: true,
					toolbar_top: [],
					selModelButtons: [],
					region:'west',
					search:true,
					forceFit:true,
					border:false,
					split: true,
					pager:true,
					button_export: true,
					title: 'Betriebssuche',
					plugin_numLines: false,
					button_add: false,
					button_del: true,
					xstore: {

						sorters: [{
							property: 'titleIt',
							direction: 'ASC' // or 'ASC'
						}],

						load: 	'/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/load',
						loadParams : {
							titleIt: 1,
							domagic : 209,
							filter: filter || ''
						},
						remove: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/remove',
						update: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/update',
						insert: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/insert',
						insertParams : {
							domagic : 209
						},
						updateParams : {
							domagic : 209
						},
						removeParams : {
							domagic : 209
						},
						move: 	'/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/move',
						pid: 	'wz_id',
						fields: fields
					}
				});



				grid.on('itemdblclick',function(t,r){
					this.openBetrieb(r.data.wz_id,r.data.titleIt);
				},this);

				grid.on('afterrender',function(){
					grid.filters.createFilters();
					doGridFilter(grid,queryCfg);
				},this);

				grid.getStore().load();

				betriebsdatenSuche = this.center.add(grid);
				betriebsdatenSuche.on('close',function(){
					betriebsdatenSuche = false;
				},this);
				betriebsdatenSuche.grid = grid;
			} else {
				doGridFilter(betriebsdatenSuche.grid,queryCfg);
			}

			betriebsdatenSuche.show();
		}


		doSearch_reports = function(queryCfg) {



			if (!reportdatenSuche)
			{

				var filter = [];

				var fields = [
				{name: 'wz_id',		text:'ID',					type:'int',		hidden: false, 	header:true, width: 15},
				{name: 'wz_online', text:'Online', 				type:'string', 	hidden: false, 	header:true, xtype: 'combo', store : [['Y','Ja'],['N','Nein']], width: 15},
				{name: 'titleIt',	text:'Titel',				type:'string' , hidden: false, 	header:true},
				{name: 'wz_NAME',	text:'Titel',				type:'string' , hidden: false, 	header:true},
				{name: 'wz_PLZ',	text:'PLZ',					type:'string' , hidden: false, 	header:true},
				{name: 'wz_ORT',	text:'Ort',					type:'string' , hidden: false, 	header:true},
				{name: 'wz_STRASSE',text:'Strasse',				type:'string' , hidden: false, 	header:true},
				{name: 'wz_sort',	text:'Sortierung',			type:'int' , 	hidden: true, 	header:true, editor: {xtype: 'numberfield',allowDecimals:false}}
				];

				var grid = false;
				var gridHeaderCfgHelper = {
					grid:grid
				};

				grid = this.grid = xframe_pattern.getInstance().genGrid({
					closable: true,
					toolbar_top: [],
					selModelButtons: [],
					region:'west',
					search:true,
					forceFit:true,
					border:false,
					split: true,
					pager:true,
					title: 'Report-Listing',
					plugin_numLines: false,
					button_add: false,
					button_del: true,
					xstore: {
						load: 	'/xgo/xplugs/xcrm/ajax/gui/searchReport',
						loadParams : {
							searchAgent: queryCfg.searchAgent
						},
						pid: 	'wz_id',
						fields: fields
					}
				});

				grid.getStore().load();

				grid.on('itemdblclick',function(t,r){
					this.openBetrieb(r.data.wz_id,r.data.titleIt);
				},this);

				grid.on('afterrender',function(){
					grid.filters.createFilters();
					doGridFilter(grid,queryCfg);
				},this);


				reportdatenSuche = this.center.add(grid);
				reportdatenSuche.on('close',function(){
					reportdatenSuche = false;
				},this);
				reportdatenSuche.grid = grid;
			} else {
				//grid.getStore().load();
			}

			reportdatenSuche.show();
		}


		var kat_items = [];
		Ext.each(this.dataStorage[307],function(kk){
			kat_items.push({
				boxLabel: kk.wz_KATEGORIE,
				name: '1140',
				inputValue: kk.wz_id
			});
		},this);


		var betriebsdaten = Ext.create('Ext.form.Panel', {
			frame:false,
			bodyStyle:'padding:15px',
			fieldDefaults: {
				msgTarget: 'side',
				labelWidth: 75
			},
			title: 'Betriebe',
			defaultType: 'textfield',
			defaults: {
				anchor: '100%',
				scope: me,
				listeners: {
					specialkey: function(field, e){
						if (e.getKey() == e.ENTER) {



							me.doDefaultGridSearcher({
								title: 'Betriebssuche',
								holder: betriebsdaten,
								wzId: 209,
								hidden: false
							});

						}
					}
				}
			},

			items: [{
				fieldLabel: 'Betrieb',
				name: 'titleIt'
			},{
				fieldLabel: 'PLZ',
				name: 'wz_PLZ'
			},{
				fieldLabel: 'Ort',
				name: 'wz_ORT'
			}, {
				fieldLabel: 'Strasse',
				name: 'wz_STRASSE'
			},


			{
				xtype: 'fieldset',
				title: 'Regionen',
				collapsible: true,
				collapsed: true,
				defaultType: 'checkbox',
				defaults: {
					anchor: '100%',
					bodyStyle:'padding:15px'
				},
				items :this.buildCheckBoxList(276,1167,'wz_NAME')
			},


			{
				xtype: 'fieldset',
				title: 'Kategorie',
				collapsible: true,
				collapsed: true,
				defaultType: 'checkbox',
				defaults: {
					anchor: '100%',
					bodyStyle:'padding:15px'
				},

				items :kat_items
			}

			,{
				xtype: 'button',
				text: '<b>Suchen</b>',
				scope: me,
				handler: function() {
					me.doDefaultGridSearcher({
						title: 'Betriebssuche',
						holder: betriebsdaten,
						wzId: 209,
						hidden: false
					});
				}
			}
			,{
				xtype: 'button',
				text: 'Betrieb erstellen',
				scope: me,
				handler: function() {

					xframe.ajax({
						scope:this,
						url: '/xgo/xplugs/xcrm/ajax/gui/newBetrieb',
						params : {
						},
						success: function(json)
						{
							this.openBetrieb(json.wz_id,'Neuer Betrieb');
						}
					});


				}
			}]
		});

		var uploadHtml = "<div align='center' style='width:100%;margin:20px;'>";
		uploadHtml += '<form class="xcrm_hidden_fileupload_bd" action="/xgo/xplugs/xcrm/ajax/gui/bild_datenbank_upload" method="POST" enctype="multipart/form-data">';
		uploadHtml += '<div class="xcrm_f_img_new">';
		uploadHtml += '<input type="file" name="files" multiple m_id="" wz_id="" f_id="" as_type="">';
		uploadHtml += '</div>';
		uploadHtml += '</form></div>'




		/*
		this.bilderdatenbank = Ext.create('Ext.form.Panel', {
		frame:false,
		bodyStyle:'padding:15px',
		fieldDefaults: {
		msgTarget: 'side',
		labelWidth: 75
		},
		title: 'Bilderdatenbank',
		defaultType: 'textfield',
		defaults: {
		anchor: '100%',
		scope: me,
		listeners: {
		specialkey: function(field, e){
		if (e.getKey() == e.ENTER) {

		var searchSettings = betriebsdaten.getForm().getValues();
		doSearch_betriebe.call(this,searchSettings);

		}
		}
		}
		},

		items: [{
		xtype: 'fieldset',
		title: 'Filter-Regionen',
		collapsible: true,
		collapsed: true,
		defaultType: 'checkbox',
		defaults: {
		anchor: '100%',
		bodyStyle:'padding:15px'
		},
		items :this.buildCheckBoxList(276,1030,'wz_NAME')
		},{
		xtype: 'fieldset',
		title: 'Filter-Kategorie',
		collapsible: true,
		collapsed: true,
		defaultType: 'checkbox',
		defaults: {
		anchor: '100%',
		bodyStyle:'padding:15px'
		},

		items :this.buildCheckBoxList(284,1027,'wz_KATEGORIE')
		},{
		xtype: 'fieldset',
		title: 'Filter-Themen',
		collapsible: true,
		collapsed: true,
		defaultType: 'checkbox',
		defaults: {
		anchor: '100%',
		bodyStyle:'padding:15px'
		},

		items :this.buildCheckBoxList(285,1029,'wz_NAME')
		},{
		xtype: 'button',
		text: 'Bilder Suchen',
		scope: me,
		handler: function() {

		this.openBildDatenbank();

		}
		}]
		});
		*/


		var eventsExtra = [{
			xtype: 'datefield',
			name: 'START',
			fieldLabel: 'Von'
		},{
			xtype: 'datefield',
			name: 'STOP',
			fieldLabel: 'Bis'
		}]


		// genDefaultSearchPanel: function(				title,					wzId,fields,					hidden, extraGui,	cols, 				newButton) {

		var angebote 		= me.genDefaultSearchPanel('Angebote',				212,[1153,1007],				[1153],	[],			[1011,1012,1015],	false);
		var notizen 		= me.genDefaultSearchPanel('Notizen',				215,[1037,1041],				[1152],	[],			[],					false);
		var ansprechperson 	= me.genDefaultSearchPanel('Ansprechpersonen',		210,[1006,1002,1003],			[],		[],			[1001,1002,1004],	true);
		var events			= me.genDefaultSearchPanel('Events',				213,[1321,1018,1021,1025,1026],	[1155],	eventsExtra,[1026],				false);
		var reports			= me.genDefaultSearchPanel('Suchagenten/Reports',	229,[],							[],		[],			[],					false);

		var newsletter 		= Ext.create('Ext.Panel',{
			title: 'Mailings',
			layout: 'vbox',
			bodyStyle:'padding:20px',
			defaults: {
				xtype: 'button',
				width: 	'100%',
				textAlign: 'left',
				height: 50,
				padding: 10,
				margin: 5
			},
			items:[{

				text:'Aussendungen',
				iconCls: 'xm_emi',
				scope: me,
				handler: function() {

					if (!me.xm_e_id) me.xm_e_id = Ext.id();
					if (!Ext.getCmp(me.xm_e_id)) {
						var g 	= xmarketing_emission.getInstance().getMainPanel(me.xm_e_id);
						var tab = me.center.add(g);
						tab.show();
					} else
					{
						Ext.getCmp(me.xm_e_id).show();
					}

				}
			},{
				xtype: 'button',
				text:'Listen',
				scope: me,
				iconCls: 'xm_list',
				handler: function() {



					if (!me.xm_l_id) me.xm_l_id = Ext.id();
					if (!Ext.getCmp(me.xm_l_id)) {
						var g 	= xmarketing_lists.getInstance().getMainPanel(me.xm_l_id);
						var tab = me.center.add(g);
						tab.show();
					} else
					{
						Ext.getCmp(me.xm_l_id).show();
					}




				}
			},{
				xtype: 'button',
				text:'Empfänger',
				scope: me,
				iconCls: 'xm_rec',
				handler: function() {

					if (!me.xm_r_id) me.xm_r_id = Ext.id();
					if (!Ext.getCmp(me.xm_r_id)) {
						var g 	= xmarketing_recipients.getInstance().getMainPanel(me.xm_r_id);
						var tab = me.center.add(g);
						tab.show();
					} else
					{
						Ext.getCmp(me.xm_r_id).show();
					}

				}
			},{
				xtype: 'button',
				text:'Konfiguration',
				iconCls: 'xf_settings',
				scope: me,
				handler: function() {

					if (!me.xm_c_id) me.xm_c_id = Ext.id();
					if (!Ext.getCmp(me.xm_c_id)) {
						var g 	= xmarketing_config.getInstance().getMainPanel(me.xm_c_id);
						var tab = me.center.add(g);
						tab.show();
					} else
					{
						Ext.getCmp(me.xm_c_id).show();
					}

				}
			}]


		});


		me.newsletterPanel = false;

		var bilderdatenbank					= this.bilderdatenbank2();

		this.id_leftPanel_report 			= reports.id = Ext.id();
		this.id_leftPanel_betriebsdaten 	= betriebsdaten.id;
		this.id_leftPanel_ansprechperson 	= ansprechperson.id = Ext.id();
		this.id_leftPanel_angebote 			= angebote.id = Ext.id();
		this.id_leftPanel_events 			= events.id = Ext.id();
		this.id_leftPanel_notizen 			= notizen.id = Ext.id();
		this.id_leftPanel_bildDb 			= bilderdatenbank.id;
		this.id_leftPanel_newsletter 		= newsletter.id;


		var mitems 	= [];
		var tags 	= xredaktor.getInstance().getUserRolesTags();
		var hiders 	= [];



		var rights = function(tag,panel,css)
		{
			if (tags[tag]) {
				mitems.push(panel);
			} else {
				hiders.push(css);
			}
		}

		rights('betriebe',betriebsdaten,		'start_screen_betriebe');
		rights('personen',ansprechperson,		'start_screen_personen');
		rights('angebote',angebote,				'start_screen_angebote');
		rights('events',events,					'start_screen_events');
		rights('notizen',notizen,				'start_screen_notizen');
		rights('bilder',bilderdatenbank,		'start_screen_bilder');
		rights('reports',reports,				'start_screen_reports');
		rights('newsletter',newsletter,			'start_screen_mailings');

		this.hiders = hiders;

		this.left = Ext.create('Ext.panel.Panel', {

			layout: 'fit',
			region: 'west',
			border: false,
			collapsible: true,
			//collapseMode: 'mini',
			split: true,

			xbbar: [{
				text: 'Newsletter',
				iconCls: 'xm_rec',
				scope: me,
				handler: function(){

				}
			}],

			title: 'Hauptmenü',
			width: 300,
			layout:'accordion',
			defaults: {
				bodyStyle: 'padding:15px',
				autoScroll: true
			},
			layoutConfig: {
				titleCollapse: false,
				animate: true,
				activeOnTop: true
			},
			items: mitems,
			xbbar: ['->',{
				text: 'Setup',
				scope: me,
				handler: me.openSetup
			}]
		});

		this.mp = Ext.create('Ext.Panel',{
			region: 'center',
			layout: 'border',
			border: false,
			items: [this.top,this.center,this.left]
		});

		xredaktor.getInstance().viewport_master.removeAll();
		xredaktor.getInstance().viewport_master.doLayout();

		var viewport = Ext.create('Ext.Viewport', {
			layout: {
				type: 'border'
			},
			defaults: {
				split: true
			},
			items: [this.mp]
		});

		this.viewport = viewport;

		viewport.on('afterrender',function(m,w,h){
			$('#zapf').hide();



		},this,{buffer:10});

		viewport.on('resize',function(m,w,h){
		},this,{buffer:10});

	},

	collectSearchData : function()
	{
		$ = $$;
		var data = {};

		var data2 = this.bilderdatenbank_form.getForm().getValues();
		Ext.iterate(data2,function(k,v){

			data[k] = {};

			if (!Ext.isArray(v)) {
				v = [v];
			}

			Ext.each(v,function(i){
				data[k][i] = 'on';
			});

		});

		return data;
	},


	handleImgsOfBilder: function() {

		$ = $$;
		var me = this;

		$('.bd_image').unbind('click');
		$('.bd_image').click(function(){

			var id 		= $(this).attr('del_id');
			var title 	= $(this).attr('title');

			if (title == "") {
				title = "Bild "+id;
			}

			me.openImage(id,title);

		});


		/*$('#bilddatenbank_main').screw({
		callBack : function() {
		me.handleImgsOfBilder();
		}
		});*/

	},

	openImage: function(id,title) {

		var me 	= this;
		var idx = 'IMAGE_'+id;
		title = title + " [" + id + "]";

		if (!Ext.getCmp(idx))
		{

			var panel = xredaktor_gui.getInstance().renderFormViaId({
				panel_id: idx,
				closable: true,
				scope: me,
				listeners: {
					afterrender: function(gui) {

					}
				},
				id: 214,
				r_id: id,
				msg: 'Bild wird geladen ...',
				title: title,
				spreadSave: true,
				spreadDel: true,

				handler_afterSave: function(json) {
					Ext.getCmp(idx).setTitle(json.titleIt + " [" + id + "]");
				},
				handler_afterDel: function() {
					$$('.bd_image[del_id='+id+']').hide();
					Ext.getCmp(idx).close();
				}
			});


			/*
			var panel = Ext.create('Ext.Panel',{
			closable:true,
			id: idx,
			title: title,
			html: 'Bild...'
			});
			*/


			this.center.add(panel).show();
		} else
		{
			Ext.getCmp(idx).show();
		}
	},

	/**/

	bilderdatenbank2: function() {

		var me = this;

		var suche_html = '';
		suche_html += '<div class="bilddatenbank_suche">';
		suche_html += '<div class="bd_seach_text">Suchtags</div>';
		suche_html += '<div class="clearboth"></div>';
		suche_html += '<ul id="search_image_database"></ul>';
		//suche_html += '<div class="luppi_wrapper"><div class="lupi"></div></div>';

		suche_html += '<input type="text" id="hidden_tags_input" style="display:none">';
		suche_html += '</div>';

		var suche 	= Ext.create('Ext.Panel',{
			region:	'north',
			border: false,
			html:	suche_html,
			height: 80
		});

		var gui = Ext.create('Ext.form.Panel', {
			frame:false,
			bodyStyle:'padding:15px',
			fieldDefaults: {
				msgTarget: 'side',
				labelWidth: 75
			},
			title: 'Bilderdatenbank',
			defaultType: 'textfield',
			defaults: {
				anchor: '100%',
				scope: me,
				listeners: {
					specialkey: function(field, e){
						if (e.getKey() == e.ENTER) {

							//var searchSettings = betriebsdaten.getForm().getValues();
							//doSearch_betriebe.call(this,searchSettings);

						}
					}
				}
			},

			items: [{
				xtype: 'fieldset',
				title: 'Filter-Regionen',
				collapsible: true,
				collapsed: true,
				defaultType: 'checkbox',
				defaults: {
					anchor: '100%',
					bodyStyle:'padding:15px'
				},
				items : this.buildCheckBoxList(276,1030,'wz_NAME')
			},{
				xtype: 'fieldset',
				title: 'Filter-Kategorie',
				collapsible: true,
				collapsed: true,
				defaultType: 'checkbox',
				defaults: {
					anchor: '100%',
					bodyStyle:'padding:15px'
				},

				items : this.buildCheckBoxList(284,1027,'wz_KATEGORIE')
			},{
				xtype: 'fieldset',
				title: 'Filter-Themen',
				collapsible: true,
				collapsed: true,
				defaultType: 'checkbox',
				defaults: {
					anchor: '100%',
					bodyStyle:'padding:15px'
				},

				items : this.buildCheckBoxList(285,1029,'wz_NAME')
			},{
				xtype: 'button',
				text: 'Bilder Suchen',
				scope: me,
				handler: function() {

					this.openBildDatenbank();

				}
			},suche]
		});

		this.bilderdatenbank_form = gui;

		gui.on('afterrender',function(){

			$('#search_image_database').tagit({
				singleField: true,
				singleFieldNode: $('#hidden_tags_input'),
				tagSource: function( request, response ) {

					$.ajax({
						url: xcrm.getInstance().getAjaxPath('/gui/bd_fetchTags'),
						data: { term:request.term },
						dataType: "json",
						success: function( data ) {
							response( $.map( data.tags, function( item ) {
								return {
									label: item.wz_KEYWORD,
									value: item.wz_ids
								}
							}));
						}
					});

				}
			});

		},this);


		return gui;
	},

	/**/

	splashFileInfo: function(r) {


		var me 		= this;
		var s_id	= r.data.s_id;
		var idx 	= Ext.id();
		var title 	= "Details";




		xframe.ajax({
			scope: me,
			url: xcrm.getInstance().getAjaxPath('/gui/bd_resolveIdByS_Id'),
			params : {
				s_id:s_id
			},
			success: function(json) {

				var id = json.id;

				if (this.latestDetailPanel)
				{
					this.fa.panelDoc.remove(this.latestDetailPanel);
				}
				var panelDetailX = xredaktor_gui.getInstance().renderFormViaId({
					panel_id: idx,
					closable: true,
					scope: me,
					listeners: {
						afterrender: function(gui) {

						}
					},
					id: 214,
					r_id: id,
					msg: 'Bilddaten wird geladen ...',
					title: title,
					spreadSave: true,
					spreadDel: true,

					handler_afterSave: function(json) {
						//Ext.getCmp(idx).setTitle(json.titleIt + " [" + id + "]");
					},
					handler_afterDel: function() {
						$$('.bd_image[del_id='+id+']').hide();
						Ext.getCmp(idx).close();
					}
				});
				this.latestDetailPanel = panelDetailX;
				this.fa.panelDoc.insert(0,panelDetailX).show();


			},
			stateless: function(json)
			{
			}
		});



	},

	openBildDatenbank: function() {

		var s 		= $('#hidden_tags_input').val();
		var search 	= this.collectSearchData();

		var storeParams = {s:s,search:search};


		if (!this.bildDb)
		{
			this.fa		= xredaktor_storage.getInstance();

			var guix 	= this.fa.getMainPanel({
				guiMode: 'FILES_ONLY',
				dir_s_id: 19,
				extraLoaders: this.splashFileInfo,
				scope: this,
				storeParams: storeParams
			});

			var panel = Ext.create('Ext.Panel',{
				closable: true,
				layout: 'fit',
				title: 'Bilderdatenbank',
				items:[guix]
			});

			this.bildDb = this.center.add(panel);
			this.bildDb.on('close',function(){
				this.bildDb = false;
			},this)

		} else {
			this.fa.addStoreParams(storeParams,true);
		}

		this.bildDb.show();

		return;


		$ = $$;
		var me = this;

		if (!this.bildDb)
		{




			var result 	= Ext.create('Ext.Panel',{
				id:'bilddatenbank_main',
				region:	'center',
				border: false,
				html:	result_html,
				autoScroll: true
			});


			result.on('afterrender',function(){

				$('#search_image_database').tagit({
					singleField: true,
					singleFieldNode: $('#hidden_tags_input'),
					tagSource: function( request, response ) {

						$.ajax({
							url: xcrm.getInstance().getAjaxPath('/gui/bd_fetchTags'),
							data: { term:request.term },
							dataType: "json",
							success: function( data ) {
								response( $.map( data.tags, function( item ) {
									return {
										label: item.wz_KEYWORD,
										value: item.wz_ids
									}
								}));
							}
						});

					}
				});

				$('.luppi_wrapper').unbind('click');
				$('.luppi_wrapper').click(function(){

					console.info("Search !!!!");

					var s = $('#hidden_tags_input').val();
					var inputs 	= $('#bilddatenbank_menu_left').find('.search_input');
					var search 	= me.collectSearchData();


					$('.xcrm_image_uploading').hide();
					xframe.ajax({
						scope: me,
						url: xcrm.getInstance().getAjaxPath('/gui/bd_search'),
						params : {
							s:s,
							search: Ext.encode(search),
							pos: 0
						},
						success: function(json) {

							$('#real_images').html(json.html);
							me.handleImgsOfBilder();
							$('#bilddatenbank_main-body').screw({
								callBack : function() {
									me.handleImgsOfBilder();
								}
							});
						},
						stateless: function(json)
						{
						}
					});
				});






				$('.xcrm_hidden_fileupload_bd').fileupload({
					dataType: 'json'
				}).bind('change',function (e, data) {
					images = [];
					$('#real_images').html('');
					$('#xcrm_image_uploading_bd').show();
				}).bind('fileuploadalways',function (e, data) {

					images.push(data.result.id);

				}).bind('fileuploadsend',function(e,data){
					$('#real_images').html('');
				}).bind('fileuploadprogressall',function(e,data){
					var progress = parseInt(data.loaded / data.total * 100, 10);
					$('#xcrm_image_uploading_bd').html(progress+' %');

					if (progress == 100)
					{

						setTimeout(function(){

							$('.xcrm_image_uploading').hide();
							xframe.ajax({
								scope: me,
								url: xcrm.getInstance().getAjaxPath('/gui/getImagesOfBD'),
								params : {
									ids : images.join(',')
								},
								success: function(json) {
									$('#real_images').html(json.html);
									me.handleImgsOfBilder();
								},
								stateless: function(json)
								{
								}
							});
						},100);
					}

				});










				$('.luppi_wrapper').click();

			},this);


			var panel = Ext.create('Ext.Panel',{
				closable: true,
				title: 'Bilderdatenbank',
				layout: 'border',
				items:[suche,result]
			});

			this.bildDb = this.center.add(panel);
			this.bildDb.on('close',function(){
				this.bildDb = false;
			},this)
		} else {
			$('.luppi_wrapper').click();
		}

		this.bildDb.show();
	},


	handleReport: function(r)
	{

		var me = this;
		xframe.ajax({
			scope: me,
			url: xcrm.getInstance().getAjaxPath('/gui/handleReport'),
			params : {
				id: r.data.wz_id
			},
			success: function(json) {
				me.doReport.call(me,json.agent);
			},
			stateless: function(json)
			{
			}
		});

	},


	doReportQuery: function(d,q,extraCols)
	{


		var id 		= d.wz_id;
		var title	= d.wz_NAME;

		if (typeof extraCols == 'undefined') extraCols = [];
		var me = this;
		var filter = [];

		var fields = [
		{name: 'wz_id',			text:'Interne Nummer',		type:'int',		hidden: false, 	header:true, width: 60, flex:  0},
		{name: 'wz_online', 	text:'Aktiv', 				type:'string', 	hidden: false, 	header:true, xtype: 'combo', store : [['Y','Ja'],['N','Nein']], width:50, flex:0},
		{name: 'titleIt', 		text:'Name', 				type:'string', 	hidden: false, 	header:true, flex:1}
		];

		Ext.each(extraCols,function(col){
			fields.push({
				name: 'wz_'+col.as_name,
				text: col.as_label,
				type:'string',
				hidden: false,
				header:true,
				flex:1
			});
		},this);

		var grid = this.grid = xframe_pattern.getInstance().genGrid({
			toolbar_top: [],
			selModelButtons: [],
			region:'center',
			search:true,
			forceFit:true,
			border:false,
			split: true,
			iconCls:'xf_search',
			pager:true,
			closable: true,
			title: title,
			plugin_numLines: false,
			button_add: false,
			button_del: true,
			xstore: {

				sorters: [{
					property: 'titleIt',
					direction: 'ASC' // or 'ASC'
				}],

				load: 	xcrm.getInstance().getAjaxPath('/gui/queryReport'),
				loadParams : {
					id: id,
					config: Ext.encode(q),
					titleIt: 1,
					doPaging: 1
				},
				pid: 	'wz_id',
				fields: fields
			}
		});


		grid.on('itemdblclick',function(t,r){
			var r_id 	= r.data.wz_id;
			var titleIt	= r.data.titleIt;
			this.openRecord(d.wz_OPEN_WIZARD,r_id,titleIt);
		},this,{buffer:1});

		grid.getStore().load();
		this.center.add(grid).show();
	},

	doReport: function(d)
	{


		if ((d.wz_GUI == '') && (d.wz_GUI_AUTO == '')) // DUMMY REPORT
		{
			this.doReportQuery(d,{});
			return;
		}

		if (d.wz_GUI != '')
		{
			this.doReportGui(d,Ext.decode(d.wz_GUI,true));
			return;
		}

		if (d.wz_GUI_AUTO != '')
		{

			var me = this;
			xframe.ajax({
				scope: me,
				url: xcrm.getInstance().getAjaxPath('/gui/getReportGui'),
				params : {
					id: d.wz_id
				},
				success: function(json) {
					me.doReportGui.call(me,d,json.gui);
				},
				stateless: function(json)
				{
				}
			});

			return;
		}

	},


	doReportGui: function(d,gui)
	{



		var form = Ext.widget({
			frame: false,
			bodyStyle:'padding:15px',
			xtype: 'form',
			items: gui
		});

		var win = Ext.create('Ext.window.Window', {
			title: 'Suchagenten Konfigurieren',
			height: 300,
			modal: true,
			width: 400,
			layout: 'fit',
			items: form,
			bbar: [{
				text: 'Starte',
				scope: this,
				iconCls: 'xf_search',
				handler: function(){
					var values = form.getForm().getValues();
					this.doReportQuery(d,values);
					win.hide();
				}
			}]
		}).show();


	},


	doDefaultGridSearcher: function(cfg)
	{
		var me		= this;
		var title 	= cfg.title;
		var holder 	= cfg.holder;
		var wzId 	= cfg.wzId;
		var hidden 	= cfg.hidden;


		var query 	= holder.getForm().getValues();

		var idx = title+wzId+'_SEARCH';
		if (!Ext.getCmp(idx))
		{

			/***************************/
			/***************************/
			/***************************/
			/***************************/
			/***************************/


			this.buildUpGird({

				sorters: [{
					property: 'titleIt',
					direction: 'ASC'
				}],

				extraStoreParams: {
					defaultNumericQueryAddons: Ext.encode(query),
					the3musts: Ext.encode(hidden)
				},

				id: idx,
				title: title,
				wzId: wzId,
				scope: this,
				callback: function(grid) {


					grid.on('afterrender2',function(){
						// grid.getStore().load();
					},this);

					grid.on('afterrender',function(){
						grid.filters.createFilters();
						doGridFilter(grid,query);
					},this);

					grid.on('itemdblclick',function(t,r){


						var r_id 	= r.data.wz_id;
						var titleIt	= r.data.titleIt;

						switch (wzId)
						{
							case 209:
							this.openBetrieb(r.data.wz_id,r.data.titleIt);
							return;
							case 229:
							me.handleReport(r);
							return;
							default: break;
						}


						var superId	= wzId+'_'+r_id;


						if (!Ext.getCmp(superId)) {

							var panel = xredaktor_gui.getInstance().renderFormViaId({
								panel_id: superId,
								closable: true,
								scope: this,
								listeners: {
									afterrender: function(gui) {
									}
								},
								id: wzId,
								r_id: r_id,
								msg: 'Daten werden geladen ...',
								title: titleIt + '['+r_id+']',
								spreadSave: true,
								spreadDel: true,


								handler_afterSave: function(json) {
									grid.getStore().load();
									Ext.getCmp(superId).setTitle(json.titleIt + '['+r_id+']');
								},



								buttons: [{
									text: 'Betrieb öffnen',
									scope: this,
									iconCls:'xf_open',
									handler: function() {



										xframe.ajax({
											scope: me,
											url: xcrm.getInstance().getAjaxPath('/gui/getBetriebByW2W'),
											params : {
												wzId: wzId,
												r_id: r_id
											},
											success: function(json) {

												if (!json.b_id) {
													xframe.alert('Achtung','Kein Betrieb gefunden');
												} else {
													this.openBetrieb(json.b_id,json.titleIt);
												}

											},
											stateless: function(json)
											{
											}
										});



									}
								},'-']
							});

							me.center.add(panel).show();
						} else {
							Ext.getCmp(superId).show();
						}

					},this);




					this.center.add(grid).show();




				}
			});



			/***************************/
			/***************************/
			/***************************/
			/***************************/
			/***************************/



		} else
		{
			doGridFilter(Ext.getCmp(idx),holder.getForm().getValues());
			//Ext.getCmp(idx).getStore().proxy.extraParams.defaultNumericQueryAddons = Ext.encode(query);
			//Ext.getCmp(idx).getStore().load();
			Ext.getCmp(idx).show();
		}
	},

	genDefaultSearchPanel: function(title,wzId,fields,hidden,extraGui,cols,button_new) {

		var me 		= this;
		var items 	= [];
		var saveIt 	= false;

		var holder = Ext.create('Ext.form.Panel',{
			//html:'Lade Einstellungen',
			border: false,
			defaults: {
				scope: me,
				listeners: {
					specialkey: function(field, e){

						if (e.getKey() == e.ENTER) {

							if (field.xtype == "xr_field_simple_w2w_1")
							{
								Ext.defer(function(){
									saveIt.call(me);
								},300,me);
							} else
							{

								saveIt.call(me);

							}
						}
					}
				}
			}
		});

		var extraCols = [];

		xframe.ajax({
			scope: me,
			url: xcrm.getInstance().getAjaxPath('/gui/getSerachPanel'),
			params : {
				fields: Ext.encode(fields),
				cols: Ext.encode(cols)
			},
			success: function(json) {

				extraCols = json.cols

				Ext.each(extraGui,function(f){
					json.gui.push(f);
				},this);

				holder.removeAll();
				holder.add(json.gui);
				holder.doLayout();

			},
			stateless: function(json)
			{
			}
		});



		saveIt = function()
		{
			this.doDefaultGridSearcher({
				title: title,
				holder: holder,
				wzId: wzId,
				hidden: hidden
			});
		}

		saveIt2 = function() {


			var query 	= holder.getForm().getValues();

			var idx = title+'_SEARCH';
			if (!Ext.getCmp(idx))
			{

				var filter = [];
				var fields = [
				{name: 'wz_id',			text:'Interne Nummer',		type:'int',		hidden: false, 	header:true, width: 60, flex:  0, renderer: this.rendererX},
				{name: 'wz_online', 	text:'Aktiv', 				type:'string', 	hidden: false, 	header:true, xtype: 'combo', store : [['Y','Ja'],['N','Nein']], width: 50, flex:0},
				{name: 'titleIt', 		text:'Name', 				type:'string', 	hidden: false, 	header:true, flex:1}
				];


				Ext.each(extraCols,function(col){

					fields.push({
						name: 'wz_'+col.as_name,
						text: col.as_label,
						type:'string',
						hidden: false,
						header:true,
						flex:1
					});

				},this);


				var grid = this.grid = xframe_pattern.getInstance().genGrid({

					id:idx,
					toolbar_top: [],
					selModelButtons: [],
					region:'west',
					search:true,
					forceFit:true,
					width: 100,
					border:false,
					split: true,
					pager:true,
					closable: true,
					title: title,
					plugin_numLines: false,
					button_add: false,
					button_del: true,
					button_export: true,
					xstore: {

						sorters: [{
							property: 'titleIt',
							direction: 'ASC' // or 'ASC'
						}],

						load: 	'/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/load',
						update:	'/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/update',
						remove: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/remove',


						loadParams : {
							titleIt: 1,
							domagic : wzId,
							defaultNumericQueryAddons: Ext.encode(query),
							the3musts: Ext.encode(hidden)
						},
						updateParams : {
							titleIt: 1,
							domagic : wzId,
							defaultNumericQueryAddons: Ext.encode(query),
							the3musts: Ext.encode(hidden)
						},
						removeParams : {
							titleIt: 1,
							domagic : wzId,
							defaultNumericQueryAddons: Ext.encode(query),
							the3musts: Ext.encode(hidden)
						},
						pid: 	'wz_id',
						fields: fields
					}
				});

				grid.on('afterrender',function(){
					grid.getStore().load();
				},this);


				grid.on('itemdblclick',function(t,r){

					var r_id 	= r.data.wz_id;
					var titleIt	= r.data.titleIt;

					if (wzId == 229) {


						me.handleReport(r);

						/*
						doSearch_reports.call(this,{
						searchAgent: r_id
						});
						*/

						return;
					}

					var superId	= wzId+'_'+r_id;


					if (!Ext.getCmp(superId)) {

						var panel = xredaktor_gui.getInstance().renderFormViaId({
							panel_id: superId,
							closable: true,
							scope: me,
							listeners: {
								afterrender: function(gui) {
								}
							},
							id: wzId,
							r_id: r_id,
							msg: 'Daten werden geladen ...',
							title: titleIt + '['+r_id+']',
							spreadSave: true,
							spreadDel: true,


							handler_afterSave: function(json) {
								grid.getStore().load();
								Ext.getCmp(superId).setTitle(json.titleIt + '['+r_id+']');
							},



							buttons: [{
								text: 'Betrieb öffnen',
								scope: me,
								iconCls:'xf_open',
								handler: function() {



									xframe.ajax({
										scope: me,
										url: xcrm.getInstance().getAjaxPath('/gui/getBetriebByW2W'),
										params : {
											wzId: wzId,
											r_id: r_id
										},
										success: function(json) {

											if (!json.b_id) {
												xframe.alert('Achtung','Kein Betrieb gefunden');
											} else {
												this.openBetrieb(json.b_id,json.titleIt);
											}

										},
										stateless: function(json)
										{
										}
									});



								}
							},'-']
						});

						me.center.add(panel).show();
					} else {
						Ext.getCmp(superId).show();
					}

				},this);





				me.center.add(grid).show();
			} else
			{

				Ext.getCmp(idx).getStore().proxy.extraParams.defaultNumericQueryAddons = Ext.encode(query);
				Ext.getCmp(idx).getStore().load();
			}

			Ext.getCmp(idx).show();


		};

		items.push(holder);
		items.push({
			xtype: 'button',
			text: '<b>Suchen</b>',
			scope: me,
			handler: saveIt
		});


		if (button_new)
		{
			items.push({
				xtype: 'button',
				text: 'Neu',
				scope: me,
				handler: function() {


					xframe.ajax({
						scope:this,
						url: '/xgo/xplugs/xcrm/ajax/gui/newX',
						params : {
							a_id: wzId
						},
						success: function(json)
						{


							var r_id = json.wz_id;


							var superId	= wzId+'_'+r_id;


							if (!Ext.getCmp(superId)) {

								var panel = xredaktor_gui.getInstance().renderFormViaId({
									panel_id: superId,
									closable: true,
									scope: me,
									listeners: {
										afterrender: function(gui) {
										}
									},
									id: wzId,
									r_id: r_id,
									msg: 'Daten werden geladen ...',
									title: 'Neuer Datensatz ['+r_id+']',
									spreadSave: true,
									spreadDel: true,


									handler_afterSave: function(json) {
										Ext.getCmp(superId).setTitle(json.titleIt + '['+r_id+']');
									},



									buttons: [{
										text: 'Betrieb öffnen',
										scope: me,
										iconCls:'xf_open',
										handler: function() {



											xframe.ajax({
												scope: me,
												url: xcrm.getInstance().getAjaxPath('/gui/getBetriebByW2W'),
												params : {
													wzId: wzId,
													r_id: r_id
												},
												success: function(json) {

													if (!json.b_id) {
														xframe.alert('Achtung','Kein Betrieb gefunden');
													} else {
														this.openBetrieb(json.b_id,json.titleIt);
													}

												},
												stateless: function(json)
												{
												}
											});



										}
									},'-']
								});

								me.center.add(panel).show();
							} else {
								Ext.getCmp(superId).show();
							}












						}
					});


				}
			});
		}


		var ret = {
			title: title,
			items: items
		};

		return ret;
	},

	startup: function() {

		var me = this;
		$$('#xcrm_logo_customer').click(function(){
			me.center.removeAll();
			me.center.add(me.createWelcome());
		});
		//this.openBetrieb(1,'Test-Alexii');
		//this.openBildDatenbank();
	},

	openRecord: function(wz_id,r_id,titleIt)
	{
		var me = this;
		var panel = xredaktor_gui.getInstance().renderFormViaId({
			//closable: true,
			scope: me,
			listeners: {
				afterrender: function(gui) {
				}
			},
			id: wz_id,
			r_id: r_id,
			msg: 'Daten werden geladen ...',
			spreadSave: true,
			spreadDel: true,


			handler_afterSave: function(json) {
				grid.getStore().load();
				Ext.getCmp(superId).setTitle(json.titleIt + '['+r_id+']');
			},



			buttons: [{
				text: 'Betrieb öffnen',
				scope: me,
				iconCls:'xf_open',
				handler: function() {



					xframe.ajax({
						scope: me,
						url: xcrm.getInstance().getAjaxPath('/gui/getBetriebByW2W'),
						params : {
							wzId: wzId,
							r_id: r_id
						},
						success: function(json) {

							if (!json.b_id) {
								xframe.alert('Achtung','Kein Betrieb gefunden');
							} else {
								this.openBetrieb(json.b_id,json.titleIt);
							}

						},
						stateless: function(json)
						{
						}
					});



				}
			},'-']
		});
		var p2 = {
			xtype: 'panel',
			closable: true,
			id: 	wz_id+'_'+r_id,
			items:	panel,
			title:  titleIt + '['+r_id+']'
		};

		me.center.add(p2).show();
	}
}
