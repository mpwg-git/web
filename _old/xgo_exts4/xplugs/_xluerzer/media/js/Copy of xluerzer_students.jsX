var xluerzer_students = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_students";
		}

		this.getInstance = function(config) {

			var instance = new xluerzer_students_(config);
			return instance;
		}
	}
})();

var xluerzer_students_ = function(config) {
	this.config = config || {};
};

xluerzer_students_.prototype = {

	renderer_submission_small: function(value2,td,r) {
		var value = r.data.ess_id;
		var url = xluerzer.getInstance().getAjaxPath('students/img_small/'+value);
		var urlBig = xluerzer.getInstance().getAjaxPath('students/img_orig/'+value);
		return "<div class='submission_preview'><a href='"+urlBig+"' target='_blank'><img width=150 height=150 src='"+url+"'></a></div>";
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

	bulkChangeSubmission: function(grid,type)
	{
		var formId = Ext.id();
		var items = [];

		switch (type)
		{
			case 'ess_magazine_id':
			items = [{
				fieldLabel: 'Magazine',
				name: 'ess_magazine_id',
				xtype: 'xluerzer_magazine'
			}];
			break;
			case 'ess_state':
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
			ids.push(r.data['ess_id']);
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

	openGrid_day: function(dayx)
	{

		var title = 'Submissions of Day : '+dayx;

		xluerzer.getInstance().saveLastCommand({
			title: title,
			classx: 'xluerzer_students',
			fn: 'openGrid_day',
			param_0: dayx,
		});

		var fields =  [

		{name:'ess_image_s_id',		text:'Image', 			type: 'int', renderer: this.renderer_submission_small, scope: this, width: 180},
		{name:'ess_id', 				text:'ID', 				type: 'int'},
		{name:'ess_submittedFor',	text:'Submitted For', 	type: 'string'},
		{name:'ess_state',			text:'State', 			type: 'int', renderer: this.renderer_submission_state, scope: this},

		{name:'ess_submittedBy',		text:'Submitted By', 	type: 'string'},
		{name:'ess_email',			text:'E-Mail', 			type: 'string'},
		/*
		{name:'ess_credits_total',					text:'Credits', 				type: 'string'},
		{name:'ess_xcredits_total',					text:'X-Credits', 			type: 'string'},
		{name:'ess_credits_none_total',				text:'Credits None', 			type: 'string'},*/
		{name:'ess_credits_donotknow_total',			text:"Credits Don't know", 		type: 'string'},

		{name:'ess_image_highRess_status',	text:'HighRes', 		type: 'string'},

		{name:'ess_mediaType_id',	text:'MediaType',		type: 'int', renderer: this.renderer_submission_mediaType, scope: this},
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
						this.bulkChangeSubmission(submissions,'ess_state');
					}
				},{
					text: 'Change Magazine',
					scope: this,
					handler: function()
					{
						this.bulkChangeSubmission(submissions,'ess_magazine_id');
					}
				}]
			}/*,'-',{ 
				disabled: false,
				id: but_id_zip_thumbs,
				iconCls: 'xf_zip_file',
				enabled: false,
				text: 'Download',
				menu: [{
					text: 'Thumbnails',
					scope: this,
					handler: function()
					{
						var url = xluerzer.getInstance().getAjaxPath('students/grid_load/?dayx='+dayx+'&downloadFiles=1&downloadFilesScope=sub_thumbs');
						if (submissions.getStore().proxy.extraParams['ess_submission_type'])
						{
							url += "&ess_submission_type="+submissions.getStore().proxy.extraParams['ess_submission_type'];
						}
						window.open(url,'DOWNLOAD');
					}
				},{
					text: 'Print',
					scope: this,
					handler: function()
					{
						var url = xluerzer.getInstance().getAjaxPath('students/grid_load/?dayx='+dayx+'&downloadFiles=1&downloadFilesScope=sub_print');
						if (submissions.getStore().proxy.extraParams['ess_submission_type'])
						{
							url += "&ess_submission_type="+submissions.getStore().proxy.extraParams['ess_submission_type'];
						}
						window.open(url,'DOWNLOAD');
					}
				},{
					text: 'Videos',
					scope: this,
					handler: function()
					{
						var url = xluerzer.getInstance().getAjaxPath('students/grid_load/?dayx='+dayx+'&downloadFiles=1&downloadFilesScope=sub_videos');
						if (submissions.getStore().proxy.extraParams['ess_submission_type'])
						{
							url += "&ess_submission_type="+submissions.getStore().proxy.extraParams['ess_submission_type'];
						}
						window.open(url,'DOWNLOAD');
					}
				}]
			}*/],

			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('students/grid_load/?dayx='+dayx),
				pid: 	'ess_id',
				fields: fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					this.openSubmission(record.data.ess_id);
				}
			}
		});

		submissions.on('afterrender',function(){
			submissions.getStore().load();
		},this);


		var fieldsd =  [
		{name:'emt_name',		    text:'For',	type: 'string', width: 120},
		{name:'ess_cnt_total',		text:'Submissions', 	type: 'int'},
		{name:'ess_cnt_pre',			text:'Preselected', 	type: 'int'}
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
					delete(submissions.getStore().proxy.extraParams['ess_submission_type']);
					submissions.getStore().load();
				}
			}],
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('students/grid_load_extra/?dayx='+dayx),
				pid: 	'ess_submission_type',
				fields: fieldsd
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					Ext.getCmp(btn_filter).setDisabled(false);
					submissions.getStore().proxy.extraParams['ess_submission_type'] = record.data.ess_submission_type;
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

	openSubmission: function(ess_id)
	{
		xluerzer_students_detail.getInstance().open(ess_id);
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

	open_search: function(returnGui)
	{
		var title = 'Search Parameters';
		xluerzer.getInstance().saveLastCommand({
			title: title,
			classx: 'xluerzer_students',
			fn: 'open_search',
			param_0: false
		});

		if (typeof returnGui == 'undefined') returnGui = false;
		if (returnGui == "false") returnGui = false;

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

			xluerzer_gui.getInstance().searchComboStudents({
				fieldLabel: 'Firstname',
				name: 'ess_firstname',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'ess_firstname'
			}),


			xluerzer_gui.getInstance().searchComboStudents({
				fieldLabel: 'Lastname',
				name: 'ess_lastname',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'ess_lastname'
			}),

			xluerzer_gui.getInstance().searchComboStudents({
				fieldLabel: 'Company Name',
				name: 'ess_company',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'ess_company'
			}),

			xluerzer_gui.getInstance().searchComboStudents({
				fieldLabel: 'Agency Name',
				name: 'ess_agency',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'ess_agency'
			}),

			{
				xsearch: true,
				xtype: 'xluerzer_shop_country',
				name: 'ess_country_id',
				fieldLabel: 'Country'
			},

			xluerzer_gui.getInstance().searchComboStudents({
				fieldLabel: 'City',
				name: 'ess_city',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'ess_city'
			}),

			xluerzer_gui.getInstance().searchComboStudents({
				fieldLabel: 'E-Mail',
				name: 'ess_email',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'ess_email'
			}),

			xluerzer_gui.getInstance().searchComboStudents({
				fieldLabel: 'Comments',
				name: 'ess_comments',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'ess_comments'
			}),

			xluerzer_gui.getInstance().searchComboStudents({
				fieldLabel: 'Notes',
				name: 'ess_notes',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'ess_notes'
			}),

			,
			{
				xtype: 'text',
				text: '*use a leading and trailing % for more results e.g. %term_x%',
				height: 20
			},
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


		this.contact_typess_id = Ext.id();

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
				xtype: 'xluerzer_credit_client_company' // 7
			},
			{
				xtype: 'xluerzer_credit_institute' // 12
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
				hideTrigger: true,
				xtype: 'numberfield',
				name: 'ess_id',
				fieldLabel: 'Submission Id',
				emptyText: "Enter a submission id ..."
			},

			{
				xsearch: true,
				xtype: 'xluerzer_magazine',
				name: 'ess_magazine_id',
				fieldLabel: 'Magazine'
			},

			xluerzer_gui.getInstance().searchComboStudents({
				fieldLabel: 'Submitted For',
				name: 'ess_submittedFor',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'ess_submittedFor'
			}),

			xluerzer_gui.getInstance().simplyCombo({
				xsearch: true,
				fieldLabel: 'Artwork Type',
				name: 'ess_mediaType_id',
				value: '',
				data: [{k:'0',v:'unknown'},{k:'1',v:'Print'},{k:'2',v:'Videos'}],
				emptyText: 'Print, Video ...'
			}),

			{
				xsearch: true,
				xtype: 'xluerzer_submission_category',
				name: 'ess_category_id',
				fieldLabel: 'Category'
			},
			{
				xsearch: true,
				xtype: 'xluerzer_submission_state',
				name: 'ess_state',
				fieldLabel: 'Status'
			},
			{
				xsearch: true,
				xtype: 'xluerzer_submission_artwork_state',
				name: 'ess_artwork',
				fieldLabel: 'Artwork'
			},
			{
				xsearch: true,
				xtype: 'xluerzer_submission_credits_state',
				name: 'ess_credits',
				fieldLabel: 'Credits'
			},
			xluerzer_gui.getInstance().searchComboStudents({
				fieldLabel: 'Archive Nr.',
				name: 'ess_archivNr',
				minChars: 3,
				emptyText: 'Enter Archive Nr. ...',
				searchScope: 'ess_archivNr'
			}),
			{
				xtype: 'fieldcontainer',
				fieldLabel: 'Created',
				labelStyle: 'font-weight:bold;padding:0;',
				layout: 'hbox',
				defaultType: 'textfield',
				items: [{
					xtype: 'datefield',
					flex: 1,
					name: 'created_from',
					emptyText: 'From create day ...'
				}, {
					xtype: 'datefield',
					flex: 1,
					name: 'created_to',
					emptyText: 'To create day ...',
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
			border: false,
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

				bodyPadding: 20,
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
				nableKeyEvents:true,
				emptyText: 'Search in firstname,lastname and company or the excact id ... [ENTER]',
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
		{name:'ess_image_s_id', 		text:'Image', 			type: 'int', renderer: this.renderer_submission_small, scope: this, width: 180},
		{name:'ess_id', 				text:'ID', 				type: 'int'},
		{name:'ess_submittedFor',	text:'Submitted For', 	type: 'string'},
		{name:'ess_state',			text:'State', 			type: 'int', renderer: this.renderer_submission_state, scope: this},

		{name:'ess_submittedBy',		text:'Submitted By', 	type: 'string'},
		{name:'ess_email',			text:'E-Mail', 			type: 'string'},

		/*
		{name:'ess_credits_total',					text:'Credits', 				type: 'string'},
		{name:'ess_xcredits_total',					text:'X-Credits', 			type: 'string'},
		{name:'ess_credits_none_total',				text:'Credits None', 			type: 'string'},
		*/
		{name:'ess_credits_donotknow_total',			text:"Credits Don't know", 		type: 'string'},

		{name:'ess_image_highRess_status',	text:'HighRes', 		type: 'string'},

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

			selModelButtons:[btn_id_bulk],
			toolbar_top: [/*{
				iconCls: 'xf_bulk',
				id: btn_id_bulk,
				disabled: true,
				text: 'Bulk Modification',
				menu: [{
					text: 'Change Status',
					scope: this,
					handler: function()
					{
						this.bulkChangeSubmission(this.contactsGrid,'ess_state');
					}
				},{
					text: 'Change Magazine',
					scope: this,
					handler: function()
					{
						this.bulkChangeSubmission(this.contactsGrid,'ess_magazine_id');
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
			}*/],


			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('students/search'),
				pid: 	'ess_id',
				fields: fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					if (!returnGui) {
						xluerzer_students_detail.getInstance().open(record.data.ess_id);
					} else {
						if (typeof returnGui.callback == 'function') {
							returnGui.callback.call(returnGui.scope,record.data.ess_id);
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
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('students/search_stats'),
				pid: 	'ess_country_id',
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

		this.panel_result = Ext.widget({
			xtype: 'panel',
			region: 'center',
			layout: 'border',
			items: [this.panel_search_stats,this.contactsGrid]
		})


		var gui = Ext.create('Ext.panel.Panel', {
			title: 'Search Students',
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
		var url = xluerzer.getInstance().getAjaxPath('students/search?downloadFiles=1&downloadFilesScope='+downloadFilesScope);

		switch(downloadFilesScope)
		{
			case 'sel_sub_thumbs':
			case 'sel_sub_print':
			case 'sel_sub_videos':

			var ids = [];
			Ext.each(grid.getSelectionModel().getSelection(),function(r){
				ids.push(r.data['ess_id']);
			},this);
			url += '&pid=ess_id&ids='+ids.join(',');

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
		this.panel_search_left.getForm().reset();
		this.panel_search_middle.getForm().reset();
		this.panel_search_right.getForm().reset();
	},

	doSearch: function()
	{
		Ext.defer(this.doSearchReal,10,this);
	},

	doSearchReal: function()
	{

		var searchData = {};

		if (!this.panel_search.collapsed)
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

		var gui = xluerzer_students.getInstance().open_search({
			scope: this,
			callback: function(ess_id) {
				win.close();
				cfg.callback.call(cfg.scope,ess_id);
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
	},

}