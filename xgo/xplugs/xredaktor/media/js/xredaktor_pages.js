var xredaktor_pages = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xredaktor_pages_(config);
			}
			return instance;
		}
	}
})();

var xredaktor_pages_ = function(config) {
	this.config = config || {};
};

xredaktor_pages_.prototype = {

	getStoreOfPages : function(s_id,p_id)
	{

		if (typeof s_id == "undefined") s_id = xredaktor.getInstance().getCurrentSiteId();
		if (typeof p_id == "undefined") p_id = 0;

		var store = xframe.getStoreByConfig({
			rootTextName: 'Seiten',
			fields: [
			{name: 'p_name',	type:'string', folder: true},
			{name: 'p_id',		type:'int'}
			],
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/pages/load',
				update: '/xgo/xplugs/xredaktor/ajax/pages/update',
				insert: '/xgo/xplugs/xredaktor/ajax/pages/insert',
				remove: '/xgo/xplugs/xredaktor/ajax/pages/remove',
				params: {p_s_id:s_id,p_id:p_id},
				pid: 	'p_id',
				nameField: 'p_name'
			}
		});

		return store;
	},

	getViewPanel : function()
	{
		this.iframeID 	= Ext.id();
		this.iframeURL	= "/xgo/xplugs/xredaktor/ajax/render/page";

		var panel = Ext.create('Ext.Panel',{

			xtype: 'uxiframe',
			border:false,
			title:'Ansicht',
			split: true,
			width: 300,
			layout: 'fit',
			region: 'center',
			tools:[{
				type:'refresh',
				tooltip: 'Refresh form Data',
				scope:this,
				handler: function(event, toolEl, panel){
					this.refreshViewPanel();
				}
			}],
			bbar: [{
				iconCls:'xf_openNewWindow',
				tooltip:'Edit',
				scope:this,
				handler:function()
				{
					window.open(this.iframeURL+'?p_id='+this.p_id+'&cms');
				}
			},'-',{
				iconCls:'xf_reload',
				tooltip:'Reload',
				scope:this,
				handler:function()
				{
					this.refreshViewPanel();
				}
			},'-',{
				iconCls:'xf_settings',
				tooltip:'Settings',
				scope: this,
				handler:function()
				{

					xredaktor_gui.getInstance().showPageSettings({
						p_id: this.p_id
					});

				}
			}],

			html : "<iframe id='"+this.iframeID+"' src='"+this.iframeURL+"?p_id=0' width=100% height=100% frameborder=0></iframe>"
		});

		this.iframePanelX = panel;

		return panel;
	},

	setViewPanelPage : function(p_id)
	{
		var src = this.iframeURL+'?p_id='+p_id;
		this.latestIframeUrl = src;

		Ext.get(this.iframeID).dom.setAttribute('src',src);
	},

	refreshViewPanel : function()
	{
		Ext.get(this.iframeID).dom.setAttribute('src',this.latestIframeUrl);
	},


	renderMyTime: function(tm_id,x,j) {

		console.info('renderMyTime');
		
		if (!this.backupTimeMachine)
		{
			this.backupTimeMachine = xredaktor_timemachine.getInstance().getStoreOfTimemachine();
		}

		if (tm_id == 0) {
			return "";
		}

		if (j.dirty)
		{

			var id_runner = Ext.id();

			xframe.ajax({
				scope:this,
				url: '/xgo/xplugs/xredaktor/ajax/timemachine/loadData',
				params : {
					tm_id: 	tm_id
				},
				stateless: function(succ,json)
				{
					if (!succ) return false;
					$$('#'+id_runner).html(json.tm_name);
				}
			});


			return "<div id ='"+id_runner+"'><span style='background-color:#00b1e7;color:white;'>Update...</span></div>";

		} else {
			return j.raw.p_tm_name;
		}

	},

	getMainPanel : function(s_id)
	{
		var me = this;
		this.page = this.getViewPanel();


		var but_settings_copy_id = Ext.id();
		var but_settings_copy = {
			iconCls:'xf_settings_copy',
			id:but_settings_copy_id,
			disabled:true,
			scope:this,
			text:'Einstellungen Kopieren',
			handler: function(){
				var sel 	= this.grid.getSelectionModel();
				var keys 	= [];
				Ext.each(sel.getSelection(),function(r){
					keys.push(r.data.as_id);
				},this);

				var mask = xframe.mask(this.grid);
				xframe.ajax({
					scope:this,
					url: '/xgo/xplugs/xredaktor/ajax/pages/copySelection',
					params : {
						keys: keys.join(',')
					},
					success: function(json)
					{
						mask.hide();
						var win = xframe.win({
							modal:true,
							title:'Kopierte Einstellungen',
							items:[{
								xtype:'textarea',
								selectOnFocus:true,
								value:json.encoded
							}]
						});
						win.show();
					}
				});
			}
		};

		var but_settings_paste = {
			scope:this,
			iconCls:'xf_settings_insert',
			text:'Einstellungen Einfügen',
			handler: function(){


				var textId 	= Ext.id();
				var checkId = Ext.id();

				var win = xframe.win({
					modal:true,
					title:'Kopierte Einstellungen Einfügen',
					items:[{
						id:textId,
						selectOnFocus:true,
						xtype: 'textarea',
						value:'Kopierte Einstellungen hier einfügen ...'
					}],
					bbar:[{
						id:checkId,
						xtype:'checkbox',
						labelWidth:200,
						fieldLabel: 'Namen "Matchen" und Überschreiben!'
					},'->',{
						scope:this,
						iconCls:'xf_settings_insert',
						text:'Einfügen',
						handler:function() {

							xframe.yn({
								title:'Einfügen',
								msg: 'Wollen sie wirklich die Konfiguration einfügen?',
								scope:this,
								handler: function(btn)
								{
									if (btn != 'yes') return;



									xframe.yn({
										title:'ACHTUNG',
										msg: 'Kontrollieren Sie die Einstellung Einfügen/Matchen und überschreibeen !',
										scope:this,
										handler: function(btn)
										{
											if (btn != 'yes') return;


											xframe.ajax({
												scope:this,
												url: '/xgo/xplugs/xredaktor/ajax/pages/pasteSelection',
												params : {
													a_id: me._a_id,
													code: Ext.getCmp(textId).getValue(),
													match_Names: Ext.getCmp(checkId).getValue() ? 'Y' : 'N'
												},
												success: function(json)
												{
													var mask = xframe.mask(this.grid);
													if (json.state)
													{
														me.grid.getStore().load();
													} else
													{
														xframe.alert('Import fehlgeschlagen','Leider konnten die kopierten Einstellungen nicht eingefügt werden.');
													}
													win.destroy();
													mask.hide();
												}
											});



										}
									});




								}
							});

						}
					}]
				});
				win.show();
			}
		};

		var but_settings = Ext.create('Ext.Button', {
			iconCls:'xf_settings',
			tooltip: 'Einstellungen',
			menu: [but_settings_copy,but_settings_paste]
		});

		var but_duplicate_id 	= Ext.id();
		var but_duplicate 		= Ext.create('Ext.Button', {
			id: but_duplicate_id,
			disabled: true,
			iconCls: 'xf_duplicate',
			tooltip: 'Seite Duplizieren',
			scope: this,
			handler: function() {
				console.info('duplicate');
			}
		});

		
		var fields = [
		{name: 'p_name',		text:'Name der Seite',	xgroup: ['Normal','Erweitert','Sprachenspezifisch','NiceURL'], type:'string', folder: true, editor: {allowBlank: false,xtype: 'textfield'}},

		{name: 'p_full_cache',	text:'FULL-CACHE',			xgroup: 'Erweitert', 	type:'string', hidden: false, xtype: 'combo',  store : [['Y','JA'],['N','NEIN']]},
				
		{name: 'p_tm_id', 		text:'TM', type:'string', 	hidden: true, 	width: 50, flex: 0, scope: me, renderer:me.renderMyTime, editor: {xtype:'xr_field_timemachine'}},
		{name: 'p_id',			text:'Interne Nummer',	xgroup: 'Erweitert', 	type:'int',  hidden: false},
		{name: 'p_sort',		text:'Sortierung',		xgroup: 'Erweitert', 	type:'int',  hidden: true},
		{name: 'p_lastmod',		text:'Letzte Änderung',	xgroup: 'Erweitert', 	type:'string' , hidden: true},
		{name: 'p_isOnline',	text:'Online',			xgroup: 'Erweitert', 	type:'string', hidden: true, xtype: 'combo',  store : [['Y','JA'],['N','NEIN']]},
		{name: 'p_inMenue',		text:'Im Menü',			xgroup: 'Erweitert', 	type:'string', hidden: true, xtype: 'combo',  store : [['Y','JA'],['N','NEIN']]},
		{name: 'p_frameid',		text:'Topelement',		xgroup: 'Erweitert', 	type:'string', hidden: true, xtype: 'rcombo', store : '/xgo/xplugs/xredaktor/ajax/pages/frames?p_s_id='+s_id}
		];

		var fields2 = [];
		Ext.each(xredaktor.getInstance().getLFE(),function(o){
			var lower = o.fel_ISO.toLowerCase();
			var upper = o.fel_ISO.toUpperCase();
			fields2.push({name: 'p_name_'+lower,	xgroup: 'Sprachenspezifisch', text:upper, type:'string', folder: false, editor: {xtype: 'textfield'},hidden:true});
		});
		fields.push({text:'Menutitel',	xgroup: 'Sprachenspezifisch', columns:fields2, hidden:true});

		var fields2 = [];
		Ext.each(xredaktor.getInstance().getLFE(),function(o){
			var lower = o.fel_ISO.toLowerCase();
			var upper = o.fel_ISO.toUpperCase();
			fields2.push({name: 'p_nice_'+lower,	text:upper,	xgroup: 'NiceURL', 	type:'string', folder: false, editor: {xtype: 'textfield'},hidden:true});
		});
		fields.push({text:'NiceURL',	xgroup: 'NiceURL', columns:fields2, hidden:true});

		if (s_id == 0)
		{
			fields.push({name: 'p_vid',	text:'Virtuelle ID',	xgroup:  ['Normal','Erweitert','Sprachenspezifisch'], 	type:'int',  hidden: false, editor:true});
		}

		this.tree = xframe_pattern.getInstance().genTree({
			iconsPrefix: 'xr_pages',
			//stateId: 'xr_pages_mpanel_tree',
			button_del:true,
			button_add:true,
			region:'west',
			split: true,
			selModelButtons:[but_duplicate_id],
			toolbar_top:[but_duplicate],
			title: 'Seitenbaum',
			border:false,
			//forceFit:true,
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/pages/load',
				update: '/xgo/xplugs/xredaktor/ajax/pages/update',
				insert: '/xgo/xplugs/xredaktor/ajax/pages/insert',
				remove: '/xgo/xplugs/xredaktor/ajax/pages/remove',
				params: {p_s_id:s_id},
				move: 	'/xgo/xplugs/xredaktor/ajax/pages/move',
				pid: 	'p_id',
				fields: fields
			}
		});

		this.tree.on('selectionchange',function(view,selections,options){
			if (selections.length == 0) return;
			this.p_id = selections[0].data.p_id;
			this.setViewPanelPage(this.p_id);
		},this);

		this.tree2 = Ext.create('Ext.Panel',{
			region: 'west',
			border:false,
			html: 'abc',
			split:true
		});

		var gui = Ext.create('Ext.Panel',{
			layout: 'border',
			border:false,
			stateId: 'xr_pages_mpanel',
			items : [this.tree,this.page]
		});

		return gui;
	}
};