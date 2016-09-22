var xredaktor_css_less = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			if (instance == null) {
				instance = new xredaktor_css_less_(config);
			}
			return instance;
		}
	}
})();

var xredaktor_css_less_ = function(config) {
	this.config = config || {};
};

xredaktor_css_less_.prototype = {



	srcEditor: function(cfg) {

		var me = this;
		if (typeof this.zendis == 'undefined') this.zendis = {};


		var gui = Ext.create('Ext.Component', {
			html: ''
		});

		gui.on('afterrender',function(ta){

			ace.require("ace/ext/language_tools");
			ta.srcEditor = ace.edit(ta.el.id);
			ta.srcEditor.setTheme("ace/theme/chrome");
			ta.srcEditor.getSession().setMode("ace/mode/less");

			
			ta.srcEditor.setOptions({
				enableBasicAutocompletion: true,
		        enableSnippets: true,
		        enableLiveAutocompletion: false
			});
			
			
			ta.srcEditor.commands.addCommand({
				name: "save",
				bindKey: {win: "Ctrl-S", mac: "Command-S"},
				exec: function(editor) {
					me.saveContent.call(me,cfg.f_id);
				}
			})

			ta.srcEditor.commands.addCommand({
				name: "reload",
				bindKey: {win: "Ctrl-R", mac: "Command-R"},
				exec: function(editor) {
					me.loadAtomById.call(me,me.currentAtomId);
				}
			})

			if (typeof this.zendis == "string")
			{
				ta.srcEditor.setValue(me.zendis,-1);
			}

			this.zendis = ta.srcEditor;

		},this, {buffer:10});


		var wrapper = Ext.create('Ext.panel.Panel', {
			layout: 'fit',
			title: 'code less',
			items: gui,
			tbar: [{
				scope: this,
				iconCls: 'xf_save',
				text: 'Speichern',
				handler: function() {
					me.saveContent.call(me,cfg.f_id);
				}
			},{
				scope: this,
				iconCls: 'xf_reload',
				text: 'Reload',
				handler: function() {
					this.loadAtomById(this.currentAtomId);
				}
			}]
		});

		return wrapper;
	},

	setSrcEditors: function(atom)
	{
		try {
			this.zendis.setValue(atom.cl_content,-1);
		} catch (e) {
			this.zendis = atom.cl_content;
		}
	},

	initSrcEditors: function() {

		var tab = this.srcEditor({
			f_id: 	'0',
			f_name: 'code'
		});

		return [tab];
	},



	getMainPanel : function(s_id)
	{
		if (typeof s_id == 'undefined') 	s_id 	= "-1";

		var me 					= this;
		var loadAtomById		= function(){};
		var cookieName 			= 'xr_css_less_last_sel_'+xredaktor.getInstance().getCurrentSiteId();


		var titleSel= "B";
		var title 	= "LESS-DOXS";
		var title2 	= "Name";
		var txt_new	= "Name des Bauststeins";
		var iconsPrefix = "xr_atoms";
		var startTab	= 1;

		this.currentAtomId 		= -1;

		this.panel_log			= xredaktor_log.getInstance().genPanelForAtom(0);

		this.panel_log.on('afterrender',function(){
			this.panel_log.getStore().load();
		},this,{buffer:1})

		this.saveContent = function(f_id)
		{

			var params = {
				cl_id: 		this.currentAtomId,
				content: 	this.zendis.getValue()
			};

			this.tabPanel.mask('Speicher Code ...');
			xframe.ajax({
				scope: this,
				url: '/xgo/xplugs/xredaktor/ajax/css_less/saveCode',
				params : params,
				stateless: function(success,json) {
					this.tabPanel.unmask();
					if (!success)
					{
						xframe.alert('Speichern fehlgeschlagen','Achtung der Sourcecode konnte nicht gespeichert werden!');
						return;
					}

					var i = parseInt(localStorage.getItem('css_flush'),10);
					if (isNaN(i)) i = 0;
					i++;
					localStorage.setItem("css_flush",i);

				}
			});

		}

		var what = {};
		checkAutoLoad = function(x)
		{
			if (what[x]) return;
			what[x] = true;

			if ((what['panel']) && (what['tree_store'])) {
				var a_id = 0;
				try {
					a_id = parseInt(Ext.util.Cookies.get(cookieName),10);
				}catch(e){}

				if (a_id > 0) {

					this.tree.mask("Öffne letzten Datensatz...");
					this.tree.doSearcherAndSelect(a_id,function(){
						me.tree.unmask();
					});
				}
			}
		}

		var items = [this.configPanel];
		var ses = this.initSrcEditors();
		Ext.each(ses,function(e){
			items.push(e);
		},this);

		this.tabPanel = Ext.create('Ext.tab.Panel', {
			title: titleSel+': -' ,
			activeTab: startTab,
			tabPosition: 'left',
			border:false,
			region: 'center',
			split: true,
			collapseMode: 'mini',
			items: items,
			disabled: true,
			listeners: {
				scope: this,
				tabchange: function(tb,activeTab) {
					//var activeTabIndex 	= this.tabPanel.items.findIndex('id', activeTab.id);
					//Ext.util.Cookies.set('STORE_ACTIVE_PANEL_CONF_'+a_type,activeTabIndex);
				}
			}
		});


		var fields = [
		{name: 'cl_name', 		xgroup:['Normal','Sprachenspezifisch','Erweitert'],	text:title2,			type:'string', 	folder: true, editor: {allowBlank: false,xtype: 'textfield'}},
		{name: 'cl_id',			xgroup:'Erweitert', 								text:'ID',				type:'int', 	hidden: false, width: 60},
		{name: 'cl_sort',		xgroup:'Erweitert', 								text:'Sort',			type:'int', 	hidden: true, width: 60},
		{name: 'cl_lastmod',	xgroup:'Erweitert', 								text:'Letze  Änderung',	type:'string', 	hidden: true, width: 120}
		];

		this.tree = xframe_pattern.getInstance().genTree({
			xf_search_deep: true,
			iconsPrefix: iconsPrefix,
			button_add:true,
			button_del:true,
			stateful: true,
			stateId: 'xr_css_less_mpanel_tree',
			region:'west',
			title: title,
			border:false,
			split: true,
			collapseMode: 'mini',
			txt_new: txt_new,
			xstore: {
				params : {
					cl_s_id : s_id,
				},
				load: 	'/xgo/xplugs/xredaktor/ajax/css_less/load',
				update: '/xgo/xplugs/xredaktor/ajax/css_less/update',
				insert: '/xgo/xplugs/xredaktor/ajax/css_less/insert',
				remove: '/xgo/xplugs/xredaktor/ajax/css_less/remove',
				move: 	'/xgo/xplugs/xredaktor/ajax/css_less/move',
				pid: 	'cl_id',
				fields: fields
			}
		});


		var latestWizardSettings = {};


		loadAtomById = function(cl_id,finallyDoWizard) {

			console.info("loadAtomById");

			if (typeof finallyDoWizard == "undefined") finallyDoWizard = false;

			this.tabPanel.setDisabled(false);
			this.currentAtomId = cl_id;
			this.tabPanel.mask('Loading Data ...');

			xframe.ajax({
				scope: this,
				url: '/xgo/xplugs/xredaktor/ajax/css_less/loadCode',
				params : {
					cl_id: cl_id
				},
				stateless: function(success,json) {
					this.tabPanel.unmask();
					if (!success)
					{
						xframe.alert('Laden fehlgeschlagen','... !');
						return;
					}
					this.setSrcEditors.call(me,json.record);
				}
			});



		}


		this.loadAtomById = loadAtomById;

		this.tree.getStore().on('load',function(){
			checkAutoLoad.call(me,'tree_store');
		},this);


		this.tree.on('selectionchange',function(view,selections,options){

			if (selections.length == 0)	{
				Ext.util.Cookies.set(cookieName, 0);
				this.tabPanel.setDisabled(true);
				return;
			}

			var cl_id = selections[0].data.cl_id;
			Ext.util.Cookies.set(cookieName, cl_id);

			loadAtomById.call(this,cl_id,true);

		},this,{delay:1});

		var gui = Ext.create('Ext.Panel',{
			border:false,
			layout: 'border',
			split: true,
			collapseMode: 'mini',
			defaults:{
				split: true,
				collapseMode: 'mini'
			},
			items : [this.tree,this.tabPanel]
		});



		return gui;
	}


};