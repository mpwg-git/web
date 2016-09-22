var xredaktor_manage_niceurls = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			instance = new xredaktor_manage_niceurls_(config);
			return instance;
		}
	}
})();

var xredaktor_manage_niceurls_ = function(config) {
	this.config = config || {};
};

xredaktor_manage_niceurls_.prototype = {

	getMainPanel : function()
	{
		var me = this;
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
			title:'NICE URL-Mapping',
			region:'center',
			border:false,
			forceFit:true,
			pager:true,
			loadAuto:false,
			split: true,
			button_del:true,
			button_add:true,
			collapseMode: 'mini',
			toolbar_top : [{
				scope:this,
				text:'<b>Datenbank löschen</b>',
				handler : function()
				{
						var mask = xframe.mask(me.urls);
						xframe.ajax({
						scope: me,
						url: '/xgo/xplugs/xredaktor/ajax/niceurls/flushDb',
						params : {
							s_id : me.latest_s_id
						},
						stateless: function(json)
						{
							mask.hide();
						}
					});
				}
			}],
			xstore: {
				load: 	xredaktor.getPath() + '/ajax/niceurls/load',
				update: xredaktor.getPath() + '/ajax/niceurls/update',
				insert: xredaktor.getPath() + '/ajax/niceurls/insert',
				move: 	xredaktor.getPath() + '/ajax/niceurls/move',
				remove: xredaktor.getPath() + '/ajax/niceurls/remove',
				pid: 	'pnu_id',
				fields: [
				{name: 'pnu_id',					text:'Interne Nummer',				type:'int', 	hidden: false},
				{name: 'pnu_nice_url', 				text:'pnu_nice_url',				type:'string',  editor: {allowBlank: false, xtype: 'textfield'}},
				{name: 'pnu_p_id',					text:'pnu_p_id',					type:'int', 	editor: {xtype: 'numberfield',allowDecimals:false}},
				{name: 'pnu_lang', 					text:'pnu_lang',					type:'string', 	editor: {allowBlank: false, xtype: 'textfield'}},
				{name: 'pnu_settings_serialized', 	text:'pnu_settings_serialized',		type:'string',  editor: {allowBlank: false, xtype: 'textfield'}},
				{name: 'pnu_wz_w_id',				text:'pnu_wz_w_id',					type:'int', 	editor: {xtype: 'numberfield',allowDecimals:false}},
				{name: 'pnu_wz_r_id',				text:'pnu_wz_r_id',					type:'int',  	editor: {xtype: 'numberfield',allowDecimals:false}},
				{name: 'pnu_wz_c_id',				text:'pnu_wz_c_id',					type:'int',  	editor: {xtype: 'numberfield',allowDecimals:false}},
				{name: 'pnu_wz_t_id',				text:'pnu_wz_t_id',					type:'int',  	editor: {xtype: 'numberfield',allowDecimals:false}}
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
			this.latest_s_id = s_id;
			xframe.guiSetParams({s_id:s_id},[this.urls],true);
		},this,{delay:1});


		return gui;
	}
};