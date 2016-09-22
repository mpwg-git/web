var xredaktor_manage_faces = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			instance = new xredaktor_manage_faces_(config);
			return instance;
		}
	}
})();

var xredaktor_manage_faces_ = function(config) {
	this.config = config || {};
};

xredaktor_manage_faces_.prototype = {

	getMainPanel : function()
	{
		var me = this;
		this.faces = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			title:'System - Faces',
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/faces/load',
				update: '/xgo/xplugs/xredaktor/ajax/faces/update',
				insert: '/xgo/xplugs/xredaktor/ajax/faces/insert',
				move: 	'/xgo/xplugs/xredaktor/ajax/faces/move',
				remove:	'/xgo/xplugs/xredaktor/ajax/faces/remove',
				pid: 	'f_id',
				fields: [
				{name: 'f_id',			text:'Interne Nummer',	type:'int'},
				{name: 'f_name', 		text:'Name',			type:'string', 	editor: {allowBlank: false, xtype: 'textfield'}},
				//{name: 'f_desc', 		text:'Beschreibung',	type:'string', 	editor: {allowBlank: false, xtype: 'textfield'}},
				{name: 'f_online', 		text:'Verfügbar',		type:'string', 	xtype: 'combo', store : [['Y','Ja'],['N','Nein']]}
				//{name: 'f_origin', 		text:'Typ',				type:'string', 	xtype: 'combo', store : [['CMS','CMS'],['APP','APP'],['CORE','CORE']]},
				//{name: 'f_origin_vid', 	text:'APP-VID',			type:'int',		editor: true}
				]
			}
		});

		var gui = Ext.create('Ext.Panel',{
			border:false,
			layout:'border',
			items:[this.faces],
			listeners:{
				afterrender: function(){
					me.faces.getStore().load();
				}
			}
		});

		return gui;
	}
};