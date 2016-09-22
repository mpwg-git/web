
Ext.define('Ext.xr.iframe', {
	extend: 'Ext.panel.Panel',
	alias: 'widget.xr_iframe',


	config: {
		
	},

	constructor:function(cnfg) {

		var src = ''+cnfg.src;

		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);


		this.idx = Ext.id();
		this.useThisId = src;

		var gui = Ext.widget({
			title: 'Preview',
			xtype: 'panel',
			layout: 'hbox',
			tbar: [{
				iconCls: 'xf_reload',
				text: 'Reload Preview',
				scope: this,
				handler: function() {
					$$('#'+this.idx)[0].src = this.useThisId;
				}
			},{
				text: 'size:full',
				scope: this,
				handler: function() {
					Ext.getCmp(this.idx).setWidth(gui.getWidth());
				}
			},{
				text: 'size:pad',
				scope: this,
				handler: function() {
					Ext.getCmp(this.idx).setWidth(768);
				}
			},{
				text: 'size:phone',
				scope: this,
				handler: function() {
					Ext.getCmp(this.idx).setWidth(320);
				}
			}],
			items:[{
				flex:1,
				xtype: 'text'
			},{
				id: this.idx,
				xtype : "component",
				width: '100%',
				height: '100%',
				autoEl : {
					tag : "iframe",
					src : src
				},
				listeners: {
					scope: this,
					afterrender: function() {
						if (src != this.useThisId)
						{
							Ext.get(this.idx).set({'src':this.useThisId});
						}
					}
				}
			},{
				flex:1,
				xtype: 'text'
			}]
		});



		this.add(gui);
	},


	loadSrc: function(url)
	{
		this.useThisId = url;
		if (Ext.get(this.idx))
		{
			Ext.get(this.idx).set({'src':url});
		}
	}

});

