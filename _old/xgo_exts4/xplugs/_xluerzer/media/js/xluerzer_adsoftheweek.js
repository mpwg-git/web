var xluerzer_adsoftheweek = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_adsoftheweek";
		}

		this.getInstance = function(config) {
			return new xluerzer_adsoftheweek_(config);
			return instance;
		}
	}
})();

var xluerzer_adsoftheweek_ = function(config) {
	this.config = config || {};
};

xluerzer_adsoftheweek_.prototype = {

	imageRenderer_print: function(value,t,r)
	{
		var esotw_id = r.data.esotw_id + '?mod='+r.data.esotw_modified_ts;
		return "<img width=100 height=100 src='/xgo/xplugs/xluerzer/ajax/oe_media/imageRenderer_print/"+esotw_id+"'>";
	},

	imageRenderer_spot: function(value,t,r)
	{
		var esotw_id = r.data.esotw_id+ '?mod='+r.data.esotw_modified_ts;
		return "<img width=178 height=100 src='/xgo/xplugs/xluerzer/ajax/oe_media/imageRenderer_spot/"+esotw_id+"'>";
	},
	imageRenderer_classic: function(value,t,r)
	{
		var esotw_id = r.data.esotw_id+ '?mod='+r.data.esotw_modified_ts;
		return "<img width=178 height=100 src='/xgo/xplugs/xluerzer/ajax/oe_media/imageRenderer_classic/"+esotw_id+"'>";
	},

	getTab_overview: function()
	{
		this.grid_overview = xframe_pattern.getInstance().genGrid({
			region:'center',
			title: 'Overview',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			//fn_add: xluerzer_adsoftheweek.openDetailsById(),
			fn_add_scope: this,
			search: true,
			pager: true,
			records_move: false,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('adsoftheweek/overview/load'),
				insert: xluerzer.getInstance().getAjaxPath('adsoftheweek/overview/insert'),
				remove: xluerzer.getInstance().getAjaxPath('adsoftheweek/overview/remove'),
				pid: 	'esotw_id',
				initSort: '[{"property":"esotw_id","direction":"DESC"}]',
				fields: [
				{name:'esotw_id',		 			text:'ID', 						type: 'int',		width:60},
				{name:'esotw_active',		 		text:'Active', 					type: 'int',		width:80, renderer: xluerzer_renderer.getInstance().renderer_state_active},
				{name:'esotw_date',		 			text:'Date', 					type: 'string',		width:160},
				{name:'esotw_printSubmission_id', 	text:'Print SID', 				type: 'int',		width:110, scope: this, renderer: this.imageRenderer_print},
				{name:'esotw_printClient', 			text:'Print Client', 			type: 'string'},
				{name:'esotw_spotSubmission_id', 	text:'Spot SID', 				type: 'int',		width:188, scope: this, renderer: this.imageRenderer_spot},
				{name:'esotw_spotClient', 			text:'Spot Client', 			type: 'string',		width:100},
				{name:'esotw_spotTitle', 			text:'Spot Title', 				type: 'string'},
				{name:'esotw_classicMedia_id', 		text:'Classic SID', 			type: 'int',		width:188, scope: this, renderer: this.imageRenderer_classic},
				{name:'esotw_classicClient', 		text:'´Classic Client', 		type: 'string',		width:100},
				{name:'esotw_classicTitle', 		text:'´Classic Title', 			type: 'string'},
				{name:'esotw_modified_ts', 			text:'Modified', 				type: 'string', hidden: true},
				

				]
			},

			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					this.openDetails(record.data.esotw_id);
				}
			}
		});

		this.grid_overview.on('afterrender',function(){
			this.grid_overview.getStore().load();
		},this);



	},


	getTab_details: function()
	{

		this.panel_details_print = Ext.widget({

			border: false,
			columnWidth: 0.33,
			minWidth: 360,
			xtype: 'form',
			height: '100%',
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},
			items: [
			{
				xtype: 'text',
				text: 'Print Ad of the week',
				height: 50
			},
			{
				xtype: 'xluerzer_submission_id',
				fieldLabel: 'Submission ID',
				name: 'esotw_printSubmission_id',
				displayPrint: 1,
				displayVideo: 0
			},
			{
				xtype: 'xluerzer_media_id',
				fieldLabel: 'Media ID',
				name: 'esotw_printMedia_id'
			},
			{
				fieldLabel: 'Client',
				name: 'esotw_printClient'
			},
			{
				xtype: 'textareafield',
				fieldLabel: 'Text',
				name: 'esotw_printDescription'
			},{
				xtype: 'xluerzer_image',
				fieldLabel: 'Preview',
				width:100,
				height:100
			}

			]
		});


		this.panel_details_spot = Ext.widget({

			border: false,
			columnWidth: 0.33,
			minWidth: 360,
			xtype: 'form',
			height: '100%',
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},
			items: [
			{
				xtype: 'text',
				text: 'Spot of the week',
				height: 50
			},
			{
				xtype: 'xluerzer_submission_id',
				fieldLabel: 'Submission ID',
				name: 'esotw_spotSubmission_id',
				displayPrint: 0,
				displayVideo: 1
			},
			{
				xtype: 'xluerzer_media_id',
				fieldLabel: 'Media ID',
				name: 'esotw_spotMedia_id'
			},
			{
				fieldLabel: 'Client',
				name: 'esotw_spotClient'
			},
			{
				fieldLabel: 'Title',
				name: 'esotw_spotTitle'
			},
			{
				xtype: 'textareafield',
				fieldLabel: 'Text',
				name: 'esotw_spotDescription'
			},{
				xtype: 'xluerzer_image',
				fieldLabel: 'Preview',
				width:178,
				height:100
			}
			]
		});

		this.panel_details_classic = Ext.widget({

			border: false,
			columnWidth: 0.33,
			minWidth: 360,
			xtype: 'form',
			height: '100%',
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},
			items: [
			{
				xtype: 'text',
				text: 'Classic spot of the week',
				height: 50
			},
			{
				xtype: 'xluerzer_submission_id',
				fieldLabel: 'Submission ID',
				name: 'esotw_classicSubmission_id',
				displayPrint: 0,
				displayVideo: 1
			},
			{
				xtype: 'xluerzer_media_id',
				fieldLabel: 'Media ID',
				name: 'esotw_classicMedia_id'
			},
			{
				fieldLabel: 'Client',
				name: 'esotw_classicClient'
			},
			{
				fieldLabel: 'Title',
				name: 'esotw_classicTitle'
			},
			{
				xtype: 'textareafield',
				fieldLabel: 'Text',
				name: 'esotw_classicDescription'
			},{
				xtype: 'xluerzer_image',
				fieldLabel: 'Preview',
				width:178,
				height:100
			}
			]
		});


		this.cb_active = Ext.id();
		this.cb_login = Ext.id();
		this.input_year = Ext.id();
		this.input_kw	= Ext.id();


		this.tab_details = Ext.widget({


			disabled: true,

			xtype: 'form',
			layout: 'column',

			defaults: {
				layout: 'anchor',
				defaults: {
					anchor: '100%',

				},
				bodyPadding: 20,
			},


			title: 'Details',
			autoScroll: true,
			items: [

			this.panel_details_print,
			this.panel_details_spot,
			this.panel_details_classic

			],

			tbar: ['Active',
			{
				uncheckedValue: 0,
				inputValue: '1',
				name: 'esotw_active',
				id: this.cb_active,
				xtype: 'checkbox'
			},'Must login',
			{
				uncheckedValue: 0,
				inputValue: '1',
				name: 'esotw_login',
				id: this.cb_login,
				xtype: 'checkbox'
			},'-','Year:',{
				id:this.input_year,
				xtype: 'numberfield',
				hideTrigger: true,
				name : 'esotw_year'
			},'KW:',{
				id:this.input_kw,
				xtype: 'numberfield',
				name : 'esotw_kw'
			},'->',{
				text: 'Save',
				iconCls: 'xf_save',
				scope: this,
				handler: function() {
					this.saveDetails();
				},

			}
			],

			listeners: {

				scope: this,
				afterrender: function() {

				} // afterrender
			}

		});


	},

	saveDetails: function()
	{

		var data = this.tab_details.getForm().getValues();
		console.info('save',this.esotw_id,data);

		this.masterTab.mask("saving data ...");
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('adsoftheweek/details/save'),
			params : {
				esotw_id: this.esotw_id,
				data: Ext.encode(data)
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
				this.loadDetails();
			}
		});

	},


	open: function()
	{

		var me = this;
		var title = 'Ads of the week';

		xluerzer.getInstance().saveLastCommand({
			title: title,
			classx: 'xluerzer_adsoftheweek',
			fn: 'open'
		});

		this.getTab_overview();
		this.getTab_details();

		this.masterTab = Ext.create('Ext.tab.Panel', {
			activeTab: 0,
			title: 'Ads of the week',
			layout: 'fit',
			items: [this.grid_overview, this.tab_details],
			plugins: Ext.create('Ext.ux.TabCloseMenu'),
			listeners: {

				scope: this,
				afterrender: function() {
					//this.openDetails();
				} // afterrender


			}
		});

		xluerzer.getInstance().showContent(this.masterTab);

	},


	openDetails: function(esotw_id)
	{
		console.log("opening "+esotw_id);
		this.esotw_id = esotw_id;
		this.loadDetails();

		var me = this;

	},

	openDetailsById: function(esotw_id)
	{

		console.log("opening from frontpageconfig "+esotw_id);
		this.esotw_id = esotw_id;

		if (!this.masterTab)
		{
			this.open();
		}
		
		xluerzer.getInstance().showContent(this.masterTab);

		Ext.defer(this.loadDetails,100,this);

	},


	loadDetails: function() {

		var me = this;
		console.info("id:", this.esotw_id)
		this.masterTab.mask('Loading Ads of the week ...');
		xframe.ajax({
			scope: me,
			url: xluerzer.getInstance().getAjaxPath('adsoftheweek/details/load'),
			params : {
				esotw_id: this.esotw_id
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();

				if (!success) return;

				this.tab_details.setDisabled(false);
				this.tab_details.setTitle('Details '+json.record.esotw_date);
				this.masterTab.setActiveTab(this.tab_details);

				this.panel_details_print.getForm().setValues(json.record);
				this.panel_details_spot.getForm().setValues(json.record);
				this.panel_details_classic.getForm().setValues(json.record);


				Ext.getCmp(this.cb_active).setValue(json.record.esotw_active);
				Ext.getCmp(this.cb_login).setValue(json.record.esotw_login);

				Ext.getCmp(this.input_kw).setValue(json.record.esotw_kw);
				Ext.getCmp(this.input_year).setValue(json.record.esotw_year);


				this.panel_details_print.down('xluerzer_image').setValue("/xgo/xplugs/xluerzer/ajax/oe_media/imageRenderer_print/"+this.esotw_id+'?_dc='+new Date());
				this.panel_details_spot.down('xluerzer_image').setValue("/xgo/xplugs/xluerzer/ajax/oe_media/imageRenderer_spot/"+this.esotw_id+'?_dc='+new Date());
				this.panel_details_classic.down('xluerzer_image').setValue("/xgo/xplugs/xluerzer/ajax/oe_media/imageRenderer_classic/"+this.esotw_id+'?_dc='+new Date());


			}
		});

	},


}