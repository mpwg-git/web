var xmarketing_emission = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xmarketing_emission";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xmarketing_emission_(config);
			}
			return instance;
		}
	}
})();

var xmarketing_emission_ = function(config) {
	this.config = config || {};
};


Ext.define('Ext.chooser.IconBrowser', {

	extend: 'Ext.view.View',
	alias: 'widget.iconbrowser',
	uses: 'Ext.data.Store',

	singleSelect: true,
	overItemCls: 'x-view-over',
	itemSelector: 'div.thumb-wrap',
	layout: 'fit',
	tpl: [
	// '<div class="details">',
	'<tpl for=".">',
	'<div class="thumb-wrap">',
	'<div class="thumb">',
	'<div class="xrm_template"></div>',
	'</div>',
	'<span>{a_name}</span>',
	'</div>',
	'</tpl>'
	// '</div>'
	],

	initComponent: function() {
		this.store = Ext.create('Ext.data.Store', {
			autoLoad: true,
			fields: ['a_id', 'a_name'],
			proxy: {
				type: 'ajax',
				url : xmarketing.getInstance().getAjaxPath('/emissions/getTemplatesAs'),
				reader: {
					type: 'json',
					root: 'data'
				}
			}
		});
		this.callParent(arguments);
	}
});

xmarketing_emission_.prototype = {

	getEmissionTree : function()
	{
		var fields = [
		{name: 'xme_name',		text:'Name der Aussendung',	type:'string', folder: true, editor: {allowBlank: false,xtype: 'textfield'}},
		{name: 'xme_id',		text:'Interne Nummer',		type:'int',  hidden: false}
		];

		var me = this;

		this.btn_duplo = Ext.create('Ext.Button',{
			iconCls: 'xf_duplicate',
			text: 'Duplizieren',
			disabled: true,
			handler: function(){


				xframe.ajax({
					scope: me,
					url: xmarketing.getInstance().getAjaxPath('/emissions/clone'),
					params : {
						xme_id : me.xme_id
					},
					success: function() {
						this.gui_eTree.getStore().load();
					},
					stateless: function(json)
					{
					}
				});

			}
		});

		this.gui_eTree = xframe_pattern.getInstance().genTree({
			iconsPrefix: 'xr_pages',
			button_del:true,
			button_add:true,
			region:'west',
			split: true,
			toolbar_top:[this.btn_duplo],
			title: 'Aussendungen',
			border:false,
			forceFit:true,
			xstore: {
				load: 	xmarketing.getInstance().getAjaxPath('/emissions/load'),
				update: xmarketing.getInstance().getAjaxPath('/emissions/update'),
				insert: xmarketing.getInstance().getAjaxPath('/emissions/insert'),
				remove: xmarketing.getInstance().getAjaxPath('/emissions/remove'),
				params: {xme_s_id:1},
				move: 	xmarketing.getInstance().getAjaxPath('/emissions/move'),
				pid: 	'xme_id',
				fields: fields
			}
		});

		this.gui_eTree.on('selectionchange',function(view,selections,options){
			if (selections.length != 1) {
				this.selectEmission(false);
				return;
			}
			this.selectEmission(selections[0].data.xme_id);
		},this);

		return this.gui_eTree;
	},

	selectEmission : function(xme_id,callMeAfter)
	{



		var me = this;
		if (!xme_id) {
			this.btn_duplo.setDisabled(true);
			this.gui_centerTab.setActiveTab(0);
			this.gui_centerTab.setDisabled(true);
			this.xme_id = 0;
			return;
		}

		this.btn_duplo.setDisabled(false);
		this.gui_centerTab.setActiveTab(this.gui_Status);
		this.gui_config_tab_panel.setActiveTab(this.gui_config_sender);

		xframe.ajax({
			scope: me,
			url: xmarketing.getInstance().getAjaxPath('/emissions/getConfig'),
			params : {
				xme_id : xme_id
			},
			success: function() {
				console.info(arguments);
				this.xme_id = xme_id;
				this.gui_centerTab.setDisabled(false);
				this.setViewPanelPage(xme_id);
				this.gui_eSamplesTree.getStore().load();
				this.gui_eqTree.getStore().load();
				this.storeBounces.load();
				xmarketing_reports.getInstance().changeEmission(xme_id);
				this.updateStateOfEmission();

				
				this.gui_config_lists.getStore().load();
				this.gui_config_sender.getStore().load();
				
				if (callMeAfter)
				{
					callMeAfter.call(me);
				}
			},
			stateless: function(json)
			{
			}
		});

	},


	updateStateOfEmission : function()
	{

		if (!this.xme_id) return;

		var me = this;
		xframe.ajax({
			scope: me,
			url: xmarketing.getInstance().getAjaxPath('/emissions/getConfig'),
			params : {
				xme_id : this.xme_id,
				allInfos: 1
			},
			success: function(json) {

				var overview 	= json.overview;
				var cnt_sent	= json.cnt_sent;
				var cnt_total 	= json.cnt_total;
				var xme_state 	= json.xme_state;
				var msg = "";
				var r = this.store_status2update.getAt(0);
				r.set('sendmails',json.sendmailsPercentage);

				Ext.getCmp('panel_donut').setTitle("Sendestatus :: "+cnt_sent+"/"+cnt_total+" versendet");

				switch (xme_state)
				{

					case 'CONFIG':
					msg = "Konfiguration";
					Ext.getCmp('button_emission_start').setDisabled(false);
					Ext.getCmp('button_emission_pause').setDisabled(true);
					Ext.getCmp('button_emission_checkt').setDisabled(true);
					break;

					case 'SENDING':
					msg = "Sendet";
					Ext.getCmp('button_emission_start').setDisabled(true);
					Ext.getCmp('button_emission_pause').setDisabled(false);
					Ext.getCmp('button_emission_checkt').setDisabled(true);
					break;

					case 'START_SENDING':
					msg = "Warteschlange wird gefüllt "+json.cnt_preQ+"% ...";
					Ext.getCmp('button_emission_start').setDisabled(true);
					Ext.getCmp('button_emission_pause').setDisabled(true);
					Ext.getCmp('button_emission_checkt').setDisabled(true);
					break;

					case 'READY_4_SENDING':
					msg = "Freigabe offen. (min. 1x TEST)";
					Ext.getCmp('button_emission_start').setDisabled(true);
					Ext.getCmp('button_emission_pause').setDisabled(true);
					Ext.getCmp('button_emission_checkt').setDisabled(true);

					if (json.xme_tested > 0)
					{
						Ext.getCmp('button_emission_checkt').setDisabled(false);
					}

					break;

					case 'DONE':
					msg = "Senden abgeschlossen";
					Ext.getCmp('button_emission_start').setDisabled(true);
					Ext.getCmp('button_emission_pause').setDisabled(true);
					Ext.getCmp('button_emission_checkt').setDisabled(true);
					break;

					case 'PAUSE':
					msg = "Pausiert";
					Ext.getCmp('button_emission_start').setDisabled(true);
					Ext.getCmp('button_emission_pause').setDisabled(false);
					Ext.getCmp('button_emission_checkt').setDisabled(true);
					break;

					default:
					msg = "-";
					Ext.getCmp('button_emission_start').setDisabled(true);
					Ext.getCmp('button_emission_pause').setDisabled(true);
					Ext.getCmp('button_emission_checkt').setDisabled(true);
					break;
				}

				this.msg_status2update.update("<div class='xrm_status'>Status: "+msg+"</div><br><div class='xrm_overview'>"+overview+"</div>");
			},
			stateless: function(json)
			{
			}
		});

	},

	emissionStart: function() {

		if (!this.xme_id) return;

		Ext.MessageBox.show({
			msg: 'Versandliste wird gefüllt ...',
			width:300,
			wait:true,
			waitConfig: {interval:200}
		});

		var me = this;
		xframe.ajax({
			scope: me,
			url: xmarketing.getInstance().getAjaxPath('/emissions/startEmission'),
			params : {
				xme_id : this.xme_id
			},
			success: function(json) {

			},
			stateless: function(json)
			{
				Ext.MessageBox.hide();
				this.updateStateOfEmission();
			}
		});
	},


	emissionGOGOGO: function() {

		if (!this.xme_id) return;

		Ext.MessageBox.show({
			msg: 'Versand starten ...',
			width:300,
			wait:true,
			waitConfig: {interval:200}
		});

		var me = this;
		xframe.ajax({
			timeout: 4500000,
			scope: me,
			url: xmarketing.getInstance().getAjaxPath('/emissions/startEmissionFinaly'),
			params : {
				xme_id : this.xme_id
			},
			success: function(json) {

			},
			stateless: function(json)
			{
				Ext.MessageBox.hide();
				this.updateStateOfEmission();
			}
		});
	},

	emissionUnFreezeMayBe : function() {
		var me = this;
		Ext.MessageBox.confirm('Warteschlange kontrolliert?', 'Warteschlange abarbeiten und Aussendung abschließen.', function(yesorno){
			if(yesorno == 'yes')
			{
				me.emissionGOGOGO.call(me);
			}
		});

	},

	emissionStartMayBe : function() {
		var me = this;
		Ext.MessageBox.confirm('Alles Kontrolliert ?', 'Wollen Sie die Aussendung beginnen ?', function(yesorno){
			if(yesorno == 'yes')
			{
				me.emissionStart.call(me);
			}
		});
	},


	emissionPause : function() {
		if (!this.xme_id) return;

		Ext.MessageBox.show({
			msg: 'Pausiere Aussendung ...',
			width:300,
			wait:true,
			waitConfig: {interval:200}
		});

		var me = this;
		xframe.ajax({
			scope: me,
			url: xmarketing.getInstance().getAjaxPath('/emissions/pause'),
			params : {
				xme_id : this.xme_id
			},
			success: function(json) {

			},
			stateless: function(json)
			{
				Ext.MessageBox.hide();
				this.updateStateOfEmission();
			}
		});
	},

	getEmmissionCenterPanel_Status : function()
	{
		var me = this;
		var status = Ext.create('Ext.Panel',{
			region: 'north',
			layout: 'fit',
			border: false,
			height: 150,
			bodyStyle: 'padding: 20px;',
			html: "<div class='xrm_status'>Status: -</div><br><div class='xrm_overview' id=''></div>"
		});

		this.msg_status2update = status;

		var store3 = Ext.create('Ext.data.JsonStore', {
			fields: ['sendmails'],
			data: [{'sendmails':0}]
		});

		this.store_status2update = store3;

		var sendingPercent = {
			xtype: 'chart',
			style: 'background:#fff',
			animate: true,
			store: store3,
			height: 200,
			width: 400,
			insetPadding: 25,
			flex: 1,
			axes: [{
				type: 'gauge',
				position: 'gauge',
				minimum: 0,
				maximum: 100,
				steps: 10,
				margin: 7
			}],
			series: [{
				type: 'gauge',
				field: 'sendmails',
				donut: 30,
				colorSet: ['#06AFF5', '#ddd']
			}]
		};

		var actions  = Ext.create('Ext.Panel',{
			region: 'center',
			layout:'column',
			height: 400,
			border: false,
			bodyStyle: 'padding: 20px;',
			items: [{
				border: false,
				title: 'Aktionen',
				width: 300,
				items: [{
					id: 'button_emission_start',
					xtype: 'button',
					text: 'START',
					height: 100,
					width: 100,
					disabled: true,
					scope: this,
					handler: function() {
						this.emissionStartMayBe();
					}
				},{
					id: 'button_emission_checkt',
					xtype: 'button',
					text: 'FREIGEBEN',
					height: 100,
					width: 100,
					disabled: true,
					scope: this,
					handler: function() {
						this.emissionUnFreezeMayBe();
					}
				},{
					id: 'button_emission_pause',
					xtype: 'button',
					text: 'PAUSE',
					height: 100,
					width: 100,
					disabled: true,
					scope: this,
					handler: function() {
						this.emissionPause();
					}
				}]
			},{
				id: 'panel_donut',
				border: false,
				title: 'Sendestatus',
				width: 400,
				items: [sendingPercent]
			}]
		});

		this.gui_Status = Ext.create('Ext.Panel',{
			layout: 'border',
			title: 'Status',
			border: false,
			tbar:[{
				scope: me,
				text: 'Aktualisieren',
				handler: function() {
					this.updateStateOfEmission();
				}
			}],
			items: [status,actions]
		});

		this.gui_Status.on('activate',function(){
			this.updateStateOfEmission();
		},this);

		return this.gui_Status;
	},

	getDesignFramesStore : function()
	{
		var a = [];

		var tmp = [];
		tmp.push(1);
		tmp.push('Test AAA');
		a.push(tmp);

		return a;
	},

	/* ------------------------------------------------------- DESIGN PANEL - BEGIN ------------------------------------------------------------------------- */


	setPage : function(a_id_frame,cfg)
	{
		var me 		= this;
		var xme_id 	= this.xme_id;

		xframe.ajax({
			scope: me,
			url: xmarketing.getInstance().getAjaxPath('/emissions/createNew'),
			params : {
				xme_id : xme_id,
				frame_id : a_id_frame
			},
			success: function() {
				cfg.fn.apply(cfg.scope,arguments);
				this.latestWin.close();
			},
			stateless: function(json)
			{
			}
		});
	},

	setTemplatesWindow : function() {
		var me 	= this;
		var win = Ext.create('Ext.window.Window', {
			title: 'Template auswählen',
			height: 300,
			width: 400,
			layout: 'fit',
			autoScroll: true,
			items: {
				xtype: 'iconbrowser',
				id: 'img-chooser-view',
				listeners: {
					scope: this,
					selectionchange: function() {
						console.info('selectionchange');
						//this.onIconSelect
					},
					itemdblclick: function(dv,r) {
						console.info('itemdlbclick',r);
						if (r.data.a_id) {
							me.setPage(r.data.a_id,{
								scope: me,
								fn: function() {
									me.reloadLayout();

								}
							});
						}
						//this.fireImageSelected
					}
				}
			},
			listeners: {
				selected: function(){
					console.info('selected');
				}
			}
		});
		win.show();
		this.latestWin = win;
	},

	handleLandingPages : function()
	{
		var me = this;
		xframe.ajax({
			scope: me,
			url: xmarketing.getInstance().getAjaxPath('/emissions/handleLandingPages'),
			params : {
				xme_id : me.xme_id
			},
			success: function(d) {

			},
			stateless: function(json)
			{
			}
		});
	},

	deleteDesign: function()
	{
		var me = this;
		xframe.ajax({
			scope: me,
			url: xmarketing.getInstance().getAjaxPath('/emissions/deleteDesign'),
			params : {
				xme_id : me.xme_id
			},
			success: function(d) {
				me.reloadLayout();
			},
			stateless: function(json)
			{
			}
		});
	},

	reloadLayout : function()
	{
		this.selectEmission(this.xme_id,function(){
			this.gui_centerTab.setActiveTab(this.gui_designer);
		});
	},

	getViewPanel : function()
	{
		this.iframeID 			= Ext.id();
		this.iframeURL			= xmarketing.getInstance().getAjaxPath('/edesign/editor')
		this.latestIframeUrl 	= this.iframeURL + '?xme_id='+this.xme_id+'&mcms';

		var panel = Ext.create('Ext.Panel',{
			id:'panel_design',
			border:false,
			split: true,
			width: 300,
			layout: 'fit',
			region: 'center',
			tbar: [
			{
				id:'design_page_add',
				iconCls: 'xf_add',
				tooltip: 'Vorlage Auswählen',
				scope: this,
				handler: function()
				{
					this.setTemplatesWindow();
				}
			},{
				id:'design_page_del',
				iconCls: 'xf_grid_del',
				scope: this,
				handler: function()
				{
					this.deleteDesign();
				}
			},'-',
			{
				id:'design_page_openInNew',
				iconCls:'xf_openNewWindow',
				tooltip:'Editor - Maximieren',
				scope:this,
				handler:function()
				{
					window.open(this.latestIframeUrl);
				}
			},/*'-',{
			id:'handleLandingPages',
			iconCls:'xf_links',
			tooltip:'Landingpages',
			scope:this,
			handler:function()
			{
			this.handleLandingPages();
			}
			},*/'-',{
			id:'design_page_reload',
			iconCls:'xf_reload',
			tooltip:'Design neu laden...',
			scope:this,
			handler:function()
			{
				this.refreshViewPanel();
			}
			}/*,'-',{
			id:'design_page_settings',
			iconCls:'xf_settings',
			tooltip:'Einstellungen',
			scope: this,
			handler:function()
			{
			var panel = xredaktor_atoms_settings.getInstance().getInputPanel({
			title: 'Design - Konfiguration'
			});
			var win = Ext.create('widget.window', {
			border:false,
			title: 'Design - Konfiguration',
			closable: true,
			width: window.innerWidth*0.8,
			height: window.innerHeight*0.8,
			layout: 'border',
			items: [panel]
			});

			panel.win = win;
			win.show();
			return;
			panel.refactoryByPage(this.p_id);
			}
			}*/],
			html : "<iframe id='"+this.iframeID+"' src='"+this.latestIframeUrl+"' width=100% height=100% frameborder=0></iframe>"
		});

		panel.on('activate',function(){
			console.info('ACTIVE');
			Ext.get(this.iframeID).dom.setAttribute('src',this.latestIframeUrl);
		},this);

		panel.on('afterRender',function(){
			console.info('RENDER');
			Ext.get(this.iframeID).dom.setAttribute('src',this.latestIframeUrl);
		},this);

		return panel;
	},

	setViewPanelPage : function(xme_id)
	{
		this.latestIframeUrl = this.iframeURL+'?xme_id='+xme_id;
		try{
			Ext.get(this.iframeID).dom.setAttribute('src',this.latestIframeUrl);
		} catch (e) {}
	},

	refreshViewPanel : function()
	{
		try{

			Ext.get(this.iframeID).dom.setAttribute('src',this.latestIframeUrl);
		} catch (e) {console.info('refreshViewPanel',e);}
	},

	getEmmissionById : function(xme_id,cfg)
	{
		var me = this;
		xframe.ajax({
			scope: me,
			url: xmarketing.getInstance().getAjaxPath('/emissions/getConfig'),
			params : {
				xme_id : xme_id
			},
			success: function() {
				cfg.fn.apply(cfg.scope,arguments);
			},
			stateless: function(json)
			{
			}
		});
	},

	getEmmissionCenterPanel_Design: function()
	{

		this.gui_designer =  Ext.create('Ext.Panel',{
			layout: 'fit',
			title: 'Layout',
			dockedItems: [],
			items: this.getViewPanel()
		});



		this.gui_designer.on('beforeactivate',function(){

			this.masterGui.mask("Aktuelle Einstellungen werden geladen...");

			this.getEmmissionById(this.xme_id,{fn:function(e){

				Ext.getCmp('design_page_add').setDisabled(true);
				Ext.getCmp('design_page_del').setDisabled(true);
				//Ext.getCmp('handleLandingPages').setDisabled(true);

				Ext.getCmp('design_page_openInNew').setDisabled(true);
				Ext.getCmp('design_page_reload').setDisabled(true);
				//Ext.getCmp('design_page_settings').setDisabled(true);

				if (e.xme_p_id == '0') {
					Ext.getCmp('design_page_add').setDisabled(false);
				} else
				{
					//Ext.getCmp('handleLandingPages').setDisabled(false);
					Ext.getCmp('design_page_del').setDisabled(false);
					Ext.getCmp('design_page_openInNew').setDisabled(false);
					Ext.getCmp('design_page_reload').setDisabled(false);
					//Ext.getCmp('design_page_settings').setDisabled(false);
				}

				this.masterGui.unmask();

			},scope:this});
		},this);


		return this.gui_designer;
	},

	/* ------------------------------------------------------- DESIGN PANEL - ENDE ------------------------------------------------------------------------- */


	getEmmissionCenterPanel_Configuration_Sender: function()
	{
		var me = this;
		var fields = [
		{name: 'checkId',			text:'Interne Nummer',			type:'int',  	hidden: true},
		{name: 'xmsc_name',			text:'Absender-Konto',			type:'string'},
		{name: 'xml_xmr_checked',	text:'Zugewiesen',				type:'bool',	hidden: false, 	header:true}
		];

		this.gui_config_sender = xframe_pattern.getInstance().genGrid({
			plugin_numLines: false,
			iconsPrefix: 'xr_pages',
			button_del:false,
			button_add:false,
			records_move:false,
			region:'west',
			split: true,
			toolbar_top:[],
			title: 'Absender-Konten',
			border:false,
			forceFit:true,
			xstore: {
				load: 	xmarketing.getInstance().getAjaxPath('/emission_config_sender/load'),
				update: xmarketing.getInstance().getAjaxPath('/emission_config_sender/update'),
				insert: xmarketing.getInstance().getAjaxPath('/emission_config_sender/insert'),
				remove: xmarketing.getInstance().getAjaxPath('/emission_config_sender/remove'),
				params: {xml_s_id:0,xmr_id:0},
				move: 	xmarketing.getInstance().getAjaxPath('/emission_config_sender/move'),
				pid: 	'xml_id',
				fields: fields
			}
		});

		this.gui_config_sender.getStore().on('beforeload', function(s) {
			this.gui_config_sender.getStore().proxy.extraParams['xme_id'] = this.xme_id;
		},this);

		var grid = this.gui_config_sender;

		this.gui_config_sender.checkchange = function(e,gridColumn,recordId,checked)
		{
			var record = grid.getStore().getAt(recordId);
			var params = {};

			params.xmes_e_id 	= me.xme_id
			params.checked 		= checked ? 'on' : 'off';
			params.xmes_s_id	= record.raw.xmsc_id;

			xframe.ajax({
				jsonFeedback: true,
				scope: this,
				url: xmarketing.getInstance().getAjaxPath('/emission_config_sender/updateCheck'),
				params: params,
				success: function(json){
					grid.getStore().load();
				},
				failure: function(json){
					grid.getStore().load();
				},
				failure_msg: xframe.lang('Daten konnten nicht aktualisiert werden')
			});
		}

		this.gui_config_sender.on('afterrender',function(){
			this.gui_config_sender.getStore().load();
		},this);

		return this.gui_config_sender;
	},


	getEmmissionCenterPanel_Configuration_Lists : function()
	{
		var me = this;
		var fields = [
		{name: 'checkId',			text:'Interne Nummer',			type:'int',  	hidden: true},
		{name: 'xml_name',			text:'Name der Liste',			type:'string'},
		{name: 'xml_xmr_checked',	text:'Zugewiesen',				type:'bool',	hidden: false, 	header:true}
		];

		this.gui_config_lists = xframe_pattern.getInstance().genGrid({
			plugin_numLines: false,
			iconsPrefix: 'xr_pages',
			button_del:false,
			button_add:false,
			records_move:false,
			region:'west',
			split: true,
			toolbar_top:[],
			title: 'Empfänger-Listen',
			border:false,
			forceFit:true,
			xstore: {
				load: 	xmarketing.getInstance().getAjaxPath('/emission_config_lists/load'),
				update: xmarketing.getInstance().getAjaxPath('/emission_config_lists/update'),
				insert: xmarketing.getInstance().getAjaxPath('/emission_config_lists/insert'),
				remove: xmarketing.getInstance().getAjaxPath('/emission_config_lists/remove'),
				params: {xml_s_id:0,xmr_id:0},
				move: 	xmarketing.getInstance().getAjaxPath('/emission_config_lists/move'),
				pid: 	'xml_id',
				fields: fields
			}
		});

		this.gui_config_lists.getStore().on('beforeload', function(s) {
			this.gui_config_lists.getStore().proxy.extraParams['xme_id'] = this.xme_id;
		},this);

		var grid = this.gui_config_lists;

		this.gui_config_lists.checkchange = function(e,gridColumn,recordId,checked)
		{
			var record = grid.getStore().getAt(recordId);
			var params = {};

			params.xmel_e_id 	= me.xme_id
			params.checked 		= checked ? 'on' : 'off';
			params.xmel_l_id 	= record.raw.xml_id;

			xframe.ajax({
				jsonFeedback: true,
				scope: this,
				url: xmarketing.getInstance().getAjaxPath('/emission_config_lists/updateCheck'),
				params: params,
				success: function(json){
					grid.getStore().load();
				},
				failure: function(json){
					grid.getStore().load();
				},
				failure_msg: xframe.lang('Daten konnten nicht aktualisiert werden')
			});
		}

		this.gui_config_lists.on('afterrender',function(){
			this.gui_config_lists.getStore().load();
		},this);

		return this.gui_config_lists;
	},


	map2field : function(o)
	{

		var tmp = {
			fieldLabel: o.text,
			name: o.name,
			readOnly: (o.formMode == 'RO')
		};

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
			listClass: 'x-combo-list-small'
		};

		return combo;
	},


	getEmmissionCenterPanel_Configuration_Detail : function()
	{
		var fields = [
		{fs: 'A', formMode: 'RO',  	name: 'xme_name',						text:'Name der Aussendung' },
		{fs: 'A', formMode: 'RO',	name: 'xme_created',					text:'Erstellt'		},
		{fs: 'A', formMode: 'RO', 	name: 'xme_lastmod',					text:'Geändert'		},
		{fs: 'B', name: 'xme_subject', 										text:'Betreff', type:	'string'},
		{fs: 'C', name: 'xme_attach', 										text:'File Ids (;-getrennt)', type:	'string'}
		];

		var me = this;
		var fs = {
		'A' : 'Allgemeine Informationen',
		'B' : 'Details',
		'C' : 'Anhänge'
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

		this.senderConfigDetail = Ext.create('Ext.form.Panel', {
			frame: false,
			region: 'center',
			title: 'Details',
			bodyStyle:'padding:5px 5px 0',
			width: 350,
			fieldDefaults: {
				msgTarget: 'side',
				labelWidth: 75
			},
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},
			items: items,
			tbar: [{
				iconCls: 'xf_save',
				scope: this,
				text: 'Speichern',
				handler: function(){

					var update 	= this.senderConfigDetail.getForm().getValues();
					update.xme_id = this.xme_id;

					xframe.ajax({
						scope: me,
						url: xmarketing.getInstance().getAjaxPath('/emission_config_detail/updateRecord'),
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


		this.senderConfigDetail.on('activate',function(){

			this.senderConfigDetail.mask("Aktuelle Einstellungen werden geladen...");

			var me = this;
			xframe.ajax({
				scope: me,
				url: xmarketing.getInstance().getAjaxPath('/emission_config_detail/getRecordById'),
				params : {
					xme_id: this.xme_id
				},
				success: function(fullData) {
					this.senderConfigDetail.getForm().setValues(fullData.r);
					this.senderConfigDetail.unmask();
				},
				stateless: function(json)
				{
				}
			});

		},this);

		return this.senderConfigDetail;
	},


	getEmmissionCenterPanel_Configuration: function()
	{
		this.gui_config_tab_panel = Ext.create('Ext.tab.Panel',{
			layout: 'fit',
			title: 'Konfiguration',
			items: [this.getEmmissionCenterPanel_Configuration_Sender(),this.getEmmissionCenterPanel_Configuration_Lists(),this.getEmmissionCenterPanel_Configuration_Detail()]
		});

		return this.gui_config_tab_panel;
	},



	getEmmissionCenterPanel_Queue : function()
	{
		var me = this;

		var fields = [
		{name: 'xmsq_id',					text:'Queue ID',			type:'int',  		hidden: true},
		{name: 'xmr_id',					text:'User ID',				type:'int',  		hidden: true},

		{name: 'xmr_email',					text:'E-Mail',				type:'string'},
		{name: 'xmr_name_first',			text:'Vorname',				type:'string'},
		{name: 'xmr_name_last',				text:'Nachname',			type:'string',		header:true},

		{name: 'xmsq_state',				text:'Status',				xtype:'renderer', 	store : [['Q','Wartend'],['S','Gesendet'],['E1','Fehler - Status E1'],['E2','Fehler - Status E2'],['E3','Fehler - Status E3'],['EE','Fehler - Ende'],['U','Unbekannt'],['','Fehlerhafte Konfiguration']]},
		{name: 'xmsq_ts_Q',					text:'Zeitpunkt-Q',			xtype:'string', hidden: true},
		{name: 'xmsq_ts_S',					text:'Zeitpunkt-S',			xtype:'string', hidden: true},
		{name: 'xmsq_ts_E1',				text:'Zeitpunkt-E1',		xtype:'string', hidden: true},
		{name: 'xmsq_ts_E2',				text:'Zeitpunkt-E2',		xtype:'string', hidden: true},
		{name: 'xmsq_ts_E3',				text:'Zeitpunkt-E3',		xtype:'string', hidden: true},
		{name: 'xmsq_ts_EE',				text:'Zeitpunkt-EE',		xtype:'string', hidden: true},
		{name: 'xmsq_smtp_last_contact',	text:'Zeitpunkt-LC',		xtype:'string', hidden: true},
		{name: 'xmsq_error_h',				text:'Fehlerbeschreibung',	xtype:'string', hidden: true}

		];

		this.gui_eqTree = xframe_pattern.getInstance().genGrid({
			plugin_numLines: false,
			iconsPrefix: 'xr_pages',
			button_del:false,
			button_add:false,
			records_move:false,
			region:'west',
			split: true,
			toolbar_top:[],
			pager: true,
			title: 'Liste',
			search: true,
			border:false,
			forceFit:true,
			xstore: {
				load: 	xmarketing.getInstance().getAjaxPath('/emission_queue_recipient/load'),
				params: {xme_id:me.xme_id},
				pid: 	'xml_id',
				fields: fields
			}
		});

		this.gui_eqTree.getStore().on('beforeload', function(s) {
			this.gui_eqTree.getStore().proxy.extraParams['xme_id'] = this.xme_id;
		},this);

		var grid = this.gui_eqTree;

		this.gui_eqTree.on('afterrender',function(){
			this.gui_eqTree.getStore().load();
		},this);

		this.xmsq_id 				= -1;
		this.eqs_iframeID 			= Ext.id();
		this.eqs_iframeURL			= xmarketing.getInstance().getAjaxPath('/emission_queue_recipient/show')
		this.eqs_latestIframeUrl 	= "about:blank";

		var iframe = Ext.create('Ext.Panel',{
			title: 'Ansicht',
			tbar: [{
				text: 'Testmail senden an:',
				iconCls: 'xf_mail_send',
				id: 'eqs_testmail_btn',
				disabled: true,
				scope: this,
				handler: function(){

					var email = Ext.getCmp('eqs_testmail_tf').getValue();

					Ext.MessageBox.show({
						msg: 'E-Mail an : '+email+' wird versendet ...',
						width:300,
						wait:true,
						waitConfig: {interval:200}
					});

					xframe.ajax({
						jsonFeedback: true,
						scope: this,
						url: xmarketing.getInstance().getAjaxPath('/emission_queue_recipient/testSend'),
						params: {
							xmsq_id: this.sender_xmsq_id,
							email: email
						},
						stateless: function() {
							Ext.MessageBox.hide();
						},
						success: function(json){
						},
						failure: function(json){
						},
						failure_msg: xframe.lang('E-Mail konnte nicht versendet werden.')
					});

				}
			},{
				id: 'eqs_testmail_tf',
				xtype:'textfield',
				vtype: 'email',
				value: ''
			}],
			border:false,
			split: true,
			layout: 'fit',
			region: 'center',
			html : "<iframe id='"+this.eqs_iframeID+"' src='"+this.eqs_latestIframeUrl+"' width=100% height=100% frameborder=0></iframe>"
		});


		iframe.on('afterrender',function(){
			Ext.getCmp('eqs_testmail_tf').setValue(xredaktor.getInstance().getUsersEMail());
		},this);

		this.gui_eqTree.on('selectionchange',function(view,selections,options){
			if (selections.length != 1) {
				this.getEmmissionCenterPanel_Queue_selectMail(false);
				return;
			}
			var r = selections[0].data;
			this.getEmmissionCenterPanel_Queue_selectMail(r.xmsq_id,r);
		},this);

		var gui = Ext.create('Ext.Panel',{
			layout: 'border',
			title: 'Versandliste',
			items: [this.gui_eqTree,iframe]
		});

		return gui;
	},

	getEmmissionCenterPanel_Queue_selectMail : function(xmsq_id)
	{
		if (!xmsq_id)
		{
			Ext.getCmp('eqs_testmail_btn').setDisabled(true);
			return false;
		}
		this.sender_xmsq_id = xmsq_id;
		Ext.getCmp('eqs_testmail_btn').setDisabled(false);
		try {
			this.eqs_latestIframeUrl = this.eqs_iframeURL + '?xmsq_id='+xmsq_id;
			Ext.get(this.eqs_iframeID).dom.setAttribute('src',this.eqs_latestIframeUrl);
		} catch (e) {console.info(e);}
	},



	getEmmissionCenterPanel_Recipient : function()
	{
		var me = this;

		var fields = [
		{name: 'xmr_id',			text:'User ID',				type:'int',  	hidden: true},
		{name: 'xmr_email',			text:'E-Mail',				type:'string'},
		{name: 'xmr_name_first',	text:'Vorname',				type:'string'},
		{name: 'xmr_name_last',		text:'Nachname',			type:'string',	header:true},
		{name: 'xmr_full_salutation',		text:'Begrüßung',			type:'string',		header:true}
		];

		this.gui_eSamplesTree = xframe_pattern.getInstance().genGrid({
			plugin_numLines: false,
			iconsPrefix: 'xr_pages',
			button_del:false,
			button_add:false,
			records_move:false,
			region:'west',
			split: true,
			toolbar_top:[],
			pager: true,
			search: true,
			title: 'Liste',
			border:false,
			forceFit:true,
			xstore: {
				load: 	xmarketing.getInstance().getAjaxPath('/emission_mails_recipient/load'),
				params: {xme_id:me.xme_id},
				pid: 	'xml_id',
				fields: fields
			}
		});

		this.gui_eSamplesTree.getStore().on('beforeload', function(s) {
			this.gui_eSamplesTree.getStore().proxy.extraParams['xme_id'] = this.xme_id;
		},this);

		var grid = this.gui_eSamplesTree;

		this.gui_eSamplesTree.on('afterrender',function(){
			this.gui_eSamplesTree.getStore().load();
		},this);

		this.xmsq_id 				= -1;
		this.es_iframeID 			= Ext.id();
		this.es_iframeURL			= xmarketing.getInstance().getAjaxPath('/emission_mails_recipient/show')
		this.es_latestIframeUrl 	= "about:blank";

		var iframe = Ext.create('Ext.Panel',{
			title: 'Ansicht',
			tbar: [{
				text: 'Testmail senden an:',
				iconCls: 'xf_mail_send',
				id: 'mh_testmail_btn',
				disabled: true,
				scope: this,
				handler: function(){

					var email = Ext.getCmp('mh_testmail_tf').getValue();

					Ext.MessageBox.show({
						msg: 'E-Mail an : '+email+' wird versendet ...',
						width:300,
						wait:true,
						waitConfig: {interval:200}
					});

					xframe.ajax({
						jsonFeedback: true,
						scope: this,
						url: xmarketing.getInstance().getAjaxPath('/emission_mails_recipient/testSend'),
						params: {
							xme_id: this.xme_id,
							xmr_id: this.sender_xmr_id,
							email: email
						},
						stateless: function() {
							Ext.MessageBox.hide();
						},
						success: function(json){
						},
						failure: function(json){
						},
						failure_msg: xframe.lang('E-Mail konnte nicht versendet werden.')
					});

				}
			},{
				id: 'mh_testmail_tf',
				xtype:'textfield',
				vtype: 'email',
				value: ''
			}],
			border:false,
			split: true,
			layout: 'fit',
			region: 'center',
			html : "<iframe id='"+this.es_iframeID+"' src='"+this.es_latestIframeUrl+"' width=100% height=100% frameborder=0></iframe>"
		});


		iframe.on('afterrender',function(){
			Ext.getCmp('mh_testmail_tf').setValue(xredaktor.getInstance().getUsersEMail());
		},this);

		this.gui_eSamplesTree.on('selectionchange',function(view,selections,options){
			if (selections.length != 1) {
				this.showGenMail(false);
				return;
			}
			var r = selections[0].data;
			this.showGenMail(r.xmr_id,r);
		},this);

		var gui = Ext.create('Ext.Panel',{
			layout: 'border',
			title: 'Vorschau',
			items: [this.gui_eSamplesTree,iframe]
		});

		return gui;
	},

	showGenMail : function(xmr_id)
	{
		this.xmr_id = -1;

		if (!xmr_id)
		{
			Ext.getCmp('mh_testmail_btn').setDisabled(true);
			return false;
		}

		this.sender_xmr_id = xmr_id;

		Ext.getCmp('mh_testmail_btn').setDisabled(false);

		try {
			this.es_latestIframeUrl = this.es_iframeURL + '?xmr_id='+xmr_id+'&xme_id='+this.xme_id+'&mcms';
			Ext.get(this.es_iframeID).dom.setAttribute('src',this.es_latestIframeUrl);
		} catch (e) {console.info(e);}
	},


	getEmmissionCenterPanel_Bounces: function()
	{
		var me = this;
		var gui = xmarketing_config.getInstance().getListsCenterPanel_sender_detail_bounces({
			scope: me,
			fn: function() {
				return this.xme_id;
			}
		});
		this.storeBounces = xmarketing_config.getInstance().gui_grid_bounces.getStore();
		return gui;
	},

	getEmmissionCenterPanel_Report: function()
	{
		this.reportPanel = xmarketing_reports.getInstance().getMainPanel();
		return this.reportPanel;
	},


	getEmmissionCenterPanel : function()
	{
		this.gui_centerTab = Ext.create('Ext.tab.Panel',{
			layout: 'fit',
			region: 'center',
			title: 'Details',
			border: false,
			disabled: true,
			items: [this.getEmmissionCenterPanel_Status(),this.getEmmissionCenterPanel_Design(),this.getEmmissionCenterPanel_Configuration(),this.getEmmissionCenterPanel_Recipient(),this.getEmmissionCenterPanel_Queue(),this.getEmmissionCenterPanel_Bounces(),this.getEmmissionCenterPanel_Report()]
		});
		return this.gui_centerTab;
	},

	getMainPanel : function(id)
	{
		var gui = Ext.create('Ext.Panel',{
			id: id,
			closable:true,
			iconCls: 'xm_emi',
			title: 'NL: Aussendungen',

			border:false,
			layout:'border',
			items:[this.getEmissionTree(),this.getEmmissionCenterPanel()]
		});

		this.masterGui = gui;

		return gui;
	}

}