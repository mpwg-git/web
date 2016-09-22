var xredaktor_translation = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xredaktor_translation_(config);
			}
			return instance;
		}
	}
})();

var xredaktor_translation_ = function(config) {
	this.config = config || {};
};

xredaktor_translation_.prototype = {


	getMainPanel_FE_loaded: function()
	{

		var fields = [
		{name: 'fet_id', 			text:xframe.lang('Interne Nummer'), 		type:'int'},
		{name: 'fet_tag', 			text:xframe.lang('Tag-Name'),			type:'string', 	editor: {xtype: 'textfield'}}
		];

		/*
		var fe_langs = xredaktor.getInstance().getLanguageConfigFE_ALL();
		Ext.each(fe_langs,function(cfg){
		var tableName 	= cfg.fel_ISO.toLowerCase();
		var hidden		= (cfg.fel_online == 'N');
		fields.push({name: 'fet_t_'+tableName, 	text:cfg.fel_name, hidden:hidden,	type:'string', width: 200, editor: {xtype: 'textfield'}});
		},this);
		*/

		try{
			var fe_langs = xredaktor.getInstance().getCurrentSiteFeLangs();
			Ext.each(fe_langs,function(cfg){
				var tableName 	= cfg.fel_ISO.toLowerCase();
				fields.push({name: 'fet_t_'+tableName, 	text:cfg.fel_name, type:'string', width: 200, editor: {xtype: 'textfield'}});
			},this);
		} catch (e)
		{
			console.info('error',e);
		}

		this.grid = xframe_pattern.getInstance().genGrid({
			region:'center',
			border:false,
			pager:true,
			split: true,
			forceFit:true,
			collapseMode: 'mini',
			title: xframe.lang('FE-Übersetzungen'),
			search: true,
			plugin_numLines: false,
			button_add: true,
			button_del: true,
			button_import: true,
			button_export: true,
			records_move:false,
			xstore: {
				csv_import: '/xgo/xplugs/xredaktor/ajax/fe_tags/csv_import',
				csv_export: '/xgo/xplugs/xredaktor/ajax/fe_tags/csv_export',

				load: 	'/xgo/xplugs/xredaktor/ajax/fe_tags/load?fet_s_id='+xredaktor.getInstance().getCurrentSiteId(),
				update: '/xgo/xplugs/xredaktor/ajax/fe_tags/update',
				insert: '/xgo/xplugs/xredaktor/ajax/fe_tags/insert?fet_s_id='+xredaktor.getInstance().getCurrentSiteId(),
				move: 	'/xgo/xplugs/xredaktor/ajax/fe_tags/move',
				remove: '/xgo/xplugs/xredaktor/ajax/fe_tags/remove',
				pid: 	'fet_id',
				fields: fields
			}
		});
		this.grid.store.load();


		return this.grid;
	},

	getMainPanel_FE : function()
	{
		var holder = xframe.holder({
			scope: this,
			msg: xframe.lang('Lade Serverkonfiguration...'),
			fetch_scope : xredaktor.getInstance(),
			fetch: function() {
				xredaktor.getInstance().loadAllConfigs(holder.trigger,this)
			},
			trigger_scope: this,
			trigger: function()
			{
				return this.getMainPanel_FE_loaded();
			},
			panelCfg : {
				region: 'center',
				layout: 'fit'
			}
		});
		return holder;
	},




	getMainPanel_BE_loaded: function()
	{
		var be_langs = xredaktor.getInstance().getLanguageConfigBE();

		var fields = [
		{name: 'bet_id', 			text:xframe.lang('Interne Nummer'), 	type:'int', width:20},
		{name: 'bet_type', 			text:xframe.lang('Modus'), width:20,	type:'string', 	xtype: 'combo', 	store : [['AUTO',xframe.lang('Automatisch')],['MANUAL',xframe.lang('Manuell')]]},
		{name: 'bet_found',  		width:20,								text:xframe.lang('Gefunden'),			type:'string', 	xtype: 'renderer', 	store : [['Y',xframe.lang('Ja')],['N',xframe.lang('Nein')]]},
		{name: 'bet_foundFile',		text:xframe.lang('Datein'),				type:'string',width: 30,},
		{name: 'bet_exportAlways', 	width:20 ,	text:xframe.lang('Immer Exportieren'),	type:'string', 	xtype: 'combo', 	store : [['Y',xframe.lang('Ja')],['N',xframe.lang('Nein')]]},
		{name: 'bet_tag', 			text:xframe.lang('Tag-Name'),			type:'string', 	editor: {xtype: 'textfield'}, width: 150}
		];

		Ext.each(be_langs,function(cfg){
			var tableName 	= cfg.bel_ISO.toLowerCase();
			var hidden		= (cfg.bel_online == 'N');
			fields.push({name: 'bet_t_'+tableName, 	text:cfg.bel_name, hidden:hidden,	type:'string', width: 200, editor: {xtype: 'textfield'}});
		},this);

		this.grid = xframe_pattern.getInstance().genGrid({
			region:'center',
			border:false,
			pager:true,
			split: true,
			search: true,
			forceFit:true,
			collapseMode: 'mini',
			title: xframe.lang('SYS-Übersetzungen'),
			plugin_numLines: false,
			button_add: true,
			button_del: true,
			button_import: true,
			button_export: true,
			records_move:false,
			xstore: {

				csv_import: 	'/xgo/xplugs/xredaktor/ajax/sys_tags/csv_import',
				csv_export: 	'/xgo/xplugs/xredaktor/ajax/sys_tags/csv_export',

				load: 	'/xgo/xplugs/xredaktor/ajax/sys_tags/load',
				remove: '/xgo/xplugs/xredaktor/ajax/sys_tags/remove',
				update: '/xgo/xplugs/xredaktor/ajax/sys_tags/update',
				insert: '/xgo/xplugs/xredaktor/ajax/sys_tags/insert',
				move: 	'/xgo/xplugs/xredaktor/ajax/sys_tags/move',
				remove: '/xgo/xplugs/xredaktor/ajax/sys_tags/remove',
				pid: 	'bet_id',
				fields: fields
			}
		});
		this.grid.store.load();


		return this.grid;
	},

	getMainPanel_BE : function()
	{
		var holder = xframe.holder({
			scope: this,
			msg: xframe.lang('Lade Serverkonfiguration...'),
			fetch_scope : xredaktor.getInstance(),
			fetch: function() {
				xredaktor.getInstance().loadAllConfigs(holder.trigger,this)
			},
			trigger_scope: this,
			trigger: function()
			{
				return this.getMainPanel_BE_loaded();
			},
			panelCfg : {
				region: 'center',
				layout: 'fit'
			}
		});
		return holder;
	},

	getMainPanel_A : function() {

		var be_langs = xredaktor.getInstance().getLanguageConfigBE();

		var fields = [
		{name: 'a_id', 				text:xframe.lang('Interne Nummer'), 		type:'int', width:20},
		{name: 'a_type', 			text:xframe.lang('Tag-Type'),				type:'string'},
		{name: 'a_name', 			text:xframe.lang('DE'),				type:'string', 	editor: {xtype: 'textfield'}}
		];

		Ext.each(be_langs,function(cfg){
			var tableName 	= cfg.bel_ISO.toLowerCase();
			var hidden		= (cfg.bel_online == 'N');
			if (tableName == 'de') return;
			
			fields.push({name: 'a_name_'+tableName, 	text:cfg.bel_name, hidden:hidden,	type:'string', width: 200, editor: {xtype: 'textfield'}});
		},this);

		var grid = xframe_pattern.getInstance().genGrid({
			region:'center',
			border:false,
			pager:true,
			split: true,
			search: true,
			forceFit:true,
			collapseMode: 'mini',
			title: xframe.lang('Baustein Übersetzungen'),
			plugin_numLines: false,
			button_add: false,
			button_del: false,
			records_move:false,
			button_import: true,
			button_export: true,
			xstore: {

				csv_import: 	'/xgo/xplugs/xredaktor/ajax/a_tags/csv_import',
				csv_export: 	'/xgo/xplugs/xredaktor/ajax/a_tags/csv_export',


				load: 	'/xgo/xplugs/xredaktor/ajax/a_tags/load',
				remove: '/xgo/xplugs/xredaktor/ajax/a_tags/remove',
				update: '/xgo/xplugs/xredaktor/ajax/a_tags/update',
				insert: '/xgo/xplugs/xredaktor/ajax/a_tags/insert',
				move: 	'/xgo/xplugs/xredaktor/ajax/a_tags/move',
				remove: '/xgo/xplugs/xredaktor/ajax/a_tags/remove',
				pid: 	'a_id',
				fields: fields
			}
		});

		grid.getStore().load();

		return grid;
	},

	getMainPanel_AS : function() {
		var be_langs = xredaktor.getInstance().getLanguageConfigBE();

		var fields = [
		{name: 'as_id', 			text:xframe.lang('Interne Nummer'), 		type:'int', width:20},
		{name: 'as_a_id', 			text:xframe.lang('Baustein ID'),	 		type:'int', width:20},
		{name: 'as_name', 			text:xframe.lang('Tag-Name'),				type:'string', 	editor: {xtype: 'textfield'}}
		];

		Ext.each(be_langs,function(cfg){
			var tableName 	= cfg.bel_ISO.toLowerCase();
			var hidden		= (cfg.bel_online == 'N');
			if (tableName == 'de') {
				fields.push({name: 'as_label', 	text:xframe.lang('Tag-Name')+' '+cfg.bel_name, hidden:hidden,	type:'string', width: 200, editor: {xtype: 'textfield'}});
			} else
			{
				fields.push({name: 'as_name_'+tableName, 	text:xframe.lang('Tag-Name')+' '+cfg.bel_name, hidden:hidden,	type:'string', width: 200, editor: {xtype: 'textfield'}});
			}
		},this);

		Ext.each(be_langs,function(cfg){
			var tableName 	= cfg.bel_ISO.toLowerCase();
			var hidden		= (cfg.bel_online == 'N');
			if (tableName == 'de') {
				fields.push({name: 'as_group', 			text:xframe.lang('Gruppen-Name')+' '+cfg.bel_name,				type:'string', 	editor: {xtype: 'textfield'}});
			} else
			{
				fields.push({name: 'as_group_'+tableName, 	text:xframe.lang('Gruppen-Name')+' '+cfg.bel_name, hidden:hidden,	type:'string', width: 200, editor: {xtype: 'textfield'}});
			}
		},this);

		
		
		var grid = xframe_pattern.getInstance().genGrid({
			region:'center',
			border:false,
			pager:true,
			split: true,
			search: true,
			forceFit:true,
			collapseMode: 'mini',
			title: xframe.lang('Baustein Einstellungen Übersetzungen'),
			plugin_numLines: false,
			button_add: false,
			button_del: false,
			records_move:false,
			button_import: true,
			button_export: true,
			xstore: {

				csv_import: 	'/xgo/xplugs/xredaktor/ajax/as_tags/csv_import',
				csv_export: 	'/xgo/xplugs/xredaktor/ajax/as_tags/csv_export',

				load: 	'/xgo/xplugs/xredaktor/ajax/as_tags/load',
				remove: '/xgo/xplugs/xredaktor/ajax/as_tags/remove',
				update: '/xgo/xplugs/xredaktor/ajax/as_tags/update',
				insert: '/xgo/xplugs/xredaktor/ajax/as_tags/insert',
				move: 	'/xgo/xplugs/xredaktor/ajax/as_tags/move',
				remove: '/xgo/xplugs/xredaktor/ajax/as_tags/remove',
				pid: 	'as_id',
				fields: fields
			}
		});

		grid.getStore().load();

		return grid;
	}

};