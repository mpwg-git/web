Ext.define('Ext.xr.xluerzer_submission_id', {
	extend: 'Ext.form.FieldContainer',
	alias: 'widget.xluerzer_submission_id',

	config: {
		fieldLabel: 'Submission ID',
		labelWidth: 100,
		width: 300
	},

	constructor:function(cnfg){
		this.rawConfig = cnfg;
		this.callParent(arguments);
		this.makeGui(cnfg);
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
		var es_id = parseInt(this.getValue(),10);
		if (es_id == 0) return;
		xluerzer_submissions_detail.getInstance().open(es_id);
	},

	search: function()
	{
		xluerzer_submissions.getInstance().search4submissionPopUp({
			scope: this,
			callback: function(es_id) {
				console.log("es_id", es_id);
				this.setValue(parseInt(es_id,10));
			}
		});
	},

	createFilm: function()
	{
		return this.create(2);
	},

	createPrint: function()
	{
		return this.create(1);
	},

	create: function(es_mediaType_id)
	{
		this.mask('Creating new Submission ['+es_mediaType_id+']...');
		xframe.ajax({
			scope: this,
			type: 'post',
			url: xluerzer.getInstance().getAjaxPath('submissions/createEmpty'),
			params : {
				es_mediaType_id: es_mediaType_id
			},
			stateless: function(success, json)
			{
				this.unmask();
				if (!success) return;
				this.setValue(json.es_id);
				this.open();
			}
		});
	},

	makeGui: function(cnfg) {

		var me 			= this;

		this.field_id		= Ext.id();
		this.btn_serach 	= Ext.id();
		this.btn_open		= Ext.id();
		this.btn_createP	= Ext.id();
		this.btn_createF	= Ext.id();

		this.numberfield = Ext.widget({
			id: this.field_id,
			xtype: 'numberfield',
			flex: 1,
			hideTrigger: true,
			name: this.rawConfig.name,
			value: this.rawConfig.value,
		}); // if not rendered, it is working ...
		
		console.log("cnfg", cnfg);

		
		var createPrint;
		var createFilm;
		
		if (cnfg.displayPrint == 1)
		{
			createPrint = {
				id: this.btn_createP,
				iconCls: 'xf_add',
				xtype: 'button',
				text: 'Create Print',
				scope: this,
				handler: this.createPrint
			};
	
		}
		
		
		if (cnfg.displayVideo == 1)
		{		
			createFilm = {
				id: this.btn_createF,
				iconCls: 'xf_add',
				xtype: 'button',
				text: 'Create Film',
				scope: this,
				handler: this.createFilm
			};
		}
		
		
		
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
			}, {
				xtype: 'text',
				width: 10
			},createPrint
			,createFilm]
		});

	}

});
