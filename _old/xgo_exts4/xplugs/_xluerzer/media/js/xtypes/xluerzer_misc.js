

Ext.define('Ext.xluerzer.xluerzer_video', {
	extend: 'Ext.panel.Panel',
	alias: 'widget.xluerzer_video',

	layout: 'fit',

	width: 600,
	height: 338,

	minWidth: 600,

	bodyCls: ['xluerzer_video_player_background'],

	handleChangeEvent: function(fieldx) {


		console.info('xluerzer_video - handleChangeEvent');

		var video_s_id = parseInt(fieldx.getValue(),10);

		if (video_s_id == 0)
		{
			this.update('');
		} else {
			xframe.ajax({
				scope: this,
				url: xluerzer.getInstance().getAjaxPath('submissions/getVideoFileBySId/'+video_s_id),
				params : {
					video_s_id: video_s_id
				},
				stateless: function(success, json)
				{
					if (!success) return;

					var t = new Date();

					var url_poster 	= 'http://lz-www.xgodev.com' + json.video.url_poster + '?tmp='+t;
					var url_video 	= 'http://lz-www.xgodev.com' + json.video.url_video + '?tmp='+t;

					var id = Ext.id();

					var html = '<video id="'+id+'" class="video-js vjs-default-skin vjs-big-play-centered"'+
					'controls preload="auto" autoplay="true" height="338" width="600" '+
					'poster="'+url_poster+'"'+
					'data-setup="{}">'+
					'<source src="'+url_video+'" type="video/mp4" />'+
					//'<source src="" type="video/webm" />'+
					'</video>';

					this.update(html);

					setTimeout(function(){
						//videojs(id);
					},100);

				}
			});

		}

	},

	constructor:function(cnfg){

		this.cnfg = cnfg;
		this.callParent(arguments);

		this.hiddenX = Ext.create('Ext.form.field.Hidden',{
			name: cnfg.name,
			value: cnfg.value,
			scope: this,
			listeners:{
				scope: this,
				buffer: 1,
				change: this.handleChangeEvent
			}
		});
		this.add(this.hiddenX);
	}

});

Ext.define('Ext.xluerzer.xluerzer_video_thumbs', {
	extend: 'Ext.panel.Panel',
	alias: 'widget.xluerzer_video_thumbs',
	width: 600,
	height: 338,
	layout: 'fit',

	constructor:function(cnfg){

		this.cnfg = cnfg;
		this.callParent(arguments);

		this.hiddenX = Ext.create('Ext.form.field.Hidden',{
			name: cnfg.name,
			value: cnfg.value,
			scope: this,
			listeners:{
				scope: this,
				buffer: 1,
				change: this.handleChangeEvent
			}
		});
		this.add(this.hiddenX);
	},

	handleChangeEvent: function(fieldx) {

		var cfg = fieldx.getValue();
		console.info(cfg);
		this.myStore.removeAll();
		var data = Ext.decode(cfg,true);
		if (data)
		{
			this.myStore.loadData(data);
		}
	},

	initComponent: function() {

		Ext.define('DUMMY_WUMMY', {
			extend: 'Ext.data.Model',
			fields: [
			{name: 'pts_time',	type: 'string'},
			{name: 'img_s_id',  type: 'string'},
			{name: 'pts_time_r',type: 'string'},
			]
		});

		this.myStore = Ext.create('Ext.data.Store', {
			model: 'DUMMY_WUMMY',
			data : []
		});

		var url_thumb = xluerzer.getInstance().getAjaxPath('submissions/genVideoThumbBySId/');

		this.items = {
			xtype: 'dataview',
			tpl: [
			'<tpl for=".">',
			'<div class="xluerzer_thumb_small">',
			'<img src="'+url_thumb+'{img_s_id}" />',
			'<h3>{pts_time}</h3>',
			'</div>',
			'</tpl>'
			],
			itemSelector: 'div.xluerzer_thumb_small',
			store: this.myStore,
			listeners: {
				scope: this,
				buffer: 1,
				itemclick: function(dv,record) {
					var img_s_id = record.data.img_s_id;
					if (this.cnfg.updateFile)
					{
						Ext.getCmp(this.cnfg.updateFile).setValue(img_s_id);
					}
				}
			}
		};
		this.autoScroll = true;

		this.callParent(arguments);
	}

});



Ext.define('Ext.xluerzer.xluerzer_contact_categories', {
	extend: 'Ext.tree.Panel',
	alias: 'widget.xluerzer_contact_categories',


	requires: [
	'Ext.data.TreeStore'
	],
	xtype: 'check-tree',


	rootVisible: false,
	useArrows: true,
	title: 'Contact Category',
	layout: 'fit',
	emptyText: 'Select category ...',
	width: 250,
	height: 300,



	initComponent: function(){

		console.info(this);


		var url = xluerzer.getInstance().getAjaxPath('admin/loadContactCategories?dummy=1');

		if (this.initialConfig.ec_id)
		{
			url += "&ec_id="+this.initialConfig.ec_id;
		}

		if (this.initialConfig.GROUP_CHECK)
		{
			url += "&GROUP_CHECK="+this.initialConfig.GROUP_CHECK;
		}

		var store = new Ext.data.TreeStore({
			proxy: {
				type: 'ajax',
				url: url,
			},
			sorters: [{
				property: 'leaf',
				direction: 'ASC'
			}, {
				property: 'text',
				direction: 'ASC'
			}]
		});

		Ext.apply(this, {
			store: store,
			tbar: [{
				idOfNodes: 'id',
				xtype:'xfsearchfield',
				paramName : '_query',
				store: store,
				url: url,
				flex: 1,
				extraParams: {}
			}],
			bbar: ['->',{
				iconCls: 'xf_reload',
				text: 'refresh',
				scope: this,
				handler: function() {
					this.getStore().load();
				}
			}]
		});

		this.on('checkchange',function(r, state) {

			xframe.ajax({
				scope: this,
				url: xluerzer.getInstance().getAjaxPath('admin/saveContactCategories'),
				params : {
					eca_id: this.initialConfig.ec_id,
					state: state ? '1' : '0',
					cat_id: r.data.id
				},
				stateless: function(success, json)
				{
					if (!success) return;
					if (this.initialConfig.handler) {
						if (typeof this.initialConfig.handler == 'function')
						{
							this.initialConfig.handler();
						}
					}
				}
			});

		});

		this.callParent();
	},

	onCheckedNodesClick: function(){
		var records = this.getView().getChecked(),
		names = [];
		
		Ext.Array.each(records, function(rec){
			names.push(rec.get('text'));
		});

		Ext.MessageBox.show({
			title: 'Selected Nodes',
			msg: names.join('<br />'),
			icon: Ext.MessageBox.INFO
		});
	}
})


Ext.define('Ext.xluerzer.xluerzer_backend_users', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_backend_users',


	trigger2Cls: 'x-form-clear-trigger',
	onTrigger2Click: function (args) {
		this.clearValue();
	},

	constructor: function(cfg)
	{

		if (cfg.xsearch)
		{
			this.trigger3Cls = 'x-form-search-trigger';
			this.onTrigger3Click = function (args) {
				this.up('form').xsubmit();
			}
		}
		Ext.define('luerzerBackendUser', {
			extend: 'Ext.data.Model',
			fields: [
			{name: 'label', 	type: 'string'},
			{name: 'value',  	type: 'string'}
			]
		});

		if (!xluerzer.backendUsersStore)
		{
			xluerzer.backendUsersStore = Ext.create('Ext.data.Store', {
				model: 'luerzerBackendUser',
				proxy: {
					type: 'ajax',
					url: xluerzer.getInstance().getAjaxPath('admin/loadbackendUsers'),
					reader: {
						type: 'json',
						root: 'backendUsers'
					}
				}
			});
		}

		var backendUsersStore = xluerzer.backendUsersStore;

		this.store 			= backendUsersStore;
		this.displayField 	= 'label';
		this.valueField 	= 'value';
		this.queryMode 		= 'local';
		this.emptyText 		= "Choose a backend user ..";
		this.callParent(arguments);
	},

	afterRender: function() {
		xluerzer.backendUsersStore.load();
	}

});



Ext.define('Ext.xluerzer.xluerzer_blog_categories', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_blog_categories',

	constructor: function(cfg)
	{

		Ext.define('luerzeroeBlogCategory', {
			extend: 'Ext.data.Model',
			fields: [
			{name: 'label', 	type: 'string'},
			{name: 'value',  	type: 'string'}
			]
		});

		if (!xluerzer.oeBlogCategorysStore)
		{
			xluerzer.oeBlogCategorysStore = Ext.create('Ext.data.Store', {
				model: 'luerzeroeBlogCategory',
				proxy: {
					type: 'ajax',
					url: xluerzer.getInstance().getAjaxPath('admin/loadoeBlogCategorys'),
					reader: {
						type: 'json',
						root: 'oeBlogCategorys'
					}
				}
			});
		}

		var oeBlogCategorysStore = xluerzer.oeBlogCategorysStore;

		this.store 			= oeBlogCategorysStore;
		this.displayField 	= 'label';
		this.valueField 	= 'value';
		this.queryMode 		= 'local';
		this.emptyText 		= "Choose a category ..";
		this.callParent(arguments);
	},

	afterRender: function() {
		xluerzer.oeBlogCategorysStore.load();
	}

});


Ext.define('Ext.xluerzer.xluerzer_contact_categories_group', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_contact_categories_group',

	constructor: function(cfg)
	{

		Ext.define('luerzeroecontact_groupCategory', {
			extend: 'Ext.data.Model',
			fields: [
			{name: 'label', 	type: 'string'},
			{name: 'value',  	type: 'string'}
			]
		});

		if (!xluerzer.oecontact_groupCategorysStore)
		{
			xluerzer.oecontact_groupCategorysStore = Ext.create('Ext.data.Store', {
				model: 'luerzeroecontact_groupCategory',
				proxy: {
					type: 'ajax',
					url: xluerzer.getInstance().getAjaxPath('admin/loadoecontact_groupCategorys'),
					reader: {
						type: 'json',
						root: 'oecontact_groupCategorys'
					}
				}
			});
		}

		var oecontact_groupCategorysStore = xluerzer.oecontact_groupCategorysStore;

		this.store 			= oecontact_groupCategorysStore;
		this.displayField 	= 'label';
		this.valueField 	= 'value';
		this.queryMode 		= 'local';
		this.emptyText 		= "Choose a group ..";
		this.callParent(arguments);
	},

	afterRender: function() {
		xluerzer.oecontact_groupCategorysStore.load();
	}

});









Ext.define('Ext.xluerzer.xluerzer_contact_type', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_contact_type',

	trigger2Cls: 'x-form-clear-trigger',
	onTrigger2Click: function (args) {
		this.clearValue();
	},

	constructor: function(cfg)
	{

		if (cfg.xsearch)
		{
			this.trigger3Cls = 'x-form-search-trigger';
			this.onTrigger3Click = function (args) {
				this.up('form').xsubmit();
			}
		}

		Ext.define('luerzercontact_types', {
			extend: 'Ext.data.Model',
			fields: [
			{name: 'label', 	type: 'string'},
			{name: 'value',  	type: 'string'}
			]
		});

		if (!xluerzer.contact_typesStore)
		{
			xluerzer.contact_typesStore = Ext.create('Ext.data.Store', {
				model: 'luerzercontact_types',
				proxy: {
					type: 'ajax',
					url: xluerzer.getInstance().getAjaxPath('submissions/loadContactTypes'),
					reader: {
						type: 'json',
						root: 'contactTypes'
					}
				}
			});
		}

		var contact_typesStore = xluerzer.contact_typesStore;

		this.store 			= contact_typesStore;
		this.displayField 	= 'label';
		this.valueField 	= 'value';
		this.queryMode 		= 'local';
		this.emptyText 		= "Choose a Credit Type ...";
		this.callParent(arguments);
	},

	afterRender: function() {
		xluerzer.contact_typesStore.load();
	}

});


Ext.define('Ext.xluerzer.xluerzer_country', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_country',

	trigger2Cls: 'x-form-clear-trigger',
	onTrigger2Click: function (args) {
		this.clearValue();
	},

	constructor: function(cfg)
	{

		if (cfg.xsearch)
		{
			this.trigger3Cls = 'x-form-search-trigger';
			this.onTrigger3Click = function (args) {
				this.up('form').xsubmit();
			}
		}

		Ext.define('luerzerCountries', {
			extend: 'Ext.data.Model',
			fields: [
			{name: 'label', 	type: 'string'},
			{name: 'value',  	type: 'string'}
			]
		});

		if (!xluerzer.countriesStore)
		{
			xluerzer.countriesStore = Ext.create('Ext.data.Store', {
				model: 'luerzerCountries',
				proxy: {
					type: 'ajax',
					url: xluerzer.getInstance().getAjaxPath('submissions/loadCountries'),
					reader: {
						type: 'json',
						root: 'countries'
					}
				}
			});
		}

		var countriesStore = xluerzer.countriesStore;

		this.store 			= countriesStore;
		this.displayField 	= 'label';
		this.valueField 	= 'value';
		this.queryMode 		= 'local';
		this.emptyText 		= "Choose a country ...";

		this.callParent(arguments);
	},

	afterRender: function() {
		xluerzer.countriesStore.load();
	}

});


Ext.define('Ext.xluerzer.xluerzer_shop_country', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_shop_country',

	trigger2Cls: 'x-form-clear-trigger',
	onTrigger2Click: function (args) {
		this.clearValue();
	},

	constructor: function(cfg)
	{

		if (cfg.xsearch)
		{
			this.trigger3Cls = 'x-form-search-trigger';
			this.onTrigger3Click = function (args) {
				this.up('form').xsubmit();
			}
		}

		Ext.define('luerzerShopCountries', {
			extend: 'Ext.data.Model',
			fields: [
			{name: 'label', 	type: 'string'},
			{name: 'value',  	type: 'string'}
			]
		});

		if (!xluerzer.countriesShopStore)
		{
			xluerzer.countriesShopStore = Ext.create('Ext.data.Store', {
				model: 'luerzerShopCountries',
				proxy: {
					type: 'ajax',
					url: xluerzer.getInstance().getAjaxPath('submissions/loadCountriesShop'),
					reader: {
						type: 'json',
						root: 'countries'
					}
				}
			});
		}

		var countriesShopStore = xluerzer.countriesShopStore;

		this.store 			= countriesShopStore;
		this.displayField 	= 'label';
		this.valueField 	= 'value';
		this.queryMode 		= 'local';
		this.emptyText 		= "Choose a country ...";

		this.callParent(arguments);
	},

	afterRender: function() {
		xluerzer.countriesShopStore.load();
	}

});


Ext.define('Ext.xluerzer.xluerzer_contacttypeid', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_contacttypeid',

	trigger2Cls: 'x-form-clear-trigger',
	onTrigger2Click: function (args) {
		this.clearValue();
	},

	constructor: function(cfg)
	{

		if (cfg.xsearch)
		{
			this.trigger3Cls = 'x-form-search-trigger';
			this.onTrigger3Click = function (args) {
				this.up('form').xsubmit();
			}
		}

		Ext.define('luerzerData', {
			extend: 'Ext.data.Model',
			fields: [
			{name: 'label', 	type: 'string'},
			{name: 'value',  	type: 'string'}
			]
		});

		if (!xluerzer.dataStore)
		{
			xluerzer.dataStore = Ext.create('Ext.data.Store', {
				model: 'luerzerData',
				proxy: {
					type: 'ajax',
					url: xluerzer.getInstance().getAjaxPath('submissions/loadContactTypes'),
					reader: {
						type: 'json',
						root: 'contactTypes'
					}
				}
			});
		}

		var dataStore = xluerzer.dataStore;

		this.store 			= dataStore;
		this.displayField 	= 'label';
		this.valueField 	= 'value';
		this.queryMode 		= 'local';
		this.emptyText 		= "Choose a Contact Type ...";

		this.callParent(arguments);
	},

	afterRender: function() {
		xluerzer.dataStore.load();
	}

});


Ext.define('Ext.xluerzer.xluerzer_submittedfor', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_submittedfor',

	trigger2Cls: 'x-form-clear-trigger',
	onTrigger2Click: function (args) {
		this.clearValue();
	},

	constructor: function(cfg)
	{

		if (cfg.xsearch)
		{
			this.trigger3Cls = 'x-form-search-trigger';
			this.onTrigger3Click = function (args) {
				this.up('form').xsubmit();
			}
		}

		Ext.define('luerzerSubmittedfor', {
			extend: 'Ext.data.Model',
			fields: [
			{name: 'label', 	type: 'string'},
			{name: 'value',  	type: 'string'}
			]
		});

		if (!xluerzer.submittedforStore)
		{
			xluerzer.submittedforStore = Ext.create('Ext.data.Store', {
				model: 'luerzerSubmittedfor',
				proxy: {
					type: 'ajax',
					url: xluerzer.getInstance().getAjaxPath('submissions/loadSubmittedFor'),
					reader: {
						type: 'json',
						root: 'submittedfor'
					}
				}
			});
		}

		var submittedforStore = xluerzer.submittedforStore;

		this.store 			= submittedforStore;
		this.displayField 	= 'label';
		this.valueField 	= 'value';
		this.queryMode 		= 'local';
		this.emptyText 		= "Choose Product ...";

		this.callParent(arguments);
	},

	afterRender: function() {
		xluerzer.submittedforStore.load();
	}

});


Ext.define('Ext.xluerzer.xluerzer_designerprofile', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_designerprofile',

	trigger2Cls: 'x-form-clear-trigger',
	onTrigger2Click: function (args) {
		this.clearValue();
	},

	constructor: function(cfg)
	{

		if (cfg.xsearch)
		{
			this.trigger3Cls = 'x-form-search-trigger';
			this.onTrigger3Click = function (args) {
				this.up('form').xsubmit();
			}
		}

		Ext.define('luerzerDesignerprofile', {
			extend: 'Ext.data.Model',
			fields: [
			{name: 'label', 	type: 'string'},
			{name: 'value',  	type: 'string'}
			]
		});

		if (!xluerzer.designerprofileStore)
		{
			xluerzer.designerprofileStore = Ext.create('Ext.data.Store', {
				model: 'luerzerDesignerprofile',
				proxy: {
					type: 'ajax',
					url: xluerzer.getInstance().getAjaxPath('oe_profiles/loadDesignerprofiles'),
					reader: {
						type: 'json',
						root: 'combodata'
					}
				}
			});
		}

		var designerprofileStore = xluerzer.designerprofileStore;

		this.store 			= designerprofileStore;
		this.displayField 	= 'label';
		this.valueField 	= 'value';
		this.queryMode 		= 'local';
		this.emptyText 		= "Choose Designer ...";

		this.callParent(arguments);
	},

	afterRender: function() {
		xluerzer.designerprofileStore.load();
	}

});


Ext.define('Ext.xluerzer.xluerzer_magType', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_magType',

	trigger2Cls: 'x-form-clear-trigger',
	onTrigger2Click: function (args) {
		this.clearValue();
	},

	constructor: function(cfg)
	{

		if (cfg.xsearch)
		{
			this.trigger3Cls = 'x-form-search-trigger';
			this.onTrigger3Click = function (args) {
				this.up('form').xsubmit();
			}
		}

		Ext.define('luerzerMagTypes', {
			extend: 'Ext.data.Model',
			fields: [
			{name: 'label', 	type: 'string'},
			{name: 'value',  	type: 'string'}
			]
		});

		if (!xluerzer.magTypesStore)
		{
			xluerzer.magTypesStore = Ext.create('Ext.data.Store', {
				model: 'luerzerMagTypes',
				proxy: {
					type: 'ajax',
					url: xluerzer.getInstance().getAjaxPath('submissions/loadMagazineTypes'),
					reader: {
						type: 'json',
						root: 'countries'
					}
				}
			});
		}

		var magTypesStore = xluerzer.magTypesStore;

		this.store 			= magTypesStore;
		this.displayField 	= 'label';
		this.valueField 	= 'value';
		this.queryMode 		= 'local';
		this.emptyText 		= "Choose a mag-type ...";

		this.callParent(arguments);
	},

	afterRender: function() {
		xluerzer.magTypesStore.load();
	}

});



top.flushMagStores = function()
{

	if (xluerzer.magStore)
	{
		xluerzer.magStore.load();
	}

	if (xluerzer.magStore_specials)
	{
		xluerzer.magStore_specials.load();
	}

	if (xluerzer.magStore2)
	{
		xluerzer.magStore2.load();
	}

}




Ext.define('Ext.xluerzer.xluerzer_magazine', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_magazine',

	constructor: function(cfg)
	{
		if (cfg.xsearch)
		{
			this.trigger2Cls = 'x-form-clear-trigger';
			this.onTrigger2Click = function (args) {
				this.clearValue();
			};
			this.trigger3Cls = 'x-form-search-trigger';
			this.onTrigger3Click = function (args) {
				this.up('form').xsubmit();
			}
		}


		Ext.define('luerzerMagazines', {
			extend: 'Ext.data.Model',
			fields: [
			{name: 'label', 	type: 'string'},
			{name: 'value',  	type: 'string'}
			]
		});

		if (!xluerzer.magStore)
		{
			xluerzer.magStore = Ext.create('Ext.data.Store', {
				model: 'luerzerMagazines',
				proxy: {
					type: 'ajax',
					url: xluerzer.getInstance().getAjaxPath('submissions/loadMagazines'),
					reader: {
						type: 'json',
						root: 'magazines'
					}
				}
			});
		}

		var magStore = xluerzer.magStore;
		this.store 			= magStore;
		this.displayField 	= 'label';
		this.valueField 	= 'value';
		this.queryMode 		= 'local';
		this.emptyText 		= "Choose a magazine ...";
		this.callParent(arguments);
	},

	afterRender: function() {
		xluerzer.magStore.load();
	}

});


Ext.define('Ext.xluerzer.xluerzer_magazine_specials', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_magazine_specials',

	constructor: function(cfg)
	{
		if (cfg.xsearch)
		{
			this.trigger2Cls = 'x-form-clear-trigger';
			this.onTrigger2Click = function (args) {
				this.clearValue();
			};
			this.trigger3Cls = 'x-form-search-trigger';
			this.onTrigger3Click = function (args) {
				this.up('form').xsubmit();
			}
		}


		Ext.define('luerzerMagazines', {
			extend: 'Ext.data.Model',
			fields: [
			{name: 'label', 	type: 'string'},
			{name: 'value',  	type: 'string'}
			]
		});

		if (!xluerzer.magStore_specials)
		{
			xluerzer.magStore_specials = Ext.create('Ext.data.Store', {
				model: 'luerzerMagazines',
				proxy: {
					type: 'ajax',
					url: xluerzer.getInstance().getAjaxPath('submissions/loadMagazines_specials'),
					reader: {
						type: 'json',
						root: 'magazines'
					}
				}
			});
		}

		var magStore = xluerzer.magStore_specials;
		this.store 			= magStore;
		this.displayField 	= 'label';
		this.valueField 	= 'value';
		this.queryMode 		= 'local';
		this.emptyText 		= "Choose a magazine ...";
		this.callParent(arguments);
	},

	afterRender: function() {
		xluerzer.magStore_specials.load();
	}

});



Ext.define('Ext.xluerzer.xluerzer_magazine_search', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_magazine_search',

	trigger2Cls: 'x-form-clear-trigger',
	onTrigger2Click: function (args) {
		this.clearValue();
	},

	constructor: function(cfg)
	{

		if (cfg.xsearch)
		{
			this.trigger3Cls = 'x-form-search-trigger';
			this.onTrigger3Click = function (args) {
				this.up('form').xsubmit();
			}
		}

		Ext.define('luerzerMagazines', {
			extend: 'Ext.data.Model',
			fields: [
			{name: 'label', 	type: 'string'},
			{name: 'value',  	type: 'string'}
			]
		});

		if (!xluerzer.magStore2)
		{
			xluerzer.magStore2 = Ext.create('Ext.data.Store', {
				model: 'luerzerMagazines',
				proxy: {
					type: 'ajax',
					url: xluerzer.getInstance().getAjaxPath('submissions/loadMagazinesSearch'),
					reader: {
						type: 'json',
						root: 'magazines'
					}
				}
			});
		}

		var magStore2 = xluerzer.magStore2;

		this.store 			= magStore2;
		this.displayField 	= 'label';
		this.valueField 	= 'value';
		this.queryMode 		= 'local';
		this.emptyText 		= "Choose a magazine ...";
		this.callParent(arguments);
	},

	afterRender: function() {
		xluerzer.magStore2.load();
	}

});

Ext.define('Ext.xluerzer.xluerzer_submission_category', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_submission_category',

	trigger2Cls: 'x-form-clear-trigger',
	onTrigger2Click: function (args) {
		this.clearValue();
	},

	constructor: function(cfg)
	{

		if (cfg.xsearch)
		{
			this.trigger3Cls = 'x-form-search-trigger';
			this.onTrigger3Click = function (args) {
				this.up('form').xsubmit();
			}
		}

		Ext.define('luerzerSubmissionsCategories', {
			extend: 'Ext.data.Model',
			fields: [
			{name: 'label', 	type: 'string'},
			{name: 'value',  	type: 'string'}
			]
		});

		if (!xluerzer.catStore)
		{
			xluerzer.catStore = Ext.create('Ext.data.Store', {
				model: 'luerzerSubmissionsCategories',
				proxy: {
					type: 'ajax',
					url: xluerzer.getInstance().getAjaxPath('submissions/loadCategories'),
					reader: {
						type: 'json',
						root: 'categories'
					}
				}
			});
		}

		var catStore = xluerzer.catStore;

		this.store 			= catStore;
		this.displayField 	= 'label';
		this.valueField 	= 'value';
		this.queryMode 		= 'local';
		this.emptyText 		= "Choose a category ...";

		this.callParent(arguments);
	},

	afterRender: function() {
		xluerzer.catStore.load();
	}

});


Ext.define('Ext.xluerzer.xluerzer_submission_state', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_submission_state',

	trigger2Cls: 'x-form-clear-trigger',
	onTrigger2Click: function (args) {
		this.clearValue();
	},

	constructor: function(cfg)
	{

		if (cfg.xsearch)
		{
			this.trigger3Cls = 'x-form-search-trigger';
			this.onTrigger3Click = function (args) {
				this.up('form').xsubmit();
			}
		}
		var data = [{k:'0',v:'unkown'}, {k:'1',v:'Submitted'}, {k:'2',v:'Waiting for credits'}, {k:'3',v:'Not selected'}, {k:'4',v:'Preselected'}, {k:'5',v:'Selected'}, {k:'6',v:'Error / No image'}, {k:'7',v:'Pending'}, {k:'8',v:'Withdrawn'}, {k:'9',v:'Published'}, {k:'10',v:'Unpublished'}];

		this.store = Ext.create('Ext.data.Store', {
			fields: ['k', 'v'],
			data : data
		});

		this.queryMode = 'local';
		this.displayField =  'v';
		this.valueField = 'k';
		this.emptyText = 'Select state ...',
		this.callParent(arguments);
	}

});


Ext.define('Ext.xluerzer.xluerzer_reminder_state', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_reminder_state',
	trigger2Cls: 'x-form-clear-trigger',
	onTrigger2Click: function (args) {
		this.clearValue();
	},

	constructor: function(cfg)
	{

		if (cfg.xsearch)
		{
			this.trigger3Cls = 'x-form-search-trigger';
			this.onTrigger3Click = function (args) {
				this.up('form').xsubmit();
			}
		}
		var data = [{k:'0',v:'OPEN'}, {k:'1',v:'IN PROGRESS'}, {k:'2',v:'DONE'}, {k:'3',v:'CANCELLED'}];

		this.store = Ext.create('Ext.data.Store', {
			fields: ['k', 'v'],
			data : data
		});

		this.queryMode = 'local';
		this.displayField =  'v';
		this.valueField = 'k';
		this.emptyText = 'Select state ...',
		this.callParent(arguments);
	}

});


Ext.define('Ext.xluerzer.xluerzer_submission_artwork_state', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_submission_artwork_state',


	trigger2Cls: 'x-form-clear-trigger',
	onTrigger2Click: function (args) {
		this.clearValue();
	},

	constructor: function(cfg)
	{

		if (cfg.xsearch)
		{
			this.trigger3Cls = 'x-form-search-trigger';
			this.onTrigger3Click = function (args) {
				this.up('form').xsubmit();
			}
		}
		var data = [{k:'0',v:'Missing'},{k:'1',v:'Present'}];

		this.store = Ext.create('Ext.data.Store', {
			fields: ['k', 'v'],
			data : data
		});

		this.queryMode = 'local';
		this.displayField =  'v';
		this.valueField = 'k';

		this.emptyText = 'Select artwork-state ...',

		this.callParent(arguments);
	}

});

Ext.define('Ext.xluerzer.xluerzer_submission_ad_of_the_week', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_submission_ad_of_the_week',

	trigger2Cls: 'x-form-clear-trigger',
	onTrigger2Click: function (args) {
		this.clearValue();
	},

	constructor: function(cfg)
	{

		if (cfg.xsearch)
		{
			this.trigger3Cls = 'x-form-search-trigger';
			this.onTrigger3Click = function (args) {
				this.up('form').xsubmit();
			}
		}
		var data = [{k:'0',v:'No'},{k:'1',v:'Print Ad of the week'},{k:'2',v:'Spot of the week'},{k:'3',v:'Classic Spot of the week'}];

		this.store = Ext.create('Ext.data.Store', {
			fields: ['k', 'v'],
			data : data
		});

		this.queryMode = 'local';
		this.displayField =  'v';
		this.valueField = 'k';

		this.emptyText = 'Select ad-of-the-week state ...',

		this.callParent(arguments);
	}

});


Ext.define('Ext.xluerzer.xluerzer_submission_credits_state', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_submission_credits_state',


	trigger2Cls: 'x-form-clear-trigger',
	onTrigger2Click: function (args) {
		this.clearValue();
	},

	constructor: function(cfg)
	{

		if (cfg.xsearch)
		{
			this.trigger3Cls = 'x-form-search-trigger';
			this.onTrigger3Click = function (args) {
				this.up('form').xsubmit();
			}
		}
		var data = [{k:'0',v:'Missing'},{k:'1',v:'Present'}];

		this.store = Ext.create('Ext.data.Store', {
			fields: ['k', 'v'],
			data : data
		});

		this.queryMode = 'local';
		this.displayField =  'v';
		this.valueField = 'k';

		this.emptyText = 'Select credits-state ...',

		this.callParent(arguments);
	}


});



Ext.define('Ext.xluerzer.xluerzer_contact_type_company_or_person', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_contact_type_company_or_person',


	trigger2Cls: 'x-form-clear-trigger',
	onTrigger2Click: function (args) {
		this.clearValue();
	},

	constructor: function(cfg)
	{

		if (cfg.xsearch)
		{
			this.trigger3Cls = 'x-form-search-trigger';
			this.onTrigger3Click = function (args) {
				this.up('form').xsubmit();
			}
		}

		var data = [{k:'0',v:'Company'},{k:'1',v:'Person'}];

		this.store = Ext.create('Ext.data.Store', {
			fields: ['k', 'v'],
			data : data
		});

		this.queryMode = 'local';
		this.displayField =  'v';
		this.valueField = 'k';

		this.emptyText = 'Company or Person ...',

		this.callParent(arguments);
	}


});








Ext.define('Ext.xluerzer.xluerzer_submission_type', {
	extend: 'Ext.form.field.ComboBox',
	alias: 'widget.xluerzer_submission_type',

	trigger2Cls: 'x-form-clear-trigger',
	onTrigger2Click: function (args) {
		this.clearValue();
	},

	constructor: function(cfg)
	{

		if (cfg.xsearch)
		{
			this.trigger3Cls = 'x-form-search-trigger';
			this.onTrigger3Click = function (args) {
				this.up('form').xsubmit();
			}
		}
		var data = [{k:'1',v:'Magazin-Print'},{k:'12',v:'Magazin-TV'},{k:'-10',v:'Specials'}];

		this.store = Ext.create('Ext.data.Store', {
			fields: ['k', 'v'],
			data : data
		});

		this.queryMode = 'local';
		this.displayField =  'v';
		this.valueField = 'k';

		this.emptyText = 'Print/TV/Specials',

		this.callParent(arguments);
	}

});

