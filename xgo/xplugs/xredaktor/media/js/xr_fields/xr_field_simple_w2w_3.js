Ext.define('Ext.xr.field_simple_w2w_3', {
	extend: 'Ext.form.FieldContainer',
	alias: 'widget.field_simple_w2w_3',
	
	config: {
		hideLabel: true
	},

	getValue: function()
	{
		return "";
	},
	
	constructor:function(cnfg) {


		console.info('############################### field_simple_w2w_3');
		console.log("cfg", cnfg);

		this.labelAlign = "top";

		this.as_id = cnfg.as.as_id;
		this.wz_id = cnfg.wz_id;

		this.wz_id_a	= cnfg.as.as_a_id;
		this.wz_id_b	= cnfg.as.as_config;

		console.log("wza, wzab", this.wz_id_a, this.wz_id_b);

		var label = cnfg.as.as_label;
		
		var me = this;

		var fields = [
		{name: 'wz_NAME',		text:'Name',			type:'string',	folder: true,	hidden: false, 	header:true, flex: 1},
		{name: 'del_id',		text:'X ID',			type:'int',		hidden: true, 	header:true, width: 30},
		{name: 'wz_id',			text:'ID',				type:'int',		hidden: false, 	header:true, width: 40},
		{name: 'wz_sort',		text:'Sortierung',		type:'int',		hidden: true, 	header:true, flex: 1}
		];


		var checkchange = function(node, checked, options)
		{

			console.log("check change", node, checked, options);


			var recordId = node.data.wz_id;

			console.log("del_id", recordId);

			var params = Ext.clone(tree.initSettings.xstore.updateParams) || {};

			params.id 				= recordId;
			params.value 			= checked ? 'on' : 'off';
			params.nocheck			= false;
			//params.wzListScopeID	= me.wz_id_b;

			xframe.ajax({
				jsonFeedback: true,
				scope: this,
				url: tree.initSettings.xstore.updateCheck,
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


		var tree = xframe_pattern.getInstance().genTree({

			resizable: true,

			height: 300,
			forceFit:true,
			border:true,
			split: true,
			width: '100%',
			//records_move:false,
			pager:true,
			title: label,
			rootTextName: 'Root',
			//plugin_numLines: false,
			button_add: false,
			button_del: false,
			xstore: {
				load: 			'/xgo/xplugs/xredaktor/ajax/gui/sw2w/load',
				loadParams : {
					published:		1,
					as_id: 			this.as_id,
					wzListScopeID:	this.wz_id
				},
				remove: 		'/xgo/xplugs/xredaktor/ajax/gui/sw2w/remove',
				updateCheck: 	'/xgo/xplugs/xredaktor/ajax/gui/sw2w/updateCheck',
				update: 		'/xgo/xplugs/xredaktor/ajax/gui/sw2w/update',
				insert: 		'/xgo/xplugs/xredaktor/ajax/gui/sw2w/insert',

				insertParams : {
					as_id : this.as_id
				},
				updateParams : {
					as_id : this.as_id,
					wzListScopeID:	this.wz_id,

				},
				updateParamsByRecordValue : {
					checkId : 'checkId'
				},
				removeParams : {
					as_id : this.as_id
				},
				move: 	'/xgo/xplugs/xredaktor/ajax/gui/sw2w/move',
				pid: 	'wz_id',

				fields: fields,
				checkchange: checkchange
			}
		});

		//tree.getStore().load();



		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
		this.add(tree);
	}


});
