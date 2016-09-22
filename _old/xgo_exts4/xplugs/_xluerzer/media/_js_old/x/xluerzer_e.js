var xluerzer_e = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_e";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xluerzer_e_(config);
			}
			return instance;
		}
	}
})();

var xluerzer_e_ = function(config) {
	this.config = config || {};
};

xluerzer_e_.prototype = {
	
		getMenuE: function() {

		var menuItems = [

			{
				text:'Submissions',
				handler: this.showSubmissionsByDay,
				scope: this
			},
	
			{
				text:'Search Submissions',
				handler: this.searchSubmissions,
				scope: this
			},
			
			{
				text:'Search Students Submissions',
				handler: this.searchSubmissions,
				scope: this
			},
	
			{
				xtype:'text',
				text: '',
				cls: 'spacer'
			},
	
			{
				text:'Contacts',
				handler: this.searchContacts,
				scope: this
			},
	
			/* {
				text:'New Company',
				handler: this.newCompany,
				scope: this,
			},
	
			{
				text:'New Person',
				handler: this.newPerson,
				scope: this,
			}, */
	
			/* {
				text:'CSV Import',
				idx: -1
			},*/
	
			{
				xtype:'text',
				text: '',
				cls: 'spacer'
			},
	
			{
				text:'Ads of the Week',
				handler: this.showAdsOfTheWeekOverview,
				scope: this,
			},
	
			/* this.defaultAction({
			text:'Ads of the week',
			pid: 'id',
			fields: [{name:'s_id',text:'Status', width: 80,renderer: this.stateRender, scope: this},{name:'title',text:'Title'},{name:'created',text:'Created On', width: 80},{name:'keywords',text:'Keywords'},{name:'media_id',text:'Image',renderer: this.imgRendererOe_120x40, scope: this}],
			scopex: 'oe_adsoftheweek'
			}), */
	
			{
				xtype:'text',
				text: '',
				cls: 'spacer'
			},
	
			this.defaultAction({
				text:'Publishing',
				pid: 'id',
				fields: [{name:'s_id',text:'Status', width: 80,renderer: this.stateRender, scope: this},{name:'title',text:'Title'},{name:'created',text:'Created On', width: 80},{name:'keywords',text:'Keywords'},{name:'media_id',text:'Image',renderer: this.imgRendererOe_120x40, scope: this}],
				scopex: 'oe_magazines'
			}),
	
			{
				xtype:'text',
				text: '',
				cls: 'spacer'
			},
			
			{		
				text:'Digital',
				disabled: true
			},
	
			{
				xtype:'text',
				text: '',
				cls: 'spacer'
			},
	
			{
				text:'Mailings',
				disabled: true,
				idx: -1
			}
		];

		return menuItems;
	},

	
	newMagazine: function() {

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
	
				this.simplyCombo({
					fieldLabel: 'State',
					name: 'state',
					data: [{k:'',v:''},{k:'published',v:'Published'},{k:'pending',v:'Pending Review'}]
				}),
	
				this.simplyCombo({
					fieldLabel: 'Issue',
					name: 'issue',
					data: [{k:'',v:''},{k:'2014_03',v:'2014 / 03'},{k:'2014_04',v:'2014 / 04'},{k:'2014_05',v:'2014 / 05'}]
				}),
	
				{
					xtype: 'button',
					iconCls:'xf_grid_add',
					text: 'New Issue',
					width: 150,
					listeners: {
						scope: this,
						click: function() {
							this.showDialog('issue');
						}
					}
				},
	
				this.chooseImageField('Cover Image'),
	
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
						html: 'Hier Allgemeine Settings und Übersicht zum Fortschritt (print: 250 total, x confirmed, x not confirmed, still to do: x)...'
					},
				]
			}
		];

		var gui = Ext.create('Ext.tab.Panel', {
			title: 'Blog Post ID: ',
			border: false,
			autoScroll: true,
			tbar: this.getTbarSub(),
			layout: 'column',

			defaults: {
				border: false,
			},

			items:[

			{
				title: 'Overall Settings',
				minHeight: 500,
				layout: 'column',

				items: contentItems,
			},

			{
				title: 'Print',
				html: 'Anzeige preselected print submissions für gewählte issue --> submission detail mit Prev / next --> selected oder not selected'
			},

			{
				title: 'TV',
				html: 'Anzeige preselected tv submissions für gewählte issue --> submission detail mit Prev / next --> selected oder not selected'
			},

			{
				title: 'Digital',
				html: 'Anzeige preselected digital submissions für gewählte issue --> submission detail mit Prev / next --> selected oder not selected'
			},

			{
				title: 'Normal interview',
				html: 'Auswahl "normales" Interview'
			},

			{
				title: 'Digital interview',
				html: 'Auswahl "digitales" Interview'
			},

			{
				title: 'Infotext',
				html: 'Eingabe Infotext'
			},

			{
				title: 'Translations',
				html: 'Übersetzungen (pdf) add - es. fra, it, ru, jp + möglichkeit weitere'
			},

			{
				title: 'Publish Magazine',
				html: 'nochmal übersicht und publish möglichkeit'
			},
			]

		});


		return gui;
	},
	
	showAdsOfTheWeekOverview: function() {

		var fields =  [
		{name:'mediaId', 			type: 'int'},
		{name:'spotMediaId', 		type: 'int'},
		{name:'classicMediaId', 	type: 'int'},
		{name:'printMediaId', 		type: 'int'},
		];

		var gui = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			title: 'Ads of the week',
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			search: true,
			pager: true,
			columns: [

			{
				text: 'Week',
				maxWidth: 100,
				dataIndex: 'weekx'
			},

			{
				text: '<b>Spot</b>',
				flex: 1,
				columns: [

					{
						name	 : 'spot_media_id',
						text	 : 'Image',
						minWidth : 150,
						dataIndex: 'mediaId',
						renderer : this.imgRendererSubmissionSmall,
						scope: this
					},
	
					{
						text     : 'Client',
						dataIndex: 'spot_client'
					},
	
					{
						text     : 'Title',
						dataIndex: 'spot_title'
					}

				]
			},

			{
				text: '<b>Classic Spot</b>',
				flex: 1,
				columns: [

					{
						name	 : 'classic_media_id',
						text	 : 'Image',
						minWidth : 150,
						dataIndex: 'mediaId',
						renderer : this.imgRendererSubmissionSmall,
						scope: this
					},
	
					{
						text     : 'Client',
						dataIndex: 'classic_client'
					},
	
					{
						text     : 'Title',
						dataIndex: 'classic_title'
					}

				]
			},

			{
				text: '<b>Print Ad</b>',
				flex: 1,
				columns: [

					{
						name	 : 'print_media_id',
						text	 : 'Image',
						minWidth : 150,
						dataIndex: 'mediaId',
						renderer : this.imgRendererSubmissionSmall,
						scope: this
					},
	
					{
						text     : 'Client',
						dataIndex: 'print_client'
					},
	
					{
						text     : 'Title',
						dataIndex: 'print_title'
					}

				]
			},

			],
			tbar: [{
				xtype: 'pagingtoolbar',
				border: false,
				flex: 1,
				pageSize: 100,
				// store: store,
				displayInfo: true,
				plugins: Ext.create('Ext.ux.ProgressBarPager', {}),
				displayMsg: '{0} - {1} of {2}'
			}],
			xstore: {
				load: 	this.getAjaxPath('e_submissionOfTheDayX/load?dayx=2014-01-08'),
				pid: 	'SubmissionID',
				fields: fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					// this.showSubmission(record.data.SubmissionID);
					this.openAdOfTheWeek();
				}
			}
		});

		gui.on('afterrender',function(){
			gui.getStore().load();
		},this);

		this.showContent(gui);
	},


	openAdOfTheWeek: function() {

		var items_left	= [

			this.searchCombo({
				fieldLabel: 'Client',
				name: 'spot_client',
				minChars: 3,
				searchScope: 'client'
			}),
	
			{
				fieldLabel: 'Title',
				name: 'spot_title',
				allowBlank: false,
				emptyText: 'Type to search ...'
			},
	
			{
				fieldLabel: 'Length',
				name: 'spot_length',
				allowBlank: false
			},
	
			{
				fieldLabel: 'Media ID',
				name: 'spot_MediaId',
				allowBlank: false,
				emptyText: 'Type to search ...'
			},
	
			this.searchCombo({
				fieldLabel: 'Submission ID',
				name: 'spot_submissionId',
				minChars: 3,
				emptyText: 'Type to search ...',
				searchScope: 'submissionID'
			}),
	
			{
				xtype: 'textareafield',
				fieldLabel: 'Text',
				name: 'spot_text',
				allowBlank: false
			}

		];


		var items_middle	= [

			this.searchCombo({
				name: 'classic_client',
				minChars: 3,
				allowBlank: false,
				searchScope: 'client'
			}),
	
			{
				name: 'classic_title',
				allowBlank: false,
				emptyText: 'Type to search ...'
			},
	
			{
				name: 'classic_length',
				allowBlank: false
			},
	
			{
				name: 'classic_MediaId',
				allowBlank: false,
				emptyText: 'Type to search ...'
			},
	
			this.searchCombo({
				name: 'classic_submissionId',
				minChars: 3,
				emptyText: 'Type to search ...',
				searchScope: 'submissionID'
			}),
	
			{
				xtype: 'textareafield',
				name: 'classic_text',
				allowBlank: false
			},

		];


		var items_right	= [

			this.searchCombo({
				name: 'print_client',
				minChars: 3,
				allowBlank: false,
				emptyText: 'Min 3 characters ...',
				searchScope: 'client'
			}),
	
			{
				name: 'print_title',
				allowBlank: false,
				emptyText: 'Min 3 characters ...'
			},
	
			{
				name: 'print_length',
				allowBlank: false
			},
	
			{
				name: 'print_MediaId',
				allowBlank: false
			},
	
			this.searchCombo({
				name: 'print_submissionId',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'submissionID'
			}),
	
			{
				xtype: 'textareafield',
				name: 'print_text',
				allowBlank: false
			}

		];

		var tbarSub = Ext.create('Ext.toolbar.Toolbar', {
			items: [

				{
					text: 'Save',
					iconCls: 'xf_save'
				},
	
				{
					text: 'Close',
					iconCls: 'xf_abort',
					listeners: {
						click: function() {
	
						}
					}
				}

			]
		});

		var btn_id_save = Ext.id();

		var addPanel = Ext.create('Ext.form.Panel', {
			region: 'north',
			border: false,
			fieldDefaults: {
				msgTarget: 'side',
				labelWidth: 150
			},
			tbar: tbarSub,
			defaultType: 'textfield',
			defaults: {
				anchor: '100%'
			},
			items: [

				{
					xtype: 'container',
					anchor: '100%',
					layout:'column',
					bodyStyle:'padding:5px 5px 0',
	
					items:[
	
						{
							xtype: 'panel',
							title: 'Spot of the week',
							columnWidth:.4,
							layout: 'anchor',
							margin: '0, 20, 0, 0',
							defaults: {
								anchor: '100%',
								padding: '5px 5px 0'
							},
							defaultType: 'textfield',
							items: items_left
						},
		
						{
							xtype: 'panel',
							title: 'Classic of the week',
							margin: '0, 20, 0, 0',
							columnWidth:.3,
							layout: 'anchor',
							defaults: {
								anchor: '100%',
								padding: '5px 5px 0'
							},
							defaultType: 'textfield',
							items: items_middle
						},
		
						{
							xtype: 'panel',
							title: 'Print Ad of the week',
							columnWidth:.3,
							layout: 'anchor',
							defaults: {
								anchor: '100%',
								padding: '5px 5px 0'
							},
							defaultType: 'textfield',
							items: items_right
						}
	
					]
				}
			]
		});

		var gui = Ext.create('Ext.panel.Panel', {
			title: 'Edit Week - 2014/16',
			layout:'border',
			items: [addPanel]
		});

		this.showContent(gui);
	},

	
	
	showCreditForm: function() {

		var fields =  [
		{name:'welcherIcon', 			type: 'string'},
		{name:'welcherText',	 		type: 'string'},
		{name:'value',			 		type: 'string'},
		];

		var gui = xframe_pattern.getInstance().genGrid({
			region:'center',
			border:false,
			collapseMode: 'mini',
			tbar: false,

			xstore: {
				load: 	this.getAjaxPath('e_submissionOfTheDayX/load?dayx=2014-01-08'),
				pid: 	'SubmissionID',
				fields: fields
			},

			listeners: {
				scope: this,
				buffer: 1,
			},

			columns: [

				{
					text: 'Icon',
					maxWidth: 75,
					dataIndex: 'SubmissionID'
				},
	
				{
					text: 'Type',
					dataIndex: 'type',
					flex: 1
				},
	
				{
					text: 'Value',
					dataIndex: 'value',
					flex: 2
				},

			],

		});

		gui.on('afterrender',function(){
			gui.getStore().load();
		},this);

		return gui;
	},

	
	imgRendererSubmissionIcon: function(value) {
		if ((value !== 'undefined') && (value != 0)) {
			return "<img width=120 src='/xgo/xplugs/xluerzer/ajax/media/oe_120x40/"+value+"'>";
		}
		else {
			return "";
			return "<img width=120 src='/xgo/xplugs/xluerzer/ajax/media/oe_120x40/default.png'>";
		}
	},

	imgRendererSubmissionSmall: function(value) {
		// return "<img height=80 src='/xgo/xplugs/xluerzer/ajax/e_submissionCrazyImage/?file="+value+".jpg&size=small'>";
		return "<img height=80 src='/xgo/xplugs/xluerzer/ajax/e_media/submission/"+value+"/small'>";
	},

	submissionStateRender: function(value) {
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
			default: return "unkown";
		}
	},
	
	stateRender: function(value) {
		switch(''+value)
		{
			case '1': return "<span class='published'>published</span>";
			case '2': return "<span class='pending'>pending review</span>";
			case '3': return "<span class='draft'>draft</span>";
			default: return "unkown";
		}
	},

	featuredRender: function(value) {
		switch(''+value)
		{
			case '1': return "yes";
			case '0': return "no";
			default: return "unkown";
		}
	},

	highResRender: function(value) {
		switch(''+value)
		{
			case '0': return "no";
			default: return "yes";
		}
	},
}