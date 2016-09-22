var xredaktor_srceditor = (function() {
	var instance = null;
	return new function() {
		this.getInstance = function(config) {
			var	instance = new xredaktor_srceditor_(config);
			return instance;
		}
	}
})();

var xredaktor_srceditor_ = function(config) {
	this.config = config || {};
};

xredaktor_srceditor_.prototype = {


	thirdPartyLoaded: function() {

		var me 		= this;
		var editor 	= ace.edit(this.lastCMID);

		editor.setTheme("ace/theme/chrome");
		editor.getSession().setMode("ace/mode/php");

		editor.commands.addCommand({
			name: 'SaveDocument',
			bindKey: {win: 'Ctrl-S',  mac: 'Command-S'},
			exec: function(editor) {
				me.default_save.call(me);
			}
		});

		editor.commands.addCommand({
			name: 'AutoCompl',
			bindKey: {win: 'Ctrl-Space',  mac: 'Command-Space'},
			exec: function(editor) {
				me.default_autoComplete.call(me);
			}
		});

		function onGutterClick(e) {
			var s = editor.session;
			var className =  e.domEvent.target.className
			if (className.indexOf('ace_fold-widget') < 0) {
				if (className.indexOf("ace_gutter-cell") != -1 && editor.isFocused()) {
					var row = e.getDocumentPosition().row;
					s[s.$breakpoints[row]?'clearBreakpoint':'setBreakpoint'](row);
					e.stop()
				}
			}
		}
		editor.on('gutterclick', onGutterClick)

		/* BREAK POINTS - END  */

		this.editorHandler = editor;
		this.syncSize();
	},

	getValue : function()
	{
		return this.editorHandler.getValue();
	},

	setValue : function(v)
	{
		return this.editorHandler.setValue(v,0);
	},


	default_save : function() {
		if (typeof this.cfg.handler_save == 'function') {
			var scope = this;
			if (typeof this.cfg.handler_save_scope != 'undefined') scope = this.cfg.handler_save_scope;
			this.cfg.handler_save.call(scope,this.getValue());
		}
	},

	default_reload : function() {
		var me = this;
		if (typeof this.cfg.handler_reload == 'function') {
			var scope = this;
			if (typeof this.cfg.handler_reload_scope != 'undefined') scope = this.cfg.handler_reload_scope;
			this.cfg.handler_reload.call(scope,function(value){
				if (typeof value == 'undefined') return;
				me.setValue.call(me,value);
			});
		}
	},

	default_autoComplete : function() {

		var pos = $$('.ace_cursor').offset();
		Ext.create('Ext.Window', {
			title: 'Code-Pad',
			width: 400,
			height: 200,
			x: pos.left,
			y: pos.top,
			modal:true,
			plain: true,
			headerPosition: 'right',
			layout: 'fit',
			items: {
				border: false
			}
		}).show();

	},

	initEditor: function()
	{
		if (this.editorHandler) 		return true;
		if (this.editorLoaded) 			return false;

		this.editorLoaded = true;

		var me 		= this;
		var maskIt 	= xframe.mask(this.guiPanel,'Lade Quell-Editor ...');
		var path 	= xframe.getPath() + '/libs/ace';

		xframe.load([
		path+'/xgo/ace.js'
		],
		function() {
			setTimeout(function(){
				try{
					me.thirdPartyLoaded.call(me);
				} catch (e) {console.info('Sourceeditor konnte nicht geladen werden ...');}
				maskIt.hide();
			},100);
		},this);

		return false;
	},

	syncSize: function()
	{
		var w = this.guiPanel.getWidth();
		var h = this.guiPanel.getHeight();

		Ext.get(this.lastCMID).setWidth(w);
		Ext.get(this.lastCMID).setHeight(h);

		this.editorHandler.resize(true);
	},

	manageEditor: function()
	{
		if (!this.initEditor()) return;
		this.syncSize();
	},

	getPanel: function(cfg)
	{
		this.cfg = cfg;
		var me = this;
		if (typeof cfg.value == 'undefined') cfg.value = "";
		var value = cfg.value;

		this.lastCMID 				= Ext.id();
		this.editorHandler			= false;
		this.editorLoaded			= false;

		this.guiPanel = Ext.create('Ext.Panel',{
			border: false,
			layout: 'fit',
			html: '<div id="'+this.lastCMID+'"></div>',
			listeners:{
				scope: this,
				resize: function() {
					this.manageEditor();
				},
				afterrender:function() {
					this.manageEditor();
				}
			}
		});

		var buttons = [{
			iconCls: 'xf_save',
			tooltip: 'Speichern',
			scope: this,
			handler: function()
			{
				this.default_save();
			}
		},{
			iconCls:'xf_reload',
			tooltip:'Neu laden',
			scope: this,
			handler:function()
			{
				this.default_reload();
			}
		},'-',{
			tooltip: 'Alle Zeichen anzeigen',
			iconCls: 'xf_pilcrow',
			scope: this,
			handler:function()
			{
				this.changeCodeView();
			}
		}];

		if (cfg.buttons.codeCheck) {
			buttons.push({
				iconCls: 'xf_code_valid',
				tooltip: 'Quellcode testen',
				scope: this,
				handle: function() {

				}
			});
		}

		if (cfg.buttons.codeFormat) {
			buttons.push({
				iconCls: 'xf_code_format',
				tooltip: 'Quellcode formatieren',
				scope: this,
				handle: function() {

				}
			});
		}

		this.textfieldWrapper = Ext.create('Ext.Panel',{
			region:'center',
			layout:'fit',
			border: false,
			title: 'Quellcode',
			xbbar: ['Speichern: STRG-S','Autovervollständigung: STRG-SPACE, FE-Languages'],
			tbar : buttons,
			items: [this.guiPanel],
			listeners : {
				scope: this,
				activate : function() {
					this.manageEditor();
				}
			}
		});


		this.textfieldWrapper.getValue = function()
		{
			return me.getValue.call(me);
		}

		this.textfieldWrapper.setValue = function(v)
		{
			if (typeof v == 'undefined') v = "";
			return me.setValue.call(me,v);
		}

		return this.textfieldWrapper;
	}


};

