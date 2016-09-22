var xredaktor_manage_langs = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			instance = new xredaktor_manage_langs_(config);
			return instance;
		}
	}
})();

var xredaktor_manage_langs_ = function(config) {
	this.config = config || {};
};

xredaktor_manage_langs_.prototype = {

	getMainPanel : function()
	{
		var me = this;
		this.langs_be = xframe_pattern.getInstance().genGrid({
			region:'west',
			forceFit:true,
			border:false,
			title:'Backendsprachen',
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/core_lang_be/load',
				update: '/xgo/xplugs/xredaktor/ajax/core_lang_be/update',
				insert: '/xgo/xplugs/xredaktor/ajax/core_lang_be/insert',
				move: 	'/xgo/xplugs/xredaktor/ajax/core_lang_be/move',
				remove:	'/xgo/xplugs/xredaktor/ajax/core_lang_be/remove',
				pid: 	'bel_id',
				fields: [
				{name: 'bel_id',			text:'Interne Nummer',	type:'int'},
				{name: 'bel_online', 		text:'Verfügbar',			type:'string', 	xtype: 'combo', store : [['Y','Ja'],['N','Nein']]},
				{name: 'bel_ISO', 			text:'Kurzform',		type:'string',  editor: {allowBlank: false, xtype: 'textfield'}},
				{name: 'bel_name', 			text:'Ausgeschrieben',	type:'string', 	editor: {allowBlank: false, xtype: 'textfield'}}
				]
			}
		});

		this.langs_fe = xframe_pattern.getInstance().genGrid({
			title:'Frontendsprachen',
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			button_del:true,
			button_add:true,
			collapseMode: 'mini',
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/core_lang_fe/load',
				update: '/xgo/xplugs/xredaktor/ajax/core_lang_fe/update',
				insert: '/xgo/xplugs/xredaktor/ajax/core_lang_fe/insert',
				move: 	'/xgo/xplugs/xredaktor/ajax/core_lang_fe/move',
				remove:	'/xgo/xplugs/xredaktor/ajax/core_lang_fe/remove',
				pid: 	'fel_id',
				fields: [
				{name: 'fel_id',			text:'Interne Nummer',	type:'int'},
				{name: 'fel_online', 		text:'Verfügbar',			type:'string', 	xtype: 'combo', store : [['Y','Ja'],['N','Nein']]},
				{name: 'fel_ISO', 			text:'Kurzform',		type:'string',  editor: {allowBlank: false, xtype: 'textfield'}},
				{name: 'fel_name', 			text:'Ausgeschrieben',	type:'string', 	editor: {allowBlank: false, xtype: 'textfield'}}
				]
			}
		});

		var gui = Ext.create('Ext.Panel',{
			border:false,
			layout:'border',
			items:[this.langs_be,this.langs_fe],
			listeners:{
				afterrender: function(){
					me.langs_be.getStore().load();
					me.langs_fe.getStore().load();
				}
			}
		});

		return gui;
	}
};