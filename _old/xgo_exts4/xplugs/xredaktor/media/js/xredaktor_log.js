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
