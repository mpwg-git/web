Ext.define('Ext.xr.field_color', {
	extend: 'Ext.form.FieldContainer',
	alias: 'widget.xr_field_color',

	config: {
	},

	statics : {
		renderer : function(v,r){
			return v;
		}
	},


	getValue: function()
	{
		return this.color;
	},


	html_get: function()
	{
		return '<div class="color-box"></div>';
	},


	html_init: function()
	{
		var me = this;
		if (!this.color)
		{
			this.color = "#FFFFFF";
		}

		$$('#'+this.divId+' .color-box').colpick({
			colorScheme:'light',
			layout:'full',
			color: me.color,
			onSubmit:function(hsb,hex,rgb,el) {
				me.color = '#'+hex;
				$$(el).css('background-color', '#'+hex);
				$$(el).colpickHide();
			}
		})

		$$('#'+this.divId+' .color-box').css('background-color', this.color);

	},


	constructor:function(cnfg){

		this.color = cnfg.value;

		this.cnfg = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);

		this.divId = Ext.id();
		this.masterPanel = Ext.create('Ext.Component',{
			html:'<div style="" id="'+this.divId+'">'+this.html_get()+'</div>'
		});

		this.masterPanel.on('afterrender',this.html_init,this,{buffer:1});
		this.add(this.masterPanel);

	}
});
