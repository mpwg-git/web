
Date.prototype.getWeekNumber = function(){
	var d = new Date(+this);
	d.setHours(0,0,0);
	d.setDate(d.getDate()+4-(d.getDay()||7));
	return Math.ceil((((d-new Date(d.getFullYear(),0,1))/8.64e7)+1)/7);
};


var xluerzer_frontpageconfig = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_frontpageconfig";
		}

		this.getInstance = function(config) {
			return new xluerzer_frontpageconfig_(config);
			return instance;
		}
	}
})();

var xluerzer_frontpageconfig_ = function(config) {
	this.config = config || {};
};

xluerzer_frontpageconfig_.prototype = {

	open_staticssconfig: function()
	{
	
		var idx = Ext.id();
	
		var fly = Ext.widget({
			title: 'Editor',
			xtype: 'panel',
			layout: 'hbox',
			region: 'center',
			tbar: [{
				iconCls: 'xf_reload',
				text: 'Reload',
				scope: this,
				handler: function() {
					$$('#'+idx)[0].src = $$('#'+idx)[0].src;
				}
			}],
			items:[{
				flex:1,
				xtype: 'text'
			},{
				id: idx,
				xtype : "component",
				width: '100%',
				height: '100%',
				autoEl : {
					tag : "iframe",
					src : "/"
				},
				listeners: {
					afterrender: function() {
					}
				}
			},{
				flex:1,
				xtype: 'text'
			}]
		});

		fly.loadOtherId = function(p_id)
		{
			if (Ext.get(idx))
			{
				var url = "/xgo/xplugs/xredaktor/ajax/render/page?p_id="+p_id+"&cms";
				Ext.get(idx).set({'src':url});
			}
		}
		
		var grid_statics = xframe_pattern.getInstance().genGrid({
			title: 'Pages',
			region:'west',
			forceFit:true,
			border:false,
			split: true,
			maxWidth: 200,
			collapseMode: 'mini',
			search: false,
			records_move: false,
			pager: true,
			xstore: {
				load: 	xluerzer.getInstance().getAjaxPath('admin/statics'),
				pid: 	'p_id',
				fields: [
				{name:'p_id', 			text:'ID', 				type: 'int',	width: 30},
				{name:'p_name', 		text:'Name',			type: 'string'},
				],
				initSort: '[{"property":"p_name","direction":"ASC"}]'
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					console.log("opening: "+record.data.p_id)
					fly.loadOtherId(record.data.p_id);
				}
			}
		});

		grid_statics.on('afterrender',function(){
			grid_statics.getStore().load();
		},this);
		
		var gui = Ext.widget({
			xtype: 'panel',
			layout: 'border',
			items: [fly,grid_statics]
		});
		
		gui.title = "Static Pages"; 
		
		xluerzer.getInstance().showContent(gui);
		
	},
	
	open_productsconfig: function()
	{
		var gui = xredaktor_infoPool.getInstance().getMainPanel(1,{id:515,name:'Products'},true);
		gui.title = "Product Configuration"; 
		xluerzer.getInstance().showContent(gui);
	},

	openFeature: function(dayOfTheWeek)
	{
		var day = Ext.Date.format(Ext.getCmp(this.field_day_id).getValue(),"Y-m-d");

		this.masterTab.mask('Loading Data ...');
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('frontpageconfig_resolveFeatureByIdAndDate/'),
			params : {
				day: day,
				dayOfTheWeek: dayOfTheWeek
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
				console.info(json);
				xluerzer_oe.getInstance().openFeatureById(json.id);
			}
		});
	},

	openProfile: function(dayOfTheWeek)
	{
		var day = Ext.Date.format(Ext.getCmp(this.field_day_id).getValue(),"Y-m-d");

		this.masterTab.mask('Loading Data ...');
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('frontpageconfig_resolveProfileByDate/'),
			params : {
				day: day,
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
				console.info(json);
				xluerzer_oe.getInstance().openProfileById(json.id);
			}
		});
	},

	openAdsoftheweek: function()
	{
		var day = Ext.Date.format(Ext.getCmp(this.field_day_id).getValue(),"Y-m-d");

		this.masterTab.mask('Loading Data ...');
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('frontpageconfig_resolveAdsByIdAndDate/'),
			params : {
				day: day,
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
				console.info(json);
				xluerzer_adsoftheweek.getInstance().openDetailsById(json.id);
			}
		});
	},

	openInspiration: function()
	{
		var day = Ext.Date.format(Ext.getCmp(this.field_day_id).getValue(),"Y-m-d");

		this.masterTab.mask('Loading Data ...');
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('frontpageconfig_addInspiration/'),
			params : {
				day: day,
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
				console.info(json);
				xluerzer_oe.getInstance().openInspirationById(json.id);
			}
		});
	},

	openPartners: function()
	{
		var day = Ext.Date.format(Ext.getCmp(this.field_day_id).getValue(),"Y-m-d");

		this.masterTab.mask('Loading Data ...');
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('frontpageconfig_addPartners/'),
			params : {
				day: day,
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;
				console.info(json);
				xluerzer_oe.getInstance().openPartnersById(json.id);
			}
		});
	},


	open_frontpageconfig: function()
	{
		var me = this;

		/* FEATURES panels BEGIN */
		var tpanel_audiovisual = Ext.widget({
			title: 'Audiovisual',
			xtype: 'form',
			bbar: ['->',{
				iconCls: 'xf_settings',
				xtype: 'button',
				text: 'Configure',
				scope: this,
				handler: function() {
					this.openFeature(1);
				}
			}],
			html: 'Audiovisual'
		});


		var tpanel_campaigns = Ext.widget({
			title: 'Campaigns',
			xtype: 'form',
			bbar: ['->',{
				iconCls: 'xf_settings',
				xtype: 'button',
				text: 'Configure',
				scope: this,
				handler: function() {
					this.openFeature(2);
				}
			}],
			html: 'Campaigns'

		});

		var tpanel_whoswho = Ext.widget({
			title: 'Who is Who',
			xtype: 'form',
			bbar: ['->',{
				iconCls: 'xf_settings',
				xtype: 'button',
				text: 'Configure',
				scope: this,
				handler: function() {
					this.openFeature(3);
				}
			}],
			html: 'Who is Who'
		});

		var tpanel_digital = Ext.widget({
			title: 'Digital',
			xtype: 'form',
			bbar: ['->',{
				iconCls: 'xf_settings',
				xtype: 'button',
				text: 'Configure',
				scope: this,
				handler: function() {
					this.openFeature(4);
				}
			}],
			html: 'Digital'
		});

		var tpanel_editorsblog = Ext.widget({
			title: 'Editors Blog',
			xtype: 'form',
			bbar: ['->',{
				iconCls: 'xf_settings',
				xtype: 'button',
				text: 'Configure',
				scope: this,
				handler: function() {
					this.openFeature(5);
				}
			}],
			html: 'Editors Blog'
		});

		/* FEATURES panels END */

		var hf = 390;

		var panel_features = Ext.create('Ext.tab.Panel', {
			title: 'Features',
			layout: 'fit',
			border: false,
			margin: '10 0 40 0',
			defaults: {
				minHeight: hf,
				maxHeight: hf,
				height: hf
			},
			items: [tpanel_audiovisual, tpanel_campaigns, tpanel_whoswho, tpanel_digital, tpanel_editorsblog]
		});



		/* adsoftheweek boxes BEGIN */
		this.box_aotw_print = Ext.widget({
			title: 'Print',
			xtype: 'form',
			flex: 1,
			html: 'print'
		});
		this.box_aotw_spot = Ext.widget({
			title: 'Spot',
			xtype: 'form',
			flex: 1,
			html: 'spot'
		});
		this.box_aotw_classic = Ext.widget({
			title: 'Classic Spot',
			xtype: 'form',
			flex: 1,
			html: 'classic'
		});
		/* adsoftheweek boxes END */

		hf = 226;
		var panel_adsoftheweek = Ext.create('Ext.Panel', {
			title: 'Ads of the week',
			defaults: {
				minHeight: hf,
				maxHeight: hf,
				height: hf
			},
			border: false,
			margin: '0 0 40 0',
			layout: 'hbox',
			bbar: ['->',{
				iconCls: 'xf_settings',
				xtype: 'button',
				text: 'Configure',
				scope: this,
				handler: function() {
					this.openAdsoftheweek();
				}
			}],
			items: [this.box_aotw_print, this.box_aotw_spot,this.box_aotw_classic]
		});



		/* inspiration boxes BEGIN */
		this.box_insp_1 = Ext.widget({
			xtype: 'form',
			flex: 1,
			margin: '0 20 0 0',
			html: 'Inspiration 1'
		});
		this.box_insp_2 = Ext.widget({
			xtype: 'form',
			flex: 1,
			margin: '0 20 0 0',
			html: 'Inspiration 2'
		});
		this.box_insp_3 = Ext.widget({
			xtype: 'form',
			flex: 1,
			margin: '0 20 0 0',
			html: 'Inspiration 3'
		});
		this.box_insp_4 = Ext.widget({
			xtype: 'form',
			flex: 1,
			html: 'Inspiration 4'
		});
		/* inspiration boxes END */

		hf = 200;
		this.btn_add_date_inspiration  = Ext.id();
		var panel_inspiration = Ext.create('Ext.Panel', {
			title: 'Inspiration',
			border: false,
			margin: '0 0 40 0',
			bbar: ['->',{
				iconCls: 'xf_settings',
				xtype: 'button',
				text: 'Add for this Date',
				id: this.btn_add_date_inspiration,
				scope: this,
				handler: function() {
					this.openInspiration();
				}
			}],
			layout: 'hbox',
			defaults: {
				width: '90%'
			},
			defaults: {
				minHeight: hf,
				maxHeight: hf,
				height: hf
			},
			items: [this.box_insp_1,this.box_insp_2,this.box_insp_3,this.box_insp_4]
		});


		hf = 300;

		/* profile / your picks boxes BEGIN */

		this.box_profile = Ext.widget({
			xtype: 'form',
			title: 'Profile',
			flex: 1,
			margin: '0 20 0 0',
			bbar: ['Show article',{
				xtype: 'checkbox',
				uncheckedValue: 0,
				inputValue: 1,
				name: 'or_profile',
				id: 'or_profile'
			},'Article ID',
			{
				hideTrigger: true,
				xtype: 'numberfield',
				name: 'or_profile_article',
				id: 'or_profile_article',
				minChars: 3,
				emptyText: 'Article ID',
				width: 100
			},{
				xtype: 'button',
				text: 'Open Articles',
				iconCls: 'xf_open',
				scope: this,
				handler: function() {
					this.openFrontPageArticle('or_profile_article');
				}
			},'->',{
				iconCls: 'xf_settings',
				xtype: 'button',
				text: 'Configure',
				scope: this,
				handler: function() {
					this.openProfile();
				}
			}],
			html: 'Profile',
			minHeight: hf,
			maxHeight: hf,
			height: hf

		});
		this.box_yourpicks = Ext.widget({
			xtype: 'form',
			title: 'Your Picks',
			flex: 1,
			minHeight: hf,
			maxHeight: hf,
			height: hf,
			bbar: ['Show article',{
				xtype: 'checkbox',
				uncheckedValue: 0,
				inputValue: 1,
				name: 'or_yourpicks',
				id: 'or_yourpicks'
			},'Article ID',
			{
				xtype: 'numberfield',
				name: 'or_yourpicks_article',
				id: 'or_yourpicks_article',
				minChars: 3,
				emptyText: 'Article ID',
				width: 100
			},{
				xtype: 'button',
				text: 'Open Articles',
				iconCls: 'xf_open',
				scope: this,
				handler: function() {
					this.openFrontPageArticle('or_yourpicks_article');
				}
			}],
			html: 'Your Picks'
		});
		/* profile / your picks boxes END */

		var panel_profile_yourpicks = Ext.create('Ext.Panel', {
			border: false,
			layout: 'hbox',
			margin: '0 0 40 0',
			items: [this.box_profile,this.box_yourpicks]
		});


		this.btn_add_date_partners  = Ext.id();
		/* partners / mostread boxes BEGIN */
		this.box_partners = Ext.widget({
			xtype: 'form',
			title: 'Partners',
			flex: 1,
			margin: '0 20 0 0',
			html: 'Partner',
			minHeight: hf,
			maxHeight: hf,
			height: hf,
			bbar: ['Show article',{
				xtype: 'checkbox',
				uncheckedValue: 0,
				inputValue: 1,
				name: 'or_partners',
				id: 'or_partners'
			},'Article ID',
			{
				xtype: 'numberfield',
				name: 'or_partners_article',
				id: 'or_partners_article',
				minChars: 3,
				emptyText: 'Article ID',
				width: 100
			},{
				text: 'Open Articles',
				iconCls: 'xf_open',
				scope: this,
				handler: function() {
					this.openFrontPageArticle('or_partner_article');
				}
			},'->',{
				iconCls: 'xf_settings',
				xtype: 'button',
				id: this.btn_add_date_partners,
				text: 'Add',
				scope: this,
				handler: function() {
					this.openPartners();
				}
			}]
		});

		this.radios = new Ext.form.RadioGroup({
			vertical: false,
			columns: 2,
			items: [
			{
				xtype: 'radio',
				boxLabel  : 'TODAY',
				name      : 'cfg_most_read',
				inputValue: '1'
			}, {
				xtype: 'radio',
				boxLabel  : 'THIS WEEK',
				name      : 'cfg_most_read',
				inputValue: '2'
			}, {
				xtype: 'radio',
				boxLabel  : 'THIS MONTH',
				name      : 'cfg_most_read',
				inputValue: '3'
			}, {
				xtype: 'radio',
				boxLabel  : 'OVERALL',
				name      : 'cfg_most_read',
				inputValue: '4'
			},
			{
				xtype: 'text',
				height: 20
			}
			]
		});

		this.box_mostread = Ext.widget({

			xtype: 'form',
			title: 'Most read',
			flex: 1,
			minHeight: hf,
			maxHeight: hf,
			height: hf,
			bbar: ['Show article',{
				xtype: 'checkbox',
				uncheckedValue: 0,
				inputValue: 1,
				name: 'or_mostread',
				id: 'or_mostread'
			},'Article ID',
			{
				xtype: 'numberfield',
				name: 'or_mostread_article',
				id: 'or_mostread_article',
				minChars: 3,
				emptyText: 'Article ID',
				width: 100
			},{
				xtype: 'button',
				text: 'Open Articles',
				iconCls: 'xf_open',
				scope: this,
				handler: function() {
					this.openFrontPageArticle('or_mostread_article');
				}
			}],
			items: [
			this.radios
			],
			html: ''
		});
		/* partners / mostread boxes END */

		var panel_partners_mostread = Ext.create('Ext.Panel', {
			border: false,
			layout: 'hbox',
			margin: '0 0 40 0',
			items: [this.box_partners, this.box_mostread]
		});



		this.field_week_id = Ext.id();
		this.field_day_id = Ext.id();
		this.field_year_id = Ext.id();

		var w = 1009;

		this.masterTab = Ext.create('Ext.Panel', {
			activeTab: 0,
			border: false,
			minWidth: w,
			maxWidth: w,
			width: w,
			layout: 'anchor',
			defaultAnchor: '100%',
			defaults: {
				layout: 'hbox',
				anchor: '100%',
			},
			items: [panel_features,panel_adsoftheweek, panel_inspiration, panel_profile_yourpicks, panel_partners_mostread]
		});


		this.tpanel_audiovisual = tpanel_audiovisual;
		this.tpanel_campaigns = tpanel_campaigns;
		this.tpanel_whoswho = tpanel_whoswho;
		this.tpanel_digital = tpanel_digital;
		this.tpanel_editorsblog = tpanel_editorsblog;

		this.panel_features = panel_features;
		this.panel_adsoftheweek = panel_adsoftheweek;
		this.panel_inspiration = panel_inspiration;
		this.panel_profile_yourpicks = panel_profile_yourpicks;
		this.panel_partners_mostread = panel_partners_mostread;

		this.masterTab.on('afterrender',function(){
			this.loadFrontpageConfig();
		},this,{buffer:10});




		var gui = Ext.widget({
			title: 'Frontpage Configuration',
			tbar:[
			'Year:',
			{
				xtype          	: 'numberfield',
				name          	: 'yearCmb',
				displayField  	: 'years',
				value          	: new Date().getFullYear(),
				id: this.field_year_id,
				minValue: 2010,
				maxValue: 2019,
				listeners: {
					scope: this,
					change: function(c) {

						var week2set = Ext.getCmp(this.field_week_id).getValue();
						var year = c.getValue();

						//var d = (1 + (week2set - 1) * 7); // 1st of January + 7 days for each week
						//var dayx =  new Date(year, 0, d);

						var days = 2 + (week2set - 1) * 7 - (new Date(year,0,1)).getDay();
						var dayx = new Date(year, 0, days);

						Ext.getCmp(this.field_day_id).suspendEvent('change');
						Ext.getCmp(this.field_day_id).setValue(dayx);
						Ext.getCmp(this.field_day_id).resumeEvent('change');

						this.loadFrontpageConfig(dayx);
					}
				}
			},
			'Week:',{
				id: this.field_week_id,
				xtype          	: 'numberfield',
				name          	: 'weekCmb',
				displayField  	: 'weeks',
				value          	: new Date().getWeekNumber(),
				minValue: 1,
				maxValue: 53,
				listeners: {
					scope: this,
					change: function(c) {

						var week2set = c.getValue();
						var year = Ext.getCmp(this.field_year_id).getValue();

						//var d = (1 + (week2set - 1) * 7); // 1st of January + 7 days for each week
						//var dayx =  new Date(year, 0, d);

						var days = 2 + (week2set - 1) * 7 - (new Date(year,0,1)).getDay();
						var dayx = new Date(year, 0, days);

						Ext.getCmp(this.field_day_id).suspendEvent('change');
						Ext.getCmp(this.field_day_id).setValue(dayx);
						Ext.getCmp(this.field_day_id).resumeEvent('change');

						this.loadFrontpageConfig(dayx);
					}
				}
			},
			{
				text: 'Prev Week',
				iconCls: 'xf_back',
				scope: this,
				handler: function() {
					var v = Ext.getCmp(this.field_week_id).getValue()-1;
					if (v <= 1) v = 1;
					Ext.getCmp(this.field_week_id).setValue(v);
				}
			},
			{
				text: 'Next Week',
				iconCls: 'xf_next',
				scope: this,
				handler: function() {
					var v = Ext.getCmp(this.field_week_id).getValue()+1;
					if (v >= 53) v = 53;
					Ext.getCmp(this.field_week_id).setValue(v);
				}
			},'-',
			'Select Date:',
			{
				xtype: 'datefield',
				emptyText: 'Pick date ...',
				name: 'selectedDate',
				value: new Date(),
				id: this.field_day_id,
				listeners: {
					scope: this,
					change: function(c) {

						var dayx = c.getValue();
						var week = dayx.getWeekNumber();
						var year = dayx.getFullYear();

						Ext.getCmp(this.field_year_id).setValue(year);
						Ext.getCmp(this.field_week_id).setValue(week);

						this.loadFrontpageConfig(dayx);
					}
				}
			},
			{
				text: 'Prev Day',
				iconCls: 'xf_back',
				scope: this,
				handler: function() {
					var dayx = Ext.getCmp(this.field_day_id).getValue();
					dayx.setDate(dayx.getDate()-1);
					Ext.getCmp(this.field_day_id).setValue(dayx);
				}
			},
			{
				text: 'Next Day',
				iconCls: 'xf_next',
				scope: this,
				handler: function() {

					var dayx = Ext.getCmp(this.field_day_id).getValue();
					dayx.setDate(dayx.getDate()+1);
					Ext.getCmp(this.field_day_id).setValue(dayx);

				}
			},'->',
			{
				text: 'Reload',
				iconCls: 'xf_reload',
				scope: this,
				handler: function() {
					var dayx = Ext.getCmp(this.field_day_id).getValue();
					this.loadFrontpageConfig(dayx);
				}
			},{
				text: 'Save',
				iconCls: 'xf_save',
				scope: this,
				handler: function() {
					this.save();
				}
			}
			],
			autoScroll: true,
			xtype:'form',
			layout: 'hbox',
			items: [{
				flex: 1,
				html: '',
				border: false
			},this.masterTab,{
				flex: 1,
				html: '',
				border: false
			}]


		});

		this.formPanel = gui;

		xluerzer.getInstance().showContent(gui);
	},

	openFrontPageArticle: function(name)
	{
		console.log("open fp article");
		xluerzer_oe.getInstance().openFrontPageArticle(function(){

			// TODO CALL BACK

		});

	},

	save: function()
	{
		var data = this.formPanel.getForm().getValues();

		console.info('data',data);
		var record = Ext.encode(data);
		this.masterTab.mask();

		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('frontpageconfig_default_save/'),
			params : {
				data: record
			},
			stateless: function(success, json)
			{
				this.loadFrontpageConfig(record.selectedDate);
				this.masterTab.unmask();
				if (!success) return;


			}
		});
	},

	loadFrontpageConfig: function(day)
	{
		if (typeof day == "undefined")
		{
			day = Ext.Date.format(new Date(),'Y-m-d');
		}
		else {
			day = Ext.Date.format(day,'Y-m-d');
		}

		this.masterTab.mask('Loading Data ...');
		xframe.ajax({
			scope: this,
			url: xluerzer.getInstance().getAjaxPath('frontpageconfig_default_load/'),
			params : {
				day: day
			},
			stateless: function(success, json)
			{
				this.masterTab.unmask();
				if (!success) return;

				Ext.getCmp(this.btn_add_date_inspiration).setText("Add for: "+day);
				Ext.getCmp(this.btn_add_date_partners).setText("Add for: "+day);

				console.info(json);
				this.tpanel_audiovisual.update(json.audiovisual.html);
				this.tpanel_campaigns.update(json.campaigns.html);
				this.tpanel_whoswho.update(json.whoiswho.html);
				this.tpanel_digital.update(json.digital.html);
				this.tpanel_editorsblog.update(json.editorsblog.html);

				this.box_insp_1.update(json.inspiration[0].html);
				this.box_insp_2.update(json.inspiration[1].html);
				this.box_insp_3.update(json.inspiration[2].html);
				this.box_insp_4.update(json.inspiration[3].html);

				this.box_partners.update(json.partners.html);

				this.box_profile.update(json.profile.html);

				this.box_mostread.update(json.mostread.html);

				this.box_yourpicks.update(json.yourpicks.html);

				this.box_aotw_print.update(json.printad.html);
				this.box_aotw_spot.update(json.spotad.html);
				this.box_aotw_classic.update(json.classicad.html);

				/* FEATURES */


				var features  = [{

					json: json.audiovisual,
					tab: this.tpanel_audiovisual

				},{

					json: json.campaigns,
					tab: this.tpanel_campaigns

				},{

					json: json.whoiswho,
					tab: this.tpanel_whoswho

				},{

					json: json.digital,
					tab: this.tpanel_digital

				},{

					json: json.editorsblog,
					tab: this.tpanel_editorsblog

				}];



				var needs2config = false;

				Ext.each(features,function(cfg){

					if (cfg.json.needsconfigure)
					{
						needs2config = true;
						cfg.tab.setIconCls('xf_error');
					} else {
						cfg.tab.setIconCls('xf_ok');
					}



				},this);

				if (needs2config)
				{
					this.panel_features.setIconCls('xf_error');
				} else
				{
					this.panel_features.setIconCls('xf_ok');
				}


				/// ADS OF THE WEEK


				needs2config = false;

				if (json.printad.needsconfigure) {
					needs2config = true;
					this.box_aotw_print.setIconCls('xf_error');
				} else {
					this.box_aotw_print.setIconCls('xf_ok');
				}

				if (json.spotad.needsconfigure) {
					needs2config = true;
					this.box_aotw_spot.setIconCls('xf_error');
				} else {
					this.box_aotw_spot.setIconCls('xf_ok');
				}


				if (json.classicad.needsconfigure) {
					needs2config = true;
					this.box_aotw_classic.setIconCls('xf_error');
				} else {
					this.box_aotw_classic.setIconCls('xf_ok');
				}

				if (needs2config)
				{
					this.panel_adsoftheweek.setIconCls("xf_error");
				} else {
					this.panel_adsoftheweek.setIconCls("xf_ok");
				}

				// PROFILE

				if (json.profile.needsconfigure) {
					this.box_profile.setIconCls('xf_error');
				} else {
					this.box_profile.setIconCls('xf_ok');
				}

				if (json.partners.needsconfigure) {
					this.box_partners.setIconCls('xf_error');
				} else {
					this.box_partners.setIconCls('xf_ok');
				}

				if (json.mostread.needsconfigure) {
					this.box_mostread.setIconCls('xf_error');
				} else {
					this.box_mostread.setIconCls('xf_ok');
				}

				if (json.yourpicks.needsconfigure) {
					this.box_yourpicks.setIconCls('xf_error');
				} else {
					this.box_yourpicks.setIconCls('xf_ok');
				}


				if (json.profile.overrule > 0) {
					console.log("profile overrule");
					this.box_profile.setTitle('Profile (OVER-RULED)');
					Ext.getCmp('or_profile_article').setValue(json.profile.overrule);
					Ext.getCmp('or_profile').setValue('1');
				}
				else {
					this.box_profile.setTitle('Profile');
					Ext.getCmp('or_profile_article').setValue('');
					Ext.getCmp('or_profile').setValue('0');
				}

				if (json.partners.overrule > 0) {
					console.log("partners overrule");
					this.box_partners.setTitle('Partners (OVER-RULED)');
					Ext.getCmp('or_partners_article').setValue(json.partners.overrule);
					Ext.getCmp('or_partners').setValue('1');
				}
				else {
					this.box_partners.setTitle('Partners');
					Ext.getCmp('or_partners_article').setValue('');
					Ext.getCmp('or_partners').setValue('0');
				}

				if (json.yourpicks.overrule > 0) {
					console.log("yourpicks overrule");
					this.box_yourpicks.setTitle('Your Picks (OVER-RULED)');
					Ext.getCmp('or_yourpicks_article').setValue(json.yourpicks.overrule);
					Ext.getCmp('or_yourpicks').setValue('1');
				}
				else {
					this.box_yourpicks.setTitle('Your Picks');
					Ext.getCmp('or_mostread_article').setValue('');
					Ext.getCmp('or_mostread').setValue('0');
				}

				if (json.mostread.overrule > 0) {
					console.log("mostread overrule");
					this.box_mostread.setTitle('Most read (OVER-RULED)');
					this.radios.hide();
					Ext.getCmp('or_mostread_article').setValue(json.mostread.overrule);
					Ext.getCmp('or_mostread').setValue('1');
				}
				else {
					this.box_mostread.setTitle('Most read');
					Ext.getCmp('or_mostread_article').setValue('');
					this.radios.show();
					Ext.getCmp('or_mostread').setValue('0');
				}

				// most read conf

				if (json.mostread.conf) {
					try {
						this.radios.items.items[json.mostread.conf-1].setValue(true);
					} catch (e) {console.info('xxxxx crash filling radios ...');}
				}

				/*Ext.each(forms,function(formx) {
				formx.getForm().setValues(json.record);
				},this);*/
			}
		});
	}

}