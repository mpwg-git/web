

var xluerzer_admin_submissions = (function() {
	var instance = null;
	return new function() {

		this.getInstance = function(config) {
			return new xluerzer_admin_submissions_(config);
			return instance;
		}
	}
})();

var xluerzer_admin_submissions_ = function(config) {
	this.config = config || {};
};

xluerzer_admin_submissions_.prototype = {


	open: function()
	{

		this.gui = Ext.widget({

			title: 'Submission Administration',
			border: false,
			xtype: 'form',
			defaultType: 'textfield',
			defaults: {

				enableKeyEvents:true,
				listeners: {
					scope: this,
					specialkey: function(field,event) {
						if (event.getKey() == event.ENTER) {

						}
					}
				}

			},

			tbar: [
			{
				iconCls: 'xf_reload',
				text: 'Reload Configuration',
				scope: this,
				handler: function() {
					this.load();
				}
			},
			{
				iconCls: 'xf_save',
				text: 'Save Configuration',
				scope: this,
				handler: function() {


					var data = [];
					var vals = this.gui.getForm().getValues();

					Ext.iterate(vals,function(k,v){
						var k2 = k.split('_')[1];

						var tmp = {
							as2m_mt_id: k2,
							as2m_m_id: v
						};

						data.push(tmp);

					});

					this.gui.mask("Saving data ....");
					xframe.ajax({
						scope: this,
						url: xluerzer.getInstance().getAjaxPath('admin-submissions_settings4submitt/save'),
						params : {
							data : Ext.encode(data)
						},
						stateless: function(success, json)
						{
							this.gui.unmask();
							if (!success) return;
						}
					});

				}
			}],

			bodyPadding: 20,
			items: [

			
			{
				xtype: 'xluerzer_magazine',
				name: 'submission4type_1',
				fieldLabel: 'Print',
				width: 500
			},
			{
				xtype: 'textfield',
				name: 'submission4typeAB_1',
				fieldLabel: 'From SubmNr',
				disabled: true,
				width: 200
			},
			{
				xtype: 'xluerzer_magazine',
				name: 'submission4type_12',
				fieldLabel: 'Film',
				width: 500
			},
			{
				xtype: 'textfield',
				name: 'submission4typeAB_12',
				fieldLabel: 'From SubmNr',
				disabled: true,
				width: 200
			},
			{
				xtype: 'xluerzer_magazine',
				name: 'submission4type_13',
				fieldLabel: 'Students',
				width: 500
			},
			{
				xtype: 'textfield',
				name: 'submission4typeAB_13',
				fieldLabel: 'From SubmNr',
				disabled: true,
				width: 200
			},
			{
				xtype: 'xluerzer_magazine',
				name: 'submission4type_7',
				fieldLabel: '200 Best Ad Photographers',
				width: 500
			},
			{
				xtype: 'textfield',
				name: 'submission4typeAB_7',
				fieldLabel: 'From SubmNr',
				disabled: true,
				width: 200
			},
			{
				xtype: 'xluerzer_magazine',
				name: 'submission4type_8',
				fieldLabel: '200 Best Illustrators',
				width: 500
			},
			{
				xtype: 'textfield',
				name: 'submission4typeAB_8',
				fieldLabel: 'From SubmNr',
				disabled: true,
				width: 200
			},
			{
				xtype: 'xluerzer_magazine',
				name: 'submission4type_9',
				fieldLabel: '200 Best Packaging',
				width: 500
			},
			{
				xtype: 'textfield',
				name: 'submission4typeAB_9',
				fieldLabel: 'From SubmNr',
				disabled: true,
				width: 200
			},
			{
				xtype: 'xluerzer_magazine',
				name: 'es_magazine_id',
				name: 'submission4type_11',
				fieldLabel: '200 Best Digital Artist',
				width: 500
			},
			{
				xtype: 'textfield',
				name: 'submission4typeAB_11',
				fieldLabel: 'From SubmNr',
				disabled: true,
				width: 200
			},

			]
		});

		this.gui.on('afterrender',function(){
			this.load();
		},this);

		xluerzer.getInstance().showContent(this.gui);
	},

	load: function()
	{
		this.gui.mask("Loading data ....");
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('admin-submissions_settings4submitt/load'),
			params : {

			},
			stateless: function(success, json)
			{
				this.gui.unmask();
				if (!success) return;

				var data = {};
				Ext.each(json.data,function(o){
					data['submission4type_'+o.as2m_mt_id] = o.as2m_m_id;
					data['submission4typeAB_'+o.as2m_mt_id] = o.min_es_id;
				},this);

				this.gui.getForm().setValues(data);

			}
		});
	}

}