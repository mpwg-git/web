Ext.define('Ext.xr.field_combo', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xr_field_combo',
	config: {
		selectOnFocus: true
	},

	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);
		
		this.on('focus',function(){
			this.expand();
		},this,1);
		
	},

	statics: {
		openConfigWindow: function(as,grid) {
			Ext.xr.field.openDefaultConfigWindowAssozSettings({
				grid: grid,
				as: as,
				title: 'Einstellung'
			});
		}
	}

});

