Ext.define('Ext.xr.field_remote_field', {
	extend: 'Ext.form.field.Text',
	alias: 'widget.xr_field_remote_field',
	config: {
		
	},

	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	},
	
	statics: {
		openConfigWindow: function(as,grid) {

			Ext.xr.field.openDefaultConfigWindow({
				grid: grid,
				as: as,
				title: 'Remote Feld',
				as_config_json: true,
				fields: [
			
				{
					xtype: 'xr_field_wattribute',
					name: 'attr_lr_w2w_field',
					fieldLabel: 'Lokales generisches W2W Feld',
					a_id: as.as_a_id
				},
				{
					xtype: 'xr_field_wattribute',
					name: 'attr_fr',
					fieldLabel: 'Fremd-Wizard Feld',
					a_id: as.as_a_id
				}
				
				
				]
			});

		}
	}

});
