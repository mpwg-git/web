Ext.define('Ext.xr.field_unique_w2w_2', {
	extend: 'Ext.form.FieldContainer',
	alias: 'widget.field_unique_w2w_2',

	config: {
		hideLabel: true
	},

getValue: function()
	{
		return "";
	},
	
	constructor:function(cnfg) {

		var me = this;
		console.info('field_unique_w2w_2',cnfg);

		this.labelAlign = "top";

		this.as_id 		= cnfg.as.as_id;
		this.wz_id 		= cnfg.wz_id;
		this.config_id	= cnfg.as.as_config;

		var label = cnfg.as.as_label;

		var fields = [
		{name: 'wz_id',			text:'ID',				type:'int',		hidden: false, 	header:true, width: 40},
		{name: 'checkId',		text:'X ID',			type:'int',		hidden: true, 	header:true, width: 30},
		{name: 'wz_n2n_check',	text:'<b>X</b>',		type:'bool',	hidden: false, 	header:true, width: 30},
		{name: 'titleIt',		text:'Beschreibung',	type:'string',	hidden: false, 	header:true, flex: 1}
		];

		var grid = xframe_pattern.getInstance().genGrid({
			
			resizable: true,
			height: 400,
			region:'west',
			search:true,
			forceFit:true,
			border:true,
			split: true,
			records_move:false,
			pager:true,
			title: label,
			plugin_numLines: true,
			button_add: false,
			button_del: false,
			xstore: {

				load: 			'/xgo/xplugs/xredaktor/ajax/gui/uw2w/load',
				loadParams : {
					published: 1,
					as_id: 			this.as_id,
					wzListScopeID:	this.wz_id,
					config_id:		this.config_id
				},
				remove: 		'/xgo/xplugs/xredaktor/ajax/gui/uw2w/remove',
				updateCheck: 	'/xgo/xplugs/xredaktor/ajax/gui/uw2w/updateCheck',
				update: 		'/xgo/xplugs/xredaktor/ajax/gui/uw2w/update',
				insert: 		'/xgo/xplugs/xredaktor/ajax/gui/uw2w/insert',

				insertParams : {
					as_id : this.as_id
				},
				updateParams : {
					as_id : this.as_id
				},
				updateParamsByRecordValue : {
					checkId : 'checkId'
				},
				removeParams : {
					as_id : this.as_id
				},
				move: 	'/xgo/xplugs/xredaktor/ajax/gui/uw2w/move',
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
			params.wzListScopeID	= me.wz_id;

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
	}


});
