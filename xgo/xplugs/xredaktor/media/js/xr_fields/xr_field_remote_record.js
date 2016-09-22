Ext.define('Ext.xr.field_remote_record', {
	extend: 'Ext.panel.Panel',
	alias: 'widget.xr_field_remote_record',
	config: {

	},

	constructor:function(cnfg){

		console.info('xr_field_remote_record',cnfg);

		this.rr_wizardId 		= cnfg.xr_field_remote_record;
		this.rr_wizardRecordId 	= cnfg.value;


		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);

		var holder = xredaktor_gui.getInstance().renderFormViaId({
			id: this.rr_wizardId,
			r_id: this.rr_wizardRecordId
		});
		
		this.holder = holder;

		this.removeAll();
		this.add(holder);
		this.doLayout();

		return;
	},
	
	getValue: function()
	{
		return "";
	},
	
 
	doFormSave: function()
	{
		var data 	= this.holder.getGui().getFormData();
		var me 		= this;

		console.info('doFormSave',data);

		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/spreadSave',
			params : {
				domagic:	me.rr_wizardId,
				json_cfg:	Ext.encode(data),
				id: 		me.rr_wizardRecordId
			},
			success: function(json)
			{
			}
		});

	},

	statics: {
		openConfigWindow: function(as,grid) {

			Ext.xr.field.openDefaultConfigWindow({
				grid: grid,
				as: as,
				title: 'Remote Record',
				as_config_json: true,
				fields: [

				{
					xtype: 'xr_field_wattribute',
					name: 'attr_wid',
					fieldLabel: 'Wizard-ID Feld',
					a_id: as.as_a_id

				},
				{
					xtype: 'xr_field_text',
					name: 'attr_w2w_field_name',
					fieldLabel: 'Remote Feld-Name'
				}


				]
			});

		}
	}

});
