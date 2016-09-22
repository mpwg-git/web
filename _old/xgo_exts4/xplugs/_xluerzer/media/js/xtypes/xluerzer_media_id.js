Ext.define('Ext.xr.xluerzer_media_id', {
	extend: 'Ext.form.FieldContainer',
	alias: 'widget.xluerzer_media_id',

	config: {
		fieldLabel: 'Media ID',
		labelWidth: 100,
		width: 300
	},

	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.makeGui();
		this.initConfig(cnfg);
	},

	getValue: function() {
		return this.numberfield.getValue();
	},

	setValue: function(value) {
		this.numberfield.setValue(value);
	},

	open: function()
	{
		var es_id = this.getValue();
		xluerzer_media_detail.getInstance().open(es_id);
	},

	search: function()
	{
		xluerzer_media.getInstance().search4mediaPopUp({
			scope: this,
			callback: function(eam_id) {
				this.setValue(parseInt(eam_id,10));
			}
		});
	},
	
	makeGui: function() {

		var me 			= this;

		this.field_id		= Ext.id();
		this.btn_serach 	= Ext.id();
		this.btn_open		= Ext.id();

		this.numberfield = Ext.widget({
			id: this.field_id,
			xtype: 'numberfield',
			hideTrigger: true,
			flex: 1,
			name: this.rawConfig.name,
			value: this.rawConfig.value,
		}); // if not rendered, it is working ...

		this.add({
			xtype: 'fieldcontainer',
			width: 400,
			layout: 'hbox',
			items: [this.numberfield, {
				xtype: 'text',
				width: 10
			},{
				id: this.btn_open,
				iconCls: 'xf_open',
				xtype: 'button',
				text: 'Open',
				scope: this,
				handler: this.open
			}, {
				xtype: 'text',
				width: 20
			}, {
				id: this.btn_search,
				iconCls: 'xf_search',
				xtype: 'button',
				text: 'Search',
				scope: this,
				handler: this.search
			}]
		});

	}

});
