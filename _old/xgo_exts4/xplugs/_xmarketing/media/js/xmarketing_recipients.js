var xmarketing_recipients = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xmarketing_recipients";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xmarketing_recipients_(config);
			}
			return instance;
		}
	}
})();

var xmarketing_recipients_ = function(config) {
	this.config = config || {};
};


xmarketing_recipients_.prototype = {


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

	fieldsOfRecords : function()
	{

		var langStore = xredaktor.getInstance().getStoreFE()
		langStore.push(['0','Unbekannt']);

		var fields = [
		{fs: 'A', formMode: 'RO',  	name: 'xmr_id',				text:'User ID',						hidden: false, 	width: 40, type:	'int'},

		{fs: 'A', formMode: 'RO', 	name: 'xmr_created',			text:'Erstellt',				hidden: true, 	width: 40, type:	'string'},
		{fs: 'A', formMode: 'RO',	name: 'xmr_lastmod',			text:'Geändert',				hidden: true, 	width: 40, type:	'string'},

		{fs: 'B', name: 'xmr_canceled',				text:'Abbestellt',				hidden: false,	width: 40, type:	'string',  xtype: 'renderer', store : [['N','Nein'],['Y','Ja']]},
		{fs: 'B', name: 'xmr_canceled_date',		text:'Abbestellt - Zeitpunkt',	hidden: true,	type:	'string', resizeable: true},

		{fs: 'C', name: 'xmr_type', 				text:'Typ',						hidden: false,	width: 40, xtype:	'renderer', store : [['W','Frau'],['M','Herr'],['F','Familie'],['C','Firma'],['X','Unbekannt']] },

		{fs: 'C', name: 'xmr_full_salutation', 	text:'Personalisierte Anrede',	hidden: true,	type:	'string'},
		{fs: 'C', name: 'xmr_title_pre', 		text:'Pre - Titel',				hidden: true,	type:	'string'},
		{fs: 'C', name: 'xmr_title_post', 		text:'Post - Titel',			hidden: true,	type:	'string'},

		{fs: 'C', name: 'xmr_name_first', 		text:'Vorname',					hidden: false,	type:	'string'},
		{fs: 'C', name: 'xmr_name_last', 		text:'Nachname',				hidden: false,	type:	'string'},

		{fs: 'C', name: 'xmr_email', 			text:'E-Mail',					hidden: false,	type:	'string', vtype:'email'},

		{fs: 'C', name: 'xmr_lang', 				text:'Sprache',					hidden: false,	xtype: 'renderer', store : langStore}
		];

		return fields;
	},

	getRecGrid : function()
	{
		this.gui_rGrid = xframe_pattern.getInstance().genGrid({
			region:'west',
			forceFit:true,
			border:false,
			records_move:false,
			title:'Empfänger',
			split: true,
			pager:true,
			search:true,
			button_add: true,
			button_del: true,
			collapseMode: 'mini',
			xstore: {

				load: 	xmarketing.getInstance().getAjaxPath('/recipients/load'),
				update: xmarketing.getInstance().getAjaxPath('/recipients/update'),
				insert: xmarketing.getInstance().getAjaxPath('/recipients/insert'),
				move:	xmarketing.getInstance().getAjaxPath('/recipients/move'),
				remove: xmarketing.getInstance().getAjaxPath('/recipients/remove'),

				pid: 	'xmr_id',
				fields: this.fieldsOfRecords()
			}
		});

		this.gui_rGrid.on('selectionchange',function(view,selections,options){
			if (selections.length != 1) {
				this.selectRecipient(false);
				return;
			}
			var r = selections[0].data;
			this.selectRecipient(r.xmr_id,r);
		},this);

		this.gui_rGrid.on('afterrender',function(){
			this.gui_rGrid.getStore().load();
		},this);

		return this.gui_rGrid;
	},

	selectRecipient : function(xmr_id,r)
	{
		var me = this;

		this.xmr_id = false;
		this.xmr_r	= false;

		if (!xmr_id) {
			this.gui_centerTab.setDisabled(true);
			return;
		}

		this.gui_centerTab.setDisabled(false);
		this.xmr_id = xmr_id;
		this.xmr_r	= r;

		xframe.ajax({
			scope: me,
			url: xmarketing.getInstance().getAjaxPath('/recipients/getRecordById'),
			params : {
				xmr_id : xmr_id
			},
			success: function(fulldata) {
				this.xmr_r = fulldata;
				this.userDetailPanel.getForm().setValues(this.xmr_r.user);
				this.assignedListsReload();
			},
			stateless: function(json)
			{
			}
		});
	},

	getListsCenterPanel_detail: function()
	{
		var me = this;
		var fs = {
		'A' : 'Systeminformationen',
		'B' : 'Status',
		'C' : 'Persönliche Daten'
		};

		var items 	= [];
		var groups 	= {};
		var fields 	= this.fieldsOfRecords();

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

		this.userDetailPanel = Ext.create('Ext.form.Panel', {
			frame: false,
			title: 'Stammdaten',
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

					var update = this.userDetailPanel.getForm().getValues();

					var node = this.gui_rGrid.getStore().getById(this.xmr_id);
					console.info(node);

					Ext.iterate(update,function(k,v){
						node.set(k,v);
					},this);

					xframe.ajax({
						scope: me,
						url: xmarketing.getInstance().getAjaxPath('/recipients/updateRecord'),
						params : update,
						success: function(fulldata) {
							this.gui_dhTree.getStore().load();
						},
						stateless: function(json)
						{
						}
					});

				}
			}]
		});

		return this.userDetailPanel;
	},


	assignedListsReload : function()
	{
		this.gui_eTree.getStore().load();
		this.gui_mhTree.getStore().load();
		this.gui_dhTree.getStore().load();
	},

	getListsCenterPanel_lists: function()
	{
		var me = this;
		var fields = [
		{name: 'checkId',			text:'Interne Nummer',			type:'int',  	hidden: true},
		{name: 'xml_name',			text:'Name der Liste',			type:'string'},
		{name: 'xml_xmr_checked',	text:'Zugewiesen',				type:'bool',	hidden: false, 	header:true}
		];

		this.gui_eTree = xframe_pattern.getInstance().genGrid({
			plugin_numLines: false,
			iconsPrefix: 'xr_pages',
			button_del:false,
			button_add:false,
			records_move:false,
			region:'west',
			split: true,
			toolbar_top:[],
			title: 'Listen',
			border:false,
			forceFit:true,
			xstore: {
				load: 	xmarketing.getInstance().getAjaxPath('/lists2user/load'),
				update: xmarketing.getInstance().getAjaxPath('/lists2user/update'),
				insert: xmarketing.getInstance().getAjaxPath('/lists2user/insert'),
				remove: xmarketing.getInstance().getAjaxPath('/lists2user/remove'),
				params: {xml_s_id:0,xmr_id:0},
				move: 	xmarketing.getInstance().getAjaxPath('/lists2user/move'),
				pid: 	'xml_id',
				fields: fields
			}
		});

		this.gui_eTree.getStore().on('beforeload', function(s) {
			this.gui_eTree.getStore().proxy.extraParams['xmr_id'] = this.xmr_id;
		},this);

		var grid = this.gui_eTree;

		this.gui_eTree.checkchange = function(e,gridColumn,recordId,checked)
		{
			var record = grid.getStore().getAt(recordId);
			var params = {};

			params.xmr_id 	= me.xmr_id
			params.checked 	= checked ? 'on' : 'off';
			params.xml_id 	= record.raw.xml_id;

			xframe.ajax({
				jsonFeedback: true,
				scope: me,
				url: xmarketing.getInstance().getAjaxPath('/lists2user/updateCheck'),
				params: params,
				success: function(json){
					grid.getStore().load();
					this.gui_dhTree.getStore().load();
				},
				failure: function(json){
					grid.getStore().load();
				},
				failure_msg: xframe.lang('Daten konnten nicht aktualisiert werden')
			});
		}

		this.gui_eTree.on('afterrender',function(){
			this.gui_eTree.getStore().load();
		},this);

		return this.gui_eTree;
	},

	getListsCenterPanel_mailHistory: function()
	{
		var me = this;
		var fields = [
		{name: 'xmsq_id',			text:'Queue ID',				type:'int',  	hidden: true},
		{name: 'xme_name',			text:'Aussendung',				type:'string'},
		{name: 'xmsq_state',		text:'E-Mail Status',			type:'string',	header:true},
		{name: 'xmsq_error_h',		text:'Fehlertext',			type:'string',	header:true}
		];

		this.gui_mhTree = xframe_pattern.getInstance().genGrid({
			plugin_numLines: false,
			iconsPrefix: 'xr_pages',
			button_del:false,
			button_add:false,
			records_move:false,
			region:'west',
			split: true,
			toolbar_top:[],
			title: 'Historie',
			border:false,
			forceFit:true,
			xstore: {
				load: 	xmarketing.getInstance().getAjaxPath('/mailHistory/load'),
				params: {xml_s_id:0,xmr_id:0},
				pid: 	'xml_id',
				fields: fields
			}
		});

		this.gui_mhTree.getStore().on('beforeload', function(s) {
			this.gui_mhTree.getStore().proxy.extraParams['xmr_id'] = this.xmr_id;
		},this);

		var grid = this.gui_mhTree;

		this.gui_mhTree.on('afterrender',function(){
			this.gui_mhTree.getStore().load();
		},this);

		this.xmsq_id 			= 0;
		this.iframeID 			= Ext.id();
		this.iframeURL			= xmarketing.getInstance().getAjaxPath('/mailHistory/show')
		this.latestIframeUrl 	= this.iframeURL + '?xmsq_id='+this.xmsq_id+'&mcms';

		var iframe = Ext.create('Ext.Panel',{
			tbar: [{
				text: 'Testmail senden an:',
				iconCls: 'xf_mail_send',
				id: 'mh_testmail_btn_2',
				disabled: true,
				scope: this,
				handler: function(){


					var email = Ext.getCmp('mh_testmail_tf_2').getValue();

					Ext.MessageBox.show({
						msg: 'E-Mail an : '+email+' wird versendet ...',
						width:300,
						wait:true,
						waitConfig: {interval:200}
					});

					xframe.ajax({
						jsonFeedback: true,
						scope: this,
						url: xmarketing.getInstance().getAjaxPath('/mailHistory/testSend'),
						params: {
							xmsq_id: this.xmsq_id,
							email: email
						},
						stateless: function() {
							Ext.MessageBox.hide();
						},
						success: function(json){
						},
						failure: function(json){
						},
						failure_msg: xframe.lang('Daten konnten nicht aktualisiert werden')
					});

				}
			},{
				id: 'mh_testmail_tf_2',
				xtype:'textfield',
				vtype: 'email',
				value: ''
			}],
			border:false,
			split: true,
			layout: 'fit',
			region: 'center',
			html : "<iframe id='"+this.iframeID+"' src='"+this.latestIframeUrl+"' width=100% height=100% frameborder=0></iframe>"
		});


		iframe.on('afterrender',function(){
			Ext.getCmp('mh_testmail_tf_2').setValue(xredaktor.getInstance().getUsersEMail());
		},this);

		this.gui_mhTree.on('selectionchange',function(view,selections,options){
			if (selections.length != 1) {
				this.selectMailingHistory(false);
				return;
			}
			var r = selections[0].data;
			this.selectMailingHistory(r.xmsq_id,r);
		},this);

		var gui = Ext.create('Ext.Panel',{
			layout: 'border',
			title: 'Mailings',
			items: [this.gui_mhTree,iframe]
		});

		return gui;
	},

	selectMailingHistory : function(xmsq_id)
	{
		if (!xmsq_id)
		{
			this.xmsq_id = false;
			try {
				this.latestIframeUrl 	= this.iframeURL + '?xmsq_id=0&mcms';
				Ext.get(this.iframeID).dom.setAttribute('src',this.latestIframeUrl);
			} catch (e) {console.info(e);}

			Ext.getCmp('mh_testmail_btn_2').setDisabled(true);
			return false;
		}

		Ext.getCmp('mh_testmail_btn_2').setDisabled(false);

		this.xmsq_id = xmsq_id;
		try {
			this.latestIframeUrl 	= this.iframeURL + '?xmsq_id='+this.xmsq_id+'&mcms';
			Ext.get(this.iframeID).dom.setAttribute('src',this.latestIframeUrl);
		} catch (e) {console.info(e);}
	},

	getListsCenterPanel_history: function()
	{
		var me = this;

		var fields = [
		{name: 'xmrh_id',			text:'Interne ID',				type:'int',  	hidden: true},
		{name: 'xmrh_ts',			text:'Datum',					type:'string'},
		{name: 'xmrh_beu_name',		text:'User',					type:'string'},
		{name: 'xmrh_action',		text:'Aktion',					type:'string',	header:true},
		{name: 'xmrh_details',		text:'Details',					type:'string',	header:true}
		];

		this.gui_dhTree = xframe_pattern.getInstance().genGrid({
			plugin_numLines: false,
			iconsPrefix: 'xr_pages',
			button_del:false,
			button_add:false,
			records_move:false,
			region:'west',
			split: true,
			toolbar_top:[],
			title: 'Datensatz - Historie',
			border:false,
			forceFit:true,
			xstore: {
				load: 	xmarketing.getInstance().getAjaxPath('/dataHistory/load'),
				params: {xml_s_id:0,xmr_id:0},
				pid: 	'xml_id',
				fields: fields
			}
		});

		this.gui_dhTree.getStore().on('beforeload', function(s) {
			this.gui_dhTree.getStore().proxy.extraParams['xmr_id'] = this.xmr_id;
		},this);

		var grid = this.gui_dhTree;

		this.gui_dhTree.on('afterrender',function(){
			this.gui_dhTree.getStore().load();
		},this);

		return this.gui_dhTree;
	},

	getListsCenterPanel : function()
	{
		this.gui_centerTab = Ext.create('Ext.tab.Panel',{
			layout: 'fit',
			region: 'center',
			title: 'Details',
			border: false,
			disabled: true,
			items: [this.getListsCenterPanel_detail(),this.getListsCenterPanel_lists(),this.getListsCenterPanel_mailHistory(),this.getListsCenterPanel_history()]
		});
		return this.gui_centerTab;
	},

	getMainPanel : function(id)
	{
		var gui = Ext.create('Ext.Panel',{
			id: id,
			closable: true,
			title: 'NL: Empfänger',
			border:false,
			iconCls: 'xm_rec',
			layout:'border',
			items:[this.getRecGrid(),this.getListsCenterPanel()]
		});
		return gui;
	}

}