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

	tabIdCache: {},

	getToken: function(gui)
	{
		var human = gui.title;
		this.tabIdCache[human] = gui.id;
		return human;
	},

	getCmpByToken: function(human)
	{
		console.info('getCmpByToken',this.tabIdCache);
		return Ext.getCmp(this.tabIdCache[human]);
	},

	showContent: function(gui) {
		gui.closable = true;

		
		var t = gui.title;
		if (!this.tabCache) this.tabCache = {};

		if (!this.tabCache[t]) {
			this.tabCache[t] = this.masterTab.add(gui);
		} else {
			if (!Ext.getCmp(this.tabCache[t].id)) {
				console.info(t,this.tabCache[t],'not in cache ....');
				this.tabCache[t] = this.masterTab.add(gui);
			}
		}

		var tab = this.tabCache[t];
		tab.show();

		tab.on('close',function(){
			console.info('close',t);
			this.tabCache[t] = false;
		},this);

	},

	showDesktop: function() {

		var me = this;
		this.masterTab = Ext.create('Ext.tab.Panel', {
			region: 'center',
			scope: this,
			items: [this.tab_welcome()],
			plugins: Ext.create('Ext.ux.TabCloseMenu'),
			listeners: {
				scope: this,

				tabchange: function(tabPanel, tab) {

					var newToken = this.getToken(tab);
					var oldToken = Ext.History.getToken();
					if (oldToken === null || oldToken.search(newToken) === -1) {
					}
					Ext.History.add(newToken);

				},


				afterrender: function() {
					
					
					this.showContent(this.tab_reminder());
					
					Ext.History.on('change', function(token) {
						var cmp = me.getCmpByToken.call(me,token);
						if (cmp)
						{
							cmp.show();
						}
					});
					
					this.doLastCommand();
					
				}

			}

		});
		
		var un = xredaktor.getInstance().getUsersName();
		
		var pdf_en = {xtype:'button',text:'Manual (EN)',height:55,widtx:50,handler:function(){window.open("/xgo/xplugs/xluerzer/docs/manual_backend_en.pdf");}};
		var pdf_de = {xtype:'button',text:'Manual (DE)',height:55,widtx:50,handler:function(){window.open("/xgo/xplugs/xluerzer/docs/manual_backend_de.pdf");}};
		
		var idxx = Ext.id();
		var up = 0;
		
		var week = {
			id: idxx,
			xtype: 'text',
			text: "Current Week: "+Ext.Date.format(new Date(),"W")+", Server Time: UTC +0"
		};
		
		setInterval(function(){
			up++;
			Ext.getCmp(idxx).setText("Current Week: "+Ext.Date.format(new Date(),"W")+", Server Time: UTC +0 (updated "+up+"x)");
			
		},10000);
		

		this.wb = Ext.widget({
			tbar: ['<div style="min-wdith: min-width: 120px; min-height: 65px;	margin-right: 60px;"><div class="logo"><img src="/archive/template/img/logo_neu.png" width="104" height="55" style="margin-top:5px"/></div></div>',week,'->',pdf_en,pdf_de,{xtype:'button',text:'<b>EXIT - '+un+'</b>',height:55,widtx:50,handler:function(){top.logoff();}}],
			xtype: 'panel',
			region: 'center',
			layout: 'fit',
			items: [this.masterTab]
		});

		this.wb.on('afterrender',function() {

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
			button_del:false,
			button_add:false,
			search: true,
			pager: true,
			xstore: {
				initSort: '[{"property":"ecr_date","direction":"DESC"}]',
				load: 	this.getAjaxPath('e_reminder_by_user_id/load'),
				pid: 	'ecr_id',
				fields: [
				{name:'ecr_id', 				text:'ID', 				type: 'int', width: 60},
				{name:'ecr_contact_id_human', 	text:'Contact', 		type: 'string'},
				{name:'ecr_contact_id', 		text:'Contact ID', 		type: 'string', width: 60},
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
				itemdblclick: function(g,record) {
					xluerzer_contacts_detail.getInstance().open(record.data.ecr_contact_id);
				}
			}
		});

		reminder.on('afterrender',function(){
			reminder.getStore().load();
		},this);

		return reminder;
	},


	

	callFn: function(obj)
	{
		if (!obj) 			return;
		if (!obj.classx) 	return;
		if (!obj.fn) 		return;

		this.saveLastCommand(obj);
		this.executeFn(obj);
	},

	executeFn: function(obj)
	{

		if (!obj) 			return;
		if (!obj.classx) 	return;
		if (!obj.fn) 		return;

		var classx 	= ''+obj.classx;
		var fn 		= ''+obj.fn;

		if (window[classx])
		{

			if (fn != 'false')
			{
				if (window[classx])
				{
					try{

						if ((obj.param_0) && (obj.param_1))
						{
							window[classx].getInstance()[fn](obj.param_0,obj.param_1);
						}
						else if (obj.param_0)
						{
							window[classx].getInstance()[fn](obj.param_0);
						} else {
							window[classx].getInstance()[fn]();
						}

						xframe.setAppTitle(obj.title);

					} catch(e)
					{
						console.error("Cannot open ",classx,fn);
						//console.error("Class",window[classx]);
						//console.error("Class II",window[classx].getInstance());
						//console.error("Class III",window[classx].getInstance()[fn]);
						console.error(e.message);
						console.error(e.stack);
					}
				}
			} else
			{
				this.defaultClassHandler(classx);
			}
		}
	},

	saveLastCommand: function(oobj)
	{
		var obj = {
			text: ''+oobj.text,
			title: ''+oobj.title,
			classx: ''+oobj.classx,
			fn: ''+oobj.fn,
			param_0: ''+oobj.param_0,
			param_1: ''+oobj.param_1,
		};

		//console.info("Save Last Command",oobj);

		Ext.util.Cookies.set('lastLuerzerCmd', Ext.encode(obj));
	},

	doLastCommand: function()
	{
		var obj	= Ext.decode(Ext.util.Cookies.get('lastLuerzerCmd'),true);

		//console.info("Do Last Command",obj);

		if (!obj) return;

		if (typeof obj 				== 'undefined') return;
		if (typeof obj['classx'] 	== 'undefined') return;
		if (typeof obj['fn'] 		== 'undefined') return;

		if ((!obj.classx) || (!obj.fn))
		{
			return;
		}

		Ext.defer(function(){
			this.executeFn(obj);
		},200,this);

	},


	defaultMenuHandler: function(obj) {

		if (!obj.handler)
		{
			obj.scope = this;
			obj.handler = function() {
				this.callFn(obj);
			}
		}
		return obj;
	},

	tab_welcome: function() {


		var menus = xluerzer_menu.getInstance().getMenues();
		var items = [];

		Ext.iterate(menus,function(k,v) {

			var items2 = [];

			Ext.each(v,function(obj){

				if (obj == '-') {

					items2.push({
						xtype:'text',
						text: '',
						cls: 'spacer'
					});

					return;
				}

				if (typeof obj == 'string')
				{

					items2.push({
						xtype:'panel',
						html: "<b>"+obj+"</b>",
						cls: 'spacer',
						border: false
					});

					return;
				}

				items2.push(this.defaultMenuHandler(obj));

			},this);

			var col = {
				xtype: 'panel',
				title: ''+k,
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
				items: items2
			};


			items.push(col);


		},this);

		var gui = {
			title: 'Welcome',
			closable: false,
			autoScroll: true,
			anchor: '100%',
			layout:'column',
			bodyStyle:'padding:40px 5px 0',

			items: items,
			tbar: [{
				text: 'Open Reminder',
				scope: this,
				handler: function()
				{
					this.showContent(this.tab_reminder());
				}
			}],

			listeners: {

				scope: this,
				buffer: 1,
				afterrender: function() {
					
				}

			}

		};

		xframe.setAppTitle("Lürzers Archive Administration");

		return gui;
	}
}
