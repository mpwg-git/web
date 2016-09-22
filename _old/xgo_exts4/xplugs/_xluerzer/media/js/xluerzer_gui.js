
var xluerzer_gui = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer_gui";
		}

		this.getInstance = function(config) {
			return new xluerzer_gui_(config);
			return instance;
		}
	}
})();

var xluerzer_gui_ = function(config) {
	this.config = config || {};
};

xluerzer_gui_.prototype = {

	simplyCombo: function(cfg) {

		var ds = Ext.create('Ext.data.Store', {
			fields: ['k', 'v'],
			data : cfg.data
		});


		var settings = {};

		if (cfg.xsearch)
		{
			settings = {

				trigger2Cls: 'x-form-clear-trigger',
				onTrigger2Click: function (args) {
					this.clearValue();
				},

				trigger3Cls: 'x-form-search-trigger',
				onTrigger3Click: function (args) {
					if (this.up('form').xsubmit)
					{
						this.up('form').xsubmit();
					}
				},


				hideTrigger: false,
				hideTrigger2: false,
				hideTrigger3: false,

				maxWidth: cfg.maxWidth || false,
				emptyText: cfg.emptyText,
				value: cfg.value,
				xtype: 'combo',
				width: cfg.width,
				fieldLabel: cfg.fieldLabel,
				name: cfg.name,
				store: ds,
				queryMode: 'local',
				displayField: 'v',
				valueField: 'k',
				listeners: cfg.listeners,
				multiSelect: cfg.multiSelect,
				readOnly: cfg.readOnly
			};

		} else {


			settings = {


				hideTrigger: false,

				maxWidth: cfg.maxWidth || false,
				emptyText: cfg.emptyText,
				value: cfg.value,
				xtype: 'combo',
				width: cfg.width,
				fieldLabel: cfg.fieldLabel,
				name: cfg.name,
				store: ds,
				queryMode: 'local',
				displayField: 'v',
				valueField: 'k',
				listeners: cfg.listeners,
				multiSelect: cfg.multiSelect,
				readOnly: cfg.readOnly
			};

		}
		
		
		
		if (!cfg.maxWidth) delete(settings.maxWidth);

		return settings;


	},

	searchComboContacts: function(cfg)
	{

		var model 	= Ext.id();
		var url 	= xluerzer.getInstance().getAjaxPath('contacts/searchCombo/'+cfg.searchScope);

		Ext.define(model, {
			extend: 'Ext.data.Model',
			proxy: {
				type: 'ajax',
				url : url,
				reader: {
					type: 'json',
					root: 'root',
					totalProperty: 'totalCount'
				}
			},

			fields: [
			{name: '_value', 	type: 'string'},
			{name: '_display',	type: 'string'}
			]

		});

		var pageSize = 10;

		var ds = Ext.create('Ext.data.Store', {
			pageSize: pageSize,
			model: model
		});

		return {

			triggerCls: 'x-form-clear-trigger',
			onTriggerClick: function (args) {
				this.clearValue();
			},

			trigger2Cls: 'x-form-search-trigger',
			onTrigger2Click: function (args) {
				if (this.up('form').xsubmit)
				{
					this.up('form').xsubmit();
				}
			},


			minChars: cfg.minChars,
			fieldLabel: cfg.fieldLabel,
			name: cfg.name,
			emptyText: cfg.emptyText,
			xtype: 'combo',
			store: ds,

			displayField: '_display',
			valueField: '_value',

			typeAhead: false,
			hideTrigger: false,

			displayMsg: '{0} - {1} of {2}',
			//selectOnFocus: true,

			listConfig: {
				loadingText: 'searching...',
				emptyText: 'no matching records found.',
				getInnerTpl2: function() {
					return '<div class="search-item">' +
					'<h3><span>{[Ext.Date.format(values.lastPost, "M j, Y")]}<br />by {author}</span>{title}</h3>' +
					'{excerpt}' +
					'</div>';
				}
			},
			pageSize: pageSize,
			listeners: {
				specialkey: function(field,event) {
					if (event.getKey() == event.ENTER) {
						if (this.up('form').xsubmit)
						{
							this.up('form').xsubmit();
						}
					}
				},
				select: function(combo, selection) {
					var post = selection[0];
					if (post) {

					}
				}
			}
		};

	},

	// TODO
	searchComboProfiles: function(cfg)
	{

		var model 	= Ext.id();
		var url 	= xluerzer.getInstance().getAjaxPath('contacts/searchComboProfiles/'+cfg.searchScope);

		Ext.define(model, {
			extend: 'Ext.data.Model',
			proxy: {
				type: 'ajax',
				url : url,
				reader: {
					type: 'json',
					root: 'root',
					totalProperty: 'totalCount'
				}
			},

			fields: [
			{name: '_value', 	type: 'string'},
			{name: '_display',	type: 'string'}
			]

		});

		var pageSize = 10;

		var ds = Ext.create('Ext.data.Store', {
			pageSize: pageSize,
			model: model
		});

		return {
			minChars: cfg.minChars,
			fieldLabel: cfg.fieldLabel,
			name: cfg.name,
			emptyText: cfg.emptyText,
			xtype: 'combo',
			store: ds,

			displayField: '_display',
			valueField: '_value',

			typeAhead: true,
			hideTrigger: true,

			displayMsg: '{0} - {1} of {2}',
			//selectOnFocus: true,

			listConfig: {
				loadingText: 'searching...',
				emptyText: 'no matching records found.',
				getInnerTpl2: function() {
					return '<div class="search-item">' +
					'<h3><span>{[Ext.Date.format(values.lastPost, "M j, Y")]}<br />by {author}</span>{title}</h3>' +
					'{excerpt}' +
					'</div>';
				}
			},
			pageSize: pageSize,
			listeners: {
				select: function(combo, selection) {
					var post = selection[0];
					if (post) {

					}
				}
			}
		};

	},


	// TODO
	searchComboFrontpageArticles: function(cfg)
	{

		var model 	= Ext.id();
		var url 	= xluerzer.getInstance().getAjaxPath('frontpageconfig/searchComboArticles/');

		Ext.define(model, {
			extend: 'Ext.data.Model',
			proxy: {
				type: 'ajax',
				url : url,
				reader: {
					type: 'json',
					root: 'root',
					totalProperty: 'totalCount'
				}
			},

			fields: [
			{name: '_value', 	type: 'string'},
			{name: '_display',	type: 'string'}
			]

		});

		var pageSize = 10;

		var ds = Ext.create('Ext.data.Store', {
			pageSize: pageSize,
			model: model
		});

		return {

			width: cfg.width || 100,
			minChars: cfg.minChars,
			fieldLabel: cfg.fieldLabel,
			name: cfg.name,
			emptyText: cfg.emptyText,
			xtype: 'combo',
			store: ds,

			displayField: '_display',
			valueField: '_value',

			typeAhead: true,
			hideTrigger: true,

			displayMsg: '{0} - {1} of {2}',
			//selectOnFocus: true,

			listConfig: {
				loadingText: 'searching...',
				emptyText: 'no matching records found.',
				getInnerTpl2: function() {
					return '<div class="search-item">' +
					'<h3><span>{[Ext.Date.format(values.lastPost, "M j, Y")]}<br />by {author}</span>{title}</h3>' +
					'{excerpt}' +
					'</div>';
				}
			},
			pageSize: pageSize,
			listeners: {
				select: function(combo, selection) {
					var post = selection[0];
					if (post) {

					}
				}
			}
		};

	},

	searchComboSubmissions: function(cfg)
	{

		var model 	= Ext.id();
		var url 	= xluerzer.getInstance().getAjaxPath('submissions/searchCombo/'+cfg.searchScope);

		Ext.define(model, {
			extend: 'Ext.data.Model',
			proxy: {
				type: 'ajax',
				url : url,
				reader: {
					type: 'json',
					root: 'root',
					totalProperty: 'totalCount'
				}
			},

			fields: [
			{name: '_value', 	type: 'string'},
			{name: '_display',	type: 'string'}
			]

		});

		var pageSize = 10;

		var ds = Ext.create('Ext.data.Store', {
			pageSize: pageSize,
			model: model
		});

		return {

			triggerCls: 'x-form-clear-trigger',
			onTriggerClick: function (args) {
				this.clearValue();
			},

			trigger2Cls: 'x-form-search-trigger',
			onTrigger2Click: function (args) {
				if (this.up('form').xsubmit)
				{
					this.up('form').xsubmit();
				}
			},

			minChars: cfg.minChars,
			fieldLabel: cfg.fieldLabel,
			name: cfg.name,
			emptyText: cfg.emptyText,
			xtype: 'combo',
			store: ds,

			displayField: '_display',
			valueField: '_value',

			typeAhead: false,
			hideTrigger: false,

			//enableKeyEvents:true,

			displayMsg: '{0} - {1} of {2}',
			//selectOnFocus: true,

			listConfig: {
				loadingText: 'searching...',
				emptyText: 'no matching records found.',
				getInnerTpl2: function() {
					return '<div class="search-item">' +
					'<h3><span>{[Ext.Date.format(values.lastPost, "M j, Y")]}<br />by {author}</span>{title}</h3>' +
					'{excerpt}' +
					'</div>';
				}
			},
			pageSize: pageSize,
			listeners: {
				buffer: 1,
				specialkey: function(field,event) {
					if (event.getKey() == event.ENTER) {
						if (this.up('form').xsubmit)
						{
							this.up('form').xsubmit();
						}
					}
				},
				select: function(combo, selection) {
					console.info("select");
					if (this.up('form').xsubmit)
					{
						//this.up('form').xsubmit();
					}
				}
			}
		};

	},


	searchComboStudents: function(cfg)
	{

		var model 	= Ext.id();
		var url 	= xluerzer.getInstance().getAjaxPath('students/searchCombo/'+cfg.searchScope);

		Ext.define(model, {
			extend: 'Ext.data.Model',
			proxy: {
				type: 'ajax',
				url : url,
				reader: {
					type: 'json',
					root: 'root',
					totalProperty: 'totalCount'
				}
			},

			fields: [
			{name: '_value', 	type: 'string'},
			{name: '_display',	type: 'string'}
			]

		});

		var pageSize = 10;

		var ds = Ext.create('Ext.data.Store', {
			pageSize: pageSize,
			model: model
		});

		return {

			triggerCls: 'x-form-clear-trigger',
			onTriggerClick: function (args) {
				this.clearValue();
			},

			trigger2Cls: 'x-form-search-trigger',
			onTrigger2Click: function (args) {
				if (this.up('form').xsubmit)
				{
					this.up('form').xsubmit();
				}
			},

			minChars: cfg.minChars,
			fieldLabel: cfg.fieldLabel,
			name: cfg.name,
			emptyText: cfg.emptyText,
			xtype: 'combo',
			store: ds,

			displayField: '_display',
			valueField: '_value',

			typeAhead: true,
			hideTrigger: false,

			//enableKeyEvents:true,

			displayMsg: '{0} - {1} of {2}',
			//selectOnFocus: true,

			listConfig: {
				loadingText: 'searching...',
				emptyText: 'no matching records found.',
				getInnerTpl2: function() {
					return '<div class="search-item">' +
					'<h3><span>{[Ext.Date.format(values.lastPost, "M j, Y")]}<br />by {author}</span>{title}</h3>' +
					'{excerpt}' +
					'</div>';
				}
			},
			pageSize: pageSize,
			listeners: {
				buffer: 1,
				specialkey: function(field,event) {
					if (event.getKey() == event.ENTER) {
						if (this.up('form').xsubmit)
						{
							this.up('form').xsubmit();
						}
					}
				},
				select: function(combo, selection) {
					console.info("select");
					if (this.up('form').xsubmit)
					{
						//this.up('form').xsubmit();
					}
				}
			}
		};

	},


	searchComboMedia: function(cfg)
	{

		var model 	= Ext.id();
		var url 	= xluerzer.getInstance().getAjaxPath('media/searchCombo/'+cfg.searchScope);

		Ext.define(model, {
			extend: 'Ext.data.Model',
			proxy: {
				type: 'ajax',
				url : url,
				reader: {
					type: 'json',
					root: 'root',
					totalProperty: 'totalCount'
				}
			},

			fields: [
			{name: '_value', 	type: 'string'},
			{name: '_display',	type: 'string'}
			]

		});

		var pageSize = 10;

		var ds = Ext.create('Ext.data.Store', {
			pageSize: pageSize,
			model: model
		});

		return {

			triggerCls: 'x-form-clear-trigger',
			onTriggerClick: function (args) {
				this.clearValue();
			},

			trigger2Cls: 'x-form-search-trigger',
			onTrigger2Click: function (args) {
				if (this.up('form').xsubmit)
				{
					this.up('form').xsubmit();
				}
			},


			minChars: cfg.minChars,
			fieldLabel: cfg.fieldLabel,
			name: cfg.name,
			emptyText: cfg.emptyText,
			xtype: 'combo',
			store: ds,

			displayField: '_display',
			valueField: '_value',

			typeAhead: true,
			hideTrigger: false,

			displayMsg: '{0} - {1} of {2}',
			//selectOnFocus: true,

			listConfig: {
				loadingText: 'searching...',
				emptyText: 'no matching records found.',
				getInnerTpl2: function() {
					return '<div class="search-item">' +
					'<h3><span>{[Ext.Date.format(values.lastPost, "M j, Y")]}<br />by {author}</span>{title}</h3>' +
					'{excerpt}' +
					'</div>';
				}
			},
			pageSize: pageSize,
			listeners: {
				specialkey: function(field,event) {
					if (event.getKey() == event.ENTER) {
						if (this.up('form').xsubmit)
						{
							this.up('form').xsubmit();
						}
					}
				},
				select: function(combo, selection) {
					var post = selection[0];
					if (post) {

					}
				}
			}
		};

	},




	/*

	####################################################################################################################################
	####################################################################################################################################
	####################################################################################################################################
	####################################################################################################################################
	####################################################################################################################################
	####################################################################################################################################
	####################################################################################################################################
	####################################################################################################################################
	####################################################################################################################################
	####################################################################################################################################
	####################################################################################################################################
	####################################################################################################################################
	####################################################################################################################################
	####################################################################################################################################

	*/


	getAjaxPath : function(suffix)
	{
		return xluerzer.getInstance().getAjaxPath(suffix);
	},


	defaultAction_click_saved: function(id) {
		var btn = Ext.getCmp(id);
		btn.el.dom.click();
	},

	defaultAction: function(cfg) {


		var id = cfg.id || 'overview'+cfg.cfg_grid.scopex;

		if (Ext.getCmp(id))
		{
			id = Ext.id();
		}

		console.info("################### defaultAction",id);

		var ret = {
			id: id,
			iconCls: '',
			text: cfg.cfg_grid.text,
			handler: function() {


				console.info("################### OPEN",id);

				var gui = this.defaultSearcher(cfg.cfg_grid,cfg.cfg_record);

				xluerzer.getInstance().saveLastCommand({
					text: gui.title,
					title: gui.title,
					classx: 'xluerzer_gui',
					fn: 'defaultAction_click_saved',
					param_0: ''+ret.id
				});

				xluerzer.getInstance().showContent(gui);

			},
			scope: this
		}

		return ret;
	},


	renderer_kickHtml: function(value)
	{
		value = "<div>"+value+"<div>";
		return $$(value).text();
	},

	showImg: function(value)
	{
		console.info(value);
		return "<img width=200 height=200 src='/xgo/xplugs/xluerzer/ajax/oe_media/galleryImg/"+value+"'>";
	},



	defaultSearcher: function(cfg,recordDetail) {


		console.info('defaultSearcher',cfg);


		if (cfg.scopex == "oe_thisweek")
		{

			var field_day_id 	= Ext.id();
			var field_year_id 	= Ext.id();
			var field_week_id 	= Ext.id();
			var field_date_id 	= Ext.id();

			var tbar_features = [{
				xtype: 'button',
				iconCls: 'xf_add',
				text:'Create week',
				handler: function(t) {

					var grid = t.getGrid();

					var me = this;
					xframe.ajax({
						scope: this,
						url: xluerzer.getInstance().getAjaxPath('oe_thisweek/checkWeek'),
						params : {
							date: Ext.getCmp(field_day_id).getValue()
						},
						stateless: function(success, json)
						{
							grid.getStore().proxy.extraParams['date'] = Ext.getCmp(field_day_id).getValue();
							grid.getStore().load();
							Ext.getCmp(field_date_id).setValue(true);
						}
					});

				}
			},'-','Filter by Date Settings',{

				xtype: 'checkbox',
				id: field_date_id,
				handler: function(t)
				{
					var grid = t.getGrid();
					grid.getStore().proxy.extraParams['date'] = Ext.getCmp(field_day_id).getValue();

					if (!this.getValue())
					{
						delete(grid.getStore().proxy.extraParams['date']);
					}

					grid.getStore().load();
				}

			},'Date',{
				id: field_day_id,
				value: new Date(),
				xtype: 'datefield',
				submitFormat: 'Y-m-d',
				listeners: {
					change: function(t) {
						var grid = t.getGrid();

						grid.getStore().proxy.extraParams['date'] = t.getValue();
						grid.getStore().load();
						Ext.getCmp(field_date_id).setValue(true);

						var dayx = t.getValue();
						var week = dayx.getWeekNumber();
						var year = dayx.getFullYear();

						Ext.getCmp(field_year_id).setValue(year);
						Ext.getCmp(field_week_id).setValue(week);

					}
				}
			},{
				hideTrigger: true,
				xtype          	: 'numberfield',
				name          	: 'yearCmb',
				displayField  	: 'years',
				value          	: new Date().getFullYear(),
				id: field_year_id,
				listeners: {
					scope: this,
					change: function(c) {

						var week2set = Ext.getCmp(field_week_id).getValue();
						var year = c.getValue();

						var days = 2 + (week2set - 1) * 7 - (new Date(year,0,1)).getDay();
						var dayx = new Date(year, 0, days);

						Ext.getCmp(field_day_id).setValue(dayx);
					}
				}
			},{
				id: field_week_id,
				hideTrigger: false,
				xtype          	: 'numberfield',
				name          	: 'weekCmb',
				displayField  	: 'weeks',
				value          	: new Date().getWeekNumber(),
				minValue: 0,
				maxValue: 53,
				listeners: {
					scope: this,
					change: function(c) {

						var week2set = c.getValue();
						var year = Ext.getCmp(field_year_id).getValue();

						var days = 2 + (week2set - 1) * 7 - (new Date(year,0,1)).getDay();
						var dayx = new Date(year, 0, days);

						Ext.getCmp(field_day_id).setValue(dayx);
					}
				}
			},{
				text: 'this week',
				iconCls: 'xf_select',
				handler: function(t) {

					var v1 = Ext.getCmp(field_day_id).getValue();
					Ext.getCmp(field_day_id).setValue(new Date());
					var v2 = Ext.getCmp(field_day_id).getValue();

					if (v1.getTime()  == v2.getTime() )
					{
						var grid = t.getGrid();
						grid.getStore().proxy.extraParams['date'] = Ext.getCmp(field_day_id).getValue();
						grid.getStore().load();
						Ext.getCmp(field_date_id).setValue(true);
					}

				}
			},'-'
			];

			cfg.tbar = tbar_features;

		}





		var ftitle = 'Overview '+ cfg.text;
		var gui = false;
		var fields = [
		{name: cfg.pid,	text:'ID',	type:'int', width: 50}
		];


		Ext.each(cfg.fields,function(item){

			if (Ext.isObject(item)) {

				switch(item.type)
				{
					case 'image':
					item.type = "string";
					break;
					default:
					item.type = "string";
				}

				if (typeof item.flex == 'undefined')
				{
					item.flex = 1;
				}

				if (item.renderer)
				{
					item.filterable = false;
				}

				fields.push(item);
			} else {
				//fields.push({name: item, text: item,	type: 'string'});
			}

		},this);

		Ext.each(fields,function(d){
			if (d.kickHtml)
			{
				d.renderer  = this.renderer_kickHtml;
			}
		},this);

		var tbar = [];

		if (cfg.tbar)
		{
			Ext.each(cfg.tbar,function(z){

				if ((!z.xtype) && (z.xtype == 'button'))
				{
					z.getGrid = function() {
						return gui;
					}

					tbar.push({
						text: z.text,
						iconCls: z.iconCls || '',
						scope: this,
						handler: function() {
							z.handler.call(gui)
						}
					});
				} else {
					z.getGrid = function() {
						return gui;
					}

					if (z.id)
					{
						if (Ext.getCmp(z.id)) z.id = Ext.id();
					}

					tbar.push(z);
				}

			},this);
		}

		var button_del = true;

		if (cfg.disableDel)
		{
			button_del = false;
		}
		
		var button_add = true;

		if (cfg.disableAdd)
		{
			button_add = false;
		}
		
		
		
		var funktionadd = false;
		var funktionaddscope = this;
				
		switch (cfg.scopex)
		{
			case 'oe_inspiration':
				funktionadd 		= xluerzer_oe.getInstance().openInspirationById;
				break;
			case 'oe_partners':
				funktionadd 		= xluerzer_oe.getInstance().openPartnersById;
				break;
			case 'oe_designerprofiles':
				funktionadd 		= xluerzer_oe.getInstance().openProfileById;
				break;
			case 'oe_blogposts':
				funktionadd 		= xluerzer_oe.getInstance().openBlogpostById;
				break;
			case 'oe_events':
				funktionadd 		= xluerzer_oe.getInstance().openEventById;
				break;
			case 'oe_otherarticle':
				funktionadd 		= xluerzer_oe.getInstance().openOtherArticleById;
				break;
			case 'e_digital_app':
				funktionadd 		= xluerzer_e.getInstance().open_app;
				break;
			case 'e_digital_web':
				funktionadd 		= xluerzer_e.getInstance().open_web;
				break;		
			case 'e_interviews':
				funktionadd 		= xluerzer_e.getInstance().open_interview;
				break;		
			case 'e_digitalInterviews':
				funktionadd 		= xluerzer_e.getInstance().open_digital_interview;
				break;		
			
				
			default:
				break;
		}
		
		var scopex 	= cfg.scopex;
		gui = xframe_pattern.getInstance().genGrid({
			stateful: true,
			stateId: 'overview_grid_'+cfg.scopex,
			region:'center',
			forceFit:true,
			border:false,
			title: ftitle,
			split: true,
			toolbar_top: tbar || false,
			collapseMode: 'mini',
			button_del:button_del,
			button_add:button_add,
			fn_add: funktionadd,
			fn_add_scope: funktionaddscope,	
			search: true,
			editor: true,
			pager: true,
			pagerTop: true,
			records_move: false,
			xstore: {
				initSort: cfg.initSort,
				load: 	this.getAjaxPath(scopex+'/load'),
				update: this.getAjaxPath(scopex+'/update'),
				insert: this.getAjaxPath(scopex+'/insert'),
				move: 	this.getAjaxPath(scopex+'/move'),
				remove:	this.getAjaxPath(scopex+'/remove'),
				pid: 	cfg.pid,
				fields: fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
					if (!recordDetail.handler) return;

					if (recordDetail.handler && recordDetail.scope) {
						recordDetail.handler.call(recordDetail.scope,record,recordDetail);
					} else {
						console.info("cfg_record is not configured correctly ...");
					}
				},
			}
		});

		gui.on('afterrender',function(){
			scope: this,
			gui.getStore().load({
				callback: function(records, operation, success) {
					// color change depending on status (jquery)
					/* $$('.pending').closest('tr').find('td').each (function() {
					$$(this).addClass('pendingClass');
					});
					$$('.draft').closest('tr').find('td').each (function() {
					$$(this).addClass('draftClass');
					});
					*/

					$$('.isToday').closest('tr').find('td').each (function() {
						$$(this).addClass('todayClass');
					});
					$$('.isFuture').closest('tr').find('td').each (function() {
						$$(this).addClass('futureClass');
					});
					$$('.isPast').closest('tr').find('td').each (function() {

						$$(this).addClass('pastClass');
					});


				}
			});

		},this);


		console.info('gui',gui,gui.id);

		return gui;
	},


	/*

	######################
	######################
	######################
	######################
	######################
	######################
	######################
	######################
	######################
	######################
	######################
	######################


	*/


	chooseImageField: function(cfg) {

		var label;

		if (typeof cfg !== 'undefined') {
			if (typeof cfg.fieldLabel !== 'undefined') {
				label = cfg.fieldLabel;
			}
			else {
				label = 'Image';
			}
			if (typeof cfg.name !== 'undefined') {
				name = cfg.name;
			}
			else {
				name = 'imagetest';
			}
		}

		return {
			emptyText: 'please choose image...',
			xtype: 'xr_field_file',
			fieldLabel: label,
			cls: 'imageContainerBox',
			name: name
		};
	},


	setLinkField: function(cfg) {

		if (typeof cfg !== 'undefined') {
			if (typeof cfg.name !== 'undefined') {
				name = cfg.name;
			}
			else {
				name = 'url';
			}
		}

		return {
			xtype: 'textfield',
			name: name,
			emptyText: 'http://',
			fieldLabel: 'Link',
			width: '100%'
		};
	},


	setStateField: function(cfg) {

		if (typeof cfg !== 'undefined') {
			if (typeof cfg.name !== 'undefined') {
				name = cfg.name;
			}
			else {
				name = 'state';
			}
		}

		return this.simplyCombo({
			emptyText: 'Pick state ...',
			fieldLabel: 'State',
			name: name,
			readOnly: cfg.readOnly || false,
			value: '',
			data: [{k:'',v:''},{k:'0',v:'None'},{k:'1',v:'Published'},{k:'2',v:'Pending Review'}, {k:'3',v:'Draft'}]
		});
	},


	shortDescriptionField: function(cfg) {

		if (typeof cfg !== 'undefined') {
			if (typeof cfg.name !== 'undefined') {
				name = cfg.name;
			}
			else {
				name = 'desc_short';
			}
		}

		return {
			xtype:'xr_field_html',
			name: name,
			fieldLabel: 'Short Description',

			height: 150
		};
	},


	longDescriptionField: function(cfg) {

		if (typeof cfg !== 'undefined') {
			if (typeof cfg.name !== 'undefined') {
				name = cfg.name;
			}
			else {
				name = 'desc_long';
			}
		}

		return {
			xtype:'xr_field_html',
			name: name,
			fieldLabel: cfg.fieldLabel || 'Long Description',
			width: '90%',
			margin: '10px'
		};
	},


	setNameField: function(cfg) {

		return {
			xtype: 'textfield',
			name: 'name',
			emptyText: '',
			fieldLabel: 'Name',
			width: 150
		};
	},


	publishStartField: function(cfg) {

		if (typeof cfg !== 'undefined') {
			if (typeof cfg.name !== 'undefined') {
				name = cfg.name;
			}
			else {
				name = 'date_start';
			}
		}

		return {
			xtype: 'datefield',
			emptyText: 'Pick date ...',
			format: 'Y-m-d',
			altFormats: 'Y-m-d H:i:s',
			fieldLabel: 'Publish Start',
			name: name
		};
	},


	publishEndField: function(cfg) {

		if (typeof cfg !== 'undefined') {
			if (typeof cfg.name !== 'undefined') {
				name = cfg.name;
			}
			else {
				name = 'date_end';
			}
		}

		return {
			xtype: 'datefield',
			emptyText: 'Pick date ...',
			format: 'Y-m-d',
			altFormats: 'Y-m-d H:i:s',
			fieldLabel: 'Publish End',
			name: name,
		};
	},


	keywordsField: function(cfg) {

		if (typeof cfg !== 'undefined') {
			if (typeof cfg.name !== 'undefined') {
				name = cfg.name;
			}
			else {
				name = 'keywords';
			}
		}

		return {
			xtype: 'textarea',
			fieldLabel: 'Keywords',
			name: name,
			width: 150
		};

	},


	titleField: function(cfg) {

		if (typeof cfg !== 'undefined') {
			if (typeof cfg.name !== 'undefined') {
				name = cfg.name;
			}
			else {
				name = 'date_end';
			}
			if (typeof cfg.name_keywords !== 'undefined') {
				name_keywords = cfg.name_keywords;
			}
			else {
				name_keywords = 'keywords';
				console.log ("kw undefined");
			}
		}

		return {
			xtype: 'fieldcontainer',
			layout: 'hbox',
			width: '100%',
			forceFit: true,
			defaultType: 'textfield',
			fieldDefaults: {
				labelAlign: 'top',
				msgTarget: 'side',
				margin: 0,
				padding: 0
			},

			items: [

			{
				name: name,
				fieldLabel: 'Title',
				flex: 1,
			},
			{
				xtype: 'splitter',
				width: 20,
			},
			{
				xtype: 'textareafield',
				fieldLabel: 'Keywords',
				name: name_keywords,
				flex: 1,
			}

			]
		};
	},


	html2Field: function(cfg) {

		if (typeof cfg !== 'undefined') {
			if (typeof cfg.name_left !== 'undefined') {
				name_left = cfg.name_left;
			}
			else {
				name_left = 'col_left';
			}
			if (typeof cfg.name_right !== 'undefined') {
				name_right = cfg.name_right;
			}
			else {
				name_right = 'col_right';
			}
		}

		return {
			xtype: 'fieldcontainer',
			layout: 'column',
			width: '100%',
			items: [{
				xtype:'xr_field_html',
				cls: 'htmlEditor',
				columnWidth: 0.5,
				fieldLabel: 'Left',
				name: name_left,
			},{
				xtype: 'splitter',
				width:20
			},{
				xtype:'xr_field_html',
				cls: 'htmlEditor',
				columnWidth: 0.5,
				fieldLabel: 'Right',
				name: name_right
			}]
		};
	},


	textFieldPlus: function(cfg) {

		return {
			xtype: 'fieldcontainer',
			fieldLabel: cfg.fieldLabel,
			layout: 'column',
			forceFit: true,
			width: '96%',
			forceFit: true,
			defaultType: 'textfield',
			items: [

			{
				cls: cfg.cls,
				name: cfg.name,
				/* TODO chrome margin?
				* width?
				*/
				margin: '0, 0, 0, 3'
			},

			{
				xtype: 'button',
				iconCls: cfg.iconCls,
				text: cfg.buttonText,
				width: cfg.buttonWidth,
				listeners: {
					scope: this,
					click: function() {
						this.ìnsertAfterThis();
					}
				}
			},

			]
		};

	},

	/*
	############################################################################################################################################
	############################################################################################################################################
	############################################################################################################################################
	############################################################################################################################################
	############################################################################################################################################
	############################################################################################################################################
	############################################################################################################################################
	############################################################################################################################################
	############################################################################################################################################
	############################################################################################################################################
	############################################################################################################################################
	*/


	getDefaultTabPanel_sseo: function(cfg,tbar,metaAuto)
	{
		if (typeof metaAuto == 'undefiend') metaAuto = true;

		var prefix = cfg.prefix;

		var items_left = [

		{
			hidden: !metaAuto,
			enableKeyEvents: true,
			inputValue: 'Y',
			uncheckedValue: 'N',
			xtype: 'checkbox',
			name: prefix+'meta_keywords_auto',
			labelAlign: 'left',
			boxLabel: 'Auto Meta Keywords'
		},
		{
			enableKeyEvents: true,
			xtype: 'textareafield',
			name: prefix+'meta_keywords',
			fieldLabel: 'Meta Keywords',
			height: 100,
			margin: '0 0 40 0'

		},
		{
			hidden: !metaAuto,
			enableKeyEvents: true,
			inputValue: 'Y',
			uncheckedValue: 'N',
			xtype: 'checkbox',
			name: prefix+'meta_desc_auto',
			labelAlign: 'left',
			boxLabel: 'Auto Meta Description'
		},
		{
			enableKeyEvents: true,
			xtype: 'textareafield',
			height: 100,
			name: prefix+'meta_desc',
			fieldLabel: 'Meta Description',
			margin: '0 0 40 0'
		}
		];


		var items_right = [

		{
			enableKeyEvents: true,
			inputValue: 'Y',
			uncheckedValue: 'N',
			xtype: 'checkbox',
			labelAlign: 'left',
			name: prefix+'og_auto',
			boxLabel: 'Auto Open Graph'
		},

		{
			enableKeyEvents: true,
			xtype: 'textfield',
			name: prefix+'og_title',
			fieldLabel: 'Open Graph Title'
		},
		{
			enableKeyEvents: true,
			xtype: 'textareafield',
			height: 100,
			name: prefix+'og_description',
			fieldLabel: 'Open Graph Description'
		},
		{
			enableKeyEvents: true,
			xtype: 'xr_field_file',
			name: prefix+'og_image',
			fieldLabel: 'Open Graph Image'
		},

		];


		var gui = Ext.widget({
			title: 'Social & SEO',
			xtype: 'form',
			cls: 'innen-content',
			tbar: tbar,
			border: false,
			overflowY: 'auto',
			bodyPadding: 20,
			items: [
			{
				xtype: 'fieldcontainer',
				layout: 'column',
				width: '100%',
				forceFit: true,
				defaultType: 'textfield',
				fieldDefaults: {
					labelAlign: 'top',
					msgTarget: 'side',
					width: '100%'
				},
				items: [
				{
					xtype: 'container',
					columnWidth: 0.5,
					items: items_left,
					minWidth: 300
				},
				{
					xtype: 'splitter',
					width: 100,
				},
				{
					xtype: 'container',
					columnWidth: 0.5,
					items: items_right,
					minWidth: 300,
					width: '100%'
				},
				]
			}
			]
		});
		return gui;
	},

	loginfo: function(al_mods)
	{
		var w = Ext.decode(al_mods,true);
		var html = [];

		var line = "<tr><td><b>Field</b></td><td><b>Old</b></td><td><b>New</b></td></tr>";
		html.push(line);
		var cnt = 0;

		Ext.iterate(w,function(k,v){
			cnt++;
			//var line = "<tr><td style='border-top: 1px solid gray;' >"+k+"</td><td style='border-top: 1px solid gray;' >"+Ext.string.ellipsis(this.renderer_kickHtml(v.old),50)+"</td><td style='border-top: 1px solid gray;' >"+Ext.string.ellipsis(this.renderer_kickHtml(v['new']),50)+"</td></tr>";
			var line = "<tr><td style='border-top: 1px solid gray;' >"+k+"</td><td style='border-top: 1px solid gray;' >"+this.renderer_kickHtml(v.old)+"</td><td style='border-top: 1px solid gray;' >"+this.renderer_kickHtml(v['new'])+"</td></tr>";
			html.push(line);
		},this);

		if (cnt == 0)
		{
			return "-";
		}

		return "<table style='border: 1px solid black;'>"+html.join('')+"</table>";
	},

	getDefaultTabPanel_log: function(cfg,id)
	{
		var scopex = 'oe_log';
		var prefix = cfg.prefix;

		var fields = [
		{name: 'al_id',						text:'ID',		type:'int',  width: 50},
		{name: 'al_ip',						text:'IP',		type:'string', width: 100},
		{name: 'al_host',					text:'HOST',	type:'string', width: 100},
		{name: 'al_action',					text:'ACTION',	type:'string', width: 100},
		{name: 'al_created_ts',				text:'TS',		type:'string', width: 120},
		{name: 'al_backend_user_id_human',	text:'USER',		type:'string', width: 100, resizeable: true},
		{name: 'al_frontend_user_id',		text:'Fe-USER-ID',	type:'string', width: 100, resizeable: true},
		{name: 'al_mods',					text:'CHANGE',	type:'string', renderer: this.loginfo, scope:this, flex: 1},
		{name: 'al_human',					text:'TEXT',	type:'string', flex: 1},
		];

		var gui = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			title: 'Log',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			editor: false,
			pager: true,
			records_move: false,
			xstore: {
				params: {
					scopex_r_id: id,
					scopex: cfg.scopex
				},
				initSort: '[{"property":"al_id","direction":"DESC"}]',
				load: 	this.getAjaxPath(scopex+'/load'),
				update: this.getAjaxPath(scopex+'/update'),
				insert: this.getAjaxPath(scopex+'/insert'),
				move: 	this.getAjaxPath(scopex+'/move'),
				remove:	this.getAjaxPath(scopex+'/remove'),
				pid: 	'al_id',
				fields: fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
				},
			}
		});

		gui.on('afterrender',function() {
			gui.getStore().load();
		},this);

		gui.setNewRecordId = function(id)
		{
			gui.getStore().proxy.extraParams['scopex_r_id'] = id;
			gui.getStore().load();
		}


		return gui;
	},

	getUserLogPanel: function(abu_id)
	{
		var scopex = 'oe_log_user';

		var fields = [
		{name: 'al_id',						text:'ID',		type:'int',  width: 50},
		{name: 'al_ip',						text:'IP',		type:'string', width: 100},
		{name: 'al_host',					text:'HOST',	type:'string', width: 100},
		{name: 'al_action',					text:'ACTION',	type:'string', width: 100},
		{name: 'al_table',					text:'DATABASE',	type:'string', width: 100},
		{name: 'al_record_id',				text:'RECORD ID',	type:'string', width: 100},
		{name: 'al_created_ts',				text:'TS',			type:'string', width: 120},
		//{name: 'al_backend_user_id_human',	text:'USER',		type:'string', width: 100, resizeable: true},
		{name: 'al_mods',					text:'CHANGE',		type:'string', renderer: this.loginfo, scope:this, flex: 1},
		{name: 'al_human',					text:'TEXT',		type:'string', flex: 1},
		];

		var gui = xframe_pattern.getInstance().genGrid({
			region:'center',
			forceFit:true,
			border:false,
			title: 'Log',
			split: true,
			collapseMode: 'mini',
			button_del:false,
			button_add:false,
			search: false,
			editor: false,
			pager: true,
			records_move: false,
			xstore: {
				params: {
					abu_id: abu_id
				},
				initSort: '[{"property":"al_id","direction":"DESC"}]',
				load: 	this.getAjaxPath(scopex+'/load'),
				update: this.getAjaxPath(scopex+'/update'),
				insert: this.getAjaxPath(scopex+'/insert'),
				move: 	this.getAjaxPath(scopex+'/move'),
				remove:	this.getAjaxPath(scopex+'/remove'),
				pid: 	'al_id',
				fields: fields
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {
				},
			}
		});

		gui.on('afterrender',function() {
			gui.getStore().load();
		},this);

		return gui;
	},

	getDefaultTabPanel_preview: function(cfg,id)
	{
		var idx = Ext.id();
		var useThisId = id;
		var gui = Ext.widget({
			title: 'Preview',
			xtype: 'panel',
			layout: 'hbox',
			tbar: [{
				iconCls: 'xf_reload',
				text: 'Reload Preview',
				scope: this,
				handler: function() {
					$$('#'+idx)[0].src = $$('#'+idx)[0].src;
				}
			},{
				text: 'size:full',
				scope: this,
				handler: function() {
					Ext.getCmp(idx).setWidth(gui.getWidth());
				}
			},{
				text: 'size:pad',
				scope: this,
				handler: function() {
					Ext.getCmp(idx).setWidth(768);
				}
			},{
				text: 'size:phone',
				scope: this,
				handler: function() {
					Ext.getCmp(idx).setWidth(320);
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
					src : "/xgo/xplugs/xluerzer/ajax/misc_render/"+cfg.at_id+"/"+id
				},
				listeners: {
					afterrender: function() {
						if (id != useThisId)
						{
							Ext.get(idx).set({'src':"/xgo/xplugs/xluerzer/ajax/misc_render/"+cfg.at_id+"/"+useThisId});
						}
					}
				}
			},{
				flex:1,
				xtype: 'text'
			}]
		});

		gui.loadOtherId = function(id2)
		{
			useThisId = id2;
			if (Ext.get(idx))
			{
				Ext.get(idx).set({'src':"/xgo/xplugs/xluerzer/ajax/misc_render/"+cfg.at_id+"/"+id2});
			}
		}

		return gui;
	},

	showImgGallery: function(value)
	{
		var s_id = parseInt(value,10);
		if (isNaN(s_id)) {
			return "Please wait, image is uploading ...";
		};
		return "<img width=200 height=200 src='/xgo/xplugs/xluerzer/ajax/oe_media/galleryImg/"+value+"'>";
	},

	showImgInfos: function(value)
	{
		return value;
	},


	pseudohtmlrenderer: function(value)
	{
		return value;
		return "<div>"+value.split("\n").join("<br />")+"</div>";
	},

	getDefaultTabPanel_gallery: function(cfg,idx)
	{
		var scopex			= cfg.scopex;
		var prefix 			= cfg.prefix;
		var currentDir 		= 1174888;
		var getStorageId 	= 1;


		var uId 		= 'fileUploader_'+Ext.id();
		var uId_btn 	= 'fileUploader_btn_'+Ext.id();
		var uploadUrl 	= "/xgo/xplugs/xluerzer/ajax/oe_gallery/upload";


		var html = '\
				    <form id="'+uId+'" action="'+uploadUrl+'" data-url="'+uploadUrl+'" method="POST" enctype="multipart/form-data">\
				        <div class="fileupload-buttonbar"  style="margin-top:-2px;">\
				                <span class="fileinput-button">\
				                    <div id="'+uId_btn+'"></div>\
				                    <input type="file" name="files[]" multiple>\
				                </span>\
				            </div>\
				    </form>';

		var pAll = Ext.create('Ext.ProgressBar', {
			flex: 1
		});

		var uploadData = [];
		var uploadGridInfo = xframe_pattern.getInstance().genMatrix({


			toolbar_top:[{
				bodyStyle:{
				'background-color': '#ebebeb'
				},
				frame : false,
				border: false,
				id: panelZone,
				xtype: 'panel',
				html: html
			},{
				iconCls: 'xf_select',
				text: 'Archive',
				scope: this,
				handler: function() {





					if (!this.xstorage) this.xstorage = xredaktor_storage.getInstance();
					this.xstorage.showFileDialog({
						s_storage_scope: xredaktor.getInstance().getCurrentBasicStorage(),
						site_id: xredaktor.getInstance().getCurrentSiteId(),
						preSelectDir: 0,
						preSelect: 0,
						latestSaved: 0,
						scope:this,
						callBack:function(datax)
						{
							var data = datax[0].data;
							var s_id = data.s_id;
							if (!Ext.isNumeric(s_id)) s_id = '';


							/*################ APPEND */

							xframe.ajax({
								scope:this,
								url: '/xgo/xplugs/xluerzer/ajax/oe_gallery/append',
								params: {
									scopex: scopex,
									scopex_r_id: idx,
									s_id: s_id
								},
								stateless: function(succ,json) {
									if (!succ) return;


									/*################ IF OKAY  */

									uploadGridInfo.getStore().add({
										f_loaded: 'Y',
										f_id: s_id,
										f_image_id: s_id,
										f_percent: 'DONE'
									});



									/*################ FETCH INFOS  */

									var s_ids = Ext.encode([s_id]);

									xframe.ajax({
										scope: this,
										url: '/xgo/xplugs/xluerzer/ajax/oe_gallery/getFileInfos',
										params: {
											s_ids: s_ids
										},
										stateless: function(success, json) {
											uploadGridInfo.unmask();
											if (!success) return;

											Ext.iterate(json.infos,function(k, f){

												var r = uploadGridInfo.getStore().getById(k);

												//if (!r) return;

												var s_alts		= Ext.decode(f.s_alts,true);
												var s_titles	= Ext.decode(f.s_titles,true);
												var s_descs		= Ext.decode(f.s_descs,true);

												if (!s_titles) 	s_titles 	= {};
												if (!s_alts) 	s_alts 		= {};
												if (!s_descs) 	s_descs 	= {};

												if (!s_titles['EN']) 	s_titles['EN'] = "";
												if (!s_alts['EN']) 		s_alts['EN'] = "";
												if (!s_descs['EN']) 	s_descs['EN'] = "";

												var f_title = s_titles['EN'];
												var f_alt 	= s_alts['EN'];
												var f_desc 	= s_descs['EN'];

												r.set('f_title',		f_title);
												r.set('f_alt',			f_alt);
												r.set('f_description',	f_desc);

											},this);



										}
									});


								}
							});


						} // CALL BACK
					});



				}
			}],

			region: 'center',
			height:300,
			collapseMode:'mini',
			data: uploadData,
			tools: false,
			records_move: true,
			plugin_numLines: true,
			records2array:true,
			autoDestroyStore:false,
			button_add: false,
			button_del: true,
			button_save: false,
			tbar: [pAll],
			xstore: {
				pid: 	'f_image_id',
				fields: [
				{name: 'f_image_id', 			text:'ID', 				type:'string', width:70},
				{name: 'f_image_id', 			text:'Image', 			type:'string', width:220,	renderer: this.showImgGallery, scope: this},
				{name: 'f_image_infos',			text:'Image-Infos', 	type:'string', width:150,	renderer: this.showImgInfos, scope: this},

				{name: 'f_title', 				text:'Title', 			type:'string', flex:1, editor: {allowBlank: true, xtype: 'textareafield', height: 200, margin: '180 0 0 0'}},
				{name: 'f_alt', 				text:'Keywords', 		type:'string', flex:1, editor: {allowBlank: true, xtype: 'textareafield', height: 200, margin: '180 0 0 0'}},
				{name: 'f_description', 		text:'Description', 	type:'string', flex:1, editor: {allowBlank: true, xtype: 'textareafield', height: 200, margin: '180 0 0 0'}, renderer: this.pseudohtmlrenderer},

				{name: 'f_loaded', 				text:'Loaded', 			type:'string', width:100, 	hidden: true},

				{name: 'f_time', 				text:'Timestamp', 		type:'string', width:100, 	hidden: true},
				{name: 'f_filename', 			text:'Local', 			type:'string', flex:1, 		hidden: true},
				{name: 'f_filenameRemote', 		text:'Server', 			type:'string', flex:1, 		hidden: true },
				{name: 'f_percent', 			text:'Upload',			type:'string', width: 50,	scope:this}
				]
			}
		});


		uploadGridInfo.getStore().on('remove',function(s,r) {
			console.info('remove');
			var s_id = r.data.f_image_id;
			xframe.ajax({
				scope: this,
				url: '/xgo/xplugs/xluerzer/ajax/oe_gallery/removeFile',
				params: {
					scopex: scopex,
					scopex_r_id: idx,
					s_id: s_id
				},
				stateless: function(succ,json){
					if (!succ) return;
				}
			});
		},this);

		var syncEnabled = false;

		uploadGridInfo.getStore().on('add',function(s,r,index) {
			if (!syncEnabled) return;

			console.info('add');
			var order = [];

			Ext.each(s.getRange(),function(r){
				order.push(r.data.f_image_id);
			});

			xframe.ajax({
				scope: this,
				url: '/xgo/xplugs/xluerzer/ajax/oe_gallery/sync',
				params: {
					scopex: scopex,
					scopex_r_id: idx,
					s_ids: order.join(',')
				},
				stateless: function(succ,json){
					if (!succ) return;
				}
			});
		},this);

		uploadGridInfo.on('edit', function(grid,action)
		{
			var params = {};

			params.id = action.record.data.f_image_id;
			params.idProperty = action.record.idProperty;
			params.field = action.field;
			params.value = action.value;
			params.originalValue = action.originalValue;
			params.lang = 'EN';
			params.scopex = scopex;
			params.scopex_r_id = idx;
			//if (params.value == params.originalValue) return;

			console.info(params);

			xframe.ajax({
				scope: this,
				url: '/xgo/xplugs/xluerzer/ajax/oe_gallery/setFileInfos',
				params: params,
				stateless: function(succ,json){
					if (!succ) return;
				}
			});

		});

		var loadInfos 	= false;
		var img_gallery = [];



		var getValues = function()
		{

		}


		var updateG = function()
		{
			try{
				if (img_gallery.length == 0) return;
			} catch (e) {
				return;
			}

			uploadGridInfo.mask('Lade Gallery Data ...');
			var s_ids = Ext.encode(img_gallery);

			xframe.ajax({
				scope: this,
				url: '/xgo/xplugs/xluerzer/ajax/oe_gallery/getFileInfos',
				params: {
					s_ids: s_ids
				},
				stateless: function(success, json) {
					uploadGridInfo.unmask();
					if (!success) return;

					Ext.iterate(json.infos,function(k, f){

						var r = uploadGridInfo.getStore().getById(k);

						//if (!r) return;

						var s_alts		= Ext.decode(f.s_alts,true);
						var s_titles	= Ext.decode(f.s_titles,true);
						var s_descs		= Ext.decode(f.s_descs,true);

						if (!s_titles) 	s_titles 	= {};
						if (!s_alts) 	s_alts 		= {};
						if (!s_descs) 	s_descs 	= {};

						if (!s_titles['EN']) 	s_titles['EN'] = "";
						if (!s_alts['EN']) 		s_alts['EN'] = "";
						if (!s_descs['EN']) 	s_descs['EN'] = "";

						var f_title = s_titles['EN'];
						var f_alt 	= s_alts['EN'];
						var f_desc 	= s_descs['EN'];


						r.set('f_title',		f_title);
						r.set('f_alt',			f_alt);
						r.set('f_description',	f_desc);

						var infos = "<b>Dimensions:</b><br>"+f.s_media_w + "x" + f.s_media_h + "px<br><br><b>Size:</b><br>" + f.s_fileSizeBytesHuman + "<br><br><b>Name:</b><br>" + f.s_name
						r.set('f_image_infos',	infos);

					},this);



				}
			});
		}

		uploadGridInfo.on('afterrender',function(){
			if (!loadInfos) return;
			console.info("afterrender");
			updateG();
		},this,{buffer:10});

		var setValues = function(jsonData)
		{
			syncEnabled = false;

			uploadGridInfo.getStore().removeAll();

			/*			if (!jsonData)
			{
			console.error("GALLERY ERROR: json data is null.");
			return false;
			}

			if (!jsonData[prefix+'img_gallery'])
			{
			img_gallery = [];
			console.error("GALLERY ERROR: data record has no such field.");
			} else
			{*/
			img_gallery = Ext.decode(jsonData[prefix+'img_gallery'],true);
			//}

			Ext.each(img_gallery,function(s_id){
				loadInfos = true;
				var vId = Ext.id();
				uploadGridInfo.getStore().add({
					f_loaded: 'Y',
					f_id: s_id,
					f_image_id: s_id
				});
			},this);


			syncEnabled = true;

			if  (uploadGridInfo.rendered)
			{
				updateG();
			}


			//console.info("SETVALUES");
		}

		fileUploaded = function(fileHook,s_id,r)
		{
			r.set({
				f_percent: 'DONE.',
				f_image_id: ''+s_id
			});

			xframe.ajax({
				scope:this,
				url: '/xgo/xplugs/xluerzer/ajax/oe_gallery/append',
				params: {
					scopex: scopex,
					scopex_r_id: idx,
					s_id: s_id
				},
				stateless: function(succ,json) {
					if (!succ) return;
				},
				failure: function() {
				}
			});


		}

		$ = $$;

		var panelZone = 'panelZone_'+Ext.id();
		var me = this;

		//this.findANotUsedName

		this.addFileRecord = function(e, r, f_filename) {
			var date = new Date();
			var str = date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds() + " "+ date.getDate() + "." + date.getMonth() + "." + date.getFullYear();
			var vId = Ext.id();

			console.info('vid',vId);

			uploadGridInfo.getStore().add({
				f_image_id: vId,
				f_time: str,
				f_filename: f_filename,
				f_filenameRemote: f_filename,
				f_percent: 0
			});

			r.fileHook = ''+vId;
			r.currentDir = ''+currentDir;
			r.url = uploadUrl+'?s_id='+currentDir+'&s_storage_scope='+getStorageId+'&autoRename=1&scopex='+scopex;
		}

		var uploadRegistered = {};

		var gui = Ext.widget({
			xtype: 'panel',
			region: 'south',
			layout: 'border',

			height: 600,
			split: true,

			title: 'Gallery',

			items: [uploadGridInfo],



			listeners: {
				scope:this,
				buffer:10,
				afterrender: function() {

					//var pasteDragZone = Ext.get(panelZone);

					Ext.widget({
						xtype: 'button',
						iconCls: 'xf_add',
						width: 70,
						renderTo: uId_btn,
						text: 'Upload'
					});

					$$('#'+uId).fileupload({
						url: uploadUrl,
						dataType: 'json',
						//pasteZone: pasteDragZone.dom,
						//dropZone: pasteDragZone.dom,
						autoUpload: true
					}).bind('fileuploadadd',function (e, r) {

						var f_filename = r.files[0].name;
						if (typeof f_filename == 'undefined')
						{
							var f_type = r.files[0].type;
							Ext.MessageBox.prompt('Filename', 'without the extension('+f_type+'):', function(s,name){
								if (s != 'ok') return;
								f_filename = name +'.'+ f_type.split('/')[1];
								me.addFileRecord(e, r, f_filename);
							});
						} else
						{
							me.addFileRecord(e, r, f_filename);
						}

					}).bind('fileuploadalways',function (e, data) {

						var d = Ext.decode(data.jqXHR.responseText,true);
						if (!d) return;
						if ((d.s_id) && (!uploadRegistered[d.s_id])) {
							uploadRegistered[d.s_id] = true;

							var gr = uploadGridInfo.getStore().getById(data.fileHook);
							fileUploaded(data.fileHook,d.s_id,gr);
						}

					}).bind('fileuploadprogress',function(e,r){

						var vId 		= r.fileHook;
						var progressInt = parseInt(r.loaded / r.total * 100, 10);
						var gr = uploadGridInfo.getStore().getById(vId);
						gr.set({f_percent:progressInt+'%'});

					}).bind('fileuploadsend',function(e,r){
					}).bind('fileuploadprogressall',function(e,data){

						var progressInt = parseInt(data.loaded / data.total * 100, 10);
						var progress 	= data.loaded / data.total;
						pAll.updateProgress(progress,'uploading ... ');
						if (progressInt == 100)
						{
							pAll.updateProgress(0,'done.');
						}

					});

				}
			}
		});

		gui.setValues = setValues;

		return gui;
	},

}



