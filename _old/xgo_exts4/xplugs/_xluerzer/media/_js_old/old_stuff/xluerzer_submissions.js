var xluerzer_submissions = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_submissions";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xluerzer_submissions_(config);
			}
			return instance;
		}
	}
})();

var xluerzer_submissions_ = function(config) {
	this.config = config || {};
};

xluerzer_submissions_.prototype = {

	getAjaxPath : function(suffix)
	{
		return xluerzer.getInstance().getAjaxPath(suffix);
	},

	showSubmissionsByDay: function() {

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
			xstore: {
				load: 	this.getAjaxPath('s_day_overview/load'),
				pid: 	'es_id',
				fields: fields,
				params: {}
			}
		});

		var submissionGrid = Ext.create('Ext.grid.Panel', {
			layout: 'fit',
			border: false,
			store: store,
			forceFit: true,
			pager: true,
			columnLines: true,
			columns: [{
				text: 'Date',
				maxWidth: 75,
				dataIndex: 'dayx'
			},{
				text: '<b>Total</b>',
				columns: [{
					width    : 75,
					text     : 'Submissions',
					dataIndex: 'total_submissions'
				}, {
					width    : 75,
					text     : 'Submitter',
					dataIndex: 'total_submitter'
				}]
			},{
				text: '<b>Print</b>',
				columns: [{
					width    : 75,
					text     : 'Submissions',
					dataIndex: 'total_print'
				}, {
					width    : 75,
					text     : 'Submitter',
					dataIndex: 'total_print_submitter'
				}]
			},{
				text: '<b>TV</b>',

				columns: [{
					width    : 75,
					text     : 'Submissions',
					dataIndex: 'total_tv'
				}, {
					width    : 75,
					text     : 'Submitter',
					dataIndex: 'total_tv_submitter'
				}]
			},{
				text: '<b>Specials</b>',
				columns: [{
					width    : 75,
					text     : 'Submissions',
					dataIndex: 'total_specials'
				}, {
					width    : 75,
					text     : 'Submitter',
					dataIndex: 'total_specials_submitter'
				}]
			},{
				text: '<b>Students</b>',
				columns: [{
					width    : 75,
					text     : 'Submissions',
					dataIndex: 'total_students'
				},
				{
					width    : 75,
					text     : 'Submitter',
					dataIndex: 'total_students_submitter'
				}]
			}],
			title: 'Submissions Day Overview',
			viewConfig: {
				stripeRows: true
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
					xluerzer_submissions.getInstance().showSubmissionsByDay(record.data.dayx);
				}
			}
		});

		xluerzer.getInstance().showContent(submissionGrid);
	},

	searchNorm: function() {

		var items_left	= [
		{
			fieldLabel: 'Overall',
			name: 'first',
			emptyText: 'Search in all Fields...'
		},

		xluerzer_gui.getInstance().searchCombo({
			fieldLabel: 'Submitter',
			name: 'last',
			minChars: 3,
			emptyText: 'Min 3 characters ...',
			searchScope: 'submitter'
		}),

		xluerzer_gui.getInstance().searchCombo({
			fieldLabel: 'Submitted for',
			name: 'last',
			minChars: 1,
			emptyText: 'Min 1 characters ...',
			searchScope: 'kindOf'
		}),

		{
			fieldLabel: 'Credits',
			name: 'email'
		},

		xluerzer_gui.getInstance().searchCombo({
			fieldLabel: 'Agency',
			name: 'last',
			minChars: 3,
			emptyText: 'Min 3 characters ...',
			searchScope: 'agency'
		}),

		xluerzer_gui.getInstance().searchCombo({
			fieldLabel: 'Country',
			name: 'last',
			minChars: 3,
			emptyText: 'Min 3 characters ...',
			searchScope: 'country'
		}),

		xluerzer_gui.getInstance().searchCombo({
			fieldLabel: 'City',
			name: 'last',
			minChars: 3,
			emptyText: 'Min 3 characters ...',
			searchScope: 'city'
		}),

		xluerzer_gui.getInstance().searchCombo({
			fieldLabel: 'E-Mail',
			name: 'last',
			minChars: 3,
			emptyText: 'Min 3 characters ...',
			searchScope: 'email'
		}),

		xluerzer_gui.getInstance().searchCombo({
			fieldLabel: 'Comments',
			name: 'last',
			minChars: 3,
			emptyText: 'Min 3 characters ...',
			searchScope: 'comments'
		}),{
			fieldLabel: 'Category',
			name: 'email'
		}
		];

		var items_right	= [

		xluerzer_gui.getInstance().searchCombo({
			fieldLabel: 'Submission ID',
			name: 'last',
			minChars: 3,
			emptyText: 'Min 3 characters ...',
			searchScope: 'submissionID'
		}),

		{
			fieldLabel: 'Submitted from ',
			xtype: 'datefield',
			maxWidth: 300
		},{
			fieldLabel: 'Submitted to',
			xtype: 'datefield',
			maxWidth: 300
		},

		xluerzer_gui.getInstance().searchCombo({
			fieldLabel: 'Status',
			name: 'last',
			minChars: 1,
			emptyText: 'Min 1 characters ...',
			searchScope: 'submissionStatus'
		}),

		{
			fieldLabel: 'Credits',
			name: 'email'
		},

		xluerzer_gui.getInstance().simplyCombo({
			fieldLabel: 'Artwork?',
			name: 'artworkPresent',
			value: '',
			data: [{k:'',v:'Ignore'},{k:'n',v:'No'},{k:'y',v:'Yes'}]
		}),

		xluerzer_gui.getInstance().simplyCombo({
			fieldLabel: 'Credits?',
			name: 'creditsPresent',
			value: '',
			data: [{k:'',v:'Ignore'},{k:'n',v:'No'},{k:'y',v:'Yes'}]
		}),

		{
			fieldLabel: 'Issue',
			name: 'email'
		},

		{
			xtype: 'button',
			text: 'Start search',
			height: 30,
			handler: function() {
				console.info("ABCDEFGH");
			}
		}
		];

		var searchPanel = Ext.create('Ext.form.Panel', {
			region: 'north',
			border: false,
			bodyStyle:'padding:5px 5px 0',
			width: 350,
			collapsible: true,
			fieldDefaults: {
				msgTarget: 'side',
				labelWidth: 150
			},
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},
			items: [{
				xtype: 'container',
				anchor: '100%',
				layout:'column',
				bodyStyle:'padding:5px 5px 0',
				items:[{
					xtype: 'container',
					columnWidth:.3,
					layout: 'anchor',
					defaults: {
						anchor: '96%'
					},
					defaultType: 'textfield',
					items: items_left
				},{
					xtype: 'container',
					columnWidth:.3,
					layout: 'anchor',
					defaults: {
						anchor: '96%'
					},
					defaultType: 'textfield',
					items: items_right
				},{
					border: false,
					title: 'Suchstatistik',
					xtype: 'propertygrid',
					columnWidth:.4,
					anchor: '100%',
					source: {
					"Submissions": "100",
					"Kampangnen": "50",
					"Submitter": "40",
					"Submissions-Länder": "ARGENTINA(1), AUSTRALIA(5), AUSTRIA(19), BANGLADESH(11), BELGIUM(10), BOLIVIA(4), BRAZIL(3), CANADA(379), CHILE(117)",
					"Kampangnen-Länder": "HONG KONG(8), INDIA(3), INDONESIA(226), ISRAEL(3), ITALY(29), JAPAN(67), KAZAKHSTAN(33)",
					"Submitter-Länder": "PORTUGAL(1), PUERTO RICO(19), ROMANIA(7), RUSSIAN FEDERATION(4), SINGAPORE(7), SLOVAKIA(3)"
					}
				}]
			}]
		});

		var fields =  [
		{name:'es_id', 				text:'ID', 				type: 'int'},
		{name:'es_id', 				text:'Image', 			type: 'int', renderer: this.imgRendererSubmissionSmall, scope: this},
		{name:'es_state',			text:'State', 			type: 'int', renderer: this.submissionStateRender, scope: this},
		{name:'es_submittedFor',	text:'Submitted For', 	type: 'string'},
		{name:'es_submittedBy',		text:'Submitted By', 	type: 'string'},
		{name:'es_credits',			text:'Credits', 		type: 'string'},
		{name:'es_highResStatus',	text:'HighRes', 		type: 'string'},
		];

		var btn_id_bulk = Ext.id();
		var but_id_zip  = Ext.id();

		var submissions = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			title: 'Submission',
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			search: true,
			pager: true,

			button_export: true,
			selModelButtons:[btn_id_bulk,but_id_zip],
			toolbar_top: [{
				iconCls: 'xf_bulk',
				id: btn_id_bulk,
				disabled: true,
				text: 'Bulk Modification',
				menu: [{
					text: 'Change Status'
				},{
					text: 'Change Issue'
				}]
			},{
				disabled: true,
				id: but_id_zip,
				iconCls: 'xf_zip_file',
				text: 'Download Thumbnails'
			}],

			xstore: {
				load: 	this.getAjaxPath('s_OfTheDayX/load?dayx=2014-04-07'),
				pid: 	'SubmissionID',
				fields: fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					this.showSubmission(record.data.SubmissionID);
				}
			}
		});

		submissions.on('afterrender',function(){
			submissions.getStore().load();
		},this);

		var gui = Ext.create('Ext.panel.Panel', {
			title: 'Search Submission',
			layout:'border',
			items: [searchPanel,submissions]
		});

		xluerzer.getInstance().showContent(gui);
	},

	searchStudents: function() {

		var gui = {
			xtype: 'panel',
			title: 'searchStudents',
			html: 'searchStudents'
		};

		xluerzer.getInstance().showContent(gui);

	},

	show: function(id)
	{

		var me = this;

		// switch depending on student or normal submission
		var prefix = "es_";

		var submissionDetailsLeft =  Ext.create('Ext.form.Panel', {
			xtype: 'form',
			autoScroll: true,
			flex: 1,
			defaultType: 'textfield',
			region: 'west',
			cls: 'innen-content',
			border: false,
			split: {size: 10},


			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				padding: 0
			},

			items: [

			{
				fieldLabel: 'Submission ID',
				name: prefix+'id',
				readonly: true,
			},

			{
				fieldLabel: 'Submitted',
				name: prefix+'created',
				readonly: true,
			},

			{
				fieldLabel: 'Submitted by',
				name: prefix+'submittedBy',
				readonly: true
			},

			{
				fieldLabel: 'Country',
				name: prefix+'country_id',
				readonly: true
			},

			{
				fieldLabel: 'City',
				name: prefix+'city',
				readonly: true
			},

			{
				fieldLabel: 'Adress',
				name: prefix+'address',
				readonly: true
			},

			{
				fieldLabel: 'Phone',
				name: prefix+'phone',
				readonly: true
			},

			]
		});


		var submissionDetailsRight	= Ext.create('Ext.form.Panel', {
			xtype: 'form',
			autoScroll: true,
			flex: 1,
			defaultType: 'textfield',
			region: 'center',
			cls: 'innen-content',
			border: false,
			split: {size: 10},

			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				padding: 0
			},

			items: [

			{
				fieldLabel: 'Email',
				name: prefix+'email',
				allowBlank: false
			},

			xluerzer_gui.getInstance().simplyCombo({
				fieldLabel: 'Submitted for',
				name: prefix+'submittedFor',
				value: '',
				data: [{k:'',v:''},{k:'Magazine',v:'Print'},{k:'Commercial',v:'TV'},{k:'student-print',v:'Students Contest'},{k:'Specials',v:'Specials'}]
			}),

			xluerzer_gui.getInstance().simplyCombo({
				fieldLabel: 'Status',
				name: prefix+'state',
				data: [{k:'1',v:'Submitted'}, {k:'2',v:'Waiting for credits'}, {k:'3',v:'Not selected'}, {k:'4',v:'Preselected'}, {k:'5',v:'Selected'}, {k:'6',v:'Error / No image'}, {k:'7',v:'Pending'}, {k:'8',v:'Withdrawn'}]
			}),

			xluerzer_gui.getInstance().simplyCombo({
				fieldLabel: 'Ad of the Week',
				name: prefix+'adoftheweek',
				value: '',
				data: [{k:'',v:'-'}, {k:'2014-14',v:'2014-14'}, {k:'2014-15',v:'2014-15'}, {k:'2014-16',v:'2014-16'}]
			}),

			{
				fieldLabel: 'QR Code',
				name: prefix+'qr',
			},

			{
				xtype: 'textareafield',
				fieldLabel: 'Comments',
				name: prefix+'comments'
			}

			]
		});



		var submissionDetailsBottomLeft = Ext.create('Ext.form.Panel', {
			xtype: 'form',
			autoScroll: true,
			flex: 1,
			defaultType: 'textfield',
			region: 'west',
			cls: 'innen-content',
			border: false,
			split: {size: 10},

			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				padding: 0
			},

			items: [

			{
				xtype: 'box',
				html: 'bilder video etc'
			},
			]
		});


		var creditsGrid = xframe_pattern.getInstance().genGrid({
			region:'center',
			layout: 'fit',
			border:false,
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			search: true,
			pager: true,
			xstore: {

				load: 	this.getAjaxPath('s_credits_details/load/'),
				remove: this.getAjaxPath('s_credits_details/remove'),
				update: this.getAjaxPath('s_credits_details/update'),
				insert: this.getAjaxPath('s_credits_details/insert'),
				move: 	this.getAjaxPath('s_credits_details/move'),

				params: {
					es_id: id
				},

				pid: 	'esc_id',

				fields: [
				{name:'ct_symbol',		text:'', 				type: 'string', flex: 1},
				{name:'ct_description',	text:'Credit', 			type: 'string', flex: 1},
				{name:'esc_firstname',	text:'First Name', 		type: 'string', flex: 1},
				{name:'esc_lastname',	text:'Last Name', 		type: 'string', flex: 1},
				{name:'esc_company',	text:'Company', 		type: 'string', flex: 1},
				],
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					// this.showSubmission(record.data.SubmissionID);
				}
			},

		});

		creditsGrid.on('afterrender',function(){
			creditsGrid.getStore().load();
		},this);


		/*
		var submissionDetailsBottomRight = Ext.create('Ext.form.Panel', {
		xtype: 'form',
		autoScroll: true,
		flex: 1,
		defaultType: 'textfield',
		region: 'center',
		border: false,
		split: {size: 10},

		fieldDefaults: {
		labelAlign: 'top',
		msgTarget: 'side',
		padding: 0
		},

		items: [creditsGrid]
		});
		*/

		var submissionDetailsBottom	= Ext.create('Ext.form.Panel', {
			xtype: 'form',

			flex: 1,
			defaultType: 'textfield',
			region: 'south',
			layout: 'border',
			border: false,
			split: {size: 10},

			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				padding: 0
			},

			items: [submissionDetailsBottomLeft, creditsGrid]
		});

		var guiDetails = Ext.create('Ext.form.Panel', {
			title: 'Details',
			xtype: 'panel',
			layout: 'border',
			autoscroll: true,
			border: false,

			tbar: [{
				text: 'Save',
				iconCls: 'xf_save',
				scope: this,
				handler: function() {
					var values = submissionDetailsLeft.getForm().getValues();
					Ext.apply(values, submissionDetailsRight.getForm().getValues());
					saveData(values);
				},
			},{
				text: 'Print',
				iconCls:'xf_printer',
			},{
				text: 'Notify Submitter',
				iconCls:'xf_mail',
				handler: function(){
					scope: this,
					this.notifySubmitter
				}
			},{
				text: 'Previous',
				iconCls:'xf_arrow_left',
				handler: function(){
					scope: this,
					this.switchSubmission(id, 'prev')
				}

			},{
				text: 'Next',
				iconCls:'xf_arrow_right',
				handler: function(){
					scope: this,
					this.switchSubmission(id, 'next')
				}
			}

			],

			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				anchor: '96%',
				padding: 0,
				border: false
			},
			items: [submissionDetailsLeft, submissionDetailsRight, submissionDetailsBottom]
		});

		var guiS2B = Ext.create('Ext.form.Panel', {
			title: 'Submitter to Backend'
		});

		var guiOriginal = Ext.create('Ext.form.Panel', {
			title: 'Original submitted data'
		});

		var gui = Ext.create('Ext.tab.Panel', {

			title: 'Edit Submission - ID: '+id,
			items:[guiDetails, guiS2B, guiOriginal]

		});

		loadData = function()
		{
			console.info("id", id)
			gui.mask('Loading Data ...');
			xframe.ajax({
				scope: me,
				url: me.getAjaxPath('s_details/load'),
				params : {
					es_id: id
				},
				stateless: function(success, json)
				{
					gui.unmask();
					if (!success) return;
					submissionDetailsLeft.getForm().setValues(json);
					submissionDetailsRight.getForm().setValues(json);
				}
			});
		},

		saveData = function(values)
		{
			gui.mask('Saving Data ...');
			xframe.ajax({
				scope: me,
				type: 'post',
				url: me.getAjaxPath('s_details/save'),
				params : {
					es_id: id,
					data: Ext.encode(values)
				},
				stateless: function(success, json)
				{
					gui.unmask();
					if (!success);
					submissionDetailsLeft.getForm().setValues(json);
					submissionDetailsRight.getForm().setValues(json);
				}
			});
		},

		gui.on('afterrender',function(){
			loadData();
		},this,{buffer:1});

		xluerzer.getInstance().showContent(gui);
	}

}