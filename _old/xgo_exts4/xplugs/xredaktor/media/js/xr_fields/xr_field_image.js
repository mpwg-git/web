Ext.define('Ext.xr.field_image', {
	extend: 'Ext.xr.field_file',
	alias: 'widget.xr_field_image',

	config: {
		fieldLabel: 'Image',
		imagesOnly:	true
	},

	constructor:function(cnfg){
		this.callParent(arguments);
	}
});
