var xredaktor_users = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xredaktor_users_(config);
			}
			return instance;
		}
	}
})();

var xredaktor_users_ = function(config) {
	this.config = config || {};
};

xredaktor_users_.prototype = {


	getUserTree: function() {

		var fields = [
		{name: 'wz_u_username',		text:'Benutzername',		type:'string', folder: true, editor: {allowBlank: false,xtype: 'textfield'}},
		{name: 'wz_id',				text:'Interne Nummer',	 	type:'int',  hidden: false}
		];

		var tree = xframe_pattern.getInstance().genTree({
			iconsPrefix: 'xr_users',
			button_del:true,
			button_add:true,
			region:'west',
			split: true,
			title: 'Benutzerübersicht',
			border:false,
			forceFit:true,
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/busers/load',
				update: '/xgo/xplugs/xredaktor/ajax/busers/update',
				insert: '/xgo/xplugs/xredaktor/ajax/busers/insert',
				remove: '/xgo/xplugs/xredaktor/ajax/busers/remove',
				params: {},
				move: 	'/xgo/xplugs/xredaktor/ajax/busers/move',
				pid: 	'wz_id',
				fields: fields
			}
		});

		tree.on('selectionchange',function(view,selections,options){

			if (selections.length != 1)
			{
				this.detailUser.setDisabled(true);
				return;
			}

			this.detailUser.setDisabled(false);

			var u_id = selections[0].data.wz_id;

			this.detailUser.updateUserInfo(u_id);
		},this);

		return tree;
	},



	getSettingsPanel: function()
	{



		var user_id = -1;
		var ftags = xredaktor.getInstance().getCurrentRolesTags();

		var rolesTagsItems_db  = [];
		var rolesTagsItems_cms = [];

		Ext.each(ftags,function(x){

			if (x.rt_sys_tag == 'Y')
			{
				rolesTagsItems_cms.push({
					boxLabel: x.rt_tag_human,
					name: 'tag_'+x.rt_id
				});
			} else
			{
				rolesTagsItems_db.push({
					boxLabel: x.rt_tag_human,
					name: 'tag_'+x.rt_id
				});
			}
		});

		var detail = Ext.create('Ext.form.Panel',{
			region: 'center',
			border: false,
			disabled: true,
			tbar: [{
				text: 'Speichern',
				handler: function() {

					detail.mask('Speichere Einstellungen ...');
					var params = detail.getForm().getValues();
					params['u_id'] = user_id;

					if (params['pass'] != "")
					{
						params['pass'] = Ext.util.MD5(params['pass']);
					}

					xframe.ajax({
						scope:this,
						url: '/xgo/xplugs/xredaktor/ajax/busers/saveSettings',
						params: params,
						success: function(json) {
							detail.unmask();
						},
						failure: function() {
							detail.unmask();
						}
					});

				},
				scope: this,
				iconCls: 'xf_save'
			}],
			border: false,
			region: 'center',
			xtype: 'container',
			layout: 'hbox',

			items: [{
				margin: '10 10 10 10',
				xtype: 'fieldset',
				flex: 1,
				title: 'Allgemeine Einstellungen',
				defaultType: 'checkbox', // each item will be a checkbox
				layout: 'anchor',
				defaults: {
					anchor: '100%',
					hideEmptyLabel: false,
					uncheckedValue: 'N',
					inputValue : 'Y'
				},
				items: [{
					fieldLabel: 'Benutzer-Level',
					boxLabel: 'ist Administrator',
					name: 'flag_admin'
				},{
					xtype: 'textfield',
					fieldLabel: 'Passwort',
					inputType: 'password',
					name: 'pass'
				},{
					xtype: 'textfield',
					fieldLabel: 'Company',
					name: 'wz_u_company'
				},{
					xtype: 'textfield',
					fieldLabel: 'Vorname',
					name: 'wz_u_firstName'
				},{
					xtype: 'textfield',
					fieldLabel: 'Nachname',
					name: 'wz_u_lastName'
				},{
					xtype: 'textfield',
					fieldLabel: 'E-Mail',
					name: 'wz_u_email'
				},{
					xtype: 'textfield',
					fieldLabel: 'Telefon',
					name: 'wz_u_phone'
				},{
					xtype: 'textfield',
					fieldLabel: 'Mobil',
					name: 'wz_u_mobile'
				},{
					margin: '10 10 10 10',
					xtype: 'fieldset',
					flex: 1,
					title: 'CMS-Funktionen',
					defaultType: 'checkbox', // each item will be a checkbox
					layout: 'anchor',
					defaults: {
						anchor: '50%',
						hideEmptyLabel: false,
						uncheckedValue: 'N',
						inputValue : 'Y'
					},
					items: rolesTagsItems_cms
				}]
			},{
				margin: '10 10 10 10',
				xtype: 'fieldset',
				flex: 1,
				title: 'Plugins',
				defaultType: 'checkbox', // each item will be a checkbox
				layout: 'anchor',
				defaults: {
					anchor: '50%',
					hideEmptyLabel: false,
					uncheckedValue: 'N',
					inputValue : 'Y'
				},
				items: rolesTagsItems_db
			}]
		});

		var gui = Ext.create('Ext.Panel',{
			enabled: true,
			title: 'Benutzereinstellungen',
			layout: 'border',
			region: 'center',
			border: false,
			items: [detail]
		});

		gui.updateUserInfo = function(u_id)
		{
			detail.setDisabled(false);
			user_id = u_id;

			detail.mask('Lade aktuelle Einstellungen...');
			xframe.ajax({
				scope:this,
				url: '/xgo/xplugs/xredaktor/ajax/busers/loadSettings',
				params: {u_id:u_id},
				success: function(json) {
					detail.getForm().reset();
					detail.getForm().setValues(json.d);
					detail.unmask();
				},
				failure: function() {
					detail.unmask();
				}
			});

		}

		this.detailUser = gui;
		return gui;
	},


	getMainPanel : function() {

		var gui = Ext.create('Ext.Panel',{
			layout: 'border',
			border: false,
			items: [this.getUserTree(),this.getSettingsPanel()]
		});

		return gui
	}



}
