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

	searchSubmissions: function() {

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
				load: 	this.getAjaxPath('e_submissionOfTheDayX/load?dayx='),
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

		this.showContent(gui);
	},

	showSubmissionSettings: function() {

		var contentItems = [

		{
			title: 'Settings',
			collapsible: true,
			collapseDirection : 'left',
			width: 180,
			margin: '0',
			cls: 'settings',
			xtype: 'form',
			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				padding: 0
			},

			items: [

			{
				xtype: 'button',
				iconCls:'xf_grid_add',
				text: 'New Special Submission',
				width: 150,
				listeners: {
					scope: this,
					click: function() {
						this.showDialog('submission');
					}
				}
			},

			]
		},

		{
			title: 'Content',
			columnWidth: 1,
			border: false,
			cls: 'content',
			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				padding: 0
			},
			defaults: {
				padding: '20,0,0,0'
			},

			items: [

			{
				html: 'Hier Allgemeine Settings und Erklärungen zum Prozess'
			}
			]
		}

		];

		var printItems = [

		{
			title: 'Settings',
			collapsible: true,
			collapseDirection : 'left',
			width: 180,
			margin: '0',
			cls: 'settings',
			xtype: 'form',
			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				padding: 0
			},

			items: [

			this.setStateField(),

			{
				fieldLabel: 'Deadline',
				xtype: 'datefield',
				maxWidth: 300
			}
			]

		},

		{
			title: 'Content',
			columnWidth: 1,
			border: false,
			cls: 'content',
			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				padding: 0
			},
			defaults: {
				padding: '20,0,0,0'
			},

			items: [

			]
		}

		];

		var gui = Ext.create('Ext.tab.Panel', {
			title: 'Submission Settings: ',
			border: false,
			autoScroll: true,
			tbar: this.getTbarSub(),
			layout: 'column',

			defaults: {
				border: false,
			},

			items:[

			{
				title: 'Overall',
				minHeight: 500,
				layout: 'column',

				items: contentItems,
			},

			{
				title: 'Print',
				html: 'Credits auswählen etc',

				items: printItems,
			},

			{
				title: 'TV',
			},

			{
				title: 'Digital',
			},

			{
				title: 'Specials',
				html: 'Zwischenschritt Auswahl welches special, dann bearbeiten',
				items: [

				this.searchCombo({
					fieldLabel: 'Which Special?',
					name: 'which_special',
					minChars: 3,
					emptyText: 'Search Title',
					searchScope: 'special_title'
				}),

				],
			},

			{
				title: 'Students',
			},

			]

		});

		this.showContent(gui);
	},


	setVideoJumps: function() {

		var myvideo = document.getElementById('myvideo'),
		jumplink = Ext.get('myvideo');

		console.log('video: ' + myvideo + ', jump: ' + jumplink);

		if (jumplink) {
			jumplink.addEventListener("click", function (event) {
				console.info("clicked");
				event.preventDefault();
				myvideo.play();
				myvideo.pause();
				myvideo.currentTime = 7;
				myvideo.play();
			}, false);
		}
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
				load: 	this.getAjaxPath('e_submissions_day_overview/load'),
				pid: 	'es_id',
				fields: fields,
				params: {}
			}
		});

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
				flex: 1,
				columns: [{
					text     : 'Submissions',
					dataIndex: 'total_submissions'
				}, {
					text     : 'Submitter',
					dataIndex: 'total_submitter'
				}]
			},

			{
				text: '<b>Print</b>',
				flex: 1,
				columns: [{
					text     : 'Submissions',
					dataIndex: 'total_print'
				}, {
					text     : 'Submitter',
					dataIndex: 'total_print_submitter'
				}]
			},

			{
				text: '<b>TV</b>',
				flex: 1,
				columns: [{
					text     : 'Submissions',
					dataIndex: 'total_tv'
				}, {
					text     : 'Submitter',
					dataIndex: 'total_tv_submitter'
				}]
			},

			{
				text: '<b>Specials</b>',
				flex: 1,
				columns: [{
					text     : 'Submissions',
					dataIndex: 'total_specials'
				}, {
					text     : 'Submitter',
					dataIndex: 'total_specials_submitter'
				}]
			},

			{
				text: '<b>Students</b>',
				flex: 1,
				columns: [
				{
					text     : 'Submissions',
					dataIndex: 'total_students'
				},

				{
					text     : 'Submitter',
					dataIndex: 'total_students_submitter'
				}
				]
			}
			],
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
					this.openSubmissionsDay(record.data.dayx);
				}
			}
		});

		this.showContent(submissionGrid);
	},


	openSubmissionsDay: function(dayx) {

		var tbar = Ext.create('Ext.toolbar.Toolbar', {
			items  : [

			{
				text: 'Print',
				iconCls: 'xf_print'
			},

			{
				text: 'TV',
				iconCls: 'xf_tv'
			},

			{
				text: 'Students Contest',
				iconCls: 'xf_students'
			},

			{
				text: 'Specials',
				iconCls: 'xf_special'
			},

			{
				text: 'LowRes',
				iconCls: 'xf_download'
			},

			{
				text: 'HighRes',
				iconCls: 'xf_download'
			}

			]
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

		var gui = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			title: 'Submissions Overview of '+ dayx,
			split: true,
			collapseMode: 'mini',
			tbar: tbar,
			button_del:true,
			button_add:true,
			search: true,
			pager: true,
			xstore: {
				load: 	this.getAjaxPath('e_submissionOfTheDayX/load?dayx='+dayx),
				pid: 	'es_id',
				fields: fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					this.showSubmissionNew(record.data.es_id);
				}
			},


		});

		gui.on('afterrender',function(){
			gui.getStore().load();
		},this);

		this.showContent(gui);
	},





	showSubmissionNew: function(id) {

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
				disabled: true,
			},

			{
				fieldLabel: 'Submitted',
				name: prefix+'created',
				disabled: true,
			},

			{
				fieldLabel: 'Submitted by',
				name: prefix+'submittedBy',
				disabled: true
			},

			{
				fieldLabel: 'Country',
				name: prefix+'country_id',
				disabled: true
			},

			{
				fieldLabel: 'City',
				name: prefix+'city',
				disabled: true
			},

			{
				fieldLabel: 'Adress',
				name: prefix+'address',
				disabled: true
			},

			{
				fieldLabel: 'Phone',
				name: prefix+'phone',
				disabled: true
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

			this.simplyCombo({
				fieldLabel: 'Submitted for',
				name: prefix+'submittedFor',
				value: '',
				data: [{k:'',v:''},{k:'Magazine',v:'Print'},{k:'Commercial',v:'TV'},{k:'student-print',v:'Students Contest'},{k:'Specials',v:'Specials'}]
			}),

			this.simplyCombo({
				fieldLabel: 'Status',
				name: prefix+'state',
				data: [{k:'1',v:'Submitted'}, {k:'2',v:'Waiting for credits'}, {k:'3',v:'Not selected'}, {k:'4',v:'Preselected'}, {k:'5',v:'Selected'}, {k:'6',v:'Error / No image'}, {k:'7',v:'Pending'}, {k:'8',v:'Withdrawn'}]
			}),

			this.simplyCombo({
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
			border:false,
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			search: true,
			pager: true,
			xstore: {

				load: 	this.getAjaxPath('e_submissioncredits_details/load/'+id),
				remove: this.getAjaxPath('e_submissioncredits/remove'),
				update: this.getAjaxPath('e_submissioncredits_details/update'),
				insert: this.getAjaxPath('e_submissioncredits/insert'),
				move: 	this.getAjaxPath('e_submissioncredits/move'),


				pid: 	'esc_id',

				fields: [
				{name:'ct_symbol',		text:'', 				type: 'string'},
				{name:'ct_description',	text:'Credit', 			type: 'string'},
				{name:'esc_firstname',	text:'First Name', 		type: 'string'},
				{name:'esc_lastname',	text:'Last Name', 		type: 'string'},
				{name:'esc_company',	text:'Company', 		type: 'string'},
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

			items: [submissionDetailsBottomLeft, submissionDetailsBottomRight]
		});



		var guiDetails = Ext.create('Ext.form.Panel', {
			title: 'Details',
			xtype: 'panel',
			layout: 'border',
			autoscroll: true,
			border: false,

			tbar: [

			{
				text: 'Save',
				iconCls: 'xf_save',
				scope: this,
				handler: function() {
					var values = submissionDetailsLeft.getForm().getValues();
					Ext.apply(values, submissionDetailsRight.getForm().getValues());
					saveData(values);
				},
			},

			{
				text: 'Print',
				iconCls:'xf_printer',
			},

			{
				text: 'Notify Submitter',
				iconCls:'xf_mail',
				handler: function(){
					scope: this,
					this.notifySubmitter
				}
			},

			{
				text: 'Previous',
				iconCls:'xf_arrow_left',
				handler: function(){
					scope: this,
					this.switchSubmission(id, 'prev')
				}

			},

			{
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
				url: me.getAjaxPath('e_submission_details/load/'+id),
				params : {
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
				jsonData: values,
				url: me.getAjaxPath('e_submission_details/save/'+id),
				params : {
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


		this.showContent(gui);

	},



	showSubmission: function(id) {

		/******************************************************************* submitter 2 backend BEGIN *************************************************************/
		var submitterBackend = Ext.create('Ext.form.Panel', {
			region: 'north',
			border: false,
			title: '',
			bodyStyle:'padding:5px 5px 0',
			forceFit: true,
			overflowY: 'auto',
			fieldDefaults: {
				msgTarget: 'side',
				labelWidth: 150
			},
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},
			items: [

			{
				xtype: 'container',
				anchor: '100%',
				title: 'Submitter 2 backend',
				border: false,
				minHeight: 400,
				collapsible: true,
				layout:'column',
				margin: '30, 0, 0, 0',
				bodyStyle:'padding:5px 5px 0',

				items: [

				{
					xtype: 'container',
					columnWidth:.4,
					layout: 'anchor',
					defaults: {
						anchor: '96%'
					},
					defaultType: 'textfield',
					items: [

					{
						xtype: 'container',
						html: '<b>Submission DB:</b><br /><br /><br />',
					},

					this.simplyCombo({
						fieldLabel: 'Salutation',
						name: 'salutation',
						value: '',
						data: [{k:'',v:''},{k:'mrs',v:'Mrs'},{k:'ms',v:'Ms'}, {k:'mr',v:'Mr'}]
					}),

					{
						fieldLabel: 'Firstname',
						name: 'firstname',
						minChars: 3,
					},

					{
						fieldLabel: 'Middlename',
						name: 'middlename',
						minChars: 3,
					},

					this.simplyCombo({
						fieldLabel: 'Company',
						name: 'company',
						value: '',
						data: [{k:'',v:''}]
					}),

					this.simplyCombo({
						fieldLabel: 'Position',
						name: 'position',
						value: '',
						data: [{k:'',v:''}]
					}),

					this.simplyCombo({
						fieldLabel: 'Represented by',
						name: 'represented_by',
						value: '',
						data: [{k:'',v:''}]
					}),

					{
						fieldLabel: 'Country',
						name: 'country',
						minChars: 3,
					},

					{
						fieldLabel: 'City',
						name: 'city',
						minChars: 3,
					},

					{
						fieldLabel: 'Adress',
						name: 'adress',
						minChars: 3,
					},

					{
						fieldLabel: 'Phone',
						name: 'phone',
						minChars: 3,
					},

					{
						fieldLabel: 'Fax',
						name: 'fax',
						minChars: 3,

					},

					{
						fieldLabel: 'Email',
						name: 'email',
						minChars: 3,
					},

					{
						xtype: 'container',
						html: '&nbsp;</b><br /><br /><br />',
					},

					this.searchCombo({
						fieldLabel: 'Load from Submissions',
						name: 'loadSubmission',
						minChars: 3,
						allowBlank: false,
						emptyText: 'Search Name / City / ...',
						searchScope: 'credit_client'
					}),

					]

				},

				{
					xtype: 'container',
					columnWidth:.05,
					layout: 'anchor',
					defaultType: 'textfield',

					items: [

					{
						xtype: 'container',
						html: '&nbsp;</b><br /><br /><br />',
					},

					{
						xtype: 'button',
						text: '<-',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '<-',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '<-',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '<-',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '<-',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '<-',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '<-',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '<-',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '<-',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '<-',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '<-',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '<-',
						cls: 'switchButton',
						width: 50,
					},

					]

				},

				{
					xtype: 'container',
					columnWidth:.05,
					layout: 'anchor',
					defaults: {
					},
					defaultType: 'textfield',
					items: [

					{
						xtype: 'container',
						html: '&nbsp;</b><br /><br /><br />',
					},

					{
						xtype: 'button',
						text: '->',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '->',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '->',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '->',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '->',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '->',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '->',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '->',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '->',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '->',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '->',
						cls: 'switchButton',
						width: 50,
					},

					{
						xtype: 'button',
						text: '->',
						cls: 'switchButton',
						width: 50,
					},

					]

				},

				{
					xtype: 'container',
					columnWidth:.4,
					layout: 'anchor',
					defaults: {
						anchor: '96%'
					},
					defaultType: 'textfield',
					items: [

					{
						xtype: 'container',
						html: '<b>Contacts DB:</b><br /><br /><br />',
					},

					this.simplyCombo({
						fieldLabel: 'Salutation',
						name: 'salutation',
						value: '',
						data: [{k:'',v:''},{k:'mrs',v:'Mrs'},{k:'ms',v:'Ms'}, {k:'mr',v:'Mr'}]
					}),

					{
						fieldLabel: 'Firstname',
						name: 'firstname',
						minChars: 3,
					},

					{
						fieldLabel: 'Middlename',
						name: 'middlename',
						minChars: 3,
					},

					this.simplyCombo({
						fieldLabel: 'Company',
						name: 'company',
						value: '',
						data: [{k:'',v:''}]
					}),

					this.simplyCombo({
						fieldLabel: 'Position',
						name: 'position',
						value: '',
						data: [{k:'',v:''}]
					}),

					this.simplyCombo({
						fieldLabel: 'Represented by',
						name: 'represented_by',
						value: '',
						data: [{k:'',v:''}]
					}),

					{
						fieldLabel: 'Country',
						name: 'country',
						minChars: 3,
					},

					{
						fieldLabel: 'City',
						name: 'city',
						minChars: 3,
					},

					{
						fieldLabel: 'Adress',
						name: 'adress',
						minChars: 3,
					},

					{
						fieldLabel: 'Phone',
						name: 'phone',
						minChars: 3,
					},

					{
						fieldLabel: 'Fax',
						name: 'fax',
						minChars: 3,
					},

					{
						fieldLabel: 'Email',
						name: 'email',
						minChars: 3,
					},

					{
						xtype: 'container',
						html: '&nbsp;</b><br /><br /><br />',
					},

					this.searchCombo({
						fieldLabel: 'Load from Contacts',
						name: 'loadSubmission',
						minChars: 3,
						allowBlank: false,
						emptyText: 'Search Name / City / ...',
						searchScope: 'credit_client'
					}),

					]
				}
				]
			}

			]
		});

		/******************************************************************* submitter 2 backend END *************************************************************/


		/******************************************************************* submission detail BEGIN *************************************************************/

		var prefix = "es_";

		var submissionDetailsLeft = [

		{
			fieldLabel: 'Email',
			name: prefix+'email',
			allowBlank: false
		},

		this.simplyCombo({
			fieldLabel: 'Submitted for',
			name: prefix+'submittedFor',
			disabled: true,
			data: [{k:'',v:''},{k:'Magazine',v:'Print'},{k:'Commercial',v:'TV'},{k:'student-print',v:'Students Contest'},{k:'Specials',v:'Specials'}]
		}),

		{
			fieldLabel: 'Submission ID',
			name: prefix+'id',
			disabled: true,
		},

		{
			fieldLabel: 'Submitted',
			name: prefix+'created',
			disabled: true,
		},

		{
			fieldLabel: 'Submitted by',
			name: prefix+'submittedBy',
			disabled: true
		},

		{
			fieldLabel: 'Country',
			name: prefix+'country',
			disabled: true
		},

		{
			fieldLabel: 'City',
			name: prefix+'city',
			disabled: true
		},

		{
			fieldLabel: 'Adress',
			name: prefix+'adress',
			disabled: true
		},

		{
			fieldLabel: 'Phone',
			name: prefix+'phone',
			disabled: true
		},


		];


		var submissionDetailsRight	= [

		this.simplyCombo({
			fieldLabel: 'Submitted for',
			name: prefix+'submittedFor',
			value: '',
			data: [{k:'',v:''},{k:'Magazine',v:'Print'},{k:'Commercial',v:'TV'},{k:'student-print',v:'Students Contest'},{k:'Specials',v:'Specials'}]
		}),

		this.simplyCombo({
			fieldLabel: 'Status',
			name: prefix+'status',
			value: '',
			data: [{k:'',v:''}, {k:'submitted',v:'Submitted'}, {k:'pending',v:'Pending'}, {k:'selected',v:'Selected'}]
		}),

		this.simplyCombo({
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

		];


		var submissionDetails = [

		{
			xtype: 'panel',
			autoscroll: true,
			cls: 'innen-content',
			border: false,

			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				padding: 0
			},

			items:[

			{
				xtype: 'form',
				flex: 1,
				layout: 'anchor',
				defaultType: 'textfield',
				items: submissionDetailsLeft
			},

			{
				xtype: 'form',
				flex: 1,
				defaultType: 'textfield',
				items: submissionDetailsRight
			}

			]
		}

		];




		/******************************************************************* submission video BEGIN *************************************************************/
		var submissionVideoLeft = [

		{
			xtype: 'box',
			html: '<div class="video-container"><video preload="true" controls width="640" height="359" id="myvideo"><source src="/ffmpeg/video-cms.mp4#t=npt:7,12" type="video/mp4"></video></div>',
		},

		{
			xtype: 'box',
			html: '<div class="thumbs-container"><img src="/ffmpeg/video-cms.mp4_thumb1.jpg" /><img src="/ffmpeg/video-cms.mp4_thumb2.jpg" id="jump" /><img src="/ffmpeg/video-cms.mp4_thumb3.jpg" /><img src="/ffmpeg/video-cms.mp4_thumb4.jpg" /><img src="/ffmpeg/video-cms.mp4_thumb5.jpg" /><img src="/ffmpeg/video-cms.mp4_thumb6.jpg" /><img src="/ffmpeg/video-cms.mp4_thumb7.jpg" /><img src="/ffmpeg/video-cms.mp4_thumb8.jpg" /><img src="/ffmpeg/video-cms.mp4_thumb9.jpg" /><img src="/ffmpeg/video-cms.mp4_thumb10.jpg" /></div>'
		}

		];



		Ext.define('DataObject', {
			extend: 'Ext.data.Model',
			fields: [
			{name:'icon', 			text:'Icon', 			type: 'string', 		width: 32},
			{name:'type', 			text:'Type', 			type: 'string'},
			{name:'value',			text:'Value',		 	type: 'string'}
			]
		});


		var submissionVideoRight = xframe_pattern.getInstance().genGrid({
			region: 'center',
			border: false,

			collapseMode: 'mini',

			xstore: {
				model: 'DataObject',
				data: [
				{ 'icon': 'test1.jpg',  'text': 'Ad Agency', 'value': 'test' },
				{ 'icon': 'test2.jpg',  'text': 'Photographer', 'value': 'test' }
				],
			},

			columns: [

			{
				text: 'Icon',
				maxWidth: 75,
				dataIndex: 'icon'
			},

			{
				text: 'Type',
				dataIndex: 'type'
			},

			{
				text: 'value',
				dataIndex: 'value'
			},

			],

			listeners: {

				buffer: 1,
			}

		});

		var submissionVideoRight = [
		this.buildCreditForm(this.searchCombo({
			fieldLabel: 'Client',
			name: 'credit_client',
			cls: 'credit-client',
			minChars: 3,
			allowBlank: false,
			emptyText: 'Min 3 characters ...',
			flex: 1,
			searchScope: 'credit_client'
		})),

		this.buildCreditForm(this.searchCombo({
			fieldLabel: 'Ad Agency',
			name: 'credit_agency',
			cls: 'credit-agency',
			minChars: 3,
			allowBlank: false,
			emptyText: 'Min 3 characters ...',
			flex: 1,
			searchScope: 'credit_agency'
		})),

		this.buildCreditForm(this.searchCombo({
			fieldLabel: 'Creative Director',
			name: 'credit_creative_director',
			cls: 'credit-creative-director',
			minChars: 3,
			allowBlank: false,
			emptyText: 'Min 3 characters ...',
			flex: 1,
			searchScope: 'credit_creative'
		})),

		this.buildCreditForm(this.searchCombo({
			fieldLabel: 'Art Director',
			name: 'credit_art_director',
			cls: 'credit-art-director',
			minChars: 3,
			allowBlank: false,
			emptyText: 'Min 3 characters ...',
			flex: 1,
			searchScope: 'credit_art_director'
		})),

		this.buildCreditForm(this.searchCombo({
			fieldLabel: 'Copywriter',
			name: 'credit_copywriter',
			cls: 'credit-copywriter',
			minChars: 3,
			allowBlank: false,
			emptyText: 'Min 3 characters ...',
			flex: 1,
			searchScope: 'credit_copywriter'
		})),

		this.buildCreditForm(this.searchCombo({
			fieldLabel: 'Illustrator',
			name: 'credit_illustrator',
			cls: 'credit-illustrator',
			minChars: 3,
			allowBlank: false,
			emptyText: 'Min 3 characters ...',
			flex: 1,
			searchScope: 'credit_illustrator'
		})),

		this.buildCreditForm(this.searchCombo({
			fieldLabel: 'Digital Artist',
			name: 'credit_digital_artist',
			cls: 'credit-digital-artist',
			minChars: 3,
			allowBlank: false,
			emptyText: 'Min 3 characters ...',
			flex: 1,
			searchScope: 'credit_digital_artist'
		})),

		this.buildCreditForm(this.searchCombo({
			fieldLabel: 'Photographer',
			name: 'credit_photographer',
			cls: 'credit-photographer',
			minChars: 3,
			allowBlank: false,
			emptyText: 'Min 3 characters ...',
			flex: 1,
			searchScope: 'credit_photographer'
		})),
		{
			xtype: 'button',
			iconCls:'xf_grid_add',
			text: 'Add Credit',
			maxWidth: 150,
			listeners: {
				scope: this,
				click: function() {

					var fieldContainer = new Ext.form.FieldContainer({layout:'hbox'});
					var aux = this.simplyCombo({
						name: 'new_credit',
						value: 'Choose Credit',
						width: 150,
						data: [{k:'client',v:'Client'},{k:'agency',v:'Ad Agency'},{k:'creative_director',v:'Creative Director'},{k:'art_director',v:'Art Director'},{k:'copywriter',v:'Copywriter'},{k:'illustrator',v:'Illustrator'},{k:'digital_artist',v:'Digital Artist'},{k:'photographer',v:'Photographer'},],
					});
					var aux2 = { xtype: 'textfield', name: 'credit', margin: '0, 0, 0, 20', flex: 1};

					fieldContainer.add(aux, aux2);

					Ext.getCmp('creditformVideo').insert(0, fieldContainer);
				}
			}
		},

		{
			fieldLabel: 'Keywords',
			name: 'keywords',
			margin: '20, 0, 0 ,0'
		},

		{
			fieldLabel: 'HiRes',
			name: 'highres',
			value: "present",
			disabled: true,
		},

		];



		var submissionVideo = [

		{
			xtype: 'container',
			anchor: '100%',
			layout:'column',
			bodyStyle:'padding:5px 5px 0',
			items:[

			{
				xtype: 'container',
				columnWidth:.5,
				layout: 'anchor',
				defaults: {
					anchor: '96%'
				},
				defaultType: 'textfield',
				items: submissionVideoLeft
			},

			{
				xtype: 'container',
				columnWidth:.5,
				name: 'creditformVideo',
				layout: 'anchor',
				defaults: {
					anchor: '96%'
				},
				defaultType: 'textfield',
				items: submissionVideoRight
			}

			]
		}

		];

		/******************************************************************* submission video END *************************************************************/


		/******************************************************************* submission image BEGIN *************************************************************/
		var submissionImageLeft = [

		{
			xtype: 'box',
			html: '<img src="/ffmpeg/video-cms.jpg" />',
		}

		];


		var submissionImageRight = [

		this.buildCreditForm(this.searchCombo({
			fieldLabel: 'Client',
			name: 'credit_client',
			cls: 'credit-client',
			minChars: 3,
			allowBlank: false,
			emptyText: 'Min 3 characters ...',
			flex: 1,
			searchScope: 'credit_client'
		})),

		this.buildCreditForm(this.searchCombo({
			fieldLabel: 'Ad Agency',
			name: 'credit_agency',
			cls: 'credit-agency',
			minChars: 3,
			allowBlank: false,
			emptyText: 'Min 3 characters ...',
			flex: 1,
			searchScope: 'credit_agency'
		})),

		this.buildCreditForm(this.searchCombo({
			fieldLabel: 'Creative Director',
			name: 'credit_creative_director',
			cls: 'credit-creative-director',
			minChars: 3,
			allowBlank: false,
			emptyText: 'Min 3 characters ...',
			flex: 1,
			searchScope: 'credit_creative'
		})),

		this.buildCreditForm(this.searchCombo({
			fieldLabel: 'Art Director',
			name: 'credit_art_director',
			cls: 'credit-art-director',
			minChars: 3,
			allowBlank: false,
			emptyText: 'Min 3 characters ...',
			flex: 1,
			searchScope: 'credit_art_director'
		})),

		this.buildCreditForm(this.searchCombo({
			fieldLabel: 'Copywriter',
			name: 'credit_copywriter',
			cls: 'credit-copywriter',
			minChars: 3,
			allowBlank: false,
			emptyText: 'Min 3 characters ...',
			flex: 1,
			searchScope: 'credit_copywriter'
		})),

		this.buildCreditForm(this.searchCombo({
			fieldLabel: 'Illustrator',
			name: 'credit_illustrator',
			cls: 'credit-illustrator',
			minChars: 3,
			allowBlank: false,
			emptyText: 'Min 3 characters ...',
			flex: 1,
			searchScope: 'credit_illustrator'
		})),

		this.buildCreditForm(this.searchCombo({
			fieldLabel: 'Digital Artist',
			name: 'credit_digital_artist',
			cls: 'credit-digital-artist',
			minChars: 3,
			allowBlank: false,
			emptyText: 'Min 3 characters ...',
			flex: 1,
			searchScope: 'credit_digital_artist'
		})),

		this.buildCreditForm(this.searchCombo({
			fieldLabel: 'Photographer',
			name: 'credit_photographer',
			cls: 'credit-photographer',
			minChars: 3,
			allowBlank: false,
			emptyText: 'Min 3 characters ...',
			flex: 1,
			searchScope: 'credit_photographer'
		})),
		{
			xtype: 'button',
			iconCls:'xf_grid_add',
			text: 'Add Credit',
			maxWidth: 150,
			listeners: {
				scope: this,
				click: function() {

					var fieldContainer = new Ext.form.FieldContainer({layout:'hbox'});
					var aux = this.simplyCombo({
						name: 'new_credit',
						value: 'Choose Credit',
						width: 150,
						data: [{k:'client',v:'Client'},{k:'agency',v:'Ad Agency'},{k:'creative_director',v:'Creative Director'},{k:'art_director',v:'Art Director'},{k:'copywriter',v:'Copywriter'},{k:'illustrator',v:'Illustrator'},{k:'digital_artist',v:'Digital Artist'},{k:'photographer',v:'Photographer'},],
					});
					var aux2 = { xtype: 'textfield', name: 'credit', margin: '0, 0, 0, 20', flex: 1};
					fieldContainer.add(aux, aux2);
					Ext.getCmp('creditformImage').insert(0, fieldContainer);

				}
			}
		},

		{
			fieldLabel: 'Keywords',
			name: 'keywords',
			margin: '20, 0, 0 ,0'
		},

		{
			fieldLabel: 'HiRes',
			name: 'highres',
			value: "present",
			disabled: true,
		}

		];


		var submissionImage = [

		{
			xtype: 'container',
			layout:'column',
			bodyStyle:'padding:5px 5px 0',
			items:[

			{
				xtype: 'container',
				columnWidth:.5,
				layout: 'anchor',
				defaults: {
					anchor: '96%'
				},
				defaultType: 'textfield',
				items: submissionImageLeft
			},

			{
				xtype: 'container',
				columnWidth:.5,
				name: 'creditformImage',
				layout: 'anchor',
				defaults: {
					anchor: '96%'
				},
				defaultType: 'textfield',
				items: submissionImageRight
			}

			]
		}

		];

		/******************************************************************* submission image END *************************************************************/

		var guiSub = Ext.create('Ext.panel.Panel', {
			border: false,
			layout: 'border',

			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side'
			},
			defaults: {
				border: false,
				margin: '0 0 0 0',
			},

			items: submissionDetails,

			/* {
			// title: 'Submission Detail',
			items: submissionDetails
			}/*,

			{
			title: 'Submission Video',
			items: submissionVideo,
			border: false,
			},

			{
			title: 'Submission Image',
			items: submissionImage
			}, */

			listeners: {
				scope: this,
				buffer: 1,
				afterrender:function() {

					this.setVideoJumps();
				},
			}
		});

		var gui = Ext.create('Ext.tab.Panel', {

			border: false,
			autoScroll: true,
			title: 'Submission ID: '+id,
			bodyStyle:'padding: 0',
			tbar: [

			{
				text: 'Save',
				iconCls: 'xf_save'
			},

			{
				text: 'Close',
				iconCls: 'xf_abort'

			},

			{
				text: 'Print',
				iconCls:'xf_printer',
			},

			{
				text: 'Notify Submitter',
				iconCls:'xf_mail',
				handler: function(){
					scope: this,
					this.notifySubmitter
				}
			},

			{
				text: 'Previous',
				iconCls:'xf_arrow_left',
				handler: function(){
					scope: this,
					this.switchSubmission(0, 'prev')
				}

			},

			{
				text: 'Next',
				iconCls:'xf_arrow_right',
				handler: function(){
					scope: this,
					this.switchSubmission(0, 'next')
				}
			}

			],

			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side'
			},

			items:[

			{
				title: 'Details',
				items: [guiSub],
				autoScroll: true,
			},

			{
				title: 'Submitter 2 Backend',
				items: [submitterBackend]
			},

			{
				title: 'Original submitted Data',

			},

			{
				title: 'Logs',
				items: [

				xframe_pattern.getInstance().genGrid({
					region:'center',
					forceFit:true,
					border:false,
					split: true,
					collapseMode: 'mini',

					button_del:true,
					button_add:true,
					search: true,
					pager: true,
					xstore: {
						load: 	this.getAjaxPath('e_submissionOfTheDayX/load?dayx='),
						pid: 	'SubmissionID',
						fields: [
						{name:'createdOn',		text:'Created on', 		type: 'timestamp'},
						{name:'createdBy',		text:'Created by', 		type: 'string'},
						{name:'action',			text:'Action', 			type: 'string'},
						{name:'oldValue',		text:'Old value', 		type: 'string'},
						{name:'newValue',		text:'New Value', 		type: 'string'},
						],
					},
					listeners: {
						scope: this,
						buffer: 1,
						itemdblclick: function(g,record) {
							// this.showSubmission(record.data.SubmissionID);
						}
					}
				}),

				]
			}

			]

		});

		this.showContent(gui);
	},


	switchSubmission: function(submissionId, direction) {
		/* TODO fuer prev / next button */
	},

	printSubmission: function(submissionId) {
		// TODO
	},

	saveSubmission: function() {
		// TODO
	},

	closeSubmission: function() {
		// TODO
	},

	sortNewCredit: function() {
		/* TODO einsortieren bei neuem credit */
	},

	notifySubmitter: function() {
		// TODO
	},

	closeAllTabs: function(butNot) {
		// TODO, alle tabs schliesen ausser...
	}



}