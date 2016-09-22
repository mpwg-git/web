Date.prototype.getWeekNumber = function(){
	var d = new Date(+this);
	d.setHours(0,0,0);
	d.setDate(d.getDate()+4-(d.getDay()||7));
	return Math.ceil((((d-new Date(d.getFullYear(),0,1))/8.64e7)+1)/7);
};


var xluerzer_oe = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_oe";
		}

		this.getInstance = function(config) {
			return new xluerzer_oe_(config);
			return instance;
		}
	}
})();

var xluerzer_oe_ = function(config) {
	this.config = config || {};
};

xluerzer_oe_.prototype = {

	open_fa: function()
	{
		var gui = xredaktor_storage.getInstance().getMainPanel({
			mode: 'normal',
			s_storage_scope: xredaktor.getInstance().getCurrentBasicStorage(),
			site_id: xredaktor.getInstance().getCurrentSiteId()
		});
		gui.title = "CMS File Archive";
		xluerzer.getInstance().showContent(gui);
	},

	getMenu: function()
	{
		/******** default grid widths BEGIN *******/

		var width_state 	= 100;
		var width_year 		= 50;
		var width_week 		= 50;
		var width_keywords 	= 200;
		var width_image 	= 140;
		var width_modified 	= 120;
		var width_published = 120;

		/******** default grid widths END *******/

		var menuItems = [

		xluerzer_gui.getInstance().defaultAction({

			id: 'btn_features_overview',

			cfg_grid: {
				text:'Features',
				pid: 'oetw_id',
				fields: [{name:'oetw_online',text:'Online',width:80,  renderer: xluerzer_renderer.getInstance().renderer_state_online},{name:'oetw_state',text:'State', width: width_state, renderer: xluerzer_renderer.getInstance().renderer_state_features},{name:'oetw_day',text:'Publish start',width:80},{name:'oetw_year_week',text:'Year-Week', width: 80, type: 'string'},{name:'oetw_day_of_week',text:'Type', width: 100, renderer: xluerzer_renderer.getInstance().renderer_type_features},{name:'oetw_title',text:'Title',width:150},{name:'oetw_desc_short',text:'Short Description',width:150,kickHtml:true},{name:'oetw_keywords',text:'Keywords', width: width_keywords},{name:'oetw_modified_ts',text:'Modified', width: width_modified},{name:'oetw_media_id',text:'Image', width:width_image, renderer: this.renderer_titleImg},{name:'oetw_img_gallery',text:'Gallery',  renderer: this.renderer_gallery}],
				scopex: 'oe_thisweek',
				initSort: '[{"property":"oetw_id","direction":"DESC"},{"property":"oetw_day","direction":"DESC"},{"property":"oetw_year","direction":"DESC"}, {"property":"oetw_week","direction":"DESC"}]'
			},

			cfg_record: {
				handler: this.default_recordInterface,
				scope: this,
				at_id: 1,
				pid: 	'oetw_id',
				prefix: 'oetw_',
				title: 	'Feature',
				scopex: 'oe_thisweek'
			}

		}),

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'Inspirations',
				pid: 'oei_id',
				fields: [{name:'oei_state',text:'State', width: width_state,renderer: xluerzer_renderer.getInstance().renderer_state_features},{name:'oei_date_start',text:'Publish start', width: width_published},{name:'oei_title',text:'Title'},{name:'oei_desc_short',text:'Short Description',kickHtml:true},{name:'oei_keywords',text:'Keywords'},{name:'oei_media_id',text:'Image', width: width_image, renderer: this.renderer_inspiration},{name:'oei_modified_ts',text:'Modified', width: width_modified}],
				scopex: 'oe_inspiration',
				initSort: '[{"property":"oei_id","direction":"DESC"}]'
			},

			cfg_record: {
				handler: this.default_recordInterface,
				scope: this,
				at_id: 2,
				pid: 'oei_id',
				prefix: 'oei_',
				title: 'Inspiration',
				scopex: 'oe_inspiration'
			}



		}),

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'Partners',
				pid: 'oep_id',
				fields: [{name:'oep_state',text:'State', width: width_state,renderer: xluerzer_renderer.getInstance().renderer_state_features},{name:'oep_date_start',text:'Publish start', width: width_published},{name:'oep_title',text:'Title'},{name:'oep_desc_short',text:'Description',kickHtml:true},{name:'oep_keywords',text:'Keywords', width: width_keywords},{name:'oep_media_id',text:'Image', width: width_image, renderer: this.renderer_partners}, {name:'oep_modified_ts',text:'Modified', width: width_modified}],
				scopex: 'oe_partners',
				initSort: '[{"property":"oep_id","direction":"DESC"}]'
			},

			cfg_record: {
				handler: this.default_recordInterface,
				scope: this,
				at_id: 3,
				pid: 'oep_id',
				prefix: 'oep_',
				title: 'Partner',
				scopex: 'oe_partners'
			}

		}),

		xluerzer_gui.getInstance().defaultAction({


			cfg_grid: {

				text:'Designer Profiles',
				pid: 'oedp_id',
				fields: [{name:'oedp_state',text:'State', width: width_state,renderer: xluerzer_renderer.getInstance().renderer_state_features},{name:'oedp_fe_profile_id',text:'Profile ID', width: '100'},{name:'oedp_title',text:'Title'},{name:'oedp_date_start',text:'Publish start', width: width_published},{name:'oedp_year_week',text:'Year-Week', width: 80, type: 'string'},{name:'oedp_keywords',text:'Keywords', width: width_keywords},{name:'oedp_desc_short',text:'Short Description',kickHtml:true},{name:'oedp_media_id',text:'Image', width: width_image, renderer: this.renderer_designerProfiles},{name:'oedp_modified_ts',text:'Modified', width: 80}],
				scopex: 'oe_designerprofiles',
				initSort: '[{"property":"oedp_id","direction":"DESC"}]'
			},

			cfg_record: {
				handler: this.default_recordInterface,
				scope: this,
				at_id: 4,
				pid: 'oedp_id',
				prefix: 'oedp_',
				title: 'Designer Profile',
				scopex: 'oe_designerprofiles'
			}

		}),

		xluerzer_gui.getInstance().defaultAction({


			cfg_grid: {
				text:"Blog",
				pid: 'oebp_id',
				fields: [{name:'oebp_online',text:'Online',width:80, renderer: xluerzer_renderer.getInstance().renderer_state_online},{name:'oebp_state',text:'State', width: width_published,renderer: xluerzer_renderer.getInstance().renderer_state_features},{name:'oebp_date_start',text:'Publish start', width: width_published},{name:'oebp_title',text:'Title'},{name:'oebp_cat_id_human',text:'Category'},{name:'oebp_desc_short',text:'Short Description',kickHtml:true},{name:'oebp_keywords',text:'Keywords', width: width_keywords},{name:'oebp_media_id',text:'Image', width: width_image, renderer: this.renderer_blog},{name:'oebp_img_gallery',text:'Gallery',  renderer: this.renderer_gallery},{name:'oebp_modified_ts',text:'Created On', width: width_modified}],
				scopex: 'oe_blogposts',
				initSort: '[{"property":"oebp_id","direction":"DESC"}]'
			},

			cfg_record: {
				handler: this.default_recordInterface,
				scope: this,
				at_id: 5,
				pid: 'oebp_id',
				prefix: 'oebp_',
				title: 'Editor Blog',
				scopex: 'oe_blogposts'
			}

		}),

		xluerzer_gui.getInstance().defaultAction({

			cfg_grid: {
				text:'Events',
				pid: 'oee_id',
				fields: [{name:'oee_online_2',text:'Online',width:80, renderer: xluerzer_renderer.getInstance().renderer_state_online},{name:'oee_state',text:'State', width: width_state, renderer: xluerzer_renderer.getInstance().renderer_state_features},{name:'oee_date_from',text:'Date from', width: width_published},{name:'oee_date_to',text:'Date to', width: width_published},{name:'oee_title',text:'Title'},{name:'oee_desc_short',text:'Short Description',kickHtml:true},{name:'oee_keywords',text:'Keywords', width: width_keywords},{name:'oee_media_id',text:'Image', width: width_image, renderer: this.renderer_events}, {name:'oee_modified_ts',text:'Modified', width: width_modified}],
				scopex: 'oe_events',
				initSort: '[{"property":"oee_id","direction":"DESC"},{"property":"oee_id","direction":"DESC"}]'
			},

			cfg_record: {
				handler: this.default_recordInterface,
				scope: this,
				at_id: 6,
				pid: 'oee_id',
				prefix: 'oee_',
				title: 'Event',
				scopex: 'oe_events'
			}


		}),

		xluerzer_gui.getInstance().defaultAction({
			cfg_grid: {
				text:'Other Article',
				pid: 'oeoa_id',
				fields: [{name:'oeoa_state',text:'State', width: width_state,renderer: xluerzer_renderer.getInstance().renderer_state_features},{name:'oeoa_title',text:'Title'},{name:'oeoa_desc_short',text:'Short Description',kickHtml:true},{name:'oeoa_keywords',text:'Keywords', width: width_keywords},{name:'oeoa_media_id',text:'Image', width: width_image,renderer: this.renderer_oarticle},{name:'oeoa_img_gallery',text:'Gallery',  renderer: this.renderer_gallery}, {name:'oeoa_modified_ts',text:'Modified', width: width_modified}],
				scopex: 'oe_otherarticle',
				initSort: '[{"property":"oeoa_id","direction":"DESC"}]'
			},
			cfg_record: {
				handler: this.default_recordInterface,
				scope: this,
				at_id: 7,
				pid: 'oeoa_id',
				prefix: 'oeoa_',
				title: 'Article',
				scopex: 'oe_otherarticle'
			}
		}),


		{
			xtype:'text',
			text: '',
			cls: 'spacer'
		},

		/*
		xluerzer_gui.getInstance().defaultAction({
		cfg_grid: {
		text:'Frontpage Articles',
		pid: 'oefta_id',
		fields: [{name:'oefta_id',text:'ID'},{name:'oefta_title',text:'Title'},{name:'oefta_html',text:'Text'},{name:'oefta_s_id',text:'Image'}],
		scopex: 'oe_frontpage_teaser_articles',
		initSort: '[{"property":"oefta_id","direction":"DESC"}]'
		},
		cfg_record: {
		handler: this.default_recordInterface,
		scope: this,
		at_id: 8,
		pid: 'oefta_id',
		prefix: 'oefta_',
		title: 'Frontpage Articles',
		scopex: 'oe_frontpage_teaser_articles'
		}
		}),
		*/

		{
			xtype:'text',
			text: '',
			cls: 'spacer'
		},
		{
			text: 'Frontpage Configuration',
			title: 'Frontpage Configuration',
			classx: 'xluerzer_frontpageconfig',
			fn: 'open_frontpageconfig'

		},{
			text: 'Product Configuration',
			title: 'Product Configuration',
			classx: 'xluerzer_frontpageconfig',
			fn: 'open_productsconfig'

		},{
			text: 'Static Pages',
			title: 'Static Pages',
			classx: 'xluerzer_frontpageconfig',
			fn: 'open_staticssconfig'

		},
		{
			xtype:'text',
			text: '',
			cls: 'spacer'
		},

		{
			text: 'File Archive',
			title: 'CMS File Archive',
			classx: 'xluerzer_oe',
			fn: 'open_fa'

		},

		];

		return menuItems;
	},



	renderer_titleImg: function(value) {
		return "<center><img width=120 height=37 src='/xgo/xplugs/xluerzer/ajax/oe_media/titleImg/"+value+"'></center>";
	},


	renderer_inspiration: function(value) {
		return "<center><img width=71 height=50 src='/xgo/xplugs/xluerzer/ajax/oe_media/inpsiration/"+value+"'></center>";
	},

	renderer_oarticle: function(value) {
		return "<center><img width=72 height=50 src='/xgo/xplugs/xluerzer/ajax/oe_media/oarticle/"+value+"'></center>";
	},

	renderer_events: function(value) {
		return "<center><img width=69 height=50 src='/xgo/xplugs/xluerzer/ajax/oe_media/event/"+value+"'></center>";
	},

	renderer_blog: function(value) {
		return "<center><img width=150 height=50 src='/xgo/xplugs/xluerzer/ajax/oe_media/blog/"+value+"'></center>";
	},

	renderer_partners: function(value) {
		return "<center><img width=76 height=50 src='/xgo/xplugs/xluerzer/ajax/oe_media/partner/"+value+"'></center>";
	},

	renderer_designerProfiles: function(value) {
		return "<center><img width=45 height=60 src='/xgo/xplugs/xluerzer/ajax/oe_media/dprofile/"+value+"'></center>";
	},



	renderer_gallery: function(oetw_img_gallery) {
		if (oetw_img_gallery == "") return "no images";

		var oetw_img_gallery = Ext.decode(oetw_img_gallery,true);
		var html = [];
		Ext.each(oetw_img_gallery,function(s_id){

			var urlBig = '/xgo/xplugs/xluerzer/ajax/oe_media/img_orig/'+s_id;
			html.push("<td><a href='"+urlBig+"' target='_blank' title='open full image in browser'><img width=60 height=60 src='/xgo/xplugs/xluerzer/ajax/oe_media/galleryImg/"+s_id+"'></a></td>");

		},this);

		return '<table><tr>'+html.join('')+"</tr></table>";

	},


	getDefaultSettingsByScope: function(prefix,scopex)
	{

		var s_dir = 243822; // OE
		switch (scopex)
		{
			case 'oe_frontpage_teaser_articles':
			s_dir = 1175274; // other-articles
			break;
			case 'oe_partners':
			s_dir = 1175275; // partners
			break;
			case 'oe_inspiration':
			s_dir = 243829; // inspirations
			break;
			case 'oe_blogposts':
			s_dir = 244276; // blog
			break;
			case 'oe_events':
			s_dir = 1175276; // events
			break;
			case 'oe_thisweek':
			s_dir = 248906; // features - thisweek
			break;
			case 'oe_designerprofiles':
			s_dir = 858305; // designerprofiles
			break;
			default: break;
		}

		var items  = [
		xluerzer_gui.getInstance().setStateField({
			name: prefix+'state',
				readOnly: true
		}),
		xluerzer_gui.getInstance().publishStartField({
			name: prefix+'date_start'
		}),
		{
			xtype: 'xr_field_file_2',
			fieldLabel: 'Image',
			cls: 'imageContainerBox',
			img_w: 500,
			img_h: 350,
			dir: s_dir,
			addPath: Ext.Date.format(new Date(),"Y")+'/'+Ext.Date.getWeekOfYear(new Date()),
			name: prefix+'media_id'
		}
		];

		switch (scopex)
		{

			case 'oe_otherarticle':
			items = [xluerzer_gui.getInstance().setStateField({
				name: prefix+'state',
				readOnly: true
			}),{
				xtype: 'xr_field_file_2',
				fieldLabel: 'Image',
				cls: 'imageContainerBox',
				img_w: 300,
				img_h: 400,
				dir: s_dir,
				addPath: Ext.Date.format(new Date(),"Y")+'/'+Ext.Date.getWeekOfYear(new Date()),
				name: prefix+'media_id'
			}];
			break;

			case 'oe_frontpage_teaser_articles':
			items = [
			xluerzer_gui.getInstance().chooseImageField({
				name: 'oefta_s_id'
			})
			];
			break;

			case 'oe_designerprofiles':
			items  = [
			xluerzer_gui.getInstance().setStateField({
				name: prefix+'state',
				readOnly: true
			}),
			{
				xtype		: 'datefield',
				name		: 'oedp_date_start',
				fieldLabel	: 'Publish start',
				submitFormat: 'Y-m-d'
			},

			{
				hideTrigger: true,
				xtype		: 'numberfield',
				name		: 'oedp_start_year',
				fieldLabel	: 'Year *',
			},
			{
				xtype		: 'numberfield',
				name		: 'oedp_start_kw',
				fieldLabel	: 'Week *',
				minValue	: 0,
				maxValue	: 52
			},
			{
				xtype: 'text',
				text: '* auto update after save',
				padding: '0 0 0 10'
			},
			{
				xtype: 'xr_field_file_2',
				fieldLabel: 'Image',
				cls: 'imageContainerBox',
				img_w: 300,
				img_h: 400,
				dir: s_dir,
				addPath: Ext.Date.format(new Date(),"Y")+'/'+Ext.Date.getWeekOfYear(new Date()),
				name: prefix+'media_id'
			}
			];
			break;

			case 'oe_events':
			items = [
			xluerzer_gui.getInstance().setStateField({
				name: 'oee_state',
				readOnly: true
			}),
			{
				xtype: 'datefield',
				emptyText: 'Pick date ...',
				fieldLabel: 'From date',
				name: 'oee_date_from',
				submitFormat: 'Y-m-d'
			},
			{
				xtype: 'datefield',
				emptyText: 'Pick date ...',
				fieldLabel: 'To date',
				name: 'oee_date_to',
				submitFormat: 'Y-m-d'
			},
			{
				xtype: 'xr_field_file_2',
				fieldLabel: 'Image',
				cls: 'imageContainerBox',
				img_w: 510,
				img_h: 371,
				dir: s_dir,
				addPath: Ext.Date.format(new Date(),"Y")+'/'+Ext.Date.getWeekOfYear(new Date()),
				name: prefix+'media_id'
			}

			];
			break;


			case 'oe_thisweek':
			items  = [
			xluerzer_gui.getInstance().setStateField({
				name: prefix+'state',
				readOnly: true
			}),
			{
				xtype		: 'datefield',
				name		: 'oetw_day',
				fieldLabel	: 'Publish start',
				submitFormat: 'Y-m-d'
			},
			{
				hideTrigger: true,
				readOnly: true,
				hideTrigger: true,
				xtype		: 'numberfield',
				name		: 'oetw_year',
				fieldLabel	: 'Year*'
			},
			{
				readOnly: true,
				xtype		: 'numberfield',
				name		: 'oetw_week',
				fieldLabel	: 'Week*',
				minValue	: 0,
				maxValue	: 52
			},

			{
				xtype: 'text',
				text: '* auto update after save',
				padding: '0 0 0 10'
			},

			xluerzer_gui.getInstance().simplyCombo({
				readOnly: true,
				fieldLabel: 'Type*',
				name: 'oetw_day_of_week',
				value: '',
				data: [{k:'',v:''},{k:'1',v:'Audiovisual'},{k:'2',v:'Campaigns'}, {k:'3',v:'Who\'s Who'}, {k:'4',v:'Digital'}, {k:'5',v:'Editor\'s Blog'}]
			}),
			{
				xtype: 'text',
				text: '* auto update after save',
				padding: '0 0 0 10'
			},

			{
				xtype: 'xr_field_file_2',
				fieldLabel: 'Image',
				cls: 'imageContainerBox',
				img_w: 1108,
				img_h: 340,
				dir: 248906,
				addPath: Ext.Date.format(new Date(),"Y")+'/'+Ext.Date.getWeekOfYear(new Date()),
				name: prefix+'media_id'
			},
			
			{
				xtype: 'xr_field_file_2',
				fieldLabel: 'Most Read Image',
				cls: 'imageContainerBox',
				img_w: 700,
				img_h: 700,
				dir: 248906,
				addPath: Ext.Date.format(new Date(),"Y")+'/'+Ext.Date.getWeekOfYear(new Date()),
				name: prefix+'media_cropped_id'
			}


			];
			break;

			case 'oe_blogposts':
			items = [
			xluerzer_gui.getInstance().setStateField({
				name: prefix+'state',
				readOnly: true
			}),
			{
				fieldLabel: 'Category',
				xtype: 'xluerzer_blog_categories',
				name: 'oebp_cat_id'
			},
			xluerzer_gui.getInstance().simplyCombo({
				fieldLabel: 'Featured',
				name: prefix+'featured',
				data: [{k:'0',v:'No'},{k:'1',v:'Yes'}]
			}),

			xluerzer_gui.getInstance().publishStartField({
				name: prefix+'date_start'
			}),

			{
				xtype: 'xr_field_file_2',
				fieldLabel: 'Image - Detail Page (uncropped)',
				cls: 'imageContainerBox',
				img_w: 0,
				img_h: 0,
				dir: s_dir,
				addPath: Ext.Date.format(new Date(),"Y")+'/'+Ext.Date.getWeekOfYear(new Date()),
				name: prefix+'media_id'
			},

			{
				xtype: 'xr_field_file_2',
				fieldLabel: 'Image - Banner',
				cls: 'imageContainerBox',
				img_w: 1800,
				img_h: 600,
				dir: s_dir,
				addPath: Ext.Date.format(new Date(),"Y")+'/'+Ext.Date.getWeekOfYear(new Date()),
				name: prefix+'img_promo_single_id'
			},

			{
				xtype: 'xr_field_file_2',
				fieldLabel: 'Image - Box',
				cls: 'imageContainerBox',
				img_w: 698,
				img_h: 416,
				dir: s_dir,
				addPath: Ext.Date.format(new Date(),"Y")+'/'+Ext.Date.getWeekOfYear(new Date()),
				name: prefix+'img_promo_id'
			},

			/*
			xluerzer_gui.getInstance().chooseImageField({
			fieldLabel: 'Blog Overview',
			name: prefix+'img_promo_id'
			}),
			xluerzer_gui.getInstance().chooseImageField({
			fieldLabel: 'Blog Featured',
			name: prefix+'img_promo_single_id'
			})
			*/

			];
			break;
			default : break;
		}

		return items;
	},

	getDefaultContentByScope: function(prefix,scopex)
	{

		var showUrl = false;
		switch (scopex)
		{
			case 'oe_blogposts':
			case 'oe_thisweek':
			case 'oe_otherarticle':
			showUrl = true;
			break;
			default: break;
		}

		var items = [
		{
			xtype: 'fieldcontainer',
			layout: 'hbox',
			width: '100%',
			forceFit: true,
			defaultType: 'textfield',
			items: [
			{
				xtype: 'container',
				flex: 1,
				items: [
				{
					enableKeyEvents: true,
					xtype: 'textfield',
					name: prefix+'title',
					fieldLabel: 'Title',
					width: '100%',
					height: 40,
					margin: '10, 0'
				}]
			}]
		}

		,{
			margin: 0,
			xtype: 'fieldcontainer',
			layout: 'column',
			width: '100%',
			items: [{
				enableKeyEvents: true,
				//xtype: 'xr_field_html',
				xtype: (scopex == 'oe_blogposts') ? 'xr_field_html':'textarea',
				fieldLabel: 'Short description (max. 160 chars) < 80 chars keywords ',
				name: prefix+'desc_short',
				height: 90,
				height2: (scopex == 'oe_blogposts') ? 90:70,
				margin: '0 0 0 10',
				margin2: (scopex == 'oe_blogposts') ? '0 0 0 10':'',
				columnWidth: 0.5
			},{
				xtype: 'text',
				width:20
			},{
				enableKeyEvents: true,
				columnWidth: 0.5,
				xtype: 'textareafield',
				fieldLabel: 'Keywords approx. 10 keywords corresponding to description',
				name: prefix+'keywords',
				height: 70
			}]
		},{
			xtype: 'fieldcontainer',
			layout: 'column',
			width: '100%',
			items: [{
				enableKeyEvents: true,
				xtype:'xr_field_html',
				columnWidth: 0.5,
				height: 500,
				cls: 'htmlfieldfull',
				fieldLabel: 'Article Column - Left',
				name: prefix+'col_left',
			},{
				xtype: 'splitter',
				width: 20,
				minWidth: 20
			},{
				enableKeyEvents: true,
				xtype:'xr_field_html',
				columnWidth: 0.5,
				height: 500,
				cls: 'htmlfieldfull',
				fieldLabel: 'Article Column - Right',
				name: prefix+'col_right'
			}]
		},{
			hidden: !showUrl,
			xtype: 'fieldcontainer',
			layout: 'column',
			width: '100%',
			items: [{
				xtype: 'textfield',
				name: '_vanityUrl',
				fieldLabel: 'Vanity URL',
				readOnly: true,
				columnWidth: 1,
			}]
		}

		];


		switch (scopex)
		{


			case 'oe_frontpage_teaser_articles':
			items = [
			{
				enableKeyEvents: true,
				xtype: 'textfield',
				name: 'oefta_title',
				fieldLabel: 'Title',
				height: 40,
				margin: '10, 10'
			},
			{
				xtype: 'xr_field_html',
				fieldLabel: 'Text',
				name: 'oefta_html',
				padding: 10

			}
			]
			break;

			case 'oe_inspiration':
			this.cb_external = Ext.id();
			items = [

			{
				xtype: 'fieldcontainer',
				layout: 'hbox',
				width: '100%',
				forceFit: true,
				defaultType: 'textfield',
				items: [
				{
					xtype: 'container',
					flex: 1,
					items: [
					{
						enableKeyEvents: true,
						xtype: 'textfield',
						name: prefix+'title',
						fieldLabel: 'Title',
						width: '100%',
						height: 40,
						margin: '10, 0'
					}]
				}]
			}

			,{
				margin: 0,
				xtype: 'fieldcontainer',
				layout: 'column',
				width: '100%',
				items: [{
					enableKeyEvents: true,
					xtype: 'textarea',
					fieldLabel: 'Short description (max. 160 chars) < 80 chars keywords ',
					name: prefix+'desc_short',
					height: 70,
					columnWidth: 0.5
				},{
					xtype: 'text',
					width:20
				},{
					enableKeyEvents: true,
					columnWidth: 0.5,
					xtype: 'textareafield',
					fieldLabel: 'Keywords approx. 10 keywords corresponding to description',
					name: prefix+'keywords',
					height: 70
				}]
			},
			{
				xtype: 'fieldcontainer',
				layout: 'hbox',
				width: '100%',
				forceFit: true,
				margin: '10, 0',
				defaultType: 'textfield',

				items: [
				{
					xtype: 'checkbox',
					uncheckedValue: 0,
					inputValue: '1',
					name: 'oei_url_external',
					id: this.cb_external,
					fieldLabel: 'External',
					width: 60
				},
				{
					enableKeyEvents: true,
					name: 'oei_url',
					fieldLabel: 'Link',
					flex: 1
				}
				]
			}
			];


			break;

			case 'oe_designerprofiles':
			items = [

			{

				xtype: 'fieldcontainer',
				layout: 'hbox',
				width: '100%',
				forceFit: true,
				defaultType: 'textfield',

				items: [

				{
					xtype: 'container',
					flex: 1,
					items: [

					{
						enableKeyEvents: true,
						xtype: 'textfield',
						fieldLabel: 'Name:',
						name: 'oedp_title',
						width: '100%'
					},

					{
						enableKeyEvents: true,
						xtype: 'textareafield',
						fieldLabel: 'Keywords',
						name: 'oedp_keywords',
						width: '100%',
						height: 120
					},

					]
				},

				{
					xtype: 'splitter',
					width: 20,
				},
				{
					xtype:'xr_field_html',
					fieldLabel: 'Bio',
					name: 'oedp_desc_short',
					height: 220,
					flex: 3
				}

				]
			},
			
			{
				xtype: 'xluerzer_designerprofile',
				name: 'oedp_fe_profile_id',
				fieldLabel: 'Designer Profile ID',
				xsearch: true
			},

			/*
			{
				hideTrigger: true,
				enableKeyEvents: true,
				fieldLabel: 'Designer Profile ID',
				name: 'oedp_fe_profile_id',
				emptyText: 'Profile ID...',
				xtype: 'numberfield'
			},

			
			xluerzer_gui.getInstance().searchComboProfiles({
			fieldLabel: 'Designer Profile ID',
			name: 'oedp_fe_profile_id',
			minChars: 3,
			emptyText: 'Min 3 characters ...',
			searchScope: 'ec_lastname'
			}),
			*/

			xluerzer_gui.getInstance().setLinkField({
				name: 'oedp_url'
			}),

			];
			break;

			case 'oe_events':
			items = [

			{

				xtype: 'fieldcontainer',
				layout: 'hbox',
				width: '100%',
				forceFit: true,
				defaultType: 'textfield',

				items: [

				{
					xtype: 'container',
					flex: 3,
					items: [
					{
						enableKeyEvents: true,
						xtype: 'textfield',
						name: 'oee_title',
						fieldLabel: 'Title',
						width: '100%',
						height: 40,
						margin: '10, 0'
					},

					{
						xtype: 'xr_field_html',
						fieldLabel: 'Short description (max. 160 chars) < 80 chars keywords [Frontpage]',
						name: 'oee_desc_short',
						height: 175,
						width: '100%',
						margin: '10, 0'
					},
					]
				},

				{
					xtype: 'splitter',
					width: 20,
				},
				{
					enableKeyEvents: true,
					xtype: 'textareafield',
					fieldLabel: 'Keywords',
					name: 'oee_keywords',
					flex: 1,
					height: 220
				}

				]
			},

			xluerzer_gui.getInstance().setLinkField({
				name: 'oee_url'
			}),

			];

			break;

			case 'oe_partners':
			items = [

			{

				xtype: 'fieldcontainer',
				layout: 'hbox',
				width: '100%',
				forceFit: true,
				defaultType: 'textfield',

				items: [

				{
					xtype: 'container',
					flex: 3,
					items: [
					{
						enableKeyEvents: true,
						xtype: 'textfield',
						name: 'oep_title',
						fieldLabel: 'Title',
						width: '100%',
						height: 40,
						margin: '10, 0'
					},

					{
						enableKeyEvents: true,
						xtype: 'xr_field_html',
						fieldLabel: 'Description',
						name: 'oep_desc_short',
						height: 175,
						width: '100%'
					},
					]
				},

				{
					xtype: 'splitter',
					width: 20,
				},
				{
					enableKeyEvents: true,
					xtype: 'textareafield',
					fieldLabel: 'Keywords',
					name: 'oep_keywords',
					flex: 1,
					height: 220
				}

				]
			},

			xluerzer_gui.getInstance().setLinkField({
				name: 'oep_url'
			})


			]

			break;

			default: break;
		}

		return items;
	},

	openFeatureById: function(idx)
	{
		console.info('openFeatureById',idx);
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('oe_thisweek_getById/'+idx),
			params : {
				id: idx
			},
			stateless: function(success, json)
			{
				if (!success) return;
				xluerzer_oe.getInstance().default_recordInterface({data:json.data},{pid:'oetw_id',at_id: 1,scopex:'oe_thisweek',prefix:'oetw_',title:'Feature'});
			}
		});
	},

	openAdsById: function(idx)
	{
		console.info('openAdsById',idx);
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('oe_ads_getById/'+idx),
			params : {
				id: idx
			},
			stateless: function(success, json)
			{
				if (!success) return;
				xluerzer_oe.getInstance().default_recordInterface({data:json.data},{pid:'esotw_id',scopex:'oe_adsoftheweek',prefix:'esotw_',title:'Ads of the week'});
			}
		});
	},

	openProfileById: function(idx)
	{
		console.info('openProfileById',idx);
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('oe_profile_getById/'+idx),
			params : {
				id: idx
			},
			stateless: function(success, json)
			{
				if (!success) return;
				xluerzer_oe.getInstance().default_recordInterface({data:json.data},{pid:'oedp_id',at_id: 4,scopex:'oe_designerprofiles',prefix:'oedp_',title:'Designer Profiles'});
			}
		});
	},

	openPartnersById: function(idx)
	{
		console.info('openPartnersById',idx);
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('oe_partners_getById/'+idx),
			params : {
				id: idx
			},
			stateless: function(success, json)
			{
				if (!success) return;
				xluerzer_oe.getInstance().default_recordInterface({data:json.data},{pid:'oep_id',at_id: 3,scopex:'oe_partners',prefix:'oep_',title:'Partners'});
			}
		});
	},

	openInspirationById: function(idx)
	{
		
		var me = this;
		
		console.info('openInspirationById',idx);
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('oe_inspiration_getById/'+idx),
			params : {
				id: idx
			},
			stateless: function(success, json)
			{
				if (!success) return;
				xluerzer_oe.getInstance().default_recordInterface({data:json.data},{pid:'oei_id',at_id: 2,scopex:'oe_inspiration',prefix:'oei_',title:'Inspiration'});
			}
		});
	},
	
	
	openBlogpostById: function(idx)
	{
		
		var me = this;
		
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('oe_blogpost_getById/'+idx),
			params : {
				id: idx
			},
			stateless: function(success, json)
			{
				if (!success) return;
				xluerzer_oe.getInstance().default_recordInterface({data:json.data},{pid:'oebp_id',at_id: 5,scopex:'oe_blogposts',prefix:'oebp_',title:'Blog'});
			}
		});
	},
	
	openEventById: function(idx)
	{
		
		var me = this;
		
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('oe_events_getById/'+idx),
			params : {
				id: idx
			},
			stateless: function(success, json)
			{
				if (!success) return;
				xluerzer_oe.getInstance().default_recordInterface({data:json.data},{pid:'oee_id',at_id: 6,scopex:'oe_events',prefix:'oee_',title:'Event'});
			}
		});
	},

	openOtherArticleById: function(idx)
	{
		
		var me = this;
		
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('oe_otherarticle_getById/'+idx),
			params : {
				id: idx
			},
			stateless: function(success, json)
			{
				if (!success) return;
				xluerzer_oe.getInstance().default_recordInterface({data:json.data},{pid:'oeoa_id',at_id: 7,scopex:'oe_otherarticle',prefix:'oeoa_',title:'Article'});
			}
		});
	},


	openFrontPageArticle: function()
	{
		console.log('open FrontpageArticle Overview');

		var cfg_grid = {
			text:'Other Article',
			pid: 'oeoa_id',
			fields: [{name:'oeoa_state',text:'State', width: xluerzer_oe.getInstance().width_state,renderer: xluerzer_renderer.getInstance().renderer_state_blog},{name:'oeoa_date_start',text:'Publish start', width: xluerzer_oe.getInstance().width_published},{name:'oeoa_title',text:'Title'},{name:'oeoa_desc_short',text:'Short Description',kickHtml:true},{name:'oeoa_keywords',text:'Keywords', width: xluerzer_oe.getInstance().width_keywords},{name:'oeoa_media_id',text:'Image', width: xluerzer_oe.getInstance().width_image,renderer: this.renderer_titleImg}, {name:'oeoa_modified_ts',text:'Modified', width: xluerzer_oe.getInstance().width_modified}],
			scopex: 'oe_otherarticle',
			initSort: '[{"property":"oeoa_id","direction":"DESC"}]'
		};

		var cfg_record = {
			handler: this.default_recordInterface,
			scope: this,
			at_id: 7,
			pid: 'oeoa_id',
			prefix: 'oeoa_',
			title: 'Article',
			scopex: 'oe_otherarticle'
		};


		xluerzer.getInstance().showContent(xluerzer_gui.getInstance().defaultSearcher(cfg_grid,cfg_record));

	},

	default_recordInterfaceLastCommand: function(param_0)
	{
		var data = Ext.decode(param_0);
		this.default_recordInterface({data:data.record_data},data.cfg);
	},

	default_recordInterface: function(record,cfg) {

		//console.info('Info',record,cfg,record[cfg['pid']]);
		var scopex 	= cfg.scopex;
		var prefix 	= cfg.prefix;
		var id 		= record.data[cfg['pid']];
		var me 		= this;
		var gui 	= false;
		var ftitle 	= cfg.title+': '+id;

		var saveData = false;
		var loadData = false;
		var resizeHtmlEditor = false;
		var unpublishContent = false;

		xluerzer.getInstance().saveLastCommand({
			text: ''+ftitle,
			title: ''+ftitle,
			classx: 'xluerzer_oe',
			fn: 'default_recordInterfaceLastCommand',
			param_0: ''+Ext.encode({record_data:record.data,cfg:cfg})
		});



		var columns = [
		{ text: 'Image',  		dataIndex: 'thumb'},
		{ text: 'Filename',  	dataIndex: 'name' },
		{ text: 'Title',  		dataIndex: 'title'},
		{ text: 'Description',  dataIndex: 'description'},
		{ text: 'Uploaded', 	dataIndex: 'uploaded' },
		{ text: 'Size', 		dataIndex: 'size' },
		{ text: 'Size', 		dataIndex: 'del' }
		];

		var panel_settings = Ext.widget({
			xtype: 'form',
			border: false,
			region: 'west',
			title: 'Settings',
			width: 250,
			minWidth: 250,
			collapsible: true,
			collapseDirection : 'left',
			margin: '0',
			split: true,
			cls: 'settings',
			autoScroll: true,
			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				margin: 10
			},
			items: this.getDefaultSettingsByScope(prefix,scopex)
		});


		this.unpublishButton_id = Ext.id();

		var tbar = ['->',{
			iconCls:'xf_unpublish',
			text:'Unpublish',
			id: this.unpublishButton_id,
			scope: this,
			disabled: true,
			handler: function() {
				unpublishContent()
			}
		},
		{
			text: 'Reload',
			iconCls: 'xf_reload',
			scope: this,
			handler: function() {
				loadData(scopex);
			}
		},'-',{
			text: 'Abort',
			iconCls: 'xf_abort',
			scope: this,
			handler: function() {
				console.info('TP',gui.up('tabpanel'));
				gui.close();
			}
		},'-',{
			text: 'Save & Publish',
			iconCls: 'xl_publish',
			scope: this,
			handler: function() {
				saveData(scopex,1);
			}
		},{
			text: 'Save',
			iconCls: 'xf_save',
			scope: this,
			handler: function() {
				saveData(scopex);
			}
		}];

		var tpanel_content 	= Ext.create('Ext.form.Panel', {
			title: 'Content',
			border: false,
			cls: 'innen-content',
			xtype: 'form',
			autoScroll: true,
			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				padding: 0,
				margin: 10
			},

			items: this.getDefaultContentByScope(prefix,scopex)
		});

		var tpanel_sseo		= xluerzer_gui.getInstance().getDefaultTabPanel_sseo(cfg);
		var tpanel_log 		= xluerzer_gui.getInstance().getDefaultTabPanel_log(cfg,id);
		var tpanel_preview 	= xluerzer_gui.getInstance().getDefaultTabPanel_preview(cfg,id);
		var tpanel_gallery 	= xluerzer_gui.getInstance().getDefaultTabPanel_gallery(cfg,id);
		var forms 			= [panel_settings, tpanel_content, tpanel_sseo];

		switch(scopex)
		{
			case 'oe_designerprofiles':
			var itemsvar = [tpanel_content,tpanel_preview, tpanel_log];
			forms 		 = [panel_settings, tpanel_content];
			break;
			case 'oe_events':
			case 'oe_inspiration':
			case 'oe_partners':
			var itemsvar = [tpanel_content,tpanel_preview,tpanel_log];
			forms 		 = [panel_settings, tpanel_content];
			break;
			case 'oe_frontpage_teaser_articles':
			var itemsvar = [tpanel_content,tpanel_preview,tpanel_log];
			forms 		 = [panel_settings, tpanel_content];
			break;
			default:
			var itemsvar = [tpanel_content,tpanel_gallery,tpanel_preview,tpanel_sseo,tpanel_log];
			forms 		 = [panel_settings, tpanel_content, tpanel_sseo];
			break;
		}


		var panel_content = {
			xtype: 'tabpanel',
			region: 'center',
			border: false,
			cls: 'content',
			items: itemsvar,
			listeners: {
				scope: this,
				buffer: 1,
				afterrender: function(tabPanel) {

					tabPanel.query('.field').forEach(function(c) {
						if (c.keydownSet) return;
						c.keydownSet = true;
						Ext.getCmp(c.id).on('keydown', function(field, e, eOpts) {
							if (e.ctrlKey) {
								switch(e.getKey()) {
									case 83:
									case e.F4 :
									e.preventDefault();
									saveData();
									break;
									default: break;
								}
							}
						},this);
					});
				},
				tabchange: function(tabPanel,newCard) {

					newCard.query('.field').forEach(function(c) {
						if (c.keydownSet) return;
						c.keydownSet = true;
						Ext.getCmp(c.id).on('keydown', function(field, e, eOpts) {
							if (e.ctrlKey) {
								switch(e.getKey()) {
									case 83:
									case e.F4 :
									e.preventDefault();
									saveData();
									break;
									default: break;
								}
							}
						},this);
					});

				}
			}
		};

		gui = Ext.create('Ext.panel.Panel', {
			tbar: tbar,
			border: false,
			title: ftitle,
			layout: 'border',
			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				autoScroll: true,
			},
			items: [panel_settings,panel_content]
		});





		loadData = function(scopex)
		{
			gui.mask('Loading Data ...');
			xframe.ajax({
				scope: me,
				url: xluerzer.getInstance().getAjaxPath('oe_data_load/'+id),
				params : {
					id: id,
					scopex: cfg.scopex
				},
				stateless: function(success, json)
				{
					gui.unmask();
					if (!success) return;
					Ext.each(forms,function(formx) {
						formx.getForm().setValues(json.record);
					},this);

					tpanel_gallery.setValues(json.record);

					switch (scopex)
					{
						case 'oe_inspiration':
						//Ext.getCmp(this.cb_external).setValue(json.record.oei_url_external);
						break;
						
						// unpublish moeglich bei
						case 'oe_thisweek':
						case 'oe_blogposts':
						
							var fieldToCheck = '';
							var dateToCheck = '';
							
							if (scopex == 'oe_thisweek')
							{
								// date
								var dateToCheck = Ext.Date.parse(json.record.oetw_day, 'Y-m-d');
								dateToCheck = Ext.Date.format(dateToCheck, 'Y-m-d');
								fieldState	 = 'oetw_state'; 
							}
							else if (scopex == 'oe_blogposts')
							{
								// datetime
								var dateToCheck = Ext.Date.parse(json.record.oebp_date_start, 'Y-m-d');
								dateToCheck = Ext.Date.format(dateToCheck, 'Y-m-d');
								fieldState	 = 'oebp_state';
							}
						
							// check bedingungen
							if (json.record[fieldState] == 1)
							{
								var today = new Date(); 
								today = Ext.Date.format(today, 'Y-m-d');
								
								console.log("publish from", "today", dateToCheck, today);
								
								if (dateToCheck > today)
								{
									Ext.getCmp(this.unpublishButton_id).setDisabled(false);	
								}
						
							}
							
						
						break;

						default:
					}

				}
			});
		},

		saveData = function(scopex,publish)
		{
			if (typeof publish == 'undefined') publish = false;

			var values = {}
			Ext.each(forms,function(formx){
				Ext.apply(values, formx.getForm().getValues());
			});
			var record = Ext.encode(values);

			console.info("save", record);

			gui.mask('Saving Data ...');
			xframe.ajax({
				scope: me,
				type: 'post',
				url: xluerzer.getInstance().getAjaxPath('oe_data_save/'+id),
				params : {
					id: id,
					scopex: cfg.scopex,
					record: record,
					publish_content: (publish) ? '1' : '0'
				},
				stateless: function(success, json)
				{
					gui.unmask();
					if (!success) return;

					Ext.each(forms,function(formx) {
						formx.getForm().setValues(json.record);
					},this);

					tpanel_gallery.setValues(json.record);
					tpanel_preview.loadOtherId(id);

				}
			});
		},
		
		
		unpublishContent = function()
		{
			console.log("unpublish");
			gui.mask('Unpublishing ...');
			
			xframe.ajax({
				scope: this,
				url: xluerzer.getInstance().getAjaxPath('oe_unpublish'),
				params : {
					id: id,
					scopex: cfg.scopex,
					record: record,
				},
				stateless: function(success, json)
				{
					gui.unmask();
					if (!success) return;
					loadData();
					
				}
			});
	
		},
		

		resizeHtmlEditor = function()
		{
			var htmleditor = document.getElementsByClassName("htmlfieldfull")[0];
			htmleditor.style.height = document.getElementsByClassName("content")[0].offsetHeight-340 + "px";
			console.log('htmldiv ' + htmleditor.getElementsByClassName("mce-content-body")[0]);
			htmleditor.getElementsByClassName("mce-content-body")[0].style.height = htmleditor.offsetHeight+100 + "px";
		}

		gui.on('afterrender',function(){
			loadData(scopex);
		},this,{buffer:1});




		/*
		gui.query('input')

		*/


		xluerzer.getInstance().showContent(gui);
	},


}