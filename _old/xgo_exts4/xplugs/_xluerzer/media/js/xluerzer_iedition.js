var xluerzer_iedition = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_iedition";
		}

		this.getInstance = function(config) {
			return new xluerzer_iedition_(config);
			return instance;
		}
	}
})();

var xluerzer_iedition_ = function(config) {
	this.config = config || {};
};

xluerzer_iedition_.prototype = {


	panel_locale: function()
	{

		var items = [

		{
			fieldLabel: 'Language',
			name: 		'ipl_lang'
		},

		{
			fieldLabel: 'Name',
			name: 		'ipl_name'
		},
		{
			fieldLabel: 'Longname',
			name: 		'ipl_longName'
		},
		{
			fieldLabel: 'PDF',
			name: 		'ipl_url',
			xtype: 		'xr_field_file'
		},
		{
			fieldLabel: 'Image',
			name: 		'ipl_image',
			xtype: 		'xr_field_file'
		},
		{
			fieldLabel: 'Hash',
			name: 		'ipl_hash'
		},
		{
			fieldLabel: '[S3] PDF',
			name: 		'ipl_s3_files',
			readOnly: 	true
		},
		{
			fieldLabel: '[S3] Image',
			name: 		'ipl_s3_image',
			readOnly:	true
		},

		];

		var form = Ext.widget({
			tbar: [{
				iconCls: 'xf_save',
				text: 'Save',
				scope: this,
				handler: this.lang_save
			}],
			title: 'Locales - Configuration',
			xtype:'form',
			forceFit:true,
			split: true,
			overflowY: true,
			bodyStyle:'padding:5px 5px 0',
			fieldDefaults: {
				msgTarget: 'side',
				labelWidth: 75
			},
			defaultType: 'textfield',
			defaults: {
				//anchor: '100%'
				width: 400
			},
			items: items,
			region: 'center'
		});

		return form;
	},

	lang_save: function()
	{

		this.panelx_pdf_locales.mask("Saving ...");

		var data = Ext.encode(this.panelx_pdf_locales.getForm().getValues());

		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('iedtion_pdfs_locales_save'),
			params : {
				ipl_id: this.latest_id_lang,
				data: data
			},
			stateless: function(success, json)
			{
				this.panelx_pdf_locales.unmask();
				if (!success) return;
				this.lang_load();
				this.grid2_overview.getStore().load();
			}
		});

	},

	lang_load: function()
	{
		this.panelx_pdf_locales.mask("Loading ...");
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('iedtion_pdfs_locales_load'),
			params : {
				ipl_id: this.latest_id_lang
			},
			stateless: function(success, json)
			{
				this.panelx_pdf_locales.unmask();
				this.panelx_pdf_locales.getForm().reset();
				if (!success) return;
				this.panelx_pdf_locales.getForm().setValues(json.data);
			}
		});
	},

	panel_locales: function()
	{
		var me = this;

		var fields =  [
		{name:'ipl_id', 			text:'ID', 				type: 'int', 	width: 80},
		{name:'ipl_lang',			text:'Language', 		type: 'string'},
		];

		this.grid2_overview = xframe_pattern.getInstance().genGrid({
			region:'west',
			forceFit:true,
			border:false,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			search: true,
			pager: true,
			split: true,
			records_move: false,
			xstore: {
				insertParamsFunc: function()
				{
					var zz = {
						'ipl_ip_id' : me.latest_id
					};
					
					return zz;
				},
				load: 	xluerzer.getInstance().getAjaxPath('iedtion_pdfs_locales/load'),
				insert: xluerzer.getInstance().getAjaxPath('iedtion_pdfs_locales/insert'),
				remove: xluerzer.getInstance().getAjaxPath('iedtion_pdfs_locales/remove'),
				pid: 	'ipl_id',
				fields: fields,
				params: {
				}
			}
		});

		this.grid2_overview.on('afterrender',function(v,sel){
			this.grid2_overview.getStore().load();
		},this);

		this.grid2_overview.on('selectionchange',function(v,sel){

			this.latest_id_lang = -1;
			this.panelx_pdf_locales.setDisabled(sel.length != 1);
			if (sel.length == 0) return;

			this.latest_id_lang = sel[0].data.ipl_id;
			this.lang_load();
		},this);


		this.panelx_pdf_locales = this.panel_locale();

		var gui = Ext.widget({
			title: 'Locales',
			xtype:'panel',
			forceFit:true,
			split: true,
			items: [this.grid2_overview,this.panelx_pdf_locales],
			layout: 'border'
		});


		return gui;
	},

	pdf_save: function()
	{

		this.form_pdf.mask("Saving ...");

		var data = Ext.encode(this.form_pdf.getForm().getValues());

		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('iedtion_pdfs_save'),
			params : {
				ip_id: this.latest_id,
				data: data
			},
			stateless: function(success, json)
			{
				this.form_pdf.unmask();
				if (!success) return;
				this.pdf_load();
				this.grid_overview.getStore().load();
			}
		});

	},

	pdf_load: function()
	{
		this.form_pdf.mask("Loading ...");
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('iedtion_pdfs_load'),
			params : {
				ip_id: this.latest_id
			},
			stateless: function(success, json)
			{
				this.form_pdf.unmask();
				this.form_pdf.getForm().reset();
				if (!success) return;
				this.form_pdf.getForm().setValues(json.data);
				
				
				
				
				
				
			}
		});
	},


	panel_pdf: function()
	{

		this.panelx_locales = this.panel_locales();

		var items = [

		{
			fieldLabel: 'Magazine',
			name: 		'ip_magazine_id',
			xtype: 		'xluerzer_magazine'
		},

		xluerzer_gui.getInstance().simplyCombo({
			fieldLabel: 'Sandmode',
			name: 'ip_sandmode',
			data: [{k:'0',v:'Inactive'},{k:'1',v:'Active'}],
			emptyText: '',
		}),

		{
			fieldLabel: 'Release-Date',
			name: 		'ip_releaseDate',
			xtype: 		'datefield',
			submitFormat: 'y-m-d',
		},
		{
			fieldLabel: 'Name',
			name: 		'ip_name'
		},
		{
			fieldLabel: 'Longname',
			name: 		'ip_longName'
		},
		{
			fieldLabel: 'PDF',
			name: 		'ip_url',
			xtype: 		'xr_field_file'
		},
		{
			fieldLabel: 'Image',
			name: 		'ip_image',
			xtype: 		'xr_field_file'
		},
		{
			fieldLabel: 'Pages',
			name: 		'ip_pages'
		},
		{
			fieldLabel: 'ProductId',
			name: 		'ip_productId'
		},
		{
			fieldLabel: 'SecondProductId',
			name: 		'ip_secondProductId'
		},
		{
			fieldLabel: 'PrintId',
			name: 		'ip_printId'
		},

		{
			fieldLabel: 'Hash',
			name: 		'ip_hash'
		},

		{
			fieldLabel: '[S3] PDF',
			name: 		'ip_s3_url',
			readOnly: 	true
		},
		{
			fieldLabel: '[S3] Image',
			name: 		'ip_s3_image',
			readOnly:	true
		},


		];

		var form = Ext.widget({
			tbar: [{
				iconCls: 'xf_save',
				text: 'Save',
				scope: this,
				handler: this.pdf_save
			}],
			title: 'Configuration',
			xtype:'form',
			forceFit:true,
			split: true,
			overflowY: true,
			bodyStyle:'padding:5px 5px 0',
			fieldDefaults: {
				msgTarget: 'side',
				labelWidth: 110
			},
			defaultType: 'textfield',
			defaults: {
				//anchor: '100%'
				width: 400
			},
			items: items
		});

		this.form_pdf = form;

		var gui = Ext.widget({
			disabled: true,
			region: 'center',
			xtype:'tabpanel',
			forceFit:true,
			split: true,
			items: [form,this.panelx_locales]
		});


		return gui;


	},


	open: function()
	{

		var me = this;

		var fields =  [
		{name:'ip_id', 				text:'ID', 				type: 'int', 	width: 80},
		{name:'ip_name',			text:'Name', 			type: 'string'},
		];

		this.grid_overview = xframe_pattern.getInstance().genGrid({
			region:'west',
			forceFit:true,
			border:false,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			search: true,
			pager: true,
			split: true,
			records_move: false,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('iedtion_pdfs/load'),
				insert: xluerzer.getInstance().getAjaxPath('iedtion_pdfs/insert'),
				remove: xluerzer.getInstance().getAjaxPath('iedtion_pdfs/remove'),
				pid: 	'ip_id',
				fields: fields,
				params: {
				}
			}
		});

		this.grid_overview.on('afterrender',function(v,sel){
			this.grid_overview.getStore().load();
		},this);

		this.grid_overview.on('selectionchange',function(v,sel){

			this.grid2_overview.getStore().proxy.extraParams['ipl_ip_id'] = 0;
			this.latest_id = -1;
			this.panelx_pdf.setDisabled(sel.length != 1);
			
			if (sel.length == 0) 
			{
				this.grid2_overview.getStore().load();
				return;
			}

			this.latest_id = sel[0].data.ip_id;
			this.grid2_overview.getStore().proxy.extraParams['ipl_ip_id'] = this.latest_id;
			this.grid2_overview.getStore().load();
			this.pdf_load();
			
		},this);


		this.panelx_pdf 	= this.panel_pdf();

		var gui = Ext.widget({
			title: 'iEdition',
			xtype:'panel',
			forceFit:true,
			split: true,
			items: [this.grid_overview,this.panelx_pdf],
			layout: 'border'
		});

		xluerzer.getInstance().showContent(gui);

	}

}