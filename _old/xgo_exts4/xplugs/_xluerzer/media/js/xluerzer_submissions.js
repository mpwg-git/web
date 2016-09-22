var xluerzer_submissions = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_submissions";
		}

		this.getInstance = function(config) {

			var instance = new xluerzer_submissions_(config);
			return instance;
		}
	}
})();

var xluerzer_submissions_ = function(config) {
	this.config = config || {};
};

xluerzer_submissions_.prototype = {

	openGrid_dayOverview: function()
	{
		var selModel = Ext.create('Ext.selection.CheckboxModel', {
			singleSelect: true,
			checkOnly: false,
			forceFit: true,
			autoScroll: true,
			listeners: {
				selectionchange: function(sm, selections) {
				}
			}
		});

		var fields= [
		{name: 'dayx', 						type: 'string'},
		{name: 'total_submissions',     	type: 'int'},
		{name: 'total_submitter',       	type: 'int'},
		{name: 'total_print',       		type: 'int'},
		{name: 'total_print_submitter', 	type: 'int'},
		{name: 'total_tv',       			type: 'int'},
		{name: 'total_tv_submitter',    	type: 'int'},
		{name: 'total_specials',       		type: 'int'},
		{name: 'total_specials_submitter',  type: 'int'},
		{name: 'total_students',       		type: 'int'},
		{name: 'total_students_submitter',  type: 'int'}
		];

		var store = xframe.getGridStoreByConfig({
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('submissions/day_overview/load'),
				pid: 	'es_id',
				fields: fields,
				params: {
				}
			}
		});


		var w = 100;

		var submissionGrid = Ext.create('Ext.grid.Panel', {
			border: false,
			store: store,
			forceFit: true,
			pager: true,
			columnLines: true,
			columns: [

			{
				text: 'Date',
				maxWidth: 75,
				dataIndex: 'dayx'
			},

			{
				text: '<b>Total</b>',
				columns: [{
					width: w,
					text     : 'Submissions',
					dataIndex: 'total_submissions'
				}, {
					width: w,
					text     : 'Submitter',
					dataIndex: 'total_submitter'
				}]
			},

			{
				text: '<b>Print</b>',
				columns: [{
					width: w,
					text     : 'Submissions',
					dataIndex: 'total_print'
				}, {
					width: w,
					text     : 'Submitter',
					dataIndex: 'total_print_submitter'
				}]
			},

			{
				text: '<b>TV</b>',
				columns: [{
					width: w,
					text     : 'Submissions',
					dataIndex: 'total_tv'
				}, {
					width: w,
					text     : 'Submitter',
					dataIndex: 'total_tv_submitter'
				}]
			},

			{
				text: '<b>Specials</b>',
				columns: [{
					width: w,
					text     : 'Submissions',
					dataIndex: 'total_specials'
				}, {
					width: w,
					text     : 'Submitter',
					dataIndex: 'total_specials_submitter'
				}]
			},

			{
				text: '<b>Students</b>',

				columns: [
				{
					width: w,
					text     : 'Submissions',
					dataIndex: 'total_students'
				},

				{
					width: w,
					text     : 'Submitter',
					dataIndex: 'total_students_submitter'
				}
				]
			}
			],
			title: 'Submissions Day Overview',
			viewConfig: {
				stripeRows: true
				//,enableTextSelection: true
			},
			tbar: [{
				xtype: 'pagingtoolbar',
				border: false,
				flex: 1,
				pageSize: 100,
				store: store,
				displayInfo: true,
				plugins: Ext.create('Ext.ux.ProgressBarPager', {}),
				displayMsg: '{0} - {1} of {2}'
			}],
			bbar: [{
				xtype: 'pagingtoolbar',
				border: false,
				flex: 1,
				pageSize: 100,
				store: store,
				displayInfo: true,
				plugins: Ext.create('Ext.ux.ProgressBarPager', {}),
				displayMsg: '{0} - {1} of {2}'
			}],
			listeners: {
				scope: this,
				buffer: 1,
				afterrender:function() {
					store.load();
				},
				itemdblclick: function(g,record) {
					this.openGrid_day(record.data.dayx);
				}
			}
		});

		xluerzer.getInstance().showContent(submissionGrid);
	},

	renderer_submission_small: function(value2,td,r) {
		var value = r.data.es_id + '?mod=' + r.data.es_modified_ts;
		var url = xluerzer.getInstance().getAjaxPath('submissions/img_small/'+value);
		var urlBig = xluerzer.getInstance().getAjaxPath('submissions/img_orig/'+value);
		return "<div class='submission_preview'><a href='"+urlBig+"' target='_blank'><img width=150 height=150 src='"+url+"'></a></div>";
	},

	renderer_submission_film_small: function(value2,td,r) {
		var value = r.data.es_id;
		var url = xluerzer.getInstance().getAjaxPath('submissions/img_small/'+value);
		var urlBig 	= "xluerzer_submissions_detail.getInstance().open("+value+");";
		return "<div class='submission_preview'><a onclick='"+urlBig+"' href='#'><img width=150 height=150 src='"+url+"'></a></div>";
	},

	renderer_submission_state: function(value) {
		switch(''+value)
		{
			case '1': return "submitted";
			case '2': return "waiting for credits";
			case '3': return "not selected";
			case '4': return "preselected";
			case '5': return "selected";
			case '6': return "technicol error/no image";
			case '7': return "<span class='pending'>pending review</span>";
			case '8': return "<span class='draft'>withdrawn</span>";
			case '9': return "Published";
			case '10': return "Unpublished";
			default: return "unknown";
		}
	},

	renderer_submission_mediaType: function(value) {
		switch(''+value)
		{
			case '1': return "Image";
			case '2': return "Video";
			default: return "unknown";
		}
	},

	bulkChangeSubmission: function(grid,type,all)
	{
		var formId = Ext.id();
		var items = [];

		if (typeof all == 'undefined')
		{
			var all = false;
		}
		

		if (all)
		{
			 all = grid.getStore().proxy.extraParams['searchData'];
			 console.info("ALL",all);
		}
		
		
		switch (type)
		{
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
				text: (all) ? 'change selected submissions' : 'change <b>'+ids.length+'</b> submissions',
				scope: this,
				handler: function() {

					var values = Ext.getCmp(formId).getForm().getValues();
					var cfg = {
						ids: ids,
						type: type,
						values: values
					}


					xframe.yn({
						title:'Change Submission',
						msg: 'Do you really want to change all this submissions?',
						scope:this,
						handler: function(btn)
						{
							if (btn != 'yes') return;


							win.mask("Changing submissions ...");
							xframe.ajax({
								scope: this,
								url: xluerzer.getInstance().getAjaxPath('submissions/bulkChange/'),
								params : {
									cfg: Ext.encode(cfg),
									selector: all
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
					});


				}
			}]
		});

		win.show();

	},

	openGrid_day: function(dayx)
	{

		var title = 'Submissions of Day : '+dayx;

		xluerzer.getInstance().saveLastCommand({
			title: title,
			classx: 'xluerzer_submissions',
			fn: 'openGrid_day',
			param_0: dayx,
		});

		var fields =  [

		{name:'es_image_s_id',		text:'Image', 			type: 'int', renderer: this.renderer_submission_small, scope: this, width: 180},
		{name:'es_id', 				text:'ID', 				type: 'int'},
		{name:'es_submittedFor',	text:'Submitted For', 	type: 'string'},
		{name:'es_state',			text:'State', 			type: 'int', renderer: this.renderer_submission_state, scope: this},

		{name:'es_submittedBy',		text:'Submitted By', 	type: 'string'},
		{name:'es_email',			text:'E-Mail', 			type: 'string'},
		{name:'asc_name',			text:'Country', 		type: 'string'},
		/*
		{name:'es_credits_total',					text:'Credits', 				type: 'string'},
		{name:'es_xcredits_total',					text:'X-Credits', 			type: 'string'},
		{name:'es_credits_none_total',				text:'Credits None', 			type: 'string'},*/
		{name:'es_credits_total',					text:'Credits', 			type: 'string', hidden: true},
		{name:'es_xcredits_total',					text:'X-Credits', 			type: 'string', hidden: true},

		/*
		{name:'es_credits_none_total',				text:'Credits None', 			type: 'string'},
		*/
		{name:'es_credits_donotknow_total',			text:"Credits (Calculated)", 		type: 'string', renderer: this.renderer_donknow},

		{name:'es_image_highRes_status',	text:'HighRes', 		type: 'string'},

		{name:'es_mediaType_id',	text:'MediaType',		type: 'int', renderer: this.renderer_submission_mediaType, scope: this},
		{name:'es_mediaType_id',	text:'MediaType',		type: 'int', renderer: this.renderer_submission_mediaType, scope: this},
		{name:'es_modified_ts',		text:'Modified',		type: 'string', hidden: true},
		
		];

		var btn_id_bulk 		= Ext.id();
		var but_id_zip_thumbs 	= Ext.id();
		var but_id_zip_print  	= Ext.id();
		var but_id_zip_videos  	= Ext.id();

		var submissions = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: true,
			pager: true,
			records_move: false,
			button_export: true,
			selModelButtons:[btn_id_bulk],
			toolbar_top: [{
				iconCls: 'xf_bulk',
				id: btn_id_bulk,
				disabled: true,
				text: 'Bulk Modification',
				menu: [{
					text: 'Change Status',
					scope: this,
					handler: function()
					{
						this.bulkChangeSubmission(submissions,'es_state');
					}
				},{
					text: 'Change Magazine',
					scope: this,
					handler: function()
					{
						this.bulkChangeSubmission(submissions,'es_magazine_id');
					}
				}]
			},'-',{
				disabled: false,
				id: but_id_zip_thumbs,
				iconCls: 'xf_zip_file',
				text: 'Download',
				menu: [{
					text: 'Thumbnails',
					scope: this,
					handler: function()
					{
						var url = xluerzer.getInstance().getAjaxPath('submissions/grid_load/?dayx='+dayx+'&downloadFiles=1&downloadFilesScope=sub_thumbs');
						if (submissions.getStore().proxy.extraParams['es_submission_type'])
						{
							url += "&es_submission_type="+submissions.getStore().proxy.extraParams['es_submission_type'];
						}
						window.open(url,'DOWNLOAD');
					}
				},{
					text: 'HiRes Print',
					scope: this,
					handler: function()
					{
						var url = xluerzer.getInstance().getAjaxPath('submissions/grid_load/?dayx='+dayx+'&downloadFiles=1&downloadFilesScope=sub_print');
						if (submissions.getStore().proxy.extraParams['es_submission_type'])
						{
							url += "&es_submission_type="+submissions.getStore().proxy.extraParams['es_submission_type'];
						}
						window.open(url,'DOWNLOAD');
					}
				},{
					text: 'HiRes Videos',
					scope: this,
					handler: function()
					{
						var url = xluerzer.getInstance().getAjaxPath('submissions/grid_load/?dayx='+dayx+'&downloadFiles=1&downloadFilesScope=sub_videos');
						if (submissions.getStore().proxy.extraParams['es_submission_type'])
						{
							url += "&es_submission_type="+submissions.getStore().proxy.extraParams['es_submission_type'];
						}
						window.open(url,'DOWNLOAD');
					}
				}]
			}],

			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('submissions/grid_load/?dayx='+dayx),
				pid: 	'es_id',
				fields: fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					this.openSubmission(record.data.es_id);
				}
			}
		});

		submissions.on('afterrender',function(){
			submissions.getStore().load();
		},this);


		var fieldsd =  [
		{name:'emt_name',		    text:'For',	type: 'string', width: 120},
		{name:'es_cnt_total',		text:'Submissions', 	type: 'int'},
		{name:'es_cnt_pre',			text:'Preselected', 	type: 'int'}
		];

		var btn_filter = Ext.id();

		var submissions_details = xframe_pattern.getInstance().genGrid({
			region:'east',
			width: 200,
			maxWidth: 300,
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			pager: false,
			records_move: false,
			toolbar_top: [{
				id: btn_filter,
				disabled: true,
				iconCls: 'xf_del',
				text: 'Remove Filter',
				handler: function() {
					Ext.getCmp(btn_filter).setDisabled(true);
					delete(submissions.getStore().proxy.extraParams['es_submission_type']);
					submissions.getStore().load();
				}
			}],
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('submissions/grid_load_extra/?dayx='+dayx),
				pid: 	'es_submission_type',
				fields: fieldsd
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					Ext.getCmp(btn_filter).setDisabled(false);
					submissions.getStore().proxy.extraParams['es_submission_type'] = record.data.es_submission_type;
					submissions.getStore().load();
				}
			}
		});

		submissions_details.on('afterrender',function(){
			submissions_details.getStore().load();
		},this);

		var gui = Ext.create('Ext.panel.Panel', {
			title: title,
			layout:'border',
			items: [this.getDefaultSearchPanel(submissions),submissions,submissions_details]
		});

		xluerzer.getInstance().showContent(gui);
	},

	getDefaultSearchPanel: function(gridx) {
		var gui = {};
		return gui;
	},

	openSubmission: function(es_id)
	{
		xluerzer_submissions_detail.getInstance().open(es_id);
	},


	/*

	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################


	*/


	renderer_donknow: function(v,td,r)
	{
		
		if ((r.data.es_credits_total == "0") && (r.data.es_xcredits_total == "0"))
		{
			return "<span style='background-color:red;color:white;'>NO CREDITS</span>";
		}
		
		if (''+v == '0') {
			return "PRESENT";
		}
		return "MISSING";
	},

	open_search: function(returnGui)
	{
		var title = 'Search Parameters';
		xluerzer.getInstance().saveLastCommand({
			title: title,
			classx: 'xluerzer_submissions',
			fn: 'open_search',
			param_0: false
		});

		if (typeof returnGui == 'undefined') returnGui = false;
		if (returnGui == "false") returnGui = false;
		if (returnGui == "undefined") returnGui = false;

		var me = this;
		this.panel_search_left = Ext.widget({

			xsubmit: function()
			{
				me.doSearch.call(me);
			},

			border: false,
			columnWidth: .33,
			minWidth: 300,
			xtype: 'form',
			defaultType: 'textfield',
			defaults: {
				anchor: '100%',
				enableKeyEvents:true,
				listeners: {
					scope: this,
					specialkey: function(field,event) {
						if (event.getKey() == event.ENTER) {
							this.doSearch();
						}
					}
				}
			},

			items: [

			{
				xtype: 'label',
				text: 'Submitter Data',
			},
			{
				xtype: 'text',
				height: 12
			},

			xluerzer_gui.getInstance().searchComboSubmissions({
				fieldLabel: 'Firstname',
				name: 'es_firstname',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'es_firstname'
			}),


			xluerzer_gui.getInstance().searchComboSubmissions({
				fieldLabel: 'Lastname',
				name: 'es_lastname',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'es_lastname'
			}),

			xluerzer_gui.getInstance().searchComboSubmissions({
				fieldLabel: 'Company Name',
				name: 'es_company',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'es_company'
			}),

			/*xluerzer_gui.getInstance().searchComboSubmissions({
			fieldLabel: 'Agency Name',
			name: 'es_agency',
			minChars: 3,
			emptyText: 'Min 3 characters ...',
			searchScope: 'es_agency'
			}),*/

			{
				xsearch: true,
				xtype: 'xluerzer_shop_country',
				name: 'es_country_id',
				fieldLabel: 'Country'
			},

			xluerzer_gui.getInstance().searchComboSubmissions({
				fieldLabel: 'City',
				name: 'es_city',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'es_city'
			}),

			xluerzer_gui.getInstance().searchComboSubmissions({
				fieldLabel: 'E-Mail',
				name: 'es_email',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'es_email'
			}),

			xluerzer_gui.getInstance().searchComboSubmissions({
				fieldLabel: 'Comments',
				name: 'es_comments',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'es_comments'
			}),

			xluerzer_gui.getInstance().searchComboSubmissions({
				fieldLabel: 'Notes',
				name: 'es_notes',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'es_notes'
			}),

			xluerzer_gui.getInstance().searchComboSubmissions({
				fieldLabel: 'Campaign',
				name: 'es_campaign',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'es_campaign'
			}),
			
			xluerzer_gui.getInstance().searchComboSubmissions({
				fieldLabel: 'AD Title',
				name: 'es_ad_title',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'es_ad_title'
			}),
			
			xluerzer_gui.getInstance().searchComboSubmissions({
				fieldLabel: 'Submitted For (old Style)',
				name: 'es_submittedFor',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'es_submittedFor'
			})
			]
		});

		/*
		1 .. PRINT
		2 .. TVC
		3 .. STUDENTS
		4 .. WEB
		5 .. APP
		6 .. STUDENTS_VIDEO
		*/


		this.contact_types_id = Ext.id();

		this.panel_search_middle = Ext.widget({

			xsubmit: function()
			{
				me.doSearch.call(me);
			},


			border: false,
			columnWidth: 0.33,
			minWidth: 300,
			padding: '0 10 0 10',

			xtype: 'form',
			defaultType: 'textfield',
			defaults: {

				anchor: '100%',
				enableKeyEvents:true,
				listeners: {
					scope: this,
					specialkey: function(field,event) {
						if (event.getKey() == event.ENTER) {
							//if (field.xsearch) return false;
							this.doSearch();
						}
					}
				}

			},

			items: [

			{
				xtype: 'label',
				text: 'Submission Credits',
			},
			{
				xtype: 'text',
				height: 10
			},

			{
				fieldLabel: 'Name',
				xtype: 'textfield',
				name: 'credit_universal'
			},

			{
				xtype: 'fieldcontainer',
				fieldLabel: 'Type',
				layout: {
					type: 'hbox',
					align: 'stretch'
				},
				items: [
				{

					xtype: 'panel',
					border: false,
					defaultType: 'checkboxfield',
					items: [{
						boxLabel  : 'Client Company',
						name      : 'credit_scope',
						inputValue: '7'
					}, {
						boxLabel  : 'Ad Agency',
						name      : 'credit_scope',
						inputValue: '2'
					}, {
						boxLabel  : 'Creative Director',
						name      : 'credit_scope',
						inputValue: '16'
					}, {
						boxLabel  : 'Copywriter',
						name      : 'credit_scope',
						inputValue: '3'
					}, {
						boxLabel  : 'Illustrator',
						name      : 'credit_scope',
						inputValue: '4'
					}, {
						boxLabel  : 'Director',
						name      : 'credit_scope',
						inputValue: '8'
					}]

				},{
					xtype: 'text',
					width: 10
				},{

					xtype: 'panel',
					border: false,
					defaultType: 'checkboxfield',
					items: [{
						boxLabel  : 'Art Director',
						name      : 'credit_scope',
						inputValue: '5'
					}, {
						boxLabel  : 'Photographer',
						name      : 'credit_scope',
						inputValue: '1'
					}, {
						boxLabel  : 'Digital Artist',
						name      : 'credit_scope',
						inputValue: '14'
					}, {
						boxLabel  : 'Production Company',
						name      : 'credit_scope',
						inputValue: '6'
					}, {
						boxLabel  : 'Typographer',
						name      : 'credit_scope',
						inputValue: '13'
					}]

				}

				]
			},
			{
				xtype: 'text',
				text: '',
				height: 30
			}
			

			/*
			{
			xtype: 'xluerzer_credit_client_company' // 7
			},
			{
			xtype: 'xluerzer_credit_ad_agency' // 2
			},
			{
			xtype: 'xluerzer_credit_creative_director' // 16
			},
			{
			xtype: 'xluerzer_credit_director' // 16
			},
			{
			xtype: 'xluerzer_credit_copywriter' // 3
			},
			{
			xtype: 'xluerzer_credit_illustrator' // 4
			},
			{
			xtype: 'xluerzer_credit_art_director' // 5
			},
			{
			xtype: 'xluerzer_credit_photographer' // 1
			},
			{
			xtype: 'xluerzer_credit_digital_artist' // 14
			},
			{
			xtype: 'xluerzer_credit_production_company' // 6
			},
			{
			xtype: 'xluerzer_credit_typographer' // 13
			},

			*/

			]
		});


		this.panel_search_right = Ext.widget({

			xsubmit: function()
			{
				me.doSearch.call(me);
			},


			border: false,
			columnWidth: 0.33,
			minWidth: 300,
			xtype: 'form',
			defaultType: 'textfield',
			defaults: {

				anchor: '100%',
				enableKeyEvents:true,
				listeners: {
					scope: this,
					specialkey: function(field,event) {
						if (event.getKey() == event.ENTER) {
							//if (field.xsearch) return false;
							this.doSearch();
						}
					}
				}

			},

			items: [

			{
				xtype: 'numberfield',
				name: 'es_id',
				fieldLabel: 'Submission Id',
				emptyText: "Enter a submission id ..."
			},

			{
				xsearch: true,
				xtype: 'xluerzer_magazine',
				name: 'es_magazine_id',
				fieldLabel: 'Magazine'
			},

			{
				xsearch: true,
				fieldLabel: 'Submitted For',
				name: 'es_submission_type',
				xtype: 'xluerzer_submission_type'
			},

			xluerzer_gui.getInstance().simplyCombo({
				xsearch: true,
				fieldLabel: 'Artwork Type',
				name: 'es_mediaType_id',
				value: '',
				data: [{k:'0',v:'unknown'},{k:'1',v:'Print'},{k:'2',v:'Videos'}],
				emptyText: 'Print, Video ...'
			}),

			{
				xsearch: true,
				xtype: 'xluerzer_submission_category',
				name: 'es_category_id',
				fieldLabel: 'Category'
			},
			{
				xsearch: true,
				xtype: 'xluerzer_submission_state',
				name: 'es_state',
				fieldLabel: 'Status'
			},
			{
				xsearch: true,
				xtype: 'xluerzer_submission_artwork_state',
				name: 'es_artwork',
				fieldLabel: 'Artwork'
			},
			{
				xsearch: true,
				xtype: 'xluerzer_submission_credits_state',
				name: 'es_credits',
				fieldLabel: 'Credits'
			},
			xluerzer_gui.getInstance().searchComboSubmissions({
				fieldLabel: 'Archive Nr.',
				name: 'es_archivNr',
				minChars: 3,
				emptyText: 'Enter Archive Nr. ...',
				searchScope: 'es_archivNr'
			}),


			{
				xtype: 'fieldcontainer',
				fieldLabel: 'Submitted on',
				labelStyle: 'font-weight:bold;padding:0;',
				layout: 'hbox',
				defaultType: 'textfield',
				items: [{
					xtype: 'datefield',
					flex: 1,
					name: 'created_from',
					emptyText: 'From day ...'
				}, {
					xtype: 'datefield',
					flex: 1,
					name: 'created_to',
					emptyText: 'To day ...',
					margins: '0 0 0 5'
				}]
			},
			{
				xtype: 'fieldcontainer',
				fieldLabel: '',
				margin: '0 0 0 105',
				labelStyle: 'font-weight:bold;padding:0;',
				layout: 'hbox',
				defaultType: 'textfield',
				items: [{
					format: 'H:i',
					xtype: 'timefield',
					flex: 1,
					name: 'created_from_time',
					emptyText: 'From time ...'
				}, {
					format: 'H:i',
					xtype: 'timefield',
					flex: 1,
					name: 'created_to_time',
					emptyText: 'To time ...',
					margins: '0 0 0 5'
				}]
			},

			{
				xtype: 'text',
				text: '',
				height: 20
			},

			{
				xtype: 'fieldcontainer',
				fieldLabel: '',
				labelStyle: 'font-weight:bold;padding:0;',
				layout: 'hbox',
				defaultType: 'textfield',

				items: [{
					height: 30,
					xtype: 'button',
					text: 'Reset',
					scope: this,
					handler: function() {
						this.doReset();
					}
				}, {
					height: 30,
					xtype: 'button',
					text: 'Search',
					scope: this,
					handler: function() {
						this.doSearch();
					},
					margins: '0 0 0 5'
				}]
			},






			]
		});

		this.panel_search = Ext.widget({

			columnWidth: 1,
			xtype: 'fieldset',
			animCollapse: false,
			title: 'Advanced Search',
			layout: 'anchor',
			collapsible: true,
			collapsed: true,
			defaultType: 'textfield',
			autoScroll: false,
			defaults: {

				padding: 20,
				anchor: '100%',
				enableKeyEvents:true,
				listeners: {
					scope: this,
					specialkey: function(field,event) {
						if (event.getKey() == event.ENTER) {
							this.doSearch();
						}
					}
				}

			},

			items: [
			{
				xtype: 'panel',
				layout: 'column',
				border: false,
				defaults: {

					anchor: '100%',
					enableKeyEvents:true,
					listeners: {
						scope: this,
						specialkey: function(field,event) {
							if (event.getKey() == event.ENTER) {
								this.doSearch();
							}
						}
					}

				},
				items: [this.panel_search_left,{xtype: 'splitter',columnWidth: 0.005},this.panel_search_middle,{xtype: 'splitter',columnWidth: 0.005},this.panel_search_right]
			}


			]
		});





		this.panel_search_overall = Ext.widget({
			region: 'north',
			collapsible: false,
			xtype: 'form',
			border:false,
			layout: 'fit',
			bodyPadding: '10 5 10 5',
			defaults: {

			},
			autoScroll: true,
			items: [
			this.panel_search
			],

			tbar: ['Overall',{
				flex:1,
				xtype: 'textfield',
				name: 'overall',
				enableKeyEvents:true,
				emptyText: 'Search in firstname,lastname,company and email or the excact id ... [ENTER]',
				listeners: {
					scope: this,
					specialkey: function(field,event) {
						if (event.getKey() == event.ENTER) {
							this.doSearch();
						}
					}
				}
			}]

		});


		var fields =  [
		{name:'es_image_s_id', 		text:'Image', 			type: 'int', renderer: this.renderer_submission_small, scope: this, width: 180},
		{name:'es_id', 				text:'ID', 				type: 'int'},
		{name:'es_submittedFor',	text:'Submitted For', 	type: 'string'},
		{name:'es_state',			text:'State', 			type: 'int', renderer: this.renderer_submission_state, scope: this},
		{name:'es_campaign',		text:'Campaign', 		type: 'string'},

		{name:'es_fe_user_id',		text:'Fe-User-ID', 	type: 'string'},
		{name:'es_submittedBy',		text:'Submitted By', 	type: 'string'},
		{name:'es_email',			text:'E-Mail', 			type: 'string'},
		{name:'asc_name',			text:'Country', 		type: 'string'},

		{name:'es_credits_total',					text:'Credits', 			type: 'string', hidden: true},
		{name:'es_xcredits_total',					text:'X-Credits', 			type: 'string', hidden: true},

		/*
		{name:'es_credits_none_total',				text:'Credits None', 			type: 'string'},
		*/
		{name:'es_credits_donotknow_total',			text:"Credits (Calculated)", 		type: 'string', renderer: this.renderer_donknow},

		{name:'es_image_highRes_status',	text:'HighRes', 		type: 'string'},

		{name:'es_created_ts',	text:'Submitted on', 		type: 'string'}

		];


		var btn_id_bulk 		= Ext.id();
		var but_id_zip_thumbs 	= Ext.id();
		var but_id_zip_print  	= Ext.id();
		var but_id_zip_videos  	= Ext.id();

		this.contactsGrid = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			title: 'Submissions',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			pager: true,
			button_export: true,
			records_move: false,
			selModelButtons:[btn_id_bulk],
			toolbar_top: [{
				iconCls: 'xf_bulk',
				text: '[ALL] Bulk Modification',
				menu: [{
					text: 'Change Status',
					scope: this,
					handler: function()
					{
						this.bulkChangeSubmission(this.contactsGrid,'es_state',true);
					}
				},{
					text: 'Change Magazine',
					scope: this,
					handler: function()
					{
						this.bulkChangeSubmission(this.contactsGrid,'es_magazine_id',true);
					}
				}]
			},{
				iconCls: 'xf_bulk',
				id: btn_id_bulk,
				disabled: true,
				text: 'Bulk Modification',
				menu: [{
					text: 'Change Status',
					scope: this,
					handler: function()
					{
						this.bulkChangeSubmission(this.contactsGrid,'es_state');
					}
				},{
					text: 'Change Magazine',
					scope: this,
					handler: function()
					{
						this.bulkChangeSubmission(this.contactsGrid,'es_magazine_id');
					}
				}]
			},'-',{
				disabled: false,
				id: but_id_zip_thumbs,
				iconCls: 'xf_zip_file',
				text: 'Download',
				menu: [
				{
					text: '<b>All</b> Thumbnails',
					scope: this,
					handler: function()
					{
						this.zipAndDownload(this.contactsGrid,'sub_thumbs');
					}
				},{
					text: '<b>All</b> Print',
					scope: this,
					handler: function()
					{
						this.zipAndDownload(this.contactsGrid,'sub_print');
					}
				},{
					text: '<b>All</b> Videos',
					scope: this,
					handler: function()
					{
						this.zipAndDownload(this.contactsGrid,'sub_videos');
					}
				},'-',{
					text: 'Selected Thumbnails',
					scope: this,
					handler: function()
					{
						this.zipAndDownload(this.contactsGrid,'sel_sub_thumbs');
					}
				},{
					text: 'Selected Print',
					scope: this,
					handler: function()
					{
						this.zipAndDownload(this.contactsGrid,'sel_sub_print');
					}
				},{
					text: 'Selected Videos',
					scope: this,
					handler: function()
					{
						this.zipAndDownload(this.contactsGrid,'sel_sub_videos');
					}
				}]
			},'-',{
				text: 'All',
				scope: me,
				handler: function() {
					
					this.panel_search_right.getForm().setValues({
						'es_submission_type': ''
					});
					this.doSearch();
					
				}
			},{
				text: 'PRINT',
				scope: me,
				handler: function() {
					
					this.panel_search_right.getForm().setValues({
						'es_submission_type': '1'
					});
					this.doSearch();
					
				}
			},{
				text: 'COMMERCIALS',
				scope: me,
				handler: function() {
					
					this.panel_search_right.getForm().setValues({
						'es_submission_type': '12'
					});
					this.doSearch();
					
				}
			},{
				text: 'SPECIALS',
				scope: me,
				handler: function() {
					
					this.panel_search_right.getForm().setValues({
						'es_submission_type': '-10'
					});
					this.doSearch();
					
				}
			}],


			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('submissions/search'),
				pid: 	'es_id',
				fields: fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					if (!returnGui) {
						xluerzer_submissions_detail.getInstance().open(record.data.es_id);
					} else {
						if (typeof returnGui.callback == 'function') {
							returnGui.callback.call(returnGui.scope,record.data.es_id);
						}
					}
				}
			}
		});

		var fieldsd =  [
		{name:'asc_id',		   	 	text:'ID',			type: 'int',   hidden : true,	width: 20},
		{name:'asc_name',		    text:'Country',		type: 'string', width: 120},
		{name:'total_submitter',	text:'Submitter', 	type: 'int'},
		{name:'total_submissions',	text:'Submissions', type: 'int'}
		];

		var labelme = Ext.widget({
			xtype: 'label',
			text: '-'
		});

		this.panel_search_stats = xframe_pattern.getInstance().genGrid({
			region:'east',
			width: 200,
			minWidth: 200,
			maxWidth: 300,
			title: 'Statistics',
			forceFit:true,
			border:false,
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			pager: false,
			records_move: false,
			tbar: [labelme],
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('submissions/search_stats'),
				pid: 	'es_country_id',
				fields: fieldsd
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					console.log("should filter country", record.data.asc_id);

					if (this.contactsGrid.getStore().proxy.extraParams['filterCountry'] == record.data.asc_id)
					{
						delete(this.contactsGrid.getStore().proxy.extraParams['filterCountry']);
					} else {
						this.contactsGrid.getStore().proxy.extraParams['filterCountry'] = record.data.asc_id;
					}
					this.contactsGrid.getStore().loadPage(1);
				}
			}
		});

		this.panel_search_stats.getStore().on('load',function(t,rs){

			var countries 	= rs.length;
			var submitter	= 0;
			var submissions	= 0;

			Ext.each(rs,function(d){
				submitter 	+= d.data.total_submitter;
				submissions += d.data.total_submissions;
			});

			labelme.setText("<b>Countries:</b> "+countries+" <b>Submitter:</b> "+submitter+" <b>Submissions:</b> "+submissions,false);
		});

		this.panel_result = Ext.widget({
			xtype: 'panel',
			region: 'center',
			layout: 'border',
			items: [this.panel_search_stats,this.contactsGrid]
		})


		var gui = Ext.create('Ext.panel.Panel', {
			title: 'Search Submissions',
			overflowY: 'auto',
			layout:'border',
			items: [this.panel_search_overall,this.panel_result]
		});


		this.contactsGrid.getStore().on('beforeload',function(){
			//			this.panel_search_stats.mask('Waiting ...');
		},this);


		if (returnGui)
		{
			return gui;
		} else {
			xluerzer.getInstance().showContent(gui);
		}


	},

	zipAndDownload: function(grid,downloadFilesScope)
	{
		var url = xluerzer.getInstance().getAjaxPath('submissions/search?downloadFiles=1&downloadFilesScope='+downloadFilesScope);

		switch(downloadFilesScope)
		{
			case 'sel_sub_thumbs':
			case 'sel_sub_print':
			case 'sel_sub_videos':

			var ids = [];
			Ext.each(grid.getSelectionModel().getSelection(),function(r){
				ids.push(r.data['es_id']);
			},this);
			url += '&pid=es_id&ids='+ids.join(',');

			break;
			default: break;
		}

		Ext.iterate(grid.getStore().proxy.extraParams,function(k,v) {
			url += "&"+k+"="+v;
		},this);

		window.open(url,'DOWNLOAD');
	},

	doReset: function()
	{
		this.panel_search_overall.getForm().reset();
		this.panel_search_left.getForm().reset();
		this.panel_search_middle.getForm().reset();
		this.panel_search_right.getForm().reset();
		
		
		this.contactsGrid.getStore().removeAll();
		this.panel_search_stats.getStore().removeAll();

		
		
		
	},

	doSearch: function()
	{
		Ext.defer(this.doSearchReal,10,this);
	},

	doSearchReal: function()
	{

		var searchData = {};

		//if (!this.panel_search.collapsed)
		{
			var fp_1 = this.panel_search_left.getForm().getValues();
			var fp_2 = this.panel_search_right.getForm().getValues();
			var fp_3 = this.panel_search_middle.getForm().getValues();

			Ext.iterate(fp_1,function(k,v){
				searchData[k] = v;
			});

			Ext.iterate(fp_2,function(k,v){
				searchData[k] = v;
			});

			Ext.iterate(fp_3,function(k,v){
				searchData[k] = v;
			});
		}

		var e = this.panel_search_overall.getForm().getValues();
		searchData['overall'] = e['overall'];
		this.contactsGrid.getStore().proxy.extraParams['searchData'] = Ext.encode(searchData);
		delete(this.contactsGrid.getStore().proxy.extraParams['filterCountry']);
		this.contactsGrid.getStore().loadPage(1);

		this.panel_search_stats.getStore().proxy.extraParams['searchData'] = Ext.encode(searchData);
		this.panel_search_stats.getStore().load();

		console.info('searchData',searchData);
	},


	search4submissionPopUp: function(cfg) {

		var win = false;

		var gui = xluerzer_submissions.getInstance().open_search({
			scope: this,
			callback: function(es_id) {
				win.close();
				cfg.callback.call(cfg.scope,es_id);
			}
		});
		gui.title = "";

		win = Ext.create('Ext.window.Window', {
			modal: true,
			title: 'Search in Submissions',
			height: $$(window).height()*0.8,
			width: $$(window).width()*0.9,
			layout: 'fit',
			items: [gui]
		});

		win.show();
	}

}