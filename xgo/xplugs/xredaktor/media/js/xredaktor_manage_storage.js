var xredaktor_manage_storage = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			instance = new xredaktor_manage_storage_(config);
			return instance;
		}
	}
})();

var xredaktor_manage_storage_ = function(config) {
	this.config = config || {};
};

xredaktor_manage_storage_.prototype = {

	getMainPanel : function()
	{
		var me = this;


		var fields = [
		{name: 'sg_id', 				text:'ID', 		type:'int', width: 50},
		{name: 'sg_name', 				text:'Beschreibung',		type:'string', 	editor: {xtype: 'textfield'}},
		{name: 'sg_dirname', 			text:'Verzeichnisname',		type:'string', 	editor: {xtype: 'textfield'}}
		];

		this.sg = xframe_pattern.getInstance().genGrid({
			region:'center',
			border:false,
			pager:true,
			width: 200,
			split: true,
			forceFit:true,
			collapseMode: 'mini',
			title: 'Storages',
			plugin_numLines: false,
			button_add: true,
			button_del: true,
			records_move:false,
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/storage_group/load',
				remove: '/xgo/xplugs/xredaktor/ajax/storage_group/remove',
				update: '/xgo/xplugs/xredaktor/ajax/storage_group/update',
				insert: '/xgo/xplugs/xredaktor/ajax/storage_group/insert',
				move: 	'/xgo/xplugs/xredaktor/ajax/storage_group/move',
				remove: '/xgo/xplugs/xredaktor/ajax/storage_group/remove',
				pid: 	'sg_id',
				fields: fields
			}
		});
		
		/*
		this.deltedNodes = xframe_pattern.getInstance().genGrid({
		region:'center',
		border:false,
		pager:true,
		split: true,
		forceFit:true,
		collapseMode: 'mini',
		title: 'Gelöschte Elemente',
		plugin_numLines: false,
		button_add: true,
		button_del: true,
		records_move:false,
		xstore: {
		load: 	'/xgo/xplugs/xredaktor/ajax/storage_group_deleted/load',
		remove: '/xgo/xplugs/xredaktor/ajax/storage_group_deleted/remove',
		update: '/xgo/xplugs/xredaktor/ajax/storage_group_deleted/update',
		insert: '/xgo/xplugs/xredaktor/ajax/storage_group_deleted/insert',
		move: 	'/xgo/xplugs/xredaktor/ajax/storage_group_deleted/move',
		remove: '/xgo/xplugs/xredaktor/ajax/storage_group_deleted/remove',
		pid: 	'sg_id',
		fields: [
		{name: 's_id', 					text:'Interne Nummer', 		type:'int'},
		{name: 's_dir', 				text:'Typ',					type:'string', 	xtype: 'renderer', store : [['Y','Verzeichnis'],['N','Datei']]},
		{name: 's_del', 				text:'Gelöscht Status',		type:'string', 	xtype: 'combo', store : [['Y','Gelöscht'],['N','Wiederherstellen']]},
		{name: 's_name', 				text:'Name',				type:'string', 	editor: {xtype: 'textfield'}},
		{name: 's_fileSizeBytesHuman', 	text:'Größe',				type:'string', 	editor: {xtype: 'textfield'}},
		{name: 's_mimeType', 			text:'Mime',				type:'string', 	editor: {xtype: 'textfield'}},
		{name: 's_del_soft', 			text:'Löschzeitpunkt',		type:'string', 	editor: {xtype: 'textfield'}},
		{name: 's_onDiskDel', 			text:'Lokation',			type:'string', 	editor: {xtype: 'textfield'}}
		]
		}
		});


		this.sg.on('selectionchange',function(v,sel){
		this.deltedNodes.setDisabled((sel.length==0));
		if(sel.length!=1)return;
		this.deltedNodes.getStore().proxy.extraParams['ss'] = sel[0].data.sg_id;
		this.deltedNodes.getStore().load();
		},this);
		*/
		
		
		var gui = Ext.create('Ext.Panel',{
			border:false,
			layout:'border',
			items:[this.sg],
			listeners:{
				afterrender:function(){
					me.sg.store.load();
				//	me.deltedNodes.store.load();
				}
			}
		});

		return gui;
	}
};