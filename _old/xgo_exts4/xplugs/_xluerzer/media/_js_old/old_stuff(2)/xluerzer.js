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

		var t = gui.title;
		if (!this.tabCache) this.tabCache = {};

		if (!this.tabCache[t]) {
			this.tabCache[t] = this.masterTab.add(gui);
		} else {
			if (!Ext.getCmp(this.tabCache[t].id)) {
				this.tabCache[t] = this.masterTab.add(gui);
			}
		}

		var tab = this.tabCache[t];
		tab.show();
	},

	showDesktop: function() {

		this.masterTab = Ext.create('Ext.tab.Panel', {
			region: 'center',
			scope: this,
			items: [this.tab_welcome(),this.tab_reminder()]
		});

		this.wb = Ext.widget({
			tbar: ['<div style="min-wdith: min-width: 120px; min-height: 65px;	margin-right: 60px;"><div class="logo"><img src="/xgo/xplugs/xluerzer/media/img/logo.png" width="120" height="65" /></div></div>'
			,{
				text:'Online Editorial',
				margin: '0 20 0 0',
				scope: this,
				menu: {
					cls: 'luerzer',
					items: xluerzer_oe.getInstance().getMenu()
				}
			},{
				text:'Admin',
				margin: '0 20 0 0',
				scope: this,
				menu: {
					cls: 'luerzer',
					items: xluerzer_admin.getInstance().getMenu()
				}
			},{
				text:'Stats',
				margin: '0 20 0 0',
				scope: this,
				menu: {
					cls: 'luerzer',
					items: xluerzer_stats.getInstance().getMenu()
				}
			},{
				text:'Open Voting',
				handler: function() {
					window.open('/voting/','VOTING');
				}
			},{
				text:'Help'
			},{
				text: '<b>Exit</b>',
				handler: function() {
					top.logoff();
				}
			}],
			xtype: 'panel',
			region: 'center',
			layout: 'fit',
			items: [this.masterTab]
		});

		this.wb.on('afterrender',function(){

			// this.openSubmissionsDay('2014-04-04')
			// this.searchSubmission();
			
			 xluerzer_submissions.getInstance().show(232618);
			
			 xluerzer_contacts.getInstance().show(187860);
			// this.showBlogpost(16);

			/*
			xluerzer_oe.getInstance().default_recordInterface({
			data: {oetw_id: 259}
			},{
			handler: this.default_recordInterface,
			scope: this,
			at_id: 1,
			pid: 	'oetw_id',
			prefix: 'oetw_',
			title: 'This Week',
			scopex: 'oe_thisweek'
			});
			*/

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

	tab_reminder: function() {

		var reminder = xframe_pattern.getInstance().genGrid({
			title: 'Reminder',
			closable: true,
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
				initSort: '[{"property":"ecr_date","direction":"DESC"}]',
				load: 	this.getAjaxPath('e_reminder/load'),
				pid: 	'ecr_id',
				fields: [
				{name:'ecr_contact_id_human', 	text:'Contact', 		type: 'string'},
				{name:'ecr_state', 				text:'State', 			type: 'string'},
				{name:'ecr_date', 				text:'Due Date', 		type: 'string'},
				{name:'ecr_time',	 			text:'Due Time', 		type: 'string'},
				{name:'ecr_notes', 				text:'Notes', 			type: 'string'},
				{name:'ecr_created_by',			text:'Creator', 		type: 'string'},
				{name:'ecr_modified_by',		text:'Modified By', 	type: 'string'}
				],
			},
			listeners: {
				scope: this,
				buffer: 1,
				itemdblclick: function(g,record) {}
			}
		});

		reminder.on('afterrender',function(){
			reminder.getStore().load();
		},this);

		return reminder;
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
				items: xluerzer_e.getInstance().getMenu()
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
				items: xluerzer_admin.getInstance().getMenu()
			},

			/*
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
}
