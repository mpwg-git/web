Ext.define('Ext.xr.xluerzer_image', {
	extend: 'Ext.form.FieldContainer',
	alias: 'widget.xluerzer_image',

	config: {
		fieldLabel: 'Image',
		labelWidth: 100,
		height: 150,
		width: 150
	},

	constructor:function(cnfg) {
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.makeGui();
		this.initConfig(cnfg);
	},
	
	setValue: function(src)
	{
		var me = this;
		var container = Ext.getCmp(this.imgId).up('fieldcontainer');

		container.mask("Loading Image ...");
		$$('#'+this.imgId).unbind('load');
		$$('#'+this.imgId).attr('src','');

		$$('#'+this.imgId).load(function() {
			container.unmask();
		});
		$$('#'+this.imgId).attr('src',src);
	},

	makeGui: function()
	{
		this.imgId = Ext.id();
		this.add({
			id: this.imgId,
			xtype : "component",
			cls: 'submission_artwork_detail',
			autoEl : {
				tag : "img",
				src : '',
				width: this.rawConfig.width || 150,
				height: this.rawConfig.height || 150,
			}
		});
	}
});