var xluerzer_magazines = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_magazines";
		}

		this.getInstance = function(config) {
			return new xluerzer_magazines_(config);
			return instance;
		}
	}
})();

var xluerzer_magazines_ = function(config) {
	this.config = config || {};
};

xluerzer_magazines_.prototype = {


	publishStateRenderer: function(em_published)
	{
		if (em_published == 1) return 'Yes';
		return "No";
	},

	getTab_overview: function()
	{
		var grid_magazine = xframe_pattern.getInstance().genGrid({
			title: 'Magazines',
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			search: true,
			records_move: false,
			pager: true,
			button_add: true,
			fn_add: this.openDetails,
			fn_add_scope: this,
			xstore: {
				load: 		xluerzer.getInstance().getAjaxPath('magazines/overview/load?type=magazines'),
				insert: 	xluerzer.getInstance().getAjaxPath('magazines/overview/insert?type=magazines'),
				pid: 	'em_id',
				fields: [
				{name:'em_id', 				text:'ID', 				type: 'int',	width: 80},
				{name:'em_published', 		text:'Published', 		type: 'int',	width: 80, renderer: this.publishStateRenderer},
				{name:'em_cover_s_id', 		text:'Cover',			type: 'int', 	width: 170,		renderer: xluerzer_e.getInstance().renderer_magazinImg},
				{name:'em_year_edition', 	text:'Edition-Year',	type: 'string',	width: 100},
				{name:'em_type', 			text:'Type',			type: 'int', renderer: xluerzer_renderer.getInstance().renderer_type_magazines, flex: 1},
				],
				initSort: '[{"property":"em_year","direction":"DESC"},{"property":"em_edition","direction":"DESC"}]'
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					console.log("opening: "+record.data.em_id)
					this.openDetails(record.data.em_id);
				}
			}
		});

		grid_magazine.on('afterrender',function(){
			grid_magazine.getStore().load();
		},this);

		this.grid_magazines = grid_magazine;


		var grid_specials = xframe_pattern.getInstance().genGrid({
			title: 'Specials',
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			search: true,
			records_move: false,
			pager: true,
			fn_add: this.openDetails,
			fn_add_scope: this,
			button_add: true,
			xstore: {
				load: 		xluerzer.getInstance().getAjaxPath('magazines/overview/load?type=specials'),
				insert: 	xluerzer.getInstance().getAjaxPath('magazines/overview/insert?type=specials'),
				pid: 	'em_id',
				fields: [
				{name:'em_id', 				text:'ID', 				type: 'int',	width: 80},
				{name:'em_published', 		text:'Published', 		type: 'int',	width: 80, renderer: this.publishStateRenderer},
				{name:'em_cover_s_id', 		text:'Cover',			type: 'int', 	width: 170,		renderer: xluerzer_e.getInstance().renderer_magazinImg},
				{name:'em_year', 			text:'Year',			type: 'int',	width: 50},
				//{name:'em_edition', 		text:'Edition',			type: 'int', 	width: 50},
				{name:'em_type', 			text:'Type',			type: 'int', renderer: xluerzer_renderer.getInstance().renderer_type_magazines, flex: 1},
				//{name:'em_description', 	text:'Description',		type: 'text'},
				],
				initSort: '[{"property":"em_year","direction":"DESC"},{"property":"em_id","direction":"DESC"}]'
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					console.log("opening: "+record.data.em_id)
					this.openDetails(record.data.em_id);
				}
			}
		});

		grid_specials.on('afterrender',function(){
			grid_specials.getStore().load();
		},this);

		this.grid_specials = grid_specials;
	},


	getTab_details: function()
	{

		this.form_translations = Ext.widget({

			tbar: ['->',{
				text: 'Refresh',
				iconCls: 'xf_reload',
				scope: this,
				handler: function() {
					this.loadDetails(this.tab_website);
				}
			},'-',{
				text: 'Save Config',
				iconCls: 'xf_save',
				scope: this,
				handler: function() {
					this.saveDetails();
				}
			}],

			border: false,
			xtype: 'form',

			disabled: true,

			layout: 'column',
			defaults: {
				anchor: '100%',
				labelAlign: 'top'
			},
			bodyPadding: 20,

			title: 'Translations',
			autoScroll: true,

			items: [
			{
				columnWidth: 0.25,
				minWidth: 200,
				emptyText: 'please choose pdf...',
				xtype: 'xr_field_file',
				fieldLabel: 'Translation ES',
				cls: 'imageContainerBox',
				name: 'translation_sp_s_id'
			},{
				columnWidth: 0.25,
				minWidth: 200,
				emptyText: 'please choose pdf...',
				xtype: 'xr_field_file',
				fieldLabel: 'Translation FR',
				cls: 'imageContainerBox',
				name: 'translation_fr_s_id'
			},
			{
				columnWidth: 0.25,
				minWidth: 200,
				emptyText: 'please choose pdf...',
				xtype: 'xr_field_file',
				fieldLabel: 'Translation IT',
				cls: 'imageContainerBox',
				name: 'translation_it_s_id'
			},{
				columnWidth: 0.25,
				minWidth: 200,
				emptyText: 'please choose pdf...',
				xtype: 'xr_field_file',
				fieldLabel: 'Translation JP',
				cls: 'imageContainerBox',
				name: 'translation_jp_s_id'
			},
			{
				columnWidth: 0.25,
				minWidth: 200,
				emptyText: 'please choose pdf...',
				xtype: 'xr_field_file',
				fieldLabel: 'Translation RU',
				cls: 'imageContainerBox',
				name: 'translation_ru_s_id'
			}
			]
		});


		var descriptionImageContainer = Ext.widget({
			border: false,
			xtype: 'fieldcontainer',

			layout: 'column',
			defaults: {
				anchor: '100%',
				labelAlign: 'top',
			},
			bodyPadding: 20,

			items: [
			{
				columnWidth: 0.8,
				minWidth: 550,
				height: 230,
				padding: '0 20 0 0',
				xtype: 'xr_field_html',
				fieldLabel: 'Description',
				name: 'em_descripton'
			},
			{
				columnWidth: 0.2,
				minWidth: 200,
				align: 'right',
				pack: 'right',
				emptyText: 'please choose image...',
				xtype: 'xr_field_file',
				fieldLabel: 'Cover Image',
				cls: 'imageContainerBox',
				name: 'em_cover_s_id'
			}
			]
		});


		this.tab_details = Ext.widget({

			disabled: true,
			border: false,
			xtype: 'form',
			defaultType: 'textfield',

			layout: 'anchor',
			defaults: {
				anchor: '100%',
				labelAlign: 'top',
			},
			bodyPadding: 20,

			title: 'Config',
			autoScroll: true,

			items: [
			{
				fieldLabel: 'Name',
				name: 'em_name'
			},
			{
				fieldLabel: 'Type',
				name: 'em_type',
				xtype: 'xluerzer_magType',
				maxWidth: 300,
				width: 300
			},
			descriptionImageContainer,
			{
				xtype: 'numberfield',
				fieldLabel: 'Year',
				name: 'em_year',
				maxWidth: 300,
				width: 300
			},
			{
				xtype: 'numberfield',
				maxValue: 6,
				minValue: 1,
				fieldLabel: 'Edition',
				name: 'em_edition',
				maxWidth: 300,
				width: 300
			},{
				xtype: 'textfield',
				fieldLabel: 'Paywall Break: FILM (http://www.luerzersarchive.net/film_overview/)',
				name: 'em_paywall_break_film',
				maxWidth: 300,
				width: 300
			},
			{
				xtype: 'textfield',
				fieldLabel: 'Paywall Break: DIGITAL (http://www.luerzersarchive.net/digital_overview/)',
				name: 'em_paywall_break_digital',
				maxWidth: 300,
				width: 300
			}
			],

			tbar: ['->',{
				text: 'Refresh',
				iconCls: 'xf_reload',
				scope: this,
				handler: function() {
					this.loadDetails();
				}
			},'-',{
				text: 'Save Details',
				iconCls: 'xf_save',
				scope: this,
				handler: function() {
					this.saveDetails();
				}
			}],

		});


	},

	getTab_interviews: function()
	{

		this.tab_interviews = Ext.widget({
			disabled: true,
			border: false,
			xtype: 'form',
			defaultType: 'textfield',

			defaults: {
				anchor: '100%',
				labelAlign: 'top',
			},
			bodyPadding: 20,
			title: 'Interviews',
			autoScroll: true,

			items: [
			{
				xtype: 	'xluerzer_interview',
				name:	'interview',
				fieldLabel: 'Interview ID',
			},
			{
				xtype: 	'textfield',
				name:	'interview_partner',
				readOnly: true,
				maxWidth: 400,
				padding: '0 0 30 0',
				width: 400,
				fieldLabel: 'Interview Partner*',
			},
			{
				xtype: 	'xluerzer_digital_interview',
				name:	'digital_interview',
				fieldLabel: 'Digital Interview ID',
			},
			{
				xtype: 	'textfield',
				name:	'digital_interview_partner',
				readOnly: true,
				maxWidth: 400,
				width: 400,
				fieldLabel: 'Digital Interview Partner*',
			},
			{
				xtype: 'text',
				text: '* auto update after save',
				padding: '20 0 0 10'
			},
			],

			tbar: [{
				text: 'Save Interviews',
				iconCls: 'xf_save',
				scope: this,
				handler: function() {
					this.saveInterviews();
				},

			}],

		});

	},

	getTab_apps: function()
	{

		var me = this;
		var grid_apps = xframe_pattern.getInstance().genGrid({
			scope: me,
			disabled: true,
			title: 'Apps',
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			search: true,
			records_move: false,
			pager: true,
			toolbar_top2: [{
				text: 'Set next publish level',
				iconCls: 'xf_save',
				scope: this,
				handler: function() {

				},

			}],
			xstore: {
				scope: me,
				load: 	xluerzer.getInstance().getAjaxPath('magazines/apps/load'),
				pid: 	'eda_id',
				fields: [
				{name:'eda_id', 				text:'ID', 			type: 'int',		width: 80},
				
				
				{name:'eda_state',text:'State',width:80,renderer: this.digital_renderer_state},{name:'eda_year',text:'Year',width:80},{name:'eda_edition',text:'Edition',width:80},{name:'eda_title',text:'Title',width:150},{name:'eda_description',text:'Description',kickHtml:true},{name:'eda_modified_ts',text:'Modified on', width: 120},{name:'eda_created_ts',text:'Created on', width: 120},{name:'eda_preview_image',text:'Image',renderer: xluerzer_menu.getInstance().renderer_digital, width: 120},{name:'eda_img_gallery',text:'Other Images',  renderer: xluerzer_oe.getInstance().renderer_gallery},
				
				{name:'credits', 				text:'Credits', 	type: 'string'},
				
				],
				params: {

				},
			},
			listeners: {
				buffer: 1,
				afterrender: function(grid) {
					grid.getStore().load();
				},
				itemdblclick: function(g,record) {
					xluerzer_e.getInstance().open_app(record.data.eda_id);
				}
			}
		});

		this.tab_apps = grid_apps;

	},

	getTab_web: function()
	{

		var me = this;
		var grid_web = xframe_pattern.getInstance().genGrid({
			scope: me,
			disabled: true,
			title: 'Web',
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			search: true,
			records_move: false,
			pager: true,
			toolbar_top2: [{
				text: 'Set next publish level',
				iconCls: 'xf_save',
				scope: this,
				handler: function() {

				},

			}],
			xstore: {
				scope: me,
				load: 	xluerzer.getInstance().getAjaxPath('magazines/web/load'),
				pid: 	'edw_id',
				fields: [
				{name:'edw_id', 				text:'ID', 			type: 'int',		width: 80},
				{name:'edw_state',text:'State', width:80,renderer:  this.digital_renderer_state},{name:'edw_year',text:'Year',width:80},{name:'edw_edition',text:'Edition',width:80},{name:'edw_title',text:'Title',width:150},{name:'edw_description',text:'Description',kickHtml:true},{name:'edw_modified_ts',text:'Modified on', width: 120},{name:'edw_created_ts',text:'Created on', width: 120},{name:'edw_preview_image',text:'Image',renderer: xluerzer_menu.getInstance().renderer_digital,width: 120},{name:'edw_img_gallery',text:'Other Images',  renderer: xluerzer_oe.getInstance().renderer_gallery},
				{name:'credits', 				text:'Credits', 	type: 'string'},
				],
				params: {

				},
			},
			listeners: {
				buffer: 1,
				afterrender: function(grid) {
					grid.getStore().load();
				},
				itemdblclick: function(g,record) {
					xluerzer_e.getInstance().open_web(record.data.edw_id);
				}
			}
		});

		this.tab_web = grid_web;

	},

	handleFilter2: function(btn)
	{
		Ext.getCmp(this.btn_id_filter2).setText('Filter: <b>'+btn.text+'</b>');
		this.tab_students.getStore().proxy.extraParams['filter'] = btn.filter;
		this.tab_students.getStore().loadPage(1);
	},

	bulkChangeSubmission2: function(grid,type)
	{
		var formId = Ext.id();
		var items = [];

		switch (type)
		{
			case 'es_magazine_id':
			items = [{
				fieldLabel: 'Magazine',
				name: 'ess_magazine_id',
				xtype: 'xluerzer_magazine'
			}];
			break;
			case 'es_state':
			items = [{
				name: 'ess_state',
				fieldLabel: 'Submission State',
				xtype: 'xluerzer_submission_state'
			}];
			break;
			default:
			xframe.alert("Internal Error @bulkChangeSubmission",type+" unset");
			return;
		}

		var ids = [];
		Ext.each(grid.getSelectionModel().getSelection(),function(r){
			ids.push(r.data['es_id']);
		},this);

		var win = Ext.create('widget.window', {
			title: 'Bulk Change',
			closable: true,
			width: 300,
			height: 150,
			layout: 'border',
			items: [{
				id: formId,
				bodyStyle: 'padding: 10px;',
				xtype: 'form',
				region: 'center',
				items: items
			}],
			modal: true,
			bbar: ['->',{
				iconCls: 'xf_change',
				text: 'change <b>'+ids.length+'</b> submissions',
				scope: this,
				handler: function() {

					var values = Ext.getCmp(formId).getForm().getValues();
					var cfg = {
						ids: ids,
						type: type,
						values: values
					}

					win.mask("Changing submissions ...");
					xframe.ajax({
						scope: this,
						url: xluerzer.getInstance().getAjaxPath('students/bulkChange/'),
						params : {
							cfg: Ext.encode(cfg)
						},
						stateless: function(success, json)
						{
							grid.getStore().load();
							win.unmask();
							win.close();
							if (!success) return;
						}
					});

				}
			}]
		});

		win.show();

	},







	getTab_students: function()
	{
		var me = this;

		this.btn_id_bulk2 	= Ext.id();
		this.btn_id_filter2 	= Ext.id();

		this.currentSubmissionFilter2   = 4;

		var grid_students = xframe_pattern.getInstance().genGrid({
			scope: me,
			disabled: true,
			title: 'Submissions: Students',
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			search: true,
			records_move: false,
			pager: true,

			selModelButtons:[this.btn_id_bulk],

			toolbar_top: [

			{
				id: this.btn_id_filter2,
				text: 'Filter: <b>Preselected</b>',
				iconCls: 'xf_filter',
				scope: this,
				menu: [

				{
					text: 'All',
					filter: 0,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter2(btn);
					}
				},
				{
					text: 'Submitted',
					filter: 1,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter2(btn);
					}
				},
				{
					text: 'Pre-Selected',
					filter: 4,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter2(btn);
					}
				},
				{
					text: 'Selected',
					filter: 5,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter2(btn);
					}
				},
				{
					text: 'Published',
					filter: 9,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter2(btn);
					}
				},
				{
					text: 'Pending',
					filter: 7,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter2(btn);
					}
				},
				{
					text: 'Not-Selected',
					filter: 3,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter2(btn);
					}
				},
				{
					text: 'Withdrawn',
					filter: 8,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter2(btn);
					}
				}
				]
			},

			{
				iconCls: 'xf_bulk',
				id: this.btn_id_bulk2,
				disabled: true,
				text: 'Bulk Modification',
				menu: [{
					text: 'Change Status',
					scope: this,
					handler: function()
					{
						this.bulkChangeSubmission2(this.tab_submissions,'ess_state');
					}
				}]
			}



			],


			xstore: {
				scope: me,
				load: 	xluerzer.getInstance().getAjaxPath('magazines/students/load'),
				pid: 	'ess_id',
				fields: [
				{name:'ess_id', 				text:'Submission ID', 	type: 'int',	width: 140},
				{name:'ess_id', 				text:'Image', 			type: 'int',	width: 180,		renderer: xluerzer_students.getInstance().renderer_submission_small},
				{name:'ess_mediaType_id', 		text:'Media Type', 		type: 'int',	renderer:  xluerzer_students.getInstance().renderer_submission_mediaType},
				{name:'ess_product', 			text:'Title', 			type: 'string'},
				],
				params: {
					filter: this.currentSubmissionFilter2,
					em_id: this.em_id
				},
			},
			listeners: {
				buffer: 1,
				itemdblclick: function(g,record) {
					// this.openDetails(record.data.em_id);
					xluerzer_students_detail.getInstance().open(record.data.ess_id);
				}
			}
		});

		this.tab_students = grid_students;
	},




	handleFilter: function(btn)
	{
		Ext.getCmp(this.btn_id_filter).setText('Filter: <b>'+btn.text+'</b>');
		this.tab_submissions.getStore().proxy.extraParams['filter'] = btn.filter;
		this.tab_submissions.getStore().loadPage(1);
	},

	bulkChangeSubmission: function(grid,type)
	{
		var formId = Ext.id();
		var items = [];

		switch (type)
		{
			case 'es_campaign':
			items = [{
				fieldLabel: 'Campaign',
				name: 'es_campaign',
				xtype: 'textfield',
				allowBlank: false
			}];
			break;
			case 'es_magazine_id':
			items = [{
				fieldLabel: 'Magazine',
				name: 'es_magazine_id',
				xtype: 'xluerzer_magazine'
			}];
			break;
			case 'es_state':
			items = [{
				name: 'es_state',
				fieldLabel: 'Submission State',
				xtype: 'xluerzer_submission_state'
			}];
			break;
			default:
			xframe.alert("Internal Error @bulkChangeSubmission",type+" unset");
			return;
		}

		var ids = [];
		Ext.each(grid.getSelectionModel().getSelection(),function(r){
			ids.push(r.data['es_id']);
		},this);

		var win = Ext.create('widget.window', {
			title: 'Bulk Change',
			closable: true,
			width: 300,
			height: 150,
			layout: 'border',
			items: [{
				id: formId,
				bodyStyle: 'padding: 10px;',
				xtype: 'form',
				region: 'center',
				items: items
			}],
			modal: true,
			bbar: ['->',{
				iconCls: 'xf_change',
				text: 'change <b>'+ids.length+'</b> submissions',
				scope: this,
				handler: function() {

					var values = Ext.getCmp(formId).getForm().getValues();
					var cfg = {
						ids: ids,
						type: type,
						values: values
					}

					win.mask("Changing submissions ...");
					xframe.ajax({
						scope: this,
						url: xluerzer.getInstance().getAjaxPath('submissions/bulkChange/'),
						params : {
							cfg: Ext.encode(cfg),
							selector: false
						},
						stateless: function(success, json)
						{
							grid.getStore().load();
							win.unmask();
							win.close();
							if (!success) return;
						}
					});

				}
			}]
		});

		win.show();

	},


	getTab_submissions: function()
	{
		var me = this;

		this.btn_id_bulk 	= Ext.id();
		this.btn_id_filter 	= Ext.id();

		this.currentSubmissionFilter   = 4;



		this.tab_submissions = xframe_pattern.getInstance().genGrid({
			scope: me,
			disabled: true,
			title: 'Submissions: Print',
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			search: true,
			records_move: false,
			pager: true,

			selModelButtons:[this.btn_id_bulk],

			toolbar_top: [

			{
				filter: 0,
				text: 'All',
				scope: this,
				handler: function(btn)
				{
					this.handleFilter(btn);
				}
			},
			{
				filter: 5,
				text: 'Selected',
				scope: this,
				handler: function(btn)
				{
					this.handleFilter(btn);
				}
			},
			{
				filter: 4,
				text: 'Pre-Selected',
				scope: this,
				handler: function(btn)
				{
					this.handleFilter(btn);
				}
			},

			'-'

			,


			{
				id: this.btn_id_filter,
				text: 'Filter: <b>Preselected</b>',
				iconCls: 'xf_filter',
				scope: this,
				menu: [

				{
					text: 'All',
					filter: 0,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter(btn);
					}
				},{
					text: 'Submitted',
					filter: 1,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter(btn);
					}
				},
				{
					text: 'Pre-Selected',
					filter: 4,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter(btn);
					}
				},
				{
					text: 'Selected',
					filter: 5,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter(btn);
					}
				},
				{
					text: 'Published',
					filter: 9,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter(btn);
					}
				},{
					text: 'Unpublished',
					filter: 10,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter(btn);
					}
				},
				{
					text: 'Pending',
					filter: 7,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter(btn);
					}
				},
				{
					text: 'Not-Selected',
					filter: 3,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter(btn);
					}
				},
				{
					text: 'Withdrawn',
					filter: 8,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter(btn);
					}
				}
				]
			},

			{
				iconCls: 'xf_bulk',
				id: this.btn_id_bulk,
				disabled: true,
				text: 'Bulk Modification',
				menu: [{
					text: 'Change Status',
					scope: this,
					handler: function()
					{
						this.bulkChangeSubmission(this.tab_submissions,'es_state');
					}
				},{
					text: 'Change Campaign',
					scope: this,
					handler: function()
					{
						this.bulkChangeSubmission(this.tab_submissions,'es_campaign');
					}
				}]
			}



			],
			xstore: {
				scope: me,
				initSort: 'sort:[{"property":"es_modified_ts","direction":"DESC"}]',
				load: 	xluerzer.getInstance().getAjaxPath('magazines/submissions/load'),
				pid: 	'es_id',
				fields: [
				{name:'es_modified_ts', 	text:'Modifed', 		type: 'string',	width: 180},
				{name:'es_id', 				text:'Image', 			type: 'int',	width: 180,		renderer: xluerzer_submissions.getInstance().renderer_submission_small},
				{name:'es_id', 				text:'Submission ID', 	type: 'int',	width: 140},
				{name:'es_state', 			text:'State', 			type: 'int',	width: 140,  renderer: xluerzer_submissions.getInstance().renderer_submission_state},
				{name:'es_fe_user_id', 		text:'Fe-USER-ID', 		type: 'string',	width: 200},
				{name:'es_submittedBy', 	text:'Submitter', 		type: 'string',	width: 200},
				//{name:'es_mediaType_id', 	text:'Media Type', 		type: 'int',	renderer: xluerzer_submissions.getInstance().renderer_submission_mediaType},
				{name:'credit_client', 		text:'Client', 		    type: 'string'},
				{name:'es_campaign', 		text:'Campaign - User', 		type: 'string'},
				{name:'es_campaign_admin', 	text:'Campaign - Backend', 		type: 'string', renderer: this.campaign_renderer},
				{name:'es_ad_title', 		text:'AD Title - User', 		type: 'string'},
				{name:'es_ad_title_admin', 	text:'AD Title - Backend', 		type: 'string'},
				],
				params: {
					es_mediaType_id: 1,
					filter: this.currentSubmissionFilter,
					em_id: this.em_id
				},
			},
			listeners: {
				buffer: 1,
				afterrender: function(grid) {
					grid.getStore().load();
				},
				itemdblclick: function(g,record) {
					xluerzer_submissions_detail.getInstance().open(record.data.es_id);
				}
			}
		});

	},


	handleFilter3: function(btn)
	{
		Ext.getCmp(this.btn_id_filter3).setText('Filter: <b>'+btn.text+'</b>');
		this.tab_submissions_film.getStore().proxy.extraParams['filter'] = btn.filter;
		this.tab_submissions_film.getStore().loadPage(1);
	},

	campaign_renderer: function(v,td)
	{
		v = (v.split(' ').join(''));

		if (v == "")
		{
			td.style = "background-color:#CCFF66;";
			return "Missing!";
		}

		return v;
	},

	getTab_submissions_film: function()
	{
		var me = this;

		this.btn_id_bulk3 	= Ext.id();
		this.btn_id_filter3	= Ext.id();

		this.currentSubmissionFilter3   = 4;



		this.tab_submissions_film = xframe_pattern.getInstance().genGrid({
			scope: me,
			disabled: true,
			title: 'Submissions: Film',
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			search: true,
			records_move: false,
			pager: true,

			selModelButtons:[this.btn_id_bulk3],

			toolbar_top: [

			{
				id: this.btn_id_filter3,
				text: 'Filter: <b>Preselected</b>',
				iconCls: 'xf_filter',
				scope: this,
				menu: [

				{
					text: 'All',
					filter: 0,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter3(btn,this.tab_submissions_film);
					}
				},

				{
					text: 'Submitted',
					filter: 1,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter3(btn,this.tab_submissions_film);
					}
				},
				{
					text: 'Pre-Selected',
					filter: 4,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter3(btn,this.tab_submissions_film);
					}
				},
				{
					text: 'Selected',
					filter: 5,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter3(btn,this.tab_submissions_film);
					}
				},
				{
					text: 'Published',
					filter: 9,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter3(btn,this.tab_submissions_film);
					}
				},
				{
					text: 'Unpublished',
					filter: 10,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter3(btn,this.tab_submissions_film);
					}
				},
				{
					text: 'Pending',
					filter: 7,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter3(btn,this.tab_submissions_film);
					}
				},
				{
					text: 'Not-Selected',
					filter: 3,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter3(btn,this.tab_submissions_film);
					}
				},
				{
					text: 'Withdrawn',
					filter: 8,
					scope: this,
					handler: function(btn)
					{
						this.handleFilter3(btn,this.tab_submissions_film);
					}
				}
				]
			},

			{
				iconCls: 'xf_bulk',
				id: this.btn_id_bulk3,
				disabled: true,
				text: 'Bulk Modification',
				menu: [{
					text: 'Change Status',
					scope: this,
					handler: function()
					{
						this.bulkChangeSubmission(this.tab_submissions_film,'es_state');
					}
				},{
					text: 'Change Campaign',
					scope: this,
					handler: function()
					{
						this.bulkChangeSubmission(this.tab_submissions,'es_campaign');
					}
				}]
			}



			],
			xstore: {
				scope: me,
				initSort: 'sort:[{"property":"es_modified_ts","direction":"DESC"}]',
				load: 	xluerzer.getInstance().getAjaxPath('magazines/submissions/load'),
				pid: 	'es_id',
				fields: [
				{name:'es_modified_ts', 	text:'Modifed', 		type: 'string',	width: 180},
				{name:'es_id', 				text:'Image', 			type: 'int',	width: 180,		renderer: xluerzer_submissions.getInstance().renderer_submission_small},
				{name:'es_id', 				text:'Submission ID', 	type: 'int',	width: 140},
				{name:'es_state', 			text:'State', 			type: 'int',	width: 140,  renderer: xluerzer_submissions.getInstance().renderer_submission_state},
				{name:'es_fe_user_id', 		text:'Fe-USER-ID', 		type: 'string',	width: 200},
				{name:'es_submittedBy', 	text:'Submitter', 		type: 'string',	width: 200},
				//{name:'es_mediaType_id', 	text:'Media Type', 		type: 'int',	renderer: xluerzer_submissions.getInstance().renderer_submission_mediaType},
				{name:'credit_client', 		text:'Client', 		    type: 'string'},
				{name:'es_campaign', 		text:'Campaign - User', 		type: 'string'},
				{name:'es_campaign_admin', 	text:'Campaign - Backend', 		type: 'string', renderer: this.campaign_renderer},
				{name:'es_ad_title', 		text:'AD Title - User', 		type: 'string'},
				{name:'es_ad_title_admin', 	text:'AD Title - Backend', 		type: 'string'},
				],
				params: {
					es_mediaType_id: 2,
					filter: this.currentSubmissionFilter3,
					em_id: this.em_id
				},
			},
			listeners: {
				buffer: 1,
				afterrender: function(grid) {
					grid.getStore().load();
				},
				itemdblclick: function(g,record) {
					xluerzer_submissions_detail.getInstance().open(record.data.es_id);
				}
			}
		});

	},

	getTab_preSelected: function()
	{
		var me = this;
		this.tab_submissions_pre = xframe_pattern.getInstance().genGrid({
			scope: me,
			disabled: true,
			title: 'Submissions (PRESELECTED)',
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			search: true,
			records_move: false,
			pager: true,
			toolbar_top: [{
				text: 'Set next publish level',
				iconCls: 'xf_save',
				scope: this,
				handler: function() {

				},

			}],
			xstore: {
				scope: me,
				load: 	xluerzer.getInstance().getAjaxPath('magazines/preselections/load'),
				pid: 	'es_id',
				fields: [
				{name:'es_id', 				text:'Submission ID', 	type: 'int',	width: 140},
				{name:'es_id', 				text:'Image', 			type: 'int',	width: 180,		renderer: xluerzer_submissions.getInstance().renderer_submission_small},
				{name:'es_mediaType_id', 	text:'Media Type', 		type: 'int',	renderer: xluerzer_submissions.getInstance().renderer_submission_mediaType},
				{name:'es_product', 		text:'Product', 		type: 'string'},
				],
				params: {
					em_id: this.em_id
				},
			},
			listeners: {
				buffer: 1,
				afterrender: function(grid) {
					grid.getStore().load();
				},
				itemdblclick: function(g,record) {
					xluerzer_submissions_detail.getInstance().open(record.data.es_id);
				}
			}
		});

	},

	getTab_selected: function()
	{
		var me = this;
		this.tab_submissions_sel = xframe_pattern.getInstance().genGrid({
			scope: me,
			disabled: true,
			title: 'Submissions (SELECTED)',
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			search: true,
			records_move: false,
			pager: true,
			toolbar_top: [{
				text: 'Set next publish level',
				iconCls: 'xf_save',
				scope: this,
				handler: function() {

				},

			}],
			xstore: {
				scope: me,
				load: 	xluerzer.getInstance().getAjaxPath('magazines/selections/load'),
				pid: 	'es_id',
				fields: [
				{name:'es_id', 				text:'Submission ID', 	type: 'int',	width: 140},
				{name:'es_id', 				text:'Image', 			type: 'int',	width: 180,		renderer: xluerzer_submissions.getInstance().renderer_submission_small},
				{name:'es_mediaType_id', 	text:'Media Type', 		type: 'int',	renderer: xluerzer_submissions.getInstance().renderer_submission_mediaType},
				{name:'es_product', 		text:'Product', 		type: 'string'},
				],
				params: {
					em_id: this.em_id
				},
			},
			listeners: {
				buffer: 1,
				afterrender: function(grid) {
					grid.getStore().load();
				},
				itemdblclick: function(g,record) {
					xluerzer_submissions_detail.getInstance().open(record.data.es_id);
				}
			}
		});
	},

	getTab_published: function()
	{
		var me = this;
		this.tab_published = xframe_pattern.getInstance().genGrid({
			scope: me,
			disabled: true,
			title: 'Submissions (PUBLISHED)',
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			search: true,
			records_move: false,
			pager: true,
			xstore: {
				scope: me,
				load: 	xluerzer.getInstance().getAjaxPath('magazines/published/load'),
				pid: 	'es_id',
				fields: [
				{name:'es_id', 				text:'Submission ID', 	type: 'int',	width: 140},
				{name:'es_id', 				text:'Image', 			type: 'int',	width: 180,		renderer: xluerzer_submissions.getInstance().renderer_submission_small},
				{name:'es_mediaType_id', 	text:'Media Type', 		type: 'int',	renderer: xluerzer_submissions.getInstance().renderer_submission_mediaType},
				{name:'es_product', 		text:'Product', 		type: 'string'},
				],
				params: {
					em_id: this.em_id
				},
			},
			listeners: {
				buffer: 1,
				afterrender: function(grid) {
					grid.getStore().load();
				},
				itemdblclick: function(g,record) {
					xluerzer_submissions_detail.getInstance().open(record.data.es_id);
				}
			}
		});
	},


	publish: function(check)
	{
		//Ext.get(this.infoPanelId).update('xxx');

		if (check == 0)
		{
			window.open(xluerzer.getInstance().getAjaxPath('magazines/publish')+'?check=0&em_id='+this.em_id,'PUBLISH_'+this.em_id);
			return;
		}
		
		var me = this;
		this.masterTab.mask('Loading Magazine ...');
		xframe.ajax({
			scope: me,
			url: xluerzer.getInstance().getAjaxPath('magazines/publish'),
			params : {
				em_id: this.em_id,
				check: check
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
				this.tab_publish.setSource(json.publish);


				if (!json.publish_state)
				{
					if (''+check == '2')
					{
						xframe.info("Publish","Magazine publishd with Errors ! Please fix errors ....");
					}
					else if(''+check == '1' && json.no_errors_found)
					{
						xframe.alert("Publish","No Errors found - ready for publishing! Please press 'Publish'-Button");
					}
					else
					{
						xframe.alert("Publish","Magazine cannot be publishd. Please fix errors first.");
					}
				}
			}
		});

	},

	getTab_publish: function()
	{

		this.infoPanelId = Ext.id();
		this.tab_publish = Ext.widget({

			disabled: true,
			border: false,
			xtype: 'propertygrid',
			defaultType: 'textfield',

			layout: 'fit',
			defaults: {
				anchor: '100%',
			},

			title: 'Publish',

			tbar: [{
				text: 'Check',
				iconCls: 'xf_reload',
				scope: this,
				handler: function() {
					this.publish(1);
				},

			},{
				text: 'Publish',
				iconCls: 'xl_publish',
				scope: this,
				handler: function() {
					this.publish(0);
				},

			}]

		});

	},


	multiSubs: function(vals)
	{

		var ids = vals.split(',');
		var html = "<div class='submission_by_campaing'>";

		Ext.each(ids,function(value){
			var url 	= xluerzer.getInstance().getAjaxPath('submissions/img_small/'+value);
			var urlBig 	= "xluerzer_submissions_detail.getInstance().open("+value+");";
			html += "<a href='#' onclick='"+urlBig+"' title='open submission'><img width=150 height=150 src='"+url+"'></a>";
		},this);

		html += "</div>";

		return html;

	},

	getTab_campaign: function()
	{

		var me = this;
		this.tab_campaigns = xframe_pattern.getInstance().genGrid({
			scope: me,
			disabled: true,
			title: 'Submission: Check',
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			search: true,
			records_move: false,
			pager: true,
			toolbar_top: [{
				iconCls: 'xl_copy_right',
				text: 'AUTO-Campaign',
				scope: this,
				handler: function()
				{

					this.masterTab.mask('please wait ...');
					xframe.ajax({
						scope: this,
						url: xluerzer.getInstance().getAjaxPath('magazines/autoCampaign'),
						params : {
							em_id: this.em_id
						},
						stateless: function(success, json)
						{
							this.tab_campaigns.getStore().loadPage(1);
							this.masterTab.unmask();
							if (!success) return;
						}
					});


				}
			}],
			xstore: {
				initSort:'[{"property":"ac_name","direction":"ASC"},{"property":"es_archivNr","direction":"ASC"}]',
				scope: me,
				load: 	xluerzer.getInstance().getAjaxPath('magazines/campaign_view'),
				pid: 	'es_campaign',
				fields: [
				
				{name:'es_id', 				text:'ID', 	type: 'string',	width: 50},
				{name:'es_campaign_admin', 	text:'Campaign', 	type: 'string',	width: 150},
				
				{name:'fe_users_ids', 		text:'Fe-ID', 		type: 'string',	width: 40},
				
				{name:'es_archivNr', 		text:'Archive-NR', type: 'string',	width: 70},
				{name:'ac_name', 			text:'Category', type: 'string',	width: 70},
				{name:'es_infotext', 		text:'Infotext', type: 'string',	width: 150, resizable: true},
				
				
				{name:'credits', 			text:'Credits', type: 'string',	flex:1 },
				{name:'cntx', 				text:'Count', 		type: 'int',	width: 45},
				{name:'es_ids', 			text:'Artworks', 	type: 'string',	flex: 1, renderer: this.multiSubs},
				
				],
				params: {
					em_id: this.em_id
				},
			},
			listeners: {
				buffer: 1,
				afterrender: function(grid) {
					grid.getStore().load();
				}
			}
		});

	},


	open: function()
	{

		var me = this;
		title = 'Publishing Products';

		xluerzer.getInstance().saveLastCommand({
			title: title,
			classx: 'xluerzer_magazines',
			fn: 'open'
		});

		this.getTab_publish();
		this.getTab_fp();
		this.getTab_overview();
		this.getTab_details();
		this.getTab_preSelected();
		this.getTab_selected();
		this.getTab_submissions();
		this.getTab_submissions_film();
		this.getTab_campaign();
		this.getTab_published();
		this.getTab_interviews();
		this.getTab_apps();
		this.getTab_web();
		this.getTab_students();


		this.tpanel_preview 	= xluerzer_gui.getInstance().getDefaultTabPanel_preview({at_id:8},this.em_id);
		this.tpanel_preview.disabled = true;

		
		
		this.tab_website = Ext.create('Ext.tab.Panel', {
			disabled: true,
			activeTab: 0,
			title: 'Translations',
			layout: 'fit',
			items: [this.form_translations, this.tpanel_preview, this.form_frontpage]
		});
		
		
		
		

		this.masterTab = Ext.create('Ext.tab.Panel', {
			activeTab: 0,
			title: title,
			layout: 'fit',
			items: [this.grid_magazines, this.grid_specials,  this.tab_details, this.tab_website, this.tab_submissions,this.tab_submissions_film, this.tab_students, this.tab_campaigns, this.tab_interviews, this.tab_apps, this.tab_web, this.tab_publish],
			plugins: Ext.create('Ext.ux.TabCloseMenu'),
			listeners: {

				scope: this,
				afterrender: function() {

				}
			}
		});

		xluerzer.getInstance().showContent(this.masterTab);

	},


	openDetails: function(em_id)
	{
		this.em_id = em_id;
		console.log("openDetails: "+this.em_id)
		this.loadDetails();

	},


	saveDetails: function()
	{
		var data = this.tab_details.getForm().getValues();
		var data2 = this.form_translations.getForm().getValues();

		Ext.iterate(data2,function(k,v){
			data[k] = v;
		},this);



		console.info('data',data);

		this.masterTab.mask('Saving Details ...');
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('magazines/save_detail'),
			params : {
				em_id: this.em_id,
				data: Ext.encode(data)
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
			}
		});

		
		top.flushMagStores();
		
	},

	saveInterviews: function()
	{
		var data = this.tab_interviews.getForm().getValues();
		console.info('data',data);

		this.masterTab.mask('Saving Interviews ...');
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('magazines/save_interviews'),
			params : {
				em_id: this.em_id,
				data: Ext.encode(data)
			},
			stateless: function(success, json)
			{
				this.tab_interviews.getForm().setValues(json.record);
				this.masterTab.unmask();
				if (!success) return;
			}
		});

	},

	saveFP: function()
	{
		var data = this.form_frontpage.getForm().getValues();
		console.info('data',data);

		this.masterTab.mask('Saving Frontpage Config ...');
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('magazines/save_fp'),
			params : {
				em_id: this.em_id,
				data: Ext.encode(data)
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
			}
		});

	},


	getTab_fp: function()
	{

		this.form_frontpage = Ext.widget({

			title: 'Frontpage-Config',
			disabled: true,
			border: false,
			xtype: 'form',
			defaults: {
				anchor: '100%',
				labelAlign: 'top'
			},
			bodyPadding: 20,
			autoScroll: true,

			tbar: ['->',{

				text: 'Save Frontpage-Config',
				handler: this.saveFP,
				scope: this,
				iconCls: 'xf_save'

			}],

			items: [

			{
				boxLabel  : 'show on frontpage',
				xtype: 'checkbox',
				name: 'em_frontpage_publish',
				inputValue: 1,
				uncheckedValue: 0
			},

			{
				emptyText: 'title',
				xtype: 'textfield',
				fieldLabel: 'Title',
				name: 'em_frontpage_title'
			},


			{
				xtype: 'xr_field_file',
				fieldLabel: 'Image',
				name: 'em_frontpage_s_id'
			},


			{
				emptyText: 'short description',
				xtype: 'xr_field_html',
				fieldLabel: 'Text',
				name: 'em_frontpage_text',
				height: 200
			},


			]
		});

	},

	loadDetails: function(activeTab) {

		if (typeof activeTab == 'undefined')
		{
			var activeTab = this.tab_details;	
		}

		var me = this;

		this.masterTab.mask('Loading Magazine ...');
		xframe.ajax({
			scope: me,
			url: xluerzer.getInstance().getAjaxPath('magazines/details/load'),
			params : {
				em_id: this.em_id
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;

				this.tpanel_preview.setDisabled(false);
				this.form_translations.setDisabled(false);
				this.tab_publish.setDisabled(false);
				this.tab_published.setDisabled(false);
				this.form_frontpage.setDisabled(false);
				this.tab_details.setDisabled(false);
				this.tab_submissions.setDisabled(false);
				this.tab_submissions_film.setDisabled(false);
				this.tab_submissions_sel.setDisabled(false);
				this.tab_submissions_pre.setDisabled(false);
				this.tab_interviews.setDisabled(false);
				this.tab_apps.setDisabled(false);
				this.tab_web.setDisabled(false);
				this.tab_students.setDisabled(false);
				this.tab_campaigns.setDisabled(false);

				var titelZusatz = json.record.em_year+'/'+json.record.em_edition;

				var shownName = json.record.em_name;
				if (shownName == '') shownName = json.record.em_id;

				this.tab_details.setTitle('Config :: '+shownName);

				titelZusatz = "";

				//this.tab_submissions.setTitle('Submissions '+ titelZusatz);
				//this.tab_interviews.setTitle('Interviews '+ titelZusatz);
				//this.tab_apps.setTitle('Apps '+ titelZusatz);
				//this.tab_web.setTitle('Web '+ titelZusatz);
				//this.tab_students.setTitle('Students '+ titelZusatz);

				
				//this.masterTab.setActiveTab(this.tab_details);
				this.masterTab.setActiveTab(activeTab);
				
				this.tab_details.getForm().setValues(json.record);
				this.form_frontpage.getForm().setValues(json.record);
				this.tab_interviews.getForm().setValues(json.record);
				this.form_translations.getForm().setValues(json.record);

				// JSON DECODE umtaufen auf : translation_jp_s_id
				// setvalue

				this.tab_campaigns.getStore().proxy.extraParams['em_id'] 		= this.em_id;
				this.tab_campaigns.getStore().loadPage(1);

				this.tab_submissions.getStore().proxy.extraParams['em_id'] 		= this.em_id;
				this.tab_submissions.getStore().loadPage(1);

				this.tab_submissions_film.getStore().proxy.extraParams['em_id'] 		= this.em_id;
				this.tab_submissions_film.getStore().loadPage(1);

				this.tab_apps.getStore().proxy.extraParams['em_id'] 			= this.em_id;
				this.tab_apps.getStore().loadPage(1);
				this.tab_web.getStore().proxy.extraParams['em_id'] 				= this.em_id;
				this.tab_web.getStore().loadPage(1);
				this.tab_students.getStore().proxy.extraParams['em_id'] 		= this.em_id;
				this.tab_students.getStore().loadPage(1);

				this.tab_website.setDisabled(false);
				
				this.tpanel_preview.loadOtherId(this.em_id);

			}
		});

	},


}