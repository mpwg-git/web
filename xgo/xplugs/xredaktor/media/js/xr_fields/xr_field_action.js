Ext.define('Ext.xr.field_action', {
	
	extend: 'Ext.button.Button',
	alias: 'widget.xr_field_action',
	
	
	config: {
		flex: false,
		maxWidth: 400
	},
	
	getValue: function()
	{
		return "";
	},
	
	constructor:function(cnfg) {
		
		this.text = cnfg.as.as_label;
		
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
	},

	statics: {
		openConfigWindow: function(as,grid) {

			Ext.xr.field.openDefaultConfigWindow({
				grid: grid,
				as: as,
				as_config_json: true,
				title: 'Action-Einstellungen',
				fields: [

				{
					xtype: 'xr_field_text',
					name: 'hook',
					fieldLabel: 'Hook'
				},{
					xtype      : 'fieldcontainer',
					fieldLabel : 'Aufrufmodus',
					defaultType: 'radiofield',
					defaults: {
						flex: 1
					},
					layout: 'hbox',
					items: [
					{
						boxLabel  : 'Versteckt',
						name      : 'window_type',
						inputValue: 'hidden',
						selected: true
					},{
						boxLabel  : 'Intern',
						name      : 'window_type',
						inputValue: 'internal'
					}, {
						boxLabel  : 'Extern',
						name      : 'size',
						inputValue: 'external'
					}
					]
				}



				]
			});

		}
	}
});
