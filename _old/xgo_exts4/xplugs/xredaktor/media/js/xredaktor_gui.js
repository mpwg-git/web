var xredaktor_gui = (function() {
	var instance = null;
	return new function() {

		this.getPath = function(){
			return "/xgo/xplugs/xredaktor_gui";
		}

		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xredaktor_gui_(config);
			}
			return instance;
		}
	}
})();

var xredaktor_gui_ = function(config) {
	this.config = config || {};
};

xredaktor_gui_.prototype = {

	showPageTree : function(cfg)
	{
		var newSelection = '';
		var win = false;
		var width 	= window.innerWidth*0.9;
		var height 	=  window.innerHeight*0.9;

		width 	= 640;

		var tree = xframe_pattern.getInstance().genTree({
			region:'west',
			split: true,
			tools:[],
			bbar_add2:[{
				text:'Auswählen',
				scope:this,
				handler:function(){
					win.destroy();
				}
			}],
			title: '',
			button_save:false,
			forceFit:true,
			xstore: {
				load: 	'/xgo/xplugs/xredaktor/ajax/pages/load',
				update: '/xgo/xplugs/xredaktor/ajax/pages/update',
				insert: '/xgo/xplugs/xredaktor/ajax/pages/insert',
				move: 	'/xgo/xplugs/xredaktor/ajax/pages/move',
				pid: 	'p_id',
				loadParams : {p_s_id:xredaktor.getInstance().getCurrentSiteId()},
				fields: [
				{name: 'p_name',		text:'Name der Seite',	type:'string', folder: true, editor: {
					allowBlank: false,
					xtype: 'textfield'
				}},
				{name: 'p_id',			text:'Interne Nummer',	type:'int', 	hidden: true}
				]
			}
		});
		var me = this;
		tree.on('load',function() {

			try{

				var p_id = cfg.p_id;
				if (!Ext.isNumeric(p_id))
				{
					return;
				}
				xframe.ajax({
					scope:me,
					url: xredaktor.getPath() + '/ajax/pages/getPathOfPage',
					params: {
						p_id: p_id,
						p_s_id: xredaktor.getInstance().getCurrentSiteId()
					},
					success: function(json) {
						if (json.path2expand == '/')
						{
							tree.selectPath('/0/'+p_id,'p_id','/',function(){
							});
							return;
						}
						tree.selectPath('/0'+json.path2expand+'/'+p_id,'p_id','/',function(){
						});
					},
					failure: function() {
						this.gui.setDisabled(false);
					}
				});
			} catch(e) {
				console.info(e);
			}

		},this);

		tree.on('itemdblclick',function(view,record) {
			cfg.cb_ok_fn.call(cfg.cb_ok_scope,record.data.p_id,record.data.p_name);
			win.destroy();
		},this);

		win = Ext.create('widget.window', {
			border:false,
			modal: true,
			title: 'Seitenbaum',
			closable: true,
			width: width,
			height: height,
			layout: 'fit',
			items: [tree]
		});

		win.show();
		win.setActive(true,true);
	},

	showFormWin : function(cfg)
	{
		var me			= this;
		var win			= false;
		var holder		= false;
		var cfg2 		= Ext.clone(cfg);
		var autoScroll 	= false;

		cfg2.title 	= "";

		if (cfg.height) 	autoScroll = true;
		if (cfg.autoScroll) autoScroll = true;
		if (!cfg.msg) 		cfg2.msg = 'Lade '+cfg.title;

		if (cfg.xsave)
		{
			cfg2.buttonsLoc = 'B';
			cfg2.buttons = [{
				iconCls:'xf_save',
				text:'Konfiguration Speichern',
				scope:this,
				handler:function(btn)
				{
					var mask = xframe.mask(win,'Speichere Daten ...');
					btn.setDisabled(true);
					cfg.xsave.params[cfg.xsave.pressInJsonName] = Ext.encode(holder.getGui().getFormData());
					xframe.ajax({
						scope:this,
						url: cfg.xsave.url,
						params : cfg.xsave.params,
						stateless: function(success,json)
						{
							btn.setDisabled(false);
							if (!success)
							{
								xframe.alert('Fehler','Daten konnten nicht gespeichert werden.');
							} else
							{
								if ((typeof cfg.handler == 'function') && (cfg.scope))
								{
									cfg.handler.call(cfg.scope,holder.getGui().getFormData());
								}
							}
							mask.hide();
							win.destroy();
						}
					});
				}
			}];
		}

		var setData = false;



		cfg2.listeners = {
			afterrender: function(fp) {

				console.info("XXX",cfg.initValue);
				console.info(holder.getGui().getFormData());
				holder.getGui().setFormData(cfg.initValue);

				var h = fp.getHeight()+35;
				var w = fp.getWidth();

				if (cfg.width)
				{
					w = cfg.width;
				}

				if (cfg.height)
				{
					h = cfg.height;
				}

				if (h>window.innerHeight*0.8)	{h = window.innerHeight*0.8;}
				if (w>window.innerWidth*0.8)	{w = window.innerWidth*0.8;}

				h = window.innerHeight*0.8;
				w = window.innerWidth*0.8;

				xw = window.innerWidth/2 - w/2;
				yh = window.innerHeight/2- h/2;

				win.setSize(w,h);
				win.setPagePosition(xw,yh,false);

			}

		};

		holder = this.renderFormViaVid(cfg2);

		win = xframe.win({
			//animateTarget: cfg.animateTarget || false, fehler - glaube false ist falsch
			modal:true,
			title:cfg.title||'',
			items:[holder],
			width:100,
			height:100,
			resizable:true
		});

		win.show();
		holder._win = win;
		return holder;
	},

	showPageSettings: function(cfg)
	{

		$$('body,html').css('overflow', 'hidden');

		if (typeof cfg == "undefined") return false;

		var psa_id		= -1;
		var p_id 		= cfg.p_id || -1;
		var msg			= "Einstellungen werden geladen ...";
		var fp 			= false;




		var win = Ext.create('widget.window', {
			border:false,
			title: 'Seitenkonfiguration',
			closable: true,
			modal:true,
			width: window.innerWidth*0.7,
			height: window.innerHeight*0.7,
			layout: 'fit',
			items: [],
			listeners: {
				scope: this,
				afterrender: function(wini) {
					wini.el.mask('Lade Daten ...');
				}
			},
			bbar: ['->',{
				text: 'Save',
				iconCls: 'xf_save',
				scope: this,
				handler: function() {

					win.mask("Speichere Daten ...");
					var data = fp.getForm().getValues();

					xframe.ajax({
						scope:this,
						url: '/xgo/xplugs/xredaktor/ajax/atoms_settings/saveFormDataByPAS',
						params: {
							psa_json_cfg: Ext.encode(data),
							psa_id: psa_id
						},
						stateless: function(json) {
							win.unmask();
							win.close();
							$$('body,html').css('overflow', 'auto');
						}
					});

				}
			},{
				text: 'Abbruch',
				iconCls: 'xf_abort',
				scope: this,
				handler: function() {
					$$('body,html').css('overflow', 'auto');
					win.close();
				}
			}]
		});
		win.show();









		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/gui/pageSettings_load',
			params: {
				p_id: p_id
			},
			stateless: function(succ,json) {
				
				if (!succ) {
					win.el.unmask();
					return;
				}
				
				psa_id = json.psa_id;
				
				
				fp = xredaktor_forms.getInstance().finalize([], json.gui);
				fp.on('afterrender',function(){
					console.info('SET_DATA',json.data);
					fp.getForm().setValues(json.data)
				},this,{buffer:1});

				win.removeAll();
				win.add(fp);
				win.doLayout();
				win.el.unmask();
			}
		});










	},

	renderFormViaVid : function(cfg)
	{
		var scopex = this;


		if (typeof cfg.scope != "undefined") 							scopex 	= cfg.scope;
		if (typeof cfg.listeners == "undefined") 						cfg.listeners = {};
		if (typeof cfg.listeners.afterrender == "undefined")			cfg.listeners.afterrender = false;
		if (typeof cfg.listeners.afterBuildFormPanel == "undefined")	cfg.listeners.afterBuildFormPanel = false;

		if (typeof cfg.msg == "undefined") 								cfg.msg = 'Ansicht wird generiert, bitte Warten ...';
		if (typeof afterFormPanelRenderedFinally == "undefined") 		afterFormPanelRenderedFinally = false;

		var holder = Ext.create('Ext.panel.Panel', {
			iconCls: cfg.iconCls || false,
			frame:false,
			border:false,
			region: 'center',
			title: cfg.title || '',
			layout: 'fit',
			html: '<p style="margin:20px">'+cfg.msg+'</p>'
		});

		var formpanel = false;

		holder.getGui = function() {
			return formpanel;
		}

		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/gui/getFormSettingsViaVID',
			params: {
				vid: cfg.vid || -1
			},
			success: function(json) {


				formpanel = xredaktor_forms.getInstance().finalize(cfg.buttons || [],json);


				formpanel.getFormData = function()
				{
					//
					return formpanel.getForm().getValues();
				}

				formpanel.setFormData = function(values)
				{
					formpanel.getForm().reset();
					return formpanel.getForm().setValues(values);
				}

				formpanel.on('afterrender',function(){

					if (typeof cfg.listeners.afterrender == "function")
					{
						cfg.listeners.afterrender.call(scopex, formpanel);
					}

					if (typeof cfg.afterFormRender == "function")
					{
						cfg.afterFormRender(scopex, formpanel);
					}

				},this,{buffer:150});


				holder.removeAll();
				holder.add(formpanel);

				if (typeof cfg.listeners.afterBuildFormPanel  == "function") {
					cfg.listeners.afterBuildFormPanel.call(cfg.scope,formpanel);
				}

			},
			failure: function() {
			}
		});

		return holder;
	},

	renderFormViaId : function(cfg)
	{
		var scopex = this;


		if (typeof cfg.scope != "undefined") 						scopex 	= cfg.scope;
		if (typeof cfg.listeners == "undefined") 					cfg.listeners = {};
		if (typeof cfg.listeners.afterrender == "undefined")		cfg.listeners.afterrender = false;

		if (typeof cfg.msg == "undefined") 							cfg.msg = 'Ansicht wird generiert, bitte Warten ...';
		if (typeof afterFormPanelRenderedFinally == "undefined") 	afterFormPanelRenderedFinally = false;

		var holder = Ext.create('Ext.panel.Panel', {
			iconCls: cfg.iconCls || false,
			id: cfg.panel_id || Ext.id(),
			extraCfg: cfg.extraCfg || false,
			closable: cfg.closable || false,
			frame:false,
			border:false,
			region: 'center',
			title: cfg.title || '',
			layout: 'fit',
			html: '<p style="margin:20px">'+cfg.msg+'</p>'
		});

		var formpanel = false;

		holder.getGui = function() {
			return formpanel;
		}


		var doSpreadSave = function()  {
			var data = formpanel.getFormData();

			xframe.ajax({
				scope:this,
				url: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/spreadSave',
				params : {

					domagic:	cfg.id,
					json_cfg:	Ext.encode(data),
					id: 		cfg.r_id

				},
				success: function(json)
				{
					if (json['__warning']) {
						xframe.alert("Achtung",json['__warning']);
					}
					if (typeof cfg.handler_afterSave == 'function') cfg.handler_afterSave(json);
				}
			});
		}



		xframe.ajax({
			scope:this,
			url: '/xgo/xplugs/xredaktor/ajax/gui/getFormSettingsViaID',
			params: {
				id: cfg.id || -1,
				r_id: cfg.r_id || -1,
				formId: Ext.id()
			},
			success: function(json) {

				if (!cfg.buttons) 		cfg.buttons = [];
				if (cfg.spreadSave)
				{
					cfg.buttons.push({
						text:	'Save',
						iconCls:'xf_save',
						scope: this,
						handler: function() {
							doSpreadSave();
						}
					});
				}

				if (cfg.spreadDel) {
					cfg.buttons.push('->');
					cfg.buttons.push({
						text:	'Delete',
						iconCls:'xf_del',
						scope: this,
						handler: function() {


							xframe.yn({
								title:'Delete',
								msg: 'Do you really want do delete this item ?',
								scope:this,
								handler: function(btn)
								{
									if (btn != 'yes') return;

									xframe.ajax({
										scope:this,
										url: '/xgo/xplugs/xredaktor/ajax/wizards_domagic_grid/spreadDel',
										params : {
											domagic:	cfg.id,
											id: 		cfg.r_id
										},
										success: function(json)
										{
											if (typeof cfg.handler_afterDel == 'function') cfg.handler_afterDel(json);
										}
									});

								}
							});


						}
					});
				}

				console.info('DATA_LOADED');
				formpanel = xredaktor_forms.getInstance().finalize(cfg.buttons,json);
				console.info('DATA_LOADED_2');



				holder.removeAll();
				holder.add(formpanel);
				holder.doLayout();


				formpanel.getFormData = function()
				{
					var names 	= {};
					var data 	= {};

					Ext.each(json.finalFieldsFlat,function(d){
						try{
							data[d.name] = Ext.getCmp(d.id).getValue();
						} catch (e) { console.error("Feld: "+d.name+" hat keine getValue Funktion....");}
					},this);

					return data;
				}

				formpanel.setFormData = function(values)
				{
					return formpanel.getForm().setValues(values);
				}

				formpanel.on('afterrender',function(){
					if (typeof cfg.msg.afterrender == "function")
					{
						cfg.msg.afterrender.call(scopex, fp);
					}

					if (typeof cfg.afterFormRender == "function")
					{
						cfg.afterFormRender(scopex, fp);
					}

				},this,{buffer:150});

			},
			failure: function() {
			}
		});

		return holder;
	}

}