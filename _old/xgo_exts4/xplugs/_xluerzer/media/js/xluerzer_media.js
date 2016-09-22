var xluerzer_media = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_media";
		}

		this.getInstance = function(config) {
			return new xluerzer_media_(config);
			return instance;
		}
	}
})();

var xluerzer_media_ = function(config) {
	this.config = config || {};
};

xluerzer_media_.prototype = {


	renderer_submission_small: function(value,tr,record) {
		var url = xluerzer.getInstance().getAjaxPath('media/img_small/'+record.data.eam_id);
		return "<div class='submission_preview'><img width=150 height=150 src='"+url+"'></div>";
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
			default: return "unknown";
		}
	},

	renderer_submission_mediaType: function(value) {
		switch(''+value)
		{
			case '1': return "Print";	
			case '2': return "Film";
			case '3': return "Student";
			case '4': return "Website";
			case '5': return "APP";
			default: return "unknown";
		}
	},



	getDefaultSearchPanel: function(gridx) {
		var gui = {};
		return gui;
	},

	openMedia: function(eam_id)
	{
		xluerzer_media_detail.getInstance().open(eam_id);
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
		var me = this;
		if (typeof returnGui == 'undefined') returnGui = false;
		if (returnGui == "") returnGui = false;

		this.searchPanel = Ext.widget({

			xsubmit: function()
			{
				me.doSearch.call(me);
			},
			
			title: 'Search Parameters',
			region:'west',
			border: false,
			bodyPadding: 20,
			width: 500,
			split: true,
			collapseMode: 'mini',
			xtype: 'form',
			defaultType: 'textfield',
			overflowY: 'auto',
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
				fieldLabel: 'Overall',
				name: 'overall',
				emptyText: 'Search in fields: title & infotext ...'
			},
			{
				xtype: 'text',
				text: '',
				height: 20
			},
			{
				hideTrigger: true,
				xtype: 'numberfield',
				name: 'eam_id',
				fieldLabel: 'Media Id',
				emptyText: "Enter a Media id ..."
			},
			xluerzer_gui.getInstance().searchComboMedia({
				fieldLabel: 'Archive Nr.',
				name: 'eam_specials_archivNr',
				minChars: 3,
				emptyText: 'Enter Archive Nr. ...',
				searchScope: 'eam_specials_archivNr'
			}),
			{
				hideTrigger: true,
				xtype: 'numberfield',
				name: 'eam_specials_submission_id',
				fieldLabel: 'Submission Id',
				emptyText: "Enter a Submission id ..."
			},
			

			{
				xsearch: true,
				xtype: 'xluerzer_magazine',
				name: 'eam_magazine_id',
				fieldLabel: 'Magazine'
			},

			xluerzer_gui.getInstance().simplyCombo({
				fieldLabel: 'Artwork Type',
				name: 'eam_type',
				value: '',
				data: [{k:'0',v:'unknown'},{k:'1',v:'Print'},{k:'2',v:'Videos'},{k:'3',v:'Students'},{k:'4',v:'Web'},{k:'5',v:'App'}],
				emptyText: 'Print, Video, Student, Web, App ...'
			}),
			{
				xsearch: true,
				xtype: 'xluerzer_submission_category',
				name: 'eam_specials_category_id',
				fieldLabel: 'Category'
			},{
				xsearch: true,
				xtype: 'xluerzer_country',
				name: 'eam_specials_country_id',
				fieldLabel: 'Country'
			},
			
			{
				xtype: 'fieldcontainer',
				fieldLabel: 'Published',
				labelStyle: 'font-weight:bold;padding:0;',
				layout: 'hbox',
				defaultType: 'textfield',
				items: [{
					xtype: 'datefield',
					flex: 1,
					name: 'created_from',
					emptyText: 'From publish day ...'
				}, {
					xtype: 'datefield',
					flex: 1,
					name: 'created_to',
					emptyText: 'To publish day ...',
					margins: '0 0 0 5'
				}]
			},
			
			
			
			
			
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
				xtype: 'xluerzer_credit_institute' // 12
			},
			{
				xtype: 'xluerzer_credit_typographer' // 13
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
			}]

		});

		var fields =  [
		{name:'eam_id', 				text:'ID', 				type: 'int'},
		{name:'eam_specials_archivNr',	text:'ArchivNr', 		type: 'string'},
		{name:'eam_type',				text:'MediaType',		type: 'int', renderer: this.renderer_submission_mediaType, 	scope: this},
		{name:'eam_record_img_s_id',	text:'Image', 			type: 'int', renderer: this.renderer_submission_small, 		scope: this},
		{name:'eam_record_title',		text:'Title', 			type: 'string'},
		];

		this.contactsGrid = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			title: 'Media',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			pager: true,
			button_export: false,
			records_move: false,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('media/search'),
				pid: 	'eam_id',
				fields: fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					if (!returnGui) {
						xluerzer_media_detail.getInstance().open(record.data.eam_id);
					} else {
						if (typeof returnGui.callback == 'function') {
							returnGui.callback.call(returnGui.scope,record.data.eam_id);
						}
					}
				}
			}
		});

		var gui = Ext.create('Ext.panel.Panel', {
			title: 'Search Media',
			layout:'border',
			items: [this.searchPanel,this.contactsGrid]
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
		this.searchPanel.getForm().reset();
	},

	doSearch: function()
	{
		Ext.defer(this.doSearchReal,10,this);
	},

	doSearchReal: function()
	{
		var searchData = this.searchPanel.getForm().getValues();
		
		this.contactsGrid.getStore().proxy.extraParams['searchData'] = Ext.encode(searchData);
		this.contactsGrid.getStore().loadPage(1);
		
		
		console.info('searchData',searchData);
	},


	search4mediaPopUp: function(cfg) {

		var win = false;
		var gui = xluerzer_media.getInstance().open_search({
			scope: this,
			callback: function(eam_id) {
				win.close();
				cfg.callback.call(cfg.scope,eam_id);
			}
		});

		gui.title = "";

		win = Ext.create('Ext.window.Window', {
			modal: true,
			title: 'Search in Media',
			height: $$(window).height()*0.8,
			width: $$(window).width()*0.9,
			layout: 'fit',
			items: [gui]
		});

		win.show();
	}

}