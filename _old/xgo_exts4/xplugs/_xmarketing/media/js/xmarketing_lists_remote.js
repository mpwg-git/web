var xmarketing_lists_remote = (function() {
	var instance = null;
	return new function() {
		this.getPath = function(){
			return "/xgo/xplugs/xmarketing_lists_remote";
		}
		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xmarketing_lists_remote_(config);
			}
			return instance;
		}
	}
})();

var xmarketing_lists_remote_ = function(config) {
	this.config = config || {};
};

xmarketing_lists_remote_.prototype = {

	changeList : function(xml_id)
	{
		this.xml_id = xml_id;
		this.reloadData();
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

	reloadData : function()
	{
		var me = this;
		xframe.ajax({
			scope: me,
			url: xmarketing.getInstance().getAjaxPath('/lists/getById'),
			params : {
				xml_id : this.xml_id
			},
			stateless: function(status,json) {
				console.info('record',json);
				this.senderConfigDetail.getForm().setValues(json.record);
			}
		});
	},

	getMainPanel : function()
	{
		var fields = [

		{fs: 'A', formMode: 'RO',  	name: 'xml_name',						text:'Listenname'	},
		{fs: 'A', formMode: 'RO',	name: 'xml_created',					text:'Erstellt'		},
		{fs: 'A', formMode: 'RO', 	name: 'xml_lastmod',					text:'Geändert'		},

		{fs: 'B', name: 'xml_type',							text:'Listentyp',						type:	'string',  xtype: 'renderer', store : [['LOCAL','Lokale-Liste'],['REMOTE','Remote-Liste'],['TEST','Test-Liste']]},

		{fs: 'C', name: 'xml_remote_endpoint_sync',			text:'Synchronisierung',							type:	'string',  xtype: 'renderer', store : [['ACTIVE','Aktiv'],['INACTIVE','Inaktiv']]},
		//{fs: 'C', name: 'xml_remote_endpoint_sync_min',		text:'Abrufintervall (min)',			type:	'int'	},
		{fs: 'C', name: 'xml_remote_endpoint_url',			text:'URL',								type:	'string'},
		{fs: 'C', name: 'xml_remote_endpoint_security',		text:'Security-Hash',					type:	'string'},
		{fs: 'C', name: 'xml_remote_latest_sync',			text:'Letzter Sync-Zeitpunkt',				type:	'string'}

		];

		var me = this;
		var fs = {
		'A' : 'Allgemeine Informationen',
		'B' : 'Listen-Typ',
		'C' : 'Remote Einstellungen'
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
				msgTarget: 'side'
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
					update.xml_id = this.xml_id;

					xframe.ajax({
						scope: me,
						url: xmarketing.getInstance().getAjaxPath('/lists/updateRecord'),
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
				text:'speichern & Konfiguration testen',
				scope: me,
				handler: function(){



					var update 	= this.senderConfigDetail.getForm().getValues();
					update.xml_id = this.xml_id;

					xframe.ajax({
						scope: me,
						url: xmarketing.getInstance().getAjaxPath('/lists/updateRecord'),
						params : update,
						success: function(fulldata) {


							Ext.MessageBox.show({
								msg: 'Einstellungen werden getestet ...',
								width:300,
								wait:true,
								waitConfig: {interval:200}
							});

							xframe.ajax({
								jsonFeedback: true,
								scope: me,
								url: xmarketing.getInstance().getAjaxPath('/lists/checkRemoteList'),
								params: {
									xml_id: this.xml_id
								},
								stateless: function() {
									Ext.MessageBox.hide();
								},
								success: function(json){
									Ext.MessageBox.show({
										title: 	'Erfolgreich',
										msg: 	'Test wurde erfolgreich abgeschlossen.',
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
			}]
		});

		return this.senderConfigDetail;
	}
	
}