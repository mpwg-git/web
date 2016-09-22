Ext.define('Ext.xr.field_wizard2wizard', {
	extend: 'Ext.form.FieldContainer',
	alias: 'widget.xr_field_wizard2wizard',
	config: {
		
	},

	constructor:function(cnfg) {
		this.labelAlign = "top"; 

		var n2n_cfg_as_id = cnfg.as_id;

		var fields = [
		{name: 'wz_id',			text:'ID',				type:'int',		hidden: false, 	header:true, width: 40},
		{name: 'checkId',		text:'X ID',			type:'int',		hidden: true, 	header:true, width: 30},
		{name: 'wz_n2n_check',	text:'<b>X</b>',		type:'bool',	hidden: false, 	header:true, width: 30},
		{name: 'titleIt',		text:'Beschreibung',	type:'string',	hidden: false, 	header:true, flex: 1}
		];

		var wz_id 			= cnfg.wz_id;

		var grid = xframe_pattern.getInstance().genGrid({
			height: 400,
			region:'west',
			search:true,
			forceFit:true,
			border:false,
			split: true,
			records_move:false,
			pager:true,
			title: '',
			plugin_numLines: false,
			button_add: false,
			button_del: false,
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/wizards_n2n_grid/load',
				loadParams : {
					n2n_cfg_as_id: n2n_cfg_as_id,
					wzListScopeID: wz_id
				},
				remove: '/xgo/xplugs/xredaktor/ajax/wizards_n2n_grid/remove',
				updateCheck: '/xgo/xplugs/xredaktor/ajax/wizards_n2n_grid/updateCheck',
				update: '/xgo/xplugs/xredaktor/ajax/wizards_n2n_grid/update',
				insert: '/xgo/xplugs/xredaktor/ajax/wizards_n2n_grid/insert',
				insertParams : {
					n2n_cfg_as_id : n2n_cfg_as_id
				},
				updateParams : {
					n2n_cfg_as_id : n2n_cfg_as_id
				},
				updateParamsByRecordValue : {
					checkId : 'checkId'
				},
				removeParams : {
					n2n_cfg_as_id : n2n_cfg_as_id
				},
				move: 	'/xgo/xplugs/xredaktor/ajax/wizards_n2n_grid/move',
				pid: 	'wz_id',
				fields: fields
			}
		});

		grid.getStore().load();
		grid.checkchange = function(e,gridColumn,recordId,checked)
		{
			var record = grid.getStore().getAt(recordId);
			var params = Ext.clone(grid.initSettings.xstore.updateParams) || {};

			params.id 				= record.data[record.idProperty];
			params.idProperty 		= record.idProperty;
			params.field 			= gridColumn.dataIndex;
			params.value 			= checked ? 'on' : 'off';
			params.wzListScopeID	= wz_id;

			xframe.ajax({
				jsonFeedback: true,
				scope: this,
				url: grid.initSettings.xstore.updateCheck,
				params: params,
				success: function(json){
					if (json.record == false)
					{
						xframe.alert('ACHTUNG','Änderung wurde vom Server zurückgewiesen!');
						store.load();
					} else
					{
						if (json.reload)
						{
							store.load();
						}

					}
				},
				failure: function(json){
					store.load();
				},
				failure_msg: xframe.lang('UPDATE_OF_DATA_FAILED')
			});
		}

		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
		this.add(grid);
	},

	statics: {
		openConfigWindow: function(as,grid) {

			Ext.xr.field.openDefaultConfigWindow({
				grid: grid,
				as: as,
				title: 'W2W - Einstellungen',
				fields: [{
					xtype: 'xr_field_wattribute',
					name: 'wa_attr',
					fieldLabel: 'Attribut A'
				},{
					xtype: 'xr_field_wattribute',
					name: 'wb_attr',
					fieldLabel: 'Attribut B'
				}]
			});

		}
	}


});
