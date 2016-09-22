Ext.define('Ext.xr.field_container_images', {
	extend: 'Ext.xr.field_container_files',
	alias: 'widget.xr_field_container_images',
	config: {
		height: 200,
		title: 'IMAGES',
		imagesOnly:	true
	},
	constructor:function(cnfg){
		this.callParent(arguments);//Calling the parent class constructor
		//this.initConfig(cnfg);//Initializing the component
	},
	statics: {
		openConfigWindow: function(as,grid) {

			Ext.xr.field.openDefaultConfigWindow({
				grid: grid,
				as: as,
				title: 'Verzeichnis',
				fields: [{
					xtype: 'xr_field_dir',
					name: 'as_config',
					fieldLabel: 'Verzeichnis-Root'
				}]
			});

		}
	},
});

