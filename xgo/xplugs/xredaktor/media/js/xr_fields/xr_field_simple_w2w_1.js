Ext.define('Ext.xr.field_simple_w2w_1', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xr_field_simple_w2w_1',

	config: {
		displayField: 'titleIt',
		valueField: 'wz_id',
		triggerAction: 'query',
		flex: 1,
		queryParam: '_query',
		minChars: 2
	},

	constructor:function(cnfg){

		var me = this;
		console.info('cnfg',cnfg);

		var mId = Ext.id();

		Ext.define(mId, {
			extend: 'Ext.data.Model',
			idProperty: 'wz_id',
			fields: [{
				name: 'titleIt',
				mapping: function(raw) {
					return raw.titleIt + " ["+raw.wz_id+"]";
				}
			}, {
				name: 'wz_id',type: 'int'
			}]
		});

		this.loadedInitField = false;
		this.store = Ext.create('Ext.data.Store', {
			listeners: {
				scope: this,
				buffer: 10,
				load: function() {
					if (this.loadedInitField) return;
					this.loadedInitField = true;
					me.setValue(cnfg.value,true);
				}
			},
			autoLoad: true,
			remoteSort: true,
			pageSize: 30,
			proxy: {
				extraParams: {
					initValue: cnfg.value
				},
				type: 'ajax',
				url: '/xgo/xplugs/xredaktor/ajax/gui/searchInField?published=1&as_id='+cnfg.as.as_id,
				reader: {
					root: 'root',
					totalProperty: 'totalCount',
					idProperty: 'wz_id'
				}
			},
			model: mId
		});

		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.initConfig(cnfg);


		this.on('afterrender',function(){
			console.info('TTT');
		});


	}
});




