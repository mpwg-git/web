var xluerzer = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xluerzer";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xluerzer_(config);
			}
			return instance;
		}
	}
})();

var xluerzer_ = function(config) {
	this.config = config || {};
};

xluerzer_.prototype = {

	getAjaxPath : function(suffix)
	{
		return '/xgo/xplugs/xluerzer/ajax/'+suffix;
	},

	showContent: function(gui) {
		gui.closable = true;
		this.masterTab.add(gui).show();
	},

	showDesktop: function() {
		
	},
	/*
	showDesktop2 : function() {

		this.masterTab = Ext.create('Ext.tab.Panel', {
			region: 'center',
			scope: this,
			cls: 'luerzer',
			items: [],
			items2: [this.tab_welcome(),this.tab_reminder()]
		});

		this.wb = Ext.widget({
			tbar: [

			'<div style="min-wdith: min-width: 120px; min-height: 65px;	margin-right: 60px;"><div class="logo"><img src="/xgo/xplugs/xluerzer/media/img/logo.png" width="120" height="65" /></div></div>',

			{
				text:'Online Editorial',
				margin: '0 20 0 0',
				scope: this,

				menu: {
					cls: 'luerzer',
					items: [],
					items2: xluerzer_oe.getInstance().getMenu()
				}
			},

			/*{
			text:'Editorial',
			margin: '0 20 0 0',
			scope: this,

			menu: {
			cls: 'luerzer',
			items: this.getMenuE()
			}
			},

			{
			text:'Admin',
			margin: '0 20 0 0',
			scope: this,

			menu: {
			cls: 'luerzer',
			items: this.getMenuAdmin()
			}
			},

			{
			text:'Stats',
			margin: '0 20 0 0',
			scope: this,

			menu: {
			cls: 'luerzer',
			items: this.getMenuStats()
			}
			},

			* / 

			{
				text:'Help',
				idx: -1
			},

			{
				text: '<b>Exit</b>',
				handler: function() {
					top.logoff();
				}
			}
			],

			xtype: 'panel',
			region: 'center',
			layout: 'fit',
			items: [this.masterTab]
		});

		this.wb.on('afterrender',function(){
			// this.openSubmissionsDay('2014-04-04')
			// this.searchSubmission();
			// this.showSubmission(239185);
			// this.showBlogpost(16);
		},this,{buffer:10});

		var viewport = Ext.create('Ext.Viewport', {
			layout: {
				type: 'border'
			},
			defaults: {
				split: true
			},
			items: [this.wb]
		});
	},

	*/
	
	
	######################################################################
	############ DEFAULT TABS
	############
	############

	tab_reminder: function() {
		var tasks = xframe_pattern.getInstance().genGrid({
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
				load: 	this.getAjaxPath('a_tasks/load/'+id),
				pid: 	'ecr_id',
				fields: [
				{name:'created', 		text:'Ceated', 			type: 'timestamp'},
				{name:'dueDate', 		text:'Due Date', 		type: 'timestamp'},
				{name:'assignedTo', 	text:'Assigned to', 	type: 'string'},
				{name:'assignedFrom', 	text:'Assigned from', 	type: 'string'},
				{name:'summary', 		text:'Summary', 		type: 'string'},
				{name:'priority', 		text:'Priority', 		type: 'int'},
				{name:'status', 		text:'Status', 			type: 'string'}
				],
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {}
			}
		});

		tasks.on('afterrender',function(){
			tasks.getStore().load();
		},this);
	},


	tab_welcome: function() {

		var gui = {
			title: 'Welcome',
			closable: false,

			anchor: '100%',
			layout:'column',
			bodyStyle:'padding:40px 5px 0',

			items:[

			{
				xtype: 'panel',
				title: 'Online Editorial',
				columnWidth:.2,
				layout: 'anchor',
				margin: '0, 20, 0, 0',
				border: false,

				defaults: {
					anchor: '100%',
					padding: '6px 5px',
					margin: '10px 0 0 0'
				},
				defaultType: 'button',
				items: xluerzer_oe.getInstance().getMenu()
			},
			/*
			{
			xtype: 'panel',
			title: 'Editorial',
			margin: '0, 20, 0, 0',
			columnWidth:.2,
			layout: 'anchor',
			border: false,

			defaults: {
			anchor: '100%',
			padding: '6px 5px',
			margin: '10px 0 0 0'
			},
			defaultType: 'button',
			items: this.getMenuE()
			},

			{
			xtype: 'panel',
			title: 'Admin',
			margin: '0, 20, 0, 0',
			columnWidth:.2,
			layout: 'anchor',
			border: false,

			defaults: {
			anchor: '100%',
			padding: '6px 5px',
			margin: '10px 0 0 0'
			},
			defaultType: 'button',
			items: this.getMenuAdmin()
			},

			{
			xtype: 'panel',
			title: 'Today\'s Submissions',
			columnWidth:.2,
			layout: 'anchor',
			border: false,
			defaults: {
			anchor: '100%',
			padding: '6px 5px',
			margin: '10px 0 0 0',
			border: false,
			},
			defaultType: 'container',
			items: this.getExampleToday()
			},

			{
			xtype: 'panel',
			title: 'Recent changed Profiles',
			columnWidth:.2,
			layout: 'anchor',
			border: false,
			defaults: {
			anchor: '100%',
			padding: '6px 5px',
			margin: '10px 0 0 0',
			border: false,
			},
			defaultType: 'container',
			items: this.getExampleTodayProfiles()
			}
			*/
			]
		};

		return gui;
	},

	getExampleToday: function() {

		var items = [

		{
			html: '<b>Title</b><br /><br />Go to submission',
			cls: 'auxSubm1',
		},

		{
			html: '<b>Title</b><br /><br />Go to submission',
			cls: 'auxSubm2',
		},

		{
			html: '<b>Title</b><br /><br />Go to submission',
			cls: 'auxSubm3',
		},

		{
			html: '<b>Title</b><br /><br />Go to submission',
			cls: 'auxSubm2',
		},

		{
			html: '<b>Title</b><br /><br />Go to submission',
			cls: 'auxSubm1',
		}

		];

		return items;
	},


	getExampleTodayProfiles: function() {

		var items = [

		{
			html: '<b>Andreas Meades </b><br /><br />Go to profile',
		},

		{
			html: '<b>Tessa Traeger</b><br /><br />Go to profile',
		},

		{
			html: '<b>Andreas Meades </b><br /><br />Go to profile',
		},

		{
			html: '<b>Tessa Traeger</b><br /><br />Go to profile',
		}

		];

		return items;
	}

}
