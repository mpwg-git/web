var xredaktor = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xredaktor";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xredaktor_(config);
			}
			return instance;
		}
	}
})();

var xredaktor_ = function(config) {
	this.config = config || {};
};

xredaktor_.prototype = {

	getUsersEMail : function()
	{
		return this.masterCfg.user.wz_u_email;
	},

	getUsersName: function()
	{
		return this.masterCfg.user.wz_u_username;
	},

	getMasterCfg: function()
	{
		return this.masterCfg;
	},

	switchContent : function(el)
	{
		this.centerPanel.removeAll();
		this.centerPanel.add(el);
		this.centerPanel.doLayout();
	},

	selectWizard : function(x,r)
	{

		var me = this;
		var a_id = r[0].data.a_id;
		xframe.setAppTitle('IP: '+ r[0].data.a_name.capitalize());
		var myMask = new Ext.LoadMask({msg:"Ansicht wird erstellt...",target:this.centerPanel});
		myMask.show();

		setTimeout(function(){
			xredaktor_infoPool.getInstance().getDefaultWizardView(a_id,me.centerPanel,r[0].data.a_name.capitalize(),myMask);
		},10);
	},

	selectWizardById : function(a_id,a_name,extraConfig)
	{
		if (typeof extraConfig == "undefined") extraConfig = {};

		var me = this;

		xframe.setAppTitle(a_name);
		var myMask = new Ext.LoadMask({msg:"Ansicht wird erstellt...",target:this.centerPanel});
		myMask.show();

		setTimeout(function(){
			xredaktor_infoPool.getInstance().getDefaultWizardView(a_id,me.centerPanel,a_name,myMask,extraConfig);
		},10);
	},

	openWelcome : function()
	{

		var wPanel = Ext.create('Ext.Panel',{
			html:''
		});
		this.switchContent(wPanel);
		return;

		xframe.ajax({
			scope:this,
			url: "/xgo/xplugs/xredaktor/ajax/render/vpage",
			params : {
				p_vid: 101
			},
			stateless: function(success,json)
			{
				try{
					var wPanel = Ext.create('Ext.Panel',{
						html:json.html
					});
					wPanel.on('afterrender',this.fillWelcome,this,{delay:10})
					this.switchContent(wPanel);
				} catch(e) {console.info(e);}
			}
		});

	},

	openTimeMachine:function() {
		this.setLastCommand('xredaktor','openTimeMachine');
		xframe.setAppTitle('Timemachine');
		this.switchContent(xredaktor_timemachine.getInstance().getMainPanel());
	},

	openPages: function()
	{
		this.setLastCommand('xredaktor','openPages');
		xframe.setAppTitle('Seiten');
		this.switchContent(xredaktor_pages.getInstance().getMainPanel(this.getCurrentSiteId()));
	},

	openAtoms: function()
	{
		this.setLastCommand('xredaktor','openAtoms');
		xframe.setAppTitle('Bausteine');
		this.switchContent(xredaktor_atoms.getInstance().getMainPanel('ATOM',this.getCurrentSiteId()));
	},

	openFrames: function()
	{
		this.setLastCommand('xredaktor','openFrames');
		xframe.setAppTitle('Seitenelemente');
		this.switchContent(xredaktor_atoms.getInstance().getMainPanel('FRAME',this.getCurrentSiteId()));
	},

	openWizards: function()
	{
		this.setLastCommand('xredaktor','openWizards');
		xframe.setAppTitle('Wizards');
		this.switchContent(xredaktor_atoms.getInstance().getMainPanel('WIZARD',this.getCurrentSiteId()));
	},

	openFeTranslation: function()
	{
		this.setLastCommand('xredaktor','openFeTranslation');
		xframe.setAppTitle('FE-Translation');
		this.switchContent(xredaktor_translation.getInstance().getMainPanel_FE());
	},

	openStorage: function()
	{
		this.setLastCommand('xredaktor','openStorage');
		xframe.setAppTitle('Filearchiv');
		this.switchContent(xredaktor_storage.getInstance().getMainPanel({
			mode: 'normal',
			s_storage_scope: this.getCurrentBasicStorage(),
			site_id: this.getCurrentSiteId()
		}));
	},

	openInfoPool: function(openFollowingWizard)
	{
		this.setLastCommand('xredaktor','openInfoPool');
		xframe.setAppTitle('Informationspool');
		this.switchContent(xredaktor_infoPool.getInstance().getMainPanel(this.getCurrentSiteId(),openFollowingWizard));
	},


	/***************************************************************************************************
	****************************************************************************************************/


	openLanguageManagement : function()
	{
		this.setLastCommand('xredaktor','openLanguageManagement');
		xframe.setAppTitle('Language Management');
		this.switchContent(xredaktor_manage_langs.getInstance().getMainPanel());
	},

	openSiteManagement : function()
	{
		this.setLastCommand('xredaktor','openSiteManagement');
		xframe.setAppTitle("Site's Management");
		this.switchContent(xredaktor_manage_sites.getInstance().getMainPanel());
	},

	openUrlManagement : function()
	{
		this.setLastCommand('xredaktor','openUrlManagement');
		xframe.setAppTitle("URL Management");
		this.switchContent(xredaktor_manage_urls.getInstance().getMainPanel());
	},


	openLinkManagement: function()
	{
		this.setLastCommand('xredaktor','openLinkManagement');
		xframe.setAppTitle('Nice-Url Management');
		this.switchContent(Ext.create('Ext.Panel',xredaktor_manage_niceurls.getInstance().getMainPanel()));
	},

	openBeUser: function()
	{
		this.setLastCommand('xredaktor','openBeUser');
		var me = this;
		xframe.setAppTitle('Backend Users Management');
		var myMask = new Ext.LoadMask({msg:"Ansicht wird erstellt...",target:this.centerPanel});
		myMask.show();
		setTimeout(function(){
			xredaktor_infoPool.getInstance().getDefaultWizardView(73,me.centerPanel,'Backend Users Management',myMask);
		},10);
	},

	openRoles: function()
	{
		xframe.setAppTitle('Rollen');
		this.switchContent(xredaktor_roles.getInstance().getMainPanel());
	},

	openUsers: function()
	{
		this.setLastCommand('xredaktor','openUsers');
		xframe.setAppTitle('Benutzer');
		this.switchContent(xredaktor_users.getInstance().getMainPanel());
	},

	openUsersLogs: function()
	{
		xframe.setAppTitle('Benutzer Logs');
		this.switchContent(xredaktor_log.getInstance().getMainPanel());
	},


	/********************************************************************************************/
	/* SETTINGS & CORE CALLS */


	open_SYS_STORAGES : function()
	{
		this.setLastCommand('xredaktor','open_SYS_STORAGES');
		xframe.setAppTitle('System Storages');
		this.switchContent(xredaktor_manage_storage.getInstance().getMainPanel());
	},

	open_SYS_LANGUAGES: function()
	{
		this.setLastCommand('xredaktor','open_SYS_LANGUAGES');
		xframe.setAppTitle('SYS-Translations');
		this.switchContent(xredaktor_manage_langs.getInstance().getMainPanel());
	},


	open_SYS_TRANSLATIONS: function()
	{
		this.setLastCommand('xredaktor','open_SYS_TRANSLATIONS');
		xframe.setAppTitle('SYS-Translations');
		this.switchContent(xredaktor_translation.getInstance().getMainPanel_BE());
	},

	open_SYS_FACES: function()
	{
		this.setLastCommand('xredaktor','open_SYS_FACES');
		xframe.setAppTitle('Faces');
		this.switchContent(xredaktor_manage_faces.getInstance().getMainPanel());
	},

	/*

	##########################################################################################
	##########################################################################################
	##########################################################################################
	##########################################################################################
	##########################################################################################

	*/

	open_SYS_ATOMS : function()
	{
		this.setLastCommand('xredaktor','open_SYS_ATOMS');
		xframe.setAppTitle('CORE::Atoms');
		this.switchContent(xredaktor_atoms.getInstance().getMainPanel('ATOM',0));
	},

	open_SYS_FRAMES: function()
	{
		this.setLastCommand('xredaktor','open_SYS_FRAMES');
		xframe.setAppTitle('CORE::Faces');
		this.switchContent(xredaktor_atoms.getInstance().getMainPanel('FRAME',0));
	},

	open_SYS_WIZARDS : function()
	{
		this.setLastCommand('xredaktor','open_SYS_WIZARDS');
		xframe.setAppTitle('CORE::Wizards');
		this.switchContent(xredaktor_atoms.getInstance().getMainPanel('WIZARD',0));
	},

	open_SYS_PAGES: function()
	{
		this.setLastCommand('xredaktor','open_SYS_PAGES');
		xframe.setAppTitle('CORE::Pages');
		this.switchContent(xredaktor_pages.getInstance().getMainPanel(0));
	},

	open_SYS_INFOPOOL : function()
	{
		this.setLastCommand('xredaktor','open_SYS_INFOPOOL');
		xframe.setAppTitle('CORE::Infopool');
		this.switchContent(xredaktor_infoPool.getInstance().getMainPanel(0));
	},

	/*

	################################################################################################################################
	################################################################################################################################
	################################################################################################################################
	################################################################################################################################
	################################################################################################################################
	################################################################################################################################
	################################################################################################################################
	################################################################################################################################
	################################################################################################################################
	################################################################################################################################
	################################################################################################################################
	################################################################################################################################
	################################################################################################################################

	*/

	openNL_emission: function()
	{
		this.setLastCommand('xredaktor','openNL_emission');
		xframe.setAppTitle('NL-Aussendungen');
		var g 	= xmarketing_emission.getInstance().getMainPanel(Ext.id());
		this.switchContent(g);
	},

	openNL_lists: function()
	{
		this.setLastCommand('xredaktor','openNL_lists');
		xframe.setAppTitle('NL-Listen');

		var g 	= xmarketing_lists.getInstance().getMainPanel(Ext.id());
		this.switchContent(g);
	},

	openNL_recipients: function()
	{
		this.setLastCommand('xredaktor','openNL_recipients');
		xframe.setAppTitle('NL-Empfänger');

		var g 	= xmarketing_recipients.getInstance().getMainPanel(Ext.id());
		this.switchContent(g);
	},

	openNL_config: function()
	{
		this.setLastCommand('xredaktor','openNL_config');
		xframe.setAppTitle('NL-Konfiguration');

		var g 	= xmarketing_config.getInstance().getMainPanel(Ext.id());
		this.switchContent(g);
	},



	/*

	################################################################################################################################
	################################################################################################################################
	################################################################################################################################
	################################################################################################################################
	################################################################################################################################
	################################################################################################################################
	################################################################################################################################
	################################################################################################################################
	################################################################################################################################
	################################################################################################################################
	################################################################################################################################
	################################################################################################################################
	################################################################################################################################

	*/


	getLanguageConfigFE: function(s_id)
	{
		if (s_id == 0)
		{
			return this.getLanguageConfigFE_ALL();
		}
		return this.masterCfg.langs_fe[s_id];
	},

	getLanguageConfigFE_ALL: function()
	{
		return this.masterCfg.langs_fe_all;
	},

	getLanguageConfigBE: function()
	{
		return this.masterCfg.langs_be;
	},

	getLBE: function()
	{
		return this.masterCfg.langs_be;
	},

	getLFE: function()
	{
		return this.getLanguageConfigFE(this.getCurrentSiteId());
	},

	getCurrentBElang : function()
	{
		return 'DE';
	},

	getCurrentBasicStorage : function()
	{
		return this.masterCfg.sites[this.getCurrentSiteId()]['s_s_storage_scope'];
	},

	getSites : function()
	{
		return this.masterCfg.sites;
	},

	getStoreBE : function()
	{
		var a = [];
		Ext.each(this.getLanguageConfigBE(),function(c){
			var tmp = [];
			tmp.push(c.bel_id);
			tmp.push(c.bel_name);
			a.push(tmp);
		},this);
		return a;
	},

	getStoreFE : function()
	{
		var langs= [];
		var langs_ = xredaktor.getInstance().getLanguageConfigFE(xredaktor.getInstance().getCurrentSiteId());

		Ext.each(langs_,function(l,i){
			if (l.fel_online == 'N') return;
			var tmp = [];
			tmp.push(l.fel_id);
			tmp.push(l.fel_name);
			langs.push(tmp);
		},this);

		return langs;
	},

	getStoreSITE : function()
	{
		var a = [];
		Ext.iterate(this.masterCfg.sites,function(s_id,site){
			var tmp = [];
			tmp.push(s_id);
			tmp.push(site.s_name);
			a.push(tmp);
		},this);

		if (this.userInGroup('ADMIN'))
		{
			a.push([0,'xCore']);
		}

		return a;
	},

	getCurrentSiteFeLangs : function()
	{
		var langs= [];
		var langs_ = xredaktor.getInstance().getLanguageConfigFE(xredaktor.getInstance().getCurrentSiteId());

		Ext.each(langs_,function(l,i){
			if (l.fel_online == 'N') return;
			langs.push(l);
		},this);

		return langs;
	},

	getCurrentSiteId : function()
	{
		if (typeof this.siteId == "undefined") this.siteId = this.masterCfg['init_site'];
		return this.siteId;
	},


	getCurrentRolesTags : function()
	{
		return this.masterCfg.roles_tags;
	},



	setCurrentSiteId : function(nid)
	{
		this.siteId = nid;
		return this.siteId;
	},

	loadAllConfigs : function(cb,cb_scope)
	{
		var me = this;
		xframe.ajax({
			scope: this,
			url: '/xgo/xplugs/xredaktor/ajax/fly/getConfig',
			success: function(json) {



				//me.siteId = 1;
				me.masterCfg = json.config;
				if ((typeof cb == 'function') && (cb_scope))
				{
					cb.call(cb_scope);
				}
			}
		});
	},

	setConfigData : function(cfg)
	{
		//this.siteId = 1;
		this.masterCfg = cfg;
	},

	/***************************************************************************************************
	****************************************************************************************************/

	getSiteSettingsById: function(s_id)
	{
		return this.masterCfg.sites[s_id];
	},

	refactoryMasterCfg : function()
	{
		this.groups = {};
		this.sites 	= {};

		Ext.each(this.masterCfg.user.groups,function(pack){
			if (pack.wz_n2n_check == "0") return;
			var name 			= pack.wz_bg_name;
			this.groups[name] 	= pack;
		},this);

		this.masterCfg.sites[0] = {s_id:0,s_name:'xRedaktor'};
	},

	userInGroup : function(gn)
	{
		if (typeof this.groups['ADMIN'] != 'undefined') return true;
		if (typeof this.groups[gn] == 'undefined') return false;
		return true;
	},


	guiConfig_getByKey : function (key)
	{
		if (this.masterCfg.user.wz_u_limit_mode == 'N') 		return true;
		if (this.masterCfg.user['wz_u_limits_'+key] == 'on') 	return true;
		return false;
	},


	getUserTools: function() {

		return this.makePluginFunctionButton('xredaktor',{
			classx: "xredaktor",
			text: ''+this.getUsersName()+" <b>abmelden</b>",
			glyph: '',
			iconCls:  'icon-user',
			handler: function() {

				top.logoff();

			}
		});

		var uTools = {

			scale: 'medium',
			iconAlign: 'top',
			scope:	this,
			width: 60,
			height: 60,
			text: 'Logoff '+this.getUsersName(),
			glyph: '',
			iconCls:  'icon-user',
			//iconCls: Ext.isIE ? 'entypoBtnBarTopIE' : 'entypoBtnBarTop',
			style: {
				color: '#6F6F6F'
			},
			scope: this
		};

		return uTools;
	},


	setLastCommand: function(classx,fn)
	{
		Ext.util.Cookies.set('lastXRedakorFuncCall',	classx);
		Ext.util.Cookies.set('lastXRedakorFuncCallFn',	fn);
	},

	doLastCommand: function()
	{

		var classx 	= Ext.util.Cookies.get('lastXRedakorFuncCall');
		var fn 		= Ext.util.Cookies.get('lastXRedakorFuncCallFn');

		if (window[classx])
		{

			if (fn != 'false')
			{
				if (window[classx])
				{
					try{
						window[classx].getInstance()[fn]();
					} catch(e)
					{
						console.error("Cannot open ",classx,'!!!!!!!!!',fn);
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

	workingBenchLoaded : function()
	{
		console.info('Hi, nice to see you again ...');
		console.info('MasterCfg:', this.masterCfg);



		// INIT Project Switcher
		this.defaultProjectSwitch(this.getCurrentSiteId());

		// DO LAST FUNC CALL !!

	},

	defaultProjectSwitch: function(s_id)
	{
		var site 		= this.getSiteSettingsById(s_id);
		var site_name 	= site.s_name;
		this.btn_projects.setText('Projekt: <b>'+site_name+'</b>');

		this.siteId = s_id;

		this.doLastCommand();
	},

	getProjectSwitcherButton : function()
	{
		var projects = [];
		Ext.iterate(this.getSites(),function(s_id,site) {
			if (s_id == 0) return;
			projects.push({
				glyph: '59234@FontEntype',
				iconCls: 'entypoSmall',
				text: site.s_name + " [" + site.s_id + "]",
				scope:	this,
				handler: function()
				{
					this.defaultProjectSwitch(site.s_id);
				}
			});
		},this);

		if (this.isAdmin())
		{
			projects.push('-');
			projects.push({
				glyph: '9734@FontEntype',
				iconCls: 'entypoSmall',
				text: 'xRedaktor [0]',
				scope:	this,
				handler: function()
				{
					this.defaultProjectSwitch(0);
				}
			});
		}

		var bg_projects = {

			scale: 'large',
			iconAlign: 'top',
			scope:	this,
			minWidth: 70,
			text: 'Projekte',
			glyph: '',
			iconCls: 'icon-shuffle',
			style: {
				color: '#6F6F6F'
			},
			scope: this,
			menu: projects
		};

		this.btn_projects = Ext.create('Ext.button.Button',bg_projects);

		return this.btn_projects;
	},




	defaultClassHandler: function(classx, btn) {
		this.setLastCommand(classx,false);

		if (typeof btn == 'undefined') btn = false;

		if (btn)
		{
			var title = btn.text;
			xframe.setAppTitle(title);
		}

		var obj = window[classx];
		this.switchContent(obj.getInstance().getMainPanel(this.getCurrentSiteId()));

	},

	getSettingsButton: function() {

		var uTools = {

			scale: 'large',
			iconAlign: 'top',
			scope:	this,
			//width: 70,
			//height: 60,
			text: 'Einstellungen',
			glyph: '',
			iconCls:  'icon-light-bulb',
			//iconCls: Ext.isIE ? 'entypoBtnBarTopIE' : 'entypoBtnBarTop',
			style: {
				color: '#6F6F6F'
			},
			scope: this,
			menu:[
			{
				glyph: '128360@FontEntype',
				iconCls: 'entypoSmall',
				text: 'Projekte',
				scope:	this,
				handler: function(btn)
				{
					this.openSiteManagement();
				}
			}/*,{
			glyph: '128340@FontEntype',
			iconCls: 'entypoSmall',
			text: 'Timemachine-Items',
			scope:	this,
			handler: function()
			{

			}
			},/*'-',{
			glyph: '57349@FontEntype',
			iconCls: 'entypoSmall',
			text: 'Vanity-URLs',
			scope:	this,
			handler:function()
			{

			}
			},{
			glyph: '57347@FontEntype',
			iconCls: 'entypoSmall',
			text: 'Static-URLs',
			scope:	this,
			handler:function()
			{

			}
			}*/,'-',{
			glyph: '128193@FontEntype',
			iconCls: 'entypoSmall',
			text: 'System-Storages',
			scope:	this,
			handler:function()
			{
				this.open_SYS_STORAGES();
			}
			},{
				glyph: '127892@FontEntype',
				iconCls: 'entypoSmall',
				text: 'System-Sprachen',
				scope:	this,
				handler:function()
				{
					this.open_SYS_LANGUAGES();
				}
			},{
				glyph: '128362@FontEntype',
				iconCls: 'entypoSmall',
				text: 'System-Faces',
				scope:	this,
				handler:function()
				{
					this.open_SYS_FACES();
				}
			},'-',{
				glyph: '128267@FontEntype',
				iconCls: 'entypoSmall',
				text: 'Cache',
				scope:	this,
				menu: [{
					glyph: '9888@FontEntype',
					iconCls: 'entypoSmall',
					text: 'Clean All',
					scope:	this,
					handler:function()
					{
						xframe.callAndWait({
							title: 'please wait',
							url: '/xgo/xplugs/xredaktor/ajax/patcher/cache_clean',
						});
					}
				},'-',{
					glyph: '9888@FontEntype',
					iconCls: 'entypoSmall',
					text: 'Clean xCore/Temp',
					scope:	this,
					handler:function()
					{
						xframe.callAndWait({
							title: 'please wait',
							url: '/xgo/xplugs/xredaktor/ajax/patcher/cache_clean_xcore',
						});
					}
				},{
					glyph: '9888@FontEntype',
					iconCls: 'entypoSmall',
					text: 'Clean Atom Cache',
					scope:	this,
					handler:function()
					{
						xframe.callAndWait({
							title: 'please wait',
							url: '/xgo/xplugs/xredaktor/ajax/patcher/cache_clean_atoms',
						});
					}
				},{
					glyph: '9888@FontEntype',
					iconCls: 'entypoSmall',
					text: 'Clean Image Cache',
					scope:	this,
					handler:function()
					{
						xframe.callAndWait({
							title: 'please wait',
							url: '/xgo/xplugs/xredaktor/ajax/patcher/cache_clean_images',
						});
					}
				}]
			},'-',{
				glyph: '128248@FontEntype',
				iconCls: 'entypoSmall',
				text: 'Database',
				scope:	this,
				menu: [{
					glyph: '59157@FontEntype',
					iconCls: 'entypoSmall',
					text: 'DBX',
					scope:	this,
					handler:function()
					{
						window.open('/xgo/xcore/libs/dbx');
					}
				},'-',{
					glyph: '9888@FontEntype',
					iconCls: 'entypoSmall',
					text: 'Re-Sync System/Wizards Languages',
					scope:	this,
					handler:function()
					{
						xframe.callAndWait({
							title: 'please wait',
							url: '/xgo/xplugs/xredaktor/ajax/patcher/rsync_db_inc_langs',
						});
					}
				}]
			},'-',{
				glyph: '9734@FontEntype',
				iconCls: 'entypoSmall',
				text: 'xRedaktor',
				scope:	this,
				menu: [{
					glyph: '128196@FontEntype',
					iconCls: 'entypoSmall',
					text: 'SYS-Frames',
					scope:	this,
					handler:function()
					{
						this.open_SYS_FRAMES();
					}
				},{
					glyph: '59185@FontEntype',
					iconCls: 'entypoSmall',
					text: 'SYS-Atoms',
					scope:	this,
					handler:function()
					{
						this.open_SYS_ATOMS();
					}
				},{
					glyph: '128640@FontEntype',
					iconCls: 'entypoSmall',
					text: 'SYS-Wizards',
					scope:	this,
					handler:function()
					{
						this.open_SYS_WIZARDS();
					}
				},'-',{
					glyph: '9776@FontEntype',
					iconCls: 'entypoSmall',
					text: 'SYS-Pages',
					scope:	this,
					handler:function()
					{
						this.open_SYS_PAGES();
					}
				},{
					glyph: '128213@FontEntype',
					iconCls: 'entypoSmall',
					text: 'SYS-Infopool',
					scope:	this,
					handler:function()
					{
						this.open_SYS_INFOPOOL();
					}
				},'-',{
					glyph: '128165@FontEntype',
					iconCls: 'entypoSmall',
					text: 'SYS-JS-Check',
					scope:	this,
					handler:function()
					{
						xframe.callAndWait({
							title: 'please wait',
							url: '/xgo/xplugs/xredaktor/ajax/checkSrc',
						});
					}
				},/*'-',{
				glyph: '127892@FontEntype',
				iconCls: 'entypoSmall',
				text: 'SYS-Übersetzungen',
				scope:	this,
				handler:function()
				{
				this.open_SYS_TRANSLATIONS();
				}
				},*/'-',{
				glyph: '128683@FontEntype',
				iconCls: 'entypoSmall',
				text: 'Patch',
				scope:	this,
				menu:[{
					glyph: '9888@FontEntype',
					iconCls: 'entypoSmall',
					text: 'Full Patch',
					scope:	this,
					handler:function()
					{

						xframe.callAndWait({
							title: 'please wait',
							url: '/xgo/xplugs/xredaktor/ajax/patcher/full',
						});


					}
				},'-',{
					glyph: '9888@FontEntype',
					iconCls: 'entypoSmall',
					text: 'Patching DB Structure',
					scope:	this,
					handler:function()
					{
						xframe.callAndWait({
							title: 'please wait',
							url: '/xgo/xplugs/xredaktor/ajax/patcher/db_patch',
						});

					}
				},{
					glyph: '9888@FontEntype',
					iconCls: 'entypoSmall',
					text: 'Sync-Wizards',
					scope:	this,
					handler:function()
					{
						xframe.callAndWait({
							title: 'please wait',
							url: '/xgo/xplugs/xredaktor/ajax/patcher/wz_sync',
						});



					}
				},{
					glyph: '9888@FontEntype',
					iconCls: 'entypoSmall',
					text: 'Repair-Storage',
					scope:	this,
					handler:function()
					{

						xframe.callAndWait({
							title: 'please wait',
							url: '/xgo/xplugs/xredaktor/ajax/patcher/storage_repair',
						});

					}
				},{
					glyph: '9888@FontEntype',
					iconCls: 'entypoSmall',
					text: 'Clean - Cache',
					scope:	this,
					handler:function()
					{

						xframe.callAndWait({
							title: 'please wait',
							url: '/xgo/xplugs/xredaktor/ajax/patcher/cache_clean',
						});

					}
				},{
					glyph: '9888@FontEntype',
					iconCls: 'entypoSmall',
					text: 'Clean - DB',
					scope:	this,
					handler:function()
					{
						xframe.callAndWait({
							title: 'please wait',
							url: '/xgo/xplugs/xredaktor/ajax/patcher/db_clean',
						});
					}
				}]
				}]
			}]
		};

		return uTools;
	},

	getLogOffButton : function()
	{


		return this.makePluginFunctionButton('xredaktor',{
			classx: "xredaktor",
			text: 'Abmelden',
			glyph: '',
			iconCls:  'icon-arrow-right',
			handler: function() {

				top.logoff();

			}
		});



		var logOffButton = {

			scale: 'medium',
			iconAlign: 'top',
			scope:	this,
			width: 60,
			height: 60,
			glyph: '',
			iconCls:  'icon-arrow-right',
			//iconCls: Ext.isIE ? 'entypoBtnBarTopIE' : 'entypoBtnBarTop',
			style: {
				color: '#6F6F6F'
			},
			text: 'Abmelden',
			scope: this,
			handler: function()
			{
				top.logoff();
			}
		};
		return logOffButton;
	},

	makePluginButton : function(btn,scale)
	{
		if (typeof scale == 'undefined') scale = 'medium';

		var cfgx = {

			//cls : Ext.isIE ? 'fixButtonIE' : '',

			xtype: 'button',
			scale: scale,
			iconAlign: 'top',
			scope:	this,
			glyph: btn.glyph,
			width: (scale == 'medium') ? '' : 70,
			iconCls: (scale == 'medium') ? 'entypoSmall' : 'entypoBtnBar',
			style: {
				color: '#6F6F6F'
			},
			text: btn.text
		};

		if (!btn.iconCls) btn.iconCls = "";
		if (btn.iconCls != "") {
			cfgx.glyph 		= "";
			cfgx.iconCls 	= btn.iconCls;
		}

		return cfgx;
	},




	isAdmin: function()
	{
		return (this.masterCfg.roles_user.flag_admin == 'Y');
	},

	getUserRolesTags: function()
	{
		return this.masterCfg.roles_user.tags;
	},

	getNavi : function()
	{

		var ru 				= this.masterCfg.roles_user;
		var isAdmin 		= (this.masterCfg.roles_user.flag_admin == 'Y');

		//isAdmin = false;

		var btn_fa 			= this.masterCfg.roles_user.tags.fa;
		var btn_infopool 	= this.masterCfg.roles_user.tags.infopool;
		var btn_pages 		= this.masterCfg.roles_user.tags.pages;
		var btn_atoms 		= this.masterCfg.roles_user.tags.atoms;
		var btn_frames		= this.masterCfg.roles_user.tags.frames;

		if (isAdmin)
		{
			btn_fa 			= true;
			btn_infopool 	= true;
			btn_pages 		= true;
			btn_atoms 		= true;
			btn_frames		= true;
		}

		var btn_wizards		= (isAdmin);
		var btn_roles		= (isAdmin);
		var btn_users		= (isAdmin);
		var btn_logs		= (isAdmin);

		var btns = [

		{
			classx: "xredaktor",
			fn: "openPages",
			glyph: "",
			group: false,
			gui: false,
			iconCls: "icon-list",
			text: 'Seiten',
			hidden: !btn_pages
		},
		{
			classx: "xredaktor",
			fn: "openStorage",
			glyph: "",
			group: false,
			gui: false,
			iconCls: "icon-folder",
			text: 'Filearchiv',
			hidden: !btn_fa
		},
		{
			classx: "xredaktor",
			fn: "openInfoPool",
			glyph: "",
			group: false,
			gui: false,
			iconCls: "icon-book",
			text: 'Infopool',
			hidden: !btn_infopool
		},'-',
		{
			glyph: "",
			group: false,
			gui: false,
			iconCls: "icon-docs",
			text: 'Newsletter',
			hidden: !btn_pages,
			items: [
			{
				classx: "xredaktor",
				fn: "openNL_emission",
				glyph: "59190@FontEntype",
				group: false,
				gui: false,
				iconCls: "",
				text: 'Aussendungen',
				hidden: !btn_pages,
			},
			{
				classx: "xredaktor",
				fn: "openNL_lists",
				glyph: "128214@FontEntype",
				group: false,
				gui: false,
				iconCls: "",
				text: 'Listen',
				hidden: !btn_frames
			},
			{
				classx: "xredaktor",
				fn: "openNL_recipients",
				glyph: "59392@FontEntype",
				group: false,
				gui: false,
				iconCls: "",
				text: 'Empfänger',
				hidden: !btn_atoms
			},
			{
				classx: "xredaktor",
				fn: "openNL_config",
				glyph: "9881@FontEntype",
				group: false,
				gui: false,
				iconCls: "",
				text: 'Konfiguration',
				hidden: !btn_wizards
			}]
		},
		{
			classx: "xredaktor",
			fn: "openTimeMachine",
			glyph: "",
			group: false,
			gui: false,
			iconCls: "icon-clock",
			text: 'Timemachine',
			hidden: !btn_logs
		},

		'-',
		{
			title: 'Entwicklung',
			gui: false,
			group: [
			{
				classx: "xredaktor",
				fn: "openFrames",
				glyph: "128196@FontEntype",
				group: false,
				gui: false,
				iconCls: "",
				text: 'Seitenelemente',
				hidden: !btn_frames
			},
			{
				classx: "xredaktor",
				fn: "openAtoms",
				glyph: "59185@FontEntype",
				group: false,
				gui: false,
				iconCls: "",
				text: 'Bausteine',
				hidden: !btn_atoms
			},
			{
				classx: "xredaktor",
				fn: "openWizards",
				glyph: "128640@FontEntype",
				group: false,
				gui: false,
				iconCls: "",
				text: 'Wizards',
				hidden: !btn_wizards
			},{
				classx: "xredaktor",
				fn: "openFeTranslation",
				glyph: "127892@FontEntype",
				group: false,
				gui: false,
				text: 'Übersetzungen',
				hidden: !btn_infopool
			}]
		},
		{
			classx: "xredaktor",
			fn: "openUsers",
			glyph: "icon-users",
			group: false,
			gui: false,
			iconCls: "icon-users",
			text: 'Benutzer',
			hidden: !btn_users
		}


		];

		return btns;
	},

	makePluginFunctionButton : function(classx,btn)
	{
		if (btn == "-") return btn;

		if (typeof btn['gui'] == 'undefined') 		btn.gui 	= false;
		if (typeof btn['group'] == 'undefined') 	btn.group 	= false;
		if (typeof btn['hidden'] == 'undefined') 	btn.hidden 	= false;

		if (btn.gui) {

			try {
				var cfgx = window[classx].getInstance()[btn.gui]();
				return cfgx;
			} catch (e) {
				xframe.alert('Plugin Fehler','Kann nicht '+classx+' // '+btn.gui+' öffnen !');
				console.info('Plugin Fehler',e);
				return '-';
			}
		}

		if (btn.group) {


			var cntx 	= btn.group.length;
			var columns = Math.ceil(cntx/2);

			var items 	= [];

			Ext.each(btn.group,function(b){

				var cf = this.makePluginFunctionButton(classx,b);

				cf.scale 		= 'small';
				cf.iconAlign 	= 'left';
				cf.iconCls 		= 'entypoSmallGroup';

				if (Ext.isIE)
				{
					//cf.iconCls 		= 'entypoSmallGroupIE';
				}

				items.push(cf);

			},this);

			var cfgx = {



				frame: false,
				border: false,
				overlay: true,
				xtype: 'buttongroup',
				columns: columns,
				defaults: {
					scale: 'small'
				},
				items: items
			};

			if (btn.title)
			{
				cfgx.title = btn.title;
			}

			return cfgx;
		}


		var cfgx = {

			//	cls : Ext.isIE ? 'fixButtonIE' : '',
			//	menu:btn.menu,
			hidden: btn.hidden,
			scale: 'large',
			iconAlign: 'top',
			scope:	this,
			glyph: btn.glyph,
			iconCls: btn.iconCls,
			style: {
				color: '#6F6F6F'
			},
			text: btn.text,
			scope:	this
		};



		cfgx.handler = function() {

			if (btn.handler) {
				btn.handler();
				return;
			}

			if (btn.fn == "") return;
			if (btn.classx == "") return;
			if (!window[btn.classx]) return;
			if (typeof window[btn.classx].getInstance != 'function') return;

			window[btn.classx].getInstance()[btn.fn]();
		}
		cfgx.scope = this;


		if (btn.items) {
			var itemsx = [];

			Ext.each(btn.items,function(t){
				var tx 		= this.makePluginFunctionButton(classx,t);
				itemsx.push(tx);
			},this);

			cfgx.menu = itemsx;
		}



		if (!btn.iconCls) btn.iconCls = "";
		if (btn.iconCls != "") {
			cfgx.glyph 		= "";
			cfgx.iconCls 	= btn.iconCls;
		}
		return cfgx;
	},

	getPluginButton : function()
	{
		var me = this;
		var menu = [];

		Ext.each(this.getNavi(),function(btn){
			menu.push(this.makePluginFunctionButton('xredaktor',btn));
		},this);

		return menu;
	},

	getNewWindowButton: function() {



		return this.makePluginFunctionButton('xredaktor',{
			classx: "xredaktor",
			text: 'Neues Fenster',
			glyph: '',
			iconCls:  'icon-export',
			handler: function() {

				window.open('/xGo','_blank');
			}
		});


		return {
			scale: 'large',
			iconAlign: 'top',
			scope:	this,
			text: 'Neues Fenster',
			glyph: '',
			iconCls:  'icon-export',
			//iconCls: Ext.isIE ? 'entypoBtnBarTopIE' : 'entypoBtnBarTop',
			style: {
				color: '#6F6F6F'
			},
			scope: this,
			handler: function() {
				window.open('/xGo','_blank');
			}
		}

	},

	getAboutButton: function() {


		/*


		{
		classx: "xredaktor",
		fn: "openWizards",
		glyph: "128640@FontEntype",
		group: false,
		gui: false,
		iconCls: "",
		text: 'Wizards',
		hidden: !btn_wizards
		}

		*/


		return this.makePluginFunctionButton('xredaktor',{
			classx: "xredaktor",
			text: 'Info',
			glyph: '',
			iconCls:  'icon-info',
			handler: function() {

				xframe.win({
					title:'Hallo!',
					width:500,
					height:350,
					items:{xtype:'panel',html:"<center><div id='infoSplashImage'></div></center><div class='loginSplashImageInlineTxt'>xgo & donefor.me ist ein Produkt der Firma Gitgo GmbH. Alle Rechte vorbehalten.<br>Einige Icons sind von Yusuke Kamiyamane oder Axialis Team. Alle Rechte vorbehalten.<br><br>Details unter <a href='http://www.gitgo.at' target='_blank'>http://www.gitgo.at</a></div>"}
				}).show();

			}
		});

		return {
			scale: 'large',
			iconAlign: 'top',
			scope:	this,
			text: 'Info',
			width: 60,
			height: 60,
			glyph: '',
			iconCls:  'icon-info',
			//iconCls: Ext.isIE ? 'entypoBtnBarTopIE' : 'entypoBtnBarTop',
			style: {
				color: '#6F6F6F'
			},
			scope: this,
			handler: function() {

				xframe.win({
					title:'Hallo!',
					width:500,
					height:350,
					items:{xtype:'panel',html:"<center><div id='infoSplashImage'></div></center><div class='loginSplashImageInlineTxt'>xgo & donefor.me ist ein Produkt der Firma Gitgo GmbH. Alle Rechte vorbehalten.<br>Einige Icons sind von Yusuke Kamiyamane oder Axialis Team. Alle Rechte vorbehalten.<br><br>Details unter <a href='http://www.gitgo.at' target='_blank'>http://www.gitgo.at</a></div>"}
				}).show();

			}
		}

	},

	getTopToolbar : function() {

		var topBar 		= ['<div id="workbenchStartTopBarLogo"></div>'];


		var btns = this.getPluginButton();

		Ext.each(btns,function(btn){

			topBar.push(btn);

		},this);



		topBar.push('-',this.getSettingsButton(),this.getProjectSwitcherButton(),'->',this.getNewWindowButton(),this.getAboutButton(),this.getUserTools()/*,this.getLogOffButton()*/);
		return topBar;
	},

	showDesktop : function(cfg)
	{
		Ext.History.init();

		Ext.state.Manager.setProvider(new Ext.state.XRProvider({
			user_id: cfg.user.wz_id,
			user_states: cfg.user_states
		}));

		Ext.tip.QuickTipManager.init();

		var me = this;
		this.masterCfg = cfg;
		this.refactoryMasterCfg();

		if (this.masterCfg.user.wz_u_username != 'admin')
		{
			xluerzer.getInstance().showDesktop();
			return;
		}


		this.contentPanel = Ext.create('Ext.Panel',{
			html: ''
		});

		var topBar = [];
		var toolBarTwoHidden = false;

		topBar = this.getTopToolbar();

		this.dynToolbarId = Ext.id();
		this.centerPanel = Ext.create('Ext.Panel',{
			region: 'center',
			layout: 'fit',
			border: false,
			items: [this.contentPanel],
			dockedItems: [
			{
				xtype: 'toolbar',
				dock: 'top',
				height: 80,
				items: topBar
			}]
		});

		this.centerPanel.on('afterrender',function(){
			this.workingBenchLoaded();
		},this,{buffer:100});


		var viewport = Ext.create('Ext.Viewport', {
			layout: {
				type: 'border'
			},
			defaults: {
				split: true
			},
			items: [this.centerPanel]
		});

		this.viewport_master = viewport;
		return viewport;
	}

}