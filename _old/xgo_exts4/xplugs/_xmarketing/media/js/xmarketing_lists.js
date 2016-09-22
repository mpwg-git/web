var xmarketing_lists = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xmarketing_lists";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xmarketing_lists_(config);
			}
			return instance;
		}
	}
})();

var xmarketing_lists_ = function(config) {
	this.config = config || {};
};


xmarketing_lists_.prototype = {

	getListsTree : function()
	{
		var fields = [
		{name: 'xml_name',			text:'Name der Liste',		type:'string', 	folder: true, editor: {allowBlank: false,xtype: 'textfield'}},
		{name: 'xml_id',			text:'Interne Nummer',		type:'int',  	hidden: true}
		];

		this.gui_eTree = xframe_pattern.getInstance().genTree({
			iconsPrefix: 'xr_pages',
			button_del:true,
			button_add:true,
			region:'west',
			split: true,
			toolbar_top:[],
			title: 'Listen',
			border:false,
			forceFit:true,
			xstore: {
				load: 	xmarketing.getInstance().getAjaxPath('/lists/load'),
				update: xmarketing.getInstance().getAjaxPath('/lists/update'),
				insert: xmarketing.getInstance().getAjaxPath('/lists/insert'),
				remove: xmarketing.getInstance().getAjaxPath('/lists/remove'),
				params: {xml_s_id:1},
				move: 	xmarketing.getInstance().getAjaxPath('/lists/move'),
				pid: 	'xml_id',
				fields: fields
			}
		});

		this.gui_eTree.on('selectionchange',function(view,selections,options){
			if (selections.length != 1) {
				this.selectList(false);
				return;
			}
			this.selectList(selections[0].data.xml_id);
		},this);

		return this.gui_eTree;
	},

	selectList : function(xml_id)
	{
		var me = this;

		if (!xml_id) {
			this.gui_centerTab.setDisabled(true);
			return;
		} else {
			this.gui_centerTab.setDisabled(false);
		}

		this.xml_id = xml_id;
		this.importGrid.getStore().load();
		this.gui_rGrid.getStore().load();
		this.gui_historyRCallsGrid.getStore().load();
		xmarketing_reports_lists.getInstance().changeList(xml_id);
		xmarketing_lists_remote.getInstance().changeList(xml_id);
	},

	getListsCenterPanel_detail: function()
	{

		var user_form = Ext.create('Ext.form.Panel', {
			url:'save-form.php',
			frame:true,
			title: 'Erweiterte Einstellungen',
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

			items: [{
				fieldLabel: 'Name',
				name: 'first',
				allowBlank:false
			}],

			buttons: [{
				text: 'Save'
			},{
				text: 'Cancel'
			}]
		});

		return user_form;

		return Ext.create('Ext.Panel',{
			layout: 'fit',
			title: 'Grundeinstellungen',
			bodyStyle: 'padding: 20px;',
			html:'Unzureichende Rechte für die Konfigurationen.'
		});
	},

	startUploadAndImport : function(fn)
	{
		var me		= this;
		var form 	= this.importExportPanel.getForm();

		form.submit({
			params: {
				xml_id: me.xml_id
			},
			url: xmarketing.getInstance().getAjaxPath('/lists/uploadExcel'),
			waitMsg: 'Uploading File : '+fn,
			failure: function(fp, o) {
				xframe.alert('Import Fehlgeschlagen',o.result.error);
			},
			success: function(fp, o) {
				me.importGrid.getStore().load();
				var url = xmarketing.getInstance().getAjaxPath('/lists/startImport')+'?xmli_id='+o.result.xmli_id;
				window.open(url,'download_frame');
			}
		});
	},


	showImportErros: function(t,e)
	{
		Ext.create('widget.window', {
			title: t,
			closable: true,
			autoScroll:true,
			width: Ext.getBody().getViewSize().width*0.8,
			height: Ext.getBody().getViewSize().height*0.8,
			layout: 'fit',
			bodyStyle: 'padding: 5px;',
			html:  e
		}).show();
	},

	getListsCenterPanel_import_export: function()
	{

		var fields = [
		{name: 'xmli_id',					text:'Interne Nummer',			type:'int',  	hidden: true},
		{name: 'xmli_type',					text:'Methode',					type:'string'},
		{name: 'xmli_created',				text:'Verarbeitungszeitpunkt',	type:'string'},
		{name: 'xmli_file_name',			text:'Filename',				type:'string'},
		{name: 'xmli_file_size',			text:'Größe (Bytes)',			type:'int', 	hidden: false},
		{name: 'xmli_state',				text:'Status',					type:'string'},
		{name: 'xmli_state_new',			text:'Neu',						type:'int'},
		{name: 'xmli_state_updated',		text:'Aktualisiert',			type:'int'},
		{name: 'xmli_state_failures',		text:'Fehler',					type:'int'},
		{name: 'xmli_state_nochanges',		text:'Keine Änderungen',		type:'int'},
		{name: 'xmli_state_duplicates',		text:'Enthaltene Duplikate',	type:'int'},
		{name: 'xmli_host',					text:'Host',					type:'string', hidden: false},
		{name: 'xmli_ip',					text:'IP',						type:'string', hidden: false},
		{name: 'xmli_processed_line',		text:'Verarbeitet',				type:'int'}
		];

		this.importGrid = xframe_pattern.getInstance().genGrid({
			layout:'fit',
			forceFit:true,
			border:false,
			records_move:false,
			title:'Importstatus',
			split: true,
			pager:true,
			search:false,
			button_add: false,
			button_del: false,
			collapseMode: 'mini',
			xstore: {
				load: 	xmarketing.getInstance().getAjaxPath('/lists/load_import'),
				update: xmarketing.getInstance().getAjaxPath('/lists/update'),
				insert: xmarketing.getInstance().getAjaxPath('/lists/insert'),
				move:	xmarketing.getInstance().getAjaxPath('/lists/move'),
				remove: xmarketing.getInstance().getAjaxPath('/lists/remove'),
				pid: 	'xmr_id',
				fields: fields
			},
			toolbar_top:[{
				id: 'openSelUpload',
				iconCls: 'xf_info',
				disabled: true,
				scope: this,
				text:'Fehler anzeigen',
				handler: function() {
					this.showImportErros('Enthaltene Fehler',this.latestSelectedImport_error);
				}
			},'-',{
				id: 'openDup',
				iconCls: 'xf_info',
				disabled: true,
				scope: this,
				text:'Duplikate anzeigen',
				handler: function() {
					this.showImportErros('Enthaltene Duplikate',this.xmli_state_duplicates_mails);
				}
			}]
		});

		this.importGrid.getStore().on('beforeload', function(s) {
			this.importGrid.getStore().proxy.extraParams['xml_id'] = this.xml_id;
		},this);

		this.importGrid.on('afterrender',function(){
			if (!this.xml_id) return;
			this.importGrid.getStore().load();
		},this);

		this.importGrid.on('selectionchange',function(view,selections,options){
			if (selections.length != 1) {
				Ext.getCmp('openSelUpload').setDisabled(true);
				Ext.getCmp('openDup').setDisabled(true);
				return;
			}
			Ext.getCmp('openSelUpload').setDisabled(false);
			Ext.getCmp('openDup').setDisabled(false);

			this.latestSelectedImport_id 		= selections[0].data.xmli_id;
			this.latestSelectedImport_error 	= selections[0].raw.xmli_errors;
			this.xmli_state_duplicates_mails 	= selections[0].raw.xmli_state_duplicates_mails;

		},this);

		this.importGrid.on('itemdblclick',function(thisx, record, item, index, e, eOpts) {
			this.showImportErros('Enthaltene Fehler',record.raw.xmli_errors);
		},this);

		this.importExportPanel = Ext.create('Ext.form.Panel',{
			fileUpload: true,
			layout: 'fit',
			title: 'Import/Export',
			html:'<iframe style="display:none;" width=1 height=0 name="download_frame"></iframe>',
			items: [this.importGrid],
			tbar: [{
				iconCls: 'xf_csv',
				tooltip: 'Datei in Excel öffnen - Fehlermeldung bitte ignorieren...',
				text: 'Exportieren in Excel kompabiles Format',
				scope: this,
				handler: function()
				{
					var url = xmarketing.getInstance().getAjaxPath('/lists/export')+'?xml_id='+this.xml_id;
					window.open(url,'download_frame');
				}
			},'-',{
				iconCls: 'xf_add',
				tooltip: 'Importieren',
				xtype: 'fileuploadfield',
				name: 'upload_xlsx',
				hideLabel: true,
				text: 'Daten importieren. Ausgangsdateiformat: .csv - Datei',
				scope: this,
				buttonOnly: true,
				listeners: {
					scope: this,
					'change': function(fb, v){
						var fn = v.split("\\").pop();
						this.startUploadAndImport(fn);
					}
				},
				buttonConfig: {
					iconCls: 'xf_upload',
					hideLabel: true,
					text:'Importieren aus .csv Datei'
				},
				handler: function()
				{

				}
			}]
		});

		return this.importExportPanel;
	},

	getListsCenterPanel_recipients: function()
	{
		this.gui_rGrid = xframe_pattern.getInstance().genGrid({
			layout:'fit',
			forceFit:true,
			border:false,
			records_move:false,
			title:'Empfänger',
			split: true,
			pager:true,
			search:true,
			button_add: false,
			button_del: false,
			collapseMode: 'mini',
			xstore: {

				load: 	xmarketing.getInstance().getAjaxPath('/recipientsOfList/load'),
				update: xmarketing.getInstance().getAjaxPath('/recipientsOfList/update'),
				insert: xmarketing.getInstance().getAjaxPath('/recipientsOfList/insert'),
				move:	xmarketing.getInstance().getAjaxPath('/recipientsOfList/move'),
				remove: xmarketing.getInstance().getAjaxPath('/recipientsOfList/remove'),

				pid: 	'xmr_id',
				fields: xmarketing_recipients.getInstance().fieldsOfRecords()
			}
		});

		this.gui_rGrid.getStore().on('beforeload', function(s) {
			this.gui_rGrid.getStore().proxy.extraParams['xml_id'] = this.xml_id;
		},this);

		this.gui_rGrid.on('afterrender',function(){
			if (!this.xml_id) return;
			this.gui_rGrid.getStore().load();
		},this);

		return this.gui_rGrid;
	},

	getListsCenterPanel_historyRemoteCalls: function()
	{
		var me = this;
		var fields = [
		{name: 'xmlr_id',					text:'Interne Nummer',			type:'int',  	hidden: true},

		{name: 'xmlr_caller',				text:'Verarbeitungszeitpunkt',	xtype:'renderer', 	store : [['AUTO','System'],['MANUAL','Manuell']]},
		{name: 'xmlr_ts_download_start',	text:'Verarbeitungszeitpunkt',	type:'string'},
		{name: 'xmlr_pre_check',			text:'Pre-Check',				xtype:'renderer', 	store : [['OK','OK'],['NOK','Fehler'],['DOWNLOADING','Ladet'],['ERROR_STORING_DOWNLOAD','Speichern fehlgeschlagen'],['NOT_ACTIVE','Nicht Aktiv'],['INVALID_URL','Gespeicherter URL ist nicht korrekt'],['EMPTY_URL','URL ist leer'],['UPLOAD_HANDLER_ERROR','Fehler im Importprozess']]},
		{name: 'xmlr_ts_download_time',		text:'Downloadzeit (Sekunden)',	type:'int'},

		{name: 'xmlr_cfg_url',				text:'Endpoint',				type:'string', 	hidden: false},
		{name: 'xmlr_xmli_id',				text:'Import-ID',				type:'int'}

		];

		this.gui_historyRCallsGrid = xframe_pattern.getInstance().genGrid({
			layout:'fit',
			forceFit:true,
			border:false,
			records_move:false,
			title:'Sync-Informationen',
			split: true,
			pager:true,
			search:false,
			button_add: false,
			button_del: false,
			collapseMode: 'mini',
			xstore: {
				load: 	xmarketing.getInstance().getAjaxPath('/getRemoteCalls/load'),
				update: xmarketing.getInstance().getAjaxPath('/getRemoteCalls/update'),
				insert: xmarketing.getInstance().getAjaxPath('/getRemoteCalls/insert'),
				move:	xmarketing.getInstance().getAjaxPath('/getRemoteCalls/move'),
				remove: xmarketing.getInstance().getAjaxPath('/getRemoteCalls/remove'),
				pid: 	'xmlr_id',
				fields: fields
			},
			toolbar_top : [{
				scope: me,
				iconCls: 'xf_databasesync',
				text: 'Synchronisieren',
				handler: function() {

					xframe.ajax({
						scope: me,
						url: xmarketing.getInstance().getAjaxPath('/getRemoteCalls/doTheJob'),
						params : {
							xml_id: this.xml_id
						},
						success: function(fullData) {

						},
						stateless: function(json)
						{
							this.gui_historyRCallsGrid.getStore().load();
						}
					});


				}
			}]
		});

		this.gui_historyRCallsGrid.getStore().on('beforeload', function(s) {
			this.gui_historyRCallsGrid.getStore().proxy.extraParams['xml_id'] = this.xml_id;
		},this);

		this.gui_historyRCallsGrid.on('afterrender',function(){
			if (!this.xml_id) return;
			this.gui_historyRCallsGrid.getStore().load();
		},this);

		return this.gui_historyRCallsGrid;
	},

	getListsCenterPanel : function()
	{

		this.listExtended = xmarketing_lists_remote.getInstance().getMainPanel();

		this.gui_centerTab 	= Ext.create('Ext.tab.Panel',{
			layout: 'fit',
			region: 'center',
			border: false,
			disabled: true,
			items: [this.getListsCenterPanel_import_export(),this.getListsCenterPanel_recipients(),xmarketing_reports_lists.getInstance().getMainPanel(),this.listExtended,this.getListsCenterPanel_historyRemoteCalls()]
		});
		return this.gui_centerTab;
	},

	getMainPanel : function(id)
	{
		var gui = Ext.create('Ext.Panel',{
			border:false,
			id: id,
			iconCls: 'xm_list',
			title: 'NL: Listen',
			closable: true,
			layout:'border',
			items:[this.getListsTree(),this.getListsCenterPanel()]
		});
		return gui;
	}

}