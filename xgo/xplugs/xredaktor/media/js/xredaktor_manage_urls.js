var xredaktor_manage_urls = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			instance = new xredaktor_manage_urls_(config);
			return instance;
		}
	}
})();

var xredaktor_manage_urls_ = function(config) {
	this.config = config || {};
};

xredaktor_manage_urls_.prototype = {

	getMainPanel : function()
	{
		this.sites = xframe_pattern.getInstance().genGrid({
			region:'west',
			border:false,
			title:'Url-Management',
			split: true,
			forceFit:true,
			loadAuto:true,
			width:200,
			collapseMode: 'mini',
			xstore: {
				load: 	xredaktor.getPath() + '/ajax/sites/load',
				update: xredaktor.getPath() + '/ajax/sites/update',
				insert: xredaktor.getPath() + '/ajax/sites/insert',
				move: 	xredaktor.getPath() + '/ajax/sites/move',
				pid: 	's_id',
				fields: [
				{name: 's_id',				text:'Interne Nummer',				type:'int', 	hidden: false},
				{name: 's_name', 			text:'Name',						type:'string',  editor: {allowBlank: false, xtype: 'textfield'}},
				{name: 's_suffix', 			text:'End-Segment Suffix',			type:'string',  editor: {allowBlank: false, xtype: 'textfield'}}
				]
			}
		});

		this.urls = xframe_pattern.getInstance().genGrid({
			disabled:true,
			title:'Static URL-Mapping',
			region:'center',
			border:false,
			forceFit:true,
			pager:true,
			loadAuto:false,
			split: true,
			button_del:true,
			button_add:true,
			collapseMode: 'mini',
			toolbar_top:[{
				text:'Cache über alle Seiten neu erstellen',
				scope:this,
				handler:function(){
					
				}
			}],
			xstore: {
				load: 	xredaktor.getPath() + '/ajax/pnm/load',
				update: xredaktor.getPath() + '/ajax/pnm/update',
				insert: xredaktor.getPath() + '/ajax/pnm/insert',
				move: 	xredaktor.getPath() + '/ajax/pnm/move',
				remove: xredaktor.getPath() + '/ajax/pnm/remove',
				pid: 	'pnm_id',
				fields: [
				{name: 'pnm_id',			text:'Interne Nummer',	type:'int', 	hidden: false},
				{name: 'pnm_active', 		text:'Aktiv',			type:'string',  xtype: 'combo',  store : [['Y','JA'],['N','NEIN']]},
				{name: 'pnm_http_code',		text:'HTTP-CODE',		type:'int', 	xtype: 'combo',  store : [['301','301'],['410','410'],['410','410']]},
				{name: 'pnm_url_match', 	text:'Match',			type:'string', 	editor: {allowBlank: false, xtype: 'textfield'}},
				{name: 'pnm_url_transport', text:'Transport',		type:'string',  editor: {allowBlank: false, xtype: 'textfield'}},
				{name: 'pnm_name',			text:'Info',			type:'string',  editor: {allowBlank: true, 	xtype: 'textfield'}}
				]
			}
		});

		var gui = Ext.create('Ext.Panel',{
			border:false,
			layout:'border',
			items:[this.sites,this.urls]
		});


		this.sites.on('selectionchange',function(v,sel){
			this.urls.setDisabled(sel.length != 1);
			if (sel.length == 0) return;
			var s_id = sel[0].data.s_id;
			xframe.guiSetParams({s_id:s_id},[this.urls],true);
		},this,{delay:1});


		return gui;
	}
};