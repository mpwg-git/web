var xluerzer_contacts = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_contacts";
		}

		this.getInstance = function(config) {
			return new xluerzer_contacts_(config);
			return instance;
		}
	}
})();

var xluerzer_contacts_ = function(config) {
	this.config = config || {};
};

xluerzer_contacts_.prototype = {

	render_ec_type: function(value)
	{
		switch(''+value)
		{
			case '0':
			return "Company";
			break;
			default:
			return "Person";
		}
	},


	mailRenderer: function(mail)
	{
		if (mail != "") return "<a href='mailto:"+mail+"'>"+mail+"</a>";
	},



	bulkChangeContact: function(grid,type,all)
	{
		var formId = Ext.id();
		var items = [];
		var cc = Ext.id();

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
			case 'ec_assignedTo':
			items = [{
				fieldLabel: 'Assigned To',
				name: 'ec_assignedTo',
				xtype: 'xluerzer_backend_users',
				width: 300
			}];
			break;
			case 'addCats':
			items = [{
				xsearch: true,
				id: cc,
				xtype: 'xluerzer_contact_categories',
				name:  'contact_categories',
				height: 300,
				width: 450,
				collapsible: false,
				collapsed: false
			}];
			break;
			default:
			xframe.alert("Internal Error @bulkChangeSubmission",type+" unset");
			return;
		}

		var ids = [];
		Ext.each(grid.getSelectionModel().getSelection(),function(r){
			ids.push(r.data['ec_id']);
		},this);

		var win = Ext.create('widget.window', {
			title: 'Bulk Change',
			closable: true,
			width: 500,
			height: 400,
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
				text: (all) ? 'change selected contacts' : 'change <b>'+ids.length+'</b> contacts',
				scope: this,
				handler: function() {

					var values = Ext.getCmp(formId).getForm().getValues();

					if (type == 'addCats') {

						values = [];
						var records = Ext.getCmp(cc).getView().getChecked();
						Ext.Array.each(records, function(rec) {
							values.push(rec.data.id);
						});

					}

					var cfg = {
						ids: ids,
						type: type,
						values: values
					}


					xframe.yn({
						title:'Change Contacts',
						msg: 'Do you really want to change all this contacts?',
						scope:this,
						handler: function(btn)
						{
							if (btn != 'yes') return;


							win.mask("Changing contact ...");
							xframe.ajax({
								scope: this,
								url: xluerzer.getInstance().getAjaxPath('contacts/bulkChange/'),
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


	open_search: function(returnGui)
	{
		if (typeof returnGui == 'undefined') returnGui = false;
		if (returnGui == "false") returnGui = false;
		if (returnGui == "undefined") returnGui = false;


		this.panel_search_left = Ext.widget({

			xsubmit: function()
			{
				me.doSearch.call(me);
			},

			border: false,
			columnWidth: 0.33,
			minWidth: 550,
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







			xluerzer_gui.getInstance().simplyCombo({
				xsearch: true,
				fieldLabel: 'Type',
				name: 'ec_type',
				value: '',
				width: 300,
				data: [{k:'0',v:'Company'},{k:'1',v:'Person'}],
				emptyText: 'Company or Person'
			}),



			xluerzer_gui.getInstance().simplyCombo({
				xsearch: true,
				fieldLabel: 'Retired',
				name: 'ec_retired',
				value: '',
				width: 300,
				data: [{k:'0',v:'No'},{k:'1',v:'Yes'}],
				emptyText: 'Yes/No'
			}),


			xluerzer_gui.getInstance().simplyCombo({
				xsearch: true,
				fieldLabel: 'Ranking Exklusion',
				name: 'ec_ranking_exklusion',
				value: '',
				width: 300,
				data: [{k:'0',v:'No'},{k:'1',v:'Yes'}],
				emptyText: 'Yes/No'
			}),


/*
			xluerzer_gui.getInstance().simplyCombo({
				xsearch: true,
				fieldLabel: 'Credited Artwork Type',
				name: 'artwork_type',
				value: '',
				data: [{k:'1',v:'Print'},{k:'2',v:'Videos'},{k:'4',v:'Web'},{k:'5',v:'APP'}],
				emptyText: 'Credited in Print, Video, Web or APP'
			}),
*/




			xluerzer_gui.getInstance().searchComboContacts({
				fieldLabel: 'First name',
				name: 'ec_firstname',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'ec_firstname'
			}),


			xluerzer_gui.getInstance().searchComboContacts({
				fieldLabel: 'Last name',
				name: 'ec_lastname',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'ec_lastname'
			}),

			xluerzer_gui.getInstance().searchComboContacts({
				fieldLabel: 'Company Name',
				name: 'ec_company',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'ec_company'
			}),

			xluerzer_gui.getInstance().searchComboContacts({
				fieldLabel: 'Position',
				name: 'ec_position',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'ec_position'
			}),

			xluerzer_gui.getInstance().searchComboContacts({
				fieldLabel: 'Branch',
				name: 'ec_branch',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'ec_branch'
			}),

			{
				xsearch: true,
				xtype: 'xluerzer_contact_type',
				name: 'ec_contactType_id',
				fieldLabel: 'Credited as'
			},


			{
				xsearch: true,
				xtype: 'xluerzer_country',
				name: 'ec_country_id',
				fieldLabel: 'Country'
			},

			xluerzer_gui.getInstance().searchComboContacts({
				fieldLabel: 'City',
				name: 'ec_city',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'ec_city'
			}),

			xluerzer_gui.getInstance().searchComboContacts({
				fieldLabel: 'E-Mail',
				name: 'ec_email',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'ec_email'
			}),
			
			xluerzer_gui.getInstance().searchComboContacts({
				fieldLabel: 'Phone',
				name: 'ec_phone',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'ec_phone'
			}),

			xluerzer_gui.getInstance().searchComboContacts({
				fieldLabel: 'Notes',
				name: 'ec_note',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'ec_note'
			}),

			xluerzer_gui.getInstance().searchComboContacts({
				fieldLabel: 'Contact-Log',
				name: 'contactLog',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'contactLog'
			}),
			
			xluerzer_gui.getInstance().searchComboContacts({
				fieldLabel: 'Category',
				name: 'categorySingle',
				minChars: 3,
				emptyText: 'Min 3 characters ...',
				searchScope: 'categorySingle'
			})

			
			/*
			,
			{
			xtype: 'text',
			text: '*use a leading and trailing % for more results e.g. %term_x%'
			}
			*/


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

		var me = this;

		this.panel_search_right = Ext.widget({

			xsubmit: function()
			{
				me.doSearch.call(me);
			},

			border: false,
			columnWidth: 0.33,
			minWidth: 550,
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

			items: [{
				xsearch: true,
				id: this.contact_types_id,
				xtype: 'xluerzer_contact_categories',
				name:  'contact_categories',
				height: 300,
				collapsible: false,
				collapsed: false,
				GROUP_CHECK: 1
			},
			
			]
		});

		this.panel_search_middle = Ext.widget({

			xsubmit: function()
			{
				me.doSearch.call(me);
			},

			border: false,
			columnWidth: 0.33,
			minWidth: 550,
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
				xtype: 'numberfield',
				name: 'ec_id',
				fieldLabel: 'Contact Id',
				emptyText: "Enter a user id ..."
			},

			{
				xsearch: true,
				xtype: 'xluerzer_magazine_search',
				name: 'credited_in_mag',
				fieldLabel: 'Credited in Magazine'
			},

			xluerzer_gui.getInstance().simplyCombo({
				xsearch: true,
				fieldLabel: 'Credited Artwork Type',
				name: 'artwork_type',
				value: '',
				data: [{k:'1',v:'Print'},{k:'2',v:'Videos'},{k:'4',v:'Web'},{k:'5',v:'APP'}],
				emptyText: 'Credited in Print, Video, Web or APP'
			}),


			{
				xsearch: true,
				xtype: 'xluerzer_backend_users',
				name: 'ec_assignedTo',
				fieldLabel: 'Assigned to'
			},


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
				xtype: 'fieldcontainer',
				fieldLabel: 'Modified',
				labelStyle: 'font-weight:bold;padding:0;',
				layout: 'hbox',
				defaultType: 'textfield',

				items: [{
					xtype: 'datefield',
					flex: 1,
					name: 'modified_from',
					emptyText: 'From modified day ...'
				}, {
					xtype: 'datefield',
					flex: 1,
					name: 'modified_to',
					emptyText: 'To modified day ...',
					margins: '0 0 0 5'
				}]
			},
			
			xluerzer_gui.getInstance().simplyCombo({
				xsearch: true,
				fieldLabel: 'Beyond Archive',
				name: 'beyond_archive',
				value: '',
				data: [{k:'Y',v:'Yes'},{k:'N',v:'No'}],
				emptyText: 'Yes/No'
			}),
			{
					boxLabel : 'Also search deleted Contacts',
					xtype: 'checkbox',
					uncheckedValue: 0,
					inputValue: 1,
					name: 'show_deleted'
			},
			{
					boxLabel : 'Show Contacts matching any chosen Category',
					xtype: 'checkbox',
					uncheckedValue: 0,
					inputValue: 1,
					name: 'show_cats_or'
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
			
			{
				xtype: 'text',
				text: '',
				height: 50
			}
			




			]
		});

		this.searchPanel = Ext.widget({
			region: 'north',
			collapsible: true,
			xtype: 'fieldset',
			//border:true,
			layout: 'column',

			animCollapse: false,
			collapsible: true,
			collapsed: true,

			defaults: {
				layout: 'anchor',
				defaults: {
					anchor: '100%'
				},
				padding: 20
			},


			title: 'Advanced Search',
			items: [

			this.panel_search_left,
			this.panel_search_middle,
			this.panel_search_right,

			],


		});

		this.searchPanelWrapper = Ext.widget({
			xtype: 'form',
			region: 'north',
			title: 'Search Parameters',
			overflowY: 'auto',
			tbar: ['Overall',

			{
				xtype: 'checkbox',
				name: 'overall_type_person',
				inputValue: '1',
				uncheckedValue: '0',
				boxLabel: 'Person',
				checked: true
			},

			{
				xtype: 'checkbox',
				name: 'overall_type_company',
				inputValue: '1',
				uncheckedValue: '0',
				boxLabel: 'Company',
				checked: true
			},



			{
				flex:1,
				xtype: 'textfield',
				name: 'overall',
				enableKeyEvents:true,
				emptyText: 'Search in firstname,lastname,company, email or the excact id ... [ENTER]',
				listeners: {
					scope: this,
					specialkey: function(field,event) {
						if (event.getKey() == event.ENTER) {
							this.doSearch();
						}
					}
				}
			}],
			bodyPadding: 20,
			items:[this.searchPanel]
		});

		var fields =  [
		{name:'ec_id', 				text:'ID', 					type: 'int'},
		{name:'ec_type',			text:'Type',				type: 'string', renderer: this.render_ec_type, scope: this},
		{name:'ec_firstname',		text:'Firstname',			type: 'string'},
		{name:'ec_lastname',		text:'Lastname', 			type: 'string'},
		{name:'ec_company',			text:'Company', 			type: 'string'},
		{name:'ec_city',			text:'City', 				type: 'string'},
		{name:'ac_name',		    text:'Country', 			type: 'string'},
		{name:'ec_email',			text:'Email', 				type: 'string',renderer:this.mailRenderer},
		{name:'ec_phone',			text:'Phone Number', 		type: 'string'},
		{name:'abu_username',		text:'Assigned to', 		type: 'string'},
		{name:'credits_total',		text:'Number of Credits', 	type: 'string'},

		];

		this.testId = 7777777;
		var btn_id_bulk = Ext.id();

		this.contactsGrid = xframe_pattern.getInstance().genGrid({

			fn_add_scope: this,
			fn_add: function(idx)
			{
				xluerzer_contacts_detail.getInstance().open(idx);
			},

			selModelButtons:[btn_id_bulk],
			toolbar_top: [{
				iconCls: 'xf_bulk',
				text: '[ALL] Bulk Modification',
				menu: [{
					text: 'Change Assigned To',
					scope: this,
					handler: function()
					{
						this.bulkChangeContact(this.contactsGrid,'ec_assignedTo',true);
					}
				},{
					text: 'Add to Category',
					scope: this,
					handler: function()
					{
						this.bulkChangeContact(this.contactsGrid,'addCats',true);
					}
				}]
			},{
				iconCls: 'xf_bulk',
				id: btn_id_bulk,
				disabled: true,
				text: 'Bulk Modification',
				menu: [{
					text: 'Change Assigned To',
					scope: this,
					handler: function()
					{
						this.bulkChangeContact(this.contactsGrid,'ec_assignedTo');
					}
				},{
					text: 'Add to Category',
					scope: this,
					handler: function()
					{
						this.bulkChangeContact(this.contactsGrid,'addCats');
					}
				}]
			}],


			region:'center',
			forceFit:true,
			border:false,
			title: 'Contacts',
			split: true,
			collapseMode: 'mini',
			button_del:true,
			button_add:true,
			search: false,
			pager: true,
			records_move: false,
			button_export: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('contacts/search'),
				insert: xluerzer.getInstance().getAjaxPath('contacts/insert'),
				remove: xluerzer.getInstance().getAjaxPath('contacts/remove'),
				pid: 	'ec_id',
				fields: fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					if (!returnGui) {
						xluerzer_contacts_detail.getInstance().open(record.data.ec_id);
					} else {
						if (typeof returnGui.callback == 'function') {
							returnGui.callback.call(returnGui.scope,record.data.ec_id);
						}
					}
				}
			}
		});

		this.contactsGrid.on('afterrender',function(){
			//this.contactsGrid.getStore().load();
		},this);


		var gui = Ext.create('Ext.panel.Panel', {
			title: 'Search / Add - Contacts',
			layout:'border',
			overflowY: 'auto',
			items: [this.searchPanelWrapper,this.contactsGrid]
		});


		if (returnGui)
		{
			return gui;
		} else {
			xluerzer.getInstance().showContent(gui);
		}
	},

	doReset: function()
	{
		this.searchPanelWrapper.getForm().reset();
		this.panel_search_left.getForm().reset();
		this.panel_search_middle.getForm().reset();
		this.panel_search_right.getForm().reset();
		Ext.getCmp(this.contact_types_id).getStore().load();
		
		this.contactsGrid.latestSearchData = false;
		this.contactsGrid.getStore().removeAll();

	},

	doSearch: function()
	{
		Ext.defer(this.doSearchReal,10,this);
	},

	doSearchReal: function()
	{
		console.info("doSearch");

		var fp_1 = this.panel_search_left.getForm().getValues();
		var fp_2 = this.panel_search_middle.getForm().getValues();
		var fp_3 = this.panel_search_right.getForm().getValues();
		var fp_4 = this.searchPanelWrapper.getForm().getValues();

		var searchData = {};

		Ext.iterate(fp_1,function(k,v){
			searchData[k] = v;
		});

		/*
		Ext.iterate(fp_2,function(k,v){
		searchData[k] = v;
		});
		*/
		Ext.iterate(fp_3,function(k,v){
			searchData[k] = v;
		});
		Ext.iterate(fp_4,function(k,v){
			searchData[k] = v;
		});

		searchData['contact_cats'] = [];
		var records = Ext.getCmp(this.contact_types_id).getView().getChecked();
		Ext.Array.each(records, function(rec) {
			searchData['contact_cats'].push(rec.data.id);
		});

		console.info('searchData',searchData);

		this.contactsGrid.latestSearchData = Ext.encode(searchData);
		this.contactsGrid.getStore().proxy.extraParams['searchData'] = Ext.encode(searchData);
		this.contactsGrid.getStore().loadPage(1);
	},

	open_import: function()
	{

	},

	search4submissionPopUp: function(cfg) {

		var win = false;

		var gui = xluerzer_contacts.getInstance().open_search({
			scope: this,
			callback: function(ec_id) {
				win.close();
				cfg.callback.call(cfg.scope,ec_id);
			}
		});
		gui.title = "";

		win = Ext.create('Ext.window.Window', {
			modal: true,
			title: 'Search in contacts',
			height: $$(window).height()*0.8,
			width: $$(window).width()*0.9,
			layout: 'fit',
			items: [gui]
		});

		win.show();
	}


}