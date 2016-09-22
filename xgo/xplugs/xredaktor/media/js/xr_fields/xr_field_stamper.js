Ext.define('Ext.xr.field_stamper', {

	extend: 'Ext.panel.Panel',
	alias: 'widget.xr_field_stamper',

	config: {
		border: false,
		autoHeight: true,
		resizable: true,
		autoScroll: true
	},

	getValue: function()
	{
		return "";
	},


	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	},

	afterRender: function()
	{
		console.info("After RENDER :: STAMPER",this.getHeight());
		this.callParent();
	},

	statics: {
		openConfigWindow: function(as,grid) {

			Ext.xr.field.openDefaultConfigWindow({
				grid: grid,
				as: as,
				as_config_json: true,
				title: 'Stamper Einstellung',
				fields: [{
					xtype: 'xr_field_atom',
					name: 'a_id',
					fieldLabel: 'Basutein'
				},{
					xtype: 'xr_field_int',
					name: 'height',
					fieldLabel: 'Höhe (px)',
					value: 200
				},{
					xtype: 'xr_field_yn',
					name: 'autoScroll',
					fieldLabel: 'Scrollbars'
				}]
			});

		}
	}
});
