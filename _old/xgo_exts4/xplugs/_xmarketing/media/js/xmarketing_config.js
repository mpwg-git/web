var xmarketing_config = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xmarketing_config";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xmarketing_config_(config);
			}
			return instance;
		}
	}
})();

var xmarketing_config_ = function(config) {
	this.config = config || {};
};


xmarketing_config_.prototype = {


	getListsCenterPanel_sender_tree : function()
	{
		var fields = [
		{name: 'xmsc_id',		text:'ID',							type:'int',  	hidden: true},
		{name: 'xmsc_name',		text:'Absender-Account-Name',		type:'string', 	folder: true, editor: {allowBlank: false,xtype: 'textfield'}}
		];

		this.gui_faTree = xframe_pattern.getInstance().genTree({
			iconsPrefix: 'xr_pages',
			button_del:true,
			button_add:true,
			region:'west',
			split: true,
			toolbar_top:[],
			title: 'Konten',
			border:false,
			forceFit:true,
			xstore: {
				load: 	xmarketing.getInstance().getAjaxPath('/config_faccounts/load'),
				update: xmarketing.getInstance().getAjaxPath('/config_faccounts/update'),
				insert: xmarketing.getInstance().getAjaxPath('/config_faccounts/insert'),
				remove: xmarketing.getInstance().getAjaxPath('/config_faccounts/remove'),
				params: {xme_s_id:1},
				move: 	xmarketing.getInstance().getAjaxPath('/config_faccounts/move'),
				pid: 	'xmsc_id',
				fields: fields
			}
		});

		this.gui_faTree.on('selectionchange',function(view,selections,options){
			if (selections.length != 1) {
				this.selectFireAccount(false);
				return;
			}
			this.selectFireAccount(selections[0].data.xmsc_id);
		},this);

		return this.gui_faTree;
	},

	selectFireAccount : function(xmsc_id) {

		var me 			= this;
		this.xmsc_id 	= xmsc_id;

		if (!xmsc_id) {
			this.detailPanel.setDisabled(true);
			return;
		} else
		{
			this.detailPanel.setDisabled(false);
		}

		xframe.ajax({
			scope: me,
			url: xmarketing.getInstance().getAjaxPath('/config_faccounts/getRecordById'),
			params : {
				xmsc_id : xmsc_id
			},
			stateless: function(status,json) {
				console.info('record',json);
				this.senderConfigDetail.getForm().setValues(json.record);
			}
		});
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


	getListsCenterPanel_sender_detail_config : function()
	{
		var fields = [

		{fs: 'A', formMode: 'RO',  	name: 'xmsc_name',						text:'Konto-Name'	},
		{fs: 'A', formMode: 'RO',	name: 'xmsc_created',					text:'Erstellt'		},
		{fs: 'A', formMode: 'RO', 	name: 'xmsc_lastmod',					text:'Geändert'		},

		{fs: 'B', name: 'xmsc_smtp_host',			text:'Host',			type:	'string'},
		{fs: 'B', name: 'xmsc_smtp_user',			text:'User',			type:	'string'},
		{fs: 'B', name: 'xmsc_smtp_pwd',			text:'Passwort',		type:	'string'},

		{fs: 'C', name: 'xmsc_smtp_limit_time',		text:'Zeit',			type:	'string'},
		{fs: 'C', name: 'xmsc_smtp_limit_cnt',		text:'Zustellungen',	type:	'string'},

		{fs: 'D', name: 'xmsc_from_mail',			text:'E-Mail',			type:	'string'},
		{fs: 'D', name: 'xmsc_from_name',			text:'Name',			type:	'string'},

		{fs: 'E', name: 'xmsc_reply_mail',			text:'E-Mail',			type:	'string'},
		{fs: 'E', name: 'xmsc_reply_name',			text:'Name',			type:	'string'},

		{fs: 'F', name: 'xmsc_pop_active',			text:'Aktiv',			type:	'string',  xtype: 'renderer', store : [['N','Nein'],['Y','Ja']]},
		{fs: 'F', name: 'xmsc_pop_host',			text:'Host',			type:	'string'},
		{fs: 'F', name: 'xmsc_pop_user',			text:'User',			type:	'string'},
		{fs: 'F', name: 'xmsc_pop_password',		text:'Passwort',		type:	'string'}

		];


		var me = this;
		var fs = {
		'A' : 'Allgemeine Informationen',
		'B' : 'Zugangsdaten',
		'C' : 'Limitierungen',
		'D' : 'Absender Informationen',
		'E' : 'Reply Informationen',
		'F' : 'Bounces Abrufen (POP3)'
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
			title: 'Konfiguration',
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
					update.xmsc_id = this.xmsc_id;

					xframe.ajax({
						scope: me,
						url: xmarketing.getInstance().getAjaxPath('/config_faccounts/updateRecord'),
						params : update,
						success: function(fulldata) {
						},
						stateless: function(json)
						{
						}
					});
				}
			},{
				iconCls: 'xf_mail_test',
				text:'speichern & Konfiguration testen; Test-Mail an :',
				scope: me,
				handler: function(){



					var update 	= this.senderConfigDetail.getForm().getValues();
					update.xmsc_id = this.xmsc_id;

					xframe.ajax({
						scope: me,
						url: xmarketing.getInstance().getAjaxPath('/config_faccounts/updateRecord'),
						params : update,
						success: function(fulldata) {


							Ext.MessageBox.show({
								msg: 'E-Mail wird versendet ...',
								width:300,
								wait:true,
								waitConfig: {interval:200}
							});

							var email = Ext.getCmp('mh_testmail_tf_3').getValue();

							xframe.ajax({
								jsonFeedback: true,
								scope: this,
								url: xmarketing.getInstance().getAjaxPath('/config_faccounts/checkAccount'),
								params: {
									xmsc_id: this.xmsc_id,
									email: email
								},
								stateless: function() {
									Ext.MessageBox.hide();
								},
								success: function(json){
									Ext.MessageBox.show({
										title: 'Erfolgreich',
										msg: 'Bitte überprüfen Sie ob die E-Mail zugestellt worden ist.',
										buttons: Ext.MessageBox.OK,
										icon: 'ext-mb-info'
									});
								},
								failure: function(fulldata) {

								},
								failure_msg : 'Fehlerhafte Konfiguration'
							});



						},
						stateless: function(json)
						{
						}
					});

				}
			},{
				id: 'mh_testmail_tf_3',
				xtype:'textfield',
				vtype: 'email',
				value: xredaktor.getInstance().getUsersEMail()
			}]
		});

		return this.senderConfigDetail;
	},


	getEmissionId : function(focusOnThisEmission)
	{
		return focusOnThisEmission.fn.call(focusOnThisEmission.scope);
	},

	collectBounces : function(focusOnThisEmission)
	{
		var params = {
			xmsc_id : this.xmsc_id
		};

		if (focusOnThisEmission)
		{
			params['xmse_id'] = this.getEmissionId(focusOnThisEmission);
		}

		var me = this;
		xframe.ajax({
			scope: me,
			url: xmarketing.getInstance().getAjaxPath('/bounces/collectBounces'),
			params : params,
			stateless: function(status,json) {
				this.gui_grid_bounces.getStore().load();
			}
		});
	},

	getListsCenterPanel_sender_detail_bounces : function(focusOnThisEmission)
	{

		var me = this;
		var fields = [
		{name: 'xmscb_id',				text:'Interne Nummer',				type:'int',  	hidden: true},
		{name: 'xmscb_subject',			text:'Betreff',						type:'string'},
		{name: 'xmscb_r_id',			text:'Empfänger ID',				type:'string'},
		{name: 'xmscb_r_email',			text:'Empfänger E-Mail',			type:'string'},
		{name: 'xmscb_e_id',			text:'Aussendungs-Nummer',			type:'string'},
		{name: 'xmscb_q_id',			text:'Wartenschlangen-ID',			type:'string'},
		{name: 'xmscb_ts',				text:'Erfassungszeitpunkt',			type:'string'},
		{name: 'xmscb_message_id',		text:'E-Mail Message ID',			type:'string'},
		{name: 'xmscb_html_size',		text:'Größe der Nachricht (KB)',	type:'string'},
		{name: 'xmscb_valid',			text:'Automatisch Erkannt',			type:'string', xtype:'renderer', store: [['N','Nein'],['Y','Ja']]}
		];

		this.gui_grid_bounces = xframe_pattern.getInstance().genGrid({
			plugin_numLines: false,
			iconsPrefix: 'xr_pages',
			button_del:false,
			button_add:false,
			records_move:false,
			region:'west',
			split: true,
			toolbar_top:[],
			title: 'Absender-Kontent',
			border:false,
			search: true,
			forceFit:true,
			xstore: {
				load: 	xmarketing.getInstance().getAjaxPath('/bounces/load'),
				update: xmarketing.getInstance().getAjaxPath('/bounces/update'),
				insert: xmarketing.getInstance().getAjaxPath('/bounces/insert'),
				remove: xmarketing.getInstance().getAjaxPath('/bounces/remove'),
				move: 	xmarketing.getInstance().getAjaxPath('/bounces/move'),
				pid: 	'xml_id',
				fields: fields
			}
		});

		this.gui_grid_bounces.getStore().on('beforeload', function(s) {
			this.gui_grid_bounces.getStore().proxy.extraParams['xmsc_id'] = this.xmsc_id;
			if (focusOnThisEmission) {
				this.gui_grid_bounces.getStore().proxy.extraParams['xmse_id'] = this.getEmissionId(focusOnThisEmission);
			}
		},this);

		var xmscb_id 			= -1;
		var grid 				= this.gui_grid_bounces;
		var htmlUrl  			= false;

		var textField = Ext.create('Ext.form.field.TextArea', {
			region: 'center',
			title: 'Plain',
			value: '',
			readOnly: true
		});

		var htmlIframe = Ext.create('Ext.Panel', {
			region: 'center',
			title: 'Html',
			layout:'fit',
			html: '<iframe name="showHtmlContent" width=100% height=100% frameborder=0></iframe>',
			readOnly: true
		});

		var iframe_loaded = false;
		htmlIframe.on('afterrender',function(){
			iframe_loaded = true;
			if (htmlUrl) {
				window.open(htmlUrl,'showHtmlContent');
			}
		});

		var attachments = Ext.create('Ext.Panel', {
			region: 'center',
			title: 'Anhänge',
			html: '<iframe name="showAttachments" width=100% height=100% frameborder=0></iframe>',
			readOnly: true
		});

		var attachments_url		= false;
		var attachments_loaded  = false;
		attachments.on('afterrender',function(){
			attachments_loaded = true;
			if (attachments_url) {
				window.open(attachments_url,'showAttachments');
			}
		});

		this.gui_grid_bounces.on('selectionchange',function(view,selections,options){

			if (selections.length != 1) {
				textField.setValue("");
				Ext.getCmp('downloadBounceEmail_2').setDisabled(true);
				return;
			}

			Ext.getCmp('downloadBounceEmail_2').setDisabled(false);

			xmscb_id = selections[0].data.xmscb_id;

			xframe.ajax({
				jsonFeedback: true,
				scope: this,
				url: xmarketing.getInstance().getAjaxPath('/bounces/getById'),
				params: {xmscb_id:xmscb_id},
				success: function(json){
					console.info(json);
					textField.setValue(json.bounce.xmscb_json_full.body);
					htmlUrl = xmarketing.getInstance().getAjaxPath('/bounces/showHTML/'+xmscb_id+'/');
					if (iframe_loaded)
					{
						window.open(htmlUrl,'showHtmlContent');
					}
					attachments_url = xmarketing.getInstance().getAjaxPath('/bounces/showAttachments?xmscb_id='+xmscb_id);
					if (attachments_loaded)
					{
						window.open(attachments_url,'showAttachments');
					}
				},
				failure: function(json) {

				},
				failure_msg: 'Bounce konnte nicht geladen werden'
			});

		},this);

		this.gui_grid_bounces.on('afterrender',function(){
			this.gui_grid_bounces.getStore().load();
		},this);

		var mailContentPanel = Ext.create('Ext.tab.Panel',{
			title: 'Inhalt der Bounce Nachricht',
			layout: 'fit',
			region: 'center',
			items: [textField,htmlIframe,attachments]
		});

		var gui = Ext.create('Ext.Panel',{
			layout: 'border',
			title: 'Bounces',
			tbar: [{
				scope: this,
				iconCls: 'xf_download',
				text:'e-Mails abrufen',
				handler: function() {
					this.collectBounces(focusOnThisEmission);
				}
			}
			,'|',{
				text: 'Download E-Mail',
				id:'downloadBounceEmail_2',
				iconCls: 'xf_download',
				disabled:true,
				scope:me,
				handler: function() {
					window.open(xmarketing.getInstance().getAjaxPath('/bounces/downloadEmail')+"?xmscb_id="+xmscb_id,"downloadEMail");
				}
			}


			],
			html: '<iframe name="downloadEMail" width=0 height=1 style="display:none;"></iframe>',
			items: [this.gui_grid_bounces,mailContentPanel]
		});

		return gui;
	},

	getListsCenterPanel_sender_detail : function()
	{
		this.detailPanel = Ext.create('Ext.tab.Panel',{
			layout: 'fit',
			region: 'center',
			title: 'Details',
			disabled: true,
			items: [this.getListsCenterPanel_sender_detail_config(),this.getListsCenterPanel_sender_detail_bounces()]
		});
		return this.detailPanel;
	},

	getListsCenterPanel_sender: function()
	{
		var gui = Ext.create('Ext.Panel',{
			layout: 'border',
			title: 'Bounces dieses Kontos',
			items: [this.getListsCenterPanel_sender_tree(),this.getListsCenterPanel_sender_detail()]
		});

		return gui;
	},

	getListsCenterPanel : function()
	{
		this.gui_centerTab = Ext.create('Ext.tab.Panel',{
			layout: 'fit',
			region: 'center',
			border: false,
			items: [this.getListsCenterPanel_sender()]
		});
		return this.gui_centerTab;
	},

	getMainPanel : function(id)
	{
		var gui = Ext.create('Ext.Panel',{
			id: id,
			title: 'NL: Konfiguration',
			closable: true,
			iconCls:'xf_settings',
			border:false,
			layout:'border',
			items:[this.getListsCenterPanel()]
		});
		return gui;
	}

}