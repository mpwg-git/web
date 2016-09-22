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


	getRolesTree: function() {

		var s_id = xredaktor.getInstance().getCurrentSiteId();

		var fields = [
		{name: 'r_name',		text:'Name der Rolle',		type:'string', folder: true, editor: {allowBlank: false,xtype: 'textfield'}},
		{name: 'r_id',			text:'Interne Nummer',	 	type:'int',  hidden: false}
		];


		var tree = xframe_pattern.getInstance().genTree({
			iconsPrefix: 'xr_roles',
			button_del:false,
			button_add:false,
			region:'west',
			split: true,
			title: 'verfügbaren Rollen',
			border:false,
			forceFit:true,
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/busers/loadRoles',
				update: '/xgo/xplugs/xredaktor/ajax/busers/x',
				insert: '/xgo/xplugs/xredaktor/ajax/busers/x',
				remove: '/xgo/xplugs/xredaktor/ajax/busers/x',
				params: {},
				move: 	'/xgo/xplugs/xredaktor/ajax/busers/move',
				pid: 	'r_id',
				fields: fields
			}
		});

		return tree;
	},


	getSettingsPanel: function()
	{

		var tree = this.getRolesTree();



		tree.getView().on('checkchange',function(node,checked){

			tree.mask('Aktiviere Rechte ...');

			var params = {};

			params['active'] 	= (checked) ? '1' : '0';
			params['r_id'] 		= node.data['r_id'];
			params['u_id'] 		= tree.getStore().proxy.extraParams['u_id'];

			xframe.ajax({
				scope:this,
				url: '/xgo/xplugs/xredaktor/ajax/busers/activatePermissions',
				params: params,
				success: function(json) {
					tree.unmask();
				},
				failure: function() {
					tree.unmask();
				}
			});

		},this);


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
			tbar: [{
				text: 'Speichern',
				handler: function() {

					detail.mask('Speichere Einstellungen ...');

					var params = detail.getForm().getValues();

					params['u_id'] 		= tree.getStore().proxy.extraParams['u_id'];
					params['r_id'] 		= tree.getStore().proxy.extraParams['r_id'];

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
			title: 'Spezifische Rechte',
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
				}]
			}]
		});

		var gui = Ext.create('Ext.Panel',{
			enabled: true,
			title: 'Benutzereinstellungen',
			layout: 'border',
			region: 'center',
			border: false,
			items: [tree,detail]
		});

		gui.updateUserInfo = function(u_id)
		{
			tree.getStore().proxy.extraParams['u_id'] = u_id;
			tree.getStore().load();

			var params = {};
			params['u_id'] 		= tree.getStore().proxy.extraParams['u_id'];

			detail.mask('Lade aktuelle Einstellungen...');
			xframe.ajax({
				scope:this,
				url: '/xgo/xplugs/xredaktor/ajax/busers/loadSettings',
				params: params,
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
