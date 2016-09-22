var xredaktor_log = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xredaktor_log_(config);
			}
			return instance;
		}
	}
})();

var xredaktor_log_ = function(config) {
	this.config = config || {};
};

xredaktor_log_.prototype = {


	genPanelForInfoPool: function(a_id)
	{
		var gui = this.getPanelFilter({
			buh_wz_id: a_id,
			buh_scope: 'RECORDS'
		});

		gui.changeWizard = function(a_id, a_type) {
			gui.getStore().proxy.extraParams['filter'] = Ext.encode({
				buh_wz_id: a_id,
				buh_scope: 'RECORDS'
			});
			gui.getStore().load();
		};

		return gui;
	},

	genPanelForInfoPoolRecord: function(a_id,r_id)
	{
		var gui = this.getPanelFilter({
			buh_wz_id: a_id,
			buh_scope: 'RECORDS',
			buh_r_id: r_id
		},{
			buh_r_id: true
		});

		gui.changeWizard = function(a_id, a_type) {
			gui.getStore().proxy.extraParams['filter'] = Ext.encode({
				buh_wz_id: a_id,
				buh_scope: 'RECORDS'
			});
			gui.getStore().load();
		};

		return gui;
	},

	genPanelForAtom: function(a_id, a_type)
	{
		var gui = this.getPanelFilter({
			buh_wz_id: a_id,
			buh_scope: 'AS'
		});

		gui.loadAtom = function(a_id, a_type) {
			gui.getStore().proxy.extraParams['filter'] = Ext.encode({
				buh_wz_id: a_id,
				buh_scope: 'AS'
			});
			gui.getStore().load();
		};

		return gui;
	},


	getPanelFilter: function(filter,hiddenFields)
	{
		
		if (typeof hiddenFields == 'undefined')
		{
			var hiddenFields = {};
		}

		var fields = [

		{name: 'buh_created',		text:'TS',			type:'string',	width:120,	hidden: (hiddenFields['buh_created'])},
		{name: 'buh_type',			text:'TYP',			type:'string',	width:70,	hidden: (hiddenFields['buh_type'])},
		{name: 'buh_createdBy',		text:'UI-ID',		type:'int',		width:60,	hidden: (hiddenFields['buh_createdBy'])},
		{name: 'buh_r_id',			text:'R-ID',		type:'int',		width:60,	hidden: (hiddenFields['buh_r_id'])},
		
		{name: 'buh_diff',			text:'DIFF',		type:'string', 	renderer:this.loginfo, scope:this},
		{name: 'buh_human',			text:'DESC',		type:'string',	hidden: (hiddenFields['buh_wz_id']) || true,width: 300},

		{name: 'buh_wz_id',			text:'W-ID',		type:'int',		hidden: (hiddenFields['buh_wz_id']) || true},
		{name: 'buh_wz_name',		text:'W-NAME',		type:'string',	hidden: (hiddenFields['buh_wz_id']) || true},
		{name: 'buh_table',			text:'TABLE',		type:'string',	hidden: (hiddenFields['buh_wz_id']) || true},
		{name: 'buh_id',			text:'ID',	 		type:'int',		hidden: (hiddenFields['buh_wz_id']) || true},
		];

		var grid = xframe_pattern.getInstance().genGrid({
			region:'center',
			split: true,
			title: 'Logfile',
			border:false,
			forceFit:true,
			pager: true,
			xstore: {
				initSort: '[{"property":"buh_id","direction":"DESC"}]',
				load: 	'/xgo/xplugs/xredaktor/ajax/logs/load',
				update: '/xgo/xplugs/xredaktor/ajax/logs/update',
				insert: '/xgo/xplugs/xredaktor/ajax/logs/insert',
				remove: '/xgo/xplugs/xredaktor/ajax/logs/remove',
				params: {
					filter: Ext.encode(filter)
				},
				move: 	'/xgo/xplugs/xredaktor/ajax/logs/move',
				pid: 	'buh_id',
				fields: fields
			}
		});

		grid.on('afterrender',function(){
			grid.getStore().load();
		},this,{buffer:1})


		return grid;
	},

	renderer_kickHtml: function(value)
	{
		value = "<div>"+value+"<div>";
		return $$(value).text();
	},

	loginfo: function(buh_diff)
	{
		var w = Ext.decode(buh_diff,true);
		var html = [];

		var line = "<tr><td><b>Field</b></td><td><b>Old</b></td><td><b>New</b></td></tr>";
		html.push(line);
		var cnt = 0;

		Ext.iterate(w,function(k,v){
			cnt++;
			var line = "<tr><td style='border-top: 1px solid gray;' >"+k+"</td><td style='border-top: 1px solid gray;' >"+this.renderer_kickHtml(v.old)+"</td><td style='border-top: 1px solid gray;' >"+this.renderer_kickHtml(v['new'])+"</td></tr>";
			html.push(line);
		},this);

		if (cnt == 0)
		{
			return "-";
		}

		return "<table style='border: 1px solid black;'>"+html.join('')+"</table>";
	},

	getMainPanel: function() {

		var fields = [
		{name: 'buh_id',			text:'Interne Nummer',	 	type:'int'},
		{name: 'buh_created',		text:'Zeitpunkt',			type:'string'},
		{name: 'buh_type',			text:'Typ',					type:'string'},
		{name: 'buh_createdBy',		text:'Benutzer ID',			type:'int'},
		{name: 'buh_wz_id',			text:'Wizard ID',			type:'int'},
		{name: 'buh_wz_name',		text:'Wizard Name',			type:'string'},
		{name: 'buh_r_id',			text:'Datensatz ID',		type:'int'},
		{name: 'buh_table',			text:'Datenbanktabelle',	type:'string'},
		{name: 'buh_human',			text:'Beschreibung',		type:'string'}
		];

		var grid = xframe_pattern.getInstance().genGrid({
			region:'center',
			split: true,
			title: 'Logfile',
			border:false,
			forceFit:true,
			pager: true,
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/logs/load',
				update: '/xgo/xplugs/xredaktor/ajax/logs/update',
				insert: '/xgo/xplugs/xredaktor/ajax/logs/insert',
				remove: '/xgo/xplugs/xredaktor/ajax/logs/remove',
				params: {},
				move: 	'/xgo/xplugs/xredaktor/ajax/logs/move',
				pid: 	'buh_id',
				fields: fields
			}
		});

		grid.getStore().load();

		return grid;
	}
}
