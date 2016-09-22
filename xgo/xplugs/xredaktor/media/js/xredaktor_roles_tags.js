var xredaktor_roles_tags = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xredaktor_roles_tags_(config);
			}
			return instance;
		}
	}
})();

var xredaktor_roles_tags_ = function(config) {
	this.config = config || {};
};

xredaktor_roles_tags_.prototype = {


	getRolesTree: function() {

		var s_id = xredaktor.getInstance().getCurrentSiteId();

		var fields = [
		{name: 'rt_name',			text:'Name',				type:'string', folder: true, editor: {allowBlank: false,xtype: 'textfield'}},
		{name: 'rt_name_human',		text:'Title',				type:'string', folder: false, editor: {allowBlank: false,xtype: 'textfield'}},
		{name: 'rt_id',				text:'Interne Nummer',	 	type:'int',  hidden: false}
		];


		this.tree = xframe_pattern.getInstance().genTree({
			iconsPrefix: 'xr_roles',
			button_del:true,
			button_add:true,
			region:'center',
			split: true,
			title: 'Rollen-Tags Übersicht',
			border:false,
			forceFit:true,
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/rolesTages/load',
				update: '/xgo/xplugs/xredaktor/ajax/rolesTages/update',
				insert: '/xgo/xplugs/xredaktor/ajax/rolesTages/insert',
				remove: '/xgo/xplugs/xredaktor/ajax/rolesTages/remove',
				params: {rt_s_id:s_id},
				move: 	'/xgo/xplugs/xredaktor/ajax/rolesTages/move',
				pid: 	'rt_id',
				fields: fields
			}
		});

		this.tree.on('selectionchange_______________',function(view,selections,options){
			if (selections.length != 1)
			{
				this.settingsPanel.setDisabled(true);
				return;
			}

			this.settingsPanel.setDisabled(false);

			var r_id = selections[0].data.r_id;

			Ext.each(this.defPanels,function(p){
				p._tree.getStore().proxy.extraParams['rt_id'] = r_id;
				p._tree.getStore().load();
			},this);


		},this);

		return this.tree;
	},


	genericPermissionsPanel: function(cfg)
	{

		var s_id = xredaktor.getInstance().getCurrentSiteId();


		var fields = [
		{name: cfg.fieldsPrefix+'name',			text:'Name der Seite',		type:'string', folder: true, editor: {allowBlank: false,xtype: 'textfield'}},
		{name: cfg.fieldsPrefix+'id',			text:'Interne Nummer',	 	type:'int',  hidden: false}
		];

		var save_target = -1;
		var params = {tag:cfg.tag};
		params[cfg.fieldsPrefix+'s_id'] = s_id;
		params['ge_s_id'] = s_id;


		var tree = xframe_pattern.getInstance().genTree({
			toolbar_top2: [{
				iconCls: 'xf_expand',
				text: 'Alle aufklappen',
				scope: this,
				handler: function(){
					tree.mask("bitte warten...");
					tree.expandAll(function(){
						tree.unmask();
					},this);
				}
			}],
			xtype: 'check-tree',
			iconsPrefix: cfg.iconCls,
			button_del:false,
			button_add:false,
			region:'west',
			split: true,
			title: 'Daten',
			border:false,
			//rootVisible:true,
			forceFit:true,
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/rolesX/load',
				update: '/xgo/xplugs/xredaktor/ajax/rolesX/update',
				insert: '/xgo/xplugs/xredaktor/ajax/rolesX/insert',
				remove: '/xgo/xplugs/xredaktor/ajax/rolesX/remove',
				params: params,
				move: 	'/xgo/xplugs/xredaktor/ajax/rolesX/move',
				pid: 	cfg.fieldsPrefix+'id',
				fields: fields
			}
		});


		tree.getView().on('checkchange',function(node,checked){

			tree.mask('Aktiviere Rechte ...');

			var params = tree.getStore().proxy.extraParams;

			params['active'] = (checked) ? '1' : '0';
			params['target'] = node.data[cfg.fieldsPrefix+'id'];

			xframe.ajax({
				scope:this,
				url: '/xgo/xplugs/xredaktor/ajax/rolesX/activatePermissions',
				params: params,
				success: function(json) {
					tree.unmask();
				},
				failure: function() {
					tree.unmask();
				}
			});

		},this);

		var detail = Ext.create('Ext.form.Panel',{
			disabled: true,
			tbar: [{
				text: 'Speichern',
				handler: function() {

					detail.mask('Speichere Einstellungen ...');

					var params = detail.getForm().getValues();
					params['target'] 	= save_target;
					params['tag'] 		= tree.getStore().proxy.extraParams['tag'];
					params['r_id'] 		= tree.getStore().proxy.extraParams['r_id'];
					params['ge_s_id'] 	= tree.getStore().proxy.extraParams['ge_s_id'];

					xframe.ajax({
						scope:this,
						url: '/xgo/xplugs/xredaktor/ajax/rolesX/savePermissions',
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
			title: 'Rechte',
			xtype: 'container',
			layout: 'hbox',

			items: [{
				margin: '10 10 10 10',
				xtype: 'fieldset',
				flex: 1,
				title: 'Rechte',
				defaultType: 'checkbox', // each item will be a checkbox
				layout: 'anchor',
				defaults: {
					anchor: '100%',
					hideEmptyLabel: false,
					uncheckedValue: 'N',
					inputValue : 'Y'
				},
				items: [{
					fieldLabel: 'Aktionen',
					boxLabel: 'Lesen',
					name: 'rs_x_read'
				},{
					boxLabel: 'Erstellen',
					name: 'rs_x_insert'
				}, {
					boxLabel: 'Aktualisieren',
					name: 'rs_x_update'
				}, {
					boxLabel: 'Löschen',
					name: 'rs_x_delete'
				}]
			},{
				margin: '10 10 10 10',
				hidden: !cfg.recursive,
				xtype: 'fieldset',
				flex: 1,
				title: 'Vererbung',
				defaultType: 'checkbox', // each item will be a checkbox
				layout: 'anchor',
				defaults: {
					anchor: '100%',
					hideEmptyLabel: false,
					uncheckedValue: 'N',
					inputValue : 'Y'
				},
				items: [{
					boxLabel: 'Rekursiv vererben',
					name: 'rs_x_recursive'
				}]
			}]
		});


		tree.on('selectionchange',function(view,selections,options){
			if (selections.length != 1)
			{
				detail.setDisabled(true);
				return;
			}

			detail.setDisabled(false);

			save_target = selections[0].data[cfg.fieldsPrefix+'id']

			var params = {};
			params['target'] 	= save_target;
			params['ge_s_id'] 	= tree.getStore().proxy.extraParams['ge_s_id'];
			params['tag'] 		= tree.getStore().proxy.extraParams['tag'];
			params['r_id'] 		= tree.getStore().proxy.extraParams['r_id'];

			detail.mask('Lade aktuelle Einstellungen...');
			xframe.ajax({
				scope:this,
				url: '/xgo/xplugs/xredaktor/ajax/rolesX/loadPermissions',
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




		},this);

		var gui = Ext.create('Ext.Panel',{
			title: cfg.title,
			layout: 'border',
			border: false,
			items: [tree,detail]
		});


		gui._tree = tree;

		return gui;
	},


	getSettingsPanel:function() {


		var infopool = this.genericPermissionsPanel({
			title: 'Infopool',
			recursive: false,
			tag: 'infopool',
			fieldsPrefix: 'a_',
			iconCls: 'xr_wizards'
		});

		var fa = this.genericPermissionsPanel({
			title: 'Filearchiv',
			recursive: true,
			tag: 'fa',
			fieldsPrefix: 's_',
			iconCls: false
		});

		var pages = this.genericPermissionsPanel({
			title: 'Seiten',
			recursive: true,
			tag: 'pages',
			fieldsPrefix: 'p_',
			iconCls: 'xr_pages'
		});

		var frames = this.genericPermissionsPanel({
			title: 'Seitenelemente',
			recursive: false,
			tag: 'frames',
			fieldsPrefix: 'a_',
			iconCls: 'xr_frames'
		});

		var atoms = this.genericPermissionsPanel({
			title: 'Bausteine',
			recursive: false,
			tag: 'atoms',
			fieldsPrefix: 'a_',
			iconCls: 'xr_atoms'
		});

		this.defPanels = [infopool,fa,pages,frames,atoms];

		var panel = Ext.create('Ext.tab.Panel', {
			disabled: true,
			title: 'Rolleneinstellungen A0',
			border: false,
			region: 'center',
			items: this.defPanels
		});

		this.settingsPanel = panel;

		return panel;
	},

	getMainPanel : function() {

		var gui = Ext.create('Ext.Panel',{
			layout: 'border',
			border: false,
			items: [this.getRolesTree()]
		});

		return gui
	}

}
