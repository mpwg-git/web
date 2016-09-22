var xredaktor_timemachine = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			var instance = new xredaktor_timemachine_(config);
			return instance;
		}
	}
})();

var xredaktor_timemachine_ = function(config) {
	this.config = config || {};
};

xredaktor_timemachine_.prototype = {

	getStoreOfTimemachine : function(tm_s_id)
	{
		if (typeof tm_s_id == "undefined") tm_s_id = xredaktor.getInstance().getCurrentSiteId();

		var store = xframe.getStoreByConfig({
			rootTextName: 'Timemachine',
			fields: [
			{name: 'tm_name',	type:'string', folder: true},
			{name: 'tm_id',		type:'int'}
			],
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/timemachine/load',
				update: '/xgo/xplugs/xredaktor/ajax/timemachine/update',
				insert: '/xgo/xplugs/xredaktor/ajax/timemachine/insert',
				remove: '/xgo/xplugs/xredaktor/ajax/timemachine/remove',
				params: {tm_s_id:tm_s_id},
				pid: 		'tm_id',
				nameField: 	'tm_name'
			}
		});

		return store;
	},
	
	getFlatStore: function(tm_s_id)
	{
		if (typeof tm_s_id == "undefined") tm_s_id = xredaktor.getInstance().getCurrentSiteId();

		var store = xframe.getStoreByConfig({
			rootTextName: 'Timemachine',
			fields: [
			{name: 'tm_name',	type:'string', folder: true},
			{name: 'tm_id',		type:'int'}
			],
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/timemachineFlat/load',
				update: '/xgo/xplugs/xredaktor/ajax/timemachineFlat/update',
				insert: '/xgo/xplugs/xredaktor/ajax/timemachineFlat/insert',
				remove: '/xgo/xplugs/xredaktor/ajax/timemachineFlat/remove',
				params: {tm_s_id:tm_s_id},
				pid: 		'tm_id',
				nameField: 	'tm_name'
			}
		});

		return store;
	},
	
	
	getMainPanel: function() {

		var tm_s_id = xredaktor.getInstance().getCurrentSiteId();
		
		var fields = [
		{name: 'tm_id',				text:'ID',	 	type:'int', 	folder: true},
		{name: 'tm_name',	 		text:'Name',	type:'string', 	hidden: false, editor: {allowBlank: false,xtype: 'textfield'}},
		{name: 'tm_online',	 		text:'Aktiv',	type:'string', 	hidden: false, header:true, xtype: 'combo', store : [['Y','Ja'],['N','Nein']], width: 60, flex:0}
		];

		var tree = xframe_pattern.getInstance().genTree({
			iconsPrefix: 'xr_timemachine',
			button_del:true,
			button_add:true,
			region:'west',
			split: true,
			width: 300,
			title: 'Timemachine',
			border:false,
			forceFit:true,
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/timemachine/load',
				update: '/xgo/xplugs/xredaktor/ajax/timemachine/update',
				insert: '/xgo/xplugs/xredaktor/ajax/timemachine/insert',
				remove: '/xgo/xplugs/xredaktor/ajax/timemachine/remove',
				params: {tm_s_id: tm_s_id},
				move: 	'/xgo/xplugs/xredaktor/ajax/timemachine/move',
				pid: 		'tm_id',
				fields: 	fields,
				nameField:	'tm_name'
			}
		});


		tree.on('selectionchange',function(view,selections,options){

			if (selections.length == 0) {
				this.latest_tm_id = -1;
				this.input.getForm().reset();
				return;
			}

			this.latest_tm_id = selections[0].raw.tm_id;

			this.input.mask('Lade Daten ... ');

			xframe.ajax({
				scope:this,
				url: '/xgo/xplugs/xredaktor/ajax/timemachine/loadData',
				params : {
					tm_id: 	this.latest_tm_id
				},
				stateless: function(succ,json)
				{
					this.input.unmask();
					if (!succ) return false;
					this.input.getForm().setValues(json);
					this.input.setTitle('Einstellungen von '+json.tm_name);
				}
			});


		},this);



		this.input = Ext.create('Ext.form.Panel', {
			tbar: [{
				scope: this,
				iconCls: 'xf_save',
				text: 'Speichern',
				handler: function() {

					var raw = this.input.getForm().getValues();
					var data = {tm_start:raw['tm_start'],tm_end:raw['tm_end']};
					this.input.mask('Speichere Daten ....');

					xframe.ajax({
						scope:this,
						url: '/xgo/xplugs/xredaktor/ajax/timemachine/updateSet',
						params : {
							tm_id: 	this.latest_tm_id,
							data: 	Ext.encode(data)
						},
						stateless: function(succ,json)
						{
							this.input.unmask();
							if (!succ) return false;
						}
					});

				}
			}],
			border: false,
			region: 'center',
			title: 'Einstellungen',
			bodyStyle:'padding:15px 15px 0',
			fieldDefaults: {
				labelAlign: 'top',
				labelWidth: 75
			},
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},

			items: [{
				xtype: 'xr_field_timestamp',
				fieldLabel: 'Start',
				name: 'tm_start',
				allowBlank:false
			},{
				xtype: 'xr_field_timestamp',
				fieldLabel: 'Stop',
				name: 'tm_end'
			}]
		});


		var gui = Ext.create('Ext.panel.Panel',{
			border: false,
			layout: 'border',
			items: [tree,this.input]
		});


		return gui;
	}
}
